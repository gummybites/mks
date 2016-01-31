<?php session_start();  


 if(!isset($_SESSION['id'])){
                           
 								header('Location: admin.php');
                                exit;

                         
                            }else{
                            	require_once ("config2.php"); 
	$ppid="";
	$firstname="";
	$middlename="";
	$lastname="";	
			
		if(isset($_GET['ppid'])){
			$ppid = $_GET['ppid'];
			$sqlLoader="Select from tbl_employees where id=?";
			$resLoader=$db->prepare($sqlLoader);
			$resLoader->execute(array($ppid));		
	} 
}
?>
<!DOCTYPE>
<html>
<head>


</head>
<?php
 $sqladd="Select * from tbl_employees where id=?";
	$resadd=$db->prepare($sqladd);
	$resadd->execute(array($ppid));
		while($rowadd = $resadd->fetch(PDO::FETCH_ASSOC)){
		$pnum=$rowadd['id'];
		$firstname=$rowadd['firstname'];
		$middlename=$rowadd['middlename'];
		$lastname=$rowadd['lastname'];
			
	}

?>
    <form method="post"   action="saveemployee.php">
    <input type="hidden" name="pid" value="<?php echo $ppid; ?>"/>
        <table>
          
            <tr><td>Firstname</td><td>:</td><td><input type="tel" name="firstname" required="required" value="<?php echo $firstname; ?>"/></td></tr>
            <tr><td>Middlename</td><td>:</td><td><input type="text" name="middlename" required="required" value="<?php echo $middlename; ?>"/></td></tr>
            <tr><td>Lastnmae</td><td>:</td><td><input type="text" name="lastname" required="required" value="<?php echo $lastname; ?>"/></td></tr>
         
            <tr><td></td><td></td><td><input type="submit" value="Save"/></td></tr>
        </table>
    </form>
<body>
</body>
</html>
