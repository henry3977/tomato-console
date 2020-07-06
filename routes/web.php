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
    // $terminal->create([
    //     'name' => '동서울'
    // ]);
    // $terminal->create([
    //     'name' => '춘천'
    // ]);
    // $terminal->create([
    //     'name' => '다목리'
    // ]);
    // $terminal->create([
    //     'name' => '동송'
    // ]);
    // $terminal->create([
    //     'name' => '화천'
    // ]);
    // $terminal->create([
    //     'name' => '박달리'
    // ]);
    // $terminal->create([
    //     'name' => '삼일리'
    // ]);
    // $terminal->create([
    //     'name' => '수밀리'
    // ]);
    // $terminal->create([
    //     'name' => '검단리'
    // ]);
    // $terminal->create([
    //     'name' => '용담리'
    // ]);
});

Route::get('/schedule', function () {
    // $schedule = new Schedule;
    // $schedule->create([
    //     'to' => 2,
    //     'from' => 1,
    //     'time' => '06:30',
    // ]);
    // $schedule->create([
    //     'to' => 2,
    //     'from' => 1,
    //     'time' => '07:00',
    // ]);
    // $schedule->create([
    //     'to' => 2,
    //     'from' => 1,
    //     'time' => '07:20',
    // ]);
    // $schedule->create([
    //     'to' => 2,
    //     'from' => 1,
    //     'time' => '07:40',
    // ]);
    // $schedule->create([
    //     'to' => 2,
    //     'from' => 1,
    //     'time' => '07:55',
    // ]);
    // $schedule->create([
    //     'to' => 2,
    //     'from' => 1,
    //     'time' => '08:10',
    // ]);

});

Route::get('/', function () {
    return redirect('/doc');
    // return view('welcome');
});

Route::view('/doc','doc');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
