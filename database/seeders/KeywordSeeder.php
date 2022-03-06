<?php

namespace Database\Seeders;

use App\Models\Keyword as ModelsKeyword;
use App\Models\Post;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class KeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $posts = Post::all()->pluck('id');

        foreach(range(1, 50) as $index)
        {
            ModelsKeyword::create([
                'post_id' => $faker->randomElement($posts),
                'keyword' => $faker->word(),
            ]);
        }
    }
}
