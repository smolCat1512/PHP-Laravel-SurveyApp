<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    // guarding fields so not mass assignable
    protected $guarded = [];
    // setting relationship - Survey belong to a questionnaire
    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }
    //setting relationship - Survey has man survey responses
    public function responses() 
    {
        return $this->hasMany(SurveyResponse::class);
    }
}
