<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;
use App\Models\locations;
use App\Models\Order;

class CartController extends Controller
{
    /**
     * Получить корзину
     */
    public function getCart()
    {
        $cart = session('cart', []);
        $cartItems = [];
        $total = 0;

        foreach ($cart as $key => $item) {
            $service = Service::with('categories')->find($item['service_id']);
            if ($service) {
                $category = $service->categories->first();
                $price = $item['cleaning_type'] === 'individual' && $service->individual_price > 0
                    ? $service->individual_price
                    : $service->price;

                // Применяем скидку категории
                if ($category && $category->hasActiveDiscount()) {
                    $price = $category->calculateDiscountedPrice($price);
                }

                $cartItems[] = [
                    'key' => $key,
                    'service_id' => $service->id,
                    'service_name' => $service->name,
                    'category_name' => $category->name ?? 'Послуга',
                    'category_icon' => $category->category_img ?? null,
                    'quantity' => $item['quantity'],
                    'cleaning_type' => $item['cleaning_type'],
                    'price' => $price,
                    'total' => $price * $item['quantity'],
                ];

                $total += $price * $item['quantity'];
            }
        }

        return response()->json([
            'items' => $cartItems,
            'total' => $total,
            'count' => count($cartItems),
        ]);
    }

    /**
     * Добавить товар в корзину
     */
    public function addToCart(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'quantity' => 'required|integer|min:1',
            'cleaning_type' => 'required|in:individual,stream',
        ]);

        $service = Service::with('categories')->findOrFail($request->service_id);

        // Проверяем, доступна ли индивидуальная чистка
        if ($request->cleaning_type === 'individual' && (!$service->individual_price || $service->individual_price <= 0)) {
            return response()->json([
                'success' => false,
                'message' => 'Індивідуальна чистка недоступна для цієї послуги'
            ], 400);
        }

        $cart = session('cart', []);
        $key = $this->generateCartKey($request->service_id, $request->cleaning_type);

        if (isset($cart[$key])) {
            $cart[$key]['quantity'] += $request->quantity;
        } else {
            $cart[$key] = [
                'service_id' => $request->service_id,
                'quantity' => $request->quantity,
                'cleaning_type' => $request->cleaning_type,
            ];
        }

        session(['cart' => $cart]);

        return response()->json([
            'success' => true,
            'message' => 'Товар додано до корзини',
            'cart_count' => count($cart),
        ]);
    }

    /**
     * Обновить количество товара в корзине
     */
    public function updateCart(Request $request, $key)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session('cart', []);

        if (!isset($cart[$key])) {
            return response()->json([
                'success' => false,
                'message' => 'Товар не знайдено в корзині'
            ], 404);
        }

        $cart[$key]['quantity'] = $request->quantity;
        session(['cart' => $cart]);

        return $this->getCart();
    }

    /**
     * Удалить товар из корзины
     */
    public function removeFromCart($key)
    {
        $cart = session('cart', []);

        if (isset($cart[$key])) {
            unset($cart[$key]);
            session(['cart' => $cart]);
        }

        return $this->getCart();
    }

    /**
     * Очистить корзину
     */
    public function clearCart()
    {
        session(['cart' => []]);
        return response()->json([
            'success' => true,
            'message' => 'Корзина очищена'
        ]);
    }

    /**
     * Сгенерировать ключ корзины
     */
    private function generateCartKey($serviceId, $cleaningType)
    {
        return $serviceId . '_' . $cleaningType;
    }

    /**
     * Отправить заказ
     */
    public function submitOrder(Request $request)
    {
        // Валидация с правильной обработкой условных полей
        $rules = [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'delivery_method' => 'required|in:self,courier',
        ];
        
        // Добавляем условные правила валидации
        if ($request->delivery_method === 'self') {
            $rules['pickup_location_id'] = 'required|exists:locations,id';
        } elseif ($request->delivery_method === 'courier') {
            $rules['delivery_address'] = 'required|string|max:500';
        }
        
        $validated = $request->validate($rules);

        $cart = session('cart', []);

        if (empty($cart)) {
            return response()->json([
                'success' => false,
                'message' => 'Корзина порожня'
            ], 400);
        }

        // Получаем детали корзины
        $cartItems = [];
        $total = 0;

        foreach ($cart as $key => $item) {
            $service = Service::with('categories')->find($item['service_id']);
            if ($service) {
                $category = $service->categories->first();
                $price = $item['cleaning_type'] === 'individual' && $service->individual_price > 0
                    ? $service->individual_price
                    : $service->price;

                // Применяем скидку категории
                if ($category && $category->hasActiveDiscount()) {
                    $price = $category->calculateDiscountedPrice($price);
                }

                $cartItems[] = [
                    'service_id' => $service->id,
                    'service_name' => $service->name,
                    'category_name' => $category->name ?? 'Послуга',
                    'quantity' => $item['quantity'],
                    'cleaning_type' => $item['cleaning_type'],
                    'price' => $price,
                    'total' => $price * $item['quantity'],
                ];

                $total += $price * $item['quantity'];
            }
        }

        // Получаем информацию о приемном пункте если есть
        $pickupLocation = null;
        if ($request->delivery_method === 'self' && isset($validated['pickup_location_id'])) {
            $pickupLocation = locations::with('cityRelation')->find($validated['pickup_location_id']);
        }

        // Генерируем уникальный ID заказа
        $orderId = 'ENOT-' . date('Ymd') . '-' . strtoupper(uniqid());

        // Сохраняем заказ в базу данных
        $order = Order::create([
            'order_id' => $orderId,
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'delivery_method' => $validated['delivery_method'],
            'pickup_location_id' => $validated['pickup_location_id'] ?? null,
            'delivery_address' => $validated['delivery_address'] ?? null,
            'items' => $cartItems,
            'total' => $total,
            'status' => 'new',
        ]);

        // Сохраняем заказ в сессию для отображения на странице благодарности
        $sessionOrder = [
            'id' => $orderId,
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'delivery_method' => $validated['delivery_method'],
            'pickup_location' => $pickupLocation ? [
                'street' => $pickupLocation->street,
                'city' => $pickupLocation->cityRelation->name ?? 'Невідомо',
                'working_hours' => $pickupLocation->workinghourse ?? '',
            ] : null,
            'delivery_address' => $validated['delivery_address'] ?? null,
            'items' => $cartItems,
            'total' => $total,
            'created_at' => now()->format('d.m.Y H:i'),
        ];

        session(['last_order' => $sessionOrder]);

        // Отправляем уведомление в Telegram
        try {
            $this->sendOrderTelegramNotification($order, $pickupLocation);
        } catch (\Exception $e) {
            // Логируем ошибку, но не прерываем выполнение
            \Log::error('Failed to send Telegram notification for order: ' . $orderId, [
                'error' => $e->getMessage(),
                'order_id' => $orderId
            ]);
        }

        // Очищаем корзину после оформления заказа
        session(['cart' => []]);

        return response()->json([
            'success' => true,
            'message' => 'Замовлення успішно оформлено',
            'order_id' => $orderId
        ]);
    }

    /**
     * Отправить заявку на консультацию
     */
    public function submitConsultation(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|max:20',
        ]);

        $cart = session('cart', []);

        // Здесь можно отправить уведомление с номером телефона и товарами в корзине

        return response()->json([
            'success' => true,
            'message' => 'Заявка на консультацію відправлена'
        ]);
    }

    /**
     * Получить приемные пункты для выпадающего списка
     */
    public function getPickupLocations()
    {
        $locations = locations::with('cityRelation')
            ->orderBy('city')
            ->orderBy('street')
            ->get();

        return response()->json([
            'locations' => $locations->map(function($location) {
                return [
                    'id' => $location->id,
                    'street' => $location->street,
                    'city' => $location->cityRelation->name ?? 'Невідомо',
                    'working_hours' => $location->workinghourse ?? '',
                ];
            })
        ]);
    }

    /**
     * Страница оформления заказа
     */
    public function checkout()
    {
        $cart = session('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('services')->with('message', 'Ваша корзина порожня');
        }

        $locations = locations::with('cityRelation')
            ->orderBy('city')
            ->orderBy('street')
            ->get();

        return view('checkout', [
            'locations' => $locations,
        ]);
    }

    /**
     * Страница благодарности с инвойсом
     */
    public function orderSuccess($orderId = null)
    {
        $order = session('last_order');

        if (!$order) {
            return redirect()->route('services')->with('message', 'Замовлення не знайдено');
        }

        // Если передан orderId, проверяем совпадение
        if ($orderId && $order['id'] !== $orderId) {
            return redirect()->route('services')->with('message', 'Замовлення не знайдено');
        }

        return view('order-success', [
            'order' => $order,
        ]);
    }

    /**
     * Скачать инвойс в PDF
     */
    public function downloadInvoice($orderId)
    {
        $order = session('last_order');

        if (!$order || $order['id'] !== $orderId) {
            abort(404, 'Замовлення не знайдено');
        }

        // Для простоты используем HTML-to-PDF через view
        // Можно также использовать библиотеку DomPDF или MPDF
        return view('invoice-pdf', [
            'order' => $order,
        ]);
    }

    /**
     * Отправить уведомление о заказе в Telegram
     */
    private function sendOrderTelegramNotification($order, $pickupLocation = null)
    {
        // Проверяем, включены ли уведомления
        if (!config('telegram.enabled', true)) {
            return;
        }

        $botToken = config('telegram.bot_token');
        $chatId = config('telegram.chat_id');

        if (!$botToken || !$chatId) {
            \Log::warning('Telegram bot token or chat ID not configured');
            return;
        }

        // Формируем текст сообщения
        $text = "🛒 *Нове замовлення!*\n\n";
        $text .= "📋 *Номер замовлення:* " . $order->order_id . "\n\n";
        $text .= "👤 *Клієнт:* " . $order->name . "\n";
        $text .= "📞 *Телефон:* " . $order->phone . "\n\n";

        // Информация о доставке
        if ($order->delivery_method === 'self') {
            $text .= "📍 *Спосіб отримання:* Самовивіз\n";
            if ($pickupLocation) {
                $text .= "🏪 *Приймальний пункт:* " . $pickupLocation->street;
                if ($pickupLocation->cityRelation) {
                    $text .= ", " . $pickupLocation->cityRelation->name;
                }
                $text .= "\n";
            }
        } else {
            $text .= "🚚 *Спосіб отримання:* Кур'єрська доставка\n";
            if ($order->delivery_address) {
                $text .= "📍 *Адреса доставки:* " . $order->delivery_address . "\n";
            }
        }

        $text .= "\n📦 *Товари:*\n";
        foreach ($order->items as $item) {
            $text .= "• " . $item['service_name'];
            if (isset($item['category_name'])) {
                $text .= " (" . $item['category_name'] . ")";
            }
            $text .= "\n";
            $text .= "  Тип: " . ($item['cleaning_type'] === 'individual' ? 'Індивідуальна' : 'Потокова') . "\n";
            $text .= "  Кількість: " . $item['quantity'] . " × " . number_format($item['price'], 0, ',', ' ') . "₴ = " . number_format($item['total'], 0, ',', ' ') . "₴\n\n";
        }

        $text .= "💰 *Загальна сума:* " . number_format($order->total, 0, ',', ' ') . "₴\n\n";
        $text .= "⏰ *Час оформлення:* " . $order->created_at->format('d.m.Y H:i:s');

        $data = [
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => 'Markdown'
        ];

        $url = "https://api.telegram.org/bot{$botToken}/sendMessage";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);

        if ($httpCode !== 200) {
            \Log::error('Telegram notification failed for order', [
                'order_id' => $order->order_id,
                'http_code' => $httpCode,
                'curl_error' => $curlError,
                'response' => $result
            ]);
            throw new \Exception('Failed to send Telegram notification: ' . $curlError);
        }

        return $result;
    }
}

