<?php
//переменные нужны для подключение к бд
$cname="root";
$cpass="";

//form
$title = $_POST['title'];
$content = $_POST['content'];
$img     = $_POST['path_photo'];
$buy     = $_POST['buy'];
// echo $product,$content,$img,$buy;

// подключаемся
$link = mysqli_connect('localhost',$cname,$cpass,'zak');
$pr_nick= $link -> query("SELECT * FROM `product` WHERE `title` = '$title'");
$obr = $pr_nick-> fetch_assoc();
if ($obr != null){
  echo "<div id='block'>такое имя продукта уже существует
  <br>
  <a href='add_product.html'>назад</a></div>";
  $link ->close();
;
}else{

$suc = $link->query("INSERT INTO `product` (`id`, `title`, `content`, `src`, `buy`, `reg_time`) VALUES (NULL, '$title', '$content', '$img', '$buy', CURRENT_TIMESTAMP)");
$link -> close();
header("LOCATION:magazin.php");
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
