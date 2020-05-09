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
        return $this->belongsToMany('App\Questionnaire', 'foreign_key');
    }

    /**
     * Get the user associated with the given questionnaire
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function answer()
    {
        return $this->hasMany('App\Answer', 'foreign_key');
    }
}
