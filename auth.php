<!DOCTYPE html>
<html lang="ru">
<head>
<?php $website_title = 'Авторизация на сайте';
require 'blocks/head.php'; ?>
</head>
<body>
<?php require 'blocks/header.php'; ?>
  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <?php
        if($_COOKIE['login'] == ''):
         ?>
        <h4>Форма авторизации<h4>
        <form action="" method="post">

          <label for="login">Login</label>
          <input type="text" name="login" id="login" class="form-control">

          <label for="pass">Пароль</label>
          <input type="password" name="pass" id="pass" class="form-control">

          <div class="alert alert-danger mt-2" id="errorBlock"></div>

          <button type="button" id="auth_user" class="btn btn-success mt-3">
            Войти
          </button>
        </form>
        <?php
      else:
        require 'connection.php';
        $avtor_cookie = $_COOKIE['login'];
        $query4 = mysqli_query($connection, " SELECT avtor, COUNT(*) FROM `articles` WHERE avtor = '$avtor_cookie' ORDER BY `COUNT(*)` DESC ");
        $result1 = mysqli_fetch_assoc($query4);
        $avtor2 = $result1['COUNT(*)'];


         ?>
         <h2><?=$_COOKIE['login'] ?></h2>
         <p>Количество статей: <?php echo $avtor2;  ?></p>


         <button class="btn btn-danger" id="exit_btn">Выйти</button>
        <?php
        endif;
         ?>

      </div>
<?php require 'blocks/aside.php';?>
      </div>
    </main>
<?php require 'blocks/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$('#exit_btn').click(function () {//при нажатии на кнопку в режиме асинхронности
 var login = $('#login').val();
 var pass = $('#pass').val();

 $.ajax({
   url: 'ajax/exit.php',  //тот файлик по которому будет выполняться скрипт
   type: 'POST',
   cache: false,
   data: {},
   dataType: 'html',
   success: function(data) {
         document.location.reload(true);
    }
 });
});

   $('#auth_user').click(function () {//при нажатии на кнопку в режиме асинхронности
    var login = $('#login').val();
    var pass = $('#pass').val();

    $.ajax({
      url: 'ajax/auth.php',  //тот файлик по которому будет выполняться скрипт
      type: 'POST',
      cache: false,
      data: {'login' : login, 'pass' : pass},
      dataType: 'html',
      success: function(data) {
          if(data == 'Готово') {
            $('#auth_user').text('Все готово');
            $('#errorBlock').hide();
            document.location.reload(true);
          } else {
              $('#errorBlock').show();
              $('#errorBlock').text(data);
            }
      }
    });
   });
</script>

</body>
</html>
