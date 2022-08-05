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
                                    <a href="{{ route('encuesta.show') }}"
                                        class="text-blue-600 hover:text-blue-900 bg-sky-100 rounded-lg py-1 px-9">
                                        Gestionar Encuesta
                                    </a>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <hr><br>
        <form action="{{ route('encuesta.imprimir') }}" method="post">
            @csrf
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <label class="px-4">Ingrese numero de control:</label>
                            <input class="rounded-lg py-1 px-3" type="text" name="num_control" id="id_control"
                                placeholder="">
                            <input class="rounded-lg py-1 px-3" type="hidden" name="fileExport" value="PDF">
                        </div>
                        <br>
                        <div class="px-6 py-4 whitespace-nowrap text-left">
                            <label class="p-4">Periodo Escolar:</label>
                            <div class="inline-flex">
                                <select name="periodoEscolar" id="perdiodo_escolar" class="rounded-lg py-1 px-3">
                                    <option value="">- Periodo -</option>
                                    <option value="Enero-Junio">Enero - Junio</option>
                                    <option value="Agosto-Diciembre">Agosto - Diciembre</option>
                                </select>
                            </div>
                            <div class="inline-flex">
                                <label class="px-3" for="">Fecha de Inicio:</label>
                                <input class="rounded-lg py-1 px-3" type="date" name="fecha_inicial"
                                    id="fecha_inicio">
                                <label class="px-3" for="">Fecha Final:</label>
                                <input class="rounded-lg py-1 px-3" type="date" name="fecha_fin" id="fecha_final">
                            </div>
                            <div class="px-6 py-1 whitespace-nowrap text-left">
                                <button
                                    class="text-red-600 hover:text-red-900 bg-red-100 rounded-lg py-1 px-3 text-right"
                                    type="submit" onclick="buttonPDF(event);">
                                    Exportar PDF
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <br>
        <hr><br>
        <form action="{{ route('encuesta.imprimir') }}" method="post">
            @csrf
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <label class="px-4">Ingrese numero de control:</label>
                            <input class="rounded-lg py-1 px-3" type="text" name="num_control" id="id_control"
                                placeholder="">
                            <input class="rounded-lg py-1 px-3" type="hidden" name="fileExport" value="EXCEL">
                        </div>
                        <br>
                        <div class="px-6 py-4 whitespace-nowrap text-left">
                            <label class="p-4">Periodo Escolar:</label>
                            <div class="inline-flex">
                                <select name="periodoEscolar" id="perdiodo_escolar" class="rounded-lg py-1 px-3">
                                    <option value="">- Periodo -</option>
                                    <option value="Enero-Junio">Enero - Junio</option>
                                    <option value="Agosto-Diciembre">Agosto - Diciembre</option>
                                </select>
                            </div>
                            <div class="inline-flex">
                                <label class="px-3" for="">Fecha de Inicio:</label>
                                <input class="rounded-lg py-1 px-3" type="date" name="fecha_inicial"
                                    id="fecha_inicio">
                                <label class="px-3" for="">Fecha Final:</label>
                                <input class="rounded-lg py-1 px-3" type="date" name="fecha_fin" id="fecha_final">
                            </div>
                            <div class="px-6 py-1 whitespace-nowrap text-left">
                                <button
                                    class="text-green-600 hover:text-green-900 bg-green-100 rounded-lg py-1 px-3 text-right"
                                    type="submit" onclick="buttonPDF();">
                                    Exportar Excel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- <form action="{{ route('encuesta.imprimir') }}" method="post">
        @csrf
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <label class="px-4 text-gray-400">En caso de buscar mas de un num de control agregar una coma</label>
                                <div class=" bg-white px-8 py-3 border-t border-gray-200 sm:px-4">
                                <label class="px-4">Seleccione el semestre a elegir:</label>
                                    <select name="semestre" class="rounded-lg py-1 px-12" id="id_semstre">
                                        <option value="">- Semeste -</option>
                                        <option value="Todos">Todos</option>
                                        <option value="Semestre 1">Semestre 1</option>
                                        <option value="Semestre 2">Semestre 2</option>
                                        <option value="Semestre 3">Semestre 3</option>
                                        <option value="Semestre 4">Semestre 4</option>
                                        <option value="Semestre 5">Semestre 5</option>
                                        <option value="Semestre 6">Semestre 6</option>
                                        <option value="Semestre 7">Semestre 7</option>
                                        <option value="Semestre 8">Semestre 8</option>
                                        <option value="Semestre 9">Semestre 9</option>
                                    </select>
                                    <label class="px-4">Ingrese numero de control:</label>
                                    <input class="rounded-lg py-1 px-3" type="text" name="num_control" id="id_control" placeholder="">
                                    <input type="hidden" name="fileExport" id="fileExport" value="PDF">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-4 whitespace-nowrap text-left">
                    <label class="p-4">Periodo Escolar:</label>
                    <div class="inline-flex">
                        <select name="periodoEscolar" id="perdiodo_escolar" class="rounded-lg py-1 px-3">
                            <option value="">- Periodo -</option>
                            <option value="Enero-Junio">Enero - Junio</option>
                            <option value="Agosto-Diciembre">Agosto - Diciembre</option>
                        </select>
                        <div class="px-6 py-1 whitespace-nowrap text-right">
                            <button class="text-red-600 hover:text-red-900 bg-red-100 rounded-lg py-1 px-3 text-right" type="submit" onclick="buttonPDF();">
                                Exportar PDF
                            </button>
                            <button class="text-green-600 hover:text-green-900 bg-green-100 rounded-lg py-1 px-3 text-right" type="submit" onclick="buttonEXCEL();">
                                Exportar Excel
                            </button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="px-6 py-4 whitespace-nowrap text-left">
                    <label class="p-4">Periodo Personalizado:</label>
                    <div class="py-4 whitespace-nowrap text-left">
                        <div class="inline-flex">
                            <label class="px-3" for="">Fecha de Inicio:</label>
                            <input class="rounded-lg py-1 px-3" type="date" name="fecha_inicial" id="fecha_inicio">
                            <label class="px-3" for="">Fecha Final:</label>
                            <input class="rounded-lg py-1 px-3" type="date" name="fecha_fin" id="fecha_final">
                            <div class="px-6 py-1 whitespace-nowrap text-left">
                                <button class="text-red-600 hover:text-red-900 bg-red-100 rounded-lg py-1 px-3 text-right" type="submit" onclick="buttonPDF();">
                                    Exportar PDF
                                </button>
                                <button class="text-green-600 hover:text-green-900 bg-green-100 rounded-lg py-1 px-3 text-right" type="submit" onclick="buttonEXCEL();">
                                    Exportar Excel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </form> -->


    </div>
    <div class="max-w-8xl sm:px-6 lg:px-8 my-5">
        <canvas id="myChart" class="max-w-8xl sm:px-6 lg:px-8 my-5"></canvas>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script>
        //TODO:  Solucionar el "problema" del id..
        // function buttonPDF() {
        //     document.getElementById('#fileExport').val('PDF');
        // }
        // function buttonEXCEL() {
        //     $('#fileExport').val('EXCEL');
        // }
        let resCount = 0;

        function buttonPDF(event) {
            event.preventDefault();
            $.ajax({
                url: '/dataChart',
                type: 'GET',
                dataType: 'json',
                success: function(resp) {
                    console.log(resp.dataChart)
                    const ctx = document.getElementById('myChart').getContext('2d');
                    const myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: [resp.label,'ejemplo','ejemplo2'],
                            datasets: [{
                                label: [resp.label],
                                data: [resp.dataChart,1,3,7],
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
        }
    </script>
</x-app-layout>
