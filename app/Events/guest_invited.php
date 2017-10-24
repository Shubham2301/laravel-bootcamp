<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class guest_invited
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $invitation_id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($invitation_id, $guest_email)
    {
        $this->invitation_id = $invitation_id;
        $this->guest_email = $guest_email;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
