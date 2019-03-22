<?php

namespace App\Http\Controllers\Config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Especie;
use App\Models\Local;
use App\Models\Pelagem;
use App\Models\Raca;

class AnimalController extends Controller
{
    public function index($tipo)
    {
        switch ($tipo) {
            case 'especie':
                $reponse = Especie::select(['id_especie as id','especie as text'])
                //with not working
                ->with('raca')
                ->paginate(15);
                $nome = 'Espécie';
                break;
            
            case 'local':
                $reponse = Local::select(['id_local as id','local as text'])->paginate(15);
                $nome = 'Localização';
                break;
            
            case 'pelagem':
                $reponse = Pelagem::select(['id_pelagem as id','pelagem as text'])->paginate(15);
                $nome = 'Pelagem';
                break;
            
            case 'raca':
                $reponse = Raca::select(['id_raca as id','raca as text'])->has('especie')
                //with not working
                ->with('especie:especie')->get(15);
                $nome = 'Raça';
                break;
            
            default:
                # code...
                break;
        }

        return view('config.animal.index', [
            "results"   =>  $reponse,
            "nome"      =>  $nome,
            'tipo'      =>  $tipo
        ]); 
    }

    public function editar(Request $request)
    {
        # code...
    }

    public function excluir(Request $request)
    {
        # code...
    }
}
