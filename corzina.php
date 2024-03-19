<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>Магазин</title>
  </head>
  <body>
    <header>
      <ol>
        <li><a href="index.php">Главная</a></li>
        <li><a href="add_product.html">добавить товар</a></li>
        <li><a href="corzina.php">корзина</a></li>
        <li><a href="path_profile.html">Инфо</a></li>
      </ol>
    </header>
    <?php
    // id
    // name
    // content
    // buy
    //reg_time
    $acc = isset($_COOKIE['nick']);
    if($acc == true){
      $cname="root";
      $cpass="";
      $sql = mysqli_connect('localhost',$cname,$cpass,'zak');
    $nick = $_COOKIE['nick'];
    $pr_nick= $sql -> query("SELECT * FROM `user` WHERE `nick` = '$nick'");
    $obr_user = $pr_nick-> fetch_assoc();
    $catal = $obr_user['catalog'];
    //echo $catal; == 11;
    // echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
    $catal = preg_split('/ /',$catal);
    // print_r($catal);
    $i =  count($catal)-2;
    // echo $i;
    while($i!=-1){
      $cash = $catal[$i];
      $result_catal = $sql -> query("SELECT * FROM `product` WHERE `id` = '$cash'");
      $obr = $result_catal->fetch_assoc();
      echo'<article style="min-height:200px;padding-top:50px;"><center>
       <img style="width:150px;" src="img/'. $obr['src'] .'">
       <br>название<br>
       '. $obr['title'] ."<br>описание<br>". $obr['content'] ."<br>стоимость<br>". $obr['buy'].'</center></article>';
      $i-=1;
    }
    // $result_catal = $sql -> query("SELECT * FROM `product` WHERE `id` = '$catal'");
    // while(($obr = $result_catal->fetch_assoc())!=false){echo'<article><p>'. $obr['name_product'] .'</p>'. $obr['content'] .'</article>';}
    // // while(($obr = $result->fetch_assoc()) !=false){
    $sql->close();
    }else{echo "<article>зайдите в свой профиль!<article>";}
    ?>
    <article class="article-content" style="text-align:right; width:78%; border:none;">Сайт посвящен магазину Ливерти © 2020. Надя Селивёрстова</article>
  </body>
</html>
