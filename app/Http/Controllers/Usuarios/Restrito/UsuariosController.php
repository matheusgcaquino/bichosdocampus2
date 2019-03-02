<?php

namespace App\Http\Controllers\Usuarios\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsuariosController extends Controller{
    
    public function index(){
        $usuarios = User::paginate(15);
            return view('usuarios.restrito.home.index')->with("results", $usuarios);
    }
}
