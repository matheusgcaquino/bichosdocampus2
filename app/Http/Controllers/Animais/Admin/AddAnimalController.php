<?php

namespace App\Http\Controllers\Animais\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalValidacaoFormRequest;
use App\Http\Controllers\Suporte\DataController;
use App\Models\Animal;

class AddAnimalController extends Controller{
  
  public function index(){
    return view('animais.admin.adicionar.index');
  }

  // Adicionando no banco de dados
  public function adicionar(AnimalValidacaoFormRequest $request){ 

    // Calcula a data do animal 
    $data = DataController::putData([$request->numeromeses, $request->numeroano]);

    // Insere os dados
    $animal = Animal::create([
      'nome_animal'           => $request->nome,
      'especie_animal'        => $request->especie,
      'raca_animal'           => $request->raca,
      'idade_animal'          => $data,
      'sexo_animal'           => $request->sexo,
      'pelagem_animal'        => $request->pelagem,
      'comportamento_animal'  => $request->comportamento,
      'castracao_animal'      => $request->castrado,
      'descricao_animal'      => $request->descricao,
      'status_animal'         => $request->status
    ]);
    
    if($animal){
      if($request->foto){
        $path = $request->foto->store('animais/'.$animal->id_animal);
        
        $animal->foto_perfil = $path;
        
        $animal->save();        
      }
    }

    // Retorna mensagem de adicionar ou não
    if ($animal)
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

    return redirect()->route('adicionar.animais');
  }
}
