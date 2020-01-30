<?php
// session_start();
require 'connection.php';
// $idi = $_SESSION['id'];
// $idi = $_GET['id'];
$id_article = $_POST['id_article'];
echo $id_article = $_POST['id_article'];
// echo $idi = $_SESSION['id'];
$idi = $_COOKIE['login'] ;
echo $idi = $_COOKIE['login'] ;


// $sql = 'SELECT *
//         FROM $usertable
//         WHERE PartNumber = $partid';
//
//     $result = mysqli_query($con, $sql);
//     $row = mysqli_fetch_assoc($result);


if($_POST['like'])
{
  if($idi=='')
  {
    echo "<html><head><meta http-equiv='Refresh' content='0; URL=/news.php?id=$id_article'></head></html>";
  }
    else {
            $q = mysqli_query($connection, "SELECT * FROM likes WHERE login_user='$idi' AND id_article=$id_article");
            $r = mysqli_fetch_assoc($q);
            // $q = mysql_query("SELECT * FROM likes WHERE id_user='$id' AND id_article='$id_article'", $db);
            // $r = mysql_fetch_array($q);
            if(($r['id']) == 0 OR $q == false)
              {
                  $q2 = mysqli_query($connection, "INSERT INTO likes SET login_user = '$idi',  id_article=$id_article");
                  // $q2 = mysql_query("INSERT INTO likes SET id_user = '$id',  id_article='$id_article' ", $db);
                  if($q2 == true)
                  {
                    echo "<html><head><meta http-equiv='Refresh' content='0; URL=/news.php?id=$id_article'></head></html>";
                  }

              }
            else {
                  echo "<html><head><meta http-equiv='Refresh' content='0; URL=/news.php?id=$id_article'></head></html>";
                  }
          }

}

if($_POST['dislike'])
{
  if($idi=='')
  {
    echo "<html><head><meta http-equiv='Refresh' content='0; URL=/news.php?id=$id_article'></head></html>";
  }
      else {
              $q = mysqli_query($connection, "SELECT * FROM likes WHERE login_user = '$idi' AND id_article=$id_article");
              $r = mysqli_fetch_assoc($q);
              if(($r['id']) == 1 OR $q == true)
              {
                    $q2 = mysqli_query($connection, "DELETE FROM likes WHERE login_user = '$idi' AND id_article=$id_article ");
                    if($q2 == true)
                    {
                      echo "<html><head><meta http-equiv='Refresh' content='0; URL=/news.php?id=$id_article'></head></html>";
                    }

              }
              else {
                    echo "<html><head><meta http-equiv='Refresh' content='0; URL=/news.php?id=$id_article'></head></html>";
                    }
            }
}
?>

<!-- <script>document.location.href="news.php"</script> -->
