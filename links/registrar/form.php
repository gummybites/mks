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






<!DOCTYPE html>
<html>
<head>

                
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Form</title>

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


          /* Shutter Out Horizontal */
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
                        .inputfile {
                          width: 0.1px;
                          height: 0.1px;
                          opacity: 0;
                          overflow: hidden;
                          position: absolute;
                          z-index: -1;
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
        <li><a href="manageuser.php"><img src="../../photos /<?php echo $db_photofile?>" class="img-circle" width="20px" height="20px"> <?php echo $db_username?>  </a></li>
        <li> <a href="logout.php?logout=<?php echo $db_id ?>"><i class="glyphicon glyphicon-log-out"> </i> Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>	



<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li><a href="registrar.php"><i class="fa fa-dashboard"></i><span>Home</span> </a> </li>
        <li><a href="reports.html"><i class="fa fa-plus"></i><span>Create acount</span> </a> </li>
        <li><a href="admission.php"><i class="fa fa-code"></i><span>Admission</span> </a></li>
        <li><a href="inquiry.php"><i class="fa fa-bar-chart"></i><span>Inquiry</span> </a> </li>
        <li><a href="shortcodes.html"><i class="fa fa-code"></i><span>Course & Subjects</span> </a> </li>
        <li class="active"><a href="form.php"><i class="fa fa-file-pdf-o"></i><span>Form</span> </a> </li>
        <li><a href="event.php"><i class="fa fa-calendar"></i><span>Event & Annoucement</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-long-arrow-down"></i><span>Manage</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="manageuser.php">Admin Profile</a></li>
            <li><a href="deleteddetails.php">Deleted details</a></li>
            <li><a href="breakdownoftuitionfees.php">Breakdown of tuition Fees</a></li>
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
                                <li class="active"><a href="#profile" data-toggle="tab">Form</a>
                                </li>
                         
                               
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="profile">

                                   <form method="POST" enctype="multipart/form-data">
                                      <?php
                                      if(isset($_GET['editform'])){
                                        $id=$_GET['editform'];

                                          ?>
                                          <!-- -->
                                          <a href='form.php'>Back</a>
                                          <!-- -->
                                          <CENTER><p id="message"></p></CENTER>
                                          <br>
                                          <h5>Newstudent Application Form</h5>
                                          <div class="input-group">
                                              <span class="input-group-btn">
                                                  <span class=" btn btn-default btn-file">
                                                      Browse... <input type="file" name="form1" id="data">
                                                  </span>
                                              </span>
                                              <input type="text" id="valdfil" class="form-control" readonly />
                                              <span class="input-group-btn">
                                                      <button name="buttonform1" class='btn btn-default'>Upload</button>
                                                  </span>
                                          </div>
                                          <!-- -->
                                          <br>
                                          <h5>Transferee Application Form</h5>
                                          <div class="input-group">
                                              <span class="input-group-btn">
                                                  <span class=" btn btn-default btn-file1">
                                                      Browse... <input type="file" name="form2" id="data">
                                                  </span>
                                              </span>
                                              <input type="text" id="valdfil1" class="form-control" readonly />
                                              <span class="input-group-btn">
                                                      <button name="buttonform2"  class='btn btn-default'>Upload</button>
                                                  </span>
                                          </div>
                                         
                                          
                                          <input type="hidden" name="editformid" value="<?php echo $id?>">
                                          <?php

                                      }else{

                                       ?>
                                 
                                      <!--table -->
                                       <div class='demo_jui'>
                                      <table cellpadding='0' cellspacing='1' border='1' class='display' id='tbl' class='jtable'>
                                        <thead>
                                                        <tr>
                                                       
                                                        <td><center>Newstudent Application Form</center></td>
                                                        <td><center>Transferee Application Form</center></td>
                                                        <td><center>Action</center></td>
                                                        </tr>

                                        </thead>
                                         <?php $applicationform= "SELECT * from tbl_applicationform";
                                                  $print_applicationform= mysql_query($applicationform);

                           
                                                  while($applicationform= mysql_fetch_array($print_applicationform)){
                                                    $db_id=$applicationform['id'];
                                                    $db_newstudentform=$applicationform['newstudentform'];
                                                    $db_transfereeform=$applicationform['transfereeform'];
                                                 
                                                       
                                                                                              }


                                                              echo "<tr><td><center><a  href='../../applicationform/$db_newstudentform' ><i class='fa fa-file-pdf-o fa-lg'></i></a></center></td> <td><center><a  href='../../applicationform/$db_transfereeform' ><i class='fa fa-file-pdf-o fa-lg'></i></a></center></td>   <td><center><a  href='form.php?editform=$db_id' >Edit</a></center></td></tr>";
                                                  
                                        ?>
                                      </table>
                                      </div>
                                      <!--/table -->
                                      <?php }?>
                                      </form>
                                </div>
                                <div class="tab-pane fade" id="loginhistory">

                                       Form2
                                </div>    
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


</body>
</html>

  <?php
if(isset($_POST['buttonform1'])){ 
                                                $formid=$_POST['editformid'];

                                                 $file= $_FILES['form1']['name'];    
                                                 $file_name = rand(1000,100000)."-".$_FILES['form1']['name'];
                                                 $file_data = $_FILES['form1']['tmp_name'];
                                                 $file_size = $_FILES['form1']['size'];
                                                 $file_type = $_FILES['form1']['type'];
                                                 $file_folder="../../applicationform/"; 
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
                                                                                document.getElementById("message").innerHTML="<font color='red'>PLEASE SELECT A APPLICATION FORM FOR NEW STUDENT!</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';
                              

                                                  }else{  
                                                     if(($file_type)=="application/pdf"){

                                                     if($file_size<=150000){

                                                             if(move_uploaded_file($file_data,$file_folder.$final_file)){
                                                               //inserting photo
                                                              $sql="UPDATE tbl_applicationform set newstudentform='$final_file' where id='$formid'";
                                                              mysql_query($sql);

                                                                                 ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='green'>SUCCESSFULLY UPLOADED</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';

                                                             }else{

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>ERROR WHILE UPLOADING!</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';

                                                             }

                                                         }else{
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>INVALID! APPLICATION FORM FOR NEW STUDENT IS GREATER THAN 150 KB. PLEASE CHOOSE A DIFFERENT FILE SIZE.</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';

                                                         }


                                                         }else{

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>INVALID FILE FORMAT. PLEASE CHOOSE A PDF TYPE ONLY.</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';
                                                         }

                                                       }
                                              }elseif(isset($_POST['buttonform2'])){ 
                                                $formid=$_POST['editformid'];

                                                 $file= $_FILES['form2']['name'];    
                                                 $file_name = rand(1000,100000)."-".$_FILES['form2']['name'];
                                                 $file_data = $_FILES['form2']['tmp_name'];
                                                 $file_size = $_FILES['form2']['size'];
                                                 $file_type = $_FILES['form2']['type'];
                                                 $file_folder="../../applicationform/"; 
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
                                                                                document.getElementById("message").innerHTML="<font color='red'>PLEASE SELECT A APPLICATION FORM FOR TRANSFEREE STUDENT!</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';

                                                  }else{  
                                                     if(($file_type)=="application/pdf"){

                                                     if($file_size<=150000){

                                                             if(move_uploaded_file($file_data,$file_folder.$final_file)){
                                                               //inserting photo
                                                              $sql="UPDATE tbl_applicationform set transfereeform='$final_file' where id='$formid'";
                                                              mysql_query($sql);

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='green'>SUCCESSFULLY UPLOADED</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';

                                                             }else{

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>ERROR WHILE UPLOADING!</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';

                                                             }

                                                         }else{
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>INVALID! APPLICATION FORM FOR TRANSFEREE STUDENT IS GREATER THAN 150 KB. PLEASE CHOOSE A DIFFERENT FILE SIZE.</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';

                                                         }


                                                         }else{

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>INVALID FILE FORMAT. PLEASE CHOOSE A PDF TYPE ONLY.</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';
                                                         }

                                                       }
                                              }


  ?>




    <?php }?>