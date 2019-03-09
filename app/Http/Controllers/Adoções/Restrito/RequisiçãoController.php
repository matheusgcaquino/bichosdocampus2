<?php

namespace App\Http\Controllers\Adoções\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Adocao;
use App\Models\Animal;

class RequisiçãoController extends Controller
{
    public function index($id)
    {   
        // dd($id);
        $animal = Animal::find($id);
        $adocao = Adocao::where('id_animal', '=', $id)->paginate(15);
        return view('adoções.restrito.requisição.index')->with([
            "results"   =>  $adocao,
            "animal"    =>  $animal
        ]);
    }
}
