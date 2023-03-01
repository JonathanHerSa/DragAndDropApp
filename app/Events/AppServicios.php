<?php

namespace App\Events;

use App\Models\Elemento;
use App\Models\Lista;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AppServicios implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $items;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        $listas = Lista::all();
        foreach ($listas as $list) {
            $this->items[$list->nombre] = Elemento::where('listas_id', $list->id)->get();
        }
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('AppServicio');
    }
}
