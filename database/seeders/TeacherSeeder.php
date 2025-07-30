<?php
namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher::insert([
            [
                'teacher_name' => 'Abdul Basit',
                'email'        => 'basit@gmail.com',
                'status'       => 'active',
                'created_at'    => now(),
                'updated_at'   => now(),

            ],
            [
                'teacher_name' => 'Abdul Basit',
                'email'        => 'bast@gmail.com',
                'status'       => 'active',
                'created_at'    => now(),
                'updated_at'   => now(),
            ],
            [
                'teacher_name' => 'Abdul Basit',
                'email'        => 'bat@gmail.com',
                'status'       => 'active',
                'created_at'    => now(),
                'updated_at'   => now(),
            ],
            [
                'teacher_name' => 'Abdul Basit',
                'email'        => 'basi@gmail.com',
                'status'       => 'active',
                'created_at'    => now(),
                'updated_at'   => now(),
            ],

        ]);
    }
}
