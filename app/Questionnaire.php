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
     * Get the questions associated with the given questionnaire.
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function questions()
    {
        return $this->belongsToMany('App\Question');
    }

    /**
     * Get the user associated with the given questionnaire
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'questionnaire_user', 'user_id', 'questionnaire_id');
    }
}
