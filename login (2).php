<?php
session_start();
?>

<form method="post">
  Email: <input type="email" name="email"><br>
  Password: <input type="password" name="password"><br>
  <input type="submit" name="login" value="Login">
</form>

<?php
if(isset($_POST['login'])){
  if($_POST['email'] == $_SESSION['user']['email'] &&
     $_POST['password'] == $_SESSION['user']['password']){

    $_SESSION['loggedin'] = true;
    header("Location: dashboard.php");
  } else {
    echo "Wrong login!";
  }
}
?>