<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    
    protected $fillable = [
        'question',
    ];

    protected $primaryKey = 'questionId';
    

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function questionnaire()
    {
        return $this->belongsTo('App\Questionnaire');
    }

    public function answer()
    {
        return $this->hasMany('App\Answer');
    }
}
