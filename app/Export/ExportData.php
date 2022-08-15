<?php
 
namespace App\Export;

use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\ContactInformation;
use App\Models\QuestionsRespUser;
use App\Models\CategoryQuestions;
use App\Models\RespUserTemp;
use App\Models\User;
use Carbon\Carbon;


class ExportData {

    public $chartsData;
    
    public function Export(Request $request) {
        $periodo = 0;
        $inicio = 0;
        $final = 0;
        
        if($request['periodoEscolar'] != null){
            $periodo = 'escolar';
        }else {
            $periodo = 'otro';
        }
        
        switch ($periodo) {
            case 'escolar':
                
                if($request['num_control'] != null) {
                    if($request['periodoEscolar'] == 'Enero-Junio') {
                        $now = Carbon::now();
                        $n = $now->year;
                        
                        $a = strtotime("$n-01-01 00:00:00");
                        $inicio = date('Y-m-d H:i:s', $a);
                        
                        $b = strtotime("$n-06-30 00:00:00");
                        $final = date('Y-m-d H:i:s', $b);
                    } else {
                        $now = Carbon::now();
                        $n = $now->year;
                        
                        $a = strtotime("$n-08-01 00:00:00");
                        $inicio = date('Y-m-d H:i:s', $a);

                        $b = strtotime("$n-12-31 00:00:00");
                        $final = date('Y-m-d H:i:s', $b);
                    }

                    $data = ExportData::getDataNumControl($request['num_control'], $inicio, $final);

                    return $data;
                } else {
                    if($request['periodoEscolar'] == 'Enero-Junio') {
                        $now = Carbon::now();
                        $n = $now->year;
                        
                        $a = strtotime("$n-01-01 00:00:00");
                        $inicio = date('Y-m-d H:i:s', $a);
                        
                        $b = strtotime("$n-06-30 00:00:00");
                        $final = date('Y-m-d H:i:s', $b);
                    } else {
                        $now = Carbon::now();
                        $n = $now->year;
                        
                        $a = strtotime("$n-08-01 00:00:00");
                        $inicio = date('Y-m-d H:i:s', $a);

                        $b = strtotime("$n-12-31 00:00:00");
                        $final = date('Y-m-d H:i:s', $b);
                    }

                    $data = ExportData::getData($inicio, $final);
                    
                    return $data;
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
                
                    $data = ExportData::getDataNumControl($request['num_control'], $inicio, $final);
                    
                    return $data;
                } else {
                    $x = $request->get('fecha_inicial');
                    $y = $request->get('fecha_fin');

                    $a = strtotime("$x 00:00:00");
                    $inicio = date('Y-m-d H:i:s', $a);
                    
                    $b = strtotime("$y 00:00:00");
                    $final = date('Y-m-d H:i:s', $b);

                    $data = ExportData::getData($inicio, $final);
                    
                    return $data;
                }

                break;
            default:
                # code...
                break;
        }
    }

    public function getDataNumControl($num_control, $inicio, $final) {
        $data = [];
        
        $data_num_control = explode(',', $num_control);
        
        foreach($data_num_control as $value) {
            $alumno_id = ContactInformation::select('id')->where('enrollment', $value)->get()->pluck('id');
            $user_id = ContactInformation::select('user_id')->where('enrollment', $value)->get()->pluck('user_id');
            $student = User::select('name')->where('id', $user_id[0])->get()->pluck('name');
            
            if($alumno_id->isEmpty()) {
                return 'Error!, Verifique si el numero de control es correcto.';
            }
            
            $question_user = QuestionsRespUser::where('user_id', $alumno_id[0])
                                              ->where('created_at', '>=', $inicio)
                                              ->where('created_at', '<=', $final)->get();
          
            if($question_user->isEmpty()) {
                return "Error! No se encontraron encuestas contestadas del num de control $value";
            }
            
            foreach($question_user as $item) {
                $name = CategoryQuestions::select('name')->where('id', $item->category)->get()->pluck('name');

                $dato = new \stdClass();
                $dato->num_control = $value;
                $dato->category = $name[0];
                $dato->question = $item->question;
                $dato->answer_num = $item->answer_num;
                $dato->answer_text = $item->answer_text;
                $dato->answer_other_specify = $item->answer_other_specify;
                
                array_push($data,(object) $dato);             
            }
            
            foreach ($data as $value) {
                $question = $value->question;
                $answer_num = $value->answer_num;
                $answer_text = $value->answer_text;
                $answer_other_specify = $value->answer_other_specify;

                foreach($data as $item) {
                    $consulta = QuestionsRespUser::where('question', $question)
                                                 ->where('answer_num', $answer_num)
                                                 ->where('answer_text', $answer_text)
                                                 ->where('answer_other_specify', $answer_other_specify)
                                                 ->get();
                }
                
                $count = count($consulta);
                
                if($answer_num != null) {
                    $d = $answer_num;
                }
                if($answer_text != null) {
                    $d = $answer_text;
                }
                if($answer_other_specify != null) {
                    $d = $answer_other_specify;
                }

                $dd[] = array(
                    'num_control' => $value->num_control,
                    'name' => $student[0],
                    'question' => $value->question,
                    'answer' => $d,
                    'total' => $count,
                );
            }
            $save = RespUserTemp::insert($dd);
        }                    
    }

    public function getData($inicio, $final) {
        $data = [];
        
        $question_user = QuestionsRespUser::where('created_at', '>=', $inicio)
                                          ->where('created_at', '<=', $final)
                                          ->get();
      //   $question_user = QuestionsRespUser::all();
        
        if($question_user->isEmpty()) {
            return "Error! No se encontraron encuestas contestadas en ese rango.";
        }

        foreach($question_user as $item) {
            $name = CategoryQuestions::select('name')->where('id', $item->category)->get()->pluck('name');
            $student = User::select('name')->where('id', $item->user_id)->get()->pluck('name');
            $num = ContactInformation::select('enrollment')->where('user_id', $item->user_id)->get()->pluck('enrollment');
            
            
            $dato = new \stdClass();
            $dato->num_control = $num[0];
            $dato->category = $name[0];
            $dato->question = $item->question;
            $dato->answer_num = $item->answer_num;
            $dato->answer_text = $item->answer_text;
            $dato->answer_other_specify = $item->answer_other_specify;
            
            array_push($data,(object) $dato);             
        }
                
        foreach ($data as $value) {
            $question = $value->question;
            $answer_num = $value->answer_num;
            $answer_text = $value->answer_text;
            $answer_other_specify = $value->answer_other_specify;

            foreach($data as $item) {
                $consulta = QuestionsRespUser::where('question', $question)
                                               ->where('answer_num', $answer_num)
                                               ->where('answer_text', $answer_text)
                                               ->where('answer_other_specify', $answer_other_specify)
                                               ->get();
            }
            
            $count = count($consulta);

            if($answer_num != null) {
                $d = $answer_num;
            }
            if($answer_text != null) {
                $d = $answer_text;
            }
            if($answer_other_specify != null) {
                $d = $answer_other_specify;
            }

            $dd[] = array(
                'num_control' => $value->num_control,
                'name' => $student[0],
                'question' => $value->question,
                'answer' => $d,
                'total' => $count,
            );
        }
        $save = RespUserTemp::insert($dd);
    }

}

