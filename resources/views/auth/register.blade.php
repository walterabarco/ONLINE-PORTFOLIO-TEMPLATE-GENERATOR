<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f3f8f7">
    <title>Create Account | Portfolio Builder</title>

    <style>
        :root {
            --teal: #07858d;
            --deep-teal: #07565b;
            --mint: #f3f8f7;
            --soft-mint: #e8f4f3;
            --white: #ffffff;
            --ink: #172b2b;
            --muted: #526b6c;
            --border: #d5e5e3;
            --danger: #bd3b3b;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            min-height: 100%;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: var(--mint);
            color: var(--ink);
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont,
                "Segoe UI", sans-serif;
            font-size: 15px;
            line-height: 1.6;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input {
            font: inherit;
        }

        /* HEADER */

        .topbar {
            min-height: 78px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 14px 6%;
            background: var(--white);
            border-bottom: 1px solid var(--border);
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 11px;
            font-size: 19px;
            font-weight: 850;
            letter-spacing: -.5px;
        }

        .brand-mark {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 12px;
            background: var(--teal);
            color: var(--white);
            font-size: 22px;
            font-weight: 900;
        }

        .top-link {
            color: var(--deep-teal);
            font-size: 14px;
            font-weight: 750;
        }

        .top-link:hover,
        .text-link:hover {
            text-decoration: underline;
        }

        /* MAIN BACKGROUND */

        .page {
            flex: 1;
            display: grid;
            place-items: center;
            padding: 44px 24px;
            background:
                radial-gradient(
                    circle at 8% 15%,
                    #e2f1ef 0,
                    transparent 27%
                ),
                radial-gradient(
                    circle at 92% 85%,
                    #e2f1ef 0,
                    transparent 25%
                ),
                var(--mint);
        }

        /* REGISTER CARD */

        .register-layout {
            width: min(1120px, 100%);
            display: grid;
            grid-template-columns: .85fr 1.15fr;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 24px;
            background: var(--white);
            box-shadow: 0 24px 65px rgba(23, 43, 43, .08);
        }

        /* LEFT WELCOME PANEL */

        .intro-panel {
            position: relative;
            isolation: isolate;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
            padding: 46px 38px;
            color: var(--white);
            background: linear-gradient(
                150deg,
                var(--deep-teal),
                var(--teal) 75%,
                #269b9d
            );
        }

        .intro-panel::before,
        .intro-panel::after {
            content: "";
            position: absolute;
            z-index: -1;
            border: 1px solid rgba(255, 255, 255, .17);
            border-radius: 50%;
            pointer-events: none;
        }

        .intro-panel::before {
            width: 310px;
            height: 310px;
            top: -150px;
            right: -170px;
        }

        .intro-panel::after {
            width: 240px;
            height: 240px;
            right: -120px;
            bottom: -130px;
        }

        .intro-label {
            color: #d5f4ee;
            font-size: 12px;
            font-weight: 850;
            letter-spacing: 1.8px;
        }

        .intro-content {
            margin: 45px 0;
        }

        .intro-content h1 {
            max-width: 400px;
            font-size: clamp(36px, 3.5vw, 46px);
            line-height: 1.2;
            letter-spacing: -1.8px;
            font-weight: 900;
        }

        .intro-content h1 span {
            color: #b9eee4;
        }

        .intro-content p {
            max-width: 370px;
            margin-top: 20px;
            color: rgba(255, 255, 255, .88);
            font-size: 15px;
            line-height: 1.9;
        }

        /* PORTFOLIO PREVIEW */

        .intro-visual {
            margin-top: 32px;
            padding: 17px;
            border: 1px solid rgba(255, 255, 255, .24);
            border-radius: 14px;
            background: rgba(255, 255, 255, .11);
        }

        .visual-top {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            padding-bottom: 13px;
            border-bottom: 1px solid rgba(255, 255, 255, .23);
            font-size: 10px;
            font-weight: 850;
        }

        .visual-profile {
            display: flex;
            align-items: center;
            gap: 13px;
            padding-top: 17px;
        }

        .visual-avatar {
            width: 49px;
            height: 49px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 13px;
            background: #d9f1ed;
            color: var(--deep-teal);
            font-size: 21px;
            font-weight: 900;
        }

        .visual-lines {
            flex: 1;
            display: grid;
            gap: 9px;
        }

        .visual-lines span {
            display: block;
            width: 85%;
            height: 7px;
            border-radius: 5px;
            background: rgba(255, 255, 255, .85);
        }

        .visual-lines span:last-child {
            width: 58%;
            background: rgba(255, 255, 255, .4);
        }

        .visual-projects {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
            margin-top: 17px;
        }

        .visual-projects span {
            height: 45px;
            border: 1px solid rgba(255, 255, 255, .25);
            border-radius: 7px;
            background: rgba(255, 255, 255, .14);
        }

        .intro-footer {
            color: rgba(255, 255, 255, .8);
            font-size: 12px;
            letter-spacing: .7px;
        }

        /* RIGHT FORM PANEL */

        .form-panel {
            min-width: 0;
            padding: 48px;
        }

        .step-row {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 25px;
        }

        .step-icon {
            width: 49px;
            height: 49px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 14px;
            background: var(--soft-mint);
            color: var(--teal);
            font-size: 24px;
            font-weight: 900;
        }

        .step-copy {
            display: grid;
            gap: 3px;
        }

        .step-copy strong {
            font-size: 14px;
            font-weight: 850;
        }

        .step-copy span {
            color: var(--muted);
            font-size: 12px;
        }

        .step-track {
            height: 5px;
            margin-bottom: 30px;
            overflow: hidden;
            border-radius: 10px;
            background: var(--soft-mint);
        }

        .step-track span {
            display: block;
            width: 100%;
            height: 100%;
            border-radius: inherit;
            background: var(--teal);
        }

        .form-heading h2 {
            font-size: 34px;
            line-height: 1.25;
            font-weight: 900;
            letter-spacing: -1px;
        }

        .form-heading p {
            margin-top: 9px;
            color: var(--muted);
            font-size: 15px;
        }

        /* ALERTS */

        .status-message,
        .error-summary {
            margin-top: 20px;
            padding: 13px 15px;
            border-radius: 10px;
            font-size: 13px;
        }

        .status-message {
            border: 1px solid #b8e4d5;
            background: #effaf5;
            color: #176b50;
        }

        .error-summary {
            border: 1px solid #f0caca;
            background: #fff5f5;
            color: var(--danger);
        }

        /* INPUT FIELDS */

        .register-form {
            margin-top: 28px;
        }

        .field {
            margin-bottom: 21px;
        }

        .field label {
            display: block;
            margin-bottom: 8px;
            color: var(--ink);
            font-size: 14px;
            font-weight: 800;
        }

        .input-wrap {
            position: relative;
        }

        .field input {
            width: 100%;
            height: 55px;
            padding: 0 16px;
            border: 1px solid #d5e1e0;
            border-radius: 10px;
            outline: none;
            background: var(--white);
            color: var(--ink);
            font-size: 15px;
            transition: border-color .2s, box-shadow .2s;
        }

        .field input::placeholder {
            color: #8b9d9d;
        }

        .field input:hover {
            border-color: #a9cecb;
        }

        .field input:focus {
            border-color: var(--teal);
            box-shadow: 0 0 0 4px rgba(7, 133, 141, .11);
        }

        .field input[aria-invalid="true"] {
            border-color: var(--danger);
        }

        .password-wrap input {
            padding-right: 76px;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 14px;
            transform: translateY(-50%);
            padding: 5px 2px;
            border: none;
            background: transparent;
            color: var(--deep-teal);
            font-size: 12px;
            font-weight: 850;
            cursor: pointer;
        }

        .toggle-password:hover {
            color: var(--teal);
        }

        .toggle-password:focus-visible {
            outline: 2px solid var(--teal);
            outline-offset: 3px;
            border-radius: 3px;
        }

        .field-error {
            margin-top: 7px;
            color: var(--danger);
            font-size: 13px;
        }

        /* CREATE ACCOUNT BUTTON */

        .submit-button {
            width: 100%;
            min-height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 8px;
            border: none;
            border-radius: 10px;
            background: var(--teal);
            color: var(--white);
            font-size: 15px;
            font-weight: 850;
            cursor: pointer;
            transition: background .2s, transform .2s, box-shadow .2s;
        }

        .submit-button:hover {
            transform: translateY(-1px);
            background: var(--deep-teal);
            box-shadow: 0 8px 20px rgba(7, 133, 141, .17);
        }

        .submit-button:focus-visible {
            outline: 3px solid rgba(7, 133, 141, .3);
            outline-offset: 3px;
        }

        .signin-prompt {
            margin-top: 25px;
            color: var(--muted);
            text-align: center;
            font-size: 14px;
        }

        .text-link {
            color: var(--deep-teal);
            font-size: 14px;
            font-weight: 850;
        }

        .text-link:hover {
            color: var(--teal);
        }

        .footer {
            padding: 0 16px 18px;
            color: #718888;
            text-align: center;
            font-size: 12px;
        }

        /* TABLET */

        @media (max-width: 900px) {
            .register-layout {
                width: min(650px, 100%);
                grid-template-columns: 1fr;
            }

            .intro-panel {
                padding: 30px;
            }

            .intro-content {
                margin: 25px 0 0;
            }

            .intro-content h1 {
                max-width: 520px;
                font-size: 36px;
            }

            .intro-content p {
                max-width: 480px;
            }

            .intro-visual {
                display: none;
            }

            .intro-footer {
                margin-top: 25px;
            }

            .form-panel {
                padding: 36px;
            }
        }

        /* MOBILE */

        @media (max-width: 480px) {
            .topbar {
                min-height: 68px;
                padding: 12px 18px;
            }

            .brand {
                gap: 8px;
                font-size: 15px;
            }

            .brand-mark {
                width: 36px;
                height: 36px;
                font-size: 19px;
            }

            .top-link {
                max-width: 145px;
                font-size: 12px;
                text-align: right;
            }

            .page {
                padding: 20px 14px 30px;
            }

            .register-layout {
                border-radius: 17px;
            }

            .intro-panel {
                padding: 25px 23px;
            }

            .intro-label {
                font-size: 11px;
            }

            .intro-content {
                margin-top: 22px;
            }

            .intro-content h1 {
                font-size: 32px;
                letter-spacing: -1px;
            }

            .intro-content p {
                margin-top: 12px;
                font-size: 14px;
            }

            .intro-footer {
                font-size: 11px;
            }

            .form-panel {
                padding: 28px 22px;
            }

            .step-row {
                gap: 11px;
                margin-bottom: 21px;
            }

            .step-icon {
                width: 43px;
                height: 43px;
                font-size: 21px;
            }

            .step-copy strong {
                font-size: 13px;
            }

            .step-copy span {
                font-size: 11px;
            }

            .step-track {
                margin-bottom: 24px;
            }

            .form-heading h2 {
                font-size: 29px;
            }

            .form-heading p {
                font-size: 14px;
            }

            .register-form {
                margin-top: 23px;
            }

            .field {
                margin-bottom: 18px;
            }

            .field label {
                font-size: 14px;
            }

            .field input {
                height: 53px;
                font-size: 15px;
            }

            .submit-button {
                min-height: 54px;
                font-size: 15px;
            }

            .signin-prompt,
            .text-link {
                font-size: 13px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body>
    <header class="topbar">
        <a class="brand" href="{{ route('home') }}">
            <span class="brand-mark">P.</span>
            <span>Portfolio Builder</span>
        </a>

        <a class="top-link" href="{{ route('login') }}">
            Already have an account? Sign in
        </a>
    </header>

    <main class="page">
        <div class="register-layout">

            <aside class="intro-panel">
                <div class="intro-label">START YOUR JOURNEY</div>

                <div class="intro-content">
                    <h1>
                        Make room for your
                        <span>next big idea.</span>
                    </h1>

                    <p>
                        Create your account and bring your work together in one place.
                    </p>

                    <div class="intro-visual" aria-hidden="true">
                        <div class="visual-top">
                            <span>MY PORTFOLIO</span>
                            <span>MY WORK</span>
                        </div>

                        <div class="visual-profile">
                            <div class="visual-avatar">P.</div>

                            <div class="visual-lines">
                                <span></span>
                                <span></span>
                            </div>
                        </div>

                        <div class="visual-projects">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>

                <div class="intro-footer">
                    YOUR WORK. YOUR STORY.
                </div>
            </aside>

            <section class="form-panel" aria-label="Create your account">
                <div class="step-row">
                    <div class="step-icon" aria-hidden="true">↗</div>

                    <div class="step-copy">
                        <strong>Let's get you started</strong>
                        <span>Create your Portfolio Builder account</span>
                    </div>
                </div>

                <div class="step-track" aria-hidden="true">
                    <span></span>
                </div>

                <div class="form-heading">
                    <h2>Create account</h2>
                    <p>Enter your details below.</p>
                </div>

                @if (session('status'))
                    <div class="status-message" role="status">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="error-summary" role="alert">
                        Please check the information below and try again.
                    </div>
                @endif

                <form
                    class="register-form"
                    method="POST"
                    action="{{ route('register') }}"
                >
                    @csrf

                    <div class="field">
                        <label for="name">Full Name</label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Enter your full name"
                            autocomplete="name"
                            required
                            autofocus
                            aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}"
                        >

                        @error('name')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="email">Email Address</label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="you@example.com"
                            autocomplete="email"
                            required
                            aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}"
                        >

                        @error('email')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="password">Password</label>

                        <div class="input-wrap">
                            <input
                                id="password"
                                type="password"
                                name="password"
                                placeholder="Create a password"
                                autocomplete="new-password"
                                required
                                aria-invalid="{{ $errors->has('password') ? 'true' : 'false' }}"
                            >

                            <button
                                class="toggle-password"
                                type="button"
                                data-target="password"
                                aria-controls="password"
                                aria-pressed="false"
                            >
                                Show
                            </button>
                        </div>

                        @error('password')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="password_confirmation">
                            Confirm Password
                        </label>

                        <div class="input-wrap">
                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                placeholder="Enter your password again"
                                autocomplete="new-password"
                                required
                            >

                            <button
                                class="toggle-password"
                                type="button"
                                data-target="password_confirmation"
                                aria-controls="password_confirmation"
                                aria-pressed="false"
                            >
                                Show
                            </button>
                        </div>

                        @error('password_confirmation')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="submit-button" type="submit">
                        Create Account <span aria-hidden="true">→</span>
                    </button>

                    <p class="signin-prompt">
                        Already registered?
                        <a class="text-link" href="{{ route('login') }}">
                            Sign in
                        </a>
                    </p>
                </form>
            </section>

        </div>
    </main>

    <footer class="footer">
        © {{ date('Y') }} Portfolio Builder
    </footer>

    <script>
        document.querySelectorAll('.toggle-password').forEach((button) => {
            button.addEventListener('click', () => {
                const input = document.getElementById(button.dataset.target);

                if (!input) {
                    return;
                }

                const isHidden = input.type === 'password';

                input.type = isHidden ? 'text' : 'password';
                button.textContent = isHidden ? 'Hide' : 'Show';
                button.setAttribute('aria-pressed', String(isHidden));
            });
        });
    </script>
</body>
</html>