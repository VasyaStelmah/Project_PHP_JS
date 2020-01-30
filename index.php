<!DOCTYPE html>
<html lang="ru">
<head>
<?php
$website_title = 'Photo Gallery';
require 'blocks/head.php';
?>
</head>
<body>
<?php require 'blocks/header.php'; ?>
  <main class="container-fluid mt-5 ">
    <div class="row">
      <!-- <div class="col-md-8 mb-3"> -->
        <div class="col-md-8">
          <div class="container">
            <div class="row">
<?php
        $host = "localhost";
        $dbuser = "root";
        $dbpassword = "";
        $dbname = "user";
        $dbarticles = "articles";
        $connection = mysqli_connect("$host", "$dbuser", "$dbpassword", "$dbname");
        if($connection == false){
        	echo "Error!";
        	echo mysqli_connect_errno();
        	exit();
        }
        $query1 = mysqli_query($connection, "SELECT * FROM $dbarticles ORDER BY id DESC ");
        if(mysqli_num_rows($query1) == 0){
        	echo "There are no records!";
        }	else {
        while($articles = mysqli_fetch_assoc($query1)){
          echo '<div class="col-md-6">';

?>
          <div class="card-body shadow">
          <p><b>Автор статьи:</b> <mark><?=$articles['avtor']?></mark></p> <?=$articles['title'].'<br>';?>

        		<?php $show_img = base64_encode($articles['img']);
            ?>
        		<img style="width: 380px; height: 240px;" class="img-thumbnail" src="data:image/jpeg;base64, <?=$show_img ?>" alt="">
            <div class=" btn-group">
              <?php
              if($_COOKIE['login'] != ''){
                ?>
              <a href="/news.php?id=<?=$articles['id']?>">

            <button class='btn  btn-outline-secondary btn-lg shadow'>Прочитать больше</button>


          </a><br>
<?php
}
          ?>
        </div>
        <!-- d-flex justify-content-between align-items-center-->
<?php
          echo '</div></div>
          ';
            }}

?>
      </div>
      </div>
      </div>

<?php
require 'blocks/aside.php';
?>
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
