<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AnimaisController extends Controller
{
    public function index()
    {
        $results = DB::select('SELECT * FROM `bichosdocampus`.`animals` ORDER BY `id_animal` ASC LIMIT 1000;');

        return view('site.animais.index') -> with("results", $results);
    }

    public function buscar()
    {
        $animal = DB::table('animals')->where('nome_animal', 'Cachorro2')->first();
        echo $animal -> especie_animal;
    }
}
