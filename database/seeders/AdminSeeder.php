<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin; // ✅ Make sure the Admin model exists
use Illuminate\Support\Facades\File;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data\json\admin.json'));

        collect(json_decode($json, true))->each(function ($admin) {
            Admin::create($admin);
        });
    }
}
