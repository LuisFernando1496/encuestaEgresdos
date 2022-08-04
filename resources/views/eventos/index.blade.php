<x-app-layout>

    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Job Bank') }}
        </h2>
    </x-slot> --}}

    <!-- component -->
    <section class="bg-white dark:bg-gray-100">

        <div class="container px-6 py-10 mx-auto">
            @if (auth()->user()->roles[0]->name == 'admin')
            <a type="button" href="{{route('activity.create')}}"
                class="animate-bounce p-1 m-5 w-14 h-14 cursor-pointer rounded-full bg-blue-500 hover:bg-blue-400 text-white text-center 
            float-right">
                <svg xmlns="http://www.w3.org/2000/svg" width="47" height="47" fill="currentColor" class="bi bi-plus"
                    viewBox="0 0 16 16">
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
            </a>
             @endif
            <h1 class="text-3xl font-semibold text-center text-gray-800 capitalize lg:text-4xl dark:text-black">
                {{ __('Events') }}</h1>
            <p class="max-w-2xl mx-auto my-6 text-center text-gray-900 dark:text-gray-900">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo incidunt ex placeat modi magni quia error
                alias, adipisci rem similique, at omnis eligendi optio eos harum.
            </p>

            <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-16 md:grid-cols-2 xl:grid-cols-4">
                @forelse ($activities as $activity)
                    <div
                        class="flex flex-col items-center p-8 transition-colors duration-200 transform cursor-pointer group bg-blue-600 hover:bg-blue-400 rounded-xl">


                        <a href="{{ route('activity.show', $activity) }}">

                            <img class="object-scale w-54 h-52 rounded-bl-lg ring-4 ring-gray-300"
                                src="{{ $activity->image }}" alt="imagen-empresa">

                            <h1
                                class="mt-4 text-2xl font-semibold text-gray-700 capitalize dark:text-white group-hover:text-black">
                                {{ $activity->name_event }}</h1>

                            <p class="mt-2 text-gray-500 capitalize dark:text-gray-100 group-hover:text-gray-900">
                                <strong>Fehca del evento:</strong> {{ $activity->fecha_event }}
                            </p>
                            <p class="mt-2 text-gray-500 capitalize dark:text-gray-100 group-hover:text-gray-900">
                                {{ $activity->description }}</p>
                            <p> <strong>Lugar: </strong>{{ $activity->place }}</p>
                            <p><strong>Tel:</strong> {{ $activity->phone_number }}</p>
                        </a>
                        @if (auth()->user()->roles[0]->name == 'admin')
                            <div class="flex mt-3 -mx-2">
                                <a href="{{ route('activity.edit', $activity) }}" type="button"
                                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                    </svg>
                                </a>

                                <a href="{{ route('activity.destroy', $activity) }}" type="button"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                    </svg>
                                </a>

                            </div>
                        @endif

                    </div>
                @empty
                @endforelse

            </div>
            <div>
                {{ $activities->links() }}
            </div>
        </div>
    </section>

</x-app-layout>
