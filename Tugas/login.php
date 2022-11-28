<?php
if (isset($_POST["submit"])) {
  if ($_POST["username"] == "admin" && $_POST["password"] == "123") {
    header("Location: admin.php");
    exit;
  } else {
    $error = true;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<style>
  body {
    background-color: #eaeaea;
  }

  .title {
    margin-top: 150px;
    margin-bottom: 35px;
    text-align: center;

  }

  .box {
    position: fixed;
    width: 700px;
    height: px;
    text-align: center;
    margin-left: 350px;
    background-color: white;

  }

  .form {
    margin-bottom: 40px;
    margin-top: 40px;
    margin-left: 50px;
    margin-right: 50px;
    word-spacing: 1em;



  }

  .keterangan {
    margin-top: 27px;


  }

  .login {
    margin-top: 15px;
    margin-bottom: 20px;
  }
</style>

<head>
  <title>Login</title>
</head>

<body>
  <h1 class="title">Login</h1>
  <div class="box">
    <form action="" method="post">
      <div class="form">
        <label for="username">Username </label>
        <input type="text" name="username" id="username">
      </div>
      <div class="form">
        <label for="password">Password </label>
        <input type="password" name="password" id="password">
      </div>
      <div class="keterangan">
        <?php if (isset($error)) : ?>
          <p>Username atau Password salah!!</p>
        <?php endif; ?>
      </div>
      <div class="login">
        <button type="submit" name="submit">Log in</button>
      </div>
    </form>


</body>

</html>