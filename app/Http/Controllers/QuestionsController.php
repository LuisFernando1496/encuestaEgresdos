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
use App\Charts\UserChart;

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
        $labels = [];
        $dataset = [];

        $dato = ExportData::Export($request);

        //$chart = QuestionsController::charts();
        //partName = date('dmY_his');

        switch ($request['fileExport']) {
            case 'PDF':
                $data = RespUserTemp::all();
                $date = Carbon::now();
                $title = "Reporte_$date.pdf";

                foreach($data as $value) {
                    $labels[] = $value->question;
                    $dataset[] = $value->total;
                }

                $charts = new UserChart;
                $charts->labels($labels);
                $charts->dataset('Total de Respuestas', 'line', $dataset);
                //dd($charts);
                return view('encuesta.charts_image', compact('charts'));

                // $pdf = \PDF::loadView('Plantilla_Export.pdf',compact('data','title','charts'));
                // return $pdf->download("$title");
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
        $charts = RespUserTemp::all();
    }

    public function seePDF() {
        return view('encuesta.charts_image');
    }

    public function exportImage(Request $request) {
        $img = str_replace('data:image/png;base64,', ' ', $img);
        $fileData = base64_decode($img);
        $filename = date('dmY_his').'.'.$path->getClientOriginalExtension();
        $path->move('img',$filename);
    }

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
