<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    // guarding fields so not mass assignable
    protected $guarded = [];
    // setting relationship - survey response belongs to a survey
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
