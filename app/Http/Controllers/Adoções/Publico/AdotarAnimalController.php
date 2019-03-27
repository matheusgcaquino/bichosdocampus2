<?php

namespace App\Http\Controllers\Adoções\Publico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdotaValidacaoFormRequest;
use App\Http\Controllers\Suporte\CpfController;
use App\Http\Controllers\Suporte\AdocaoController;
use App\Models\Adocao;
use App\Models\StatusAdocao;
use App\Models\Animal;
use App\Mail\AdocaoConfirmada;
use DateTime;
use Mail;

class AdotarAnimalController extends Controller
{

  public function index(Request $request)
  {
    $animal = Animal::find($request->id_animal);
    return view('adoções.publico.adotar.info.index')->with("results", $animal);
  }

  public function form(Request $request)
  {
    return view('adoções.publico.adotar.formulario.index')->with("id", $request->id_animal );
  }

  // Adicionando no banco de dados
  public function adotar(AdotaValidacaoFormRequest $request)
  { 
    //dd($request->all());
    // Se resultcpf for false, quer dizer que o cpf é invalido.
    if (!AdocaoController::validarCPF($request->cpf_adocao)){
      $mensagem = 'CPF Invalido!';
      return redirect()->route('site.animais')->with('error', $mensagem)->withInput(Input::all());
    }
    // Se resultdata for false, quer dizer que a data é invalido.
    if (!AdocaoController::validarData($request->nascimento_adocao)){
      $mensagem = 'Data invalida!';
      return redirect()->route('site.animais')->with('error', $mensagem)->withInput(Input::all());
    } 

    $get = Adocao::where('id_animal', $request->id_animal)
      ->where('cpf_adocao', $request->cpf_adocao)
    ->first();

    if (!$get) {
      $nome = $request->nome_adocao;
      $email = $request->email_adocao;

      // Insere os dados da adocao
      $adocao = Adocao::create([
        'id_animal'         =>  $request->id_animal,
        'nome_adocao'       =>  $request->nome_adocao,
        'nascimento_adocao' =>  $request->nascimento_adocao,
        'telefone_adocao'   =>  $request->telefone_adocao,
        'email_adocao'      =>  $request->email_adocao,
        'cpf_adocao'        =>  $request->cpf_adocao,
        'cep_adocao'        =>  $request->cep_adocao,
        'rua_adocao'        =>  $request->rua_adocao,
        'complemento_adocao'=>  $request->complemento_adocao, 
        'numero_adocao'     =>  $request->numero_adocao,
        'bairro_adocao'     =>  $request->bairro_adocao,      
        'cidade_adocao'     =>  $request->cidade_adocao,
        'estado_adocao'     =>  $request->estado_adocao,
        'residencia_adocao' =>  $request->moro_adocao,
      ]);

      if($adocao){
        $status = StatusAdocao::create([
          'id_adocao' =>  $adocao->id_adocao,
        ]);

        $adocao->codigo_adocao = md5($adocao->id_adocao.$adocao->id_animal_adocao.$adocao->nome_adocao);
        $adocao->save();   

        Mail::to($request->email_adocao)->send(new AdocaoConfirmada($adocao));

        $mensagem = 'Requisição para adoção feita com sucesso.';
        return redirect()->route('site.animais')->with('success', $mensagem);
      } else {
        $mensagem = 'Erro na requisição para adoção.';
        return redirect()->route('site.animais')->with('error', $mensagem)->withInput(Input::all());
      }
    } else {
      $mensagem = 'Você já um requição para esse animal e não pode fazer outra.';
      return redirect()->route('site.animais')->with('error', $mensagem);
    }
  }       
}