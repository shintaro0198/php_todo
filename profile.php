<?php
session_start();
if (empty($_SESSION['user_id'])) {
  header('Location:signIn.php');
  exit;
}
require_once('data.php');
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/common.scss">
  <link rel="stylesheet" href="css/profile.scss">
  <title>Document</title>
</head>

<body>
  <header>
    <a href="index.php">
      <h1>Todo</h1>
    </a>
    <form action="http/logout.php" method="delete">
      <span onclick="logout()" class="pointer">Log out</span>
    </form>
  </header>
  <main>
    <h2><?php echo $user->getName() ?></h2>
    <h1>残りライフ</h1>
    <p><?php echo $user->getLife() ?></p>
    <?php if ($user->getLife() >= 15): ?>
      <p>いい調子</p>
    <?php elseif ($user->getLife() >= 0): ?>
      <p>当日に終わらせる</p>
    <?php else: ?>
      <p>しっかりしろ、甘えるな</p>
    <?php endif ?>
  </main>
  <script>
    function logout() {
      fetch('http/logout.php', {
        method: 'DELETE'
      }).then(() => {
        console.log('done')
        location.reload()
      })
    }
  </script>
</body>

</html>