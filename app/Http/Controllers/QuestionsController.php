<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\Answers;
use App\Models\ContactInformation;
use App\Models\QuestionsRespUser;
use App\Export\ExportData;
use App\Export\ExcelExport;
use App\Models\RespUserTemp;
use App\Models\CountAnswer;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class QuestionsController extends Controller
{

    public function index()
    {
        if (auth()->user()->roles[0]->name == 'admin')
        {
              return view('encuesta.menu_admin');
        }
        else{
            return redirect()->route('encuesta.show');
        }
      
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
        return redirect()->route('dashboard')->with('mensaje',"Encuesta realizada, Gracias por responder!!");;
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

    public function answerUpdate(Request $request, $id)
    {
        $answers = Answers::find($id);
        $answers->update($request->all());
        return back();
    }

    public function destroy(Questions $questions)
    {
        //
    }

    public function export(Request $request) {
        $dato = ExportData::Export($request);
        
        switch ($request['fileExport']) {
            case 'PDF':
                $chart = QuestionsController::charts();
                $fileReport = 'PDF';
                return view('encuesta.charts_image',compact('fileReport'));

                break;
            case 'EXCEL':
                $chart = QuestionsController::charts();
                $fileReport = 'EXCEL';
                return view('encuesta.charts_image', compact('fileReport'));

                break;
            default:
                # code...
                break;
        }
    }

    public function charts() {
        $charts = CountAnswer::all();
        return json_encode($charts);
    }

    public function exportImage(Request $request) {
        $imgChart = $request->get('chartData');
        $img = str_replace('data:image/png;base64,', ' ', $imgChart);
        $fileData = base64_decode($img);
        $filename = date('dmY_his').'.jpeg';
        $path = public_path()."\img\\".$filename;
        file_put_contents($path, $fileData);
        
        $data = RespUserTemp::all();
        $date = Carbon::now();

        switch ($request->get('typeFile')) {
            case 'PDF':
                $title = "Reporte_$date.pdf";

                $pdf = Pdf::loadView('Plantilla_Export.pdf',compact('data','title','filename'));
                $delete = RespUserTemp::whereNotNull('id')->delete();
                $deleteanswer = CountAnswer::whereNotNull('id')->delete();
                return $pdf->download("$title");
            
                break;
            case 'EXCEL':
                $title = "Reporte_$date.xlsx";
                
                return Excel::download(new ExcelExport, "$title");
            
                break;
            default:
                # code...
                break;
        }    
    }
}
