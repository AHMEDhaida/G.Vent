<?php 

// show errors
function showError ($msg = '', $url = '') {
    echo $msg.'<br /><br />';
    echo '<a href="'.$url.'">Back</a>';
    exit;
}
// add super
function add_super(){
    global $db;

    if(!isset($_POST['s_name']) || !$_POST['s_name']){
        showError('Please fill name input', 'setup.php');
    }
  $nom = $_POST['s_name'];
    $db->query("INSERT INTO `super` (`nom`)VALUES('$nom')");
    if($db->insert_id){
        header('location: setup.php');
        exit;
    }
    
    showError('operation is failed, '.$db->error, 'setup.php');
    
}
// add rayon
function add_rayon(){
    global $db;
    if(!isset($_POST['r_name']) || !$_POST['r_name']){
        showError('Please fill name input', 'setup.php');
    }
    $name = $_POST['r_name'];

    $db->query("INSERT INTO `rayon` (`nom`)VALUES('{$name}')");
    if($db->insert_id){
        header('location:setup.php');
        exit;
    }

    showError('operation is failed', 'setup.php');
}
// add etager
function add_etager(){
    global $db;

    $r_id = $_GET['rayon_id'];
    if(!isset($_POST['numero']) || !$_POST['numero']){
        showError('Please fill numero input', 'setup.php');
    }
    
    $db->query("INSERT INTO `etagere` (`numero`, `r_id`)VALUES('{$_POST['numero']}', {$r_id})");
    if($db->insert_id){
        header("location:setup.php?route=etagers&rayon_id={$r_id}");
    }

    showError("operation is failed, {$db->error}", "setup.php?route=etagers&rayon_id={$r_id}");
}
//add article
function add_article(){
	global $db;
	$nom_rayon=isset($_GET['nom_rayon']) ? $_GET['nom_rayon'] : null;
	$num_etagere=isset($_GET['num_etagere']) ? $_GET['num_etagere'] : null;
	
	
	$cod = $_POST['code'];
	$pri = $_POST['prix'];
	$pri_vente=$_POST['p_vente'];
	$date = $_POST['date'];
	$qte=$_POST['qte'];
	$e_id = $_POST['hiden'];
 
$sql="INSERT INTO article (`code`, `prix`, `p_vente`, `date_expi`, `qte`, `e_id`) VALUES ('$cod', '$pri', '$pri_vente', '$date', '$qte', '$e_id')";
$result = mysqli_query($db, $sql);
if($result){
	
	header("location:addarticle.php?etagere_id=$e_id&nom_rayon=$nom_rayon&num_etagere=$num_etagere");
	
}else {echo "errer de saisir".mysqli_error();}
}