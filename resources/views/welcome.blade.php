<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Create your personal portfolio website with Portfolio Builder. Choose a template, showcase your work, and share your story.">
    <meta name="theme-color" content="#f3f8f7">
    <title>Portfolio Builder — Make Your Mark</title>

    <style>
        :root {
            --ink: #172b2b;
            --ink-soft: #e8f4f3;
            --panel: #ffffff;
            --paper: #f3f8f7;
            --lime: #07858d;
            --muted: #687c7d;
            --line: rgba(23,43,43,.14);
            --radius: 20px;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; scroll-padding-top: 90px; }
        body {
            font-family: Inter, ui-sans-serif, system-ui, -apple-system,
                BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: var(--paper);
            color: var(--ink);
            line-height: 1.6;
        }
        a { color: inherit; text-decoration: none; }
        button, a { -webkit-tap-highlight-color: transparent; }
        a:focus-visible { outline: 2px solid var(--lime); outline-offset: 4px; }
        .container { width: min(1160px, 90%); margin-inline: auto; }

        .navbar {
            position: sticky;
            top: 0;
            z-index: 20;
            background: rgba(243,248,247,.94);
            backdrop-filter: blur(18px);
            border-bottom: 1px solid #d5e5e3;
        }
        .nav-inner {
            min-height: 76px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 22px;
        }
        .brand {
            display: inline-flex;
            align-items: center;
            gap: 11px;
            font-size: 17px;
            font-weight: 850;
            letter-spacing: -.7px;
        }
        .brand-mark {
            display: grid;
            place-items: center;
            width: 38px;
            height: 38px;
            color: white;
            background: var(--lime);
            border-radius: 11px;
            font-size: 21px;
            font-weight: 950;
        }
        .brand span:last-child { white-space: nowrap; }
        .nav-links { display: flex; align-items: center; gap: 28px; }
        .nav-links a {
            color: #526b6c;
            font-size: 13px;
            font-weight: 650;
            transition: color .2s;
        }
        .nav-links a:hover { color: var(--lime); }
        .nav-actions { display: flex; align-items: center; gap: 10px; }

        .button {
            min-height: 45px;
            padding: 0 18px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            border: 1px solid transparent;
            border-radius: 9px;
            font: inherit;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
            transition: transform .2s, background .2s, border-color .2s;
        }
        .button:hover { transform: translateY(-2px); }
        .button-primary { color: white; background: var(--lime); }
        .button-primary:hover { background: #056d73; }
        .button-outline { border-color: #d5e5e3; background: transparent; }
        .button-outline:hover { border-color: var(--lime); }
        .button-dark { color: white; background: var(--ink); }
        .arrow { font-size: 17px; line-height: 1; }

        .hero {
            position: relative;
            overflow: hidden;
            padding: 90px 0 95px;
            background:
                radial-gradient(ellipse at 83% 34%, rgba(7,133,141,.10), transparent 36%),
                radial-gradient(ellipse at 10% 90%, rgba(7,133,141,.045), transparent 32%),
                var(--paper);
        }
        .hero-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 65px;
        }
        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 7px 11px;
            border: 1px solid rgba(7,133,141,.28);
            border-radius: 5px;
            color: var(--lime);
            font-size: 10px;
            font-weight: 850;
            letter-spacing: 1.4px;
            text-transform: uppercase;
        }
        .eyebrow-dot {
            width: 7px;
            height: 7px;
            background: var(--lime);
            border-radius: 50%;
            box-shadow: 0 0 12px rgba(7,133,141,.35);
        }
        .hero h1 {
            max-width: 650px;
            margin-top: 25px;
            font-size: clamp(44px, 6.2vw, 76px);
            font-weight: 900;
            line-height: .99;
            letter-spacing: -4.5px;
        }
        .hero h1 span { color: var(--lime); }
        .hero-description {
            max-width: 485px;
            margin-top: 23px;
            color: #526b6c;
            font-size: 15px;
            line-height: 1.9;
        }
        .hero-buttons { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 30px; }
        .hero-note { margin-top: 19px; color: #687c7d; font-size: 11px; }

        .hero-art { position: relative; min-width: 0; padding: 10px 0 22px 12px; }
        .art-glow {
            position: absolute;
            inset: 12% 5%;
            background: rgba(7,133,141,.12);
            filter: blur(60px);
            border-radius: 50%;
        }
        .browser {
            position: relative;
            z-index: 1;
            padding: 13px;
            border: 1px solid #d5e5e3;
            border-radius: 15px;
            background: #e8f4f3;
            box-shadow: 0 30px 90px rgba(23,43,43,.12);
            transform: rotate(1.2deg);
        }
        .browser-top {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 2px 4px 13px;
        }
        .browser-dot { width: 7px; height: 7px; background: #9bb6b4; border-radius: 50%; }
        .browser-address {
            flex: 1;
            margin-left: 8px;
            padding: 5px;
            border-radius: 5px;
            background: #ffffff;
            color: #687c7d;
            text-align: center;
            font-size: 9px;
        }
        .mock-site {
            min-height: 340px;
            padding: 20px;
            color: var(--ink);
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }
        .mock-nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding-bottom: 12px;
            border-bottom: 1px solid #dedfd5;
            font-size: 8px;
            font-weight: 900;
        }
        .mock-nav-links { display: flex; gap: 12px; color: #687c7d; font-size: 7px; }
        .mock-hero {
            display: grid;
            grid-template-columns: 1fr 100px;
            gap: 13px;
            align-items: center;
            padding: 29px 0 24px;
        }
        .mock-tag {
            color: #687c7d;
            font-size: 8px;
            font-weight: 800;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }
        .mock-name {
            margin-top: 8px;
            font-size: clamp(22px, 3vw, 35px);
            line-height: .98;
            letter-spacing: -1.7px;
            font-weight: 950;
            overflow-wrap: anywhere;
        }
        .mock-name span { color: #07858d; }
        .mock-copy { margin-top: 10px; color: #687c7d; font-size: 8px; }
        .mock-avatar {
            display: grid;
            place-items: center;
            width: 100px;
            height: 120px;
            border: 5px solid white;
            border-radius: 48% 48% 10px 10px;
            background: var(--lime);
            color: white;
            font-size: 35px;
            font-weight: 950;
            transform: rotate(3deg);
            box-shadow: 0 8px 22px rgba(0,0,0,.08);
        }
        .mock-rule { width: 36px; height: 4px; margin-top: 16px; background: #07858d; border-radius: 3px; }
        .mock-section-label { margin: 8px 0; font-size: 9px; font-weight: 900; }
        .mock-projects { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; }
        .mock-project {
            min-height: 63px;
            padding: 9px;
            border: 1px solid #e0e1d7;
            border-radius: 5px;
            background: white;
        }
        .mock-project-art { width: 19px; height: 19px; margin-bottom: 7px; border-radius: 5px; background: #d7eeeb; }
        .mock-project strong { display: block; font-size: 8px; }
        .mock-project small { color: #687c7d; font-size: 7px; }
        .floating-note {
            position: absolute;
            z-index: 2;
            right: -12px;
            bottom: 1px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 15px;
            border: 1px solid #d5e5e3;
            border-radius: 10px;
            background: #ffffff;
            box-shadow: 0 15px 40px rgba(23,43,43,.12);
        }
        .floating-check {
            display: grid;
            place-items: center;
            width: 31px;
            height: 31px;
            border-radius: 8px;
            background: var(--lime);
            color: white;
            font-weight: 950;
        }
        .floating-note strong { display: block; font-size: 10px; }
        .floating-note small { color: #687c7d; font-size: 9px; }

        .ticker { overflow: hidden; border-block: 1px solid #d5e5e3; background: #e8f4f3; }
        .ticker-inner {
            min-height: 62px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px 35px;
            color: #526b6c;
            font-size: 10px;
            font-weight: 850;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }
        .ticker-inner span::before { content: "✳"; margin-right: 9px; color: var(--lime); }

        .section { padding: 88px 0; }
        .section-light { color: var(--ink); background: var(--paper); }
        .section-dark { color: var(--ink); background: #e8f4f3; }
        .section-heading { max-width: 650px; margin: 0 auto 43px; text-align: center; }
        .section-label {
            color: #07858d;
            font-size: 10px;
            font-weight: 900;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .section-dark .section-label { color: var(--lime); }
        .section-heading h2 {
            margin-top: 12px;
            font-size: clamp(30px, 4vw, 46px);
            line-height: 1.1;
            letter-spacing: -2px;
            font-weight: 900;
        }
        .section-heading p { margin-top: 15px; color: #687c7d; font-size: 14px; line-height: 1.85; }
        .section-dark .section-heading p { color: #687c7d; }

        .features { display: grid; grid-template-columns: repeat(3,1fr); gap: 16px; }
        .feature-card {
            padding: 27px;
            border: 1px solid #d5e5e3;
            border-radius: 13px;
            background: #fff;
            transition: transform .2s, border-color .2s;
        }
        .feature-card:hover { transform: translateY(-4px); border-color: #07858d; }
        .feature-number { color: #07858d; font-size: 11px; font-weight: 900; letter-spacing: 1px; }
        .feature-symbol {
            display: grid;
            place-items: center;
            width: 43px;
            height: 43px;
            margin-top: 19px;
            border-radius: 10px;
            background: #e8f4f3;
            color: #07565b;
            font-size: 20px;
            font-weight: 900;
        }
        .feature-card h3 { margin-top: 19px; font-size: 17px; letter-spacing: -.4px; }
        .feature-card p { margin-top: 9px; color: #687c7d; font-size: 12px; line-height: 1.9; }

        .template-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 18px; }
        .template-card {
            overflow: hidden;
            border: 1px solid #d5e5e3;
            border-radius: 14px;
            background: #ffffff;
            transition: transform .22s, border-color .22s;
        }
        .template-card:hover { transform: translateY(-5px); border-color: #07858d; }
        .template-preview { height: 215px; padding: 13px; background: #e8f4f3; overflow: hidden; }
        .template-paper {
            height: 100%;
            padding: 12px;
            overflow: hidden;
            border-radius: 6px;
            font-family: Arial, Helvetica, sans-serif;
        }
        .mini-topbar {
            display: flex;
            justify-content: space-between;
            gap: 5px;
            padding-bottom: 6px;
            border-bottom: 1px solid #dedfd5;
            font-size: 6px;
            font-weight: 900;
        }
        .mini-label { font-size: 5px; letter-spacing: 1px; text-transform: uppercase; }
        .mini-title { margin-top: 8px; font-size: 14px; line-height: 1.05; font-weight: 900; overflow-wrap: anywhere; }
        .mini-subtitle { margin-top: 4px; font-size: 6px; }
        .mini-accent { width: 24px; height: 3px; margin-top: 7px; border-radius: 3px; }
        .mini-section-title { margin: 9px 0 5px; font-size: 7px; font-weight: 900; }
        .mini-lines { display: grid; gap: 4px; }
        .mini-lines span { display: block; height: 3px; width: 90%; border-radius: 3px; background: #d8ddd0; }
        .mini-lines span:nth-child(2) { width: 72%; }
        .mini-lines span:nth-child(3) { width: 82%; }
        .mini-contact { display: flex; gap: 4px; margin-top: 7px; }
        .mini-contact span { width: 30px; height: 8px; border-radius: 3px; }

        .simple-preview { color: #263b3c; background: #f7fafa; }
        .simple-preview .mini-topbar,
        .simple-preview .mini-title,
        .simple-preview .mini-section-title { color: #07565b; }
        .simple-preview .mini-profile {
            width: 32px; height: 32px; margin: 8px auto 4px;
            border: 3px solid #e8f4f3; border-radius: 50%; background: #e8f4f3;
        }
        .simple-preview .mini-label,
        .simple-preview .mini-subtitle { color: #687c7d; text-align: center; }
        .simple-preview .mini-title { margin-top: 0; text-align: center; font-size: 12px; }
        .simple-preview .mini-accent { margin-inline: auto; background: #07858d; }
        .simple-preview .mini-contact { justify-content: center; }
        .simple-preview .mini-contact span { background: #e8f4f3; }
        .simple-preview .mini-section-title { padding-bottom: 3px; border-bottom: 1px solid #dce9e8; }

        .modern-preview { display: grid; grid-template-columns: 1.5fr .8fr; gap: 6px; color: #f4fafa; background: #09141c; }
        .modern-preview .mini-main,
        .modern-preview .mini-sidebar {
            min-width: 0; padding: 8px; border: 1px solid rgba(181,245,235,.16);
            border-radius: 6px; background: linear-gradient(145deg,#142a35,#0e1e28);
        }
        .modern-preview .mini-topbar { color: #51dccb; border-color: rgba(181,245,235,.16); }
        .modern-preview .mini-label,
        .modern-preview .mini-subtitle { color: #a6bac1; }
        .modern-preview .mini-title,
        .modern-preview .mini-section-title { color: #f4fafa; }
        .modern-preview .mini-accent { background: #51dccb; }
        .modern-preview .mini-lines span { background: #354c56; }
        .modern-preview .mini-sidebar { display: flex; flex-direction: column; align-items: flex-start; }
        .modern-preview .mini-profile { width: 28px; height: 28px; margin: 2px 0 5px; border: 2px solid #51dccb; border-radius: 7px; background: #1c4148; }
        .modern-preview .mini-contact { flex-direction: column; }
        .modern-preview .mini-contact span { width: 100%; background: #1e3944; border: 1px solid #294752; }

        .creative-preview { color: #153536; background: #f8f8f2; }
        .creative-preview .mini-topbar { color: #07565b; }
        .creative-preview .mini-label { display: inline-block; padding: 3px 4px; color: #07565b; background: #d9f078; border-radius: 3px; }
        .creative-preview .mini-hero { display: grid; grid-template-columns: 1.2fr .8fr; gap: 5px; align-items: center; margin-top: 7px; }
        .creative-preview .mini-title { color: #07565b; font-size: 17px; letter-spacing: -1px; }
        .creative-preview .mini-subtitle { color: #617575; }
        .creative-preview .mini-profile { height: 68px; border: 4px solid white; border-radius: 45% 45% 6px 6px; background: #07858d; transform: rotate(3deg); box-shadow: 0 4px 10px rgba(7,86,91,.12); }
        .creative-preview .mini-accent { background: #07858d; }
        .creative-preview .mini-projects { display: grid; grid-template-columns: 1fr 1fr; gap: 5px; margin-top: 7px; }
        .creative-preview .mini-projects span { height: 24px; border-radius: 4px; background: #e8f4f3; border-bottom: 3px solid #07858d; }

        .template-info { padding: 20px; }
        .template-meta { display: flex; justify-content: space-between; align-items: center; gap: 10px; }
        .template-info h3 { font-size: 17px; letter-spacing: -.4px; color: #172b2b; }
        .template-index { color: #687c7d; font-size: 10px; font-weight: 800; }
        .template-info p { margin-top: 8px; color: #687c7d; font-size: 12px; line-height: 1.8; }
        .template-tag { display: inline-block; margin-top: 14px; padding: 5px 9px; border: 1px solid #d5e5e3; border-radius: 5px; color: var(--lime); font-size: 9px; font-weight: 800; }

        .steps { display: grid; grid-template-columns: repeat(3,1fr); gap: 16px; }
        .step-card { padding: 26px; border: 1px solid #d5e5e3; border-radius: 13px; background: #ffffff; }
        .step-number { color: var(--lime); font-size: 12px; font-weight: 900; letter-spacing: 1px; }
        .step-card h3 { margin-top: 17px; font-size: 17px; }
        .step-card p { margin-top: 9px; color: #687c7d; font-size: 12px; line-height: 1.9; }

        .cta-section { padding: 15px 0 88px; }
        .cta {
            position: relative;
            overflow: hidden;
            padding: 60px 25px;
            border: 1px solid #c9e0de;
            border-radius: 18px;
            background: radial-gradient(ellipse at 90% 0%, rgba(7,133,141,.08), transparent 45%), #e8f4f3;
            text-align: center;
        }
        .cta h2 { max-width: 680px; margin: auto; font-size: clamp(30px,4vw,47px); line-height: 1.1; letter-spacing: -2px; }
        .cta h2 span { color: var(--lime); }
        .cta p { max-width: 520px; margin: 15px auto 24px; color: #687c7d; font-size: 13px; line-height: 1.9; }

        .footer { border-top: 1px solid #d5e5e3; padding: 26px 0; }
        .footer-inner { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px; }
        .footer-brand { font-size: 13px; font-weight: 850; }
        .footer-brand span { color: var(--lime); }
        .footer p { color: #687c7d; font-size: 10px; }
        .footer-links { display: flex; flex-wrap: wrap; gap: 18px; color: #526b6c; font-size: 11px; }
        .footer-links a:hover { color: var(--lime); }

        @media (max-width: 900px) {
            .nav-links { display: none; }
            .hero { padding: 68px 0 75px; }
            .hero-grid { grid-template-columns: 1fr; gap: 38px; }
            .hero-copy { max-width: 690px; }
            .hero-art { width: min(570px,100%); margin-inline: auto; }
            .features, .steps, .template-grid { grid-template-columns: repeat(2,minmax(0,1fr)); }
            .template-card:last-child { grid-column: 1 / -1; width: calc(50% - 9px); justify-self: center; }
        }
        @media (max-width: 600px) {
            .container { width: min(100% - 32px, 480px); }
            .nav-inner { min-height: 67px; gap: 8px; }
            .brand { gap: 7px; font-size: 14px; }
            .brand-mark { width: 32px; height: 32px; font-size: 18px; }
            .nav-actions { gap: 6px; }
            .nav-actions .button { min-height: 37px; padding-inline: 10px; font-size: 11px; }
            .hero { padding: 55px 0 60px; }
            .hero h1 { font-size: clamp(42px,12vw,58px); letter-spacing: -2.8px; }
            .hero-description { font-size: 13px; }
            .hero-buttons { gap: 9px; }
            .hero-buttons .button { flex: 1; padding-inline: 10px; font-size: 11px; }
            .hero-art { padding-left: 0; padding-right: 5px; }
            .browser { padding: 8px; }
            .mock-site { min-height: 285px; padding: 13px; }
            .mock-hero { grid-template-columns: 1fr 75px; gap: 8px; padding: 22px 0 16px; }
            .mock-avatar { width: 75px; height: 95px; font-size: 28px; }
            .mock-name { font-size: clamp(21px,6vw,30px); }
            .mock-project { min-height: 55px; padding: 7px; }
            .floating-note { right: -4px; padding: 9px; }
            .floating-check { width: 27px; height: 27px; }
            .floating-note strong { font-size: 9px; }
            .floating-note small { font-size: 8px; }
            .ticker-inner { padding: 15px 0; gap: 10px 18px; font-size: 8px; }
            .section { padding: 65px 0; }
            .section-heading { margin-bottom: 30px; }
            .section-heading h2 { font-size: 32px; letter-spacing: -1.4px; }
            .features, .steps, .template-grid { grid-template-columns: 1fr; }
            .template-card:last-child { grid-column: auto; width: 100%; }
            .template-preview { height: 220px; }
            .feature-card, .step-card { padding: 22px; }
            .cta-section { padding-bottom: 60px; }
            .cta { padding: 42px 19px; }
            .cta h2 { font-size: 34px; }
            .footer-inner { justify-content: center; text-align: center; }
            .footer-links { justify-content: center; width: 100%; }
        }
        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
            *, *::before, *::after { transition-duration: .01ms !important; animation-duration: .01ms !important; }
        }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="container nav-inner">
            <a class="brand" href="{{ route('home') }}" aria-label="Portfolio Builder home">
                <span class="brand-mark">P.</span>
                <span>Portfolio Builder</span>
            </a>

            <nav class="nav-links" aria-label="Main navigation">
                <a href="#features">Features</a>
                <a href="#templates">Templates</a>
                <a href="#how-it-works">How It Works</a>
            </nav>

            <div class="nav-actions">
                @auth
                    <a class="button button-primary" href="{{ route('portfolios.index') }}">My Portfolios <span class="arrow" aria-hidden="true">↗</span></a>
                @else
                    <a class="button button-outline" href="{{ route('login') }}">Log In</a>
                    <a class="button button-primary" href="{{ route('register') }}">Get Started <span class="arrow" aria-hidden="true">↗</span></a>
                @endauth
            </div>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container hero-grid">
                <div class="hero-copy">
                    <div class="eyebrow"><span class="eyebrow-dot"></span> YOUR STORY. YOUR SPACE.</div>
                    <h1>Make your work<br>impossible to <span>ignore.</span></h1>
                    <p class="hero-description">
                        Your skills deserve more than a list. Build a personal portfolio
                        that brings your projects, experience, and ambitions together
                        in one place — without starting from scratch.
                    </p>
                    <div class="hero-buttons">
                        @auth
                            <a class="button button-primary" href="{{ route('portfolios.create') }}">Create My Portfolio <span class="arrow" aria-hidden="true">→</span></a>
                            <a class="button button-outline" href="{{ route('portfolios.index') }}">My Portfolios</a>
                        @else
                            <a class="button button-primary" href="{{ route('register') }}">Build My Portfolio <span class="arrow" aria-hidden="true">→</span></a>
                            <a class="button button-outline" href="#templates">Explore Designs <span class="arrow" aria-hidden="true">↓</span></a>
                        @endauth
                    </div>
                    <p class="hero-note">THREE DISTINCT DESIGNS · ONE PLACE TO SHOW YOUR WORK</p>
                </div>

                <div class="hero-art" aria-label="Illustration of a personal portfolio website">
                    <div class="art-glow"></div>
                    <div class="browser">
                        <div class="browser-top">
                            <span class="browser-dot"></span><span class="browser-dot"></span><span class="browser-dot"></span>
                            <div class="browser-address">yourportfolio.site</div>
                        </div>
                        <div class="mock-site">
                            <div class="mock-nav">
                                <span>W / PORTFOLIO</span>
                                <div class="mock-nav-links"><span>ABOUT</span><span>WORK</span><span>CONTACT</span></div>
                            </div>
                            <div class="mock-hero">
                                <div>
                                    <div class="mock-tag">PERSONAL PORTFOLIO</div>
                                    <div class="mock-name">WALTER<br><span>ABARCO.</span></div>
                                    <div class="mock-copy">Student · Developer · Builder</div>
                                    <div class="mock-rule"></div>
                                </div>
                                <div class="mock-avatar" aria-hidden="true">W</div>
                            </div>
                            <div class="mock-section-label">SELECTED PROJECTS</div>
                            <div class="mock-projects">
                                <div class="mock-project"><div class="mock-project-art"></div><strong>Project One</strong><small>Development</small></div>
                                <div class="mock-project"><div class="mock-project-art"></div><strong>Project Two</strong><small>Design & Build</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="floating-note">
                        <div class="floating-check" aria-hidden="true">✓</div>
                        <div><strong>Your work, your identity.</strong><small>Choose a style that feels like you.</small></div>
                    </div>
                </div>
            </div>
        </section>

        <div class="ticker" aria-label="Portfolio highlights">
            <div class="container ticker-inner">
                <span>Show your skills</span><span>Present your projects</span><span>Own your story</span><span>Make it yours</span>
            </div>
        </div>

        <section class="section section-light" id="features">
            <div class="container">
                <div class="section-heading">
                    <div class="section-label">Less hassle. More you.</div>
                    <h2>Everything in one place.</h2>
                    <p>Bring the important parts of your professional story together in a portfolio that's easy to build and easy to explore.</p>
                </div>
                <div class="features">
                    <article class="feature-card">
                        <div class="feature-number">01 / DESIGN</div>
                        <div class="feature-symbol" aria-hidden="true">✳</div>
                        <h3>Find Your Style</h3>
                        <p>Choose from three distinct portfolio designs, each with its own personality and visual approach.</p>
                    </article>
                    <article class="feature-card">
                        <div class="feature-number">02 / SHOWCASE</div>
                        <div class="feature-symbol" aria-hidden="true">↗</div>
                        <h3>Put Your Work First</h3>
                        <p>Organize your skills, education, experience, and projects into one clear personal presentation.</p>
                    </article>
                    <article class="feature-card">
                        <div class="feature-number">03 / PERSONALIZE</div>
                        <div class="feature-symbol" aria-hidden="true">✎</div>
                        <h3>Make It Yours</h3>
                        <p>Add your information, manage your portfolio, and review your design before sharing it.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="section section-dark" id="templates">
            <div class="container">
                <div class="section-heading">
                    <div class="section-label">Choose your direction</div>
                    <h2>Three styles. One story: yours.</h2>
                    <p>Start with the look that fits you. You can choose a template when creating your portfolio.</p>
                </div>

                <div class="template-grid">
                    <article class="template-card">
                        <div class="template-preview">
                            <div class="template-paper simple-preview">
                                <div class="mini-topbar"><span>PORTFOLIO</span><span>ABOUT　 WORK</span></div>
                                <div class="mini-profile"></div>
                                <div class="mini-label">Hello, I'm</div>
                                <div class="mini-title">WALTER ABARCO</div>
                                <div class="mini-subtitle">Student · Web Developer</div>
                                <div class="mini-accent"></div>
                                <div class="mini-contact"><span></span><span></span><span></span></div>
                                <div class="mini-section-title">About Me</div>
                                <div class="mini-lines"><span></span><span></span></div>
                                <div class="mini-section-title">My Skills</div>
                                <div class="mini-lines"><span></span><span></span></div>
                            </div>
                        </div>
                        <div class="template-info">
                            <div class="template-meta"><h3>Simple</h3><span class="template-index">01 / 03</span></div>
                            <p>Clean, calm, and focused. A minimal layout that puts your information and achievements first.</p>
                            <span class="template-tag">CLEAN & MINIMAL</span>
                        </div>
                    </article>

                    <article class="template-card">
                        <div class="template-preview">
                            <div class="template-paper modern-preview">
                                <div class="mini-main">
                                    <div class="mini-topbar"><span>PORTFOLIO</span><span>01 / 03</span></div>
                                    <div class="mini-label">WEB DEVELOPER</div>
                                    <div class="mini-title">WALTER ABARCO</div>
                                    <div class="mini-subtitle">Building thoughtful digital experiences.</div>
                                    <div class="mini-accent"></div>
                                    <div class="mini-section-title">Selected Work</div>
                                    <div class="mini-lines"><span></span><span></span><span></span></div>
                                </div>
                                <div class="mini-sidebar">
                                    <div class="mini-profile"></div>
                                    <div class="mini-label">PROFILE</div>
                                    <div class="mini-section-title">Contact</div>
                                    <div class="mini-contact"><span></span><span></span><span></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="template-info">
                            <div class="template-meta"><h3>Modern</h3><span class="template-index">02 / 03</span></div>
                            <p>Bold, dark, and contemporary. A high-contrast presentation with clear sections and teal accents.</p>
                            <span class="template-tag">BOLD & MODERN</span>
                        </div>
                    </article>

                    <article class="template-card">
                        <div class="template-preview">
                            <div class="template-paper creative-preview">
                                <div class="mini-topbar"><span>W. / PORTFOLIO</span><span>2026</span></div>
                                <div class="mini-hero">
                                    <div>
                                        <div class="mini-label">DESIGN · CODE</div>
                                        <div class="mini-title">WALTER<br>ABARCO.</div>
                                        <div class="mini-subtitle">Ideas into experiences.</div>
                                        <div class="mini-accent"></div>
                                    </div>
                                    <div class="mini-profile"></div>
                                </div>
                                <div class="mini-section-title">Selected Projects</div>
                                <div class="mini-projects"><span></span><span></span></div>
                            </div>
                        </div>
                        <div class="template-info">
                            <div class="template-meta"><h3>Creative</h3><span class="template-index">03 / 03</span></div>
                            <p>Expressive, asymmetrical, and full of personality. For a portfolio that makes a visual statement.</p>
                            <span class="template-tag">DISTINCTIVE & EXPRESSIVE</span>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="section section-light" id="how-it-works">
            <div class="container">
                <div class="section-heading">
                    <div class="section-label">Getting started</div>
                    <h2>From blank page to your portfolio.</h2>
                    <p>No need to figure everything out at once. Follow a few simple steps to get started.</p>
                </div>
                <div class="steps">
                    <article class="step-card">
                        <div class="step-number">STEP 01</div>
                        <h3>Create Your Account</h3>
                        <p>Register and sign in to access your own portfolio workspace.</p>
                    </article>
                    <article class="step-card">
                        <div class="step-number">STEP 02</div>
                        <h3>Add Your Details</h3>
                        <p>Enter your information and select the portfolio design you prefer.</p>
                    </article>
                    <article class="step-card">
                        <div class="step-number">STEP 03</div>
                        <h3>Review Your Work</h3>
                        <p>Preview your portfolio, make changes, and use the available sharing features when ready.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="cta-section">
            <div class="container">
                <div class="cta">
                    <div class="section-label">Your next step starts here</div>
                    <h2 style="margin-top:12px">Ready to make your mark<span>?</span></h2>
                    <p>Bring your skills, experience, and projects together in a portfolio that feels like you.</p>
                    @auth
                        <a class="button button-primary" href="{{ route('portfolios.create') }}">Create My Portfolio <span class="arrow" aria-hidden="true">→</span></a>
                    @else
                        <a class="button button-primary" href="{{ route('register') }}">Get Started <span class="arrow" aria-hidden="true">→</span></a>
                    @endauth
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container footer-inner">
            <a class="footer-brand" href="{{ route('home') }}">Portfolio <span>Builder.</span></a>
            <p>© {{ date('Y') }} Portfolio Builder. All rights reserved.</p>
            <div class="footer-links">
                <a href="{{ route('login') }}">Log In</a>
                <a href="{{ route('register') }}">Register</a>
                <a href="#features">Features</a>
                <a href="#templates">Templates</a>
            </div>
        </div>
    </footer>
</body>
</html>