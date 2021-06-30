<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
body{
	background:rgb(49, 125, 179);
}
table{
	background:rgb(92, 121, 138);
width:45%;
margin-left:15%;;
	text-align:center;
	border-radius:12px;
}
table tr td{	
	height:50px;	
}
input[type=text]{
	width:80%;
	height:60%;
	text-align:center;
}
</style>
</head>
<body>
<?php
//Connexion avec la base
include "config.php";

//Récupéraion ID
$id_client=$_GET['id'];

//Récupération de données à modifier
echo"<table ><caption><h3>Modifierles info de client</h3></caption>";
echo "<form method='post' action='mod.php' id='mdf-client-frm'>";
$sql= "select * from client where id='$id_client'";
$resultat = mysqli_query($db,$sql);
if(mysqli_num_rows($resultat)>0){
while($lign=mysqli_fetch_row($resultat)){
	
	echo"<tr><td class='ttt'><label>.Nom.</lable></td><td class='rrr'><input type='text' id='nom' name='nom' value='$lign[1]'></td></tr>"; 
	echo"<tr><td class='ttt'><label>.numero telephon.</lable></td><td class='rrr'><input type='text' id='phone' name='pr' value='$lign[2]'></td></tr>"; 
	echo"<tr><td class='ttt'><label>.dat de ne.</lable></td><td class='rrr'> <input type='text' id='adr' name='adr' value='$lign[3]'></td></tr>"; 
	echo"<input type='hidden' id='id' name='id' value='$lign[0]'>"; 
	echo "<tr><td colspan='2'><input type='submit' value='Modifier'></td></tr>";
	echo "</form>";
}	echo "</table>";
		
} else 
{
echo  "aucun enregistrements";
}
echo "</div>";
?>
<script type="text/javascript">

	document.getElementById('mdf-client-frm').addEventListener('submit', number);
	function number(e){
		
	num=document.getElementById("phone").value;
if(num<20000000 || num>49999999 || (((num/10000000) | 0) !== 2 && ((num/10000000) | 0) !== 3 && ((num/10000000) | 0) !== 4 )){
			
	alert("ce numero du telephon pas correspondant en mauritanie ( "+num+")");
	e.preventDefault();
		}
		
	}
	</script>
</body>
</html>