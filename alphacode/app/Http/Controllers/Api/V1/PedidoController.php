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
    public function index(Request $request)
    {
        //return PedidoResource::collection((Pedido::with('user')->get()));
        return (new Pedido())->filter($request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
      
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
    public function show(Pedido $pedido)
    {
        return new PedidoResource($pedido);
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
    public function update(Request $request, Pedido $pedido)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'type' => 'required|max:1|in:' . implode(',', ['B', 'C', 'P']),
            'paid' => 'required|in:Em Aberto,Pago,Cancelado',
            'value' => 'required|numeric|between:1,9999.99',
            'payment_date' => 'nullable|date_format:Y-m-d H:i:s'
          ]);

          if ($validator->fails()) {
            return $this->error('Validation failed', 422, $validator->errors());
          }
          $validated = $validator->validated();
      
          $updated = $pedido->update([
            'user_id' => $validated['user_id'],
            'type' => $validated['type'],
            'paid' => $validated['paid'],
            'value' => $validated['value'],
            'payment_date' => in_array($validated['paid'], ['Em Aberto', 'Pago', 'Cancelado']) ? $validated['payment_date'] : null,

          ]);

          if ($updated) {
            return $this->response('Invoice updated', 200, new PedidoResource($pedido->load('user')));
          }
      
          return $this->error('Invoice not updated', 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        $deleted = $pedido->delete();

        if ($deleted) {
          return $this->response('Invoice deleted', 200);
        }
        return $this->error('Invoice not deleted', 400);
    }
}
