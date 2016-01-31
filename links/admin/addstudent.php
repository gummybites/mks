<?php  session_start();  


 if(!isset($_SESSION['id'])){
                           header('Location: admin.php');

                                exit;

                         
                            }else{
require_once ("config2.php"); 
	$ppid="";
	$firstname="";
	$middlename="";
	$lastname="";	
	$guardian="";				
		if(isset($_GET['ppid'])){
			$ppid = $_GET['ppid'];
			$sqlLoader="Select from tbl_enrolledstudents where id=?";
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

		$sqladd="Select * from tbl_enrolledstudents where id=?";
	$resadd=$db->prepare($sqladd);
	$resadd->execute(array($ppid));
		while($rowadd = $resadd->fetch(PDO::FETCH_ASSOC)){
		$pnum=$rowadd['id'];
		$firstname=$rowadd['first_name'];
		$middlename=$rowadd['middle_name'];
		$lastname=$rowadd['last_name'];
		$guardian=$rowadd['guardian'];		
	}

?>
    <form method="post"   action="savestudent.php">
    <input type="hidden" name="pid" value="<?php echo $ppid; ?>"/>
        <table>
          
            <tr><td>Firstname</td><td>:</td><td><input type="tel" name="first_name" required="required" value="<?php echo $firstname; ?>"/></td></tr>
            <tr><td>Middlename</td><td>:</td><td><input type="text" name="middle_name" required="required" value="<?php echo $middlename; ?>"/></td></tr>
            <tr><td>Lastnmae</td><td>:</td><td><input type="text" name="last_name" required="required" value="<?php echo $lastname; ?>"/></td></tr>
            <tr><td>Guardian</td><td>:</td><td><input type="text" name="guardian" required="required" value="<?php echo $guardian; ?>"/></td></tr>
            <tr><td></td><td></td><td><input type="submit" value="Save"/></td></tr>
        </table>
    </form>
<body>
</body>
</html>
