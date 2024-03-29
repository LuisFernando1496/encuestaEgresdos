<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NuevoMensaje implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $usuario;
    public $usuarioBy;
    public $mensaje;

    public function __construct($usuario, $mensaje,$usuarioBy)
    {
        $this->usuario = $usuario;
        $this->mensaje = $mensaje;
        $this->usuarioBy = $usuarioBy;
    }
    
    public function broadcastOn()
    {
        return new Channel("chat-channel");
    } 

    public function broadcastAs()
    {
        return "chat-event";
    }
}
