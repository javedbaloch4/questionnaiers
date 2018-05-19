<?php

// Home
Route::get('/','HomeController@index')->name('/');

// Sessions
Route::get('/login','SessionController@index')->name('login');
Route::post('/login','SessionController@store')->name('user.login');
Route::get('/logout','SessionController@logout')->name('logout');


// Questionnaires
Route::get('/questionnaires','QuestionnairesController@index')->name('questionnaires');
Route::get('/questionnaires/create','QuestionnairesController@create')->name('questionnaires.create');
Route::post('/questionnaires/store','QuestionnairesController@store')->name('questionnaires.store');

// Questions
Route::get('/questions/{id}/add','QuestionController@index')->name('question.add');
Route::post('/questions/store','QuestionController@store')->name('question.store');
