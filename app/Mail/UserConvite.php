<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Convite;

class UserConvite extends Mailable
{
    use Queueable, SerializesModels;

    public $introLines;
    public $level;
    public $actionText;
    public $actionUrl;
    public $outroLines;

    public function __construct(Convite $convite)
    {
        $this->introLines = ["Você foi convidado a se cadastrar no site do Bichos do Campus."];
        $this->level = 'success';
        $this->actionText = "Cadastra-se";
        $this->actionUrl = url("/usuários/novo/convidado/{$convite->key}");
        $this->outroLines = [];
    }

    public function build()
    {
        return $this->markdown('vendor.notifications.email')
        ->subject('Convite de Usuário');
    }
}
