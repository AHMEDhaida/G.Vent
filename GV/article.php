<!DOCTPE html>
<html>
<head>
<title>les articles</title>
<link rel="stylesheet" type="text/css" href="style_article.css" />
<head>
<body>
<ul>
	<li><a href="liste_articles.php">liste des articles</a></li>
	<li><a href="index1.php">Page principal</a></li>
	<li><a href="client.php">les client</a></li>
	  <li><a href="super.php">supermarche</a> </li>
	  <li><a>information</a>
	 </li>
	<!--<li><a>sports</a></li>-->
</ul>


<?php

include_once 'config.php';

$sql = "select * from rayon";
$resul = mysqli_query($db,$sql);
 echo "<div id='add'>";
while($lin = mysqli_fetch_row($resul)){
	echo "<br>nom du rayon:<span style='color:rgb(2, 2, 2); font-size:20	px;'>$lin[1]</span><br>";
$sql = "select * from `etagere` where `r_id`=$lin[0]";
$result = mysqli_query($db,$sql);
while($ling = mysqli_fetch_row($result)){
 echo "etagere numero:<span style='color:#000000; font-size:18px;'> $ling[1] </span> <a href=addarticle.php?num_etagere={$ling[1]}&nom_rayon={$lin[1]}&etagere_id={$ling[0]}>ajouter des arlicles</a><br>";
}}echo "</div>";
?>

</body>
</html>