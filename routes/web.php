<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');



//role management
Route::resource('role', 'RoleController');
Route::get('role/{role}/assign_permission', ['as' => 'role.assign.permission', 'uses' => 'RoleController@assign_permission']);
Route::patch('role/{role}/assign_permission', ['as' => 'role.update.permission', 'uses' => 'RoleController@update_permission']);
Route::patch('role/{role}/assign_permission/all', ['as' => 'role.update.all.permission', 'uses' => 'RoleController@updateAllPermission']);

Route::get('roles/export', ['as' => 'role.export' ,'uses' => 'RoleController@export']);

//user management
Route::resource('user', 'UserController');
Route::get('user/{user}/delete', ['as' => 'user.delete' ,'uses' => 'UserController@delete']);
Route::post('policy/{policy}/description-update', ['as' => 'policy.update' ,'uses' => 'RoleController@policyNameUpdate']);
Route::post('policy/{policy}/module/description-update', ['as' => 'policy.description.update' ,'uses' => 'RoleController@policyDescriptionUpdate']);



//project management
Route::resource('project', 'ProjectController');
