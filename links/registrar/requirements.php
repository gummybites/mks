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
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && count($_POST) < 1 ) {
    $_SESSION['error'] = 'File upload size exceeded';
    header('Location: requirements.php');
    return;
    }                                                                     
   ?>


<?php 
if(isset($_POST['deletedpicture'])){
                                         $deleteid=$_POST['deleteid'];

                                         mysql_query("DELETE  from tbl_studentimages where id='$deleteid'");
                                         header("Location: requirements.php?id=$deleteid");





                                      }
if(isset($_POST['deletedrequirement1'])){
                                         $deleteid=$_POST['deleterequirement1'];

                                         mysql_query("UPDATE tbl_studentrequirements set form138_file='', form138_type='', form138_size='', Form138='0' where id='$deleteid'");
                                         header("Location: requirements.php?id=$deleteid");





                                      }
if(isset($_POST['deletedrequirement2'])){
                                         $deleteid=$_POST['deleterequirement2'];

                                         mysql_query("UPDATE tbl_studentrequirements set goodmoral_file='', goodmoral_type='', goodmoral_size='', GoodMoral='0' where id='$deleteid'");
                                         header("Location: requirements.php?id=$deleteid");





                                      }
if(isset($_POST['deletedrequirement3'])){
                                         $deleteid=$_POST['deleterequirement3'];

                                         mysql_query("UPDATE tbl_studentrequirements set birthcertificate_file='', birthcertificate_type='', birthcertificate_size='', BirthCertificate='0' where id='$deleteid'");
                                         header("Location: requirements.php?id=$deleteid");





                                      }
if(isset($_POST['deletedrequirement4'])){
                                         $deleteid=$_POST['deleterequirement4'];

                                         mysql_query("UPDATE tbl_studentrequirements set form137_file='', form137_type='', form137_size='', Form137='0' where id='$deleteid'");
                                         header("Location: requirements.php?id=$deleteid");





                                      }

?>


<!DOCTYPE html>
<html>
<head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Requirements</title>
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
                    .btn-file {
                          position: relative;
                          overflow: hidden;
                      }
                      .btn-file input[type=file] {
                          position: absolute;
                          top: 0;
                          right: 0;
                          min-width: 100%;
                          min-height: 100%;
                          font-size: 100px;
                          text-align: right;
                          filter: alpha(opacity=0);
                          opacity: 0;
                          outline: none;
                          background: white;
                          cursor: inherit;
                          display: block;
                      }

                       .btn-file1 input[type=file] {
                          position: absolute;
                          top: 0;
                          right: 0;
                          min-width: 100%;
                          min-height: 100%;
                          font-size: 100px;
                          text-align: right;
                          filter: alpha(opacity=0);
                          opacity: 0;
                          outline: none;
                          background: white;
                          cursor: inherit;
                          display: block;
                      }

                      .btn-file2 input[type=file] {
                          position: absolute;
                          top: 0;
                          right: 0;
                          min-width: 100%;
                          min-height: 100%;
                          font-size: 100px;
                          text-align: right;
                          filter: alpha(opacity=0);
                          opacity: 0;
                          outline: none;
                          background: white;
                          cursor: inherit;
                          display: block;
                      }

                      .btn-file3 input[type=file] {
                          position: absolute;
                          top: 0;
                          right: 0;
                          min-width: 100%;
                          min-height: 100%;
                          font-size: 100px;
                          text-align: right;
                          filter: alpha(opacity=0);
                          opacity: 0;
                          outline: none;
                          background: white;
                          cursor: inherit;
                          display: block;
                      }

                      .btn-file4 input[type=file] {
                          position: absolute;
                          top: 0;
                          right: 0;
                          min-width: 100%;
                          min-height: 100%;
                          font-size: 100px;
                          text-align: right;
                          filter: alpha(opacity=0);
                          opacity: 0;
                          outline: none;
                          background: white;
                          cursor: inherit;
                          display: block;
                      }

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
                            padding: 30px 20px;
                            background-color: #0064d2; 
                            color: white;
                        }

                        .modal-body {
                          padding: 5px 16px;}

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
<body >
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
        <li><a href="createaccounts.php"><i class="fa fa-plus"></i><span>Create acount</span> </a> </li>
        <li><a href="admission.php"><i class="fa fa-archive"></i><span>Admission</span> </a></li>
        <li  class="active"><a href="inquiry.php"><i class="fa fa-newspaper-o"></i><span>Inquiry</span> </a> </li>
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



<?php
if(isset($_GET['id'])){
  $get_id=$_GET['id'];
?>
<ul class="nav nav-tabs">
  <li class="active"><a href="#" data-toggle="tab">Requirements</a>
  </li>
  <li><a href="requirements.php" id="next">Back to list</a>
  </li>
</ul>

<center><p id='message'></p></center>
   <br>
                                   
                                   <?php
                                    $information = "SELECT * from tbl_prospectivestudents where id='$get_id'";
                                    $information_result = mysql_query($information);
                                                                                  
                                    while($information = mysql_fetch_array($information_result))
                                    {
                                      $email=$information['email'];
                                      $user=$information['username'];
                                      $fname=$information['firstname'];
                                      $mname=$information['middlename'];
                                      $sname=$information['surname'];
                                      $status=$information['status'];


                                    }
                                   //Displaying photo
                                    $photo= "SELECT * from tbl_studentimages where id='$get_id'";
                                    $profile= mysql_query($photo);

                                    if($photo=mysql_fetch_array($profile)){
                                      $id=$photo['id'];
                                      $filephoto= $photo['file'];
                                      $file_name1=$photo['size'];
                                      $file_type1=$photo['type'];

                                             ?>
                                            <form method="POST" enctype="multipart/form-data">
                                                <div class="col-md-12">

                                                <div class="form-group">
                                                 <div class="row">
                                                <div class="col-md-6">
                                                Full Name: <?php echo $sname.','. $fname.','.$mname?>
                                                </div>
                                                </div>

                                                <div class="row">
                                                <div class="col-md-6">
                                                Status: <?php if($status=='new student'){
                                                              echo "Not Transferee";
                                                              }else{
                                                              echo "$status";
                                                              }?>        
                                                </div>
                                                </div>

                                                <div class="row">
                                                <div class="col-md-4">
                                                </div>
                                                <div class="col-md-4">
                                                </div>
                                                <div class="col-md-4">
                                                <div class="form-group">
                                                2x2 picture:
                                                <center><img src="../../photos/<?php echo $filephoto ?>" width='139px' height='144px'></center>  
                                                </div>


                                                <div class='form-group input-group'>
                                             
                                                <input type='text' value="<?php echo $filephoto?>" class='form-control' readonly />
                                                <span class='input-group-btn'>
                                                        <a href="requirements.php?id=<?php echo $get_id?>&&deletepicture=<?php echo $get_id?>" class='btn btn-primary' name='deletepicture'>Delete</a>
                                                </span>
                                              </div>
                                              </div>
                                              <input type="hidden" name='get_count' value="<?php echo $get_id?>">

                                            </div>
                                            </div>
                                            </div>
                                            </form>
                   
                                            <?php
                                          }else{
                                            ?>
                                            <form method="POST" enctype="multipart/form-data">
                                             <div class="col-md-12">

                                                <div class="form-group">
                                                <div class="row">
                                                <div class="col-md-6">
                                                Full Name: <?php echo $sname.','. $fname.','.$mname?>
                                                </div>
                                                </div>
                                                <div class="row">
                                                <div class="col-md-6">
                                                Status: <?php if($status=='new student'){
                                                              echo "Not Transferee";
                                                              }else{
                                                              echo "$status";
                                                              }?>        
                                                </div>
                                                </div>
                                              

                                              <div class="row">
                                              <div class="col-md-4">
                                              </div>
                                              <div class="col-md-4">
                                              </div>
                                              <div class="col-md-4">
                                                <div class="form-group">
                                                 2x2 picture:
                                                <center><img src="../../images/user.png" width='139px' height='144px'></center>  
                                                </div>


                                                <div class='form-group input-group'>
                                                <span class='input-group-btn'>
                                                    <span class=' btn btn-default btn-file'>
                                                        Browse... <input type='file' name='file'>
                                                    </span>
                                                </span>
                                                <input type='text' id='valdfil' class='form-control' readonly />
                                                <span class='input-group-btn'>
                                                        <button class='btn btn-default' name='insertpicture'>Upload</button>
                                                </span>
                                              </div>
                                            </div>
                                       
                                            <input type="hidden" name='get_count' value="<?php echo $get_id?>">
                                            </div>
                                            </div>
                                            </div>
                                            </form>
                                 
                                      <?php
                                    }
                                ?>




                                <?php
                                

                                $requirements="SELECT * from tbl_studentrequirements where id='$get_id'";
                                $res_requirements=mysql_query($requirements);

                                while($requirements=mysql_fetch_array($res_requirements)){
                                      $form138_file= $requirements['form138_file'];
                                      $form138_type=$requirements['form138_type'];
                                      $form138_size=$requirements['form138_size'];
                                      $Form138=$requirements['Form138'];
                                      
                                      $goodmoral_file= $requirements['goodmoral_file'];
                                      $goodmoral_type=$requirements['goodmoral_type'];
                                      $goodmoral_size=$requirements['goodmoral_size'];
                                      $Goodmoral=$requirements['GoodMoral'];

                                      $birthcertificate_file= $requirements['birthcertificate_file'];
                                      $birthcertificate_type=$requirements['birthcertificate_type'];
                                      $birthcertificate_size=$requirements['birthcertificate_size'];
                                      $Birthcertificate=$requirements['BirthCertificate'];

                                      $form137_file= $requirements['form137_file'];
                                      $form137_type=$requirements['form137_type'];
                                      $form137_size=$requirements['form137_size'];
                                      $Form137=$requirements['Form137'];



                                }
                                






                                  if($status=='new student'){

                                   


                                    if(($form138_file&&$form138_type&&$form138_size&&$Form138)>0){
                                

                                        ?>
                                       <form method="POST" enctype="multipart/form-data">
                                        <div class="col-md-12">
                                        <hr>
                                           <div class="row">
                                          <div class="form-group">
                                                  <div class="col-md-4">
                                                  Form138:
                                                  </div>
                                                  <div class="col-md-4">    
                                                  Action: <a href="../../document/<?php echo $form138_file?>" target="_tab">  View application </a>
                                                        
                                                  </div>
                                                  <div class="col-md-4">
                                                    <div class='form-group input-group'>
                                    
                                                      <input type='text' value="<?php echo $form138_file?>" class='form-control' readonly />
                                                      <span class='input-group-btn'>
                                                              <a href="requirements.php?id=<?php echo $get_id?>&&deleterequirement1=<?php echo $get_id?>" class='btn btn-primary'>Delete</a>
                                                      </span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                        </form>
                                        <?php

                                    }else{

                                        ?>
                                        <form method="POST" enctype="multipart/form-data">
                                        <div class="col-md-12">
                                        <hr>
                                           <div class="row">
                                          <div class="form-group">
                                                  <div class="col-md-4">
                                                  Form138:
                                                  </div>
                                                  <div class="col-md-4">    
                                                  Action: --
                                                        
                                                  </div>
                                                  <div class="col-md-4">
                                                    <div class='form-group input-group'>
                                                      <span class='input-group-btn'>
                                                          <span class=' btn btn-default btn-file1'>
                                                              Browse... <input type='file' name='file1'>
                                                          </span>
                                                      </span>
                                                      <input type='text' id='valdfil1' class='form-control' readonly />
                                                      <span class='input-group-btn'>
                                                              <button class='btn btn-default' name='requirementinsertbutton1'>Upload</button>
                                                      </span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                         <input type="hidden" name='get_count' value="<?php echo $get_id?>">
                                        </form>
                                        <?php


                                    }


                                     if(($goodmoral_file&&$goodmoral_type&&$goodmoral_size&&$Goodmoral)>0){
                                

                                        ?>
                                           <form method="POST" enctype="multipart/form-data">
                                        <div class="col-md-12">
                                        <hr>
                                           <div class="row">
                                          <div class="form-group">
                                                  <div class="col-md-4">
                                                  Good Moral:
                                                  </div>
                                                  <div class="col-md-4">    
                                                  Action: <a href="../../document/<?php echo $goodmoral_file?>" target="_tab">View application</a>
                                                        
                                                  </div>
                                              
                                                  <div class="col-md-4">
                                       
                                                       <div class='form-group input-group'>
                                    
                                                      <input type='text' value="<?php echo $goodmoral_file?>" class='form-control' readonly />
                                                      <span class='input-group-btn'>
                                                              <a href="requirements.php?id=<?php echo $get_id?>&&deleterequirement2=<?php echo $get_id?>" class='btn btn-primary'>Delete</a>
                                                      </span>
                                                      </div>
                                                
                                                  </div>  
                                                </div>
                                            </div>
                                        </div>
                                           </form>
                                        <?php

                                    }else{

                                        ?>
                                           <form method="POST" enctype="multipart/form-data">
                                        <div class="col-md-12">
                                        <hr>
                                         <div class="row">
                                          <div class="form-group">
                                                  <div class="col-md-4">
                                                  Good Moral:
                                                  </div>
                                                  <div class="col-md-4">    
                                                  Action: --
                                                        
                                                  </div>
                                              
                                                  <div class="col-md-4">
                                       
                                           
                                                    <div class='form-group input-group'>
                                                      <span class='input-group-btn'>
                                                          <span class=' btn btn-default btn-file2'>
                                                              Browse... <input type='file' name='file2'>
                                                          </span>
                                                      </span>
                                                      <input type='text' id='valdfil2' class='form-control' readonly />
                                                      <span class='input-group-btn'>
                                                              <button class='btn btn-default' name='requirementinsertbutton2'>Upload</button>
                                                      </span>
                                                      </div>
                                           
                                                
                                                  </div>  
                                    
                                            </div>
                                            </div>
                                        </div>
                                               <input type="hidden" name='get_count' value="<?php echo $get_id?>">
                                        </form>
                                        <?php


                                    }


                                    if(($birthcertificate_file&&$birthcertificate_type&&$birthcertificate_size&&$Birthcertificate>0)){
                                

                                        ?>
                                           <form method="POST" enctype="multipart/form-data">
                                        <div class="col-md-12">
                                        <hr>
                                           <div class="row">
                                          <div class="form-group">
                                                  <div class="col-md-4">
                                                  Birth Certificate:
                                                  </div>
                                                  <div class="col-md-4">    
                                                  Action: <a href="../../document/<?php echo $birthcertificate_file?> "target="_tab">View application</a>
                                                        
                                                  </div>
                                              
                                                  <div class="col-md-4">
                                       
                                                       <div class='form-group input-group'>
                                    
                                                      <input type='text' value="<?php echo $birthcertificate_file?>" class='form-control' readonly />
                                                      <span class='input-group-btn'>
                                                              <a href="requirements.php?id=<?php echo $get_id?>&&deleterequirement3=<?php echo $get_id?>" class='btn btn-primary'>Delete</a>
                                                      </span>
                                                      </div>
                                                
                                                  </div>  
                                                </div>
                                            </div>
                                        </div>
                                          </form>
                                        <?php

                                    }else{

                                        ?>
                                           <form method="POST" enctype="multipart/form-data">
                                        <div class="col-md-12">
                                        <hr>
                                         <div class="row">
                                          <div class="form-group">
                                                  <div class="col-md-4">
                                                  Birth Certificate:
                                                  </div>
                                                  <div class="col-md-4">    
                                                  Action:--
                                                        
                                                  </div>
                                              
                                                  <div class="col-md-4">
                                       
                                           
                                                    <div class='form-group input-group'>
                                                      <span class='input-group-btn'>
                                                          <span class=' btn btn-default btn-file3'>
                                                              Browse... <input type='file' name='file3'>
                                                          </span>
                                                      </span>
                                                      <input type='text' id='valdfil3' class='form-control' readonly />
                                                      <span class='input-group-btn'>
                                                              <button class='btn btn-default' name='requirementinsertbutton3'>Upload</button>
                                                      </span>
                                                      </div>
                                           
                                                
                                                  </div>  
                                    
                                            </div>
                                            </div>
                                        </div>
                                               <input type="hidden" name='get_count' value="<?php echo $get_id?>">
                                        </form>
                                        <?php


                                    }



                                    































                                  }elseif($status=='Transferee'){
                                
                                
                                    if(($form138_file&&$form138_type&&$form138_size&&$Form138)>0){
                                

                                        ?>
                                           <form method="POST" enctype="multipart/form-data">
                                            <div class="col-md-12">
                                            <hr>
                                               <div class="row">
                                              <div class="form-group">
                                                      <div class="col-md-4">
                                                      Form138:
                                                      </div>
                                                      <div class="col-md-4">    
                                                      Action: <a href="../../document/<?php echo $form138_file?>" target="_tab">View application</a>
                                                            
                                                      </div>
                                                      <div class="col-md-4">
                                                        <div class='form-group input-group'>
                                        
                                                          <input type='text' value="<?php echo $form138_file?>" class='form-control' readonly />
                                                          <span class='input-group-btn'>
                                                                  <a href="requirements.php?id=<?php echo $get_id?>&&deleterequirement1=<?php echo $get_id?>" class='btn btn-primary'>Delete</a>
                                                          </span>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                            </div>
                                            </form>
                                            <?php

                                        }else{

                                            ?>
                                            <form method="POST" enctype="multipart/form-data">
                                            <div class="col-md-12">
                                            <hr>
                                               <div class="row">
                                              <div class="form-group">
                                                      <div class="col-md-4">
                                                      Form138:
                                                      </div>
                                                      <div class="col-md-4">    
                                                      Action: --
                                                            
                                                      </div>
                                                      <div class="col-md-4">
                                                        <div class='form-group input-group'>
                                                          <span class='input-group-btn'>
                                                              <span class=' btn btn-default btn-file1'>
                                                                  Browse... <input type='file' name='file1'>
                                                              </span>
                                                          </span>
                                                          <input type='text' id='valdfil1' class='form-control' readonly />
                                                          <span class='input-group-btn'>
                                                                  <button class='btn btn-default' name='requirementinsertbutton1'>Upload</button>
                                                          </span>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                            </div>
                                             <input type="hidden" name='get_count' value="<?php echo $get_id?>">
                                            </form>
                                            <?php


                                        }


                                         if(($goodmoral_file&&$goodmoral_type&&$goodmoral_size&&$Goodmoral)>0){
                                    

                                            ?>
                                               <form method="POST" enctype="multipart/form-data">
                                            <div class="col-md-12">
                                            <hr>
                                               <div class="row">
                                              <div class="form-group">
                                                      <div class="col-md-4">
                                                      Good Moral:
                                                      </div>
                                                      <div class="col-md-4">    
                                                      Action: <a href="../../document/<?php echo $goodmoral_file?>">View application</a>
                                                            
                                                      </div>
                                                  
                                                      <div class="col-md-4">
                                           
                                                           <div class='form-group input-group'>
                                        
                                                          <input type='text' value="<?php echo $goodmoral_file?>" class='form-control' readonly />
                                                          <span class='input-group-btn'>
                                                                  <a href="requirements.php?id=<?php echo $get_id?>&&deleterequirement2=<?php echo $get_id?>" class='btn btn-primary'>Delete</a>
                                                          </span>
                                                          </div>
                                                    
                                                      </div>  
                                                    </div>
                                                </div>
                                            </div>
                                               </form>
                                            <?php

                                        }else{

                                            ?>
                                               <form method="POST" enctype="multipart/form-data">
                                            <div class="col-md-12">
                                            <hr>
                                             <div class="row">
                                              <div class="form-group">
                                                      <div class="col-md-4">
                                                      Good Moral:
                                                      </div>
                                                      <div class="col-md-4">    
                                                      Action: -- 
                                                            
                                                      </div>
                                                  
                                                      <div class="col-md-4">
                                           
                                               
                                                        <div class='form-group input-group'>
                                                          <span class='input-group-btn'>
                                                              <span class=' btn btn-default btn-file2'>
                                                                  Browse... <input type='file' name='file2'>
                                                              </span>
                                                          </span>
                                                          <input type='text' id='valdfil2' class='form-control' readonly />
                                                          <span class='input-group-btn'>
                                                                  <button class='btn btn-default' name='requirementinsertbutton2'>Upload</button>
                                                          </span>
                                                          </div>
                                               
                                                    
                                                      </div>  
                                        
                                                </div>
                                                </div>
                                            </div>
                                                   <input type="hidden" name='get_count' value="<?php echo $get_id?>">
                                            </form>
                                            <?php


                                        }


                                        if(($birthcertificate_file&&$birthcertificate_type&&$birthcertificate_size&&$Birthcertificate>0)){
                                    

                                            ?>
                                               <form method="POST" enctype="multipart/form-data">
                                            <div class="col-md-12">
                                            <hr>
                                               <div class="row">
                                              <div class="form-group">
                                                      <div class="col-md-4">
                                                      Birth Certificate:
                                                      </div>
                                                      <div class="col-md-4">    
                                                      Action: <a href="../../document/<?php echo $birthcertificate_file?>" target="_tab"> View application</a>
                                                            
                                                      </div>
                                                  
                                                      <div class="col-md-4">
                                           
                                                           <div class='form-group input-group'>
                                        
                                                          <input type='text' value="<?php echo $birthcertificate_file?>" class='form-control' readonly />
                                                          <span class='input-group-btn'>
                                                                  <a href="requirements.php?id=<?php echo $get_id?>&&deleterequirement3=<?php echo $get_id?>" class='btn btn-primary'>Delete</a>
                                                          </span>
                                                          </div>
                                                    
                                                      </div>  
                                                    </div>
                                                </div>
                                            </div>
                                              </form>
                                            <?php

                                        }else{

                                            ?>
                                               <form method="POST" enctype="multipart/form-data">
                                            <div class="col-md-12">
                                            <hr>
                                             <div class="row">
                                              <div class="form-group">
                                                      <div class="col-md-4">
                                                      Birth Certificate:
                                                      </div>
                                                      <div class="col-md-4">    
                                                      Action: -- 
                                                            
                                                      </div>
                                                  
                                                      <div class="col-md-4">
                                           
                                               
                                                        <div class='form-group input-group'>
                                                          <span class='input-group-btn'>
                                                              <span class=' btn btn-default btn-file3'>
                                                                  Browse... <input type='file' name='file3'>
                                                              </span>
                                                          </span>
                                                          <input type='text' id='valdfil3' class='form-control' readonly />
                                                          <span class='input-group-btn'>
                                                                  <button class='btn btn-default' name='requirementinsertbutton3'>Upload</button>
                                                          </span>
                                                          </div>
                                               
                                                    
                                                      </div>  
                                        
                                                </div>
                                                </div>
                                            </div>
                                                   <input type="hidden" name='get_count' value="<?php echo $get_id?>">
                                            </form>
                                        <?php
                                            }



                                    if(($form137_file&&$form137_type&&$form137_size&&$Form137>0)){
                                    

                                            ?>
                                               <form method="POST" enctype="multipart/form-data">
                                            <div class="col-md-12">
                                            <hr>
                                               <div class="row">
                                              <div class="form-group">
                                                      <div class="col-md-4">
                                                      Form137:
                                                      </div>
                                                      <div class="col-md-4">    
                                                      Action: <a href="../../document/<?php echo $form137_file?>" target="_tab">View application</a>
                                                            
                                                      </div>
                                                  
                                                      <div class="col-md-4">
                                           
                                                           <div class='form-group input-group'>
                                        
                                                          <input type='text' value="<?php echo $form137_file?>" class='form-control' readonly />
                                                          <span class='input-group-btn'>
                                                                  <a href="requirements.php?id=<?php echo $get_id?>&&deleterequirement4=<?php echo $get_id?>" class='btn btn-primary'>Delete</a>
                                                          </span>
                                                          </div>
                                                    
                                                      </div>  
                                                    </div>
                                                </div>
                                            </div>
                                              </form>
                                            <?php

                                        }else{

                                            ?>
                                               <form method="POST" enctype="multipart/form-data">
                                            <div class="col-md-12">
                                            <hr>
                                             <div class="row">
                                              <div class="form-group">
                                                      <div class="col-md-4">
                                                      Form137:
                                                      </div>
                                                      <div class="col-md-4">    
                                                      Action: --
                                                            
                                                      </div>
                                                  
                                                      <div class="col-md-4">
                                           
                                               
                                                        <div class='form-group input-group'>
                                                          <span class='input-group-btn'>
                                                              <span class=' btn btn-default btn-file4'>
                                                                  Browse... <input type='file' name='file4'>
                                                              </span>
                                                          </span>
                                                          <input type='text' id='valdfil4' class='form-control' readonly />
                                                          <span class='input-group-btn'>
                                                                  <button class='btn btn-default' name='requirementinsertbutton4'>Upload</button>
                                                          </span>
                                                          </div>
                                               
                                                    
                                                      </div>  
                                        
                                                </div>
                                                </div>
                                            </div>
                                                   <input type="hidden" name='get_count' value="<?php echo $get_id?>">
                                            </form>
                                        <?php
                                            }






                                }       

                                      
                          

              }else{
            ?>
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#" data-toggle="tab">List</a>
                  </li>
                  <li><a href="inquiry.php">Back to inquiry</a>
                  </li>
               </ul>
                
                <div class='demo_jui'>
                                        <table cellpadding='0' cellspacing='1' border='1' class='display' id='tbl' class='jtable'>
                                        <thead>

                                                          <tr>
                                                              <th><center>Full name</center></th>
                                                              <th><center>Status</center></th>
                                                              <th><center>Required Requirements</center></th>
                                                              <th><center>Requirements completed</center></th>
                                                              <th><center>Action</center></th>
                                 
                                                              </tr>

                                                              </thead>
                                                              <?php 
                                                           
                                                              $details="SELECT * from tbl_prospectivestudents inner join tbl_studentrequirements on tbl_prospectivestudents.id=tbl_studentrequirements.id where prospectivestatus!='recycle'";
                                                              $res_details=mysql_query($details);

                                                              while($details = mysql_fetch_array($res_details))
                                                              {
                                                                $student_count=$details['id'];
                                                                $student_surname=$details['surname'];
                                                                $student_firstname=$details['firstname'];
                                                                $student_middlename=$details['middlename'];
                                                                $student_status=$details['status'];
                                                                $email=$details['email'];

                                                                $form138=$details['Form138'];
                                                                $goodmoral=$details['GoodMoral'];
                                                                $birthcertificate=$details['BirthCertificate'];
                                                                $form137=$details['Form137'];
                                                                  
                                                                $totalrequirementsfornewstudent=$form138+ $goodmoral+$birthcertificate; 

                                                                 $totalrequirementsfortransferee=$form138+ $goodmoral+$birthcertificate+$form137; 


                                                                if($student_status=='new student'){
                                                                  if($totalrequirementsfornewstudent=='0'){

                                                               
                                                                   echo "<tr><td><center>$student_surname, $student_firstname, $student_middlename </center></td><td><center>Not Transferee</center></td><td><center style='background-color:green; color: white;'>3</center></td><td ><center style='background-color:red; color: white;'>0</center></td><td><center><a href='?id=$student_count'>Submit requirements</a></center></td>";
                                                            
                                                                 }elseif($totalrequirementsfornewstudent=='1'){

                                                               
                                                                   echo "<tr><td><center>$student_surname, $student_firstname, $student_middlename </center></td><td><center>Not Transferee</center></td><td><center  style='background-color:green; color: white;'>3</center></td><td><center  style='background-color:red; color: white;'>1</center></td><td><center><a href='?id=$student_count'>Submit requirements</a></center></td>";
                                                            
                                                                 }elseif($totalrequirementsfornewstudent=='2'){
                                                                     echo "<tr><td><center>$student_surname, $student_firstname, $student_middlename </center></td><td><center>Not Transferee</center></td><td ><center style='background-color:green; color: white;'>3</center></td><td ><center style='background-color:red; color: white;'>2</center></td><td><center><a href='?id=$student_count'>Submit requirements</a></center></td>";

                                                                 }elseif($totalrequirementsfornewstudent=='3'){
                                                                       echo "<tr><td><center>$student_surname, $student_firstname, $student_middlename </center></td><td><center>Not Transferee</center></td><td ><center style='background-color:green; color: white;'>3</center></td><td ><center style='background-color:green; color: white;'>3</center></td><td><center><a href='?id=$student_count'>Submit requirements</a></center></td>";


                                                                 }

                                                                }elseif($student_status=='Transferee'){
                                                                  if($totalrequirementsfortransferee=='0'){
                                                                
                                                                    echo "<tr><td><center>$student_surname, $student_firstname, $student_middlename </center></td><td><center>$student_status</center></td><td><center  style='background-color:green; color: white;'>4</center></td><td ><center style='background-color:red; color: white;'>0</center></td><td><center><a href='?id=$student_count'>Submit requirements</a></center></td>";
                                                                  
                                                                    }elseif($totalrequirementsfortransferee=='1'){
                                                                
                                                                    echo "<tr><td><center>$student_surname, $student_firstname, $student_middlename </center></td><td><center>$student_status</center></td><td ><center style='background-color:green; color: white;'>4</center></td><td ><center style='background-color:red; color: white;'>1</center></td><td><center><a href='?id=$student_count'>Submit requirements</a></center></td>";
                                                                  
                                                                    }elseif($totalrequirementsfortransferee=='2'){
                                                                       echo "<tr><td><center>$student_surname, $student_firstname, $student_middlename </center></td><td><center>$student_status</center></td><td ><center style='background-color:green; color: white;'>4</center></td><td ><center style='background-color:red; color: white;'>2</center></td><td><center><a href='?id=$student_count'>Submit requirements</a></center></td>";

                                                                    }elseif($totalrequirementsfortransferee=='3'){
                                                                       echo "<tr><td><center>$student_surname, $student_firstname, $student_middlename </center></td><td><center>$student_status</center></td><td ><center style='background-color:green; color: white;'>4</center></td><td ><center style='background-color:red; color: white;'>3</center></td><td><center><a href='?id=$student_count'>Submit requirements</a></center></td>";

                                                                    }elseif($totalrequirementsfortransferee=='4'){
                                                                       echo "<tr><td><center>$student_surname, $student_firstname, $student_middlename </center></td><td><center>$student_status</center></td><td ><center style='background-color:green; color: white;'>4</center></td><td ><center style='background-color:green; color: white;'>4</center></td><td><center><a href='?id=$student_count'>Submit requirements</a></center></td>";

                                                                    }


                                                                }

                                                                 
                                                              }

                                                              
                                                                


                                                              ?> 
                                                              </table></div>

            <?php }?>






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
if(isset($_GET['deletepicture'])){       
  $id=$_GET['deletepicture'];
 $information = "SELECT * from tbl_prospectivestudents where id='$get_id'";
                                    $information_result = mysql_query($information);
                                                                                  
                                    while($information = mysql_fetch_array($information_result))
                                    {
                                      $email=$information['email'];
                                      $user=$information['username'];
                                      $fname=$information['firstname'];
                                      $mname=$information['middlename'];
                                      $sname=$information['surname'];
                                      $status=$information['status'];


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
                                                          <p>Are you sure you want to delete profile picture of <?php echo $sname.','. $fname. ','. $mname?>?</p>
                                                        
                                                        </div>
                                                        <div class="modal-footer">
                                                        <form method="POST">
                                                        <button id='ok' name='deletedpicture'>Ok</button>
                                                        <input type="hidden" name="deleteid" value="<?php echo $id?>">
                                                        </form>

                                                        </div>
                                                      </div>

                                                    </div>
                                                    <?php
                                      }






                                               elseif(isset($_POST['requirementinsertbutton1'])){
                                                $get_count=$_POST['get_count'];
                                      
                             
                                               $file= $_FILES['file1']['name'];    
                                               $file_name = rand(1000,100000)."-".$_FILES['file1']['name'];

                                               $file_data = $_FILES['file1']['tmp_name'];

                                               $file_size = $_FILES['file1']['size'];

                                               $file_type = $_FILES['file1']['type'];

                                               $file_folder="../../document/";
                                               
                                               // new file size in KB
                                               $new_size = $file_size/1024;  
                                               // new file size in KB
                                               
                                               // make file name in lower case
                                               $new_file_name = strtolower($file);
                                               // make file name in lower case
                                               
                                               $final_file=str_replace(' ','-',$new_file_name);

                                            

                                              $select="SELECT * from tbl_studentrequirements";
                                               $select_res=mysql_query($select);
                                               if($select=mysql_fetch_array($select_res)){
                                                  $f138=$select['form138_file'];
                                                  $gmoral=$select['goodmoral_file'];
                                                  $bcert=$select['birthcertificate_file'];
                                               }

                                              if($file==""){
                                                                  ?>
                                                                  <script type="text/javascript">
                                                                  parent.document.getElementById("message").innerHTML="<font color='#ff0000'>PLEASE CHOOSE A FORM138 FILE.</font>";
                                                                  </script>
                                                                  <?php
                                                                   echo '<meta http-equiv="refresh" content= "1;"/>';


                                              }else{
                                           
                                              if(($final_file==$f138)||($final_file==$gmoral)||($final_file==$bcert)){

                                                                  ?>
                                                                  <script type="text/javascript">
                                                                  parent.document.getElementById("message").innerHTML="<font color='#ff0000'>FORM138 YOU SELECT ARE ALREADY EXISTING. PLEASE CHOOSE ANOTHER FILE.</font>";
                                                                  </script> 
                                                                  <?php
                                                                   echo '<meta http-equiv="refresh" content= "1;" />';
                                       
                                              }else{
                                                  if(($file_type)=="application/pdf"){

                                                              //if the file size is 150kb
                                                               if($file_size<=150000){

                                                                      if(move_uploaded_file($file_data,$file_folder.$final_file)){
                                                        //inserting photo
                                                      
                                                        
                                                               
                                                      mysql_query("UPDATE tbl_studentrequirements set form138_file='$final_file', form138_type='$file_type',form138_size='$new_size', Form138='1' where id='$get_count'");

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                parent.document.getElementById("message").innerHTML="<font color='green'>FORM138 SUCCESSFULLY UPLOADED!</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';
                                                       
                                                                         }else{
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                parent.document.getElementById("message").innerHTML="<font color='#ff0000'>ERROR WHILE UPLOADING FORM138 FILE.</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';
                                                                         }

                                                               }else{
                                                           
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                parent.document.getElementById("message").innerHTML="<font color='#ff0000'>FORM138 IS LARGER THAN 150KB. PLEASE CHOOSE A DIFFERENT PDF SIZE...</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />'; 

                                                               }


                                                   }else{
                                                   
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                parent.document.getElementById("message").innerHTML="<font color='#ff0000'>INVALID FILE FORMAT. PLEASE CHOOSE A DIFFERENT FILE FORMAT. IT SHOULD BE IN PDF.</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';
                                                   }
                                             
                                                  }
                                                }
                                              }elseif(isset($_GET['deleterequirement1'])){       
                                                $id=$_GET['deleterequirement1'];
                                               $information = "SELECT * from tbl_prospectivestudents where id='$get_id'";
                                                                                  $information_result = mysql_query($information);
                                                                                                                                
                                                                                  while($information = mysql_fetch_array($information_result))
                                                                                  {
                                                                                    $email=$information['email'];
                                                                                    $user=$information['username'];
                                                                                    $fname=$information['firstname'];
                                                                                    $mname=$information['middlename'];
                                                                                    $sname=$information['surname'];
                                                                                    $status=$information['status'];


                                                                                  }         

                                                  $requirements="SELECT * from tbl_studentrequirements where id='$get_id'";
                                                  $res_requirements=mysql_query($requirements);

                                                  while($requirements=mysql_fetch_array($res_requirements)){
                                                        $form138_file= $requirements['form138_file'];
                                                        $form138_type=$requirements['form138_type'];
                                                        $form138_size=$requirements['form138_size'];
                                                        $Form138=$requirements['Form138'];



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
                                                          <p>Are you sure you want to Delete Form138 of <?php echo $sname.','. $fname. ','. $mname?>?</p>
                                                        
                                                        </div>
                                                        <div class="modal-footer">
                                                        <form method="POST">
                                                        <button id='ok' name='deletedrequirement1'>Ok</button>
                                                        <input type="hidden" name="deleterequirement1" value="<?php echo $id?>">

                                                        </form>

                                                        </div>
                                                      </div>

                                                    </div>
                                                    <?php
                                      }elseif(isset($_POST['requirementinsertbutton2'])){
                             

                                            
                                              $get_count=$_POST['get_count'];
                                               $file= $_FILES['file2']['name'];    
                                               $file_name = rand(1000,100000)."-".$_FILES['file2']['name'];

                                               $file_data = $_FILES['file2']['tmp_name'];

                                               $file_size = $_FILES['file2']['size'];

                                               $file_type = $_FILES['file2']['type'];

                                               $file_folder="../../document/";
                                               
                                               // new file size in KB
                                               $new_size = $file_size/1024;  
                                               // new file size in KB
                                               
                                               // make file name in lower case
                                               $new_file_name = strtolower($file);
                                               // make file name in lower case
                                               
                                               $final_file=str_replace(' ','-',$new_file_name);

                                               $select="SELECT * from tbl_studentrequirements";
                                               $select_res=mysql_query($select);
                                               if($select=mysql_fetch_array($select_res)){
                                                  $f138=$select['form138_file'];
                                                  $gmoral=$select['goodmoral_file'];
                                                  $bcert=$select['birthcertificate_file'];
                                               }

                                    
                                               if($file==""){
                                                                  ?>
                                                                  <script type="text/javascript">
                                                                  parent.document.getElementById("message").innerHTML="<font color='#ff0000'>PLEASE CHOOSE A GOODMORAL FILE.</font>";
                                                                  </script>
                                                                  <?php
                                                                   echo '<meta http-equiv="refresh" content= "1;" />';

                                              }else{

                                              if(($final_file==$f138)||($final_file==$gmoral)||($final_file==$bcert)){
                                               
                                                                              ?>
                                                                              <script type="text/javascript">
                                                                              parent.document.getElementById("message").innerHTML="<font color='#ff0000'>GOODMORAL YOU SELECT ARE ALREADY EXISTING. PLEASE CHOOSE ANOTHER FILE.</font>";
                                                                              </script>
                                                                              <?php
                                                                               echo '<meta http-equiv="refresh" content= "1;" />';
                                              }else{


                                              if(($file_type)=="application/pdf"){

                                                  //if the file size is 150kb
                                                   if($file_size<=150000){

                                                       if(move_uploaded_file($file_data,$file_folder.$final_file)){
                                                        //inserting photo
                                                      
                                                        
                                                           mysql_query("UPDATE tbl_studentrequirements set goodmoral_file='$final_file', goodmoral_type='$file_type',goodmoral_size='$new_size', GoodMoral='1' where id='$get_count'");

                                                        
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                parent.document.getElementById("message").innerHTML="<font color='green'>GOODMORAL SUCCESSFULLY UPLOADED!.</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';
                                                       
                                                       }else{
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                parent.document.getElementById("message").innerHTML="<font color='#ff0000'>ERROR WHILE UPLOADING GOODMORAL FILE.</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';
                                                       }

                                                   }else{
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                parent.document.getElementById("message").innerHTML="<font color='#ff0000'>GOODMORAL IS LARGER THAN 150KB. PLEASE CHOOSE A DIFFERENT PDF SIZE...</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;"  />';
                                                 
                                                   }


                                                   }else{
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                parent.document.getElementById("message").innerHTML="<font color='#ff0000'>INVALID FILE FORMAT. PLEASE CHOOSE A DIFFERENT FILE FORMAT. IT SHOULD BE IN PDF.</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';
                                                   }
                                                 }

                                              }
                                            }elseif(isset($_GET['deleterequirement2'])){       
                                                $id=$_GET['deleterequirement2'];
                                               $information = "SELECT * from tbl_prospectivestudents where id='$get_id'";
                                                                                  $information_result = mysql_query($information);
                                                                                                                                
                                                                                  while($information = mysql_fetch_array($information_result))
                                                                                  {
                                                                                    $email=$information['email'];
                                                                                    $user=$information['username'];
                                                                                    $fname=$information['firstname'];
                                                                                    $mname=$information['middlename'];
                                                                                    $sname=$information['surname'];
                                                                                    $status=$information['status'];


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
                                                          <p>Are you sure you want to Delete Good Moral of <?php echo $sname.','. $fname. ','. $mname?>?</p>
                                                        
                                                        </div>
                                                        <div class="modal-footer">
                                                        <form method="POST">
                                                        <button id='ok' name='deletedrequirement2'>Ok</button>
                                                        <input type="hidden" name="deleterequirement2" value="<?php echo $id?>">

                                                        </form>

                                                        </div>
                                                      </div>

                                                    </div>
                                                    <?php
                                      }elseif(isset($_POST['requirementinsertbutton3'])){
                                              
                                               $get_count=$_POST['get_count'];
                                               $file= $_FILES['file3']['name'];    
                                               $file_name = rand(1000,100000)."-".$_FILES['file3']['name'];

                                               $file_data = $_FILES['file3']['tmp_name'];

                                               $file_size = $_FILES['file3']['size'];

                                               $file_type = $_FILES['file3']['type'];

                                               $file_folder="../../document/";
                                               
                                               // new file size in KB
                                               $new_size = $file_size/1024;  
                                               // new file size in KB
                                               
                                               // make file name in lower case
                                               $new_file_name = strtolower($file);
                                               // make file name in lower case
                                               
                                               $final_file=str_replace(' ','-',$new_file_name);

                                              $select="SELECT * from tbl_studentrequirements";
                                               $select_res=mysql_query($select);
                                               if($select=mysql_fetch_array($select_res)){
                                                  $f138=$select['form138_file'];
                                                  $gmoral=$select['goodmoral_file'];
                                                  $bcert=$select['birthcertificate_file'];
                                               }
                                               if($file==""){
                                                                  ?>
                                                                  <script type="text/javascript">
                                                                  parent.document.getElementById("message").innerHTML="<font color='#ff0000'>PLEASE CHOOSE A BIRTHCERTIFICATE FILE..</font>";
                                                                  </script>
                                                                  <?php
                                                                  echo '<meta http-equiv="refresh" content= "1;" />';
                                              }else{

                                               if(($final_file==$f138)||($final_file==$gmoral)||($final_file==$bcert)){
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                parent.document.getElementById("message").innerHTML="<font color='RED'>BIRTHCERTIFICATE YOU SELECT ARE ALREADY EXISTING. PLEASE CHOOSE ANOTHER FILE.</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';
                                              }else{

                                                  if(($file_type)=="application/pdf"){

                                                  //if the file size is 150kb
                                                   if($file_size<=150000){

                                                       if(move_uploaded_file($file_data,$file_folder.$final_file)){
                                                        //inserting photo
                                                      
                                                        
                                                          mysql_query("UPDATE tbl_studentrequirements set birthcertificate_file='$final_file', birthcertificate_type='$file_type',birthcertificate_size='$new_size', BirthCertificate='1' where id='$get_count'");

                                                                                 ?>
                                                                                <script type="text/javascript">
                                                                                parent.document.getElementById("message").innerHTML="<font color='green'>BIRTHCERTIFICATE SUCCESSFULLY UPLOADED!</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';

                                                       
                                                       }else{
                                                                                
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                parent.document.getElementById("message").innerHTML="<font color='#ff0000'>ERROR WHILE UPLOADING BIRTHCERTIFICATE FILE..</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';
                                                       }

                                                   }else{

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                parent.document.getElementById("message").innerHTML="<font color='#ff0000'>BIRTHCERTIFICATE IS LARGER THAN 150KB. PLEASE CHOOSE A DIFFERENT PDF SIZE...</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';

                                                   }


                                                   }else{
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                parent.document.getElementById("message").innerHTML="<font color='#ff0000'>INVALID FILE FORMAT. PLEASE CHOOSE A DIFFERENT FILE FORMAT. IT SHOULD BE IN PDF.</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';
                                                   }

                                                 }
                                               }

                                              
                                            }elseif(isset($_GET['deleterequirement3'])){       
                                                $id=$_GET['deleterequirement3'];
                                               $information = "SELECT * from tbl_prospectivestudents where id='$get_id'";
                                                                                  $information_result = mysql_query($information);
                                                                                                                                
                                                                                  while($information = mysql_fetch_array($information_result))
                                                                                  {
                                                                                    $email=$information['email'];
                                                                                    $user=$information['username'];
                                                                                    $fname=$information['firstname'];
                                                                                    $mname=$information['middlename'];
                                                                                    $sname=$information['surname'];
                                                                                    $status=$information['status'];


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
                                                          <p>Are you sure you want to Delete Birth Certificate of <?php echo $sname.','. $fname. ','. $mname?>?</p>
                                                        
                                                        </div>
                                                        <div class="modal-footer">
                                                        <form method="POST">
                                                        <button id='ok' name='deletedrequirement3'>Ok</button>
                                                        <input type="hidden" name="deleterequirement3" value="<?php echo $id?>">

                                                        </form>

                                                        </div>
                                                      </div>

                                                    </div>
                                                    <?php
                                      }elseif(isset($_POST['requirementinsertbutton4'])){
                                              
                                               $get_count=$_POST['get_count'];
                                               $file= $_FILES['file4']['name'];    
                                               $file_name = rand(1000,100000)."-".$_FILES['file4']['name'];

                                               $file_data = $_FILES['file4']['tmp_name'];

                                               $file_size = $_FILES['file4']['size'];

                                               $file_type = $_FILES['file4']['type'];

                                               $file_folder="../../document/";
                                               
                                               // new file size in KB
                                               $new_size = $file_size/1024;  
                                               // new file size in KB
                                               
                                               // make file name in lower case
                                               $new_file_name = strtolower($file);
                                               // make file name in lower case
                                               
                                               $final_file=str_replace(' ','-',$new_file_name);

                                              $select="SELECT * from tbl_studentrequirements";
                                               $select_res=mysql_query($select);
                                               if($select=mysql_fetch_array($select_res)){
                                                  $f138=$select['form138_file'];
                                                  $gmoral=$select['goodmoral_file'];
                                                  $bcert=$select['birthcertificate_file'];
                                                  $f137=$select['form137_file'];
                                               }
                                               if($file==""){
                                                                  ?>
                                                                  <script type="text/javascript">
                                                                  parent.document.getElementById("message").innerHTML="<font color='#ff0000'>PLEASE CHOOSE A FORM137 FILE..</font>";
                                                                  </script>
                                                                  <?php
                                                                  echo '<meta http-equiv="refresh" content= "1;" />';
                                              }else{

                                               if(($final_file==$f138)||($final_file==$gmoral)||($final_file==$bcert)||($final_file==$f137)){
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                parent.document.getElementById("message").innerHTML="<font color='red'>FORM137 YOU SELECT ARE ALREADY EXISTING. PLEASE CHOOSE ANOTHER FILE.</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';
                                              }else{

                                                  if(($file_type)=="application/pdf"){

                                                  //if the file size is 150kb
                                                   if($file_size<=150000){

                                                       if(move_uploaded_file($file_data,$file_folder.$final_file)){
                                                        //inserting photo
                                                      
                                                        
                                                          mysql_query("UPDATE tbl_studentrequirements set form137_file='$final_file', form137_type='$file_type',form137_size='$new_size', Form137='1' where id='$get_count'");

                                                                                 ?>
                                                                                <script type="text/javascript">
                                                                                parent.document.getElementById("message").innerHTML="<font color='green'>BIRTHCERTIFICATE SUCCESSFULLY UPLOADED!</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';

                                                       
                                                       }else{
                                                                                
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                parent.document.getElementById("message").innerHTML="<font color='#ff0000'>ERROR WHILE UPLOADING BIRTHCERTIFICATE FILE..</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';
                                                       }

                                                   }else{

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                parent.document.getElementById("message").innerHTML="<font color='#ff0000'>FORM137 IS LARGER THAN 150KB. PLEASE CHOOSE A DIFFERENT PDF SIZE...</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';

                                                   }


                                                   }else{
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                parent.document.getElementById("message").innerHTML="<font color='#ff0000'>INVALID FILE FORMAT. PLEASE CHOOSE A DIFFERENT FILE FORMAT. IT SHOULD BE IN PDF.</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';
                                                   }

                                                 }
                                               }

                                              
                                            }elseif(isset($_GET['deleterequirement4'])){       
                                                $id=$_GET['deleterequirement4'];
                                               $information = "SELECT * from tbl_prospectivestudents where id='$get_id'";
                                                                                  $information_result = mysql_query($information);
                                                                                                                                
                                                                                  while($information = mysql_fetch_array($information_result))
                                                                                  {
                                                                                    $email=$information['email'];
                                                                                    $user=$information['username'];
                                                                                    $fname=$information['firstname'];
                                                                                    $mname=$information['middlename'];
                                                                                    $sname=$information['surname'];
                                                                                    $status=$information['status'];


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
                                                          <p>Are you sure you want to Delete Form137 of <?php echo $sname.','. $fname. ','. $mname?>?</p>
                                                        
                                                        </div>
                                                        <div class="modal-footer">
                                                        <form method="POST">
                                                        <button id='ok' name='deletedrequirement4'>Ok</button>
                                                        <input type="hidden" name="deleterequirement4" value="<?php echo $id?>">

                                                        </form>

                                                        </div>
                                                      </div>

                                                    </div>
                                                    <?php
                                      }
                                             elseif(isset($_POST['insertpicture'])){
                                               //if the file size is 150kb
                                                      $get_count=$_POST['get_count'];
                                       

                                                      $file= $_FILES['file']['name'];    
                                                       $file_name = rand(1000,100000)."-".$_FILES['file']['name'];

                                                       $file_data = $_FILES['file']['tmp_name'];

                                                       $file_size = $_FILES['file']['size'];

                                                       $file_type = $_FILES['file']['type'];

                                                       $file_folder="../../photos/";
                                                       
                                                       // new file size in KB
                                                       $new_size = $file_size/1024;  
                                                       // new file size in KB
                                                       
                                                       // make file name in lower case
                                                       $new_file_name = strtolower($file_name);
                                                       // make file name in lower case
                                                       
                                                       $final_file=str_replace(' ','-',$new_file_name);

                                                    if($file==""){
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='#ff0000'>PLEASE SELECT A FILE!</font>";
                                                                                </script>
                                                                                <?php
                                                                                echo '<meta http-equiv="refresh" content= "1;" />';

                                                    }else{  
                                                      if(($file_type)=="image/jpeg"||($file_type)=="image/png"){

                                                       if($file_size<=153600){

                                                               if(move_uploaded_file($file_data,$file_folder.$final_file)){
                                                                 //inserting photo
                                                                $sql="INSERT INTO tbl_studentimages (id,file,type,size) values('$get_count','$final_file','$file_type','$new_size')";
                                                                mysql_query($sql);
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='green'>SUCCESSFULLY UPLOADED!</font>";
                                                                                </script>
                                                                                <?php
                                                                 echo '<meta http-equiv="refresh" content= "1;" />';

                                                               }else{
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='#ff0000'>ERROR WHILE UPLOADING!</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';
                                                               }

                                                           }else{
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='#ff0000'>YOUR FILE IS LARGERT THEN 150KB. PLEASE CHOOSE A DIFFERENT PICTURE!</font>";
                                                                                </script>
                                                                                <?php
                                                                                echo '<meta http-equiv="refresh" content= "1;" />';
                                                           }


                                                           }else{
                                                    
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='#ff0000'>INVALID FILE FORMAT. PLEASE CHOOSE A DIFFERENT FILE FORMAT. IT SHOULD BE IN JPEG OR PNG FORMAT!</font>";
                                                                                </script>
                                                                                <?php
                                                                                echo '<meta http-equiv="refresh" content= "1;" />';
                                                           }

                                                         }
                                                      }
  ?>
    <?php }?>