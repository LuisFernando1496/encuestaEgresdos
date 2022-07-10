
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
       
</head>
<style>
    .logo_izq{
        float: left; 
        width: 100px;
    }
    .logo_der{
        float: right; 
        width: 100px;
    }
    .titulo_centro {
        text-align: center;
        text-transform: uppercase;
        margin-top: 15px;
        overflow: auto;
    }
    .data-center-items{
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
    .hr-item{
        margin-top: 20px;
        color: blue;
    }
    .center-items{
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        border: blue solid;
    }
    .answer-items{
        display: flex;
        justify-content: left;
        align-items: left;
        text-align: left;
    }
</style>
<body>
    <div class="data-center-items">
        <img class="logo_izq" src="{{ asset('img/logo_tec.jpg') }}">
        <h5 class="titulo_centro">Instituto Tecnológico De México (Tuxtla Gutiérrez)</h5>
        <img class="logo_der" src="">
    </div>
    <div class="center-items">
        <h4>Datos Del Egresado</h4>
        <label>N° de Control: </label><br>
        <label>Nombre: </label><br>
        <label>Carrera: </label>
    </div>
    <div class="center-items">
        @forelse ($questions as $i => $pregunta)
            @if ($i == 0)
                <hr class="hr-item">
                <div>
                    {{ $pregunta->categoryQuestion->name }}
                </div>
                <hr class="hr-item">
            @else
                @if ($questions[$i - 1]->categoryQuestion->name != $pregunta->categoryQuestion->name)
                    <hr class="hr-item">
                    <div>
                        {{ $pregunta->categoryQuestion->name }}
                    </div>
                    <hr class="hr-item">
                @else
                @endif
            @endif
            <div class="">  
                <!-- Preguntas -->
                <hr><div>{{ $pregunta->question }}</div><hr>
                <div>
                    <!-- Respuestas -->
                    <div class="answer-items">
                        <label>Respuesta. </label>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
</body>
</html>