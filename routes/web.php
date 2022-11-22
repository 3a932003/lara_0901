<?php

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('posts', [PostsController::class, 'index'])->name('posts.index');
Route::get('posts/{post}', [PostsController::class, 'show'])->name('posts.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name("home.index");
    Route::get('posts', [AdminPostsController::class, 'index'])->name("posts.index");
    Route::get('posts/create', [AdminPostsController::class, 'create'])->name("posts.create");
    Route::post('posts', [AdminPostsController::class, 'store'])->name("posts.store");
    Route::get('posts/{post}/edit', [AdminPostsController::class, 'edit'])->name("posts.edit");
    Route::patch('posts/{post}', [AdminPostsController::class, 'update'])->name("posts.update");
    Route::delete('posts/{post}', [AdminPostsController::class, 'destroy'])->name("posts.destroy");
});
/*Route::group(['prefix' => 'admin'], function (){
    //進入後台管理介面的路由(1)
    Route::get('/',['as' => 'admin.home.index', 'uses' => 'App\Http\Controllers\AdminHomeController@index']);
    //後台列出所有貼文的路由(2)
    Route::get('posts', ['as' => 'admin.posts.index', 'uses' => 'App\Http\Controllers\AdminPostsController@index']);
    //後台產生空白表單(新增貼文用)的路由(3)
    Route::get('posts/create', ['as' => 'admin.posts.create', 'uses' =>'App\Http\Controllers\AdminPostsController@create']);
    Route::post('posts', [AdminPostsController::class, 'store'])->name("posts.store");
    //後台產生修改表單的路由(4)
    Route::get('posts/{id}/edit', ['as' => 'admin.posts.edit', 'uses' => 'App\Http\Controllers\AdminPostsController@show']);
    Route::patch('posts/{post}', [AdminPostsController::class, 'update'])->name("posts.update");
    Route::delete('posts/{post}', [AdminPostsController::class, 'destroy'])->name("posts.destroy");
});*/

