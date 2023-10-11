<x-app-layout>

    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ strtoupper(__('Graduates')) }}
            </h2>
        </x-slot>
        <div>
            <div class="max-w-8xl sm:px-6 lg:px-8 my-5">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex-col flex">
                        <div class="block">
                            <br>
                            <form action="{{route('searchStudent',1)}}" method="POST" class="ml-3">
                                @csrf
                                <select name="year" id="year" class="rounded-lg py-1 px-4"></select>
                            <select name="periodoEscolar" id="perdiodo_escolar" class="rounded-lg py-1 px-3 " required>
                                <option value="">- Periodo -</option>
                                <option value="Enero-Junio">Enero - Junio</option>
                                <option value="Agosto-Diciembre">Agosto - Diciembre</option>
                            </select>
                            <button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                  </svg>
                            </button>
                        </form>
                                {{-- <a class="px-3 py-2 bg-indigo-700 text-indigo-400 hover:text-white float-right" href="#">
                                    Crear Usuario
                                </a> --}}
                         
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <div class="flex bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                                      
                                        
                                        {{-- @unless ($search == '')
                                            <button wire:click="clear" class="form-input rounded-md shadow-sm mt-1 ml-6 block btn text-red-500">
                                                X
                                            </button>
                                        @endunless --}}
                                        @php
                                        $to = $fechaEnd ?? 0;
                                       $from = $fechaIni ?? 0;
                                    @endphp       
                                      <form action="{{route('userDonwload',[$to,$from,1])}}" method="POST">
                                        @csrf
                                       
                                        <button  type="submit" class="bg-red-700 hover:bg-red-600 text-white font-bold py-2 px-10 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                                               <path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z"/>
                                                 <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z"/>
                                               PDF  </svg>
                                          </button>
                                      </form>
                                    </div>
                               
                                    @if($users->count())
                                        <table class="min-w-full divide-y divide-gray-200 flex flex-row flex-no-wrap">
                                            <thead>
                                                <tr class="flex flex-col flex-no wrap sm:table-row">
                                                    <th scope="col"
                                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Nombre
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Informacion
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Fecha de egreso
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Status
                                                    </th>
                                                   
                                                    <th scope="col" class="px-6 py-3 bg-gray-50">
                                                        <span class="sr-only">Edit</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach ($users as $user)
                                                    <tr class="flex flex-col flex-no wrap sm:table-row">
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="flex items-center">
                                                                <div class="flex-shrink-0 h-10 w-10">
                                                                    <img class="h-10 w-10 rounded-full"
                                                                        src="{{$user->profile_photo_url}}"
                                                                        alt="{{$user->name}}">
                                                                </div>
                                                                <div class="ml-4">
                                                                    <div class="text-sm font-medium text-gray-900">
                                                                        {{$user->name}}
                                                                    </div>
                                                                    <div class="text-sm text-gray-500">
                                                                        {{$user->email}} 
                                                                       
                                                                    </div>
                                                                    @if($user->contactInformation)
                                                                    <div class="text-sm text-gray-500">
                                                                        <span class="text-gray-500">
                                                                            {{$user->contactInformation->second_email}}
                                                                        </span>
                                                                       
                                                                    </div>
                                                                   
                                                                @endif
                                                                  
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="text-sm text-gray-900 font-medium flex">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="1rem">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                                                </svg>
                                                                <span class="pl-5">
                                                                    {{$user->smart_phone}}
                                                                </span>
                                                            </div>
                                                            <div class="text-sm text-gray-500 font-medium flex">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="1rem">
                                                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                                                </svg>
                                                                <span class="pl-5">
                                                                  
                                                                  {{$user->enrollment}}
                                                               
                                                                </span>
                                                            </div>
                                                            <div class="text-sm text-gray-500 font-medium">
                                                                <span>
                                                                   
                                                                    {{$user->address}}
                                                                
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <span
                                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                                                               
                                                                    {{Carbon\Carbon::parse($user->date_graduate)->format('d-m-Y')}}
                                                              
                                                            </span>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <span
                                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full @if($user->active) bg-green-100 text-green-800 @else bg-red-100 text-red-800  @endif">
                                                                {{$user->active ? 'Activo': 'Inactivo'}}
                                                            </span>
                                                        </td>
                                                        
                                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                            <a href="{{route('users.edit',$user->id)}}" class="text-indigo-600 hover:text-indigo-900 bg-purple-100 rounded-lg py-1 px-3">Editar</a>
                                                            <a href="{{route('users.destroy',$user->id)}}" class="text-red-600 hover:text-red-900 bg-red-100 rounded-lg py-1 px-3">Eliminar</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                                            {{ $users->links() }}
                                        </div>
                                    @else
                                    <div class="bg-white px-4 py-3 border-t border-gray-500 sm:px-6">
                                        Sin resultados
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
               <script>
                var new_y = new Date();
                var ful_year = new_y.getFullYear();
                var select = document.getElementById("year");
                for (let index = ful_year; index >= 1997; index--) {
                    var opc = document.createElement("option");
                    opc.text = index;
                    opc.value = index;
                    select.add(opc);     
                }
              
            </script>
        </div>
    </div>
    </x-app-layout>