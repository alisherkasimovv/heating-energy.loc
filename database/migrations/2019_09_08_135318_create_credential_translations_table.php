<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCredentialTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credential_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            // 'id' field on overall_information table
            $table->bigInteger('credential_id')->unsigned();
            $table->string('locale')->index();

            $table->string('company_name')->nullable()->default('Heating Energy');
            $table->string('company_address')->nullable();

            $table->string('company_info_brief')->nullable();
            $table->string('company_info_full')->nullable();

            // Field is used to get correct translation.
            $table->string('anchor')->nullable();

            $table->unique(['credential_id', 'locale']);
            $table->foreign('credential_id')
                ->references('id')
                ->on('credentials')
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
        Schema::dropIfExists('credential_translations');
    }
}
