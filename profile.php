<?php
session_start();
?>

<h3>Profile</h3>
Name: <?php echo $_SESSION['user']['name']; ?><br>
Email: <?php echo $_SESSION['user']['email']; ?><br>