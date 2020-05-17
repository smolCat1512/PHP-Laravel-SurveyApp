<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
*   Routes open to all users
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/respondents', 'RespondentsController@index');
Route::get('/home', 'HomeController@index')->name('home');

/*
* Authorised area routes - must be a logged in user to access these routes
*/
Auth::routes();
Route::group(['middleware' => ['web']], function() {
// Questionnaire routes for methods so pointing to correct controllers/methods
Route::get('/questionnaires/create', 'QuestionnaireController@create');
Route::post('/questionnaires', 'QuestionnaireController@store');
Route::get('/questionnaires/{questionnaire}', 'QuestionnaireController@show');
Route::get('/questionnaire/{questionnaire}/edit', 'QuestionnaireController@edit');
Route::patch('/questionnaires/{questionnaire}', 'QuestionnaireController@update');

// Question routes for methods so pointing to correct controllers/methods
Route::get('/questionnaires/{questionnaire}/questions/create', 'QuestionController@create');
Route::post('/questionnaires/{questionnaire}/questions', 'QuestionController@store');
Route::delete('/questionnaires/{questionnaire}/questions/{question}', 'QuestionController@destroy');

// Survey routes for methods so pointing to correct controllers/methods
Route::get('/surveys/{questionnaire}-{slug}', 'SurveyController@show');
Route::post('/surveys/{questionnaire}-{slug}', 'SurveyController@store');
});
