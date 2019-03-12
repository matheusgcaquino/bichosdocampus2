<?php

namespace App\Http\Controllers\Adoções\Publico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Adocao;

class RequisiçãoController extends Controller
{
    public function index($codigo)
    {
        $adocao = Adocao::where('codigo_adocao', '=', $codigo)->with(['animal', 'status'])->first();
        // dd($adocao);
        return view('adoções.publico.requisição.index')
            ->with("results", $adocao);
    }
}
