<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::firstOrCreate(
        //     ['email' => 'test@example.com'],
        //     [
        //         'name' => 'Test User',
        //         'password' => Hash::make('password'),
        //         'email_verified_at' => now(),
        //     ]
        // );

        // disini tuh kita oengen menjalankan seluruh file seeder ke
        // file ini

        // dan ini hebatnya adlah
        // kita ga perlu buat import, karena file file seeder yg lain
        // itu berada di 1 folder yang sama dnegan file DatabaseSeeeder.php


        // karena kita udah pake namespace seeders
        // jadi gausah lagi pake url lengkapnya, karena udah pake use

        $this->call([
            BlogSeeder::class,
            UserSeeder::class
        ]);




    }
}
