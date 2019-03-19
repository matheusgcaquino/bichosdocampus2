<?php

namespace App\Http\Controllers\Config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Especie;
use App\Models\Local;
use App\Models\Pelagem;
use App\Models\Raca;

class BoxController extends Controller
{
    public function index($tipo)
    {
        switch ($tipo) {
            case 'especie':
                $reponse = Especie::select(['id_especie as id','especie as text'])->get();
                break;
            
            case 'local':
                $reponse = Local::select(['id_local as id','local as text'])->get();
                break;
            
            case 'pelagem':
                $reponse = Pelagem::select(['id_pelagem as id','pelagem as text'])->get();
                break;
            
            case 'raca':
                $reponse = Raca::select(['id_raca as id','raca as text'])
                ->with('especie')->get();
                break;
            
            default:
                # code...
                break;
        }
        
        return response()->json($reponse);        
    }
}
