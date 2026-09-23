@extends('layouts.app')

@section('title', 'Dashboard - Vida|Saúde')

@section('page_title', 'Dashboard')

@section('page_subtitle', 'Gestão integrada do atendimento em saúde')

@section('content')

<div class="space-y-8">

    {{-- =========================================================
         HERO / CABEÇALHO OPERACIONAL
    ========================================================== --}}
    <section class="relative overflow-hidden rounded-[2rem] bg-slate-950 px-6 py-8 text-white shadow-xl lg:px-8">

        <div class="absolute -right-20 -top-24 h-72 w-72 rounded-full bg-cyan-500/10 blur-3xl"></div>
        <div class="absolute -bottom-24 left-1/3 h-64 w-64 rounded-full bg-blue-500/10 blur-3xl"></div>

        <div class="relative flex flex-col gap-8 lg:flex-row lg:items-center lg:justify-between">

            <div class="max-w-3xl">

                <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-cyan-400/20 bg-cyan-400/10 px-3 py-1.5 text-xs font-bold uppercase tracking-[0.16em] text-cyan-300">
                    <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                    Central operacional
                </div>

                <h2 class="text-3xl font-black tracking-tight sm:text-4xl">
                    Atendimento conectado.
                </h2>

                <p class="mt-3 max-w-2xl text-sm leading-7 text-slate-300 sm:text-base">
                    Acompanhe o ciclo do cidadão desde o cadastro até o registro clínico,
                    com uma visão operacional simples, segura e integrada.
                </p>

            </div>

            <div class="flex flex-wrap gap-3">

                <a href="{{ url('/pacientes/create') }}"
                   class="inline-flex items-center gap-2 rounded-xl bg-cyan-400 px-5 py-3 text-sm font-black text-slate-950 shadow-lg shadow-cyan-500/10 transition hover:bg-cyan-300">
                    <span class="text-lg">+</span>
                    Novo paciente
                </a>

                <a href="{{ url('/fila') }}"
                   class="inline-flex items-center gap-2 rounded-xl border border-white/10 bg-white/5 px-5 py-3 text-sm font-bold text-white transition hover:bg-white/10">
                    <span>Fila</span>
                    <span>→</span>
                </a>

            </div>

        </div>

    </section>


    {{-- =========================================================
         INDICADORES
    ========================================================== --}}
    <section class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

        {{-- Pacientes --}}
        <a href="{{ url('/pacientes') }}"
           class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:border-cyan-300 hover:shadow-lg">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.14em] text-slate-400">
                        Pacientes
                    </p>

                    <p class="mt-3 text-4xl font-black tracking-tight text-slate-950">
                        {{ $totalPacientes }}
                    </p>
                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-cyan-50 text-cyan-700 transition group-hover:scale-105">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm13 10v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>

            </div>

            <div class="mt-5 flex items-center justify-between">
                <span class="text-xs font-semibold text-slate-400">
                    Cadastros registrados
                </span>

                <span class="text-sm font-black text-cyan-600 opacity-0 transition group-hover:opacity-100">
                    Abrir →
                </span>
            </div>

        </a>


        {{-- Fila --}}
        <a href="{{ url('/fila') }}"
           class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:border-amber-300 hover:shadow-lg">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.14em] text-slate-400">
                        Fila
                    </p>

                    <p class="mt-3 text-4xl font-black tracking-tight text-slate-950">
                        {{ $aguardando }}
                    </p>
                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-50 text-amber-700 transition group-hover:scale-105">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M12 8v4l3 2M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                </div>

            </div>

            <div class="mt-5 flex items-center justify-between">
                <span class="text-xs font-semibold text-slate-400">
                    Aguardando chamada
                </span>

                <span class="text-sm font-black text-amber-600 opacity-0 transition group-hover:opacity-100">
                    Abrir →
                </span>
            </div>

        </a>


        {{-- Triagem --}}
        <a href="{{ url('/triagem') }}"
           class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:border-blue-300 hover:shadow-lg">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.14em] text-slate-400">
                        Triagem
                    </p>

                    <p class="mt-3 text-4xl font-black tracking-tight text-slate-950">
                        {{ $emTriagem }}
                    </p>
                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-50 text-blue-700 transition group-hover:scale-105">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M9 3h6M9 3v2H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2V3M9 12h6M9 16h4"/>
                    </svg>
                </div>

            </div>

            <div class="mt-5 flex items-center justify-between">
                <span class="text-xs font-semibold text-slate-400">
                    Avaliações em andamento
                </span>

                <span class="text-sm font-black text-blue-600 opacity-0 transition group-hover:opacity-100">
                    Abrir →
                </span>
            </div>

        </a>


        {{-- Atendimentos --}}
        <a href="{{ url('/atendimentos') }}"
           class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:border-emerald-300 hover:shadow-lg">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.14em] text-slate-400">
                        Atendimentos
                    </p>

                    <p class="mt-3 text-4xl font-black tracking-tight text-slate-950">
                        {{ $totalAtendimentos }}
                    </p>
                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-700 transition group-hover:scale-105">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M9 12h6M9 16h6M9 8h6M5 4h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1Z"/>
                    </svg>
                </div>

            </div>

            <div class="mt-5 flex items-center justify-between">
                <span class="text-xs font-semibold text-slate-400">
                    Histórico operacional
                </span>

                <span class="text-sm font-black text-emerald-600 opacity-0 transition group-hover:opacity-100">
                    Abrir →
                </span>
            </div>

        </a>

    </section>


    {{-- =========================================================
         FLUXO ASSISTENCIAL
    ========================================================== --}}
    <section class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm lg:p-8">

        <div class="flex flex-col gap-2">

            <div class="text-xs font-black uppercase tracking-[0.18em] text-cyan-600">
                Jornada assistencial
            </div>

            <div class="flex flex-col gap-2 lg:flex-row lg:items-end lg:justify-between">

                <div>
                    <h3 class="text-2xl font-black tracking-tight text-slate-950">
                        Fluxo do atendimento
                    </h3>

                    <p class="mt-1 max-w-3xl text-sm leading-6 text-slate-500">
                        Um percurso contínuo entre cadastro, atendimento, fila, triagem e prontuário.
                    </p>
                </div>

                <span class="text-xs font-bold text-slate-400">
                    05 etapas integradas
                </span>

            </div>

        </div>


        <div class="mt-8 grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-5">

            {{-- 01 --}}
            <a href="{{ url('/pacientes') }}"
               class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-5 transition hover:-translate-y-1 hover:border-cyan-300 hover:bg-white hover:shadow-lg">

                <div class="flex items-center justify-between">
                    <span class="text-xs font-black text-cyan-600">01</span>

                    <span class="text-slate-300 transition group-hover:translate-x-1 group-hover:text-cyan-500">
                        →
                    </span>
                </div>

                <h4 class="mt-5 font-black text-slate-950">
                    Cadastro
                </h4>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Identificação e informações do cidadão.
                </p>

            </a>


            {{-- 02 --}}
            <a href="{{ url('/atendimentos') }}"
               class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-5 transition hover:-translate-y-1 hover:border-cyan-300 hover:bg-white hover:shadow-lg">

                <div class="flex items-center justify-between">
                    <span class="text-xs font-black text-cyan-600">02</span>

                    <span class="text-slate-300 transition group-hover:translate-x-1 group-hover:text-cyan-500">
                        →
                    </span>
                </div>

                <h4 class="mt-5 font-black text-slate-950">
                    Atendimento
                </h4>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Abertura do atendimento e geração da senha.
                </p>

            </a>


            {{-- 03 --}}
            <a href="{{ url('/fila') }}"
               class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-5 transition hover:-translate-y-1 hover:border-amber-300 hover:bg-white hover:shadow-lg">

                <div class="flex items-center justify-between">
                    <span class="text-xs font-black text-amber-600">03</span>

                    <span class="text-slate-300 transition group-hover:translate-x-1 group-hover:text-amber-500">
                        →
                    </span>
                </div>

                <h4 class="mt-5 font-black text-slate-950">
                    Fila
                </h4>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Organização e chamada dos atendimentos.
                </p>

            </a>


            {{-- 04 --}}
            <a href="{{ url('/triagem') }}"
               class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-5 transition hover:-translate-y-1 hover:border-blue-300 hover:bg-white hover:shadow-lg">

                <div class="flex items-center justify-between">
                    <span class="text-xs font-black text-blue-600">04</span>

                    <span class="text-slate-300 transition group-hover:translate-x-1 group-hover:text-blue-500">
                        →
                    </span>
                </div>

                <h4 class="mt-5 font-black text-slate-950">
                    Triagem
                </h4>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Sinais vitais, queixa e classificação.
                </p>

            </a>


            {{-- 05 --}}
            <a href="{{ url('/prontuario') }}"
               class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-5 transition hover:-translate-y-1 hover:border-emerald-300 hover:bg-white hover:shadow-lg">

                <div class="flex items-center justify-between">
                    <span class="text-xs font-black text-emerald-600">05</span>

                    <span class="text-slate-300 transition group-hover:translate-x-1 group-hover:text-emerald-500">
                        →
                    </span>
                </div>

                <h4 class="mt-5 font-black text-slate-950">
                    Prontuário
                </h4>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Evolução clínica, condutas e desfecho.
                </p>

            </a>

        </div>

    </section>


    {{-- =========================================================
         ÁREA OPERACIONAL
    ========================================================== --}}
    <section class="grid grid-cols-1 gap-6 xl:grid-cols-3">


        {{-- Ações --}}
        <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">

            <div class="text-xs font-black uppercase tracking-[0.16em] text-cyan-600">
                Operação
            </div>

            <h3 class="mt-2 text-xl font-black text-slate-950">
                Acesso rápido
            </h3>

            <p class="mt-2 text-sm leading-6 text-slate-500">
                Atalhos para as tarefas mais utilizadas no atendimento.
            </p>


            <div class="mt-6 space-y-3">

                <a href="{{ url('/pacientes/create') }}"
                   class="group flex items-center justify-between rounded-xl border border-slate-200 px-4 py-4 transition hover:border-cyan-300 hover:bg-cyan-50/40">

                    <div>
                        <div class="text-sm font-black text-slate-800">
                            Novo paciente
                        </div>

                        <div class="mt-1 text-xs text-slate-400">
                            Registrar cidadão
                        </div>
                    </div>

                    <span class="text-lg font-black text-slate-300 transition group-hover:translate-x-1 group-hover:text-cyan-600">
                        →
                    </span>

                </a>


                <a href="{{ url('/atendimentos/create') }}"
                   class="group flex items-center justify-between rounded-xl border border-slate-200 px-4 py-4 transition hover:border-cyan-300 hover:bg-cyan-50/40">

                    <div>
                        <div class="text-sm font-black text-slate-800">
                            Novo atendimento
                        </div>

                        <div class="mt-1 text-xs text-slate-400">
                            Gerar senha e iniciar fluxo
                        </div>
                    </div>

                    <span class="text-lg font-black text-slate-300 transition group-hover:translate-x-1 group-hover:text-cyan-600">
                        →
                    </span>

                </a>


                <a href="{{ url('/triagem') }}"
                   class="group flex items-center justify-between rounded-xl border border-slate-200 px-4 py-4 transition hover:border-blue-300 hover:bg-blue-50/40">

                    <div>
                        <div class="text-sm font-black text-slate-800">
                            Abrir triagem
                        </div>

                        <div class="mt-1 text-xs text-slate-400">
                            Avaliar atendimentos chamados
                        </div>
                    </div>

                    <span class="text-lg font-black text-slate-300 transition group-hover:translate-x-1 group-hover:text-blue-600">
                        →
                    </span>

                </a>

            </div>

        </div>


        {{-- Estado operacional --}}
        <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">

            <div class="text-xs font-black uppercase tracking-[0.16em] text-cyan-600">
                Monitoramento
            </div>

            <h3 class="mt-2 text-xl font-black text-slate-950">
                Estado operacional
            </h3>

            <p class="mt-2 text-sm leading-6 text-slate-500">
                Visão rápida das etapas que exigem atenção.
            </p>


            <div class="mt-6 space-y-3">

                <a href="{{ url('/fila') }}"
                   class="flex items-center justify-between rounded-2xl bg-amber-50 px-4 py-4 transition hover:bg-amber-100">

                    <div class="flex items-center gap-3">

                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-white text-amber-600 shadow-sm">
                            {{ $aguardando }}
                        </span>

                        <div>
                            <div class="text-sm font-black text-slate-800">
                                Aguardando
                            </div>

                            <div class="text-xs text-slate-500">
                                Na fila de atendimento
                            </div>
                        </div>

                    </div>

                    <span class="font-black text-amber-600">
                        →
                    </span>

                </a>


                <a href="{{ url('/triagem') }}"
                   class="flex items-center justify-between rounded-2xl bg-blue-50 px-4 py-4 transition hover:bg-blue-100">

                    <div class="flex items-center gap-3">

                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-white text-blue-600 shadow-sm">
                            {{ $emTriagem }}
                        </span>

                        <div>
                            <div class="text-sm font-black text-slate-800">
                                Em triagem
                            </div>

                            <div class="text-xs text-slate-500">
                                Aguardando avaliação
                            </div>
                        </div>

                    </div>

                    <span class="font-black text-blue-600">
                        →
                    </span>

                </a>


                <a href="{{ url('/atendimentos') }}"
                   class="flex items-center justify-between rounded-2xl bg-emerald-50 px-4 py-4 transition hover:bg-emerald-100">

                    <div class="flex items-center gap-3">

                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-white text-emerald-600 shadow-sm">
                            {{ $totalAtendimentos }}
                        </span>

                        <div>
                            <div class="text-sm font-black text-slate-800">
                                Atendimentos
                            </div>

                            <div class="text-xs text-slate-500">
                                Histórico operacional
                            </div>
                        </div>

                    </div>

                    <span class="font-black text-emerald-600">
                        →
                    </span>

                </a>

            </div>

        </div>


        {{-- Identidade --}}
        <div class="relative overflow-hidden rounded-[2rem] bg-slate-950 p-6 text-white shadow-xl">

            <div class="absolute -right-16 -top-16 h-48 w-48 rounded-full bg-cyan-400/10 blur-2xl"></div>

            <div class="relative">

                <div class="text-xs font-black uppercase tracking-[0.18em] text-cyan-400">
                    Vida|Saúde
                </div>

                <h3 class="mt-3 text-2xl font-black tracking-tight">
                    Prontuário Eletrônico
                </h3>

                <p class="mt-3 text-sm leading-7 text-slate-300">
                    Ambiente demonstrativo para gestão integrada do ciclo de atendimento em saúde.
                </p>


                <div class="mt-8 rounded-2xl border border-white/10 bg-white/5 p-4">

                    <div class="flex items-center justify-between">

                        <div>
                            <div class="text-xs font-bold uppercase tracking-[0.12em] text-slate-500">
                                Plataforma
                            </div>

                            <div class="mt-1 text-sm font-bold text-white">
                                Ambiente local
                            </div>
                        </div>

                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-400/10">
                            <span class="h-2.5 w-2.5 rounded-full bg-emerald-400 shadow-lg shadow-emerald-400/50"></span>
                        </span>

                    </div>

                </div>


                <div class="mt-6 grid grid-cols-2 gap-3">

                    <div class="rounded-xl border border-white/10 bg-white/5 p-3">
                        <div class="text-lg font-black text-cyan-300">
                            {{ $totalPacientes }}
                        </div>

                        <div class="mt-1 text-[11px] font-semibold text-slate-500">
                            Pacientes
                        </div>
                    </div>

                    <div class="rounded-xl border border-white/10 bg-white/5 p-3">
                        <div class="text-lg font-black text-emerald-300">
                            {{ $totalAtendimentos }}
                        </div>

                        <div class="mt-1 text-[11px] font-semibold text-slate-500">
                            Atendimentos
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection
