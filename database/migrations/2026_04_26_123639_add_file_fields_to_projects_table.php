<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('file_tz')->nullable();      // файл ТЗ
            $table->string('file_report')->nullable();  // файл отчёта
            $table->string('file_diary')->nullable();   // файл дневника
            $table->date('start_date')->nullable();     // дата начала
            $table->date('end_date')->nullable();       // дата сдачи
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['file_tz', 'file_report', 'file_diary', 'start_date', 'end_date']);
        });
    }
};