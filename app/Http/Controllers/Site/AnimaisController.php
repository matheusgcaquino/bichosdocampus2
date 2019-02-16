<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AnimaisController extends Controller
{
    public function index()
    { 
        $results = DB::table('bichosdocampus.animals as animals')
            ->leftJoin('bichosdocampus.foto_animals as fotos', 
                'animals.id_animal', '=', 'fotos.id_animal')
            ->select('animals.*', 'fotos.foto_animal')
            ->get();
        return view('site.animais.index') -> with("results", $results);
    }
}
