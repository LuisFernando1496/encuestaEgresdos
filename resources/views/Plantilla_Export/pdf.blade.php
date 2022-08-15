
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title }}</title>
        
    </head>
    <style>
        .chart{
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            border-collapse: collapse;
            width: 550px;
            height: 300px;
            boder-radius: 4px;          
        }
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
        .center-items-title{
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            border: blue solid;
        }
        .center-item{
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            border-collapse: collapse;
        }
    </style>
    <body>
        <div class="data-center-items">
            <img class="logo_izq" src="img/Logo-TecNM.jpeg">
            <img class="logo_der" src="img/logo-ittg.jpeg">
            <h5 class="titulo_centro">Instituto Tecnológico De México (Tuxtla Gutiérrez)</h5>
        </div>
        <br><br><br>
        @foreach($data as $data_r)
            <div class="center-items-title">
                <h4>Datos Del Egresado</h4>
                <label>N° de Control: {{ $data_r->num_control }}</label><br>
                <label>Nombre: {{ $data_r->name }}</label><br>
            </div>
            <table>
                <tbody>
                @foreach($data as $d)
                    <tr>
                        <td class="center-item">{{ $d->category }}</td>
                        <td class="center-item">{{ $d->question }}</td>
                        <td class="center-item">Respuesta. {{ $d->answer }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endforeach
        <br><br>
        <label class="titulo_centro">Promedio de respuestas por pregunta</label>
        <img class="chart" src="img/{{ $filename }}">
        <br>
    </body>
</html>