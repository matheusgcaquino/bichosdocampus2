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
            $response = Sobre::first();
        } else {
            $response = Home_imagem::paginate(15);
        }
        
        return view('config.pagina_inicial.index', [
            "results"   =>  $response,
            'tipo'      =>  $tipo
        ]); 
    }
    
    public function editarSobre(Request $request)
    {
        $response = Sobre::first();
        $response->sobre = $request->text;
        $response->save();
        return redirect()->route('config.paginaInicial', ['tipo' => 'sobre']);
    }

    public function excluir(Request $request)
    {
        Home_imagem::destroy($request->idHome);
        return redirect()->route('config.paginaInicial', ['tipo' => 'imagem']);
    }

    public function selecionar(Request $request)
    {
        $response = Home_imagem::where('selecionada', true)->first();
        if ($response) {
            $response->selecionada = false;
            $response->save();
        }

        $response = Home_imagem::find($request->idHome);
        $response->selecionada = true;
        $response->save();
        return redirect()->route('config.paginaInicial', ['tipo' => 'imagem']);
    }

    public function adicionar(Request $request)
    {
        if ($request->foto) {
            $path = $request->foto->store('home');
            if ($request->selecionada) {
                $response = Home_imagem::where('selecionada', true)->first();
                if ($response) {
                    $response->selecionada = false;
                    $response->save();
                }
                $selecionada = true;
            } else {
                $selecionada = false;
            }
            Home_imagem::create([
                'home_imagem'        =>  $path,
                'selecionada'   =>  $selecionada,
            ]);
        }
        return redirect()->route('config.paginaInicial', ['tipo' => 'imagem']);
    }
}
