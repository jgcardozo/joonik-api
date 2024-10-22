<?php

use App\Http\Controllers\API\LocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

;
/* 
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 */

//Route::apiResource('locations',LocationController::class);

Route::middleware('api_key')->group(function () {
    Route::get('/locations', [LocationController::class, 'index']);
});



