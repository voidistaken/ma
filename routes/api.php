<?php

use App\Http\Controllers\RideController;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\RideRequestController;
use App\Models\RideRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Events\Routing;
use Illuminate\Support\Facades\Route;
require __DIR__.'/auth.php';

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/rides/{ride}', [RideController::class, "show"]);
    Route::patch('/rides/{ride}/end', [RideController::class,"end"]);

    Route::middleware('ability:rider')->group(function () {
        Route::apiResources([
            'riders' => RiderController::class,
            'ride_requests' => RideRequestController::class,
        ]);
        Route::post('/ride_requests/accept', [RideRequestController::class, "acceptDriver"]);
        Route::get('/ride_requests/{id}/drivers', [RideRequestController::class, "drivers"]);
    });

    Route::middleware('ability:driver')->group(function () {
        Route::get('/ride_requests', [RideRequestController::class, "index"]);
        
        Route::patch('rides/{ride}/start', [RideController::class,"start"]);
        Route::patch('/ride_requests/{ride}/{id}/accept', [RideRequestController::class, "accept"]);
    });
});

Route::post('/riders', [RiderController::class, "store"]);
