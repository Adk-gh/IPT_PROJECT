<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Street & Ink</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Reuse your existing styles from the main page */
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

        /* Header Styles (same as main page) */
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

        /* Contact Page Specific Styles */
        .contact-hero {
            padding: 180px 0 100px;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1547891654-e66ed7ebb968?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80') no-repeat center center/cover;
            color: var(--white);
            text-align: center;
        }

        .contact-hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
        }

        .contact-hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto;
            opacity: 0.9;
        }

        .contact-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            margin-top: 60px;
        }

        @media (max-width: 992px) {
            .contact-container {
                grid-template-columns: 1fr;
            }
        }

        .contact-form {
            background-color: var(--secondary);
            padding: 40px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 14px 20px;
            border-radius: var(--border-radius);
            border: 1px solid #ddd;
            background-color: var(--white);
            transition: var(--transition);
            color: var(--text);
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

        .form-submit {
            width: 100%;
            padding: 16px;
            font-size: 1.1rem;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }

        .checkbox-group input {
            margin-right: 10px;
        }

        .contact-info {
            padding: 20px;
        }

        .contact-info h3 {
            font-size: 1.8rem;
            margin-bottom: 30px;
            position: relative;
            display: inline-block;
        }

        .contact-info h3:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--accent);
        }

        .contact-methods {
            margin-top: 40px;
        }

        .contact-method {
            display: flex;
            align-items: flex-start;
            margin-bottom: 30px;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background-color: var(--accent);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            margin-right: 20px;
            flex-shrink: 0;
        }

        .contact-details h4 {
            font-size: 1.3rem;
            margin-bottom: 5px;
        }

        .contact-details p, .contact-details a {
            color: var(--text-light);
            transition: var(--transition);
        }

        .contact-details a:hover {
            color: var(--accent);
        }

        .collaboration-box {
            background-color: var(--secondary);
            padding: 30px;
            border-radius: var(--border-radius);
            margin-top: 60px;
            text-align: center;
            box-shadow: var(--shadow);
        }

        .collaboration-box h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .collaboration-box p {
            margin-bottom: 20px;
            color: var(--text-light);
        }

        .success-message {
            display: none;
            background-color: #d4edda;
            color: #155724;
            padding: 20px;
            border-radius: var(--border-radius);
            margin-bottom: 30px;
            text-align: center;
        }

        .success-message.show {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Fix for select placeholder in dark mode */
        [data-theme="dark"] select option[disabled] {
            color: var(--text-light);
        }

        /* Footer Styles (same as main page) */
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
        @media (max-width: 768px) {
            .contact-hero {
                padding: 150px 0 80px;
            }

            .contact-hero h1 {
                font-size: 2.5rem;
            }

            .contact-hero p {
                font-size: 1rem;
            }

            .contact-form {
                padding: 30px 20px;
            }
        }

        @media (max-width: 576px) {
            .contact-hero {
                padding: 130px 0 60px;
            }

            .contact-hero h1 {
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
                        <li><a href="index.php#categories">Categories</a></li>
                        <li><a href="index.php#community">Community</a></li>
                        <li><a href="index.php#about">About</a></li>
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

    <!-- Contact Hero Section -->
    <section class="contact-hero">
        <div class="container">
            <h1>Let's Connect</h1>
            <p>Got a question, suggestion, or idea? Whether it's a hidden mural, a bug, or a collaboration — we'd love to hear from you.</p>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="section">
        <div class="container">
            <div class="contact-container">
                <div class="contact-form-container">
                    <div class="success-message" id="successMessage">
                        <i class="fas fa-check-circle" style="font-size: 2rem; margin-bottom: 10px;"></i>
                        <h3>Thanks for reaching out!</h3>
                        <p>We'll get back to you soon.</p>
                    </div>

                    <form id="contactForm" class="contact-form">
                        <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <input type="text" id="fullName" class="form-control" placeholder="John Doe" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" class="form-control" placeholder="you@example.com" required>
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <select id="subject" class="form-control" required>
                                <option value="" disabled selected>Select a subject</option>
                                <option value="general">General Inquiry</option>
                                <option value="feature">Feature Request</option>
                                <option value="issue">Report an Issue</option>
                                <option value="partnership">Partnership / Collaboration</option>
                                <option value="submission">Submit a Mural Tip</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" class="form-control" placeholder="Tell us everything..." required></textarea>
                        </div>

                        <div class="checkbox-group">
                            <input type="checkbox" id="agreeTerms" required>
                            <label for="agreeTerms">I agree to the <a href="#" style="color: var(--accent);">terms and privacy policy</a></label>
                        </div>

                        <button type="submit" class="btn btn-primary form-submit">Send Message</button>
                    </form>
                </div>

                <div class="contact-info">
                    <h3>Other Ways to Reach Us</h3>

                    <div class="contact-methods">
                        <div class="contact-method">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Email Us Directly</h4>
                                <p><a href="mailto:suggest@streetandink.com">suggest@streetandink.com</a></p>
                                <p><a href="mailto:support@streetandink.com">support@streetandink.com</a></p>
                            </div>
                        </div>

                        <div class="contact-method">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Our Office</h4>
                                <p>123 Art Street, Creative District</p>
                                <p>CA 90210, United States</p>
                            </div>
                        </div>

                        <div class="contact-method">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Call Us</h4>
                                <p><a href="tel:+15551234567">+1 (555) 123-4567</a></p>
                                <p>Mon-Fri, 9am-5pm PST</p>
                            </div>
                        </div>

                        <div class="contact-method">
                            <div class="contact-icon">
                                <i class="fas fa-hashtag"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Social Media</h4>
                                <p>
                                    <a href="#" style="margin-right: 15px;"><i class="fab fa-instagram"></i> Instagram</a>
                                    <a href="#" style="margin-right: 15px;"><i class="fab fa-twitter"></i> Twitter</a>
                                    <a href="#"><i class="fab fa-facebook"></i> Facebook</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="collaboration-box">
                        <div class="contact-icon" style="margin: 0 auto 20px;">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3>Want to Collaborate?</h3>
                        <p>Are you a brand, event organizer, or artist collective looking to work with us?</p>
                        <a href="Partners.php" class="btn btn-secondary">Partner With Us</a>
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
                        <li><a href="index.php#about">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Partners</a></li>
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

        // Contact Form Submission
        const contactForm = document.getElementById('contactForm');
        const successMessage = document.getElementById('successMessage');

        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();

            // Simulate form submission
            setTimeout(() => {
                // Show success message
                successMessage.classList.add('show');

                // Reset form
                contactForm.reset();

                // Hide success message after 5 seconds
                setTimeout(() => {
                    successMessage.classList.remove('show');
                }, 5000);
            }, 1000);
        });
    </script>
</body>
</html>
