<?php

namespace App\Http\Controllers\Animais\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Animal;
use App\Models\Foto_animal;

class DeleteAnimalController extends Controller
{
    public function deletar(Request $request)
    {
        $animal = Animal::select("foto_perfil")->find($request->idAnimal);

        $fotoanimal = Foto_animal::where('id_animal',$request->idAnimal)->get();
        $qtdfoto = $fotoanimal->count();

        if($animal->foto_perfil){
            Storage::delete($animal->foto_perfil);
        }

        if($qtdfoto == 1)
        {
            Storage::delete($fotoanimal[0]->foto_animal);
            Foto_animal::where('id_foto_animals', $fotoanimal[0]->id_foto_animals)->delete();
        }
        if($qtdfoto == 2)
        {
            Storage::delete($fotoanimal[0]->foto_animal);
            Foto_animal::where('id_foto_animals', $fotoanimal[0]->id_foto_animals)->delete();
            Storage::delete($fotoanimal[1]->foto_animal);
            Foto_animal::where('id_foto_animals', $fotoanimal[1]->id_foto_animals)->delete();
        }

        Animal::destroy($request->idAnimal);
        return redirect()->route('site.animais');
    }
}
