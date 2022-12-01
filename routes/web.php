<?php

use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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
// Route::middleware(['auth'])->group(function () {


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
// });

Route::get('/login',[LoginController::class , 'create'])->name('login');
Route::post('/login/in',[LoginController::class , 'login'])->name('loggedIn');
Route::get('/register',[LoginController::class , 'register'])->name('register');
Route::post('/register/user',[UserController::class , 'createUser'])->name('createUser');



Route::get('/test',[ RepositoryController::class ,'triggerQueues']);

Route::get('/i' , [UserController::class , 'test']);
Route::get('/stepp' , function(){
    return Inertia::render('Users/step');
});

Route::get('/search' , function(){
    return Inertia::render('Search/search');
});

Route::post('fetch/users' , [UserController::class , 'fetchUsers'])->name('fetch.user');

Route::post('/fetch/posts' , [PostController::class , 'search'])->name('show.posts');
Route::get('/posts' , function () {
    return Inertia::render('post/search');
})->name('posts');

Route::get('/movies' , function () {
    return Inertia::render('hotels/index');
})->name('hotels');


Route::get('/p-index', function (Request $request) {
    return Inertia::render('post/index');
});

Route::post('/get/posts' , function(Request $request){
    $limit = 1;
    $page  = 1;
    if($request->page){
        $page = $request->page;
    }
    $offset = ($page-1) * $limit;
    $post_query = Post::with(['category' , 'user']);
    $total = $post_query->count();
    $posts = $post_query->offset($offset)->limit($limit)->get();
    $no_of_pages = ceil($total/$limit);
    return [
        "total"  => $total,
        "limit"  => $limit,
        "page"   => $page,
        "offset" => $offset,
        "posts"  => $posts,
        "no_of_pages"=> $no_of_pages
    ];
});

Route::post('/get/cate' , function(Request $request){
    $limit = 10;
    $page  = 1;
    if($request->page){
        $page = $request->page;
    }
    $offset = ($page-1) * $limit;
    $post_query = Category::query();
    $total = $post_query->count();
    $posts = $post_query->offset($offset)->limit($limit)->get();
    $no_of_pages = ceil($total/$limit);
    return [
        "total"  => $total,
        "limit"  => $limit,
        "page"   => $page,
        "offset" => $offset,
        "cat"  => $posts,
        "no_of_pages"=> $no_of_pages
    ];
});


Route::get('/res' , [PostController::class , 'ajax'])->name('data');

Route::get('view' , function (){
    return view('ajax');
});
