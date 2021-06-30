<?php
include_once 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<ul>	<li><a href="index1.php">Page principal</a></li>
	<li><a href="liste_articles.php">les articles</a></li>
	<li><a href="client.php">les client</a></li>
	 
	  <li><a>information</a>
	 </li>
	<!--<li><a>sports</a></li>-->
</ul>
<div class="rayon-header">


</div>

<?php
$sql = "select * from super";
$result= mysqli_query($db,$sql);
$lin = mysqli_fetch_row($result);
echo "<div class='rayon-body'>";
echo "<h2>".$lin[1]."</h2>";	
    
	echo "<div class='rayon-wrapper'>";
	$sql = "select * from rayon";
$result = mysqli_query($db,$sql);
	while($lin = mysqli_fetch_row($result)){
	echo "<div class='rayon-content'>";
	echo "<div class='rayon-name'>{$lin['1']}</div>";
	echo "<div class='rayon-etagere'>";
		
	$sql = "select * from `etagere` where `r_id`=$lin[0]";
	$resul = mysqli_query($db,$sql);
	
	while($linn = mysqli_fetch_row($resul)){
		echo "<div class='etagere-num'>".$linn[1]."</div>";
	}
	echo "</div></div>";
	}
	echo "</div>";

?>
</body>
</html>
