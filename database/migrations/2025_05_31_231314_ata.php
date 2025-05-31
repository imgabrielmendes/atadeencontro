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
                // Tabela assunto
        Schema::create('ata', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->char('id_objetivo', 3);
            $table->foreignId('id_local')->constrained('local');
            $table->timestamp('dthr_registro');
            $table->dateTime('dthr_solicitada')->nullable();
            $table->time('hr_inicial')->nullable();
            $table->time('hr_termino')->nullable();
            $table->time('hr_estimado')->nullable();
            $table->char('status', 5)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ata');
    }
};
