<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\ContactInformation;
use App\Models\QuestionsRespUser;
use App\Export\ExportData;
use App\Export\ExcelExport;
use App\Models\RespUserTemp;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

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
    
        return view('encuesta.index', compact('questions'));
    }


    public function edit(Questions $questions)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $questions = Questions::find($id);
        $questions->update($request->all());
        return back();
    }


    public function destroy(Questions $questions)
    {
        //
    }

    public function export(Request $request) {
        $dato = ExportData::Export($request);
        //$chart = QuestionsController::charts();
        
        switch ($request['fileExport']) {
            case 'PDF':
                $data = RespUserTemp::all();
                $date = Carbon::now();
                $title = "Reporte_$date.pdf";

                $pdf = \PDF::loadView('Plantilla_Export.pdf',compact('data','title'));
                return $pdf->download("$title");
                break;
            case 'EXCEL':
                $date = Carbon::now();
                $title = "Reporte_$date.xlsx";
                
                return Excel::download(new ExcelExport, "$title");
                break;
            default:
                # code...
                break;
        }
    }

    public function charts() {
        $answer;
        $array;
        $array2;
        $charts = RespUserTemp::all();

        foreach ($charts as $value) {
            $question = $value->question;
            $answer_num = $value->answer_num;
            $answer_text = $value->answer_text;
            $answer_other_specify = $value->answer_other_specify;

            foreach($charts as $item) {
                $consulta = QuestionsRespUser::where('question', $question)
                                               ->where('answer_num', $answer_num)
                                               ->where('answer_text', $answer_text)
                                               ->where('answer_other_specify', $answer_other_specify)
                                               ->get();
            }
            
            $count = count($consulta);

            if($answer_num != null) {
                $answer = $answer_num;
            }
            if($answer_text != null) {
                $answer = $answer_text;
            }
            if($answer_other_specify != null) {
                $answer = $answer_other_specify;
            }

            $dd[] = array(
                'question' => $value->question,
                
                'total' => $count,
            );            
        }

        for($i = 1; $i < count($dd); $i++) {
            for ($j = 0; $j < count($dd)-$i; $j++) { 
                if($dd[$j] == $dd[$j+1]) {
                    $array[] = array(
                        'dato' => $dd[$j],
                    );
                }
            }
        }
        
        for ($i = 1; $i < count($array); $i++) { 
            for($j = 0; $j < count($dd); $j++) {
                if($dd[$j] == $array[$j+1]) {
                    $array2[] = array(
                        'dato' => $dd[$j],
                    );
                }
            }
        }

        dd($array2);
    }

    public function chartsData() {

    }

    // public function seePDF() {
    //     $data = $getData;

    //     $date = Carbon::now();
    //     $title = "Reporte_$date.pdf";

    //     return view('encuesta.charts_image', compact('data', 'title'));
    // }

    // public function seeExcel() {
    //     $data = $getData;

    //     $date = Carbon::now();
    //     $title = "Reporte_$date.xlsx";

    //     return view('encuesta.charts_image', compact('data', 'title'));
    // }

    // public function exportDoc(Request $request) {
    //     //code...

    //     $pdf = \PDF::loadView('Plantilla_Export.plantilla_reporte', compact('data'));
    //     return $pdf->download('title');
    // }
}
