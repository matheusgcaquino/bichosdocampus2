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
            $animal = Animal::with('pelagem', 'local', 'raca', 'raca.especie')
                ->with('foto')
                ->inRandomOrder()
            ->paginate(12);
        }else{
            $animal = Animal::with('pelagem', 'local', 'raca', 'raca.especie')
                ->with('foto')
                ->where('status_animal', '=', '1')
                ->inRandomOrder()
            ->paginate(12);
        }
            //dd($animal);
            return view('animais.publico.home.index', ["results" => $animal]);
    }
}
