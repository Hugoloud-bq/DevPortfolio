<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('group')->nullable();
            $table->integer('course')->nullable();
            $table->string('specialty')->nullable();
            $table->string('university')->nullable();
            $table->string('email')->nullable();
            $table->string('github')->nullable();
            $table->string('telegram')->nullable();
            $table->json('skills')->nullable();
            $table->string('avatar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};