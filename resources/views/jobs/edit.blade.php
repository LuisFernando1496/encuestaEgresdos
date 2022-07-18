<x-app-layout>

    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Update') }} {{ __('Job Bank') }}
            </h2>
        </x-slot>
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-8 m-10 bg-gray-50" >
           
            <form action="{{route('jobs.update',$jobs)}}"  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
             <div class="mb-10 ">
                  <label for="name_enterprise" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Nombre de la Empresa</label>
                  <input value="{{$jobs->name_enterprise}}" name="name_enterprise" type="text" id="name_enterprise" class="shadow-sm bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-50 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required>
                </div>
                <div class="mb-10 bg-gray-50">
                  <label for="market_stall" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Puesto que ofrece</label>
                  <input value="{{$jobs->market_stall}}" name="market_stall" type="text" id="market_stall" class="shadow-sm bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-50 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required>
                </div>
                <div class="mb-10 bg-gray-50">
                  <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Descripcion del puesto</label>
                  <textarea  name="description" type="text" id="description" class="shadow-sm bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-50 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required>
                    {{$jobs->description}}
                  </textarea>
                </div>
                <div class="mb-10 bg-gray-50">
                  <label for="workday" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Dias de trabajo</label>
                  <input value="{{$jobs->workday}}" name="workday" type="text" id="workday" class="shadow-sm bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-50 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required>
                </div>
                <div class="mb-10 bg-gray-50">
                  <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Telefono</label>
                  <input value="{{$jobs->phone_number}}" name="phone_number" type="number" id="phone_number" class="shadow-sm bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-50 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required>
                </div>
                <div class="mb-10 bg-gray-50">
                  <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Email</label>
                  <input value="{{$jobs->email}}" name="email" type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-50 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required>
                </div>
                <div class="mb-10 bg-gray-50">
                  <label for="city_origin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Ciudad</label>
                  <input value="{{$jobs->city_origin}}" name="city_origin" type="text" id="city_origin" class="shadow-sm bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-50 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required>
                </div>
                <div class="mb-10 bg-gray-50">
                  <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Foto</label>
                  <input name="image" type="file" id="image" class="shadow-sm bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-50 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
                </div>
               
             
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('Update') }}</button>
         
               
              </form>
        </div>
</x-app-layout>
