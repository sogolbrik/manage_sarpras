<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Item;
use App\Models\Student;
use App\Models\User;
use Database\Factories\StudentFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name'     => 'adminkai',
            'email'    => 'admin@gmail.com',
            'password' => bcrypt('adminkai'),
        ]);

        for ($i=0; $i < 10; $i++) { 
            Classroom::create([
                'name' => fake()->word(1)
            ]);
        }

        for ($i=0; $i < 10; $i++) { 
            Student::create([
                'classroom_id' => rand(1,5),
                'name' => fake()->name,
            ]);
        }

        for ($i=0; $i < 10; $i++) { 
            Item::create([
                'name' => fake()->word(1),
            ]);
        }
    }
}
