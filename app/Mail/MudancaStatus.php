<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Adocao;
use App\Models\StatusAdocao;

class MudancaStatus extends Mailable
{
    use Queueable, SerializesModels;

    public $introLines;
    public $level;
    public $actionText;
    public $actionUrl;
    public $outroLines;

    public function __construct(Adocao $adocao, StatusAdocao $statusadocao)
    {
        switch ($statusadocao->status_adocao) {
            case (2):
                $nome = "Avaliando";
                $informacao = "A Bichos do Campus está avaliando e em alguns dias aprovará ou recusará seu requerimento.";
                break;
            case (3):
                $nome = "Aprovado";
                $informacao = "A Bichos do Campus aprovou seu requerimento, compareça ao local com os documentos para finalizar a adoção.";
                break;
            case (4):
                $nome = "Recusado";
                $informacao = "A Bichos do Campus recusou seu requerimento, mas você poderá adotar outros animais.";
                break;
            case (5):
                $nome = "Cancelado";
                $informacao = "A Bichos do Campus cancelou seu requerimento, pois o animal foi adotado.";
                break;
        }
        
        if($statusadocao->status_adocao == 4) {
            $this->introLines = [
                "A Bichos do Campus modificou o seu status.",
                "Status Atual: {$nome}",
                "Informação: {$informacao}",
                "Comentario: {$statusadocao->comentario}",
                "Você poderá acompanhar o andamento da sua requisição clicando no botão abaixo."];
        } else {
            $this->introLines = [
                "A Bichos do Campus modificou o seu status.",
                "Status Atual: {$nome}",
                "Informação: {$informacao}",
                "Você poderá acompanhar o andamento da sua requisição clicando no botão abaixo."];
        }

        $this->level = 'success';
        $this->actionText = "Acompanhar Adoção";        
        $this->actionUrl = url("/adoções/requisição/{$adocao->codigo_adocao}");
        $this->outroLines = ["Obrigado por apoiar essa causa!"];
    }

    public function build()
    {
        return $this->markdown('vendor.notifications.email')
            ->subject('Mudança de Status');
    }
}
