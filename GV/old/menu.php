<!DOCTYPE html>
<html>
<head><title>drowpmen</title>
<style>
body{
background:url('back.jpg');
background-position:top;
background-size:cover;
color:black;
font-family:italic;
}
*{
	margin:0px;padding:0px;
}
 ul{
 font-size:25px;
list-style:none;
color:white;
position:relative;
}
#orm{
	margin-top:25px;
	padding-left:0px;
   
	margin-left:0;
}
 ul li {
float:left;
width:220px;
height:40px;
background-color:black;
text-align:center;
position:relative;
margin:1px;padding:1px;
}
ul li .div{
	display:none;
	width:220px;
	height:400px;
	background:black;
	color:wihte;
	font-size:16px;
	margin:1px;
	padding:0px;
	position:relative;
}
.legend {
font-size:30px;
}
ul li div .label {
margin:8px;
font-size:25px;
}
ul li div .article{
	font-size:25px;
	margin:0px;
	margin-left:1px;
}

ul li:hover{
	background:gray;
}	
ul li:hover .div {
	display:block;
}
input{
width:98%;
height:75px;
letter-spacing:1px;
background:#000099;
color:black;
font-size:25px;
font-family:italic;
border-bottom:3px solid green;
border-radius:12px;

}



.rarrow{
size:16px;
color:GREEN;
right:100px;
}
input[type="submit"]{
margin-left:150px;
margin-top:250px;
width:300px;
font-size:25px;
height:40px;
background:red;
border:4px solid black;
}
#super{
	
width:100px;
height:20px;
text-align:center;
color:green;
background:yellow;
}
</style>
<link rel="stylesheet" href="" />
</head>
<body>

<div id="div" width="100%" height="81px" >
<img src="market.jpg" width="200px" height="100"/>
<h1><u>Gestion de vente:</u></h1>

</div >
<form  method="post" action="Tiket.php" id="form" >

<ul>
	<li><a>Supermarche</a> <span class="rarrow">&#9660</span>
      <div class="div"><form method="post" action="">
		<img src="market_4.jpg" width="200px" height="200px">
		<label class="label"><img src="214.png" width="20px" height="20px"/> Nom du supermarche:</label><br>
		<input type="text" required placeholder="Enter nom du supermarche" name="Supermarche">
		<input type="submit" value="OK" id="super"></form></div>
	</li>
	<li><a href="rayon.php">Rayon <span class="rarrow">&#9660</span></a> 
		<!--<div class="div" >
		<img src="rayon.jpg" width="200px" height="200px">
		<label class="label"><img src="214.png" width="20px" height="20px"/> Nom du rayon:</label><br>
		<input type="text" required placeholder="Enter nom du rayon" name="Rayon">
		</div>--></li>
	<li><a>Etagere</a> <span class="rarrow">&#9660</span>
		<div class="div">
		<img src="etager.jpg" width="200px" height="200px">
		<label class="label"><img src="214.png" width="20px" height="20px"/> Numero du etagere:</label><br>
		<input type="number" required placeholder="Enter nom du rayon" name="Rayon">
		</div>
	</li><li><a>Client</a> <span class="rarrow">&#9660</span>
	
	     <div class="div">
		<legend class="legend">Les infos de client</legend>
		<label class="label"><img src="214.png" width="20px" height="20px"/> nom de client:</label><br>
		<input type="text" required placeholder="Entrer le nom de client" name="nom_client"><br>
		<label class="label"><img src="214.png" width="20px" height="20px"/> date de naissance:</label><br>
		<input type="date" required placeholder="Entrer le date de naissance de client" name="naissance_client"><br>
		<label class="label"><img src="214.png" width="20px" height="20px"/> numero phone:</label><br>
		<input type="number" required placeholder="Entrer le numb de telephone" name="number_phone"><br>
		<div>
	</li>
	<li><a href="article.php">Article <span class="rarrow">&#9660</span></a>
		<!--<div class="div">
		<legend class="legend">Les infos d'article</legend>
		<label class="article"><img src="214.png" width="20px" height="20px"/> code d'article:</label><br>
		<input type="text" required placeholder="Entrer le code d'article" name="code_article"><br>
		<label class="article"><img src="214.png" width="20px" height="20px"/> prix d'article:</label><br>
		<input type="text" required placeholder="Entrer le prix d'article" name="prix_article"><br>
		<label class="article"><img src="214.png" width="20px" height="20px"/> date d'Exp:</label><br>
		<input type="date" required placeholder="Entrer le code d'article" name="date_article">
		</div>-->
	</li>
	
	
	<li><a>Tiket</a> <span class="rarrow">&#9660</span>
     <div class="div">
	<img src="tiket.jpg" width="200px" height="200px">
		<!--<legend> Tiket clientique:</legend>
		<label>nom de client:</label><br>
		<input type="text" required placeholder="Entrer le nom de client" name="Nom_client">
		<label>date de nessance:</label><br>
		<input type="date" required placeholder="Entrer le date de naissance de client" name="Nessance_client">
		<label>numero telephone de client:</label><br>
		<input type="number" required placeholder="Entrer le numb de telephone" name="Number_phone">-->
		<label class="label">date du jour:</label><br>
		<input type="date" placeholder="entrez la date aujourd'hui" name="date_jour">
			

		</div>
	</li>
	

</ul>
<input type="submit" value="OK">
</form>
</body>
</html>