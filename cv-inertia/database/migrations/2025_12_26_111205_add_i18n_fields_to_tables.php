<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // People table - internacionalizar headline y summary
        DB::statement('ALTER TABLE people ALTER COLUMN headline TYPE json USING headline::json');
        DB::statement('ALTER TABLE people ALTER COLUMN summary TYPE json USING summary::json');

        // Experiences table - internacionalizar position y description
        DB::statement('ALTER TABLE experiences ALTER COLUMN position TYPE json USING position::json');
        DB::statement('ALTER TABLE experiences ALTER COLUMN description TYPE json USING description::json');

        // Education table - internacionalizar degree, field y description
        DB::statement('ALTER TABLE education ALTER COLUMN degree TYPE json USING degree::json');
        DB::statement('ALTER TABLE education ALTER COLUMN field TYPE json USING field::json');
        DB::statement('ALTER TABLE education ALTER COLUMN description TYPE json USING description::json');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE people ALTER COLUMN headline TYPE varchar(255)');
        DB::statement('ALTER TABLE people ALTER COLUMN summary TYPE text');

        DB::statement('ALTER TABLE experiences ALTER COLUMN position TYPE varchar(255)');
        DB::statement('ALTER TABLE experiences ALTER COLUMN description TYPE text');

        DB::statement('ALTER TABLE education ALTER COLUMN degree TYPE varchar(255)');
        DB::statement('ALTER TABLE education ALTER COLUMN field TYPE varchar(255)');
        DB::statement('ALTER TABLE education ALTER COLUMN description TYPE text');
    }
};
