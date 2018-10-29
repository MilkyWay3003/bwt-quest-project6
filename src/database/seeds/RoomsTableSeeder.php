<?php

use Faker\Factory as Faker;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Room::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker::create();

        $checkin = $faker->dateTime( 'now');
        $checkout = $faker->dateTimeInInterval($checkin,  '+ 2 days');

        foreach(Hotel::all() as $hotel) {
            for ($i = 0; $i < rand(2, 5); $i++) {
                $hotel->rooms()->save(new Room([
                    'name' => $faker->sentence,
                    'description' => $faker->text($maxNbChars = 200),
                    'services' => $faker->text($maxNbChars = 200),
                    'image' => $faker->imageUrl(200, 200, 'cats'),
                    'checkin' => $checkin,
                    'checkout'=> $checkout,
                ]));
            }
        }
    }
}
