<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//posts
Route::get('/p/create', [Controllers\PostsController::class, 'create']);
Route::post('/p', [Controllers\PostsController::class, 'store']);

Route::get('/profile/{user}', [Controllers\ProfilesController::class, 'index'])->name('profile.show');
