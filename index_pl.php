<?php
session_start();
$lang = 'pl';
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <link rel="icon" href="photos/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mikołaj Golański | Portfolio</title>
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
            width: 350px;
            height: 350px;
        }
        .navbar-left a, .navbar-right a {
            color: #fff; /* Zmieniono na biały */
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
        .project-card {
            background-color: #141E30;
            color: white;
            border: none;
            cursor: pointer;
        }
        .project-card:hover {
            background-color: #1f2a45;
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
            margin:0;
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
            bottom: 15px;
            left: 15px;
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
        .project-card-link {
            text-decoration: none;
            color: inherit;
        }
        .about-me-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .about-me-container img {
            margin-right: 20px;
        }
        .about-me-container p {
            font-size: 1.5em;
            flex: 1;
        }
        .modal-body label {
            color: #000; /* Zmieniono kolor tekstu w formularzu na czarny */
        }
    </style>
</head>
<body>
<header class="container-fluid">
    <div class="row align-items-center">
        <div class="col-md-3 text-left">
            <nav>
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <a href="auth.php?lang=<?= $lang ?>">LOGOWANIE/REJESTRACJA</a><br>
                <?php else: ?>
                    <a href="logout.php?lang=<?= $lang ?>">WYLOGUJ SIĘ</a><br>
                <?php endif; ?>
                <a href="mailto:mikolajgolanski16@gmail.com">NAPISZ DO MNIE</a><br>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="#" data-toggle="modal" data-target="#contactFormModal">FORMULARZ KONTAKTOWY</a>
                <?php endif; ?>
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
                    <a class="nav-item nav-link" href="#projekty">PROJEKTY</a>
                    <a class="nav-item nav-link" href="#o-mnie">O MNIE</a>
                    <a class="nav-item nav-link" href="#contact">KONTAKT</a>
                </div>
            </nav>
        </div>
    </div>
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> text-center" role="alert">
            <?= $_SESSION['message'] ?>
            <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
        </div>
    <?php endif; ?>
</header>
<main class="container my-5">
    <div class="section-divider"></div>
    <section id="projekty" class="section">
        <h2>Projekty</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <a href="project_speed_typing_app.php" class="project-card-link">
                    <div class="card project-card h-100">
                        <div class="card-body">
                            <h3 class="card-title">SpeedTypingApp</h3>
                            <p class="card-text">Prosta aplikacja do sprawdzenia prędkości pisania wraz z nauką odpowiedniego kliknięcia palcem na przycisk.</p>
                            <img id="st" src="photos/speedtyping.jpeg" alt="SpeedTyping Project Image" class="img-fluid" />
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="project_good_night.php" class="project-card-link">
                    <div class="card project-card h-100">
                        <div class="card-body">
                            <h3 class="card-title">Projekt "GoodNight"</h3>
                            <p class="card-text">Inteligentny budzik budzący użytkownika obliczając fazy REM.</p>
                            <img id="gn" src="photos/goodnight.png" alt="GoodNight Project Image" class="img-fluid" />
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="project_license_plate.php" class="project-card-link">
                    <div class="card project-card h-100">
                        <div class="card-body">
                            <h3 class="card-title">Algorytm rozpoznawania tablicy rejestracyjnej ze zdjęcia.</h3>
                            <p class="card-text">Inteligentny budzik budzący użytkownika obliczając fazy REM.</p>
                            <img id="st" src="photos/tablice-rejestracyjne.png" alt="License plate recognition Image" class="img-fluid" />
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="project_boston.php" class="project-card-link">
                    <div class="card project-card h-100">
                        <div class="card-body">
                            <h3 class="card-title">Boston Housing - analiza oraz predykcja. </h3>
                            <p class="card-text">Projekt ten stanowi wszechstronną analizę i prognozę zbioru danych Boston Housing. Obejmuje czyszczenie danych, eksploracyjną analizę danych, wizualizację i modelowanie predykcyjne przy użyciu regresji liniowej.</p>
                            <img id="st" src="photos/boston-brownstones.jpg" alt="Boston housing project Image" class="img-fluid" />
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="project_chess.php" class="project-card-link">
                    <div class="card project-card h-100">
                        <div class="card-body">
                            <h3 class="card-title">Szachy C++.</h3>
                            <p class="card-text">Szachy napisane w języku C++</p>
                            <img id="st" src="photos/chess.jpeg" alt="Chess Project Image" class="img-fluid" />
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card project-card h-100">
                    <div class="card-body">
                        <h3 class="card-title">Analiza twarzy za pomocą uczenia maszynowego </h3>
                        <p class="card-text">Projekt wciąż w realizacji. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="section-divider"></div>
    <section id="o-mnie" class="section">
        <h2>O mnie</h2>
        <div class="row about-me-container">
            <div class="col-md-4 text-center">
                <img id="MikG" src="photos/IMG_1976.jpeg" alt="MikolajG" class="img-fluid" />
            </div>
            <div class="col-md-8">
                <p id="about-me">Jestem studentem z pasją do sztucznej inteligencji i uczenia maszynowego. Posiadającym zarówno wiedzę teoretyczną, jak i praktyczną nabytą na studiach. Moje zainteresowania koncentrują się wokół tworzenia innowacyjnych rozwiązań opartych na sztucznej inteligencji. Chcę zdobyć pierwsze doświadczenie w branży IT, aby rozwijać się jako programista i wnosić wkład w dynamiczny świat technologii. Więcej o mnie na moim <a href="https://www.linkedin.com/in/miko%C5%82aj-gola%C5%84ski/" id="profil-linkedin" target="_blank" rel="noopener noreferrer">profilu LinkedIn</a></p>
            </div>
        </div>
    </section>
    <div class="section-divider"></div>
</main>
<footer id="contact" class="section">
    <p>&copy; 2024 Mikołaj Golański | <a href="https://www.linkedin.com/in/miko%C5%82aj-gola%C5%84ski/">Kontakt</a></p>
</footer>
<div class="language-switcher">
    <a href="index.php?lang=pl" class="<?= $lang == 'pl' ? 'active' : '' ?>">PL</a>
    <a href="index.php?lang=en" class="<?= $lang == 'en' ? 'active' : '' ?>">EN</a>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Modal z formularzem kontaktowym -->
<div class="modal fade" id="contactFormModal" tabindex="-1" role="dialog" aria-labelledby="contactFormModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactFormModalLabel">Formularz Kontaktowy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="send_contact_form.php?lang=<?= $lang ?>" method="post">
                    <div class="form-group">
                        <label for="name">Imię</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Wiadomość</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Wyślij</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
