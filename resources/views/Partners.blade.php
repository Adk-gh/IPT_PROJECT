<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partner With Us | Street & Ink</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Reset and Base Styles */
        :root {
            --primary: #1a1a1a;
            --secondary: #f5f5f5;
            --accent: #ff5e5b;
            --accent-dark: #e04e4b;
            --text: #333;
            --text-light: #777;
            --white: #fff;
            --black: #000;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            --border-radius: 12px;
            --section-padding: 120px;
        }

        /* Dark Mode Variables */
        [data-theme="dark"] {
            --primary: #f5f5f5;
            --secondary: #1a1a1a;
            --text: #f0f0f0;
            --text-light: #bbb;
            --white: #121212;
            --black: #f5f5f5;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text);
            background-color: var(--white);
            line-height: 1.6;
            overflow-x: hidden;
            scroll-behavior: smooth;
            transition: background-color 0.3s ease;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: var(--transition);
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        ul {
            list-style: none;
        }

        button, input, textarea, select {
            font-family: inherit;
            font-size: inherit;
        }

        .container {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 28px;
            border-radius: var(--border-radius);
            font-weight: 600;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            outline: none;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background-color: var(--accent);
            color: var(--white);
        }

        .btn-primary:hover {
            background-color: var(--accent-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-primary::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%, -50%);
            transform-origin: 50% 50%;
        }

        .btn-primary:focus:not(:active)::after {
            animation: ripple 1s ease-out;
        }

        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 0.5;
            }
            100% {
                transform: scale(20, 20);
                opacity: 0;
            }
        }

        .btn-secondary {
            background-color: var(--white);
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        [data-theme="dark"] .btn-secondary {
            background-color: var(--secondary);
        }

        .btn-secondary:hover {
            background-color: var(--primary);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .btn-large {
            padding: 16px 36px;
            font-size: 1.1rem;
        }

        .section {
            padding: var(--section-padding) 0;
            position: relative;
        }

        .section-title {
            font-size: 2.5rem;
            margin-bottom: 3rem;
            text-align: center;
            position: relative;
        }

        .section-title:after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background-color: var(--accent);
            margin: 20px auto 0;
        }

        .text-center {
            text-align: center;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .mt-0 {
            margin-top: 0;
        }

        /* Header */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            padding: 20px 0;
            transition: var(--transition);
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.05);
        }

        [data-theme="dark"] header {
            background-color: rgba(18, 18, 18, 0.95);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
        }

        header.scrolled {
            padding: 15px 0;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        [data-theme="dark"] header.scrolled {
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
            transition: var(--transition);
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .logo span {
            color: var(--accent);
        }

        .logo i {
            margin-right: 10px;
            font-size: 1.5rem;
        }

        /* Logo image styling */
        .logo-image {
            height: 1.5em;
            width: auto;
            margin-right: 10px;
            vertical-align: middle;
        }

        nav ul {
            display: flex;
            align-items: center;
        }

        nav ul li {
            margin-left: 30px;
        }

        nav ul li a {
            font-weight: 500;
            position: relative;
        }

        nav ul li a:after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--accent);
            transition: var(--transition);
        }

        nav ul li a:hover:after {
            width: 100%;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--primary);
        }

        /* Dark Mode Toggle */
        .theme-toggle {
            background: none;
            border: none;
            color: var(--primary);
            cursor: pointer;
            font-size: 1.2rem;
            margin-left: 20px;
            transition: var(--transition);
        }

        .theme-toggle:hover {
            transform: rotate(30deg);
        }

        /* Hero Section */
        .partner-hero {
            height: 80vh;
            min-height: 600px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1547891654-e66ed7ebb968?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80') no-repeat center center/cover;
            color: var(--white);
            margin-top: 80px;
        }

        .partner-hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            padding: 0 20px;
        }

        .partner-hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 1s ease;
        }

        .partner-hero p {
            font-size: 1.2rem;
            margin-bottom: 3rem;
            opacity: 0.9;
            animation: fadeInUp 1s ease 0.2s forwards;
            opacity: 0;
        }

        /* Benefits Section */
        .benefits {
            background-color: var(--secondary);
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 40px;
            margin-top: 50px;
        }

        .benefit-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            padding: 40px 30px;
            text-align: center;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .benefit-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .benefit-icon {
            width: 80px;
            height: 80px;
            background-color: var(--accent);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 2rem;
            transition: var(--transition);
        }

        .benefit-card:hover .benefit-icon {
            transform: scale(1.1) rotate(10deg);
        }

        .benefit-title {
            font-size: 1.4rem;
            margin-bottom: 15px;
        }

        .benefit-description {
            color: var(--text-light);
        }

        /* Partnership Types */
        .partnership-types {
            background-color: var(--white);
        }

        .types-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .type-card {
            background-color: var(--secondary);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .type-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .type-card-img {
            height: 200px;
            overflow: hidden;
        }

        .type-card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .type-card:hover .type-card-img img {
            transform: scale(1.05);
        }

        .type-card-content {
            padding: 30px;
        }

        .type-card-title {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .type-card-description {
            color: var(--text-light);
            margin-bottom: 20px;
        }

        .type-card-features {
            margin-bottom: 25px;
        }

        .type-card-feature {
            display: flex;
            align-items: flex-start;
            margin-bottom: 10px;
        }

        .type-card-feature i {
            color: var(--accent);
            margin-right: 10px;
            margin-top: 3px;
        }

        /* Partner Perks */
        .partner-perks {
            background-color: var(--secondary);
        }

        .perks-container {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .perks-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .perk-item {
            background-color: var(--white);
            border-radius: var(--border-radius);
            padding: 25px;
            text-align: center;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border-left: 4px solid var(--accent);
        }

        .perk-item:hover {
            transform: translateY(-5px);
        }

        .perk-icon {
            font-size: 1.8rem;
            color: var(--accent);
            margin-bottom: 15px;
        }

        .perk-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .perk-description {
            color: var(--text-light);
            font-size: 0.95rem;
        }

        /* Partner Form */
        .partner-form-section {
            background-color: var(--white);
        }

        .form-container {
            max-width: 800px;
            margin: 0 auto;
            background-color: var(--secondary);
            border-radius: var(--border-radius);
            padding: 50px;
            box-shadow: var(--shadow);
        }

        .form-title {
            font-size: 1.8rem;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border-radius: var(--border-radius);
            border: 1px solid #ddd;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(255, 94, 91, 0.2);
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .form-select {
            width: 100%;
            padding: 12px 15px;
            border-radius: var(--border-radius);
            border: 1px solid #ddd;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 1em;
        }

        .file-upload {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-upload-btn {
            border: 2px dashed #ddd;
            border-radius: var(--border-radius);
            padding: 30px;
            text-align: center;
            width: 100%;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .file-upload-btn:hover {
            border-color: var(--accent);
            background-color: rgba(255, 94, 91, 0.05);
        }

        .file-upload-input {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-upload-text {
            color: var(--text-light);
            font-size: 0.9rem;
            text-align: center;
        }

        .file-upload-text i {
            color: var(--accent);
            font-size: 1.5rem;
            margin-bottom: 10px;
            display: block;
        }

        .form-submit {
            text-align: center;
            margin-top: 40px;
        }

        .form-success {
            display: none;
            text-align: center;
            padding: 40px;
        }

        .form-success-icon {
            font-size: 4rem;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .form-success-title {
            font-size: 1.8rem;
            margin-bottom: 15px;
        }

        .form-success-message {
            color: var(--text-light);
            margin-bottom: 30px;
        }

        /* Partners Showcase */
        .partners-showcase {
            background-color: var(--secondary);
        }

        .partners-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
            margin-top: 50px;
            align-items: center;
        }

        .partner-logo {
            max-width: 180px;
            height: auto;
            filter: grayscale(100%);
            opacity: 0.7;
            transition: var(--transition);
        }

        .partner-logo:hover {
            filter: grayscale(0);
            opacity: 1;
            transform: scale(1.05);
        }

        .testimonial {
            max-width: 800px;
            margin: 60px auto 0;
            text-align: center;
            background-color: var(--white);
            border-radius: var(--border-radius);
            padding: 40px;
            box-shadow: var(--shadow);
            position: relative;
        }

        .testimonial:before {
            content: '"';
            position: absolute;
            top: 20px;
            left: 30px;
            font-size: 5rem;
            color: rgba(255, 94, 91, 0.1);
            font-family: serif;
            line-height: 1;
        }

        .testimonial-text {
            font-size: 1.2rem;
            font-style: italic;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
        }

        .testimonial-author {
            font-weight: 600;
        }

        .testimonial-role {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* Final CTA */
        .final-cta {
            background-color: var(--accent);
            color: var(--white);
            text-align: center;
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .final-cta:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1579762715118-a6f1d4b934f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=686&q=80') no-repeat center center/cover;
            opacity: 0.1;
        }

        .final-cta h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            position: relative;
        }

        .final-cta p {
            max-width: 700px;
            margin: 0 auto 40px;
            font-size: 1.1rem;
            opacity: 0.9;
            position: relative;
        }

        /* Footer */
        footer {
            background-color: var(--primary);
            color: var(--white);
            padding: 80px 0 30px;
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-bottom: 60px;
        }

        .footer-logo {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 20px;
            display: block;
            transition: var(--transition);
        }

        .footer-logo:hover {
            transform: scale(1.05);
        }

        .footer-logo span {
            color: var(--accent);
        }

        .footer-about p {
            opacity: 0.8;
            margin-bottom: 20px;
            font-size: 0.95rem;
        }

        .footer-title {
            font-size: 1.2rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: var(--accent);
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            opacity: 0.8;
            font-size: 0.95rem;
            transition: var(--transition);
        }

        .footer-links a:hover {
            opacity: 1;
            color: var(--accent);
            padding-left: 5px;
        }

        .footer-contact li {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
            opacity: 0.8;
            font-size: 0.95rem;
        }

        .footer-contact i {
            margin-right: 10px;
            color: var(--accent);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.9rem;
            opacity: 0.7;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Styles */
        @media (max-width: 1200px) {
            :root {
                --section-padding: 100px;
            }
        }

        @media (max-width: 992px) {
            :root {
                --section-padding: 80px;
            }

            .partner-hero h1 {
                font-size: 3rem;
            }

            .types-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            }
        }

        @media (max-width: 768px) {
            :root {
                --section-padding: 70px;
            }

            .mobile-menu-btn {
                display: block;
            }

            nav {
                position: fixed;
                top: 80px;
                left: 0;
                width: 100%;
                background-color: var(--white);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                padding: 20px;
                transform: translateY(-150%);
                opacity: 0;
                transition: var(--transition);
                z-index: 999;
            }

            [data-theme="dark"] nav {
                background-color: #121212;
            }

            nav.active {
                transform: translateY(0);
                opacity: 1;
            }

            nav ul {
                flex-direction: column;
                align-items: flex-start;
            }

            nav ul li {
                margin: 0 0 15px 0;
            }

            .partner-hero {
                min-height: 500px;
                height: auto;
                padding: 120px 0 80px;
            }

            .partner-hero h1 {
                font-size: 2.5rem;
            }

            .form-container {
                padding: 30px;
            }
        }

        @media (max-width: 576px) {
            :root {
                --section-padding: 60px;
            }

            .partner-hero h1 {
                font-size: 2.2rem;
            }

            .partner-hero p {
                font-size: 1rem;
            }

            .benefits-grid {
                grid-template-columns: 1fr;
            }

            .types-grid {
                grid-template-columns: 1fr;
            }

            .perks-list {
                grid-template-columns: 1fr;
            }

            .final-cta h2 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header id="header">
        <div class="container header-container">
           <a href="{{ route('home') }}" class="logo" style="color: rgb(0, 0, 0);">
                <i class="fas fa-spray-can"></i>Street & <span>Ink</span></a>
            <div style="display: flex; align-items: center;">
                <nav id="nav">
                    <ul>
                        <li><a href="index.php#map">Map</a></li>
                        <li><a href="index.php#art">Street Art</a></li>
                        <li><a href="index.php#artists">Artists</a></li>
                        <li><a href="index.php#community">Community</a></li>
                        <li><a href="index.php#about">About</a></li>
                        <li><a href="partner.php" class="active">Partner</a></li>
                        <li><a href="signin.php" class="btn btn-primary">Sign In</a></li>
                    </ul>
                </nav>
                <button class="theme-toggle" id="themeToggle">
                    <i class="fas fa-moon"></i>
                </button>
                <button class="mobile-menu-btn" id="mobileMenuBtn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="partner-hero">
        <div class="partner-hero-content">
            <h1>Let's Build a World Where Street Art Thrives</h1>
            <p>Join us in empowering street artists, beautifying public spaces, and inspiring culture through creative collaborations.</p>
            <div style="margin-top: 40px;">
                <a href="#partner-form" class="btn btn-primary btn-large">Become a Partner</a>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="section benefits">
        <div class="container">
            <h2 class="section-title">Why Partner With Street & Ink?</h2>
            <p class="text-center">Together, we can create meaningful impact through urban art and culture.</p>

            <div class="benefits-grid">
                <!-- Benefit 1 -->
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h3 class="benefit-title">Empower Artists</h3>
                    <p class="benefit-description">Help amplify the voices and visions of street creators by providing platforms and opportunities.</p>
                </div>

                <!-- Benefit 2 -->
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-binoculars"></i>
                    </div>
                    <h3 class="benefit-title">Get Discovered</h3>
                    <p class="benefit-description">Let your space or brand be seen by thousands of art lovers and cultural enthusiasts.</p>
                </div>

                <!-- Benefit 3 -->
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="benefit-title">Strengthen Communities</h3>
                    <p class="benefit-description">Support murals, art jams, workshops, and cultural festivals that bring people together.</p>
                </div>

                <!-- Benefit 4 -->
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <h3 class="benefit-title">Meaningful Branding</h3>
                    <p class="benefit-description">Align your brand with creativity, culture, and social impact in authentic ways.</p>
                </div>

                <!-- Benefit 5 -->
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3 class="benefit-title">Global Reach</h3>
                    <p class="benefit-description">Connect with artists and supporters worldwide through our international network.</p>
                </div>

                <!-- Benefit 6 -->
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3 class="benefit-title">Creative Innovation</h3>
                    <p class="benefit-description">Collaborate on cutting-edge projects that push boundaries and inspire change.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Partnership Types -->
    <section class="section partnership-types">
        <div class="container">
            <h2 class="section-title">Types of Partnerships</h2>
            <p class="text-center">We work with diverse organizations to create impactful collaborations.</p>

            <div class="types-grid">
                <!-- Type 1 -->
                <div class="type-card">
                    <div class="type-card-img">
                        <img src="https://images.unsplash.com/photo-1517457373958-b7e078d1c2a1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Venue Partnership">
                    </div>
                    <div class="type-card-content">
                        <h3 class="type-card-title">Venue / Art Space Partner</h3>
                        <p class="type-card-description">Offer your walls or spaces as canvases for artists to create temporary or permanent works.</p>
                        <div class="type-card-features">
                            <div class="type-card-feature">
                                <i class="fas fa-check"></i>
                                <span>Transform underutilized spaces</span>
                            </div>
                            <div class="type-card-feature">
                                <i class="fas fa-check"></i>
                                <span>Attract visitors and media attention</span>
                            </div>
                            <div class="type-card-feature">
                                <i class="fas fa-check"></i>
                                <span>Support local creative talent</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Type 2 -->
                <div class="type-card">
                    <div class="type-card-img">
                        <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1469&q=80" alt="Sponsorship">
                    </div>
                    <div class="type-card-content">
                        <h3 class="type-card-title">Sponsorship & Donations</h3>
                        <p class="type-card-description">Fund projects, events, or specific artists through financial or in-kind support.</p>
                        <div class="type-card-features">
                            <div class="type-card-feature">
                                <i class="fas fa-check"></i>
                                <span>Tax-deductible opportunities</span>
                            </div>
                            <div class="type-card-feature">
                                <i class="fas fa-check"></i>
                                <span>Custom sponsorship packages</span>
                            </div>
                            <div class="type-card-feature">
                                <i class="fas fa-check"></i>
                                <span>Impact measurement reports</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Type 3 -->
                <div class="type-card">
                    <div class="type-card-img">
                        <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Collaborative Events">
                    </div>
                    <div class="type-card-content">
                        <h3 class="type-card-title">Collaborative Events</h3>
                        <p class="type-card-description">Co-host festivals, pop-ups, exhibits, or community art programs.</p>
                        <div class="type-card-features">
                            <div class="type-card-feature">
                                <i class="fas fa-check"></i>
                                <span>Turnkey event production</span>
                            </div>
                            <div class="type-card-feature">
                                <i class="fas fa-check"></i>
                                <span>Artist recruitment and management</span>
                            </div>
                            <div class="type-card-feature">
                                <i class="fas fa-check"></i>
                                <span>Marketing and promotion support</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Type 4 -->
                <div class="type-card">
                    <div class="type-card-img">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Government Partnerships">
                    </div>
                    <div class="type-card-content">
                        <h3 class="type-card-title">Government / Cultural Orgs</h3>
                        <p class="type-card-description">Work together on community art programs and urban revitalization initiatives.</p>
                        <div class="type-card-features">
                            <div class="type-card-feature">
                                <i class="fas fa-check"></i>
                                <span>Public art program development</span>
                            </div>
                            <div class="type-card-feature">
                                <i class="fas fa-check"></i>
                                <span>Neighborhood beautification</span>
                            </div>
                            <div class="type-card-feature">
                                <i class="fas fa-check"></i>
                                <span>Youth engagement programs</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Type 5 -->
                <div class="type-card">
                    <div class="type-card-img">
                        <img src="https://images.unsplash.com/photo-1555529669-e69e7aa0ba9a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Brand Collabs">
                    </div>
                    <div class="type-card-content">
                        <h3 class="type-card-title">Art Supply / Brand Collabs</h3>
                        <p class="type-card-description">Product placements, giveaways, or creative marketing campaigns.</p>
                        <div class="type-card-features">
                            <div class="type-card-feature">
                                <i class="fas fa-check"></i>
                                <span>Authentic artist endorsements</span>
                            </div>
                            <div class="type-card-feature">
                                <i class="fas fa-check"></i>
                                <span>Creative content generation</span>
                            </div>
                            <div class="type-card-feature">
                                <i class="fas fa-check"></i>
                                <span>Targeted audience engagement</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Type 6 -->
                <div class="type-card">
                    <div class="type-card-img">
                        <img src="https://images.unsplash.com/photo-1529333166437-7750a6dd5a70?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1469&q=80" alt="Media Partnerships">
                    </div>
                    <div class="type-card-content">
                        <h3 class="type-card-title">Media Partnerships</h3>
                        <p class="type-card-description">Amplify street art stories through content collaborations and cross-promotions.</p>
                        <div class="type-card-features">
                            <div class="type-card-feature">
                                <i class="fas fa-check"></i>
                                <span>Exclusive artist interviews</span>
                            </div>
                            <div class="type-card-feature">
                                <i class="fas fa-check"></i>
                                <span>Behind-the-scenes access</span>
                            </div>
                            <div class="type-card-feature">
                                <i class="fas fa-check"></i>
                                <span>Co-branded content series</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partner Perks -->
    <section class="section partner-perks">
        <div class="container">
            <h2 class="section-title">What You'll Receive</h2>
            <p class="text-center">Our partners enjoy exclusive benefits and recognition.</p>

            <div class="perks-list">
                <!-- Perk 1 -->
                <div class="perk-item">
                    <div class="perk-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h3 class="perk-title">Official Partner Badge</h3>
                    <p class="perk-description">Display our partner badge on your website and materials to showcase your commitment to street art.</p>
                </div>

                <!-- Perk 2 -->
                <div class="perk-item">
                    <div class="perk-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3 class="perk-title">Profile & Logo Placement</h3>
                    <p class="perk-description">Get featured on our Partners Page with your logo, description, and link to your website.</p>
                </div>

                <!-- Perk 3 -->
                <div class="perk-item">
                    <div class="perk-icon">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <h3 class="perk-title">Social Media Shoutouts</h3>
                    <p class="perk-description">We'll highlight our partnership across our social channels (250K+ followers).</p>
                </div>

                <!-- Perk 4 -->
                <div class="perk-item">
                    <div class="perk-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3 class="perk-title">Event Opportunities</h3>
                    <p class="perk-description">Get priority access to co-host or sponsor our events and exhibitions.</p>
                </div>

                <!-- Perk 5 -->
                <div class="perk-item">
                    <div class="perk-icon">
                        <i class="fas fa-paint-roller"></i>
                    </div>
                    <h3 class="perk-title">Artist Project Features</h3>
                    <p class="perk-description">Your sponsored projects receive special features on our platform.</p>
                </div>

                <!-- Perk 6 -->
                <div class="perk-item">
                    <div class="perk-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="perk-title">Impact Reports</h3>
                    <p class="perk-description">Receive detailed reports on how your partnership is making a difference.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Partner Form -->
    <section class="section partner-form-section" id="partner-form">
        <div class="container">
            <h2 class="section-title">Partner Proposal Form</h2>
            <p class="text-center">Interested? Let's connect. Fill this form and we'll get back within 2–3 business days.</p>

            <div class="form-container">
                <form id="partnerForm">
                    <div class="form-group">
                        <label for="organization" class="form-label">Organization / Brand Name</label>
                        <input type="text" id="organization" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="contact" class="form-label">Contact Person</label>
                        <input type="text" id="contact" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" id="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="website" class="form-label">Website / Social Media</label>
                        <input type="url" id="website" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="partnership-type" class="form-label">Type of Partnership</label>
                        <select id="partnership-type" class="form-select" required>
                            <option value="">Select an option</option>
                            <option value="venue">Venue / Art Space Partner</option>
                            <option value="sponsorship">Sponsorship & Donations</option>
                            <option value="events">Collaborative Events</option>
                            <option value="government">Government / Cultural Org</option>
                            <option value="brand">Art Supply / Brand Collab</option>
                            <option value="media">Media Partnership</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message" class="form-label">Message or Proposal Details</label>
                        <textarea id="message" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">File Upload (Optional)</label>
                        <div class="file-upload">
                            <label for="file-upload-input" class="file-upload-btn">
                                <div class="file-upload-text">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <span>Click to upload files (PDF, DOC, JPG)</span>
                                </div>
                                <input type="file" id="file-upload-input" class="file-upload-input" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                            </label>
                        </div>
                    </div>

                    <div class="form-submit">
                        <button type="submit" class="btn btn-primary btn-large">Send Request</button>
                    </div>
                </form>

                <div class="form-success" id="formSuccess">
                    <div class="form-success-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3 class="form-success-title">Thank You!</h3>
                    <p class="form-success-message">We've received your partnership request and will review it shortly. Our team will get back to you within 2-3 business days.</p>
                    <a href="index.php" class="btn btn-secondary">Back to Home</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners Showcase -->
    <section class="section partners-showcase">
        <div class="container">
            <h2 class="section-title">Past & Current Partners</h2>
            <p class="text-center">We're proud to collaborate with these amazing organizations.</p>

            <div class="partners-grid">
                <img src="https://via.placeholder.com/180x80?text=ArtSpace" alt="ArtSpace" class="partner-logo">
                <img src="https://via.placeholder.com/180x80?text=UrbanCanvas" alt="UrbanCanvas" class="partner-logo">
                <img src="https://via.placeholder.com/180x80?text=SprayNation" alt="SprayNation" class="partner-logo">
                <img src="https://via.placeholder.com/180x80?text=WallWorks" alt="WallWorks" class="partner-logo">
                <img src="https://via.placeholder.com/180x80?text=CityArts" alt="CityArts" class="partner-logo">
                <img src="https://via.placeholder.com/180x80?text=GraffitiLife" alt="GraffitiLife" class="partner-logo">
            </div>

            <div class="testimonial">
                <p class="testimonial-text">"Partnering with Street and Ink was an amazing way to connect with the local creative scene. Their platform helped us transform our building into a landmark destination while supporting emerging artists."</p>
                <div class="testimonial-author">Maria Rodriguez</div>
                <div class="testimonial-role">Director, ArtSpace PH</div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="final-cta">
        <div class="container">
            <h2>We believe every wall has a story. Let's paint it together.</h2>
            <p>Join our network of partners supporting street art culture worldwide.</p>
            <div style="margin-top: 40px;">
                <a href="#partner-form" class="btn btn-secondary btn-large">Become a Partner</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-container">
                <div class="footer-about">
                    <a href="index.php" class="footer-logo">Street & <span>Ink</span></a>
                    <p>The world's most comprehensive street art discovery platform. Documenting urban creativity since 2018.</p>
                    <div style="display: flex; gap: 15px; margin-top: 20px;">
                        <a href="#" style="color: var(--white); font-size: 1.2rem;"><i class="fab fa-instagram"></i></a>
                        <a href="#" style="color: var(--white); font-size: 1.2rem;"><i class="fab fa-twitter"></i></a>
                        <a href="#" style="color: var(--white); font-size: 1.2rem;"><i class="fab fa-facebook"></i></a>
                        <a href="#" style="color: var(--white); font-size: 1.2rem;"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div>
                    <h3 class="footer-title">Explore</h3>
                    <ul class="footer-links">
                        <li><a href="index.php#map">Map</a></li>
                        <li><a href="index.php#art">Street Art</a></li>
                        <li><a href="index.php#artists">Artists</a></li>
                        <li><a href="index.php#categories">Categories</a></li>
                        <li><a href="index.php#blog">Blog</a></li>
                        <li><a href="index.php#events">Events</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="footer-title">Community</h3>
                    <ul class="footer-links">
                        <li><a href="#">Guidelines</a></li>
                        <li><a href="#">Submit Art</a></li>
                        <li><a href="#">Forums</a></li>
                        <li><a href="#">Meetups</a></li>
                        <li><a href="#">Wall of Fame</a></li>
                        <li><a href="#">Get Involved</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="footer-title">Company</h3>
                    <ul class="footer-links">
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="careers.php">Careers</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="partner.php">Partners</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="footer-title">Contact Us</h3>
                    <ul class="footer-contact">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>123 Art Street, Creative District, CA 90210</span>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span>hello@streetandink.com</span>
                        </li>
                        <li>
                            <i class="fas fa-phone"></i>
                            <span>+1 (555) 123-4567</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer-support" style="margin-top: 40px; text-align: center;">
                <h3 style="color: var(--white); margin-bottom: 20px;">Support Street & Ink</h3>
                <p style="opacity: 0.8; margin-bottom: 20px; max-width: 600px; margin-left: auto; margin-right: auto;">
                    Help us continue documenting and celebrating street art around the world. Your support keeps our community thriving.
                </p>
                <div style="display: flex; justify-content: center; gap: 15px; margin-bottom: 30px;">
                    <a href="support.php" class="btn btn-primary" style="padding: 10px 20px;">Support</a>
                    <a href="partner.php" class="btn btn-secondary" style="padding: 10px 20px; background-color: transparent; border-color: var(--white); color: var(--white);">Become a Member</a>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2023 Street & Ink. All rights reserved. | <a href="#" style="color: var(--accent);">Privacy Policy</a> | <a href="#" style="color: var(--accent);">Terms of Service</a></p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const nav = document.getElementById('nav');

        mobileMenuBtn.addEventListener('click', () => {
            nav.classList.toggle('active');
            mobileMenuBtn.innerHTML = nav.classList.contains('active') ?
                '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
        });

        // Header Scroll Effect
        const header = document.getElementById('header');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Smooth Scrolling for Anchor Links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });

                    // Close mobile menu if open
                    if (nav.classList.contains('active')) {
                        nav.classList.remove('active');
                        mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
                    }
                }
            });
        });

        // Dark Mode Toggle
        const themeToggle = document.getElementById('themeToggle');
        const body = document.body;

        themeToggle.addEventListener('click', () => {
            body.setAttribute('data-theme',
                body.getAttribute('data-theme') === 'dark' ? 'light' : 'dark');

            // Save preference to localStorage
            localStorage.setItem('theme', body.getAttribute('data-theme'));

            // Update icon
            themeToggle.innerHTML = body.getAttribute('data-theme') === 'dark' ?
                '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>';
        });

        // Check for saved theme preference
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            body.setAttribute('data-theme', savedTheme);
            themeToggle.innerHTML = savedTheme === 'dark' ?
                '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>';
        }

        // Partner Form Submission
        const partnerForm = document.getElementById('partnerForm');
        const formSuccess = document.getElementById('formSuccess');

        if (partnerForm) {
            partnerForm.addEventListener('submit', function(e) {
                e.preventDefault();

                // In a real implementation, this would send the form data to a server
                // For this demo, we'll just show the success message
                partnerForm.style.display = 'none';
                formSuccess.style.display = 'block';

                // Reset form after 5 seconds (for demo purposes)
                setTimeout(() => {
                    partnerForm.reset();
                    partnerForm.style.display = 'block';
                    formSuccess.style.display = 'none';
                }, 10000);
            });
        }

        // File Upload Display
        const fileUploadInput = document.getElementById('file-upload-input');
        if (fileUploadInput) {
            fileUploadInput.addEventListener('change', function() {
                const fileUploadText = this.parentElement.querySelector('.file-upload-text');
                if (this.files.length > 0) {
                    fileUploadText.innerHTML = `<i class="fas fa-check-circle" style="color:#4CAF50"></i>
                        <span>${this.files[0].name} selected</span>`;
                } else {
                    fileUploadText.innerHTML = `<i class="fas fa-cloud-upload-alt"></i>
                        <span>Click to upload files (PDF, DOC, JPG)</span>`;
                }
            });
        }

        // Button Ripple Effect
        const buttons = document.querySelectorAll('.btn-primary');
        buttons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                const x = e.clientX - e.target.getBoundingClientRect().left;
                const y = e.clientY - e.target.getBoundingClientRect().top;

                const ripple = document.createElement('span');
                ripple.classList.add('ripple');
                ripple.style.left = `${x}px`;
                ripple.style.top = `${y}px`;

                this.appendChild(ripple);

                setTimeout(() => {
                    ripple.remove();
                }, 1000);
            });
        });

        // Animation on Scroll
        const animateOnScroll = () => {
            const elements = document.querySelectorAll('.benefit-card, .type-card, .perk-item');

            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.2;

                if (elementPosition < screenPosition) {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }
            });
        };

        // Set initial state for animated elements
        document.querySelectorAll('.benefit-card, .type-card, .perk-item').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        });

        window.addEventListener('scroll', animateOnScroll);
        window.addEventListener('load', animateOnScroll);
    </script>
</body>
</html>
