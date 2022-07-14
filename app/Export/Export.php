<?php

namespace App\Export;

use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\ContactInformation;
use App\Models\QuestionsRespUser;
use App\Models\CategoryQuestions;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class Export {
    public function exportPDF(Request $request) {
        $periodo;
        $inicio;
        $final;
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
                    if($request['periodoEscolar'] = 'Enero-Junio') {
                        $now = Carbon::now();
                        $n = $now->year;
                        
                        $a = strtotime("$n-01-01 00:00:00");
                        $inicio = date('Y-m-d H:i:s', $a);
                        
                        $b = strtotime("$n-06-01 00:00:00");
                        $final = date('Y-m-d H:i:s', $b);
                    } else {
                        $now = Carbon::now();
                        $n = $now->year;
                        
                        $a = strtotime("$n-08-01 00:00:00");
                        $inicio = date('Y-m-d H:i:s', $a);

                        $b = strtotime("$n-12-01 00:00:00");
                        $final = date('Y-m-d H:i:s', $b);
                    }

                    $x = 0;
                    $y = "";
                    $z = "";

                    $data_num_control = explode(',', $request['num_control']);
                    
                    foreach($data_num_control as $value) {
                        $alumno_id = ContactInformation::select('id')->where('enrollment', $value)->get()->pluck('id');
                        $question_user = QuestionsRespUser::where('user_id', $alumno_id[0])
                                                          ->where('created_at', '>=', $inicio)
                                                          ->where('created_at', '<=', $final)->get();
                        
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

                            $dato = new \stdClass();
                            $dato->num_control = $value;
                            $name = CategoryQuestions::select('name')->where('id', $item->category)->get()->pluck('name');
                            $dato->category = $name[0];
                            $dato->question = $item->question;
                            $dato->answer_num = $item->answer_num;
                            $dato->answer_text = $item->answer_text;
                            $dato->answer_specify = $item->answer_specify;
                            $dato->num_answer_num = $num_answer_num;
                            $dato->num_answer_text = $num_answer_text;
                            $dato->num_answer_specify = $num_answer_specify;

                            array_push($data,(object) $dato);
                        }
                    }
                    
                    $pdf = \PDF::loadView('Plantilla_Export.plantilla_reporte', compact('data'));
                    return $pdf->download('Reporte_de_Encuesta.pdf');
                } else {
                    if($request['periodoEscolar'] = 'Enero-Junio') {
                        $now = Carbon::now();
                        $n = $now->year;
                        
                        $a = strtotime("$n-01-01 00:00:00");
                        $inicio = date('Y-m-d H:i:s', $a);

                        $b = strtotime("$n-06-01 00:00:00");
                        $final = date('Y-m-d H:i:s', $b);
                    } else {
                        $now = Carbon::now();
                        $n = $now->year;
                        
                        $a = strtotime("$n-08-01 00:00:00");
                        $inicio = date('Y-m-d H:i:s', $a);

                        $b = strtotime("$n-12-01 00:00:00");
                        $final = date('Y-m-d H:i:s', $b);
                    }

                    $x = 0;
                    $y = "";
                    $z = "";

                    $question_user = QuestionsRespUser::where('created_at', '>=', $inicio)
                                                        ->where('created_at', '<=', $final)->get();
                    
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

                        $dato = new \stdClass();
                        $dato->num_control = $value;
                        $name = CategoryQuestions::select('name')->where('id', $item->category)->get()->pluck('name');
                        $dato->category = $name[0];
                        $dato->question = $item->question;
                        $dato->answer_num = $item->answer_num;
                        $dato->answer_text = $item->answer_text;
                        $dato->answer_specify = $item->answer_specify;
                        $dato->num_answer_num = $num_answer_num;
                        $dato->num_answer_text = $num_answer_text;
                        $dato->num_answer_specify = $num_answer_specify;

                        array_push($data,(object) $dato);
                    }
                    
                    $pdf = \PDF::loadView('Plantilla_Export.plantilla_reporte', compact('data'));
                    return $pdf->download('Reporte_de_Encuesta.pdf');
                }

                break;
            case 'otro':
                
                if($request['num_control'] != null) {
                    $x = $request->get('fecha_inicial');
                    $y = $request->get('fecha_fin');

                    $a = strtotime("$x 00:00:00");
                    $inicio = date('Y-m-d H:i:s', $a);
                    
                    $b = strtotime("$y 00:00:00");
                    $final = date('Y-m-d H:i:s', $b);
                
                    $x = 0;
                    $y = "";
                    $z = "";

                    $data_num_control = explode(',', $request['num_control']);
                    
                    foreach($data_num_control as $value) {
                        $alumno_id = ContactInformation::select('id')->where('enrollment', $value)->get()->pluck('id');
                        $question_user = QuestionsRespUser::where('user_id', $alumno_id[0])
                                                          ->where('created_at', '>=', $inicio)
                                                          ->where('created_at', '<=', $final)->get();
                        
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

                            $dato = new \stdClass();
                            $dato->num_control = $value;
                            $name = CategoryQuestions::select('name')->where('id', $item->category)->get()->pluck('name');
                            $dato->category = $name[0];
                            $dato->question = $item->question;
                            $dato->answer_num = $item->answer_num;
                            $dato->answer_text = $item->answer_text;
                            $dato->answer_specify = $item->answer_specify;
                            $dato->num_answer_num = $num_answer_num;
                            $dato->num_answer_text = $num_answer_text;
                            $dato->num_answer_specify = $num_answer_specify;

                            array_push($data,(object) $dato);
                        }
                    }
                    
                    $pdf = \PDF::loadView('Plantilla_Export.plantilla_reporte', compact('data'));
                    return $pdf->download('Reporte_de_Encuesta.pdf');
                } else {
                    $x = $request->get('fecha_inicial');
                    $y = $request->get('fecha_fin');

                    $a = strtotime("$x 00:00:00");
                    $inicio = date('Y-m-d H:i:s', $a);
                    
                    $b = strtotime("$y 00:00:00");
                    $final = date('Y-m-d H:i:s', $b);

                    $x = 0;
                    $y = "";
                    $z = "";

                    $question_user = QuestionsRespUser::where('created_at', '>=', $inicio)
                                                        ->where('created_at', '<=', $final)->get();
                    
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

                        $dato = new \stdClass();
                        $dato->num_control = $value;
                        $name = CategoryQuestions::select('name')->where('id', $item->category)->get()->pluck('name');
                        $dato->category = $name[0];
                        $dato->question = $item->question;
                        $dato->answer_num = $item->answer_num;
                        $dato->answer_text = $item->answer_text;
                        $dato->answer_specify = $item->answer_specify;
                        $dato->num_answer_num = $num_answer_num;
                        $dato->num_answer_text = $num_answer_text;
                        $dato->num_answer_specify = $num_answer_specify;

                        array_push($data,(object) $dato);
                    }
                    
                    $pdf = \PDF::loadView('Plantilla_Export.plantilla_reporte', compact('data'));
                    return $pdf->download('Reporte_de_Encuesta.pdf');
                }

                break;
            default:
                # code...
                break;
        }
    }

    public function exportEXCEL(Request $request) {
        return view('Plantilla_Export.excel', [
            'users' => ContactInformation::get()
        ]);
    }
}