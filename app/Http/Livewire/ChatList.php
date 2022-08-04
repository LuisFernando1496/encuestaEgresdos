<?php

namespace App\Http\Livewire;


use App\Models\Messages;
use App\Models\Role;
use App\Models\Roles;
use Livewire\Component;

class ChatList extends Component
{
    public $usuario;
    public $mensajes;
    public $message;
    
    public $userLoged ;
    public $userTo;
   
     protected $listeners = ['actualizarMensajes'=>'actualizarMensajes','abrirChat'=>'abrirChat'];
    
    public function mount()
    {
        $this->data();
        
    }
   
    public function actualizarMensajes()
    {  
        $this->data();
            
    }

    public function data()
    {
        $this->mensajes =  Messages::orderBy("created_at", "ASC")->get();  
        $this->usuario = request()->query('usuario', $this->usuario) ?? "";      
        $user = auth()->user()->roles;
        $userAdmin = Role::find(1);
        $this->userLoged = auth()->user()->id;
        if(sizeof($user)>0)
        {
            if(auth()->user()->roles[0]->pivot->role_id == 1)
            {
                 $this->userTo = session('idUser');
            }
            else
            {
                $this->userTo = $userAdmin->users[0]->id ;
            }
           
        }
    }
    public function render()
    {        
        return view('livewire.chat-list');
    }
}
