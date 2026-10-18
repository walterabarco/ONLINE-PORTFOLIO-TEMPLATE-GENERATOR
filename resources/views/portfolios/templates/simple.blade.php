
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $portfolio->full_name }} | Portfolio</title>

    <style>
        :root {
            --deep-teal: #07565B;
            --ocean-teal: #07858D;
            --soft-mint: #E8F4F3;
            --white: #FFFFFF;
            --text: #263B3C;
            --muted: #687C7D;
            --border: #DCE9E8;
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
            font-family: Arial, Helvetica, sans-serif;
            background: #F7FAFA;
            color: var(--text);
            line-height: 1.7;
        }

        a {
            color: var(--ocean-teal);
            text-decoration: none;
            overflow-wrap: anywhere;
        }

        a:hover {
            text-decoration: underline;
        }

        .topbar {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            padding: 17px 24px;
        }

        .topbar-inner {
            max-width: 900px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
        }

        .brand {
            color: var(--deep-teal);
            font-size: 17px;
            font-weight: 800;
            letter-spacing: -0.4px;
        }

        .topbar-label {
            color: var(--muted);
            font-size: 12px;
        }

        .container {
            max-width: 850px;
            margin: 45px auto;
            padding: 0 22px 50px;
        }

        .profile-header {
            text-align: center;
            padding: 42px 28px 36px;
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(7, 86, 91, 0.05);
        }

        .profile-picture {
            width: 122px;
            height: 122px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid var(--soft-mint);
            margin-bottom: 17px;
        }

        .profile-placeholder {
            width: 122px;
            height: 122px;
            border-radius: 50%;
            background: var(--soft-mint);
            color: var(--deep-teal);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 42px;
            font-weight: 800;
            margin: 0 auto 17px;
        }

        .eyebrow {
            color: var(--ocean-teal);
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 7px;
        }

        h1 {
            color: var(--deep-teal);
            font-size: clamp(28px, 5vw, 40px);
            line-height: 1.2;
            overflow-wrap: anywhere;
        }

        .intro {
            max-width: 590px;
            margin: 13px auto 0;
            color: var(--muted);
            font-size: 15px;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .contact-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 9px;
            margin-top: 22px;
        }

        .contact-item {
            display: inline-block;
            background: var(--soft-mint);
            color: var(--deep-teal);
            padding: 7px 12px;
            border-radius: 7px;
            font-size: 12px;
            overflow-wrap: anywhere;
        }

        .section {
            margin-top: 25px;
            padding: 27px 29px;
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 14px;
        }

        .section-heading {
            color: var(--deep-teal);
            font-size: 20px;
            margin-bottom: 19px;
            padding-bottom: 12px;
            border-bottom: 2px solid var(--soft-mint);
        }

        .entry {
            padding: 0 0 18px 17px;
            margin-bottom: 18px;
            border-left: 3px solid var(--ocean-teal);
            border-bottom: 1px solid var(--border);
        }

        .entry:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .entry h3 {
            color: var(--deep-teal);
            font-size: 15px;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .entry-meta {
            color: var(--muted);
            font-size: 12px;
            margin-top: 3px;
            overflow-wrap: anywhere;
        }

        .entry-description {
            margin-top: 8px;
            font-size: 14px;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
        }

        .skill {
            padding: 8px 13px;
            border: 1px solid #C5E2DF;
            background: var(--soft-mint);
            color: var(--deep-teal);
            border-radius: 7px;
            font-size: 13px;
        }

        .social-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .social-link {
            display: inline-block;
            padding: 9px 14px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
        }

        .empty {
            color: var(--muted);
            font-size: 13px;
        }

        footer {
            text-align: center;
            color: var(--muted);
            font-size: 12px;
            padding: 8px 0 25px;
        }

        @media (max-width: 600px) {
            .container {
                margin-top: 24px;
                padding: 0 14px 30px;
            }

            .profile-header {
                padding: 30px 18px;
            }

            .section {
                padding: 22px 18px;
            }

            .topbar {
                padding: 14px 16px;
            }
        }
    </style>
</head>
<body>

    <nav class="topbar">
        <div class="topbar-inner">
            <div class="brand">MY PORTFOLIO</div>
            <div class="topbar-label">Personal Portfolio</div>
        </div>
    </nav>

    <main class="container">

        <header class="profile-header">
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

            <div class="eyebrow">Welcome to my portfolio</div>

            <h1>{{ $portfolio->full_name }}</h1>

            @if ($portfolio->about)
                <p class="intro">{{ $portfolio->about }}</p>
            @endif

            <div class="contact-list">
                @if ($portfolio->email)
                    <span class="contact-item">{{ $portfolio->email }}</span>
                @endif

                @if ($portfolio->phone)
                    <span class="contact-item">{{ $portfolio->phone }}</span>
                @endif

                @if ($portfolio->address)
                    <span class="contact-item">{{ $portfolio->address }}</span>
                @endif
            </div>
        </header>

        @if ($portfolio->educations->isNotEmpty())
            <section class="section">
                <h2 class="section-heading">Education</h2>

                @foreach ($portfolio->educations as $education)
                    <article class="entry">
                        <h3>{{ $education->degree }}</h3>
                        <div class="entry-meta">{{ $education->school }}</div>

                        @if ($education->start_year || $education->end_year || $education->is_present)
                            <div class="entry-meta">
                                {{ $education->start_year ?? '—' }}
                                —
                                {{ $education->is_present ? 'Present' : ($education->end_year ?? '—') }}
                            </div>
                        @endif
                    </article>
                @endforeach
            </section>
        @endif

        @if ($portfolio->skills->isNotEmpty())
            <section class="section">
                <h2 class="section-heading">Skills</h2>

                <div class="skills-list">
                    @foreach ($portfolio->skills as $skill)
                        <span class="skill">{{ $skill->name }}</span>
                    @endforeach
                </div>
            </section>
        @endif

        @if ($portfolio->projects->isNotEmpty())
            <section class="section">
                <h2 class="section-heading">Projects</h2>

                @foreach ($portfolio->projects as $project)
                    <article class="entry">
                        <h3>{{ $project->title }}</h3>

                        @if ($project->technologies)
                            <div class="entry-meta">{{ $project->technologies }}</div>
                        @endif

                        @if ($project->description)
                            <p class="entry-description">{{ $project->description }}</p>
                        @endif

                        @if ($project->link && in_array(strtolower(parse_url($project->link, PHP_URL_SCHEME) ?? ''), ['http', 'https']))
                            <p class="entry-description">
                                <a href="{{ $project->link }}" target="_blank" rel="noopener noreferrer">View project ↗</a>
                            </p>
                        @endif
                    </article>
                @endforeach
            </section>
        @endif

        @if ($portfolio->experiences->isNotEmpty())
            <section class="section">
                <h2 class="section-heading">Experience</h2>

                @foreach ($portfolio->experiences as $experience)
                    <article class="entry">
                        <h3>{{ $experience->job_title }}</h3>
                        <div class="entry-meta">{{ $experience->company }}</div>

                        @if ($experience->start_date || $experience->end_date || $experience->is_current)
                            <div class="entry-meta">
                                {{ $experience->start_date ?? '—' }}
                                —
                                {{ $experience->is_current ? 'Present' : ($experience->end_date ?? '—') }}
                            </div>
                        @endif

                        @if ($experience->description)
                            <p class="entry-description">{{ $experience->description }}</p>
                        @endif
                    </article>
                @endforeach
            </section>
        @endif

        @if ($portfolio->socialLinks->isNotEmpty())
            <section class="section">
                <h2 class="section-heading">Find Me Online</h2>

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
            © {{ date('Y') }} {{ $portfolio->full_name }} · Personal Portfolio
        </footer>

    </main>

</body>
</html>
