<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            [
                'country_id' => 1,
                'name' => 'Sydney',
            ],
            [
                'country_id' => 1,
                'name' => 'Melbourne',
            ],
            [
                'country_id' => 1,
                'name' => 'Perth',
                
            ],
            [
                'country_id' => 1,
                'name' => 'Brisbane',
                
            ],
            [
                'country_id' => 2,
                'name' => 'Shanghai',
                
            ],
            [
                'country_id' => 2,
                'name' => 'Hongkong',
                
            ],
            [
                'country_id' => 2,
                'name' => 'Beijing',
                
            ],
            [
                'country_id' => 3,
                'name' => 'NewYork',
                
            ],
            [
                'country_id' => 3,
                'name' => 'Miami',
                
            ],
            [
                'country_id' => 3,
                'name' => 'LA',
                
            ],
            [
                'country_id' => 4,
                'name' => 'Delhi',
                
            ],
            [
                'country_id' => 4,
                'name' => 'Mumbai',
                
            ],
            [
                'country_id' => 4,
                'name' => 'Pune',
                
            ],
            [
                'country_id' => 5,
                'name' => 'Brasilia',
                
            ],
            [
                'country_id' => 5,
                'name' => 'Manaus',

            ],
            [
                'country_id' => 5,
                'name' => 'Natal',
            ],
           
        ]);
    }
}
