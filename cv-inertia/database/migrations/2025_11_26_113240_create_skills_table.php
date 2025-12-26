<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->enum('category', ['Languages', 'Backend', 'Frontend', 'Databases', 'Cloud', 'DevOps', 'Tools'])->default('Tools');
            $table->string('logo_slug');
            $table->integer('level')->default(3);
            $table->timestamps();
        });

        // Tabla pivot para relacionar experiences con skills
        Schema::create('experience_skill', function (Blueprint $table) {
            $table->id();
            $table->foreignId('experience_id')->constrained()->onDelete('cascade');
            $table->foreignId('skill_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('experience_skill');
        Schema::dropIfExists('skills');
    }
};
