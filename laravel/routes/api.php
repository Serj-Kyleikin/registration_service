<?php

use App\Http\Controllers\API\{
    Users\Profile\ProfileController,
};
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

require __DIR__.'/auth.php';

Route::middleware('auth:sanctum')->group( function () {

    Route::group(['prefix' => 'profile'], function () {

        Route::get('', [ProfileController::class, 'index']);
    });
});
