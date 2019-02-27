<?php

namespace App\Http\Controllers\Adoções\Publico;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdotaValidacaoFormRequest;
use App\Models\Adocao;
use App\Models\Animal;
use DateTime;
use App\Http\Controllers\Suporte\CpfController;

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
      
      

        // Se resultcpf for false, quer dizer que o cpf é invalido.
        if (!CpfController::validar($request->cpf_adocao)){
          $response['success'] = false;
          $response['message'] = 'CPF invalido!';

          return redirect() 
                          -> route('site.animais')
                          -> with('error', $response['message']);
        } 

        $nome = $request->nome_adocao;
        $email = $request  ->  email_adocao;

          // Insere os dados da adocao
          $adocao = Adocao::create(
            [
              'id_animal'         =>  $request  ->  id_animal,
              'nome_adocao'       =>  $request  ->  nome_adocao,
              'nascimento_adocao' =>  $request  ->  nascimento_adocao,
              'telefone_adocao'   =>  $request  ->  telefone_adocao,
              'email_adocao'      =>  $request  ->  email_adocao,
              'cpf_adocao'        =>  $request  ->  cpf_adocao,
              'logradouro_adocao' =>  $request  ->  logradouro_adocao,
              'bairro_adocao'     =>  $request  ->  bairro_adocao,
              'cep_adocao'        =>  $request  ->  cep_adocao,
              'cidade_adocao'     =>  $request  ->  cidade_adocao,
              'estado_adocao'     =>  $request  ->  estado_adocao,
              'residencia_adocao' =>  $request  ->  cep_adocao,
              'status_adocao'     =>  0,
            ]);
    
            //Gerando codigo da adocao
            if($adocao)
            {
              $codigo = Hash::make($adocao->id_adocao . $adocao->id_animal_adocao . $adocao->nome_adocao);
    
              $adocao->save();      
            }
      
          // Retorna mensagem de adicionar ou não
          if ($adocao)
          {
            Mail::send('mail.treinaweb', ['nome_adocao' => $nome], function($m) use ($email, $nome)
            {
              $m -> from('bichusufs@gmail.com', "Bichos do Campus");
              $m -> to($email, $nome) -> Subject('Pedido de Adoção'); 
            });

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