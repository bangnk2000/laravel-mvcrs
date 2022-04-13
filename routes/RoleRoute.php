<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

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

Route::prefix('roles')->group(function () {
    Route::get('/',[RoleController::class,'index'])->name('roles.index')->middleware('permission:role_list');
    Route::get('/create',[RoleController::class,'create'])->name('roles.create')->middleware('permission:role_create');
    Route::post('/store',[RoleController::class,'store'])->name('roles.store')->middleware('permission:role_store');
    Route::get('/{id}',[RoleController::class,'show'])->name('roles.show')->middleware('permission:role_show');
    Route::get('//edit/{id}',[RoleController::class,'edit'])->name('roles.edit')->middleware('permission:role_edit');
    Route::patch('//update/{id}',[RoleController::class,'update'])->name('roles.update')->middleware('permission:role_update');
    Route::delete('/delete/{id}',[RoleController::class,'delete'])->name('roles.destroy')->middleware('permission:role_delete');
});
