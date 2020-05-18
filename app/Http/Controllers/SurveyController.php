<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Import for route model binding
use App\Questionnaire;
// import to allow export to excel
use Maatwebsite\Excel\Facades\Excel;
// import so mails can be sent on compeltion of survey
use App\Mail\SurveyMail;
use Illuminate\Support\Facades\Mail;

class SurveyController extends Controller
{
    /*
    *   Show function, bring in questionnaire and slug for use in url broswer
    *   bar, load all questionnaires questions, push view of survey show blade,
    *   with questionnaires
    */
    public function show(Questionnaire $questionnaire, $slug)
    {
        $questionnaire->load('questions.answers');

        return view('survey.show', compact('questionnaire'));
    }

    /*
    *   Store function, validate all fields as required, create a data object
    *   to push into survey table, create the responses for this table, then
    *   push back to respondents view/blade
    */
    public function store(Questionnaire $questionnaire)
    {
        $data = request()->validate([
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
            'survey.feedback' => 'required',
            'survey.email' => 'required',
        ]);

        $survey = $questionnaire->surveys()->create($data['survey']);
        $survey->responses()->createMany($data['responses']);

        Mail::to('shaunhalliday1512@gmail.com')->send(new SurveyMail());

        return redirect('respondents');
    }

    /*
    *   Tried to build in export to csv function but not pulling in correctly
    */
    // public function csv()
    // {
    //     $questionnaire - Questionnaire::all();

    //     // Generate and return the spreadsheet
    //     Excel::create('questionnaires', function ($excel) use ($questionnaire) {

    //         // Build the spreadsheet, passing in the users array
    //         $excel->sheet('sheet1', function ($sheet) use ($questionnaire) {
    //             $sheet->fromArray($questionnaire);
    //         });

    //     })->download('xlsx');
    // }
}
