<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Activity
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $IdProduct;
    public $mutation_type;
    public $quantity;
    public $user_id;
    /**
     * Create a new event instance.
     */
    public function __construct($IdProduct, $mutation_type, $quantity, $user_id)
    {
        $this->IdProduct = $IdProduct;
        $this->mutation_type = $mutation_type;
        $this->quantity = $quantity;
        $this->user_id = $user_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
