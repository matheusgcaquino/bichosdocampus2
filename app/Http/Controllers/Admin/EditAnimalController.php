<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Requests\AnimalValidacaoFormRequest;

class EditAnimalController extends Controller
{
  public function index($id){
    $results = DB::table('bichosdocampus.animals as animals')
          ->leftJoin('bichosdocampus.foto_animals as fotos', 
              'animals.id_animal', '=', 'fotos.id_animal')
          ->select('animals.*', 'fotos.foto_animal')
          ->where('animals.id_animal', '=', $id)
          ->get();
    return view('admin.animais.editar.index') -> with("results", $results[0]);
  }

    // Atualizando no banco de dados -> [EikE]
  public function atualizar(AnimalValidacaoFormRequest $request)
  { 
    // Calcula a data do animal 
    $data = Carbon::today();
    $data -> subMonth((int)$request -> numeromeses);
    $data -> subYear((int)$request -> numeroano);
    
    DB::table('animals')
      ->where('id_animal', $request -> id)
      ->update([
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
      ]);

    if($request-> foto){
      $path = $request-> foto ->store('animals');

      $adicionar = DB::table('foto_animals')
        ->where('id_animal', $request -> id)
        ->update([
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
    
    return redirect() -> route('site.animais');
  }
}
