<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vida|Saúde — Criar conta</title>
    <style>
        * { box-sizing: border-box; }

        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
            overflow: hidden;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: #020914;
            color: #eef7ff;
        }

        .page {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background:
                radial-gradient(circle at 25% 50%, rgba(23,142,190,.13), transparent 34%),
                radial-gradient(circle at 75% 50%, rgba(23,142,190,.08), transparent 34%),
                linear-gradient(135deg, #020914 0%, #061727 50%, #020914 100%);
        }

        .brand, .form {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .brand {
            text-align: center;
            border-right: 1px solid rgba(115,190,220,.10);
        }

        .brand-inner, .box {
            width: min(470px, 100%);
        }

        .brand-name {
            font-size: 52px;
            font-weight: 800;
            letter-spacing: -3px;
            margin-bottom: 20px;
        }

        .vida { color: #f5f9fc; }
        .sep { color: #43bce9; }
        .saude { color: #8edfff; }

        .eyebrow {
            display: inline-block;
            padding: 7px 12px;
            border: 1px solid rgba(90,193,229,.16);
            border-radius: 999px;
            background: rgba(8,35,52,.45);
            color: #82cfe9;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.4px;
            text-transform: uppercase;
        }

        .brand h1 {
            margin: 25px 0 18px;
            font-size: 48px;
            line-height: 1.05;
            letter-spacing: -2.5px;
        }

        .brand p {
            color: #8aa5b5;
            font-size: 15px;
            line-height: 1.7;
        }

        .box {
            width: min(460px, 100%);
        }

        h2 {
            margin: 0;
            text-align: center;
            font-size: 40px;
            letter-spacing: -1.5px;
        }

        .subtitle {
            margin: 12px 0 26px;
            text-align: center;
            color: #7893a3;
        }

        .error {
            margin-bottom: 16px;
            padding: 12px;
            border: 1px solid rgba(239,91,91,.24);
            border-radius: 9px;
            background: rgba(130,25,32,.15);
            color: #ff9696;
        }

        .field { margin-bottom: 16px; }

        label {
            display: block;
            margin-bottom: 8px;
            color: #b9ced9;
            font-size: 14px;
            font-weight: 650;
        }

        input {
            width: 100%;
            height: 52px;
            border: 1px solid rgba(130,171,190,.16);
            border-radius: 9px;
            padding: 0 15px;
            outline: none;
            background: rgba(7,24,38,.80);
            color: #f1f8fb;
            font-size: 16px;
        }

        input:focus {
            border-color: rgba(63,190,232,.65);
            box-shadow: 0 0 0 3px rgba(63,190,232,.07);
        }

        .rules {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6px 15px;
            margin: 8px 0 18px;
            color: #607b8b;
            font-size: 12px;
        }

        .submit {
            width: 100%;
            height: 54px;
            border: 0;
            border-radius: 9px;
            background: linear-gradient(135deg, #1596c9, #0b6f9b);
            color: #fff;
            font-size: 17px;
            font-weight: 750;
            cursor: pointer;
        }

        .back {
            margin-top: 18px;
            text-align: center;
            color: #607b8a;
        }

        a {
            color: #62c9ed;
            text-decoration: none;
        }

        .security {
            margin-top: 20px;
            text-align: center;
            color: #4d6877;
            font-size: 13px;
        }

        @media (max-width: 900px) {
            html, body { overflow: auto; }

            .page {
                grid-template-columns: 1fr;
            }

            .brand {
                min-height: 36vh;
                border-right: 0;
                border-bottom: 1px solid rgba(115,190,220,.10);
            }

            .form {
                min-height: 64vh;
            }
        }
    </style>
</head>
<body>
<div class="page">

    <section class="brand">
        <div class="brand-inner">
            <div class="brand-name">
                <span class="vida">Vida</span><span class="sep">|</span><span class="saude">Saúde</span>
            </div>

            <div class="eyebrow">Tecnologia em saúde</div>

            <h1>
                Uma saúde mais
                <span style="color:#53c6ed;">conectada.</span>
            </h1>

            <p>
                Crie seu acesso para utilizar a plataforma Vida|Saúde
                e acompanhar as funcionalidades do ambiente demonstrativo.
            </p>
        </div>
    </section>

    <section class="form">
        <div class="box">

            <h2>Criar conta</h2>

            <p class="subtitle">
                Cadastre seus dados para acessar o sistema
            </p>

            @if ($errors->any())
                <div class="error">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('register.store') }}">
                @csrf

                <div class="field">
                    <label for="name">Nome</label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        autocomplete="name"
                        required
                        autofocus
                        placeholder="Seu nome completo"
                    >
                </div>

                <div class="field">
                    <label for="email">E-mail</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required
                        placeholder="seu.email@exemplo.com"
                    >
                </div>

                <div class="field">
                    <label for="password">Senha</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        autocomplete="new-password"
                        required
                        placeholder="Crie sua senha"
                    >
                </div>

                <div class="rules">
                    <div>6 a 8 caracteres</div>
                    <div>1 letra maiúscula</div>
                    <div>1 número</div>
                    <div>1 caractere especial</div>
                </div>

                <div class="field">
                    <label for="password_confirmation">Confirmar senha</label>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        autocomplete="new-password"
                        required
                        placeholder="Repita sua senha"
                    >
                </div>

                <button type="submit" class="submit">
                    Criar conta
                </button>
            </form>

            <div class="back">
                Já possui acesso?
                <a href="{{ route('login') }}">Voltar para o login</a>
            </div>

            <div class="security">
                Ambiente protegido para informações de saúde
            </div>

        </div>
    </section>

</div>
</body>
</html>
