<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Questionnaire extends Model
{
    // path function, so can just call easier in blades
    public function path()
    {
        return url('/questionnaires/' . $this->id);
    }
    // public path function, so non logged in users can access in respondents area via
    // the weblink
    public function publicPath() 
    {
        return url('/surveys/'.$this->id. '-'. Str::slug($this->title));
    }
    // guarding fields so not mass assignable
    protected $guarded = [];
    // setting relationship - questionnaire belong to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // setting relationship - questionnaire has many questions
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    // setting relationship - questionnaire has many surveys
    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }
}
