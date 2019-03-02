<?php

namespace App\Http\Controllers\Usuarios\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class EditUsuarioController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find($request->idUser);

        if($user){
            $user->name_user == $request->nome ?: $user->name_user = $request->nome;

            $user->email == $request->email ?: $user->email = $request->email;

            $user->nivel_user == $request->nivel ?: $user->nivel_user = $request->nivel;

            $user->status_user == $request->status ?: $user->status_user = $request->status;

            $user->save();

            return redirect()->route('site.usuarios');
        }else{
            echo "Ocorreu um error";
        }
        
    }
}
