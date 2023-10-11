<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quiz') }}
        </h2>
    </x-slot>
    <h5 class="text-center"><strong>*De la manera mas atenta se le pide resolver la siguiente encuesta. Gracias!</strong></h5>
    <form action="{{route('encuesta.store')}}" method="POST">
        @csrf
        <div class="container flex flex-wrap ">
            <div class="m-1 sm:p-0 xl:p-20">
                
                <br>
                  @if (auth()->user()->roles[0]->name == 'admin')
                <div class="flex-col flex">
                    <div class="block">
                        <a class="text-yellow-600 hover:text-yellow-900 bg-yellow-100 rounded-lg py-1 px-3 float-left" href="{{ route('encuesta.create') }}">
                            Editar
                        </a>
                    </div>
                </div>
                    @endif
                <div class="border-solid border-2 rounded-lg dark:border-indigo-900 m-5 bg-violet-100">
                @forelse ($questions as $i => $pregunta)
                   

                        @if ($i == 0)
                            <div class="text-center text-xl leading-7 font-semibold text-indigo-50 bg-indigo-900">
                                {{ $pregunta->categoryQuestion->name }}
                            </div>
                            <hr class="border-indigo-900">
                            <br>
                        @else
                            @if ($questions[$i - 1]->categoryQuestion->name != $pregunta->categoryQuestion->name)
                                <div class="text-center text-xl leading-7 font-semibold  text-indigo-50 bg-indigo-900">
                                    {{ $pregunta->categoryQuestion->name }} </div>
                                <hr class="border-indigo-900">
                                <br>
                            @else
                            @endif
                        @endif


                       

                        <br>
                        <div class="">  
                            <!-- Preguntas -->
                             <div class=" text-center  ml-4 text-md leading-7 font-semibold">{{$i +1}}.- {{ $pregunta->question }}</div>
                            <div class=" text-gray-600 dark:text-gray-400 text-sm ">
                                <div class="form-check">
                                    <div class="grid grid-cols-1 sm:grid-cols-1 xl:grid-cols-4 text-center "
                                        id="divGrid{{ $pregunta->id }}">
                                        <!-- Respuestas -->
                                        @foreach ($pregunta->answers as $item => $answer)
                                            <div class="border-solid border-2 border-indigo-900  hover:bg-indigo-400 hover:text-indigo-50 m-5 p-5 rounded-lg text-left"
                                                onclick="option(answer={{ $answer }}, pregunta = {{ $pregunta->id }})"
                                                id="divOption{{ $answer->id }}" style="cursor: pointer">

                                                <input type="hidden" name="category{{$pregunta->id}}" value="{{$pregunta->categoryQuestion->name}}">
                                                   
                                                <input class="form-check-input" type="radio"
                                                    name="pregunta{{ $pregunta->id }}" id="{{ $answer->id }}"
                                                    value="{{ $answer->option }}" >
                                                <label class="form-check-label" for="{{ $answer->id }}">
                                                    {{ $answer->option }}</label>
                                                    @if ($answer->option == 1)
                                                        <strong>(MUY BUENA)</strong>
                                                    @endif
                                                    @if ($answer->option == 2)
                                                        <strong>(BUENA)</strong>
                                                    @endif
                                                    @if ($answer->option == 3)
                                                        <strong>(REGULAR)</strong>
                                                    @endif
                                                    @if ($answer->option == 4)
                                                        <strong>(MALA)</strong>
                                                    @endif
                                                   
                                                    
                                            </div>
                                        @endforeach

                                        @if ($pregunta->subQuestion)
                                            <br>
                                            @foreach ($pregunta->subQuestion as $item)
                                                <div class="ml-4 text-sm leading-7 font-semibold">
                                                    {{ $item->question }}
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>


                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                   
                @empty
                @endforelse 
               
             </div>
             <div class="grid grid-cols-4">
                <button type="submit" class="col-start-2 col-span-2 bg-indigo-700 hover:bg-indigo-900 text-indigo-50 rounded-lg border-2 p-2">
                    {{ __('Enviar') }}
                </button>
             </div>
            </div>
          
        </div>

       

    </form>
    <script>
        let questions = [];
        const stilesBg = 'bg-indigo-500';
        const stilesText = 'text-indigo-50';
        let anterior;
        const option = (answer, pregunta) => {
            
            let idanswer = document.getElementById(answer.id);
            let divOption = document.getElementById(`divOption${answer.id}`);
            let divGrid = document.getElementById(`divGrid${pregunta}`);
            let elemento = document.getElementById(`complement${pregunta}`);
            
            if (questions.length == 0) {
                divOption.classList.add(stilesBg, stilesText);
                questions.push({
                    id: pregunta,
                    answer: answer.id,
                    flag_to_complement: answer.flag_to_complement
                });
               
                complement(answer, pregunta, divGrid,idanswer);
                

            } 
            else {

                let findQuestions = questions.find(question => question.id == pregunta);
                if (findQuestions != undefined) {
                    document.getElementById(`divOption${findQuestions.answer}`).classList.remove(stilesBg, stilesText);
                    //idanswer.checked = true;
                    divOption.classList.add(stilesBg, stilesText);
                    complement(answer, findQuestions.id, divGrid,idanswer);
                    findQuestions.answer = answer.id;
                    findQuestions.flag_to_complement =answer.flag_to_complement;
                } 
                
                else {
                  //  idanswer.checked = true;
                    divOption.classList.add(stilesBg, stilesText);
                    questions.push({
                        id: pregunta,
                        answer: answer.id,
                        flag_to_complement: answer.flag_to_complement
                    });

                    complement(answer, pregunta, divGrid,idanswer);
                }
            }



        }

        const complement = (answer, pregunta, divGrid, idanswer) => {
           idanswer.setAttribute('checked', true);
            let elemento = document.getElementById(`complement${pregunta}`);
            if (!elemento) {
               
                if (answer.flag_to_complement == 1) {
                   
                    divGrid.innerHTML +=
                        `   <input type="text" class="sm:row-start-6 sm:col-span-1 xl:row-start-3 xl:col-span-4    
                                m-5 p-5 rounded-lg text-left" name="complement${pregunta}"
                               id="complement${pregunta}" placeholder="Escribe otra opción">`;
                               
                }
            } else {

                elemento.remove();
            }

        }
    </script>
</x-app-layout>
