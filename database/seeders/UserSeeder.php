<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medewerker')->insert([
            'voorletters' => Str::random(2),
            'voorvoegsels' => Str::random(2),
            'naam' => Str::random(10),
            'achternaam' => Str::random(10),
            'gebruikersnaam' => 'admin',
            'admin_medewerker' => '1',
            'password' => Hash::make('12345678'),
        ]);

        DB::table('medewerker')->insert([
            'voorletters' => Str::random(2),
            'voorvoegsels' => Str::random(2),
            'naam' => Str::random(10),
            'achternaam' => Str::random(10),
            'gebruikersnaam' => 'medewerker',
            'admin_medewerker' => '0',
            'password' => Hash::make('12345678'),
        ]);
    }
}