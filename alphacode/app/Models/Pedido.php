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

    if (empty($queryFilter)) {
      return PedidoResource::collection(Pedido::with('user')->get());
    }

    $data = Pedido::with('user');

    if (!empty($queryFilter['whereIn'])) {
      var_dump($queryFilter['whereIn']);
      // foreach ($queryFilter['whereIn'] as $value) {
      //   $data->whereIn($value[0], $value[1]);
      // }
    }

    // $resource = $data->where($queryFilter['where'])->get();

    // return InvoiceResource::collection($resource);
  }

}
