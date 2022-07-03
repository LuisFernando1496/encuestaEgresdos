
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<style>
    .logo{
        float: left; 
        width: 100px;
    }
</style>
<body>
    <div class="center-items">
        <img class="logo" src="" alt="imagen">
        <h2>
            Reporte de 
        </h2>
    </div>
    <hr>
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
</body>
</html>