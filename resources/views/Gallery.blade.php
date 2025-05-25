<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery | Street & Ink</title>
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
            --section-padding: 80px;
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
            border: none;
            outline: none;
            background: none;
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

        .section {
            padding: var(--section-padding) 0;
            position: relative;
        }

        .section-title {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            position: relative;
        }

        .section-title:after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background-color: var(--accent);
            margin: 20px 0 0;
        }

        .text-center {
            text-align: center;
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

        /* Gallery Hero */
        .gallery-hero {
            padding: 180px 0 80px;
            background-color: var(--secondary);
        }

        /* Gallery Filter */
        .gallery-filter {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 40px;
        }

        .filter-btn {
            padding: 10px 20px;
            border-radius: 50px;
            background-color: var(--secondary);
            color: var(--text);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            border: 2px solid transparent;
        }

        .filter-btn:hover, .filter-btn.active {
            background-color: var(--accent);
            color: var(--white);
            border-color: var(--accent);
        }

        /* Gallery Grid */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

      /* Gallery Item */
.gallery-item {
    position: relative;
    border-radius: var(--border-radius);
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: var(--transition);
    aspect-ratio: 1/1;
}

.gallery-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
}

.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.gallery-item:hover img {
    transform: scale(1.05);
}

.gallery-item-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
    padding: 20px;
    color: white !important; /* Force white text */
    opacity: 0;
    transition: var(--transition);
}

.gallery-item-overlay {
    color: white !important; /* Force white text */
}

.gallery-item-overlay * {
    color: inherit !important; /* Ensure all child elements inherit the white color */
}

.gallery-item:hover .gallery-item-overlay {
    opacity: 1;
}

.gallery-item-title {
    font-size: 1.2rem;
    margin-bottom: 5px;
}

.gallery-item-artist {
    font-size: 0.9rem;
    opacity: 0.9;
    margin-bottom: 10px;
}

.gallery-item-location {
    display: flex;
    align-items: center;
    font-size: 0.8rem;
    opacity: 0.8;
}

.gallery-item-location i {
    margin-right: 5px;
}

.gallery-item-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
    margin-top: 10px;
}

.gallery-item-tag {
    background-color: rgba(255, 255, 255, 0.2);
    padding: 3px 10px;
    border-radius: 50px;
    font-size: 0.7rem;
}

/* Dark mode specific adjustments */
[data-theme="dark"] .gallery-item-overlay {
    color: white !important;
}

[data-theme="dark"] .gallery-item-overlay * {
    color: inherit !important;
}
        /* Load More Button */
        .load-more {
            text-align: center;
            margin-top: 50px;
        }

        /* Gallery View Options */
        .gallery-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .view-options {
            display: flex;
            gap: 10px;
        }

        .view-option {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--secondary);
            cursor: pointer;
            transition: var(--transition);
        }

        .view-option.active, .view-option:hover {
            background-color: var(--accent);
            color: var(--white);
        }

        .sort-options {
            position: relative;
        }

        .sort-toggle {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 15px;
            border-radius: 8px;
            background-color: var(--secondary);
            cursor: pointer;
        }

        .sort-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            background-color: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 10px 0;
            min-width: 200px;
            z-index: 100;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
        }

        .sort-options:hover .sort-dropdown {
            opacity: 1;
            visibility: visible;
        }

        .sort-option {
            padding: 10px 20px;
            cursor: pointer;
            transition: var(--transition);
        }

        .sort-option:hover {
            background-color: var(--secondary);
            color: var(--accent);
        }

     /* Lightbox Modal - Update these styles */
.lightbox {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.9);
    z-index: 2000;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transition: var(--transition);
}

.lightbox.active {
    opacity: 1;
    visibility: visible;
}

.lightbox-content {
    position: relative;
    max-width: 90%;
    max-height: 90%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.lightbox-img {
    max-width: 100%;
    max-height: 80vh;
    object-fit: contain;
    border-radius: var(--border-radius);
}

.lightbox-close {
    position: absolute;
    top: -40px;
    right: 0;
    color: white !important; /* Force white color */
    font-size: 2rem;
    cursor: pointer;
}

.lightbox-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 100%;
    display: flex;
    justify-content: space-between;
    padding: 0 20px;
}

.lightbox-btn {
    color: white !important; /* Force white color */
    font-size: 2rem;
    cursor: pointer;
    background-color: rgba(0, 0, 0, 0.5);
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.lightbox-info {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.7);
    padding: 20px;
    color: white !important; /* Force white color */
    border-bottom-left-radius: var(--border-radius);
    border-bottom-right-radius: var(--border-radius);
}

.lightbox-info * {
    color: inherit !important; /* Force all child elements to inherit white color */
}

/* Dark mode specific adjustments */
[data-theme="dark"] .lightbox-close,
[data-theme="dark"] .lightbox-btn,
[data-theme="dark"] .lightbox-info,
[data-theme="dark"] .lightbox-info * {
    color: white !important;
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

            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }

        @media (max-width: 992px) {
            :root {
                --section-padding: 80px;
            }

            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
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

            .gallery-options {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }

            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }

        @media (max-width: 576px) {
            :root {
                --section-padding: 60px;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .gallery-filter {
                gap: 10px;
            }

            .filter-btn {
                padding: 8px 15px;
                font-size: 0.9rem;
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
                        <li><a href="#map">Map</a></li>
                        <li><a href="Gallery.php" class="active">Gallery</a></li>
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

    <!-- Gallery Hero -->
    <section class="section gallery-hero">
        <div class="container">
            <h1 class="section-title">Street Art Gallery</h1>
            <p class="text-center">Explore thousands of street artworks from around the world. Filter by location, artist, or style to discover new urban masterpieces.</p>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="section">
        <div class="container">
            <div class="gallery-options">
                <div class="gallery-filter">
                    <button class="filter-btn active">All</button>
                    <button class="filter-btn">Murals</button>
                    <button class="filter-btn">Graffiti</button>
                    <button class="filter-btn">Stencils</button>
                    <button class="filter-btn">Installations</button>
                    <button class="filter-btn">Political</button>
                    <button class="filter-btn">Abstract</button>
                </div>

                <div class="view-options">
                    <div class="view-option active">
                        <i class="fas fa-th"></i>
                    </div>
                    <div class="view-option">
                        <i class="fas fa-th-large"></i>
                    </div>
                    <div class="view-option">
                        <i class="fas fa-th-list"></i>
                    </div>
                    <div class="sort-options">
                        <div class="sort-toggle">
                            <span>Sort by</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="sort-dropdown">
                            <div class="sort-option">Most Recent</div>
                            <div class="sort-option">Most Popular</div>
                            <div class="sort-option">Artist Name</div>
                            <div class="sort-option">Location</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-grid">
                <!-- Artwork 1 -->
                <div class="gallery-item">
                    <img src="img/pexels-vincent-gerbouin-445991-2263686.jpg" alt="Urban Dreams">
                    <div class="gallery-item-overlay">
                        <h3 class="gallery-item-title">Urban Dreams</h3>
                        <p class="gallery-item-artist">Banksy (unconfirmed)</p>
                        <div class="gallery-item-location">
                            <i class="fas fa-map-marker-alt"></i> Shoreditch, London
                        </div>
                        <div class="gallery-item-tags">
                            <span class="gallery-item-tag">Stencil</span>
                            <span class="gallery-item-tag">Political</span>
                        </div>
                    </div>
                </div>

                <!-- Artwork 2 -->
                <div class="gallery-item">
                    <img src="img/pexels-conojeghuo-173301.jpg" alt="Color Explosion">
                    <div class="gallery-item-overlay">
                        <h3 class="gallery-item-title">Color Explosion</h3>
                        <p class="gallery-item-artist">Maya Hayuk</p>
                        <div class="gallery-item-location">
                            <i class="fas fa-map-marker-alt"></i> Williamsburg, NYC
                        </div>
                        <div class="gallery-item-tags">
                            <span class="gallery-item-tag">Mural</span>
                            <span class="gallery-item-tag">Abstract</span>
                        </div>
                    </div>
                </div>

                <!-- Artwork 3 -->
                <div class="gallery-item">
                    <img src="img/pexels-fernando-dos-santos-campos-1309016-2510245 (1).jpg" alt="The Thinker">
                    <div class="gallery-item-overlay">
                        <h3 class="gallery-item-title">The Thinker</h3>
                        <p class="gallery-item-artist">Unknown Artist</p>
                        <div class="gallery-item-location">
                            <i class="fas fa-map-marker-alt"></i> Berlin, Germany
                        </div>
                        <div class="gallery-item-tags">
                            <span class="gallery-item-tag">Portrait</span>
                            <span class="gallery-item-tag">Monochrome</span>
                        </div>
                    </div>
                </div>

                <!-- Artwork 4 -->
                <div class="gallery-item">
                    <img src="img/pexels-heftiba-1194420.jpg" alt="Neon Dreams">
                    <div class="gallery-item-overlay">
                        <h3 class="gallery-item-title">Neon Dreams</h3>
                        <p class="gallery-item-artist">D*Face</p>
                        <div class="gallery-item-location">
                            <i class="fas fa-map-marker-alt"></i> Downtown LA
                        </div>
                        <div class="gallery-item-tags">
                            <span class="gallery-item-tag">Pop Art</span>
                            <span class="gallery-item-tag">Neon</span>
                        </div>
                    </div>
                </div>

                <!-- Artwork 5 -->
                <div class="gallery-item">
                    <img src="img/pexels-tobiasbjorkli-2119706 (1).jpg" alt="Abstract Flow">
                    <div class="gallery-item-overlay">
                        <h3 class="gallery-item-title">Abstract Flow</h3>
                        <p class="gallery-item-artist">Felipe Pantone</p>
                        <div class="gallery-item-location">
                            <i class="fas fa-map-marker-alt"></i> Wynwood, Miami
                        </div>
                        <div class="gallery-item-tags">
                            <span class="gallery-item-tag">Abstract</span>
                            <span class="gallery-item-tag">Geometric</span>
                        </div>
                    </div>
                </div>

                <!-- Artwork 6 -->
                <div class="gallery-item">
                    <img src="img/pexels-arantxa-treva-351075-959314 (1).jpg" alt="Cultural Fusion">
                    <div class="gallery-item-overlay">
                        <h3 class="gallery-item-title">Cultural Fusion</h3>
                        <p class="gallery-item-artist">Shepard Fairey</p>
                        <div class="gallery-item-location">
                            <i class="fas fa-map-marker-alt"></i> Little Tokyo, LA
                        </div>
                        <div class="gallery-item-tags">
                            <span class="gallery-item-tag">Cultural</span>
                            <span class="gallery-item-tag">Portrait</span>
                        </div>
                    </div>
                </div>

                <!-- Artwork 7 -->
                <div class="gallery-item">
                    <img src="img/pexels-brett-sayles-1121894.jpg" alt="Political Statement">
                    <div class="gallery-item-overlay">
                        <h3 class="gallery-item-title">Political Statement</h3>
                        <p class="gallery-item-artist">Various Artists</p>
                        <div class="gallery-item-location">
                            <i class="fas fa-map-marker-alt"></i> Berlin Wall, Germany
                        </div>
                        <div class="gallery-item-tags">
                            <span class="gallery-item-tag">Political</span>
                            <span class="gallery-item-tag">Historical</span>
                        </div>
                    </div>
                </div>

                <!-- Artwork 8 -->
                <div class="gallery-item">
                    <img src="img/pexels-ibrahim-hafeez-563364-1319828.jpg" alt="Ocean Waves">
                    <div class="gallery-item-overlay">
                        <h3 class="gallery-item-title">Ocean Waves</h3>
                        <p class="gallery-item-artist">Carlos M.</p>
                        <div class="gallery-item-location">
                            <i class="fas fa-map-marker-alt"></i> Lisbon, Portugal
                        </div>
                        <div class="gallery-item-tags">
                            <span class="gallery-item-tag">Mural</span>
                            <span class="gallery-item-tag">Nature</span>
                        </div>
                    </div>
                </div>

                <!-- Artwork 9 -->
                <div class="gallery-item">
                    <img src="img/pexels-khalidgarcia-1376092.jpg" alt="Geometric Patterns">
                    <div class="gallery-item-overlay">
                        <h3 class="gallery-item-title">Geometric Patterns</h3>
                        <p class="gallery-item-artist">Aisha M.</p>
                        <div class="gallery-item-location">
                            <i class="fas fa-map-marker-alt"></i> Barcelona, Spain
                        </div>
                        <div class="gallery-item-tags">
                            <span class="gallery-item-tag">Abstract</span>
                            <span class="gallery-item-tag">Geometric</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="load-more">
                <button class="btn btn-primary">Load More</button>
            </div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div class="lightbox" id="lightbox">
        <div class="lightbox-content">
            <span class="lightbox-close">&times;</span>
            <img src="" alt="" class="lightbox-img">
            <div class="lightbox-nav">
                <button class="lightbox-btn" id="prevBtn"><i class="fas fa-chevron-left"></i></button>
                <button class="lightbox-btn" id="nextBtn"><i class="fas fa-chevron-right"></i></button>
            </div>
            <div class="lightbox-info">
                <h3 id="lightbox-title">Artwork Title</h3>
                <p id="lightbox-artist">Artist Name</p>
                <p id="lightbox-location"><i class="fas fa-map-marker-alt"></i> Location</p>
            </div>
        </div>
    </div>

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
                        <li><a href="#">Map</a></li>
                        <li><a href="#">Gallery</a></li>
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

            <div class="footer-support" style="margin-top: 40px; text-align: center;">
                <h3 style="color: var(--white); margin-bottom: 20px;">Support Street & Ink</h3>
                <p style="opacity: 0.8; margin-bottom: 20px; max-width: 600px; margin-left: auto; margin-right: auto;">
                    Help us continue documenting and celebrating street art around the world. Your support keeps our community thriving.
                </p>
                <div style="display: flex; justify-content: center; gap: 15px; margin-bottom: 30px;">
                    <a href="#" class="btn btn-primary" style="padding: 10px 20px;">Support</a>
                    <a href="#" class="btn btn-secondary" style="padding: 10px 20px; background-color: transparent; border-color: var(--white); color: var(--white);">Become a Member</a>
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

        // Filter Buttons
        const filterButtons = document.querySelectorAll('.filter-btn');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');

                // In a real implementation, this would filter the gallery
                console.log(`Filtering by: ${button.textContent}`);
            });
        });

        // View Options
        const viewOptions = document.querySelectorAll('.view-option');

        viewOptions.forEach(option => {
            option.addEventListener('click', () => {
                viewOptions.forEach(opt => opt.classList.remove('active'));
                option.classList.add('active');

                // Change gallery layout based on view option
                const galleryGrid = document.querySelector('.gallery-grid');
                if (option.querySelector('.fa-th-large')) {
                    galleryGrid.style.gridTemplateColumns = 'repeat(auto-fill, minmax(200px, 1fr))';
                } else if (option.querySelector('.fa-th-list')) {
                    galleryGrid.style.gridTemplateColumns = '1fr';
                } else {
                    galleryGrid.style.gridTemplateColumns = 'repeat(auto-fill, minmax(300px, 1fr))';
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

        // Lightbox Functionality
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.querySelector('.lightbox-img');
        const lightboxTitle = document.getElementById('lightbox-title');
        const lightboxArtist = document.getElementById('lightbox-artist');
        const lightboxLocation = document.getElementById('lightbox-location');
        const closeBtn = document.querySelector('.lightbox-close');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        const galleryItems = document.querySelectorAll('.gallery-item');
        let currentIndex = 0;

        // Open lightbox with clicked image
        galleryItems.forEach((item, index) => {
            item.addEventListener('click', () => {
                currentIndex = index;
                updateLightbox();
                lightbox.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        });

        // Close lightbox
        closeBtn.addEventListener('click', () => {
            lightbox.classList.remove('active');
            document.body.style.overflow = 'auto';
        });

        // Close when clicking outside image
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                lightbox.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });

        // Navigation
        prevBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            currentIndex = (currentIndex - 1 + galleryItems.length) % galleryItems.length;
            updateLightbox();
        });

        nextBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            currentIndex = (currentIndex + 1) % galleryItems.length;
            updateLightbox();
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (lightbox.classList.contains('active')) {
                if (e.key === 'Escape') {
                    lightbox.classList.remove('active');
                    document.body.style.overflow = 'auto';
                } else if (e.key === 'ArrowLeft') {
                    currentIndex = (currentIndex - 1 + galleryItems.length) % galleryItems.length;
                    updateLightbox();
                } else if (e.key === 'ArrowRight') {
                    currentIndex = (currentIndex + 1) % galleryItems.length;
                    updateLightbox();
                }
            }
        });

        function updateLightbox() {
            const item = galleryItems[currentIndex];
            const imgSrc = item.querySelector('img').src;
            const title = item.querySelector('.gallery-item-title').textContent;
            const artist = item.querySelector('.gallery-item-artist').textContent;
            const location = item.querySelector('.gallery-item-location').textContent;

            lightboxImg.src = imgSrc;
            lightboxTitle.textContent = title;
            lightboxArtist.textContent = artist;
            lightboxLocation.innerHTML = `<i class="fas fa-map-marker-alt"></i> ${location}`;
        }

        // Load More Button
        const loadMoreBtn = document.querySelector('.load-more .btn');
        if (loadMoreBtn) {
            loadMoreBtn.addEventListener('click', () => {
                // In a real implementation, this would load more artworks
                alert('In a real implementation, this would load more artworks from the server.');
            });
        }
    </script>
</body>
</html>
