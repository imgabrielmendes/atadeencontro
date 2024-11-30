<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{

    protected $connection = 'mysql';

    public function up()
    {
        // Tabela deliberacoes
        Schema::create('deliberacoes', function (Blueprint $table) {
            $table->integer('id')->primary()->comment('PRIMARY KEY');
            $table->integer('id_ata')->nullable(false);
            $table->integer('deliberadores')->nullable();
            $table->text('deliberacoes')->nullable();
        });

        // Tabela facilitadores
        Schema::create('facilitadores', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->integer('matricula')->nullable();
            $table->string('nome_facilitador', 50);
            $table->string('email_facilitador', 50);
        });

        // Tabela locais
        Schema::create('locais', function (Blueprint $table) {
            $table->integer('id')->primary()->comment('Primary Key');
            $table->string('locais', 50)->nullable();
        });

        // Tabela participantes
        Schema::create('participantes', function (Blueprint $table) {
            $table->integer('id')->primary()->comment('PRIMARY KEY');
            $table->integer('id_ata')->nullable(false);
            $table->timestamp('data_registro')->useCurrent();
            $table->integer('participantes')->nullable();
        });

        // Tabela textoprinc
        Schema::create('textoprinc', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('id_ata')->nullable(false);
            $table->text('texto_princ')->nullable();
        });

        // Tabela ata_has_fac
        Schema::create('ata_has_fac', function (Blueprint $table) {
            $table->integer('id')->primary(); // Define a coluna `id` como chave primária
            $table->integer('id_ata')->nullable(); // Coluna `id_ata`, pode ser nula
            $table->tinyInteger('facilitadores')->nullable(); // Coluna `facilitadores`, pode ser nula
        });

        // Tabela assunto
        Schema::create('assunto', function (Blueprint $table) {
            $table->integer('id')->primary()->comment('Primary Key');
            $table->timestamp('data_registro')->default(DB::raw('CURRENT_TIMESTAMP'))->useCurrentOnUpdate();
            $table->string('tema', 255);
            $table->dateTime('data_solicitada')->nullable();
            $table->string('objetivo', 25);
            $table->time('hora_inicial')->nullable();
            $table->time('hora_termino')->nullable();
            $table->integer('tempo_estimado')->nullable();
            $table->string('local', 25)->nullable();
            $table->string('status', 255)->nullable();
        });

        // Configura charset e collation para todas as tabelas
        $tables = ['deliberacoes', 'facilitadores', 'locais', 'participantes', 'textoprinc', 'ata_has_fac', 'assunto'];
        foreach ($tables as $table) {
            DB::statement("ALTER TABLE `{$table}` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assunto');
        Schema::dropIfExists('ata_has_fac');
        Schema::dropIfExists('textoprinc');
        Schema::dropIfExists('participantes');
        Schema::dropIfExists('locais');
        Schema::dropIfExists('facilitadores');
        Schema::dropIfExists('deliberacoes');
    }
};
