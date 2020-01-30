
<?php
require 'best_article.php';?>
<aside class="col-md-4 position-sticky">
<div class="sticky-top  ">

                  <div class="sticky-top bg-light shadow">
                    <!-- p-3 m-3 bg-warning rounded -->
                                  <div  >
                                    <h4><b>Статья получившая больше всего лайков</b></h4>
                                                    <div class="col-md-6 ">
                                                      <p><b>Автор статьи:</b> <mark><?=$articles1['avtor']?></mark></p> <?=$articles1['title'].'<br>';?>
                                                    </div>


                                </div>
                  <?php $show_img = base64_encode($articles1['img']);
                  ?>
                  <img style="width: 400px; max-height: 600px;" class="img-thumbnail " src="data:image/jpeg;base64, <?=$show_img ?>" alt="">

                  </div>
                  <div class=" btn-group">
                    <?php
                    if($_COOKIE['login'] != ''){
                      ?>
                    <a href="/news.php?id=<?=$articles1['id']?>">

                  <button class='btn  btn-outline-secondary btn-lg ' >Прочитать больше</button>
                  </a><br>
                  <?php
                  }
                  ?>
                </div>
</div>
</aside>
<?php
// require 'connection.php';
// $query3 = mysqli_query($connection, "SELECT id_article, COUNT(*) FROM `likes` GROUP BY id_article DESC LIMIT 1 ");
// $result = mysqli_fetch_assoc($query3);
// echo $result['id_article'];
?>
