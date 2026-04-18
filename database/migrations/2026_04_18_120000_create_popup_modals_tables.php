<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePopupModalsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popup_modals', function (Blueprint $table) {
            $table->id();
            $table->string('admin_title');
            $table->string('desktop_banner')->nullable();
            $table->string('mobile_banner')->nullable();
            $table->string('form_title')->nullable();
            $table->string('form_subtitle')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            /** Затримка від завантаження сторінки до першого показу (лише для першого вікна в черзі за день) */
            $table->unsignedInteger('delay_before_show_seconds')->default(3);
            /** Пауза після закриття цього вікна до показу наступного в черзі за той самий день */
            $table->unsignedInteger('seconds_after_close_until_next')->default(300);
            $table->timestamps();
        });

        Schema::create('popup_modal_dates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('popup_modal_id')->constrained('popup_modals')->onDelete('cascade');
            $table->date('show_date');
            $table->timestamps();

            $table->unique(['popup_modal_id', 'show_date'], 'popup_modal_dates_unique_modal_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('popup_modal_dates');
        Schema::dropIfExists('popup_modals');
    }
}
