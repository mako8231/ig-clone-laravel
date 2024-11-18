<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Mail\NewUserWelcome;

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


Auth::routes();


Route::get('/email', function(){
    return new NewUserWelcome();
});

//Endpoints 
Route::post('follow/{user}', [Controllers\FollowsController::class, 'store']);

//posts
Route::get('/', [Controllers\PostsController::class, 'index']);
Route::get('/p/create', [Controllers\PostsController::class, 'create']);
Route::get('/p/{post}', [Controllers\PostsController::class, 'show']);
Route::post('/p', [Controllers\PostsController::class, 'store']);

//Profile
Route::get('/profile/{user}', [Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [Controllers\ProfilesController::class, 'update'])->name('profile.update');

