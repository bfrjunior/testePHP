<?php

use App\Http\Controllers\Api\V1\PedidoController;
use App\Http\Controllers\Api\V1\ProdutoController;
use App\Http\Controllers\Api\V1\UserController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
 //   return $request->user();  
//});

Route::prefix('v1')->group(function () {
    
    //USERS/CLIENTES
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{user}', [UserController::class, 'show']);

    //PEDIDOS
    Route::get('/pedidos', [PedidoController::class, 'index']);
    Route::get('/pedidos/{pedido}', [PedidoController::class, 'show']);
    Route::post('/pedidos', [PedidoController::class, 'store']);
    Route::put('/pedidos/{pedido}', [PedidoController::class, 'update']);
    Route::delete('/pedidos/{pedido}', [PedidoController::class, 'destroy']);

    //PRODUTOS
    Route::get('/produtos', [ProdutoController::class, 'index']);
    Route::get('/produtos/{produto}', [ProdutoController::class, 'show']);
    

});