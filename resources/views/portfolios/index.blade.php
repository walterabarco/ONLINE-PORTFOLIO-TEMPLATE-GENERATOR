<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#07565B">
    <title>My Portfolios | Portfolio Builder</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --teal: #07565B;
            --teal-dark: #06464A;
            --teal-bright: #07858D;
            --teal-soft: #E8F4F3;
            --text: #243D3E;
            --muted: #718384;
            --white: #FFFFFF;
            --background: #F5F9F8;
            --border: #DFEAE9;
            --green: #18794E;
            --green-bg: #E9F6EE;
            --amber: #A45B12;
            --amber-bg: #FFF4E2;
            --red: #C13D3D;
            --red-bg: #FFF1F1;
            --shadow: 0 8px 28px rgba(7, 86, 91, .045);
            --heading-font: "Manrope", sans-serif;
            --body-font: "DM Sans", sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: var(--body-font);
            font-weight: 500;
            background:
                radial-gradient(ellipse at 0% 0%, rgba(7, 133, 141, .045), transparent 34%),
                var(--background);
            color: var(--text);
            line-height: 1.65;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            font: inherit;
            -webkit-tap-highlight-color: transparent;
        }

        .navbar {
            position: sticky;
            top: 0;
            z-index: 20;
            background: rgba(255, 255, 255, .96);
            border-bottom: 1px solid var(--border);
            backdrop-filter: blur(14px);
        }

        .nav-inner {
            width: min(100% - 64px, 1400px);
            min-height: 78px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            color: var(--teal);
            font-size: 19px;
            font-weight: 800;
            letter-spacing: -.6px;
        }

        .brand-mark {
            width: 40px;
            height: 40px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: var(--teal);
            color: white;
            font-size: 17px;
            font-weight: 800;
            box-shadow: 0 5px 14px rgba(7, 86, 91, .13);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-chip {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 6px 12px 6px 6px;
            border: 1px solid var(--border);
            border-radius: 50px;
            background: white;
            min-width: 0;
        }

        .user-avatar {
            width: 34px;
            height: 34px;
            flex: 0 0 34px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: var(--teal-soft);
            color: var(--teal);
            font-size: 12px;
            font-weight: 800;
        }

        .user-name {
            max-width: 170px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            font-size: 12px;
            font-weight: 700;
        }

        .logout-form {
            margin: 0;
        }

        .text-button {
            border: 0;
            background: transparent;
            color: var(--muted);
            cursor: pointer;
            padding: 9px 8px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            transition: background .2s, color .2s;
        }

        .text-button:hover {
            color: var(--teal);
            background: var(--teal-soft);
        }

        .container {
            width: min(100% - 64px, 1320px);
            margin: 44px auto 64px;
        }

        .heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 26px;
            flex-wrap: wrap;
            margin-bottom: 32px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            color: var(--teal-bright);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .eyebrow::before {
            content: "";
            width: 23px;
            height: 2px;
            background: var(--teal-bright);
            border-radius: 3px;
        }

        h1,
        h2,
        h3 {
            font-family: var(--heading-font);
            font-weight: 800;
        }

        h1 {
            margin: 0;
            color: var(--teal);
            font-size: clamp(32px, 3.4vw, 40px);
            line-height: 1.25;
            letter-spacing: -1.2px;
        }

        .heading-description {
            margin: 10px 0 0;
            color: var(--muted);
            font-size: 14px;
            font-weight: 500;
            line-height: 1.7;
        }

        .button {
            min-height: 44px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 10px 17px;
            border: 1px solid transparent;
            border-radius: 9px;
            background: var(--teal);
            color: white;
            font-size: 12px;
            font-weight: 800;
            cursor: pointer;
            transition: transform .18s, background .18s, box-shadow .18s;
        }

        .button:hover {
            background: var(--teal-dark);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 5px 13px rgba(7, 86, 91, .12);
        }

        .button-light {
            color: var(--teal);
            background: white;
            border-color: var(--border);
        }

        .button-light:hover {
            background: var(--teal-soft);
            color: var(--teal);
            box-shadow: none;
        }

        .button-danger {
            color: var(--red);
            background: white;
            border-color: #F0DADA;
        }

        .button-danger:hover {
            color: white;
            background: var(--red);
            border-color: var(--red);
            box-shadow: none;
        }

        .button-icon {
            font-family: var(--body-font);
            font-size: 18px;
            line-height: 1;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 38px;
        }

        .summary-card {
            display: flex;
            align-items: center;
            gap: 16px;
            min-width: 0;
            padding: 21px 23px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 15px;
            box-shadow: var(--shadow);
        }

        .summary-icon {
            width: 47px;
            height: 47px;
            flex: 0 0 47px;
            display: grid;
            place-items: center;
            border-radius: 13px;
            background: var(--teal-soft);
            color: var(--teal);
            font-size: 20px;
            font-weight: 800;
        }

        .summary-icon.green {
            color: var(--green);
            background: var(--green-bg);
        }

        .summary-icon.amber {
            color: var(--amber);
            background: var(--amber-bg);
        }

        .summary-label {
            color: var(--muted);
            font-size: 12px;
            font-weight: 600;
            line-height: 1.5;
        }

        .summary-value {
            margin-top: 3px;
            color: var(--teal);
            font-family: var(--heading-font);
            font-size: 28px;
            font-weight: 800;
            line-height: 1.3;
        }

        .section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 20px;
        }

        .section-heading h2 {
            margin: 0;
            color: var(--teal);
            font-size: 24px;
            letter-spacing: -.5px;
        }

        .section-caption {
            margin-top: 5px;
            color: var(--muted);
            font-size: 12px;
            font-weight: 500;
        }

        .portfolio-count {
            padding: 7px 12px;
            border: 1px solid var(--border);
            border-radius: 30px;
            background: white;
            color: var(--teal);
            font-size: 11px;
            font-weight: 800;
            white-space: nowrap;
        }

        .alert {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 14px 16px;
            border: 1px solid #CBE8D5;
            border-radius: 11px;
            margin-bottom: 22px;
            background: var(--green-bg);
            color: var(--green);
            font-size: 13px;
        }

        .alert-error {
            border-color: #F0D1D1;
            background: var(--red-bg);
            color: #992D2D;
        }

        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .portfolio-card {
            position: relative;
            min-width: 0;
            overflow: hidden;
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: var(--shadow);
            transition: transform .2s, box-shadow .2s, border-color .2s;
        }

        .portfolio-card:hover {
            transform: translateY(-2px);
            border-color: #C5DDDA;
            box-shadow: 0 14px 32px rgba(7, 86, 91, .075);
        }

        .card-accent {
            height: 3px;
            background: linear-gradient(90deg, var(--teal), var(--teal-bright), #8CDAD1);
        }

        .card-body {
            padding: 24px;
        }

        .card-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 14px;
            margin-bottom: 17px;
        }

        .portfolio-title {
            min-width: 0;
            margin: 0;
            color: var(--teal);
            font-family: var(--heading-font);
            font-size: 21px;
            font-weight: 800;
            line-height: 1.4;
            letter-spacing: -.45px;
            overflow-wrap: anywhere;
        }

        .portfolio-email {
            margin: 6px 0 0;
            color: var(--muted);
            font-size: 12px;
            font-weight: 500;
            overflow-wrap: anywhere;
        }

        .template-badge {
            flex: 0 0 auto;
            display: inline-flex;
            align-items: center;
            padding: 7px 10px;
            border: 1px solid #CFE6E3;
            border-radius: 30px;
            background: var(--teal-soft);
            color: var(--teal);
            font-size: 10px;
            font-weight: 800;
            text-transform: capitalize;
            white-space: nowrap;
        }

        .card-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
            padding-top: 16px;
            margin-top: 17px;
            border-top: 1px solid #EDF2F2;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-size: 11px;
            font-weight: 800;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: currentColor;
        }

        .published {
            color: var(--green);
        }

        .draft {
            color: var(--amber);
        }

        .created-date {
            color: var(--muted);
            font-size: 11px;
            font-weight: 500;
        }

        .card-actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 9px;
            margin-top: 19px;
        }

        .card-actions form {
            margin: 0;
        }

        .card-actions .button {
            min-height: 39px;
            padding: 9px 13px;
            font-size: 11px;
        }

        .empty {
            padding: 60px 24px;
            text-align: center;
            background: white;
            border: 1px dashed #B9D4D1;
            border-radius: 16px;
        }

        .empty-icon {
            width: 64px;
            height: 64px;
            display: grid;
            place-items: center;
            margin: 0 auto 17px;
            border-radius: 18px;
            background: var(--teal-soft);
            color: var(--teal);
            font-size: 29px;
        }

        .empty h2 {
            margin: 0;
            color: var(--teal);
            font-size: 26px;
        }

        .empty p {
            max-width: 410px;
            margin: 10px auto 22px;
            color: var(--muted);
            font-size: 13px;
        }

        .pagination {
            margin-top: 28px;
        }

        .pagination nav {
            display: flex;
            justify-content: center;
        }

        .pagination nav > div:first-child {
            display: none;
        }

        .pagination nav > div:last-child {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 5px;
        }

        .pagination a,
        .pagination span[aria-current],
        .pagination span[aria-disabled] {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            min-height: 36px;
            padding: 7px 11px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: white;
            color: var(--teal);
            font-size: 12px;
        }

        .pagination span[aria-current] {
            background: var(--teal);
            border-color: var(--teal);
            color: white;
        }

        .pagination span[aria-disabled] {
            color: #9BAAAA;
        }

        .page-footer {
            margin-top: 42px;
            text-align: center;
            color: #849697;
            font-size: 11px;
        }

        @media (max-width: 900px) {
            .portfolio-grid {
                grid-template-columns: 1fr;
            }

            .container {
                width: min(100% - 40px, 760px);
            }

            .nav-inner {
                width: calc(100% - 40px);
            }
        }

        @media (max-width: 600px) {
            .nav-inner {
                min-height: 68px;
                gap: 10px;
            }

            .brand {
                font-size: 15px;
                gap: 8px;
            }

            .brand-mark {
                width: 34px;
                height: 34px;
                border-radius: 10px;
            }

            .nav-actions {
                gap: 3px;
            }

            .user-chip {
                padding: 4px;
                border: 0;
                background: transparent;
            }

            .user-name {
                display: none;
            }

            .text-button {
                padding: 8px;
                font-size: 11px;
            }

            .container {
                width: calc(100% - 32px);
                margin-top: 28px;
            }

            .heading {
                gap: 18px;
                margin-bottom: 25px;
            }

            h1 {
                font-size: 32px;
                letter-spacing: -.8px;
            }

            .heading-description {
                font-size: 13px;
            }

            .heading > .button {
                width: 100%;
            }

            .summary-grid {
                gap: 9px;
                margin-bottom: 30px;
            }

            .summary-card {
                align-items: flex-start;
                flex-direction: column;
                gap: 10px;
                padding: 12px;
                border-radius: 12px;
            }

            .summary-icon {
                width: 34px;
                height: 34px;
                flex-basis: 34px;
                border-radius: 9px;
                font-size: 15px;
            }

            .summary-label {
                font-size: 10px;
                line-height: 1.4;
            }

            .summary-value {
                font-size: 24px;
            }

            .section-heading h2 {
                font-size: 21px;
            }

            .card-body {
                padding: 18px;
            }

            .card-top {
                flex-direction: column;
                align-items: flex-start;
            }

            .portfolio-title {
                font-size: 21px;
            }

            .card-meta {
                align-items: flex-start;
                flex-direction: column;
                gap: 8px;
            }

            .card-actions .button {
                padding: 9px 11px;
            }

            .empty {
                padding: 42px 18px;
            }

            .empty h2 {
                font-size: 23px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                transition: none !important;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-inner">
            <a class="brand" href="{{ route('portfolios.index') }}">
                <span class="brand-mark" aria-hidden="true">P</span>
                <span>Portfolio Builder</span>
            </a>

            <div class="nav-actions">
                <div class="user-chip">
                    <span class="user-avatar" aria-hidden="true">
                        {{ strtoupper(substr(auth()->user()->name ?: 'U', 0, 1)) }}
                    </span>
                    <span class="user-name">{{ auth()->user()->name }}</span>
                </div>

                <form class="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-button" type="submit">Log out</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="container">
        
<header class="heading">
    <div>
        <div class="eyebrow">Your workspace</div>
        <h1>My Portfolios</h1>
        <p class="heading-description">
            Create, customize, and manage your personal portfolio websites.
        </p>
    </div>

    <a href="{{ route('portfolios.create') }}" class="button">
        <span class="button-icon" aria-hidden="true">+</span>
        Create Portfolio
    </a>
</header>


        @if (session('success'))
            <div class="alert" role="status">
                <span aria-hidden="true">✓</span>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error" role="alert">
                <span aria-hidden="true">!</span>
                <span>Please check your form and try again.</span>
            </div>
        @endif

        <section class="summary-grid" aria-label="Portfolio summary">
            <article class="summary-card">
                <div class="summary-icon" aria-hidden="true">▤</div>
                <div>
                    <div class="summary-label">Total Portfolios</div>
                    <div class="summary-value">{{ $portfolios->total() }}</div>
                </div>
            </article>

            <article class="summary-card">
                <div class="summary-icon green" aria-hidden="true">✓</div>
                <div>
                    <div class="summary-label">Published</div>
                    <div class="summary-value">
                        {{ (clone $portfolios)->getCollection()->where('is_published', true)->count() }}
                    </div>
                </div>
            </article>

            <article class="summary-card">
                <div class="summary-icon amber" aria-hidden="true">◷</div>
                <div>
                    <div class="summary-label">Drafts on this page</div>
                    <div class="summary-value">
                        {{ (clone $portfolios)->getCollection()->where('is_published', false)->count() }}
                    </div>
                </div>
            </article>
        </section>

        <section aria-labelledby="portfolio-list-heading">
            <div class="section-heading">
                <div>
                    <h2 id="portfolio-list-heading">Your Websites</h2>
                    <p class="section-caption">
                        Manage your portfolio designs and publishing status.
                    </p>
                </div>

                <span class="portfolio-count">
                    {{ $portfolios->total() }}
                    {{ $portfolios->total() === 1 ? 'portfolio' : 'portfolios' }}
                </span>
            </div>

            @if ($portfolios->count())
                <div class="portfolio-grid">
                    @foreach ($portfolios as $portfolio)
                        <article class="portfolio-card">
                            <div class="card-accent"></div>

                            <div class="card-body">
                                <div class="card-top">
                                    <div style="min-width: 0;">
                                        <h3 class="portfolio-title">
                                            {{ $portfolio->full_name }}
                                        </h3>

                                        @if ($portfolio->email)
                                            <p class="portfolio-email">
                                                {{ $portfolio->email }}
                                            </p>
                                        @endif
                                    </div>

                                    <span class="template-badge">
                                        {{ $portfolio->template }} template
                                    </span>
                                </div>

                                <div class="card-meta">
                                    <span class="status {{ $portfolio->is_published ? 'published' : 'draft' }}">
                                        <span class="status-dot" aria-hidden="true"></span>
                                        {{ $portfolio->is_published ? 'Published' : 'Draft — not public yet' }}
                                    </span>

                                    <span class="created-date">
                                        Created {{ $portfolio->created_at->format('M d, Y') }}
                                    </span>
                                </div>

                                <div class="card-actions">
                                    <a class="button button-light"
                                       href="{{ route('portfolios.edit', $portfolio) }}">
                                        Edit Portfolio
                                    </a>

                                    @if ($portfolio->is_published)
                                        <a class="button"
                                           href="{{ route('portfolios.show', $portfolio->slug) }}"
                                           target="_blank"
                                           rel="noopener noreferrer">
                                            View Site ↗
                                        </a>
                                    @endif

                                    <form method="POST"
                                          action="{{ route('portfolios.destroy', $portfolio) }}"
                                          onsubmit="return confirm('Are you sure you want to delete this portfolio?');">
                                        @csrf
                                        @method('DELETE')

                                        <button class="button button-danger" type="submit">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="pagination">
                    {{ $portfolios->links() }}
                </div>
            @else
                <section class="empty">
                    <div class="empty-icon" aria-hidden="true">＋</div>
                    <h2>No portfolios yet</h2>
                    <p>
                        Your portfolio journey starts here. Create your first portfolio
                        and build a place to showcase your work.
                    </p>

                    
                </section>
            @endif
        </section>

        <footer class="page-footer">
            Portfolio Builder · Your work, your story.
        </footer>
    </main>
</body>
</html>
