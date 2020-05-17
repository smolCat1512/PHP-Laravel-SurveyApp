<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    // guarding fields so not mass assignable
    protected $guarded = [];

    // setting relationship - answer belong to a question
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    // setting relationship - answer has many responses
    public function responses()
    {
        return $this->hasMany(SurveyResponse::class);
    }
}
