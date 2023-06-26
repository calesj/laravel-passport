<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];

        if(!auth('web')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'email or password is incorrect',
                'user' => null
            ]);
        }

        return response()->json([
           'success' => true,
           'message' => 'success',
           'user' => Auth::user()
        ]);
    }

    /**
     * METODO RESPONSAVEL POR REGISTRAR UM USUARIO
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $password = bcrypt($request->password);
        $data = User::create($request->only('name', 'email', $password));

        return response()->json([
            'success' => true,
            'message' => 'success',
            'data' => $data
        ],200);
    }
}
