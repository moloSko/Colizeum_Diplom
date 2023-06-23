<?php
require "db.php";

if (isset($_SESSION['reg_user_session'])) {
  header("Location:" . $site_url . "club/colizeum");
} else {
  header("Location:" . $site_url . "profil/auth");
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="/image/logo.ico" type="img/x-icon">
  <title>Colizeum</title>
</head>

</html>