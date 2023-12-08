<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Driver;
use Faker\Factory as Faker;

class DriversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1,10) as $index) {
            Driver::create([
                'name' => $faker->name,
                'nik' => $faker->unique()->numerify('###########'),
                'no_telp' => $faker->numerify('###-###-####'),
                'birth_date' => $faker->date(),
                'gender' => $faker->randomElement(['male', 'female', 'other']),
                'work_start_date' => $faker->date(),
                'address' => $faker->address,
                'status' => $faker->randomElement(['active', 'non-active']),
            ]);
        }
    }
}
