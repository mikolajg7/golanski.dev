<?php
session_start();
$lang = 'en';
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
            color: #fff;
            text-decoration: none;
        }
        .navbar-left a:hover, .navbar-right a:hover {
            color: #ffffff;
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
            bottom: 15px;
            left: 15px;
        }
        .language-switcher a {
            display: inline-block;
            padding: 5px 10px;
            border: 1px solid #000;
            color: #000;
            text-decoration: none.
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
    </style>
</head>
<body>
<header class="container-fluid">
    <div class="row align-items-center">
        <div class="col-md-3 text-left">
            <nav>
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <a href="auth.php?lang=<?= $lang ?>">LOGIN/REGISTER</a><br>
                <?php else: ?>
                    <a href="logout.php?lang=<?= $lang ?>">LOGOUT</a><br>
                <?php endif; ?>
                <a href="mailto:mikolajgolanski16@gmail.com">EMAIL ME</a><br>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="#" data-toggle="modal" data-target="#contactFormModal">CONTACT FORM</a>
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
                    <a class="nav-item nav-link" href="#projekty">PROJECTS</a>
                    <a class="nav-item nav-link" href="#about-me">ABOUT ME</a>
                    <a class="nav-item nav-link" href="#contact">CONTACT</a>
                </div>
            </nav>
        </div>
    </div>
</header>
<main class="container my-5">
    <div class="section-divider"></div>
    <section id="projekty" class="section">
        <h2>Projects</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <a href="project_speed_typing_app.php" class="project-card-link">
                    <div class="card project-card h-100">
                        <div class="card-body">
                            <h3 class="card-title">SpeedTypingApp</h3>
                            <p class="card-text">A simple application to test typing speed along with learning the correct finger to button click.</p>
                            <img id="gn" src="photos/speedtyping.jpeg" alt="GoodNight Project Image" class="img-fluid" />
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="project_good_night.php" class="project-card-link">
                    <div class="card project-card h-100">
                        <div class="card-body">
                            <h3 class="card-title">Project "GoodNight"</h3>
                            <p class="card-text">An intelligent alarm clock that wakes the user by calculating REM phases.</p>
                            <img id="gn" src="photos/goodnight.png" alt="GoodNight Project Image" class="img-fluid" />
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="project_license_plate.php" class="project-card-link">
                    <div class="card project-card h-100">
                        <div class="card-body">
                            <h3 class="card-title">License Plate Recognition Algorithm from a Photo</h3>
                            <p class="card-text">This project focuses on license plate recognition using computer vision techniques and OCR (Optical Character Recognition). The provided code implements various image processing steps, including gamma correction, edge detection, contour detection, and cropping to isolate license plate regions from images. The project also utilizes Tesseract OCR for text extraction from license plate images. By combining these techniques, the project aims to accurately detect and extract license plate information from images.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="project_boston.php" class="project-card-link">
                    <div class="card project-card h-100">
                        <div class="card-body">
                            <h3 class="card-title">Boston Housing Data Analysis and Prediction</h3>
                            <p class="card-text">This project is a comprehensive analysis and prediction of the Boston Housing dataset. It includes data cleaning, exploratory data analysis, visualization, and predictive modeling using linear regression.</p>
                            <img id="st" src="photos/boston-brownstones.jpg" alt="Boston housing project Image" class="img-fluid" />
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="project_chess.php" class="project-card-link">
                    <div class="card project-card h-100">
                        <div class="card-body">
                            <h3 class="card-title">Chess C++.</h3>
                            <p class="card-text">Chess written in C++.</p>
                            <img id="st" src="photos/chess.jpeg" alt="Chess Project Image" class="img-fluid" />
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card project-card h-100">
                    <div class="card-body">
                        <h3 class="card-title">facial-analysis-from-camera </h3>
                        <p class="card-text">Still in progress. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="section-divider"></div>
    <section id="about-me" class="section">
        <h2>About Me</h2>
        <div class="row about-me-container">
            <div class="col-md-4 text-center">
                <img id="MikG" src="photos/IMG_1976.jpeg" alt="MikolajG" class="img-fluid" />
            </div>
            <div class="col-md-8">
                <p id="about-me">I am a student passionate about artificial intelligence and machine learning. I possess both theoretical and practical knowledge acquired during my studies. My interests focus on creating innovative solutions based on artificial intelligence. I want to gain my first experience in the IT industry to develop as a programmer and contribute to the dynamic world of technology. More about me on my <a href="https://www.linkedin.com/in/miko%C5%82aj-gola%C5%84ski/" id="profil-linkedin" target="_blank" rel="noopener noreferrer">LinkedIn profile</a></p>
            </div>
        </div>
    </section>
    <div class="section-divider"></div>
</main>
<footer id="contact" class="section">
    <p>&copy; 2024 Mikołaj Golański | <a href="https://www.linkedin.com/in/miko%C5%82aj-gola%C5%84ski/">Contact</a></p>
</footer>
<div class="language-switcher">
    <a href="index.php?lang=pl" class="<?= $lang == 'pl' ? 'active' : '' ?>">PL</a>
    <a href="index.php?lang=en" class="<?= $lang == 'en' ? 'active' : '' ?>">EN</a>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
