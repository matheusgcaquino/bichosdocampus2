<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsuariosController extends Controller{
    
    public function index(){
        $usuarios = User::paginate(15);
            return view('usuarios.home.index', ["results"   =>  $usuarios]);
    }
}
