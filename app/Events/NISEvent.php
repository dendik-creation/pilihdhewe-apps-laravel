<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NISEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $number_card;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($number_card)
    {
        $this->number_card = $number_card;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return [
            'number_card' => $this->number_card
        ];
    }
}
