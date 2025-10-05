<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddModalFieldsToPromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('promotions', function (Blueprint $table) {
            $table->boolean('show_in_modal')->default(false)->after('is_active');
            $table->integer('modal_cache_minutes')->default(1440)->after('show_in_modal');
            $table->string('modal_title')->nullable()->after('modal_cache_minutes');
            $table->text('modal_description')->nullable()->after('modal_title');
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
            $table->dropColumn(['show_in_modal', 'modal_cache_minutes', 'modal_title', 'modal_description']);
        });
    }
}
