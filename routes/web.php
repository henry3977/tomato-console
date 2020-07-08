<?php

use Illuminate\Support\Facades\Route;
use App\Terminal;
use App\Schedule;
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
Route::get('/terminal', function () {
    // $terminal = new Terminal;
    // $terminal->create([
    //     'name' => '사창리'
    // ]);
});

Route::view('/doc','doc');
Route::get('/','DashBoardController@view');
Route::get('/to-schedules/{id}','DashBoardController@getToSchedules');
Route::get('/from-schedules/{id}','DashBoardController@getFromSchedules');
Route::post('/set-use-terminal','DashBoardController@setUseTerminal');
Route::post('/set-use-schedule','DashBoardController@setUseSchedule');

Route::post('/add-terminal','DashBoardController@addTerminal');
Route::post('/add-to-schedule','DashBoardController@addToSchedule');
Route::post('/add-from-schedule','DashBoardController@addFromSchedule');

Route::delete('/terminal/{id}','DashBoardController@delTerminal');
Route::delete('/schedule/{id}','DashBoardController@delSchedule');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
