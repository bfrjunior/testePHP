<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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
    return view('login');
});

Route::post('/login', [LoginController::class, 'authenticated'])->name('login');
Route::post('/logout', [LoginController::class,'logout'])->name('logout');
Route::get('/home', [HomeController::class, 'index'])->name('home');

//CLIENTE
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes{id}edit', [ClienteController::class, 'edit'])->name('users.edit');
Route::put('/clientes{id}update', [ClienteController::class, 'update'])->name('users.update');
Route::delete('/clientes{id}', [ClienteController::class, 'destroy'])->name('users.delete');


//PRODUTO
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/produtos/{id}edit', [ProdutoController::class, 'edit'])->name('produtos.edit');
Route::put('/produtos/{id}', [ProdutoController::class, 'update'])->name('produtos.update');
Route::delete('/produtos{id}', [ProdutoController::class, 'destroy'])->name('produtos.delete');

//PEDIDOS
Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
Route::get('/pedidos/{id}edit', [PedidoController::class, 'edit'])->name('pedidos.edit');
Route::put('/pedidos/{id}update', [PedidoController::class, 'update'])->name('pedidos.update');


