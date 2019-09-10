<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            // 'id' field on overall_information table
            $table->bigInteger('category_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name')->nullable();

            // Field is used to get correct translation.
            $table->string('anchor')->nullable();

            $table->unique(['category_id', 'locale']);
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_translations');
    }
}
