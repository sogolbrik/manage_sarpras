<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function (){
    //Dashboard
    Route::get('/dashboard', function () { return view('templates.main'); })->name('dashboard');
    //CRUD
    Route::resource('item', ItemController::class);
    Route::resource('student', StudentController::class);
    Route::resource('classroom', ClassroomController::class);
    Route::resource('borrow', BorrowController::class);
    //Status
    Route::post('status/{id}', [BorrowController::class, 'borrowStatus'])->name('borrow.status');
    //Logout
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
});

//Auth
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('authentication', [AuthController::class, 'authentication'])->name('auth.authentication');