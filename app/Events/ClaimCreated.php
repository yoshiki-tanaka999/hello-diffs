<?php

namespace App\Events;


use App\Model\Post\System\Claim;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ClaimCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $claim;

    // Claim
    public function __construct(Claim $claim)
    {
        $this->claim = $claim;
    }

    public function broadcastOn()
    {
        return new Channel('claim');
    }
}
