
<?php 

if(!isset($_SESSION['admission_num'])){
	echo "Access denied!";
	$expire=time()-86400;
	header("Refresh:1; url=student.php");
	   exit;
}else{


}


?>