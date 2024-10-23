<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;

class UsersAddressController extends Controller
{
    /**
     * This method returns the addresses associated with the authenticated user.
     *
     * @param string $token
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($token)
    {
        // Obtener el usuario autenticado
        $user = User::where('user_token', $token)->first();

        // Obtener las direcciones asociadas al usuario autenticado
        $addresses = Address::where('user_id', $user->id)->get();

        // Retornar las direcciones en formato JSON
        return response()->json($addresses);
    }
}
