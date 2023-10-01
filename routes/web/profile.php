<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


Route::get('/', [ProfileController::class, 'index'])->name('profile');

Route::get('/{user}' , [ProfileController::class , 'edit'])->name('profile.edit')->middleware('password.confirm');

Route::patch('/{user}', [ProfileController::class, 'update'])->name('profile.update');

Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/change-password/{user}' , [ProfileController::class , 'password'])->name('profile.change-password');

Route::post('/favorites/{folder}' , [ProfileController::class, 'showFavorites']);

Route::post('/favorites/change-folder/{folder}' , [ProfileController::class, 'changeFolderName']);

Route::post('/favorites/delete/{favorite}' , [ProfileController::class, 'deleteFavorite']);

Route::post('/update-digibon', [ProfileController::class, 'updateDigibon']);
