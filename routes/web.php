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

Auth::routes();
Route::get('/new_invite/{name}/{email}/{project_id}', 'ProjectController@visitors')->name('invites');

Route::group([ 'middleware' => ['auth']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/deleteProject/{projectId}', 'ProjectController@delete')->name('deleteProject');

    Route::get('/new_project', 'ProjectController@newProject')->name('project');

    Route::post('/newProjectStore', 'ProjectController@store')->name('newProject');
    Route::get('/newTasks/{id}', 'ProjectController@newTasks')->name('newTasks');
});
