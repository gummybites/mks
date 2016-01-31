<?php session_start();
	$expire=time()-86400;
	session_destroy();
	header("Refresh:1; url=teacher.php");
	 ?>