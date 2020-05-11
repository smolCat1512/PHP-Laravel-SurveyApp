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
    

    public function questionnaire()
    {
        return $this->belongsToMany(Questionnaire::class);
    }

    /**
     * Get the user associated with the given questionnaire
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answer()
    {
        return $this->hasMany(Answer::class);
    }
}
