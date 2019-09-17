<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            // 'id' field on products table
            $table->bigInteger('product_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('slug')->unique();

            // Field is used to get correct translation.
            $table->string('anchor')->nullable();

            $table->unique(['product_id', 'locale']);
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_translations');
    }
}
