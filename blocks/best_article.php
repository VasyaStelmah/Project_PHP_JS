<?php
require 'connection.php';
$query3 = mysqli_query($connection, " SELECT id_article, COUNT(*) FROM `likes` GROUP BY id_article ORDER BY `COUNT(*)` DESC LIMIT 1");
// SELECT id_article, COUNT(*) FROM `likes` GROUP BY id_article LIMIT 1
$result = mysqli_fetch_assoc($query3);
$id_article1 = $result['id_article'];
$query11 = mysqli_query($connection, "SELECT * FROM $dbarticles WHERE id = '$id_article1' ");
if(mysqli_num_rows($query11) == 0){
  echo "There are no records!";
}	else {
$articles1 = mysqli_fetch_assoc($query11);
}
?>
