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
        Schema::create('authors', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->uuid('uuid')->unique();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->text('content')->nullable();
            $table->integer('rank')->default(0)->nullable();
            $table->string('type', 20)->nullable()->comment("Type of author");
            $table->integer('status')->default(1)->comment("1: Active 0: Blocked");

            $table->text('title_seo')->nullable();
            $table->text('meta_des')->nullable();
            $table->text('meta_key')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
