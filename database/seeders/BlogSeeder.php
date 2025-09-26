<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // atau kita juga bisa pake trucate dulu sebelum
        // kita masukan datanya

        DB::table("blogs")->truncate();
        // baru jalankan seedernya


    //    DB::table("blogs")->insert([
    //     "title" => Str::random(10),
    //     "description" => Str::random(30)
    //    ]);

        Blog::factory()->count(30)->create();



    }
}
