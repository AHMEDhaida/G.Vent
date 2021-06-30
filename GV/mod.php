<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="emp.css">
</head>
<?php
//Connexion avec la base
include "config.php";

//Récupération de données 
$nom=$_POST['nom'];
$pr=$_POST['pr'];
$adr=$_POST['adr'];
$id_emp=$_POST['id'];

//Modification de données
$sql= "update client set nom='$nom',numero_tel='$pr',date='$adr' where id='$id_emp'";
$resultat = mysqli_query($db,$sql);
if($resultat){
	//Réorientation vers la page liste_emp.php 
header("Location: client.php");
}		
 else 
{
echo "Erreur de modification";
}

?>