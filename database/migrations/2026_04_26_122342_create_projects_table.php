<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('subject');
            $table->text('description')->nullable();
            $table->integer('hours_spent')->nullable();
            $table->boolean('tz_status')->default(false);
            $table->boolean('report_status')->default(false);
            $table->boolean('diary_status')->default(false);
            $table->string('file_path')->nullable();
            $table->string('archive_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};