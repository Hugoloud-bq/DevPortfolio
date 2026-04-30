<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (!Schema::hasColumn('projects', 'file_tz')) {
                $table->string('file_tz')->nullable();
            }
            if (!Schema::hasColumn('projects', 'file_report')) {
                $table->string('file_report')->nullable();
            }
            if (!Schema::hasColumn('projects', 'file_diary')) {
                $table->string('file_diary')->nullable();
            }
            if (!Schema::hasColumn('projects', 'start_date')) {
                $table->date('start_date')->nullable();
            }
            if (!Schema::hasColumn('projects', 'end_date')) {
                $table->date('end_date')->nullable();
            }
            if (!Schema::hasColumn('projects', 'archive_path')) {
                $table->string('archive_path')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['file_tz', 'file_report', 'file_diary', 'start_date', 'end_date', 'archive_path']);
        });
    }
};