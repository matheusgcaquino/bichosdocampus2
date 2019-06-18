<?php

namespace App\Http\Controllers\Usuarios\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Convite;
use App\Mail\UserConvite;
use Mail;

class NovoUsuarioController extends Controller
{
    public function agora()
    {
        return view('usuarios.restrito.adicionar.agora.index');
    }

    public function convite()
    {
        return view('usuarios.restrito.adicionar.convite.index');
    }

    public function adicionar(Request $request)
    {
        $users = User::create([
            'name_user'     =>  $request->nome,
            'email'         =>  $request->email,
            'password'      =>  bcrypt($request->senha),
            'nivel_user'    =>  $request->nivel,
            'status_user'   =>  $request->status
        ]);

        return redirect()->route('site.usuarios');
    }

    public function convidar(Request $request)
    {
        $key = md5($request->email);

        $email = Convite::where('email',$request->email)->get();
        $qtdemail = $email->count();

        if($qtdemail == 0)
        {
            $convite = Convite::create([
                'key'           =>  $key,
                'email'         =>  $request->email,
                'nivel_user'    =>  $request->nivel,
                'status_user'   =>  $request->status
            ]);
            Mail::to($request->email)->send(new UserConvite($convite));
            $mensagem = 'Sucesso ao convidar.';
            return redirect()->route('site.usuarios')->with('success', $mensagem);
        } else {
            $mensagem = 'Convite já foi enviado e ainda não foi expirado.';
            return redirect()->route('site.usuarios')->with('error', $mensagem);
        }
    }
}
