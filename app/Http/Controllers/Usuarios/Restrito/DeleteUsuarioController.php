<?php

namespace App\Http\Controllers\Usuarios\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class DeleteUsuarioController extends Controller
{
    public function index(Request $request)
    {
        User::destroy($request->idUser);
        return redirect()->route('site.usuarios');
    }
}
