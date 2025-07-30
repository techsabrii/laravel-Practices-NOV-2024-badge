<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
// ✅ Use correct capitalization (App\Models)

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {



        // User::insert([

        //     [
        //         'name' => 'Abdul Basit',
        //         'email' => 'breel@gmail.com',
        //         'contact' => '66756769',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'name' => 'Abdul Basit',
        //         'email' => 'blsdf@gmail.com',
        //         'contact' => '66756769',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'name' => 'Abdul Basit',
        //         'email' => 'bsdfsdl@gmail.com',
        //         'contact' => '66756769',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'name' => 'Abdul Basit',
        //         'email' => 'bsdfgsdl@gmail.com',
        //         'contact' => '66756769',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ]
        // ]);



        // collect([
        //     [
        //         'name' => 'Abdul Basit',
        //         'email' => 'basit@gmail.com',
        //         'contact' => '03075630721'
        //     ],
        //     [
        //         'name' => 'Ali Raza',
        //         'email' => 'ali@gmail.com',
        //         'contact' => '03071234567'
        //     ],
        //     [
        //         'name' => 'Fatima Noor',
        //         'email' => 'fatima@gmail.com',
        //         'contact' => '03074567891'
        //     ],
        //     [
        //         'name' => 'Usman Khan',
        //         'email' => 'usman@gmail.com',
        //         'contact' => '03079876543'
        //     ],
        //     [
        //         'name' => 'Zara Shah',
        //         'email' => 'zara@gmail.com',
        //         'contact' => '03077654321'
        //     ],
        //     [
        //         'name' => 'Hamza Tariq',
        //         'email' => 'hamza@gmail.com',
        //         'contact' => '03075554433'
        //     ],
        //     [
        //         'name' => 'Iqra Javed',
        //         'email' => 'iqra@gmail.com',
        //         'contact' => '03071112233'
        //     ],
        //     [
        //         'name' => 'Bilal Hussain',
        //         'email' => 'bilal@gmail.com',
        //         'contact' => '03078889900'
        //     ],
        //     [
        //         'name' => 'Mehwish Ali',
        //         'email' => 'mehwish@gmail.com',
        //         'contact' => '03076668844'
        //     ],
        //     [
        //         'name' => 'Danish Anwar',
        //         'email' => 'danish@gmail.com',
        //         'contact' => '03070001122'
        //     ]
        // ])->each(function ($user) {
        //     User::create($user);
        // });



        for ($i = 0; $i <= 100; $i++) {
            User::create([
                'name'    => fake()->name(),
                'email'   => fake()->unique()->email(),
                'contact' => fake()->phoneNumber(),
            ]);
        }
    }
}
