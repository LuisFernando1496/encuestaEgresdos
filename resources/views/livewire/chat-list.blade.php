

<div class="mt-3">
   
    @forelse ($mensajes as $mensaje)
        {{-- Esto es para el --}}
        @if ($mensaje->to_id == $userTo){{--$userTo--}}
            <div class="chat-message">
                <div class="flex items-end justify-end">
                    <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                        <div><span
                                class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white ">{{ $mensaje->mensaje }}</span>
                        </div>
                    </div>
                    {{-- <img src="https://images.unsplash.com/photo-1590031905470-a1a1feacbb0b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
            alt="My profile" class="w-6 h-6 rounded-full order-2"> --}}{{ $mensaje->usuario }}
                </div>
            </div>
        @endif
        {{-- Esto es para mi --}}
        @if ($mensaje->to_id == $userLoged){{--$userLoged--}}
            <div class="chat-message">
                <div class="flex items-end">
                    <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                        <div><span
                                class="px-4 py-2 rounded-lg inline-block bg-gray-300 text-gray-600">{{ $mensaje->mensaje }}</span>
                        </div>
                    </div>
                    <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                        alt="My profile" class="w-6 h-6 rounded-full order-1">
                </div>
            </div>
        @endif
    @empty
        Sin mensajes
    @endforelse
</div>
