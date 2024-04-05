<?php 
  $host = 'localhost';
  $database = 'php_todo';
  $user = 'root';
  $password = 'shinta0327';
  //$pdo = new PDO("mysql:host=localhost;dbname={$database}",$user,$password);
  $link = mysqli_connect($host,$user,$password,$database);
?>