<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Articles | Street & Ink</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Base Styles from Main Site */
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
            transition: background-color 0.3s ease;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            line-height: 1.2;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: var(--transition);
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
            background-color: var(--secondary);
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-secondary:hover {
            background-color: var(--primary);
            color: var(--white);
        }

        .section {
            padding: 80px 0;
        }

        /* Header Styles - Fixed */
        header {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.05);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            padding: 15px 0;
            transition: var(--transition);
        }

        [data-theme="dark"] header {
            background-color: rgba(18, 18, 18, 0.95);
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
        }

        .logo span {
            color: var(--accent);
        }

        .logo i {
            margin-right: 10px;
            font-size: 1.5rem;
        }

        /* Navigation Styles - Fixed */
        #nav ul {
            display: flex;
            align-items: center;
            gap: 25px;
            list-style: none;
        }

        #nav ul li a {
            font-weight: 500;
            padding: 8px 0;
            position: relative;
        }

        #nav ul li a:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--accent);
            transition: var(--transition);
        }

        #nav ul li a:hover:after {
            width: 100%;
        }

        #nav ul li .btn {
            margin-left: 10px;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: var(--primary);
            font-size: 1.5rem;
            cursor: pointer;
            padding: 5px;
        }

        /* Articles Page Specific Styles */
        .articles-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                        url('https://images.unsplash.com/photo-1547891654-e66ed7ebb968?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80') no-repeat center center/cover;
            color: white;
            padding: 180px 0 100px;
            text-align: center;
            margin-top: 60px; /* Added to account for fixed header */
        }

        .articles-hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
        }

        .articles-hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 30px;
            opacity: 0.9;
        }

        .articles-tagline {
            display: inline-block;
            background-color: var(--accent);
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 600;
            margin-bottom: 30px;
        }

        /* Search and Filter Section - Fixed spacing */
        .articles-filter {
            background-color: var(--secondary);
            padding: 30px 0;
            position: sticky;
            top: 60px; /* Adjusted for fixed header */
            z-index: 100;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        [data-theme="dark"] .articles-filter {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .filter-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-container {
            flex: 1;
            min-width: 300px;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 14px 50px 14px 20px; /* More padding on right for button */
            border-radius: 50px;
            border: none;
            font-size: 1rem;
            background-color: var(--white);
            color: var(--text);
            box-shadow: var(--shadow);
        }

        .search-input:focus {
            outline: none;
            box-shadow: 0 0 0 2px var(--accent);
        }

        .search-btn {
            position: absolute;
            right: 5px;
            top: 5px;
            background-color: var(--accent);
            color: var(--white);
            border: none;
            border-radius: 50px;
            padding: 9px 20px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .search-btn:hover {
            background-color: var(--accent-dark);
        }

        .filter-group {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .filter-dropdown {
            position: relative;
        }

        .filter-btn {
            background-color: var(--white);
            color: var(--text);
            border: none;
            padding: 12px 20px;
            border-radius: var(--border-radius);
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: var(--shadow);
        }

        .filter-btn i {
            transition: transform 0.3s ease;
        }

        .filter-btn.active i {
            transform: rotate(180deg);
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background-color: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 15px;
            min-width: 200px;
            z-index: 10;
            display: none;
            margin-top: 10px;
        }

        .dropdown-menu.show {
            display: block;
        }

        .dropdown-item {
            padding: 8px 0;
            cursor: pointer;
            transition: var(--transition);
        }

        .dropdown-item:hover {
            color: var(--accent);
        }

        .tag-filters {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .tag-filter {
            background-color: var(--white);
            padding: 8px 15px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: var(--shadow);
        }

        .tag-filter:hover, .tag-filter.active {
            background-color: var(--accent);
            color: var(--white);
        }

        /* Articles Grid */
        .articles-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
            margin: 40px 0;
        }

        .featured-article {
            grid-column: 1 / -1;
            display: flex;
            background-color: var(--secondary);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .featured-image {
            flex: 1;
            min-height: 400px;
        }

        .featured-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .featured-content {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .featured-badge {
            background-color: var(--accent);
            color: var(--white);
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 15px;
            display: inline-block;
        }

        .featured-content h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .featured-content p {
            margin-bottom: 25px;
            color: var(--text-light);
        }

        .article-meta {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .author-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
        }

        .author-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .meta-text {
            font-size: 0.9rem;
        }

        .author-name {
            font-weight: 600;
        }

        .article-date {
            color: var(--text-light);
            font-size: 0.8rem;
        }

        .read-time {
            display: flex;
            align-items: center;
            gap: 5px;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .article-tags {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .article-tag {
            background-color: var(--white);
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        /* Regular Article Cards */
        .article-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .article-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .article-image {
            height: 200px;
            overflow: hidden;
        }

        .article-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .article-card:hover .article-image img {
            transform: scale(1.05);
        }

        .article-content {
            padding: 25px;
        }

        .article-content h3 {
            font-size: 1.3rem;
            margin-bottom: 15px;
        }

        .article-excerpt {
            color: var(--text-light);
            margin-bottom: 20px;
            font-size: 0.95rem;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 50px;
        }

        .page-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--secondary);
            color: var(--text);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .page-btn:hover, .page-btn.active {
            background-color: var(--accent);
            color: var(--white);
        }

        .page-btn.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* CTA Section */
        .articles-cta {
            text-align: center;
            padding: 80px 0;
            background-color: var(--secondary);
            margin-top: 60px;
        }

        .articles-cta h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .articles-cta p {
            max-width: 600px;
            margin: 0 auto 30px;
            color: var(--text-light);
        }

        /* Tags Cloud */
        .tags-cloud {
            background-color: var(--white);
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            margin-top: 40px;
        }

        .tags-cloud h3 {
            margin-bottom: 20px;
            font-size: 1.2rem;
        }

        .tags-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .tag {
            padding: 8px 15px;
            background-color: var(--secondary);
            border-radius: 50px;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .tag:hover {
            background-color: var(--accent);
            color: var(--white);
        }

        /* Sidebar Layout */
        .articles-main {
            display: flex;
            gap: 40px;
        }

        .articles-grid {
            flex: 2;
        }

        .articles-sidebar {
            flex: 1;
        }

        .sidebar-widget {
            background-color: var(--white);
            padding: 25px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            margin-bottom: 30px;
        }

        .sidebar-widget h3 {
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .sidebar-widget h3:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: var(--accent);
        }

        .trending-article {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .trending-image {
            width: 80px;
            height: 80px;
            border-radius: var(--border-radius);
            overflow: hidden;
            flex-shrink: 0;
        }

        .trending-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .trending-content h4 {
            font-size: 1rem;
            margin-bottom: 5px;
        }

        .trending-meta {
            font-size: 0.8rem;
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
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.9rem;
            opacity: 0.7;
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

        /* Responsive Styles */
        @media (max-width: 1200px) {
            .articles-main {
                flex-direction: column;
            }

            .articles-sidebar {
                order: -1;
            }
        }

        @media (max-width: 992px) {
            .articles-hero h1 {
                font-size: 2.8rem;
            }

            .featured-article {
                flex-direction: column;
            }

            .featured-image {
                min-height: 300px;
            }
        }

        @media (max-width: 768px) {
            .articles-hero {
                padding: 150px 0 80px;
            }

            .articles-hero h1 {
                font-size: 2.2rem;
            }

            .filter-container {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-group {
                justify-content: center;
            }

            .articles-container {
                grid-template-columns: 1fr;
            }

            /* Mobile menu styles */
            #nav ul {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: var(--white);
                flex-direction: column;
                gap: 0;
                padding: 20px 0;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            }

            [data-theme="dark"] #nav ul {
                background-color: var(--secondary);
            }

            #nav ul.active {
                display: flex;
            }

            #nav ul li {
                width: 100%;
                text-align: center;
                padding: 15px 0;
            }

            #nav ul li a {
                display: block;
                padding: 10px 20px;
            }

            #nav ul li a:after {
                display: none;
            }

            #nav ul li .btn {
                margin: 15px auto 0;
                display: block;
                width: max-content;
            }

            .mobile-menu-btn {
                display: block;
            }

            .theme-toggle {
                margin-left: 15px;
            }
        }

        @media (max-width: 576px) {
            .articles-hero {
                padding: 130px 0 60px;
            }

            .articles-hero h1 {
                font-size: 2rem;
            }

            .featured-content {
                padding: 25px;
            }

            .featured-content h2 {
                font-size: 1.5rem;
            }

            .filter-btn {
                padding: 10px 15px;
                font-size: 0.9rem;
            }

            .tag-filter {
                padding: 6px 12px;
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <!-- Fixed Header -->
    <header id="header">
        <div class="container header-container">
            <a href="index.php" class="logo">
                <a href="{{ route('home') }}" class="logo" style="color: rgb(0, 0, 0);">
                <i class="fas fa-spray-can"></i>Street & <span>Ink</span></a>
            </a>
            <div style="display: flex; align-items: center;">
                <nav id="nav">
                    <ul>
                        <li><a href="#">Map</a></li>
                        <li><a href="#">Street Art</a></li>
                        <li><a href="#">Artists</a></li>
                        <li><a href="#">Articles</a></li>
                        <li><a href="#">Community</a></li>
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
    <section class="articles-hero">
        <div class="container">
            <span class="articles-tagline">🎨 Stay inspired. Stay inked.</span>
            <h1>All Articles</h1>
            <p>Street stories, artist spotlights, and urban culture insights from around the globe.</p>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="articles-filter">
        <div class="container">
            <div class="filter-container">
                <div class="search-container">
                    <input type="text" class="search-input" placeholder="Search articles...">
                    <button class="search-btn"><i class="fas fa-search"></i></button>
                </div>

                <div class="filter-group">
                    <div class="filter-dropdown">
                        <button class="filter-btn">
                            Categories <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu">
                            <div class="dropdown-item">Artist Spotlight</div>
                            <div class="dropdown-item">City Guides</div>
                            <div class="dropdown-item">Graffiti Culture</div>
                            <div class="dropdown-item">Events</div>
                            <div class="dropdown-item">Interviews</div>
                            <div class="dropdown-item">Tips & Tutorials</div>
                        </div>
                    </div>

                    <div class="filter-dropdown">
                        <button class="filter-btn">
                            Sort by: Newest <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu">
                            <div class="dropdown-item">Newest</div>
                            <div class="dropdown-item">Most Popular</div>
                            <div class="dropdown-item">Recommended</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tag-filters">
                <div class="tag-filter active">All</div>
                <div class="tag-filter">#Graffiti</div>
                <div class="tag-filter">#Murals</div>
                <div class="tag-filter">#StreetArt</div>
                <div class="tag-filter">#UrbanCulture</div>
                <div class="tag-filter">#ArtistSpotlight</div>
                <div class="tag-filter">#NYC</div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="section">
        <div class="container">
            <div class="articles-main">
                <div class="articles-grid">
                    <!-- Featured Article -->
                    <div class="featured-article">
                        <div class="featured-image">
                            <img src="img/pexels-brett-sayles-1121894.jpg" alt="Featured Article">
                        </div>
                        <div class="featured-content">
                            <span class="featured-badge">Featured</span>
                            <h2>The Rise of Political Street Art in 2023</h2>
                            <p>How artists are using urban spaces to comment on current events and social issues around the world, with exclusive interviews from Berlin to Buenos Aires.</p>

                            <div class="article-meta">
                                <div class="author-avatar">
                                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Author">
                                </div>
                                <div class="meta-text">
                                    <div class="author-name">Sarah Chen</div>
                                    <div class="article-date">June 15, 2023</div>
                                </div>
                                <div class="read-time">
                                    <i class="far fa-clock"></i> 8 min read
                                </div>
                            </div>

                            <div class="article-tags">
                                <span class="article-tag">#PoliticalArt</span>
                                <span class="article-tag">#Global</span>
                                <span class="article-tag">#Trending</span>
                            </div>

                            <a href="#" class="btn btn-primary" style="margin-top: 20px; align-self: flex-start;">Read Article</a>
                        </div>
                    </div>

                    <!-- Articles Grid -->
                    <div class="articles-container">
                        <!-- Article 1 -->
                        <div class="article-card">
                            <div class="article-image">
                                <img src="img/pexels-ibrahim-hafeez-563364-1319828.jpg" alt="Article Image">
                            </div>
                            <div class="article-content">
                                <h3>Interview: The Neon Artist Lighting Up Downtown LA</h3>
                                <p class="article-excerpt">We sit down with the anonymous artist behind the glowing murals transforming the city's nightscape.</p>

                                <div class="article-meta">
                                    <div class="author-avatar">
                                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Author">
                                    </div>
                                    <div class="meta-text">
                                        <div class="author-name">Marcus Johnson</div>
                                        <div class="article-date">June 8, 2023</div>
                                    </div>
                                    <div class="read-time">
                                        <i class="far fa-clock"></i> 5 min read
                                    </div>
                                </div>

                                <div class="article-tags">
                                    <span class="article-tag">#Interview</span>
                                    <span class="article-tag">#LA</span>
                                </div>
                            </div>
                        </div>

                        <!-- Article 2 -->
                        <div class="article-card">
                            <div class="article-image">
                                <img src="img/pexels-khalidgarcia-1376092.jpg" alt="Article Image">
                            </div>
                            <div class="article-content">
                                <h3>Street Art Festivals You Can't Miss This Summer</h3>
                                <p class="article-excerpt">From Berlin to Buenos Aires, here are the must-visit urban art events of the season.</p>

                                <div class="article-meta">
                                    <div class="author-avatar">
                                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Author">
                                    </div>
                                    <div class="meta-text">
                                        <div class="author-name">Lena Kowalski</div>
                                        <div class="article-date">May 30, 2023</div>
                                    </div>
                                    <div class="read-time">
                                        <i class="far fa-clock"></i> 4 min read
                                    </div>
                                </div>

                                <div class="article-tags">
                                    <span class="article-tag">#Events</span>
                                    <span class="article-tag">#Global</span>
                                </div>
                            </div>
                        </div>

                        <!-- Article 3 -->
                        <div class="article-card">
                            <div class="article-image">
                                <img src="img/pexels-arantxa-treva-351075-959314 (1).jpg" alt="Article Image">
                            </div>
                            <div class="article-content">
                                <h3>Tokyo's Underground Street Art Scene</h3>
                                <p class="article-excerpt">Exploring the hidden world of urban art in Japan's bustling capital city.</p>

                                <div class="article-meta">
                                    <div class="author-avatar">
                                        <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Author">
                                    </div>
                                    <div class="meta-text">
                                        <div class="author-name">David Park</div>
                                        <div class="article-date">May 22, 2023</div>
                                    </div>
                                    <div class="read-time">
                                        <i class="far fa-clock"></i> 6 min read
                                    </div>
                                </div>

                                <div class="article-tags">
                                    <span class="article-tag">#Tokyo</span>
                                    <span class="article-tag">#CityGuide</span>
                                </div>
                            </div>
                        </div>

                        <!-- Article 4 -->
                        <div class="article-card">
                            <div class="article-image">
                                <img src="img/pexels-tobiasbjorkli-2119706 (1).jpg" alt="Article Image">
                            </div>
                            <div class="article-content">
                                <h3>How to Photograph Street Art Like a Pro</h3>
                                <p class="article-excerpt">Tips from professional photographers on capturing the perfect shot of urban artworks.</p>

                                <div class="article-meta">
                                    <div class="author-avatar">
                                        <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Author">
                                    </div>
                                    <div class="meta-text">
                                        <div class="author-name">Priya Kumar</div>
                                        <div class="article-date">May 15, 2023</div>
                                    </div>
                                    <div class="read-time">
                                        <i class="far fa-clock"></i> 7 min read
                                    </div>
                                </div>

                                <div class="article-tags">
                                    <span class="article-tag">#Photography</span>
                                    <span class="article-tag">#Tips</span>
                                </div>
                            </div>
                        </div>

                        <!-- Article 5 -->
                        <div class="article-card">
                            <div class="article-image">
                                <img src="img/pexels-heftiba-1194420.jpg" alt="Article Image">
                            </div>
                            <div class="article-content">
                                <h3>The Evolution of Graffiti Lettering Styles</h3>
                                <p class="article-excerpt">Tracing the history and development of typography in urban art from the 1970s to today.</p>

                                <div class="article-meta">
                                    <div class="author-avatar">
                                        <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Author">
                                    </div>
                                    <div class="meta-text">
                                        <div class="author-name">James Lopez</div>
                                        <div class="article-date">May 8, 2023</div>
                                    </div>
                                    <div class="read-time">
                                        <i class="far fa-clock"></i> 10 min read
                                    </div>
                                </div>

                                <div class="article-tags">
                                    <span class="article-tag">#Graffiti</span>
                                    <span class="article-tag">#History</span>
                                </div>
                            </div>
                        </div>

                        <!-- Article 6 -->
                        <div class="article-card">
                            <div class="article-image">
                                <img src="img/pexels-fernando-dos-santos-campos-1309016-2510245 (1).jpg" alt="Article Image">
                            </div>
                            <div class="article-content">
                                <h3>Street Art Conservation: Preserving Urban Masterpieces</h3>
                                <p class="article-excerpt">The challenges and techniques of protecting ephemeral street artworks from the elements.</p>

                                <div class="article-meta">
                                    <div class="author-avatar">
                                        <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Author">
                                    </div>
                                    <div class="meta-text">
                                        <div class="author-name">Aisha Mohammed</div>
                                        <div class="article-date">April 30, 2023</div>
                                    </div>
                                    <div class="read-time">
                                        <i class="far fa-clock"></i> 8 min read
                                    </div>
                                </div>

                                <div class="article-tags">
                                    <span class="article-tag">#Conservation</span>
                                    <span class="article-tag">#UrbanArt</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination">
                        <div class="page-btn disabled">
                            <i class="fas fa-chevron-left"></i>
                        </div>
                        <div class="page-btn active">1</div>
                        <div class="page-btn">2</div>
                        <div class="page-btn">3</div>
                        <div class="page-btn">4</div>
                        <div class="page-btn">5</div>
                        <div class="page-btn">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="articles-sidebar">
                    <div class="sidebar-widget">
                        <h3>Trending Now</h3>

                        <div class="trending-article">
                            <div class="trending-image">
                                <img src="img/pexels-conojeghuo-173301.jpg" alt="Trending Article">
                            </div>
                            <div class="trending-content">
                                <h4>Banksy's Latest Work Sparks Controversy</h4>
                                <div class="trending-meta">June 12, 2023 • 5 min read</div>
                            </div>
                        </div>

                        <div class="trending-article">
                            <div class="trending-image">
                                <img src="img/pexels-vincent-gerbouin-445991-2263686.jpg" alt="Trending Article">
                            </div>
                            <div class="trending-content">
                                <h4>Women in Street Art: Breaking Barriers</h4>
                                <div class="trending-meta">June 5, 2023 • 7 min read</div>
                            </div>
                        </div>

                        <div class="trending-article">
                            <div class="trending-image">
                                <img src="img/pexels-heftiba-1194420.jpg" alt="Trending Article">
                            </div>
                            <div class="trending-content">
                                <h4>How Augmented Reality is Changing Street Art</h4>
                                <div class="trending-meta">May 28, 2023 • 6 min read</div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-widget">
                        <h3>Popular Tags</h3>
                        <div class="tags-container">
                            <div class="tag">#Graffiti</div>
                            <div class="tag">#Murals</div>
                            <div class="tag">#Banksy</div>
                            <div class="tag">#NYC</div>
                            <div class="tag">#Berlin</div>
                            <div class="tag">#StreetArt</div>
                            <div class="tag">#UrbanArt</div>
                            <div class="tag">#Stencil</div>
                            <div class="tag">#Wheatpaste</div>
                            <div class="tag">#PoliticalArt</div>
                        </div>
                    </div>

                    <div class="sidebar-widget">
                        <h3>Newsletter</h3>
                        <p style="margin-bottom: 15px;">Get the latest articles delivered to your inbox.</p>
                        <input type="email" placeholder="Your email" style="width: 100%; padding: 12px; margin-bottom: 10px; border-radius: var(--border-radius); border: 1px solid #ddd;">
                        <button class="btn btn-primary" style="width: 100%;">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- CTA Section -->
    <section class="articles-cta">
        <div class="container">
            <h2>Got a story to tell?</h2>
            <p>Share your street art discoveries, artist interviews, or urban culture insights with our global community.</p>
            <a href="#" class="btn btn-primary btn-large">Submit Your Article</a>
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
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div>
                    <h3 class="footer-title">Explore</h3>
                    <ul class="footer-links">
                        <li><a href="#">Map</a></li>
                        <li><a href="#">Street Art</a></li>
                        <li><a href="#">Artists</a></li>
                        <li><a href="#">Articles</a></li>
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
                        <li><a href="#">Get Involved</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="footer-title">Company</h3>
                    <ul class="footer-links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">FAQ</a></li>
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

        // Dropdown Toggle
        const filterBtns = document.querySelectorAll('.filter-btn');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const dropdown = btn.nextElementSibling;
                btn.classList.toggle('active');
                dropdown.classList.toggle('show');
            });
        });

        // Close dropdown when clicking outside
        window.addEventListener('click', (e) => {
            if (!e.target.matches('.filter-btn')) {
                filterBtns.forEach(btn => {
                    btn.classList.remove('active');
                    btn.nextElementSibling.classList.remove('show');
                });
            }
        });

        // Tag Filter Functionality
        const tagFilters = document.querySelectorAll('.tag-filter');

        tagFilters.forEach(tag => {
            tag.addEventListener('click', () => {
                tagFilters.forEach(t => t.classList.remove('active'));
                tag.classList.add('active');
                // In a real implementation, this would filter the articles
                console.log(`Filtering by: ${tag.textContent}`);
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

        // Pagination
        const pageBtns = document.querySelectorAll('.page-btn:not(.disabled)');

        pageBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                if (btn.querySelector('i')) return; // Skip arrow buttons

                document.querySelector('.page-btn.active').classList.remove('active');
                btn.classList.add('active');
                // In a real implementation, this would load the page
                console.log(`Loading page ${btn.textContent}`);
            });
        });

        // Article card hover effect
        const articleCards = document.querySelectorAll('.article-card');

        articleCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-10px)';
                card.style.boxShadow = '0 15px 30px rgba(0, 0, 0, 0.1)';
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
                card.style.boxShadow = 'var(--shadow)';
            });
        });

        // Featured article hover effect
        const featuredArticle = document.querySelector('.featured-article');
        if (featuredArticle) {
            featuredArticle.addEventListener('mouseenter', () => {
                featuredArticle.style.transform = 'translateY(-5px)';
                featuredArticle.style.boxShadow = '0 15px 30px rgba(0, 0, 0, 0.1)';
            });

            featuredArticle.addEventListener('mouseleave', () => {
                featuredArticle.style.transform = 'translateY(0)';
                featuredArticle.style.boxShadow = 'var(--shadow)';
            });
        }
    </script>
</body>
</html>
