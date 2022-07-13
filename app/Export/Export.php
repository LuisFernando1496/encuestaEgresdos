<?php

namespace App\Export;

use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\ContactInformation;
use App\Models\QuestionsRespUser;
use App\Models\CategoryQuestions;

class Export {
    public function exportPDF(Request $request){
        $periodo;
        $data = [];
        $num_answer_num = 0;
        $num_answer_text = 0;
        $num_answer_specify = 0;

        if($request['periodoEscolar'] != null){
            $periodo = 'escolar';
        }else {
            $periodo = 'otro';
        }
        
        switch ($periodo) {
            case 'escolar':
                if($request['num_control'] != null) {
                    $x = 0;
                    $y = "";
                    $z = "";

                    $data_num_control = explode(',', $request['num_control']);
                    
                    foreach($data_num_control as $value) {
                        $alumno_id = ContactInformation::select('id')->where('enrollment', $value)->get()->pluck('id');
                        $question_user = QuestionsRespUser::where('user_id', $alumno_id[0])->get();
                        
                        foreach($question_user as $item) {
                            if ($x == $item->answer_num) {
                                $num_answer_num = $num_answer_num + 1;
                            }
                            if ($y = $item->answer_text) {
                                $num_answer_text = $num_answer_text + 1;
                            }
                            if ($z = $item->answer_specify) {
                                $num_answer_specify = $num_answer_specify + 1;
                            }

                            $x = $item->answer_num;
                            $y = $item->answer_text;
                            $z = $item->answer_specify;

                            $data['num_control'] = $value;
                            $name = CategoryQuestions::select('name')->where('id', $item->category)->get()->pluck('name');
                            $data['category'] = $name[0];
                            $data['question'] = $item->question;
                            $data['answer_num'] = $item->answer_num;
                            $data['answer_text'] = $item->answer_text;
                            $data['answer_specify'] = $item->answer_specify;
                            $data['num_answer_num'] = $num_answer_num;
                            $data['num_answer_text'] = $num_answer_text;
                            $data['num_answer_specify'] = $num_answer_specify;
                        }
                    }

                    $datos = $data;
                    dd($datos);
                    $pdf = \PDF::loadView('Plantilla_Export.plantilla_reporte', compact('datos'));
                    return $pdf->download('Reporte_de_Encuesta.pdf');
                } else {
                    return 'Pediente..';
                }
                break;
            case 'otro':
                # code...
                break;
            default:
                # code...
                break;
        }

    }
}