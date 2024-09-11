<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserContoller;

Route::get('/', [JobController::class, 'index']);
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('job.show');

Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');


Route::get('/search', SearchController::class);

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserContoller::class,'create']);
    Route::post('/register', [RegisteredUserContoller::class,'store']);
    
    Route::get('/login', [SessionController::class,'create']);
    Route::post('/login', [SessionController::class,'store']);
});

Route::delete('/logout', [SessionController::class,'destroy'])->middleware('auth');