<!DOCTYPE html>
<html lang="ru">
<head>
<?php
//Получить название стаьи из базы данных
require_once 'mysql_connect.php';

$sql = 'SELECT * FROM `articles` WHERE `id` =:id';
//$id = $_GET['id'];
$query = $pdo->prepare($sql);//подготовка запроса
$query->execute(['id' => $_GET['id']]);//Сам запрос к базе данных

$article = $query->fetch(PDO::FETCH_OBJ);
$website_title = $article->title;


//$website_title = 'Kitten blog';
require 'blocks/head.php';
?>
</head>
<body>
<?php require 'blocks/header.php'; ?>
  <main class="container-fluid mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <div class="jumbotron">
          <h1><?=$article->title?></h1>
          <p><b>Автор статьи:</b> <mark><?=$article->avtor?></mark></p>
          <?php
          //echo date("H:i:s", $article->date);Выводт время создание статьи
          $date = date('d ', $article->date);
          $array = ["Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля", "Августа", "Сентября",
          "Октября", "Ноября", "Декабря"];
          $date .= $array[date('n', $article->date) - 1];
          $date .= date('H:i', $article->date);
           ?>
           <p><b>Время публикации:</b> <u><?=$date?></u></p>
          <p>
            <?=$article->intro?>
            <br><br>
            <?=$article->textt?>

          </p>





          <?php
          require 'connection.php';
          $idi = $_GET['id'];
          $query1 = mysqli_query($connection, "SELECT img FROM articles WHERE id = $idi ");

          $articles = mysqli_fetch_assoc($query1);
          $show_img = base64_encode($articles['img']);
          ?>
          <img style="width: 100%; height: 100%;" class="img-thumbnail" src="data:image/jpeg;base64, <?=$show_img  ?>" alt="">

          <?php
          require 'connection.php';
          $q2 = mysqli_query($connection, "SELECT * FROM likes WHERE  id_article = $idi");
          $counter = 0;
            while($res = mysqli_fetch_assoc($q2))
          {
            if($res['id']) $counter++;
          }
          ?>
          <div> Количество лайков  <?=$counter?> </div>
          <form class="btn btn-group " action="like.php" method="post">
              <input type="hidden" name="id_article" value="<?php echo $idi;?>">
              <input  style="background: url(img/like.png) no-repeat; border-radius: 35px; height: 68px; width: 68px;" type="submit" name="like" value="Like">
              <input style="background: url(img/dislike.png) no-repeat; border-radius: 35px; height: 68px; width: 68px; margin-left: 15px;" type="submit" name="dislike" value="Dislike">

          </form>




        </div>

        <h3 class="mt-5">Комментарии</h3>
        <form action="/news.php?id=<?=$_GET['id']?>" method="post">
          <label for="username">Ваше имя</label>
          <input type="text" name="username" value="<?=$_COOKIE['login']?>" id="username" class="form-control">


          <label for="mess">Сообщение</label>
          <textarea name="mess" id="mess" class="form-control"></textarea>

          <button type="submit" id="mess_send" class="btn btn-success mt-3 mb-5">
            Добавить коментарий
          </button>
        </form>
        <?php
            if($_POST['username'] != '' && $_POST['mess'] != '') {
              $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));//Способ фильтрации содержимого
              $mess = trim(filter_var($_POST['mess'], FILTER_SANITIZE_STRING));

              $sql = 'INSERT INTO comments(name, mess, article_id) VALUES(?, ?, ?)';
              $query = $pdo->prepare($sql);
              $query->execute([$username, $mess, $_GET['id']]);
            }

            $sql = 'SELECT * FROM `comments` WHERE `article_id` = :id ORDER BY `id` DESC';
            $query = $pdo->prepare($sql);
            $query->execute(['id' => $_GET['id']]);

             $comments = $query->fetchAll(PDO::FETCH_OBJ);

             foreach ($comments as $comment) {
               echo "<div class='alert alert-info '>
                 <h4>$comment->name</h4>
                 <p>$comment->mess</p>
               </div>";
             }
        ?>


      </div>
<?php require 'blocks/aside.php';?>
      </div>
    </main>
    <footer class="footer bg-light">
      <div class="container ">
        <div class="row">
          <div class="col-md-6">
            <span class="text-muted ">Витебск, 2020 год</span>
          </div>
          <div class="col-md-6 img">
            <a href="https://vk.com/"><img class="mr-2" src="img/vk.png"  width="45px" height="45px" alt=""></a>
            <a href="https://www.instagram.com/"><img class="mr-2" src="img/inst.png" width="45px" height="45px"  alt="">
            <a href="https://www.facebook.com/"><img class="mr-2" src="img/fb.png" width="45px" height="45px"  alt="">
          </div>

        </div>
      </div>
    </footer>
</body>
</html>
