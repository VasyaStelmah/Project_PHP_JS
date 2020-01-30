<?php
  //trim() функция обрезает все лишние пробелы
  $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));//Способ фильтрации содержимого
  $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
  $mess = trim(filter_var($_POST['mess'], FILTER_SANITIZE_STRING));

$error = '';
  if(strlen($username) <= 3)//strlen функция считает длину строки
    $error = 'Введите имя';
  else if(strlen($email) <= 3)
    $error = 'Введите email';
  else if(strlen($mess) <= 3)
    $error = 'Введите сообщение';

    if($error != '') {
    echo $error;
    exit();
  }
$my_email = "test@mail.ru";
//Определенная кодировка темы письма конвертирует кирилицу в правильную кодировку
$subject = "=?utf-8?B?".base64_encode("Новое сообщение с сайта")."?=";
$headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/plain; charset=utf-8\r\n";
  //функция для отправки сообщение--1--кому отправить--2--тема письма--3--Само сообщение--4--загололвки
mail($my_mail, $subject, $mess, $headers);

echo 'Готово';


 ?>
