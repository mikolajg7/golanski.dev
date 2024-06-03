<?php
session_start();
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'pl';

session_destroy();
header("Location: index_$lang.php?lang=$lang");
exit();
?>
