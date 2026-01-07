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
        Schema::table('skills', function (Blueprint $table) {
            if (!Schema::hasColumn('skills', 'person_id')) {
                $table->foreignId('person_id')->nullable()->constrained('people')->onDelete('cascade');
            }

            if (!Schema::hasColumn('skills', 'mastery_level')) {
                $table->enum('mastery_level', ['expert', 'working', 'avoid'])
                    ->default('expert')
                    ->after('level');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('skills', function (Blueprint $table) {
            if (Schema::hasColumn('skills', 'mastery_level')) {
                $table->dropColumn('mastery_level');
            }
            if (Schema::hasColumn('skills', 'person_id')) {
                $table->dropForeign(['person_id']);
                $table->dropColumn('person_id');
            }
        });
    }
};
