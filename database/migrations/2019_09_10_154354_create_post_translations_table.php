<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            // 'id' field on characteristics table
            $table->integer('post_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title')->nullable();
            $table->string('brief')->nullable();
            $table->text('text')->nullable();
            $table->string('slug')->unique();

            // Field is used to get correct translation.
            $table->string('anchor')->nullable();

            $table->unique(['post_id', 'locale']);
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
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
        Schema::dropIfExists('post_translations');
    }
}
