<?php

use App\Http\Controllers\studentcontroller;
use Illuminate\Support\Facades\Route;

Route::get('/',[studentcontroller::class,'index'])->name('x');

Route::post('/',[studentcontroller::class,'create'])->name('fs');

Route::get('update/{id}',[studentcontroller::class,'update'])->name('update');

Route::put('update/{id}',[studentcontroller::class,'successfullupdate']);

Route::get('delete/{id}',[studentcontroller::class,'destroy']);