<?php

namespace Database\Seeders;

use App\Models\CategoryQuestions;
use Illuminate\Database\Seeder;

class CategoryQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $categories= [

            [
               'name' => 'PERTINENCIA Y DISPONIBILIDAD DE MEDIOS Y RECURSOS PARA EL APRENDIZAJE'
            ],
            [
                'name' => 'UBICACIÓN LABORAL DE LOS /LAS EGRESADOS/AS'
            ],
            [
                'name' => 'BOLSA DE TRABAJO'
            ],
            [
                'name' => 'DESEMPEÑO PROFESIONAL DE LOS EGRESADOS/AS (COHERENCIA ENTRE FORMACIÓN Y TIPO DE EMPLEO)
                 EFICIENCIA PARA REALIZAR LAS ACTIVIDADES LABORALES, EN RELACIÓN CON SU FORMACIÓN ACADÉMICA:'
            ],
            [
                'name' => 'EXPECTATIVAS DE DESARROLLO, SUPERACIÓN PROFESIONAL Y DE ACTUALIZACIÓN'
            ],

      ];

        foreach ($categories as $category) {
            CategoryQuestions::create($category);
        }
    }
}
