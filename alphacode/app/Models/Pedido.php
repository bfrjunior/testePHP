<?php

namespace App\Models;

use App\Filters\PedidoFilter;
use App\Http\Resources\V1\PedidoResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Pedido extends Model
{
    use HasFactory;


    protected $fillable = [
      'user_id',
      'type',
      'paid',
      'payment_date',
      'value'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }

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
