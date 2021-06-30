<?php
include_once 'config.php';
 $rrr=time();
$sql="select * from article_client where date_chat>($rrr-60*60*24)";
$articl=mysqli_query($db,$sql);

echo "<center><table border><tr><th>code</th><th>qantite</th></th></tr>";
while($yy=mysqli_fetch_row($articl)){$er=$yy[2];

$f=mysqli_query($db,"select * from article where id='$er'");
$wq=[];
$wq=mysqli_fetch_row($f);
 
echo "<tr><td>$wq[1]</td>";
echo "<td>$yy[3]</td></tr>";

}echo "</table></center>";
?>
<!DOCTYPE html>
<html>
<head>
<style>
body{
	background:rgba(0, 17, 128, 0.48);
}
table{
	width:50%;
	margin-top:70px;
}
table tr th{
	background:yellow;
}
table tr td{
	text-align:center;
}
ul{
	display:inline;
list-style:none;
color:white;
padding:0px;left:16%;    top: 0;
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
	<li><a href="article.php">add_article</a></li>
	 
	  <li><a>information</a>
	 </li>
	<!--<li><a>sports</a></li>-->
</ul>

</body>
</html>