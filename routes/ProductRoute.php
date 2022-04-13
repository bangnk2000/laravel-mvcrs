<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::prefix('products')->group(function () {
    Route::get('/',[ProductController::class,'index'])->name('products.index')->middleware('permission:product_list');
    Route::get('/create',[ProductController::class,'create'])->name('products.create')->middleware('permission:product_create');
    Route::post('/store',[ProductController::class,'store'])->name('products.store')->middleware('permission:product_store');
    Route::get('/{id}',[ProductController::class,'show'])->name('products.show')->middleware('permission:product_show');
    Route::get('//edit/{id}',[ProductController::class,'edit'])->name('products.edit')->middleware('permission:product_edit');
    Route::patch('//update/{id}',[ProductController::class,'update'])->name('products.update')->middleware('permission:product_update');
    Route::delete('/delete/{id}',[ProductController::class,'delete'])->name('products.destroy')->middleware('permission:product_delete');
});
