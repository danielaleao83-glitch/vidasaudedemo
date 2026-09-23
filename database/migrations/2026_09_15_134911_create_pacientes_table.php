<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();

            // Identificador publico e seguro
            $table->uuid('uuid')->unique();

            // Identificacao principal
            $table->string('cpf', 11)->nullable()->unique();
            $table->string('cns', 15)->nullable()->unique();

            // Dados pessoais
            $table->string('nome');
            $table->string('nome_social')->nullable();
            $table->string('nome_mae')->nullable();
            $table->string('nome_pai')->nullable();

            // Contato
            $table->string('telefone', 20)->nullable();
            $table->string('email')->nullable();

            // Dados demograficos
            $table->date('data_nascimento')->nullable();
            $table->unsignedSmallInteger('sexo')->nullable();
            $table->unsignedSmallInteger('raca_cor')->nullable();
            $table->unsignedSmallInteger('estado_civil')->nullable();

            // Dados territoriais e-SUS
            $table->string('codigo_ibge_municipio_nascimento', 7)->nullable();
            $table->string('microarea', 10)->nullable();

            // Responsavel familiar
            $table->string('cpf_responsavel_familiar', 11)->nullable();
            $table->string('cns_responsavel_familiar', 15)->nullable();

            $table->timestamps();
            $table->softDeletes();

            // Indices para consultas frequentes
            $table->index('nome');
            $table->index('data_nascimento');
            $table->index('codigo_ibge_municipio_nascimento');
            $table->index('microarea');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
