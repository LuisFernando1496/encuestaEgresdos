<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $users = User::factory(1)->create();
        // $role = Role::where("id", 2)->first();

        // $users->each(function($user) use ($role){
        //     $user->roles()->attach($role->id);
        // });
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'graduated'=> 0 ,
            'smart_phone' => '9611234567',
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),

        ]);
        $admin->roles()->attach(1);
    }
}
