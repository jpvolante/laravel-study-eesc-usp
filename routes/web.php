<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IndexController;


Route::resource('/livros', LivroController::class);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/', [IndexController::class, 'index']);
Route::post('logout', [LoginController::class, 'logout']);

Route::get('login/senhaunica', [LoginController::class,'redirectToProvider']);
Route::get('/logincallback', [LoginController::class,'handleProviderCallback']);