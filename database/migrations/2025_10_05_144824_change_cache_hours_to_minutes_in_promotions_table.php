<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCacheHoursToMinutesInPromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('promotions', function (Blueprint $table) {
            // Добавляем новое поле modal_cache_minutes
            $table->integer('modal_cache_minutes')->default(1440)->after('show_in_modal');
        });
        
        // Копируем данные из modal_cache_hours в modal_cache_minutes (умножаем на 60)
        DB::statement('UPDATE promotions SET modal_cache_minutes = modal_cache_hours * 60 WHERE modal_cache_hours IS NOT NULL');
        
        Schema::table('promotions', function (Blueprint $table) {
            // Удаляем старое поле modal_cache_hours
            $table->dropColumn('modal_cache_hours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('promotions', function (Blueprint $table) {
            // Возвращаем обратно modal_cache_minutes в modal_cache_hours
            $table->renameColumn('modal_cache_minutes', 'modal_cache_hours');
        });
    }
}
