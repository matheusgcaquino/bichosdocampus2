<?php

namespace App\Http\Controllers\Animais\Publico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Suporte\DataController;
use App\Models\Especie;
use App\Models\Raca;
use App\Models\Pelagem;
use App\Models\Local;
use App\Models\Animal;

class BuscarController extends Controller
{
    public function index()
    {
        $data = [];
        $especie = Especie::get();
        $data['especie'] = $especie;
        $pelagem = Pelagem::get();
        $data['pelagem'] = $pelagem;
        if (Auth::check()) {
            $local = Local::get();
            $data['local'] = $local;
        }

        return response()->json($data);
    }

    public function raca($especie)
    {
        $raca = Raca::where("id_especie", "=", $especie)->get();
        return response()->json($raca);
    }

    public function buscar(Request $request)
    {
        $animal = Animal::with('pelagem', 'local', 'raca', 'raca.especie')
            ->when($request->nome, function ($query, $nome) {
                return $query->where('nome_animal', 'like', '%'.$nome.'%');
            })
            ->when($request->local, function ($query, $local) {
                return $query->where('id_local', '=', $local);
            })
            ->when($request->pelagem, function ($query, $pelagem) {
                return $query->where('id_pelagem', '=', $pelagem);
            })
            ->when($request->sexo, function ($query, $sexo) {
                return $query->where('sexo_animal', '=', $sexo);
            })
            ->when($request->status, function ($query, $status) {
                $status--;
                return $query->where('status_animal', '=', $status);
            })
            ->when($request->castrado, function ($query, $castrado) {
                $castrado--;
                return $query->where('castracao_animal', '=', $castrado);
            })
            ->when($request, function ($query, $request) {
                if (isset($request->raca)) {
                    return $query->where('id_raca', '=', $request->raca);   
                } elseif (isset($request->especie)) {
                    return $query->whereHas('raca', function ($q) use ($request) {
                        $q->where('id_especie', '=', $request->especie);
                    });
                }
            })
            ->when($request->idade, function ($query, $idade) {
                $data = DataController::buscarData($idade);
                if ($idade == 1) {
                    return $query->whereDate('idade_animal', '>=', $data);
                } elseif ($idade == 5) {
                    return $query->whereDate('idade_animal', '<=', $data);
                }else {
                    return $query->whereDate('idade_animal', '<=', $data[0])
                        ->whereDate('idade_animal', '>=', $data[1]);
                }
            })
            ->inRandomOrder()
        ->paginate(12);
        
        $buscar = [];
        $raca = null;
        foreach($request->request as $key => $value) {
            if(isset($value) && $key != "_token"){
                $buscar[$key] = $value;
                if ($key == 'especie') {
                    $raca = Raca::where('id_especie', '=', $value)->get();
                }
            }
        }

        return view('animais.publico.home.index',[
            "results"   =>  $animal,
            "buscar"    =>  $buscar,
            "raca"      => $raca
        ]);
    }
}
