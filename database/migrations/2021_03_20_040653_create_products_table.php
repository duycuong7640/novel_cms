<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->uuid('uuid')->unique();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('author_id')->nullable();
            $table->string('title');
            $table->string('title_short')->nullable();
            $table->string('title_alternate')->nullable();
            $table->string('slug');
            $table->bigInteger("category_id")->nullable();
            $table->string("category_multi")->nullable();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('thumbnail_root')->nullable();
            $table->string('url_mtlnovel_com')->nullable();

            $table->integer('rank')->default(0)->nullable();
            $table->integer('view')->default(0)->nullable();
            $table->integer('status')->default(1);
            $table->string('type', 20)->nullable();

            $table->integer('choose_1')->default(0)->nullable()->comment("1: Active 0: Blocked");
            $table->integer('choose_2')->default(0)->nullable()->comment("1: Active 0: Blocked");
            $table->integer('choose_3')->default(0)->nullable()->comment("1: Active 0: Blocked");
            $table->integer('choose_4')->default(0)->nullable()->comment("1: Active 0: Blocked");
            $table->integer('choose_5')->default(0)->nullable()->comment("1: Active 0: Blocked");

            $table->text('title_seo')->nullable();
            $table->text('meta_des')->nullable();
            $table->text('meta_key')->nullable();

            $table->timestamps();

            $table->index('user_id');
            $table->index('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
