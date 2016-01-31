<?php 
session_start();  


 if(!isset($_SESSION['id'])){
                            header('Location:admin.php');

                                exit;

                         
                            }else{
	include ("config2.php");
	$pid=$_GET['pid'];
	$sql="DELETE FROM tbl_students where id=?";
	$qry=$db->prepare($sql);
	$qry->execute(array($pid));
		echo "<script language='javascript' type='text/javascript'>alert('Successfully Deleted!')</script>";
		echo "<script language='javascript' type='text/javascript'>window.open('studentaccountdatabase.php','_self')</script>";
	

}

?>