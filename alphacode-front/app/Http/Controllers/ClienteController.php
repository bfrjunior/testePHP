<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Faz uma solicitação GET para a API
        //$response = Http::get('http://localhost:8000/api/v1/users');

        // Converte a resposta em uma coleção de objetos
        //$users = collect($response->json());
        //return view('AllUsers', ['users' => $users]);
        //return $users;
        $response = Http::get('http://localhost:8000/api/v1/users');

        if ($response->ok()) {
            $data = $response->json()['data'];
            return view('Cliente', ['data' => $data]);
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
    public function edit( $id)
    {

    
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
