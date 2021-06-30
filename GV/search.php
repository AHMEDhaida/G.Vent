<?php 
include_once './config.php';
$q = isset($_GET['q']) ? $_GET['q'] : null;

if(!$q){
	die(json_encode([
     'status' => 'error'
    ]));
}

$query = mysqli_query($db, "SELECT nom FROM client WHERE nom LIKE '%{$q}%'");
echo mysqli_error($db);
if(!mysqli_num_rows($query)){
	die(json_encode([
     'status' => 'error'
    ]));
}

$clients = [];
while($row = mysqli_fetch_assoc($query)){
	$clients[] = $row;
}

die(json_encode([
 'status' => 'ok',
  'clients' => $clients
]));