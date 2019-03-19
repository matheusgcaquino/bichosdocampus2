<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdotaValidacaoFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_animal'         => 'bail| required',
            'nome_adocao'       => 'bail| required | min:1  | max:60 |',
            'telefone_adocao'   => 'bail| required | min:14 | max:15 |',
            'email_adocao'      => 'bail| required | min:1  | max:50 |',
            'cpf_adocao'        => 'bail| required | min:14 | max:14 |',
            'logradouro_adocao' => 'bail| required | min:1  | max:150|',
            'bairro_adocao'     => 'bail| required | min:1  | max:50 |',
            'cep_adocao'        => 'bail| required | min:10 | max:10 |',
            'cidade_adocao'     => 'bail| required | min:1  | max:60 |',
            'estado_adocao'     => 'bail| required | min:1  | max:60 |',
            'moro_adocao'       => 'bail| required |'
        ];
    }
}
