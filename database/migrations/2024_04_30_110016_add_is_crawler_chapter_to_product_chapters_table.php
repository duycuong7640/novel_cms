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
            $table->boolean('is_crawler_chapter')->default(false)->after('view');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_chapters', function (Blueprint $table) {
            $table->dropColumn('is_crawler_chapter');
        });
    }
};
