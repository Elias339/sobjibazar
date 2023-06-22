<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/admin',[HomeController::class,'admin'])->name('admin');
Route::post('/add-product',[Homecontroller::class,'addProduct'])->name('add.product');


Route::get('/edit-product/{id}',[Homecontroller::class,'editProduct'])->name('edit.product');
Route::post('/update-product',[Homecontroller::class,'updateProduct'])->name('update.product');
Route::post('/product-delete',[HomeController::class,'delete'])->name('product.delete');



