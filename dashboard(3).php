<?php
session_start();

if(!isset($_SESSION['loggedin'])){
  header("Location: login.php");
}
?>

<h2>Dashboard</h2>
<a href="profile.php">View Profile</a><br>
<a href="edit.php">Edit Profile</a><br>
<a href="changepass.php">Change Password</a><br>
<a href="logout.php">Logout</a>