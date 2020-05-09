<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
use App\User;

class QuestionnaireController extends Controller
{

    /*
    * Secure the set of pages to the admin.
    */
    public function __construct()
    {
       $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            // get all the questionnaires
            $questionnaires = Questionnaire::orderBy('created_at','desc')->paginate(2);            
            return view('admin/questionnaire')->with('questionnaires', $questionnaires);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/questionnaires/create');
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

        $questionnaire = new Questionnaire;
        $questionnaire->user_id = auth()->user()->id;
        $questionnaire->title = $request->input('title');
        $questionnaire->ethics = $request->input('ethics');
        $questionnaire->save();

        return redirect('admin/questionnaire')->with('success', 'Questionnaire created!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questionnaire = Questionnaire::find($id);
        return view ('admin.questionnaires.show')->with('questionnaire', $questionnaire);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questionnaire = Questionnaire::find($id);

        // Check for correct user
        if(auth()->user()->id !==$questionnaire->user_id) {
            return redirect('questionnaire')->with('error', 'Unauthorised page');
        }
        
        $questionnaire = Questionnaire::find($id);
        return view ('admin.questionnaires.edit')->with('questionnaire', $questionnaire);
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
            'title' => 'required',
            'ethics' => 'required',
        ]);

        $questionnaire = Questionnaire::find($id);
        $questionnaire->title = $request->input('title');
        $questionnaire->ethics = $request->input('ethics');
        $questionnaire->save();

        return redirect('admin/questionnaire')->with('success', 'Questionnaire edited!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // Check for correct user
        if(auth()->user()->id !==$questionnaire->user_id) {
            return redirect('questionnaire')->with('error', 'Unauthorised page');
        }

        $questionnaire = Questionnaire::find($id);
        $questionnaire->delete();
        return redirect('admin/questionnaire')->with('success', 'Questionnaire deleted!!');
    }
}
