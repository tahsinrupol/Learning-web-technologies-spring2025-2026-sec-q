<?php
session_start();
?>

<form method="post">
  New Password: <input type="password" name="newpass"><br>
  <input type="submit" name="change" value="Change Password">
</form>

<?php
if(isset($_POST['change'])){
  $_SESSION['user']['password'] = $_POST['newpass'];
  echo "Password Changed!";
}
?>