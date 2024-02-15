<?php

namespace App\Filters;

use DeepCopy\Exception\PropertyException;
use Illuminate\Http\Request;

class PedidoFilter
{
    public function filter($request)
    {
        $filters = [];

        if ($request->has('paid')) {
            $paid = explode(',', $request->paid);
            $filters[] = ['paid', 'in', $paid];
        }

        return $filters;
    }
}