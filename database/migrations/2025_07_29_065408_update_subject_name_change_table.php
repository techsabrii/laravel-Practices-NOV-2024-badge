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
        Schema::rename('subject','teacher_subject');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::rename('teacher_subject','subject');
    }
};
