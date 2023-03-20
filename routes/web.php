<?php

use Illuminate\Support\Facades\Route;

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
    return view('public.welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    //Private
    Route::get('/pets', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //ADMIN
    Route::group(['middleware' => ['permission:dashboard']], function() {
        Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin');

        /** S P E C I E S */
        Route::get('/dashboard/species', [App\Http\Controllers\SpecieController::class, 'index'])->name('species.index');
        Route::get('/dashboard/species/new', [App\Http\Controllers\SpecieController::class, 'create'])->name('species.create');
        Route::post('/dashboard/species/new', [App\Http\Controllers\SpecieController::class, 'store'])->name('species.store');
        Route::get('/dashboard/species/edit/{id}', [App\Http\Controllers\SpecieController::class, 'edit'])->name('species.edit');
        Route::put('/dashboard/species/edit/{id}', [App\Http\Controllers\SpecieController::class, 'update'])->name('species.update');

        /** R A C E S */
        Route::get('/dashboard/races', [App\Http\Controllers\RaceController::class, 'index'])->name('races.index');
        Route::get('/dashboard/races/new', [App\Http\Controllers\RaceController::class, 'create'])->name('races.create');
        Route::post('/dashboard/races/new', [App\Http\Controllers\RaceController::class, 'store'])->name('races.store');
        Route::get('/dashboard/races/edit/{id}', [App\Http\Controllers\RaceController::class, 'edit'])->name('races.edit');
        Route::put('/dashboard/races/edit/{id}', [App\Http\Controllers\RaceController::class, 'update'])->name('races.update');
    });
});