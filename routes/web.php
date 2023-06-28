<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\PostsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\PageController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\PageController::class, 'index']);
Route::post('/posts/{post}/comments', 'App\Http\Controllers\CommentsController@store');


Route::resource('posts', 'App\Http\Controllers\PostsController');
Route::resource('branches', 'App\Http\Controllers\BranchController');

Route::get('/abouts', [App\Http\Controllers\PageController::class, 'about']);
Route::get('/contact-us', [App\Http\Controllers\PageController::class, 'contact']);
Route::get('/blog', [App\Http\Controllers\PageController::class, 'blog']);
Route::get('/blog/{branches}', [App\Http\Controllers\PostsController::class, 'branchBlog']);

Route::get('/category/scholarship', [App\Http\Controllers\PageController::class, 'scholarship']);
Route::get('/category/internship', [App\Http\Controllers\PageController::class, 'internship']);
Route::get('/category/jobs', [App\Http\Controllers\PageController::class, 'jobs']);
Route::get('/category/courses', [App\Http\Controllers\PageController::class, 'courses']);
Route::get('/category/continent', [App\Http\Controllers\PageController::class, 'continent']);

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');


    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class,'count']);
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class,'post']);
    Route::get('/dashboardposts', [App\Http\Controllers\DashboardController::class,'dashboardPost']);


    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    // Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::post('/upload',[PostsController::class, 'upload'])->name('ckeditor.upload');
});
