
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title }}</title>
        
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
            justify-content: center;
            align-items: center;
            text-align: center;
        }
    </style>
    <body>
        <div class="data-center-items">
            <img class="logo_izq" src="{{ asset('img/Logo_tec.jpg') }}">
            <h5 class="titulo_centro">Instituto Tecnológico De México (Tuxtla Gutiérrez)</h5>
            <label class="titulo-centro">{{ $title }}</label>
            <img class="logo_der" src="{{ asset('img/logo_ittg.jpg') }}"">
        </div>
        @foreach($data as $data_r)
            <div class="center-items">
                <h4>Datos Del Egresado</h4>
                <label>N° de Control: {{ $data_r->num_control }}</label><br>
                <label>Nombre: </label><br>
                <label>Carrera: </label>
            </div>
            <table>
                <tbody>
                @foreach($data as $d)
                    <tr>
                        <td class="center items">{{ $d->category }}</td>
                        <td class="center-items">{{ $d->question }}</td>
                        <td class="center-items">Respuesta. {{ $d->answer }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endforeach
        
        <div>
            
        </div>
    </body>
</html>