<?php

use Illuminate\Database\Seeder;
use App\Models\Home_imagem;
use App\Models\Sobre;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = Storage::putFile('home', new \Illuminate\Http\File(public_path('imagens/home2.jpg')));
        Home_imagem::create([
            'home_imagem'   =>  $path,
            'selecionada'   =>  true,
        ]);
        
        Sobre::create([
            'sobre' =>  '<h4 style="color: white;">A <strong>Bichos do Campus</strong>, nasceu como um grupo de pessoas
            que visa o bem-estar animal e acredita que todo animal precisa de um lar cheio de amor e carinho!</h4>';
        ]);
    }
}
