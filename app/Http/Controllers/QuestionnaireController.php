<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;


class QuestionnaireController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questionnaire.create');
    }

    /**
     * Store a newly created resource in storage.
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

    public function show(\App\Questionnaire $questionnaire)
    {

        $questionnaire->load('questions.answers.responses');
        
        return view('questionnaire.show', compact('questionnaire'));
    }

    /**
     * Show the form for editing a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questionnaire = Questionnaire::findOrFail($id);

        return view('questionnaire.edit', compact('questionnaire'));
    }

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
