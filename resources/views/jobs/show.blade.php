<x-app-layout>

    <div></div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Jobs Bank')}}
            </h2>
        </x-slot>

<!-- component -->
<section class="bg-white dark:bg-gray-900">
    <div class="container flex flex-col items-center px-4 py-12 mx-auto xl:flex-row">
        <div class="flex justify-center xl:w-1/2">
            <img class="h-80 w-80 sm:w-[28rem] sm:h-[28rem] flex-shrink-0  object-scale" src="{{$jobs->image}}" alt="imagen">
        </div>
        
        <div class="flex flex-col items-center mt-6 xl:items-start xl:w-1/2 xl:mt-0">
            <h2 class="text-3xl font-bold tracking-tight text-gray-800 xl:text-4xl dark:text-white">
               {{ $jobs->name_enterprise}}
            </h2>

            <p class="block max-w-2xl mt-4 text-xl text-gray-500 dark:text-gray-300">{{$jobs->description}} </p>
            
            <div class="mt-6 sm:-mx-2">
                <p class="text-gray-500 dark:text-gray-300">{{$jobs->workday}}</p>
                <p class="text-gray-500 dark:text-gray-300">{{$jobs->phone_number}}</p>
                <p class="text-gray-500 dark:text-gray-300">{{$jobs->email}}</p>
                <p class="text-gray-500 dark:text-gray-300">{{$jobs->city_origin}}</p>

               
            </div>
        </div>
    </div>
</section>
</div>
    </x-app-layout>