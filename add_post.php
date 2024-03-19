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

$title = $_POST['title'];
$content=$_POST['content'];
$src =$_POST['src'];
$aftor = $_COOKIE['nick'];
// print_r($_POST);

$link = mysqli_connect('localhost',$cname,$cpass,'zak');


//проверка на дубликат в БД пользьзователя
$pr_nick= $link -> query("SELECT * FROM `post` WHERE `title` = '$title'");
$obr = $pr_nick-> fetch_assoc();
if ($obr != null){
  echo "<div id='block'>такой пост уже существует
  <br>
  <a href='reg.html'>назад</a></div>";
}else{
  //INSERT INTO `post` (`id`, `title`, `content`, `src`, `aftor`, `reg_time`) VALUES (NULL, '2', '2', '2', '2', 'current_timestamp(6).000000')
  $link->query("INSERT INTO `post` (`id`, `title`, `content`, `src`, `aftor`,`comment`, `reg_time`) VALUES (NULL, '$title', '$content', '$src', '$aftor','', current_timestamp)");
  $link->close();
  echo "<div id='block'>вы выложили пост
  <br>
  <a href='reg.html'>назад</a></div>";
}
?>
