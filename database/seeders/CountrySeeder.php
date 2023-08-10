<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("countries")->insert([
            "name"=>"Australia",
            "code"=>"AUS"
        ]);
        DB::table("countries")->insert([
            "name"=>"Austria",
            "code"=>"AUT"
        ]);
        DB::table("countries")->insert([
            "name"=>"Azerbaijan",
            "code"=>"AZE"
        ]);
        DB::table("countries")->insert([
            "name"=>"Bahamas",
            "code"=>"BHS"
        ]);
       
    }
}
