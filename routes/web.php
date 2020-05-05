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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/login', function(){
  return view ('auth.login');
});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
  Auth::routes();

  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/admin', 'QuestionnaireController@index')->name('admin');
  Route::get('/admin/questionnaire', function() {
    return view('admin.questionnaire');
  });
  Route::get('/admin/question', function() {
    return view('admin.question');
  });
  Route::get('/admin/answer', function() {
    return view('admin.answer');
  });
  Route::get('/admin/questionnaires/create', function() {
    return view('admin.questionnaires.create');
  });
  Route::get('/admin/questions/create', function() {
    return view('admin.questions.create');
  });
  Route::get('/admin/answers/create', function() {
    return view('admin.answers.create');
  });
  Route::resource('/admin/answer', 'AnswerController');
  Route::resource('/admin/questionnaire', 'QuestionnaireController');
  Route::resource('/admin/question', 'QuestionController');
  Route::resource('/questionnaires/create', 'QuestionnaireController');
  Route::resource('/questions/create', 'QuestionController');
  Route::resource('/answers/create', 'AnswerController');

});


