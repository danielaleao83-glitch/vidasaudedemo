@extends('layouts.app')

@section('title', 'Triagem')

@section('page_title', 'Triagem')

@section('page_subtitle', 'Avaliação inicial dos pacientes chamados')

@section('content')

<div class="space-y-6">

    {{-- =========================================================
         CABEÇALHO
    ========================================================== --}}
    <section class="relative overflow-hidden rounded-[2rem] bg-slate-950 px-6 py-7 text-white shadow-xl lg:px-8">

        <div class="absolute -right-20 -top-24 h-72 w-72 rounded-full bg-blue-500/10 blur-3xl"></div>
        <div class="absolute -bottom-20 left-1/3 h-56 w-56 rounded-full bg-cyan-400/10 blur-3xl"></div>

        <div class="relative flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">

            <div>

                <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-blue-400/20 bg-blue-400/10 px-3 py-1.5 text-xs font-bold uppercase tracking-[0.16em] text-blue-300">
                    <span class="h-2 w-2 animate-pulse rounded-full bg-blue-400"></span>
                    Avaliação assistencial
                </div>

                <h2 class="text-3xl font-black tracking-tight">
                    Central de triagem
                </h2>

                <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-300">
                    Os pacientes chamados aparecem aqui para início da avaliação
                    e registro dos dados da triagem.
                </p>

            </div>


            <div class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/5 px-5 py-4">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-400/10 text-blue-300">

                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M9 3h6M9 3v2H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2V3M9 12h6M9 16h4"/>
                    </svg>

                </div>

                <div>
                    <div class="text-2xl font-black">
                        {{ $atendimentos->count() }}
                    </div>

                    <div class="text-xs font-semibold text-slate-400">
                        em triagem
                    </div>
                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
         ESTADO VAZIO
    ========================================================== --}}
    @if($atendimentos->isEmpty())

        <section class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-sm">

            <div class="flex flex-col items-center justify-center px-6 py-16 text-center">

                <div class="flex h-20 w-20 items-center justify-center rounded-3xl bg-emerald-50 text-emerald-600">

                    <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>

                </div>

                <h2 class="mt-6 text-2xl font-black text-slate-950">
                    Nenhum paciente aguardando triagem
                </h2>

                <p class="mt-2 max-w-md text-sm leading-6 text-slate-500">
                    Quando um atendimento for chamado na fila,
                    ele aparecerá automaticamente nesta central.
                </p>

                <a
                    href="{{ route('fila.index') }}"
                    class="mt-6 inline-flex items-center gap-2 rounded-xl bg-slate-950 px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-slate-800"
                >
                    <span>←</span>
                    Abrir fila
                </a>

            </div>

        </section>


    @else


        {{-- =====================================================
             RESUMO
        ====================================================== --}}
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

            <div>

                <h3 class="text-xl font-black text-slate-950">
                    Atendimentos chamados
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    Selecione um atendimento para iniciar a triagem.
                </p>

            </div>


            <div class="inline-flex items-center gap-2 self-start rounded-full border border-slate-200 bg-white px-4 py-2 text-xs font-bold text-slate-600 shadow-sm">

                <span class="h-2 w-2 animate-pulse rounded-full bg-blue-500"></span>

                {{ $atendimentos->count() }}

                {{ $atendimentos->count() === 1 ? 'atendimento' : 'atendimentos' }}

            </div>

        </div>


        {{-- =====================================================
             CARDS DE TRIAGEM
        ====================================================== --}}
        <section class="grid grid-cols-1 gap-4">

            @foreach($atendimentos as $index => $atendimento)

                <article class="group overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-lg">

                    <div class="flex flex-col gap-6 p-5 lg:flex-row lg:items-center lg:p-6">


                        {{-- POSIÇÃO --}}
                        <div class="flex items-center gap-4 lg:w-24 lg:flex-col lg:items-center lg:justify-center lg:gap-1">

                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-100 text-sm font-black text-slate-500">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </div>

                            <span class="text-xs font-bold uppercase tracking-wider text-slate-400">
                                posição
                            </span>

                        </div>


                        {{-- SENHA --}}
                        <div class="lg:w-36">

                            <div class="text-[11px] font-black uppercase tracking-[0.16em] text-slate-400">
                                Senha
                            </div>

                            <div class="mt-1 text-4xl font-black tracking-tight text-blue-600">
                                {{ $atendimento->senha }}
                            </div>

                        </div>


                        {{-- PACIENTE --}}
                        <div class="min-w-0 flex-1">

                            <div class="text-[11px] font-black uppercase tracking-[0.16em] text-slate-400">
                                Paciente
                            </div>

                            <div class="mt-1 truncate text-lg font-black text-slate-950">
                                {{ $atendimento->paciente->nome ?? 'Paciente não informado' }}
                            </div>

                            <div class="mt-1 text-sm text-slate-500">
                                {{ ucfirst($atendimento->tipo_atendimento) }}
                            </div>

                        </div>


                        {{-- PRIORIDADE --}}
                        <div class="lg:w-36">

                            <div class="text-[11px] font-black uppercase tracking-[0.16em] text-slate-400">
                                Classificação
                            </div>

                            <div class="mt-2">

                                @if($atendimento->prioridade === 'alta')

                                    <span class="inline-flex items-center gap-2 rounded-full bg-amber-50 px-3 py-1.5 text-xs font-bold text-amber-700">
                                        <span class="h-2 w-2 rounded-full bg-amber-500"></span>
                                        Prioridade
                                    </span>

                                @elseif($atendimento->prioridade === 'normal')

                                    <span class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-3 py-1.5 text-xs font-bold text-slate-600">
                                        <span class="h-2 w-2 rounded-full bg-slate-400"></span>
                                        Normal
                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-3 py-1.5 text-xs font-bold text-slate-600">
                                        <span class="h-2 w-2 rounded-full bg-slate-400"></span>
                                        {{ ucfirst($atendimento->prioridade) }}
                                    </span>

                                @endif

                            </div>

                        </div>


                        {{-- STATUS --}}
                        <div class="lg:w-32">

                            <div class="text-[11px] font-black uppercase tracking-[0.16em] text-slate-400">
                                Status
                            </div>

                            <div class="mt-2">

                                <span class="inline-flex items-center gap-2 rounded-full bg-blue-50 px-3 py-1.5 text-xs font-bold text-blue-700">
                                    <span class="h-2 w-2 animate-pulse rounded-full bg-blue-500"></span>
                                    Chamando
                                </span>

                            </div>

                        </div>


                        {{-- AÇÃO --}}
                        <div class="lg:w-40 lg:text-right">

                            <a
                                href="{{ route('triagem.create', ['atendimento' => $atendimento->id]) }}"
                                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-black text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 lg:w-auto"
                            >

                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 5h6M9 9h6M9 13h4M6 3h12a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Z"/>
                                </svg>

                                Iniciar triagem

                            </a>

                        </div>

                    </div>


                    {{-- Barra visual --}}
                    <div class="h-1 w-full bg-gradient-to-r from-blue-500 via-cyan-400 to-transparent opacity-0 transition group-hover:opacity-100"></div>

                </article>

            @endforeach

        </section>


        {{-- =====================================================
             PRIVACIDADE
        ====================================================== --}}
        <div class="flex items-start gap-3 rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4">

            <div class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white text-slate-500 shadow-sm">

                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                          d="M12 15v2m-6 4h12a2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2Zm3-9V7a3 3 0 1 1 6 0v2"/>
                </svg>

            </div>

            <div>

                <div class="text-sm font-bold text-slate-700">
                    Informação protegida
                </div>

                <p class="mt-1 text-xs leading-5 text-slate-500">
                    A central apresenta somente as informações necessárias
                    para a equipe realizar a triagem. Dados pessoais adicionais
                    não são exibidos nesta etapa.
                </p>

            </div>

        </div>

    @endif

</div>

@endsection
