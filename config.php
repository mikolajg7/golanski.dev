<?php
$servername = "127.0.0.1";
$username = "root";
$password = ""; // hasło do użytkownika MySQL (domyślnie puste na lokalnym serwerze)
$dbname = "users"; // nazwa Twojej bazy danych

// Utworzenie połączenia
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Połączenie nieudane: " . $conn->connect_error);
}
?>
