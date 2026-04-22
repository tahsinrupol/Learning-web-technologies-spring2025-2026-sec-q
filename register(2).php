<?php
session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [
        ["username" => "admin", "password" => "1234", "role" => "admin"]
    ];
}

if (isset($_POST['submit'])) {

    $user = [
        "username" => $_POST['username'],
        "password" => $_POST['password'],
        "role" => "customer"
    ];

    $_SESSION['users'][] = $user;

    echo "Registered! <a href='login.php'>Login</a>";
}
?>

<form method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit" name="submit">Register</button>
</form>