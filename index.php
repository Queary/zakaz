<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>Ливерти</title>
  </head>
  <body>
    <header>
      <ol>
        <li><a href="index.php">Главная</a></li>
        <li><a href="magazin.php">магазин</a></li>
        <li><a href="add_post.html">добавить пост</a></li>
        <li><a href="info.php">Инфо</a></li>
      </ol>
    </header>
    <!-- профиль сюда закинуть -->
    <article style="height:240px;" class="left_menu">
      <center>
        <?php
        if (isset($_COOKIE['nick'])) {
          echo"<h3>статус:вы зарегистрированы</h3>";
        }else{
          echo"<h3>статус:вы не зарегистрированы</h3>";
        }
        ?>
      <h3><a href="log.html">залогиниться</a></h3>
      <h3><a href="reg.html">зарегистрироваться</a></h3>
      <h3>ваш профиль</h3>
      <h3>ник:<?php echo $_COOKIE['nick']; ?></h3>
      <h3>емайл:<?php echo $_COOKIE['email']; ?></h3>
      <h3>дата регистрации:<?php echo $_COOKIE['reg_time']; ?></h3>
      <h3>выйти из аккаунта</h3>
      </center>
    </article>
    <?php
    $cname="root";
    $cpass="";
    $link = mysqli_connect('localhost',$cname,$cpass,'zak');
    $result= $link -> query("SELECT * FROM `post`");
    while(($obr = $result->fetch_assoc()) !=false){
    // $time = preg_split('/./',$catal);
    echo '<article class="article-content" style="min-height:500px;margin-bottom:5%;overflow:auto;">
    <center><img style="width:65%;" src="img/post/'. $obr['src'] .'"></center>
    <center><h3>'. $obr['title'] .'</h3></center>
    <p>Описание:</p>'. $obr['content'] .'<br>AFTOR:'. $obr['aftor'].'
    <p>Дата публикации:</p>'. $obr['reg_time'] .'
    <center><h5>Комментарии</h5></center><br>
    ';
    // echo $obr['comment'];
    $com = explode(',',$obr['comment']);
    // print_r($com);
    $i = count($com)-1;
    // echo $i;
    while($i != -1){
      echo "<p style='margin-bottom:0.5%;'>". $com[$i] ."</p>";
      $i-=1;
    }
    echo '
    <form method="POST" action="comment.php">
    <input name="np" style="display:none;" value="'. $obr['id'] .'">
    <center><textarea name="comment" rows="5" cols="60%"></textarea></center>
    <br>
    <center><input value="комментировать" type="submit"></center></form>
    </article>';
    }
    $link->close();
    ?>
    <article class="article-content" style="text-align:right; width:78%; border:none;">Сайт посвящен магазину Ливерти © 2020. Надя Селивёрстова</article>
  </body>
</html>
