<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // UserSeeder::class,
            // TeacherSeeder::class,
            UserSeeder::class,
            // AdminSeeder::class
              ]);

        //  Admin::Factory()->count('5')->create();
        //     User::Factory()->count('5')->create();

    }
}
