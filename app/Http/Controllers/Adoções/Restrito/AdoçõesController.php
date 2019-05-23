<?php

namespace App\Http\Controllers\Adoções\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Animal;
use App\Models\Adocao;

class AdoçõesController extends Controller
{
    
    public function index()
    {
        $animal = Animal::select(['id_animal', 'nome_animal', 'foto_perfil', 'status_animal'])
            ->has('adocao')
            ->withCount([
                'adocao',
                'adocao as novo' => function($query) {
                    $query->has('status', 1)
                    ->whereHas('status', function ($q) {
                        $q->where('status_adocao', 0);
                    });
                },
                'adocao as visualizado' => function($query) {
                    $query->has('status', '<', 3)
                    ->whereHas('status', function ($q) {
                        $q->where('status_adocao', 1);
                    });
                },
                'adocao as avaliando' => function($query) {
                    $query->has('status', '<', 4)
                    ->whereHas('status', function ($q) {
                        $q->where('status_adocao', 2);
                    });
                }
            ])
            ->orderBy('avaliando', 'desc')
            ->orderBy('visualizado', 'desc')
            ->orderBy('novo', 'desc')
        ->paginate(16);
        // dd($animal);
        return view('adoções.restrito.home.index')->with("results", $animal);
    }

    public function buscar($buscar)
    {
        $animal = Animal::select(['id_animal', 'nome_animal', 'foto_perfil', 'status_animal'])
            ->has('adocao')
            ->where('nome_animal', 'like', '%'.$buscar.'%')
            ->withCount([
                'adocao',
                'adocao as novo' => function($query) {
                    $query->has('status', 1)
                    ->whereHas('status', function ($q) {
                        $q->where('status_adocao', 0);
                    });
                },
                'adocao as visualizado' => function($query) {
                    $query->has('status', '<', 3)
                    ->whereHas('status', function ($q) {
                        $q->where('status_adocao', 1);
                    });
                },
                'adocao as avaliando' => function($query) {
                    $query->has('status', '<', 4)
                    ->whereHas('status', function ($q) {
                        $q->where('status_adocao', 2);
                    });
                }
            ])
            ->orderBy('avaliando', 'desc')
            ->orderBy('visualizado', 'desc')
            ->orderBy('novo', 'desc')
        ->paginate(16);
        
        return view('adoções.restrito.home.index')->with([
            "results"   =>  $animal,
            "buscar"    =>  $buscar
        ]);
    }
}
