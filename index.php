<?php
session_start();

if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'pl';

if ($lang == 'en') {
    header("Location: index_en.php");
} else {
    header("Location: index_pl.php");
}
exit();
?>
