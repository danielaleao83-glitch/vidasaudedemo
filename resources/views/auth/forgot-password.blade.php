<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Recuperar senha — Vida|Saúde</title>

    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            overflow: hidden;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system,
                BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: #020914;
            color: #eef7ff;
        }

        body {
            min-height: 100vh;
        }

        .page {
            width: 100%;
            height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;

            background:
                radial-gradient(
                    circle at 25% 50%,
                    rgba(23, 142, 190, .13),
                    transparent 34%
                ),
                radial-gradient(
                    circle at 75% 50%,
                    rgba(23, 142, 190, .08),
                    transparent 34%
                ),
                linear-gradient(
                    135deg,
                    #020914 0%,
                    #061727 50%,
                    #020914 100%
                );
        }

        /* =========================
           LADO ESQUERDO
           ========================= */

        .brand-panel {
            position: relative;
            width: 100%;
            height: 100%;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 40px;
            text-align: center;

            border-right: 1px solid rgba(115, 190, 220, .10);

            overflow: hidden;
        }

        .brand-content {
            position: relative;
            z-index: 3;

            width: min(560px, 100%);

            display: flex;
            flex-direction: column;
            align-items: center;

            transform: translateY(-5px);
        }

        .brand-name {
            display: flex;
            align-items: center;
            justify-content: center;

            gap: 13px;
            margin-bottom: 21px;
        }

        .brand-name-text {
            font-size: clamp(42px, 4vw, 56px);
            line-height: 1;
            font-weight: 800;
            letter-spacing: -3px;
        }

        .vida {
            color: #f5f9fc;
        }

        .separator {
            color: #43bce9;
            margin: 0 2px;
        }

        .saude {
            color: #8edfff;
        }

        .brand-mark {
            width: 45px;
            height: 45px;

            display: grid;
            place-items: center;

            filter:
                drop-shadow(
                    0 0 14px rgba(54, 190, 235, .18)
                );
        }

        .brand-mark svg {
            width: 45px;
            height: 45px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 8px;

            padding: 7px 12px;
            margin-bottom: 20px;

            border: 1px solid rgba(90, 193, 229, .16);
            border-radius: 999px;

            background: rgba(8, 35, 52, .45);

            color: #82cfe9;

            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.6px;
            text-transform: uppercase;
        }

        .eyebrow-dot {
            width: 5px;
            height: 5px;

            border-radius: 50%;

            background: #40c4ed;

            box-shadow:
                0 0 12px rgba(64, 196, 237, .8);
        }

        .brand-title {
            max-width: 550px;

            margin: 0;

            color: #f3f8fb;

            font-size: clamp(40px, 4vw, 56px);
            line-height: 1.04;

            font-weight: 750;
            letter-spacing: -3px;
        }

        .brand-title span {
            color: #53c6ed;
        }

        .brand-description {
            max-width: 475px;

            margin: 20px auto 0;

            color: #8aa5b5;

            font-size: 15px;
            line-height: 1.7;
        }

        .brand-footer {
            display: flex;
            align-items: center;
            justify-content: center;

            gap: 13px;

            margin-top: 25px;

            color: #617d8d;

            font-size: 10px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .brand-footer-line {
            width: 38px;
            height: 1px;

            background: rgba(73, 190, 229, .35);
        }

        /* =========================
           CORAÇÃO 3D
           ========================= */

        .heart-visual {
            position: absolute;

            left: 50%;
            bottom: 4%;

            width: 190px;
            height: 190px;

            transform: translateX(-50%);

            opacity: .48;

            pointer-events: none;
        }

        .heart-glow {
            position: absolute;

            inset: 10px;

            border-radius: 50%;

            background:
                radial-gradient(
                    circle,
                    rgba(50, 190, 235, .17),
                    transparent 68%
                );

            filter: blur(20px);
        }

        .heart {
            position: absolute;

            inset: 40px;

            transform: rotate(-45deg);

            border-radius: 28% 0 42% 0;

            background:
                linear-gradient(
                    145deg,
                    #a7eaff 0%,
                    #43bce8 22%,
                    #167fa8 53%,
                    #075271 78%,
                    #032b42 100%
                );

            box-shadow:
                inset 7px 7px 13px rgba(255,255,255,.22),
                inset -10px -12px 18px rgba(0,0,0,.38),
                0 20px 40px rgba(0,0,0,.45),
                0 0 35px rgba(40,180,230,.16);
        }

        .heart::before,
        .heart::after {
            content: "";

            position: absolute;

            width: 100%;
            height: 100%;

            border-radius: 50%;

            background: inherit;
        }

        .heart::before {
            top: -50%;
            left: 0;
        }

        .heart::after {
            top: 0;
            left: 50%;
        }

        .heart-highlight {
            position: absolute;

            top: 58px;
            left: 74px;

            width: 22px;
            height: 48px;

            border-radius: 50%;

            transform: rotate(45deg);

            background:
                linear-gradient(
                    180deg,
                    rgba(255,255,255,.42),
                    rgba(255,255,255,0)
                );

            filter: blur(2px);
        }

        /* =========================
           RECUPERAÇÃO
           ========================= */

        .login-panel {
            width: 100%;
            height: 100%;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 40px;

            text-align: center;
        }

        .login-box {
            width: min(470px, 100%);

            text-align: left;
        }

        .login-title {
            margin: 0;

            text-align: center;

            color: #f3f8fb;

            font-size: 42px;
            line-height: 1.05;

            letter-spacing: -1.5px;
        }

        .login-subtitle {
            margin: 13px 0 28px;

            text-align: center;

            color: #7893a3;

            font-size: 17px;
            line-height: 1.5;
        }

        .status {
            margin-bottom: 18px;

            padding: 12px 14px;

            border: 1px solid rgba(64, 196, 237, .22);
            border-radius: 9px;

            background: rgba(13, 82, 110, .18);

            color: #8edfff;

            font-size: 14px;
            line-height: 1.5;

            text-align: left;
        }

        .error {
            margin-bottom: 18px;

            padding: 12px 14px;

            border: 1px solid rgba(239,91,91,.24);
            border-radius: 9px;

            background: rgba(130,25,32,.15);

            color: #ff9696;

            font-size: 14px;
            line-height: 1.5;

            text-align: left;
        }

        .field {
            margin-bottom: 19px;
        }

        .field label {
            display: block;

            margin-bottom: 9px;

            color: #b9ced9;

            font-size: 15px;
            font-weight: 650;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap input {
            width: 100%;
            height: 54px;

            border: 1px solid rgba(130,171,190,.16);
            border-radius: 9px;

            outline: none;

            padding: 0 17px;

            background: rgba(7,24,38,.80);

            color: #f1f8fb;

            font-size: 17px;

            transition: .2s ease;
        }

        .input-wrap input::placeholder {
            color: #4e6979;
        }

        .input-wrap input:focus {
            border-color: rgba(63,190,232,.65);

            box-shadow:
                0 0 0 3px rgba(63,190,232,.07);
        }

        .helper-text {
            margin-top: 10px;

            color: #607b8b;

            font-size: 13px;
            line-height: 1.5;
        }

        .submit {
            width: 100%;
            height: 54px;

            border: 0;
            border-radius: 9px;

            background:
                linear-gradient(
                    135deg,
                    #1596c9,
                    #0b6f9b
                );

            color: #fff;

            font-size: 17px;
            font-weight: 750;

            cursor: pointer;

            box-shadow:
                0 10px 28px rgba(0,128,180,.18);

            transition: .2s ease;
        }

        .submit:hover {
            transform: translateY(-1px);

            box-shadow:
                0 13px 32px rgba(0,151,209,.25);
        }

        .back {
            display: flex;
            align-items: center;
            justify-content: center;

            margin-top: 20px;

            color: #62c9ed;

            font-size: 15px;

            text-decoration: none;
        }

        .back:hover {
            color: #a5e9ff;
        }

        .security {
            display: flex;
            align-items: center;
            justify-content: center;

            gap: 8px;

            margin-top: 22px;

            color: #4d6877;

            font-size: 14px;
            letter-spacing: .3px;
        }

        .security svg {
            width: 17px;
            height: 17px;
        }

        .login-exit {
            display: flex;
            align-items: center;
            justify-content: center;

            margin-top: 18px;
        }

        .login-exit-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 8px;

            padding: 9px 15px;

            border: 1px solid rgba(115,190,220,.12);
            border-radius: 8px;

            background: rgba(7,24,38,.45);

            color: #8ba6b5;

            font-size: 15px;

            text-decoration: none;

            transition: .2s ease;
        }

        .login-exit-button svg {
            width: 19px;
            height: 19px;
        }

        .login-exit-button:hover {
            color: #bcecff;

            border-color: rgba(63,190,232,.35);

            background: rgba(12,48,68,.65);

            transform: translateY(-1px);
        }

        /* =========================
           RESPONSIVO
           ========================= */

        @media (max-width: 900px) {

            html,
            body {
                overflow: auto;
            }

            .page {
                min-height: 100vh;
                height: auto;

                grid-template-columns: 1fr;
            }

            .brand-panel {
                min-height: 48vh;
                height: auto;

                border-right: 0;
                border-bottom: 1px solid rgba(115,190,220,.10);
            }

            .login-panel {
                min-height: 52vh;
                height: auto;
            }

            .heart-visual {
                bottom: 1%;

                transform:
                    translateX(-50%)
                    scale(.58);
            }

            .login-title {
                font-size: 34px;
            }

            .login-subtitle {
                font-size: 15px;
            }

            .login-box {
                width: min(430px, 100%);
            }
        }

        @media (max-height: 720px) and (min-width: 901px) {

            .brand-panel,
            .login-panel {
                padding-top: 20px;
                padding-bottom: 20px;
            }

            .brand-content {
                transform: translateY(-5px);
            }

            .brand-title {
                font-size: 43px;
            }

            .brand-description {
                margin-top: 14px;
            }

            .brand-footer {
                margin-top: 19px;
            }

            .heart-visual {
                transform:
                    translateX(-50%)
                    scale(.62);
            }

            .login-title {
                font-size: 36px;
            }

            .login-subtitle {
                margin-bottom: 18px;
            }

            .field {
                margin-bottom: 12px;
            }

            .input-wrap input {
                height: 48px;
            }

            .submit {
                height: 48px;
            }

            .security {
                margin-top: 14px;
            }
        }
    </style>
</head>

<body>

<div class="page">

    <!-- =========================
         LADO ESQUERDO
         ========================= -->

    <section class="brand-panel">

        <div class="brand-content">

            <div class="brand-name">

                <div class="brand-mark">
                    <svg viewBox="0 0 64 64" fill="none">

                        <defs>
                            <linearGradient
                                id="brandGradient"
                                x1="10"
                                y1="8"
                                x2="55"
                                y2="58"
                            >
                                <stop stop-color="#9BE7FF"/>
                                <stop offset=".45" stop-color="#3BB7E5"/>
                                <stop offset="1" stop-color="#08729F"/>
                            </linearGradient>
                        </defs>

                        <circle
                            cx="32"
                            cy="32"
                            r="26"
                            stroke="url(#brandGradient)"
                            stroke-width="2"
                            opacity=".55"
                        />

                        <path
                            d="M27 16H37V27H48V37H37V48H27V37H16V27H27V16Z"
                            fill="url(#brandGradient)"
                        />

                    </svg>
                </div>

                <div class="brand-name-text">
                    <span class="vida">Vida</span><span class="separator">|</span><span class="saude">Saúde</span>
                </div>

            </div>

            <div class="eyebrow">
                <span class="eyebrow-dot"></span>
                Tecnologia em saúde
            </div>

            <h1 class="brand-title">
                Recupere seu<br>
                <span>acesso com segurança.</span>
            </h1>

            <p class="brand-description">
                Informe o e-mail utilizado no sistema para receber
                as instruções de recuperação da sua senha.
            </p>

            <div class="brand-footer">
                <span class="brand-footer-line"></span>
                <span>Prontuário Eletrônico</span>
                <span></span>
                <span>Gestão Assistencial</span>
            </div>

        </div>

        <div class="heart-visual" aria-hidden="true">
            <div class="heart-glow"></div>
            <div class="heart"></div>
            <div class="heart-highlight"></div>
        </div>

    </section>


    <!-- =========================
         LADO DIREITO
         ========================= -->

    <section class="login-panel">

        <div class="login-box">

            <h2 class="login-title">
                Recuperar senha
            </h2>

            <p class="login-subtitle">
                Informe seu e-mail para continuar
            </p>


            @if (session('status'))

                <div class="status">
                    {{ session('status') }}
                </div>

            @endif


            @if ($errors->any())

                <div class="error">
                    {{ $errors->first() }}
                </div>

            @endif


            <form method="POST" action="{{ route('password.email') }}">

                @csrf

                <div class="field">

                    <label for="email">
                        E-mail
                    </label>

                    <div class="input-wrap">

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            required
                            autofocus
                            placeholder="seu.email@exemplo.com"
                        >

                    </div>

                    <div class="helper-text">
                        Enviaremos as instruções para redefinir sua senha.
                    </div>

                </div>


                <button
                    type="submit"
                    class="submit"
                >
                    Enviar instruções
                </button>

            </form>


            <a
                href="{{ route('login') }}"
                class="back"
            >
                ← Voltar para o login
            </a>


            <div class="security">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.7"
                >
                    <path d="M12 3 5 6v5c0 4.5 2.9 8.4 7 10 4.1-1.6 7-5.5 7-10V6l-7-3Z"/>
                    <path d="m9.5 12 1.7 1.7 3.5-3.7"/>
                </svg>

                Ambiente protegido para informações de saúde

            </div>


            <div class="login-exit">

                <a
                    href="/"
                    class="login-exit-button"
                    aria-label="Sair"
                >

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path d="M10 17l5-5-5-5"/>
                        <path d="M15 12H3"/>
                        <path d="M20 4v16"/>
                    </svg>

                    Sair

                </a>

            </div>

        </div>

    </section>

</div>

</body>
</html>