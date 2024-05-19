<?php

use App\Http\Controllers\FingerprintController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

//Route::post('/fingerprint', [FingerprintController::class, 'handleFingerprint']);

Route::post('/fingerprint/update', [FingerprintController::class, 'updateFingerprint']);
Route::post('/votes/store', [VoteController::class, 'store']);
Route::get('/votes', [VoteController::class, 'index']);


