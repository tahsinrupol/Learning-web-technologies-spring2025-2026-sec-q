<?php
session_start();


if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [
        ["username" => "admin", "password" => "1234", "role" => "admin"]
    ];
}

if (isset($_POST['submit'])) {

    $u = $_POST['username'];
    $p = $_POST['password'];

    foreach ($_SESSION['users'] as $user) {
        if ($user['username'] == $u && $user['password'] == $p) {
            $_SESSION['user'] = $user;
            header("Location: home.php");
            exit();
        }
    }

    echo "Wrong username or password";
}
?>

<form method="post">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <button type="submit" name="submit">Login</button>
</form>