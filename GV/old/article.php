<html>
<head>
<style>
h1{  color:green;
font-size:55px;
text-align:center;   }
div{ width:60%;
margin-left:40%;
font-size:40px;}
input{ width:400px;
font-size:20px;
border-radius:5px;}
input[type="submit"]{
	 width:100px;
	background:green;
	margin-left:45%;
	margin-top:25px;
	border-radius:5px;
	
}
</style>
</head><body>
<!--<?php
include "saisirarticle.php";

?>-->
<form method="post" action="saisirarticle.php">
<h1><u>Article</u></h1>
		<div >
		<legend class="legend">Les infos d'article</legend>
		<label class="article"><img src="214.png" width="20px" height="20px"/> code d'article:</label><br>
		<input type="text" required placeholder="Entrer le code d'article" name="code_article"><br>
		<label class="article"><img src="214.png" width="20px" height="20px"/> prix d'article:</label><br>
		<input type="text" required placeholder="Entrer le prix d'article" name="prix_article"><br>
		<label class="article"><img src="214.png" width="20px" height="20px"/> date d'Exp:</label><br>
		<input type="date" required placeholder="Entrer le code d'article" name="date_article">
		</div>
<input type="submit" value="OK">
	</form>
	<a href="menu.php">finir dachater</a><body>
	</html>