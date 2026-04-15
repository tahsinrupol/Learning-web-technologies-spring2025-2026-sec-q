<?php
session_start();
?>

<form method="post">
  Name: <input type="text" name="name"><br>
  Email: <input type="email" name="email"><br>
  Password: <input type="password" name="password"><br>
  <input type="submit" name="register" value="Register">
</form>

<?php
if(isset($_POST['register'])){
  $_SESSION['user'] = [
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'password' => $_POST['password']
  ];
  echo "Registered! <a href='login.php'>Login</a>";
}
?>