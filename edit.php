<?php
session_start();
?>

<form method="post">
  Name: <input type="text" name="name"><br>
  Email: <input type="email" name="email"><br>
  <input type="submit" name="update" value="Update">
</form>

<?php
if(isset($_POST['update'])){
  $_SESSION['user']['name'] = $_POST['name'];
  $_SESSION['user']['email'] = $_POST['email'];
  echo "Updated! <a href='profile.php'>Go Profile</a>";
}
?>