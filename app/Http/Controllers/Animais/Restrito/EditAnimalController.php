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
use App\Models\Foto_animal;

class EditAnimalController extends Controller
{
  public function index($id)
  {
    $animal = Animal::with('raca.especie')->find($id);
    $especie = Especie::get();
    $raca = Raca::where('id_especie', $animal->raca->especie->id_especie)->get();
    $pelagem = Pelagem::get();
    $local = Local::get();
    $fotoanimal = Foto_animal::where('id_animal',$id)->get();

    //dd($fotoanimal->count());

    return view('animais.restrito.editar.index', 
      [
        "result"              =>  $animal,
        "resultsespecie"      =>  $especie, 
        "resultsraca"         =>  $raca, 
        "resultspelagem"      =>  $pelagem, 
        "resultslocalizacao"  =>  $local,
        "resultsfotos"        =>  $fotoanimal
      ]);
  }

    // Atualizando no banco de dados -> [EikE]
  public function atualizar(Request $request)
  {
    
    // Armazena os ids
    $idespecie = $request->especie;
    $idraca = $request->raca;
    $idpelagem = $request->pelagem;
    $idlocal = $request->localizacao;

    // Verifica se teve novas especies, raças e pelagem
    if($request->novaespecie == '1')
    {
      $especie = Especie::create([
        'especie'             => $request->especie
      ]);
      $idespecie = $especie->id_especie;
    }
    if($request->novaraca == '1')
    {
      $raca = Raca::create([
        'id_especie'       => $idespecie,
        'raca'             => $request->raca
      ]);
      $idraca = $raca->id_raca;
    }
    if($request->novapelagem == '1')
    {
      $pelagem = Pelagem::create([
        'pelagem'             => $request->pelagem
      ]);
      $idpelagem = $pelagem->id_pelagem;
    }
    if($request->novalocalizacao == '1')
    {
      $local = Local::create([
        'local'             => $request->localizacao
      ]);
      $idlocal = $local->id_local;
    }

    $animal = Animal::find($request->id);    
    
    //dd($idraca);

    // Calcula a data do animal 
    $data = DataController::putData([$request->numeromeses, $request->numeroano]);
    
    $animal->nome_animal == $request->nome    ?: $animal->nome_animal = $request->nome;

    $animal->id_raca == $idraca               ?: $animal->id_raca = $idraca;

    $animal->idade_animal == $data            ?: $animal->idade_animal = $data;

    $animal->sexo_animal == $request->sexo    ?: $animal->sexo_animal = $request->sexo;

    $animal->id_pelagem == $idpelagem         ?: $animal->id_pelagem = $idpelagem;

    $animal->id_local == $idlocal             ?: $animal->id_local = $idlocal;

    $animal->comportamento_animal == $request->comportamento ?: 
        $animal->comportamento_animal = $request->comportamento;

    $animal->castracao_animal == $request->castrado ?: $animal->castracao_animal = $request->castrado;

    $animal->descricao_animal == $request->descricao ?: $animal->descricao_animal = $request->descricao;

    $animal->status_animal == $request->status ?: $animal->status_animal = $request->status;
    
    // Busca as fotos do animal
    $fotoanimal = Foto_animal::where('id_animal',$request->id)->get();
    $qtdfoto = $fotoanimal->count();

    //dd($fotoanimal[0]->id_foto_animals);
    //dd($request->all());

    if($request->foto_1){
        $path = $request->foto_1->store('animais/'.$animal->id_animal);
        $animal->foto_perfil = $path;
    }
    
    if($request->foto_2 || $request->excluirFoto_2){      
      if($request->excluirFoto_2){
        //So deleta se existir uma foto ou mais
        if($qtdfoto > 0)
        {
          Foto_animal::where('id_foto_animals', $fotoanimal[0]->id_foto_animals)->delete();
        }
      }else{        
        //Se nao existir foto ele cria     
        if($qtdfoto == 0)
        {
          $path_2 = $request->foto_2->store('animais/'.$animal->id_animal);
          Foto_animal::create([
            'id_animal'         => $animal->id_animal,
            'foto_animal'       => $path_2
          ]);
        //Se existir ele altera
        } else {
          $path_2 = $request->foto_2->store('animais/'.$animal->id_animal);
          Foto_animal::where('id_foto_animals', $fotoanimal[0]->id_foto_animals)->update(array('foto_animal' => $path_2));
        }
      }
    }

    if($request->foto_3 || $request->excluirFoto_3){      
      if($request->excluirFoto_3){
        //So deleta se existir uma foto ou mais
        if($qtdfoto > 1)
        {
          Foto_animal::where('id_foto_animals', $fotoanimal[1]->id_foto_animals)->delete();
        }
      }else{        
        //Se nao existir foto ele cria     
        if($qtdfoto == 1)
        {
          $path_3 = $request->foto_3->store('animais/'.$animal->id_animal);
          Foto_animal::create([
            'id_animal'         => $animal->id_animal,
            'foto_animal'       => $path_3
          ]);
        //Se existir ele altera
        } else {
          $path_3 = $request->foto_3->store('animais/'.$animal->id_animal);
          Foto_animal::where('id_foto_animals', $fotoanimal[1]->id_foto_animals)->update(array('foto_animal' => $path_3));
        }
      }
    }
    
    $animal->save();

    return redirect()->route('site.animais');
  }
}
