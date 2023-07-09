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





Route::resource('posts', 'App\Http\Controllers\PostsController')->parameters(['posts' =>'title',]);
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

// Auth::routes();

// Registration Routes
Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');

// Login Routes
Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// Password Reset Routes
Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');

// Email Verification Routes
Route::get('email/verify', 'App\Http\Controllers\Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'App\Http\Controllers\Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'App\Http\Controllers\Auth\VerificationController@resend')->name('verification.resend');


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

   Route::post('ckeditor/upload', 'App\Http\Controllers\PostsController@upload')->name('ckeditor.upload');

});
