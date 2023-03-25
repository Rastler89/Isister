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
    Route::get('/pets', [App\Http\Controllers\PetController::class, 'index'])->name('home');
    Route::post('/pets', [App\Http\Controllers\PetController::class, 'store'])->name('pets.store');
    Route::get('/pets/{id}', [App\Http\Controllers\PetController::class, 'show'])->name('pets.show');
    Route::get('/pets/{id}/edit', [App\Http\Controllers\PetController::class, 'edit'])->name('pets.edit');
    Route::post('/pets/{id}/edit', [App\Http\Controllers\PetController::class, 'update'])->name('pets.update');
    Route::delete('/pets/{id}', [App\Http\Controllers\PetController::class, 'destroy'])->name('pets.delete');

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

        /** D I S E A S E S */
        Route::get('/dashboard/diseases', [App\Http\Controllers\DiseaseController::class, 'index'])->name('diseases.index');
        Route::get('/dashboard/diseases/new', [App\Http\Controllers\DiseaseController::class, 'create'])->name('diseases.create');
        Route::post('/dashboard/diseases/new', [App\Http\Controllers\DiseaseController::class, 'store'])->name('diseases.store');
        Route::get('/dashboard/diseases/{id}', [App\Http\Controllers\DiseaseController::class, 'edit'])->name('diseases.edit');
        Route::put('/dahsboard/diseases/{id}', [App\Http\Controllers\DiseaseController::class, 'update'])->name('diseases.update');
    });
});