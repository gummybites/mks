<?php session_start();
include('../config.php');

if(!isset($_SESSION['id'])){
header('Location: registrarlogin.php');
exit;



}else{


$_SESSION['id']; 
$type = $_SESSION['id'];
$qry ="SELECT * from tbl_registrar WHERE id = '$type' ";
$result = mysql_query($qry);
while($qry = mysql_fetch_array($result))
{
$db_id=$qry['id'];
$db_username = $qry['username'];
$db_password=$qry['password'];
$db_photofile=$qry['photo_file'];

}
  ?>



<?php
if(isset($_POST['updatesubjectdescription'])){
  $subjectcodes=$_POST['subjectidcode'];
  $units=$_POST['units'];
  $subjectnames=$_POST['subjectnames'];


  mysql_query("UPDATE tbl_subjects set subjects='$subjectnames',unit='$units' where id='$subjectcodes'  ");
  header("Refresh:1");



}

?>

<?php
if(isset($_POST['Addinstructor'])){
  $username=$_POST['instructorusername'];
  $password=$_POST['instructorpassword'];
  $name=$_POST['instructorname'];
  $address=$_POST['instructoraddress'];
  $gender=$_POST['instructorgender'];
  $specialization=$_POST['instructorspecialization'];
  $email=$_POST['instructoremail'];

  $qry = "SELECT * from tbl_instructor";
                                  $result = mysql_query($qry);

                                  if(mysql_num_rows($result) >= 0)
                                  {
                                  $x = 1; 
                                  while($qry = mysql_fetch_array($result))
                                  { 
                                  $x++; 
                                  } 

   
                                  }
  mysql_query("INSERT INTO tbl_instructor (id,Fullname,Address,Gender,Specialization,Email_address,Instructor_Account,Instructor_Password) values('$x','$name','$address','$gender','$specialization','$email','$username','$password' )");




}

if(isset($_POST['Updateinstructor'])){
  $id=$_POST['id'];
  $name=$_POST['instructorname'];
  $address=$_POST['instructoraddress'];
  $gender=$_POST['instructorgender'];
  $specialization=$_POST['instructorspecialization'];
  $email=$_POST['instructoremail'];

  mysql_query("UPDATE tbl_instructor set Fullname='$name', Address='$address',Gender='$gender', Specialization='$specialization', Email_address='$email' where id='$id'");
  header("Refresh:1");




}

if(isset($_POST['Deleteinstructor'])){
  $id=$_POST['id'];

  mysql_query("DELETE from tbl_instructor where id='$id'");
  header("Location: faculty.php");

}

 ?>


<!DOCTYPE html>
<html>
<head>

                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Faculty</title>
                    <link rel="stylesheet" href="../../css/bootstrap.min.css"></link>
                    <link rel="stylesheet" href="../../css/bootstrap.css"></link>
                    <link rel="stylesheet" href="../../css/style.css"></link>
                    <link rel="stylesheet" href="../../css/font-awesome.css"></link>
                     <link rel="stylesheet" href="../../css/font-awesome.min.css"></link>

                    <script src="../../js/dropdown.js"></script>
                    <script src="../../js/bootstrap.min.js"></script>
                    <script src="../../js/jquery.1.11.1.js"></script>
                    <script src="../../js/bootstrap.js"></script>
                    <script src="../../js/validation.js"></script>
<head>
<style>
					body{

                    background: url(../../images/45.gif); background-size: cover;  font: 15px/1.7em 'Calibri';
                    }

                    #next {
                      display: inline-block;
                      vertical-align: middle;
                      padding: 0.9em 2.3em;
                      color:#fff;
                      -webkit-transform: translateZ(0);
                      transform: translateZ(0);
                      box-shadow: 0 0 1px rgba(0, 0, 0, 0);
                      -webkit-backface-visibility: hidden;
                      backface-visibility: hidden;
                      -moz-osx-font-smoothing: grayscale;
                      position: relative;
                      background: #0064d2;
                      -webkit-transition-property: color;
                      transition-property: color;
                      -webkit-transition-duration: 0.3s;
                      transition-duration: 0.3s;
                      text-decoration:none;
                      margin:1em 0 0;
                      border: transparent;
                    }
                    #next:before {
                      content: "";
                      position: absolute;
                      z-index: -1;
                      top: 0;
                      bottom: 0;
                      left: 0;
                      right: 0;
                      background:#f5af02;
                      -webkit-transform: scaleX(0);
                      transform: scaleX(0);
                      -webkit-transform-origin: 50%;
                      transform-origin: 50%;
                      -webkit-transition-property: transform;
                      transition-property: transform;
                      -webkit-transition-duration: 0.3s;
                      transition-duration: 0.3s;
                      -webkit-transition-timing-function: ease-out;
                      transition-timing-function: ease-out;
                      text-decoration:none;
                    }

                    #next:hover, #next:focus, #next:active {
                          color: #fff;
                        }
                        #next:hover:before, #next:focus:before, #next:active:before {
                          -webkit-transform: scaleX(1);
                          transform: scaleX(1);
                        }
</style>


</head>
<body>




 <nav class="navbar-inner navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    
      <a class="navbar-brand" href="#">MKS</a>
    </div>

     <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    
     
     <ul class="nav navbar-nav navbar-right">
      <li><a href=""><img src="../../photos /<?php echo $db_photofile?>" class="img-circle" width="20px" height="20px"> <?php echo $db_username?>  </a></li>
        <li> <a href="logout.php?logout=<?php echo $db_id ?>"> <i class="glyphicon glyphicon-log-out"> </i> Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li ><a href="registrar.php"><i class="fa fa-home"></i><span>Home</span> </a> </li>
        <li ><a href="createaccounts.php"><i class="fa fa-plus"></i><span>Create acount</span> </a> </li>
        <li><a href="admission.php"><i class="fa fa-archive"></i><span>Admission</span> </a></li>
        <li><a href="inquiry.php"><i class="fa fa-newspaper-o"></i><span>Inquiry</span> </a> </li>
        <li class="active"><a href="faculty.php"><i class="fa fa-users"></i><span>Faculty</span> </a> </li>
        <li><a href="form.php"><i class="fa fa-file-pdf-o"></i><span>Form</span> </a> </li>
        <li><a href="event.php"><i class="fa fa-calendar-minus-o"></i><span>Event & Annoucement</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-long-arrow-down"></i><span>Manage</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="manageuser.php"><i class="fa fa-user-secret"></i> Admin Profile</a></li>
            <li><a href="deleteddetails.php"><i class="fa fa-trash-o"></i> Deleted details</a></li>
            <li><a href="listofsubjects.php"><i class="fa fa-th-list"></i><span> List of Subjects</span> </a> </li>
            <li><a href="listofschedule.php"><i class="fa fa-clock-o"></i><span> List of Schedule</span> </a> </li>
            <li><a href="breakdownoftuitionfees.php"><i class="fa fa-money"></i> Breakdown of tuition Fees</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>


<div class="container">
    
<?php
if(isset($_POST['newinstructor'])){

   $qry="SELECT * from tbl_instructor";
                    $result=mysql_query($qry);
  
                             if(mysql_num_rows($result) >= 0) 
                              {
                                 $z=1;
                                 $y= 4008;
                                 $emp='EMP';
                                while($qry= mysql_fetch_array($result)){
                                
                                 
                                 $id_subject=$qry['id'];
                                 $fullname=$qry['Fullname'];
                                 $Address=$qry['Address'];
                                 $Gender=$qry['Gender'];
                                 $Specialization=$qry['Specialization'];
                                 $Email_Add=$qry['Email_address'];
                                 $Instructor_Account=$qry['Instructor_Account'];
                                 $Instructor_Password=$qry['Instructor_Password'];
                                 $z++;
                                 
                               }
                                 $admission_number = $emp.$y.$z; 
                                 //For OR Reference
                                  $chars = "012345678901234567ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

                                  $reference_number = '';
                                   
                                  for ($i = 0; $i < 6; $i++) 
                                  {
                                      $reference_number .= $chars[rand(0, strlen($chars)-1)];
                                  } 
                               }

   
  ?>
     <form method="POST">
    <div class="row-group">
        <div class="row">
        <div class="col-md-4">

        </div>

        <div class="col-md-4">
        Add Instructor
        </div>

        <div class="col-md-4">
        </div>
        </div>


        <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-4">
        Generated Instructor ID:<input type="text" class="form-control" name="instructorusername" value="<?php echo $admission_number?>" readonly>
        </div>

        <div class="col-md-4">
        </div>

        </div>

        <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-4">
        Default Password:<input type="text" class="form-control" name="instructorpassword" value="<?php echo $reference_number?>" readonly>
        </div>

        <div class="col-md-4">
        </div>

        </div>


        <div class="row">
        <div class="col-md-4">

        </div>

        <div class="col-md-4">
        Full name:<input type="text" class="form-control" value="" name="instructorname">
        </div>

        <div class="col-md-4">
        </div>
        </div>


        <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-4">
        Address:<input type="text" class="form-control" value="" name="instructoraddress">
       
        </div>

        <div class="col-md-4">
        </div>

        </div>


        <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-4">
        Gender:
        <select class="form-control"  name="instructorgender">
          <option></option>
          <option>Male</option>
          <option>Female</option>

        </select>
        </div>

        <div class="col-md-4">
        </div>

        </div>


        <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-4">
        Specialization:<input type="text" class="form-control" name="instructorspecialization" value="">
        </div>

        <div class="col-md-4">
        </div>

        </div>

        <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-4">
        Email Address:<input type="text" class="form-control" name="instructoremail" value="">
        </div>

        <div class="col-md-4">
        </div>

        </div>

        <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-4">
        <input type="hidden" value="<?php echo $id?>" name="subjectidcode">
        <a href="faculty.php" id="next">Back</a>
        <button type="submit" id="next" name="Addinstructor">Add</button>
        </div>

        <div class="col-md-4">
        </div>

        </div>

    </div>

    
    </form>
    <br>
    <?php

}elseif(isset($_GET['edit'])){
  $id=$_GET['edit'];

    $qry="SELECT * from tbl_instructor where id='$id'";
    $res=mysql_query($qry);

    while($qry=mysql_fetch_array($res)){
                                $id_subject=$qry['id'];
                                 $fullname=$qry['Fullname'];
                                 $Address=$qry['Address'];
                                 $Gender=$qry['Gender'];
                                 $Specialization=$qry['Specialization'];
                                 $Email_Add=$qry['Email_address'];
                                 $Instructor_Account=$qry['Instructor_Account'];
                                 $Instructor_Password=$qry['Instructor_Password'];


    }

    ?>
    <form method="POST">
    <div class="row-group">
        <div class="row">
        <div class="col-md-4">

        </div>

        <div class="col-md-4">
        Add Instructor
        </div>

        <div class="col-md-4">
        </div>
        </div>


        <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-4">
        Generated Instructor ID:<input type="text" class="form-control" name="instructorusername" value="<?php echo $Instructor_Account?>" readonly>
        </div>

        <div class="col-md-4">
        </div>

        </div>

        <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-4">
        Default Password:<input type="text" class="form-control" name="instructorpassword" value="<?php echo $Instructor_Password?>" readonly>
        </div>

        <div class="col-md-4">
        </div>

        </div>


        <div class="row">
        <div class="col-md-4">

        </div>

        <div class="col-md-4">
        Full name:<input type="text" class="form-control" value="<?php echo $fullname ?>" name="instructorname">
        </div>

        <div class="col-md-4">
        </div>
        </div>


        <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-4">
        Address:<input type="text" class="form-control" value="<?php echo $Address ?>" name="instructoraddress">
       
        </div>

        <div class="col-md-4">
        </div>

        </div>


        <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-4">
        Gender:
        <select class="form-control"  name="instructorgender">
          <?php if($Gender=='Male'){
                ?>
                 <option><?php echo $Gender?></option>
                 <option>Female</option>


                <?php
            }elseif($Gender=='Female'){
                ?>
                <option><?php echo $Gender?></option>
                 <option>Male</option>

                <?php

              }?>

   
          
         

        </select>
        </div>

        <div class="col-md-4">
        </div>

        </div>


        <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-4">
        Specialization:<input type="text" class="form-control" name="instructorspecialization" value="<?php echo $Specialization?>">
        </div>

        <div class="col-md-4">
        </div>

        </div>

        <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-4">
        Email Address:<input type="text" class="form-control" name="instructoremail" value="<?php echo $Email_Add?>">
        </div>

        <div class="col-md-4">
        </div>

        </div>

        <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-4">
        <input type="hidden" value="<?php echo $id?>" name="subjectidcode">
        <a href="faculty.php" id="next">Back</a>
        <button type="submit" id="next" name="Updateinstructor">Update</button>
        <input type="hidden" name="id" value="<?php echo $id?>">
        </div>

        <div class="col-md-4">
        </div>

        </div>

    </div>

    
    </form>
    <br>
    <?php


}else{  

?>                        

                         

                                
                                   <div class='demo_jui'>
                        <table cellpadding='0' cellspacing='1' border='1' class='display' id='tbl' class='jtable'>
                                    <thead>         <tr><td colspan="6"><center>List of Instructors</center></td></tr>
                                                    <tr>
                                                    <td><center>Full name</center></td>
                                                    <td><center>Address</center></td>
                                                    <td><center>Gender</center></td>
                                                    <td><center>Specialization</center></td>
                                                    <td><center>Email Add</center></td>
                                                    <td><center>Action</center></td>
                                                    </tr>

                                    </thead>
                                    <?php $qry= "SELECT * from tbl_instructor";
                                    $res= mysql_query($qry);

                                    while($qry= mysql_fetch_array($res)){
                                      $id_ins=$qry['id'];
                                      $fullname=$qry['Fullname'];
                                      $Address=$qry['Address'];
                                      $Gender=$qry['Gender'];
                                      $Specialization=$qry['Specialization'];
                                      $Email_Add=$qry['Email_address'];
                                      $Instructor_Account=$qry['Instructor_Account'];
                                      $Instructor_Password=$qry['Instructor_Password'];                  


                                      ?>
                                      <tr>
                                      <td><center><?php echo $fullname?></center></td>
                                      <td><center><?php echo $Address?></center></td>
                                      <td><center><?php echo $Gender?></center></td>
                                      <td><center><?php echo $Specialization?></center></td>
                                      <td><center><?php echo $Email_Add?></center></td>
                                      <td><center><a href="faculty.php?edit=<?php echo $id_ins?>">Edit</a> | <a href="faculty.php?delete=<?php echo $id_ins?>">Delete</a> | <a href="">List of Loads</a></center></td>
                                      </tr>
                                      <?php
                                                                    
                                                                               }

                                    ?>
                                </table>
                                </div>
                              <form method="POST">
                               <button id="next" name="newinstructor">Add Instructor</button>
                              </form>



<?php }//kapag naka set yung newinstructor?>




</div>
	
	  	






<style type="text/css" title="currentStyle">
            @import "../../css/demo_table_jui.css";
        </style>
<script src="../../js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf-8">
            jQuery(document).ready(function() {
                oTable = jQuery('#tbl').dataTable({
                    "bJQueryUI": true, 
                    "sPaginationType": "full_numbers"
                                } );

                });     
        </script>
<script>
 $(document).ready(function(){
  $('#myModal').show();


     $("#close").click(function(){
        $('#myModal').hide();
     });

      $("#cancel").click(function(){
        $('#myModal').hide();
     });
  });

</script>
</body>
</html>
<?php 
if(isset($_GET['delete'])){
$id=$_GET['delete'];

$qry="SELECT * from tbl_instructor where id='$id'";
$res=mysql_query($qry);

  while($qry=mysql_fetch_assoc($res)){
                                 $id_subject=$qry['id'];
                                 $fullname=$qry['Fullname'];
                                 $Address=$qry['Address'];
                                 $Gender=$qry['Gender'];
                                 $Specialization=$qry['Specialization'];
                                 $Email_Add=$qry['Email_address'];
                                 $Instructor_Account=$qry['Instructor_Account'];
                                 $Instructor_Password=$qry['Instructor_Password'];
                            }
?>
<!-- The Modal -->
<div id="myModal" style="display: none;" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span id="close">×</span>

    </div>
    <div class="modal-body">
      <p>Are you sure you want to delete details of <?php echo $fullname; ?>?</p>
    
    </div>
    <div class="modal-footer">
    <form method="POST">
    <button id='ok' name='Deleteinstructor'>Ok</button>
    <input type="hidden" name="id" value="<?php echo $id?>">
    </form>

    </div>
  </div>

</div>



<?php
}
?>
    <?php }?>