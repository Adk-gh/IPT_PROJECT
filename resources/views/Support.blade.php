<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Street & Ink | Help Document Urban Art</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Reuse the same CSS variables and base styles from the main page */
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

        button, input, textarea {
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

        /* Support Button in Nav */
        .support-nav-btn {
            background-color: #ff4757;
            color: white;
            padding: 8px 16px;
            border-radius: 50px;
            margin-left: 20px;
            transition: var(--transition);
            display: flex;
            align-items: center;
        }

        .support-nav-btn:hover {
            background-color: #ff6b81;
            transform: scale(1.05);
        }

        .support-nav-btn i {
            margin-right: 8px;
        }

        /* Hero Section for Support Page */
        .support-hero {
            height: 60vh;
            min-height: 500px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1547891654-e66ed7ebb968?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80') no-repeat center center/cover;
            color: var(--white);
            text-align: center;
        }

        .support-hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .support-hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .support-hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        /* Support Options Grid */
        .support-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .support-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            padding: 40px 30px;
            text-align: center;
            border-top: 5px solid var(--accent);
        }

        .support-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .support-icon {
            font-size: 3rem;
            color: var(--accent);
            margin-bottom: 20px;
        }

        .support-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .support-card p {
            color: var(--text-light);
            margin-bottom: 25px;
        }

        .support-btn {
            background-color: #ff4757;
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 600;
            display: inline-block;
            transition: var(--transition);
        }

        .support-btn:hover {
            background-color: #ff6b81;
            transform: translateY(-3px);
            box-shadow: var(--shadow);
        }

        /* Patreon Tiers */
        .patreon-tiers {
            background-color: var(--secondary);
            padding: 60px 0;
            margin: 80px 0;
            border-radius: var(--border-radius);
        }

        .tier-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 40px;
        }

        .tier-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            text-align: center;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .tier-card:hover {
            transform: translateY(-5px);
        }

        .tier-name {
            font-size: 1.3rem;
            color: var(--accent);
            margin-bottom: 10px;
        }

        .tier-price {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 20px;
            font-family: 'Space Grotesk', sans-serif;
        }

        .tier-features {
            margin-bottom: 25px;
            flex-grow: 1;
        }

        .tier-features li {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .tier-features i {
            color: var(--accent);
            margin-right: 8px;
        }

        .tier-button {
            margin-top: auto;
        }

        /* Merch Section */
        .merch-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .merch-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .merch-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .merch-img {
            height: 250px;
            overflow: hidden;
        }

        .merch-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .merch-card:hover .merch-img img {
            transform: scale(1.05);
        }

        .merch-content {
            padding: 20px;
        }

        .merch-title {
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        .merch-price {
            color: var(--accent);
            font-weight: 600;
            margin-bottom: 15px;
        }

        /* Other Ways to Support */
        .other-ways {
            background-color: var(--secondary);
            padding: 60px 0;
            margin: 80px 0;
            border-radius: var(--border-radius);
        }

        .ways-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .way-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            display: flex;
            align-items: flex-start;
        }

        .way-card:hover {
            transform: translateY(-5px);
        }

        .way-icon {
            font-size: 1.5rem;
            color: var(--accent);
            margin-right: 20px;
            margin-top: 5px;
        }

        .way-content h3 {
            font-size: 1.3rem;
            margin-bottom: 10px;
        }

        .way-content p {
            color: var(--text-light);
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

        /* Support Button in Footer */
        .footer-support-btn {
            background-color: #ff4757;
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            display: inline-flex;
            align-items: center;
            margin-top: 15px;
            transition: var(--transition);
        }

        .footer-support-btn:hover {
            background-color: #ff6b81;
            transform: scale(1.05);
        }

        .footer-support-btn i {
            margin-right: 8px;
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

            .support-hero h1 {
                font-size: 3rem;
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

            .support-hero {
                min-height: 400px;
            }

            .support-hero h1 {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            :root {
                --section-padding: 60px;
            }

            .support-hero h1 {
                font-size: 2.2rem;
            }

            .support-hero p {
                font-size: 1rem;
            }
        }

        /* Pulse Animation for Support Button */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }

        .pulse {
            animation: pulse 2s infinite;
        }
    </style>
</head>
<body>
    <!-- Header with Support Button -->
    <header id="header">
        <div class="container header-container">
            <a href="{{ route('home') }}" class="logo" style="color: rgb(0, 0, 0);">
                <i class="fas fa-spray-can"></i>Street & <span>Ink</span></a>
            <div style="display: flex; align-items: center;">
                <nav id="nav">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php#map">Map</a></li>
                        <li><a href="index.php#art">Street Art</a></li>
                        <li><a href="index.php#artists">Artists</a></li>
                        <li><a href="AboutUs.php">About</a></li>
                        <li><a href="Signin.php" class="btn btn-primary">Sign In</a></li>
                        <li><a href="Support.php" class="support-nav-btn pulse"><i class="fas fa-heart"></i> Support Us</a></li>
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
    <section class="support-hero">
        <div class="support-hero-content">
            <h1>❤️ Help Keep the Streets Alive with Art</h1>
            <p>We're building a home for global street culture — and your support keeps it growing.</p>
            <div style="display: flex; gap: 15px; justify-content: center;">
                <a href="#support-options" class="btn btn-primary btn-large">Ways to Support</a>
                <a href="#patreon" class="btn btn-secondary btn-large">Become a Patron</a>
            </div>
        </div>
    </section>

    <!-- Support Options -->
    <section class="section" id="support-options">
        <div class="container">
            <h2 class="section-title">🙌 Ways to Support</h2>
            <p class="text-center">Choose the option that works best for you. Every contribution helps us document and celebrate street art worldwide.</p>

            <div class="support-options">
                <!-- Option 1: Tip Jar -->
                <div class="support-card">
                    <div class="support-icon">
                        <i class="fas fa-coffee"></i>
                    </div>
                    <h3>Buy Us a Coffee</h3>
                    <p>Make a one-time donation to help cover our operating costs and keep the platform free for everyone.</p>
                    <a href="#" class="support-btn"><i class="fas fa-mug-hot"></i> Tip Us</a>
                </div>

                <!-- Option 2: Patreon -->
                <div class="support-card">
                    <div class="support-icon">
                        <i class="fab fa-patreon"></i>
                    </div>
                    <h3>Become a Patron</h3>
                    <p>Join our community of monthly supporters and get exclusive perks while helping sustain the project long-term.</p>
                    <a href="#patreon" class="support-btn"><i class="fab fa-patreon"></i> View Tiers</a>
                </div>

                <!-- Option 3: Merch -->
                <div class="support-card">
                    <div class="support-icon">
                        <i class="fas fa-tshirt"></i>
                    </div>
                    <h3>Buy Merchandise</h3>
                    <p>Show your love for street art with our limited edition tees, prints, and accessories. All proceeds support our work.</p>
                    <a href="#" class="support-btn"><i class="fas fa-shopping-bag"></i> Shop Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Patreon Tiers -->
    <section class="patreon-tiers" id="patreon">
        <div class="container">
            <h2 class="section-title">🎨 Become a Patron</h2>
            <p class="text-center">Join our community of monthly supporters and help us preserve street art culture worldwide.</p>

            <div class="tier-grid">
                <!-- Tier 1 -->
                <div class="tier-card">
                    <h3 class="tier-name">Art Lover</h3>
                    <div class="tier-price">$3/month</div>
                    <ul class="tier-features">
                        <li><i class="fas fa-check"></i> Name on our supporter wall</li>
                        <li><i class="fas fa-check"></i> Behind-the-scenes updates</li>
                        <li><i class="fas fa-check"></i> Voting on new features</li>
                    </ul>
                    <div class="tier-button">
                        <a href="#" class="btn btn-primary">Choose This Tier</a>
                    </div>
                </div>

                <!-- Tier 2 -->
                <div class="tier-card">
                    <h3 class="tier-name">Art Collector</h3>
                    <div class="tier-price">$7/month</div>
                    <ul class="tier-features">
                        <li><i class="fas fa-check"></i> Everything in Art Lover</li>
                        <li><i class="fas fa-check"></i> Early access to new features</li>
                        <li><i class="fas fa-check"></i> Exclusive digital art drops</li>
                        <li><i class="fas fa-check"></i> Monthly desktop wallpapers</li>
                    </ul>
                    <div class="tier-button">
                        <a href="#" class="btn btn-primary">Choose This Tier</a>
                    </div>
                </div>

                <!-- Tier 3 -->
                <div class="tier-card">
                    <h3 class="tier-name">Wall Builder</h3>
                    <div class="tier-price">$12/month</div>
                    <ul class="tier-features">
                        <li><i class="fas fa-check"></i> Everything in Art Collector</li>
                        <li><i class="fas fa-check"></i> Annual surprise merch package</li>
                        <li><i class="fas fa-check"></i> VIP badge on your profile</li>
                        <li><i class="fas fa-check"></i> Input on future directions</li>
                        <li><i class="fas fa-check"></i> Your name in our credits</li>
                    </ul>
                    <div class="tier-button">
                        <a href="#" class="btn btn-primary">Choose This Tier</a>
                    </div>
                </div>
            </div>

            <div class="text-center" style="margin-top: 50px;">
                <a href="#" class="btn btn-secondary"><i class="fab fa-patreon"></i> View All Tiers on Patreon</a>
            </div>
        </div>
    </section>

    <!-- Merch Section -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">🛍️ Street & Ink Merch</h2>
            <p class="text-center">Wear your love for street art with our limited edition merchandise. All proceeds support our mission.</p>

            <div class="merch-grid">
                <!-- Item 1 -->
                <div class="merch-card">
                    <div class="merch-img">
                        <img src="https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Street Art T-Shirt">
                    </div>
                    <div class="merch-content">
                        <h3 class="merch-title">Urban Canvas Tee</h3>
                        <div class="merch-price">$29.99</div>
                        <a href="#" class="btn btn-secondary">Add to Cart</a>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="merch-card">
                    <div class="merch-img">
                        <img src="https://images.unsplash.com/photo-1583744946564-b52d01e2da64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Street Art Hoodie">
                    </div>
                    <div class="merch-content">
                        <h3 class="merch-title">Graffiti Hoodie</h3>
                        <div class="merch-price">$49.99</div>
                        <a href="#" class="btn btn-secondary">Add to Cart</a>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="merch-card">
                    <div class="merch-img">
                        <img src="https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1364&q=80" alt="Street Art Print">
                    </div>
                    <div class="merch-content">
                        <h3 class="merch-title">Limited Edition Print</h3>
                        <div class="merch-price">$39.99</div>
                        <a href="#" class="btn btn-secondary">Add to Cart</a>
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="merch-card">
                    <div class="merch-img">
                        <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" alt="Street Art Stickers">
                    </div>
                    <div class="merch-content">
                        <h3 class="merch-title">Sticker Pack</h3>
                        <div class="merch-price">$12.99</div>
                        <a href="#" class="btn btn-secondary">Add to Cart</a>
                    </div>
                </div>
            </div>

            <div class="text-center" style="margin-top: 50px;">
                <a href="#" class="btn btn-primary">View Full Store</a>
            </div>
        </div>
    </section>

    <!-- Other Ways to Support -->
    <section class="other-ways">
        <div class="container">
            <h2 class="section-title">💡 Other Ways to Support</h2>
            <p class="text-center">No money? No problem. There are plenty of ways to contribute to our community.</p>

            <div class="ways-grid">
                <!-- Way 1 -->
                <div class="way-card">
                    <div class="way-icon">
                        <i class="fas fa-camera"></i>
                    </div>
                    <div class="way-content">
                        <h3>Submit Street Art</h3>
                        <p>Help us grow the map by documenting street art in your area. Every submission makes our database richer.</p>
                    </div>
                </div>

                <!-- Way 2 -->
                <div class="way-card">
                    <div class="way-icon">
                        <i class="fas fa-share-alt"></i>
                    </div>
                    <div class="way-content">
                        <h3>Spread the Word</h3>
                        <p>Tell your friends about Street & Ink. Share our content on social media and help grow our community.</p>
                    </div>
                </div>

                <!-- Way 3 -->
                <div class="way-card">
                    <div class="way-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <div class="way-content">
                        <h3>Contribute Code</h3>
                        <p>We're open source! If you're a developer, check out our GitHub and help improve the platform.</p>
                    </div>
                </div>

                <!-- Way 4 -->
                <div class="way-card">
                    <div class="way-icon">
                        <i class="fas fa-pencil-alt"></i>
                    </div>
                    <div class="way-content">
                        <h3>Write for Our Blog</h3>
                        <p>Share your street art knowledge by contributing articles, interviews, or city guides.</p>
                    </div>
                </div>

                <!-- Way 5 -->
                <div class="way-card">
                    <div class="way-icon">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <div class="way-content">
                        <h3>Volunteer</h3>
                        <p>We occasionally need help with events, translations, and community moderation.</p>
                    </div>
                </div>

                <!-- Way 6 -->
                <div class="way-card">
                    <div class="way-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="way-content">
                        <h3>Corporate Sponsorship</h3>
                        <p>Is your company aligned with our mission? Let's talk about partnership opportunities.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="section" style="padding-bottom: 80px;">
        <div class="container">
            <div style="max-width: 800px; margin: 0 auto; text-align: center;">
                <h2 class="section-title">Every Contribution Matters</h2>
                <p style="margin-bottom: 30px;">Street & Ink is a labor of love created by street art enthusiasts for street art enthusiasts. Your support helps us maintain the platform, add new features, and keep the community thriving.</p>
                <div style="display: flex; gap: 15px; justify-content: center;">
                    <a href="#" class="btn btn-primary btn-large"><i class="fas fa-heart"></i> Support Now</a>
                    <a href="Contact.php" class="btn btn-secondary btn-large"><i class="fas fa-envelope"></i> Contact Us</a>
                </div>
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
                    <a href="Support.php" class="footer-support-btn pulse"><i class="fas fa-heart"></i> Support the Project</a>
                </div>

                <div>
                    <h3 class="footer-title">Explore</h3>
                    <ul class="footer-links">
                        <li><a href="index.php#map">Map</a></li>
                        <li><a href="index.php#art">Street Art</a></li>
                        <li><a href="index.php#artists">Artists</a></li>
                        <li><a href="index.php#categories">Categories</a></li>
                        <li><a href="Articles.php">Blog</a></li>
                        <li><a href="#">Events</a></li>
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
                        <li><a href="AboutUs.php">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Partners</a></li>
                        <li><a href="Contact.php">Contact</a></li>
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

        // Support button hover effects
        const supportBtns = document.querySelectorAll('.support-nav-btn, .support-btn, .footer-support-btn');
        supportBtns.forEach(btn => {
            btn.addEventListener('mouseenter', () => {
                btn.style.transform = 'scale(1.05)';
            });
            btn.addEventListener('mouseleave', () => {
                btn.style.transform = 'scale(1)';
            });
        });

        // Simulate support option clicks
        document.querySelectorAll('.support-btn, .btn-primary').forEach(btn => {
            btn.addEventListener('click', (e) => {
                if (btn.getAttribute('href') === '#') {
                    e.preventDefault();
                    alert('Thank you for wanting to support Street & Ink! In a real implementation, this would redirect to the appropriate payment platform or open a donation modal.');
                }
            });
        });
    </script>
</body>
</html>
