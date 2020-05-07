<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionQuestionnaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_questionnaire', function (Blueprint $table) {
            $table->unsignedBigInteger('question_id')->unsigned();
            $table->unsignedBigInteger('questionnaire_id')->unsigned();
            $table->foreign('question_id')->references('questionId')->on('questions')->onDelete('cascade');
            $table->foreign('questionnaire_id')->references('questionnaireId')->on('questionnaires')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_questionnaire');
    }
}
