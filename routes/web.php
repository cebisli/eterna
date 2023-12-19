<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AboneController;
use App\Http\Controllers\GonderiController;

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
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('panel', [MainController::class, 'dashboard'])->name('dashboard');
    Route::get('logout', [MainController::class, 'logout'])->name('logout');
    Route::get('postalar', [MainController::class, 'gonderilenPostalar'])->name('postalar');

    Route::get('aboneler', [AboneController::class, 'index'])->name('aboneler');
    Route::get('abone_duzenle/{id}', [AboneController::class, 'show'])->name('abone_duzenle');
    Route::POST('abone_crud/{id}', [AboneController::class, 'crud'])->name('abone_crud');
    Route::get('abone_destroy/{id}', [AboneController::class, 'destroy'])->name('abone_destroy');

    Route::get('gonderiler', [GonderiController::class, 'index'])->name('gonderiler');
    Route::get('gonderi_duzenle/{id}', [GonderiController::class, 'show'])->name('gonderi_duzenle');
    Route::POST('gonderi_crud/{id}', [GonderiController::class, 'crud'])->name('gonderi_crud');
    Route::get('gonderi_destroy/{id}', [GonderiController::class, 'destroy'])->name('gonderi_destroy');
});
