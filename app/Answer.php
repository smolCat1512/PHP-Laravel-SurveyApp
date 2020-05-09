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

    /**
     * Get the user associated with the given questionnaire
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the user associated with the given questionnaire
     *
     * @return mixed
     */
    public function question()
    {
        return $this->belongsTo('App\Question');
    }

}
