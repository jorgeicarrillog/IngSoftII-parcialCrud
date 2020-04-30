<?php

use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=0; $i < 9; $i++) { 
	        DB::table('vehicles')->insert([
	            'plate' => Str::random(3).'-'.rand(111,999),
	        ]);
    	}
    }
}
