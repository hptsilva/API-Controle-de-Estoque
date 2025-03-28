<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SaidaController;
use App\Http\Controllers\UnidadesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('produtos', ProdutoController::class);
Route::apiResource('fornecedores', FornecedorController::class);
Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('unidades', UnidadesController::class);
Route::apiResource('marcas', MarcasController::class);
Route::apiResource('entradas', EntradaController::class);
Route::apiResource('saidas', SaidaController::class);