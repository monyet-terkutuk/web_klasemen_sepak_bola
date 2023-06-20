<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\MatchController;

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
    return view('me');
});
Route::get('/match/multiple', [MatchController::class, 'multipleSee'])->name('match.multipleSee');
Route::post('/match/multiple', [MatchController::class, 'storeMultiple'])->name('match.storeMultiple');
Route::resource('/club', ClubController::class);
Route::resource('/macth', MatchController::class);
