<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FingerprintController;
use App\Http\Controllers\ContestantController;

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
    return view('home');
});


Route::get('/register', [FingerprintController::class, 'showRegistrationForm'])->name('register');

Route::post('/register', [FingerprintController::class, 'register'])->name('register.submit');

Route::get('/votes', function () {
    return view('votes');
})->name('votes-display');


Route::get('/contestants', [ContestantController::class, 'index'])->name('contestants.index');
