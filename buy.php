<?php
$cname="root";
$cpass="";
$link = mysqli_connect('localhost',$cname,$cpass,'zak');
$nick = $_COOKIE['nick'];
$catal= $_POST['catal'];
$catal= $catal." ";
// echo $catal;
$result= $link -> query("SELECT * FROM `user` WHERE `nick` = '$nick'");
if($result == true){
  $obr = $result-> fetch_assoc();
  //$result= $sql -> query("UPDATE `post` SET `comment_post` = CONCAT(`comment_post`,'$commit') WHERE `post`.`name_post` = '$np' ");
  $suc = $link->query("UPDATE `user` SET `catalog` = CONCAT(`catalog`,'$catal') WHERE `user`.`nick` = '$nick';");
  $link->close();
  $test = $_POST['buy'];
  header("LOCATION:magazin.php");
}else{
  header("LOCATION:reg.html");
}
?>
