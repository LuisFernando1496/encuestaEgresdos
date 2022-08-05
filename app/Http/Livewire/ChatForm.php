<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Events\NuevoMensaje;
use App\Models\Messages;
use App\Models\Role;

class ChatForm extends Component
{
    // Estas propiedades son publicas
    // y se pueden utilizar directamente desde la vista
    public $usuario;
    public $mensaje;
    public $userLoged;
    public $userTo;
   public $userAdminChat;
   public $username;
    // Generar datos para pruebas
    private $faker;
    
    // Mantenemos estos valores actualizados en 
    // la barra de direcciones...
    // Ej.: https://your-app.com/?usuario=Pedro
    protected $updatesQueryString = ['usuario'];   
    
    // Eventos Recibidos
    protected $listeners = ['solicitaUsuario','recibId'];

    // Cuando se Inicia el Componente (antes de Render)
    public function mount()
    {       
            // Instanciamos Faker
        $this->faker = \Faker\Factory::create();       
           $this->username = session('nameUser');
        // Obtenemos el valor de usuario de la barra de direcciones
        // si no existe, generamos uno con Faker
        $this->usuario = request()->query('usuario', $this->usuario) ?? $this->faker->name;                         
        $this->userAdminChat = auth()->user()->roles[0]->pivot->role_id;
        $this->userLoged = auth()->user()->id;
        // Generamos el primer texto de prueba
     //   $this->mensaje = $this->faker->realtext(20);
    }
   
    public function enviarMensaje()
    {                
        $validatedData = $this->validate([
            'mensaje' => 'required',
        ]);

        $user = auth()->user()->roles;
        $userAdmin = Role::find(1);
       
       
        if(sizeof($user)>0)
        {
            if( auth()->user()->roles[0]->pivot->role_id== 1)
            {
                 $this->userTo = session('idUser');
            }
            else
            {
                $this->userTo = $userAdmin->users[0]->id ;
            }
           
        }

        // Guardamos el mensaje en la BBDD
       // $userLoged = auth()->user()->id;
        Messages::create([
            "to_id" => $this->userTo,
            "mensaje" => $this->mensaje,
            "by_id" => $this->userLoged
        ]);
        
        // Generamos el evento para Pusher
        // Enviamos en la "push" el usuario y mensaje (aunque en este ejemplo no lo utilizamos)
        // pero nos vale para comprobar en PusherDebug (y por consola) lo que llega...
        event(new NuevoMensaje($this->userTo, $this->mensaje,$this->userLoged));
        
        // Este evento es para que lo reciba el componente
        // por Javascript y muestre el ALERT BOOSTRAP de "enviado"
        $this->emit('actualizarMensajes');
        
        // Creamos un nuevo texto aleatorio (para el próximo mensaje)
       // $this->faker = \Faker\Factory::create();       
       $this->mensaje = '';
    
    }    

    public function render()
    {
        return view('livewire.chat-form');
    }
}

