<?php

namespace App\Listeners;

use App\Events\initiate_email;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\SendInvitations;

class send_email
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  initiate_email  $event
     * @return void
     */
    public function handle(initiate_email $event)
    {
        \Mail::to($event->guest)->send(new SendInvitations($event->event, $event->guest, $event->token));
    }
}
