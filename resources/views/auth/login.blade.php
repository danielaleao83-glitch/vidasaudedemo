<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vida|SaÃºde â€” ProntuÃ¡rio EletrÃ´nico</title>

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
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
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
                radial-gradient(circle at 25% 50%, rgba(23, 142, 190, .13), transparent 34%),
                radial-gradient(circle at 75% 50%, rgba(23, 142, 190, .08), transparent 34%),
                linear-gradient(135deg, #020914 0%, #061727 50%, #020914 100%);
        }

        /* =========================
           ÃREA DA MARCA
           ========================= */

        .brand-panel {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 40px;
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
        }

        .brand-name {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 13px;
            margin-bottom: 25px;
        }

        .brand-name-text {
            font-size: clamp(38px, 4vw, 54px);
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
                drop-shadow(0 0 14px rgba(54, 190, 235, .18));
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
            box-shadow: 0 0 12px rgba(64, 196, 237, .8);
        }

        .brand-title {
            max-width: 550px;
            margin: 0;
            color: #f3f8fb;
            font-size: clamp(36px, 4vw, 58px);
            line-height: 1;
            font-weight: 750;
            letter-spacing: -3px;
        }

        .brand-title span {
            color: #53c6ed;
        }

        .brand-description {
            max-width: 475px;
            margin: 22px auto 0;
            color: #8aa5b5;
            font-size: 14px;
            line-height: 1.65;
        }

        .brand-footer {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 13px;
            margin-top: 30px;
            color: #617d8d;
            font-size: 9px;
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
           CORAÃ‡ÃƒO 3D
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
            background: radial-gradient(
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
            background: linear-gradient(
                180deg,
                rgba(255,255,255,.42),
                rgba(255,255,255,0)
            );
            filter: blur(2px);
        }

        /* =========================
           LOGIN
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
            width: min(410px, 100%);
            text-align: left;
        }

        .login-topline {
            width: 38px;
            height: 3px;
            margin: 0 auto 22px;
            border-radius: 999px;
            background: #39b9e7;
            box-shadow: 0 0 16px rgba(57,185,231,.35);
        }

        .login-title {
            margin: 0;
            text-align: center;
            color: #f3f8fb;
            font-size: 33px;
            line-height: 1.1;
            letter-spacing: -1.3px;
        }

        .login-subtitle {
            margin: 9px 0 23px;
            text-align: center;
            color: #7893a3;
            font-size: 14px;
        }

        .error {
            margin-bottom: 15px;
            padding: 10px 12px;
            border: 1px solid rgba(239,91,91,.24);
            border-radius: 9px;
            background: rgba(130,25,32,.15);
            color: #ff9696;
            font-size: 13px;
            text-align: left;
        }

        .field {
            margin-bottom: 14px;
        }

        .field label {
            display: block;
            margin-bottom: 7px;
            color: #b9ced9;
            font-size: 12px;
            font-weight: 650;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap input {
            width: 100%;
            height: 46px;
            border: 1px solid rgba(130,171,190,.16);
            border-radius: 9px;
            outline: none;
            padding: 0 14px;
            background: rgba(7,24,38,.80);
            color: #f1f8fb;
            font-size: 14px;
            transition: .2s ease;
        }

        .input-wrap input::placeholder {
            color: #4e6979;
        }

        .input-wrap input:focus {
            border-color: rgba(63,190,232,.65);
            box-shadow: 0 0 0 3px rgba(63,190,232,.07);
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 12px;
            width: 25px;
            height: 25px;
            transform: translateY(-50%);
            display: grid;
            place-items: center;
            padding: 0;
            border: 0;
            background: transparent;
            color: #6d8998;
            cursor: pointer;
        }

        .password-toggle svg {
            width: 17px;
            height: 17px;
        }

        .password-rules {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5px 12px;
            margin: 8px 0 15px;
            color: #607b8b;
            font-size: 11px;
        }

        .password-rule {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .password-rule::before {
            content: "";
            width: 4px;
            height: 4px;
            flex: 0 0 4px;
            border-radius: 50%;
            background: #477080;
        }

        .login-options {
            display: flex;
            justify-content: center;
            margin-bottom: 16px;
        }

        .login-options a,
        .register-link a {
            color: #62c9ed;
            text-decoration: none;
        }

        .login-options a {
            font-size: 14px;
        }

        .login-options a:hover,
        .register-link a:hover {
            color: #a5e9ff;
        }

        .submit {
            width: 100%;
            height: 47px;
            border: 0;
            border-radius: 9px;
            background: linear-gradient(135deg, #1596c9, #0b6f9b);
            color: #fff;
            font-size: 14px;
            font-weight: 750;
            cursor: pointer;
            box-shadow: 0 10px 28px rgba(0,128,180,.18);
            transition: .2s ease;
        }

        .submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 13px 32px rgba(0,151,209,.25);
        }

        .register-link {
            margin-top: 17px;
            text-align: center;
            color: #607b8a;
            font-size: 14px;
        }

        .security {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 21px;
            color: #4d6877;
            font-size: 11px;
            letter-spacing: .3px;
        }

        .security svg {
            width: 12px;
            height: 12px;
        }

        .login-exit {
            margin-top: 28px;
            padding-top: 18px;
            border-top: 1px solid rgba(115,190,220,.10);
            display: flex;
            justify-content: center;
        }

        .login-exit-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 16px;
            border: 1px solid rgba(115,190,220,.12);
            border-radius: 8px;
            background: rgba(7,24,38,.45);
            color: #8ba6b5;
            font-size: 13px;
            text-decoration: none;
            transition: .2s ease;
        }

        .login-exit-button svg {
            width: 16px;
            height: 16px;
        }

        .login-exit-button:hover {
            color: #bcecff;
            border-color: rgba(63,190,232,.35);
            background: rgba(12,48,68,.65);
            transform: translateY(-1px);
        }

        /* =========================
           TELAS MENORES
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
                transform: translateX(-50%) scale(.58);
            }
        }

        @media (max-height: 720px) and (min-width: 901px) {
            .brand-panel,
            .login-panel {
                padding-top: 20px;
                padding-bottom: 20px;
            }

            .brand-name {
                margin-bottom: 17px;
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
                transform: translateX(-50%) scale(.62);
            }

            .login-topline {
                margin-bottom: 15px;
            }

            .login-subtitle {
                margin-bottom: 15px;
            }

            .field {
                margin-bottom: 9px;
            }

            .security {
                margin-top: 13px;
            }
        }

        /* =========================================================
           AJUSTE VISUAL FINAL â€” VIDA|SAÃšDE
           ========================================================= */

        @media (min-width: 901px) {

            html,
            body {
                height: 100%;
                overflow: hidden;
            }

            .page {
                height: 100vh;
                overflow: hidden;
            }

            .brand-content {
                transform: translateY(-30px);
            }

            .brand-name {
                margin-bottom: 21px;
            }

            .brand-title {
                font-size: clamp(40px, 3.8vw, 54px);
            }

            .brand-description {
                margin-top: 20px;
                font-size: 15px;
            }

            .brand-footer {
                margin-top: 25px;
                font-size: 10px;
            }

            .login-topline {
                display: none;
            }

            .login-box {
                width: min(430px, 100%);
            }

            .login-title {
                font-size: 35px;
            }

            .login-subtitle {
                font-size: 15px;
                margin-bottom: 25px;
            }

            .field {
                margin-bottom: 16px;
            }

            .field label {
                font-size: 13px;
                margin-bottom: 8px;
            }

            .input-wrap input {
                height: 49px;
                font-size: 15px;
            }

            .password-rules {
                font-size: 12px;
                gap: 6px 14px;
                margin-top: 9px;
                margin-bottom: 16px;
            }

            .login-options {
                margin-bottom: 17px;
            }

            .login-options a {
                font-size: 14px;
            }

            .submit {
                height: 49px;
                font-size: 15px;
            }

            .register-link {
                margin-top: 17px;
                font-size: 14px;
            }

            .security {
                margin-top: 19px;
                font-size: 12px;
            }

            .login-exit {
                margin-top: 23px;
                padding-top: 15px;
            }

            .login-exit-button {
                font-size: 13px;
                padding: 9px 17px;
            }
        }

        /* =========================================================
           AJUSTE DE COMPOSIÃ‡ÃƒO â€” LOGIN VIDA|SAÃšDE
           ========================================================= */

        @media (min-width: 901px) {

            html,
            body,
            .page {
                height: 100vh;
                min-height: 100vh;
                overflow: hidden;
            }

            .brand-content {
                transform: translateY(-8px) !important;
            }

            .brand-name-text {
                font-size: clamp(42px, 4vw, 56px) !important;
            }

            .brand-title {
                font-size: clamp(40px, 4vw, 56px) !important;
                line-height: 1.04 !important;
            }

            .brand-description {
                font-size: 15px !important;
                line-height: 1.7 !important;
            }

            .brand-footer {
                font-size: 10px !important;
            }

            .login-box {
                width: min(455px, 100%) !important;
            }

            .login-topline {
                display: none !important;
            }

            .login-title {
                font-size: 40px !important;
                line-height: 1.08 !important;
                letter-spacing: -1.5px !important;
            }

            .login-subtitle {
                font-size: 16px !important;
                margin-top: 12px !important;
                margin-bottom: 27px !important;
            }

            .field {
                margin-bottom: 18px !important;
            }

            .field label {
                font-size: 14px !important;
                margin-bottom: 9px !important;
            }

            .input-wrap input {
                height: 52px !important;
                min-height: 52px !important;
                font-size: 16px !important;
                padding-left: 16px !important;
            }

            .password-toggle {
                width: 29px !important;
                height: 29px !important;
                right: 13px !important;
            }

            .password-toggle svg {
                width: 19px !important;
                height: 19px !important;
            }

            .password-rules {
                font-size: 13px !important;
                line-height: 1.4 !important;
                gap: 7px 16px !important;
                margin-top: 10px !important;
                margin-bottom: 18px !important;
            }

            .password-rule {
                gap: 7px !important;
            }

            .password-rule::before {
                width: 5px !important;
                height: 5px !important;
                flex-basis: 5px !important;
            }

            .login-options {
                margin-bottom: 19px !important;
            }

            .login-options a {
                font-size: 15px !important;
            }

            .submit {
                height: 52px !important;
                min-height: 52px !important;
                font-size: 16px !important;
            }

            .register-link {
                margin-top: 19px !important;
                font-size: 15px !important;
            }

            .security {
                justify-content: center !important;
                margin-top: 20px !important;
                font-size: 13px !important;
                gap: 8px !important;
                white-space: nowrap !important;
            }

            .security svg {
                width: 16px !important;
                height: 16px !important;
            }

            .login-exit {
                margin-top: 18px !important;
                padding-top: 0 !important;
                border-top: 0 !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
            }

            .login-exit-button {
                display: inline-flex !important;
                align-items: center !important;
                justify-content: center !important;
                gap: 9px !important;
                padding: 10px 18px !important;
                font-size: 15px !important;
            }

            .login-exit-button svg {
                width: 19px !important;
                height: 19px !important;
            }
        }

        /* =========================================================
           COMPOSIÃ‡ÃƒO FINAL â€” FORMULÃRIO E RODAPÃ‰
           ========================================================= */

        @media (min-width: 901px) {

            .brand-panel,
            .login-panel {
                align-items: center !important;
            }

            .brand-content {
                transform: translateY(-5px) !important;
            }

            .login-box {
                width: min(470px, 100%) !important;
            }

            .login-title {
                font-size: 42px !important;
                line-height: 1.05 !important;
            }

            .login-subtitle {
                font-size: 17px !important;
                margin-top: 13px !important;
                margin-bottom: 28px !important;
            }

            .field {
                margin-bottom: 19px !important;
            }

            .field label {
                font-size: 15px !important;
                margin-bottom: 9px !important;
            }

            .input-wrap input {
                height: 54px !important;
                font-size: 17px !important;
                padding-left: 17px !important;
            }

            .password-rules {
                font-size: 14px !important;
                gap: 7px 18px !important;
                margin-top: 10px !important;
                margin-bottom: 19px !important;
            }

            .login-options a {
                font-size: 16px !important;
            }

            .login-options {
                margin-bottom: 20px !important;
            }

            .submit {
                height: 54px !important;
                font-size: 17px !important;
            }

            .register-link {
                margin-top: 20px !important;
                font-size: 16px !important;
            }

            .login-box .security {
                margin-top: 22px !important;
                font-size: 14px !important;
                white-space: nowrap !important;
            }

            .login-box .security svg {
                width: 17px !important;
                height: 17px !important;
            }

            .login-exit {
                position: absolute !important;
                margin: 0 !important;
                padding: 0 !important;
                border: 0 !important;
                transform: translateY(-1px) !important;
            }

            .login-exit-button {
                font-size: 15px !important;
                padding: 9px 15px !important;
                gap: 8px !important;
            }

            .login-exit-button svg {
                width: 19px !important;
                height: 19px !important;
            }

            .login-box {
                position: relative !important;
            }

            .security {
                padding-right: 110px !important;
            }

            .login-topline {
                display: none !important;
            }
        }
    </style>
</head>

<body>

<div class="page">

    <section class="brand-panel">

        <div class="brand-content">

            <div class="brand-name">

                <div class="brand-mark">
                    <svg viewBox="0 0 64 64" fill="none">
                        <defs>
                            <linearGradient id="brandGradient" x1="10" y1="8" x2="55" y2="58">
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
                    <span class="vida">Vida</span><span class="separator">|</span><span class="saude">SaÃºde</span>
                </div>

            </div>

            <div class="eyebrow">
                <span class="eyebrow-dot"></span>
                Tecnologia em saÃºde
            </div>

            <h1 class="brand-title">
                InteligÃªncia para uma<br>
                <span>saÃºde mais conectada.</span>
            </h1>

            <p class="brand-description">
                Plataforma integrada para gestÃ£o assistencial,
                atendimento e prontuÃ¡rio eletrÃ´nico, conectando
                informaÃ§Ã£o clÃ­nica, operaÃ§Ã£o e cuidado.
            </p>

            <div class="brand-footer">
                <span class="brand-footer-line"></span>
                <span>ProntuÃ¡rio EletrÃ´nico</span>
                <span></span>
                <span>GestÃ£o Assistencial</span>
            </div>

        </div>

        <div class="heart-visual" aria-hidden="true">
            <div class="heart-glow"></div>
            <div class="heart"></div>
            <div class="heart-highlight"></div>
        </div>

    </section>


    <section class="login-panel">

        <div class="login-box">

            <h2 class="login-title">
                Acessar o sistema
            </h2>

            <p class="login-subtitle">
                Entre com suas credenciais para continuar
            </p>

            @if ($errors->any())
                <div class="error">
                    {{ $errors->first() }}
                </div>
            @endif

            @if (session('status'))
                <div class="status">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="field">
                    <label for="email">E-mail</label>

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
                </div>

                <div class="field">
                    <label for="password">Senha</label>

                    <div class="input-wrap">
                        <input
                            id="password"
                            type="password"
                            name="password"
                            autocomplete="current-password"
                            required
                            placeholder="Digite sua senha"
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            onclick="togglePassword()"
                            aria-label="Mostrar senha"
                        >
                            <svg id="eyeIcon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                <path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"/>
                                <circle cx="12" cy="12" r="2.8"/>
                            </svg>
                        </button>
                    </div>

                    <div class="password-rules">
                        <div class="password-rule">6 a 8 caracteres</div>
                        <div class="password-rule">1 letra maiÃºscula</div>
                        <div class="password-rule">1 nÃºmero</div>
                        <div class="password-rule">1 caractere especial</div>
                    </div>
                </div>

                <div class="login-options">
                    <a href="{{ route('password.request') }}">
                        Esqueci minha senha
                    </a>
                </div>

                <button type="submit" class="submit">
                    Entrar
                </button>

            </form>

            <div class="register-link">
                Ainda nÃ£o possui acesso?
                <a href="{{ route('register') }}">
                    Criar conta
                </a>
            </div>

            <div class="security">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                    <path d="M12 3 5 6v5c0 4.5 2.9 8.4 7 10 4.1-1.6 7-5.5 7-10V6l-7-3Z"/>
                    <path d="m9.5 12 1.7 1.7 3.5-3.7"/>
                </svg>

                Ambiente protegido para informaÃ§Ãµes de saÃºde
            </div>

            <div class="login-exit">
                <a href="/" class="login-exit-button" aria-label="Sair">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
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

<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const icon = document.getElementById('eyeIcon');

        if (password.type === 'password') {
            password.type = 'text';

            icon.innerHTML = `
                <path d="M3 3l18 18"/>
                <path d="M10.6 10.6a2 2 0 0 0 2.8 2.8"/>
                <path d="M9.9 5.1A10.8 10.8 0 0 1 12 5c6 0 9.5 7 9.5 7a17 17 0 0 1-3.2 3.8"/>
                <path d="M6.2 6.2C3.8 7.9 2.5 12 2.5 12s3.5 6 9.5 6c1 0 2-.2 2.9-.5"/>
            `;
        } else {
            password.type = 'password';

            icon.innerHTML = `
                <path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"/>
                <circle cx="12" cy="12" r="2.8"/>
            `;
        }
    }
</script>

</body>
</html>
