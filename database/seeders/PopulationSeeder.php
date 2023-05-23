<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PopulationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('populations')->insert([
            [
                'country_id' => 1,
                'city_id' => 1,
                'gender_id' => 1,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
            ],
            [
                'country_id' => 1,
                'city_id' => 2,
                'gender_id' => 1,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
            ],
            [
                'country_id' => 1,
                'city_id' => 3,
                'gender_id' => 1,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
                
            ],
            [
                'country_id' => 1,
                'city_id' => 4,
                'gender_id' => 1,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
                
            ],
            [
                'country_id' => 2,
                'city_id' => 5,
                'gender_id' => 1,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
                
            ],
            [
                'country_id' => 2,
                'city_id' => 6,
                'gender_id' => 1,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
                
            ],
            [
                'country_id' => 2,
                'city_id' => 7,
                'gender_id' => 1,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
                
            ],
            [
                'country_id' => 3,
                'city_id' => 8,
                'gender_id' => 1,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
                
            ],
            [
                'country_id' => 3,
                'city_id' => 9,
                'gender_id' => 1,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
                
            ],
            [
                'country_id' => 3,
                'city_id' => 10,
                'gender_id' => 1,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
                
            ],
            [
                'country_id' => 4,
                'city_id' => 11,
                'gender_id' => 1,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
                
            ],
            [
                'country_id' => 4,
                'city_id' => 12,
                'gender_id' => 1,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
                
            ],
            [
                'country_id' => 4,
                'city_id' => 13,
                'gender_id' => 1,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
                
            ],
            [
                'country_id' => 5,
                'city_id' => 14,
                'gender_id' => 1,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
                
            ],
            [
                'country_id' => 5,
                'city_id' => 15,
                'gender_id' => 1,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),

            ],
            [
                'country_id' => 5,
                'city_id' => 16,
                'gender_id' => 1,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
            ],
           

            [
                'country_id' => 1,
                'city_id' => 1,
                'gender_id' => 2,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
            ],
            [
                'country_id' => 1,
                'city_id' => 2,
                'gender_id' => 2,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
            ],
            [
                'country_id' => 1,
                'city_id' => 3,
                'gender_id' => 2,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
                
            ],
            [
                'country_id' => 1,
                'city_id' => 4,
                'gender_id' => 2,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
                
            ],
            [
                'country_id' => 2,
                'city_id' => 5,
                'gender_id' => 2,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
                
            ],
            [
                'country_id' => 2,
                'city_id' => 6,
                'gender_id' => 2,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
                
            ],
            [
                'country_id' => 2,
                'city_id' => 7,
                'gender_id' => 2,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
                
            ],
            [
                'country_id' => 3,
                'city_id' => 8,
                'gender_id' => 2,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
                
            ],
            [
                'country_id' => 3,
                'city_id' => 9,
                'gender_id' => 2,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
                
            ],
            [
                'country_id' => 3,
                'city_id' => 10,
                'gender_id' => 2,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
                
            ],
            [
                'country_id' => 4,
                'city_id' => 11,
                'gender_id' => 2,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
                
            ],
            [
                'country_id' => 4,
                'city_id' => 12,
                'gender_id' => 2,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
                
            ],
            [
                'country_id' => 4,
                'city_id' => 13,
                'gender_id' => 2,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
                
            ],
            [
                'country_id' => 5,
                'city_id' => 14,
                'gender_id' => 2,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
                
            ],
            [
                'country_id' => 5,
                'city_id' => 15,
                'gender_id' => 2,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),

            ],
            [
                'country_id' => 5,
                'city_id' => 16,
                'gender_id' => 2,
                'old' => rand ( 10000 , 99999 ),
                'young' => rand ( 10000 , 99999 ),
                'child' => rand ( 10000 , 99999 ),
            ],
        ]);
    }
}
