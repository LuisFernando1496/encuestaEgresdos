<?php

namespace App\Actions\Fortify;

use App\Models\ContactInformation;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'graduated' => ['required'],
            'smart_phone' => ['required'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }
        
        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $userLogged = Auth::user()->id;
            $contact = ContactInformation::where('user_id',$userLogged)->first();
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'graduated' => $input['graduated'],
                'smart_phone' => $input['smart_phone'],
            ])->save();
            $contact->update([
                  
                "address" => $input['address'],
                "second_email" => $input['second_email'] ?? null,
                'enrollment' => $input['enrollment'] ?? null,
                'date_graduate' => $input['date_graduate'] ?? null,
                'phone_house' => $input['phone_house'] ?? null,
            ]);
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
