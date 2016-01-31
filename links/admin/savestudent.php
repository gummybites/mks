<?php session_start(); 
error_reporting(0);

 if(!isset($_SESSION['id'])){
                            header('Location: admin.php');

                                exit;

                         
                            }else{

	include ("config2.php");
	$firstname=$_POST['first_name'];
	$middlename=$_POST['middle_name'];
	$lastname=$_POST['last_name'];
	$guardian=$_POST['guardian'];
	$id=$_POST['pid'];
	if($id==null){
			$sql="INSERT INTO tbl_enrolledstudents(first_name,middle_name,last_name,guardian)values(:first_name,:middle_name,:last_name,:guardian)";
			$qry=$db->prepare($sql);
			$qry->execute(array(':first_name'=>$firstname,':middle_name'=>$middlename, ':last_name'=>$lastname,':guardian'=>$guardian));
	}else{
			$sql="UPDATE tbl_enrolledstudents SET first_name=?, middle_name=?, last_name=?, guardian=? where id=?";
			$qry=$db->prepare($sql);
			$qry->execute(array($firstname,$middlename,$lastname,$guardian,$id));	
	}
	echo "<script language='javascript' type='text/javascript'>	alert('Successfully Saved!')</script>";
	echo "<script language='javascript' type='text/javascript'>window.open('studentaccountdatabase.php','_self')</script>";
}
?>