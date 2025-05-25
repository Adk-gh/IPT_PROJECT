<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Street & Ink | Discover Street Artists</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <style>
        /* Reuse existing styles from main page */
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

        /* Header - Same as main page */
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

        /* Hero Section for Artists Page */
        .hero-artists {
            height: 60vh;
            min-height: 500px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.pexels.com/photos/2147478/pexels-photo-2147478.jpeg') no-repeat center center/cover;
            color: var(--white);
            margin-top: 80px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            padding: 0 20px;
        }

        .hero-artists h1 {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 1s ease;
        }

        .hero-artists p {
            font-size: 1.2rem;
            margin-bottom: 3rem;
            opacity: 0.9;
            animation: fadeInUp 1s ease 0.2s forwards;
            opacity: 0;
        }

        /* Search and Filter Section */
        .search-filter {
            background-color: var(--secondary);
            padding: 60px 0;
        }

        .search-container {
            max-width: 800px;
            margin: 0 auto 40px;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 18px 30px;
            border-radius: 50px;
            border: none;
            font-size: 1.1rem;
            box-shadow: var(--shadow);
            background-color: var(--white);
            color: var(--text);
        }

        .search-input:focus {
            outline: none;
        }

        .search-btn {
            position: absolute;
            right: 5px;
            top: 5px;
            background-color: var(--accent);
            color: var(--white);
            border: none;
            border-radius: 50px;
            padding: 13px 25px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .search-btn:hover {
            background-color: var(--accent-dark);
        }

        .filter-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 30px;
        }

        .filter-group {
            background-color: var(--white);
            padding: 15px 25px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }

        .filter-title {
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--accent);
        }

        .filter-options {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .filter-checkbox {
            display: none;
        }

        .filter-label {
            padding: 8px 15px;
            background-color: var(--secondary);
            border-radius: 50px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .filter-checkbox:checked + .filter-label {
            background-color: var(--accent);
            color: var(--white);
        }

        .sort-dropdown {
            padding: 10px 15px;
            border-radius: var(--border-radius);
            border: 1px solid var(--text-light);
            background-color: var(--white);
            color: var(--text);
            cursor: pointer;
        }

        /* Artists Grid */
        .artists-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .artist-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
        }

        .artist-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .artist-card-img {
            height: 250px;
            overflow: hidden;
            position: relative;
        }

        .artist-card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .artist-card:hover .artist-card-img img {
            transform: scale(1.05);
        }

        .artist-card-content {
            padding: 20px;
        }

        .artist-card-name {
            font-size: 1.4rem;
            margin-bottom: 5px;
        }

        .artist-card-location {
            display: flex;
            align-items: center;
            color: var(--text-light);
            margin-bottom: 10px;
            font-size: 0.9rem;
        }

        .artist-card-location i {
            margin-right: 8px;
            color: var(--accent);
        }

        .artist-card-bio {
            margin-bottom: 15px;
            font-size: 0.95rem;
            color: var(--text);
        }

        .artist-card-stats {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }

        .artist-card-stat {
            display: flex;
            align-items: center;
        }

        .artist-card-stat i {
            margin-right: 5px;
            color: var(--accent);
        }

        .artist-card-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .artist-card-tag {
            background-color: var(--secondary);
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .artist-verified {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: var(--accent);
            color: var(--white);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            z-index: 2;
        }

        /* Featured Artist */
        .featured-artist {
            background-color: var(--primary);
            color: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            margin: 80px 0;
            position: relative;
        }

        .featured-artist-container {
            display: flex;
            align-items: center;
            min-height: 400px;
        }

        .featured-artist-content {
            flex: 1;
            padding: 60px;
            position: relative;
            z-index: 2;
        }

        .featured-artist-image {
            flex: 1;
            height: 100%;
            min-height: 400px;
            position: relative;
        }

        .featured-artist-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .featured-artist-badge {
            display: inline-block;
            background-color: var(--accent);
            color: var(--white);
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .featured-artist h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: var(--white);
        }

        .featured-artist p {
            margin-bottom: 25px;
            opacity: 0.9;
            max-width: 600px;
        }

        /* Artist Spotlights */
        .artist-spotlights {
            margin: 80px 0;
        }

        .spotlight-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .spotlight-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .spotlight-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .spotlight-card-img {
            height: 200px;
            overflow: hidden;
        }

        .spotlight-card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .spotlight-card:hover .spotlight-card-img img {
            transform: scale(1.05);
        }

        .spotlight-card-content {
            padding: 25px;
        }

        .spotlight-card-date {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .spotlight-card-title {
            font-size: 1.3rem;
            margin-bottom: 15px;
        }

        .spotlight-card-excerpt {
            margin-bottom: 20px;
            color: var(--text-light);
        }

        .spotlight-card-link {
            color: var(--accent);
            font-weight: 600;
            display: inline-flex;
            align-items: center;
        }

        .spotlight-card-link i {
            margin-left: 5px;
            transition: var(--transition);
        }

        .spotlight-card-link:hover i {
            transform: translateX(5px);
        }

        /* Call to Action */
        .artist-cta {
            text-align: center;
            padding: 80px 0;
            background-color: var(--secondary);
            border-radius: var(--border-radius);
            margin: 80px 0;
        }

        .artist-cta h2 {
            font-size: 2.2rem;
            margin-bottom: 20px;
        }

        .artist-cta p {
            max-width: 700px;
            margin: 0 auto 40px;
        }

        /* Artist Map */
        .artist-map {
            height: 500px;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            margin: 80px 0;
        }

        #artistWorldMap {
            width: 100%;
            height: 100%;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 60px;
        }

        .page-link {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: var(--secondary);
            transition: var(--transition);
        }

        .page-link:hover, .page-link.active {
            background-color: var(--accent);
            color: var(--white);
        }

        /* Footer - Same as main page */
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

            .featured-artist-container {
                flex-direction: column;
            }

            .featured-artist-content {
                padding: 40px;
            }

            .featured-artist-image {
                min-height: 300px;
                width: 100%;
            }
        }

        @media (max-width: 992px) {
            :root {
                --section-padding: 80px;
            }

            .hero-artists h1 {
                font-size: 3rem;
            }

            .filter-container {
                flex-direction: column;
                align-items: center;
            }

            .filter-group {
                width: 100%;
                max-width: 500px;
            }

            .artists-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
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

            .hero-artists {
                min-height: 400px;
                margin-top: 70px;
            }

            .hero-artists h1 {
                font-size: 2.5rem;
            }

            .featured-artist-content {
                padding: 30px;
            }

            .featured-artist h2 {
                font-size: 2rem;
            }

            .spotlight-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            :root {
                --section-padding: 60px;
            }

            .hero-artists h1 {
                font-size: 2.2rem;
            }

            .hero-artists p {
                font-size: 1rem;
            }

            .search-input {
                padding: 15px 20px;
                font-size: 1rem;
            }

            .search-btn {
                padding: 10px 15px;
            }

            .artist-card-name {
                font-size: 1.2rem;
            }

            .featured-artist-content {
                padding: 25px;
            }

            .featured-artist h2 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header - Same as main page -->
    <header id="header">
        <div class="container header-container">
           <a href="{{ route('home') }}" class="logo" style="color: rgb(0, 0, 0);">
                <i class="fas fa-spray-can"></i>Street & <span>Ink</span></a>
            <div style="display: flex; align-items: center;">
                <nav id="nav">
                    <ul>
                        <li><a href="#map">Map</a></li>
                        <li><a href="#art">Street Art</a></li>
                        <li><a href="#artists">Artists</a></li>
                        <li><a href="#categories">Categories</a></li>
                        <li><a href="#community">Community</a></li>
                        <li><a href="#about">About</a></li>
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
    <section class="hero-artists">
        <div class="hero-content">
            <h1>All Street Artists</h1>
            <p>From seasoned muralists to fresh urban artists, explore the creators who are redefining public spaces.</p>
        </div>
    </section>

    <!-- Search and Filter Section -->
    <section class="search-filter">
        <div class="container">
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Search artists by name, city, or style...">
                <button class="search-btn">Search</button>
            </div>

            <div class="filter-container">
                <div class="filter-group">
                    <div class="filter-title">Filter by Style</div>
                    <div class="filter-options">
                        <input type="checkbox" id="graffiti" class="filter-checkbox">
                        <label for="graffiti" class="filter-label">Graffiti</label>

                        <input type="checkbox" id="murals" class="filter-checkbox">
                        <label for="murals" class="filter-label">Murals</label>

                        <input type="checkbox" id="stencils" class="filter-checkbox">
                        <label for="stencils" class="filter-label">Stencils</label>

                        <input type="checkbox" id="stickers" class="filter-checkbox">
                        <label for="stickers" class="filter-label">Stickers</label>

                        <input type="checkbox" id="installations" class="filter-checkbox">
                        <label for="installations" class="filter-label">Installations</label>
                    </div>
                </div>

                <div class="filter-group">
                    <div class="filter-title">Filter by Location</div>
                    <select class="sort-dropdown">
                        <option>All Locations</option>
                        <option>North America</option>
                        <option>Europe</option>
                        <option>Asia</option>
                        <option>South America</option>
                        <option>Africa</option>
                        <option>Australia</option>
                    </select>
                </div>

                <div class="filter-group">
                    <div class="filter-title">Sort by</div>
                    <select class="sort-dropdown">
                        <option>Most Popular</option>
                        <option>Newest</option>
                        <option>Most Artworks</option>
                        <option>A-Z</option>
                    </select>
                </div>
            </div>
        </div>
    </section>

    <!-- Artists Grid Section -->
    <section class="section">
        <div class="container">
            <div class="artists-grid">
                <!-- Artist 1 -->
                <div class="artist-card">
                    <div class="artist-card-img">
                        <img src="https://images.unsplash.com/photo-1542103749-8ef59b94f47e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Artist">
                        <div class="artist-verified" title="Verified Artist"><i class="fas fa-check"></i></div>
                    </div>
                    <div class="artist-card-content">
                        <h3 class="artist-card-name">Banksy</h3>
                        <div class="artist-card-location">
                            <i class="fas fa-map-marker-alt"></i> Bristol, UK
                        </div>
                        <p class="artist-card-bio">Anonymous England-based street artist known for his satirical and subversive work.</p>
                        <div class="artist-card-stats">
                            <div class="artist-card-stat">
                                <i class="fas fa-paint-brush"></i> 120+ Artworks
                            </div>
                            <div class="artist-card-stat">
                                <i class="fas fa-heart"></i> 25K Likes
                            </div>
                        </div>
                        <div class="artist-card-tags">
                            <span class="artist-card-tag">Stencil</span>
                            <span class="artist-card-tag">Political</span>
                            <span class="artist-card-tag">Satire</span>
                        </div>
                    </div>
                </div>

                <!-- Artist 2 -->
                <div class="artist-card">
                    <div class="artist-card-img">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Artist">
                        <div class="artist-verified" title="Verified Artist"><i class="fas fa-check"></i></div>
                    </div>
                    <div class="artist-card-content">
                        <h3 class="artist-card-name">Shepard Fairey</h3>
                        <div class="artist-card-location">
                            <i class="fas fa-map-marker-alt"></i> Los Angeles, USA
                        </div>
                        <p class="artist-card-bio">American street artist, graphic designer, and founder of OBEY Clothing.</p>
                        <div class="artist-card-stats">
                            <div class="artist-card-stat">
                                <i class="fas fa-paint-brush"></i> 85+ Artworks
                            </div>
                            <div class="artist-card-stat">
                                <i class="fas fa-heart"></i> 18K Likes
                            </div>
                        </div>
                        <div class="artist-card-tags">
                            <span class="artist-card-tag">Stencil</span>
                            <span class="artist-card-tag">Screen Printing</span>
                            <span class="artist-card-tag">Propaganda</span>
                        </div>
                    </div>
                </div>

                <!-- Artist 3 -->
                <div class="artist-card">
                    <div class="artist-card-img">
                        <img src="https://images.unsplash.com/photo-1531123897727-8f129e1688ce?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Artist">
                        <div class="artist-verified" title="Verified Artist"><i class="fas fa-check"></i></div>
                    </div>
                    <div class="artist-card-content">
                        <h3 class="artist-card-name">Maya Hayuk</h3>
                        <div class="artist-card-location">
                            <i class="fas fa-map-marker-alt"></i> Brooklyn, USA
                        </div>
                        <p class="artist-card-bio">Known for her large-scale, symmetrical murals featuring vibrant colors and patterns.</p>
                        <div class="artist-card-stats">
                            <div class="artist-card-stat">
                                <i class="fas fa-paint-brush"></i> 65+ Artworks
                            </div>
                            <div class="artist-card-stat">
                                <i class="fas fa-heart"></i> 15K Likes
                            </div>
                        </div>
                        <div class="artist-card-tags">
                            <span class="artist-card-tag">Abstract</span>
                            <span class="artist-card-tag">Colorful</span>
                            <span class="artist-card-tag">Symmetrical</span>
                        </div>
                    </div>
                </div>

                <!-- Artist 4 -->
                <div class="artist-card">
                    <div class="artist-card-img">
                        <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Artist">
                        <div class="artist-verified" title="Verified Artist"><i class="fas fa-check"></i></div>
                    </div>
                    <div class="artist-card-content">
                        <h3 class="artist-card-name">Felipe Pantone</h3>
                        <div class="artist-card-location">
                            <i class="fas fa-map-marker-alt"></i> Valencia, Spain
                        </div>
                        <p class="artist-card-bio">Argentinian-Spanish artist known for his vibrant, geometric works exploring digital themes.</p>
                        <div class="artist-card-stats">
                            <div class="artist-card-stat">
                                <i class="fas fa-paint-brush"></i> 42+ Artworks
                            </div>
                            <div class="artist-card-stat">
                                <i class="fas fa-heart"></i> 12K Likes
                            </div>
                        </div>
                        <div class="artist-card-tags">
                            <span class="artist-card-tag">Optical</span>
                            <span class="artist-card-tag">Digital</span>
                            <span class="artist-card-tag">Geometric</span>
                        </div>
                    </div>
                </div>

                <!-- Artist 5 -->
                <div class="artist-card">
                    <div class="artist-card-img">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Artist">
                    </div>
                    <div class="artist-card-content">
                        <h3 class="artist-card-name">JR</h3>
                        <div class="artist-card-location">
                            <i class="fas fa-map-marker-alt"></i> Paris, France
                        </div>
                        <p class="artist-card-bio">French artist who uses photography and large-scale installations to make powerful statements.</p>
                        <div class="artist-card-stats">
                            <div class="artist-card-stat">
                                <i class="fas fa-paint-brush"></i> 78+ Artworks
                            </div>
                            <div class="artist-card-stat">
                                <i class="fas fa-heart"></i> 22K Likes
                            </div>
                        </div>
                        <div class="artist-card-tags">
                            <span class="artist-card-tag">Photography</span>
                            <span class="artist-card-tag">Installation</span>
                            <span class="artist-card-tag">Social</span>
                        </div>
                    </div>
                </div>

                <!-- Artist 6 -->
                <div class="artist-card">
                    <div class="artist-card-img">
                        <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Artist">
                    </div>
                    <div class="artist-card-content">
                        <h3 class="artist-card-name">Swoon</h3>
                        <div class="artist-card-location">
                            <i class="fas fa-map-marker-alt"></i> New York, USA
                        </div>
                        <p class="artist-card-bio">American street artist known for her life-size wheatpaste prints and paper cutouts.</p>
                        <div class="artist-card-stats">
                            <div class="artist-card-stat">
                                <i class="fas fa-paint-brush"></i> 55+ Artworks
                            </div>
                            <div class="artist-card-stat">
                                <i class="fas fa-heart"></i> 14K Likes
                            </div>
                        </div>
                        <div class="artist-card-tags">
                            <span class="artist-card-tag">Wheatpaste</span>
                            <span class="artist-card-tag">Portrait</span>
                            <span class="artist-card-tag">Social</span>
                        </div>
                    </div>
                </div>

                <!-- Artist 7 -->
                <div class="artist-card">
                    <div class="artist-card-img">
                        <img src="https://images.unsplash.com/photo-1501196354995-cbb51c65aaea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Artist">
                    </div>
                    <div class="artist-card-content">
                        <h3 class="artist-card-name">Vhils</h3>
                        <div class="artist-card-location">
                            <i class="fas fa-map-marker-alt"></i> Lisbon, Portugal
                        </div>
                        <p class="artist-card-bio">Portuguese street artist known for his unique carving technique that transforms walls into portraits.</p>
                        <div class="artist-card-stats">
                            <div class="artist-card-stat">
                                <i class="fas fa-paint-brush"></i> 68+ Artworks
                            </div>
                            <div class="artist-card-stat">
                                <i class="fas fa-heart"></i> 16K Likes
                            </div>
                        </div>
                        <div class="artist-card-tags">
                            <span class="artist-card-tag">Carving</span>
                            <span class="artist-card-tag">Portrait</span>
                            <span class="artist-card-tag">Urban</span>
                        </div>
                    </div>
                </div>

                <!-- Artist 8 -->
                <div class="artist-card">
                    <div class="artist-card-img">
                        <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Artist">
                    </div>
                    <div class="artist-card-content">
                        <h3 class="artist-card-name">Blu</h3>
                        <div class="artist-card-location">
                            <i class="fas fa-map-marker-alt"></i> Bologna, Italy
                        </div>
                        <p class="artist-card-bio">Italian street artist known for his politically charged murals and stop-motion animations.</p>
                        <div class="artist-card-stats">
                            <div class="artist-card-stat">
                                <i class="fas fa-paint-brush"></i> 92+ Artworks
                            </div>
                            <div class="artist-card-stat">
                                <i class="fas fa-heart"></i> 28K Likes
                            </div>
                        </div>
                        <div class="artist-card-tags">
                            <span class="artist-card-tag">Mural</span>
                            <span class="artist-card-tag">Political</span>
                            <span class="artist-card-tag">Animation</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pagination">
                <a href="#" class="page-link active">1</a>
                <a href="#" class="page-link">2</a>
                <a href="#" class="page-link">3</a>
                <a href="#" class="page-link">4</a>
                <a href="#" class="page-link">5</a>
                <a href="#" class="page-link"><i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </section>

    <!-- Featured Artist Section -->
    <section class="section">
        <div class="container">
            <div class="featured-artist">
                <div class="featured-artist-container">
                    <div class="featured-artist-content">
                        <span class="featured-artist-badge">Featured Artist</span>
                        <h2>Banksy: The Anonymous Revolutionary</h2>
                        <p>Explore the mysterious world of Banksy, the anonymous England-based street artist whose satirical and subversive works combine dark humor with graffiti executed in a distinctive stenciling technique.</p>
                        <a href="#" class="btn btn-primary">Explore Banksy's Art</a>
                    </div>
                    <div class="featured-artist-image">
                        <img src="https://images.unsplash.com/photo-1547891654-e66ed7ebb968?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Banksy Artwork">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Artist Spotlights Section -->
    <section class="section artist-spotlights">
        <div class="container">
            <h2 class="section-title">Artist Spotlights</h2>
            <p class="text-center">Discover in-depth interviews and features with the artists shaping the street art world.</p>

            <div class="spotlight-grid">
                <!-- Spotlight 1 -->
                <div class="spotlight-card">
                    <div class="spotlight-card-img">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Spotlight">
                    </div>
                    <div class="spotlight-card-content">
                        <div class="spotlight-card-date">June 12, 2023</div>
                        <h3 class="spotlight-card-title">Interview: The Women Changing Street Art</h3>
                        <p class="spotlight-card-excerpt">We sit down with three female street artists who are breaking barriers in this male-dominated field.</p>
                        <a href="#" class="spotlight-card-link">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Spotlight 2 -->
                <div class="spotlight-card">
                    <div class="spotlight-card-img">
                        <img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1480&q=80" alt="Spotlight">
                    </div>
                    <div class="spotlight-card-content">
                        <div class="spotlight-card-date">May 28, 2023</div>
                        <h3 class="spotlight-card-title">From Graffiti to Galleries: The Evolution of Street Art</h3>
                        <p class="spotlight-card-excerpt">How street artists are transitioning from illegal walls to prestigious art institutions.</p>
                        <a href="#" class="spotlight-card-link">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Spotlight 3 -->
                <div class="spotlight-card">
                    <div class="spotlight-card-img">
                        <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Spotlight">
                    </div>
                    <div class="spotlight-card-content">
                        <div class="spotlight-card-date">May 15, 2023</div>
                        <h3 class="spotlight-card-title">The Rise of Eco-Conscious Street Art</h3>
                        <p class="spotlight-card-excerpt">Meet the artists using sustainable materials and environmental themes in their urban works.</p>
                        <a href="#" class="spotlight-card-link">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Artist Map Section -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">Artists Around the World</h2>
            <p class="text-center">Explore where our featured artists are based and discover local talent in your area.</p>

            <div class="artist-map">
                <div id="artistWorldMap"></div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="section">
        <div class="container">
            <div class="artist-cta">
                <h2>Are You a Street Artist?</h2>
                <p>Join our growing community of urban artists. Showcase your work, connect with fans, and get featured on Street & Ink.</p>
                <a href="#" class="btn btn-primary btn-large">Submit Your Artwork</a>
            </div>
        </div>
    </section>

    <!-- Footer - Same as main page -->
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
                        <li><a href="#">Map</a></li>
                        <li><a href="#">Street Art</a></li>
                        <li><a href="#">Artists</a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">Blog</a></li>
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
                        <li><a href="#">About Us</a></li>
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

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
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

        // Initialize World Map
        const artistMap = L.map('artistWorldMap').setView([20, 0], 2);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(artistMap);

        // Add sample markers for artist locations
        const artistLocations = [
            {
                lat: 51.4545,
                lng: -2.5879,
                name: "Banksy",
                city: "Bristol, UK",
                type: "stencil"
            },
            {
                lat: 34.0522,
                lng: -118.2437,
                name: "Shepard Fairey",
                city: "Los Angeles, USA",
                type: "stencil"
            },
            {
                lat: 40.6782,
                lng: -73.9442,
                name: "Maya Hayuk",
                city: "Brooklyn, USA",
                type: "mural"
            },
            {
                lat: 39.4699,
                lng: -0.3763,
                name: "Felipe Pantone",
                city: "Valencia, Spain",
                type: "digital"
            },
            {
                lat: 48.8566,
                lng: 2.3522,
                name: "JR",
                city: "Paris, France",
                type: "photography"
            },
            {
                lat: 40.7128,
                lng: -74.0060,
                name: "Swoon",
                city: "New York, USA",
                type: "wheatpaste"
            },
            {
                lat: 38.7223,
                lng: -9.1393,
                name: "Vhils",
                city: "Lisbon, Portugal",
                type: "carving"
            },
            {
                lat: 44.4949,
                lng: 11.3426,
                name: "Blu",
                city: "Bologna, Italy",
                type: "mural"
            }
        ];

        // Create custom icons for different artist types
        const stencilIcon = L.divIcon({
            className: 'stencil-marker',
            html: '<i class="fas fa-cut"></i>',
            iconSize: [30, 30]
        });

        const muralIcon = L.divIcon({
            className: 'mural-marker',
            html: '<i class="fas fa-paint-roller"></i>',
            iconSize: [30, 30]
        });

        const digitalIcon = L.divIcon({
            className: 'digital-marker',
            html: '<i class="fas fa-laptop-code"></i>',
            iconSize: [30, 30]
        });

        const photoIcon = L.divIcon({
            className: 'photo-marker',
            html: '<i class="fas fa-camera"></i>',
            iconSize: [30, 30]
        });

        const wheatpasteIcon = L.divIcon({
            className: 'wheatpaste-marker',
            html: '<i class="fas fa-paste"></i>',
            iconSize: [30, 30]
        });

        const carvingIcon = L.divIcon({
            className: 'carving-marker',
            html: '<i class="fas fa-hammer"></i>',
            iconSize: [30, 30]
        });

        // Add markers to the map
        artistLocations.forEach(artist => {
            let icon;

            switch(artist.type) {
                case 'stencil':
                    icon = stencilIcon;
                    break;
                case 'mural':
                    icon = muralIcon;
                    break;
                case 'digital':
                    icon = digitalIcon;
                    break;
                case 'photography':
                    icon = photoIcon;
                    break;
                case 'wheatpaste':
                    icon = wheatpasteIcon;
                    break;
                case 'carving':
                    icon = carvingIcon;
                    break;
                default:
                    icon = L.divIcon({
                        className: 'default-marker',
                        html: '<i class="fas fa-user"></i>',
                        iconSize: [30, 30]
                    });
            }

            const marker = L.marker([artist.lat, artist.lng], { icon: icon }).addTo(artistMap);
            marker.bindPopup(`
                <h3>${artist.name}</h3>
                <p>${artist.city}</p>
                <small>Style: ${artist.type}</small>
            `);
        });

        // Filter functionality
        const filterCheckboxes = document.querySelectorAll('.filter-checkbox');
        filterCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                console.log(`Filter by ${checkbox.id} is now ${checkbox.checked}`);
                // In a real implementation, this would filter the artist grid
            });
        });

        // Sort functionality
        const sortDropdowns = document.querySelectorAll('.sort-dropdown');
        sortDropdowns.forEach(dropdown => {
            dropdown.addEventListener('change', () => {
                console.log(`Sorted by: ${dropdown.value}`);
                // In a real implementation, this would sort the artist grid
            });
        });

        // Search functionality
        const searchInput = document.querySelector('.search-input');
        const searchBtn = document.querySelector('.search-btn');

        searchBtn.addEventListener('click', () => {
            const searchTerm = searchInput.value;
            console.log(`Searching for: ${searchTerm}`);
            // In a real implementation, this would search the artist grid
        });

        searchInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                const searchTerm = searchInput.value;
                console.log(`Searching for: ${searchTerm}`);
                // In a real implementation, this would search the artist grid
            }
        });

        // Animation on Scroll
        const animateOnScroll = () => {
            const elements = document.querySelectorAll('.artist-card, .spotlight-card');

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
        document.querySelectorAll('.artist-card, .spotlight-card').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        });

        window.addEventListener('scroll', animateOnScroll);
        window.addEventListener('load', animateOnScroll);
    </script>
</body>
</html>
