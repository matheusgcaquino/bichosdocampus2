<?php
namespace App\Http\Controllers\Animais\Restrito;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalValidacaoFormRequest;
use App\Http\Controllers\Suporte\DataController;
use App\Models\Animal;
use App\Models\Raca;
use App\Models\Pelagem;
use App\Models\Especie;
use App\Models\Local;
class AddAnimalController extends Controller
{  
  public function index()
  {
    $especie = Especie::get();
    $raca = Raca::get();
    $pelagem = Pelagem::get();
    $local = Local::get();
    return view('animais.restrito.adicionar.index', ["resultsespecie"   =>  $especie, "resultsraca"   =>  $raca, "resultspelagem"   =>  $pelagem, "resultslocalizacao"   =>  $local]);
  }
  
  // Adicionando no banco de dados
  public function adicionar(AnimalValidacaoFormRequest $request)
  { 
    //dd($request->all());

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

    // Calcula a data do animal 
    $data = DataController::putData([$request->numeromeses, $request->numeroano]);
    // Insere os dados
    $animal = Animal::create([
      'nome_animal'           => $request->nome,
      'id_raca'               => $idraca,
      'idade_animal'          => $data,
      'sexo_animal'           => $request->sexo,
      'id_pelagem'            => $idpelagem,
      'comportamento_animal'  => $request->comportamento,
      'castracao_animal'      => $request->castrado,
      'descricao_animal'      => $request->descricao,
      'status_animal'         => $request->status,
      'id_local'              => $idlocal
    ]);
    
    if($animal){
      if($request->foto){
        $path = $request->foto->store('animais/'.$animal->id_animal);
        $animal->foto_perfil = $path;
        $animal->save(); 
      }
    }else{
      $mensagem = 'Erro ao adicionar.';
      return redirect()->route('adicionar.animais.index')->with('error', $mensagem);
    }

    $mensagem = 'Sucesso ao adicionar.';
    return redirect()->route('adicionar.animais.index')->with('success', $mensagem);
  }
}
