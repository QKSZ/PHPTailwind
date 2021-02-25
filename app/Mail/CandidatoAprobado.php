<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CandidatoAprobado extends Mailable
{
    use Queueable, SerializesModels;

    public $candidato;
    public $remitente;



    public $subject ='Candidato Aprobado';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($candidato,$remitente)
    {
        //
        $this->candidato = $candidato;
        $this->remitente = $remitente;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.aprobado');
    }
}
