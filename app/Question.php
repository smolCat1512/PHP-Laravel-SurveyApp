<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function questionnaires()
    {
        return $this->belongsToMany('App\Questionnaire');
    }
}
