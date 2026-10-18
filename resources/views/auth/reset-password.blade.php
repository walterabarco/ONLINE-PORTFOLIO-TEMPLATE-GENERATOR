<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | {{ config('app.name', 'My Portfolio') }}</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #f3f8f7, #e8f4f3);
            color: #172b2b;
        }

        .reset-wrapper {
            width: 100%;
            max-width: 460px;
        }

        .brand {
            text-align: center;
            margin-bottom: 26px;
        }

        .brand-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            background: #07858d;
            color: #fff;
            font-size: 30px;
            font-weight: bold;
            box-shadow: 0 8px 20px rgba(7, 133, 141, 0.18);
        }

        .brand h1 {
            font-size: 28px;
            line-height: 1.3;
            margin-bottom: 8px;
            color: #07565b;
        }

        .brand p {
            color: #607676;
            font-size: 14px;
            line-height: 1.6;
        }

        .reset-card {
            background: #fff;
            padding: 34px;
            border: 1px solid #e0eeec;
            border-radius: 20px;
            box-shadow: 0 12px 35px rgba(7, 86, 91, 0.09);
        }

        .field {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #234747;
            font-size: 14px;
            font-weight: 600;
        }

        input {
            display: block;
            width: 100%;
            min-width: 0;
            padding: 13px 14px;
            border: 1px solid #d4e4e2;
            border-radius: 10px;
            background: #fbfdfd;
            color: #172b2b;
            font-size: 15px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus {
            border-color: #07858d;
            box-shadow: 0 0 0 3px rgba(7, 133, 141, 0.12);
        }

        input[readonly] {
            background: #f0f7f6;
            color: #536b6b;
        }

        .error {
            margin-top: 7px;
            color: #c0392b;
            font-size: 13px;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .reset-button {
            display: block;
            width: 100%;
            margin-top: 8px;
            padding: 14px 18px;
            border: none;
            border-radius: 10px;
            background: #07858d;
            color: #fff;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s, transform 0.2s;
        }

        .reset-button:hover {
            background: #07565b;
        }

        .reset-button:active {
            transform: scale(0.99);
        }

        .footer {
            margin-top: 22px;
            text-align: center;
            color: #718585;
            font-size: 12px;
        }

        @media (max-width: 480px) {
            body {
                padding: 18px;
            }

            .brand {
                margin-bottom: 20px;
            }

            .brand h1 {
                font-size: 24px;
            }

            .reset-card {
                padding: 24px 20px;
                border-radius: 16px;
            }

            input {
                font-size: 16px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                transition: none !important;
            }
        }
    </style>
</head>
<body>
    <main class="reset-wrapper">
        <header class="brand">
            <div class="brand-icon" aria-hidden="true">P</div>
            <h1>Reset Your Password</h1>
            <p>Create a new password for your account.</p>
        </header>

        <section class="reset-card">
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <input
                    type="hidden"
                    name="token"
                    value="{{ $request->route('token') }}"
                >

                <div class="field">
                    <label for="email">Email Address</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email', $request->email) }}"
                        required
                        autofocus
                        autocomplete="username"
                    >

                    @if ($errors->has('email'))
                        <p class="error">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label for="password">New Password</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                    >

                    @if ($errors->has('password'))
                        <p class="error">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label for="password_confirmation">Confirm New Password</label>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                    >

                    @if ($errors->has('password_confirmation'))
                        <p class="error">{{ $errors->first('password_confirmation') }}</p>
                    @endif
                </div>

                <button type="submit" class="reset-button">
                    Reset Password
                </button>
            </form>
        </section>

        <footer class="footer">
            &copy; {{ date('Y') }} {{ config('app.name', 'My Portfolio') }}
        </footer>
    </main>
</body>
</html>