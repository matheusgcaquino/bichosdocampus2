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
            'name'          => 'bail| required | max:60 |',
            'logradouro'    => 'bail| required | max:150 |',
            'email'         => 'bail| required | max:30 |',
            'telefone'      => 'bail| required | min:10 | max:14 '
        ];
    }
}
