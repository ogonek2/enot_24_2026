<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icons', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('Назва іконки');
            $table->string('file_path')->comment('Шлях до файлу іконки');
            $table->string('file_name')->comment('Ім\'я файлу');
            $table->string('mime_type')->nullable()->comment('Тип файлу (image/svg+xml, image/png, etc.)');
            $table->integer('file_size')->nullable()->comment('Розмір файлу в байтах');
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
        Schema::dropIfExists('icons');
    }
}
