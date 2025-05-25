<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Street & Ink</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Reusing the same CSS from the main page */
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

        /* Hero Section - About Page Specific */
        .about-hero {
            height: 70vh;
            min-height: 600px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1578926375602-3ad9e91ec0a1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80') no-repeat center center/cover;
            color: var(--white);
            margin-top: 80px;
        }

        .about-hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            padding: 0 20px;
        }

        .about-hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .about-hero p {
            font-size: 1.4rem;
            margin-bottom: 3rem;
            opacity: 0.9;
        }

        /* Mission Section */
        .mission {
            background-color: var(--secondary);
        }

        .mission-container {
            display: flex;
            align-items: center;
            gap: 60px;
        }

        .mission-image {
            flex: 1;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .mission-content {
            flex: 1;
        }

        .mission-content h3 {
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        .mission-content p {
            margin-bottom: 20px;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .value-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .value-card:hover {
            transform: translateY(-10px);
        }

        .value-icon {
            font-size: 2rem;
            color: var(--accent);
            margin-bottom: 20px;
        }

        .value-title {
            font-size: 1.3rem;
            margin-bottom: 15px;
        }

        /* Story Section */
        .story {
            position: relative;
            overflow: hidden;
        }

        .story:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1547891654-e66ed7ebb968?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80') no-repeat center center/cover;
            opacity: 0.1;
            z-index: -1;
        }

        .story-container {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .story-quote {
            font-size: 1.8rem;
            font-style: italic;
            margin: 40px 0;
            position: relative;
        }

        .story-quote:before, .story-quote:after {
            content: '"';
            font-size: 3rem;
            color: var(--accent);
            opacity: 0.5;
            position: absolute;
        }

        .story-quote:before {
            top: -20px;
            left: -30px;
        }

        .story-quote:after {
            bottom: -40px;
            right: -30px;
        }

        /* Team Section */
        .team {
            background-color: var(--secondary);
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .team-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            text-align: center;
        }

        .team-card:hover {
            transform: translateY(-10px);
        }

        .team-card-img {
            height: 300px;
            overflow: hidden;
        }

        .team-card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .team-card:hover .team-card-img img {
            transform: scale(1.05);
        }

        .team-card-content {
            padding: 25px 20px;
        }

        .team-card-name {
            font-size: 1.4rem;
            margin-bottom: 5px;
        }

        .team-card-role {
            color: var(--accent);
            font-weight: 600;
            margin-bottom: 15px;
        }

        .team-card-bio {
            margin-bottom: 20px;
            font-size: 0.95rem;
            color: var(--text-light);
        }

        .team-social {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .team-social a {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .team-social a:hover {
            background-color: var(--accent);
            color: var(--white);
        }

        /* Vision Section */
        .vision {
            text-align: center;
        }

        .vision-features {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 30px;
            margin: 50px 0;
        }

        .vision-feature {
            background-color: var(--white);
            border-radius: var(--border-radius);
            padding: 30px 20px;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .vision-feature:hover {
            transform: translateY(-5px);
        }

        .vision-feature i {
            font-size: 2rem;
            color: var(--accent);
            margin-bottom: 20px;
        }

        /* CTA Section */
        .cta {
            background-color: var(--primary);
            color: var(--white);
            text-align: center;
        }

        .cta .section-title {
            color: var(--white);
        }

        .cta .section-title:after {
            background-color: var(--white);
        }

        .cta p {
            max-width: 700px;
            margin: 0 auto 40px;
            opacity: 0.9;
        }

        .cta-btns {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        /* Partners Section */
        .partners {
            background-color: var(--secondary);
        }

        .partners-grid {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 40px;
            margin-top: 50px;
        }

        .partner-logo {
            max-width: 180px;
            filter: grayscale(100%);
            opacity: 0.7;
            transition: var(--transition);
        }

        .partner-logo:hover {
            filter: grayscale(0%);
            opacity: 1;
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

            .mission-container {
                flex-direction: column;
            }

            .about-hero h1 {
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

            .about-hero {
                min-height: 500px;
            }

            .about-hero h1 {
                font-size: 2.5rem;
            }

            .about-hero p {
                font-size: 1.2rem;
            }

            .section-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            :root {
                --section-padding: 60px;
            }

            .about-hero h1 {
                font-size: 2.2rem;
            }

            .about-hero p {
                font-size: 1rem;
            }

            .cta-btns {
                flex-direction: column;
                gap: 15px;
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
                        <li><a href="index.php#categories">Categories</a></li>
                        <li><a href="index.php#community">Community</a></li>
                        <li><a href="About.php" class="active">About</a></li>
                        <li><a href="Signin.php" class="btn btn-primary">Sign In</a></li>
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
    <section class="about-hero">
        <div class="about-hero-content">
            <h1>The Streets Tell Stories. We Help You Find Them.</h1>
            <p>Street and Ink is a movement — built to connect people with street art, culture, and creativity in every corner of the world.</p>
            <div style="margin-top: 40px;">
                <a href="#mission" class="btn btn-primary btn-large">Our Mission</a>
                <a href="#team" class="btn btn-secondary btn-large">Meet the Team</a>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="section mission" id="mission">
        <div class="container">
            <h2 class="section-title">Our Mission</h2>
            <p class="text-center">We believe street art is more than just color on a wall — it's culture, rebellion, beauty, and truth.</p>

            <div class="mission-container">
                <div class="mission-image">
                    <img src="https://images.unsplash.com/photo-1578926375602-3ad9e91ec0a1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Our Mission">
                </div>
                <div class="mission-content">
                    <h3>Documenting Urban Creativity</h3>
                    <p>Our mission is to create a platform where anyone, anywhere can discover, appreciate, and share street art. We're building bridges between artists, enthusiasts, and the urban landscape that inspires us all.</p>
                    <p>Street art is ephemeral by nature — murals get painted over, stickers peel away, and installations disappear. We're here to preserve these creative moments and make them accessible to everyone.</p>
                </div>
            </div>

            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3 class="value-title">Connect Communities</h3>
                    <p>Bringing together street art lovers from around the world to share their discoveries and passion.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-camera"></i>
                    </div>
                    <h3 class="value-title">Preserve Art</h3>
                    <p>Creating a digital archive of urban art that might otherwise disappear from city walls.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 class="value-title">Promote Visibility</h3>
                    <p>Helping underground and local artists gain recognition for their public works.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <h3 class="value-title">Easy Discovery</h3>
                    <p>Making finding street art as simple as dropping a pin on a map.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Story Section -->
    <section class="section story" id="story">
        <div class="container">
            <h2 class="section-title">How It Started</h2>

            <div class="story-container">
                <p class="story-quote">It started with a single alley in Manila. A mural that spoke louder than words. We realized street art needs a home online — and so, Street and Ink was born.</p>

                <p>In 2018, our founder was traveling through Southeast Asia when they stumbled upon a breathtaking mural in a Manila backstreet. With no information about the artist or the artwork available, the experience sparked an idea: what if there was a way to document and share these urban masterpieces?</p>

                <p>The first version of Street & Ink was a simple map with a few dozen pins marking street art locations. Today, it's grown into a global community of thousands, documenting tens of thousands of artworks across six continents.</p>

                <div style="margin-top: 50px;">
                    <img src="https://images.unsplash.com/photo-1547891654-e66ed7ebb968?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="First Mural" style="border-radius: var(--border-radius); max-height: 500px; object-fit: cover; width: 100%;">
                    <p style="margin-top: 10px; font-size: 0.9rem; color: var(--text-light);">The alley in Manila that started it all (Photo from our archives)</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="section team" id="team">
        <div class="container">
            <h2 class="section-title">Meet the Team</h2>
            <p class="text-center">The passionate people behind Street & Ink</p>

            <div class="team-grid">
                <!-- Team Member 1 -->
                <div class="team-card">
                    <div class="team-card-img">
                        <img src="img/aderik.jpg" alt="Aderik Bermas">
                    </div>
                    <div class="team-card-content">
                        <h3 class="team-card-name">Bermas, Aderik P.</h3>
                        <div class="team-card-role">Team Leader, Project Manager, System Analyst  and Full Stack Programmer</div>
                        <p class="team-card-bio">Oversees the entire project, manages team coordination, defines system requirements, and contributes to both front-end and back-end development.</p>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="team-card">
                    <div class="team-card-img">
                        <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Jamie Chen">
                    </div>
                    <div class="team-card-content">
                        <h3 class="team-card-name">De Rama, John Cedrick</h3>
                        <div class="team-card-role">Quality Assurance (QA) Engineer</div>
                        <p class="team-card-bio">Ensures the final product meets quality standards through thorough testing and bug tracking, maintaining system reliability and performance.</p>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="team-card">
                    <div class="team-card-img">
                        <img src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Marcus Johnson">
                    </div>
                    <div class="team-card-content">
                        <h3 class="team-card-name">Marabe, John Francis</h3>
                        <div class="team-card-role">UI/UX Designer and Back End Programmer</div>
                        <p class="team-card-bio">Designs intuitive user interfaces and experiences while also developing the server-side logic and APIs to support application functionality.</p>
                        <div class="team-social">
                            <<a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Team Member 4 -->
                <div class="team-card">
                    <div class="team-card-img">
                        <img src="https://images.unsplash.com/photo-1573497620053-ea5300f94f21?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Samira Khan">
                    </div>
                    <div class="team-card-content">
                        <h3 class="team-card-name">Mendoza, Lawrence Kier</h3>
                        <div class="team-card-role">Front End Programmer</div>
                        <p class="team-card-bio">Implements user-facing features using modern frameworks and ensures responsive, accessible, and seamless interaction across devices.</p>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Team Member 5 -->
                <div class="team-card">
                    <div class="team-card-img">
                        <img src="https://images.unsplash.com/photo-1573497620053-ea5300f94f21?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Samira Khan">
                    </div>
                    <div class="team-card-content">
                        <h3 class="team-card-name">Oliveros, Amiel</h3>
                        <div class="team-card-role">User Researcher</div>
                        <p class="team-card-bio">Conducts research and gathers feedback to understand user needs, behavior, and preferences, guiding the design and development process.</p>
                        <div class="team-social">
                           <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Team Member 6 -->
                <div class="team-card">
                    <div class="team-card-img">
                        <img src="img/paul.jpg" alt="Paul Benedict E. Samsaman">
                    </div>
                    <div class="team-card-content">
                        <h3 class="team-card-name">Samsaman, Paul Benedict E.</h3>
                        <div class="team-card-role">The Technical Writer and Database Administrator (DBA)</div>
                        <p class="team-card-bio">Documents technical processes and system architecture while managing database design, performance, and data integrity.</p>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Team Member 7 -->
                <div class="team-card">
                    <div class="team-card-img">
                        <img src="img/anton.jpg" alt="Anton Joseph Tano">
                    </div>
                    <div class="team-card-content">
                        <h3 class="team-card-name">Tano, Anton Joseph</h3>
                        <div class="team-card-role">Test Engineer / QA Tester / Test Framer</div>
                        <p class="team-card-bio">Develops and executes test cases, automates testing processes, and ensures the software behaves as expected under various conditions.</p>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Section -->
    <section class="section vision" id="vision">
        <div class="container">
            <h2 class="section-title">Our Vision for the Future</h2>
            <p>We're building more than just a map — we're building a living archive of street culture. In the future, expect artist profiles, AR experiences, event coverage, and global art collaborations.</p>

            <div class="vision-features">
                <div class="vision-feature">
                    <i class="fas fa-user-astronaut"></i>
                    <h3>AR Experiences</h3>
                    <p>View art through your phone with augmented reality features</p>
                </div>

                <div class="vision-feature">
                    <i class="fas fa-calendar-alt"></i>
                    <h3>Event Coverage</h3>
                    <p>Live documentation of street art festivals worldwide</p>
                </div>

                <div class="vision-feature">
                    <i class="fas fa-hands-helping"></i>
                    <h3>Artist Collaborations</h3>
                    <p>Connecting artists with communities for new works</p>
                </div>

                <div class="vision-feature">
                    <i class="fas fa-book"></i>
                    <h3>Digital Archive</h3>
                    <p>Preserving street art history for future generations</p>
                </div>

                <div class="vision-feature">
                    <i class="fas fa-graduation-cap"></i>
                    <h3>Education</h3>
                    <p>Resources for learning about street art culture</p>
                </div>

                <div class="vision-feature">
                    <i class="fas fa-map-marked-alt"></i>
                    <h3>Global Coverage</h3>
                    <p>Expanding to document street art in every country</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="section partners">
        <div class="container">
            <h2 class="section-title">Our Partners</h2>
            <p class="text-center">Organizations that support our mission</p>

            <div class="partners-grid">
                <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" alt="Urban Arts Fund" class="partner-logo">
                <img src="https://images.unsplash.com/photo-1513151233558-d860c5398176?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Street Art Cities" class="partner-logo">
                <img src="https://images.unsplash.com/photo-1499781350541-7783f6c6a0c8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1415&q=80" alt="Art Everywhere" class="partner-logo">
                <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Creative Cities" class="partner-logo">
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section cta">
        <div class="container">
            <h2 class="section-title">Join the Movement</h2>
            <p>Help us document street art from around the world and connect with a community of urban art enthusiasts.</p>

            <div class="cta-btns">
                <a href="#" class="btn btn-primary btn-large">Submit Street Art</a>
                <a href="index.php#community" class="btn btn-secondary btn-large">Join Our Community</a>
                <a href="Support.php" class="btn btn-secondary btn-large">Support the Project</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-container">
                <div class="footer-about">
                    <a href="#" class="footer-logo">Street & <span>Ink</span></a>
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
                        <li><a href="S&1Articles.php">Blog</a></li>
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
                        <li><a href="About.php">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Partners</a></li>
                        <li><a href="#">Contact</a></li>
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

        // Team card hover effect
        const teamCards = document.querySelectorAll('.team-card');
        teamCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-10px)';
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });

        // Value card hover effect
        const valueCards = document.querySelectorAll('.value-card');
        valueCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-10px)';
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });

        // Vision feature hover effect
        const visionFeatures = document.querySelectorAll('.vision-feature');
        visionFeatures.forEach(feature => {
            feature.addEventListener('mouseenter', () => {
                feature.style.transform = 'translateY(-5px)';
            });
            feature.addEventListener('mouseleave', () => {
                feature.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>
