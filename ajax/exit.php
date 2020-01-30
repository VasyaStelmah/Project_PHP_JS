<?php
  setcookie('login', "", time() - 3600 * 24 * 30, "/");//Удаляется элемент с куки
  unset($_COOKIE['login']);//удаляет какой-либо элемент
  echo true;
 ?>
