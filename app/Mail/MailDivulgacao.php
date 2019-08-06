<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailDivulgacao extends Mailable
{
    use Queueable, SerializesModels;

    public $introLines;

    public function __construct(Divlgacao $divulgacao)
    {
        $titulo = "Divulgação de Parceiros";
        $mensagem = "";

        $this->introLines = [
            "Olá caro(a) adotante,",
            "A Bichos do Campus é mantida por meio de doações. Por conta disso, firmamos algumas parcerias.",
            "Um de nossos parceiros tem um recadinho pra você:",
            "{$mensagem}"];

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('vendor.divulgacao.email')
        ->subject('Obrigado por apoioar a nossa causa!');
    }
}
