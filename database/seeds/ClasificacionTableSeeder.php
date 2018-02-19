<?php

use Illuminate\Database\Seeder;

class ClasificacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clasificacion')->insert([
        	[ //1
        		"nombre" => "Sin clasificacion"
        	],
        	[ //1
        		"nombre" => "Area Compartida"
        	],
        	[
        		"nombre" => "Software"
        	]
        ]);
    }
}
