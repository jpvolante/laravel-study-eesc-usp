<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;


Route::resource('/livros', LivroController::class);


