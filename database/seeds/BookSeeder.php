<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 30; $i++) {
            DB::table('books')->insert([
                'title' => $faker->sentence(8),
                'pages' => $faker->numberBetween(100, 1000),
                'content' => $faker->paragraph(10),
                'published_on' => $faker->dateTimeBetween($startDate = '-10 years', $endData = 'now'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
