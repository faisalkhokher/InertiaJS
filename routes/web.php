<?php

use Inertia\Inertia;
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
    $time = now()->toTimeString();
    return Inertia::render('home' , [
        'name' => 'Inertia',
        "frameworks" => [
            "Laravel",
            "Vue",
            "React",
            "Bootstrap",
        ],
        "time" => $time,
    ]);
})->name('home');

Route::get('/users' , function(){
    // sleep(2);
    $time = now()->toTimeString();
    return Inertia::render('users',[
        "time" => $time,
    ]);
})->name('users');

Route::get('/setting' , function(){
    return Inertia::render('setting');
})->name('setting');


Route::post('/logout' , function(){
    dd("logout");
})->name('logout');



