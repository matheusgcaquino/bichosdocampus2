<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Suporte\DataController;
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
    return view('admin.animais.editar.index') -> with("result", $results[0]);
  }

    // Atualizando no banco de dados -> [EikE]
  public function atualizar(Request $request){ 
    // Calcula a data do animal 
    $data = DataController::putData([$request -> numeromeses, $request -> numeroano]);
    
    $reposta = DB::table('animals')
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
