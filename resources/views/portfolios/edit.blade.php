
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f4faf9">
    <title>Edit Portfolio | Portfolio Studio</title>

    @php
        $educationItems = old('educations', $portfolio->educations->toArray());
        $skillItems = old('skills', $portfolio->skills->toArray());
        $projectItems = old('projects', $portfolio->projects->toArray());
        $experienceItems = old('experiences', $portfolio->experiences->toArray());
        $socialItems = old('social_links', $portfolio->socialLinks->toArray());

        $educationItems = count($educationItems) ? $educationItems : [[]];
        $skillItems = count($skillItems) ? $skillItems : [[]];
        $projectItems = count($projectItems) ? $projectItems : [[]];
        $experienceItems = count($experienceItems) ? $experienceItems : [[]];
        $socialItems = count($socialItems) ? $socialItems : [[]];
    @endphp

    <style>
        :root {
            --teal: #07565B;
            --teal-dark: #06464A;
            --bright: #07858D;
            --light: #E8F4F3;
            --pale: #F4FAF9;
            --text: #17383A;
            --muted: #708586;
            --border: #DCE9E8;
            --white: #FFFFFF;
            --danger: #B42335;
            --shadow: 0 18px 50px rgba(7,86,91,.08);
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            font-family: Inter, -apple-system, BlinkMacSystemFont, "Segoe UI", Arial, sans-serif;
            color: var(--text);
            background: radial-gradient(ellipse at 0% 0%, #E0F1EF 0, transparent 34%), #F7FAFA;
            line-height: 1.6;
        }

        a { text-decoration: none; color: inherit; }
        button, input, textarea { font: inherit; }

        .navbar {
            min-height: 70px;
            padding: 12px 6%;
            background: rgba(255,255,255,.95);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            position: sticky;
            top: 0;
            z-index: 10;
            backdrop-filter: blur(14px);
        }

        .brand {
            color: var(--teal);
            font-size: 21px;
            font-weight: 900;
            letter-spacing: -.6px;
        }

        .brand span { color: var(--bright); }

        .back-link {
            color: var(--teal);
            font-size: 13px;
            font-weight: 750;
            padding: 9px 14px;
            border-radius: 10px;
        }

        .back-link:hover { background: var(--light); }

        .page {
            width: min(100% - 36px, 920px);
            margin: 38px auto 55px;
        }

        .page-heading { margin-bottom: 25px; }

        .eyebrow {
            display: inline-flex;
            padding: 6px 12px;
            border: 1px solid #CBE5E2;
            border-radius: 50px;
            color: var(--teal);
            background: var(--light);
            font-size: 10px;
            font-weight: 850;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        h1 {
            margin: 14px 0 7px;
            color: var(--teal);
            font-size: clamp(30px, 4vw, 42px);
            line-height: 1.2;
            letter-spacing: -1.4px;
        }

        .page-description { margin: 0; color: var(--muted); font-size: 14px; }

        .editor-card {
            overflow: hidden;
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 20px;
            box-shadow: var(--shadow);
        }

        .card-top {
            height: 6px;
            background: linear-gradient(90deg, var(--teal), var(--bright), #71BDB6);
        }

        .form-content { padding: 30px; }

        .section-heading {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 0 0 7px;
            color: var(--teal);
            font-size: 19px;
            letter-spacing: -.3px;
        }

        .section-icon {
            width: 36px;
            height: 36px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 11px;
            color: var(--teal);
            background: var(--light);
            font-size: 12px;
            font-weight: 900;
        }

        .section-description {
            margin: 0 0 22px 48px;
            color: var(--muted);
            font-size: 12px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 17px;
        }

        .form-group { min-width: 0; margin-bottom: 17px; }
        .form-grid .form-group { margin-bottom: 0; }
        .full-width { grid-column: 1 / -1; }

        .field-label {
            display: block;
            margin-bottom: 7px;
            color: #29494A;
            font-size: 13px;
            font-weight: 750;
        }

        .required { color: var(--bright); }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"],
        input[type="file"],
        textarea {
            display: block;
            width: 100%;
            min-width: 0;
            min-height: 43px;
            padding: 10px 12px;
            border: 1px solid #D5E3E2;
            border-radius: 9px;
            background: #FBFDFD;
            color: var(--text);
            font-size: 13px;
            transition: border-color .2s, box-shadow .2s;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: var(--bright);
            background: white;
            box-shadow: 0 0 0 3px rgba(7,133,141,.11);
        }

        textarea { min-height: 100px; resize: vertical; }
        .hint { margin: 7px 0 0; color: var(--muted); font-size: 11px; }

        .error { margin-top: 6px; color: var(--danger); font-size: 12px; font-weight: 600; }

        .error-summary {
            margin-bottom: 23px;
            padding: 16px 18px;
            border: 1px solid #F5C6CB;
            border-radius: 12px;
            background: #FFF1F2;
            color: #9F1239;
            font-size: 13px;
        }

        .error-summary ul { margin-bottom: 0; padding-left: 21px; }
        .divider { height: 1px; margin: 27px 0; background: var(--border); }

        .photo-panel {
            display: flex;
            align-items: center;
            gap: 17px;
            flex-wrap: wrap;
            padding: 16px;
            border: 1px dashed #B9D9D5;
            border-radius: 14px;
            background: var(--pale);
        }

        .current-photo, .photo-placeholder {
            width: 82px;
            height: 82px;
            flex-shrink: 0;
            object-fit: cover;
            border-radius: 18px;
            border: 3px solid white;
            box-shadow: 0 5px 18px rgba(7,86,91,.12);
        }

        .photo-placeholder {
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, #D6EEEA, #8BCBC3);
            color: var(--teal);
            font-size: 27px;
            font-weight: 900;
        }

        .photo-details { flex: 1; min-width: 200px; }
        .photo-details strong { display: block; margin-bottom: 4px; color: var(--teal); font-size: 13px; }
        input[type="file"] { margin-top: 9px; padding: 7px; background: white; font-size: 12px; }

        input[type="file"]::file-selector-button {
            margin-right: 9px;
            padding: 7px 10px;
            border: 0;
            border-radius: 7px;
            background: var(--light);
            color: var(--teal);
            font-weight: 750;
            cursor: pointer;
        }

        .repeat-item {
            padding: 17px;
            margin-bottom: 13px;
            border: 1px solid var(--border);
            border-radius: 13px;
            background: #FBFDFD;
        }

        .repeat-item .form-grid { margin-bottom: 15px; }

        .check-label {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            color: var(--muted);
            font-size: 12px;
            font-weight: 650;
        }

        .check-label input { width: 16px; height: 16px; accent-color: var(--teal); }

        /* DESIGN CARDS */
        .design-templates {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 15px;
        }

        .design-option { position: relative; min-width: 0; }

        .design-option > input[type="radio"] {
            position: absolute;
            width: 1px;
            height: 1px;
            opacity: 0;
            pointer-events: none;
        }

        .design-card {
            display: flex;
            height: 100%;
            min-height: 310px;
            flex-direction: column;
            padding: 11px;
            border: 2px solid #DCE9E8;
            border-radius: 16px;
            background: white;
            cursor: pointer;
            transition: border-color .2s, background .2s, box-shadow .2s;
        }

        .design-card:hover { border-color: #8EC9C3; }

        .design-option > input:checked + .design-card {
            border-color: #07858D;
            background: #F2FAF9;
            box-shadow: 0 0 0 3px rgba(7,133,141,.09);
        }

        .design-option > input:focus-visible + .design-card {
            outline: 3px solid #8BCBC3;
            outline-offset: 3px;
        }

        .preview-window {
            height: 175px;
            flex-shrink: 0;
            overflow: hidden;
            border: 1px solid #D4E5E3;
            border-radius: 11px;
            background: #F7FAFA;
        }

        .browser-bar {
            height: 20px;
            display: flex;
            align-items: center;
            gap: 4px;
            padding: 0 7px;
            border-bottom: 1px solid #D4E5E3;
            background: #F0F6F5;
        }

        .browser-bar span {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: #9BB9B6;
        }

        .preview-content { padding: 11px 10px; }

        .preview-nav {
            display: flex;
            justify-content: space-between;
            gap: 4px;
            padding-bottom: 9px;
            border-bottom: 1px solid #D9E7E5;
            font-size: 5px;
        }

        .preview-nav strong { font-size: 6px; }
        .preview-nav span { font-size: 5px; }

        /* SIMPLE PREVIEW */
        .preview-simple { background: #F7FAFA; }

        .simple-profile {
            display: flex;
            align-items: center;
            flex-direction: column;
            padding-top: 14px;
        }

        .preview-avatar {
            width: 34px;
            height: 34px;
            display: grid;
            place-items: center;
            margin-bottom: 5px;
            border-radius: 50%;
            background: #E3F4F1;
            color: #07858D;
            font-size: 13px;
            font-weight: 900;
        }

        .simple-profile > strong { color: #07565B; font-size: 12px; }
        .simple-profile > small { color: #708586; font-size: 7px; }

        .preview-lines {
            display: flex;
            align-items: center;
            flex-direction: column;
            gap: 5px;
            margin-top: 10px;
        }

        .preview-lines span {
            height: 4px;
            border-radius: 8px;
            background: #D6E8E5;
        }

        .preview-lines span:first-child { width: 85%; }
        .preview-lines span:last-child { width: 58%; }

        .preview-projects { display: flex; gap: 5px; margin-top: 10px; }

        .preview-projects span {
            height: 24px;
            flex: 1;
            border: 1px solid #D6E8E5;
            border-radius: 4px;
            background: #fff;
        }

        /* MODERN PREVIEW */
        .preview-modern {
            color: white;
            background: #08171D;
            border-color: #173A40;
        }

        .preview-modern .preview-nav {
            color: #42D0C7;
            border-color: #25444A;
        }

        .preview-modern .preview-nav span { color: #7C999A; }

        .modern-hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            padding-top: 19px;
        }

        .modern-hero > div:first-child { display: flex; flex-direction: column; }
        .modern-hero small { color: #A4B8BC; font-size: 6px; }

        .modern-hero strong {
            color: #fff;
            font-size: 15px;
            line-height: 1.1;
        }

        .modern-hero span { margin-top: 5px; color: #A4B8BC; font-size: 7px; }

        .modern-avatar {
            width: 35px;
            height: 35px;
            display: grid;
            place-items: center;
            border: 1px solid #35D0C5;
            border-radius: 10px;
            color: #42D0C7;
            font-size: 14px;
            font-weight: 900;
        }

        .modern-lines { display: flex; align-items: flex-start; flex-direction: column; gap: 5px; margin-top: 9px; }

        .modern-lines span { height: 4px; border-radius: 8px; background: #354B52; }
        .modern-lines span:first-child { width: 75%; }
        .modern-lines span:last-child { width: 48%; }

        .modern-projects { display: flex; gap: 5px; margin-top: 10px; }

        .modern-projects span {
            height: 28px;
            flex: 1;
            border: 1px solid #31515A;
            border-radius: 4px;
            background: #142F38;
        }

        /* CREATIVE PREVIEW */
        .preview-creative { background: #F9F8F0; }
        .preview-creative .preview-nav { color: #07565B; }

        .creative-hero {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 5px;
            padding-top: 18px;
        }

        .creative-hero > div:first-child { display: flex; flex-direction: column; }
        .creative-hero small { color: #708586; font-size: 6px; }

        .creative-hero strong {
            color: #07565B;
            font-size: 13px;
            line-height: 1.25;
        }

        .creative-avatar {
            width: 34px;
            height: 43px;
            display: grid;
            place-items: center;
            border: 2px solid white;
            border-radius: 14px 14px 7px 7px;
            background: #07858D;
            color: white;
            font-size: 13px;
            font-weight: 900;
            transform: rotate(4deg);
        }

        .creative-line {
            width: 72%;
            height: 5px;
            margin-top: 10px;
            border-radius: 8px;
            background: #C5E8E1;
        }

        .creative-blocks { display: flex; gap: 5px; margin-top: 11px; }

        .creative-blocks span {
            height: 25px;
            flex: 1;
            border-radius: 4px;
        }

        .creative-blocks span:nth-child(1) { background: #D9F17A; }
        .creative-blocks span:nth-child(2) { background: #E5F3F1; }
        .creative-blocks span:nth-child(3) { background: #B7E0DA; }

        .design-name { margin-top: 13px; color: #17383A; font-size: 15px; font-weight: 900; }
        .design-description { margin-top: 5px; color: #617778; font-size: 12px; line-height: 1.5; }

        .design-selected {
            margin-top: auto;
            padding-top: 12px;
            color: #07565B;
            font-size: 11px;
            font-weight: 900;
            opacity: 0;
        }

        .design-option > input:checked + .design-card .design-selected { opacity: 1; }

        /* PUBLISH SETTINGS */
        .publish-panel {
            padding: 17px;
            border: 1px solid var(--border);
            border-radius: 13px;
            background: #F7FAFA;
            margin-bottom: 20px;
        }

        .publish-label { display: flex; align-items: flex-start; gap: 12px; cursor: pointer; }
        .publish-label input { width: 17px; height: 17px; accent-color: var(--teal); margin-top: 3px; }
        .publish-label strong { display: block; color: var(--teal); font-size: 13px; }
        .publish-label small { display: block; color: var(--muted); font-size: 11px; margin-top: 4px; }

        /* BUTTONS */
        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
            padding: 21px 30px;
            border-top: 1px solid var(--border);
            background: #F8FBFB;
        }

        .action-note { max-width: 260px; color: var(--muted); font-size: 11px; }

        .buttons { display: flex; justify-content: flex-end; align-items: center; gap: 9px; flex-wrap: wrap; }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 40px;
            padding: 9px 13px;
            border: 1px solid transparent;
            border-radius: 9px;
            background: var(--teal);
            color: white;
            font-size: 12px;
            font-weight: 800;
            cursor: pointer;
            transition: transform .2s, background .2s, box-shadow .2s;
        }

        .button:hover { background: var(--teal-dark); transform: translateY(-1px); }
        .button-secondary { background: white; color: var(--teal); border-color: #D5E3E2; }
        .button-secondary:hover { background: var(--light); color: var(--teal-dark); }
        .button-preview { background: var(--bright); }
        .button-preview:hover { background: #066E75; }
        .add-item { margin-bottom: 4px; }
        .remove-item { color: var(--danger); }

        .footer { padding: 24px 15px; text-align: center; color: #849C9A; font-size: 11px; }

        @media (max-width: 700px) {
            .design-templates { grid-template-columns: 1fr; }
            .design-card { min-height: 0; }
            .preview-window { height: 190px; }
        }

        @media (max-width: 650px) {
            .navbar { min-height: 62px; padding: 10px 16px; }
            .brand { font-size: 18px; }
            .page { width: calc(100% - 24px); margin-top: 24px; }
            .form-content { padding: 21px 16px; }
            .form-grid { grid-template-columns: 1fr; gap: 15px; }
            .full-width { grid-column: auto; }
            .action-bar { padding: 18px 16px; align-items: stretch; }
            .action-note { max-width: none; }
            .buttons { display: grid; grid-template-columns: 1fr 1fr; width: 100%; }
            .button { width: 100%; padding: 10px 7px; font-size: 11px; }
            .button-preview { grid-column: 1 / -1; }
            h1 { font-size: 31px; }
            .photo-panel { align-items: flex-start; }
            .section-description { margin-left: 0; }
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
    <a class="brand" href="{{ route('home') }}">Portfolio <span>Studio</span></a>
    <a class="back-link" href="{{ route('portfolios.index') }}">← My Portfolios</a>
</nav>

<main class="page">
    <header class="page-heading">
        <span class="eyebrow">✦ Portfolio Workspace</span>
        <h1>Edit your portfolio<span style="color:#07858D">.</span></h1>
        <p class="page-description">Update your information and choose the design that represents you.</p>
    </header>

    <section class="editor-card">
        <div class="card-top"></div>

        <div class="form-content">
            @if ($errors->any())
                <div class="error-summary" role="alert">
                    <strong>Please fix the following errors:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="portfolio-form"
                  method="POST"
                  action="{{ route('portfolios.update', $portfolio) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- 01 PERSONAL INFORMATION --}}
                <h2 class="section-heading"><span class="section-icon">01</span> Personal information</h2>
                <p class="section-description">These details appear on your portfolio website.</p>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="field-label" for="full_name">Full Name <span class="required">*</span></label>
                        <input id="full_name" name="full_name" type="text" maxlength="255"
                               value="{{ old('full_name', $portfolio->full_name) }}" required>
                        @error('full_name') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label class="field-label" for="email">Email Address <span class="required">*</span></label>
                        <input id="email" name="email" type="email" maxlength="255"
                               value="{{ old('email', $portfolio->email) }}" required>
                        @error('email') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label class="field-label" for="phone">Phone Number</label>
                        <input id="phone" name="phone" type="text" maxlength="30"
                               value="{{ old('phone', $portfolio->phone) }}">
                        @error('phone') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label class="field-label" for="address">Address</label>
                        <input id="address" name="address" type="text" maxlength="255"
                               value="{{ old('address', $portfolio->address) }}">
                        @error('address') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group full-width">
                        <label class="field-label" for="about">About Me <span class="required">*</span></label>
                        <textarea id="about" name="about" required>{{ old('about', $portfolio->about) }}</textarea>
                        @error('about') <div class="error">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="divider"></div>

                {{-- 02 PROFILE PICTURE --}}
                <h2 class="section-heading"><span class="section-icon">02</span> Profile picture</h2>
                <p class="section-description">Upload a new picture if you want to replace your current picture.</p>

                <div class="photo-panel">
                    @if ($portfolio->profile_picture_path)
                        <img class="current-photo"
                             src="{{ asset('storage/' . $portfolio->profile_picture_path) }}"
                             alt="Current profile picture">
                    @else
                        <div class="photo-placeholder">{{ strtoupper(substr($portfolio->full_name, 0, 1)) }}</div>
                    @endif

                    <div class="photo-details">
                        <strong>Your profile image</strong>
                        <input id="profile_picture" name="profile_picture" type="file"
                               accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                        <p class="hint">JPG, JPEG, PNG, or WEBP · Maximum 2 MB</p>
                        @error('profile_picture') <div class="error">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="divider"></div>

                {{-- 03 EDUCATION --}}
                <h2 class="section-heading"><span class="section-icon">03</span> Education</h2>
                <p class="section-description">Edit your schools, courses, and years of study.</p>

                <div id="education-list">
                    @foreach ($educationItems as $i => $item)
                        <div class="repeat-item" data-item>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="field-label">School / University</label>
                                    <input type="text" name="educations[{{ $i }}][school]" maxlength="255"
                                           value="{{ data_get($item, 'school', '') }}" placeholder="School name">
                                    @error("educations.$i.school") <div class="error">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group">
                                    <label class="field-label">Degree / Course</label>
                                    <input type="text" name="educations[{{ $i }}][degree]" maxlength="255"
                                           value="{{ data_get($item, 'degree', '') }}" placeholder="Degree or course">
                                    @error("educations.$i.degree") <div class="error">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group">
                                    <label class="field-label">Start Year</label>
                                    <input type="number" name="educations[{{ $i }}][start_year]" min="1900" max="2100"
                                           value="{{ data_get($item, 'start_year', '') }}">
                                </div>

                                <div class="form-group">
                                    <label class="field-label">End Year</label>
                                    <input type="number" name="educations[{{ $i }}][end_year]" min="1900" max="2100"
                                           value="{{ data_get($item, 'end_year', '') }}">
                                </div>

                                <div class="form-group full-width">
                                    <label class="check-label">
                                        <input type="checkbox" name="educations[{{ $i }}][is_present]" value="1"
                                            {{ data_get($item, 'is_present') ? 'checked' : '' }}>
                                        I am currently studying here
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="button button-secondary remove-item">Remove education</button>
                        </div>
                    @endforeach
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

                {{-- 04 SKILLS --}}
                <h2 class="section-heading"><span class="section-icon">04</span> Skills</h2>
                <p class="section-description">Add or update your technical skills and areas of expertise.</p>

                <div id="skills-list">
                    @foreach ($skillItems as $i => $item)
                        <div class="repeat-item" data-item>
                            <div class="form-group">
                                <label class="field-label">Skill Name</label>
                                <input type="text" name="skills[{{ $i }}][name]" maxlength="255"
                                       value="{{ data_get($item, 'name', '') }}" placeholder="e.g. HTML, CSS, Laravel">
                                @error("skills.$i.name") <div class="error">{{ $message }}</div> @enderror
                            </div>
                            <button type="button" class="button button-secondary remove-item">Remove skill</button>
                        </div>
                    @endforeach
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

                {{-- 05 PROJECTS --}}
                <h2 class="section-heading"><span class="section-icon">05</span> Projects</h2>
                <p class="section-description">Showcase your school projects, applications, and other work.</p>

                <div id="projects-list">
                    @foreach ($projectItems as $i => $item)
                        <div class="repeat-item" data-item>
                            <div class="form-grid">
                                <div class="form-group full-width">
                                    <label class="field-label">Project Title</label>
                                    <input type="text" name="projects[{{ $i }}][title]" maxlength="255"
                                           value="{{ data_get($item, 'title', '') }}" placeholder="Project title">
                                    @error("projects.$i.title") <div class="error">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group full-width">
                                    <label class="field-label">Description</label>
                                    <textarea name="projects[{{ $i }}][description]" placeholder="Describe your project">{{ data_get($item, 'description', '') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label class="field-label">Technologies Used</label>
                                    <input type="text" name="projects[{{ $i }}][technologies]" maxlength="255"
                                           value="{{ data_get($item, 'technologies', '') }}" placeholder="Laravel, PHP, PostgreSQL">
                                </div>

                                <div class="form-group">
                                    <label class="field-label">Project URL</label>
                                    <input type="text" name="projects[{{ $i }}][link]" maxlength="255"
                                           value="{{ data_get($item, 'link', '') }}" placeholder="https://example.com">
                                </div>
                            </div>
                            <button type="button" class="button button-secondary remove-item">Remove project</button>
                        </div>
                    @endforeach
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

                {{-- 06 WORK EXPERIENCE --}}
                <h2 class="section-heading"><span class="section-icon">06</span> Work Experience</h2>
                <p class="section-description">Add jobs, internships, or relevant experience.</p>

                <div id="experiences-list">
                    @foreach ($experienceItems as $i => $item)
                        <div class="repeat-item" data-item>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="field-label">Job Title</label>
                                    <input type="text" name="experiences[{{ $i }}][job_title]" maxlength="255"
                                           value="{{ data_get($item, 'job_title', '') }}" placeholder="Job title">
                                    @error("experiences.$i.job_title") <div class="error">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group">
                                    <label class="field-label">Company</label>
                                    <input type="text" name="experiences[{{ $i }}][company]" maxlength="255"
                                           value="{{ data_get($item, 'company', '') }}" placeholder="Company name">
                                    @error("experiences.$i.company") <div class="error">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group">
                                    <label class="field-label">Start Date</label>
                                    <input type="date" name="experiences[{{ $i }}][start_date]"
                                           value="{{ data_get($item, 'start_date') ? \Illuminate\Support\Carbon::parse(data_get($item, 'start_date'))->format('Y-m-d') : '' }}">
                                </div>

                                <div class="form-group">
                                    <label class="field-label">End Date</label>
                                    <input type="date" name="experiences[{{ $i }}][end_date]"
                                           value="{{ data_get($item, 'end_date') ? \Illuminate\Support\Carbon::parse(data_get($item, 'end_date'))->format('Y-m-d') : '' }}">
                                </div>

                                <div class="form-group full-width">
                                    <label class="check-label">
                                        <input type="checkbox" name="experiences[{{ $i }}][is_current]" value="1"
                                            {{ data_get($item, 'is_current') ? 'checked' : '' }}>
                                        I currently work here
                                    </label>
                                </div>

                                <div class="form-group full-width">
                                    <label class="field-label">Description</label>
                                    <textarea name="experiences[{{ $i }}][description]" placeholder="Describe your responsibilities">{{ data_get($item, 'description', '') }}</textarea>
                                </div>
                            </div>
                            <button type="button" class="button button-secondary remove-item">Remove experience</button>
                        </div>
                    @endforeach
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
                                <label class="check-label"><input type="checkbox" name="experiences[__INDEX__][is_current]" value="1"> I currently work here</label>
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

                {{-- 07 SOCIAL LINKS --}}
                <h2 class="section-heading"><span class="section-icon">07</span> Social Links</h2>
                <p class="section-description">Add your GitHub, LinkedIn, Facebook, or other profile links.</p>

                <div id="social-links-list">
                    @foreach ($socialItems as $i => $item)
                        <div class="repeat-item" data-item>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="field-label">Platform</label>
                                    <input type="text" name="social_links[{{ $i }}][platform]" maxlength="255"
                                           value="{{ data_get($item, 'platform', '') }}" placeholder="e.g. GitHub">
                                    @error("social_links.$i.platform") <div class="error">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group">
                                    <label class="field-label">Profile URL</label>
                                    <input type="text" name="social_links[{{ $i }}][url]" maxlength="255"
                                           value="{{ data_get($item, 'url', '') }}" placeholder="https://...">
                                    @error("social_links.$i.url") <div class="error">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <button type="button" class="button button-secondary remove-item">Remove link</button>
                        </div>
                    @endforeach
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

                {{-- 08 WEBSITE VISIBILITY --}}
                <h2 class="section-heading"><span class="section-icon">08</span> Website visibility</h2>
                <p class="section-description">Choose whether your portfolio is public or remains a private draft.</p>

                <div class="publish-panel">
                    <input type="hidden" name="is_published" value="0">

                    <label class="publish-label" for="is_published">
                        <input id="is_published" type="checkbox" name="is_published" value="1"
                            {{ (string) old('is_published', (int) $portfolio->is_published) === '1' ? 'checked' : '' }}>
                        <span>
                            <strong>Publish my portfolio</strong>
                            <small>When enabled, anyone with your portfolio link can view your website. When disabled, it stays a draft.</small>
                        </span>
                    </label>
                </div>

                <div class="divider"></div>

                {{-- 09 CHOOSE YOUR DESIGN --}}
                <h2 class="section-heading"><span class="section-icon">09</span> Choose Your Design</h2>
                <p class="section-description">Preview the layouts below, then select the one you like.</p>

                <div class="design-templates">

                    {{-- SIMPLE --}}
                    <div class="design-option">
                        <input id="simple" type="radio" name="template" value="simple"
                            {{ old('template', $portfolio->template) === 'simple' ? 'checked' : '' }} required>

                        <label class="design-card" for="simple">
                            <div class="preview-window preview-simple">
                                <div class="browser-bar"><span></span><span></span><span></span></div>

                                <div class="preview-content">
                                    <div class="preview-nav">
                                        <strong>MY PORTFOLIO</strong>
                                        <span>ABOUT · WORK</span>
                                    </div>

                                    <div class="simple-profile">
                                        <div class="preview-avatar">P.</div>
                                        <strong>Your Name</strong>
                                        <small>Personal Portfolio</small>
                                    </div>

                                    <div class="preview-lines"><span></span><span></span></div>
                                    <div class="preview-projects"><span></span><span></span><span></span></div>
                                </div>
                            </div>

                            <strong class="design-name">Simple</strong>
                            <span class="design-description">Clean layout with a centered profile and neat project cards.</span>
                            <span class="design-selected">✓ Selected</span>
                        </label>
                    </div>

                    {{-- MODERN --}}
                    <div class="design-option">
                        <input id="modern" type="radio" name="template" value="modern"
                            {{ old('template', $portfolio->template) === 'modern' ? 'checked' : '' }}>

                        <label class="design-card" for="modern">
                            <div class="preview-window preview-modern">
                                <div class="browser-bar"><span></span><span></span><span></span></div>

                                <div class="preview-content">
                                    <div class="preview-nav">
                                        <strong>PORTFOLIO / 01</strong>
                                        <span>ABOUT · WORK</span>
                                    </div>

                                    <div class="modern-hero">
                                        <div>
                                            <small>HELLO, I'M</small>
                                            <strong>Your Name.</strong>
                                            <span>Developer · Designer</span>
                                        </div>
                                        <div class="modern-avatar">P.</div>
                                    </div>

                                    <div class="modern-lines"><span></span><span></span></div>
                                    <div class="modern-projects"><span></span><span></span><span></span></div>
                                </div>
                            </div>

                            <strong class="design-name">Modern</strong>
                            <span class="design-description">Dark background, bold headings, and teal highlights.</span>
                            <span class="design-selected">✓ Selected</span>
                        </label>
                    </div>

                    {{-- CREATIVE --}}
                    <div class="design-option">
                        <input id="creative" type="radio" name="template" value="creative"
                            {{ old('template', $portfolio->template) === 'creative' ? 'checked' : '' }}>

                        <label class="design-card" for="creative">
                            <div class="preview-window preview-creative">
                                <div class="browser-bar"><span></span><span></span><span></span></div>

                                <div class="preview-content">
                                    <div class="preview-nav">
                                        <strong>W./ PORTFOLIO</strong>
                                        <span>ABOUT · WORK</span>
                                    </div>

                                    <div class="creative-hero">
                                        <div>
                                            <small>MY STORY</small>
                                            <strong>Your Work.<br>Your Style.</strong>
                                        </div>
                                        <div class="creative-avatar">P.</div>
                                    </div>

                                    <div class="creative-line"></div>
                                    <div class="creative-blocks"><span></span><span></span><span></span></div>
                                </div>
                            </div>

                            <strong class="design-name">Creative</strong>
                            <span class="design-description">Expressive layout with playful shapes and mint accents.</span>
                            <span class="design-selected">✓ Selected</span>
                        </label>
                    </div>

                </div>

                @error('template')
                    <div class="error">{{ $message }}</div>
                @enderror

            </form>
        </div>

        <div class="action-bar">
            <p class="action-note">Your changes are saved when you click Save Changes.</p>

            <div class="buttons">
                <a href="{{ route('portfolios.preview', $portfolio) }}"
                   class="button button-preview" target="_blank" rel="noopener noreferrer">
                    Preview Portfolio ↗
                </a>

                <a href="{{ route('portfolios.index') }}" class="button button-secondary">Cancel</a>

                <button type="submit" form="portfolio-form" class="button">Save Changes →</button>
            </div>
        </div>
    </section>
</main>

<footer class="footer">Portfolio Studio · Your story, your style.</footer>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const sectionIds = [
        'education-list',
        'skills-list',
        'projects-list',
        'experiences-list',
        'social-links-list'
    ];

    const counters = {};

    sectionIds.forEach(function (id) {
        const list = document.getElementById(id);
        counters[id] = list ? list.querySelectorAll('[data-item]').length : 0;
    });

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
        if (!item) return;

        const list = item.parentElement;
        const items = list.querySelectorAll('[data-item]');

        if (items.length > 1) {
            item.remove();
            return;
        }

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
    });

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
