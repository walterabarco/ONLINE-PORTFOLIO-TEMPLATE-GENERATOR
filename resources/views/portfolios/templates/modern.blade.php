<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $portfolio->full_name }} | Modern Portfolio</title>

    <style>
        :root {
            --background: #09141C;
            --panel: #101F29;
            --panel-light: #162B36;
            --teal: #51DCCB;
            --mint: #B5F5EB;
            --white: #F4FAFA;
            --muted: #A6BAC1;
            --border: rgba(181, 245, 235, .13);
            --shadow: 0 20px 60px rgba(0, 0, 0, .15);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background:
                radial-gradient(ellipse at 10% 0%, rgba(39, 125, 125, .12), transparent 35%),
                var(--background);
            color: var(--white);
            font-family: Inter, -apple-system, BlinkMacSystemFont,
                "Segoe UI", Arial, sans-serif;
            line-height: 1.7;
        }

        a {
            color: var(--teal);
            text-decoration: none;
            overflow-wrap: anywhere;
        }

        a:hover {
            color: var(--mint);
        }

        .navbar {
            position: relative;
            border-bottom: 1px solid var(--border);
            padding: 18px 5%;
            background: rgba(9, 20, 28, .88);
        }

        .nav-inner {
            max-width: 1120px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .brand {
            font-weight: 850;
            letter-spacing: 2.5px;
            color: var(--teal);
            font-size: 13px;
        }

        .nav-note {
            font-size: 12px;
            color: var(--muted);
        }

        .container {
            max-width: 1120px;
            margin: 34px auto;
            padding: 0 24px;
        }

        .hero {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 290px;
            gap: 20px;
            align-items: stretch;
        }

        .hero-main,
        .sidebar,
        .section {
            background: linear-gradient(145deg, rgba(20, 42, 53, .98), rgba(14, 30, 40, .98));
            border: 1px solid var(--border);
            border-radius: 20px;
            box-shadow: var(--shadow);
        }

        .hero-main {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            padding: 38px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-height: 285px;
        }

        .hero-main::after {
            content: "";
            position: absolute;
            z-index: -1;
            width: 250px;
            height: 250px;
            right: -115px;
            top: -145px;
            border: 1px solid rgba(81, 220, 203, .16);
            border-radius: 50%;
            box-shadow: 0 0 0 30px rgba(81, 220, 203, .025),
                        0 0 0 60px rgba(81, 220, 203, .02);
        }

        .eyebrow {
            color: var(--teal);
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 11px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        h1 {
            font-size: clamp(30px, 4vw, 46px);
            letter-spacing: -1.5px;
            line-height: 1.12;
            overflow-wrap: anywhere;
            max-width: 750px;
        }

        .about {
            margin-top: 16px;
            max-width: 620px;
            color: var(--muted);
            font-size: 14px;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .hero-accent {
            width: 54px;
            height: 4px;
            background: var(--teal);
            border-radius: 5px;
            margin-top: 22px;
            box-shadow: 0 0 18px rgba(81, 220, 203, .2);
        }

        .sidebar {
            padding: 25px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .profile-picture {
            width: 88px;
            height: 88px;
            object-fit: cover;
            border-radius: 17px;
            border: 2px solid var(--teal);
            margin-bottom: 17px;
            box-shadow: 0 0 25px rgba(81, 220, 203, .1);
        }

        .profile-placeholder {
            width: 88px;
            height: 88px;
            border-radius: 17px;
            background: var(--panel-light);
            color: var(--teal);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 34px;
            font-weight: 800;
            margin-bottom: 17px;
            border: 1px solid var(--border);
        }

        .sidebar-title {
            color: var(--mint);
            font-size: 15px;
            margin-bottom: 12px;
        }

        .contact-item {
            border-top: 1px solid var(--border);
            padding: 10px 0;
            width: 100%;
            color: var(--muted);
            font-size: 12px;
            overflow-wrap: anywhere;
        }

        .section {
            margin-top: 20px;
            padding: 26px 28px;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .section-number {
            color: var(--teal);
            font-size: 11px;
            font-weight: 850;
            letter-spacing: 1px;
            background: rgba(81, 220, 203, .08);
            border: 1px solid rgba(81, 220, 203, .15);
            border-radius: 8px;
            padding: 5px 8px;
        }

        h2 {
            color: var(--white);
            font-size: 19px;
            letter-spacing: -.4px;
        }

        .section-subtitle {
            color: var(--muted);
            font-size: 11px;
            margin-left: auto;
        }

        .skills-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
        }

        .skill {
            background: rgba(81, 220, 203, .07);
            border: 1px solid rgba(81, 220, 203, .19);
            color: var(--mint);
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 12px;
        }

        .project-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .project-card {
            background: rgba(22, 43, 54, .75);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 20px;
            min-width: 0;
            transition: border-color .2s, transform .2s;
        }

        .project-card:hover {
            border-color: rgba(81, 220, 203, .4);
            transform: translateY(-2px);
        }

        .project-index {
            font-size: 10px;
            color: var(--teal);
            font-weight: 850;
            letter-spacing: 1.8px;
        }

        .project-card h3,
        .entry h3 {
            font-size: 15px;
            margin-top: 8px;
            color: var(--white);
            overflow-wrap: anywhere;
        }

        .meta {
            color: var(--teal);
            font-size: 12px;
            margin-top: 5px;
            overflow-wrap: anywhere;
        }

        .description {
            color: var(--muted);
            font-size: 13px;
            margin-top: 10px;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .timeline {
            border-left: 1px solid rgba(81, 220, 203, .45);
            margin-left: 7px;
            padding-left: 22px;
        }

        .entry {
            position: relative;
            padding-bottom: 23px;
        }

        .entry:last-child {
            padding-bottom: 0;
        }

        .entry::before {
            content: "";
            position: absolute;
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: var(--teal);
            left: -27px;
            top: 9px;
            box-shadow: 0 0 12px rgba(81, 220, 203, .25);
        }

        .education-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 13px;
        }

        .education-card {
            background: rgba(22, 43, 54, .75);
            border-radius: 12px;
            padding: 17px;
            border: 1px solid var(--border);
            min-width: 0;
        }

        .education-card h3 {
            font-size: 14px;
            overflow-wrap: anywhere;
        }

        .social-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .social-link {
            display: inline-block;
            background: rgba(81, 220, 203, .06);
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 9px 13px;
            font-size: 12px;
            transition: background .2s, border-color .2s;
        }

        .social-link:hover {
            background: rgba(81, 220, 203, .12);
            border-color: rgba(81, 220, 203, .35);
        }

        .empty {
            color: var(--muted);
            font-size: 13px;
        }

        footer {
            text-align: center;
            color: var(--muted);
            font-size: 11px;
            padding: 28px 10px;
        }

        @media (max-width: 800px) {
            .hero {
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: grid;
                grid-template-columns: auto 1fr;
                column-gap: 18px;
                align-items: center;
            }

            .sidebar .profile-picture,
            .sidebar .profile-placeholder {
                grid-row: span 2;
                margin-bottom: 0;
            }

            .sidebar-title {
                margin-bottom: 5px;
            }

            .contact-item {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 560px) {
            .container {
                margin-top: 20px;
                padding: 0 14px;
            }

            .navbar {
                padding: 16px;
            }

            .brand {
                font-size: 11px;
                letter-spacing: 1.5px;
            }

            .hero-main {
                padding: 28px 22px;
                min-height: 240px;
            }

            h1 {
                font-size: clamp(28px, 8vw, 38px);
                letter-spacing: -1px;
            }

            .section {
                padding: 21px 17px;
            }

            .project-grid,
            .education-grid {
                grid-template-columns: 1fr;
            }

            .section-subtitle {
                display: none;
            }

            .nav-note {
                font-size: 10px;
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
            <div class="brand">PORTFOLIO / 02</div>
            <div class="nav-note">Personal Profile &amp; Work</div>
        </div>
    </nav>

    <main class="container">

        <header class="hero">
            <div class="hero-main">
                <div class="eyebrow">Hello, I'm</div>
                <h1>{{ $portfolio->full_name }}</h1>

                @if ($portfolio->about)
                    <p class="about">{{ $portfolio->about }}</p>
                @endif

                <div class="hero-accent"></div>
            </div>

            <aside class="sidebar">
                @if ($portfolio->profile_picture_path)
                    <img
                        class="profile-picture"
                        src="{{ asset('storage/' . $portfolio->profile_picture_path) }}"
                        alt="{{ $portfolio->full_name }}'s profile picture"
                    >
                @else
                    <div class="profile-placeholder">
                        {{ strtoupper(substr($portfolio->full_name ?: 'P', 0, 1)) }}
                    </div>
                @endif

                <h2 class="sidebar-title">Contact Details</h2>

                @if ($portfolio->email)
                    <div class="contact-item">Email: {{ $portfolio->email }}</div>
                @endif

                @if ($portfolio->phone)
                    <div class="contact-item">Phone: {{ $portfolio->phone }}</div>
                @endif

                @if ($portfolio->address)
                    <div class="contact-item">Location: {{ $portfolio->address }}</div>
                @endif
            </aside>
        </header>

        @if ($portfolio->skills->isNotEmpty())
            <section class="section">
                <div class="section-header">
                    <span class="section-number">01</span>
                    <h2>Skills &amp; Expertise</h2>
                    <span class="section-subtitle">What I work with</span>
                </div>

                <div class="skills-grid">
                    @foreach ($portfolio->skills as $skill)
                        <span class="skill">{{ $skill->name }}</span>
                    @endforeach
                </div>
            </section>
        @endif

        @if ($portfolio->projects->isNotEmpty())
            <section class="section">
                <div class="section-header">
                    <span class="section-number">02</span>
                    <h2>Selected Projects</h2>
                    <span class="section-subtitle">My work</span>
                </div>

                <div class="project-grid">
                    @foreach ($portfolio->projects as $project)
                        <article class="project-card">
                            <div class="project-index">
                                PROJECT {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </div>

                            <h3>{{ $project->title }}</h3>

                            @if ($project->technologies)
                                <div class="meta">{{ $project->technologies }}</div>
                            @endif

                            @if ($project->description)
                                <p class="description">{{ $project->description }}</p>
                            @endif

                            @if ($project->link && in_array(strtolower(parse_url($project->link, PHP_URL_SCHEME) ?? ''), ['http', 'https']))
                                <p class="description">
                                    <a href="{{ $project->link }}" target="_blank" rel="noopener noreferrer">Explore project ↗</a>
                                </p>
                            @endif
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        @if ($portfolio->experiences->isNotEmpty())
            <section class="section">
                <div class="section-header">
                    <span class="section-number">03</span>
                    <h2>Experience</h2>
                </div>

                <div class="timeline">
                    @foreach ($portfolio->experiences as $experience)
                        <article class="entry">
                            <h3>{{ $experience->job_title }}</h3>
                            <div class="meta">{{ $experience->company }}</div>

                            @if ($experience->start_date || $experience->end_date || $experience->is_current)
                                <div class="description">
                                    {{ $experience->start_date ?? '—' }}
                                    —
                                    {{ $experience->is_current ? 'Present' : ($experience->end_date ?? '—') }}
                                </div>
                            @endif

                            @if ($experience->description)
                                <p class="description">{{ $experience->description }}</p>
                            @endif
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        @if ($portfolio->educations->isNotEmpty())
            <section class="section">
                <div class="section-header">
                    <span class="section-number">04</span>
                    <h2>Education</h2>
                </div>

                <div class="education-grid">
                    @foreach ($portfolio->educations as $education)
                        <article class="education-card">
                            <h3>{{ $education->degree }}</h3>
                            <div class="meta">{{ $education->school }}</div>

                            @if ($education->start_year || $education->end_year || $education->is_present)
                                <p class="description">
                                    {{ $education->start_year ?? '—' }}
                                    —
                                    {{ $education->is_present ? 'Present' : ($education->end_year ?? '—') }}
                                </p>
                            @endif
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        @if ($portfolio->socialLinks->isNotEmpty())
            <section class="section">
                <div class="section-header">
                    <span class="section-number">05</span>
                    <h2>Connect With Me</h2>
                </div>

                <div class="social-list">
                    @foreach ($portfolio->socialLinks as $socialLink)
                        @if (in_array(strtolower(parse_url($socialLink->url, PHP_URL_SCHEME) ?? ''), ['http', 'https']))
                            <a
                                class="social-link"
                                href="{{ $socialLink->url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                {{ $socialLink->platform }} ↗
                            </a>
                        @endif
                    @endforeach
                </div>
            </section>
        @endif

        <footer>
            © {{ date('Y') }} {{ $portfolio->full_name }}. Built with purpose.
        </footer>

    </main>

</body>
</html>
