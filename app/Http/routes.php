<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', ['as' => 'Home', function () {
    return view('welcome');
}]);

Route::get('attrs', 'AttributeController@show_all');

Route::get('addattr', 'AttributeController@show_add');

Route::get('updateattr/{id}', 'AttributeController@show_update');

Route::get('delattr/{id}', 'AttributeController@del');

Route::post('updateattr/{id}', ['as' => 'updateattr', 'uses'=>'AttributeController@do_update']);

Route::post('addattr', ['as' => 'addattr', 'uses'=>'AttributeController@add']);

Route::get('book/{id}', 'BookViewController@index');

Route::post('book/output', ['as' => 'Output', 'uses' => 'OutputController@Output']);

Route::get('MultipleCheat', 'MultipleCheatController@index');

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
    //
});
