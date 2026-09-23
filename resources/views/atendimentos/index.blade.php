@extends('layouts.app')

@section('title', 'Atendimentos')
@section('page_title', 'Atendimentos')
@section('page_subtitle', 'Registro e acompanhamento dos atendimentos')

@section('content')

<div class="max-w-6xl mx-auto">

    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">
                Atendimentos
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Consulte os atendimentos registrados no sistema.
            </p>
        </div>

        <a
            href="{{ route('atendimentos.create') }}"
            class="rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700"
        >
            Novo atendimento
        </a>
    </div>

    @if($atendimentos->isEmpty())

        <div class="rounded-xl border border-slate-200 bg-white p-8 text-center shadow-sm">
            <h2 class="text-xl font-semibold text-slate-800">
                Nenhum atendimento registrado
            </h2>

            <p class="mt-2 text-slate-500">
                Crie um atendimento para iniciar o fluxo de atendimento.
            </p>
        </div>

    @else

        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-slate-200">

                    <thead class="bg-slate-50">
                        <tr>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                Senha
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                Paciente
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                Data
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                Tipo
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                Prioridade
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                Status
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                Prontuário
                            </th>

                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200 bg-white">

                        @foreach($atendimentos as $atendimento)

                            <tr class="hover:bg-slate-50">

                                <td class="whitespace-nowrap px-6 py-4">
                                    <span class="text-lg font-bold text-blue-700">
                                        {{ $atendimento->senha }}
                                    </span>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="font-semibold text-slate-900">
                                        {{ $atendimento->paciente->nome ?? 'Paciente não informado' }}
                                    </div>

                                    @if($atendimento->paciente?->cns)
                                        <div class="text-sm text-slate-500">
                                            CNS: {{ $atendimento->paciente->cns }}
                                        </div>
                                    @endif
                                </td>

                                <td class="whitespace-nowrap px-6 py-4 text-slate-700">
                                    {{ optional($atendimento->data_atendimento)->format('d/m/Y') }}
                                </td>

                                <td class="whitespace-nowrap px-6 py-4 text-slate-700">
                                    {{ ucfirst($atendimento->tipo_atendimento) }}
                                </td>

                                <td class="whitespace-nowrap px-6 py-4">
                                    <span class="rounded-full bg-slate-100 px-3 py-1 text-sm font-medium text-slate-700">
                                        {{ ucfirst($atendimento->prioridade) }}
                                    </span>
                                </td>

                                <td class="whitespace-nowrap px-6 py-4">

                                    @if($atendimento->status === 'aguardando')

                                        <span class="rounded-full bg-yellow-100 px-3 py-1 text-sm font-medium text-yellow-800">
                                            Aguardando
                                        </span>

                                    @elseif($atendimento->status === 'chamando')

                                        <span class="rounded-full bg-blue-100 px-3 py-1 text-sm font-medium text-blue-800">
                                            Chamando
                                        </span>

                                    @elseif($atendimento->status === 'em_atendimento')

                                        <span class="rounded-full bg-emerald-100 px-3 py-1 text-sm font-medium text-emerald-800">
                                            Em atendimento
                                        </span>

                                    @elseif($atendimento->status === 'finalizado')

                                        <span class="rounded-full bg-slate-200 px-3 py-1 text-sm font-medium text-slate-700">
                                            Finalizado
                                        </span>

                                    @else

                                        <span class="rounded-full bg-slate-100 px-3 py-1 text-sm font-medium text-slate-700">
                                            {{ ucfirst($atendimento->status) }}
                                        </span>

                                    @endif

                                </td>

                                <td class="whitespace-nowrap px-6 py-4">

                                    <a
                                        href="{{ route('prontuario.show', $atendimento) }}"
                                        class="inline-flex items-center rounded-lg border border-blue-200 bg-blue-50 px-3 py-2 text-sm font-semibold text-blue-700 transition hover:bg-blue-100"
                                    >
                                        Abrir prontuário
                                    </a>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    @endif

</div>

@endsection
