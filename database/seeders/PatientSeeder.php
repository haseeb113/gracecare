<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;
use Faker\Factory as Faker;

class PatientSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $i) {
            Patient::create([
                'name'    => $faker->name,
                'email'   => $faker->unique()->safeEmail,
                'phone'   => $faker->phoneNumber,
                'gender'  => $faker->randomElement(['male', 'female']),
                'dob'     => $faker->date('Y-m-d', '2005-01-01'),
                'address' => $faker->address,
            ]);
        }
    }
}

