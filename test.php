<!-- require_once('database.php');
session_start();
$id = filter_input(INPUT_POST, 'id');
$content = filter_input(INPUT_POST, 'text');
$due = filter_input(INPUT_POST, 'due');
$user_id = $_SESSION['user_id'];
$sql = "update todos set content = '$content', due = '$due' where id = $id";
mysqli_query($link, $sql);
$sql = "select life from users where id = $user_id";
$result = mysqli_fetch_assoc(mysqli_query($link, $sql));
$_SESSION['life'] = $result;
require_once('../data.php'); -->