<?php
session_start();
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'pl';
include 'config.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        $_SESSION['user_id'] = $stmt->insert_id;
        header("Location: index_$lang.php?lang=$lang");
        exit();
    } else {
        $message = $lang == 'pl' ? "Rejestracja nie powiodła się." : "Registration failed.";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <link rel="icon" href="photos/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $lang == 'pl' ? 'Rejestracja' : 'Register' ?> | Mikołaj Golański</title>
</head>
<body>
<?php if (!empty($message)): ?>
    <div class="alert alert-danger" role="alert">
        <?= $message ?>
    </div>
<?php endif; ?>
<form action="register.php?lang=<?= $lang ?>" method="post">
    <div class="form-group">
        <label for="username"><?= $lang == 'pl' ? 'Nazwa użytkownika' : 'Username' ?></label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="email"><?= $lang == 'pl' ? 'Email' : 'Email' ?></label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password"><?= $lang == 'pl' ? 'Hasło' : 'Password' ?></label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary"><?= $lang == 'pl' ? 'Zarejestruj się' : 'Register' ?></button>
</form>
</body>
</html>
