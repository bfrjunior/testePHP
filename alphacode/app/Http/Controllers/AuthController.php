<?php

namespace App\Http\Controllers;

use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

  use HttpResponses;
//2|sZP0evgdjZGZJ66c6KhRJIcKzu0h6sSKORbSaVvZ5fb35c69
  public function login(Request $request)
  {
    if (Auth::attempt($request->only('email', 'password'))) {
      return $this->response('Authorized', 200, [
        'token' => $request->user()->createToken('pedido')->plainTextToken
      ]);
    }
    return $this->response('Not Authorized', 403);
  }

  public function logout(Request $request)
  {
    $request->user()->currentAccessToken()->delete();

    return $this->response('Token Revoked', 200);
  }
}