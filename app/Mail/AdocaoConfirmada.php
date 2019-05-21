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
        $this->introLines = ["A Bichos do Campus recebeu o seu requerimento e 
        irá análisar o mais rápido possível. utilizaremos as informações de contato fornecidas 
        para contatá-lo.", 
        "você poderá acompanhar o andamento da sua requisição clicando no botão abaixo."];
        $this->level = 'success';
        $this->actionText = "Acompanhar Adoção";
        $this->actionUrl = url("/adoções/requisição/{$adocao->codigo_adocao}");
        $this->outroLines = ["Obrigado por apoiar essa causa!"];
    }

    public function build()
    {
        return $this->markdown('vendor.notifications.email')
            ->subject('Requerimento de adoção');
    }
}
