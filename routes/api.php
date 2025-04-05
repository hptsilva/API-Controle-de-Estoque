<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SaidaController;
use App\Http\Controllers\UnidadesController;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::apiResource('produtos', ProdutoController::class);
    Route::apiResource('fornecedores', FornecedorController::class);
    Route::apiResource('categorias', CategoriaController::class);
    Route::apiResource('unidades', UnidadesController::class);
    Route::apiResource('marcas', MarcasController::class);
    Route::apiResource('entradas', EntradaController::class);
    Route::apiResource('saidas', SaidaController::class);
});

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
Route::post('refresh', [AuthController::class, 'refresh'])->middleware('auth:api');
Route::get('me', [AuthController::class, 'me'])->middleware('auth:api');