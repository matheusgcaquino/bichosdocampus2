<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Animal;

class AnimaisController extends Controller{
    
    public function index(){
        
        $animal = Animal::paginate(12);
            return view('site.animais.index', ["results"   =>  $animal]);
    }

    public function buscar($buscar){
        if($buscar != ""){
            $animal = Animal::where('nome_animal', 'LIKE', '%' . $buscar . '%' )
                            ->orWhere('especie_animal', 'LIKE', '%' . $buscar . '%')
                            ->paginate(12);
        }else{
            $animal = Animal::paginate(12);
        }
        return view('site.animais.index',
            [
                "results"   =>  $animal,
                "buscar"    =>  $buscar
            ]);
    }
}
