<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->constrained()->onDelete('cascade');
            $table->json('degree');
            $table->string('institution');
            $table->json('field');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->json('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
