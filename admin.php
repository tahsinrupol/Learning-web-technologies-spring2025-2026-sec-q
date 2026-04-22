<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != "admin") {
    header("Location: home.php");
    exit();
}


if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}

if (isset($_POST['submit'])) {
    $new = [
        "name" => $_POST['name'],
        "price" => $_POST['price']
    ];

    $_SESSION['products'][] = $new;

    header("Location: home.php");
    exit();
}
?>

<h2>Add Product</h2>

<form method="post">
    Name: <input type="text" name="name"><br>
    Price: <input type="number" name="price"><br>
    <button type="submit" name="submit">Add</button>
</form>