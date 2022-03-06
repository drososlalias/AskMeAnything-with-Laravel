<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Faker\Factory as Faker;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $users = User::all()->pluck('id');
        foreach(range(1, 15) as $index)
        {

            $year = rand(2009, 2016);
            $month = rand(1, 12);
            $day = rand(1, 28);

            $date = Carbon::create($year,$month ,$day , 0, 0, 0);

            Post::create([
                'user_id' => $faker->randomElement( $users ),
                'title' => $faker->sentence(3),
                'text' => $faker->sentence(10),
                'published_at' => $date->format('Y-m-d H:i:s'),
            ]);

        }

    }
}
