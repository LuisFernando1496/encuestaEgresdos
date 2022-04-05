<?php

namespace App\Actions\Fortify;

use App\Models\Address;
use App\Models\Graduated;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
           // 'smart_phone' => ['required', 'number', 'smart_phone', 'max:10', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
        
              
                    $user =  User::create([
                        'name' => $input['name'],
                        'graduated' => 1,
                        'smart_phone' => $input['smart_phone'],
                        'email' => $input['email'],
                        'password' => Hash::make($input['password']),
                    ]);
                    $adress = Address::create([
                        'street' => $input['street'],
                        'number_ext' => $input['number_ext'],
                        'number_int' => $input['number_int'],
                        'city' => $input['city'],
                        'state' =>  $input['state'],
                        'country' => $input['country'],
                        'zip_code' => $input['zip_code'],
                        'colony' => $input['colony'],
                        'reference' => $input['reference'],
                        'user_id' => $user->id,
                    ]);
            
                    $graduated = Graduated::create([
                        
                        'enrollment' => $input['enrollment'],
                        'date_graduate' => $input['date_graduate'],
                        'phone_house' => $input['phone_house'],
                        'user_id' => $user->id,
                    ]);
            
                    return $user;
               
                    
   }
}
