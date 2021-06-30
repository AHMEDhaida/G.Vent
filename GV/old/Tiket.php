<!DOCTTYPE html>
<html>
<head>
<title>Tiket</title>
<style>
#div{
	margin:25px 400px;
	font-size:40px;
	color:white;
}
#table{
	font-size:25px;
	color:orange;
	
}

</style>

</head>
<body>

<div id="div">
<table bgcolor="green" width="800px" height="400px" id="table" border="1px">
<tr ><td><?php echo "nom du supermache: "?></td><td><?php $nom=$_POST['nom_Supermarche'];echo "$nom<br />";
?></td></tr><tr><td><?php
echo "nom rayon: "?></td><td><?php $nom=$_POST['Rayon'];echo "$nom<br />";
?></td></tr><tr><td><?php
echo "numero etagere: "?></td><td><?php $date=$_POST['Rayon'];echo"$date <br />";
?></td></tr><tr><td><?php
echo "nom de client: "?></td><td><?php $nuber=$_POST['number_phone'];echo"$nuber<br />";
?></td></tr><tr><td><?php
echo "code d'article achete par client: "?></td><td><?php $code_article=$_POST['code_article'];echo"$code_article<br />";
?></td></tr><tr><td><?php
echo "prix d'article: "?></td><td><?php $prix_article=$_POST['prix_article'];echo"$prix_article<br />";
?></td></tr><tr><td><?php
echo "date d'expiration d'article: "?></td><td><?php $date_article=$_POST['date_article'];echo"$date_article <br />";
?></td></tr><tr><td><?php
echo "le date aujourd'huit: "?></td><td><?php $date_jour=$_POST['date_jour'];echo"$date_jour<br />";
?></td></tr>
</table>
</div>
</body>
</html>