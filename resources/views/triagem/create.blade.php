@extends('layouts.app')

@section('title', 'Iniciar Triagem')
@section('page_title', 'Iniciar Triagem')
@section('page_subtitle', 'Avaliação inicial do paciente')

@section('content')

<div class="max-w-5xl mx-auto">

    {{-- CABEÇALHO DO PACIENTE --}}
    <div class="mb-6 rounded-xl border border-slate-200 bg-white p-6 shadow-sm">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

            <div>
                <p class="text-sm font-medium text-slate-500">
                    Paciente
                </p>

                <h2 class="mt-1 text-2xl font-bold text-slate-900">
                    {{ $atendimento->paciente->nome ?? 'Paciente não informado' }}
                </h2>

                <div class="mt-2 flex flex-wrap gap-4 text-sm text-slate-500">

                    @if($atendimento->paciente?->cns)
                        <span>
                            CNS: {{ $atendimento->paciente->cns }}
                        </span>
                    @endif

                    <span>
                        Senha: <strong class="text-blue-700">{{ $atendimento->senha }}</strong>
                    </span>

                    <span>
                        Atendimento: {{ ucfirst($atendimento->tipo_atendimento) }}
                    </span>

                </div>
            </div>

            <div>
                @if($atendimento->prioridade === 'alta')

                    <span class="rounded-full bg-red-100 px-4 py-2 text-sm font-semibold text-red-700">
                        Prioridade Alta
                    </span>

                @elseif($atendimento->prioridade === 'normal')

                    <span class="rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-700">
                        Prioridade Normal
                    </span>

                @else

                    <span class="rounded-full bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700">
                        Prioridade {{ ucfirst($atendimento->prioridade) }}
                    </span>

                @endif
            </div>

        </div>

    </div>


    {{-- FORMULÁRIO --}}
    <form
        method="POST"
        action="{{ route('triagem.store') }}"
        class="space-y-6"
    >

        @csrf

        <input
            type="hidden"
            name="atendimento_id"
            value="{{ $atendimento->id }}"
        >


        {{-- SINAIS VITAIS --}}
        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="mb-6">
                <h3 class="text-lg font-bold text-slate-900">
                    Sinais vitais
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    Registre os principais parâmetros clínicos do paciente.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">

                <div>
                    <label
                        for="pressao_arterial"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Pressão arterial
                    </label>

                    <input
                        id="pressao_arterial"
                        name="pressao_arterial"
                        type="text"
                        value="{{ old('pressao_arterial') }}"
                        placeholder="Ex.: 120/80"
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                    @error('pressao_arterial')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <label
                        for="temperatura"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Temperatura (°C)
                    </label>

                    <input
                        id="temperatura"
                        name="temperatura"
                        type="number"
                        step="0.1"
                        min="25"
                        max="45"
                        value="{{ old('temperatura') }}"
                        placeholder="Ex.: 36.5"
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                    @error('temperatura')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <label
                        for="frequencia_cardiaca"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Frequência cardíaca
                    </label>

                    <input
                        id="frequencia_cardiaca"
                        name="frequencia_cardiaca"
                        type="number"
                        min="20"
                        max="250"
                        value="{{ old('frequencia_cardiaca') }}"
                        placeholder="BPM"
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                    @error('frequencia_cardiaca')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <label
                        for="frequencia_respiratoria"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Frequência respiratória
                    </label>

                    <input
                        id="frequencia_respiratoria"
                        name="frequencia_respiratoria"
                        type="number"
                        min="5"
                        max="80"
                        value="{{ old('frequencia_respiratoria') }}"
                        placeholder="IRPM"
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                    @error('frequencia_respiratoria')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <label
                        for="saturacao_oxigenio"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Saturação O₂ (%)
                    </label>

                    <input
                        id="saturacao_oxigenio"
                        name="saturacao_oxigenio"
                        type="number"
                        step="0.1"
                        min="0"
                        max="100"
                        value="{{ old('saturacao_oxigenio') }}"
                        placeholder="Ex.: 98"
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                    @error('saturacao_oxigenio')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <label
                        for="peso"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Peso (kg)
                    </label>

                    <input
                        id="peso"
                        name="peso"
                        type="number"
                        step="0.01"
                        min="0"
                        max="500"
                        value="{{ old('peso') }}"
                        placeholder="Ex.: 70.5"
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                    @error('peso')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <label
                        for="altura"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Altura (m)
                    </label>

                    <input
                        id="altura"
                        name="altura"
                        type="number"
                        step="0.01"
                        min="0"
                        max="3"
                        value="{{ old('altura') }}"
                        placeholder="Ex.: 1.70"
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                    @error('altura')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </div>

        </div>


        {{-- AVALIAÇÃO --}}
        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="mb-6">
                <h3 class="text-lg font-bold text-slate-900">
                    Avaliação inicial
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    Registre a queixa principal e a classificação de risco.
                </p>
            </div>

            <div class="space-y-5">

                <div>
                    <label
                        for="queixa_principal"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Queixa principal
                    </label>

                    <textarea
                        id="queixa_principal"
                        name="queixa_principal"
                        rows="4"
                        placeholder="Descreva o motivo principal da procura pelo atendimento..."
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >{{ old('queixa_principal') }}</textarea>

                    @error('queixa_principal')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <label
                        for="classificacao_risco"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Classificação de risco
                    </label>

                    <select
                        id="classificacao_risco"
                        name="classificacao_risco"
                        required
                        class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                        <option value="">Selecione</option>

                        <option
                            value="nao_classificado"
                            @selected(old('classificacao_risco') === 'nao_classificado')
                        >
                            Não classificado
                        </option>

                        <option
                            value="verde"
                            @selected(old('classificacao_risco') === 'verde')
                        >
                            Verde
                        </option>

                        <option
                            value="amarelo"
                            @selected(old('classificacao_risco') === 'amarelo')
                        >
                            Amarelo
                        </option>

                        <option
                            value="laranja"
                            @selected(old('classificacao_risco') === 'laranja')
                        >
                            Laranja
                        </option>

                        <option
                            value="vermelho"
                            @selected(old('classificacao_risco') === 'vermelho')
                        >
                            Vermelho
                        </option>

                    </select>

                    @error('classificacao_risco')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <label
                        for="observacoes"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Observações
                    </label>

                    <textarea
                        id="observacoes"
                        name="observacoes"
                        rows="4"
                        placeholder="Informações adicionais..."
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >{{ old('observacoes') }}</textarea>

                    @error('observacoes')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </div>

        </div>


        {{-- AÇÕES --}}
        <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-between">

            <a
                href="{{ route('triagem.index') }}"
                class="inline-flex items-center justify-center rounded-lg border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50"
            >
                Voltar para triagem
            </a>

            <button
                type="submit"
                class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700"
            >
                Salvar triagem
            </button>

        </div>

    </form>

</div>

@endsection
