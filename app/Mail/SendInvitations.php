<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\guest;
use App\event;

class SendInvitations extends Mailable
{
    use Queueable, SerializesModels;

    public $guest, $event, $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(event $event, guest $guest, $token)
    {
        $this->event = $event;
        $this->guest = $guest; 
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails/sendInvitations');
    }
}
