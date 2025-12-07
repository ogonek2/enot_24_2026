<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class MakeBannerNullableInDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Используем прямой SQL запрос для изменения столбца
        DB::statement('ALTER TABLE `discounts` MODIFY `banner` VARCHAR(255) NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Возвращаем обратно NOT NULL (но это может вызвать ошибку, если есть NULL значения)
        DB::statement('ALTER TABLE `discounts` MODIFY `banner` VARCHAR(255) NOT NULL');
    }
}
