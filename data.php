<?php 
  require_once('http/database.php');
  require_once('class/user.php');
  require_once('class/todo.php');
  require_once('time.php');
  
  
  $user_id = $_SESSION['user_id'];
  $life = $_SESSION['life'];
  $sql = "select * from todos where user_id = $user_id order by due asc";
  $result = mysqli_query($link, $sql);
  $results = array();
  while($row = mysqli_fetch_assoc($result)){
    array_push($results,$row);
  }
  $todos = array();
  $count = 1;
  foreach($results as $result){
    $name = 'todo'.$count;
    $d1 = new DateTime($result['due']);
    $d2 = new Datetime($today);
    if($d1 < $d2){
      $diff = date_diff($d1, $d2)->format('%d');
    } else{
      $diff = 0;
    }
    $$name = new Todo($result['id'],$result['content'],$result['due'],$diff);
    array_push($todos,$$name);
  }
  foreach($todos as $todo){
    if($todo->getPoint() <= 0){
      $life += $todo->getPoint();
    }
  }
  $user = new User($user_id, $_SESSION['name'], $life);
?>
