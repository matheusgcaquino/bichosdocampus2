<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdotaValidacaoFormRequest;
use App\Http\Controllers\Suporte\DataController;
use App\Models\Adocao;

class AdotarAnimalController extends Controller
{
  public function adotar(AdotaValidacaoFormRequest $request)
  { 
    // Insere os dados
    $adocao = Adocao::create(
    [
      'id_animal'         => $request ->  id_animal_adocao,
      'nome_adocao'       => $request ->  nome_adocao,
      'cpf_adocao'        => $request ->  telefone_adocao,
      'endereco_adocao'   => $request ->  email_adocao,
      'telefone_adocao'   => $request ->  telefone_adocao,
      'email_adocao'      => $request ->  email_adocao,
      'status_adocao'     => 1,
      'codigo_adocao'     => "Teste"
    ]);

    // Retorna mensagem de adicionar ou não
    if ($adocao)
    {
      $response['success'] = true;
      $response['message'] = 'Requisição para adoção feita com sucesso.';
    } 
    else 
    {
      $response['success'] = false;
      $response['message'] = 'Erro na requisição para adoção.';
    }  
  
    if ($response['success'])
    {
      return redirect() 
                      -> route('site.animais')
                      -> with('success', $response['message']);
    }
    else 
    {
      return redirect()
                      -> route('site.animais')
                      -> with('error', $response['message']);
    }
  }
}
