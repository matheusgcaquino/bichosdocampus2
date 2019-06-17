<?php

namespace App\Http\Controllers\Animais\Publico;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Raca;
use App\Models\Foto_animal;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Suporte\DataController;

class AnimaisController extends Controller
{
    
    public function index()
    {
        if(Auth::check()){
            $animal = Animal::with('pelagem', 'local', 'raca', 'raca.especie')->inRandomOrder()
            ->paginate(12);
            $fotoanimal = Foto_animal::get();
        }else{
            $animal = Animal::with('pelagem', 'local', 'raca', 'raca.especie')
                ->where('status_animal', '=', '1')
                ->inRandomOrder()
            ->paginate(12);
            $fotoanimal = Foto_animal::get();
        }
            //dd($animal);
            return view('animais.publico.home.index', 
            [
                "results"           =>  $animal,
                "resultsfotos"      =>  $fotoanimal
            ]);
    }
}
