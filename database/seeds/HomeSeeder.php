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
        $path = Storage::putFile('home', new \Illuminate\Http\File(public_path('imagens\home2.jpg')));
        Home_imagem::create([
            'home_imagem'   =>  $path,
            'selecionada'   =>  true,
        ]);
        
        Sobre::create([
            'sobre' =>  'Escreva algo aqui!'
        ]);
    }
}
