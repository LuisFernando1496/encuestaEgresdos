<x-app-layout>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quiz') }}
        </h2>
    </x-slot>
    
    <div class="max-w-8xl sm:px-6 lg:px-8 my-5">
        @forelse ($questions as $i => $pregunta)
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if ($i == 0)
                    <div class="flex flex-col">
                        <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <div class="flex bg-white px-4 py-3 border-t border-gray-200 sm:px-4">
                                        <label for="">{{ $pregunta->categoryQuestion->name }}</label>
                                        <div class="space-x-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                @if ($questions[$i - 1]->categoryQuestion->name != $pregunta->categoryQuestion->name)
                    <div class="flex flex-col">
                        <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <div class="flex bg-white px-4 py-3 border-t border-gray-200 sm:px-4">
                                        <label for="">{{ $pregunta->categoryQuestion->name }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                @endif
                @endif
                <div class="px-6 py-4 text-left">
                    <div>
                        <label for="" class="px-3">Pregunta</label>
                        <form action="{{ route('question.update', $pregunta->id) }}" method="post">
                        @csrf
                            <input type="text" name="question" value="{{ $pregunta->question }}" class="form-input rounded-md shadow-sm mt-1 block w-full" id="questionInput{{ $pregunta->id }}"/>
                            <div class="px-6 py-1 whitespace-nowrap text-right">
                                <button 
                                    class="px-6 py-2 whitespace-nowrap text-right px-4 text-green-600 hover:text-green-900 bg-emerald-100 rounded-lg py-1 px-3"
                                    id="btnQuestion"
                                    type="submit"
                                >
                                    Editar    
                                </button>
                            </div>
                        </form>
                        <label for="" class="px-3">Respuestas</label><br><br>
                        <form action="{{ route('answers.update', $answer->id) }}" method="post">
                        @csrf
                            @foreach ($pregunta->answers as $item => $answer)
                                <div class="inline-flex rounded-md">
                                    <input type="hidden" name="question_id" value="{{ $answer->question_id }}"/>
                                    <input type="text" name="option" value="{{ $answer->option }}" class="form-input rounded-md shadow-sm mt-1 block w-full" id="respuesta{{ $answer->id }}"/>
                                    <div class="px-6 py-1 whitespace-nowrap text-right">
                                        <button 
                                            class="px-6 py-2 whitespace-nowrap text-right px-4 text-orange-600 hover:text-orange-900 bg-yellow-100 rounded-lg py-1 px-3"
                                            id="btnRespuesta"
                                        >
                                            Editar    
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
</x-app-layout>