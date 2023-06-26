<?php

namespace App\Http\Controllers;

use App\Form\FormValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpseclib3\Crypt\Hash;

class UserController extends Controller
{
    /** REGRAS DE VALIDACAO */
    private $rulesRegister = [
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required|min:3',
        'user_level' => 'required'
    ];

    private $rulesLogin = [
        'email' => 'required',
        'password' => 'required'
    ];

    /**
     * METODO DE LOGIN
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validate = FormValidation::validate($request->only(['email', 'password']), $this->rulesLogin);

        if($validate !== true) {
            return $validate;
        }

        // CASO NAO PASSE NA AUTENTICACAO
        $invalidData = response()->json(['errors' => ['login' => 'dados invalidos']]);

        $user = User::where('email', $request->email)->first();

        // SE EXISITR UM USUARIO COM O E-MAIL ENVIADO
        if($user) {
            if (\Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
                $token = $user->createToken('access_token')->accessToken;
                return response()->json(['access_token' => $token]);
            }
            return $invalidData;
        }

        return $invalidData;
    }

    /**
     * METODO RESPONSAVEL POR REGISTRAR UM USUARIO
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validate = FormValidation::validate($request->only(['name', 'email', 'password']), $this->rulesRegister);

        if($validate !== true) {
            return $validate;
        }
        $name = $request->name;
        $email = $request->email;
        $userLevel = $request->user_level;
        $password = bcrypt($request->password);

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->user_level = $userLevel;
        $user->password = $password;
        $user->save();

        if($user) {
            return response()->json([
                'success' => true,
                'message' => 'success',
                'data' => $user
            ],200);
        }
    }
}
