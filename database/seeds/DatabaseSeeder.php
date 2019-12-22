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


        for($i=0;$i<4;$i++) {
            $city=$faker->numberBetween(1,3);
            $d=new \App\DeliveryDates(['day_name' => $faker->dayOfWeek(),'date' => $faker->dateTime, 'city_id' => $city]);
            $d->saveOrFail();

            for($i=0;$i<$faker->numberBetween(1,3);$i++) {
                  $t=new \App\DeliveryTimes(['span' => $faker->numberBetween(10, 14) . "=>" . $faker->numberBetween(14, 19), 'city_id' => $city]);
                  $t->saveOrFail();
                  $d->delivery_times()->attach($t);
            }

        }




    }
}
