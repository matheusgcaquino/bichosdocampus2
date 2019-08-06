<?php

namespace App\Http\Controllers\Divulgações\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Divulgacao;

class DivulgaçõesController extends Controller
{
    public function index()
    {
        $results = Divulgacao::with('user')
            ->orderBy('created_at', 'desc')
        ->get();
        return view('divulgações.admin.index')->with('results', $results);
    }

    public function enviar(Request $request)
    {
        
    }

    public function excluir(Request $request)
    {
        Divulgacao::destroy($request->idExcluir);
        $mensagem = 'Divulgação excluida!';
        return redirect()->route('site.divulgações')->with('success', $mensagem);
    }
}
