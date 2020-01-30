<?php
  //trim() функция обрезает все лишние пробелы
  $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));//Способ фильтрации содержимого
  $intro = trim(filter_var($_POST['intro'], FILTER_SANITIZE_STRING));
  $textt = trim(filter_var($_POST['textt'], FILTER_SANITIZE_STRING));


$error = '';
  if(strlen($title) <= 3)//strlen функция считает длину строки
    $error = 'Введите название статьи';
  else if(strlen($intro) <= 10)
    $error = 'Введите интро для статьи';
  else if(strlen($textt) <= 20)
    $error = 'Введите текст для статьи';


    if($error != '') {
    echo $error;
    exit();
  }


  $host = "localhost";
  $dbuser = "root";
  $dbpassword = "";
  $dbname = "user";
  $dbarticles = "articles";
  $connection = mysqli_connect("$host", "$dbuser", "$dbpassword", "$dbname");
  $cook =trim(filter_var( $_COOKIE['login'], FILTER_SANITIZE_STRING));
  $time = time();
  if(isset($_POST['upload'])){
  	$img_type = substr($_FILES['img_upload']['type'], 0, 5);
  	$img_size = 2*1024*1024;
  	if(!empty($_FILES['img_upload']['tmp_name']) and $img_type === 'image' and $_FILES['img_upload']['size'] <= $img_size){
  	$img = addslashes(file_get_contents($_FILES['img_upload']['tmp_name']));
  	$query = mysqli_query($connection, "INSERT INTO articles (title, intro, textt, date, avtor, img) VALUES ('$title', '$intro', '$textt', '$time', '$cook', '$img')");
  }

}


    echo 'Готово';
    // header ('Location: ../article.php');  // перенаправление на нужную страницу
?>
    <script>document.location.href="../article.php"</script>
