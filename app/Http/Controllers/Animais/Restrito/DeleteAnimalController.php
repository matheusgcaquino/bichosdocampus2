<?php

namespace App\Http\Controllers\Animais\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Animal;

class DeleteAnimalController extends Controller
{
    public function deletar(Request $request)
    {
        $animal = Animal::select("foto_perfil")->find($request->idAnimal);
        
        if($animal->foto_perfil){
            Storage::delete($animal->foto_perfil);
        }
        Animal::destroy($request->idAnimal);
        return redirect()->route('site.animais');
    }
}