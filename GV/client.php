<!DOCTYPE html>
<html>
<head>
<title>client</title>
<link rel= "stylesheet" type="text/css" href="style_client.css"/>
</head>
<body>
<ul>
<li><a href="index1.php">Page principal</a></li>
	<li><a href="liste_articles.php">liste des articles</a></li>
	<li><a href="article.php">add_article</a></li>
	 
	  <li><a>information</a>
	 </li>
	<!--<li><a>sports</a></li>-->
</ul>
<div>
<?php
include_once 'config.php';


  echo "<table border><tr><th>";
  echo "nom du client</th>";
  echo "<th>numero du telephone</th>";
  echo "<th>date du naissance</th>";
  echo " <th>voir</th><th>modufier</th></tr>";
$sql = "select * from client";
$result = mysqli_query($db, $sql);
while($lin = mysqli_fetch_row($result)){ 
	echo "<tr><td>".$lin[1]."</td>";
	echo "<td>".$lin[2]."</td>";
	echo "<td>".$lin[3]."</td>";
	echo "<td><a class='mod' href='artisles_client.php?c_id=$lin[0]'>ces articles</a></td>";
	echo "<td><a class='mod' onclick=\"return confirm('tu est sur, tu va modifier le client?')\" href='modifier.php?id=$lin[0] '>modufier</a></td></tr>";
}
echo "</table>";
?>
</div>
</body>
</html>