<?php

use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProdutosController::class, 'index']);
Route::resource('produtos', ProdutosController::class);
