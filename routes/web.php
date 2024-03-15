<?php

use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use App\Facade\MyFacade;
use App\Models\Category;
use App\Jobs\CallRabbiqJob;
use Illuminate\Http\Request;
use App\Jobs\RabbitMQManualJob;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\S3Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
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

Route::get('s3' , [S3Controller::class , 'object']);

Route::post('/hook', function(){
    return "SUCCESS";
});

Route::get('/get-user', function(Request $request){
    // dd(auth()->user()->id);
    return User::where('id' , auth()->user()->id)->first();
})->name('get-user');

Route::get('/dash', function () {
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

Route::get('/',[LoginController::class , 'create'])->name('login');
Route::post('/login/in',[LoginController::class , 'login'])->name('loggedIn');
Route::get('/register',[LoginController::class , 'register'])->name('register');
Route::post('/register/user',[UserController::class , 'createUser'])->name('createUser');


Route::get('/add/category',[PostController::class , 'viewCategory'])->name('category');
Route::post('/save/category',[PostController::class , 'saveCategory'])->name('save-category');



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
Route::post('/post' , [PostController::class , 'post'])->name('post');

Route::get('view' , function (){
    return view('ajax');
});

Route::get('alpine' , function (){
    return view('alpine');
});


Route::get('facade' , function (){
    $value = MyFacade::callConstructor("A");
    dd($value);
});

// Pusher Message
// https://morioh.com/p/90c5c4efc345?f=5cb7d89d660c8335951ca454
Route::get('/home', function(){
    return view('pusher');
});
Route::get('itest', function () {
    // event(new App\Events\MessageSent('websolutionstuff_team'));
    // event(new App\Events\AlertMessage('Faisal',"PROPERTY"));
    // return "Event has been sent!";

    CallRabbiqJob::dispatch();
    // RabbitMQManualJob::dispatch();
    dd("RabbitMQ message sent successfully");
});

Route::get('/login',function(){
    return Inertia::render('Auth/Login');
})->name('loginn');

Route::get('/subscription',[PaymentController::class , 'index']);
Route::get('/single-subscription/{id}',[PaymentController::class , 'singleSubs'])->name('single-subs');
Route::post('subscription', [PaymentController::class, 'subscription'])->name("subscription.create");
