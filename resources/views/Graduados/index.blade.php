<x-app-layout>

    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Graduates') }}
            </h2>
        </x-slot>
        <div>
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 my-5">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex-col flex">
                        <div class="block">

                            <a class="px-3 py-2 bg-indigo-700 text-indigo-400 hover:text-white float-right"
                                href="#">
                                Crear Usuario
                            </a>

                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <div class="flex bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                                        <input wire:model='search'
                                            class="form-input rounded-md shadow-sm mt-1 block w-full" type="text"
                                            placeholder="Ingrese la Clave de usuario o Correo">

                                        {{-- @unless($search == '')
                                        <button wire:click="clear" class="form-input rounded-md shadow-sm mt-1 ml-6 block btn text-red-500">
                                            X
                                        </button>
                                    @endunless --}}
                                    </div>

                                    @if ($users->count())
                                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                            <table class="w-full text-sm text-left text-gray-500 ">
                                                <thead
                                                    class="text-xs text-gray-700 uppercase  ">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3">
                                                            Product name
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Color
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Category
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Price
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            <span class="sr-only">Edit</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr
                                                        class="bg-black border-b">
                                                    
                                                    <tr
                                                        class=" border-b  hover:bg-withe-300 dark:hover:bg-gray-600">
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900  whitespace-nowrap">
                                                            Microsoft Surface Pro
                                                        </th>
                                                        <td class="px-6 py-4">
                                                            White
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            Laptop PC
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            $1999
                                                        </td>
                                                        <td class="px-6 py-4 text-right">
                                                            <a href="#"
                                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                        </td>
                                                    </tr>
                                                  
                                                     
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                                            {{ $users->links() }}
                                        </div>
                                    @else
                                        <div class="bg-white px-4 py-3 border-t border-gray-500 sm:px-6">
                                            Sin resultados para: shasa
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                @media (min-width: 640px) {
                    table {
                        display: inline-table !important;
                    }
                }

                @media (max-width: 640px) {
                    thead tr {
                        display: none !important;
                    }
                }
            </style>
        </div>
    </div>
</x-app-layout>
