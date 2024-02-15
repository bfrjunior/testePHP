<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PedidoResource;
use App\Models\Pedido;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     use HttpResponses;
    public function index()
    {
        return PedidoResource::collection((Pedido::with('user')->get()));
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
            'type' => 'required|max:1',
            'paid' => 'required|in:Em Aberto,Pago,Cancelado',
            'payment_date' => 'nullable',
            'value' => 'required|numeric|between:1,9999.99'
          ]);
      
          if ($validator->fails()) {
            return $this->error('Data Invalid', 422, $validator->errors());
          }
          $created = Pedido::create($validator->validated());

    if ($created) {
      return $this->response('Invoice created', 200, new PedidoResource($created->load('user')));
    }

    return $this->error('Invoice not created', 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new PedidoResource(Pedido::where('id',$id)->first());
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
