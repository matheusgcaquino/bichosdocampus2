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

    public $adocao;

    public function __construct(Adocao $adocao)
    {
        $this->adocao = $adocao;
    }

    public function build()
    {
        return $this->markdown('emails.adocao.index')->subject('BICHOS DO CAMPUS - Seu requerimento de adoção foi enviado!');
    }
}
