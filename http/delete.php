<?php
session_start();
require_once('database.php');
$id = $_GET['id'];
$user_id = $_SESSION['user_id'];
$life = $_SESSION['life'];
$point = $_GET['point'];
$sql = "delete from todos where id = $id;";
mysqli_query($link,$sql);
$sql = "update users set life= $life + $point where id = $user_id";
mysqli_query($link, $sql);
$sql = "select life from users where id = $user_id";
$result = mysqli_fetch_assoc(mysqli_query($link, $sql));
$_SESSION['life'] = $result['life'];
echo json_encode('deleted sucessfully');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <p><?php echo "delete from todos where id = $id; update users set life=$life - $point where id = $user_id ;" ?></p>
</body>
</html>