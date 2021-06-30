<!DOCTYPE html>
<html>
<head>
<title>addar</title>
<style>
body{
	background:rgba(102, 93, 228, 0.94);
}

*{
	margin:0px;
}
ul{
	
	margin-bottom:12px;
	display:inline;
list-style:none;
color:white;
padding:7px;margin-left:9%;    margin-top: 0;
position:absolute;
}
ul li {
	
float:left;
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
	color:white;
	font-size:24px;
	text-decoration:none;
}
ul li a:hover{
	color:black;
	background:#e8f705
}

.conte{
    padding-left: 100px;
    padding-top: 22px;
	position: absolute;
    margin-top: 77px;
	width:50%;
	margin-left:20%;
	background-color:rgba(128, 128, 128, 0.2196078431372549);
	
}
.conte form{font-size:20px;margin:auto;	
}
.head{
	width: 50%;
    font-size: 20px;
    margin-left: 83px;
    margin-bottom: 22px;
}
input[type=text]{
	text-align:center;
	margin:10px;
	width:200px;
	height:25px;
	font-size:18px;
     border:none;
	 bodrder-:raduis:5px;
	 background-color:white;
	 color:black;}
	 input[type=date]{margin:10px;
		 background-color:white;color:black;border:none;width:140px;height:33px;text-align:center;
	 }
	 input[type=number]{text-align:center;
	margin:10px;
	width:200px;
	height:25px;
	font-size:18px;
     border:none;
	 bodrder-:raduis:5px;
	 background-color:white;
	 color:black;}
	 input[type=date]{margin:10px;
		 background-color:white;color:black;border:none;width:200px;height:33px;text-align:center;}
input[type=submit]{background-color:green;size:30px;color:black; margin-left:100px;margin:10px;
width:150px;border-radius:4px;border:none;height:44px;
}
button{
	width:80px;height:30px;
	FONT-SIZE:18px;
	color:black;
}
button a{
	text-decoration:none;
	
}

</style>
</head>
<body>
<ul>
	
	<li><a href="index1.php">Page principal</a></li>
	<li><a href="article.php">add articles</a></li>
	<li><a href="client.php">les client</a></li>
	  <li><a href="super.php">supermarche</a> </li>
	  <li><a>information</a>
	 </li>
</ul>
<?php
include_once 'functions.php';
include_once 'config.php';
$form = isset($_GET['form']) && $_GET['form'] ? $_GET['form'] : null ;

$num_etagere = isset($_GET['num_etagere']) ? $_GET['num_etagere'] : null;
$e_id = isset($_GET['etagere_id']) ? $_GET['etagere_id'] : null;
$nom_rayon = isset($_GET['nom_rayon']) ? $_GET['nom_rayon'] : null; 
if($form == 'add_article'){
	add_article();
	}
?>


<div class="conte">
<div class="head">
<h2>nom du rayon : <?= $nom_rayon ?></h2>
<h3>etagere numero = <?= $num_etagere ?></h3>
 </div>
<form method="post" action="?form=add_article&num_etagere=<?= $num_etagere ?>&nom_rayon=<?= $nom_rayon ?>">
<table><tr>
<th>
<label>code article:</label></th><td><input type="text" name="code" required></td></tr><tr><th>
<label>prix de chat:</label></th><td><input type="text" name="prix" required></td></tr><tr><th>
<label>prix de vente:</label></th><td><input type="text" name="p_vente" required></td></tr><tr><th>
 <label>date d'expiration:</label></th><td><input type="date" name="date" required></td></tr><tr><th>
 <label>la qantite:</label></th><td><input type="number" name="qte" required></td></tr></table>
<input type="hidden" value="<?= $e_id?>" name="hiden">
<input type="submit" value="stocke">

</form><button><a href="article.php" >termine</a></button>
</div>
</body>
</html>
<script>
function dd(){
	alert("ok");
}


</script>