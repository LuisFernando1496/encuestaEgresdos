<x-app-layout>

    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create') }} {{ __('Job Bank') }}
            </h2>
        </x-slot>
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-8 m-10 bg-gray-50" >

            <form>
                <div class="mb-10 ">
                  <label for="name_enterprise" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Nombre de la Empresa</label>
                  <input type="text" id="name_enterprise" class="shadow-sm bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-50 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required>
                </div>
                <div class="mb-10 bg-gray-50">
                  <label for="market_stall" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Puesto que ofrece</label>
                  <input type="text" id="market_stall" class="shadow-sm bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-50 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required>
                </div>
                <div class="mb-10 bg-gray-50">
                  <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Descripcion del puesto</label>
                  <textarea type="text" id="description" class="shadow-sm bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-50 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required>

                  </textarea>
                </div>
                <div class="mb-10 bg-gray-50">
                  <label for="workday" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Dias de trabajo</label>
                  <input type="text" id="workday" class="shadow-sm bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-50 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required>
                </div>
                <div class="mb-10 bg-gray-50">
                  <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Telefono</label>
                  <input type="number" id="phone_number" class="shadow-sm bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-50 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required>
                </div>
                <div class="mb-10 bg-gray-50">
                  <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Email</label>
                  <input type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-50 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required>
                </div>
                <div class="mb-10 bg-gray-50">
                  <label for="city_origin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Ciudad</label>
                  <input type="text" id="city_origin" class="shadow-sm bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-50 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required>
                </div>
                <div class="mb-10 bg-gray-50">
                  <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Foto</label>
                  <input type="file" id="image" class="shadow-sm bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-50 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
                </div>
               
                <div class="flex items-start mb-6">
                  
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register new account</button>
              </form>
        </div>
</x-app-layout>
