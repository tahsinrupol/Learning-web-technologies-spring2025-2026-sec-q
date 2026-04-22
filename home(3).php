<?php
session_start();

// check login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}


if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ["name" => "Laptop", "price" => 500],
        ["name" => "Phone", "price" => 300]
    ];
}

$user = $_SESSION['user'];
?>

<h2>Welcome <?php echo $user['username']; ?></h2>
<a href="logout.php">Logout</a>

<h3>Products</h3>

<?php foreach ($_SESSION['products'] as $i => $p): ?>
<form method="post">
    <?php echo $p['name']; ?> - $<?php echo $p['price']; ?>

    <?php if ($user['role'] == "customer"): ?>
        <input type="text" name="name" placeholder="New name">
        <input type="number" name="price" placeholder="New price">
        <button name="edit" value="<?php echo $i; ?>">Edit</button>
    <?php endif; ?>

    <?php if ($user['role'] == "admin"): ?>
        <button name="delete" value="<?php echo $i; ?>">Delete</button>
    <?php endif; ?>
</form>
<?php endforeach; ?>

<?php
// edit
if (isset($_POST['edit'])) {
    $i = $_POST['edit'];
    $_SESSION['products'][$i]['name'] = $_POST['name'];
    $_SESSION['products'][$i]['price'] = $_POST['price'];
    header("Location: home.php");
    exit();
}

// delete
if (isset($_POST['delete'])) {
    $i = $_POST['delete'];
    array_splice($_SESSION['products'], $i, 1);
    header("Location: home.php");
    exit();
}
?>

<?php if ($user['role'] == "admin"): ?>
<br><a href="admin.php">Add Product</a>
<?php endif; ?>