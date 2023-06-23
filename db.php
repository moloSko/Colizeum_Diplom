<?php

require "reddb/rb.php";

R::setup(
  'mysql:host=ip;dbname=nameБД',
  'Логин',
  'Пароль'
);

if (!R::testConnection()) die('Нет подключения в БД!');

session_start();
