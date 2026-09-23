<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Vida|Saúde - Prontuário Eletrônico')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100 text-slate-900">

    <div class="min-h-screen flex">

        <aside class="w-72 bg-slate-950 text-white hidden lg:flex lg:flex-col">

            <div class="px-6 py-6 border-b border-slate-800">
                <div class="text-xl font-bold">
                    Vida<span class="text-cyan-400">|</span>Saúde
                </div>

                <div class="text-xs uppercase tracking-wider text-slate-400 mt-1">
                    Prontuário Eletrônico
                </div>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-2">

                <a href="{{ url('/') }}"
                   class="block rounded-xl px-4 py-3 hover:bg-slate-800 transition">
                    Dashboard
                </a>

                <a href="{{ url('/pacientes') }}"
                   class="block rounded-xl px-4 py-3 hover:bg-slate-800 transition">
                    Pacientes
                </a>

                <a href="{{ url('/atendimentos') }}"
                   class="block rounded-xl px-4 py-3 hover:bg-slate-800 transition">
                    Atendimentos
                </a>

                <a href="{{ url('/fila') }}"
                   class="block rounded-xl px-4 py-3 hover:bg-slate-800 transition">
                    Fila
                </a>

                <a href="{{ url('/triagem') }}"
                   class="block rounded-xl px-4 py-3 hover:bg-slate-800 transition">
                    Triagem
                </a>

                <a href="{{ route('prontuario.index') }}"
                   class="block rounded-xl px-4 py-3 hover:bg-slate-800 transition">
                    Prontuário
                </a>

            </nav>

            <div class="border-t border-slate-800 p-4">
                <div class="text-sm font-semibold">
                    Ambiente de demonstração
                </div>

                <div class="text-xs text-slate-500 mt-1">
                    Vida|Saúde
                </div>
            </div>

        </aside>

        <main class="flex-1 min-w-0">

            <header class="bg-white border-b border-slate-200 px-6 py-4">

                <div class="flex items-center justify-between gap-6">

                    <div class="min-w-0">
                        <h1 class="text-xl font-bold">
                            @yield('page_title', 'Dashboard')
                        </h1>

                        <p class="text-sm text-slate-500">
                            @yield('page_subtitle', 'Gestão integrada do atendimento em Saúde')
                        </p>
                    </div>

                    <div class="flex items-center gap-4 shrink-0">

                        <div class="text-right">
                            <div class="text-sm font-semibold text-slate-800">
                                {{ auth()->user()->name }}
                            </div>

                            <div class="text-xs text-slate-500">
                                {{ auth()->user()->email }}
                            </div>
                        </div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button
                                type="submit"
                                class="inline-flex items-center gap-2 rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white hover:bg-slate-800 transition"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    class="h-4 w-4"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3-3H9m0 0l3-3m-3 3l3 3"
                                    />
                                </svg>

                                Sair
                            </button>
                        </form>

                    </div>

                </div>

            </header>

            @if(session('success'))
                <div class="mx-6 mt-6 rounded-xl bg-emerald-50 border border-emerald-200 px-4 py-3 text-emerald-800">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mx-6 mt-6 rounded-xl bg-red-50 border border-red-200 px-4 py-3 text-red-800">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('status'))
                <div class="mx-6 mt-6 rounded-xl bg-cyan-50 border border-cyan-200 px-4 py-3 text-cyan-800">
                    {{ session('status') }}
                </div>
            @endif

            <section class="p-6">
                @yield('content')
            </section>

        </main>

    </div>

</body>
</html>

