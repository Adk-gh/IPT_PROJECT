
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Street & Ink | Discover Street Art Near You</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <style>
        /* Reset and Base Styles */
        :root {
            --primary: #181717;
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
    height: 1.5em; /* Adjust to match your text size */
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
        .hero {
            height: 100vh;
            min-height: 800px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('https://images.unsplash.com/photo-1547891654-e66ed7ebb968?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80') no-repeat center center/cover;
            color: var(--white);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            padding: 0 20px;
        }

        .hero h1 {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 1s ease;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 3rem;
            opacity: 0.9;
            animation: fadeInUp 1s ease 0.2s forwards;
            opacity: 0;
        }

        .hero-btns {
            display: flex;
            justify-content: center;
            gap: 20px;
            animation: fadeInUp 1s ease 0.4s forwards;
            opacity: 0;
        }

        .search-container {
            max-width: 700px;
            margin: 40px auto 0;
            position: relative;
            animation: fadeInUp 1s ease 0.6s forwards;
            opacity: 0;
        }

        .search-input {
            width: 100%;
            padding: 18px 30px;
            border-radius: 50px;
            border: none;
            font-size: 1.1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
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

        .location-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
            color: var(--white);
            font-weight: 500;
            animation: fadeInUp 1s ease 0.8s forwards;
            opacity: 0;
        }

        .location-btn i {
            margin-right: 8px;
            font-size: 1.2rem;
        }

        /* Map Preview Section */
        .map-preview {
            background-color: var(--secondary);
        }

        .map-container {
            height: 500px;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            position: relative;
        }

        #streetArtMap {
            width: 100%;
            height: 100%;
        }

        .map-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
            padding: 30px;
            color: var(--white);
            pointer-events: none;
            z-index: 1000;
        }

        .map-overlay h3 {
            color: var(--white);
            margin-bottom: 10px;
            pointer-events: auto;
        }

        .map-overlay p {
            opacity: 0.9;
            margin-bottom: 20px;
            pointer-events: auto;
        }

        .map-overlay .btn {
            pointer-events: auto;
        }

        /* Featured Street Art */
        .art-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
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

        .art-card-content {
            padding: 20px;
        }

        .art-card-title {
            font-size: 1.3rem;
            margin-bottom: 10px;
        }

        .art-card-artist {
            color: var(--text-light);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .art-card-artist i {
            margin-right: 8px;
        }

        .art-card-location {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }

        .art-card-location i {
            margin-right: 8px;
            color: var(--accent);
        }

        .art-card-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .art-card-tag {
            background-color: var(--secondary);
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .art-tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
            gap: 10px;
        }

        .art-tab {
            padding: 12px 25px;
            border-radius: 50px;
            background-color: var(--secondary);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .art-tab.active {
            background-color: var(--accent);
            color: var(--white);
        }

        /* Artist Spotlight */
        .artists {
            background-color: var(--secondary);
        }

        .artist-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .artist-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            text-align: center;
        }

        .artist-card:hover {
            transform: translateY(-10px);
        }

        .artist-card-img {
            height: 200px;
            overflow: hidden;
        }

        .artist-card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .artist-card-content {
            padding: 25px 20px;
        }

        .artist-card-name {
            font-size: 1.4rem;
            margin-bottom: 5px;
        }

        .artist-card-style {
            color: var(--accent);
            font-weight: 600;
            margin-bottom: 15px;
        }

        .artist-card-bio {
            margin-bottom: 20px;
            font-size: 0.95rem;
            color: var(--text-light);
        }

        .artist-social {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .artist-social a {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .artist-social a:hover {
            background-color: var(--accent);
            color: var(--white);
        }

        /* Categories */
        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 50px;
        }

        .category-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            text-align: center;
            padding: 30px 20px;
            border: 2px solid transparent;
        }

        .category-card:hover {
            border-color: var(--accent);
            transform: translateY(-5px);
        }

        .category-icon {
            width: 60px;
            height: 60px;
            background-color: var(--accent);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 1.5rem;
        }

        .category-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .category-count {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* Submit Section */

        .submit {
             background-color: var(--secondary);

        }





        /* App Section */
        .app-container {
            display: flex;
            align-items: center;
            gap: 60px;
            margin-top: 60px;
        }

        .app-content {
            flex: 1;
        }

        .app-image {
            flex: 1;
            position: relative;
        }

        .app-image img {
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }

        .app-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .app-btn {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            border-radius: var(--border-radius);
            background-color: var(--primary);
            color: var(--white);
            font-weight: 600;
            transition: var(--transition);
        }

        .app-btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow);
        }

        .app-btn i {
            font-size: 1.5rem;
            margin-right: 10px;
        }

        .app-btn-text {
            display: flex;
            flex-direction: column;
            font-size: 0.8rem;
        }

        .app-btn-text span:first-child {
            font-size: 0.7rem;
        }

        /* Blog Section */
        .blog {
            background-color: var(--secondary);
        }

        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .blog-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .blog-card:hover {
            transform: translateY(-10px);
        }

        .blog-card-img {
            height: 200px;
            overflow: hidden;
        }

        .blog-card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .blog-card:hover .blog-card-img img {
            transform: scale(1.05);
        }

        .blog-card-content {
            padding: 25px;
        }

        .blog-card-date {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .blog-card-title {
            font-size: 1.3rem;
            margin-bottom: 15px;
        }

        .blog-card-excerpt {
            margin-bottom: 20px;
            color: var(--text-light);
        }

        .blog-card-link {
            color: var(--accent);
            font-weight: 600;
            display: inline-flex;
            align-items: center;
        }

        .blog-card-link i {
            margin-left: 5px;
            transition: var(--transition);
        }

        .blog-card-link:hover i {
            transform: translateX(5px);
        }

        /* Community Section */
        .community-stats {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin: 60px 0;
            flex-wrap: wrap;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: var(--accent);
            margin-bottom: 10px;
            font-family: 'Space Grotesk', sans-serif;
        }

        .stat-label {
            font-size: 1rem;
            color: var(--text-light);
        }

        .community-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 20px;
            margin-top: 40px;
        }

        .community-user {
            text-align: center;
            transition: var(--transition);
            cursor: pointer;
        }

        .community-user:hover {
            transform: translateY(-5px);
        }

        .community-user:hover .user-avatar {
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .user-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 15px;
            border: 3px solid var(--accent);
            padding: 3px;
            transition: var(--transition);
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .user-name {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .user-contributions {
            color: var(--text-light);
            font-size: 0.8rem;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 50px;
        }

        .social-link {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--primary);
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            transition: var(--transition);
        }

        .social-link:hover {
            background-color: var(--accent);
            transform: translateY(-5px);
        }

        /* About Section */
        .about-container {
            display: flex;
            align-items: center;
            gap: 60px;
        }

        .about-image {
            flex: 1;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .about-content {
            flex: 1;
        }

        .about-content h3 {
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        .about-content p {
            margin-bottom: 20px;
        }

        /* Newsletter */
        .newsletter {
            background-color: var(--primary);
            color: var(--white);
            text-align: center;
        }

        .newsletter .section-title {
            color: var(--white);
        }

        .newsletter .section-title:after {
            background-color: var(--white);
        }

        .newsletter p {
            max-width: 600px;
            margin: 0 auto 40px;
            opacity: 0.9;
        }

        .newsletter-form {
            max-width: 500px;
            margin: 0 auto;
            display: flex;
        }

        .newsletter-input {
            flex: 1;
            padding: 15px 20px;
            border-radius: 50px 0 0 50px;
            border: none;
            font-size: 1rem;
        }

        .newsletter-input:focus {
            outline: none;
        }

        .newsletter-btn {
            background-color: var(--accent);
            color: var(--white);
            border: none;
            border-radius: 0 50px 50px 0;
            padding: 0 30px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .newsletter-btn:hover {
            background-color: var(--accent-dark);
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

            .hero h1 {
                font-size: 3.5rem;
            }
        }

        @media (max-width: 992px) {
            :root {
                --section-padding: 80px;
            }

            .app-container, .about-container {
                flex-direction: column;
                gap: 40px;
            }

            .app-image, .about-image {
                order: -1;
            }

            .hero h1 {
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

            .hero {
                min-height: 700px;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero-btns {
                flex-direction: column;
                gap: 15px;
            }

            .search-container {
                margin-top: 30px;
            }

            .section-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            :root {
                --section-padding: 60px;
            }

            .hero h1 {
                font-size: 2.2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .search-input {
                padding: 15px 20px;
                font-size: 1rem;
            }

            .search-btn {
                padding: 10px 15px;
            }

            .newsletter-form {
                flex-direction: column;
            }

            .newsletter-input {
                border-radius: 50px;
                margin-bottom: 10px;
            }

            .newsletter-btn {
                border-radius: 50px;
                padding: 15px;
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
                        <li><a href="#art">Street Art</a></li>
                        <li><a href="#artists">Artists</a></li>
                        <li><a href="#categories">Categories</a></li>
                        <li><a href="#community">Community</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a  href="{{ route('signup') }}" class="btn btn-primary">Sign In</a></li>
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
    <section class="hero">
        <div class="hero-content">
            <h1>Explore the Streets, One Wall at a Time</h1>
            <p>Discover and share the most vibrant street art from around the world. Join our community of urban art enthusiasts and creators.</p>
            <div class="hero-btns">
                <a href="{{ route('signup') }}" class="btn btn-primary btn-large" id="ajax-link">Get Started</a>
                <a href="#newsletter" class="btn btn-secondary btn-large">Learn More</a>
            </div>
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Search by city, neighborhood or artist...">
                <button class="search-btn">Search</button>
            </div>
            <a href="#" class="location-btn">
                <i class="fas fa-location-arrow"></i> Find Art Near Me
            </a>
        </div>
    </section>

    <!-- Map Preview Section -->
    <section class="section map-preview" id="map">
        <div class="container">
            <h2 class="section-title">Interactive Street Art Map</h2>
            <p class="text-center" style="margin-bottom: 2rem;">Explore thousands of street art locations around the world. Click on markers to discover new artworks.</p>
            <div class="map-container">
                <div id="streetArtMap"></div>
                <div class="map-overlay">
                    <h3>San Pablo City Street Art</h3>
                    <p>Discover over 1,200 documented street artworks in City Of Seven Lakes.</p>
                    <a href="#" class="btn btn-primary">View Full Map</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Street Art Section -->
    <section class="section" id="art">
        <div class="container">
            <h2 class="section-title">Featured Street Art</h2>
            <p class="text-center" style="margin-bottom: 3rem;">Discover the most popular and recent additions to our growing collection.</p>

            <div class="art-tabs">
                <div class="art-tab active">Most Liked</div>
                <div class="art-tab">Recently Added</div>
                <div class="art-tab">Hidden Gems</div>
            </div>

            <div class="art-grid">
                <!-- Artwork 1 -->
                <div class="art-card">
                    <div class="art-card-img">
                        <img src="img/pexels-vincent-gerbouin-445991-2263686.jpg" alt="Street Art">
                    </div>
                    <div class="art-card-content">
                        <h3 class="art-card-title">Urban Dreams</h3>
                        <div class="art-card-artist">
                            <i class="fas fa-user"></i> Banksy (unconfirmed)
                        </div>
                        <div class="art-card-location">
                            <i class="fas fa-map-marker-alt"></i> Shoreditch, London
                        </div>
                        <div class="art-card-tags">
                            <span class="art-card-tag">Stencil</span>
                            <span class="art-card-tag">Political</span>
                            <span class="art-card-tag">Iconic</span>
                        </div>
                    </div>
                </div>

                <!-- Artwork 2 -->
                <div class="art-card">
                    <div class="art-card-img">
                        <img src="img/pexels-conojeghuo-173301.jpg" alt="Street Art">
                    </div>
                    <div class="art-card-content">
                        <h3 class="art-card-title">Color Explosion</h3>
                        <div class="art-card-artist">
                            <i class="fas fa-user"></i> Maya Hayuk
                        </div>
                        <div class="art-card-location">
                            <i class="fas fa-map-marker-alt"></i> Williamsburg, NYC
                        </div>
                        <div class="art-card-tags">
                            <span class="art-card-tag">Mural</span>
                            <span class="art-card-tag">Abstract</span>
                            <span class="art-card-tag">Colorful</span>
                        </div>
                    </div>
                </div>

                <!-- Artwork 3 -->
                <div class="art-card">
                    <div class="art-card-img">
                        <img src="img/pexels-fernando-dos-santos-campos-1309016-2510245 (1).jpg" alt="Street Art">
                    </div>
                    <div class="art-card-content">
                        <h3 class="art-card-title">The Thinker</h3>
                        <div class="art-card-artist">
                            <i class="fas fa-user"></i> Unknown Artist
                        </div>
                        <div class="art-card-location">
                            <i class="fas fa-map-marker-alt"></i> Berlin, Germany
                        </div>
                        <div class="art-card-tags">
                            <span class="art-card-tag">Portrait</span>
                            <span class="art-card-tag">Monochrome</span>
                            <span class="art-card-tag">Thought-provoking</span>
                        </div>
                    </div>
                </div>

                <!-- Artwork 4 -->
                <div class="art-card">
                    <div class="art-card-img">
                        <img src="/resources/views/img/pexels-heftiba-1194420.jpg" alt="Street Art">
                    </div>
                    <div class="art-card-content">
                        <h3 class="art-card-title">Neon Dreams</h3>
                        <div class="art-card-artist">
                            <i class="fas fa-user"></i> D*Face
                        </div>
                        <div class="art-card-location">
                            <i class="fas fa-map-marker-alt"></i> Downtown LA
                        </div>
                        <div class="art-card-tags">
                            <span class="art-card-tag">Pop Art</span>
                            <span class="art-card-tag">Neon</span>
                            <span class="art-card-tag">Night View</span>
                        </div>
                    </div>
                </div>

                <!-- Artwork 5 -->
                <div class="art-card">
                    <div class="art-card-img">
                        <img src="img/pexels-tobiasbjorkli-2119706 (1).jpg" alt="Street Art">
                    </div>
                    <div class="art-card-content">
                        <h3 class="art-card-title">Abstract Flow</h3>
                        <div class="art-card-artist">
                            <i class="fas fa-user"></i> Felipe Pantone
                        </div>
                        <div class="art-card-location">
                            <i class="fas fa-map-marker-alt"></i> Wynwood, Miami
                        </div>
                        <div class="art-card-tags">
                            <span class="art-card-tag">Abstract</span>
                            <span class="art-card-tag">Geometric</span>
                            <span class="art-card-tag">Optical</span>
                        </div>
                    </div>
                </div>

                <!-- Artwork 6 -->
                <div class="art-card">
                    <div class="art-card-img">
                        <img src="img/pexels-arantxa-treva-351075-959314 (1).jpg" alt="Street Art">
                    </div>
                    <div class="art-card-content">
                        <h3 class="art-card-title">Cultural Fusion</h3>
                        <div class="art-card-artist">
                            <i class="fas fa-user"></i> Shepard Fairey
                        </div>
                        <div class="art-card-location">
                            <i class="fas fa-map-marker-alt"></i> Little Tokyo, LA
                        </div>
                        <div class="art-card-tags">
                            <span class="art-card-tag">Cultural</span>
                            <span class="art-card-tag">Portrait</span>
                            <span class="art-card-tag">Social</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center" style="margin-top: 50px;">
                <a href="{{ route('social_feed') }}" class="btn btn-primary">View All Artworks</a>
            </div>
        </div>
    </section>

    <!-- Artist Spotlight Section -->
    <section class="section artists" id="artists">
        <div class="container">
            <h2 class="section-title">Artist Spotlights</h2>
            <p class="text-center">Discover the talented individuals behind the urban masterpieces.</p>

            <div class="artist-grid">
                <!-- Artist 1 -->
                <div class="artist-card">
                    <div class="artist-card-img">
                        <img src="https://images.unsplash.com/photo-1542103749-8ef59b94f47e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Artist">
                    </div>
                    <div class="artist-card-content">
                        <h3 class="artist-card-name">Banksy</h3>
                        <div class="artist-card-style">Stencil Art, Political</div>
                        <p class="artist-card-bio">Anonymous England-based street artist known for his satirical and subversive work.</p>
                        <div class="artist-social">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Artist 2 -->
                <div class="artist-card">
                    <div class="artist-card-img">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Artist">
                    </div>
                    <div class="artist-card-content">
                        <h3 class="artist-card-name">Shepard Fairey</h3>
                        <div class="artist-card-style">Stencil, Screen Printing</div>
                        <p class="artist-card-bio">American street artist, graphic designer, and founder of OBEY Clothing.</p>
                        <div class="artist-social">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Artist 3 -->
                <div class="artist-card">
                    <div class="artist-card-img">
                        <img src="https://images.unsplash.com/photo-1531123897727-8f129e1688ce?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Artist">
                    </div>
                    <div class="artist-card-content">
                        <h3 class="artist-card-name">Maya Hayuk</h3>
                        <div class="artist-card-style">Abstract, Colorful</div>
                        <p class="artist-card-bio">Known for her large-scale, symmetrical murals featuring vibrant colors and patterns.</p>
                        <div class="artist-social">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Artist 4 -->
                <div class="artist-card">
                    <div class="artist-card-img">
                        <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Artist">
                    </div>
                    <div class="artist-card-content">
                        <h3 class="artist-card-name">Felipe Pantone</h3>
                        <div class="artist-card-style">Optical, Digital</div>
                        <p class="artist-card-bio">Argentinian-Spanish artist known for his vibrant, geometric works exploring digital themes.</p>
                        <div class="artist-social">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center" style="margin-top: 50px;">
                <a href="{{ route('artist') }}" class="btn btn-primary">View All Artists</a>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="section" id="categories">
        <div class="container">
            <h2 class="section-title">Explore by Categories</h2>
            <p class="text-center">Find street art that matches your interests and style preferences.</p>

            <div class="categories-grid">
                <!-- Category 1 -->
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-paint-roller"></i>
                    </div>
                    <h3 class="category-title">Murals</h3>
                    <div class="category-count">1,240+ Artworks</div>
                </div>

                <!-- Category 2 -->
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-spray-can"></i>
                    </div>
                    <h3 class="category-title">Graffiti</h3>
                    <div class="category-count">980+ Artworks</div>
                </div>

                <!-- Category 3 -->
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-sticky-note"></i>
                    </div>
                    <h3 class="category-title">Stickers</h3>
                    <div class="category-count">320+ Artworks</div>
                </div>

                <!-- Category 4 -->
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-cut"></i>
                    </div>
                    <h3 class="category-title">Stencils</h3>
                    <div class="category-count">450+ Artworks</div>
                </div>

                <!-- Category 5 -->
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-cubes"></i>
                    </div>
                    <h3 class="category-title">Installations</h3>
                    <div class="category-count">210+ Artworks</div>
                </div>

                <!-- Category 6 -->
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-arrows-alt-h"></i>
                    </div>
                    <h3 class="category-title">Wheatpaste</h3>
                    <div class="category-count">180+ Artworks</div>
                </div>

                <!-- Category 7 -->
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-marker"></i>
                    </div>
                    <h3 class="category-title">Tagging</h3>
                    <div class="category-count">670+ Artworks</div>
                </div>

                <!-- Category 8 -->
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3 class="category-title">Light Art</h3>
                    <div class="category-count">90+ Artworks</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Submit Section -->
    <section class="section submit">
      <div class="container">
            <h2 class="section-title">Contribute to the Community</h2>
            <p>Help us document street art from around the world. Share your discoveries and connect with other urban art enthusiasts.</p>

            <div class="text-center" style="margin-top: 40px;">
                <a href="Artist.php" class="btn btn-primary btn-large">Submit Artwork</a>
            </div>
        </div>
    </section>

    <!-- App Section -->
    <section class="section">
        <div class="container">
            <div class="app-container">
                <div class="app-content">
                    <h2>Street & Ink Mobile App</h2>
                    <p>Take the street art discovery experience with you wherever you go. Our mobile app makes it easy to find, save, and share street art in real-time.</p>
                    <ul style="margin: 20px 0 30px; padding-left: 20px;">
                        <li style="margin-bottom: 10px; display: flex; align-items: flex-start;">
                            <i class="fas fa-check" style="color: var(--accent); margin-right: 10px; margin-top: 3px;"></i>
                            <span>Augmented Reality street art detection</span>
                        </li>
                        <li style="margin-bottom: 10px; display: flex; align-items: flex-start;">
                            <i class="fas fa-check" style="color: var(--accent); margin-right: 10px; margin-top: 3px;"></i>
                            <span>Offline access to saved locations</span>
                        </li>
                        <li style="margin-bottom: 10px; display: flex; align-items: flex-start;">
                            <i class="fas fa-check" style="color: var(--accent); margin-right: 10px; margin-top: 3px;"></i>
                            <span>Exclusive app-only artworks</span>
                        </li>
                        <li style="display: flex; align-items: flex-start;">
                            <i class="fas fa-check" style="color: var(--accent); margin-right: 10px; margin-top: 3px;"></i>
                            <span>Instant notifications for new art in your area</span>
                        </li>
                    </ul>
                    <div class="app-buttons">
                        <a href="#" class="app-btn">
                            <i class="fab fa-apple"></i>
                            <div class="app-btn-text">
                                <span>Download on the</span>
                                <span>App Store</span>
                            </div>
                        </a>
                        <a href="#" class="app-btn">
                            <i class="fab fa-google-play"></i>
                            <div class="app-btn-text">
                                <span>Get it on</span>
                                <span>Google Play</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="app-image">
                    <img src="https://images.unsplash.com/photo-1555774698-0b77e0d5fac6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Mobile App">
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="section blog">
        <div class="container">
            <h2 class="section-title">Street Art Stories</h2>
            <p class="text-center">Read about the latest in street art culture, events, and artist interviews.</p>

            <div class="blog-grid">
                <!-- Blog Post 1 -->
                <div class="blog-card">
                    <div class="blog-card-img">
                        <img src="img/pexels-brett-sayles-1121894.jpg" alt="Blog Post">
                    </div>
                    <div class="blog-card-content">
                        <div class="blog-card-date">June 15, 2023</div>
                        <h3 class="blog-card-title">The Rise of Political Street Art in 2023</h3>
                        <p class="blog-card-excerpt">How artists are using urban spaces to comment on current events and social issues around the world.</p>
                        <a href="#" class="blog-card-link">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Blog Post 2 -->
                <div class="blog-card">
                    <div class="blog-card-img">
                        <img src="img/pexels-ibrahim-hafeez-563364-1319828.jpg" alt="Blog Post">
                    </div>
                    <div class="blog-card-content">
                        <div class="blog-card-date">June 8, 2023</div>
                        <h3 class="blog-card-title">Interview: The Neon Artist Lighting Up Downtown LA</h3>
                        <p class="blog-card-excerpt">We sit down with the anonymous artist behind the glowing murals transforming the city's nightscape.</p>
                        <a href="#" class="blog-card-link">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Blog Post 3 -->
                <div class="blog-card">
                    <div class="blog-card-img">
                        <img src="img/pexels-khalidgarcia-1376092.jpg" alt="Blog Post">
                    </div>
                    <div class="blog-card-content">
                        <div class="blog-card-date">May 30, 2023</div>
                        <h3 class="blog-card-title">Street Art Festivals You Can't Miss This Summer</h3>
                        <p class="blog-card-excerpt">From Berlin to Buenos Aires, here are the must-visit urban art events of the season.</p>
                        <a href="#" class="blog-card-link">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="text-center" style="margin-top: 50px;">
                <a href="{{ route('articles') }}" class="btn btn-primary">View All Articles</a>
            </div>
        </div>
    </section>

    <!-- Community Section -->
    <section class="section" id="community">
        <div class="container">
            <h2 class="section-title">Join Our Community</h2>
            <p class="text-center">Street & Ink is powered by a global community of street art lovers, photographers, and artists.</p>

            <div class="community-stats">
                <div class="stat-item">
                    <div class="stat-number">25K+</div>
                    <div class="stat-label">Artworks Documented</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">8K+</div>
                    <div class="stat-label">Community Members</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">120+</div>
                    <div class="stat-label">Cities Covered</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Artists Featured</div>
                </div>
            </div>

            <h3 style="text-align: center; margin-bottom: 20px;">Our Top Contributors</h3>
            <div class="community-grid">
                <!-- Contributor 1 -->
                <div class="community-user">
                    <div class="user-avatar">
                        <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Sarah J.">
                    </div>
                    <div class="user-name">Sarah J.</div>
                    <div class="user-contributions">420 Artworks</div>
                </div>

                <!-- Contributor 2 -->
                <div class="community-user">
                    <div class="user-avatar">
                        <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Marcus T.">
                    </div>
                    <div class="user-name">Marcus T.</div>
                    <div class="user-contributions">380 Artworks</div>
                </div>

                <!-- Contributor 3 -->
                <div class="community-user">
                    <div class="user-avatar">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Lena K.">
                    </div>
                    <div class="user-name">Lena K.</div>
                    <div class="user-contributions">350 Artworks</div>
                </div>

                <!-- Contributor 4 -->
                <div class="community-user">
                    <div class="user-avatar">
                        <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="David P.">
                    </div>
                    <div class="user-name">David P.</div>
                    <div class="user-contributions">320 Artworks</div>
                </div>

                <!-- Contributor 5 -->
                <div class="community-user">
                    <div class="user-avatar">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Aisha M.">
                    </div>
                    <div class="user-name">Aisha M.</div>
                    <div class="user-contributions">290 Artworks</div>
                </div>

                <!-- Contributor 6 -->
                <div class="community-user">
                    <div class="user-avatar">
                        <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="James L.">
                    </div>
                    <div class="user-name">James L.</div>
                    <div class="user-contributions">275 Artworks</div>
                </div>

                <!-- Contributor 7 -->
                <div class="community-user">
                    <div class="user-avatar">
                        <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Priya K.">
                    </div>
                    <div class="user-name">Priya K.</div>
                    <div class="user-contributions">260 Artworks</div>
                </div>

                <!-- Contributor 8 -->
                <div class="community-user">
                    <div class="user-avatar">
                        <img src="https://randomuser.me/api/portraits/men/33.jpg" alt="Carlos M.">
                    </div>
                    <div class="user-name">Carlos M.</div>
                    <div class="user-contributions">240 Artworks</div>
                </div>
            </div>

            <div class="social-links">
                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-link"><i class="fab fa-discord"></i></a>
                <a href="#" class="social-link"><i class="fab fa-tiktok"></i></a>
                <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
            </div>

            <div class="text-center" style="margin-top: 50px;">
                <a href="Contact.php" class="btn btn-primary btn-large">Join the Movement</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section" id="about">
        <div class="container">
            <div class="about-container">
                <div class="about-image">
                    <img src="https://images.unsplash.com/photo-1579762715118-a6f1d4b934f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=686&q=80" alt="About Street & Ink">
                </div>
                <div class="about-content">
                    <h2 class="section-title mb-0">About Street & Ink</h2>
                    <h3>Our Mission</h3>
                    <p>Street & Ink was born from a passion for urban art and a desire to create a comprehensive platform where street art enthusiasts could discover, document, and discuss artworks from around the world.</p>
                    <p>We believe street art is a vital form of contemporary cultural expression that deserves to be preserved and celebrated. Our platform serves as both an archive and a community for those who appreciate the creativity found on city walls.</p>
                    <p>Founded in 2018 by a group of photographers, artists, and technologists, Street & Ink has grown into the largest crowdsourced street art database with contributions from over 80 countries.</p>
                    <div style="margin-top: 30px;">
                        <a href="AboutUs.php" class="btn btn-primary">Learn More About Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="section newsletter" id="newsletter">
        <div class="container">
            <h2 class="section-title">Stay Updated</h2>
            <p>Subscribe to our newsletter for the latest street art discoveries, artist features, and community updates.</p>

            <form class="newsletter-form">
                <input type="email" class="newsletter-input" placeholder="Your email address">
                <button type="submit" class="newsletter-btn">Subscribe</button>
            </form>
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
                    <a href="Support.php" class="btn btn-primary" style="padding: 10px 20px;">Support</a>
                    <a href="Support.php" class="btn btn-secondary" style="padding: 10px 20px; background-color: transparent; border-color: var(--white); color: var(--white);">Become a Member</a>
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

        // Art Tabs
        const artTabs = document.querySelectorAll('.art-tab');

        artTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                artTabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                // In a real implementation, this would filter the art grid
                // For this demo, we'll just simulate it
                console.log(`Showing ${tab.textContent} artworks`);
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

        // Initialize Map
        const map = L.map('streetArtMap').setView([14.0683, 121.3255], 13);


        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add sample markers for street art locations
        const streetArtLocations = [
            {
                lat: 40.7128,
                lng: -74.0060,
                title: "Banksy Mural",
                description: "Iconic stencil work by anonymous artist",
                type: "stencil"
            },
            {
                lat: 40.7150,
                lng: -74.0080,
                title: "Colorful Abstract",
                description: "Vibrant abstract mural by local artist",
                type: "mural"
            },
            {
                lat: 40.7100,
                lng: -74.0050,
                title: "Political Statement",
                description: "Thought-provoking political artwork",
                type: "political"
            },
            {
                lat: 40.7135,
                lng: -74.0030,
                title: "Neon Installation",
                description: "Glowing neon street art installation",
                type: "installation"
            }
        ];

        // Create custom icons
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

        const politicalIcon = L.divIcon({
            className: 'political-marker',
            html: '<i class="fas fa-comment-alt"></i>',
            iconSize: [30, 30]
        });

        const installationIcon = L.divIcon({
            className: 'installation-marker',
            html: '<i class="fas fa-lightbulb"></i>',
            iconSize: [30, 30]
        });

        // Add markers to the map
        streetArtLocations.forEach(location => {
            let icon;

            switch(location.type) {
                case 'stencil':
                    icon = stencilIcon;
                    break;
                case 'mural':
                    icon = muralIcon;
                    break;
                case 'political':
                    icon = politicalIcon;
                    break;
                case 'installation':
                    icon = installationIcon;
                    break;
                default:
                    icon = L.divIcon({
                        className: 'default-marker',
                        html: '<i class="fas fa-map-marker-alt"></i>',
                        iconSize: [30, 30]
                    });
            }

            const marker = L.marker([location.lat, location.lng], { icon: icon }).addTo(map);
            marker.bindPopup(`
                <h3>${location.title}</h3>
                <p>${location.description}</p>
                <small>Type: ${location.type}</small>
            `);
        });

        // Animation on Scroll
        const animateOnScroll = () => {
            const elements = document.querySelectorAll('.art-card, .artist-card, .blog-card, .category-card, .community-user');

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
        document.querySelectorAll('.art-card, .artist-card, .blog-card, .category-card, .community-user').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        });

        window.addEventListener('scroll', animateOnScroll);
        window.addEventListener('load', animateOnScroll);

        // Footer logo animation
        const footerLogo = document.querySelector('.footer-logo');
        footerLogo.addEventListener('mouseenter', () => {
            footerLogo.style.transform = 'scale(1.05)';
        });
        footerLogo.addEventListener('mouseleave', () => {
            footerLogo.style.transform = 'scale(1)';
        });

        // Submit button hover effect
        const submitBtn = document.querySelector('.submit .btn');
        if (submitBtn) {
            submitBtn.addEventListener('mouseenter', () => {
                submitBtn.style.transform = 'translateY(-2px)';
                submitBtn.style.boxShadow = '0 15px 30px rgba(0, 0, 0, 0.1)';
            });
            submitBtn.addEventListener('mouseleave', () => {
                submitBtn.style.transform = 'translateY(0)';
                submitBtn.style.boxShadow = 'none';
            });

            // Fix Submit Artwork button functionality
            submitBtn.addEventListener('click', (e) => {
                e.preventDefault();
                alert('Submit Artwork functionality would go here in a real implementation');
                // In a real implementation, this would open a form or modal
            });
        }
        const submitArtworkBtn = document.getElementById('submitArtworkBtn');
if (submitArtworkBtn) {
    submitArtworkBtn.addEventListener('click', (e) => {
        e.preventDefault();
        alert('Thank you for wanting to submit artwork! In a real implementation, this would open a submission form where you can upload images and details about the street art.');

            // You could also redirect to a submission page:
            // window.location.href = '/submit-artwork';

            // Or open a modal:
            // document.getElementById('submitModal').style.display = 'block';
        });
    }

        // App store buttons hover effect
        const appButtons = document.querySelectorAll('.app-btn');
        appButtons.forEach(btn => {
            btn.addEventListener('mouseenter', () => {
                btn.style.transform = 'translateY(-3px)';
                btn.style.boxShadow = '0 10px 20px rgba(0, 0, 0, 0.1)';
            });
            btn.addEventListener('mouseleave', () => {
                btn.style.transform = 'translateY(0)';
                btn.style.boxShadow = 'none';
            });
        });

        // Add hover interaction for top contributors
        const communityUsers = document.querySelectorAll('.community-user');
        communityUsers.forEach(user => {
            user.addEventListener('click', () => {
                const userName = user.querySelector('.user-name').textContent;
                alert(`Viewing profile of ${userName}. In a real implementation, this would navigate to the user's profile.`);
            });
        });


        //smooth trantion for the page
       document.querySelector('.ajax-link').addEventListener('click', function (e) {
    e.preventDefault();
    fetch(this.href)
      .then(res => res.text())
      .then(html => {
        document.querySelector('#content').innerHTML = html;
      });
  });
    </script>
</body>
</html>
