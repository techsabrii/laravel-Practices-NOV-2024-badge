<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Rename column first (safest)
        Schema::table('student', function (Blueprint $table) {
            $table->renameColumn('student_name', 'name');
        });

        // Add columns and foreign key
        Schema::table('student', function (Blueprint $table) {
            $table->string('marks')->after('name')->nullable();
            $table->unsignedBigInteger('user_id')->after('marks');

            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });
        Schema::rename('student','student_table');
    }

    public function down(): void
    {
        // Drop foreign key first
        Schema::table('student', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropColumn('marks');
        });

        // Rename back
        Schema::table('student', function (Blueprint $table) {
            $table->renameColumn('name', 'student_name');
        });
        Schema::rename('student_table','student');

    }
};
