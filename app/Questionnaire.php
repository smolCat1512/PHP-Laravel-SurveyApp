<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $table = 'questionnaires';

    protected $fillable = [
        'title',
        'ethics',
    ];

    protected $primaryKey = 'questionnaireId';
    
    /**
     * Get the user associated with the given questionnaire
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function answer()
    {
        return $this->hasMany(Answer::class);
    }
}
