<?php

namespace Database\Seeders;

use App\Models\Answers;
use Illuminate\Database\Seeder;

class AnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $answers =[
           [
             'option' => '1',
            'question_id' => 1,
            
           ],
           [
             'option' => '2',
            'question_id' => 1,
            
           ],
           [
             'option' => '3',
            'question_id' => 1,
            
           ],
           [
             'option' => '4',
            'question_id' => 1,
            
           ],
              [
                 'option' => '1',
                'question_id' => 2,
                
              ],
              [
                 'option' => '2',
                'question_id' => 2,
                
              ],
              [
                 'option' => '3',
                'question_id' => 2,
                
              ],
              [
                 'option' => '4',
                'question_id' => 2,
                
              ],
              [
                 'option' => '1',
                'question_id' => 3,
                
              ],
              [
                 'option' => '2',
                'question_id' => 3,
                
              ],
              [
                 'option' => '3',
                'question_id' => 3,
                
              ],
              [
                 'option' => '4',
                'question_id' => 3,
                
              ],
              [
                 'option' => '1',
                'question_id' => 4,
                
              ],
              [
                 'option' => '2',
                'question_id' => 4,
                
              ],
              [
                 'option' => '3',
                'question_id' => 4,
                
              ],
              [
                 'option' => '4',
                'question_id' => 4,
                
              ],
              [
                 'option' => '1',
                'question_id' => 5,
                
              ],
              [
                 'option' => '2',
                'question_id' => 5,
                
              ],
              [
                 'option' => '3',
                'question_id' => 5,
                
              ],
              [
                 'option' => '4',
                'question_id' => 5,
                
              ],
              [
                 'option' => '1',
                'question_id' => 6,
                
              ],
              [
                 'option' => '2',
                'question_id' => 6,
                
              ],
              [
                 'option' => '3',
                'question_id' => 6,
              ],
              [
                 'option' => '4',
                'question_id' => 6,
              ],
              [
                 'option' => '1',
                'question_id' => 7,
              ],
              [
                 'option' => '2',
                'question_id' => 7,
              ],
              [
                 'option' => '3',
                'question_id' => 7,
              ],
              [
                 'option' => '4',
                'question_id' => 7,
              ],
        /////////////////////////////////
              [
                'option' => 'Especialidad',
                'question_id' => 8,
              ],
              [
                'option' => 'Maestría',
                'question_id' => 8,
              ],
              [
                'option' => 'Doctorado',
                'question_id' => 8,
              ],
              [
                'option' => 'Idiomas',
                'question_id' => 8,
              ],
              [
                'option' => 'No estudia',
                'question_id' => 8,
              ],
              [
                'option' => 'Otros',
                'question_id' => 8,
                'flag_to_complement'=>true,//aqui iria la bandera para que se muestre el input
              ],
              [
                'option' =>'Falta de tiempo',
                'question_id' =>9 ,

              ],
              [
                'option' =>'Costo',
                'question_id' =>9 ,

              ],
              [
                'option' =>'Adeudo de crédios',
                'question_id' =>9 ,

              ],
              [
                'option' =>'Requisito del idioma',
                'question_id' =>9 ,

              ],
              [
                'option' =>'Otros',
                'question_id' =>9 ,
                'flag_to_complement'=>true, //aqui iria la bandera para que se muestre el input

              ],
              [
                'option' =>'Antes de egresar',
                'question_id' =>10 ,
              ],
              [
                'option' =>'Menos de 6 meses',
                'question_id' =>10 ,
              ],
              [
                'option' =>'Entre 6 meses y un año',
                'question_id' =>10 ,
              ],
              [
                'option' =>'Más de un año',
                'question_id' =>10 ,
              ],
              [
                'option' =>'No trabaja',
                'question_id' =>10 ,
              ],
              [
                'option' =>'Otros',
                'question_id' =>10 ,
                'flag_to_complement'=>true, //aqui iria la bandera para que se muestre el input
              ],
              [
                'option' =>'Bolsa de trabajo del plantel',
                'question_id' =>11 ,
              ],
              [
                'option' =>'Contactos personales',
                'question_id' =>11 ,
              ],
              [
                'option' =>'Residencia profesional',
                'question_id' =>11 ,
              ],
              [
                'option' =>'Medios masivos de comunicación',
                'question_id' =>11 ,
              ],
              [
                'option' =>'Otros',
                'question_id' =>11 ,
                'flag_to_complement'=>true,//aqui iria la bandera para que se muestre el input
              ],
              [
                'option' =>'Primario(Agricola, ganadería, pesca)',
                'question_id' =>12 ,
              ],
              [
                'option' =>'Secundario (industria ligera, industria pesada)',
                'question_id' =>12 ,
              ],
              [
                'option' =>'Terciario (servicios privados o públicos como educación, salud,banca, transporte, comunicaciones, entretenimiento, comercio, servicios legales, etc)',
                'question_id' =>12 ,
              ],
              [
                'option' =>'Cuaternario (investigación y desarrollo, tecnologías de la información, consultorías, planificación financiera)',
                'question_id' =>12 ,
              ],
              [
                'option' =>'Técnico',
                'question_id' =>13 ,
              ],
              [
                'option' =>'Supervisor',
                'question_id' =>13 ,
              ],
              [
                'option' =>'Jefe de área',
                'question_id' =>13 ,
              ],
              [
                'option' =>'Funcionario',
                'question_id' =>13 ,
              ],
              [
                'option' =>'Empresario',
                'question_id' =>13 ,
              ],
              [
                'option'=> 'Si',
                'question_id' =>14 ,
              ],
              [
                'option'=> 'No',
                'question_id' =>14 ,
                'flag_to_complement'=>true, //aqui iria la bandera para que se muestre el input
              ],
              [
                'option'=> 'Chiapas',
                'question_id' =>15 ,
              ],
              [
                'option'=> 'Otro',
                'question_id' =>15 ,
                'flag_to_complement'=>true//aqui iria la bandera para que se muestre el input
              ],
              [
                'option'=> 'Si',
                'question_id' =>16 ,
              ],
              [
                'option'=> 'No',
                'question_id' =>16 ,
              ],
              [
                'option'=> 'Si',
                'question_id' =>17 ,
              ],
              [
                'option'=> 'No',
                'question_id' =>17 ,
              ],
              [
                'option'=> 'Excelente',
                'question_id' =>18 ,
              ],
              [
                'option'=> 'Bueno',
                'question_id' =>18 ,
              ],
              [
                'option'=> 'Regular',
                'question_id' =>18 ,
              ],
              [
                'option'=> 'Malo',
                'question_id' =>18 ,
              ],
              [
                'option'=> 'Pésimo',
                'question_id' =>18 ,
              ],
              [
                'option'=> 'Si',
                'question_id' =>19 ,
              ],
              [
                'option'=> 'No',
                'question_id' =>19 ,
              ],
              [
                'option'=> 'Si',
                'question_id' =>20 ,
              ],              
              [
                'option'=> 'No',
                'question_id' =>20 ,
              ],
                 

       ];
         foreach ($answers as $answer) {
              Answers::create($answer);
         }
    }
}
