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


    public function questionnaires()
    {
        return $this->belongsToMany('App\Questionnaire');
    }

    /**
     * Get the answers associated with the given question.
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function answers()
    {
        return $this->belongsToMany('App\Question');
    }

    /**
     * Get the user associated with the given question
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
