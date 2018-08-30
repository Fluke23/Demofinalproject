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
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//quiz
Route::get('/quiz/{subject_id?}','QuizController@index')->name('quiz.quizDetail'); //name use for redirect in update
Route::get('/quiz/addQuiz/{subject_id?}','QuizController@create')->name('addQuiz');
Route::post('/quiz/saveQuiz/{subject_id?}','QuizController@store');
Route::get('/quiz/editQuiz/{subject_id?}','QuizController@edit');
Route::post('/quiz/updateQuiz','QuizController@update');
Route::get('/quiz/deleteQuiz/{id?}/{subject_id?}','QuizController@destroy');



//subject
Route::get('/subject','SubjectController@index')->name('subject.index'); //name for reditect in update 
Route::get('/subject/addSubject','SubjectController@create');
Route::post('/subject/saveSubject','SubjectController@store');
Route::get('/subject/editSubject/{id?}','SubjectController@edit');
Route::post('/subject/updateSubject','SubjectController@update');
Route::get('/subject/deleteSubject/{id?}','SubjectController@destroy');


//question 
Route::get('/question/{id?}','QuestionController@index')->name('question.index'); //name for reditect in update
Route::get('/question/blankQuestion/{id?}','QuestionController@callBlankQuestion');
Route::get('/question/shortAnswer/{id?}','QuestionController@callShortAnswerQuesstion');
Route::get('/question/UploadQuestion/{id?}','QuestionController@callUploadFileQuesstion');

// Multiple Choice
// Route::get('/multiple','MultipleChoiceController@index')->name('multiple.index');
// Route::get('/multipleChoice/addMultipleChoice','MultipleChoiceController@create');


//blankQuestion
Route::get('/blankQuestion','blankQuestionController@showUploadForms')->name('blankQuestion.file');
Route::post ('/blankQuestion','blankQuestionController@storeFiles') ;
Route::post('/blankQuestion/submit','blankQuestionController@submit');

//shortanswer
Route::get('/shortAnswer','shortAnswerQuestionController@showUploadForms')->name('shortAnswer.file');
Route::post ('/shortAnswer','shortAnswerQuestionController@storeFiles') ;
Route::post('/shortAnswer/submit','shortAnswerQuestionController@submit');

//uploadQuestion
Route::get('/UploadQuestion','UploadQuestionController@showUploadForms')->name('UploadQuestion.file');
Route::post ('/UploadQuestion','UploadQuestionController@storeFiles') ;
Route::post('/UploadQuestion/submit','UploadQuestionController@submit');







