<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ServidorEfetivoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// Login (gera token)
Route::post('/login', [AuthController::class, 'login']);

// Logout (revoga token)
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Renovação do Token
Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:sanctum');

// Exemplo de rota protegida
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/fotos/upload/{pes_id}', [FotoController::class, 'upload']);

Route::get('/fotos/get-foto/{pes_id}', [FotoController::class, 'obterLinkTemporario']);

Route::middleware('auth:sanctum')->group(function (){

    // CIDADE
    // GET PAGINADO
    Route::get('/cidade', [CidadeController::class, 'index']);
    // SHOW
    Route::get('/show-cidade/{cid_id}', [CidadeController::class, 'show']);
    // STORE
    Route::post('/store-cidade', [CidadeController::class, 'store']);
    // UPDATE
    Route::put('/update-cidade/{cid_id}', [CidadeController::class, 'update']);

    // GET PAGINADO
    Route::get('/pessoa', [PessoaController::class, 'index']);
    // SHOW
    Route::get('/show-pessoa/{pes_id}', [PessoaController::class, 'show']);
    // STORE
    Route::post('/store-pessoa', [PessoaController::class, 'store']);
    // UPDATE
    Route::put('/update-pessoa/{pes_id}', [PessoaController::class, 'update']);
    // DELETE
    Route::delete('/delete-pessoa/{pes_id}', [PessoaController::class, 'destroy']);

    // SERVIDOR EFETIVO
    // GET PAGINADO
    Route::get('/get-servidor-efetivo', [ServidorEfetivoController::class, 'index']);
    // SHOW
    Route::get('/show-servidor-efetivo/{pes_id}', [ServidorEfetivoController::class, 'show']);
    // STORE
    Route::post('/store-servidor-efetivo', [ServidorEfetivoController::class, 'store']);
    // UPDATE
    Route::put('/update-servidor-efetivo/{pes_id}', [ServidorEfetivoController::class, 'update']);

});

