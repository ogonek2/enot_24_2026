<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Інвойс {{ $order['id'] }}</title>
    <script>
        // Auto print/download when page loads
        window.onload = function() {
            setTimeout(function() {
                window.print();
            }, 500);
        };
    </script>
    <style>
        @page {
            margin: 20mm;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            line-height: 1.6;
            color: #333;
        }
        
        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #7470BF;
        }
        
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #7470BF;
        }
        
        .invoice-title {
            text-align: right;
        }
        
        .invoice-title h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 5px;
        }
        
        .invoice-title p {
            color: #666;
        }
        
        .info-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        
        .info-box {
            flex: 1;
            margin-right: 20px;
        }
        
        .info-box:last-child {
            margin-right: 0;
        }
        
        .info-box h3 {
            font-size: 14px;
            color: #7470BF;
            margin-bottom: 10px;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }
        
        .info-box p {
            margin: 5px 0;
            font-size: 11px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        
        thead {
            background-color: #f8f9fa;
        }
        
        th {
            padding: 12px;
            text-align: left;
            font-weight: bold;
            border-bottom: 2px solid #7470BF;
            color: #333;
        }
        
        td {
            padding: 10px 12px;
            border-bottom: 1px solid #eee;
        }
        
        tbody tr:hover {
            background-color: #f8f9fa;
        }
        
        .text-right {
            text-align: right;
        }
        
        .text-center {
            text-align: center;
        }
        
        .total-row {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        
        .total-row td {
            padding: 15px 12px;
            font-size: 14px;
        }
        
        .total-amount {
            font-size: 18px;
            color: #7470BF;
        }
        
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #eee;
            text-align: center;
            font-size: 10px;
            color: #666;
        }
        
        .raccoon-message {
            background-color: #f0f0f0;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            border-left: 4px solid #7470BF;
        }
        
        .raccoon-message p {
            margin: 5px 0;
            font-style: italic;
        }
        
        @media print {
            body {
                font-size: 11px;
            }
            
            .invoice-container {
                padding: 0;
            }
            
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        {{-- Header --}}
        <div class="header">
            <div class="logo">
                🦝 ЄНОТ 24
            </div>
            <div class="invoice-title">
                <h1>Інвойс</h1>
                <p>Номер: {{ $order['id'] }}</p>
                <p>Дата: {{ $order['created_at'] }}</p>
            </div>
        </div>

        {{-- Customer & Delivery Info --}}
        <div class="info-section">
            <div class="info-box">
                <h3>Інформація про замовника</h3>
                <p><strong>Ім'я:</strong> {{ $order['name'] }}</p>
                <p><strong>Телефон:</strong> {{ $order['phone'] }}</p>
            </div>
            <div class="info-box">
                <h3>Спосіб отримання</h3>
                @if($order['delivery_method'] === 'self')
                    <p><strong>Самовивіз</strong></p>
                    @if($order['pickup_location'])
                        <p>{{ $order['pickup_location']['street'] }}</p>
                        <p>{{ $order['pickup_location']['city'] }}</p>
                        @if($order['pickup_location']['working_hours'])
                            <p>{{ $order['pickup_location']['working_hours'] }}</p>
                        @endif
                    @endif
                @else
                    <p><strong>Кур'єрська доставка</strong></p>
                    @if($order['delivery_address'])
                        <p>{{ $order['delivery_address'] }}</p>
                    @endif
                @endif
            </div>
        </div>

        {{-- Order Items --}}
        <table>
            <thead>
                <tr>
                    <th>Послуга</th>
                    <th class="text-center">Тип</th>
                    <th class="text-center">Кількість</th>
                    <th class="text-right">Ціна за од.</th>
                    <th class="text-right">Сума</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order['items'] as $item)
                    <tr>
                        <td>
                            <strong>{{ $item['service_name'] }}</strong><br>
                            <small style="color: #666;">{{ $item['category_name'] }}</small>
                        </td>
                        <td class="text-center">{{ $item['cleaning_type'] === 'individual' ? 'Індивідуальна' : 'Потокова' }}</td>
                        <td class="text-center">{{ $item['quantity'] }}</td>
                        <td class="text-right">{{ number_format($item['price'], 0, ',', ' ') }}₴</td>
                        <td class="text-right"><strong>{{ number_format($item['total'], 0, ',', ' ') }}₴</strong></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="total-row">
                    <td colspan="4" class="text-right">Разом:</td>
                    <td class="text-right total-amount">{{ number_format($order['total'], 0, ',', ' ') }}₴</td>
                </tr>
            </tfoot>
        </table>

        {{-- Raccoon Message --}}
        <div class="raccoon-message">
            <p><strong>🦝 Від наших єнотиків:</strong></p>
            <p>Дякуємо за ваше замовлення! Наші старанні єнотики вже працюють над обробкою вашого одягу та текстилю.</p>
            <p style="margin-top: 10px;">Ми обов'язково зв'яжемося з вами найближчим часом!</p>
        </div>

        {{-- Footer --}}
        <div class="footer">
            <p>Екочистка одягу та домашнього текстилю "ЄНОТ 24"</p>
            <p>Цей документ є підтвердженням вашого замовлення</p>
        </div>
    </div>
</body>
</html>

