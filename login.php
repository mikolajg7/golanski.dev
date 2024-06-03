<?php
session_start();
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'pl';
include 'config.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            header("Location: index_$lang.php?lang=$lang");
            exit();
        } else {
            $message = $lang == 'pl' ? "Nieprawidłowe hasło." : "Invalid password.";
        }
    } else {
        $message = $lang == 'pl' ? "Nieprawidłowa nazwa użytkownika." : "Invalid username.";
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
    <title><?= $lang == 'pl' ? 'Logowanie' : 'Login' ?> | Mikołaj Golański</title>
</head>
<body>
<?php if (!empty($message)): ?>
    <div class="alert alert-danger" role="alert">
        <?= $message ?>
    </div>
<?php endif; ?>
<form action="login.php?lang=<?= $lang ?>" method="post">
    <div class="form-group">
        <label for="username"><?= $lang == 'pl' ? 'Nazwa użytkownika' : 'Username' ?></label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="password"><?= $lang == 'pl' ? 'Hasło' : 'Password' ?></label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary"><?= $lang == 'pl' ? 'Zaloguj się' : 'Login' ?></button>
</form>
</body>
</html>
