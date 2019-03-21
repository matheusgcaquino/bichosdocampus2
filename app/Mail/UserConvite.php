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

    public $convite;

    public function __construct(Convite $convite)
    {
        $this->convite = $convite;
    }

    public function build()
    {
        return $this->markdown('emails.convite.index');
    }
}
