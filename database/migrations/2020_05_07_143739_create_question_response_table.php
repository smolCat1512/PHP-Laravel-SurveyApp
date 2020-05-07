<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionResponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_response', function (Blueprint $table) {
            $table->unsignedBigInteger('question_id')->unsigned();
            $table->unsignedBigInteger('response_id')->unsigned();
            $table->foreign('question_id')->references('questionId')->on('questions')->onDelete('cascade');
            $table->foreign('response_id')->references('id')->on('respondents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_response');
    }
}
