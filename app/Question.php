<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    // guarding fields so not mass assignable
    protected $guarded = [];
    // setting relationship - question belong to a questionnaire
    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }
    // setting relationship - question has many answers
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    // setting relationship - question has many survey responses
    public function responses()
    {
        return $this->hasMany(SurveyResponse::class);
    }

}
