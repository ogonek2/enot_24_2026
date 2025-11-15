<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique()->comment('Уникальный ID заказа (ENOT-YYYYMMDD-XXXXX)');
            $table->string('name')->comment('Ім\'я клієнта');
            $table->string('phone', 20)->comment('Телефон клієнта');
            $table->enum('delivery_method', ['self', 'courier'])->comment('Спосіб отримання');
            $table->unsignedBigInteger('pickup_location_id')->nullable()->comment('ID пункту самовивозу');
            $table->text('delivery_address')->nullable()->comment('Адреса доставки');
            $table->json('items')->comment('Товари замовлення (JSON)');
            $table->decimal('total', 10, 2)->comment('Загальна сума замовлення');
            $table->enum('status', ['new', 'processing', 'completed', 'cancelled'])->default('new')->comment('Статус замовлення');
            $table->text('notes')->nullable()->comment('Примітки');
            $table->timestamps();
            
            // Внешний ключ для pickup_location_id
            $table->foreign('pickup_location_id')->references('id')->on('locations')->onDelete('set null');
            
            // Индексы для быстрого поиска
            $table->index('order_id');
            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
