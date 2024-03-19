<!DOCTYPE html>
<html>
  <head>
    <!-- переход на index.html -->
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>Главная</title>
  </head>
  <body>
    <header>
      <ol>
        <li><a href="index.php">Главная</a></li>
        <li><a href="magazin.php">магазин</a></li>
        <li><a href="add_product.html">добавить продукт</a></li>
        <li><a href="info.php">Инфо</a></li>
      </ol>
    </header>
    <article>
      <h3>INFO статистика</h3>
      <p>зарегистрированных пользователей:<?php
      $ip=0;
      $cname = 'root';
      $cpass = '';
  $sql = mysqli_connect('localhost',$cname,$cpass,'zak');
      $result= $sql -> query("SELECT * FROM `user`");
      while(($obr = $result->fetch_assoc()) !=false){
        $ip+=1;
      }echo $ip;
      ?></p>
      <p>выложенных продуктов:<?php
      $ip=0;
      $cname = 'root';
      $cpass = '';
  $sql = mysqli_connect('localhost',$cname,$cpass,'zak');
      $result= $sql -> query("SELECT * FROM `product`");
      while(($obr = $result->fetch_assoc()) !=false){
        $ip+=1;
      }echo $ip;
      ?></p>
      <p>опубликованно постов:<?php
      $ip=0;
      $cname = 'root';
      $cpass = '';
  $sql = mysqli_connect('localhost',$cname,$cpass,'zak');
      $result= $sql -> query("SELECT * FROM `post`");
      while(($obr = $result->fetch_assoc()) !=false){
        $ip+=1;
      }echo $ip;
      ?></p>
    </article>
    <article class="article-content" style="text-align:right; width:78%; border:none;">Сайт посвящен магазину Ливерти © 2020. Надя Селивёрстова</article>
  </body>
</html>
