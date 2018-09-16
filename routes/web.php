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

//Admin/quiz
Route::get('/Admin/quiz/{subject_id?}','QuizController@index')->name('quiz.quizDetail'); //name use for redirect in update
Route::get('/Admin/quiz/addQuiz/{subject_id?}','QuizController@create')->name('addQuiz');
Route::post('/Admin/quiz/saveQuiz/{subject_id?}','QuizController@store');
Route::get('/Admin/quiz/editQuiz/{subject_id?}','QuizController@edit');
Route::post('/Admin/quiz/updateQuiz','QuizController@update');
Route::get('/Admin/quiz/deleteQuiz/{id?}/{subject_id?}','QuizController@destroy');



//Admin/subject
Route::get('/Admin/subject','SubjectController@index')->name('subject.index'); //name for reditect in update 
Route::get('/Admin/subject/addSubject','SubjectController@create');
Route::post('/Admin/subject/saveSubject','SubjectController@store');
Route::get('/Admin/subject/editSubject/{id?}','SubjectController@edit');
Route::post('/Admin/subject/updateSubject','SubjectController@update');
Route::get('/Admin/subject/deleteSubject/{id?}','SubjectController@destroy');


//Admin/question 
Route::get('/Admin/question/{id?}','QuestionController@index')->name('question.index'); //name for reditect in update
Route::get('/Admin/question/blankQuestion/{id?}','QuestionController@callBlankQuestion');
Route::get('/Admin/question/shortAnswer/{id?}','QuestionController@callShortAnswerQuesstion');
Route::get('/Admin/question/UploadQuestion/{id?}','QuestionController@callUploadFileQuesstion');

// Multiple Choice
// Route::get('/multiple','MultipleChoiceController@index')->name('multiple.index');
// Route::get('/multipleChoice/addMultipleChoice','MultipleChoiceController@create');


//Admin/blankQuestion
Route::get('/Admin/blankQuestion','blankQuestionController@showUploadForms')->name('blankQuestion.file');
Route::post ('/Admin/blankQuestion','blankQuestionController@storeFiles') ;
Route::post('/Admin/blankQuestion/submit','blankQuestionController@submit');

//Admin/shortanswer
Route::get('/Admin/shortAnswer','shortAnswerQuestionController@showUploadForms')->name('shortAnswer.file');
Route::post ('/Admin/shortAnswer','shortAnswerQuestionController@storeFiles') ;
Route::post('/Admin/shortAnswer/submit','shortAnswerQuestionController@submit');

//Admin/uploadQuestion
Route::get('/Admin/UploadQuestion','UploadQuestionController@showUploadForms')->name('UploadQuestion.file');
Route::post ('/Admin/UploadQuestion','UploadQuestionController@storeFiles') ;
Route::post('/Admin/UploadQuestion/submit','UploadQuestionController@submit');







