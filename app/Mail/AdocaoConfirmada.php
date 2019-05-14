<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Adocao;

class AdocaoConfirmada extends Mailable
{
    use Queueable, SerializesModels;

    public $introLines;
    public $level;
    public $actionText;
    public $actionUrl;
    public $outroLines;

    public function __construct(Adocao $adocao)
    {
        $this->introLines = ["A BICHOS DO CAMPUS RECEBEU O SEU REQUERIMENTO E 
        IRÁ ANÁLISAR O MAIS RÁPIDO POSSÍVEL. UTILIZAREMOS AS INFORMAÇÕES DE CONTATO FORNECIDAS 
        PARA CONTATÁ-LO.", 
        "VOCÊ PODERÁ ACOMPANHAR O ANDAMENTO DA SUA REQUISIÇÃO CLICANDO NO BOTÃO ABAIXO."];
        $this->level = 'success';
        $this->actionText = "ACOMPANHAR ADOÇÃO";
        $this->actionUrl = url("/adoções/requisição/{$adocao->codigo_adocao}");
        $this->outroLines = ["OBRIGADO POR APOIAR ESSA CAUSA!"];
    }

    public function build()
    {
        return $this->markdown('vendor.notifications.email')
            ->subject('Requerimento de adoção');
    }
}
