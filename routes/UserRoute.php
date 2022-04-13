<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::prefix('users')->group(function () {
    Route::get('/',[UserController::class,'index'])->name('users.index')->middleware('permission:user_list');
    Route::get('/create',[UserController::class,'create'])->name('users.create')->middleware('permission:user_create');
    Route::post('/store',[UserController::class,'store'])->name('users.store')->middleware('permission:user_store');
    Route::get('/{id}',[UserController::class,'show'])->name('users.show')->middleware('permission:user_show');
    Route::get('/edit/{id}',[UserController::class,'edit'])->name('users.edit')->middleware('permission:user_edit');
    Route::patch('/update/{id}',[UserController::class,'update'])->name('users.update')->middleware('permission:user_update');
    Route::delete('/delete/{id}',[UserController::class,'delete'])->name('users.destroy')->middleware('permission:user_delete');
});
