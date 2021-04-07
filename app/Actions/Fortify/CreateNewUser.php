<?php

namespace App\Actions\Fortify;

use App\Models\Medewerker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

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
            'voorletters' => ['required', 'string', 'max:255'],
            'voorvoegsels' => ['nullable','string', 'max:255'],
            'achternaam' => ['required', 'string', 'max:255'],
            'naam' => ['required', 'string', 'max:255'],
            'gebruikersnaam' => ['required', 'string', 'max:255'],
            'password' => $this->passwordRules(),
        ])->validate();

        return Medewerker::create([
            'voorletters' => $input['voorletters'],
            'voorvoegsels' => $input['voorvoegsels'],
            'achternaam' => $input['achternaam'],
            'naam' => $input['naam'],
            'gebruikersnaam' => $input['gebruikersnaam'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
