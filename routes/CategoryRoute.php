<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Route::prefix('categories')->group(function () {
    Route::get('/',[CategoryController::class,'index'])->name('categories.index')->middleware('permission:category_list');
    Route::get('/create',[CategoryController::class,'create'])->name('categories.create')->middleware('permission:category_create');
    Route::post('/store',[CategoryController::class,'store'])->name('categories.store')->middleware('permission:category_store');
    Route::get('/list',[CategoryController::class,'list'])->name('categories.list')->middleware('permission:category_list');
    Route::get('/search',[CategoryController::class,'search'])->name('categories.search');
    Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit')->middleware('permission:category_edit');
    Route::put('/update/{id}',[CategoryController::class,'update'])->name('categories.update')->middleware('permission:category_update');
    Route::delete('/delete/{id}',[CategoryController::class,'delete'])->name('categories.destroy')->middleware('permission:category_delete');
});
