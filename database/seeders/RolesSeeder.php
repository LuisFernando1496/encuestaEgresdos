<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles =  [ 
          [
               'name' => 'admin',
          ],
           [
               'name' => 'user',
           ],
       ];
   
           foreach ($roles as $role) {
               Roles::create($role);
           }
    }
}
