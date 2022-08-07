<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quiz') }} (Vista previa Grafica)
        </h2>
    </x-slot>
    <div class="max-w-8xl sm:px-6 lg:px-8 my-5">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-col">
                <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="max-w-16xl sm:px-6 lg:px-16 my-5" id="chart_area">
                            <canvas id="myChart" class="max-w-16xl sm:px-6 lg:px-16 my-5"></canvas>
                        </div>
                        <form action="{{ route('export.document') }}" method="post" id="makePDF">
                        @csrf
                            <input type="hidden" name="chartData" id="chartData">
                            <input type="hidden" name="typeFile" value="{{ $fileReport }}">
                            <button class="text-blue-600 hover:text-blue-900 bg-blue-100 rounded-lg py-1 px-3 text-right" id="ButtonSubmit">Descargar Reporte</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var labels = [];
        var data = [];
        $.ajax({
            url: '/dataCharts',
            type: 'GET',
            dataType: 'json',
            success: function(resp) {
                for(var x = 0; x < resp.length; x++) {
                    labels.push("'"+resp[x].question+"'");
                    data.push(resp[x].total);
                }
                const ctx = document.getElementById('myChart').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: labels,
                            data: data,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                            ],
                            borderWidth: 2
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

            },
            error: function(xhr, status) {
                alert('Disculpe, existió un problema');
            },
        });

        const chart = document.querySelector('#myChart');
        
        $('#ButtonSubmit').click(function() {
            $('#chartData').val(chart.toDataURL());
            $('#makePDF').submit();
        });

    </script>
</x-app-layout>