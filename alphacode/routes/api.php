<?php

use App\Http\Controllers\Api\V1\PedidoController;
use App\Http\Controllers\Api\V1\ProdutoController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TesteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
 //   return $request->user();  
//});

Route::prefix('v1')->group(function () {
    
    Route::post('/login', [AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function () { 
       

    });

    //sanctun
    Route::get('/teste', [TesteController::class, 'index']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::post('/logout', [AuthController::class, 'logout']);
    //sanctun
    
    //USERS/CLIENTES
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::post('/users', [UserController::class, 'store']);
    Route::put('/users/{user}', [UserController::class, 'update']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);

    
    //PEDIDOS
    Route::get('/pedidos', [PedidoController::class, 'index']);
    Route::get('/pedidos/{pedido}', [PedidoController::class, 'show']);
    Route::post('/pedidos', [PedidoController::class, 'store']);
    Route::put('/pedidos/{pedido}', [PedidoController::class, 'update']);
    Route::delete('/pedidos/{pedido}', [PedidoController::class, 'destroy']);

    //PRODUTOS
    Route::get('/produtos', [ProdutoController::class, 'index']);
    Route::get('/produtos/{produto}', [ProdutoController::class, 'show']);
    Route::post('/produtos', [ProdutoController::class, 'store']);
    Route::put('/produtos/{produto}', [ProdutoController::class, 'update']);
    Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy']);

    

});