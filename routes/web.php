<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AboneController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('panel', [MainController::class, 'dashboard'])->name('dashboard');

    Route::get('aboneler', [AboneController::class, 'index'])->name('aboneler');
    Route::get('abone_duzenle/{id}', [AboneController::class, 'show'])->name('abone_duzenle');
    Route::POST('abone_crud/{id}', [AboneController::class, 'crud'])->name('abone_crud');
    Route::get('abone_destroy/{id}', [AboneController::class, 'destroy'])->name('abone_destroy');
});
