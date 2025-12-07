<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

/**
 * FeedbackController
 * 
 * Для настройки Telegram уведомлений добавьте в файл .env:
 * TELEGRAM_BOT_TOKEN=ваш_токен_бота
 * TELEGRAM_CHAT_ID=ваш_id_группы
 * TELEGRAM_ENABLED=true
 */

class FeedbackController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string|max:1000',
            'source' => 'nullable|string|max:50',
        ], [
            'name.required' => 'Ім\'я є обов\'язковим полем',
            'name.max' => 'Ім\'я не може перевищувати 255 символів',
            'phone.required' => 'Номер телефону є обов\'язковим полем',
            'phone.max' => 'Номер телефону не може перевищувати 20 символів',
            'message.max' => 'Повідомлення не може перевищувати 1000 символів',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Determine form type based on request
            $formType = $this->determineFormType($request);
            
            // Send notification to Telegram
            $this->sendTelegramNotification($request->name, $request->phone, $request->message, $formType, $request->source);

            return response()->json([
                'success' => true,
                'message' => 'Дякуємо! Ми зв\'яжемося з вами найближчим часом.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Виникла помилка при відправці повідомлення. Спробуйте пізніше.'
            ], 500);
        }
    }

    /**
     * Determine form type based on request
     */
    private function determineFormType($request)
    {
        // Check if it's from promotion modal
        if ($request->has('source') && $request->source === 'promotion_modal') {
            return 'promotion_modal';
        }
        
        // Check if it's consultation form (has name_fd field)
        if ($request->has('name_fd')) {
            return 'consultation';
        }
        
        // Check if it's courier form (has message field and specific structure)
        if ($request->has('message') && !$request->has('name_fd')) {
            return 'courier';
        }
        
        // Default to feedback form
        return 'feedback';
    }

    /**
     * Send notification to Telegram
     */
    private function sendTelegramNotification($name, $phone, $message, $formType = 'feedback', $source = null)
    {
        // Check if Telegram notifications are enabled
        if (!config('telegram.enabled', true)) {
            return;
        }
        
        $botToken = config('telegram.bot_token');
        $chatId = config('telegram.chat_id');
        
        // Different messages for different form types
        $formTitles = [
            'feedback' => "🆕 *Нове повідомлення зворотнього зв'язку*",
            'consultation' => "📞 *Заявка на консультацію*",
            'courier' => "🚚 *Заявка на консультацію*",
            'promotion_modal' => "🎁 *Заявка з модального вікна акції*"
        ];
        
        $text = $formTitles[$formType] . "\n\n";
        $text .= "👤 *Ім'я:* " . $name . "\n";
        $text .= "📞 *Телефон:* " . $phone . "\n";
        
        if (!empty($message)) {
            $text .= "💬 *Повідомлення:* " . $message . "\n";
        }
        
        $text .= "\n⏰ *Час:* " . now()->format('d.m.Y H:i:s');
        
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
            \Log::error('Telegram notification failed', [
                'http_code' => $httpCode,
                'curl_error' => $curlError,
                'response' => $result
            ]);
            throw new \Exception('Failed to send Telegram notification: ' . $curlError);
        }
        
        return $result;
    }
}
