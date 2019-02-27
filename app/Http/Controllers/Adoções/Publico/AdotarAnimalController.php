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
        // Verifica o CPF
        $resultcpf = true;

        $cpf = preg_replace('/\D/', '', $request  ->  cpf_adocao);
        $num = array();
 
        // Cria um array
        for($i=0; $i<(strlen($cpf)); $i++) {
 
            $num[]=$cpf[$i];
        }
 
        if(count($num)!=11) 
        {
          $resultcpf = false;
        }
        else
        {        
          // Filtra os cpfs 0000 1111 2222 .....    
          for($i=0; $i<10; $i++)
          {
            if ($num[0]==$i && $num[1]==$i && $num[2]==$i
                && $num[3]==$i && $num[4]==$i && $num[5]==$i
                && $num[6]==$i && $num[7]==$i && $num[8]==$i)
                {
                  $resultcpf = false;
                  break;
                }
          }
        }
        
        if($resultcpf)
        {
          // Calcula e Compara o primeiro digito
          $j=10;
          for($i=0; $i<9; $i++)
          {
            $multiplica[$i] = $num[$i]*$j;
            $j--;
          }

          $soma = array_sum($multiplica);
          $resto = $soma%11;

          if($resto<2)
          {
            $dg=0;
          }
          else
          {
            $dg=11-$resto;
          }

          if($dg!=$num[9])
          {
            $resultcpf = false;
          }
          
          //Calcula e Compara o segundo digito
          $j=11;
          for($i=0; $i<10; $i++)
          {
            $multiplica[$i]=$num[$i]*$j;
            $j--;
          }

          $soma = array_sum($multiplica);
          $resto = $soma%11;

          if($resto<2)
          {
            $dg=0;
          }
          else
          {
            $dg=11-$resto;
          }

          if($dg!=$num[10])
          {
            $resultcpf = false;
          }
        }

        // Se resultcpf for false, quer dizer que o cpf é invalido.
        if (!$resultcpf)
        {
          $response['success'] = false;
          $response['message'] = 'CPF invalido!';

          return redirect() 
                          -> route('site.animais')
                          -> with('error', $response['message']);
        } 

        $nome = $request  ->  nome_adocao;
        $email = $request  ->  email_adocao;

          // Insere os dados da adocao
          $adocao = Adocao::create(
            [
              'id_animal'         =>  $request  ->  id_animal_adocao,
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