<?php
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['username'] = $username;
    if (isset($_POST['remember_me'])) {
        setcookie('username', $username, time() + 3600);
        $message = 'Wlecome  $username';
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    setcookie('username', '', time() - 3600);
    header('Location: index.php');
    exit;
}

if (isset($_POST['set_language'])) {
    $language = $_POST['language'];
    setcookie('language', $language, time() + 3600);
    $message = "Language is $language";
}

if (!isset($_SESSION['username']) && isset($_COOKIE['username'])) {
    $_SESSION['username'] = $_COOKIE['username'];
}

$language = $_COOKIE['language'] ?? 'english';
$welcomeMessages = [
    'english' => 'Welcome',
    'darija' => 'Mer7ba bik'
];
$personalMsg = $welcomeMessages[$language] ?? $welcomeMessages['eng'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST</title>
</head>

<body>
    <?php if (isset($message)): ?>
        <h1><?= htmlspecialchars($message) ?></h1>
    <?php endif; ?>
    <?php if (isset($_SESSION['username'])): ?>
        <p><?= $personalMsg ?>, <?= htmlspecialchars($_SESSION['username']) ?>!</p>
        <a href="?logout">Logout</a>
    <?php else: ?>
        <form method="POST">
            <h2>Login</h2>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>
            <label>
                <input type="checkbox" name="remember_me"> Remember Me
            </label><br>
            <button type="submit" name="login">Login</button>
        </form>
    <?php endif; ?>

    <form method="POST">
        <h2>Language Preference</h2>
        <label for="language">Choose Language</label>
        <select name="language" id="language">
            <option value="english" <?= $language === 'english' ? 'selected' : '' ?>>English</option>
            <option value="darija" <?= $language === 'darija' ? 'selected' : '' ?>>Darija</option>
        </select>
        <button type="submit" name="set_language">Save</button>
    </form>


</body>

</html>