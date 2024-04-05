<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/common.scss">
  <link rel="stylesheet" href="css/signup.scss">
  <title>Document</title>
</head>

<body>
  <header>
    <h1>Todo</h1>
    <a href="signUp.php">
      <p class="pointer">Sign up</p>
    </a>
  </header>
  <main>
    <div class="block">
      <form method="post" id="login-form" action="http/login.php">
        <h2>Sign in</h2>
        <input type="email" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <input type="submit" value="Sign in" class="btn" onclick="signIn()">
      </form>
    </div>
  </main>
  <script>
    function signIn(){
      event.preventDefault();
      let formData = new FormData(document.getElementById('login-form'));
      fetch('http/login.php',{
        method : 'POST',
        body : formData,
      }).then((res)=>{
        if(res.ok){
          window.location.href = 'index.php'
        }
      })
    }
  </script>
</body>

</html>