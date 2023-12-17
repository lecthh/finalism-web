<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CollegeController;

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin'])->group(function(){
        Route::view('/','login')->name('login');
        Route::post('/',[AdminController::class,'loginHandler'])->name('login_handler');
    });

    Route::middleware(['auth:admin'])->group(function(){
        Route::resource('colleges', CollegeController::class);
    });
});