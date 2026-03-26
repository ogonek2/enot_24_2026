<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('blog_posts', 'tables_html')) {
            Schema::table('blog_posts', function (Blueprint $table) {
                $table->dropColumn('tables_html');
            });
        }
    }

    public function down(): void
    {
        if (! Schema::hasColumn('blog_posts', 'tables_html')) {
            Schema::table('blog_posts', function (Blueprint $table) {
                $table->longText('tables_html')->nullable()->after('content');
            });
        }
    }
};
