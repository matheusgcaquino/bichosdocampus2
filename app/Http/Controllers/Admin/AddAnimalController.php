<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddAnimalController extends Controller
{
  public function index(){

    return view('admin.animais.adicionar.index');
  }

  public function adicionar(Request $request)
  { 
    // Teste
    //dd($request -> all());
     
    // Adicionando no banco de dados -> [EikE]
    auth() -> user() -> animals() -> create([
            'nome_animal'           => $request -> nome,
            'raca_animal'           => $request -> raca,
            'idade_animal'          => '2011-08-01',
            'sexo_animal'           => $request -> sexo,
            'pelagem_animal'        => $request -> pelagem,
            'comportamento_animal'  => $request -> comportamento,
            'castracao_animal'      => $request -> castrado,
            'descricao_animal'      => $request -> descricao,
            'foto_animal'           => $request -> foto
        ]);
  }
}
