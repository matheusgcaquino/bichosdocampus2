<?php

namespace App\Http\Controllers\Animais\Publico;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Support\Facades\Gate;

class AnimaisController extends Controller{
    
    public function index(){
        if(Gate::allows('auth')){
            $animal = Animal::paginate(12);
        }else{
            $animal = Animal::where('status_animal', '=', '1')
                            ->paginate(12);
        }
            return view('animais.publico.home.index', ["results"   =>  $animal]);
    }

    public function buscar($buscar){
        if($buscar != ""){
            if(Gate::allows('auth')){
                $animal = Animal::where('nome_animal', 'LIKE', '%' . $buscar . '%' )
                            ->orWhere('especie_animal', 'LIKE', '%' . $buscar . '%')
                            ->paginate(12);
            }else{
                $animal = Animal::where('status_animal', '=', '1')
                            ->where('nome_animal', 'LIKE', '%' . $buscar . '%' )
                            ->orWhere('especie_animal', 'LIKE', '%' . $buscar . '%')
                            ->paginate(12);
            }
        }else{
            $this->index();
        }
        return view('animais.publico.home.index',
            [
                "results"   =>  $animal,
                "buscar"    =>  $buscar
            ]);
    }
}
