<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DeleteAnimalController extends Controller
{
    public function deletar(Request $request){
        $results = DB::table('bichosdocampus.foto_animals')
            ->select('foto_animal')
            ->where('id_animal', '=', $request -> idAnimal)
            ->get();
        
        foreach($results as $result){
            Storage::delete($result -> foto_animal);
        }

        DB::table('bichosdocampus.animals')
            ->where('id_animal', '=', $request -> idAnimal)->delete();

        return redirect()-> route('site.animais');
    }
}
