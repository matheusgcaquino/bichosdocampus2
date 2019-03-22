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
                $response = Especie::select(['id_especie as id','especie as text'])
                //with not working
                ->with('raca')
                ->paginate(15);
                $nome = 'Espécie';
                break;
            
            case 'local':
                $response = Local::select(['id_local as id','local as text'])->paginate(15);
                $nome = 'Localização';
                break;
            
            case 'pelagem':
                $response = Pelagem::select(['id_pelagem as id','pelagem as text'])->paginate(15);
                $nome = 'Pelagem';
                break;
            
            case 'raca':
                $response = Raca::select(['id_raca as id','raca as text'])->has('especie')
                //with not working
                ->with('especie:especie')->get(15);
                $nome = 'Raça';
                break;
            
            default:
                # code...
                break;
        }

        return view('config.animal.index', [
            "results"   =>  $response,
            "nome"      =>  $nome,
            'tipo'      =>  $tipo
        ]); 
    }

    public function editar(Request $request)
    {
        // dd($request);
        switch ($request->tipo) {
            case 'especie':
                $response = Especie::find($request->idEditar);
                $response->especie = $request->text;
                $response->save();
                break;
            
            case 'local':
                $response = Local::find($request->idEditar);
                $response->local = $request->text;
                $response->save();
                break;
            
            case 'pelagem':
                $response = Pelagem::find($request->idEditar);
                $response->pelagem = $request->text;
                $response->save();
                break;
            
            case 'raca':
                $response = Raca::find($request->idEditar);
                $response->raca = $request->text;
                $response->save();
                break;
            
            default:
                # code...
                break;
        }
        return redirect()->route('config.animal', ['tipo' => $request->tipo]);
    }

    public function excluir(Request $request)
    {
        switch ($request->tipo) {
            case 'especie':
                try {
                    Especie::destroy($request->idExcluir);
                } catch (\Throwable $th) {
                    //throw $th;
                }
                break;
            
            case 'local':
                try {
                    Local::destroy($request->idExcluir);
                } catch (\Throwable $th) {
                    //throw $th;
                }
                break;
            
            case 'pelagem':
                try {
                    Pelagem::destroy($request->idExcluir);
                } catch (\Throwable $th) {
                    //throw $th;
                }
                break;
            
            case 'raca':
                try {
                    Raca::destroy($request->idExcluir);
                } catch (\Throwable $th) {
                    //throw $th;
                }
                break;
            
            default:
                # code...
                break;
        }

        return redirect()->route('config.animal', ['tipo' => $request->tipo]);
    }
}
