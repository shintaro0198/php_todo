<?php
require_once('database.php');
require_once('../time.php');
$userName = filter_input(INPUT_POST, 'user-name');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
if (empty($userName)) {
  header("HTTP/1.1 400 enter user name");
  exit;
} else if(empty($email)){
  header("HTTP/1.1 400 enter email");
  exit;
} else if(empty($password)){
  header("HTTP/1.1 400 enter password");
  exit;
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  header("HTTP/1.1 400 invalid email adress");
  header("Content-Type: application/json; charset=utf-8");
  exit;
}
$sql = "select * from users where email = '$email' limit 1;";
$result = mysqli_fetch_assoc(mysqli_query($link, $sql));
if(!empty($result)){
  header("HTTP/1.1 400 your email is already registered");
  exit;
}
if (!preg_match("/\A(?=.*?[A-z])(?=.*?\d)[A-z\d]{6,20}+\z/", $password)) {
  header("HTTP/1.1 400 6 digits or more and 20 digits or less on password");
  exit;
}
$sql = "insert into users (name, email, password, life, created_at) values ('$userName', '$email', '$hashedPassword', 20,'$now')";
mysqli_query($link, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <p><?php echo $userName ?></p>
  <p><?php echo $email ?></p>
  <p><?php echo $hashedPassword ?></p>
  <p><?php echo "insert into users (name, email, password, life, created_at) values ('$userName', '$email', '$hashedPassword', 20,'$now')" ?></p>
</body>

</html>
