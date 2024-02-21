<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\HttpResponses;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return UserResource::collection(User::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, User $user)
    {
     
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users,email',
            'password'=>'required'
        ]);
    
        if ($validator->fails()) {
            return response()->json(['message' => 'Data Invalid', 'errors' => $validator->errors()], 422);
        }
    
        $user = User::create($validator->validated());
    
        if ($user) {
            return response()->json(['message' => 'User created', 'user' => $user], 201);
        }
    
        return response()->json(['message' => 'Failed to create user'], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new UserResource(User::where('id',$id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,User $user)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
        }
    
        $validated = $validator->validated();
    
        $user->update([
            'firstName' => $validated['firstName'],
            'lastName' => $validated['lastName'],
            'email' => $validated['email'],
        ]);
    
        return response()->json(['message' => 'User updated', 'user' => $user], 200);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
    
            // Exclui os pedidos associados ao usuário
            $user->pedidos()->delete();
            $user->produtos()->delete();
            // Exclui o usuário
            $user->delete();
    
            return response()->json(['message' => 'Cliente excluído com sucesso'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao excluir cliente: ' . $e->getMessage()], 500);
        }
}
}
