<?php
//переменные нужны для подключение к бд
$cname="root";
$cpass="";

$nick = $_POST['nick'];
$password = $_POST['password'];
// print_r($_POST);

$link = mysqli_connect('localhost',$cname,$cpass,'zak');

//поиск
$pr_nick= $link -> query("SELECT * FROM `user` WHERE `nick` = '$nick' AND `password` = '$password'");
$obr = $pr_nick-> fetch_assoc();
if ($obr != null){
  $link->close();
  setcookie('nick',$nick);
  setcookie('email',$obr['email']);
  setcookie('reg_time',$obr['reg_time']);
  header('LOCATION:index.html');

}else{
  $link->close();
  echo "<div id='block'>неправильный логин или пароль
  <br>
  <a href='reg.php'>назад</a></div>";
}
?>
<style>
  #block{
    width:40%;
    height:100px;
    margin-top:15%;
    margin-left:30%;
    background: #857658;
    text-align: center;
    padding-top: 5%;
  }
</style>
