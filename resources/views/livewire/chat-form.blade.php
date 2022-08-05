
        <div class="p-3 h-auto w-auto bg-blue-600">
            @php
            $message = App\Models\Messages::orderBy('created_at', 'desc')
                ->select('to_id')
                ->distinct('to_id')
                ->get();
                
        @endphp
             <div class=" h-auto bg-white overflow-hidden flex flex-col rounded-xl overflow-hidden shadow-xl">
                <!-- component -->
                <div class="flex-1 p:2 sm:p-6 justify-between flex flex-col h-auto">
                    <div class="flex sm:items-center justify-between py-3 border-b-2 border-gray-200">
                        <div class="relative flex items-center space-x-4">
                            <div class="relative">
                                <span class="absolute text-green-500 right-0 bottom-0">
                                    <svg width="20" height="20">
                                        <circle cx="8" cy="8" r="8" fill="currentColor">
                                        </circle>
                                    </svg>
                                </span>
                                <img src="{{asset('img/user.png')}}"
                                    alt="" class="w-10 sm:w-16 h-10 sm:h-16 rounded-full">
                            </div>
                            <div class="flex flex-col leading-tight">
                                <div class="text-2xl mt-1 flex items-center">
                                    <span class="text-gray-700 mr-3">{{$username}}</span>
                                </div>
                                <span class="text-lg text-gray-600">User</span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button type="button"
                                  
                                class="inline-flex items-center justify-center rounded-lg border h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                  </svg>
                            </button>
                          
                        </div>
                    </div>
                    <div id="messages"
                        class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
                        {{-- lista del chat --}}
                        @if (count($message) > 0)
                            @livewire('chat-list')
                        @endif
                    </div>
                    <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
                        <div class="relative flex">
                           
                            <input type="text" placeholder="Escribe un mensaje!" wire:model="mensaje"
                                wire:keydown.enter="enviarMensaje"
                                class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-md py-3">
                            <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">
                               
                               
                                <button type="button" wire:click="enviarMensaje" wire:loading.attr="disabled"
                                    wire:offline.attr="disabled"
                                    class="inline-flex items-center justify-center rounded-lg px-4 py-3 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
                                    <span class="font-bold">Send</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="h-6 w-6 ml-2 transform rotate-90">
                                        <path
                                            d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>



    </div>
  </div>
  

