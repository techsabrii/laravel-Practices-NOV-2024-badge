<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('teacher_subject', function (Blueprint $table) {
            // First rename column
            $table->renameColumn('secure', 'score');
        });

        Schema::table('teacher_subject', function (Blueprint $table) {
            // Then change its datatype (e.g., to string with 100 length)
            $table->string('score', 100)->change();
        });
    }

    public function down(): void
    {
        Schema::table('teacher_subject', function (Blueprint $table) {
            $table->string('score', 255)->change();
        });

        Schema::table('teacher_subject', function (Blueprint $table) {
            $table->renameColumn('score', 'secure');
        });
    }
};
