<?php

namespace App\Http\Controllers\Adoções\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Adocao;

class AdoçõesController extends Controller
{
    
    public function index()
    {
        $adocao = Animal::has('adocao.status')->withCount([
            'adocao',
            'adocao.status as novo'  => function ($query) {
                $query->where('status_adocao', 0);
            },
            'adocao.status as visualizada'  => function ($query) {
                $query->where('status_adocao',  1);
            },
            'adocao.status as avaliacao'  => function ($query) {
                $query->where('status_adocao', 2);
            },
        ])->paginate(15);
        // $adocao = Animal::has('adocao.status')->with([
        //     'adocao'
        // ])->paginate(15);
        return view('adoções.restrito.home.index')->with("results", $adocao);
    }
}
