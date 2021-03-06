<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['register' => false]);

// Example Routes
// Route::view('/', 'landing');
// Route::match(['get', 'post'], '/dashboard', function(){
//     return view('dashboard');
// });
// Route::view('/pages/slick', 'pages.slick');
// Route::view('/pages/datatables', 'pages.datatables');
// Route::view('/pages/blank', 'pages.blank');




Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('albums', AlbumController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('genres', GenreController::class);
});

Route::middleware(["auth"])->group(function () {
    Route::resource('songs', SongController::class);
});


Route::middleware(["auth"])->group(function () {


    Route::put('profile/updateUser/{id}', [ProfileController::class, 'updateUser'])->name("profile.updateUser");
    Route::post('profile/updatePassword/{id}', [ProfileController::class, 'updatePassword'])->name("profile.updatePassword");
    Route::resource('profile', ProfileController::class);
});
