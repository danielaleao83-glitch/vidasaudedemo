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
        Schema::create('triagens', function (Blueprint $table) {
            $table->id();

            $table->foreignId('atendimento_id')
                ->constrained('atendimentos')
                ->cascadeOnDelete();

            $table->string('pressao_arterial', 20)->nullable();
            $table->decimal('temperatura', 4, 1)->nullable();
            $table->integer('frequencia_cardiaca')->nullable();
            $table->integer('frequencia_respiratoria')->nullable();
            $table->decimal('peso', 6, 2)->nullable();
            $table->decimal('altura', 5, 2)->nullable();
            $table->decimal('saturacao_oxigenio', 5, 2)->nullable();

            $table->text('queixa_principal')->nullable();
            $table->text('observacoes')->nullable();

            $table->string('classificacao_risco', 30)
                ->default('nao_classificado');

            $table->string('status', 30)
                ->default('aguardando');

            $table->timestamp('triado_em')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('triagens');
    }
};
