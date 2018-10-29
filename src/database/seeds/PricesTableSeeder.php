<?php

use Faker\Factory as Faker;
use App\Models\Price;
use App\Models\Room;
use Illuminate\Database\Seeder;

class PricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Price::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker::create();

        foreach(Room::all() as $room) {
            for ($i = 0; $i < rand(2, 5); $i++) {
                $room->prices()->save(new Price([
                    'cost' => $faker->randomFloat(2, 0, 10),
                    'currency' => $faker->currencyCode,
                    'max_persons' => $faker->numberBetween(1, 4),
                    'cancel_type' => $faker->text($maxNbChars = 32),
                    'meal' => $faker->text($maxNbChars = 32),
                ]));
            }
        }

    }
}

