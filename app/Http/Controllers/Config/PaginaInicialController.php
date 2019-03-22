<?php

namespace App\Http\Controllers\Config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sobre;
use App\Models\Home_imagem;

class PaginaInicialController extends Controller
{
    public function index($tipo)
    {
        if ($tipo == "sobre") {
            $reponse = Sobre::first();
        } else {
            $reponse = Home_imagem::paginate(15);
        }
        
        return view('config.pagina_inicial.index', [
            "results"   =>  $reponse,
            'tipo'      =>  $tipo
        ]); 
    }
    
    public function editar(Request $request)
    {
        # code...
    }

    public function excluir(Request $request)
    {
        # code...
    }
}
