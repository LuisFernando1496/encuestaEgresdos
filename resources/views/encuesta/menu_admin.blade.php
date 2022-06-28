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
                                    <button class="text-indigo-600 hover:text-indigo-900 bg-purple-100 rounded-lg py-1 px-3">Ver encuestas</button>
                                    o    
                                    <button class="text-green-600 hover:text-green-900 bg-green-100 rounded-lg py-1 px-3">editar encuestas</button>
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
                            <div class="flex bg-white px-4 py-3 border-t border-gray-200 sm:px-4">
                                <label for="">Seleccione un periodo o 
                                    <button class="text-indigo-600 hover:text-indigo-900 bg-purple-100 rounded-lg py-1 px-3">descargue todas las encuestas</button>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-6 py-4 whitespace-nowrap text-left">
                <form action="">
                    <label class="p-4">Periodo Escolar:</label>
                    <div class="inline-flex">
                        <select name="" id="" class="rounded-lg py-1 px-3">
                            <option value="">- Periodo -</option>
                            <option value="Enero-Agosto">Enero - Junio</option>
                            <option value="Agosto-Diciembre">Agosto - Diciembre</option>
                        </select>
                        <div class="px-6 py-1 whitespace-nowrap text-right">
                            <button class="px-6 py-4 whitespace-nowrap text-right px-4 text-indigo-600 hover:text-indigo-900 bg-purple-100 rounded-lg py-1 px-3">Descargar</button>
                        </div>
                    </div>
                </form>
            </div>
            <hr>
            <div class="px-6 py-4 whitespace-nowrap text-left">
                <form action="">
                    <label class="p-4">Periodo Personalizado:</label>
                    <div class="py-4 whitespace-nowrap text-left">
                        <div class="inline-flex">
                            <label class="px-3" for="">Fecha de Inicio:</label>
                            <input class="rounded-lg py-1 px-3" type="date" name="" id="">
                            <label class="px-3" for="">Fecha Final:</label>
                            <input class="rounded-lg py-1 px-3" type="date" name="" id="">
                            <div class="px-6 py-1 whitespace-nowrap text-left">
                                <button class="px-6 whitespace-nowrap text-right px-4 text-indigo-600 hover:text-indigo-900 bg-purple-100 rounded-lg py-1 px-3">Descargar</button>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
            <hr>
            
        </div>
    </div>
</x-app-layout>