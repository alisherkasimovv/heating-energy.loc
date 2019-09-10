<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacteristicTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characteristic_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            // 'id' field on characteristics table
            $table->integer('characteristic_id')->unsigned();
            $table->string('locale')->index();

            $table->string('key')->nullable();
            $table->string('value')->nullable();

            // Field is used to get correct translation.
            $table->string('anchor')->nullable();

            $table->unique(['characteristic_id', 'locale']);
            $table->foreign('characteristic_id')
                ->references('id')
                ->on('characteristics')
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
        Schema::dropIfExists('characteristic_translations');
    }
}
