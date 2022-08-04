@php
$message = App\Models\Messages::orderBy('created_at', 'desc')
    ->select('to_id')
    ->distinct('to_id')
    ->orderBy('to_id','DESC')
    ->get();
    
@endphp
<x-app-layout>

    <div class="bg-white">
        <div class="container mx-auto px-6 py-16">
            <div class="mx-auto sm:w-6/12 lg:w-5/12 xl:w-[30%]">
                <div>
                    <h1 class="text-3xl">Mensajes</h1>
                    <p class="mt-2 text-gray-600"> <strong>Algunos usuarios realizaron preguntas !</strong> </p>
                </div>

                <div class="mt-4">
             
              @forelse ($message as $item)
              @if ( Auth::user()->id != $item->to_id)
                @php
                $user = App\Models\User::find($item->to_id);
                @endphp
                   <form action="{{route('reenvio',[$user->id,$user->name])}}" id="chat">  
                         <div class="relative flex flex-col justify-end overflow-hidden rounded-b-xl pt-6" >
                        <div 
                            class="group relative flex cursor-pointer justify-between rounded-xl bg-blue-200 before:absolute before:inset-y-0 before:right-0 before:w-1/2 before:rounded-r-xl before:bg-gradient-to-r before:from-transparent before:to-blue-600 before:opacity-0 before:transition before:duration-500 hover:before:opacity-100">
                            <div class="relative space-y-1 p-4">
                                <h4 class="text-xl text-blue-900">{{$user->name}}</h4>
                                <div class="relative h-6 text-blue-800 text-sm" >
                                    <span
                                        class="transition duration-300 group-hover:invisible group-hover:opacity-0">Chat</span>
                                   
                                     
                                        <button 
                                        class="w-max flex items-center gap-3 invisible absolute left-0 top-0 translate-y-3 transition duration-300 group-hover:visible group-hover:translate-y-0">
                                        <span> click aqui </span>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 -translate-x-4 transition duration-300 group-hover:translate-x-0"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <img class="absolute bottom-0 right-6 w-[6rem] transition duration-300 group-hover:scale-[1.4]"
                                src="{{asset('img/user.png')}}"
                                alt="" />
                        </div>
                    </div>
                </form>
                    @endif
              @empty
                  <h1>No hay mensajes</h1>
              @endforelse         
                   

                </div>
            </div>
        </div>
    </div> 

  
</div>



</x-app-layout>