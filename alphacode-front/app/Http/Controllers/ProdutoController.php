<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://localhost:8000/api/v1/produtos');

        if ($response->ok()) {
            $data = $response->json()['data'];
            $perPage = 20; // Número de itens por página
            $totalItems = count($data);
            $currentPage = request()->query('page', 1);
            $lastPage = ceil($totalItems / $perPage);
            $offset = ($currentPage - 1) * $perPage;
            $data = array_slice($data, $offset, $perPage);
        
            return view('produtos', ['data' => $data, 'currentPage' => $currentPage, 'lastPage' => $lastPage]);
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
    public function edit($id)
    {
        $response = Http::get("http://localhost:8000/api/v1/produtos/{$id}");

    if ($response->ok()) {
        $produto = $response->json()['data'];
        return view('produtoForm', compact('produto'));
    } else {
        return response()->json(['error' => 'Failed to fetch product data from API'], $response->status());
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $response = Http::put("http://127.0.0.1:8000/api/v1/produtos/{$id}", $request->all());

    if ($response->ok()) {
        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso');
    } else {
        return back()->withInput()->with('error', 'Falha ao atualizar produto');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $response = Http::delete("http://localhost:8000/api/v1/produtos/{$id}");

    if ($response->ok()) {
        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso');
    } else {
        return back()->with('error', 'Falha ao excluir produto');
    }
    }
}
