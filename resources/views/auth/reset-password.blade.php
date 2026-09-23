<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Redefinir senha — Vida|Saúde</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100%;
            font-family: Arial, Helvetica, sans-serif;
            background:
                radial-gradient(circle at 15% 20%, rgba(36, 107, 253, .16), transparent 35%),
                radial-gradient(circle at 85% 80%, rgba(0, 196, 180, .10), transparent 35%),
                #071525;
            color: #fff;
        }

        * {
            box-sizing: border-box;
        }

        .page {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
            overflow: hidden;
        }

        .brand-panel {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px;
            background:
                linear-gradient(
                    145deg,
                    rgba(8, 28, 49, .96),
                    rgba(5, 20, 36, .98)
                );
        }

        .brand-content {
            max-width: 560px;
            position: relative;
            z-index: 2;
        }

        .brand {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -1px;
            margin-bottom: 12px;
        }

        .brand span {
            color: #55d6c8;
        }

        .eyebrow {
            color: #7bded4;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 26px;
        }

        .brand-title {
            margin: 0;
            font-size: clamp(34px, 4vw, 54px);
            line-height: 1.08;
            letter-spacing: -1.8px;
        }

        .brand-description {
            margin: 25px 0 0;
            color: #aab9c9;
            font-size: 16px;
            line-height: 1.7;
            max-width: 500px;
        }

        .heart-visual {
            position: absolute;
            right: 8%;
            bottom: 5%;
            width: 190px;
            opacity: .42;
            pointer-events: none;
        }

        .heart {
            width: 120px;
            height: 120px;
            margin: auto;
            transform: rotate(-45deg);
            background: linear-gradient(145deg, #58d9cc, #2379ff);
            border-radius: 20px;
            box-shadow:
                0 25px 60px rgba(30, 128, 255, .35),
                inset -10px -10px 25px rgba(0, 0, 0, .18),
                inset 10px 10px 25px rgba(255, 255, 255, .12);
        }

        .heart::before,
        .heart::after {
            content: "";
            position: absolute;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: inherit;
        }

        .heart::before {
            top: -60px;
            left: 0;
        }

        .heart::after {
            top: 0;
            left: 60px;
        }

        .login-panel {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            background: rgba(7, 21, 37, .72);
        }

        .login-box {
            width: min(420px, 100%);
        }

        .login-title {
            margin: 0;
            font-size: 34px;
            line-height: 1.15;
            letter-spacing: -1px;
        }

        .login-subtitle {
            margin: 10px 0 30px;
            color: #91a4b8;
            font-size: 15px;
        }

        .status,
        .error {
            padding: 13px 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
            line-height: 1.5;
        }

        .status {
            color: #b8fff7;
            background: rgba(42, 190, 171, .12);
            border: 1px solid rgba(85, 214, 200, .25);
        }

        .error {
            color: #ffd0d0;
            background: rgba(255, 70, 70, .10);
            border: 1px solid rgba(255, 100, 100, .25);
        }

        .field {
            margin-bottom: 22px;
        }

        .field label {
            display: block;
            margin-bottom: 9px;
            color: #dce6ef;
            font-size: 13px;
            font-weight: 600;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap input {
            width: 100%;
            height: 52px;
            padding: 0 16px;
            border: 1px solid rgba(155, 178, 201, .20);
            border-radius: 10px;
            outline: none;
            background: rgba(255, 255, 255, .055);
            color: #fff;
            font-size: 15px;
            transition: .2s ease;
        }

        .input-wrap input::placeholder {
            color: #61758a;
        }

        .input-wrap input:focus {
            border-color: rgba(85, 214, 200, .65);
            box-shadow: 0 0 0 3px rgba(85, 214, 200, .08);
        }

        .password-rules {
            margin-top: 9px;
            color: #74899d;
            font-size: 11px;
            line-height: 1.6;
        }

        .submit {
            width: 100%;
            height: 52px;
            border: 0;
            border-radius: 10px;
            cursor: pointer;
            color: #06131f;
            background: linear-gradient(135deg, #61ddd0, #36bfc0);
            font-size: 15px;
            font-weight: 700;
            transition: .2s ease;
        }

        .submit:hover {
            transform: translateY(-1px);
            filter: brightness(1.05);
        }

        .back {
            display: block;
            margin-top: 24px;
            text-align: center;
            color: #8edfd6;
            text-decoration: none;
            font-size: 14px;
        }

        .back:hover {
            text-decoration: underline;
        }

        @media (max-width: 800px) {
            .page {
                grid-template-columns: 1fr;
                overflow: auto;
            }

            .brand-panel {
                display: none;
            }

            .login-panel {
                min-height: 100vh;
                padding: 30px 22px;
            }
        }
    </style>
</head>

<body>

<div class="page">

    <section class="brand-panel">

        <div class="brand-content">

            <div class="brand">
                Vida<span>|</span>Saúde
            </div>

            <div class="eyebrow">
                Tecnologia em saúde
            </div>

            <h1 class="brand-title">
                Uma nova senha para continuar cuidando.
            </h1>

            <p class="brand-description">
                Redefina sua senha com segurança e volte a acessar
                sua plataforma de gestão assistencial e prontuário eletrônico.
            </p>

        </div>

        <div class="heart-visual">
            <div class="heart"></div>
        </div>

    </section>

    <section class="login-panel">

        <div class="login-box">

            <h2 class="login-title">
                Redefinir senha
            </h2>

            <p class="login-subtitle">
                Informe sua nova senha para recuperar o acesso.
            </p>

            @if ($errors->any())
                <div class="error">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="field">

                    <label for="email">
                        E-mail
                    </label>

                    <div class="input-wrap">
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email', $email) }}"
                            autocomplete="email"
                            required
                            autofocus
                            placeholder="seu.email@exemplo.com"
                        >
                    </div>

                </div>

                <div class="field">

                    <label for="password">
                        Nova senha
                    </label>

                    <div class="input-wrap">
                        <input
                            id="password"
                            type="password"
                            name="password"
                            autocomplete="new-password"
                            required
                            placeholder="Digite sua nova senha"
                        >
                    </div>

                    <div class="password-rules">
                        6–8 caracteres · 1 letra maiúscula ·
                        1 número · 1 caractere especial
                    </div>

                </div>

                <div class="field">

                    <label for="password_confirmation">
                        Confirmar nova senha
                    </label>

                    <div class="input-wrap">
                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            autocomplete="new-password"
                            required
                            placeholder="Repita sua nova senha"
                        >
                    </div>

                </div>

                <button type="submit" class="submit">
                    Redefinir senha
                </button>

            </form>

            <a href="{{ route('login') }}" class="back">
                ← Voltar para o login
            </a>

        </div>

    </section>

</div>

</body>
</html>