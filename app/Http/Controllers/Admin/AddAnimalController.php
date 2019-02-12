<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Requests\AnimalValidacaoFormRequest;

class AddAnimalController extends Controller
{
  public function index()
  {
    return view('admin.animais.adicionar.index');
  }

  // Adicionando no banco de dados -> [EikE]
  public function adicionar(AnimalValidacaoFormRequest $request)
  { 
    // Teste
    //dd($request -> all());

    // Calcula a data do animal 
    $data = Carbon::today();
    $data -> subMonth((int)$request -> numeromeses);
    $data -> subYear((int)$request -> numeroano);
    if ($request -> status == 'Ativado'){
      $status = 1;
    }else{
      $status = 0;
    }

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
      'foto_animal'           => $request -> foto,
      'status_animal'         => $status
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
    $adicionar = DB::table('animals')-> WHERE('id_animal', $id) -> update([      
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

    // Retorna mensagem de adicionar ou não
    if ($adicionar)
    {
      $response['success'] = true;
      $response['message'] = 'Sucesso ao adicionar.';
    } 
    else 
    {
      $response['success'] = false;
      $response['message'] = 'Erro ao adicionar.';
    }
    
    if ($response['success'])
    {
      return redirect() 
                        -> route('adicionar.animais')
                        -> with('success', $response['message']);
    }
    else 
    {
      return redirect()
                        -> route('adicionar.animais')
                        -> with('error', $response['message']);
    }
  }
}
