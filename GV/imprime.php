<?php
$d=mysqli_query($db, "select nom from super");
$sup=mysqli_fetch_assoc($d);

?>
<!DOCTYPE html>
<html>
<head>
<title>tiket</title>
<link rel="stylesheet" type="text/css" href="style_imp.css">
</head>
<body onload="window.print()">
<div class="hea">
<img src="market1.jpg" height="200px"> <p class="sup"><?= $sup['nom']?> toure 7ibou bikoum</p></div>
  <!--<ul>
	<li><a href="article.php">les articles</a></li>
	<li><a href="client.php">les client</a></li>
	  <li><a href="super.php">supermarche</a> </li>
	  <li><a>information</a>
	 </li>
	<!--<li><a>sports</a></li>
</ul>-->






<?php if(isset($client_info) && isset($articles)){ ?>
<div class="cont"><table border="1"><caption><h3>Tiket</h3></caption>
<tr>
<th>Nom</th>
<th>telephon</th>
<th>date de naissance</th>
</tr>
	<tr>
	<td><?= $client_info['nom'] ?></td>
	<td><?= $client_info['phon'] ?></td>
	<td><?= $client_info['date'] ?></td>
	</tr>
</table>
<br />

<table border="1">

<tr>
<th>Code ar </th>
<th>Prix</th>
<th>Date d'exp</th>
<th>qantite</th>
</tr>

<?php foreach ($articles as $article){ ?>
	<tr><td><?= $article['code'] ?></td>
	<td><?= $article['p_vente'] ?></td>
	<td><?= $article['date_expi'] ?></td>
	<td> <?= $article['qte_v']?></td>

	</tr>
<?php }

 ?>
<tr>
<th>Somme</th>
<th colspan="3"><?= $somme ?> UM</th>
</tr>
<th>le</th>
<th colspan="3"><?= date('Y-m-d H:i') ?></th>
</tr>
</table></div>

<?php } ?>

</body>
</html>
