<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::create('assunto', function (Blueprint $table) {
            $table->id(); // Equivalente a `id` int(11) NOT NULL AUTO_INCREMENT
            $table->timestamp('data_registro')
                    ->default(DB::raw('CURRENT_TIMESTAMP'))
                    ->onUpdate(DB::raw('CURRENT_TIMESTAMP'))
                    ->comment('Data de registro com atualização automática');
            $table->string('tema', 255)->nullable(false); // tema varchar(255) NOT NULL
            $table->dateTime('data_solicitada')->nullable(); // data_solicitada datetime DEFAULT NULL
            $table->string('objetivo', 25)->nullable(false); // objetivo varchar(25) NOT NULL
            $table->time('hora_inicial')->nullable(); // hora_inicial time DEFAULT NULL
            $table->time('hora_termino')->nullable(); // hora_termino time DEFAULT NULL
            $table->integer('tempo_estimado')->nullable(); // tempo_estimado int(10) DEFAULT NULL
            $table->string('local', 25)->nullable(); // local varchar(25) DEFAULT NULL
            $table->string('status', 25)->nullable(); // status varchar(255) DEFAULT NULL
            $table->primary('id'); // Define id como Primary Key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assunto');
    }
};
