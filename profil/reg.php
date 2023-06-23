<?php

require "../db.php";

if (isset($_SESSON['reg_user_session'])) {
  header("Location:" . $site_url . "/club/colizeum");
} else {
  $data = $_POST;
  $errorse = array();
  $tryagane = array();
  $resetpass = array();
  if (isset($data['reset_password'])) {
    if (!empty($data['mail'])){
      $user = R::findOne('users', 'mail = ?', array($data['mail']));
      if($user){
        try {
          $tryagane[] = 'Код выслан на почту проверьте её';
          $to = $data['mail'];
          $subject = 'Подтвержение Регистрации на сайте - Colizeum';
          $message = '
          <html>
          <body>
            <p>Восстановление пароля на сайте - Colizeum</p>
            <p>Ваш пароль от аккаунта - <b>'.$user->password.'</b></p>
            <p>Ссылка для авторизации - <a href="http://colizeum">Collizeum</a></p>
          </body>
          </html>
          ';
          $headers  = 'MIME-Version: 1.0' . "\r\n";
          $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
          mail ($to, $subject, $message, $headers);
        } catch (Exception $e) {
          $errorse[] =  "Сообщение не удалось отправить.";
        }
      }else{
        $errorse[] = 'Аккаунт не зарегестрирован!';
      }
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
    <form method="POST" action="reg">
      <h1><span>Восстановление доступа</span></h1>
      <div class="input-row">
        <span class="icon"><i class="bi bi-envelope"></i></span>
        <input type="mail" name="mail" placeholder="Почта" autocomplete="off"/>
      </div>
      <h1 class="error_user" style="display: <?php echo !empty($errorse) ? 'block' : 'none' ?>">Аккаунт не зарегестрирован!</h1>
      <h1 class="error_user" style="display: <?php echo !empty($tryagane) ? 'block' : 'none' ?>">Код выслан на почту проверьте её!</h1>
      <div class="submit-row">
        <input type="submit" name="reset_password" value="Восстановить Пароль &raquo;" />
        <span class="reset">или <a href="auth">Войти</a></span>
      </div>
    </form>
  </div>
</body>