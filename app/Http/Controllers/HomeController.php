<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance with auth binding
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    *   Index function, checks auth so only logged in users questionnaires returned, 
    *   then points to the blade bringing in the questionnaires
    */
    public function index()
    {
        $questionnaires = auth()->user()->questionnaires;

        return view('home', compact('questionnaires'));
    }
}
