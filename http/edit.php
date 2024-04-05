<?php 
require_once('database.php');
$id = filter_input(INPUT_POST,'id');
$content = filter_input(INPUT_POST,'text');
$due = filter_input(INPUT_POST,'due');
//$content = filter_input(INPUT_POST,'editText');
$sql = "update todos set content = '$content', due = '$due' where id = $id";
mysqli_query($link,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php echo "update todos set content = '$content' where id = $id" ?>
</body>
</html>