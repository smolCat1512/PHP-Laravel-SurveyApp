<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionnaireUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaire_user', function (Blueprint $table) {
            $table->unsignedBigInteger('questionnaire_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('questionnaire_id')->references('questionnaireId')->on('questionnaires')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionnaire_user');
    }
}
