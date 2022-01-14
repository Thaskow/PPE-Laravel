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
            'url' => Str::random(5).'.jpeg',
        ]);
        DB::table('contenus')->insert([
            'titre' => Str::random(10),
            'description' => Str::random(100),
        ]);
        DB::table('users')->insert([
            'nom' => Str::random(10),
            'prenom' => Str::random(100),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'isAdmin' => (bool)rand(0,1),
            'isPrimoDonneur'=> (bool)rand(0,1),
            'isMoelle'=> (bool)rand(0,1),
        ]);
        DB::table('user_evenement')->insert([
            'isVenir' => (bool)rand(0,1),
            'datePassage' => Carbon::now()->addDay(30),
        ]);
        DB::table('promotion_evenement')->insert([
            'isVenir' => (bool)rand(0,1),
            'datePassage' => Carbon::now()->addDay(30),
            'pourcentage' => rand(0, 10) / 10,
            'nbParticipant' => rand(),
        ]);

    }
}
