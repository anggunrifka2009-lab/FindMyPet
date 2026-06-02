<?php

use Illuminate\Support\Facades\Route;
use App\Models\Pet;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ProfileController;


Route::get('/', [PetController::class, 'home']);

Route::get('/hewan', [PetController::class, 'index'])->name('index.blade');

Route::get('/pets/{id}', [PetController::class, 'show']);



Route::middleware('auth')->group(function () {

    Route::get('/admin', function () {

        $pets = Pet::latest()->get();

        return view('dashboard', compact('pets'));

    })->name('admin');

    Route::get('/admin/tambah-hewan', [PetController::class, 'create']);

    Route::post('/pets/store', [PetController::class, 'store']);

    Route::get('/admin/edit-hewan/{id}', [PetController::class, 'edit']);

    Route::post('/admin/update-hewan/{id}', [PetController::class, 'update']);

    Route::delete('/admin/hapus-hewan/{id}', [PetController::class, 'destroy']);

});


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

require __DIR__.'/auth.php';