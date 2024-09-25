<?php

use App\Http\Controllers\Apis\AppointmentFocusController;
use App\Http\Controllers\Apis\EventController;
use App\Http\Controllers\Apis\EventPlanningEssentialController;
use App\Http\Controllers\Apis\LoginController;
use App\Http\Controllers\Apis\MeetingController;
use App\Http\Controllers\Apis\ServiceController;
use App\Http\Controllers\Apis\ServiceRequestController;
use App\Http\Controllers\Apis\SongController;
use App\Http\Controllers\Apis\StaffController;
use App\Http\Controllers\SongApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get("album/{id}", [SongApiController::class, "getSongAlbum"]);
Route::get("genre/{id}", [SongApiController::class, "getSongGenre"]);


Route::prefix("v1")->group(function () {

    Route::post("login", [LoginController::class, "login"]);
    Route::post("register", [LoginController::class, "register"]);
    Route::post('forgot-password', [LoginController::class, 'forgotPassword']);




    Route::get('services', [ServiceController::class, 'index']);
    Route::get('songs', [SongController::class, 'index']);
    Route::get('staffs', [StaffController::class, 'index']);
    Route::get('event-planning-essentials', [EventPlanningEssentialController::class, 'listing']);
    Route::get('events', [EventController::class, 'index']);

    Route::get('appointment-focuses',[AppointmentFocusController::class,'index']);

    Route::get('settings',[LoginController::class,'settings']);

    Route::post('services/request',[ServiceRequestController::class,'create']);


    Route::middleware(["auth:sanctum"])->group(function () {

        Route::get('meetings', [MeetingController::class, 'index']);
        Route::post('meetings/create', [MeetingController::class, 'create']);

    });
});
