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

<?php
//переменные нужны для подключение к бд
$cname="root";
$cpass="";

$nick = $_POST['nick'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$email = $_POST['email'];
// print_r($_POST);

$link = mysqli_connect('localhost',$cname,$cpass,'zak');

if($password != $password2){
  echo "<div id='block'>вы неправильно ввели повторный пароль
  <br>
  <a href='reg.html'>назад</a></div>";
  exit;
}


//проверка на дубликат в БД пользьзователя
$pr_nick= $link -> query("SELECT * FROM `user` WHERE `nick` = '$nick'");
$obr = $pr_nick-> fetch_assoc();
if ($obr != null){
  echo "<div id='block'>такой пользователь уже существует
  <br>
  <a href='reg.html'>назад</a></div>";
}else{
  $link->query("INSERT INTO `user` (`id`, `nick`, `password`, `email`, `catalog`, `reg_time`) VALUES (NULL, '$nick', '$password', '$email', '',current_timestamp)");
  $link->close();
  echo "<div id='block'>вы заригистрированы
  <br>
  <a href='reg.html'>назад</a></div>";
}
?>
