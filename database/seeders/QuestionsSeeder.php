<?php

namespace Database\Seeders;

use App\Models\Questions;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [

            [
                'question' => 'Califique la calidad de la educación profesional proporcionada por el personal docente, 
                 así como el Plan de Estudios de la carrera que curso y las condiciones del plantel en cuanto a infraestructura.',
                'category_question_id' => 1,
                'alias' => 'C1P1'
            ],
            [
                'question' => 'Calidad de los docentes',
                'category_question_id' => 1,
                'alias' => 'C1P2'
            ],
            [
                'question' => 'plan de estudios',
                'category_question_id' => 1,
                'alias' => 'C1P3'
            ],
            [
                'question' => 'Oportunidad de participar en los proyectos de investigación y desarrollo ',
                'category_question_id' => 1,
                'alias' => 'C1P4'
            ],
            [
                'question' => 'Énfasis que se le presentaba a la investigación dentro del proceso',
                'category_question_id' => 1,
                'alias' => 'C1P5'
            ],
            [
                'question' => 'Satisfacción con las condiciones de estudio (infraestructura)',
                'category_question_id' => 1,
                'alias' => 'C1P6'
            ],
            [
                'question' => 'Experiencia obtenida a través de la residencia profesional',
                'category_question_id' => 1,
                'alias' => 'C1P7'
            ],
            [
                'question' => 'Si estudia, indicar si es:',
                'category_question_id' => 2,
                'alias' => 'C2P1'
            ],
            [
                'question' => 'Si no ha realizado el procedimiento de titulación indique una opción ',
                'category_question_id' => 2,
                'alias' => 'C2P1'
            ],
            [
                'question' => 'En caso de trabajar indique, Tiempo para obtener el primer empleo',
                'category_question_id' => 2,
                'alias' => 'C2P2'
            ],
            [
                'question' => 'Medios para obtener empleo',
                'category_question_id' => 2,
                'alias' => 'C2P3'
            ],
            [
                'question' => 'Sector en el que trabaja',
                'category_question_id' => 2,
                'alias' => 'C2P4'
            ],
            [
                'question' => 'Nivel jerárquico de la empresa',
                'category_question_id' => 2,
                'alias' => 'C2P5'
            ],
            [
                'question' => '¿El puesto que ocupas está de acuerdo a tu perfil de egreso? Si es NO especifique:',
                'category_question_id' => 2,
                'alias' => 'C2P6'
            ],
            [
                'question' => '¿En qué Estado de la República está ubicada la empresa?  Si es Chiapas indique Ciudad:',
                'category_question_id' => 2,
                'alias' => 'C2P7'
            ],
            [
                'question' => 'Perteneces a alguna asociación de egresados o colegio de profesionistas?',
                'category_question_id' => 2,
                'alias' => 'C2P8'
            ],
            [
                'question' => 'Si no tienes empleo, ¿Te interesa insertarte en la bolsa de trabajo del Instituto Tecnológico?',
                'category_question_id' => 3,
                'alias' => 'C3P1'
            ],
            [
                'question' => 'Utilidad de las residencias profesionales para su desarrollo laboral y profesional de acuerdo a tu perfil profesional',
                'category_question_id' => 4,
                'alias' => 'C4P1'
            ],
            [
                'question' => 'Le gustaría tomar cursos de actualización',
                'category_question_id' => 5,
                'alias' => 'C5P1'
            ],

            [
                'question' => 'Le gustaría tomar un posgrado',
                'category_question_id' => 5,
                'alias' => 'C5P1'
            ],
            [
                'question' => '¿En que area?',
                'question_id' => 19,
                'category_question_id' => 5,
                'alias' => 'C5P2'
            ],

            [
                'question' => '¿En que area?',
                'question_id' => 20,
                'category_question_id' => 5,
                'alias' => 'C5P3'
            ],


        ];

        foreach ($questions as $question) {
            Questions::create($question);
        }
    }
}
