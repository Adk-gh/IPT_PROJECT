<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
    return view('index');
})->name('home');

Route::get('/signup', function () {
    return view('Signup');
})->name('signup');


Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
Route::post('/signup', [AuthController::class, 'handleSignup']);

Route::get('/signin', [AuthController::class, 'showSignin'])->name('signin');
Route::post('/signin', [AuthController::class, 'handleSignin']);
//         ]);
Route::get('/social-feed', [AuthController::class, 'socialFeed'])->name('social_feed');

Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile');

Route::get('/artist', [AuthController::class, 'showArtist'])->name('artist');

Route::get('/article', [AuthController::class, 'showArticles'])->name('articles');


