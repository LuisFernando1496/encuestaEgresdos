
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
        <img class="logo_der" src="{{ asset('img/logo_ittg.jpg') }}"">
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
            <!-- <hr class="hr-item">
            <hr class="hr-item"> -->
            <hr class="hr-item">
            <div class="">  
            <!-- Preguntas -->
            <hr><div>Respuesta. {{ $data_r->question }}</div><hr>
            <div>
                    <!-- Respuestas -->
                    <div class="answer-items">
                        @if($data_r->answer_num != "")
                            <label>Respuesta. {{ $data_r->answer_num }}</label>
                        @elseif($data_r->answer_text != "")
                            <label>Respuesta. {{ $data_r->answer_text }}</label>
                        @elseif($data_r->answer_specify != "")
                            <label>Respuesta. {{ $data_r->answer_specify }}</label>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    
    <div>
        <canvas id="myChart" width="400" height="400"></canvas>
    </div>
</body>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</html>