<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicineController;



Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::middleware(['auth'])->group(function () {
        Route::get('/medicines', [MedicineController::class, 'index'])->name('medicine.index');
        Route::post('/medicines', [MedicineController::class, 'search'])->name('medicine.search');
        Route::get('/saved-medicines', [MedicineController::class, 'saved'])->name('medicines.saved');
        Route::get('/medicines/export', [MedicineController::class, 'exportCsv'])->name('medicines.export');


    });


    
require __DIR__.'/auth.php';
