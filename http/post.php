<?php
session_start();
require_once('database.php');
require_once('../time.php');

try {
  $user_id = $_SESSION['user_id'];
  $content = filter_input(INPUT_POST, 'text');
  $due = filter_input(INPUT_POST, 'due');
  //$content = $_POST['text'];
  //$pdo->query("insert into posts (user_id,content,created_at) values (2,'$content',$date)");
  //$sql = "insert into tasks (content) values ('$content')";
  $sql = "insert into todos (user_id, content, due, created_at) values($user_id, '$content','$due','$now')";
  $message = 'hello';
  if(empty($content)){
    header("HTTP/1.1 400 content is empty");
  };
  mysqli_query($link, $sql);
  if(mysqli_error($link)){
    header("HTTP/1.1 400 there is a problem in sql state");
  }
} catch (JSONException $e) {
  header("HTTP/1.1 400 Bad Request");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <span><?php echo "insert into todos (user_id, content, due, created_at) values(2, '$content',to_date($due),to_date($now))"; ?></span>

</body>

</html>