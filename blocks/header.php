<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h3 class="my-0 mr-md-auto font-weight-normal"><a class="p-2 text-dark" href="/index.php"><img src="../img/gallery.png" class="mr-2" alt="">Photo Gallery</a></h3>

  <nav class="my-2 my-md-0 mr-md-3">
    <h3><a class="p-2 text-dark" href="/index.php">Главная</a>
      <?php
      if($_COOKIE['login'] != ''){
       ?>
    <a class="p-2 text-dark" href="/contacts.php">Контакты</a>
    <a class="p-2 text-dark" href="/inform.php">Информация</a>
    <?php
  }
     ?>
    <?php
    if($_COOKIE['login'] != '')
    echo '<a class="p-2 text-dark" href="/article.php">Добавить статью</a>';
     ?>
   </h3>
  </nav>
  <?php
  if($_COOKIE['login'] == ''):
   ?>
<h3>
    <a class="btn btn-outline-dark mr-2 mb-2" href="/auth.php">Войти</a>
    <a class="btn btn-outline-dark mb-2" href="/reg.php">Регистрация</a>
</h3>
  <?php
else:
   ?>
   <a class="btn btn-outline-dark mb-2" href="/auth.php"><h4>Кабинет пользователя</h4></a>
   <?php
 endif;
    ?>

</div>
