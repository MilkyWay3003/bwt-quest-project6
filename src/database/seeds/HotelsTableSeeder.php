<?php

use Faker\Factory as Faker;
use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Hotel::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker::create();

        // And now, let's create a few hotels in our database:
        for ($i = 0; $i < 20; $i++) {

            Hotel::create([
                'name' => $faker->sentence,
                'country' => $faker->country,
                'city' => $faker->city,
                'postcode' => $faker->postcode,
                'address' => $faker->address,
                'description' => $faker->text($maxNbChars = 200),
                'rating' => $faker->randomFloat(2, 0, 10),
                'image' => $faker->imageUrl(200, 200, 'cats'),
            ]);
        }
    }

}

