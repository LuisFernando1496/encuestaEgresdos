<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\QuestionsRespUser;

class QuestionsController extends Controller
{

    public function index()
    {
        return view('encuesta.menu_admin');
    }


    public function create()
    {
        $questions = Questions::where('status', true)->whereNull('question_id')->with('answers', 'categoryQuestion')->get();
        
        return view('encuesta.show_edit', compact('questions'));
    }


    public function store(Request $request)
    {

        $question = Questions::where('status', true)->whereNull('question_id')->get();
        $user = auth()->user();

        foreach ($question as  $value) {
            $answerNum = 0;
            $answerText = 0;
            $complement = 0;
            if (  is_numeric($request["pregunta$value->id"])) {
                $answerNum = $request["pregunta$value->id"];
            } else {
                $answerText = $request["pregunta$value->id"];
            }
            if ($request["complement$value->id"]) {
                $complement = $request["complement$value->id"];
            }
            $respuestas = QuestionsRespUser::create([
                'user_id' => $user->id,
                'category' => $request["category$value->id"],
                'question' => $value->question,
                'answer_num' => $answerNum,
                'answer_text' => $answerText,
                'answer_other_ specify' => $complement,
                'status',
            ]);
        }
        return 'Guardado';
    }


    public function show()
    {
        $questions = Questions::where('status', true)->whereNull('question_id')->with('answers', 'categoryQuestion')->get();
        //  return $questions[19]->subQuestion;
    
        return view('encuesta.index', compact('questions')->get());
    }


    public function edit(Questions $questions)
    {
        //
    }


    public function update(Request $request, $id)
    {
        
    }


    public function destroy(Questions $questions)
    {
        //
    }

    public function exportPDF() {
        //$encuesta = \PDF::loadView('encuesta.plantilla_reporte');
        //return $pdf->download('Reporte de Encuesta.pdf');
    }

    public function exportExcel() {
        
    }
}
