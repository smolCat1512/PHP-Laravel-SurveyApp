<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Import for route model binding
use App\Questionnaire;

class RespondentsController extends Controller
{
    /*
    *   Index function, calls all questionnaires from class, then returns
    *   view of respondents with questionnaires
    */
    public function index()
    {
        $questionnaires = Questionnaire::all();

        return view('respondents', compact('questionnaires'));
    }

    /*
    *   Showw function, loads all the questionnaires questions, answers and
    *   response options, pushes the view of questionnaire show function
    */
    public function show(\App\Questionnaire $questionnaire)
    {

        $questionnaire->load('questions.answers.responses');
        
        return view('questionnaire.show', compact('questionnaire'));
    }
}
