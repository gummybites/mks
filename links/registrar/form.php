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

                   background: url(../../images/body-bg.png); color:#838383; font: 13px/1.7em 'Calibri';
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
        <li> <a href="logout.php?logout=<?php echo $db_id ?>"><?php echo $db_username?>, <i class="glyphicon glyphicon-log-out"> </i> Logout</a></li>
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
        <li><a href="guidely.html"><i class="fa fa-code"></i><span>Admission</span> </a></li>
        <li><a href="charts.html"><i class="fa fa-bar-chart"></i><span>Inquiry</span> </a> </li>
        <li><a href="shortcodes.html"><i class="fa fa-code"></i><span>Course & Subjects</span> </a> </li>
        <li class="active"><a href="form.php"><i class="fa fa-file"></i><span>Form</span> </a> </li>
        <li><a href="event.php"><i class="fa fa-calendar"></i><span>Event & Annoucement</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-long-arrow-down"></i><span>Manage User</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li class="active"><a href="manageuser.php">Profile</a></li>
            <li><a href="faq.html">Accounts</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>





                          <div class="container">
                          <h2>Form</h2>
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#profile" data-toggle="tab">Profile</a>
                                </li>
                                <li class=""><a href="#loginhistory" data-toggle="tab">Login History</a>
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
                                          <!-- -->
                                          <br>
                                          <h5>Senior High Application Form</h5>
                                          <div class="input-group">
                                              <span class="input-group-btn">
                                                  <span class=" btn btn-default btn-file2">
                                                      Browse... <input type="file" name="form3" id="data">
                                                  </span>
                                              </span>
                                              <input type="text" id="valdfil2" class="form-control" readonly />
                                              <span class="input-group-btn">
                                                      <button name="buttonform3"  class='btn btn-default'>Upload</button>
                                                  </span>
                                          </div>
                                          
                                          <input type="hidden" name="editformid" value="<?php echo $id?>">
                                          <?php

                                      }else{

                                       ?>
                                 
                                      <!--table -->
                                       <div class='demo_jui'>
                                        <table class='display' id='tbl' class='jtable'>
                                        <thead>
                                                        <tr>
                                                       
                                                        <td bgcolor='#FCAC45'><center>Newstudent Application Form</center></td>
                                                        <td bgcolor='#FCAC45'><center>Transferee Application Form</center></td>
                                                        <td bgcolor='#FCAC45'><center>Senior High Application Form</center></td>
                                                        <td bgcolor='#FCAC45'><center>Action</center></td>
                                                        </tr>

                                        </thead>
                                         <?php $applicationform= "SELECT * from tbl_applicationform";
                                                  $print_applicationform= mysql_query($applicationform);

                           
                                                  while($applicationform= mysql_fetch_array($print_applicationform)){
                                                    $db_id=$applicationform['id'];
                                                    $db_newstudentform=$applicationform['newstudentform'];
                                                    $db_transfereeform=$applicationform['transfereeform'];
                                                    $db_seniorhighform=$applicationform['seniorhighform'];
                                                       
                                                                                              }


                                                              echo "<tr><td><center><a  href='../../applicationform/$db_newstudentform' >View</a></center></td> <td><center><a  href='../../applicationform/$db_transfereeform' >View</a></center></td> <td><center><a  href='../../applicationform/$db_seniorhighform' >View</a></center></td>  <td><center><a  href='form.php?editform=$db_id' >Edit</a></center></td></tr>";
                                                  
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

                                                             }else{

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>ERROR WHILE UPLOADING!</font>";
                                                                                </script>
                                                                                <?php

                                                             }

                                                         }else{
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>INVALID! APPLICATION FORM FOR NEW STUDENT IS GREATER THAN 150 KB. PLEASE CHOOSE A DIFFERENT FILE SIZE.</font>";
                                                                                </script>
                                                                                <?php

                                                         }


                                                         }else{

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>INVALID FILE FORMAT. PLEASE CHOOSE A PDF TYPE ONLY.</font>";
                                                                                </script>
                                                                                <?php
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

                                                             }else{

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>ERROR WHILE UPLOADING!</font>";
                                                                                </script>
                                                                                <?php

                                                             }

                                                         }else{
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>INVALID! APPLICATION FORM FOR TRANSFEREE STUDENT IS GREATER THAN 150 KB. PLEASE CHOOSE A DIFFERENT FILE SIZE.</font>";
                                                                                </script>
                                                                                <?php

                                                         }


                                                         }else{

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>INVALID FILE FORMAT. PLEASE CHOOSE A PDF TYPE ONLY.</font>";
                                                                                </script>
                                                                                <?php
                                                         }

                                                       }
                                              }elseif(isset($_POST['buttonform3'])){ 
                                                $formid=$_POST['editformid'];

                                                 $file= $_FILES['form3']['name'];    
                                                 $file_name = rand(1000,100000)."-".$_FILES['form3']['name'];
                                                 $file_data = $_FILES['form3']['tmp_name'];
                                                 $file_size = $_FILES['form3']['size'];
                                                 $file_type = $_FILES['form3']['type'];
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
                                                                                document.getElementById("message").innerHTML="<font color='red'>PLEASE SELECT A APPLICATION FORM FOR SENIOR HIGH STUDENT!</font>";
                                                                                </script>
                                                                                <?php


                                                  }else{  
                                                     if(($file_type)=="application/pdf"){

                                                     if($file_size<=150000){

                                                             if(move_uploaded_file($file_data,$file_folder.$final_file)){
                                                               //inserting photo
                                                              $sql="UPDATE tbl_applicationform set seniorhighform='$final_file' where id='$formid'";
                                                              mysql_query($sql);

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='green'>SUCCESSFULLY UPLOADED</font>";
                                                                                </script>
                                                                                <?php

                                                             }else{

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>ERROR WHILE UPLOADING!</font>";
                                                                                </script>
                                                                                <?php

                                                             }

                                                         }else{
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>INVALID! APPLICATION FORM FOR SENIOR HIGH STUDENT IS GREATER THAN 150 KB. PLEASE CHOOSE A DIFFERENT FILE SIZE.</font>";
                                                                                </script>
                                                                                <?php

                                                         }


                                                         }else{

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>INVALID FILE FORMAT. PLEASE CHOOSE A PDF TYPE ONLY.</font>";
                                                                                </script>
                                                                                <?php
                                                         }

                                                       }
                                              }


  ?>




    <?php }?>