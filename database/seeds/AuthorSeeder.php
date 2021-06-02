<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 20; $i++) { 
            DB::table('authors')->insert([
                'name' => $faker->name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
