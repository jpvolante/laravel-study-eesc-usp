<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ImagemController;


Route::resource('/livros', LivroController::class);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/', [IndexController::class, 'index']);
Route::post('logout', [LoginController::class, 'logout']);

Route::get('login/senhaunica', [LoginController::class,'redirectToProvider']);
Route::get('/callback', [LoginController::class,'handleProviderCallback']);
Route::get('/novoadmin', [UserController::class, 'form']);
Route::post('/novoadmin', [UserController::class, 'register']);

Route::resource('/livros', LivroController::class);
Route::get('/livros/{isbn}', [LivroController::class, 'show']);

Route::get('/livros/{livro}/cotacao', [LivroController::class, 'cotacao']);

Route::get('/livros/{livro}/devolver', [LivroController::class, 'devolver']);

Route::resource('files', FileController::class);

Log::info('Entrou no método store no FileController');


Route::post('/files', [FileController::class, 'store']);


Route::get('/files/{file}', [FileController::class, 'show'])->name('files.show');

Route::post('/files/store', [FileController::class, 'store'])->name('files.store');
Route::get('/files/show/{file}', [FileController::class, 'show'])->name('files.show');
Route::get('/imagem/{filename}', [ImagemController::class, 'mostrar']);
