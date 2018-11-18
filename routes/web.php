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

    Route::get('/deleteProject/{projectId}', [
        'uses' => 'ProjectController@delete',
        'middleware' => 'roles',
        'roles'     => 'Admin'
    ])->name('deleteProject');

    Route::get('/new_project', [
        'uses' => 'ProjectController@newProject',
        'name' => 'project',
        'middleware' => 'roles',
        'roles'     => 'Admin'
    ])->name('project');

    Route::post('/newProjectStore', 'ProjectController@store')->name('newProject');
    Route::get('/newTasks/{id}', [
        'uses' => 'ProjectController@newTasks',
//        'middleware' => 'roles',
//        'roles'     => 'Admin'
    ])->name('newTasks');

    Route::get('/allusers', 'ProjectController@allusers')->name('allusers');

      Route::post('/store_task', 'ProjectController@storeTask');
    Route::get('/change_task_status/{id}', 'ProjectController@changeTaskStatus');
       Route::get('/get_all_tasks/{id}', 'ProjectController@getAllTasks');
    Route::get('/has_admin_rights', 'ProjectController@hasAdminPower');
});
