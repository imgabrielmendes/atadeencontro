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
        // Tabela ata_has_fac
        Schema::create('ata_has_user', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_ata')->constrained('ata');

            $table->foreignId('id_user')->constrained('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ata_has_user');
    }
};
