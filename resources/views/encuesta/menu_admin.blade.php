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
                                    <a 
                                        href="{{ route('encuesta.show') }}" 
                                        class="text-blue-600 hover:text-blue-900 bg-sky-100 rounded-lg py-1 px-9"
                                    >
                                        Gestionar Encuesta
                                    </a>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><hr><br>
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-col">
                <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <div class=" bg-white px-8 py-3 border-t border-gray-200 sm:px-4">
                                <label class="px-4">Seleccione el semestre a elegir:</label>
                                <select name="" class="rounded-lg py-1 px-12">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-6 py-4 whitespace-nowrap text-left">
                <form action="">
                    <label class="p-4">Periodo Escolar:</label>
                    <div class="inline-flex">
                        <input type="hidden" value="" name="semestreValue" id="semestreId">
                        <select name="" id="" class="rounded-lg py-1 px-3">
                            <option value="">- Periodo -</option>
                            <option value="Enero-Agosto">Enero - Junio</option>
                            <option value="Agosto-Diciembre">Agosto - Diciembre</option>
                        </select>
                        <div class="px-6 py-1 whitespace-nowrap text-right">
                            <button class="text-red-600 hover:text-red-900 bg-red-100 rounded-lg py-1 px-3 text-right">
                                Exportar PDF
                            </button>
                            <button class="text-green-600 hover:text-green-900 bg-green-100 rounded-lg py-1 px-3 text-right">
                                Exportar Excel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <hr>
            <div class="px-6 py-4 whitespace-nowrap text-left">
                <form action="">
                    <input type="hidden" value="" name="semestreValue" id="semestreId">
                    <label class="p-4">Periodo Personalizado:</label>
                    <div class="py-4 whitespace-nowrap text-left">
                        <div class="inline-flex">
                            <label class="px-3" for="">Fecha de Inicio:</label>
                            <input class="rounded-lg py-1 px-3" type="date" name="" id="">
                            <label class="px-3" for="">Fecha Final:</label>
                            <input class="rounded-lg py-1 px-3" type="date" name="" id="">
                            <div class="px-6 py-1 whitespace-nowrap text-left">
                                <a class="text-red-600 hover:text-red-900 bg-red-100 rounded-lg py-1 px-3 text-right" href="{{ route('encuesta.imprimir') }}">
                                    Exportar PDF
                                </a>
                                <a class="text-green-600 hover:text-green-900 bg-green-100 rounded-lg py-1 px-3 text-right">
                                    Exportar Excel
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
            <hr>
        </div>
    </div>

    <script>
        
    </script>
</x-app-layout>