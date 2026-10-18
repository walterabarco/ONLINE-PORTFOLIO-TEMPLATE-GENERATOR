<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f3f8f7">
    <title>Forgot Password | Portfolio Builder</title>

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

        button, input {
            font: inherit;
        }

        .topbar {
            min-height: 78px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
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
            font-weight: 800;
        }

        .top-link:hover,
        .back-link:hover {
            text-decoration: underline;
        }

        .page {
            flex: 1;
            display: grid;
            place-items: center;
            padding: 42px 20px;
            background:
                radial-gradient(
                    circle at 8% 12%,
                    #e2f1ef 0,
                    transparent 28%
                ),
                radial-gradient(
                    circle at 92% 88%,
                    #e2f1ef 0,
                    transparent 25%
                ),
                var(--mint);
        }

        .reset-layout {
            width: min(1000px, 100%);
            display: grid;
            grid-template-columns: .9fr 1.1fr;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 24px;
            background: var(--white);
            box-shadow: 0 24px 65px rgba(23, 43, 43, .08);
        }

        /* LEFT PANEL */

        .intro-panel {
            position: relative;
            isolation: isolate;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
            padding: 42px 35px;
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
        }

        .intro-panel::before {
            width: 290px;
            height: 290px;
            top: -140px;
            right: -160px;
        }

        .intro-panel::after {
            width: 220px;
            height: 220px;
            right: -110px;
            bottom: -120px;
        }

        .eyebrow {
            color: #d5f4ee;
            font-size: 12px;
            font-weight: 850;
            letter-spacing: 1.7px;
        }

        .intro-content {
            margin: 45px 0;
        }

        .intro-content h1 {
            font-size: clamp(34px, 3.7vw, 46px);
            line-height: 1.16;
            letter-spacing: -1.7px;
            font-weight: 900;
        }

        .intro-content h1 span {
            color: #b9eee4;
        }

        .intro-content p {
            margin-top: 18px;
            color: rgba(255, 255, 255, .88);
            font-size: 15px;
            line-height: 1.9;
        }

        .decorative-card {
            margin-top: 28px;
            padding: 17px;
            border: 1px solid rgba(255, 255, 255, .24);
            border-radius: 14px;
            background: rgba(255, 255, 255, .11);
        }

        .decorative-heading {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            padding-bottom: 13px;
            border-bottom: 1px solid rgba(255, 255, 255, .23);
            font-size: 10px;
            font-weight: 850;
        }

        .decorative-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-top: 17px;
        }

        .decorative-avatar {
            width: 47px;
            height: 47px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: #d9f1ed;
            color: var(--deep-teal);
            font-size: 21px;
            font-weight: 900;
        }

        .decorative-lines {
            flex: 1;
            display: grid;
            gap: 9px;
        }

        .decorative-lines span {
            display: block;
            width: 85%;
            height: 7px;
            border-radius: 5px;
            background: rgba(255, 255, 255, .85);
        }

        .decorative-lines span:last-child {
            width: 55%;
            background: rgba(255, 255, 255, .4);
        }

        .decorative-projects {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
            margin-top: 16px;
        }

        .decorative-projects span {
            height: 38px;
            border: 1px solid rgba(255, 255, 255, .23);
            border-radius: 7px;
            background: rgba(255, 255, 255, .14);
        }

        .intro-footer {
            color: rgba(255, 255, 255, .8);
            font-size: 12px;
            letter-spacing: .6px;
        }

        /* RIGHT FORM */

        .form-panel {
            display: flex;
            align-items: center;
            padding: 48px;
        }

        .form-content {
            width: 100%;
        }

        .form-icon {
            width: 52px;
            height: 52px;
            display: grid;
            place-items: center;
            margin-bottom: 25px;
            border: 1px solid var(--border);
            border-radius: 15px;
            background: var(--soft-mint);
            color: var(--teal);
            font-size: 25px;
            font-weight: 900;
        }

        .form-label {
            color: var(--teal);
            font-size: 12px;
            font-weight: 900;
            letter-spacing: 1.8px;
        }

        .form-heading h2 {
            margin-top: 9px;
            font-size: 34px;
            line-height: 1.25;
            letter-spacing: -1px;
            font-weight: 900;
        }

        .form-description {
            margin-top: 12px;
            color: var(--muted);
            font-size: 15px;
            line-height: 1.8;
        }

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

        .reset-form {
            margin-top: 28px;
        }

        .field {
            margin-bottom: 22px;
        }

        .field label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 800;
        }

        .field input {
            width: 100%;
            height: 56px;
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

        .field input:focus {
            border-color: var(--teal);
            box-shadow: 0 0 0 4px rgba(7, 133, 141, .11);
        }

        .field input[aria-invalid="true"] {
            border-color: var(--danger);
        }

        .field-error {
            margin-top: 7px;
            color: var(--danger);
            font-size: 13px;
        }

        .submit-button {
            width: 100%;
            min-height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: none;
            border-radius: 10px;
            background: var(--teal);
            color: var(--white);
            font-size: 15px;
            font-weight: 850;
            cursor: pointer;
            transition: background .2s, transform .2s;
        }

        .submit-button:hover {
            transform: translateY(-1px);
            background: var(--deep-teal);
        }

        .submit-button:focus-visible {
            outline: 3px solid rgba(7, 133, 141, .3);
            outline-offset: 3px;
        }

        .back-link {
            display: block;
            margin-top: 24px;
            color: var(--deep-teal);
            text-align: center;
            font-size: 14px;
            font-weight: 800;
        }

        .footer {
            padding: 0 16px 18px;
            color: #718888;
            text-align: center;
            font-size: 12px;
        }

        /* RESPONSIVE */

        @media (max-width: 800px) {
            .reset-layout {
                width: min(560px, 100%);
                grid-template-columns: 1fr;
            }

            .intro-panel {
                padding: 29px;
            }

            .intro-content {
                margin: 25px 0 0;
            }

            .intro-content h1 {
                font-size: 35px;
            }

            .intro-content p {
                font-size: 14px;
            }

            .decorative-card {
                display: none;
            }

            .intro-footer {
                margin-top: 24px;
            }

            .form-panel {
                padding: 35px 30px;
            }
        }

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
                font-size: 12px;
            }

            .page {
                padding: 20px 14px 30px;
            }

            .reset-layout {
                border-radius: 17px;
            }

            .intro-panel {
                padding: 24px 22px;
            }

            .intro-content h1 {
                font-size: 31px;
            }

            .intro-content p {
                font-size: 14px;
            }

            .form-panel {
                padding: 28px 22px;
            }

            .form-icon {
                width: 47px;
                height: 47px;
                margin-bottom: 20px;
            }

            .form-heading h2 {
                font-size: 29px;
            }

            .form-description {
                font-size: 14px;
            }

            .field label {
                font-size: 14px;
            }

            .field input {
                height: 54px;
                font-size: 15px;
            }

            .submit-button {
                min-height: 54px;
                font-size: 14px;
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
            Back to Login
        </a>
    </header>

    <main class="page">
        <div class="reset-layout">

            <aside class="intro-panel">
                <div class="eyebrow">ACCOUNT RECOVERY</div>

                <div class="intro-content">
                    <h1>
                        Let's get you
                        <span>back in.</span>
                    </h1>

                    <p>
                        Reset your password and get back to your portfolio.
                    </p>

                    <div class="decorative-card" aria-hidden="true">
                        <div class="decorative-heading">
                            <span>MY PORTFOLIO</span>
                            <span>MY WORK</span>
                        </div>

                        <div class="decorative-profile">
                            <div class="decorative-avatar">P.</div>

                            <div class="decorative-lines">
                                <span></span>
                                <span></span>
                            </div>
                        </div>

                        <div class="decorative-projects">
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

            <section class="form-panel">
                <div class="form-content">

                    <div class="form-icon" aria-hidden="true">↗</div>

                    <div class="form-label">FORGOT PASSWORD</div>

                    <div class="form-heading">
                        <h2>Reset your password</h2>

                        <p class="form-description">
                            Enter your email address and we'll help you reset your password.
                        </p>
                    </div>

                    @if (session('status'))
                        <div class="status-message" role="status">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="error-summary" role="alert">
                            Please check your email address and try again.
                        </div>
                    @endif

                    <form
                        class="reset-form"
                        method="POST"
                        action="{{ route('password.email') }}"
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
                                autocomplete="email"
                                required
                                autofocus
                                aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}"
                            >

                            @error('email')
                                <div class="field-error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button class="submit-button" type="submit">
                            Send Reset Link <span aria-hidden="true">→</span>
                        </button>
                    </form>

                    <a class="back-link" href="{{ route('login') }}">
                        ← Back to Login
                    </a>
                </div>
            </section>

        </div>
    </main>

    <footer class="footer">
        © {{ date('Y') }} Portfolio Builder
    </footer>
</body>
</html>