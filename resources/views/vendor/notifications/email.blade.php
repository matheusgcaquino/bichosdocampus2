@php
    if ($actionText == "Reset Password"){
        $actionText = "Redefinir senha";
        $introLines = ['Você está recebendo este e-mail porque recebemos uma 
        solicitação de redefinição de senha para sua conta.'];
        $outroLines = ['Se você não solicitou uma redefinição de senha, nenhuma 
        ação adicional é necessária.'];
    }
@endphp

@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# Oops!
@else
# Olá!
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
Saudações,<br>{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
Se você estiver com problemas para clicar no botão de "{{ $actionText }}" 
copie e cole o URL abaixo em seu navegador da web: [{{ $actionUrl }}]({!! $actionUrl !!})
@endcomponent
@endisset
@endcomponent
