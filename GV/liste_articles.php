
<!DOCTYPE htm>
<html>
<head>
<title>les articles</title>
<link rel="stylesheet" type="text/css" href="style_liste.css"/>
</head>
<body>
<div class="conten">
<div class="ull"><ul>
	<li><a href="index1.php">Page principal</a></li>
	<li><a href="article.php">add article</a></li>
	<li><a href="client.php">les client</a></li>
	  <li><a href="super.php">supermarche</a> </li>
	  <li><a>information</a>
	 </li>
</ul></div>

<?php
include_once 'config.php';
$plus=isset($_GET['plus']) ? $_GET['plus'] : null;
$cco=isset($_GET['cod']) ? $_GET['cod'] : null;
 if($plus){
	 echo "<div class='plus'> donnez la qunatite ajoute a : $cco";
	 echo "<form method='post' action='?ad=$plus'><input type='number' name='ajou'> <input type='submit' value='OK'></form>";
	 
	 echo "</div>";
 }
 $plu=isset($_POST['ajou']) ? $_POST['ajou'] : null;
 if($plu){
	 $ad=isset($_GET['ad']) ? $_GET['ad'] : null;
	 
	   $s=mysqli_query($db, "select qte from article where id = $ad");
	   $x=mysqli_fetch_row($s);
	   $plu += $x[0];
	mysqli_query($db, "UPDATE article SET qte = $plu WHERE id = $ad");
	
	 header('location:liste_articles.php');exit;
 }


$sql = "select * from article";
$result = mysqli_query($db, $sql);
echo "<div class='div'><table border><tr><th>code</th><th>prix_chat</th><th>prix_vente</th><th>date d'expiration</th><th>la qantite</th><th>action</th></tr>";
while($lin = mysqli_fetch_row($result)){
  echo "<tr><td>$lin[1]</td>";
 echo "<td>$lin[2] N-UM</td>";
 echo "<td>$lin[3] N-UM</td>";
 echo "<td>$lin[4] </td>";
 echo "<td>$lin[5] </td>";
 
 echo "<td><a href='?plus=$lin[0]&cod=$lin[1]' >ajouter</a></td></tr>";
}echo "</table></div>";
?></div>
</body>
</html>