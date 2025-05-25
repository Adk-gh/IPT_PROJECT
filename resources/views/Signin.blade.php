<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
session_start();
// Database connection
$host = 'localhost';
$db = 'streetandink';
$user = 'root';
$pass = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    // Validate input
    if (empty($email) || empty($password)) {
        echo "<script>alert('Email and password are required!'); window.location.href='Signin.php';</script>";
        exit;
    }
    // Prepare and execute SQL query
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format!'); window.location.href='Signin.php';</script>";
        exit;
    }
    if (strlen($password) < 6) {
        echo "<script>alert('Password must be at least 6 characters long!'); window.location.href='Signin.php';</script>";
        exit;
    }
    // Check if user exists
    $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
    $email = trim($email);
    $password = trim($password);
    // Prepare SQL statement to prevent SQL injection
    if (!isset($pdo)) {
        echo "<script>alert('Database connection failed!'); window.location.href='Signin.php';</script>";
        exit;
    }
    if (empty($email) || empty($password)) {
        echo "<script>alert('Email and password are required!'); window.location.href='Signin.php';</script>";
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format!'); window.location.href='Signin.php';</script>";
        exit;
    }
    if (strlen($password) < 6) {
        echo "<script>alert('Password must be at least 6 characters long!'); window.location.href='Signin.php';</script>";
        exit;
    }


    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['email'] = $user['email'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['id'] = $user['id'];

            // Redirect to profile
            header("Location: Profile.php");
            exit;

    } else {
        echo "<script>alert('Incorrect password!'); window.location.href='Signin.php';</script>";
    }

    } else {
        echo "User not found!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | Street & Ink</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
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
            min-height: 100vh;
            display: flex;
            transition: background-color 0.3s ease;
        }

        .split-layout {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        .art-side {
            flex: 1;
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)),
                        url('https://images.unsplash.com/photo-1547891654-e66ed7ebb968?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80') no-repeat center center/cover;
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            display: none;
        }

        .form-side {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .form-container {
            max-width: 400px;
            width: 100%;
        }

        .logo {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
            margin-bottom: 40px;
        }

        .logo span {
            color: var(--accent);
        }

        .logo i {
            margin-right: 10px;
            font-size: 1.5rem;
        }

        .form-header {
            margin-bottom: 30px;
        }

        .form-header h1 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .form-header p {
            color: var(--text-light);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: var(--white);
            color: var(--text);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 2px rgba(255, 94, 91, 0.2);
        }

        .btn {
            display: inline-block;
            padding: 14px;
            border-radius: var(--border-radius);
            font-weight: 600;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            width: 100%;
            font-size: 1rem;
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
            border: 1px solid var(--primary);
            margin-top: 10px;
        }

        .btn-secondary:hover {
            background-color: var(--primary);
            color: var(--white);
        }

        .form-footer {
            margin-top: 20px;
            text-align: center;
        }

        .form-footer a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .form-footer a:hover {
            text-decoration: underline;
            color: var(--accent-dark);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 20px 0;
            color: var(--text-light);
        }

        .divider::before, .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #ddd;
        }

        .divider::before {
            margin-right: 10px;
        }

        .divider::after {
            margin-left: 10px;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
        }

        .checkbox-group input {
            margin-right: 8px;
            accent-color: var(--accent);
        }

        .theme-toggle {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            color: var(--primary);
            cursor: pointer;
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }

        .theme-toggle:hover {
            transform: rotate(30deg);
        }

        .art-content {
            margin-top: auto;
        }

        .art-content p {
            font-size: 1.2rem;
            max-width: 400px;
            margin-bottom: 30px;
        }

        .forgot-link {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            color: var(--accent);
            font-size: 0.9rem;
        }

        .forgot-link i {
            transition: transform 0.3s ease;
        }

        .forgot-link:hover i {
            transform: translateX(3px);
        }

        @media (min-width: 992px) {
            .art-side {
                display: flex;
            }
        }
    </style>
</head>
<body>
    <div class="split-layout">
        <!-- Left Side - Art Background -->
        <div class="art-side">
            <div>
               <a href="{{ route('home') }}" class="logo" style="color: white;">
                <i class="fas fa-spray-can"></i>Street & <span>Ink</span></a>
                
            </div>
            <div class="art-content">
                <h2 style="font-family: 'Space Grotesk', sans-serif; margin-bottom: 20px; font-size: 1.8rem;">Your guide to hidden street art</h2>
                <p>Discover the most vibrant urban artworks from around the world. Join our community of art explorers.</p>
            </div>
        </div>

        <!-- Right Side - Form -->
        <div class="form-side">
            <div class="form-container">
                <button class="theme-toggle" id="themeToggle">
                    <i class="fas fa-moon"></i>
                </button>

                <div class="form-header">
                    <h1>Welcome Back!</h1>
                    <p>Sign in to explore, pin, and discover the best street art around the world.</p>
                </div>

                <form method="POST" action="{{ route('signin') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="you@example.com" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>

                    </div>

                    <div class="remember-forgot">
                        <div class="checkbox-group">
                            <input type="checkbox" id="remember">
                            <label for="remember">Remember me</label>
                        </div>
                        <a href="#" class="forgot-link">
                            Reset password <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>

                    <button type="submit" class="btn btn-primary">Sign In</button>

                    <div class="divider">or</div>

                    <button type="button" class="btn btn-secondary">
                        <i class="fab fa-google" style="margin-right: 8px;"></i> Sign in with Google
                    </button>

                    <div class="form-footer">
                        <p>Don't have an account? <a href="{{ route('signup') }}">Sign Up</a></p>
                        <p style="margin-top: 30px; color: var(--text-light); font-size: 0.9rem;">
                            "Art belongs to the streets. So does the story. Let's explore together."
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
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

        // Form submission
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            // Add your form submission logic here
            alert('Sign in functionality would be implemented here');
        });

        /*
        // Password visibility toggle
document.querySelector('.toggle-password').addEventListener('click', function () {
    const passwordField = document.querySelector(this.getAttribute('toggle'));
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);

    this.classList.toggle('fa-eye');
    this.classList.toggle('fa-eye-slash');
});
*/

    </script>
</body>
</html>
