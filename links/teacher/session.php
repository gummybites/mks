
<?php 

if(!isset($_SESSION['id'])){
	echo "Access denied!";
	$expire=time()-86400;
	header("Refresh:1; url=teacher.php");
	   exit;
}else{


}


?>