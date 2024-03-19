<?php
  //name = имя профиля
	$name   = $_COOKIE['nick'];
  //commit = берём из текст ареа
	$commit = $_POST['comment'];
  //commit = берём ид
  $np     = $_POST['np'];
	$commit = $name." : ".$commit.",";
	// print_r($_POST);
	// $commit = (string)$commit;
	// echo gettype($commit);

	//print_r($_POST);
  $cname="root";
  $cpass="";
  // print_r($_POST);
  $link = mysqli_connect('localhost',$cname,$cpass,'zak');
		//UPDATE table_name SET claim = CONCAT( claim, 'тут текст который надо добвить') WHERE ...
    $result= $link -> query("UPDATE `post` SET `comment` = CONCAT(`comment`,'$commit') WHERE `post`.`id` = '$np' ");
	//echo $name.":".$commit;echo "<br>".$np;
  header("LOCATION:index.php");
	$link->close();
?>
