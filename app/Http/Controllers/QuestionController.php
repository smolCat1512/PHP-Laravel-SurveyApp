<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Import route model bindings as required
use App\Question;
use App\Questionnaire;

class QuestionController extends Controller
{
    /**
     * Show the form for creating a new questionnaire
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Questionnaire $questionnaire)
    {
        return view('question.create', compact('questionnaire'));
    }

    /**
     * Store a newly created resource in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Questionnaire $questionnaire)
    {
        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required',
        ]);

        $question = $questionnaire->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);

        return redirect('/questionnaires/'.$questionnaire->id);
    }

    /*
    *   Delete questionnaires function, also deletes questions, then redirects to path
    */
    public function destroy(Questionnaire $questionnaire, Question $question) 
    {
        $question->answers()->delete();
        $question->delete();

        return redirect($questionnaire->path());
    }

}
