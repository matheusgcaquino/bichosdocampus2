<?php

namespace App\Http\Controllers\Divulgações\Publico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Email;

class InscriçãoController extends Controller
{
    public function index()
    {
        return view('divulgações.publico.index');
    }

    public function cancelar(Request $request)
    {
        $get = Email::where('email', $request->email)->first();
        if (Empty($get)) {
            $mensagem = 'E-mail nao cadastrado!';
            return redirect()->route('site.inscrições')->with('error', $mensagem);
        } else {
            $get->ativo = false;
            $mensagem = 'Cancelado com sucesso!';
            return redirect()->route('site.inscrições')->with('success', $mensagem);
        }
    }
}
