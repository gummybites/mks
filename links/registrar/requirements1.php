<?php session_start();
include('config.php');
if(!isset($_SESSION['id'])){
header('Location: registrarlogin.php');
exit;



}else{

  ?>

  <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && count($_POST) < 1 ) {
    $_SESSION['error'] = 'File upload size exceeded';
    header('Location: requirements1.php');
    return;
    }                                        
                                             

                                       

   ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
Requirements
</title>
<link rel="stylesheet" href="../../css/bootstrap.min.css"></link>
<link rel="stylesheet" href="../../css/style.css"></link>
<script src="../../js/jquery.1.11.1.js"></script>
                    <script src="../../js/bootstrap.js"></script>
                    <script src="../../js/dropdown.js"></script>
                    <script src="../../js/bootstrap.min.js"></script>
<head>




<style>


 #form .btn {
  border-radius: 50px;
            }
hr {
  height: 4px;
  margin-left: 15px;
  margin-bottom:-3px;

}
.hr-warning{
   height: 4px;
  background-image: -webkit-linear-gradient(left, rgba(210,105,30,.8), rgba(210,105,30,.6), rgba(0,0,0,0));
}
.breadcrumb {
  background: rgba(245, 245, 245, 0); 
  border: 0px solid rgba(245, 245, 245, 1); 
  border-radius: 25px; 
  display: block;
}

.btn-bread{
    margin-top:10px;
    font-size: 12px;
    
    border-radius: 3px;
}

#footer{
  margin-top: 380px;

}

#caption{
  text-align: center;

}


td{

  text-align: center;
}

.inputfile {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}

legend a {
  color: inherit;
}
legend.legendStyle {
padding-left: 5px;
padding-right: 5px;
}
fieldset.fsStyle {
font-family: Verdana, Arial, sans-serif;
font-size: small;
font-weight: normal;
border: 1px solid #999999;
padding: 4px;
margin: 5px;
}
legend.legendStyle {
font-size: 90%;
color: #888888;
background-color: transparent;
font-weight: bold;
}

legend {
width: auto;
border-bottom: 0px;
}


</style>

</head>
<!-- remove this if you use Modernizr -->
    <script>(function(e,t,n){

      var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);

      </script>
<body >




<nav id="menu" class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
      
      <ul class="nav navbar-nav navbar-right">
      
        <li class="dropdown ">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            Settings
            <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li class="dropdown-header">SETTINGS</li>
              <li class=""><a href="#">Manage user</a></li>
              <li class="divider"></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>    



  <div class="container-fluid main-container">
      <div class="col-md-2  sidebar col-xs-2 col-offset-1">
        <div class="row">
  <!-- uncomment code for absolute positioning tweek see top comment in css -->
  <div class="absolute-wrapper"> </div>
  <!-- Menu -->
  <div class="side-menu">
    <nav class="navbar navbar-default" role="navigation">
      <!-- Main Menu -->
      <div class="side-menu-container">
        <ul class="nav navbar-nav">
          
          <li><a href="registrar.php"><span class="glyphicon glyphicon-"></span> Home</a></li>
          <!-- Dropdown-->
          <li  id="dropdown">
            <a data-toggle="collapse" href="#dropdown-lvl1">
              <span class="glyphicon glyphicon-"></span> Inquiry <span class="caret"></span>
            </a>

            <!-- Dropdown level 1 -->
            <div id="dropdown-lvl1" class="panel-collapse collapse-in">
              <div class="panel-body">
                <ul class="nav navbar-nav">
                  <li><a href="tuition.php"><span class="glyphicon glyphicon-"></span> Tuition</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-"></span> Permit</a></li>
                  <li class='active'><a>Requirements</a></li>
                  


                  
                </ul>
              </div>
            </div>
          </li>

          <li  id="dropdown">
                  <a data-toggle="collapse" href="#dropdown-lvl2">
                    <span class="glyphicon glyphicon-"></span> STUDENTS <span class="caret"></span>
                  </a>

                  <!-- Dropdown level 1 -->
                  <div id="dropdown-lvl2" class="panel-collapse collapse">
                    <div class="panel-body">
                      <ul class="nav navbar-nav">
                        <li><a href="prospectivestudents.php"><span class="glyphicon glyphicon-"></span> Create Account</a></li>
                        <li><a href="newstudentdetails.php"><span class="glyphicon glyphicon-"></span> Student Admission</a></li>
                    
                      </ul>
                    </div>
                  </div>


                   <a data-toggle="collapse" href="#dropdown-lvl3">
                    <span class="glyphicon glyphicon-"></span> TEACHERS <span class="caret"></span>
                  </a>

                  <!-- Dropdown level 1 -->
                  <div id="dropdown-lvl3" class="panel-collapse collapse">
                    <div class="panel-body">
                      <ul class="nav navbar-nav">
                        <li><a href="#"><span class="glyphicon glyphicon-"></span> Create Account</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-"></span> Teacher Admission</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-"></span> Teacher Details</a></li>                       
                      </ul>
                    </div>
                  </div>
                </li>
          


          

          <li><a href="subjects.php"><span class="glyphicon glyphicon-"></span> Subjects</a></li>
    

        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>

  </div>
</div></div>

      <div class="col-md-10 content col-xs-10 col-offset-1">
      

              <p class="hr-warning" /></p>
                <ol class="breadcrumb bread-warning">
          
                </ol>


            <form method="POST" enctype="multipart/form-data">      

          
                                            
                                            <div><i  id="error" style="color: Red; display: none">NOTE: Must be in character only. Special characters are not allowed!</i>

                                            </div>

            <?php 
              if(isset($_GET['id'])){




              }else{
            ?>


              <div class='demo_jui'>
                        <table cellpadding='0' cellspacing='1' border='1' class='display' id='tbl' class='jtable'>
                        <thead>

                                          <tr>
                                              <th bgcolor='#FCAC45'><center>Surname</center></th>
                                              <th bgcolor='#FCAC45'><center>Firstname</center></th>
                                              <th bgcolor='#FCAC45'><center>Middlename</center></th>
                                              <th bgcolor='#FCAC45'><center>Action</center></th>
                 
                                              </tr>

                                              </thead>
                                              <?php 
                                           
                                              $details="SELECT * from tbl_prospectivestudents";
                                              $res_details=mysql_query($details);

                                              while($details = mysql_fetch_array($res_details))
                                              {
                                                $student_count=$details['id'];
                                                $student_surname=$details['surname'];
                                                $student_firstname=$details['firstname'];
                                                $student_middlename=$details['middlename'];
                                                $email=$details['email'];

                                                  echo "<tr><td><center>$student_surname</center></td><td><center>$student_firstname</center></td><td><center>$student_middlename</center></td><td><center><a href='?id=$student_count'><img src='viewaccount.png' width='130px' height='40px'></a></center></td>";
                                              }

                                              
                                                


                                              ?> 
                                              </table></div>
                                              <?php }?>








                                              <?php 
                                              if(isset($_POST['submit'])){

                                              echo "<div class='alert alert-info'><span class='glyphicon glyphicon-info-sign'></span> Requirement's successfully submitted!</div>";
                                              }

                                              elseif(isset($_GET['id'])){
                                              echo  "<a href='requirements1.php'>Back</a>";
                                              $get_count = $_GET['id'];
                                               //Displaying Information
                                              $information = "SELECT * from tbl_prospectivestudents where id='$get_count'";
                                              $information_result = mysql_query($information);
                                              
                                              while($information = mysql_fetch_array($information_result))
                                              {
                                                $email=$information['email'];
                                                $user=$information['username'];
                                                $fname=$information['firstname'];
                                                $mname=$information['middlename'];
                                                $sname=$information['surname'];
                                                                                      
                                              }


                                              ?>
                                              <div class="cold-md-12">
                                                <fieldset class="fsStyle">
                                                      <legend class="legendStyle">
                                                                  <a data-toggle="collapse" data-target="#demo" href="#"><?php echo $sname; ?>'s Requirements</a>
                                                      </legend>
                                                      <div class="row collapse in" id="demo">
                                                      </div>
                                              
                                              
                                              <?php

                                               echo "<p id='message' class='text-center'></p>"; 



                               

                                             


                                              //Displaying photo
                                              $photo= "SELECT * from tbl_studentimages where id='$get_count'";
                                              $profile= mysql_query($photo);

                                              if($photo=mysql_fetch_array($profile)){
                                                $id=$photo['id'];
                                                $filephoto= $photo['file'];
                                                $file_name1=$photo['size'];
                                                $file_type1=$photo['type'];

                                               
                                               
                                                echo "<div class='row'>
                                                   
                                                      <div class='col-md-2'>
                                                      <img src='../../photos/$filephoto' width='139px' height='144px'></div>
                                                      
                                                      
                                                      

                                                      <div class='col-md-2'>
                                                      <div class='row'>
                                                      STUDENT ID NUMBER: 
                                                      </div>

                                                      <div class='row'>
                                                      SURNAME:  $sname 
                                                      </div>

                                                      <div class='row'>
                                                      FIRSTNAME:  $fname
                                                      </div>

                                                      <div class='row'>
                                                      MIDDLENAME: $mname
                                                      </div>
                                                      </div>
                                                      </div>

                                                      <div class='row'>
                                                        <div class='col-md-6'>
                                                      <input type='file' name='file' id='file-4' class='inputfile'/>
                                                      <label for='file-4'> <span class='form-control'>Choose a photo...</label>
                                                      <span class='input-group-btn'>
                                                      <button  class='btn btn-primary' type='submit' name='uploadpicture'><span class='btn-label'><i class='glyphicon glyphicon-upload'></i> </span>Upload</button>
                                                      </span>
                                                      
                                                                                                      
                                                      </div>
                                                      </div>
                                                      ";
                                              

                                              }else{
                                                 
                                                  ?>
                                                  
                                                <div class='row'>
                                                
                                                <div class='col-md-2'>
                                                <img src='../../photos/user.png' width='139px' height='144px' class="img-polaroid">
                                                </div>
               


                                                <div class='col-md-10'>
                                                <div class='row'>
                                                STUDENT ID NUMBER: 
                                                </div>

                                                <div class='row'>
                                                SURNAME: <?PHP echo $sname; ?>
                                                </div>

                                                <div class='row'>
                                                FIRSTNAME: <?PHP echo $fname; ?>
                                                </div>

                                                <div class='row'>
                                                MIDDLENAME: <?PHP echo $mname; ?>
                                                </div>
                                                </div>
                                                </div>

                                                <div class='row'>
                                                <div class='col-md-6'>
                                                <input type="file" name="file" id="file-4" class="inputfile"/>
                                                <label for="file-4"> <span class='form-control'>Choose a photo...</label>
                                                <span class="input-group-btn">
                                                <button  class='btn btn-primary' type='submit' name='uploadpicture'><span class="btn-label"><i class="glyphicon glyphicon-upload"></i> </span>Upload</button>
                                                </span>
                                                
                                                                                                
                                                </div>
                                                </div>
                                                <?php
                                                    }

                                                      

                                              if(isset($_POST['uploadpicture'])){
                                               //if the file size is 150kb
                                  
                                       

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
                                                  $sql="INSERT INTO tbl_studentimages(id,file,type,size) VALUES('$get_count','$final_file','$file_type','$new_size')";
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
                                              
                                                
                                              <?php
                                              

                                              //Displaying Requirements
                                               $requirements="SELECT * FROM tbl_studentrequirements where id='$get_count'";
                                               $requirements_result=mysql_query($requirements);
                                               while($requirements=mysql_fetch_array($requirements_result))
                                               {
                                                  $form138_file= $requirements['form138_file'];
                                                  $form138_type=$requirements['form138_type'];
                                                  $form138_size=$requirements['form138_size'];
                                                  $form138=$requirements['Form138'];

                                                  $goodmoral_file= $requirements['goodmoral_file'];
                                                  $goodmoral_type=$requirements['goodmoral_type'];
                                                  $goodmoral_size=$requirements['goodmoral_size'];
                                                  $goodmoral=$requirements['GoodMoral'];

                                                  $birthcertificate_file= $requirements['birthcertificate_file'];
                                                  $birthcertificate_type=$requirements['birthcertificate_type'];
                                                  $birthcertificate_size=$requirements['birthcertificate_size'];
                                                  $birthcertificate=$requirements['BirthCertificate'];

                                                        ?>

                                                         <div class="table-responsive">          
                                                        <table class="table" >
                                                          <thead>
                                                            <tr>
                                                              <th  bgcolor='#FCAC45' id='caption'>DOCUMENT NAME</th>
                                                              <th  bgcolor='#FCAC45' id='caption'>DOCUMENT FILE NAME</th>
                                                              <th  bgcolor='#FCAC45' id='caption'>DOCUMENT FILE SIZE</th>
                                                              <th  bgcolor='#FCAC45'id='caption'>FILE</th>
                                                              <th  bgcolor='#FCAC45' id='caption'>ACTION</th>
                                                            
                                                            </tr>
                                                          </thead>
                                                            <tbody>

    

                                                    
                                                      <?php


                                                  if($form138==0){      
                                                        ?>


                                                                                                              <tr>
                                                          <td>FORM138</td>
                                                          <td>--</td>
                                                          <td>--</td>
                                                          <td><input type="file" name="file1" id="file-1" class="inputfile"/>
                                                              <label for="file-1"> <span>Choose a form138 file...</label></td>
                                                          <td><button type='submit' class='btn btn-primary' onclick="return btnupload1()" name='btn-upload1'  > <span class="btn-label"><i class="glyphicon glyphicon-upload"></i> </span>Upload</button></td>
                                                    
                                                        </tr>

                                                      
                                                        <?php
                                                  }else{
                                                      ?>
                                                        <tr>
                                                          <td>FORM138</td>
                                                          <td><?php echo $form138_file?></td>
                                                          <td><?php echo $form138_size ?>kb</td>
                                                          <td><a href="../../document/<?php echo $form138_file?>" target="_blank"><img src='pdf.png' width='30px' height='20px'></a></td>
                                                          <td><a href="../../document/<?php echo $form138_file?>" target="_blank"><img src='edit_delete.png' id='pdf' width='30px' height='20px'></a></td>
                                                    
                                                        </tr>
                                                        <?php
                                                  }

                                                      ?>
                                                      
                                                      <?php

                                                  if($goodmoral==0){
                                                       ?>
                                                       <tr>
                                                          <td>GOODMORAL</td>
                                                          <td>--</td>
                                                          <td>--</td>
                                                          <td><input type="file" name="file2" id="file-2" class="inputfile"/>
                                                              <label for="file-2"> <span>Choose a goodmoral file...</label></td>
                                                          <td><button type='submit' class='btn btn-primary' name='btn-upload2' onclick="return btnupload2()" > <span class="btn-label"><i class="glyphicon glyphicon-upload"></i> </span>Upload</button></td>
                                                    
                                                        </tr>
                                                        <?php
                                                  }else{
                                                      ?>
                                                      <tr>
                                                          <td>GOODMORAL</td>
                                                          <td><?php echo $goodmoral_file?></td>
                                                          <td><?php echo $goodmoral_size ?>kb</td>
                                                          <td><a href="../../document/<?php echo $goodmoral_file?>" target="_blank"><img src='pdf.png' width='30px' height='20px'></a></td>
                                                          <td><a href="../../document/<?php echo $goodmoral_file?>" target="_blank"><img src='edit_delete.png' id='pdf' width='30px' height='20px'></a></td>
                                                    
                                                        </tr>
                                                        <?php
                                                  }

                                                    ?>
                                                      
                                                      <?php

                                                  if($birthcertificate==0){
                                                       ?>
                                                       <tr>
                                                          <td>BIRTH CERTIFICATE</td>
                                                          <td>--</td>
                                                          <td>--</td>
                                                          <td><input type="file" name="file3" id="file-3" class="inputfile"/>
                                                              <label for="file-3"> <span>Choose a birth certificate  file...</label></td>
                                                          <td><button type='submit' class='btn btn-primary' name='btn-upload3' onclick="return btnupload3()"  > <span class="btn-label"><i class="glyphicon glyphicon-upload"></i> </span>Upload</button></td>
                                                    
                                                        </tr>
                                                        <?php
                                                  }else{
                                                      ?>
                                                      <tr>
                                                          <td>BIRTHCERTIFICATE</td>
                                                          <td><?php echo $birthcertificate_file?></td>
                                                          <td><?php echo $birthcertificate_size ?>kb</td>
                                                          <td><a href="../../document/<?php echo $birthcertificate_file?>" target="_blank"><img src='pdf.png' width='30px' height='20px'></a></td>
                                                          <td><a href="../../document/<?php echo $birthcertificate_file?>" target="_blank"><img src='edit_delete.png' id='pdf' width='30px' height='20px'></a></td>
                                                    
                                                        </tr>
                                                         <?php
                                                     
                                                     ?>
                                                            </tbody>
                                                            </table>
                                                            </div>
                                                        </table>

                                                        </fieldset>
                                            </div>
                                                      <?php
                                                  }





                                              }//while searching for requirements

                                               
                                              
                                            
                                                  if(isset($_POST['btn-upload1'])){
                                                include_once 'config.php';
                                      
                                               $id=$_GET['id'];
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
                                                      
                                                        
                                                                           $sql="UPDATE tbl_studentrequirements set  form138_file='$final_file',form138_type='$file_type',form138_size='$new_size',Form138='1' where id='$get_count' ";
                                                                          mysql_query($sql);
                                                                          mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus='ACCEPTED' where id='$get_count'");

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
                                              }
                                            


                                            elseif(isset($_POST['btn-upload2'])){
                                                include_once 'config.php';

                                            
                                                $id=$_GET['id'];
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
                                                      
                                                        
                                                         $sql="UPDATE tbl_studentrequirements set  goodmoral_file='$final_file',goodmoral_type='$file_type',goodmoral_size='$new_size',GoodMoral='1' where id='$get_count' ";
                                                        mysql_query($sql);
                                                         mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus='ACCEPTED' where id='$get_count'");

                                                        
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
                                            }


                                            elseif(isset($_POST['btn-upload3'])){
                                                include_once 'config.php';
                                                $id=$_GET['id'];
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
                                                                                parent.document.getElementById("message").innerHTML="<font color='green'>BIRTHCERTIFICATE YOU SELECT ARE ALREADY EXISTING. PLEASE CHOOSE ANOTHER FILE.</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';
                                              }else{

                                                  if(($file_type)=="application/pdf"){

                                                  //if the file size is 150kb
                                                   if($file_size<=150000){

                                                       if(move_uploaded_file($file_data,$file_folder.$final_file)){
                                                        //inserting photo
                                                      
                                                        
                                                         $sql="UPDATE tbl_studentrequirements set  birthcertificate_file='$final_file',birthcertificate_type='$file_type',birthcertificate_size='$new_size',BirthCertificate='1' where id='$get_count' ";
                                                        mysql_query($sql);
                                                         mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus='ACCEPTED' where id='$get_count'");

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

                                              
                                            }
                                             
   


                                              
                                              ?>
                                              
                                             
                                                        
                                                        
                                            
                                              <?php
                                              }


                                             
                                              ?>





          </form>
               
    </div>  

</div>

   


                              

     


 
    
      

<style type="text/css" title="currentStyle">
           
            @import "../../css/demo_page.css";
            @import "../../css/demo_table_jui.css";
            
        </style>
<script src="../../js/jquery.dataTable.js"></script>
        <script type="text/javascript" charset="utf-8">
            jQuery(document).ready(function() {
                oTable = jQuery('#tbl').dataTable({
                    "bJQueryUI": true, 
                    "sPaginationType": "full_numbers"
                                } );

                });     
        </script>

<script src="../../js/custom-file-input.js"></script>
</body>
</html>
    <?php }?>