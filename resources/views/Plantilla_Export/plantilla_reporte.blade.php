
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
    @foreach($data as $data_r)
        <div class="center-items">
            <h4>Datos Del Egresado</h4>
            <label>N° de Control: {{ $data_r->num_control }}</label><br>
            <label>Nombre: </label><br>
            <label>Carrera: </label>
        </div>
        <div class="center-items">
            <hr class="hr-item">
            <div>
                {{ $data_r->category }}
            </div>
            <hr class="hr-item">
            <!-- <hr class="hr-item"> -->
            <!-- <hr class="hr-item"> -->
            <div class="">  
            <!-- Preguntas -->
            <hr><div>{{ $data_r->question }}</div><hr>
            <div>
                    <!-- Respuestas -->
                    <div class="answer-items">
                        @if($data_r->answer_num != "")
                            <label>{{ $data_r->answer_num }}</label>
                        @elseif($data_r->answer_text != "")
                            <label>{{ $data_r->answer_text }}</label>
                        @elseif($data_r->answer_specify != "")
                            <label>{{ $data_r->answer_specify }}</label>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</body>
</html>