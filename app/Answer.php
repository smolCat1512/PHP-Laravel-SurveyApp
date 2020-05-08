<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';

    protected $fillable = [
        'answer',
    ];

    protected $primaryKey = 'answerId';


    public function questionnaires()
    {
        return $this->belongsToMany('App\Questionnaire');
    }

    public function questions()
    {
        return $this->belongsToMany('App\Question');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
