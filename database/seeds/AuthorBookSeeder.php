<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AuthorBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 30; $i++) { 
            DB::table('author_book')->insert([
                'book_id' => $faker->unique()->numberBetween(1,30),
                'author_id' => $faker->numberBetween(1,20),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
