<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\Models\Animal;
use App\Models\Especie;
use App\Models\Raca;
use App\Models\Pelagem;
use App\Models\Local;

class AnimalSeeder extends Seeder
{
    public $especie;
    public $raca;
    public $pelagem;
    public $local;

    public function addAnimal($animal)
    {
      #Busca a raça e se não existir á cria
      if(array_key_exists($animal['raca_animal'], $this->raca)){
        $id_raca = $this->raca[$animal['raca_animal']];
      }else{
        if(array_key_exists($animal['especie_animal'], $this->especie)){
          $id_especie = $this->especie[$animal['especie_animal']];
        }else{
          $es = Especie::create([
              'especie'   =>  $animal['especie_animal'],
          ]);
          $this->especie[$animal['especie_animal']] = $es->id_especie;
          // dd($this->especie);
          $id_especie = $es->id_especie;
        }
        $ra = Raca::create([
            'id_especie'    => $id_especie,
            'raca'          => $animal['raca_animal'],
        ]);
        $this->raca[$animal['raca_animal']] = $ra->id_raca;
        $id_raca = $ra->id_raca;
      }
      #Busca a pelagem e se não existir á cria
      if(array_key_exists($animal['pelagem_animal'], $this->pelagem)){
        $id_pelagem = $this->pelagem[$animal['pelagem_animal']];
      }else{
        $pe = Pelagem::create([
            'pelagem'   =>  $animal['pelagem_animal'],
        ]);
        $this->pelagem[$animal['pelagem_animal']] = $pe->id_pelagem;
        $id_pelagem = $pe->id_pelagem;
      }
      #Busca o local e se não existir o cria
      if(array_key_exists($animal['local_animal'], $this->local)){
        $id_local = $this->local[$animal['local_animal']];
      }else{
        $lo = local::create([
            'local'   =>  $animal['local_animal'],
        ]);
        $this->local[$animal['local_animal']] = $lo->id_local;
        $id_local = $lo->id_local;
      }

      $path = Storage::putFile('home', new \Illuminate\Http\File(public_path($animal['foto_perfil'])));
      #Adicionar o animal
      Animal::create([
        'nome_animal'           => $animal['nome_animal'],
        'id_raca'               => $id_raca,
        'id_pelagem'            => $id_pelagem,
        'id_local'              => $id_local,
        'idade_animal'          => $animal['idade_animal'],
        'sexo_animal'           => $animal['sexo_animal'],
        'comportamento_animal'  => $animal['comportamento_animal'],
        'castracao_animal'      => $animal['castracao_animal'],
        'descricao_animal'      => $animal['descricao_animal'],
        'status_animal'         => $animal['status_animal'],
        'foto_perfil'           => $path,
      ]);

    }

    public function run()
    {
      $this->especie = array();
      $this->raca = array();
      $this->pelagem = array();
      $this->local = array();

        $animals = 
        [
          //1
          // Gato
          ['nome_animal' => 'Frajola', 'especie_animal' => 'Gato', 'raca_animal' => 'Sem Raça',
            'foto_perfil' => 'imagens/animais/1/animal_01.jpg' ,'idade_animal' => '2017-10-15', 
            'sexo_animal' => 'M', 'pelagem_animal' =>'Branco com manchas pretas', 
            'comportamento_animal' => 'Dócil e brincalhão', 'castracao_animal' => 1, 
            'descricao_animal' =>'É um gato amigável e diposnivel para adoção', 
            'status_animal' => 1, 'local_animal' => '#1'
          ],
          //2
          ['nome_animal' => 'PiuPiu', 'especie_animal' => 'Gato', 'raca_animal' => 'Sem Raça' , 
           'foto_perfil' =>'imagens/animais/2/animal_02.jpg','idade_animal' => '2016-11-15', 'sexo_animal' => 'F',            
           'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 
           'castracao_animal' => 1, 'descricao_animal' =>'É um gato amigável e diposnivel para adoção',
           'status_animal' => 1, 'local_animal' => '#1'
          ],
          //3
          ['nome_animal' => 'Brabec', 'especie_animal' => 'Gato', 'raca_animal' => 'Sem Raça' , 
            'foto_perfil' => 'imagens/animais/3/animal_03.jpg', 'idade_animal' => '2014-07-15', 'sexo_animal' => 'M', 
            'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão',
            'castracao_animal' => 0, 'descricao_animal' =>'É um gato amigável e diposnivel para adoção', 
            'status_animal' => 1, 'local_animal' => '#1'
          ],
          //4
          ['nome_animal' => 'Fred', 'especie_animal' => 'Gato', 'raca_animal' => 'Sem Raça' , 
            'foto_perfil'=>'imagens/animais/4/animal_04.jpg','idade_animal' => '2017-02-15', 'sexo_animal' => 'M', 
            'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 
            'castracao_animal' => 1, 'descricao_animal' =>'É um gato amigável e diposnivel para adoção', 
            'status_animal' => 1, 'local_animal' => '#1'
          ],
          //5
          ['nome_animal' => 'Sereia', 'especie_animal' => 'Gato', 'raca_animal' => 'Sem Raça' , 
            'foto_perfil'=>'imagens/animais/5/animal_05.jpg','idade_animal' => '2018-10-15', 'sexo_animal' => 'F', 
            'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 
            'castracao_animal' => 1, 'descricao_animal' =>'É um gato amigável e diposnivel para adoção', 
            'status_animal' => 1, 'local_animal' => '#1'
          ],
          //6
          ['nome_animal' => 'Jiraya', 'especie_animal' => 'Gato', 'raca_animal' => 'Sem Raça' , 
            'foto_perfil'=>'imagens/animais/6/animal_06.jpg','idade_animal' => '2015-07-15', 'sexo_animal' => 'M', 
            'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 
            'castracao_animal' => 1, 'descricao_animal' =>'É um gato amigável e diposnivel para adoção', 
            'status_animal' => 1, 'local_animal' => '#2'
          ],
          //7
          ['nome_animal' => 'Joaozinho', 'especie_animal' => 'Gato', 'raca_animal' => 'Sem Raça' , 
            'foto_perfil'=>'imagens/animais/7/animal_07.jpg','idade_animal' => '2014-09-15', 'sexo_animal' => 'M', 
            'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 
            'castracao_animal' => 0, 'descricao_animal' =>'É um gato amigável e diposnivel para adoção', 
            'status_animal' => 1, 'local_animal' => '#2'
          ],
          //8
          ['nome_animal' => 'Paçoca', 'especie_animal' => 'Gato', 'raca_animal' => 'Sem Raça' , 
            'foto_perfil'=>'imagens/animais/8/animal_08.jpg','idade_animal' => '2016-04-15', 'sexo_animal' => 'M', 
            'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 
            'castracao_animal' => 1, 'descricao_animal' =>'É um gato amigável e diposnivel para adoção', 
            'status_animal' => 1, 'local_animal' => '#2'
          ],
          //9
          ['nome_animal' => 'Mel', 'especie_animal' => 'Gato', 'raca_animal' => 'Sem Raça' , 
            'foto_perfil'=>'imagens/animais/9/animal_09.jpg','idade_animal' => '2017-03-15', 'sexo_animal' => 'F', 
            'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 
            'castracao_animal' => 1, 'descricao_animal' => 'É um gato amigável e diposnivel para adoção', 
            'status_animal' => 1, 'local_animal' => '#2'
          ],
          //10
          ['nome_animal' => 'Eikinho', 'especie_animal' => 'Gato', 'raca_animal' => 'Sem Raça' , 
            'foto_perfil'=>'imagens/animais/10/animal_10.jpg','idade_animal' => '2014-07-15', 'sexo_animal' => 'M', 
            'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 
            'castracao_animal' => 0, 'descricao_animal' =>'É um gato amigável e diposnivel para adoção', 
            'status_animal' => 1, 'local_animal' => '#2'
          ],
          //11
          ['nome_animal' => 'Mary Jane', 'especie_animal' => 'Gato', 'raca_animal' => 'Sem Raça' , 
            'foto_perfil'=>'imagens/animais/11/animal_11.jpg','idade_animal' => '2017-10-15', 'sexo_animal' => 'F', 
            'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão',
            'castracao_animal' => 1, 'descricao_animal' =>'É um gata amigável e diposnivel para adoção', 
            'status_animal' => 1, 'local_animal' => '#3'
          ],
          //12
          ['nome_animal' => 'Fiona', 'especie_animal' => 'Gato', 'raca_animal' => 'Sem Raça' , 
            'foto_perfil'=>'imagens/animais/12/animal_12.png','idade_animal' => '2017-11-15', 'sexo_animal' => 'F', 
            'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 
            'castracao_animal' => 1, 'descricao_animal' =>'É um gata amigável e diposnivel para adoção', 
            'status_animal' => 1, 'local_animal' => '#3'
          ],
          //13
          ['nome_animal' => 'Bombom', 'especie_animal' => 'Gato', 'raca_animal' => 'Sem Raça' , 
            'foto_perfil'=>'imagens/animais/13/animal_13.jpg', 'idade_animal' => '2015-06-15', 'sexo_animal' => 'F', 
            'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão',
            'castracao_animal' => 1, 'descricao_animal' => 'É um gato amigável e diposnivel para adoção', 
            'status_animal' => 1, 'local_animal' => '#3'
          ],
          //14
          ['nome_animal' => 'Matheusinho', 'especie_animal' => 'Gato', 'raca_animal' => 'Sem Raça' ,
            'foto_perfil'=>'imagens/animais/14/animal_14.jpg', 'idade_animal' => '2016-05-15', 'sexo_animal' => 'M', 
            'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 
            'castracao_animal' => 0, 'descricao_animal' => 'É um gato amigável e diposnivel para adoção', 
            'status_animal' => 1, 'local_animal' => '#3'
          ],
          //15
          ['nome_animal' => 'Lua', 'especie_animal' => 'Gato', 'raca_animal' => 'Sem Raça' , 
            'foto_perfil'=>'imagens/animais/15/animal_15.jpg','idade_animal' => '2017-12-15', 'sexo_animal' => 'F', 
            'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 
            'castracao_animal' => 1, 'descricao_animal' =>'É um gata amigável e diposnivel para adoção', 
            'status_animal' => 1, 'local_animal' => '#3'
          ],
          //16
          ['nome_animal' => 'Brad Pitt', 'especie_animal' => 'Gato', 'raca_animal' => 'Sem Raça' , 
            'foto_perfil'=>'imagens/animais/16/animal_16.jpg','idade_animal' => '2015-10-15', 'sexo_animal' => 'M', 
            'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 
            'castracao_animal' => 1, 'descricao_animal' => 'É um gato amigável e diposnivel para adoção', 
            'status_animal' => 1, 'local_animal' => '#4'
          ],
          //17
          ['nome_animal' => 'Duda', 'especie_animal' => 'Gato', 'raca_animal' => 'Sem Raça' , 
            'foto_perfil'=>'imagens/animais/17/animal_17.jpg','idade_animal' => '2015-10-15', 'sexo_animal' => 'F', 
            'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 
            'castracao_animal' => 1, 'descricao_animal' =>'É um gata amigável e diposnivel para adoção', 
            'status_animal' => 1, 'local_animal' => '#4'
          ],
          //18
          ['nome_animal' => 'Robinho', 'especie_animal' => 'Gato', 'raca_animal' => 'Sem Raça' , 
            'foto_perfil'=>'imagens/animais/18/animal_18.jpg','idade_animal' => '2014-02-12', 'sexo_animal' => 'M', 
            'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Carinhoso e brincalhão', 
            'castracao_animal' => 0, 'descricao_animal' => 'É um gatinho muito amigável', 
            'status_animal' => 1, 'local_animal' => '#4'
          ],
          //19
          ['nome_animal' => 'Félix', 'especie_animal' => 'Gato', 'raca_animal' => 'Asian' , 
            'foto_perfil'=>'imagens/animais/19/animal_19.jpg','idade_animal' => '2018-04-20', 'sexo_animal' => 'M', 
            'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil', 
            'castracao_animal' => 1, 'descricao_animal' => 'É um gato que gosta de atenção', 
            'status_animal' => 1, 'local_animal' => '#4'
          ],
          //20
          ['nome_animal' => 'Fumaça', 'especie_animal' => 'Gato', 'raca_animal' => 'sem Raça' , 
            'foto_perfil'=>'imagens/animais/20/animal_20.jpg','idade_animal' => '2016-08-17', 'sexo_animal' => 'M', 
            'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Bagunceiro e brincalhão', 
            'castracao_animal' => 1, 'descricao_animal' => 'É um gato que está sempre atento a novas diversões', 
            'status_animal' => 1, 'local_animal' => '#4'
          ],
          // ----------------------------------------------------------------------- //
          // cao //
          //21
          ['nome_animal' => 'Dog', 'especie_animal' => 'Cao', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/21/animal_21.jpg','idade_animal' => '2015-08-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Bagunceiro e brincalhão', 
          'castracao_animal' => 1, 'descricao_animal' => 'É um cao que está sempre atento a novas diversões', 
          'status_animal' => 1, 'local_animal' => '#1'
          ],
          //22
          ['nome_animal' => 'Thor', 'especie_animal' => 'Cao', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/22/animal_22.jpg','idade_animal' => '2013-08-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Bagunceiro e brincalhão', 
          'castracao_animal' => 1, 'descricao_animal' => 'É um cao que está sempre atento a novas diversões', 
          'status_animal' => 1, 'local_animal' => '#1'
          ],
          //23
          ['nome_animal' => 'Luke', 'especie_animal' => 'Cao', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/23/animal_23.jpg','idade_animal' => '2017-08-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Bagunceiro e brincalhão', 
          'castracao_animal' => 1, 'descricao_animal' => 'É um cao que está sempre atento a novas diversões', 
          'status_animal' => 1, 'local_animal' => '#1'
          ],
          //24
          ['nome_animal' => 'Apolo', 'especie_animal' => 'Cao', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/24/animal_24.jpg','idade_animal' => '2018-08-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Bagunceiro e brincalhão', 
          'castracao_animal' => 1, 'descricao_animal' => 'É um cao que está sempre atento a novas diversões', 
          'status_animal' => 1, 'local_animal' => '#1'
          ],
          //25
          ['nome_animal' => 'Billy', 'especie_animal' => 'Cao', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/25/animal_25.jpg','idade_animal' => '2019-01-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Bagunceiro e brincalhão', 
          'castracao_animal' => 1, 'descricao_animal' => 'É um cao que está sempre atento a novas diversões', 
          'status_animal' => 1, 'local_animal' => '#2'
          ],
          //26
          ['nome_animal' => 'Joy', 'especie_animal' => 'Cao', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/26/animal_26.jpg','idade_animal' => '2017-10-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Bagunceiro e brincalhão', 
          'castracao_animal' => 1, 'descricao_animal' => 'É um cao que está sempre atento a novas diversões', 
          'status_animal' => 1, 'local_animal' => '#2'
          ],
          //27
          ['nome_animal' => 'Pingo', 'especie_animal' => 'Cao', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/27/animal_27.jpg','idade_animal' => '2015-12-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Bagunceiro e brincalhão', 
          'castracao_animal' => 1, 'descricao_animal' => 'É um cao que está sempre atento a novas diversões', 
          'status_animal' => 1, 'local_animal' => '#2'
          ],
          //28
          ['nome_animal' => 'Azul', 'especie_animal' => 'Cao', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/28/animal_28.jpg','idade_animal' => '2017-11-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Bagunceiro e brincalhão', 
          'castracao_animal' => 1, 'descricao_animal' => 'É um cao que está sempre atento a novas diversões', 
          'status_animal' => 1, 'local_animal' => '#2'
          ],
          //29
          ['nome_animal' => 'Jimmy', 'especie_animal' => 'Cao', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/29/animal_29.jpg','idade_animal' => '2016-08-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Bagunceiro e brincalhão', 
          'castracao_animal' => 1, 'descricao_animal' => 'É um cao que está sempre atento a novas diversões', 
          'status_animal' => 1, 'local_animal' => '#2'
          ],
          //30
          ['nome_animal' => 'Zeus', 'especie_animal' => 'Cao', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/30/animal_30.jpg','idade_animal' => '2016-04-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Bagunceiro e brincalhão', 
          'castracao_animal' => 1, 'descricao_animal' => 'É um cao que está sempre atento a novas diversões', 
          'status_animal' => 1, 'local_animal' => '#3'
          ],
          //31
          ['nome_animal' => 'Boris', 'especie_animal' => 'Cao', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/31/animal_31.jpg','idade_animal' => '2016-03-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Bagunceiro e brincalhão', 
          'castracao_animal' => 1, 'descricao_animal' => 'É um cao que está sempre atento a novas diversões', 
          'status_animal' => 1, 'local_animal' => '#3'
          ],
          //32
          ['nome_animal' => 'Scott', 'especie_animal' => 'Cao', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/32/animal_32.jpg','idade_animal' => '2014-08-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Bagunceiro e brincalhão', 
          'castracao_animal' => 1, 'descricao_animal' => 'É um cao que está sempre atento a novas diversões', 
          'status_animal' => 1, 'local_animal' => '#3'
          ],
          //33
          ['nome_animal' => 'Bob', 'especie_animal' => 'Cao', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/33/animal_33.jpg','idade_animal' => '2016-02-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Bagunceiro e brincalhão', 
          'castracao_animal' => 1, 'descricao_animal' => 'É um cao que está sempre atento a novas diversões', 
          'status_animal' => 1, 'local_animal' => '#3'
          ],
          //34
          ['nome_animal' => 'Andre', 'especie_animal' => 'Cao', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/34/animal_34.jpg','idade_animal' => '2011-12-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Bagunceiro e brincalhão', 
          'castracao_animal' => 0, 'descricao_animal' => 'É um cao que está sempre atento a novas diversões', 
          'status_animal' => 1, 'local_animal' => '#3'
          ],
          //35
          ['nome_animal' => 'Salgueiro', 'especie_animal' => 'Cao', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/35/animal_35.jpg','idade_animal' => '2013-04-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Bagunceiro e brincalhão', 
          'castracao_animal' => 0, 'descricao_animal' => 'É um cao que está sempre atento a novas diversões', 
          'status_animal' => 1, 'local_animal' => '#4'
          ],
          //36
          ['nome_animal' => 'Lili', 'especie_animal' => 'Cao', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/36/animal_36.jpg','idade_animal' => '2015-08-17', 'sexo_animal' => 'F', 
          'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Bagunceiro e brincalhão', 
          'castracao_animal' => 1, 'descricao_animal' => 'É um cao que está sempre atento a novas diversões', 
          'status_animal' => 1, 'local_animal' => '#4'
          ],
          //37
          ['nome_animal' => 'Pandora', 'especie_animal' => 'Cao', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/37/animal_37.jpg','idade_animal' => '2016-01-17', 'sexo_animal' => 'F', 
          'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Bagunceiro e brincalhão', 
          'castracao_animal' => 1, 'descricao_animal' => 'É um cao que está sempre atento a novas diversões', 
          'status_animal' => 1, 'local_animal' => '#4'
          ],
          //38
          ['nome_animal' => 'Plutos', 'especie_animal' => 'Cao', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/38/animal_38.jpg','idade_animal' => '2016-09-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Bagunceiro e brincalhão', 
          'castracao_animal' => 1, 'descricao_animal' => 'É um cao que está sempre atento a novas diversões', 
          'status_animal' => 1, 'local_animal' => '#4'
          ],
          //39
          ['nome_animal' => 'Minnie', 'especie_animal' => 'Cao', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/39/animal_39.jpg','idade_animal' => '2015-08-17', 'sexo_animal' => 'F', 
          'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Bagunceiro e brincalhão', 
          'castracao_animal' => 1, 'descricao_animal' => 'É um cao que está sempre atento a novas diversões', 
          'status_animal' => 1, 'local_animal' => '#4'
          ],
          //40
          ['nome_animal' => 'Nego Ney', 'especie_animal' => 'Cao', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/40/animal_40.jpg','idade_animal' => '2018-12-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Bagunceiro e brincalhão', 
          'castracao_animal' => 1, 'descricao_animal' => 'É um cao que está sempre atento a novas diversões', 
          'status_animal' => 1, 'local_animal' => '#4'
          ],
          // --------------------------------------------------------------//
          // Aves //          
          //41
          ['nome_animal' => 'Trovao', 'especie_animal' => 'Ave', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/41/animal_41.jpg','idade_animal' => '2017-08-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'Nao informado', 'comportamento_animal' => 'Brincalhão', 
          'castracao_animal' => 1, 'descricao_animal' => 'Canta e contagia com sua alegria', 
          'status_animal' => 1, 'local_animal' => '#4'
          ],
          //42
          ['nome_animal' => 'Falcao', 'especie_animal' => 'Ave', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/42/animal_42.jpg','idade_animal' => '2015-08-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'Nao informado', 'comportamento_animal' => 'Rápido', 
          'castracao_animal' => 1, 'descricao_animal' => 'Canta e contagia com sua alegria', 
          'status_animal' => 1, 'local_animal' => '#4'
          ],
          //43
          ['nome_animal' => 'Azulao', 'especie_animal' => 'Ave', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/43/animal_43.jpg','idade_animal' => '2018-08-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'Nao informado', 'comportamento_animal' => 'Esperta', 
          'castracao_animal' => 1, 'descricao_animal' => 'Canta e contagia com sua alegria', 
          'status_animal' => 1, 'local_animal' => '#4'
          ],
          //44
          ['nome_animal' => 'Trovador', 'especie_animal' => 'Ave', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/44/animal_44.jpg','idade_animal' => '2014-08-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'Nao informado', 'comportamento_animal' => 'Canto', 
          'castracao_animal' => 1, 'descricao_animal' => 'Canta e contagia com sua alegria', 
          'status_animal' => 1, 'local_animal' => '#4'
          ],
          //45
          ['nome_animal' => 'Mozart', 'especie_animal' => 'Ave', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/45/animal_45.jpg','idade_animal' => '2016-08-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'Nao informado', 'comportamento_animal' => 'Canto', 
          'castracao_animal' => 1, 'descricao_animal' => 'Canta e contagia com sua alegria', 
          'status_animal' => 1, 'local_animal' => '#4'
          ],
          //46
          ['nome_animal' => 'Chopin', 'especie_animal' => 'Ave', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/46/animal_46.jpg','idade_animal' => '2015-08-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'Nao informado', 'comportamento_animal' => 'Canto', 
          'castracao_animal' => 1, 'descricao_animal' => 'Canta e contagia com sua alegria', 
          'status_animal' => 1, 'local_animal' => '#4'
          ],
          //Jabutis
          //47
          ['nome_animal' => 'Mary Jane', 'especie_animal' => 'Jabuti', 'raca_animal' => 'Piranga' , 
          'foto_perfil'=>'imagens/animais/47/animal_47.jpg','idade_animal' => '2017-10-17', 'sexo_animal' => 'F', 
          'pelagem_animal' =>'A carapaça alongada e polígonos', 'comportamento_animal' => 'Bagunceiro e dorminhoco', 
          'castracao_animal' => 1, 'descricao_animal' => 'Gosta de comer, dormir mas sempre atento a novas diversões', 
          'status_animal' => 1, 'local_animal' => '#3'
          ],
          //48
          ['nome_animal' => 'Fumaça', 'especie_animal' => 'Jabuti', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/48/animal_48.jpg','idade_animal' => '2016-08-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'A carapaça alongada e polígonos', 'comportamento_animal' => 'Bagunceiro e dorminhoco', 
          'castracao_animal' => 1, 'descricao_animal' => 'Gosta de comer, dormir mas sempre atento a novas diversões', 
          'status_animal' => 1, 'local_animal' => '#3'
          ],
          //49
          ['nome_animal' => 'Fumaça', 'especie_animal' => 'Jabuti', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/49/animal_49.jpg','idade_animal' => '2016-08-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'A carapaça alongada e polígonos', 'comportamento_animal' => 'Bagunceiro e dorminhoco', 
          'castracao_animal' => 1, 'descricao_animal' => 'Gosta de comer, dormir mas sempre atento a novas diversões', 
          'status_animal' => 1, 'local_animal' => '#4'
          ],
          //50
          ['nome_animal' => 'Fumaça', 'especie_animal' => 'Jabuti', 'raca_animal' => 'sem Raça' , 
          'foto_perfil'=>'imagens/animais/50/animal_50.jpg','idade_animal' => '2016-08-17', 'sexo_animal' => 'M', 
          'pelagem_animal' =>'A carapaça alongada e polígonos', 'comportamento_animal' => 'Bagunceiro e dorminhoco', 
          'castracao_animal' => 1, 'descricao_animal' => 'Gosta de comer, dormir mas sempre atento a novas diversões', 
          'status_animal' => 1, 'local_animal' => '#4'
          ],
          
        ];

        foreach ($animals as $animal){
            $this->addAnimal($animal);   
        }
    }
}
