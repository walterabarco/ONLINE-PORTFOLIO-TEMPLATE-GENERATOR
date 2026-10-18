
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f3f8f7">
    <title>Create Portfolio | Portfolio Builder</title>

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
            --danger: #b42332;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html { scroll-behavior: smooth; }

        body {
            min-height: 100vh;
            background: var(--mint);
            color: var(--ink);
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont,
                "Segoe UI", sans-serif;
            font-size: 15px;
            line-height: 1.6;
        }

        a { color: inherit; text-decoration: none; }
        button, input, textarea { font: inherit; }

        .navbar {
            min-height: 76px;
            padding: 14px 6%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            background: var(--white);
            border-bottom: 1px solid var(--border);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            font-size: 20px;
            font-weight: 850;
            letter-spacing: -.5px;
        }

        .brand-mark {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: var(--teal);
            color: var(--white);
            font-size: 22px;
            font-weight: 900;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 15px;
            border: 1px solid var(--border);
            border-radius: 9px;
            color: var(--deep-teal);
            font-size: 14px;
            font-weight: 750;
            transition: .2s;
        }

        .back-link:hover { background: var(--soft-mint); }

        .page {
            width: min(1180px, calc(100% - 40px));
            margin: 40px auto 55px;
        }

        .page-heading { margin-bottom: 28px; }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 7px 13px;
            border-radius: 999px;
            background: var(--soft-mint);
            color: var(--deep-teal);
            font-size: 12px;
            font-weight: 850;
            letter-spacing: 1.2px;
        }

        .eyebrow-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--teal);
        }

        .page-heading h1 {
            margin-top: 16px;
            font-size: clamp(32px, 4vw, 44px);
            line-height: 1.2;
            letter-spacing: -1.5px;
            font-weight: 900;
        }

        .page-heading h1 span { color: var(--teal); }

        .page-heading p {
            max-width: 700px;
            margin-top: 12px;
            color: var(--muted);
            font-size: 16px;
        }

        .editor-layout {
            display: grid;
            grid-template-columns: 235px minmax(0, 1fr);
            align-items: start;
            gap: 24px;
        }

        .side-card {
            position: sticky;
            top: 20px;
            padding: 23px 19px;
            border: 1px solid var(--border);
            border-radius: 16px;
            background: var(--white);
        }

        .side-card h2 { font-size: 16px; font-weight: 850; }

        .side-card > p {
            margin-top: 6px;
            color: var(--muted);
            font-size: 13px;
        }

        .progress-track {
            height: 7px;
            margin: 18px 0 22px;
            overflow: hidden;
            border-radius: 99px;
            background: var(--soft-mint);
        }

        .progress-track span {
            display: block;
            width: 100%;
            height: 100%;
            border-radius: inherit;
            background: var(--teal);
        }

        .side-step {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            margin-top: 19px;
        }

        .side-step-number {
            width: 31px;
            height: 31px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 9px;
            background: var(--soft-mint);
            color: var(--deep-teal);
            font-size: 13px;
            font-weight: 850;
        }

        .side-step strong { display: block; font-size: 13px; }

        .side-step small {
            display: block;
            margin-top: 3px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.5;
        }

        .side-note {
            margin-top: 25px;
            padding: 13px;
            border-radius: 10px;
            background: var(--mint);
            color: var(--muted);
            font-size: 12px;
        }

        .form-card {
            min-width: 0;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 18px;
            background: var(--white);
            box-shadow: 0 16px 45px rgba(23, 43, 43, .055);
        }

        .card-topline {
            height: 5px;
            background: linear-gradient(90deg, var(--deep-teal), var(--teal), #8acdc7);
        }

        .form-content { padding: 34px; }

        .section-heading {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 7px;
            font-size: 21px;
            line-height: 1.4;
            font-weight: 850;
        }

        .section-icon {
            width: 39px;
            height: 39px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 11px;
            background: var(--soft-mint);
            color: var(--teal);
            font-size: 14px;
            font-weight: 900;
        }

        .section-description {
            margin: 0 0 25px 52px;
            color: var(--muted);
            font-size: 14px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 21px 20px;
        }

        .form-group { min-width: 0; margin-bottom: 21px; }
        .form-grid .form-group { margin-bottom: 0; }
        .full-width { grid-column: 1 / -1; }

        .field-label {
            display: block;
            margin-bottom: 9px;
            color: var(--ink);
            font-size: 14px;
            font-weight: 800;
        }

        .required { color: var(--teal); }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"],
        input[type="file"],
        textarea {
            display: block;
            width: 100%;
            min-height: 49px;
            padding: 12px 14px;
            border: 1px solid #cbdedc;
            border-radius: 10px;
            outline: none;
            background: var(--white);
            color: var(--ink);
            font-size: 14px;
            transition: border-color .2s, box-shadow .2s;
        }

        input::placeholder, textarea::placeholder { color: #899d9c; }

        input:focus, textarea:focus {
            border-color: var(--teal);
            box-shadow: 0 0 0 4px rgba(7, 133, 141, .11);
        }

        input[aria-invalid="true"], textarea[aria-invalid="true"] {
            border-color: var(--danger);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
            line-height: 1.7;
        }

        .hint {
            margin-top: 8px;
            color: var(--muted);
            font-size: 13px;
        }

        .error {
            margin-top: 8px;
            color: var(--danger);
            font-size: 13px;
            font-weight: 650;
        }

        .error-summary {
            margin-bottom: 27px;
            padding: 17px 19px;
            border: 1px solid #f0c8cc;
            border-radius: 11px;
            background: #fff5f5;
            color: #842029;
            font-size: 14px;
        }

        .error-summary strong { display: block; margin-bottom: 6px; }
        .error-summary ul { padding-left: 22px; }

        .divider {
            height: 1px;
            margin: 30px 0;
            background: var(--border);
        }

        .upload-panel {
            padding: 20px;
            border: 1px dashed #a7ceca;
            border-radius: 13px;
            background: #f8fbfa;
        }

        input[type="file"] { padding: 8px; }

        input[type="file"]::file-selector-button {
            margin-right: 12px;
            padding: 9px 13px;
            border: none;
            border-radius: 7px;
            background: var(--soft-mint);
            color: var(--deep-teal);
            font-weight: 750;
            cursor: pointer;
        }

        .repeat-item {
            padding: 20px;
            margin-bottom: 16px;
            border: 1px solid var(--border);
            border-radius: 13px;
            background: #fbfdfc;
        }

        .repeat-item .form-grid { margin-bottom: 18px; }
        .repeat-item .form-group { margin-bottom: 0; }

        .check-label {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            color: var(--muted);
            font-size: 14px;
            font-weight: 650;
        }

        .check-label input {
            width: 17px;
            height: 17px;
            accent-color: var(--teal);
        }

        .templates {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
        }

        .template-option { position: relative; min-width: 0; }

        .template-option input {
            position: absolute;
            width: 1px;
            height: 1px;
            opacity: 0;
            pointer-events: none;
        }

        .template-card {
            display: flex;
            height: 100%;
            flex-direction: column;
            padding: 10px;
            border: 2px solid var(--border);
            border-radius: 14px;
            background: var(--white);
            cursor: pointer;
            transition: border-color .2s, background .2s, box-shadow .2s;
        }

        .template-card:hover { border-color: #80c2bd; }

        .template-option input:checked + .template-card {
            border-color: var(--teal);
            background: var(--mint);
            box-shadow: 0 0 0 3px rgba(7, 133, 141, .1);
        }

        .template-option input:focus-visible + .template-card {
            outline: 3px solid rgba(7, 133, 141, .3);
            outline-offset: 3px;
        }

        .preview-window {
            height: 175px;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 9px;
            background: var(--white);
        }

        .preview-browser {
            height: 19px;
            display: flex;
            align-items: center;
            gap: 4px;
            padding: 0 7px;
            background: #f1f6f5;
            border-bottom: 1px solid var(--border);
        }

        .preview-browser span {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: #9bb6b3;
        }

        .preview-body {
            height: calc(100% - 19px);
            padding: 12px 10px;
            overflow: hidden;
            font-size: 7px;
            line-height: 1.4;
        }

        .preview-nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 5px;
            margin-bottom: 16px;
            font-size: 6px;
            font-weight: 800;
        }

        .preview-nav span:last-child { color: var(--muted); font-weight: 600; }

        .preview-avatar {
            width: 34px;
            height: 34px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 900;
        }

        .preview-title {
            margin-bottom: 5px;
            font-size: 13px;
            line-height: 1.12;
            font-weight: 900;
            overflow-wrap: anywhere;
        }

        .preview-caption { color: var(--muted); font-size: 7px; }

        .preview-line {
            height: 4px;
            width: 90%;
            margin-top: 6px;
            border-radius: 5px;
            background: #dce9e8;
        }

        .preview-line.short { width: 60%; }

        .preview-projects {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 5px;
            margin-top: 13px;
        }

        .preview-projects span { height: 27px; border-radius: 4px; }

        .preview-simple { color: #263b3c; background: #f7fafa; }
        .preview-simple .preview-nav {
            color: var(--deep-teal);
            border-bottom: 1px solid #dce9e8;
            padding-bottom: 6px;
        }
        .preview-simple .simple-profile { text-align: center; }
        .preview-simple .preview-avatar {
            margin: 0 auto 7px;
            border-radius: 50%;
            background: var(--soft-mint);
            color: var(--teal);
        }
        .preview-simple .preview-title { color: var(--deep-teal); }
        .preview-simple .preview-line { margin-left: auto; margin-right: auto; }
        .preview-simple .preview-projects span {
            border: 1px solid var(--border);
            background: var(--white);
        }

        .preview-modern { color: #f4fafa; background: #09141c; }
        .preview-modern .preview-browser {
            background: #101f29;
            border-color: #263b43;
        }
        .preview-modern .preview-nav {
            color: #51dccb;
            border-bottom: 1px solid #263b43;
            padding-bottom: 6px;
        }
        .preview-modern .modern-profile {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .preview-modern .preview-avatar {
            border: 1px solid #51dccb;
            background: #162b36;
            color: #51dccb;
        }
        .preview-modern .preview-title { color: var(--white); }
        .preview-modern .preview-caption { color: #a6bac1; }
        .preview-modern .preview-line { background: #354c56; }
        .preview-modern .preview-projects span {
            border: 1px solid #294752;
            background: #162b36;
        }

        .preview-creative { color: #153536; background: #f8f8f2; }
        .preview-creative .preview-nav { color: var(--deep-teal); }
        .preview-creative .creative-profile {
            display: grid;
            grid-template-columns: 1fr 44px;
            align-items: center;
            gap: 5px;
        }
        .preview-creative .preview-avatar {
            width: 34px;
            height: 43px;
            border: 3px solid var(--white);
            border-radius: 45% 45% 6px 6px;
            background: var(--teal);
            color: var(--white);
            transform: rotate(3deg);
        }
        .preview-creative .preview-title { font-size: 12px; color: var(--deep-teal); }
        .preview-creative .preview-line { background: #cde7e3; }
        .preview-creative .preview-projects span:nth-child(1) { background: #d9f078; }
        .preview-creative .preview-projects span:nth-child(2) { background: var(--soft-mint); }
        .preview-creative .preview-projects span:nth-child(3) { background: #b9e1dc; }

        .template-name {
            padding: 13px 5px 3px;
            font-size: 16px;
            font-weight: 850;
        }

        .template-description {
            padding: 0 5px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.5;
        }

        .template-selected {
            display: none;
            margin: 12px 5px 4px;
            color: var(--deep-teal);
            font-size: 12px;
            font-weight: 850;
        }

        .template-option input:checked + .template-card .template-selected {
            display: block;
        }

        .buttons {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 13px;
            flex-wrap: wrap;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid var(--border);
        }

        .button {
            min-height: 45px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 10px 17px;
            border: 1px solid transparent;
            border-radius: 10px;
            background: var(--teal);
            color: var(--white);
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            transition: background .2s, transform .2s;
        }

        .button:hover {
            transform: translateY(-1px);
            background: var(--deep-teal);
        }

        .button-secondary {
            border-color: var(--border);
            background: var(--white);
            color: var(--deep-teal);
        }

        .button-secondary:hover { background: var(--soft-mint); }

        .remove-item { color: var(--danger); }

        .footer {
            padding: 0 20px 24px;
            color: #718888;
            text-align: center;
            font-size: 13px;
        }

        @media (max-width: 900px) {
            .editor-layout { grid-template-columns: 1fr; }
            .side-card { position: static; }
            .side-card > p, .progress-track, .side-note { display: none; }
            .side-steps {
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 13px;
            }
            .side-step { margin-top: 17px; }
        }

        @media (max-width: 700px) {
            .templates { grid-template-columns: 1fr; }
            .preview-window { height: 205px; }
            .preview-body { padding: 15px; }
            .preview-title { font-size: 15px; }
            .template-name { font-size: 17px; }
            .template-description { font-size: 13px; }
        }

        @media (max-width: 620px) {
            .navbar { min-height: 68px; padding: 12px 18px; }
            .brand { gap: 8px; font-size: 16px; }
            .brand-mark { width: 37px; height: 37px; font-size: 19px; }
            .back-link { padding: 9px 11px; font-size: 12px; }
            .page { width: calc(100% - 28px); margin: 27px auto 35px; }
            .page-heading { margin-bottom: 22px; }
            .page-heading h1 { font-size: 33px; }
            .page-heading p { font-size: 14px; }
            .side-card { padding: 17px; }
            .side-steps { grid-template-columns: 1fr; gap: 0; }
            .side-step { margin-top: 13px; }
            .form-content { padding: 24px 20px; }
            .section-heading { font-size: 19px; }
            .section-description { margin-left: 0; font-size: 13px; }
            .form-grid { grid-template-columns: 1fr; gap: 18px; }
            .full-width { grid-column: auto; }
            .repeat-item { padding: 15px; }
            .buttons { flex-direction: column-reverse; }
            .button { width: 100%; }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                transition-duration: .01ms !important;
                scroll-behavior: auto !important;
            }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <a class="brand" href="{{ route('home') }}">
        <span class="brand-mark">P.</span>
        <span>Portfolio Builder</span>
    </a>
    <a class="back-link" href="{{ route('portfolios.index') }}">← My Portfolios</a>
</nav>

<main class="page">
    <header class="page-heading">
        <span class="eyebrow"><span class="eyebrow-dot"></span> YOUR PORTFOLIO WORKSPACE</span>
        <h1>Create your <span>portfolio.</span></h1>
        <p>Add your details, education, skills, projects, and experience. Then choose a design for your portfolio.</p>
    </header>

    <div class="editor-layout">
        <aside class="side-card">
            <h2>Build your portfolio</h2>
            <p>Complete the details to create a portfolio that represents you.</p>
            <div class="progress-track" aria-hidden="true"><span></span></div>

            <div class="side-steps">
                <div class="side-step">
                    <span class="side-step-number">01</span>
                    <div><strong>Personal information</strong><small>Name and contact details</small></div>
                </div>
                <div class="side-step">
                    <span class="side-step-number">02</span>
                    <div><strong>Education & skills</strong><small>Your background and abilities</small></div>
                </div>
                <div class="side-step">
                    <span class="side-step-number">03</span>
                    <div><strong>Projects & experience</strong><small>Showcase your work</small></div>
                </div>
                <div class="side-step">
                    <span class="side-step-number">04</span>
                    <div><strong>Choose a design</strong><small>Simple, Modern, or Creative</small></div>
                </div>
            </div>

            <div class="side-note">Tip: You can leave optional sections empty and update your portfolio later.</div>
        </aside>

        <section class="form-card">
            <div class="card-topline"></div>
            <div class="form-content">

                @if ($errors->any())
                    <div class="error-summary" role="alert">
                        <strong>Please check the following:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="portfolio-form"
                      method="POST"
                      action="{{ route('portfolios.store') }}"
                      enctype="multipart/form-data">
                    @csrf

                    {{-- PERSONAL INFORMATION --}}
                    <h2 class="section-heading"><span class="section-icon">01</span> Personal Information</h2>
                    <p class="section-description">Tell visitors a little about yourself.</p>

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="field-label" for="full_name">Full Name <span class="required">*</span></label>
                            <input type="text" id="full_name" name="full_name"
                                   value="{{ old('full_name', auth()->user()->name) }}"
                                   maxlength="255" autocomplete="name" required>
                            @error('full_name') <div class="error">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label class="field-label" for="email">Email Address <span class="required">*</span></label>
                            <input type="email" id="email" name="email"
                                   value="{{ old('email', auth()->user()->email) }}"
                                   maxlength="255" autocomplete="email" required>
                            @error('email') <div class="error">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label class="field-label" for="phone">Phone Number</label>
                            <input type="text" id="phone" name="phone"
                                   value="{{ old('phone') }}" maxlength="30"
                                   autocomplete="tel" placeholder="e.g. 09XX XXX XXXX">
                            @error('phone') <div class="error">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label class="field-label" for="address">Address</label>
                            <input type="text" id="address" name="address"
                                   value="{{ old('address') }}" maxlength="255"
                                   autocomplete="street-address" placeholder="City, Province, Country">
                            @error('address') <div class="error">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group full-width">
                            <label class="field-label" for="about">About Me <span class="required">*</span></label>
                            <textarea id="about" name="about" required
                                      placeholder="Introduce yourself, your background, and your interests...">{{ old('about') }}</textarea>
                            <p class="hint">A few sentences about you are enough to get started.</p>
                            @error('about') <div class="error">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="divider"></div>

                    {{-- PROFILE PICTURE --}}
                    <h2 class="section-heading"><span class="section-icon">02</span> Profile Picture</h2>
                    <p class="section-description">Add a photo to personalize your portfolio. This is optional.</p>

                    <div class="form-group upload-panel">
                        <label class="field-label" for="profile_picture">Upload a picture</label>
                        <input type="file" id="profile_picture" name="profile_picture"
                               accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                        <p class="hint">JPG, JPEG, PNG, or WEBP. Maximum size: 2 MB.</p>
                        @error('profile_picture') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <div class="divider"></div>

                    {{-- EDUCATION --}}
                    <h2 class="section-heading"><span class="section-icon">03</span> Education</h2>
                    <p class="section-description">Add your school, course, and years of study.</p>

                    <div id="education-list">
                        <div class="repeat-item" data-item>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="field-label">School / University</label>
                                    <input type="text" name="educations[0][school]" maxlength="255"
                                           placeholder="School name">
                                </div>
                                <div class="form-group">
                                    <label class="field-label">Degree / Course</label>
                                    <input type="text" name="educations[0][degree]" maxlength="255"
                                           placeholder="e.g. BS Information Technology">
                                </div>
                                <div class="form-group">
                                    <label class="field-label">Start Year</label>
                                    <input type="number" name="educations[0][start_year]"
                                           min="1900" max="2100" placeholder="2024">
                                </div>
                                <div class="form-group">
                                    <label class="field-label">End Year</label>
                                    <input type="number" name="educations[0][end_year]"
                                           min="1900" max="2100" placeholder="2028">
                                </div>
                                <div class="form-group full-width">
                                    <label class="check-label">
                                        <input type="checkbox" name="educations[0][is_present]" value="1">
                                        I am currently studying here
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="button button-secondary remove-item">Remove education</button>
                        </div>
                    </div>
                    <button type="button" class="button button-secondary add-item"
                            data-target="education-list" data-template="education-template">+ Add Education</button>

                    <template id="education-template">
                        <div class="repeat-item" data-item>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="field-label">School / University</label>
                                    <input type="text" name="educations[__INDEX__][school]" maxlength="255" placeholder="School name">
                                </div>
                                <div class="form-group">
                                    <label class="field-label">Degree / Course</label>
                                    <input type="text" name="educations[__INDEX__][degree]" maxlength="255" placeholder="Degree or course">
                                </div>
                                <div class="form-group">
                                    <label class="field-label">Start Year</label>
                                    <input type="number" name="educations[__INDEX__][start_year]" min="1900" max="2100">
                                </div>
                                <div class="form-group">
                                    <label class="field-label">End Year</label>
                                    <input type="number" name="educations[__INDEX__][end_year]" min="1900" max="2100">
                                </div>
                                <div class="form-group full-width">
                                    <label class="check-label">
                                        <input type="checkbox" name="educations[__INDEX__][is_present]" value="1">
                                        I am currently studying here
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="button button-secondary remove-item">Remove education</button>
                        </div>
                    </template>

                    <div class="divider"></div>

                    {{-- SKILLS --}}
                    <h2 class="section-heading"><span class="section-icon">04</span> Skills</h2>
                    <p class="section-description">List your technical skills, tools, and areas of expertise.</p>

                    <div id="skills-list">
                        <div class="repeat-item" data-item>
                            <div class="form-group">
                                <label class="field-label">Skill Name</label>
                                <input type="text" name="skills[0][name]" maxlength="255"
                                       placeholder="e.g. HTML, CSS, PHP, Laravel">
                            </div>
                            <button type="button" class="button button-secondary remove-item">Remove skill</button>
                        </div>
                    </div>
                    <button type="button" class="button button-secondary add-item"
                            data-target="skills-list" data-template="skill-template">+ Add Skill</button>

                    <template id="skill-template">
                        <div class="repeat-item" data-item>
                            <div class="form-group">
                                <label class="field-label">Skill Name</label>
                                <input type="text" name="skills[__INDEX__][name]" maxlength="255" placeholder="Enter a skill">
                            </div>
                            <button type="button" class="button button-secondary remove-item">Remove skill</button>
                        </div>
                    </template>

                    <div class="divider"></div>

                    {{-- PROJECTS --}}
                    <h2 class="section-heading"><span class="section-icon">05</span> Projects</h2>
                    <p class="section-description">Showcase your school projects, applications, and other work.</p>

                    <div id="projects-list">
                        <div class="repeat-item" data-item>
                            <div class="form-grid">
                                <div class="form-group full-width">
                                    <label class="field-label">Project Title</label>
                                    <input type="text" name="projects[0][title]" maxlength="255" placeholder="Project title">
                                </div>
                                <div class="form-group full-width">
                                    <label class="field-label">Description</label>
                                    <textarea name="projects[0][description]" placeholder="What does your project do?"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="field-label">Technologies Used</label>
                                    <input type="text" name="projects[0][technologies]" maxlength="255"
                                           placeholder="e.g. Laravel, PHP, PostgreSQL">
                                </div>
                                <div class="form-group">
                                    <label class="field-label">Project URL</label>
                                    <input type="text" name="projects[0][link]" maxlength="255"
                                           placeholder="https://example.com">
                                </div>
                            </div>
                            <button type="button" class="button button-secondary remove-item">Remove project</button>
                        </div>
                    </div>
                    <button type="button" class="button button-secondary add-item"
                            data-target="projects-list" data-template="project-template">+ Add Project</button>

                    <template id="project-template">
                        <div class="repeat-item" data-item>
                            <div class="form-grid">
                                <div class="form-group full-width">
                                    <label class="field-label">Project Title</label>
                                    <input type="text" name="projects[__INDEX__][title]" maxlength="255" placeholder="Project title">
                                </div>
                                <div class="form-group full-width">
                                    <label class="field-label">Description</label>
                                    <textarea name="projects[__INDEX__][description]" placeholder="Describe your project"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="field-label">Technologies Used</label>
                                    <input type="text" name="projects[__INDEX__][technologies]" maxlength="255" placeholder="Technologies">
                                </div>
                                <div class="form-group">
                                    <label class="field-label">Project URL</label>
                                    <input type="text" name="projects[__INDEX__][link]" maxlength="255" placeholder="https://example.com">
                                </div>
                            </div>
                            <button type="button" class="button button-secondary remove-item">Remove project</button>
                        </div>
                    </template>

                    <div class="divider"></div>

                    {{-- WORK EXPERIENCE --}}
                    <h2 class="section-heading"><span class="section-icon">06</span> Work Experience</h2>
                    <p class="section-description">Add previous jobs, internships, or relevant experience.</p>

                    <div id="experiences-list">
                        <div class="repeat-item" data-item>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="field-label">Job Title</label>
                                    <input type="text" name="experiences[0][job_title]" maxlength="255" placeholder="e.g. Web Developer Intern">
                                </div>
                                <div class="form-group">
                                    <label class="field-label">Company</label>
                                    <input type="text" name="experiences[0][company]" maxlength="255" placeholder="Company name">
                                </div>
                                <div class="form-group">
                                    <label class="field-label">Start Date</label>
                                    <input type="date" name="experiences[0][start_date]">
                                </div>
                                <div class="form-group">
                                    <label class="field-label">End Date</label>
                                    <input type="date" name="experiences[0][end_date]">
                                </div>
                                <div class="form-group full-width">
                                    <label class="check-label">
                                        <input type="checkbox" name="experiences[0][is_current]" value="1">
                                        I currently work here
                                    </label>
                                </div>
                                <div class="form-group full-width">
                                    <label class="field-label">Description</label>
                                    <textarea name="experiences[0][description]" placeholder="Describe your responsibilities and achievements"></textarea>
                                </div>
                            </div>
                            <button type="button" class="button button-secondary remove-item">Remove experience</button>
                        </div>
                    </div>
                    <button type="button" class="button button-secondary add-item"
                            data-target="experiences-list" data-template="experience-template">+ Add Work Experience</button>

                    <template id="experience-template">
                        <div class="repeat-item" data-item>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="field-label">Job Title</label>
                                    <input type="text" name="experiences[__INDEX__][job_title]" maxlength="255" placeholder="Job title">
                                </div>
                                <div class="form-group">
                                    <label class="field-label">Company</label>
                                    <input type="text" name="experiences[__INDEX__][company]" maxlength="255" placeholder="Company name">
                                </div>
                                <div class="form-group">
                                    <label class="field-label">Start Date</label>
                                    <input type="date" name="experiences[__INDEX__][start_date]">
                                </div>
                                <div class="form-group">
                                    <label class="field-label">End Date</label>
                                    <input type="date" name="experiences[__INDEX__][end_date]">
                                </div>
                                <div class="form-group full-width">
                                    <label class="check-label">
                                        <input type="checkbox" name="experiences[__INDEX__][is_current]" value="1">
                                        I currently work here
                                    </label>
                                </div>
                                <div class="form-group full-width">
                                    <label class="field-label">Description</label>
                                    <textarea name="experiences[__INDEX__][description]" placeholder="Describe your work"></textarea>
                                </div>
                            </div>
                            <button type="button" class="button button-secondary remove-item">Remove experience</button>
                        </div>
                    </template>

                    <div class="divider"></div>

                    {{-- SOCIAL LINKS --}}
                    <h2 class="section-heading"><span class="section-icon">07</span> Social Links</h2>
                    <p class="section-description">Add links where visitors can find you online.</p>

                    <div id="social-links-list">
                        <div class="repeat-item" data-item>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="field-label">Platform</label>
                                    <input type="text" name="social_links[0][platform]" maxlength="255"
                                           placeholder="e.g. GitHub, LinkedIn">
                                </div>
                                <div class="form-group">
                                    <label class="field-label">Profile URL</label>
                                    <input type="text" name="social_links[0][url]" maxlength="255"
                                           placeholder="https://...">
                                </div>
                            </div>
                            <button type="button" class="button button-secondary remove-item">Remove link</button>
                        </div>
                    </div>
                    <button type="button" class="button button-secondary add-item"
                            data-target="social-links-list" data-template="social-template">+ Add Social Link</button>

                    <template id="social-template">
                        <div class="repeat-item" data-item>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="field-label">Platform</label>
                                    <input type="text" name="social_links[__INDEX__][platform]" maxlength="255" placeholder="e.g. GitHub">
                                </div>
                                <div class="form-group">
                                    <label class="field-label">Profile URL</label>
                                    <input type="text" name="social_links[__INDEX__][url]" maxlength="255" placeholder="https://...">
                                </div>
                            </div>
                            <button type="button" class="button button-secondary remove-item">Remove link</button>
                        </div>
                    </template>

                    <div class="divider"></div>

                    {{-- TEMPLATE SELECTION --}}
                    <h2 class="section-heading"><span class="section-icon">08</span> Choose Your Design</h2>
                    <p class="section-description">Preview the layouts below, then select the one you like.</p>

                    <div class="form-group">
                        <div class="templates">

                            <div class="template-option">
                                <input type="radio" id="simple" name="template" value="simple"
                                    {{ old('template', 'simple') === 'simple' ? 'checked' : '' }} required>
                                <label class="template-card" for="simple">
                                    <div class="preview-window">
                                        <div class="preview-browser"><span></span><span></span><span></span></div>
                                        <div class="preview-body preview-simple">
                                            <div class="preview-nav"><span>MY PORTFOLIO</span><span>ABOUT · WORK</span></div>
                                            <div class="simple-profile">
                                                <div class="preview-avatar">P.</div>
                                                <div class="preview-title">Your Name</div>
                                                <div class="preview-caption">Personal Portfolio</div>
                                                <div class="preview-line"></div>
                                                <div class="preview-line short"></div>
                                            </div>
                                            <div class="preview-projects"><span></span><span></span><span></span></div>
                                        </div>
                                    </div>
                                    <div class="template-name">Simple</div>
                                    <div class="template-description">Clean layout with a centered profile and neat project cards.</div>
                                    <div class="template-selected">✓ Selected</div>
                                </label>
                            </div>

                            <div class="template-option">
                                <input type="radio" id="modern" name="template" value="modern"
                                    {{ old('template') === 'modern' ? 'checked' : '' }} required>
                                <label class="template-card" for="modern">
                                    <div class="preview-window">
                                        <div class="preview-browser"><span></span><span></span><span></span></div>
                                        <div class="preview-body preview-modern">
                                            <div class="preview-nav"><span>PORTFOLIO / 01</span><span>ABOUT · WORK</span></div>
                                            <div class="modern-profile">
                                                <div style="flex:1; min-width:0">
                                                    <div class="preview-caption">HELLO, I'M</div>
                                                    <div class="preview-title">Your Name.</div>
                                                    <div class="preview-caption">Developer · Designer</div>
                                                    <div class="preview-line"></div>
                                                    <div class="preview-line short"></div>
                                                </div>
                                                <div class="preview-avatar">P.</div>
                                            </div>
                                            <div class="preview-projects"><span></span><span></span><span></span></div>
                                        </div>
                                    </div>
                                    <div class="template-name">Modern</div>
                                    <div class="template-description">Dark background, bold headings, and teal highlights.</div>
                                    <div class="template-selected">✓ Selected</div>
                                </label>
                            </div>

                            <div class="template-option">
                                <input type="radio" id="creative" name="template" value="creative"
                                    {{ old('template') === 'creative' ? 'checked' : '' }} required>
                                <label class="template-card" for="creative">
                                    <div class="preview-window">
                                        <div class="preview-browser"><span></span><span></span><span></span></div>
                                        <div class="preview-body preview-creative">
                                            <div class="preview-nav"><span>W. / PORTFOLIO</span><span>ABOUT · WORK</span></div>
                                            <div class="creative-profile">
                                                <div>
                                                    <div class="preview-caption">MY STORY</div>
                                                    <div class="preview-title">Your Work.</div>
                                                    <div class="preview-title">Your Style.</div>
                                                    <div class="preview-line"></div>
                                                </div>
                                                <div class="preview-avatar">P.</div>
                                            </div>
                                            <div class="preview-projects"><span></span><span></span><span></span></div>
                                        </div>
                                    </div>
                                    <div class="template-name">Creative</div>
                                    <div class="template-description">Expressive layout with playful shapes and mint accents.</div>
                                    <div class="template-selected">✓ Selected</div>
                                </label>
                            </div>

                        </div>
                        @error('template') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <div class="buttons">
                        <a href="{{ route('portfolios.index') }}" class="button button-secondary">Cancel</a>
                        <button type="submit" class="button">Create Portfolio <span aria-hidden="true">→</span></button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</main>

<footer class="footer">© {{ date('Y') }} Portfolio Builder</footer>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const counters = {
        'education-list': 1,
        'skills-list': 1,
        'projects-list': 1,
        'experiences-list': 1,
        'social-links-list': 1
    };

    document.querySelectorAll('.add-item').forEach(function (button) {
        button.addEventListener('click', function () {
            const list = document.getElementById(button.dataset.target);
            const template = document.getElementById(button.dataset.template);
            if (!list || !template) return;

            const index = counters[button.dataset.target]++;
            const html = template.innerHTML.replaceAll('__INDEX__', index);
            list.insertAdjacentHTML('beforeend', html);
        });
    });

    document.addEventListener('click', function (event) {
        const button = event.target.closest('.remove-item');
        if (!button) return;

        const item = button.closest('[data-item]');
        const list = item ? item.parentElement : null;

        if (item && list) {
            // Keep at least one editable row per section.
            if (list.querySelectorAll('[data-item]').length > 1) {
                item.remove();
            } else {
                item.querySelectorAll('input').forEach(function (input) {
                    if (input.type === 'checkbox') {
                        input.checked = false;
                    } else {
                        input.value = '';
                    }
                });
                item.querySelectorAll('textarea').forEach(function (textarea) {
                    textarea.value = '';
                });
            }
        }
    });

    const form = document.getElementById('portfolio-form');

    if (form) {
        form.addEventListener('submit', function () {
            const sectionIds = [
                'education-list',
                'skills-list',
                'projects-list',
                'experiences-list',
                'social-links-list'
            ];

            sectionIds.forEach(function (id) {
                const list = document.getElementById(id);
                if (!list) return;

                list.querySelectorAll('[data-item]').forEach(function (item) {
                    const fields = Array.from(
                        item.querySelectorAll('input:not([type="checkbox"]), textarea')
                    );

                    const hasContent = fields.some(function (field) {
                        return field.value.trim() !== '';
                    });

                    if (!hasContent) item.remove();
                });
            });
        });
    }

    // If the user marks an experience as current, clear its end date.
    document.addEventListener('change', function (event) {
        const input = event.target;

        if (input.matches('input[type="checkbox"][name$="[is_current]"]') && input.checked) {
            const item = input.closest('[data-item]');
            const endDate = item ? item.querySelector('input[name$="[end_date]"]') : null;
            if (endDate) endDate.value = '';
        }

        if (input.matches('input[type="checkbox"][name$="[is_present]"]') && input.checked) {
            const item = input.closest('[data-item]');
            const endYear = item ? item.querySelector('input[name$="[end_year]"]') : null;
            if (endYear) endYear.value = '';
        }
    });
});
</script>

</body>
</html>
