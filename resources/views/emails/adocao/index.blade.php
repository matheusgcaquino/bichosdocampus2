@component('mail::message')
<div style="text-align: center;">
	<h3>REQUERIMENTO DE ADOÇÃO RECEBIDO</h3>
	<h4>OLÁ, A <strong>BICHOS DO CAMPUS</strong> RECEBEU O SEU REQUERIMENTO E 
	IRÁ ANÁLISAR O MAIS RÁPIDO POSSÍVEL. UTILIZAREMOS AS INFORMAÇÕES DE CONTATO
FORNECIDAS PARA CONTATÁ-LO.</h4>
	<h4>VOCÊ PODERÁ ACOMPANHAR O ANDAMENTO DA SUA REQUISIÇÃO CLICANDO NO BOTÃO ABAIXO.</h4>
	
@component('mail::button', [
    'url' => url("/adoções/requisição/{$adocao->codigo_adocao}")])
ACOMPANHAR ADOÇÃO
@endcomponent
<div>
<strong>OBRIGADO POR APOIAR ESSA CAUSA!</strong>
</div>
</div>
@endcomponent
