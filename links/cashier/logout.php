


<?php session_start();
if (!isset($_SESSION['id'])){
	header('Location: cashierlogin.php');
	
}else {

	$expire=time()-86400;
	setcookie('mks', $_SESSION['id'], $expire);
	session_destroy();
	header("Refresh:1; url=cashierlogin.php");
}
	 ?>

