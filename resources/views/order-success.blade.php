@extends('layouts.app')

@section('title')
    Дякуємо за замовлення - Єнот 24 / Хімчистка одягу та килимів у Києві
@endsection

@section('content')
    <div class="py-12 md:py-16">
        <div class="container mx-auto px-4 md:px-8 max-w-4xl">
            {{-- Success Animation --}}
            <div class="text-center mb-8">
                <div class="relative inline-block mb-6">
                    <div class="w-32 h-32 md:w-40 md:h-40 mx-auto relative">
                        {{-- Success Raccoon --}}
                        <div class="absolute inset-0 bg-gradient-to-br from-green-300 to-green-400 rounded-full flex items-center justify-center">
                            {{-- Eyes --}}
                            <div class="flex gap-4 -mt-2">
                                <div class="w-4 h-4 bg-black rounded-full"></div>
                                <div class="w-4 h-4 bg-black rounded-full"></div>
                            </div>
                            {{-- Smile --}}
                            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 w-16 h-8 border-4 border-black border-t-0 rounded-b-full"></div>
                            {{-- Mask --}}
                            <div class="absolute top-2 left-1/2 transform -translate-x-1/2 w-28 h-12 bg-black rounded-full opacity-20"></div>
                        </div>
                        {{-- Ears --}}
                        <div class="absolute -top-2 -left-2 w-10 h-10 bg-green-400 rounded-full"></div>
                        <div class="absolute -top-2 -right-2 w-10 h-10 bg-green-400 rounded-full"></div>
                        {{-- Checkmark --}}
                        <div class="absolute -bottom-2 -right-2 w-16 h-16 bg-green-500 rounded-full flex items-center justify-center animate-bounce">
                            <i class="fas fa-check text-white text-2xl"></i>
                        </div>
                    </div>
                    {{-- Sparkles --}}
                    <div class="absolute -top-6 -left-6 w-3 h-3 bg-primary rounded-full animate-pulse"></div>
                    <div class="absolute -bottom-4 -right-6 w-3 h-3 bg-secondary rounded-full animate-pulse" style="animation-delay: 0.3s"></div>
                    <div class="absolute top-1/2 -right-10 w-3 h-3 bg-primary rounded-full animate-pulse" style="animation-delay: 0.6s"></div>
                </div>
                
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Дякуємо за замовлення! 🦝</h1>
                <p class="text-xl text-gray-600 mb-2">
                    Наші єнотики вже обробляють ваше замовлення!
                </p>
                <p class="text-lg text-gray-500">
                    Ми зв'яжемося з вами найближчим часом для підтвердження деталей.
                </p>
            </div>

            {{-- Invoice Card --}}
            <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
                {{-- Invoice Header --}}
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 pb-6 border-b-2 border-gray-200">
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Інвойс</h2>
                        <p class="text-gray-600">Номер замовлення: <span class="font-semibold text-primary">{{ $order['id'] }}</span></p>
                        <p class="text-sm text-gray-500 mt-1">Дата: {{ $order['created_at'] }}</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <button 
                            onclick="downloadInvoice()"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-primary text-white rounded-lg font-semibold hover:bg-primary/90 transition-colors duration-300 shadow-lg hover:shadow-xl">
                            <i class="fas fa-download"></i>
                            <span>Скачати PDF</span>
                        </button>
                    </div>
                </div>

                {{-- Customer Info --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Інформація про замовника</h3>
                        <div class="space-y-2 text-gray-600">
                            <p><span class="font-semibold">Ім'я:</span> {{ $order['name'] }}</p>
                            <p><span class="font-semibold">Телефон:</span> {{ $order['phone'] }}</p>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Спосіб отримання</h3>
                        <div class="space-y-2 text-gray-600">
                            @if($order['delivery_method'] === 'self')
                                <p><span class="font-semibold">Самовивіз</span></p>
                                @if($order['pickup_location'])
                                    <p class="text-sm">
                                        {{ $order['pickup_location']['street'] }},<br>
                                        {{ $order['pickup_location']['city'] }}
                                        @if($order['pickup_location']['working_hours'])
                                            <br><span class="text-xs text-gray-500">({{ $order['pickup_location']['working_hours'] }})</span>
                                        @endif
                                    </p>
                                @endif
                            @else
                                <p><span class="font-semibold">Кур'єрська доставка</span></p>
                                @if($order['delivery_address'])
                                    <p class="text-sm">{{ $order['delivery_address'] }}</p>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Order Items --}}
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Склад замовлення</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b-2 border-gray-200">
                                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Послуга</th>
                                    <th class="text-center py-3 px-4 text-sm font-semibold text-gray-700">Тип</th>
                                    <th class="text-center py-3 px-4 text-sm font-semibold text-gray-700">Кількість</th>
                                    <th class="text-right py-3 px-4 text-sm font-semibold text-gray-700">Ціна</th>
                                    <th class="text-right py-3 px-4 text-sm font-semibold text-gray-700">Сума</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order['items'] as $item)
                                    <tr class="border-b border-gray-100">
                                        <td class="py-4 px-4">
                                            <div class="font-semibold text-gray-800">{{ $item['service_name'] }}</div>
                                            <div class="text-sm text-gray-500">{{ $item['category_name'] }}</div>
                                        </td>
                                        <td class="text-center py-4 px-4 text-sm text-gray-600">
                                            {{ $item['cleaning_type'] === 'individual' ? 'Індивідуальна' : 'Потокова' }}
                                        </td>
                                        <td class="text-center py-4 px-4 text-sm text-gray-600">
                                            {{ $item['quantity'] }}
                                        </td>
                                        <td class="text-right py-4 px-4 text-sm text-gray-600">
                                            {{ number_format($item['price'], 0, ',', ' ') }}₴
                                        </td>
                                        <td class="text-right py-4 px-4 font-semibold text-gray-800">
                                            {{ number_format($item['total'], 0, ',', ' ') }}₴
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="border-t-2 border-gray-200">
                                    <td colspan="4" class="text-right py-4 px-4 text-xl font-semibold text-gray-800">
                                        Разом:
                                    </td>
                                    <td class="text-right py-4 px-4 text-2xl font-bold text-primary">
                                        {{ number_format($order['total'], 0, ',', ' ') }}₴
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                {{-- Fun Message from Raccoons --}}
                <div class="bg-gradient-to-r from-primary/10 via-secondary/10 to-primary/10 rounded-xl p-6 border-2 border-primary/20">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 text-4xl">🦝</div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">Від наших єнотиків:</h4>
                            <p class="text-gray-700 leading-relaxed">
                                Наші старанні єнотики вже працюють над вашим замовленням! 
                                Вони перевіряють кожну деталь, щоб ваше одяг та текстиль отримали найкращу обробку. 
                                Ми обов'язково зв'яжемося з вами найближчим часом для підтвердження та узгодження деталей.
                            </p>
                            <p class="text-gray-700 mt-3 font-semibold">
                                Дякуємо, що обрали нас! 🙏
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a 
                    href="{{ route('services') }}"
                    class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gray-100 text-gray-800 rounded-lg font-semibold hover:bg-gray-200 transition-colors duration-300">
                    <i class="fas fa-arrow-left"></i>
                    <span>Повернутись до послуг</span>
                </a>
                <a 
                    href="/"
                    class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-primary text-white rounded-lg font-semibold hover:bg-primary/90 transition-colors duration-300">
                    <i class="fas fa-home"></i>
                    <span>На головну</span>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    function downloadInvoice() {
        // Open invoice PDF in new window for printing/downloading
        const orderId = '{{ $order['id'] }}';
        const printWindow = window.open(`/invoice/${orderId}/download`, '_blank');
        
        // Wait for window to load, then trigger print
        if (printWindow) {
            printWindow.onload = function() {
                setTimeout(function() {
                    printWindow.print();
                }, 500);
            };
        }
    }
        
        // Add some fun animation on load
        document.addEventListener('DOMContentLoaded', function() {
            const successRaccoon = document.querySelector('.relative.inline-block');
            if (successRaccoon) {
                successRaccoon.style.animation = 'none';
                setTimeout(() => {
                    successRaccoon.style.animation = 'bounce 1s ease-in-out';
                }, 100);
            }
        });
    </script>
    
    <style>
        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
    </style>
@endsection

