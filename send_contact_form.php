<?php
session_start();

// Sprawdzenie czy dane formularza zostały przesłane
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobranie danych z formularza
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Adres email, na który ma zostać wysłana wiadomość
    $to = 'mikolajgolanski16@gmail.com';

    // Temat wiadomości
    $subject = 'Nowa wiadomość z formularza kontaktowego';

    // Treść wiadomości
    $body = "Imię: $name\nEmail: $email\n\nWiadomość:\n$message";

    // Nagłówki wiadomości
    $headers = "From: $email";

    // Wysyłanie wiadomości
    if (mail($to, $subject, $body, $headers)) {
        $_SESSION['message'] = 'Wiadomość została wysłana pomyślnie!';
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Wystąpił błąd podczas wysyłania wiadomości. Spróbuj ponownie później.';
        $_SESSION['message_type'] = 'danger';
    }

    // Przekierowanie na stronę główną
    $lang = isset($_GET['lang']) ? $_GET['lang'] : 'pl';
    header("Location: index_$lang.php?lang=$lang");
    exit();
}
?>
