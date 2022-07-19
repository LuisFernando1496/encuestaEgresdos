<x-app-layout>

    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create') }} {{ __('Events') }}
            </h2>
        </x-slot>
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-8 m-10 bg-gray-50" >
           
            <form action="{{route('activity.store')}}"  method="POST" enctype="multipart/form-data">
                @csrf
             <div class="mb-10 ">
                  <label for="name_event" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Nombre del evento</label>
                  <input name="name_event" type="text" id="name_event" class="shadow-sm bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-50 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required>
                </div>
                <div class="mb-10 bg-gray-50">
                  <label for="fecha_event" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Fecha del evento</label>
                  <input name="fecha_event" type="date" id="fecha_event" class="shadow-sm bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-50 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required>
                </div>
                <div class="mb-10 bg-gray-50">
                  <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Descripcion</label>
                  <textarea  name="description" type="text" id="description" class="shadow-sm bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-50 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required>
                  
                  </textarea>
                </div>
                <div class="mb-10 bg-gray-50">
                  <label for="place" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Lugar</label>
                  <input  name="place" type="text" id="place" class="shadow-sm bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-50 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required>
                </div>
               
                <div class="mb-10 bg-gray-50">
                  <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Foto</label>
                  <input name="image" type="file" id="image" class="shadow-sm bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-50 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
                </div>
               
             
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('Update') }}</button>
         
               
              </form>
        </div>
  </x-app-layout>
  