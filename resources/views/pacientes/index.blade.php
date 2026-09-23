@extends('layouts.app')

@section('title', 'Pacientes')

@section('content')
<div class="space-y-6">

    {{-- Cabeçalho --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-sm font-medium text-cyan-400">Gestão assistencial</p>
            <h1 class="text-2xl font-bold text-white">Pacientes</h1>
            <p class="mt-1 text-sm text-slate-400">
                Cadastro e identificação dos cidadãos atendidos.
            </p>
        </div>

        <a
            href="{{ route('pacientes.create') }}"
            class="inline-flex items-center justify-center rounded-lg bg-cyan-500 px-5 py-3 text-sm font-semibold text-slate-950 shadow-lg shadow-cyan-500/20 transition hover:bg-cyan-400"
        >
            + Novo paciente
        </a>
    </div>

    {{-- Mensagem de sucesso --}}
    @if(session('success'))
        <div class="rounded-lg border border-emerald-500/30 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
            {{ session('success') }}
        </div>
    @endif

    {{-- Lista --}}
    <div class="overflow-hidden rounded-xl border border-slate-800 bg-slate-900/70 shadow-xl">

        <div class="border-b border-slate-800 px-5 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="font-semibold text-white">Pacientes cadastrados</h2>
                    <p class="text-xs text-slate-500">
                        {{ $pacientes->total() }} registro(s)
                    </p>
                </div>
            </div>
        </div>

        @if($pacientes->count())

            <div class="overflow-x-auto">
                <table class="min-w-full text-left text-sm">
                    <thead class="border-b border-slate-800 bg-slate-950/50">
                        <tr>
                            <th class="px-5 py-3 font-medium text-slate-400">Paciente</th>
                            <th class="px-5 py-3 font-medium text-slate-400">CPF</th>
                            <th class="px-5 py-3 font-medium text-slate-400">CNS</th>
                            <th class="px-5 py-3 font-medium text-slate-400">Nascimento</th>
                            <th class="px-5 py-3 font-medium text-slate-400">Identificador</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-800">
                        @foreach($pacientes as $paciente)
                            <tr class="transition hover:bg-slate-800/40">

                                <td class="px-5 py-4">
                                    <div class="font-medium text-white">
                                        {{ $paciente->nome_social ?: $paciente->nome }}
                                    </div>

                                    @if($paciente->nome_social)
                                        <div class="mt-1 text-xs text-slate-500">
                                            Nome civil: {{ $paciente->nome }}
                                        </div>
                                    @endif
                                </td>

                                <td class="px-5 py-4 text-slate-300">
                                    {{ $paciente->cpf ?: '—' }}
                                </td>

                                <td class="px-5 py-4 text-slate-300">
                                    {{ $paciente->cns ?: '—' }}
                                </td>

                                <td class="px-5 py-4 text-slate-300">
                                    {{ $paciente->data_nascimento?->format('d/m/Y') ?: '—' }}
                                </td>

                                <td class="px-5 py-4">
                                    <span class="font-mono text-xs text-cyan-400">
                                        {{ $paciente->uuid }}
                                    </span>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($pacientes->hasPages())
                <div class="border-t border-slate-800 px-5 py-4">
                    {{ $pacientes->links() }}
                </div>
            @endif

        @else

            <div class="px-6 py-14 text-center">
                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-cyan-500/10 text-2xl text-cyan-400">
                    +
                </div>

                <h3 class="text-lg font-semibold text-white">
                    Nenhum paciente cadastrado
                </h3>

                <p class="mx-auto mt-2 max-w-md text-sm text-slate-400">
                    Comece cadastrando o primeiro paciente do sistema.
                </p>

                <a
                    href="{{ route('pacientes.create') }}"
                    class="mt-5 inline-flex rounded-lg bg-cyan-500 px-5 py-3 text-sm font-semibold text-slate-950 hover:bg-cyan-400"
                >
                    Cadastrar paciente
                </a>
            </div>

        @endif
    </div>

</div>
@endsection