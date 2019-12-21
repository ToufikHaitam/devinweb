<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');
        // $this->call(UsersTableSeeder::class);
        $this->call(CityTableSeeder::class);

        for($i=0;$i<10;$i++) {
            \App\DeliveryTimes::updateOrCreate(['id' => $i, 'span' => $faker->numberBetween(10, 14) . "=>" . $faker->numberBetween(14, 19), 'city_id' => $faker->numberBetween(1, 3)]);
         }

        for($i=0;$i<6;$i++) {
            $d=new \App\DeliveryTimes(['id' => $i, 'span' => $faker->numberBetween(10, 14) . "=>" . $faker->numberBetween(14, 19), 'city_id' => $faker->numberBetween(1, 3)]);
            $d->saveOrFail();

            $d->deliverydates()->attach(1);
        }




    }
}
