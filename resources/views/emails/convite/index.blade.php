@component('mail::message')
# Convite - Bichos do Campus

Você foi convidade a se cadastrar no site do Bichos do Campus.

@component('mail::button', [
    'url' => url("/usuários/novo/convidado/{$convite->key}")])
Cadastra-se
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent