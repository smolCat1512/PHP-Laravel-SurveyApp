<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;
use App\Questionnaire;
use App\Answer;

class QuestionController extends Controller
{

    /*
    * Secure the set of pages to the admin.
    */
    public function __construct()
    {
       $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            // get all the questions
            $questions = Question::orderBy('created_at','desc')->paginate(2);            
            return view('admin/question')->with('questions', $questions);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $qests = Questionnaire::pluck('questionnaireId', 'title');

        // now we can return the data with the view
        return view('admin/questions/create', compact('qests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'question' => 'bail|required|unique:questions|min:8|max:150',
        ]);

            $question = new Question;
            $question->user_id()->auth()->user()->id;
            $question = Question::create($request->all());
            $question->questionnaire()->attach($request->input('questionnaire'));
            $question->save();

        return redirect('admin/question')->with('success', 'Question created!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        $questionnaire = Questionnaire::find($id);
        $answer = Answer::find($id);

        return view ('admin.questions.show')->with('question', $question)->with('questionnaire', $questionnaire)->with('answer', $answer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $question = Question::findOrFail($id);
        $questionnaire = Questionnaire::find($id);

        // Check for correct user
        if(auth()->user()->id !==$question->user_id) {
            return redirect('question')->with('error', 'Unauthorised page');
        }

        $question = Question::find($id);
        return view ('admin.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'question' => 'required',
        ]);

        $question = Question::findOrFail($id);
        $question->update($requrest->all());

        return redirect('admin/question')->with('success', 'Question edited!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $question = Question::find($id);

        // Check for correct user
        if(auth()->user()->id !==$question->user_id) {
            return redirect('question')->with('error', 'Unauthorised page');
        }

        $question = Question::find($id);
        $question->delete();
        return redirect('admin/question')->with('success', 'Question deleted!!');
    }
}
