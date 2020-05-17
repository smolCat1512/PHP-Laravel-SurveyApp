<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Import for route model binding
use App\Questionnaire;


class QuestionnaireController extends Controller
{
    /*
    *   Create a new controller instance with auth binding
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new questionnaire
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questionnaire.create');
    }

    /**
     * Store a newly created questionnaire in storage, validate input as required,
     * allocate authorised user login to questionnaire and redirect
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => 'required',
            'ethics' => 'required',
        ]);

        $questionnaire = auth()->user()->questionnaires()->create($data);
    
        return redirect('/questionnaires/'.$questionnaire->id);
    }

    /*
    *   Show function, load all the questionnaire, its questions and answers,
    *   then push view with quesionnaires
    */
    public function show(\App\Questionnaire $questionnaire)
    {

        $questionnaire->load('questions.answers.responses');
        
        return view('questionnaire.show', compact('questionnaire'));
    }

    /**
     * Show the form for editing a questionnaire
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questionnaire = Questionnaire::findOrFail($id);

        return view('questionnaire.edit', compact('questionnaire'));
    }

    /*
    *   Update function, once edit carried out on form subsmission calls this method,
    *   validates input, finds questionnaire id, updates all items of questionnaire
    *   and redirects to home
    */
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'title' => 'required',
            'ethics' => 'required',
        ]);

        $questionnaire = Questionnaire::findOrFail($id);

        $questionnaire->update($request->all());

        return redirect('/home');
    }
}
