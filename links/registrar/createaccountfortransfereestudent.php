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
  if(isset($_POST['createstudentaccountbutton'])){
                 
                        $id=$_POST['get_count'];
                        $applicant_no=$_POST['student_applicant_no'];
                        $student_no=$_POST['student_no'];

                          mysql_query("UPDATE tbl_prospectivestudents set  username= '$student_no' where  id='$id' ");
                          mysql_query("UPDATE tbl_prospectivestudents set  applicant_number= '$applicant_no' where id='$id' ");
                          header("Location:createaccountfortransfereestudent.php");
                          
                        }

?>


<!DOCTYPE html>
<html>
<head>

                
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Create Student Account for Transfee Student</title>
                    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"  rel="stylesheet" type="text/css">
                    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css"  rel="stylesheet" type="text/css">
                    <link rel="stylesheet" href="../../css/style.css"  rel="stylesheet" type="text/css">
                    <link rel="stylesheet" href="../../css/font-awesome.css"  rel="stylesheet" type="text/css">
                     <link rel="stylesheet" href="../../css/font-awesome.min.css"  rel="stylesheet" type="text/css">


                    <script src="../../js/jquery-2.1.1.min.js"></script>
                    <script src="../../bootstrap/js/bootstrap.min.js"></script>
                    <script src="../../js/validation.js"></script>
                    <script src="../../js/jquery.appear.js"></script>
                    <script src="../../js/modernizr.custom.js"></script>
</head>
<style>
                    body{

                    background: url(../../images/body-bg.png);
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
                      background:#f5af02;
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
                      background: #0064d2;
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
                          /* For modal*/
  .modal {
                            display:none;    
                            position: fixed; /* Stay in place */
                            z-index: 1; /* Sit on top */
                            padding-top: 100px; /* Location of the box */
                            left: 0;
                            top: 0;
                            width: 100%; /* Full width */
                            height: 100%; /* Full height */
                            overflow: auto; /* Enable scroll if needed */
                            background-color: rgb(0,0,0); /* Fallback color */
                            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
                        }

                        /* Modal Content */
                        .modal-content {
                            position: relative;
                            background-color: #fefefe;
                            margin: auto;
                            padding: 0;
                            border: 1px solid #888;
                            width: 50%;
                            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
                            -webkit-animation-name: animatetop;
                            -webkit-animation-duration: 0.4s;
                            animation-name: animatetop;
                            animation-duration: 0.4s
                        }

                        /* Add Animation */
                        @-webkit-keyframes animatetop {
                            from {top:-300px; opacity:0} 
                            to {top:0; opacity:1}
                        }

                        @keyframes animatetop {
                            from {top:-300px; opacity:0}
                            to {top:0; opacity:1}
                        }

                        /* The Close Button */
                        #close {
                            color: white;
                            float: right;
                            font-size: 28px;
                            font-weight: bold;
                        }

                        #close:hover,
                        #close:focus {
                            color:  #f5af02;
                            text-decoration: none;
                            cursor: pointer;
                        }

                        .modal-header {
                            padding: 10px 16px;
                            background-color: #0064d2; 
                            color: white;
                        }

                        .modal-body {
                          padding: 2px 16px;}

                        .modal-footer {
                            padding: 20px 16px;
                            background-color: #0064d2; 
                            color: white;
                        }

                        #cancel{
                          background-color: #f5af02;
                          box-shadow: 0 0 1px rgba(0, 0, 0, 0);
                          -webkit-backface-visibility: hidden;
                          backface-visibility: hidden;
                          -moz-osx-font-smoothing: grayscale;
                          border: transparent;

                        }
                        #ok{
                          background-color: #f5af02;
                          box-shadow: 0 0 1px rgba(0, 0, 0, 0);
                          -webkit-backface-visibility: hidden;
                          backface-visibility: hidden;
                          -moz-osx-font-smoothing: grayscale;
                          border:transparent;

                        }

                       
</style>  
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
      <li><a href="manageuser.php"><img src="../../photos /<?php echo $db_photofile?>" class="img-circle" width="20px" height="20px"> <?php echo $db_username?>  </a></li>
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
        <li class="active"><a href="createaccounts.php"><i class="fa fa-plus"></i><span>Create acount</span> </a> </li>
        <li><a href="admission.php"><i class="fa fa-archive"></i><span>Admission</span> </a></li>
        <li><a href="inquiry.php"><i class="fa fa-newspaper-o"></i><span>Inquiry</span> </a> </li>
        <li><a href="faculty.php"><i class="fa fa-users"></i><span>Faculty</span> </a> </li>
        <li><a href="form.php"><i class="fa fa-file-pdf-o"></i><span>Form</span> </a> </li>
        <li><a href="event.php"><i class="fa fa-calendar-minus-o"></i><span>Event & Annoucement</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-long-arrow-down"></i><span>Manage</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="manageuser.php"><i class="fa fa-user-secret"></i> Admin Profile</a></li>
            <li><a href="deleteddetails.php"><i class="fa fa-trash-o"></i> Archive files</a></li>
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

<ul class="nav nav-tabs">
  <li ><a href="createaccountfornewstudent.php"><i class="fa fa-plus"></i> Create Account for New Student</a></li> 
  <li class="active"><a href="#"><i class="fa fa-plus"></i> Create Account for Transferee Student</a></li>  
  <li><a href="createaccounts.php"><i class="fa fa-mail-reply"></i> Back to home account</a>
  </li>                                                 
</ul>



         <div class='demo_jui'>
           <table cellpadding='0' cellspacing='1' border='1' class='display' id='tbl' class='jtable'>
                                        <thead>
                                                        <tr>
                                                        <td><center>Student number</center></td>
                                                        <td><center>Status</center></td>
                                                        <td><center>Full name</center></td>
                                                        <td><center>Action</center></td>
                                                        </tr>

                                        </thead>
                    <?php
                    $qry="SELECT * from tbl_prospectivestudents where prospectivestatus='accepted' and status='Transferee' ";
                    $result=mysql_query($qry);

                     if(mysql_num_rows($result) >= 0) 
                     {
                                
                                  $z=0;
                                  while($qry= mysql_fetch_assoc($result)){
                                  $id=$qry['id'];
                                  $studentaccount=$qry['username'];
                                  $sname=$qry['surname'];
                                  $fname=$qry['firstname'];
                                  $mname=$qry['middlename'];
                                  $status=$qry['status'];
                                  $applicant_no=$qry['applicant_number'];
                                  $z++;


                                   if($applicant_no!='0'){
                                      ?>  
                                      <tr>
                                      <td><center style="background-color: green; color: white"><?php echo $studentaccount?></center></td>
                                      <td><center><?php echo $status?></center></td>
                                      <td><center><?php echo $sname.','.$fname.','.$mname?></center></td>
                                      <td><center>--</center></td>
                                      </tr>
                                      <?php
                                  }else{
                                      ?>  
                                      <tr>
                                       <td><center style="background-color: red; color: white">--</center></td>
                                      <td><center><?php echo $status?></center></td>
                                      <td><center><?php echo $sname.','.$fname.','.$mname?></center></td>
                                       <td><center><a href="createaccountfortransfereestudent.php?id=<?php echo $id?>&&applicant=<?php echo $z?>">Create</a></center></td>
                                      </tr>
                                      <?php

                                  }
                                                                          }
                    }
                    ?>



                                    
          </table>
        </div>



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
if(isset($_GET['id'])){
$get_count=$_GET['id'];
$z=$_GET['applicant'];

$details="SELECT * from tbl_prospectivestudents where id='$get_count' ";
$res_details=mysql_query($details);

  while($details=mysql_fetch_assoc($res_details)){
                            $id=$details['id'];
                            $sname=$details['surname'];
                            $fname=$details['firstname'];
                            $mname=$details['middlename'];
                            }

$qry="SELECT * from tbl_prospectivestudents where prospectivestatus='accepted' and status='new student'";
$result=mysql_query($qry);
$y= 4008;
$div=1315;
$admission_number = $y.$div.$z;

?>
<!-- The Modal -->
<div id="myModal" style="display: none;" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span id="close">×</span>

    </div>
    <div class="modal-body">
      <p>Are you sure you want to create account for <?php echo $sname.','. $fname. ','. $mname?>?</p>
      <p>Student Account will be <?php echo $admission_number?></p>
    </div>
    <div class="modal-footer">
    <form method="POST">
    <button id='ok' name='createstudentaccountbutton'>Create</button>
    <input type="hidden" name="get_count" value="<?php echo $get_count?>">
    <input type="hidden" name="student_no" value="<?php echo $admission_number?>">
     <input type="hidden" name="student_applicant_no" value="<?php echo $z?>">
    </form>

    </div>
  </div>

</div>
<?php
} 
?>
    <?php }?>