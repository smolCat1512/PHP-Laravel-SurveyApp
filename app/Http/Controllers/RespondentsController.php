<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Questionnaire;

class RespondentsController extends Controller
{
    public function index()
    {
        $questionnaires = Questionnaire::all();

        return view('respondents', compact('questionnaires'));
    }

    public function show(\App\Questionnaire $questionnaire)
    {

        $questionnaire->load('questions.answers.responses');
        
        return view('questionnaire.show', compact('questionnaire'));
    }
}
