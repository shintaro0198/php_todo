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
    <a href="signIn.php">
      <p class="pointer">Sign in</p>
    </a>
  </header>
  <main>
    <div class="block">
      <form method="post" id="register-form" action="http/register.php">
        <h2>Sign up</h2>
        <input type="text" name="user-name" placeholder="name" id="form-name">
        <input type="email" name="email" placeholder="email" id="form-email">
        <input type="password" name="password" placeholder="password" id="form-password">
        <input type="submit" value="Sign up" class="btn" onclick="signUp()">
      </form>
    </div>
  </main>
  <script charset="utf-8">
    const registerForm = document.getElementById('register-form');
    const errorMessage = document.createElement('p');
    errorMessage.style = 'color : crimson'

    function signUp() {
      event.preventDefault();
      if (errorMessage.innerHTML !== '') {
        errorMessage.innerHTML = '';
      }
      let formData = new FormData(registerForm);
      fetch('http/register.php', {
        method: 'POST',
        body: formData
      }).then((res) => {
        if (!res.ok) {
          throw new Error(res.statusText);
        }
        window.location.href = 'index.php';
      }).catch((error) => {
        console.log(error.message);
        errorMessage.innerHTML = error.message;
        if (error.message.indexOf('name') !== -1) {
          registerForm.insertBefore(errorMessage, document.getElementById('form-name'))
          console.log('name');
          console.log(error.message.indexOf('name'))
        } else if (error.message.indexOf('email') !== -1) {
          registerForm.insertBefore(errorMessage, document.getElementById('form-email'))
          console.log('email');
        } else if (error.message.indexOf('password') !== -1) {
          registerForm.insertBefore(errorMessage, document.getElementById('form-password'))
          console.log('password');
        }
      })
    }
  </script>
</body>

</html>