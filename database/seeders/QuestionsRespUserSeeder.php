<?php

namespace Database\Seeders;

use App\Models\QuestionsRespUser;
use Illuminate\Database\Seeder;

class QuestionsRespUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questionsResp = [

            [
                'user_id' => 3, 
                'category' => 2,
                'question' => 'Si no ha realizado el procedimiento de titulación indique una opción',
                'answer_num' => 6,
                'status' => 1
            ],
            [
                'user_id' => 6, 
                'category' => 2,
                'question' => 'Si no ha realizado el procedimiento de titulación indique una opción',
                'answer_num' => 7,
                'status' => 1
            ],            
            [
                'user_id' => 4, 
                'category' => 2,
                'question' => 'En caso de trabajar indique, Tiempo para obtener el primer empleo',
                'answer_num' => 6,
                'status' => 1
            ],
            [
                'user_id' => 7, 
                'category' => 3,
                'question' => 'Si no tienes empleo, ¿Te interesa insertarte en la bolsa de trabajo del Instituto Tecnológico',
                'answer_num' => 12,
                'status' => 1
            ],
            [
                'user_id' => 9, 
                'category' => 3,
                'question' => 'Si no tienes empleo, ¿Te interesa insertarte en la bolsa de trabajo del Instituto Tecnológico',
                'answer_num' => 13,
                'status' => 1
            ],
            [
                'user_id' => 1, 
                'category' => 3,
                'question' => 'Si no tienes empleo, ¿Te interesa insertarte en la bolsa de trabajo del Instituto Tecnológico',
                'answer_num' => 11,
                'status' => 1
            ],
            [
                'user_id' => 6, 
                'category' => 2,
                'question' => 'En caso de trabajar indique, Tiempo para obtener el primer empleo',
                'answer_num' => 7,
                'status' => 1
            ],
            [
                'user_id' => 10, 
                'category' => 4,
                'question' => 'Utilidad de las residencias profesionales para su desarrollo laboral y profesional de acuerdo a tu perfil profesional',
                'answer_num' => 14,
                'status' => 1
            ],
            [
                'user_id' => 8, 
                'category' => 4,
                'question' => 'Utilidad de las residencias profesionales para su desarrollo laboral y profesional de acuerdo a tu perfil profesional',
                'answer_num' => 14,
                'status' => 1
            ],
            [
                'user_id' => 9, 
                'category' => 4,
                'question' => 'Utilidad de las residencias profesionales para su desarrollo laboral y profesional de acuerdo a tu perfil profesional',
                'answer_num' => 17,
                'status' => 1
            ],
            [
                'user_id' => 10, 
                'category' => 5,
                'question' => 'Le gustaría tomar cursos de actualización',
                'answer_num' => 18,
                'status' => 1
            ],
            [
                'user_id' => 1, 
                'category' => 5,
                'question' => 'Le gustaría tomar cursos de actualización',
                'answer_num' => 18,
                'status' => 1
            ],
        ];

        foreach ($questionsResp as $resp) {
            QuestionsRespUser::create($resp);
        }
    }
}
