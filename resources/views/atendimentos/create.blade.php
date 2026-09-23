@extends('layouts.app')

@section('title', 'Novo Atendimento')
@section('page_title', 'Novo Atendimento')
@section('page_subtitle', 'Registrar um novo atendimento para o paciente')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="mb-6">
        <a
            href="{{ route('atendimentos.index') }}"
            class="text-sm font-medium text-blue-600 hover:text-blue-800"
        >
            ← Voltar para atendimentos
        </a>
    </div>

    @if($errors->any())

        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-red-800">

            <div class="font-semibold">
                Não foi possível registrar o atendimento.
            </div>

            <ul class="mt-2 list-disc space-y-1 pl-5 text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif

    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">

        <form
            method="POST"
            action="{{ route('atendimentos.store') }}"
            class="space-y-6"
        >

            @csrf

            <div>
                <label
                    for="paciente_id"
                    class="mb-2 block text-sm font-semibold text-slate-700"
                >
                    Paciente
                </label>

                <select
                    id="paciente_id"
                    name="paciente_id"
                    required
                    class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                >

                    <option value="">
                        Selecione o paciente
                    </option>

                    @foreach($pacientes as $paciente)

                        <option
                            value="{{ $paciente->id }}"
                            @selected(old('paciente_id') == $paciente->id)
                        >
                            {{ $paciente->nome }}

                            @if($paciente->cns)
                                — CNS: {{ $paciente->cns }}
                            @endif
                        </option>

                    @endforeach

                </select>
            </div>

            <div class="grid gap-6 md:grid-cols-2">

                <div>
                    <label
                        for="data_atendimento"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Data do atendimento
                    </label>

                    <input
                        type="date"
                        id="data_atendimento"
                        name="data_atendimento"
                        value="{{ old('data_atendimento', now()->format('Y-m-d')) }}"
                        required
                        class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >
                </div>

                <div>
                    <label
                        for="tipo_atendimento"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Tipo de atendimento
                    </label>

                    <select
                        id="tipo_atendimento"
                        name="tipo_atendimento"
                        required
                        class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                        <option value="">
                            Selecione o tipo
                        </option>

                        <option value="clinico" @selected(old('tipo_atendimento') === 'clinico')>
                            Clínico
                        </option>

                        <option value="enfermagem" @selected(old('tipo_atendimento') === 'enfermagem')>
                            Enfermagem
                        </option>

                        <option value="psicologico" @selected(old('tipo_atendimento') === 'psicologico')>
                            Psicológico
                        </option>

                        <option value="social" @selected(old('tipo_atendimento') === 'social')>
                            Social
                        </option>

                        <option value="odontologico" @selected(old('tipo_atendimento') === 'odontologico')>
                            Odontológico
                        </option>

                        <option value="domiciliar" @selected(old('tipo_atendimento') === 'domiciliar')>
                            Domiciliar
                        </option>

                        <option value="teleatendimento" @selected(old('tipo_atendimento') === 'teleatendimento')>
                            Teleatendimento
                        </option>

                        <option value="administrativo" @selected(old('tipo_atendimento') === 'administrativo')>
                            Administrativo
                        </option>

                    </select>
                </div>

            </div>

            <div>
                <label
                    for="prioridade"
                    class="mb-2 block text-sm font-semibold text-slate-700"
                >
                    Prioridade
                </label>

                <select
                    id="prioridade"
                    name="prioridade"
                    required
                    class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                >

                    <option value="normal" @selected(old('prioridade', 'normal') === 'normal')>
                        Normal
                    </option>

                    <option value="baixa" @selected(old('prioridade') === 'baixa')>
                        Baixa
                    </option>

                    <option value="alta" @selected(old('prioridade') === 'alta')>
                        Alta
                    </option>

                </select>
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
                    placeholder="Informações adicionais sobre o atendimento..."
                    class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                >{{ old('observacoes') }}</textarea>
            </div>

            <div class="rounded-lg border border-blue-100 bg-blue-50 p-4">

                <div class="text-sm font-semibold text-blue-900">
                    Senha e fila
                </div>

                <p class="mt-1 text-sm text-blue-700">
                    A senha será gerada automaticamente e o atendimento será
                    encaminhado para a fila com status
                    <strong>aguardando</strong>.
                </p>

            </div>

            <div class="flex items-center justify-end gap-3 border-t border-slate-200 pt-6">

                <a
                    href="{{ route('atendimentos.index') }}"
                    class="rounded-lg border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50"
                >
                    Cancelar
                </a>

                <button
                    type="submit"
                    class="rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700"
                >
                    Registrar atendimento
                </button>

            </div>

        </form>

    </div>

</div>

@endsection
