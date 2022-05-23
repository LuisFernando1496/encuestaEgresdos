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
         $data = ContactInformation::factory(20)->create();
        //  ContactInformation::create([
        //     'enrollment' => '12345678',
        //     'address'=> 'Calle falsa 123',
        //     'second_email'=> 'second@gmail.com',
        //     'date_graduate'=>Carbon::now(),
        //     'phone_house'=> '9614057896',
        //     'user_id'=> 1,
        //  ]);
    } 
}
