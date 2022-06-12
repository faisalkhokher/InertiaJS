<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RepositoryController;

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
Route::middleware(['auth'])->group(function () {


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

Route::get('/users',[UserController::class , 'index'])->name('users');
Route::get('/create',[UserController::class , 'create'])->name('create');
Route::post('/create-user',[UserController::class , 'createUser'])->name('create.user');

Route::get('/setting' , function(){
    return Inertia::render('setting');
})->name('setting');


Route::post('/logout' , function(){
    dd("logout");
})->name('logout');

// ENd
});

Route::get('/login',[LoginController::class , 'create'])->name('login');
Route::post('/login/in',[LoginController::class , 'login'])->name('loggedIn');
Route::get('/register',[LoginController::class , 'register'])->name('register');
Route::post('/register/user',[UserController::class , 'createUser'])->name('createUser');



Route::get('/test',[ RepositoryController::class ,'triggerQueues']);
