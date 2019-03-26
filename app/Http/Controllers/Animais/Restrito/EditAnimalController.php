<?php

namespace App\Http\Controllers\Animais\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Suporte\DataController;
use Illuminate\Support\Facades\Storage;
use App\Models\Animal;
use App\Models\Raca;
use App\Models\Pelagem;
use App\Models\Especie;
use App\Models\Local;

class EditAnimalController extends Controller
{
  public function index($id)
  {
    $animal = Animal::with('raca.especie')->find($id);
    $especie = Especie::get();
    $raca = Raca::where('id_especie', $animal->raca->especie->id_especie)->get();
    $pelagem = Pelagem::get();
    $local = Local::get();
    return view('animais.restrito.editar.index', 
      [
        "result" => $animal,
        "resultsespecie"   =>  $especie, 
        "resultsraca"   =>  $raca, 
        "resultspelagem"   =>  $pelagem, 
        "resultslocalizacao"   =>  $local
      ]);
  }

    // Atualizando no banco de dados -> [EikE]
  public function atualizar(Request $request)
  {
    $animal = Animal::find($request->id);
    
    // Calcula a data do animal 
    $data = DataController::putData([$request->numeromeses, $request->numeroano]);
    
    $animal->nome_animal == $request->nome ?: $animal->nome_animal = $request->nome;

    $animal->especie_animal == $request->especie ?: $animal->especie_animal = $request->especie;

    $animal->raca_animal == $request->raca ?: $animal->raca_animal = $request->raca;

    $animal->idade_animal == $data ?: $animal->idade_animal = $data;

    $animal->sexo_animal == $request->sexo ?: $animal->sexo_animal = $request->sexo;

    $animal->pelagem_animal == $request->pelagem ?: $animal->pelagem_animal = $request->pelagem;

    $animal->comportamento_animal == $request->comportamento ?: 
        $animal->comportamento_animal = $request->comportamento;

    $animal->castracao_animal == $request->castrado ?: $animal->castracao_animal = $request->castrado;

    $animal->descricao_animal == $request->descricao ?: $animal->descricao_animal = $request->descricao;

    $animal->status_animal == $request->status ?: $animal->status_animal = $request->status;
    
    if($request->foto || $request->excluirFoto){
      Storage::delete($animal->foto_perfil);
      if($request->excluirFoto){
        $animal->foto_perfil = null;
      }else{
        $path = $request->foto->store('animais/'.$animal->id_animal);
        $animal->foto_perfil = $path;
      }
    }
    $animal->save();

    return redirect()->route('site.animais');
  }
}
