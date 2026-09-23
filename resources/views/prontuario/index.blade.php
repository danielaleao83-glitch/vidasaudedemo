@extends('layouts.app')

@section('title', 'Prontuário - Vida|Saúde')
@section('page_title', 'Prontuário')
@section('page_subtitle', 'Histórico clínico e acompanhamento dos atendimentos')

@section('content')

<div class="space-y-6">

    <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
        <div>
            <div class="text-xs font-black uppercase tracking-[0.18em] text-cyan-600">
                Registro clínico
            </div>

            <h2 class="mt-2 text-3xl font-black tracking-tight text-slate-950">
                Prontuário eletrônico
            </h2>

            <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                Consulte os atendimentos e abra o registro clínico correspondente.
            </p>
        </div>

        <a href="{{ url('/atendimentos') }}"
           class="rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-bold text-slate-700 shadow-sm transition hover:bg-slate-50">
            Ver atendimentos
        </a>
    </div>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="text-sm font-semibold text-slate-500">
                Total de atendimentos
            </div>

            <div class="mt-2 text-3xl font-black text-slate-950">
                {{ $atendimentos->count() }}
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="text-sm font-semibold text-slate-500">
                Em atendimento
            </div>

            <div class="mt-2 text-3xl font-black text-blue-700">
                {{ $atendimentos->where('status', 'em_atendimento')->count() }}
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="text-sm font-semibold text-slate-500">
                Finalizados
            </div>

            <div class="mt-2 text-3xl font-black text-emerald-700">
                {{ $atendimentos->where('status', 'finalizado')->count() }}
            </div>
        </div>

    </div>

    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-200 px-6 py-5">
            <h3 class="text-lg font-black text-slate-950">
                Histórico de atendimentos
            </h3>

            <p class="mt-1 text-sm text-slate-500">
                Selecione um atendimento para abrir o prontuário clínico.
            </p>
        </div>

        @if ($atendimentos->isEmpty())

            <div class="px-6 py-12 text-center">
                <div class="text-lg font-black text-slate-900">
                    Nenhum atendimento registrado
                </div>

                <p class="mt-2 text-sm text-slate-500">
                    Os prontuários aparecerão aqui após a criação dos atendimentos.
                </p>
            </div>

        @else

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">

                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-black uppercase tracking-wider text-slate-500">
                                Senha
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-black uppercase tracking-wider text-slate-500">
                                Paciente
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-black uppercase tracking-wider text-slate-500">
                                Data
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-black uppercase tracking-wider text-slate-500">
                                Registro clínico
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-black uppercase tracking-wider text-slate-500">
                                Status
                            </th>

                            <th class="px-6 py-4 text-right text-xs font-black uppercase tracking-wider text-slate-500">
                                Ação
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @foreach ($atendimentos as $atendimento)

                            <tr class="transition hover:bg-slate-50">

                                <td class="whitespace-nowrap px-6 py-5">
                                    <span class="font-black text-slate-950">
                                        {{ $atendimento->senha }}
                                    </span>
                                </td>

                                <td class="whitespace-nowrap px-6 py-5">
                                    <div class="font-bold text-slate-900">
                                        {{ $atendimento->paciente->nome ?? 'Paciente' }}
                                    </div>

                                    @if ($atendimento->paciente?->cns)
                                        <div class="mt-1 text-xs text-slate-400">
                                            CNS {{ $atendimento->paciente->cns }}
                                        </div>
                                    @endif
                                </td>

                                <td class="whitespace-nowrap px-6 py-5 text-sm text-slate-600">
                                    {{ $atendimento->data_atendimento?->format('d/m/Y') }}
                                </td>

                                <td class="whitespace-nowrap px-6 py-5">

                                    @if ($atendimento->registroClinico)
                                        <span class="inline-flex rounded-full px-3 py-1 text-xs font-bold
                                            {{ $atendimento->registroClinico->status === 'finalizado'
                                                ? 'bg-emerald-50 text-emerald-700'
                                                : 'bg-amber-50 text-amber-700' }}">
                                            {{ $atendimento->registroClinico->status === 'finalizado' ? 'Finalizado' : 'Rascunho' }}
                                        </span>
                                    @else
                                        <span class="text-sm text-slate-400">
                                            Não iniciado
                                        </span>
                                    @endif

                                </td>

                                <td class="whitespace-nowrap px-6 py-5">

                                    @php
                                        $statusClasses = [
                                            'aguardando' => 'bg-amber-50 text-amber-700',
                                            'chamando' => 'bg-blue-50 text-blue-700',
                                            'em_atendimento' => 'bg-violet-50 text-violet-700',
                                            'finalizado' => 'bg-emerald-50 text-emerald-700',
                                            'cancelado' => 'bg-red-50 text-red-700',
                                        ];

                                        $statusLabels = [
                                            'aguardando' => 'Aguardando',
                                            'chamando' => 'Chamando',
                                            'em_atendimento' => 'Em atendimento',
                                            'finalizado' => 'Finalizado',
                                            'cancelado' => 'Cancelado',
                                        ];
                                    @endphp

                                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-bold {{ $statusClasses[$atendimento->status] ?? 'bg-slate-100 text-slate-600' }}">
                                        {{ $statusLabels[$atendimento->status] ?? ucfirst($atendimento->status) }}
                                    </span>

                                </td>

                                <td class="whitespace-nowrap px-6 py-5 text-right">

                                    <a href="{{ route('prontuario.show', $atendimento) }}"
                                       class="inline-flex items-center rounded-xl bg-slate-950 px-4 py-2.5 text-xs font-bold text-white transition hover:bg-slate-800">
                                        {{ $atendimento->status === 'finalizado' ? 'Visualizar' : 'Abrir prontuário' }}
                                    </a>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>
            </div>

        @endif

    </div>

</div>

@endsection
