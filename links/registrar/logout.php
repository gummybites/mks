


<?php session_start();
if (!isset($_SESSION['id'])){
	header('Location: registrarlogin.php');
	
}else {

	include('../config.php');
	if(isset($_GET['logout'])){
		$id=$_GET['logout'];
    date_default_timezone_set('Asia/Manila');
    $time= Date('F d, Y, g:ia'); 
                       

	mysql_query("UPDATE tbl_registrar set time_out='$time' where id='$id'");

	$query="SELECT * from tbl_registrar where id='$id'";
    $result=mysql_query($query);
    	while($query=mysql_fetch_array($result)){
   		$db_id=$query['id'];
   		$db_username=$query['username'];
   		$db_password=$query['password'];
   		$db_photofile=$query['photo_file'];
   		$db_phototype=$query['photo_type'];
   		$db_photosize=$query['photo_size'];
   		
   	}

    $qry="SELECT id from tbl_registrar";
    $res=mysql_query($qry);

    if(mysql_num_rows($res)>=0){
   	$z=1;

   	while($qry=mysql_fetch_array($res)){
   	$z++;
   	}
    }

    mysql_query("INSERT INTO  tbl_registrar (id,username,password,time_in, time_out, photo_file, photo_size, photo_type) values ('$z','$db_username', '$db_password','','','$db_photofile','$db_photosize','$db_phototype')");

    	
	$expire=time()-86400;
	setcookie('mks', $_SESSION['id'], $expire);
	session_destroy();
	header("Refresh:1; url=registrarlogin.php");
	}




}
	 ?>

