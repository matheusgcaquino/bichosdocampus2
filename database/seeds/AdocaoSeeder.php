<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\Models\Adocao;
use App\Models\Animal;
use App\Models\StatusAdocao;

class AdocaoSeeder extends Seeder
{
  public function addAdocao($adocao)
    {   
      #Adicionar o Adocao
      $adocaoV = Adocao::create([

        'id_animal'              => $adocao['id_animal'],
        'nome_adocao'            => $adocao['nome_adocao'],
        'nascimento_adocao'      => $adocao['nascimento_adocao'],
        'telefone_adocao'        => $adocao['telefone_adocao'],
        'email_adocao'           => $adocao['email_adocao'],
        'cpf_adocao'             => $adocao['cpf_adocao'],
        'rua_adocao'             => $adocao['rua_adocao'],
        'numero_adocao'          => $adocao['numero_adocao'],
        'complemento_adocao'     => $adocao['complemento_adocao'],
        'bairro_adocao'          => $adocao['bairro_adocao'],
        'cidade_adocao'          => $adocao['cidade_adocao'],
        'estado_adocao'          => $adocao['estado_adocao'],
        'cep_adocao'             => $adocao['cep_adocao'],
        'residencia_adocao'      => $adocao['residencia_adocao'],
      ]);

      StatusAdocao::create([
        'id_user'        => 1, 
        'status_adocao'  => $adocao['status_adocao'], 
        'comentario'     => $adocao['comentario'], 
        'id_adocao'      => $adocaoV->id_adocao,
      ]);

      $adocaoV->codigo_adocao = md5($adocaoV->id_adocao.$adocaoV->id_animal_adocao.$adocaoV->nome_adocao);
      $adocaoV->save(); 
    } 

    public function run()
    {
        $adocoes = 
        [
          // Adocao 1         
          ['id_animal' => 1, 'nome_adocao' => 'Alberto dos Santos', 'nascimento_adocao' => '01-03-1980',
          'telefone_adocao' => '999223344', 'email_adocao' => 'alberto@dcomp.ufs.br', 
          'cpf_adocao'=> '023.345.546-71', 'rua_adocao' => 'A', 'numero_adocao' => '170',
          'complemento_adocao' => '', 'bairro_adocao' => 'Castelo Branco',
          'cidade_adocao' => 'Aracaju', 'estado_adocao' => 'Sergipe', 'cep_adocao' => '49010-000',
          'status_adocao'=> 0, 'residencia_adocao' => 'casa', 'comentario' => 'Sem comentario'
          ],
          // Adocao 2         
          ['id_animal' => 2, 'nome_adocao' => 'Robson Ferreira', 'nascimento_adocao' => '12-02-1986',
          'telefone_adocao' => '999551386', 'email_adocao' => 'robson@dcomp.ufs.br', 
          'cpf_adocao'=> '023.876.092-71', 'rua_adocao' => 'B', 'numero_adocao' => '171',
          'complemento_adocao' => '', 'bairro_adocao' => 'Rosa Elze',
          'cidade_adocao' => 'Sao Cristovao', 'estado_adocao' => 'Sergipe', 'cep_adocao' => '49100-000',
          'status_adocao'=> 1, 'residencia_adocao' => 'casa', 'comentario' => 'Sem comentario'
          ],
           // Adocao 3         
           ['id_animal' => 3, 'nome_adocao' => 'Eike Batista', 'nascimento_adocao' => '01-03-1990',
           'telefone_adocao' => '988162324', 'email_adocao' => 'eike@dcomp.ufs.br', 
           'cpf_adocao'=> '023.432.546-96', 'rua_adocao' => 'C', 'numero_adocao' => '172',
           'complemento_adocao' => '', 'bairro_adocao' => 'Siqueira Campus',
           'cidade_adocao' => 'Aracaju', 'estado_adocao' => 'Sergipe', 'cep_adocao' => '49010-000',
           'status_adocao'=> 2, 'residencia_adocao' => 'Apartamento', 'comentario' => 'Sem comentario'
           ],
           // Adocao 4         
           ['id_animal' => 4, 'nome_adocao' => 'Matheus Souza', 'nascimento_adocao' => '05-06-1992',
           'telefone_adocao' => '991223435', 'email_adocao' => 'matheus@dcomp.ufs.br', 
           'cpf_adocao'=> '022.876.892-41', 'rua_adocao' => 'D', 'numero_adocao' => '173',
           'complemento_adocao' => '', 'bairro_adocao' => 'Coroa do Meio',
           'cidade_adocao' => 'Aracaju', 'estado_adocao' => 'Sergipe', 'cep_adocao' => '49010-000',
           'status_adocao'=> 0, 'residencia_adocao' => 'Casa', 'comentario' => 'Sem comentario'
           ],
            // Adocao 5         
          ['id_animal' => 5, 'nome_adocao' => 'Joao Carvalho', 'nascimento_adocao' => '01-11-1993',
          'telefone_adocao' => '981102378', 'email_adocao' => 'joao@dcomp.ufs.br', 
          'cpf_adocao'=> '043.377.146-22', 'rua_adocao' => 'E', 'numero_adocao' => '174',
          'complemento_adocao' => '', 'bairro_adocao' => 'Aruana',
          'cidade_adocao' => 'Aracaju', 'estado_adocao' => 'Sergipe', 'cep_adocao' => '49010-000',
          'status_adocao'=> 1, 'residencia_adocao' => 'Apartamento', 'comentario' => 'Sem comentario'
          ],
          // Adocao 6         
          ['id_animal' => 6, 'nome_adocao' => 'Brabec Silva', 'nascimento_adocao' => '12-02-1992',
          'telefone_adocao' => '991916678', 'email_adocao' => 'brabec@dcomp.ufs.br', 
          'cpf_adocao'=> '023.876.092-71', 'rua_adocao' => 'F', 'numero_adocao' => '175',
          'complemento_adocao' => '', 'bairro_adocao' => 'Sol Nascente',
          'cidade_adocao' => 'Aracaju', 'estado_adocao' => 'Sergipe', 'cep_adocao' => '49010-000',
          'status_adocao'=> 2, 'residencia_adocao' => 'Apartamento', 'comentario' => 'Sem comentario'
          ],
           // Adocao 7         
           ['id_animal' => 47, 'nome_adocao' => 'Andre Britto', 'nascimento_adocao' => '19-07-1981',
           'telefone_adocao' => '998772376', 'email_adocao' => 'andre@dcomp.ufs.br', 
           'cpf_adocao'=> '023.456.092-11', 'rua_adocao' => 'G', 'numero_adocao' => '176',
           'complemento_adocao' => '', 'bairro_adocao' => 'Atalaia',
           'cidade_adocao' => 'Aracaju', 'estado_adocao' => 'Sergipe', 'cep_adocao' => '49010-000',
           'status_adocao'=> 2, 'residencia_adocao' => 'casa', 'comentario' => 'Sem comentario'
           ],
           // Adocao 8         
           ['id_animal' => 44, 'nome_adocao' => 'Ricardo Salgueiro', 'nascimento_adocao' => '23-10-1973',
           'telefone_adocao' => '998775677', 'email_adocao' => 'salgueiro@dcomp.ufs.br', 
           'cpf_adocao'=> '054.656.764-45', 'rua_adocao' => 'H', 'numero_adocao' => '177',
           'complemento_adocao' => '', 'bairro_adocao' => 'Jardins',
           'cidade_adocao' => 'Aracaju', 'estado_adocao' => 'Sergipe', 'cep_adocao' => '49010-000',
           'status_adocao'=> 0, 'residencia_adocao' => 'Apartamento', 'comentario' => 'Sem comentario'
           ],
            // Adocao 9         
          ['id_animal' => 30, 'nome_adocao' => 'Gilton Mal', 'nascimento_adocao' => '01-03-1984',
          'telefone_adocao' => '988611365', 'email_adocao' => 'alberto@dcomp.ufs.br', 
          'cpf_adocao'=> '065.971.546-31', 'rua_adocao' => 'J', 'numero_adocao' => '178',
          'complemento_adocao' => '', 'bairro_adocao' => 'Sao Jose',
          'cidade_adocao' => 'Aracaju', 'estado_adocao' => 'Sergipe', 'cep_adocao' => '49010-000',
          'status_adocao'=> 1, 'residencia_adocao' => 'Apartamento', 'comentario' => 'Sem comentario'
          ],
          // Adocao 10         
          ['id_animal' => 1, 'nome_adocao' => 'Debora Monteiro', 'nascimento_adocao' => '12-02-1981',
          'telefone_adocao' => '991336544', 'email_adocao' => 'debora@dcomp.ufs.br', 
          'cpf_adocao'=> '023.876.092-71', 'rua_adocao' => 'L', 'numero_adocao' => '179',
          'complemento_adocao' => '', 'bairro_adocao' => 'Getulio Vargas',
          'cidade_adocao' => 'Aracaju', 'estado_adocao' => 'Sergipe', 'cep_adocao' => '49010-000',
          'status_adocao'=> 2, 'residencia_adocao' => 'casa', 'comentario' => 'Sem comentario'
          ],
        ];

        foreach ($adocoes as $adocao){
            $this->addAdocao($adocao);   
        }
    }   

}