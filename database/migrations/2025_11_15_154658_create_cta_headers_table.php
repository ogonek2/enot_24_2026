<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCtaHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cta_headers', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable()->comment('Путь к иконке');
            $table->string('title')->comment('Название');
            $table->string('url')->comment('Ссылка');
            $table->string('subtitle')->comment('Сабтайтл');
            $table->integer('sort_order')->default(0)->comment('Порядок сортировки');
            $table->boolean('is_active')->default(true)->comment('Активен');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cta_headers');
    }
}
