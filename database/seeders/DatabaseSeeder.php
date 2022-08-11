<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeders::class,
            CategoryQuestionsSeeder::class,
            QuestionsSeeder::class,
            AnswersSeeder::class, 
            ContactInformationSeeder::class,
            JobsSeeder::class,
            ActivitySeeder::class,
            ContinuingEducationSeeder::class,
        //   QuestionsRespUserSeeder::class
            ]);
    }
}
