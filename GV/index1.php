

<?php 
session_start();

require_once 'config.php';

// get
$q = $db->query("SELECT * FROM `super`");
$super = $q->num_rows ? $q->fetch_assoc() : NULL;
//securiter


// check if setup is done
if(!$super || !$super['finish']){
    header('location: setup.php');
}
else{
      $nb =isset($_GET['nb']) ? $_GET['nb'] : null;
	  if($nb){
		 $qt=isset($_GET['qte']) ? $_GET['qte'] : null;
           if($qt){?>
<div class="aler"> le stockage contient seulement <?=$qt?> de ce article<br><br><br><br>
<a href="index1.php">OK</a>
</div>               
      
		<?php   }else{?>
			<div class="aler"> le stockage ne contient pas  ce article<br><br><br><br>
<a href="index1.php">OK</a>
</div>  
		<?php	
		}			   
	  }
	$form = isset($_GET['form']) ? $_GET['form'] : null;
	$route = isset($_GET['route']) ? $_GET['route'] : null;
     if($form === 'addClient'){
		 
		$phon = $_POST['phon'];
		$nom = $_POST['nom'];
		$date = $_POST['date'];
		if(!$nom || !$phon || !$date){
			header('location:index1.php');exit;
		}
		
		$res = mysqli_query($db, "SELECT * FROM client WHERE numero_tel = '$phon'");
		if(mysqli_num_rows($res)){
			$c= mysqli_fetch_row($res);
			$id = $c[0];
			$nom = $c[1];
		    $phon = $c[2];
		    $date = $c[3];
			
	    }else{
			mysqli_query($db, "INSERT INTO client (nom, numero_tel, date) VALUES ('$nom', '$phon', '$date')");
			$id = mysqli_insert_id($db);
			if(!$id){
				header('location:index1.php');exit;
			}
	    }
		$_SESSION['client_info'] = [];
		$_SESSION['client_info']['phon'] = $phon;
		$_SESSION['client_info']['nom'] = $nom;
		$_SESSION['client_info']['date'] = $date;
		$_SESSION['client_info']['id'] = $id;
	
		header('location:index1.php');exit;
	}
	if($form === 'add_article'){
		$qte=isset($_POST['qte']) ? $_POST['qte'] : null;
		$code = isset($_POST['code']) ? $_POST['code'] : null;
		$res = mysqli_query($db, "SELECT * FROM article WHERE code = '$code'");
		$c_id = isset($_GET['c_id']) ? $_GET['c_id'] : null;
		$article = mysqli_fetch_row($res);
		$e = mysqli_num_rows($res);
//est ceque article et la quantive trouvable ou non
	if(!$e || $qte > $article[5]){	
	header("location:index1.php?nb=1&qte={$article[5]}");
	 exit;
	}		//$article = mysqli_fetch_row($res);
		$dateChat=time() ;
	
		
	$rr = mysqli_query($db, "INSERT INTO article_client (`c_id`, `a_id`, `qte`, `date_chat`) VALUES ('$c_id', '$article[0]', '$qte', '$dateChat')");
     $f = mysqli_query($db, "UPDATE  article SET qte_v='$qte'  where code='$code'");
	   header("location:index1.php");exit;
	}
	
if($route === 'clear'){
	unset($_SESSION['client_info']);
	mysqli_query($db, "DELETE FROM article_client WHERE terminer = 0");
	mysqli_query($db, "UPDATE article SET qte_v=0");
	header('location:index1.php');exit;
}

	
$client_info =isset($_SESSION['client_info']) ? $_SESSION['client_info'] : null;
if($client_info){
 
	$sql = "SELECT article.code,article.prix, article.p_vente, article.date_expi, article.qte_v FROM article INNER JOIN article_client ON article_client.a_id=article.id WHERE article_client.c_id = '{$client_info['id']}' AND terminer = 0";
    
   $res = mysqli_query($db, $sql);

   $articles = [];

   $somme = 0;
   if(mysqli_num_rows($res)<=5){
   while($r = mysqli_fetch_assoc($res)){
	   $articles[] = $r;  
	   $somme += intval($r['p_vente']*$r['qte_v']);
   }}
   else{
	  while($r = mysqli_fetch_assoc($res)){
	   $articles[] = $r;  
	   $somme += (intval($r['prix'])+((intval($r['p_vente'])-intval($r['prix']))/2))*intval($r['qte_v']);
   } 
   }
 
}

		
if($route === 'confirm'){
$v = mysqli_query($db, "select article.id, article.qte, article.qte_v, article.prix from article where article.qte_v != 0");
     	$zs=[];
     while($l=mysqli_fetch_assoc($v)){$zs[]=$l;}
     $som=0;
	 foreach($zs as $z){
	 $qt=$z['qte']-$z['qte_v'];
	 $id=$z['id'];
	 $som += $z['prix']*$z['qte_v'];
		mysqli_query($db, "UPDATE article SET qte = $qt, qte_v = 0 WHERE id = $id");
		}
		$rectte=$somme - $som ;
		$t=time();
		mysqli_query($db, "insert into recette (`rectte`, `tm`) values ('$rectte', '$t')");
	unset($_SESSION['client_info']);
	mysqli_query($db, "UPDATE article_client SET terminer = 1 WHERE terminer = 0");
	include_once('imprime.php');exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="style1.css">
	<script src="js/jquery.js"></script>
</head>
<body>
 <div class="tete_index"><img src="back1.jpg" width="200px" >
<div id="ffg">
  <ul>
	<li><a href="article.php">add articles</a></li>
	<li><a href="liste_articles.php">liste d'articles</a></li>
	<li><a href="client.php">les client</a></li>
	  <li><a href="super.php">supermarche</a> </li>
	  
	  <li><a href="information.php">information</a>
	 </li>
	<!--<li><a>sports</a></li>-->
</ul>
</div></div>
<?php
$dd=isset($_GET['nn']) ? $_GET['nn'] : null;
if($dd){
	$tr=time();
	$re=mysqli_query($db, "select * from recette");
	
	$x=[];
	$rec = 0;
	while($li=mysqli_fetch_assoc($re)){$x[]=$li;}
	foreach($x as $y){
		if((($tr-$y['tm'])<60*60*24)){
		$rec += $y['rectte'];
		}
	}
	?>
<div class="rect">
votre recette dans le 24h passe est : <span class="recette"><?= $rec ?>  N-UM</span>  
<span id="hrin"><a href="index1.php">ok</a></span>
</div>


<?php } ?>
<div class="client-form">

<p><button><a href="?nn=$nn"> notre recette aujourd'hui</a></button><button><a href="articlJour.php"> les articles vendu </a></button></p>
<form id="add-client-frm" action="?form=addClient" method="post">
<table><tr><th>
<label>nom du client:</label></th>
<td style="position: relative;">
<input type="text" class="auto-search" name="nom" id="client_nom" required value="<?= isset($client_info['nom']) ? $client_info['nom'] : ''?>">
<div class="search-wrapper" style="display: none;"></div>
</td>
</tr><tr><th>
<label>numero de  phon :</label></th><td><input type="number" name="phon"  value="<?= isset($client_info['phon']) ? $client_info['phon'] : ''?>" id="phon" required></td></tr><tr><th>
<label>date de naissance:</label></th><td><input type="date" name="date"  value="<?= isset($client_info['date']) ? $client_info['date'] : ''?>"          required ></td></tr><tr><td colspan="2">
<input type="submit" value="ok"></td></tr>
</table>
</form>
<?php if($client_info){ ?>
<form method="post" action="?form=add_article&c_id=<?= $client_info['id'] ?>">
<div class="qte"><label>code d'article:</label><input type="text" name="code" required><label >qantite:</label>
<input type="number" name="qte"  required> </div><br>
<input type="submit" value="ajoute" >

</form><div class="hrefs"><a href="?route=confirm" onmousedown="confi()">Imprime</a>
<a href="?route=clear">effacer</a></div>
<?php if(count($articles)){ ?>
<div class="art">
<table border="1">
<tr>
<th>Code</th>
<th>Prix</th>
<th>qantite</th>
<th>Date d'expiration</th>
</tr>

<?php foreach ($articles as $article){ ?>
	<tr><td><?= $article['code'] ?></td>
	<td><?= $article['p_vente'] ?></td>
	<td><?= $article['qte_v']?></td>
	<td><?= $article['date_expi'] ?></td>
	</tr>
<?php } ?>
<tr>
<th>Somme</th>
<th colspan="3"><?= $somme ?> UM</th>
</tr>
<tr>
<th >date auourd'hui</th>
<th colspan="3"><?= date('Y-m-d H:i')?></th>
</tr>
</table></div>
<?php }}  ?>
</div>


<script type="text/javascript">

	$(document).on('click', '.client-srch-item', function (e){
		var value = $(this).text();
		$('.auto-search').val(value);
		$(this).parent('.search-wrapper').hide();
	});
	
   $('.auto-search').keyup(function (){
	   var val = $(this).val();
	   var $wrapper = $(this).parent('td').children('.search-wrapper');
	   
	   
	   $.ajax({
		   type: 'GET',
		   url: 'search.php?q=' + val,
		   dataType: 'json',
		   success:function (data){ 
				
				if(data.status === 'ok'){
					var output = '';
					for(var key in data.clients){
						output += '<div class="client-srch-item">'+data.clients[key].nom+'</div>';
					}
					$wrapper.html(output);
					$wrapper.show();
				}else{
					$wrapper.hide();
				}
		   },
		   error:function(err){
				$wrapper.hide();
		   }
	   });
   });


	document.getElementById('add-client-frm').addEventListener('submit', number);
	function number(e){
		
	num=document.getElementById("phon").value;
if(num<20000000 || num>49999999 || (((num/10000000) | 0) !== 2 && ((num/10000000) | 0) !== 3 && ((num/10000000) | 0) !== 4 )){
			
	alert("ce numero du telephon pas correspondant en mauritanie ( "+num+" )");
	e.preventDefault();
		}
		
	}
function confi(){
	<?php
 $res=mysqli_query($db, "select * from article_client where terminer=0");
	$resss=mysqli_num_rows($res);
	
	?>
	if(!<?=$resss?>){
		alert("ce client ne chette aucun article tu ne peut pas lui donne une tiket ");
		
	}
}
	</script>
</body>
</html>
<?php } ?>