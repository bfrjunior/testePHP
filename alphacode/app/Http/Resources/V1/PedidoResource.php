<?php

namespace App\Http\Resources\V1;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PedidoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

     private array $types = ['C' => 'Cartão', 'B' => 'Boleto', 'P' => 'Pix'];

    public function toArray(Request $request): array
    {
        $paid = $this->paid;
    return [
        'user' => [
            'firstName' => $this->user->firstName,
            'lastName' => $this->user->lastName,
            'fullName' => $this->user->firstName . ' ' . $this->user->lastName,
            'email' => $this->user->email,
          ],

          'type' => $this->types[$this->type],
          'value' => 'R$ ' . number_format($this->value, 2, ',', '.'),
          'payment' => $paid,
          'paymentDate' => $paid ? Carbon::parse($this->payment_date)->format('d/m/Y H:i:s') : Null,
          'paymentSince' => $paid ? Carbon::parse($this->payment_date)->diffForHumans() : Null ,
        ];
    }
}
