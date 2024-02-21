<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PedidoResource;   
use App\Http\Resources\V1\ProdutoResource;
use Illuminate\Support\Facades\Validator;
use App\Models\Produto;
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
            'quantidade'=>'required'
       
          ]);

          if ($validator->fails()) {
            return $this->error('Validation failed', 422, $validator->errors());
          }
          $validated = $validator->validated();
      
          $updated = $produto->update([
            'user_id' => $validated['user_id'],
            'descricao' => $validated['descricao'],
            'valor_unitario' => $validated['valor_unitario'],
            'desconto' => $validated['desconto'],
            'quantidade' => $validated['quantidade'],

          ]);

          if ($updated) {
            return $this->response('Product updated', 200, new ProdutoResource($produto->load('user')));
          }
      
          return $this->error('Product not updated', 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $deleted = $produto->delete();

        if ($deleted) {
          return $this->response('Product deleted', 200);
        }
        return $this->error('Product not deleted', 400);
    }
}
