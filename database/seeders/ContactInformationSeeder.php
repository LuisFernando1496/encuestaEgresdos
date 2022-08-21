<?php

namespace Database\Seeders;

use App\Models\ContactInformation;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ContactInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data = ContactInformation::factory(1)->create();
    } 
}
