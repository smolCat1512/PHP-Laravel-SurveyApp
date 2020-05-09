<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Questionnaire;

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
        return view('admin/questions/create');
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
            'question' => 'required',
        ]);

        $question = new Question;
        $question->user_id = auth()->user()->id;
        $question->question = $request->input('question');
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
        return view ('admin.questions.show')->with('question', $question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $question = Question::find($id);

        // Check for correct user
        if(auth()->user()->id !==$question->user_id) {
            return redirect('question')->with('error', 'Unauthorised page');
        }

        $question = Question::find($id);
        return view ('admin.questions.edit')->with('question', $question);
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

        $question = Question::find($id);
        $question->question = $request->input('question');
        $question->save();

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
