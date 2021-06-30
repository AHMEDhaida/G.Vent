<!DOCTYPE html>
<html>
<head>
<style>
body{
	background:#2c55c6a3;
}
div {
	margin-top:100px;
}
table{
	width:55%;
	margin-top:18px;
}
table tr{
	height:28px;
	text-align:center;
}
table tr th{
	background:pink;
}
ul{
	display:inline;
list-style:none;
color:white;
padding:0px;left:25%;    top: 0;
position:absolute;
}
ul li {
display:inline-block;
text-align:center;
width:230px;
height:35px;
background-color:black;
opacity:1.7;
line-height :40px;
text-align:center;
margin-left:2px;
position:relative;
margin:1px;padding:0px;
border-radius:5px;
}
ul li a{
	text-decoration:none;
	color:white;
	font-size:24px;
}
ul li a:hover{
	color:#e8f705;
}
</style>
</head>
<body>
<ul>
<li><a href="index1.php">Page principal</a></li>
	<li><a href="liste_articles.php">liste des articles</a></li>
	<li><a href="client.php">les client</a></li>
	 
	  <li><a>information</a>
	 </li>
	<!--<li><a>sports</a></li>-->
</ul>
<?php
include_once 'config.php';
$c_id = isset($_GET['c_id']) ? $_GET['c_id'] : null ;

$sq = "select * from client  where id=$c_id";
$res = mysqli_query($db, $sq);echo "<div><table border align='center'><tr><th>nom</th><th>telephon</th><th>date_ne</th>";
while($l=mysqli_fetch_row($res)){
	echo "<tr><th>".$l[1]."</th>";
	echo "<th>".$l[2]."</th>";
	echo "<th>".$l[3]."</th></tr>";
}echo "</table>";
$sql = "SELECT article.code, article.p_vente, article.date_expi, article_client.qte, article_client.date_chat FROM article INNER JOIN article_client ON article.id=article_client.a_id  WHERE article_client.c_id = '$c_id'";
$result = mysqli_query($db, $sql);
echo "<table border align='center'><tr><th>code</th><th>prix</th><th>dat d'exp</th><th>quantite</th><th>date_chat</th></tr>";
while($li=mysqli_fetch_row($result)){
	echo"<tr><td>".$li[0]."</td>";
	echo"<td>".$li[1]."</td>";
	echo"<td>".$li[2]."</td>";
	echo"<td>".$li[3]."</td>";
	echo"<td>".date('Y-m-d H:s',$li[4])."</td></tr>";  
}echo "</div>";
?>
</body>