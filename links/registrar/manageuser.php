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
                    <title>Manage User</title>

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


                 
</style>  

</head>
<script type="text/javascript">



function usernameprofile(){
    var username= document.getElementById('username').value.length;
    var oldpassword= document.getElementById('oldpassword').value.length;



if(username==""){
  document.getElementById('user').innerHTML="<span style ='color: red;'>Username are required!</span>";
  return false;

}else{


          if(username>=12 && username<=25) {
           document.getElementById('user').innerHTML="<span style ='color: green;'>Username <i class='glyphicon glyphicon-ok'></i></span>";
   
                document.getElementById('validateusername').style.display = "none";
                
             
               }else{
                  document.getElementById('validateusername').innerHTML="<i style ='color: red;'>Atleast 12 to 25 characters for username!</i>";
                return false;
               }
}

  if(oldpassword==""){
  document.getElementById('oldpass').innerHTML="<span style ='color: red;'>Old password are required!</span>";
  return false;

}else{
            document.getElementById('oldpass').innerHTML="<span style ='color: green;'>Old password <i class='glyphicon glyphicon-ok'></i></span>";              
}


}


function adminprofile(){

    var oldpassword= document.getElementById('oldpassword').value.length;
    var password= document.getElementById('password').value.length;
    var password1=document.getElementById('password').value;
    var cpassword=document.getElementById('confirmpassword').value;
    



	if(oldpassword==""){
  document.getElementById('oldpass').innerHTML="<span style ='color: red;'>Old password are required!</span>";
  return false;

}else{
            document.getElementById('oldpass').innerHTML="<span style ='color: green;'>Old password <i class='glyphicon glyphicon-ok'></i></span>";              
}


        
    if(password==""){
  document.getElementById('pass').innerHTML="<span style ='color: red;'>New password are required!</span>";
  return false;

}else{


          if(password>=12 && password<=25) {
            document.getElementById('pass').innerHTML="<span style ='color: green;'>New password <i class='glyphicon glyphicon-ok'></i></span>";
   
                document.getElementById('validatepassword').style.display = "none";
                
             
               }else{
                  document.getElementById('validatepassword').innerHTML="<i style ='color: red;'>Atleast 12 to 25 characters for New password!</i>";
                return false;
               }
}




if(cpassword==""){
  document.getElementById('cpass').innerHTML="<span style ='color: red;'>Confirm password are required!</span>";
  return false;

}else{



               if(cpassword==password1|| password1==cpassword){
                    document.getElementById('cpass').innerHTML="<span style ='color: green;'>Confirm password <i class='glyphicon glyphicon-ok'></i></span>";
                    document.getElementById('validateconfirmpassword').style.display = "none";

                  }else{

                      
                      document.getElementById('cpass').innerHTML="<span style ='color: red;'> password are required <i class='glyphicon glyphicon-remove'></i></span>";
                       document.getElementById('validateconfirmpassword').innerHTML="<i style ='color: red;'>Password doesn't match!</i>";
                      return false;
                  }

}
}

        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        specialKeys.push(9); //Tab
        specialKeys.push(46); //Delete
        specialKeys.push(36); //Home
        specialKeys.push(35); //End
        specialKeys.push(37); //Left
        specialKeys.push(39); //Right

        //Text validation for password
       function forusername(e) {
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                           //48 to 57 (Numbers),            97 – 122 (Lowercase Alphabets)
                  var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 97 && keyCode <= 122) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }

        //Text validation for password
       function foroldpassword(e) {
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                           //48 to 57 (Numbers),            97 – 122 (Lowercase Alphabets)
                  var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 97 && keyCode <= 122) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }       
              
         //Text validation for password
       function forpassword(e) {
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                           //48 to 57 (Numbers),            97 – 122 (Lowercase Alphabets)
                  var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 97 && keyCode <= 122) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }  

              //Text validation for confirmpassword
       function forconfirmpassword(e) {
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                           //48 to 57 (Numbers),          97 – 122 (Lowercase Alphabets)
                  var ret = ((keyCode >= 48 && keyCode <= 57) ||  (keyCode >= 97 && keyCode <= 122) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }

//toggle password security field text html form login switch
function toggleconfirmpassword(){
var password= document.getElementById('confirmpassword');
var togglebuttonpassword= document.getElementById('togglebuttonconfirmpassword');

if(password.type=="password"){
  password.type="text";
  togglebuttonpassword.value="Hide"

}else{
  password.type="password";
  togglebuttonpassword.value="show"

}
}
</script>
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
        <li><a href="createaccounts.php"><i class="fa fa-plus"></i><span>Create acount</span> </a> </li>
        <li><a href="admission.php"><i class="fa fa-archive"></i><span>Admission</span> </a></li>
        <li><a href="inquiry.php"><i class="fa fa-newspaper-o"></i><span>Inquiry</span> </a> </li>
        <li><a href="faculty.php"><i class="fa fa-users"></i><span>Faculty</span> </a> </li>
        <li><a href="form.php"><i class="fa fa-file-pdf-o"></i><span>Form</span> </a> </li>
        <li><a href="event.php"><i class="fa fa-calendar-minus-o"></i><span>Event & Annoucement</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-long-arrow-down"></i><span>Manage</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li class="active"><a href="manageuser.php"><i class="fa fa-user-secret"></i> Admin Profile</a></li>
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
                          <h2>Manage User</h2>
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#profile" data-toggle="tab">Profile</a>
                                </li>
                                <li class=""><a href="#loginhistory" data-toggle="tab">Login History</a>
                                </li>
                               
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="profile">

                                      <div class="row">
                                        <div class="col-md-4">
                                        </div>
                                      <div class="col-md-4">
                                      <?php if(isset($_GET['editusername'])){
                                        ?>
                                    
                                     <form  method="POST" onsubmit="return usernameprofile(event)" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">   
                                      

                                        

                                            <p class="pull-right">Change username</p>
                                            <input type='text' class='form-control' placeholder='Username here.. *' maxlength="25" name='' id='' value='<?php echo $db_username ?>' readonly="readonly">

                                            <div class="form-group input-group"><!--Username Validation -->
                                            <i id='validateusername' ></i>
                                            <i id='user'></i>
                                            </div>

                                             <input type='text' class='form-control' placeholder='New Username here.. *' maxlength="25" name='changeusername' id='username' value='' onkeypress="return forusername(event);" ondrop="return false;" onpaste="return false;">



                                             <div class="form-group input-group"><!--Username Validation -->
                                            <i id='oldpass'></i>
                                            </div>
                                            <input type='password' class='form-control' placeholder='Old password here..*' maxlength="25" name='checkoldpassword' id='oldpassword' value='' onkeypress="return foroldpassword(event);" ondrop="return false;" onpaste="return false;" >
                                             <a href="manageuser.php" id="next">Back</a>
                                             <button type='submit' name='update_username' id='next'>Update</button>
                                            </form>

                                        <?php

                                        }else{?>


                                       <p><i>(*) Fields are required</i></p><i  id="error" style="color: Red; display: none"></i>           
                                            <i  id="error" style="color: Red; display: none"></i>
                                            <center><p id="message"></p></center>


                                            <?php   //Displaying photo
                                              $photo= "SELECT photo_file, photo_size, photo_type from tbl_registrar where id='$db_id'";
                                              $profile= mysql_query($photo);

                                              if($photo=mysql_fetch_array($profile)){
                                                $filephoto= $photo['photo_file'];
                                                $file_name1=$photo['photo_size'];
                                                $file_type1=$photo['photo_type'];
                                                    echo "
                                                    <form method='POST' enctype='multipart/form-data'>
                                                    <center><div class='form-group input-group'>
                                                    <img src='../../photos/$filephoto' width='110px' class='img-circle' height='110px'>
                                                    </div></center>

                                                      <div class='form-group input-group'>
                                                        <span class='input-group-btn'>
                                                            <span class=' btn btn-default btn-file'>
                                                                Browse... <input type='file' name='file' name='file'>
                                                            </span>
                                                        </span>
                                                        <input type='text' id='valdfil' class='form-control' readonly />
                                                        <span class='input-group-btn'>
                                                                <button class='btn btn-default' name='uploadpicture'>Upload</button>
                                                        </span>
                                                     </div>

                                                    </form>
                                                    ";
                                                }else{
                                                    echo "
                                                    <form method='POST' enctype='multipart/form-data'>
                                                    <center><div class='form-group input-group'>
                                                    <img src='../../images/user.png' width='110px' height='110px' class='img-circle'>
                                                    </div></center>

                                                      <div class='form-group input-group'>
                                                        <span class='input-group-btn'>
                                                            <span class=' btn btn-default btn-file'>
                                                                Browse... <input type='file' name='file' name='file'>
                                                            </span>
                                                        </span>
                                                        <input type='text' id='valdfil' class='form-control' readonly />
                                                        <span class='input-group-btn'>
                                                                <button class='btn btn-default' name='uploadpicture'>Upload</button>
                                                        </span>
                                                      </div>

                                                    </form>
                                                    ";
                                                  }?>





                                      <form  method="POST" onsubmit="return adminprofile(event)" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">    
                                            <div class="form-group input-group"><!--Username Validation -->
                                            <i id='validateusername' ></i>
                                            <i id='user'></i>
                                            </div>

                                            <a href="manageuser.php?editusername=<?php echo $db_id?>" class="pull-right">Change username</a>
                                            <input type='text' class='form-control' placeholder='Username here.. *' maxlength="25" name='username' id='username' value='<?php echo $db_username ?>' onkeypress="return forusername(event);" ondrop="return false;" onpaste="return false;" readonly="readonly" >
                                            
                                            
                                            <p href="" class="pull-right">Change password</p>
                                            <div class="form-group input-group"><!--Username Validation -->
                                            <i id='oldpass'></i>
                                            </div>
                                         
                                            <input type='password' class='form-control' placeholder='Old password here..*' maxlength="25" name='oldpassword' id='oldpassword' value='' onkeypress="return foroldpassword(event);" ondrop="return false;" onpaste="return false;" >
                                 
                                                                 
                                          


                                            <div class="form-group input-group"><!--Username Validation -->
                                            <i id='validatepassword' ></i>
                                            <i id='pass'></i>
                                            </div>
                                            <input type='password' class='form-control' placeholder='New password here.. *' maxlength="25" name='newpassword' id='password' value='' onkeypress="return forpassword(event);" ondrop="return false;" onpaste="return false;" >
                                     
                                        

                                            <div class="form-group input-group"><!--Username Validation -->
                                            <i id='validateconfirmpassword' ></i>
                                            <i id='cpass'></i>
                                            </div>

                                            <div class="input-group">
                                            <input type='password' class='form-control' placeholder='Confirm new password here.. *' maxlength="25" name='confirmpassword' id='confirmpassword' onkeypress="return forconfirmpassword(event);" ondrop="return false;" onpaste="return false;" >                                      
                                            <span  class="input-group-btn">
                                                    <button type='button' id='togglebuttonconfirmpassword' class='btn btn-default' onclick="toggleconfirmpassword()" ><span class='glyphicon glyphicon-eye-open'></span></button>
                                            </span>
                                            </div>     
                                            <button type='submit' name='update_profile' id='next'>Update</button>

                                            </form>
                                            <?php }?>

                                            </div>
                                            </div>
                                              <div class="col-md-4">
                                              </div>

                                </div>
                                <br>
                                <div class="tab-pane fade" id="loginhistory">

                                       <div class='demo_jui'>
                                    <table cellpadding='0' cellspacing='1' border='1' class='display' id='tbl' class='jtable'>
                                        <thead>
                                                        <tr>
                                                        <td><center>ID</center></td>
                                                        <td><center>Username</center></td>
                                                        <td><center>Time Logged_in</center></td>
                                                        <td><center>Time Logged_out</center></td>
                                                        </tr>

                                        </thead>
                                         <?php $echo= "SELECT * from tbl_registrar";
                                                  $print_echo= mysql_query($echo);

                                                  while($echo= mysql_fetch_array($print_echo)){
                                                    $db_id=$echo['id'];
                                                    $db_username=$echo['username'];
                                                    $db_timein=$echo['time_in'];
                                                    $db_timeout=$echo['time_out'];                     
                                                              echo "<tr><td><center>$db_id</center></td> <td><center>$db_username</center></td> <td><center>$db_timein</center></td> <td><center>$db_timeout</center></td></tr>";
                                      
                                                                                              }

                                        ?>
                                      </table>
                                      </div>
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
if(isset($_POST['update_username'])){

$username=mysql_real_escape_string(trim(htmlspecialchars($_POST['changeusername'])));
$oldpassword=mysql_real_escape_string(trim(htmlspecialchars($_POST['checkoldpassword'])));
$old_enc_password=mysql_real_escape_string(trim(htmlspecialchars(sha1(md5($oldpassword)))));
//Checking email if it has already registered
$repassword = mysql_query("SELECT password FROM tbl_registrar WHERE password='$old_enc_password'");
$checkpassword = mysql_num_rows($repassword);
if ($checkpassword != 0){

                                                                                $updateuser=mysql_query("UPDATE tbl_registrar SET username='$username' where id='$db_id'  ");
                                                                               
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='green'>Update has been successful</font>";
                                                                                </script>
                                                                                <?php   
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';                                                                           
}else{
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>Update failed! Old Password don't match</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';
}


}elseif(isset($_POST['update_profile'])){

$username=mysql_real_escape_string(trim(htmlspecialchars($_POST['username'])));

$oldpassword=mysql_real_escape_string(trim(htmlspecialchars($_POST['oldpassword'])));
$old_enc_password=mysql_real_escape_string(trim(htmlspecialchars(sha1(md5($oldpassword)))));

$newpassword=mysql_real_escape_string(trim(htmlspecialchars($_POST['newpassword'])));
$enc_password=mysql_real_escape_string(trim(htmlspecialchars(sha1(md5($newpassword)))));

//Checking email if it has already registered
$repassword = mysql_query("SELECT password FROM tbl_registrar WHERE password='$old_enc_password'");
$checkpassword = mysql_num_rows($repassword);
if ($checkpassword != 0){

                                                                                $updateuser=mysql_query("UPDATE tbl_registrar SET username='$username' where id='$db_id'  ");
                                                                                $updatepass=mysql_query("UPDATE tbl_registrar SET password='$enc_password' where id='$db_id'");
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='green'>Update has been successful</font>";
                                                                                </script>
                                                                                <?php   
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';                                                                           
}else{
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>Update failed! Old Password don't match</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';
}





} elseif(isset($_POST['uploadpicture'])){
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
                                                                                document.getElementById("message").innerHTML="<font color='red'>PLEASE SELECT A FILE.</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';

                                                  }else{  
                                                    if(($file_type)=="image/jpeg"||($file_type)=="image/png"){

                                                     if($file_size<=153600){

                                                             if(move_uploaded_file($file_data,$file_folder.$final_file)){
                                                               //inserting photo
                                                              $sql="UPDATE tbl_registrar set photo_file='$final_file', photo_size='$new_size', photo_type='$file_type' where id='$db_id'";
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
                                                                                document.getElementById("message").innerHTML="<font color='red'>ERROR WHILE UPLOADING!</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';

                                                             }

                                                         }else{
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>YOUR FILE IS LARGER THEN 150KB. PLEASE CHOOSE A DIFFERENT PICTURE!</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';

                                                         }


                                                         }else{

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>INVALID FILE FORMAT. PLEASE CHOOSE A DIFFERENT FILE FORMAT. IT SHOULD BE IN JPEG OR PNG FORMAT!</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';
                                                         }

                                                       }
                                              }

?>

    <?php }?>