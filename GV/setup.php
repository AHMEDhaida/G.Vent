<?php

// includes
require_once 'config.php';
require_once 'functions.php';

// initialize
$form  = isset($_GET['form']) ? $_GET['form'] : NULL;
$route = isset($_GET['route']) && $_GET['route'] ? $_GET['route'] :'add_super';
$method= $_SERVER['REQUEST_METHOD'];

// check if request is POST
if($method === 'POST'){

    if($form === 'add_super'){
        add_super();
    }

    if($form === 'add_rayon'){
        add_rayon();
    }

    if($form === 'add_etager'){
        add_etager();
    }

}

$q = $db->query("SELECT * FROM `super`");
$super = $q->num_rows ? $q->fetch_assoc() : NULL ;

if($route == 'add_super' && $super){
    $route = 'rayon';
}

if($route == 'rayon'){
    $q = $db->query("SELECT * FROM rayon");
    $rayons = [];
  
    while($row = $q->fetch_assoc()){
        $rayons[] = $row;
    }
}


if($route == 'etagers'){
    $r_id = $_GET['rayon_id'];
    $q = $db->query("SELECT * FROM `rayon` WHERE `id`=$r_id");
    $rayon = $q->fetch_assoc();
    
    $q = $db->query("SELECT * FROM `etagere` WHERE `r_id`={$r_id}");
    $etageres = [];
    while($row = $q->fetch_assoc()){
        $etageres[] = $row;
    }
}


if($route == 'finished' && $super){
    $db->query("UPDATE `super` SET `finish`=1");
    header('location: index1.php');
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Setup</title>
	<style>
	body{background:url('market.jpg');background-size:cover;}
	.content{
		padding-bottom:5px;
		width:40%;
		margin:auto;
		margin-top:25px;
		background:rgba(154, 147, 147, 0.47058823529411764);
	    padding: 48px 40px 48px 40px;
	}
	input{
		background:rgba(84, 81, 104, 0.25098039215686274);
		color:white;
		width:200px; 
    border-radius: 5px;
    border: 1px solid #444;
    padding: 10px;
    text-align: center;
    outline: 0;
		
	}
	</style>
</head>
<body>
<div class="content">

    <?php if($super){ ?>
	<div>
    <a href="setup.php?route=finished">terminer</a>&nbsp;-&nbsp;
    <span>nom du supermarket : <?= $super['nom'] ?></span>
    <br />
    <br /></div>
    <?php } ?>


<?php 
switch($route){ 
    case 'add_super':
?>
    <form action="?form=add_super" method="post">
    <label for="s_name">nom du supermarket :</label>
    <input type="text" name="s_name" id="s_name" />
        <button type="submit">enregistrer</button>
    </form>
    <?php 
    break;
    case 'rayon':
    ?>
    <!-- add rayon form -->
    <form action="?form=add_rayon" method="post">
    <label for="r_name">nom du rayon :</label>
    <input type="text" name="r_name" id="r_name" />
        <button type="submit">enregistrer</button>
    </form>
    <ul>
    <?php foreach ($rayons as $r){ ?>
    <li><?= $r['nom'] ?> <a href="setup.php?route=etagers&rayon_id=<?= $r['id'] ?>">Etagers</a></li>
    <?php } ?>
    </ul>
    <?php break;
    case 'etagers': ?>
    <div>
        nom du rayon : <?= $rayon['nom'] ?> - <a href="setup.php">OK</a>
    </div><br /><br />
    <!-- add etager form -->
    <form action="?form=add_etager&rayon_id=<?= $rayon['id'] ?>" method="post">
    <label for="numero">numero du etagere</label>
    <input type="text" name="numero" id="numero" />
        <button type="submit">enregistrer</button>
    </form>
    <ul>
    <?php foreach ($etageres as $e){ ?>
    <li><?= $e['numero'] ?></li>
    <?php } ?>
    </ul>
    <?php break; ?>
<?php } ?>
    </div>
</body>
</html>