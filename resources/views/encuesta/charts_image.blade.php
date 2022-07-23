<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quiz') }}
        </h2>
    </x-slot>
    <div class="max-w-8xl sm:px-6 lg:px-8 my-5">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-col">
                <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <div class="flex bg-white px-4 py-3 border-t border-gray-200 sm:px-4">
                                <label for="">
                                    DATOS A EXPORTAR
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><hr><br>
        <form action="{{ route('encuesta.imprimir') }}" method="post">
        @csrf
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                @foreach($data as $data_r)
                                    <input type="text" name="charts" id="charts_image">
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
                                        <hr>
                                        <div>
                                            Respuesta. {{ $data_r->question }}
                                            <input type="hidden" value="{{ $data_r->question }}" id="question">
                                        </div>
                                        <hr>
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
                            </div>
                        </div>
                    </div>
                </div>
                <button class="text-blue-600 hover:text-blue-900 bg-blue-100 rounded-lg py-1 px-3 text-right" type="submit">
                    Confirmar.
                </button>            
            </div>
        </form>
    </div>
    
    <canvas id="myChart" width="400" height="400"></canvas>
    
    <script>
        var labels = [];
        var dataSet = [];

        var q = document.getElementById('question').value;
        console.log(q);
        labels.append(q);

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
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

        const pdfChart = document.getElementById('myChart');
        const imageChart = pdfChart.toDataURL('image/jpg', 1.0);
        const valueChart = document.getElementById('charts_image').val(imageChart);
    </script>
</x-app-layout>