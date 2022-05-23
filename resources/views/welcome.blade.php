<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema Seguimiento Egresados</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
   
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  
</head>

<body > 
    <div class="container flex flex-wrap">
        <div class="m-5 p-12 mx-auto">
         <h1 class="font-mono text-2xl text-center "> Bienvenido al Sistema para el Seguimiento a Egresados</h1>
        </div>
    </div>
    <div class="max-w-5xl p-1 mx-auto ">
        <div class="grid grid-cols-2 sm:grid-cols-3  md:grid-cols-3 xl:grid-cols-5">
            <div class="col-start-1"> 
                 <img src="{{ asset('img/logo_tec.jpg') }}" alt="tnm">
            </div>
          <div class="col-start-2 sm:col-start-2   md:col-start-3 pl-20  xl:col-start-5 pl-12  ">
            <img src="{{ asset('img/isc_tnm.png') }}" alt="isc">
          </div>
           

        </div>

        <div class="mt-8 " style="background-color: #1a3b65;">
            <div class="grid grid-cols-1 md:grid-cols-2 " >
                <div class="p-6">
                    <div class="flex items-center">
                        <img src="https://img.icons8.com/fluency/48/000000/book-stack.png" />
                        <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ route('register') }}"
                                onclick="options(option = 0)" class="underline text-gray-900 dark:text-white">Soy
                                Alumno</a></div>
                    </div>

                    <div class="ml-12">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm ">
                            <li>Soy alumno proximo a egresar</li>
                            <li>Bolsa de trabajo</li>
                            <li>Publicaiones de proximos Acoms</li>
                        </div>
                    </div>
                </div>

                <div class="p-6 border-t border-white-200 dark:border-gray-700 md:border-t-0 md:border-l">
                    <div class="flex items-center">
                        <img src="https://img.icons8.com/color/48/000000/motarboard.png" />
                        <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ route('register') }}"
                                onclick="options(option = 1)" class="underline text-gray-900 dark:text-white">Soy
                                egresado</a></div>
                    </div>

                    <div class="ml-12">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                            <li>Ver bolsa de trabajo</li>
                            <li>Encuesta de seguimiento</li>
                            <li>Chat en linea con administivos</li>
                        </div>
                    </div>
                </div>





            </div>
        </div>
</body>

<script>
    const options = (option) => {
        localStorage.setItem('option', option);
    }
</script>

</html>
