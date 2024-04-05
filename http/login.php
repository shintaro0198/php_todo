<?php
session_start();

require_once('database.php');
$email = filter_input(INPUT_POST,'email');
$password = filter_input(INPUT_POST,'password');
$sql = "select * from users where email = '$email'";
$result = mysqli_fetch_assoc(mysqli_query($link,$sql)); 
if(password_verify($password,$result['password'])){
  $_SESSION['user_id'] = $result['id'];
  $_SESSION['name'] = $result['name'];
  $_SESSION['life'] = $result['life'];
}

//$_SESSION['user'] = new User($result['id'],$result['name']);
// $name = $result['name'];
// $user = new User($result['id'],$result['name']);
// ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <p><?php echo $_SESSION['id']; echo $_SESSION['name'] ?></p>

</body>
</html>