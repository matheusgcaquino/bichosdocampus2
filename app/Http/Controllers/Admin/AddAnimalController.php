<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AddAnimalController extends Controller
{
  public function index(){

    return view('admin.animais.adicionar.index');
  }

  // Adicionando no banco de dados -> [EikE]
  public function adicionar(Request $request)
  { 
    // Teste
    //dd($request -> all());

    // Calcula a data do animal 
    $data = Carbon::today();
    $data -> subMonth((int)$request -> numeromeses);
    $data -> subYear((int)$request -> numeroano);

    // Insere os dados armazenando o ID
    $id = DB::table('animals') -> insertGetId(array(
      'nome_animal'           => $request -> nome,
      'especie_animal'        => $request -> especie,
      'raca_animal'           => $request -> raca,
      'idade_animal'          => $data,
      'sexo_animal'           => $request -> sexo,
      'pelagem_animal'        => $request -> pelagem,
      'comportamento_animal'  => $request -> comportamento,
      'castracao_animal'      => $request -> castrado,
      'descricao_animal'      => $request -> descricao,
      'foto_animal'           => $request -> foto
    ));    

    // Modifica o nome da foto
    $extensao = ($request -> foto -> extension());
    $nome = "{$id}.{$extensao}";
    $nameArquivo = "{$id}.{$extensao}";

    $upload = $request -> foto -> storeAs('animals', $nameArquivo);

    if(!$upload)
    {
      return redirect() -> back() -> with('error', 'Falha ao fazer o upload da imagem');
    }

    // Atualiza a foto do animal
    DB::table('animals')-> WHERE('id_animal', $id) -> update([      
      'nome_animal'           => $request -> nome,
      'especie_animal'        => $request -> especie,
      'raca_animal'           => $request -> raca,
      'idade_animal'          => $data,
      'sexo_animal'           => $request -> sexo,
      'pelagem_animal'        => $request -> pelagem,
      'comportamento_animal'  => $request -> comportamento,
      'castracao_animal'      => $request -> castrado,
      'descricao_animal'      => $request -> descricao,
      'foto_animal'           => "{$id}.{$extensao}"    
    ]) ;

    
  }
}
