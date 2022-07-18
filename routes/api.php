<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('pessoas', App\Http\Controllers\API\PessoaAPIController::class);


Route::resource('p__juridicas', App\Http\Controllers\API\P_JuridicaAPIController::class);


Route::resource('p__fisicas', App\Http\Controllers\API\P_FisicaAPIController::class);


Route::resource('enderecos', App\Http\Controllers\API\EnderecoAPIController::class);


Route::resource('veiculos', App\Http\Controllers\API\VeiculoAPIController::class);


Route::resource('planos', App\Http\Controllers\API\PlanoAPIController::class);


Route::resource('pagamentos', App\Http\Controllers\API\PagamentoAPIController::class);
