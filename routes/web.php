<?php

use App\Http\Controllers\AdminAppointmentFocusController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminDjController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\AdminEventPlanningEssentialController;
use App\Http\Controllers\AdminMeetingController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\AdminSongController;
use App\Http\Controllers\AdminStaffController;
use App\Http\Controllers\AdminUserController;
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


Route::middleware(["auth"])->group(function () {


    Route::put('profile/updateUser/{id}', [ProfileController::class, 'updateUser'])->name("profile.updateUser");
    Route::post('profile/updatePassword/{id}', [ProfileController::class, 'updatePassword'])->name("profile.updatePassword");
    Route::resource('profile', ProfileController::class);

    Route::resource('users',AdminUserController::class);

    Route::resource('djs',AdminDjController::class);


    Route::resource('songs', AdminSongController::class);

    Route::resource('event-planning-essentials', AdminEventPlanningEssentialController::class);
    Route::get('services/requests', [AdminServiceController::class, 'requests'])->name('services.requests');
    Route::resource('services', AdminServiceController::class);
    Route::resource('staffs', AdminStaffController::class);
    Route::resource('events', AdminEventController::class);
    Route::resource('appointment-focuses', AdminAppointmentFocusController::class);
    Route::resource('meetings',AdminMeetingController::class)->only(['index','show','destroy']);
    Route::resource('settings',AdminSettingController::class)->only(['index','update']);


    Route::get('',[AdminDashboardController::class,'index'])->name('dashboard');

});

Route::get('symlink', function () {

    symlink('/var/www/html/gte/storage/app/public', '/var/www/html/gte/public/storage');

    return 'Symlink process successfully completed';
});
