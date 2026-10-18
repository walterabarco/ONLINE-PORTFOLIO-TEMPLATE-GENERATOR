<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f3f8f7">
    <title>Log In | Portfolio Builder</title>

    <style>
        :root {
            --teal: #07858d;
            --deep-teal: #07565b;
            --mint: #f3f8f7;
            --soft-mint: #e8f4f3;
            --white: #ffffff;
            --ink: #172b2b;
            --muted: #687c7d;
            --border: #dce9e8;
            --danger: #bd3b3b;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont,
                "Segoe UI", sans-serif;
            color: var(--ink);
            background: var(--mint);
            line-height: 1.6;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button, input {
            font: inherit;
        }

        .topbar {
            min-height: 76px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 6%;
            background: var(--white);
            border-bottom: 1px solid var(--border);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 17px;
            font-weight: 850;
            letter-spacing: -.5px;
        }

        .brand-mark {
            width: 39px;
            height: 39px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: var(--teal);
            color: white;
            font-size: 20px;
            font-weight: 900;
        }

        .top-link {
            color: var(--deep-teal);
            font-size: 13px;
            font-weight: 750;
        }

        .top-link:hover,
        .text-link:hover {
            text-decoration: underline;
        }

        .page {
            min-height: calc(100vh - 76px);
            display: grid;
            place-items: center;
            padding: 42px 6%;
            overflow: hidden;
            background:
                radial-gradient(circle at 95% 5%, #e4f3f1 0, transparent 25%),
                var(--mint);
        }

        .layout {
            width: min(1150px, 100%);
            display: grid;
            grid-template-columns: 1fr 440px;
            align-items: center;
            gap: clamp(35px, 7vw, 100px);
        }

        /* LEFT SIDE */

        .story {
            min-width: 0;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 7px 12px;
            border-radius: 30px;
            background: #dff1ef;
            color: var(--deep-teal);
            font-size: 10px;
            font-weight: 850;
            letter-spacing: 1.2px;
        }

        .eyebrow-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--teal);
        }

        .story h1 {
            max-width: 600px;
            margin-top: 27px;
            font-size: clamp(42px, 5.4vw, 69px);
            line-height: 1.03;
            letter-spacing: -3.5px;
            font-weight: 900;
        }

        .story h1 span {
            color: var(--teal);
        }

        /* Simple portfolio preview */

        .portfolio-visual {
            position: relative;
            width: min(100%, 500px);
            height: 250px;
            margin-top: 30px;
        }

        .preview-window {
            position: absolute;
            top: 15px;
            left: 5%;
            width: 82%;
            padding: 13px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: white;
            box-shadow: 0 20px 45px rgba(23, 43, 43, .09);
            transform: rotate(-3deg);
        }

        .preview-topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 4px 3px 11px;
            border-bottom: 1px solid var(--border);
            font-size: 8px;
            font-weight: 850;
        }

        .preview-nav {
            color: var(--muted);
            font-size: 7px;
        }

        .preview-hero {
            display: grid;
            grid-template-columns: 1fr 72px;
            align-items: center;
            gap: 12px;
            padding: 21px 7px 17px;
        }

        .preview-label {
            color: var(--teal);
            font-size: 7px;
            font-weight: 850;
            letter-spacing: 1px;
        }

        .preview-name {
            margin-top: 7px;
            font-size: clamp(19px, 2.4vw, 27px);
            line-height: 1.05;
            font-weight: 950;
            letter-spacing: -.8px;
        }

        .preview-name span {
            color: var(--teal);
        }

        .preview-avatar {
            width: 68px;
            height: 82px;
            display: grid;
            place-items: center;
            border-radius: 40% 40% 9px 9px;
            background: var(--soft-mint);
            color: var(--teal);
            font-size: 28px;
            font-weight: 900;
        }

        .preview-project-title {
            padding: 0 7px 8px;
            font-size: 8px;
            font-weight: 900;
        }

        .preview-projects {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 7px;
            padding: 0 7px 8px;
        }

        .preview-project {
            height: 42px;
            border: 1px solid var(--border);
            border-radius: 6px;
            background: linear-gradient(135deg, var(--soft-mint), white);
        }

        .floating-tag {
            position: absolute;
            right: 0;
            bottom: 25px;
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 11px 14px;
            border: 1px solid var(--border);
            border-radius: 11px;
            background: white;
            box-shadow: 0 10px 25px rgba(23, 43, 43, .08);
            font-size: 10px;
            font-weight: 800;
        }

        .floating-check {
            width: 28px;
            height: 28px;
            display: grid;
            place-items: center;
            border-radius: 8px;
            background: var(--teal);
            color: white;
            font-size: 15px;
        }

        /* RIGHT SIDE */

        .login-card {
            width: 100%;
            padding: 42px;
            border: 1px solid var(--border);
            border-radius: 23px;
            background: white;
            box-shadow: 0 25px 65px rgba(23, 43, 43, .08);
        }

        .form-label {
            color: var(--teal);
            font-size: 10px;
            font-weight: 900;
            letter-spacing: 1.8px;
        }

        .login-card h2 {
            margin-top: 10px;
            font-size: 31px;
            line-height: 1.2;
            font-weight: 900;
            letter-spacing: -1px;
        }

        .form-description {
            margin-top: 9px;
            color: var(--muted);
            font-size: 13px;
        }

        .status-message,
        .error-summary {
            margin-top: 18px;
            padding: 11px 13px;
            border-radius: 9px;
            font-size: 12px;
        }

        .status-message {
            border: 1px solid #b8e4d5;
            background: #effaf5;
            color: #176b50;
        }

        .error-summary,
        .field-error {
            color: var(--danger);
        }

        .error-summary {
            border: 1px solid #f0caca;
            background: #fff5f5;
        }

        .login-form {
            margin-top: 27px;
        }

        .field {
            margin-bottom: 19px;
        }

        .field label {
            display: block;
            margin-bottom: 7px;
            font-size: 12px;
            font-weight: 800;
        }

        .field input {
            width: 100%;
            height: 51px;
            padding: 0 14px;
            border: 1px solid #d5e1e0;
            border-radius: 10px;
            outline: none;
            background: white;
            color: var(--ink);
            font-size: 13px;
            transition: border-color .2s, box-shadow .2s;
        }

        .field input::placeholder {
            color: #9aa9a9;
        }

        .field input:focus {
            border-color: var(--teal);
            box-shadow: 0 0 0 4px rgba(7, 133, 141, .10);
        }

        .field input[aria-invalid="true"] {
            border-color: var(--danger);
        }

        .password-wrap {
            position: relative;
        }

        .password-wrap input {
            padding-right: 65px;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: var(--deep-teal);
            font-size: 11px;
            font-weight: 850;
            cursor: pointer;
        }

        .field-error {
            margin-top: 5px;
            font-size: 11px;
        }

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            margin: 3px 0 24px;
        }

        .remember {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--muted);
            font-size: 12px;
            cursor: pointer;
        }

        .remember input {
            width: 16px;
            height: 16px;
            accent-color: var(--teal);
        }

        .text-link {
            color: var(--deep-teal);
            font-size: 12px;
            font-weight: 800;
        }

        .submit-button {
            width: 100%;
            min-height: 51px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: none;
            border-radius: 10px;
            background: var(--teal);
            color: white;
            font-size: 13px;
            font-weight: 850;
            cursor: pointer;
            transition: background .2s, transform .2s;
        }

        .submit-button:hover {
            background: var(--deep-teal);
            transform: translateY(-1px);
        }

        .signup-prompt {
            margin-top: 23px;
            color: var(--muted);
            text-align: center;
            font-size: 12px;
        }

        .security-note {
            margin-top: 23px;
            color: #839393;
            text-align: center;
            font-size: 10px;
        }

        .security-note span {
            color: var(--teal);
        }

        @media (max-width: 900px) {
            .layout {
                grid-template-columns: minmax(0, 1fr) minmax(320px, .9fr);
                gap: 30px;
            }

            .login-card {
                padding: 30px;
            }

            .story h1 {
                font-size: clamp(39px, 5vw, 55px);
                letter-spacing: -2.5px;
            }

            .portfolio-visual {
                height: 220px;
            }
        }

        @media (max-width: 740px) {
            .topbar {
                min-height: 68px;
                padding: 12px 5%;
            }

            .page {
                min-height: auto;
                padding: 28px 18px 40px;
            }

            .layout {
                width: min(520px, 100%);
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .story {
                padding: 8px 2px 0;
            }

            .story h1 {
                max-width: 490px;
                font-size: clamp(39px, 9vw, 53px);
            }

            .portfolio-visual {
                height: 205px;
                margin-top: 10px;
            }

            .login-card {
                padding: 30px 25px;
            }

            .login-card h2 {
                font-size: 28px;
            }
        }

        @media (max-width: 420px) {
            .brand {
                gap: 7px;
                font-size: 14px;
            }

            .brand-mark {
                width: 34px;
                height: 34px;
            }

            .top-link {
                font-size: 11px;
            }

            .story h1 {
                font-size: 38px;
            }

            .portfolio-visual {
                height: 185px;
            }

            .preview-window {
                width: 88%;
                left: 1%;
            }

            .floating-tag {
                right: 0;
                bottom: 6px;
                padding: 8px 10px;
                font-size: 9px;
            }

            .login-card {
                padding: 26px 20px;
                border-radius: 18px;
            }

            .form-options {
                align-items: flex-start;
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

        <a class="top-link" href="{{ route('register') }}">
            Create an account ↗
        </a>
    </header>

    <main class="page">
        <div class="layout">

            <section class="story">
                <div class="eyebrow">
                    <span class="eyebrow-dot"></span>
                    YOUR STORY. YOUR SPACE.
                </div>

                <h1>
                    Your portfolio.<br>
                    <span>Your story.</span>
                </h1>

                <div class="portfolio-visual" aria-label="Portfolio preview">
                    <div class="preview-window">
                        <div class="preview-topbar">
                            <span>W. / PORTFOLIO</span>
                            <span class="preview-nav">ABOUT　 WORK　 CONTACT</span>
                        </div>

                        <div class="preview-hero">
                            <div>
                                <div class="preview-label">PERSONAL PORTFOLIO</div>
                                <div class="preview-name">
                                    YOUR NAME<br>
                                    <span>YOUR WORK.</span>
                                </div>
                            </div>

                            <div class="preview-avatar">P.</div>
                        </div>

                        <div class="preview-project-title">MY PROJECTS</div>

                        <div class="preview-projects">
                            <div class="preview-project"></div>
                            <div class="preview-project"></div>
                            <div class="preview-project"></div>
                        </div>
                    </div>

                    <div class="floating-tag">
                        <span class="floating-check">✓</span>
                        Made to be yours.
                    </div>
                </div>
            </section>

            <section class="login-card" aria-label="Login">
                <div class="form-label">WELCOME BACK</div>

                <h2>Log in</h2>

                <p class="form-description">Access your portfolio.</p>

                @if (session('status'))
                    <div class="status-message" role="status">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="error-summary" role="alert">
                        Please check your details and try again.
                    </div>
                @endif

                <form
                    class="login-form"
                    method="POST"
                    action="{{ route('login') }}"
                >
                    @csrf

                    <div class="field">
                        <label for="email">Email Address</label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="you@example.com"
                            autocomplete="username"
                            required
                            autofocus
                            aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}"
                        >

                        @error('email')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="password">Password</label>

                        <div class="password-wrap">
                            <input
                                id="password"
                                type="password"
                                name="password"
                                placeholder="Enter your password"
                                autocomplete="current-password"
                                required
                                aria-invalid="{{ $errors->has('password') ? 'true' : 'false' }}"
                            >

                            <button
                                class="toggle-password"
                                id="togglePassword"
                                type="button"
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

                    <div class="form-options">
                        <label class="remember" for="remember">
                            <input
                                id="remember"
                                type="checkbox"
                                name="remember"
                                value="1"
                                {{ old('remember') ? 'checked' : '' }}
                            >
                            <span>Remember me</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a
                                class="text-link"
                                href="{{ route('password.request') }}"
                            >
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <button class="submit-button" type="submit">
                        Log In <span aria-hidden="true">→</span>
                    </button>

                    <p class="signup-prompt">
                        New here?
                        <a class="text-link" href="{{ route('register') }}">
                            Create an account
                        </a>
                    </p>

                    <div class="security-note">
                        <span>●</span> Your account is protected.
                    </div>
                </form>
            </section>

        </div>
    </main>

    <script>
        (() => {
            const password = document.getElementById('password');
            const toggle = document.getElementById('togglePassword');

            if (!password || !toggle) return;

            toggle.addEventListener('click', () => {
                const hidden = password.type === 'password';

                password.type = hidden ? 'text' : 'password';
                toggle.textContent = hidden ? 'Hide' : 'Show';
                toggle.setAttribute('aria-pressed', String(hidden));
            });
        })();
    </script>
</body>
</html>