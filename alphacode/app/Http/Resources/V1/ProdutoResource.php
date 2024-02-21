<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            
            'user' => [
                'user_id'=>$this->user->id,
                'firstName' => $this->user->firstName,
                'lastName' => $this->user->lastName,
                'fullName' => $this->user->firstName . ' ' . $this->user->lastName,
                'email' => $this->user->email,
              ],
              'id'=> $this->id,
            'descricao' => $this->descricao,
            'valor_unitario' => 'R$ ' . number_format($this->valor_unitario, 2, ',', '.'),
            'desconto' => $this->desconto . '%',
            'quantidade' => $this->quantidade,
        ];
    }
}
