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
        <li><a href="magazin.php">магазин</a></li>
        <li><a href="add_product.html">добавить продукт</a></li>
        <li><a href="corzina.php">корзина</a></li>
        <li><a href="info.php">Инфо</a></li>
      </ol>
    </header>
    <?php
    $cname = 'root';
    $cpass = '';
    // id
    // title
    // content
    // buy
    //reg_time
    $sql = mysqli_connect('localhost',$cname,$cpass,'zak');
    $result= $sql -> query("SELECT * FROM `product`");
    while(($obr = $result->fetch_assoc()) !=false){
      echo "<article style='min-height:260px;'>
      <center>
      <p>";echo $obr['title']; echo "</p>";
      echo '<img style="width:200px;" src="img/'.$obr['src'].'"><br>';
      echo"<br>Описание<br>";
      echo $obr['content'].'<br>';
      echo '<form method="POST" action="buy.php">';
      echo '<br>стоимость<br>
      <input style="display:none;" name="buy" value="'.$obr['buy'].'">'.$obr['buy'].'р
      <input style="display:none;" name="catal" value="'.$obr['id'].'"><br>';echo"
      <input name='' type='submit' value='купить'></form>
      <center></article>";
    }
    $sql->close();
    // print_r ($obr);
    // $arr = [0,0,0]
    ?>
    <article class="article-content" style="text-align:right; width:78%; border:none;">Сайт посвящен магазину Ливерти © 2020. Надя Селивёрстова</article>
  </body>
</html>
