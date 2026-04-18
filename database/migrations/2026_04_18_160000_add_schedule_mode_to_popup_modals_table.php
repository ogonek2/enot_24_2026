<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddScheduleModeToPopupModalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('popup_modals', function (Blueprint $table) {
            $table->string('schedule_mode', 32)
                ->default('specific_dates')
                ->after('is_active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('popup_modals', function (Blueprint $table) {
            $table->dropColumn('schedule_mode');
        });
    }
}
