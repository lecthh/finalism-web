<?php


use App\Http\Controllers\DeparmentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentController;
use App\Models\Department;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/colleges', CollegeController::class);
Route::resource('/departments', DeparmentController::class);
Route::resource('/programs', ProgramController::class);
Route::resource('/students', StudentController::class);

