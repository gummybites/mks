<?php session_start();  
error_reporting(0);

 if(!isset($_SESSION['id'])){
                            header('Location: admin.php');

                                exit;

                         
                            }else{
	include ("config2.php");

	$firstname=$_POST['firstname'];
	$middlename=$_POST['middlename'];
	$lastname=$_POST['lastname'];

	$id=$_POST['pid'];
	if($id==null){
			$sql="INSERT INTO tbl_employees(firstname,middlename,lastname)values(:firstname,:middlename,:lastname)";
			$qry=$db->prepare($sql);
			$qry->execute(array(':firstname'=>$firstname,':middlename'=>$middlename, ':lastname'=>$lastname));
	}else{
			$sql="UPDATE tbl_employees SET firstname=?, middlename=?, lastname=? where id=?";
			$qry=$db->prepare($sql);
			$qry->execute(array($firstname,$middlename,$lastname,$id));	
	}
	echo "<script language='javascript' type='text/javascript'>alert('Successfully Saved!')</script>";
	echo "<script language='javascript' type='text/javascript'>window.open('employeeaccountdatabase.php','_self')</script>";

	}
?>