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
      'status_animal'         => $request -> status
    ));    

    if($request-> foto){
      $path = $request-> foto ->store('animals');

      $adicionar = DB::table('foto_animals')->insert([
        'id_animal'     => $id, 
        'foto_animal'   => $path 
      ]);    

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
    }else{
      $response['success'] = true;
      $response['message'] = 'Sucesso ao adicionar.';
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
