<?php

namespace App\Http\Controllers\Usuarios\Publico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Convite;
use DateTime;

class NovoUsuarioController extends Controller
{
    public function convidado($key)
    {
        $convite = Convite::where('key', '=', $key)->first();
        if($convite){
            $hoje = new DateTime('now');
            $vencimento = $convite->created_at;
            $vencimento->modify('+2 days');
            if($hoje > $vencimento){
                $convite->delete();
                return view('usuarios.publico.adicionar.convidado.index')->with('vencido', true);
            } else {
                return view('usuarios.publico.adicionar.convidado.index')->with('results', $convite);
            }
        }else{
            return view('usuarios.publico.adicionar.convidado.index')->with('vencido', true);
        }
        
    }

    public function add_convidado(Request $request)
    {
        $convite = Convite::find($request->id_convite);

        $users = User::create([
            'name_user'     =>  $request->nome,
            'email'         =>  $convite->email,
            'password'      =>  bcrypt($request->senha),
            'nivel_user'    =>  $convite->nivel_user,
            'status_user'   =>  $convite->status_user
        ]);

        return redirect()->route('home');
    }
}
