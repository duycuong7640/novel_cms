<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('product_chapters', function (Blueprint $table) {
            $table->boolean('is_content_null')->default(false)->after('is_crawler_chapter');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_chapters', function (Blueprint $table) {
            $table->dropColumn('is_content_null');
        });
    }
};
