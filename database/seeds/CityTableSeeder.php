<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\City::updateOrCreate(['id'=>1,'name'=>'Rabat','slug'=>'Mohamed ']);
        \App\City::updateOrCreate(['id'=>2,'name'=>'Casa','slug'=>'Hassan']);
        \App\City::updateOrCreate(['id'=>3,'name'=>'Tangier','slug'=>'Nada ']);
    }
}
