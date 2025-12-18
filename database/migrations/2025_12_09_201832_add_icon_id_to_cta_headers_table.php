<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIconIdToCtaHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cta_headers', function (Blueprint $table) {
            $table->unsignedBigInteger('icon_id')->nullable()->after('icon');
            $table->foreign('icon_id')->references('id')->on('icons')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cta_headers', function (Blueprint $table) {
            $table->dropForeign(['icon_id']);
            $table->dropColumn('icon_id');
        });
    }
}
