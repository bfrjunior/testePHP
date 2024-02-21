<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://localhost:8000/api/v1/pedidos');

        if ($response->ok()) {
            $data = $response->json()['data'];
            $perPage = 20; // Número de itens por página
            $totalItems = count($data);
            $currentPage = request()->query('page', 1);
            $lastPage = ceil($totalItems / $perPage);
            $offset = ($currentPage - 1) * $perPage;
            $data = array_slice($data, $offset, $perPage);
        
            return view('pedidos', ['data' => $data, 'currentPage' => $currentPage, 'lastPage' => $lastPage]);
        } else {
            return response()->json(['error' => 'Failed to fetch data from API'], $response->status());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response = Http::get("http://localhost:8000/api/v1/pedidos/{$id}");

    if ($response->ok()) {
        $cliente = $response->json()['data'];
        return view('pedidoForm', compact('pedido'));
    } else {
        return response()->json(['error' => 'Failed to fetch client data from API'], $response->status());
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}