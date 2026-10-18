
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $portfolio->full_name }} | Creative Portfolio</title>

    <style>
        :root {
            --deep: #07565B;
            --teal: #07858D;
            --mint: #E8F4F3;
            --cream: #F8F8F2;
            --ink: #153536;
            --muted: #617575;
            --lime: #D9F078;
            --white: #FFFFFF;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            color: var(--ink);
            background: var(--cream);
            line-height: 1.7;
        }

        a {
            color: var(--deep);
            text-decoration: none;
            overflow-wrap: anywhere;
        }

        a:hover {
            text-decoration: underline;
        }

        .topbar {
            max-width: 1280px;
            margin: auto;
            padding: 22px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .brand {
            font-size: 13px;
            font-weight: 900;
            letter-spacing: 2px;
            color: var(--deep);
        }

        .topbar-note {
            font-size: 12px;
            color: var(--muted);
        }

        .container {
            max-width: 1280px;
            padding: 0 5% 30px;
            margin: auto;
        }

        .hero {
            position: relative;
            display: grid;
            grid-template-columns: minmax(0, 1.35fr) minmax(250px, 0.65fr);
            gap: 35px;
            align-items: center;
            padding: 65px 0 75px;
        }

        .hero-copy {
            position: relative;
            z-index: 1;
        }

        .eyebrow {
            display: inline-block;
            background: var(--lime);
            color: var(--deep);
            padding: 7px 13px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 22px;
        }

        h1 {
            color: var(--deep);
            font-size: clamp(48px, 8vw, 100px);
            letter-spacing: -6px;
            line-height: 0.98;
            overflow-wrap: anywhere;
        }

        .hero-subtitle {
            margin-top: 25px;
            max-width: 590px;
            font-size: 16px;
            color: var(--muted);
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .hero-visual {
            position: relative;
            min-height: 350px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .shape {
            position: absolute;
            width: 280px;
            height: 300px;
            background: var(--mint);
            border-radius: 48% 52% 35% 65% / 45% 40% 60% 55%;
            transform: rotate(-10deg);
        }

        .profile-picture {
            position: relative;
            z-index: 1;
            width: 235px;
            height: 275px;
            object-fit: cover;
            border-radius: 46% 46% 18px 18px;
            border: 7px solid var(--white);
            box-shadow: 0 18px 45px rgba(7, 86, 91, 0.15);
            transform: rotate(3deg);
        }

        .profile-placeholder {
            position: relative;
            z-index: 1;
            width: 235px;
            height: 275px;
            border: 7px solid var(--white);
            border-radius: 46% 46% 18px 18px;
            background: var(--teal);
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 90px;
            font-weight: 900;
            box-shadow: 0 18px 45px rgba(7, 86, 91, 0.15);
            transform: rotate(3deg);
        }

        .floating-label {
            position: absolute;
            z-index: 2;
            right: -2px;
            bottom: 30px;
            padding: 12px 17px;
            background: var(--deep);
            color: var(--white);
            font-size: 12px;
            font-weight: 800;
            border-radius: 5px;
            transform: rotate(-4deg);
        }

        .contact-strip {
            display: flex;
            flex-wrap: wrap;
            gap: 10px 22px;
            border-top: 1px solid #D5E4E0;
            border-bottom: 1px solid #D5E4E0;
            padding: 18px 0;
            font-size: 12px;
            color: var(--muted);
        }

        .contact-strip strong {
            color: var(--deep);
        }

        .section {
            margin-top: 65px;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 20px;
            margin-bottom: 25px;
        }

        .section-kicker {
            color: var(--teal);
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 3px;
            margin-bottom: 5px;
        }

        h2 {
            color: var(--deep);
            font-size: clamp(30px, 4vw, 45px);
            line-height: 1.15;
            letter-spacing: -1.5px;
        }

        .section-note {
            color: var(--muted);
            font-size: 12px;
        }

        .skills-layout {
            display: grid;
            grid-template-columns: 0.8fr 1.2fr;
            gap: 30px;
            align-items: start;
        }

        .skills-intro {
            background: var(--deep);
            color: var(--white);
            border-radius: 14px;
            padding: 28px;
        }

        .skills-intro h3 {
            font-size: 24px;
            line-height: 1.3;
        }

        .skills-intro p {
            color: #C4DEDB;
            margin-top: 12px;
            font-size: 13px;
        }

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 11px;
        }

        .skill {
            padding: 12px 16px;
            background: var(--white);
            border: 1px solid #D5E4E0;
            border-radius: 9px;
            font-size: 13px;
            color: var(--deep);
            font-weight: 700;
        }

        .project-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 25px;
        }

        .project-card {
            background: var(--white);
            border-radius: 15px;
            overflow: hidden;
            border: 1px solid #E0EAE7;
            min-width: 0;
        }

        .project-card:nth-child(even) {
            transform: translateY(28px);
        }

        .project-art {
            min-height: 150px;
            padding: 23px;
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            background: var(--mint);
        }

        .project-card:nth-child(4n + 2) .project-art {
            background: var(--lime);
        }

        .project-card:nth-child(4n + 3) .project-art {
            background: #D8E5F8;
        }

        .project-card:nth-child(4n + 4) .project-art {
            background: #F4DDD2;
        }

        .project-number {
            font-size: 44px;
            line-height: 1;
            font-weight: 900;
            color: var(--deep);
            letter-spacing: -3px;
        }

        .project-symbol {
            font-size: 28px;
            font-weight: 900;
            color: var(--deep);
        }

        .project-content {
            padding: 25px;
        }

        .project-content h3 {
            font-size: 21px;
            color: var(--deep);
            line-height: 1.35;
            overflow-wrap: anywhere;
        }

        .project-tech {
            font-size: 11px;
            color: var(--teal);
            font-weight: 800;
            margin-top: 7px;
            overflow-wrap: anywhere;
        }

        .project-description {
            margin-top: 13px;
            font-size: 13px;
            color: var(--muted);
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .project-link {
            display: inline-block;
            margin-top: 15px;
            font-size: 12px;
            font-weight: 900;
        }

        .experience-layout {
            display: grid;
            grid-template-columns: 0.65fr 1.35fr;
            gap: 35px;
        }

        .experience-aside {
            background: var(--lime);
            border-radius: 15px;
            padding: 28px;
            align-self: start;
        }

        .experience-aside h3 {
            font-size: 27px;
            line-height: 1.25;
            color: var(--deep);
        }

        .experience-aside p {
            font-size: 13px;
            color: #456262;
            margin-top: 12px;
        }

        .experience-list {
            border-left: 2px solid #B7D5D0;
            padding-left: 25px;
        }

        .experience-entry {
            position: relative;
            padding-bottom: 28px;
        }

        .experience-entry:last-child {
            padding-bottom: 0;
        }

        .experience-entry::before {
            content: "";
            position: absolute;
            left: -32px;
            top: 9px;
            width: 11px;
            height: 11px;
            border-radius: 50%;
            background: var(--teal);
            border: 3px solid var(--cream);
        }

        .experience-entry h3,
        .education-card h3 {
            color: var(--deep);
            font-size: 17px;
            overflow-wrap: anywhere;
        }

        .meta {
            color: var(--teal);
            font-size: 12px;
            margin-top: 4px;
            overflow-wrap: anywhere;
        }

        .description {
            color: var(--muted);
            font-size: 13px;
            margin-top: 9px;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .education-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .education-card {
            background: var(--white);
            border: 1px solid #D5E4E0;
            padding: 24px;
            border-radius: 12px;
        }

        .education-card:nth-child(even) {
            background: var(--mint);
            transform: translateY(15px);
        }

        .social-section {
            background: var(--deep);
            color: var(--white);
            padding: 35px;
            border-radius: 18px;
            margin-top: 75px;
        }

        .social-section h2 {
            color: var(--white);
        }

        .social-section .section-kicker {
            color: var(--lime);
        }

        .social-list {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 22px;
        }

        .social-link {
            display: inline-block;
            padding: 10px 15px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 7px;
            color: var(--white);
            font-size: 13px;
        }

        .social-link:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .empty {
            color: var(--muted);
            font-size: 13px;
        }

        footer {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 35px 0;
            color: var(--muted);
            font-size: 12px;
        }

        @media (max-width: 800px) {
            .hero {
                grid-template-columns: 1fr;
                padding-top: 40px;
                gap: 15px;
            }

            .hero-visual {
                min-height: 310px;
            }

            .skills-layout,
            .experience-layout {
                grid-template-columns: 1fr;
            }

            .project-card:nth-child(even),
            .education-card:nth-child(even) {
                transform: none;
            }
        }

        @media (max-width: 560px) {
            .topbar {
                padding: 18px 5%;
            }

            .container {
                padding: 0 5% 20px;
            }

            h1 {
                letter-spacing: -3px;
            }

            .project-grid,
            .education-grid {
                grid-template-columns: 1fr;
            }

            .section {
                margin-top: 45px;
            }

            .section-heading {
                align-items: flex-start;
                flex-direction: column;
                gap: 7px;
            }

            .social-section {
                padding: 25px 20px;
            }

            footer {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

    <nav class="topbar">
        <div class="brand">PORTFOLIO STUDIO</div>
        <div class="topbar-note">A little about me and what I do.</div>
    </nav>

    <main class="container">

        <header class="hero">
            <div class="hero-copy">
                <div class="eyebrow">A little introduction</div>
                <h1>{{ $portfolio->full_name }}</h1>

                @if ($portfolio->about)
                    <p class="hero-subtitle">{{ $portfolio->about }}</p>
                @endif
            </div>

            <div class="hero-visual">
                <div class="shape"></div>

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

                <div class="floating-label">THIS IS ME ✦</div>
            </div>
        </header>

        <div class="contact-strip">
            @if ($portfolio->email)
                <span><strong>Email</strong> · {{ $portfolio->email }}</span>
            @endif

            @if ($portfolio->phone)
                <span><strong>Phone</strong> · {{ $portfolio->phone }}</span>
            @endif

            @if ($portfolio->address)
                <span><strong>Based in</strong> · {{ $portfolio->address }}</span>
            @endif
        </div>

        @if ($portfolio->skills->isNotEmpty())
            <section class="section">
                <div class="section-heading">
                    <div>
                        <div class="section-kicker">The toolkit</div>
                        <h2>Things I do well.</h2>
                    </div>
                    <div class="section-note">Skills & expertise</div>
                </div>

                <div class="skills-layout">
                    <div class="skills-intro">
                        <h3>Always learning. Always building.</h3>
                        <p>Here are some of the skills and tools I bring to my work.</p>
                    </div>

                    <div class="skills-list">
                        @foreach ($portfolio->skills as $skill)
                            <span class="skill">{{ $skill->name }}</span>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        @if ($portfolio->projects->isNotEmpty())
            <section class="section">
                <div class="section-heading">
                    <div>
                        <div class="section-kicker">Selected work</div>
                        <h2>Made with purpose.</h2>
                    </div>
                    <div class="section-note">Projects & experiments</div>
                </div>

                <div class="project-grid">
                    @foreach ($portfolio->projects as $project)
                        <article class="project-card">
                            <div class="project-art">
                                <span class="project-number">
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </span>
                                <span class="project-symbol">✳</span>
                            </div>

                            <div class="project-content">
                                <h3>{{ $project->title }}</h3>

                                @if ($project->technologies)
                                    <div class="project-tech">{{ $project->technologies }}</div>
                                @endif

                                @if ($project->description)
                                    <p class="project-description">{{ $project->description }}</p>
                                @endif

                                @if ($project->link && in_array(strtolower(parse_url($project->link, PHP_URL_SCHEME) ?? ''), ['http', 'https']))
                                    <a
                                        class="project-link"
                                        href="{{ $project->link }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        TAKE A LOOK ↗
                                    </a>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        @if ($portfolio->experiences->isNotEmpty())
            <section class="section">
                <div class="section-heading">
                    <div>
                        <div class="section-kicker">The journey</div>
                        <h2>Where I've been.</h2>
                    </div>
                </div>

                <div class="experience-layout">
                    <aside class="experience-aside">
                        <h3>Every experience adds a new chapter.</h3>
                        <p>A look at the roles and experiences that have helped me grow.</p>
                    </aside>

                    <div class="experience-list">
                        @foreach ($portfolio->experiences as $experience)
                            <article class="experience-entry">
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
                </div>
            </section>
        @endif

        @if ($portfolio->educations->isNotEmpty())
            <section class="section">
                <div class="section-heading">
                    <div>
                        <div class="section-kicker">The foundation</div>
                        <h2>Learning along the way.</h2>
                    </div>
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
            <section class="social-section">
                <div class="section-kicker">Say hello</div>
                <h2>Let's connect.</h2>

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
            <span>© {{ date('Y') }} {{ $portfolio->full_name }}</span>
            <span>Made to tell my story ✦</span>
        </footer>

    </main>

</body>
</html>
