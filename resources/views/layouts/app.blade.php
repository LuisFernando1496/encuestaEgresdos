<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta http-equiv="Content-Security-Policy" content="default-src *; style-src 'self' 'unsafe-inline'; script-src 'self' 'unsafe-inline' 'unsafe-eval' http://www.google.com"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- AJAX -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Laravel Charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>

</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100 ">
     
            @livewire('navigation-menu')
       
        

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 ">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}

        </main>

    </div>

    @stack('modals')
    <script>
        let divSpan = document.getElementById('notification');
        let spanCount = document.getElementById('countNotification');
        var userLoged = '{{ Auth::user()->id }}';
        var messageCount= parseInt(spanCount.innerText);
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
      
        const pusher = new Pusher('322c49a381e4845531c7', {
            cluster: 'us2'
        });

        const channel = pusher.subscribe('chat-channel');
        channel.bind('chat-event', function(data) {
           
            if(userLoged == data.usuario){
                 window.livewire.emit('actualizarMensajes')
                messageCount++;
                // var text = document.createTextNode(cont);
                divSpan.style = 'inline-blok';
                spanCount.innerHTML  = `${messageCount}`;
                spanCount.style = 'inline-blok';
            }
               
          
        });
    </script>
    @livewireScripts


</body>

</html>
