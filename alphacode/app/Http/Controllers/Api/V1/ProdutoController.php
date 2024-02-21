<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PedidoResource;   
use App\Http\Resources\V1\ProdutoResource;
use Illuminate\Support\Facades\Validator;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
  {
    //$this->middleware(['auth:sanctum', 'abilities:invoice-store,user-update'])->only(['store', 'update']);
  }

    public function index()
    {
        return ProdutoResource::collection((Produto::with('user')->get()));
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
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'descricao' => 'required',
            'valor_unitario' => 'required',
            'desconto' => 'required',
            'quantidade'=>'required'
        ]);
    
        if ($validator->fails()) {
            return response()->json(['message' => 'Data Invalid', 'errors' => $validator->errors()], 422);
        }
    
        $produto = Produto::create($validator->validated());
    
        if ($produto) {
            return response()->json(['message' => 'Product created', 'produto' => $produto], 201);
        }
    
        return response()->json(['message' => 'Failed to create product'], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new ProdutoResource(Produto::where('id',$id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Produto $produto)
    {
        
      $validator = Validator::make($request->all(), [
        'user_id' => 'required',
        'descricao' => 'required',
        'valor_unitario' => 'required',
        'desconto' => 'required',
        'quantidade' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
    }

    $validated = $validator->validated();

    $produto->update([
        'user_id' => $validated['user_id'],
        'descricao' => $validated['descricao'],
        'valor_unitario' => $validated['valor_unitario'],
        'desconto' => $validated['desconto'],
        'quantidade' => $validated['quantidade'],
    ]);

    return new ProdutoResource($produto);
  }

  public function destroy(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
    
            // Exclui os pedidos associados ao usuário
            $user->pedidos()->delete();
            $user->produtos()->delete();
            // Exclui o usuário
            $user->delete();
    
            return response()->json(['message' => 'produto excluído com sucesso'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao excluir produto: ' . $e->getMessage()], 500);
        }
}
}
