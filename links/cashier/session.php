
<?php 
session_start();
if(!isset($_SESSION['username'])|| !isset($COOKIE['mks'])){
	$_SESSION['username'] = $_COOKIE['mks'];


}

header('location: cashier.php');

?>