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
?>
