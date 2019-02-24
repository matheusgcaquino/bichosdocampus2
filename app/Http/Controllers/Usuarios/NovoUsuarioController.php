<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class NovoUsuarioController extends Controller
{
    public function index()
    {
        return view('usuarios.adicionar.index');
    }

    public function adicionar(Request $request)
    {
        $users = User::create([
            'name_user' => $request->nome,
            'email' => $request->email,
            'password' => bcrypt($request->senha),
            'nivel_user' => $request->nivel,
            'status_user' => $request->status
        ]);

        return redirect()->route('site.usuarios');
    }
}
