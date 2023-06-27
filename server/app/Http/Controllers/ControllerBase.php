<?php

namespace App\Http\Controllers;

use App\Form\FormValidation;
use App\Models\User;
use Illuminate\Http\Request;

abstract class ControllerBase extends Controller
{
    protected $model;
    protected $user_level;

    private $rules = [
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required|min:3',
    ];
    public function index()
    {
        $administrators = $this->model::all();

        return response()->json(['data' => $administrators]);
    }

    public function show($id)
    {
        $adm = $this->model::find($id);

        if ($adm) {
            return response()->json(['data' => $adm]);
        }

        return response()->json(['recurso nao encontrado', 204]);
    }

    public function store(Request $request)
    {
        $validate = FormValidation::validate($request->only(['name', 'email', 'password']), $this->rules);

        if($validate !== true) {
            return $validate;
        }
        $name = $request->name;
        $email = $request->email;
        $password = bcrypt($request->password);

        // CADASTRANDO USUARIO
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->user_level = $this->user_level;
        $user->password = $password;
        $user->save();

        // CADASTRANDO USUARIO COM SUA RESPECTIVA MODEL DE ACESSO
        $adm = new $this->model();
        $adm->user_id = $user->id;
        $adm->save();

        return response()->json([
            'success' => 'true',
            'message' => 'registro cadastrado'
        ]);
    }
    public function update(Request $request, int $id)
    {
        $validate = FormValidation::validate($request->only(['name', 'email', 'password']), $this->rules);

        if($validate !== true) {
            return $validate;
        }
        $name = $request->name;
        $email = $request->email;
        $userLevel = $request->user_level;
        $password = bcrypt($request->password);

        // CADASTRANDO USUARIO
        $user = User::find($id);

        if (!$user) {
            return response()->json(['recurso nao encontado', 204]);
        }

        $user->name = $name;
        $user->email = $email;
        $user->user_level = $userLevel;
        $user->password = $password;
        $user->save();

        // CADASTRANDO USUARIO COMO ADMINISTRADOR
        $adm = new $this->model();
        $adm->user_id = $user->id;
        $adm->save();

        return response()->json([
            'success' => 'true',
            'message' => 'registro atualizado'
        ]);
    }

    public function delete($id)
    {
        $adm = $this->model::find($id);
        if (!$adm) {
            return response()->json(['recurso nao encontrado', 204]);
        }

        $adm->delete();
        return response()->json([
            'success' => 'true',
            'message' => 'registro deletado'
        ]);
    }
}
