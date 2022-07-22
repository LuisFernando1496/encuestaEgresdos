<?php

namespace Database\Seeders;

use App\Models\ContinuingEducation;
use Illuminate\Database\Seeder;

class ContinuingEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = ContinuingEducation::factory(20)->create();
    }
}
