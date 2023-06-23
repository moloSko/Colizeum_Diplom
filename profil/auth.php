<?php

require "../db.php";

if (isset($_SESSION['reg_user_session'])) {
  header("Location:" . $site_url . "/club/colizeum");
} else {
  $data = $_POST;
  if (isset($data['up_login'])) {
    $errorse = array();
    $user = R::findOne('users', 'login = ?', array($data['logine']));
    if ($user) {
      if ($data['lopass'] == $user->password) {
        $user->join_date = date('Y-m-d');
        R::store($user);
        $_SESSION['reg_user_session'] = $user;
        header("Location:" . $site_url . "/club/colizeum");
      } else {
        $errorse[] = 'Пароль неверный';
      }
    } else {
      $errorse[] = 'Пользователь не найден';
    }
    if (!empty($errorse)) {
      //echo (array_shift($errorse));
    }
  }
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="../image/logo.ico" type="img/x-icon">
  <link rel="icon" href="../image/logo.ico" type="image/x-icon">
  <title>Colizeum</title>
  <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.2/normalize.css" />
</head>

<body>
  <div class="colizeum-top">
    <a href="../index">Главная Colizeum</a>
    <div class="clr"></div>
  </div>

  <div class="login-wrapper">
    <form method="POST" action="auth">
      <h1><span>Войти в Colizeum</span></h1>
      <div class="input-row">
        <span class="icon"><i class="bi bi-hypnotize"></i></span>
        <input type="text" name="logine" placeholder="Логин" autocomplete="off" />
      </div>
      <div class="input-row">
        <span class="icon"><i class="bi bi-lock-fill"></i></span>
        <input type="password" name="lopass" placeholder="Пароль" autocomplete="off" />
      </div>
      <h1 class="error_user" style="display: <?php echo !empty($errorse) ? 'block' : 'none' ?>">Неправильный логин или пароль!</h1>
      <div class="submit-row">
        <input type="submit" name="up_login" value="Вход &raquo;" />
        <span class="reset">или <a href="reg">Восстановить пароль</a></span>
      </div>
    </form>
  </div>
</body>

</html>