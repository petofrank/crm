<?php

use App\Http\Controllers\Api\Contacts\IndexController;
use App\Http\Controllers\Api\Contacts\ShowController;
use App\Http\Controllers\Api\Contacts\StoreController;
use App\Http\Controllers\Api\Contacts\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group( function () {

    Route::prefix('contacts')->as('contacts:')->group(function() {
        Route::get('/', IndexController::class)->name('index');;
        Route::post('/store', StoreController::class)->name('store');
        Route::get('{uuid}', ShowController::class)->name('show');
    });


    Route::prefix('tests')->as('tests:')->group(function() {
        Route::get('/', TestController::class)->name('index');;
    });

    Route::get('ping', function() {
        return response()->json(
            data: ['ack' => 'pong'],status: 200
        );
    });
});

