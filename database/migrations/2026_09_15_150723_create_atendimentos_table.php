<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->id();

            $table->uuid('uuid')->unique();

            $table->foreignId('paciente_id')
                ->constrained('pacientes')
                ->cascadeOnDelete();

            $table->date('data_atendimento');

            $table->string('tipo_atendimento', 30);

            $table->string('prioridade', 20)
                ->default('normal');

            $table->string('senha', 20);

            $table->string('status', 30)
                ->default('aguardando');

            $table->text('observacoes')->nullable();

            $table->timestamps();

            $table->index('data_atendimento');
            $table->index('status');
            $table->index('prioridade');
            $table->index(['status', 'prioridade']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('atendimentos');
    }
};