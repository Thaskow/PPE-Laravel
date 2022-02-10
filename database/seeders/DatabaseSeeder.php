<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Boolean;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<=5; $i++)
        {
        DB::table('promotions')->insert([
            'libelle' => Str::random(10),
        ]);
        DB::table('evenements')->insert([
            'titre' => Str::random(10),
            'description' => Str::random(100),
            'dateEvenement' => Carbon::now(),
            'lieuEvenement' => Str::random(10),
            'dateReunion' => Carbon::now()->addDay(20),
            'lieuReunion' => Str::random(10),
        ]);
        DB::table('images')->insert([
            'titre' => Str::random(10),
            'url' => Str::random(5).'.png',
        ]);
        DB::table('contenus')->insert([
            'titre' => Str::random(10),
            'description' => Str::random(100),
            'designation' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'prenom' => Str::random(100),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'isAdmin' => (bool)rand(0,1),
        ]);
        }
    }
}
