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

Auth::routes();

Route::namespace('Web')->name('web.')->middleware(['auth'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('users', 'UsersController')->except([
            'edit', 'update'
        ]);
        Route::resource('levels', 'LevelsController')->except([
            'show', 'create'
        ]);
        Route::resource('question_types', 'QuestionTypesController')->except([
            'show',
        ]);
    });
    Route::resource('questions', 'QuestionsController', ['except' => ['show']])->except([
        'show'
    ]);;
});
