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
        Schema::create('photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();
            $table->bigInteger('user_id')->nullable();
            $table->string('title', 100)->nullable();
            $table->string('link', 255)->nullable();
            $table->string('thumbnail', 100)->nullable();
            $table->integer('rank')->default(0)->nullable();
            $table->string('type', 20)->nullable();
            $table->integer('status')->default(1)->comment("1: Active 0: Blocked");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};
