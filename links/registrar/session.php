
<?php 
session_start();
if(!isset($_SESSION['id'])|| !isset($COOKIE['mks'])){
	$_SESSION['id'] = $_COOKIE['mks'];


}

header('location: registrar.php');

?>