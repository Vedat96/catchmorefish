<?php

namespace App\Actions\Fortify;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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

            'voorletters' => ['required', 'string', 'max:255'],
            'voorvoegsels' => ['nullable','string', 'max:255'],
            'achternaam' => ['required', 'string', 'max:255'],
            'naam' => ['required', 'string', 'max:255'],
            'gebruikersnaaam' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        
        } else {
            $user->forceFill([
                'voorletters' => $input['voorletters'],
                'voorvoegsels' => $input['voorvoegsels'],
                'achternaam' => $input['achternaam'],
                'naam' => $input['naam'],
                'gebruikersnaam' => $input['gebruikersnaam'],

            ])->save();
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
            'voorletters' => $input['voorletters'],
            'voorvoegsels' => $input['voorvoegsels'],
            'achternaam' => $input['achternaam'],
            'naam' => $input['naam'],
            'gebruikersnaam' => $input['gebruikersnaam'],

        ])->save();

        // $user->sendEmailVerificationNotification();
    }
}
