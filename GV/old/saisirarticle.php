<?php

$con=mysqli_connect("localhost","root","","gestion_de_vente");
if(!$con){die("eurreur de type" .mysqli_connect_error()); }
else "OK";
//la connexion avec la base de données




//Récupération de données

$nom=$_POST['code_article'];
$prenom=$_POST['prix_article'];
$ad=$_POST['date_article'];

//Insertion de données

$sql= "insert into art (code,prix,date) values ('$nom', '$prenom','$ad')";
if(mysqli_query($con,$sql)){
header("location:article.php");
//header("location:em.html");
}
else echo "Erreur d'insertion ";	


?>