<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        $users = 
        [
          [
            'name' => 'admin',
            'email' => 'admin@bichosdocampus.ufs.br',
            'password' => bcrypt('admin'),
            'nivel' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
          ],
        ];

        DB::table('users')->insert($users);

        // Inserindo animais
        DB::table('animals')->truncate();

        $animals = 
        [
          ['nome_animal' => 'Frajola', 'especie_animal' => 'Gato', 'raca_animal' => 'Siames' , 'idade_animal' => '2015-10-15', 'sexo_animal' => 'M', 
		        'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 'castracao_animal' => 1, 'descricao_animal' => 
            'É um gato amigável e diposnivel para adoção', 'status_animal' => 1
          ],
          ['nome_animal' => 'PiuPiu', 'especie_animal' => 'Gato', 'raca_animal' => 'Siames' , 'idade_animal' => '2015-10-15', 'sexo_animal' => 'M', 
		        'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 'castracao_animal' => 1, 'descricao_animal' => 
            'É um gato amigável e diposnivel para adoção', 'status_animal' => 1
          ],


          ['nome_animal' => 'Brabec', 'especie_animal' => 'Gato', 'raca_animal' => 'Siames' , 'idade_animal' => '2015-10-15', 'sexo_animal' => 'M', 
		        'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 'castracao_animal' => 1, 'descricao_animal' => 
            'É um gato amigável e diposnivel para adoção', 'status_animal' => 1
          ],

          ['nome_animal' => 'Fred', 'especie_animal' => 'Gato', 'raca_animal' => 'Siames' , 'idade_animal' => '2015-10-15', 'sexo_animal' => 'M', 
		        'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 'castracao_animal' => 1, 'descricao_animal' => 
            'É um gato amigável e diposnivel para adoção', 'status_animal' => 1
          ],

          ['nome_animal' => 'Sereia', 'especie_animal' => 'Gato', 'raca_animal' => 'Siames' , 'idade_animal' => '2015-10-15', 'sexo_animal' => 'M', 
		        'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 'castracao_animal' => 1, 'descricao_animal' => 
            'É um gato amigável e diposnivel para adoção', 'status_animal' => 1
          ],

          ['nome_animal' => 'Jiraya', 'especie_animal' => 'Gato', 'raca_animal' => 'Siames' , 'idade_animal' => '2015-10-15', 'sexo_animal' => 'M', 
      		  'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 'castracao_animal' => 1, 'descricao_animal' => 
            'É um gato amigável e diposnivel para adoção', 'status_animal' => 1
          ],

          ['nome_animal' => 'Joaozinho', 'especie_animal' => 'Gato', 'raca_animal' => 'Siames' , 'idade_animal' => '2015-10-15', 'sexo_animal' => 'M', 
      		  'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 'castracao_animal' => 1, 'descricao_animal' => 
            'É um gato amigável e diposnivel para adoção', 'status_animal' => 1
          ],

          ['nome_animal' => 'Paçoca', 'especie_animal' => 'Gato', 'raca_animal' => 'Siames' , 'idade_animal' => '2015-10-15', 'sexo_animal' => 'M', 
      		  'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 'castracao_animal' => 1, 'descricao_animal' => 
            'É um gato amigável e diposnivel para adoção', 'status_animal' => 1
          ],

          ['nome_animal' => 'Mel', 'especie_animal' => 'Gato', 'raca_animal' => 'Siames' , 'idade_animal' => '2015-10-15', 'sexo_animal' => 'M', 
      		  'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 'castracao_animal' => 1, 'descricao_animal' => 
            'É um gato amigável e diposnivel para adoção', 'status_animal' => 1
          ],

          ['nome_animal' => 'Eikinho', 'especie_animal' => 'Gato', 'raca_animal' => 'Siames' , 'idade_animal' => '2015-10-15', 'sexo_animal' => 'M', 
      		  'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 'castracao_animal' => 1, 'descricao_animal' => 
            'É um gato amigável e diposnivel para adoção', 'status_animal' => 1
          ],

          ['nome_animal' => 'Mary Jane', 'especie_animal' => 'Gato', 'raca_animal' => 'Siames' , 'idade_animal' => '2015-10-15', 'sexo_animal' => 'M', 
      		  'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 'castracao_animal' => 1, 'descricao_animal' => 
            'É um gato amigável e diposnivel para adoção', 'status_animal' => 1
          ],

          ['nome_animal' => 'Fiona', 'especie_animal' => 'Gato', 'raca_animal' => 'Siames' , 'idade_animal' => '2015-10-15', 'sexo_animal' => 'M', 
      		  'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 'castracao_animal' => 1, 'descricao_animal' => 
            'É um gato amigável e diposnivel para adoção', 'status_animal' => 1
          ],

          ['nome_animal' => 'Bombom', 'especie_animal' => 'Gato', 'raca_animal' => 'Siames' , 'idade_animal' => '2015-10-15', 'sexo_animal' => 'M', 
      		  'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 'castracao_animal' => 1, 'descricao_animal' => 
            'É um gato amigável e diposnivel para adoção', 'status_animal' => 1
          ],

          ['nome_animal' => 'Matheusinho', 'especie_animal' => 'Gato', 'raca_animal' => 'Siames' , 'idade_animal' => '2015-10-15', 'sexo_animal' => 'M', 
      		  'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 'castracao_animal' => 1, 'descricao_animal' => 
            'É um gato amigável e diposnivel para adoção', 'status_animal' => 1
          ],

          ['nome_animal' => 'Lua', 'especie_animal' => 'Gato', 'raca_animal' => 'Siames' , 'idade_animal' => '2015-10-15', 'sexo_animal' => 'M', 
      		  'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 'castracao_animal' => 1, 'descricao_animal' => 
            'É um gato amigável e diposnivel para adoção', 'status_animal' => 1
          ],

          ['nome_animal' => 'Brad Pitt', 'especie_animal' => 'Gato', 'raca_animal' => 'Siames' , 'idade_animal' => '2015-10-15', 'sexo_animal' => 'M', 
      		  'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 'castracao_animal' => 1, 'descricao_animal' => 
            'É um gato amigável e diposnivel para adoção', 'status_animal' => 1
          ],

          ['nome_animal' => 'Duda', 'especie_animal' => 'Gato', 'raca_animal' => 'Siames' , 'idade_animal' => '2015-10-15', 'sexo_animal' => 'M', 
      		  'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil e brincalhão', 'castracao_animal' => 1, 'descricao_animal' => 
            'É um gato amigável e diposnivel para adoção', 'status_animal' => 1
          ],

          ['nome_animal' => 'Robinho', 'especie_animal' => 'Gato', 'raca_animal' => 'Sem Raça' , 'idade_animal' => '2014-02-12', 'sexo_animal' => 'M', 
      		  'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Carinhoso e brincalhão', 'castracao_animal' => 1, 'descricao_animal' => 
            'É um gatinho muito amigável', 'status_animal' => 1
          ],

          ['nome_animal' => 'Félix', 'especie_animal' => 'Gato', 'raca_animal' => 'Asian' , 'idade_animal' => '2014-04-20', 'sexo_animal' => 'M', 
      		  'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Dócil', 'castracao_animal' => 1, 'descricao_animal' => 
            'É um gato que gosta de atenção', 'status_animal' => 1
          ],

          ['nome_animal' => 'Fumaça', 'especie_animal' => 'Gato', 'raca_animal' => 'em Raça' , 'idade_animal' => '2016-08-17', 'sexo_animal' => 'M', 
      		  'pelagem_animal' =>'Branco com manchas pretas', 'comportamento_animal' => 'Bagunceiro e brincalhão', 'castracao_animal' => 1, 'descricao_animal' => 
            'É um gato que está sempre atento a novas diversões', 'status_animal' => 1
          ],
        ];

        DB::table('animals')->insert($animals);

        //inserir foto 
        // Inserindo animais
        DB::table('foto_animals')->truncate();

        $foto_animals = [
        ['id_animal' => 1, 'foto_animal' => 'animals/animal_01.jpg'],
	      ['id_animal' => 2, 'foto_animal' => 'animals/animal_02.jpg'],  
	      ['id_animal' => 3, 'foto_animal' => 'animals/animal_03.jpg'] , 
	      ['id_animal' => 4, 'foto_animal' => 'animals/animal_04.jpg']  ,
	      ['id_animal' => 5, 'foto_animal' => 'animals/animal_05.jpg'] , 
	      ['id_animal' => 6, 'foto_animal' => 'animals/animal_06.jpg'] , 
	      ['id_animal' => 7, 'foto_animal' => 'animals/animal_07.jpg'] , 
	      ['id_animal' => 8, 'foto_animal' => 'animals/animal_08.jpg']  ,
	      ['id_animal' => 9, 'foto_animal' => 'animals/animal_09.jpg']  ,
	      ['id_animal' => 10, 'foto_animal' => 'animals/animal_10.jpg']  ,
	      ['id_animal' => 11, 'foto_animal' => 'animals/animal_11.jpg']  ,
	      ['id_animal' => 12, 'foto_animal' => 'animals/animal_12.jpg'] , 
	      ['id_animal' => 13, 'foto_animal' => 'animals/animal_13.jpg'] , 
	      ['id_animal' => 14, 'foto_animal' => 'animals/animal_14.jpg'] , 
	      ['id_animal' => 15, 'foto_animal' => 'animals/animal_15.jpg'] , 
	      ['id_animal' => 16, 'foto_animal' => 'animals/animal_16.jpg'] , 
	      ['id_animal' => 17, 'foto_animal' => 'animals/animal_17.jpg'] , 
	      ['id_animal' => 18, 'foto_animal' => 'animals/animal_18.jpg'] , 
	      ['id_animal' => 19, 'foto_animal' => 'animals/animal_19.jpg'] , 
	      ['id_animal' => 20, 'foto_animal' => 'animals/animal_20.jpg'] ,
         ];

        DB::table('foto_animals')->insert($foto_animals);
    }
}
