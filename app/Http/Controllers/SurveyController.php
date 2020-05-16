<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Questionnaire;

class SurveyController extends Controller
{
    
    public function show(Questionnaire $questionnaire, $slug)
    {
        return view('survey.show', compact('questionnaire'));
    }
}
