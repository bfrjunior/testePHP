<?php

use App\Filters\PedidoFilter;
use App\Http\Resources\V1\PedidoResource;
use App\Models\Pedido;
use Illuminate\Http\Client\Request;

class Filter{
    public function filter(Request $request)
    {
        $queryFilter = (new PedidoFilter)->filter($request);
    
        $pedidos = Pedido::with('user');
    
        foreach ($queryFilter as $filter) {
            $pedidos->where(...$filter);
        }
    
        return PedidoResource::collection($pedidos->get());
    }
}