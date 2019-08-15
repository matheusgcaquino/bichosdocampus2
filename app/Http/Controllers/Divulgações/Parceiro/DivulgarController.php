<?php

namespace App\Http\Controllers\Divulgações\Parceiro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Divulgacao;

class DivulgarController extends Controller
{
    public function index()
    {
        return view('divulgações.parceiro.index');
    }

    public function confirmar(Request $request)
    {
        Divulgacao::create([
            'id_user'   =>  Auth::user()->id_user,
            'conteudo'  =>  $request->text,
        ]);
        $mensagem = 'Divulgação Cadastrada com Sucesso!';
        return redirect()->route('site.divulgar')->with('success', $mensagem);
    }
}
