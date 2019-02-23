<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdotaValidacaoFormRequest;
use App\Http\Controllers\Suporte\DataController;
use App\Models\Adocao;

class AdotaAnimalController extends Controller
{

    // Adicionando no banco de dados
    public function adotar(AdotaValidacaoFormRequest $request)
    {
        // Insere os dados
        $adocao = Adocao::create([
            'id_animal'         => $request ->  id,
            'nome_adocao'       => $request ->  nome,
            'cpf_adocao'        => $request ->  cpf,
            'endereco_adocao'   => $request ->  endereco,
            'telefone_adocao'   => $request ->  telefone,
            'email_adocao'      => $request ->  email,
            'data_adocao'       => $request ->  comportamento,
            'status_adocao'     => $request ->  castrado,
            'codigo_adocao'     => $request ->  descricao,
        ]);

        return redirect()-> route('site.animais');
  }
}