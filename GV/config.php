<?php 

// db connections
$db = mysqli_connect('localhost', 'root', '', 'project');

if(!$db || mysqli_error($db)){
    die('DB connection failed, Error: '.mysqli_error($db));
}

mysqli_set_charset($db, 'utf8');

?>