<?php

namespace App\Http\Controllers\Adoções\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Adocao;

class RequisiçõesController extends Controller
{
    public function index($id)
    {   
        $animal = Animal::find($id);
        $adocao = Adocao::where('id_animal', '=', $id)->with(['status', 'status.user:name_user'])
        ->paginate(15);
        return view('adoções.restrito.requisições.index')->with([
            "results"   =>  $adocao,
            "animal"    =>  $animal
        ]);
    }
}
