<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registros_clinicos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('atendimento_id')
                ->constrained('atendimentos')
                ->cascadeOnDelete();

            $table->text('historia_clinica')->nullable();
            $table->text('exame_clinico')->nullable();
            $table->text('avaliacao')->nullable();
            $table->text('conduta')->nullable();
            $table->text('orientacoes')->nullable();
            $table->text('observacoes')->nullable();

            $table->string('status', 30)->default('rascunho');

            $table->timestamp('finalizado_em')->nullable();

            $table->timestamps();

            $table->index('status');
            $table->index('finalizado_em');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registros_clinicos');
    }
};
