@extends('layouts.app')

@section('title', 'Novo paciente')

@section('content')
<div class="mx-auto max-w-5xl space-y-6">

    {{-- Cabeçalho --}}
    <div>
        <a
            href="{{ route('pacientes.index') }}"
            class="text-sm text-cyan-400 hover:text-cyan-300"
        >
            ← Voltar para pacientes
        </a>

        <div class="mt-4">
            <p class="text-sm font-medium text-cyan-400">Cadastro assistencial</p>
            <h1 class="text-2xl font-bold text-white">Novo paciente</h1>
            <p class="mt-1 text-sm text-slate-400">
                Informe os dados de identificação do cidadão.
            </p>
        </div>
    </div>

    {{-- Erros --}}
    @if($errors->any())
        <div class="rounded-lg border border-red-500/30 bg-red-500/10 p-4">
            <p class="font-semibold text-red-300">
                Verifique os dados informados.
            </p>

            <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-red-300">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('pacientes.store') }}"
        method="POST"
        class="space-y-6"
    >
        @csrf

        {{-- Identificação --}}
        <section class="rounded-xl border border-slate-800 bg-slate-900/70 shadow-xl">

            <div class="border-b border-slate-800 px-6 py-5">
                <h2 class="font-semibold text-white">Identificação</h2>
                <p class="mt-1 text-xs text-slate-500">
                    Informações principais para identificação do cidadão.
                </p>
            </div>

            <div class="grid gap-5 p-6 md:grid-cols-2">

                <div class="md:col-span-2">
                    <label class="mb-2 block text-sm font-medium text-slate-300">
                        Nome completo *
                    </label>

                    <input
                        type="text"
                        name="nome"
                        value="{{ old('nome') }}"
                        required
                        maxlength="255"
                        class="w-full rounded-lg border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none transition placeholder:text-slate-600 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20"
                        placeholder="Nome completo"
                    >
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-300">
                        Nome social
                    </label>

                    <input
                        type="text"
                        name="nome_social"
                        value="{{ old('nome_social') }}"
                        maxlength="255"
                        class="w-full rounded-lg border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20"
                    >
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-300">
                        Data de nascimento
                    </label>

                    <input
                        type="date"
                        name="data_nascimento"
                        value="{{ old('data_nascimento') }}"
                        class="w-full rounded-lg border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20"
                    >
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-300">
                        CPF
                    </label>

                    <input
                        type="text"
                        name="cpf"
                        value="{{ old('cpf') }}"
                        inputmode="numeric"
                        maxlength="11"
                        placeholder="Somente números"
                        class="w-full rounded-lg border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20"
                    >
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-300">
                        CNS
                    </label>

                    <input
                        type="text"
                        name="cns"
                        value="{{ old('cns') }}"
                        inputmode="numeric"
                        maxlength="15"
                        placeholder="Cartão Nacional de Saúde"
                        class="w-full rounded-lg border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20"
                    >
                </div>

            </div>
        </section>

        {{-- Filiação e contato --}}
        <section class="rounded-xl border border-slate-800 bg-slate-900/70 shadow-xl">

            <div class="border-b border-slate-800 px-6 py-5">
                <h2 class="font-semibold text-white">Filiação e contato</h2>
                <p class="mt-1 text-xs text-slate-500">
                    Dados complementares de identificação e comunicação.
                </p>
            </div>

            <div class="grid gap-5 p-6 md:grid-cols-2">

                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-300">
                        Nome da mãe
                    </label>

                    <input
                        type="text"
                        name="nome_mae"
                        value="{{ old('nome_mae') }}"
                        maxlength="255"
                        class="w-full rounded-lg border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20"
                    >
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-300">
                        Nome do pai
                    </label>

                    <input
                        type="text"
                        name="nome_pai"
                        value="{{ old('nome_pai') }}"
                        maxlength="255"
                        class="w-full rounded-lg border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20"
                    >
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-300">
                        Telefone
                    </label>

                    <input
                        type="text"
                        name="telefone"
                        value="{{ old('telefone') }}"
                        maxlength="20"
                        class="w-full rounded-lg border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20"
                    >
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-300">
                        E-mail
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        maxlength="255"
                        class="w-full rounded-lg border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20"
                    >
                </div>

            </div>
        </section>

        {{-- Dados e-SUS --}}
        <section class="rounded-xl border border-slate-800 bg-slate-900/70 shadow-xl">

            <div class="border-b border-slate-800 px-6 py-5">
                <h2 class="font-semibold text-white">Dados complementares</h2>
                <p class="mt-1 text-xs text-slate-500">
                    Informações estruturadas para integração e-SUS.
                </p>
            </div>

            <div class="grid gap-5 p-6 md:grid-cols-3">

                {{-- Sexo --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-300">
                        Sexo
                    </label>

                    <select
                        name="sexo"
                        class="w-full rounded-lg border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20"
                    >
                        <option value="">Selecione</option>
                        <option value="1" @selected(old('sexo') === '1')>
                            Masculino
                        </option>
                        <option value="2" @selected(old('sexo') === '2')>
                            Feminino
                        </option>
                        <option value="3" @selected(old('sexo') === '3')>
                            Indeterminado
                        </option>
                    </select>
                </div>

                {{-- Raça/cor --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-300">
                        Raça/cor
                    </label>

                    <select
                        name="raca_cor"
                        class="w-full rounded-lg border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20"
                    >
                        <option value="">Selecione</option>
                        <option value="1" @selected(old('raca_cor') === '1')>
                            Branca
                        </option>
                        <option value="2" @selected(old('raca_cor') === '2')>
                            Preta
                        </option>
                        <option value="3" @selected(old('raca_cor') === '3')>
                            Parda
                        </option>
                        <option value="4" @selected(old('raca_cor') === '4')>
                            Amarela
                        </option>
                        <option value="5" @selected(old('raca_cor') === '5')>
                            Indígena
                        </option>
                    </select>
                </div>

                {{-- Estado civil --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-300">
                        Estado civil
                    </label>

                    <select
                        name="estado_civil"
                        class="w-full rounded-lg border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20"
                    >
                        <option value="">Selecione</option>
                        <option value="1" @selected(old('estado_civil') === '1')>
                            Solteiro(a)
                        </option>
                        <option value="2" @selected(old('estado_civil') === '2')>
                            Casado(a)
                        </option>
                        <option value="3" @selected(old('estado_civil') === '3')>
                            Divorciado(a)
                        </option>
                        <option value="4" @selected(old('estado_civil') === '4')>
                            Separado(a)
                        </option>
                        <option value="5" @selected(old('estado_civil') === '5')>
                            Viúvo(a)
                        </option>
                    </select>
                </div>

                {{-- Município --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-300">
                        Município de nascimento
                    </label>

                    <input
                        type="text"
                        name="codigo_ibge_municipio_nascimento"
                        value="{{ old('codigo_ibge_municipio_nascimento') }}"
                        inputmode="numeric"
                        maxlength="7"
                        placeholder="Código IBGE"
                        class="w-full rounded-lg border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20"
                    >
                </div>

                {{-- Microárea --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-300">
                        Microárea
                    </label>

                    <input
                        type="text"
                        name="microarea"
                        value="{{ old('microarea') }}"
                        maxlength="10"
                        class="w-full rounded-lg border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20"
                    >
                </div>

            </div>
        </section>

        {{-- Responsável familiar --}}
        <section class="rounded-xl border border-slate-800 bg-slate-900/70 shadow-xl">

            <div class="border-b border-slate-800 px-6 py-5">
                <h2 class="font-semibold text-white">Responsável familiar</h2>
            </div>

            <div class="grid gap-5 p-6 md:grid-cols-2">

                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-300">
                        CPF do responsável
                    </label>

                    <input
                        type="text"
                        name="cpf_responsavel_familiar"
                        value="{{ old('cpf_responsavel_familiar') }}"
                        inputmode="numeric"
                        maxlength="11"
                        class="w-full rounded-lg border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20"
                    >
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-300">
                        CNS do responsável
                    </label>

                    <input
                        type="text"
                        name="cns_responsavel_familiar"
                        value="{{ old('cns_responsavel_familiar') }}"
                        inputmode="numeric"
                        maxlength="15"
                        class="w-full rounded-lg border border-slate-700 bg-slate-950 px-4 py-3 text-white outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20"
                    >
                </div>

            </div>
        </section>

        {{-- Ações --}}
        <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

            <a
                href="{{ route('pacientes.index') }}"
                class="inline-flex justify-center rounded-lg border border-slate-700 px-6 py-3 text-sm font-semibold text-slate-300 hover:bg-slate-800"
            >
                Cancelar
            </a>

            <button
                type="submit"
                class="inline-flex justify-center rounded-lg bg-cyan-500 px-6 py-3 text-sm font-semibold text-slate-950 shadow-lg shadow-cyan-500/20 hover:bg-cyan-400"
            >
                Salvar paciente
            </button>

        </div>

    </form>
</div>
@endsection