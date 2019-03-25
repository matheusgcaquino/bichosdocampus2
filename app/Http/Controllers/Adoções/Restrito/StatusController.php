<?php
namespace App\Http\Controllers\Adoções\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StatusAdocao;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function index(Request $request)
    {
        if ($request->acao == 3) {
            StatusAdocao::where('id_adocao', $request->id)->update(['status_adocao' => 5]);
        }
        StatusAdocao::create([
            'id_adocao'     =>  $request->id,
            'id_user'       =>  Auth::user()->id_user,
            'status_adocao' =>  $request->acao,
            'comentario'    =>  $request->comentario,
        ]);

        return redirect()->route('adocoes.requisição', ['codigo' => $request->codigo]);
    }
}
