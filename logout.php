<?php
//include config
require_once('dbconfig.php');

//log user out
$user->logout();
header('Location: index.php'); 

?>