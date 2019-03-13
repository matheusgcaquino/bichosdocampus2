@component('mail::message')
# Introduction

Pedido de adoção feita com sucesso.

@component('mail::button', [
    'url' => url("/adoção/requisição/{$adocao->codigo_adocao}")])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
