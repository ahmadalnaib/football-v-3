<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LeagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('leagues')->insert(
            [
                [
            'name' => 'UEFA Champions League',
            'code' => 'CL',

                ],
               
               
            [
            'name' => 'Premier League',
            'code' => 'PL',
       
            ] ,
            [
            'name' => 'La Liga',
            'code' => 'PD',
        
            ],
            [
            'name' => 'Serie A',
            'code' => 'SA',
         
            ],
            [
            'name' => 'Bundesliga',
            'code' => 'BL1',
          
            ],
            [
            'name' => 'Ligue 1',
            'code' => 'FL1',
           
            ],
            [
            'name' => 'Eredivisie',
            'code' => 'DED',
            
            ],
            [
                'name' => 'Primeira Liga',
                'code' => 'PPL',

            ],
            [
                'name' => 'Championship',
                'code' => 'ELC',
                
            ],
            [
                'name' => 'Copa Libertadores',
                'code' => 'CLI',
            ]
       
            
        ]);

    }
}
