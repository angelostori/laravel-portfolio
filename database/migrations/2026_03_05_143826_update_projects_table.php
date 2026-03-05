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
        Schema::table('projects', function (Blueprint $table) {
            // rimuovere la colonna type
            $table->dropColumn('type');

            // aggiungere la colonna type_id come chiave esterna
            $table->foreignId('type_id')
                ->after('description')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // ripristinare la colonna type
            $table->string('type')->after('description');

            // rimuovere la colonna type_id
            $table->dropForeign(['projects_type_id_foreign']);
            $table->dropColumn('type_id');
        });
    }
};
