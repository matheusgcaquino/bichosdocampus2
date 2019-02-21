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
            'nome_adocao'       => 'bail| required | max:60 |',
            'telefone_adocao'   => 'bail| required |',
            'email_adocao'      => 'bail| required | max:60 |',
            'cpf_adocao'        => 'bail| required |',
            'logradouro_adocao' => 'bail| required | max:150 |',
            'bairro_adocao'     => 'bail| required | max:50 |',
            'cep_adocao'        => 'bail| required |',
            'cidade_adocao'     => 'bail| required | max:60 |',
            'estado_adocao'     => 'bail| required | max:60 |',
            'moro_adocao'       => 'bail| required |'
        ];
    }
}
