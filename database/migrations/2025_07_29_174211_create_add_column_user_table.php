<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Step 1: Rename all tables
        Schema::rename('teacher', 'teachers');
        Schema::rename('user', 'users');
        Schema::rename('admin', 'admins');

        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->nullable();    // Add nullable if existing rows exist
            $table->string('email')->nullable();
            $table->string('contact')->nullable();
            $table->json('image_path')->nullable();
        });
    }


    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('email');
            $table->dropColumn('contact');
            $table->dropColumn('image_path');
        });

        Schema::rename('users', 'user');
        Schema::rename('teachers', 'teacher');
        Schema::rename('admins', 'admin');
    }
};
