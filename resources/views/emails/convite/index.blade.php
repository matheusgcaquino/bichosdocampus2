@component('mail::message')
<div style="text-align: center;">
	<h3>Convite Usuário - Bichos do Campus</h3>
Você foi convidade a se cadastrar no site do Bichos do Campus.

@component('mail::button', [
    'url' => url("/usuários/novo/convidado/{$convite->key}")])
Cadastra-se
@endcomponent

Obrigado,<br>
</div>
@endcomponent
