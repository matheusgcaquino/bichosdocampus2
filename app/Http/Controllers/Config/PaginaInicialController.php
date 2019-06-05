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
            return view('config.pagina_inicial.sobre.index', [
                "results"   =>  $response
            ]); 
        } else {
            $response = Home_imagem::paginate(15);
            return view('config.pagina_inicial.imagem.index', [
                "results"   =>  $response
            ]); 
        }        
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
        if ($request->posicao > 0) {
            $response = Home_imagem::where('posicao', '=', $request->posicao)->first();
            if ($response) {
                $response->posicao = 0;
                $response->save();
            }

            $response = Home_imagem::find($request->idHome);
            $response->posicao = $request->posicao;
            $response->save();
        }
        return redirect()->route('config.paginaInicial', ['tipo' => 'imagem']);
    }

    public function adicionar(Request $request)
    {
        if ($request->foto) {
            $path = $request->foto->store('home');
            if ($request->posicao > 0) {
                $response = Home_imagem::where('posicao', '=', $request->posicao)->first();
                if ($response) {
                    $response->posicao = 0;
                    $response->save();
                }
            }
            Home_imagem::create([
                'home_imagem'   =>  $path,
                'posicao'   =>  $request->posicao,
            ]);
        }
        return redirect()->route('config.paginaInicial', ['tipo' => 'imagem']);
    }

    public function editar(Request $request)
    {
        $response = Home_imagem::where('posicao', '=', $request->posicao)->first();
        if ($response) {
            $r2 = Home_imagem::find($request->idHome);
            $response->posicao = $r2->posicao;
            $r2->posicao = $request->posicao;
            $response->save();
            $r2->save();
        } else {
            $response = Home_imagem::find($request->idHome);
            $response->posicao = $request->posicao;
            $response->save();   
        }
        return redirect()->route('config.paginaInicial', ['tipo' => 'imagem']);        
    }
}
