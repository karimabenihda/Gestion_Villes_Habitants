<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VilleController;
use App\Http\Controllers\HabitantController;
use App\Models\Habitant;

Route::get('/',[HabitantController::class,'index'])->name('habitants.index');
Route::get('/addHabitant', [HabitantController::class, 'create'])->name('habitants.create');
Route::post('/addHabitant', [HabitantController::class, 'store'])->name('habitants.store');
Route::delete('deleteHabitant',[HabitantController::class,'deleteHabitant'])->name('habitants.delete');
Route::get('/editHabitant/{id}',[HabitantController::class,'showEditScreen'])->name('habitants.edit');
Route::put('/editHabitant/{id}',[HabitantController::class,'updateHabitant'])->name('habitants.edit');

Route::get('/showVilles',[VilleController::class,'index']);
Route::post('/addVille',[VilleController::class,'create']);
Route::delete('/deleteVille',[VilleController::class,'deleteVille']);
Route::get('/editVille/{id_ville}',[VilleController::class,'showEditScreen']);
Route::put('/editVille/{id_ville}',[VilleController::class,'updateVille']);
