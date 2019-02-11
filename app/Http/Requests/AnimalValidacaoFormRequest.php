<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalValidacaoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    // Regras para ser aprovado na adição
    public function rules()
    {
        // bail -> Se a primeira falhar não tenta as outras
        // required -> Preenchimento obrigatorio
        // max -> quantidade maxima da string

        return [
            'nome'          => 'bail| required | max:60 |',
            'especie'       => 'bail| required | max:60 |',
            'raca'          => 'bail| required | max:30 |',
            'numeromeses'   => '',
            'numeroano'     => '',
            'sexo'          => 'bail| required |',
            'pelagem'       => 'bail| required | max:50 |',
            'comportamento' => 'bail| required | max:150 |',
            'castrado'      => 'bail| required |',
            'descricao'     => 'bail| max:150 |',
            'foto'          => 'bail| max:7000 |'
        ];
    }
}
