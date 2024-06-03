<?php
session_start();
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'pl';
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <link rel="icon" href="photos/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Algorytm rozpoznawania tablicy rejestracyjnej | Mikołaj Golański</title>
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
        .section-divider {
            width: 100%;
            height: 1px;
            background-color: #ddd;
            margin: 20px 0;
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
    </style>
</head>
<body>
<header class="container-fluid">
    <div class="row align-items-center">
        <div class="col-md-3 text-left">
            <nav>
                <a href="mailto:mikolajgolanski16@gmail.com"><?= $lang == 'pl' ? 'NAPISZ DO MNIE' : 'EMAIL ME' ?></a>
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
                    <a class="nav-item nav-link" href="index.php#projekty"><?= $lang == 'pl' ? 'PROJEKTY' : 'PROJECTS' ?></a>
                    <a class="nav-item nav-link" href="index.php#o-mnie"><?= $lang == 'pl' ? 'O MNIE' : 'ABOUT ME' ?></a>
                    <a class="nav-item nav-link" href="index.php#contact"><?= $lang == 'pl' ? 'KONTAKT' : 'CONTACT' ?></a>
                </div>
            </nav>
        </div>
    </div>
</header>
<main class="container my-5">
    <section class="section">
        <h2><?= $lang == 'pl' ? 'Szachy C++' : 'Chess C++' ?></h2>
        <p><?= $lang == 'pl' ? 'Szachy napisane w C++' : 'Chess written in C++.' ?></p>
    </section>
    <div class="section-divider"></div>
</main>
<footer id="contact" class="section">
    <p>&copy; 2024 Mikołaj Golański | <a href="https://www.linkedin.com/in/miko%C5%82aj-gola%C5%84ski/"><?= $lang == 'pl' ? 'Kontakt' : 'Contact' ?></a></p>
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
