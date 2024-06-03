<?php
session_start();

if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'pl';

$translations = [
    'pl' => [
        'register' => 'Rejestracja',
        'login' => 'Logowanie',
        'username' => 'Nazwa użytkownika',
        'email' => 'E-mail',
        'password' => 'Hasło',
        'register_button' => 'Zarejestruj się',
        'login_button' => 'Zaloguj się',
        'email_me' => 'NAPISZ DO MNIE',
        'projects' => 'PROJEKTY',
        'about_me' => 'O MNIE',
        'contact' => 'KONTAKT',
        'logout' => 'Wyloguj się',
        'login_register' => 'Logowanie/Rejestracja'
    ],
    'en' => [
        'register' => 'Register',
        'login' => 'Login',
        'username' => 'Username',
        'email' => 'Email',
        'password' => 'Password',
        'register_button' => 'Register',
        'login_button' => 'Login',
        'email_me' => 'EMAIL ME',
        'projects' => 'PROJECTS',
        'about_me' => 'ABOUT ME',
        'contact' => 'CONTACT',
        'logout' => 'Logout',
        'login_register' => 'Login/Register'
    ]
];

$t = $translations[$lang];
?>

<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <link rel="icon" href="photos/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $t['login_register'] ?></title>
    <style>
        body {
            color: #fff;
            background: #86a4f3;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            font-weight: bold;
            font-size: 20px;
            padding: 20px;
            text-align: center;
        }
        #MG {
            color: white;
            font-weight: bold;
            text-decoration: none;
            display: block;
        }
        #logo {
            width: 200px;
            height: 200px;
        }
        .navbar-left a, .navbar-right a {
            color: #fff;
            text-decoration: none;
        }
        .navbar-left a:hover, .navbar-right a:hover {
            color: #00008B;
            font-weight: bold;
        }
        footer {
            margin-top: auto;
            color: #fafafa;
            text-align: center;
            padding: 30px;
            background-color: gray;
        }
        footer a {
            color: #fafafa;
            text-decoration: underline;
        }
        footer a:hover {
            color: #00008B;
        }
        .section {
            padding: 60px 0;
            border-top: 1px solid #ddd;
        }
        h1, h2 {
            font-family: Lora, serif;
            font-weight: bold;
            font-size: 2em;
            text-align: center;
        }
        .navbar-nav {
            flex-direction: column;
        }
        .section-divider {
            width: 100%;
            height: 1px;
            background-color: #ddd;
            margin: 20px 0;
        }
        .auth-links {
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .auth-links a {
            margin-left: 10px;
            color: #fff;
            text-decoration: none;
        }
        .language-switcher {
            position: fixed;
            bottom: 10px;
            left: 10px;
        }
        .language-switcher a {
            display: inline-block;
            padding: 5px 10px;
            border: 1px solid #000;
            color: #000;
            text-decoration: none;
        }
        .language-switcher .active {
            background-color: #000;
            color: #fff;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #141E30;
            padding: 20px;
            border-radius: 5px;
        }
        .form-container h2 {
            text-align: center;
            color: #fff;
        }
        .form-container .form-group label {
            color: #fff;
        }
        .form-container .btn-primary {
            background-color: #00008B;
            border: none;
        }
        .form-container .btn-primary:hover {
            background-color: #00006B;
        }
    </style>
</head>
<body>
<header class="container-fluid">
    <div class="row align-items-center">
        <div class="col-md-3 text-left">
            <nav>
                <a href="mailto:mikolajgolanski16@gmail.com"><?= $t['email_me'] ?></a>
            </nav>
        </div>
        <div class="col-md-6 text-center">
            <a href="index.php" id="MG">
                <h1>Mikołaj Golański</h1>
            </a>
            <a href="index.php">
                <img id="logo" src="photos/logo512.png" alt="Logo that represents initials of author- MG" />
            </a>
        </div>
        <div class="col-md-3 text-right">
            <nav>
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="index.php#projekty"><?= $t['projects'] ?></a>
                    <a class="nav-item nav-link" href="index.php#o-mnie"><?= $t['about_me'] ?></a>
                    <a class="nav-item nav-link" href="index.php#contact"><?= $t['contact'] ?></a>
                </div>
            </nav>
        </div>
    </div>
    <div class="auth-links">
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="logout.php"><?= $t['logout'] ?></a>
        <?php else: ?>
            <a href="auth.php"><?= $t['login_register'] ?></a>
        <?php endif; ?>
    </div>
</header>
<main class="container my-5">
    <div class="section-divider"></div>
    <section class="section">
        <div class="form-container">
            <h2><?= $t['register'] ?></h2>
            <form action="register.php" method="post">
                <div class="form-group">
                    <label for="username"><?= $t['username'] ?>:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="email"><?= $t['email'] ?>:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password"><?= $t['password'] ?>:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary"><?= $t['register_button'] ?></button>
            </form>
        </div>
        <div class="section-divider"></div>
        <div class="form-container mt-5">
            <h2><?= $t['login'] ?></h2>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username"><?= $t['username'] ?>:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password"><?= $t['password'] ?>:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary"><?= $t['login_button'] ?></button>
            </form>
        </div>
    </section>
</main>
<footer id="contact" class="section">
    <p>&copy; 2024 Mikołaj Golański | <a href="https://www.linkedin.com/in/miko%C5%82aj-gola%C5%84ski/"><?= $t['contact'] ?></a></p>
</footer>
<div class="language-switcher">
    <a href="?lang=pl" class="<?= $lang == 'pl' ? 'active' : '' ?>">PL</a>
    <a href="?lang=en" class="<?= $lang == 'en' ? 'active' : '' ?>">EN</a>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
