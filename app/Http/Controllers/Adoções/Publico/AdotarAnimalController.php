<?php

namespace App\Http\Controllers\Adoções\Publico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdotaValidacaoFormRequest;
use App\Models\Adocao;
use App\Models\Animal;
use DateTime;

class AdotarAnimalController extends Controller
{

    public function index(Request $request)
    {
        // dd($animal);
        $animal = Animal::find($request->id_animal);
        
        return view('adoções.publico.adotar.info.index', ["results"   =>  $animal]);
    }

    public function form(Request $request)
    {
        return view('adoções.publico.adotar.formulario.index', ["id"   =>  $request->id_animal]);
    }

    // Adicionando no banco de dados
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
          'status_adocao'     => 0,
          'data_adocao'       => date('Y-m-d')
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