<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTextColorsToDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('discounts', function (Blueprint $table) {
            $table->string('text_color', 7)->nullable()->after('color')->comment('Цвет текста названия акции в формате HEX');
            $table->string('discount_color', 7)->nullable()->after('text_color')->comment('Цвет текста скидки в формате HEX');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('discounts', function (Blueprint $table) {
            $table->dropColumn(['text_color', 'discount_color']);
        });
    }
}
