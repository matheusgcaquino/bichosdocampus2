<?php

namespace App\Http\Controllers\Adoções\Publico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Adocao;
use App\Models\StatusAdocao;

class RequisiçãoController extends Controller
{
    public function index($codigo)
    {
        $adocao = Adocao::where('codigo_adocao', '=', $codigo)->with(['animal', 'status'])->first();
        // dd($adocao);
        if($adocao->status->count() == 1){
            StatusAdocao::create([
                'id_adocao'     =>  $adocao->id_adocao,
                'id_user'       =>  Auth::user()->id_user,
                'status_adocao' =>  1,
            ]);
            $adocao = Adocao::where('codigo_adocao', '=', $codigo)
                ->with(['animal', 'status'])->first();
        }
        return view('adoções.publico.requisição.index')
            ->with("results", $adocao);
    }
}
