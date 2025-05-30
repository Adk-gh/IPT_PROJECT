<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juno Art | Street & Ink Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <style>
        /* Base Styles */
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

        /* Dark Mode */
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

        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--accent);
            color: var(--accent);
        }

        .btn-outline:hover {
            background-color: var(--accent);
            color: var(--white);
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
        .theme-toggle-container {
            display: flex;
            align-items: center;
            margin-left: 20px;
        }

        .theme-toggle {
            background: none;
            border: none;
            color: var(--primary);
            cursor: pointer;
            font-size: 1.2rem;
            transition: var(--transition);
            padding: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .theme-toggle:hover {
            transform: rotate(30deg);
        }

        /* Profile Banner */
        .profile-banner {
            position: relative;
            height: 400px;
            margin-top: 80px;
            overflow: hidden;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }

        .banner-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.7);
        }

        .banner-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 40px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
            color: white; /* Fixed color for banner text */
        }

        .profile-header {
            display: flex;
            align-items: flex-end;
            gap: 30px;
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid var(--white);
            object-fit: cover;
            margin-top: -75px;
            box-shadow: var(--shadow);
            background-color: var(--white);
        }

        .profile-info {
            flex: 1;
        }

        .profile-name {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: white; /* Fixed color for banner text */
        }

        .profile-username {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: white; /* Fixed color for banner text */
        }

        .verified-badge {
            color: #1DA1F2;
            font-size: 1rem;
        }

        .profile-bio {
            margin-bottom: 20px;
            max-width: 600px;
            opacity: 0.9;
            color: white; /* Fixed color for banner text */
        }

        .profile-location {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            opacity: 0.9;
            color: white; /* Fixed color for banner text */
        }

        .profile-actions {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            color: white; /* Fixed color for banner text */
        }

        .social-link:hover {
            background-color: var(--accent);
            transform: translateY(-3px);
        }

        /* Stats Section */
        .stats-section {
            padding: 40px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        [data-theme="dark"] .stats-section {
            border-bottom-color: rgba(255, 255, 255, 0.1);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
        }

        .stat-item {
            text-align: center;
            padding: 20px;
            background-color: var(--secondary);
            border-radius: var(--border-radius);
            transition: var(--transition);
        }

        .stat-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--accent);
            margin-bottom: 5px;
            font-family: 'Space Grotesk', sans-serif;
        }

        .stat-label {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        /* Profile Tabs */
        .profile-tabs {
            display: flex;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            margin: 40px 0 30px;
        }

        [data-theme="dark"] .profile-tabs {
            border-bottom-color: rgba(255, 255, 255, 0.1);
        }

        .profile-tab {
            padding: 15px 25px;
            font-weight: 600;
            cursor: pointer;
            position: relative;
            transition: var(--transition);
            color: var(--text-light);
        }

        .profile-tab.active {
            color: var(--accent);
        }

        .profile-tab.active:after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: var(--accent);
        }

        .profile-tab:hover:not(.active) {
            color: var(--text);
        }

        /* Gallery Section */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 50px;
        }

        .art-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .art-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .art-card-img {
            height: 250px;
            position: relative;
            overflow: hidden;
        }

        .art-card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .art-card:hover .art-card-img img {
            transform: scale(1.05);
        }

        .art-card-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
            opacity: 0;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 20px;
            color: white;
        }

        .art-card:hover .art-card-overlay {
            opacity: 1;
        }

        .art-card-content {
            padding: 20px;
        }

        .art-card-title {
            font-size: 1.2rem;
            margin-bottom: 8px;
        }

        .art-card-location {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .art-card-location i {
            margin-right: 8px;
            color: var(--accent);
        }

        .art-card-stats {
            display: flex;
            justify-content: space-between;
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .art-card-stat {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Artist Spotlight */
        .artist-spotlight {
            background-color: var(--secondary);
            padding: 60px 0;
            margin: 60px 0;
            border-radius: var(--border-radius);
        }

        .spotlight-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .spotlight-content {
            display: flex;
            gap: 40px;
            align-items: center;
        }

        .spotlight-image {
            flex: 1;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .spotlight-image img {
            width: 100%;
            height: auto;
            display: block;
        }

        .spotlight-info {
            flex: 1;
        }

        .spotlight-statement {
            margin-bottom: 30px;
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .spotlight-tools {
            margin-bottom: 30px;
        }

        .tools-title {
            font-size: 1.1rem;
            margin-bottom: 15px;
            color: var(--accent);
        }

        .tools-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .tool-tag {
            background-color: var(--white);
            padding: 8px 15px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Testimonials */
        .testimonials-section {
            margin: 60px 0;
        }

        .testimonials-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
        }

        .testimonial-card {
            background-color: var(--secondary);
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }

        .testimonial-text {
            font-style: italic;
            margin-bottom: 20px;
            position: relative;
        }

        .testimonial-text:before {
            content: '"';
            font-size: 4rem;
            position: absolute;
            top: -20px;
            left: -15px;
            opacity: 0.1;
            font-family: serif;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .author-info {
            flex: 1;
        }

        .author-name {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .author-role {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .collab-tag {
            background-color: var(--accent);
            color: var(--white);
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            margin-left: 10px;
        }

        /* Contact Section */
        .contact-section {
            background-color: var(--primary);
            color: var(--white);
            padding: 60px 0;
            border-radius: var(--border-radius);
            margin-bottom: 60px;
        }

        .contact-container {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .contact-title {
            color: var(--white);
            margin-bottom: 20px;
        }

        .contact-description {
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .contact-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        /* Map View */
        .map-container {
            height: 500px;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            margin-bottom: 60px;
        }

        #profileMap {
            width: 100%;
            height: 100%;
        }

        /* Collections */
        .collections-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 60px;
        }

        .collection-card {
            background-color: var(--secondary);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .collection-card:hover {
            transform: translateY(-5px);
        }

        .collection-cover {
            height: 150px;
            position: relative;
            overflow: hidden;
        }

        .collection-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .collection-count {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            color: var(--white);
            padding: 5px 10px;
            border-radius: 50px;
            font-size: 0.8rem;
        }

        .collection-info {
            padding: 20px;
        }

        .collection-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .collection-description {
            font-size: 0.9rem;
            color: var(--text-light);
            margin-bottom: 15px;
        }

        /* Liked Art */
        .liked-art-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 60px;
        }

        /* Comments */
        .comments-section {
            margin-bottom: 60px;
        }

        .comment-card {
            display: flex;
            gap: 20px;
            padding: 20px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        [data-theme="dark"] .comment-card {
            border-bottom-color: rgba(255, 255, 255, 0.1);
        }

        .comment-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .comment-content {
            flex: 1;
        }

        .comment-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .comment-author {
            font-weight: 600;
            margin-right: 10px;
        }

        .comment-time {
            font-size: 0.8rem;
            color: var(--text-light);
        }

        .comment-text {
            margin-bottom: 10px;
        }

        .comment-artwork {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
            color: var(--text-light);
            margin-top: 10px;
        }

        .comment-artwork img {
            width: 50px;
            height: 50px;
            border-radius: 4px;
            object-fit: cover;
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
            .profile-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }

            .profile-avatar {
                margin-top: -120px;
            }

            .spotlight-content {
                flex-direction: column;
            }
        }

        @media (max-width: 992px) {
            .profile-banner {
                height: 350px;
            }

            .profile-name {
                font-size: 2rem;
            }
        }

        @media (max-width: 768px) {
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

            .profile-banner {
                height: 300px;
                margin-top: 70px;
            }

            .banner-overlay {
                padding: 20px;
            }

            .profile-avatar {
                width: 120px;
                height: 120px;
                margin-top: -80px;
            }

            .profile-name {
                font-size: 1.8rem;
            }

            .profile-actions {
                flex-direction: column;
                align-items: flex-start;
            }

            .profile-tabs {
                overflow-x: auto;
                white-space: nowrap;
                padding-bottom: 10px;
            }

            .contact-buttons {
                flex-direction: column;
                align-items: center;
            }
        }

        @media (max-width: 576px) {
            .profile-banner {
                height: 250px;
            }

            .profile-name {
                font-size: 1.5rem;
            }

            .profile-username {
                font-size: 1rem;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .testimonials-grid {
                grid-template-columns: 1fr;
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
                        <li><a href="index.php#about">About</a></li>
                        <li><a href="#" class="btn btn-primary">Sign Out</a></li>
                    </ul>
                </nav>
                <div class="theme-toggle-container">
                    <button class="theme-toggle" id="themeToggle">
                        <i class="fas fa-moon"></i>
                    </button>
                </div>
                <button class="mobile-menu-btn" id="mobileMenuBtn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Profile Banner -->
    <section class="profile-banner">
        <img src="https://images.unsplash.com/photo-1516617442634-75371039cb3a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Juno Art Banner" class="banner-image">
        <div class="banner-overlay">
            <div class="profile-header">
                <img src="https://images.unsplash.com/photo-1531123897727-8f129e1688ce?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Juno Art" class="profile-avatar">
                <div class="profile-info">
                    <h1 class="profile-name">Juno Art</h1>
                    <div class="profile-username">
                        @inkdropper <i class="fas fa-check-circle verified-badge"></i>
                    </div>
                    <p class="profile-bio">Just a kid with a spray can & dreams. Creating colorful chaos on walls since 2015. Based in Manila, Philippines.</p>
                    <div class="profile-location">
                        <i class="fas fa-map-marker-alt"></i> Manila, Philippines
                    </div>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-tiktok"></i></a>
                        <a href="#" class="social-link"><i class="fas fa-globe"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-opensea"></i></a>
                    </div>
                </div>
                <div class="profile-actions">
                    <a href="#" class="btn btn-primary"><i class="fas fa-edit"></i> Edit Profile</a>
                    <a href="#" class="btn btn-outline"><i class="fas fa-cog"></i> Settings</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">27</div>
                    <div class="stat-label">Artworks Uploaded</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">1.4k</div>
                    <div class="stat-label">Likes Received</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">10.2k</div>
                    <div class="stat-label">Total Views</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">12</div>
                    <div class="stat-label">Tagged Locations</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">5</div>
                    <div class="stat-label">Collaborations</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Profile Tabs -->
    <div class="container">
        <div class="profile-tabs">
            <div class="profile-tab active" data-tab="art"><i class="fas fa-paint-brush"></i> My Art</div>
            <div class="profile-tab" data-tab="map"><i class="fas fa-map-marked-alt"></i> Map View</div>
            <div class="profile-tab" data-tab="collections"><i class="fas fa-folder"></i> Collections</div>
            <div class="profile-tab" data-tab="liked"><i class="fas fa-heart"></i> Liked Art</div>
            <div class="profile-tab" data-tab="comments"><i class="fas fa-comment"></i> Comments</div>
        </div>
    </div>

    <!-- Art Gallery -->
    <section class="container" id="art-tab">
        <div class="gallery-grid">
            <!-- Artwork 1 -->
            <div class="art-card">
                <div class="art-card-img">
                    <img src="https://images.unsplash.com/photo-1578926375602-3ad9e91ec0a1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Urban Dreams">
                    <div class="art-card-overlay">
                        <div class="art-card-stats">
                            <div class="art-card-stat"><i class="fas fa-heart"></i> 248</div>
                            <div class="art-card-stat"><i class="fas fa-comment"></i> 32</div>
                        </div>
                        <a href="#" class="btn btn-primary" style="margin-top: 10px;">View on Map</a>
                    </div>
                </div>
                <div class="art-card-content">
                    <h3 class="art-card-title">Urban Dreams</h3>
                    <div class="art-card-location">
                        <i class="fas fa-map-marker-alt"></i> Cavite Skatepark, Philippines
                    </div>
                    <div class="art-card-stats">
                        <div class="art-card-stat"><i class="fas fa-calendar-alt"></i> May 15, 2023</div>
                        <div class="art-card-stat">#Graffiti #Abstract</div>
                    </div>
                </div>
            </div>

            <!-- Artwork 2 -->
            <div class="art-card">
                <div class="art-card-img">
                    <img src="https://images.unsplash.com/photo-1547891654-e66ed7ebb968?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Color Explosion">
                    <div class="art-card-overlay">
                        <div class="art-card-stats">
                            <div class="art-card-stat"><i class="fas fa-heart"></i> 187</div>
                            <div class="art-card-stat"><i class="fas fa-comment"></i> 24</div>
                        </div>
                        <a href="#" class="btn btn-primary" style="margin-top: 10px;">View on Map</a>
                    </div>
                </div>
                <div class="art-card-content">
                    <h3 class="art-card-title">Color Explosion</h3>
                    <div class="art-card-location">
                        <i class="fas fa-map-marker-alt"></i> Makati Backstreets, Philippines
                    </div>
                    <div class="art-card-stats">
                        <div class="art-card-stat"><i class="fas fa-calendar-alt"></i> April 2, 2023</div>
                        <div class="art-card-stat">#Mural #Colorful</div>
                    </div>
                </div>
            </div>

            <!-- Artwork 3 -->
            <div class="art-card">
                <div class="art-card-img">
                    <img src="https://images.unsplash.com/photo-1516617442634-75371039cb3a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Neon Nights">
                    <div class="art-card-overlay">
                        <div class="art-card-stats">
                            <div class="art-card-stat"><i class="fas fa-heart"></i> 312</div>
                            <div class="art-card-stat"><i class="fas fa-comment"></i> 45</div>
                        </div>
                        <a href="#" class="btn btn-primary" style="margin-top: 10px;">View on Map</a>
                    </div>
                </div>
                <div class="art-card-content">
                    <h3 class="art-card-title">Neon Nights</h3>
                    <div class="art-card-location">
                        <i class="fas fa-map-marker-alt"></i> Bonifacio Global City, Philippines
                    </div>
                    <div class="art-card-stats">
                        <div class="art-card-stat"><i class="fas fa-calendar-alt"></i> March 18, 2023</div>
                        <div class="art-card-stat">#Neon #Urban</div>
                    </div>
                </div>
            </div>

            <!-- Artwork 4 -->
            <div class="art-card">
                <div class="art-card-img">
                    <img src="https://images.unsplash.com/photo-1579762715118-a6f1d4b934f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=686&q=80" alt="Political Statement">
                    <div class="art-card-overlay">
                        <div class="art-card-stats">
                            <div class="art-card-stat"><i class="fas fa-heart"></i> 421</div>
                            <div class="art-card-stat"><i class="fas fa-comment"></i> 67</div>
                        </div>
                        <a href="#" class="btn btn-primary" style="margin-top: 10px;">View on Map</a>
                    </div>
                </div>
                <div class="art-card-content">
                    <h3 class="art-card-title">Political Statement</h3>
                    <div class="art-card-location">
                        <i class="fas fa-map-marker-alt"></i> Quezon City, Philippines
                    </div>
                    <div class="art-card-stats">
                        <div class="art-card-stat"><i class="fas fa-calendar-alt"></i> February 5, 2023</div>
                        <div class="art-card-stat">#Political #Stencil</div>
                    </div>
                </div>
            </div>

            <!-- Artwork 5 -->
            <div class="art-card">
                <div class="art-card-img">
                    <img src="https://images.unsplash.com/photo-1555774698-0b77e0d5fac6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Abstract Flow">
                    <div class="art-card-overlay">
                        <div class="art-card-stats">
                            <div class="art-card-stat"><i class="fas fa-heart"></i> 156</div>
                            <div class="art-card-stat"><i class="fas fa-comment"></i> 18</div>
                        </div>
                        <a href="#" class="btn btn-primary" style="margin-top: 10px;">View on Map</a>
                    </div>
                </div>
                <div class="art-card-content">
                    <h3 class="art-card-title">Abstract Flow</h3>
                    <div class="art-card-location">
                        <i class="fas fa-map-marker-alt"></i> Pasig River Wall, Philippines
                    </div>
                    <div class="art-card-stats">
                        <div class="art-card-stat"><i class="fas fa-calendar-alt"></i> January 22, 2023</div>
                        <div class="art-card-stat">#Abstract #Geometric</div>
                    </div>
                </div>
            </div>

            <!-- Artwork 6 -->
            <div class="art-card">
                <div class="art-card-img">
                    <img src="https://images.unsplash.com/photo-1547891654-e66ed7ebb968?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Cultural Fusion">
                    <div class="art-card-overlay">
                        <div class="art-card-stats">
                            <div class="art-card-stat"><i class="fas fa-heart"></i> 203</div>
                            <div class="art-card-stat"><i class="fas fa-comment"></i> 29</div>
                        </div>
                        <a href="#" class="btn btn-primary" style="margin-top: 10px;">View on Map</a>
                    </div>
                </div>
                <div class="art-card-content">
                    <h3 class="art-card-title">Cultural Fusion</h3>
                    <div class="art-card-location">
                        <i class="fas fa-map-marker-alt"></i> Intramuros, Manila
                    </div>
                    <div class="art-card-stats">
                        <div class="art-card-stat"><i class="fas fa-calendar-alt"></i> December 10, 2022</div>
                        <div class="art-card-stat">#Cultural #Traditional</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Artist Spotlight -->
    <section class="artist-spotlight">
        <div class="container">
            <div class="spotlight-header">
                <h2>Artist Spotlight</h2>
                <p>Get to know the artist behind the artworks</p>
            </div>
            <div class="spotlight-content">
                <div class="spotlight-image">
                    <img src="https://images.unsplash.com/photo-1578926375602-3ad9e91ec0a1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Featured Artwork">
                </div>
                <div class="spotlight-info">
                    <h3>Featured Artwork: "Urban Dreams"</h3>
                    <p class="spotlight-statement">
                        "My work explores the intersection of urban decay and vibrant renewal. I see walls as blank canvases that tell the stories of our cities. Through bold colors and abstract forms, I aim to transform forgotten spaces into places of beauty and conversation."
                    </p>
                    <div class="spotlight-tools">
                        <div class="tools-title">Tools & Styles I Use:</div>
                        <div class="tools-list">
                            <span class="tool-tag">Spray Paint</span>
                            <span class="tool-tag">Acrylic</span>
                            <span class="tool-tag">Stencils</span>
                            <span class="tool-tag">Abstract</span>
                            <span class="tool-tag">Geometric</span>
                            <span class="tool-tag">Street Art</span>
                        </div>
                    </div>
                    <div style="margin-top: 30px;">
                        <a href="#" class="btn btn-primary"><i class="fas fa-play"></i> Watch Process Video</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials-section">
        <div class="container">
            <div class="testimonials-header">
                <h2>Collaborations & Testimonials</h2>
                <p>What others say about working with Juno Art</p>
            </div>
            <div class="testimonials-grid">
                <!-- Testimonial 1 -->
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "Juno transformed our dull warehouse wall into a vibrant masterpiece that has become a local landmark. Their attention to detail and unique style brought our vision to life beyond expectations."
                    </div>
                    <div class="testimonial-author">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Maria Santos" class="author-avatar">
                        <div class="author-info">
                            <div class="author-name">Maria Santos <span class="collab-tag">Collaboration</span></div>
                            <div class="author-role">Owner, Santos Warehouse</div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "We commissioned Juno for our street art festival and their piece was the talk of the event. Their ability to adapt their style while maintaining their unique voice is remarkable."
                    </div>
                    <div class="testimonial-author">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Carlos Reyes" class="author-avatar">
                        <div class="author-info">
                            <div class="author-name">Carlos Reyes</div>
                            <div class="author-role">Director, Manila Urban Arts Festival</div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "Working with Juno on our community mural project was a dream. They engaged with local youth and created something that truly represents our neighborhood's spirit."
                    </div>
                    <div class="testimonial-author">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Lena Cruz" class="author-avatar">
                        <div class="author-info">
                            <div class="author-name">Lena Cruz <span class="collab-tag">Collaboration</span></div>
                            <div class="author-role">Community Leader, Barangay 143</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container contact-container">
            <h2 class="contact-title">Contact Juno Art</h2>
            <p class="contact-description">
                Interested in commissioning work or collaborating? Get in touch with Juno for project inquiries, exhibition opportunities, or just to say hello.
            </p>
            <div class="contact-buttons">
                <a href="#" class="btn btn-primary btn-large"><i class="fas fa-envelope"></i> Send Message</a>
                <a href="#" class="btn btn-outline btn-large"><i class="fas fa-calendar-check"></i> Book Commission</a>
            </div>
        </div>
    </section>

    <!-- Map View (Hidden by default) -->
    <section class="container" id="map-tab" style="display: none;">
        <div class="map-container">
            <div id="profileMap"></div>
        </div>
    </section>

    <!-- Collections (Hidden by default) -->
    <section class="container" id="collections-tab" style="display: none;">
        <h2>Collections</h2>
        <p>Organized galleries of Juno's artwork by theme or project</p>

        <div class="collections-grid">
            <!-- Collection 1 -->
            <div class="collection-card">
                <div class="collection-cover">
                    <img src="https://images.unsplash.com/photo-1578926375602-3ad9e91ec0a1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Urban Series">
                    <span class="collection-count">8 artworks</span>
                </div>
                <div class="collection-info">
                    <h3 class="collection-title">Urban Series</h3>
                    <p class="collection-description">Exploring the textures and rhythms of city life</p>
                    <a href="#" class="btn btn-outline" style="padding: 8px 15px; font-size: 0.9rem;">View Collection</a>
                </div>
            </div>

            <!-- Collection 2 -->
            <div class="collection-card">
                <div class="collection-cover">
                    <img src="https://images.unsplash.com/photo-1547891654-e66ed7ebb968?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Political Works">
                    <span class="collection-count">5 artworks</span>
                </div>
                <div class="collection-info">
                    <h3 class="collection-title">Political Works</h3>
                    <p class="collection-description">Commentary on social and political issues</p>
                    <a href="#" class="btn btn-outline" style="padding: 8px 15px; font-size: 0.9rem;">View Collection</a>
                </div>
            </div>

            <!-- Collection 3 -->
            <div class="collection-card">
                <div class="collection-cover">
                    <img src="https://images.unsplash.com/photo-1516617442634-75371039cb3a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Neon Dreams">
                    <span class="collection-count">3 artworks</span>
                </div>
                <div class="collection-info">
                    <h3 class="collection-title">Neon Dreams</h3>
                    <p class="collection-description">Vibrant night-inspired pieces</p>
                    <a href="#" class="btn btn-outline" style="padding: 8px 15px; font-size: 0.9rem;">View Collection</a>
                </div>
            </div>

            <!-- Collection 4 -->
            <div class="collection-card">
                <div class="collection-cover">
                    <img src="https://images.unsplash.com/photo-1579762715118-a6f1d4b934f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=686&q=80" alt="Collaborations">
                    <span class="collection-count">5 artworks</span>
                </div>
                <div class="collection-info">
                    <h3 class="collection-title">Collaborations</h3>
                    <p class="collection-description">Works created with other artists</p>
                    <a href="#" class="btn btn-outline" style="padding: 8px 15px; font-size: 0.9rem;">View Collection</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Liked Art (Hidden by default) -->
    <section class="container" id="liked-tab" style="display: none;">
        <h2>Liked Artworks</h2>
        <p>Artworks that Juno has liked and saved</p>

        <div class="liked-art-grid">
            <!-- Liked Art 1 -->
            <div class="art-card">
                <div class="art-card-img">
                    <img src="https://images.unsplash.com/photo-1555774698-0b77e0d5fac6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Abstract Flow">
                </div>
            </div>

            <!-- Liked Art 2 -->
            <div class="art-card">
                <div class="art-card-img">
                    <img src="https://images.unsplash.com/photo-1547891654-e66ed7ebb968?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Color Explosion">
                </div>
            </div>

            <!-- Liked Art 3 -->
            <div class="art-card">
                <div class="art-card-img">
                    <img src="https://images.unsplash.com/photo-1578926375602-3ad9e91ec0a1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Urban Dreams">
                </div>
            </div>

            <!-- Liked Art 4 -->
            <div class="art-card">
                <div class="art-card-img">
                    <img src="https://images.unsplash.com/photo-1516617442634-75371039cb3a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Neon Nights">
                </div>
            </div>

            <!-- Liked Art 5 -->
            <div class="art-card">
                <div class="art-card-img">
                    <img src="https://images.unsplash.com/photo-1579762715118-a6f1d4b934f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=686&q=80" alt="Political Statement">
                </div>
            </div>

            <!-- Liked Art 6 -->
            <div class="art-card">
                <div class="art-card-img">
                    <img src="https://images.unsplash.com/photo-1547891654-e66ed7ebb968?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Cultural Fusion">
                </div>
            </div>
        </div>
    </section>

    <!-- Comments (Hidden by default) -->
    <section class="container" id="comments-tab" style="display: none;">
        <h2>Recent Comments</h2>
        <p>Juno's recent activity on Street & Ink</p>

        <div class="comments-section">
            <!-- Comment 1 -->
            <div class="comment-card">
                <img src="https://images.unsplash.com/photo-1531123897727-8f129e1688ce?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Juno Art" class="comment-avatar">
                <div class="comment-content">
                    <div class="comment-header">
                        <span class="comment-author">Juno Art</span>
                        <span class="comment-time">2 hours ago</span>
                    </div>
                    <div class="comment-text">
                        This piece is incredible! The use of color gradients is exactly what I've been trying to master in my own work.
                    </div>
                    <div class="comment-artwork">
                        <img src="https://images.unsplash.com/photo-1555774698-0b77e0d5fac6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Artwork">
                        <span>Comment on "Abstract Flow" by Maya Hayuk</span>
                    </div>
                </div>
            </div>

            <!-- Comment 2 -->
            <div class="comment-card">
                <img src="https://images.unsplash.com/photo-1531123897727-8f129e1688ce?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Juno Art" class="comment-avatar">
                <div class="comment-content">
                    <div class="comment-header">
                        <span class="comment-author">Juno Art</span>
                        <span class="comment-time">1 day ago</span>
                    </div>
                    <div class="comment-text">
                        The stencil work here is so clean! What brand of spray paint do you use for such precise lines?
                    </div>
                    <div class="comment-artwork">
                        <img src="https://images.unsplash.com/photo-1579762715118-a6f1d4b934f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=686&q=80" alt="Artwork">
                        <span>Comment on "Political Statement" by Banksy</span>
                    </div>
                </div>
            </div>

            <!-- Comment 3 -->
            <div class="comment-card">
                <img src="https://images.unsplash.com/photo-1531123897727-8f129e1688ce?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Juno Art" class="comment-avatar">
                <div class="comment-content">
                    <div class="comment-header">
                        <span class="comment-author">Juno Art</span>
                        <span class="comment-time">3 days ago</span>
                    </div>
                    <div class="comment-text">
                        This location is perfect for your piece! The natural lighting really makes the colors pop at golden hour.
                    </div>
                    <div class="comment-artwork">
                        <img src="https://images.unsplash.com/photo-1516617442634-75371039cb3a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Artwork">
                        <span>Comment on "Neon Dreams" by Felipe Pantone</span>
                    </div>
                </div>
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

        // Profile Tabs
        const profileTabs = document.querySelectorAll('.profile-tab');
        const tabContents = {
            'art': document.getElementById('art-tab'),
            'map': document.getElementById('map-tab'),
            'collections': document.getElementById('collections-tab'),
            'liked': document.getElementById('liked-tab'),
            'comments': document.getElementById('comments-tab')
        };

        profileTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active class from all tabs
                profileTabs.forEach(t => t.classList.remove('active'));

                // Add active class to clicked tab
                tab.classList.add('active');

                // Hide all tab contents
                Object.values(tabContents).forEach(content => {
                    content.style.display = 'none';
                });

                // Show the selected tab content
                const tabName = tab.getAttribute('data-tab');
                if (tabContents[tabName]) {
                    tabContents[tabName].style.display = 'block';

                    // Initialize map if map tab is selected
                    if (tabName === 'map') {
                        initProfileMap();
                    }
                }
            });
        });

        // Initialize profile map
        function initProfileMap() {
            const map = L.map('profileMap').setView([14.5995, 120.9842], 13); // Manila coordinates

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Add markers for user's artworks
            const userArtLocations = [
                {
                    lat: 14.5995,
                    lng: 120.9842,
                    title: "Urban Dreams",
                    description: "Cavite Skatepark, Philippines",
                    image: "https://images.unsplash.com/photo-1578926375602-3ad9e91ec0a1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                },
                {
                    lat: 14.5547,
                    lng: 121.0244,
                    title: "Color Explosion",
                    description: "Makati Backstreets, Philippines",
                    image: "https://images.unsplash.com/photo-1547891654-e66ed7ebb968?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                },
                {
                    lat: 14.5534,
                    lng: 121.0481,
                    title: "Neon Nights",
                    description: "Bonifacio Global City, Philippines",
                    image: "https://images.unsplash.com/photo-1516617442634-75371039cb3a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80"
                },
                {
                    lat: 14.6760,
                    lng: 121.0437,
                    title: "Political Statement",
                    description: "Quezon City, Philippines",
                    image: "https://images.unsplash.com/photo-1579762715118-a6f1d4b934f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=686&q=80"
                },
                {
                    lat: 14.5833,
                    lng: 121.0614,
                    title: "Abstract Flow",
                    description: "Pasig River Wall, Philippines",
                    image: "https://images.unsplash.com/photo-1555774698-0b77e0d5fac6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                },
                {
                    lat: 14.5894,
                    lng: 120.9742,
                    title: "Cultural Fusion",
                    description: "Intramuros, Manila",
                    image: "https://images.unsplash.com/photo-1547891654-e66ed7ebb968?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                }
            ];

            // Custom icon
            const artIcon = L.divIcon({
                className: 'art-marker',
                html: '<i class="fas fa-spray-can"></i>',
                iconSize: [30, 30]
            });

            // Add markers to the map
            userArtLocations.forEach(location => {
                const marker = L.marker([location.lat, location.lng], { icon: artIcon }).addTo(map);
                marker.bindPopup(`
                    <div style="width: 200px;">
                        <img src="${location.image}" style="width: 100%; height: 120px; object-fit: cover; border-radius: 4px; margin-bottom: 10px;">
                        <h3 style="margin: 0 0 5px 0; font-size: 1.1rem;">${location.title}</h3>
                        <p style="margin: 0; font-size: 0.9rem;">${location.description}</p>
                        <a href="#" style="display: inline-block; margin-top: 10px; font-size: 0.9rem; color: #ff5e5b;">View Artwork</a>
                    </div>
                `);
            });
        }

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

        // Art card hover effect
        const artCards = document.querySelectorAll('.art-card');
        artCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-10px)';
                card.style.boxShadow = '0 15px 30px rgba(0, 0, 0, 0.1)';
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
                card.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.08)';
            });
        });

        // Collection card hover effect
        const collectionCards = document.querySelectorAll('.collection-card');
        collectionCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-5px)';
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });

        // Contact button hover effects
        const contactButtons = document.querySelectorAll('.contact-buttons .btn');
        contactButtons.forEach(btn => {
            btn.addEventListener('mouseenter', () => {
                btn.style.transform = 'translateY(-3px)';
            });

            btn.addEventListener('mouseleave', () => {
                btn.style.transform = 'translateY(0)';
            });
        });

        // Testimonial card hover effect
        const testimonialCards = document.querySelectorAll('.testimonial-card');
        testimonialCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-5px)';
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });

        // Initialize first tab as active
        document.querySelector('.profile-tab.active').click();
    </script>
</body>
</html>
