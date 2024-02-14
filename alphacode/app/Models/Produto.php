<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
   
    protected $fillable = ['id', 'user_id','descricao', 'valor_unitario', 'desconto', 'quantidade'];
   
    public function user()
    {
      return $this->belongsTo(User::class);
    }
   
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }
}
