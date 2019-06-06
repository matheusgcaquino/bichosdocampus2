<?php
namespace App\Http\Controllers\Adoções\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StatusAdocao;
use App\Models\Animal;
use App\Models\Adocao;
use Illuminate\Support\Facades\Auth;
use App\Mail\MudancaStatus;
use Mail;

class StatusController extends Controller
{
    public function index(Request $request)
    {
        if ($request->acao == 3) {
            $adocao = Adocao::select('id_animal')->find($request->id);
            Animal::where('id_animal', $adocao->id_animal)->update(['status_animal' => 2]);
            $adocaos = Adocao::where('id_animal', $adocao->id_animal)
                ->where('id_adocao', '<>', $request->id)
            ->get();
            foreach ($adocaos as $adocao) {
                $status = StatusAdocao::where('id_adocao', $adocao->id_adocao)->get();
                if ($status->last()->status_adocao < 4) {
                    StatusAdocao::create([
                        'id_adocao'     =>  $adocao->id_adocao,
                        'id_user'       =>  Auth::user()->id_user,
                        'status_adocao' =>  5,
                    ]);
                }
            }
        }

        $status_adocao = StatusAdocao::create([
            'id_adocao'     =>  $request->id,
            'id_user'       =>  Auth::user()->id_user,
            'status_adocao' =>  $request->acao,
            'comentario'    =>  $request->comentario,
        ]);

        //dd($request->all());
        $adocao = Adocao::select(['email_adocao', 'codigo_adocao'])->find($request->id);

        // Mail::to($adocao->email_adocao)->send(new MudancaStatus($adocao, $status_adocao));

        return redirect()->route('adocoes.requisição', ['codigo' => $request->codigo]);
    }
}
