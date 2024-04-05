<?php
ini_set('session.gc_divisor', 1);
ini_set('session.gc_maxlifetime', 300);
session_start();
if (empty($_SESSION['user_id'])) {
  header('Location:signIn.php');
  exit;
}
require_once('data.php');
$name = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/common.scss">
  <link rel="stylesheet" href="css/index.scss">
  <title>Document</title>
</head>

<body>
  <header>
    <a href="index.php">
      <h1>Todo</h1>
    </a>
    <form action="http/logout.php" method="delete">
      <a href="profile.php">
        <img src="img/profile.svg">
      </a>
      <span onclick="logout()" class="pointer">Log out</span>
    </form>
  </header>
  <main>
    <div class="block">
      <div id="add-form_block">
        <div id="open-btn" class="open-btn btn" onclick="openAdd()">+</div>
        <form id="add-form" class="add-form" action="http/post.php" method="post">
          <input type="text" class="text" name="text">
          <input type="date" name="due">
          <input type="submit" class="add-btn btn" value="タスクを追加" onclick="post()">
        </form>
      </div>
      <?php foreach ($todos as $todo) : ?>
        <div class="content" <?php if ($todo->getDue() < $today) echo 'style="color:crimson;"' ?>>
          <div>
            <p><?php echo $todo->getContent() ?></p>
            <p><?php echo $todo->getDue() ?> </p>
            <p><?php echo $todo->getPoint() ?></p>
          </div>
          <img src="img/pen-to-square-regular.svg" onclick="openEditor(<?php echo $todo->getId() ?>)">
          <img src="img/circle-check-regular.svg" onclick="done(<?php echo $todo->getId() ?>,<?php echo $todo->getPoint() ?>)">
        </div>
        <form method="post" action="http/edit.php" id="edit-form<?php echo $todo->getId() ?>" class="edit-form add-form">
          <input type="text" name="text" id="edit-text<?php echo $todo->getId() ?>" class="text">
          <input type="date" name="due">
          <input type="submit" value="タスクを追加" onclick="edit(<?php echo $todo->getId(); ?>)" class="btn add-btn">
          <input type="hidden" name="id" value="<?php echo $todo->getId() ?>">
        </form>
      <?php endforeach ?>
    </div>
  </main>
  <script>
    function reload() {
      location.reload();
    }

    function logout() {
      fetch('http/logout.php', {
        method: 'DELETE'
      }).then(() => {
        console.log('done')
        reload();
      })
    }
    const openBtn = document.getElementById('open-btn');
    const addForm = document.getElementById('add-form');

    function openAdd() {
      openBtn.style.display = 'none';
      addForm.style.display = 'block';
    }
    addEventListener('click', (e) => {
      if (addForm.style.display === 'block' && !e.target.closest('div#add-form_block')) {
        openBtn.style.display = 'block';
        addForm.style.display = 'none';
      }
    })

    function post() {
      event.preventDefault();
      let formData = new FormData(document.getElementById('add-form'));
      fetch('http/post.php', {
        method: 'POST',
        body: formData,
      }).then((res) => {
        if (!res.ok) {
          throw new Error(res.statusText);
        }
        reload()
        console.log('ok');
      }).catch((error) => {
        console.log('エラーが発生しました', error);
        console.log(error.message)
      })
    };

    function openEditor(id) {
      let editForm = document.getElementById(`edit-form${id}`);
      if (editForm.style.display === 'none' || editForm.style.display === '') {
        editForm.style.display = 'block';
      } else {
        editForm.style.display = 'none'
      }
    }
    // addEventListener('click', (e) => {
    //   if (addForm.style.display === 'block' && !e.target.closest('div#add-form_block')) {
    //   }
    // })

    function edit(id) {
      event.preventDefault();
      let editData = new FormData(document.getElementById(`edit-form${id}`));
      fetch(`http/edit.php`, {
        method: 'POST',
        body: editData
      }).then(() => {
        reload();
      }).catch((error) => {
        console.log('error')
        console.log(error)
      })
    };

    function done(id, point) {
      fetch(`http/delete.php?id=${id}&point=${point}`, {
        method: 'delete',
      }).then((response) => {
        reload();
      })
    };
  </script>
  <script>

  </script>
</body>

</html>