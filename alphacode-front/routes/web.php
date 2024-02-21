<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PedidoController;
use App\Models\Produto;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () { 
    return view('home');// rota api
});

//CLIENTE
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes{id}editar', [ClienteController::class, 'edit'])->name('editar.cliente');

//PRODUTO
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');

//PEDIDOS
Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');


