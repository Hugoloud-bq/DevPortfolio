<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            if (!Schema::hasColumn('abouts', 'vk')) {
                $table->string('vk')->nullable();
            }
            if (!Schema::hasColumn('abouts', 'youtube')) {
                $table->string('youtube')->nullable();
            }
            if (!Schema::hasColumn('abouts', 'instagram')) {
                $table->string('instagram')->nullable();
            }
            if (!Schema::hasColumn('abouts', 'discord')) {
                $table->string('discord')->nullable();
            }
            if (!Schema::hasColumn('abouts', 'website')) {
                $table->string('website')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn(['vk', 'youtube', 'instagram', 'discord', 'website']);
        });
    }
};