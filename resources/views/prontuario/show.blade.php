@extends('layouts.app')

@section('title', 'Prontuário')
@section('page_title', 'Prontuário Eletrônico')
@section('page_subtitle', 'Registro clínico e acompanhamento do atendimento')

@section('content')

<div class="max-w-6xl mx-auto space-y-6">

    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

        <div class="flex flex-col gap-5 md:flex-row md:items-start md:justify-between">

            <div>
                <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                    Paciente
                </div>

                <h2 class="mt-1 text-2xl font-bold text-slate-900">
                    {{ $atendimento->paciente->nome ?? 'Paciente não informado' }}
                </h2>

                @if($atendimento->paciente?->cns)
                    <p class="mt-1 text-sm text-slate-500">
                        CNS: {{ $atendimento->paciente->cns }}
                    </p>
                @endif
            </div>

            <div class="flex flex-wrap gap-2">

                <span class="rounded-full bg-blue-50 px-3 py-1.5 text-sm font-semibold text-blue-700">
                    Senha {{ $atendimento->senha }}
                </span>

                @if($atendimento->status === 'em_atendimento')
                    <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-sm font-semibold text-emerald-700">
                        Em atendimento
                    </span>
                @elseif($atendimento->status === 'finalizado')
                    <span class="rounded-full bg-slate-100 px-3 py-1.5 text-sm font-semibold text-slate-700">
                        Finalizado
                    </span>
                @endif

            </div>

        </div>

        <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-3">

            <div class="rounded-xl bg-slate-50 p-4">
                <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                    Data
                </div>

                <div class="mt-1 font-semibold text-slate-800">
                    {{ optional($atendimento->data_atendimento)->format('d/m/Y') }}
                </div>
            </div>

            <div class="rounded-xl bg-slate-50 p-4">
                <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                    Tipo
                </div>

                <div class="mt-1 font-semibold text-slate-800">
                    {{ ucfirst($atendimento->tipo_atendimento) }}
                </div>
            </div>

            <div class="rounded-xl bg-slate-50 p-4">
                <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                    Prioridade
                </div>

                <div class="mt-1 font-semibold text-slate-800">
                    {{ ucfirst($atendimento->prioridade) }}
                </div>
            </div>

        </div>

    </div>


    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

        <div class="flex items-center justify-between">

            <div>
                <h3 class="text-lg font-bold text-slate-900">
                    Triagem
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    Dados registrados antes do atendimento clínico.
                </p>
            </div>

            @if($atendimento->triagem)
                <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-sm font-semibold text-emerald-700">
                    {{ ucfirst($atendimento->triagem->classificacao_risco ?? 'Não classificado') }}
                </span>
            @endif

        </div>

        @if($atendimento->triagem)

            <div class="mt-6 grid grid-cols-2 gap-4 md:grid-cols-4">

                <div class="rounded-xl bg-slate-50 p-4">
                    <div class="text-xs text-slate-400">Pressão arterial</div>
                    <div class="mt-1 font-semibold text-slate-800">
                        {{ $atendimento->triagem->pressao_arterial ?: '—' }}
                    </div>
                </div>

                <div class="rounded-xl bg-slate-50 p-4">
                    <div class="text-xs text-slate-400">Temperatura</div>
                    <div class="mt-1 font-semibold text-slate-800">
                        {{ $atendimento->triagem->temperatura !== null ? $atendimento->triagem->temperatura . ' °C' : '—' }}
                    </div>
                </div>

                <div class="rounded-xl bg-slate-50 p-4">
                    <div class="text-xs text-slate-400">Frequência cardíaca</div>
                    <div class="mt-1 font-semibold text-slate-800">
                        {{ $atendimento->triagem->frequencia_cardiaca !== null ? $atendimento->triagem->frequencia_cardiaca . ' bpm' : '—' }}
                    </div>
                </div>

                <div class="rounded-xl bg-slate-50 p-4">
                    <div class="text-xs text-slate-400">Saturação</div>
                    <div class="mt-1 font-semibold text-slate-800">
                        {{ $atendimento->triagem->saturacao_oxigenio !== null ? $atendimento->triagem->saturacao_oxigenio . '%' : '—' }}
                    </div>
                </div>

            </div>

            @if($atendimento->triagem->queixa_principal)
                <div class="mt-5">
                    <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Queixa principal
                    </div>

                    <p class="mt-2 text-sm leading-6 text-slate-700">
                        {{ $atendimento->triagem->queixa_principal }}
                    </p>
                </div>
            @endif

            @if($atendimento->triagem->observacoes)
                <div class="mt-5">
                    <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Observações da triagem
                    </div>

                    <p class="mt-2 text-sm leading-6 text-slate-700">
                        {{ $atendimento->triagem->observacoes }}
                    </p>
                </div>
            @endif

        @else

            <div class="mt-5 rounded-xl bg-slate-50 p-5 text-sm text-slate-500">
                Nenhuma triagem registrada para este atendimento.
            </div>

        @endif

    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

        <div>
            <h3 class="text-lg font-bold text-slate-900">
                Registro clínico
            </h3>

            <p class="mt-1 text-sm text-slate-500">
                Registre a evolução clínica, avaliação, conduta e orientações.
            </p>
        </div>

        @if($atendimento->status === 'em_atendimento')

            <form
                method="POST"
                action="{{ route('prontuario.store', $atendimento) }}"
                class="mt-6 space-y-5"
            >

                @csrf

                <div>
                    <label class="block text-sm font-semibold text-slate-700">
                        História clínica
                    </label>

                    <textarea
                        name="historia_clinica"
                        rows="4"
                        class="mt-2 block w-full rounded-xl border-slate-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Registre a história clínica relevante..."
                    >{{ old('historia_clinica', $atendimento->registroClinico?->historia_clinica) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700">
                        Exame clínico
                    </label>

                    <textarea
                        name="exame_clinico"
                        rows="4"
                        class="mt-2 block w-full rounded-xl border-slate-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Registre os achados do exame clínico..."
                    >{{ old('exame_clinico', $atendimento->registroClinico?->exame_clinico) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700">
                        Avaliação
                    </label>

                    <textarea
                        name="avaliacao"
                        rows="4"
                        class="mt-2 block w-full rounded-xl border-slate-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Registre a avaliação clínica..."
                    >{{ old('avaliacao', $atendimento->registroClinico?->avaliacao) }}</textarea>

                <div>
                    <label for="diagnostico" class="mb-2 block text-sm font-semibold text-slate-700">Diagn�stico</label>
                    <textarea id="diagnostico" name="diagnostico" rows="4" class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm shadow-sm focus:border-cyan-500 focus:ring-cyan-500">{{ old('diagnostico', $atendimento->registroClinico?->diagnostico ?? '') }}</textarea>
                </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700">
                        Conduta
                    </label>

                    <textarea
                        name="conduta"
                        rows="4"
                        class="mt-2 block w-full rounded-xl border-slate-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Registre a conduta adotada..."
                    >{{ old('conduta', $atendimento->registroClinico?->conduta) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700">
                        Orientações
                    </label>

                    <textarea
                        name="orientacoes"
                        rows="4"
                        class="mt-2 block w-full rounded-xl border-slate-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Registre as orientações ao paciente..."
                    >{{ old('orientacoes', $atendimento->registroClinico?->orientacoes) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700">
                        Observações
                    </label>

                    <textarea
                        name="observacoes"
                        rows="3"
                        class="mt-2 block w-full rounded-xl border-slate-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Outras observações..."
                    >{{ old('observacoes', $atendimento->registroClinico?->observacoes) }}</textarea>
                </div>

                <div class="flex flex-col gap-3 border-t border-slate-200 pt-5 sm:flex-row sm:justify-end">

                    <button
                        type="submit"
                        class="rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700"
                    >
                        Salvar rascunho
                    </button>

                </div>

            </form>

            @if($atendimento->registroClinico)

                <div class="mt-6 border-t border-slate-200 pt-6">

                    <form
                        method="POST"
                        action="{{ route('prontuario.finalizar', $atendimento) }}"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="w-full rounded-xl bg-emerald-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700"
                        >
                            Finalizar atendimento
                        </button>

                    </form>

                </div>

            @endif

        @elseif($atendimento->status === 'finalizado')

            @if($atendimento->registroClinico)

                <div class="mt-6 space-y-5">

                    @foreach([
                        'História clínica' => $atendimento->registroClinico->historia_clinica,
                        'Exame clínico' => $atendimento->registroClinico->exame_clinico,
                        'Avaliação' => $atendimento->registroClinico->avaliacao,
                        'Conduta' => $atendimento->registroClinico->conduta,
                        'Orientações' => $atendimento->registroClinico->orientacoes,
                        'Observações' => $atendimento->registroClinico->observacoes,
                    ] as $titulo => $valor)

                        @if($valor)
                            <div>
                                <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                    {{ $titulo }}
                                </div>

                                <p class="mt-2 whitespace-pre-line text-sm leading-6 text-slate-700">
                                    {{ $valor }}
                                </p>
                            </div>
                        @endif

                    @endforeach

                </div>

                @if($atendimento->registroClinico->finalizado_em)
                    <div class="mt-6 rounded-xl bg-slate-50 p-4 text-sm text-slate-500">
                        Registro finalizado em
                        {{ $atendimento->registroClinico->finalizado_em->format('d/m/Y H:i') }}.
                    </div>
                @endif

            @else

                <div class="mt-6 rounded-xl bg-slate-50 p-5 text-sm text-slate-500">
                    Atendimento finalizado sem registro clínico.
                </div>

            @endif

        @else

            <div class="mt-6 rounded-xl bg-slate-50 p-5 text-sm text-slate-500">
                O registro clínico ficará disponível quando o atendimento estiver em atendimento clínico.
            </div>

        @endif

    </div>

</div>

@endsection
