<?php 
session_start();
include('../config.php');
if(!isset($_SESSION['username'])){
header('Location: freshmanlogin.php');
exit;

}else{

$_SESSION['username'];
$username=$_SESSION['username'];

$qry="SELECT * from tbl_studentregistration where username='$username' and seeking='Grade 7' and prospectivestatus='pending'";
$res= mysql_query($qry);

while($qry=mysql_fetch_array($res)){
  $db_username=$qry['username'];
  $db_email=$qry['email'];
  $db_seeking=$qry['seeking'];
  $db_status=$qry['status'];
  $db_firstname=$qry['firstname'];
  $db_surname=$qry['surname'];
  $db_code=$qry['code'];
}
 ?>
<?php            
                            if(isset($_POST['submit']))
                          {
                             
                              $year = $_POST ['year'];
                              $applied = date('F j,Y');
                              $Sname=mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST['surname']))));
                              $Fname=mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST['firstname']))));
                              $Mname=mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST['middlename']))));
                          
                              $per = mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST['permanent']))));
                              $tele = mysql_real_escape_string(htmlspecialchars(trim($_POST ['telephone'])));
                              $mobi = mysql_real_escape_string(htmlspecialchars(trim($_POST['mobile'])));

                              $month= $_POST['month'];
                              $day= $_POST['day'];
                              $years= $_POST['years'];
                              $birthday= $day.'/'.$month.'/'.$years;
                              $age =  date('Y')-$years;


                              $Sex= mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST ['gender']))));
                              $bplace = mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST ['birthplace']))));
                              $reli = mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST['religion']))));
                              
                              $gname= mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST ['guardianname']))));
                              $gadd = mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST ['guardianaddress']))));
                              $gcon = mysql_real_escape_string(htmlspecialchars(trim($_POST['guardiancontact'])));
                          
                             
                                $qry = "SELECT * from tbl_prospectivestudents";
                                $result = mysql_query($qry);

                                if(mysql_num_rows($result) >= 0)
                                {
                                $x = 1; 
                                while($qry = mysql_fetch_array($result))
                                { 
                                $x++; 
                                } 

 
                                }
                                 
                                        //inserting application data
                                        $forms=("INSERT into tbl_prospectivestudents 
                                        (id,email,year,seeking,applieddate,status,surname,firstname,middlename,prospectivestatus) 
                                        
                                        VALUES ('$x','$db_email','$year','$db_seeking','$applied','$db_status','$Sname','$Fname','$Mname','PENDING')");
                                        mysql_query($forms);

                                        $details=("INSERT INTO tbl_studentdetails (id,peraddress,telephone,mobile,birthdate,age,gender,birthplace,religion,guardianname,guardianaddress,guardiancontact) VALUES ('$x','$per','$tele','$mobi','$birthday','$age','$Sex','$bplace','$reli','$gname','$gadd','$gcon')");
                                        mysql_query($details);


                                        mysql_query("INSERT INTO  tbl_studentrequirements (id) values ('$x')");

                                        header('url=freshmanapplicationform.php?Success!');
                        }

                        elseif(isset($_POST['changeemail'])){
                          $username=$_POST['username'];
                          $email=$_POST['email'];

                          //Checking email if it has already registered
                                                                $remail = mysql_query("SELECT email FROM tbl_studentregistration WHERE email='$email'");
                                                                $checkemail = mysql_num_rows($remail);
                                                                      if ($checkemail != 0){
                                                                                header("Location: freshmanapplicationform.php?EmailAlreadyRegistered=error!");
                                                                                
                                                                                            }else{
                                                                                              mysql_query("UPDATE tbl_studentregistration set email='$email' where username='$username'");
                                                                                              header("Location: freshmanapplicationform.php?updatesuccess!");

                                                                                            }

                          
                        }


                        elseif(isset($_POST['edit_update'])){
                              $id=$_POST['id'];
                              $email=$_POST['email'];
                              $Sname=mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST['surname']))));
                              $Fname=mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST['firstname']))));
                              $Mname=mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST['middlename']))));
                          
                              $per = mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST['permanent']))));
                              $tele = mysql_real_escape_string(htmlspecialchars(trim($_POST ['telephone'])));
                              $mobi = mysql_real_escape_string(htmlspecialchars(trim($_POST['mobile'])));
                              $bplace = mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST ['birthplace']))));

                              $gname= mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST ['guardianname']))));
                              $gadd = mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST ['guardianaddress']))));
                              $gcon = mysql_real_escape_string(htmlspecialchars(trim($_POST['guardiancontact'])));



                              mysql_query("UPDATE tbl_prospectivestudents set surname='$Sname', firstname='$Fname', middlename='$Mname' where id='$id' ");
                              mysql_query("UPDATE tbl_studentdetails set peraddress='$per', telephone='$tele', mobile='$mobi', birthplace='$bplace',guardianname='$gname',guardianaddress='$gadd',guardiancontact='$gcon' where id='$id'");
                              header("Location: freshmanapplicationform.php?editapplication=$email");
                        }

                        elseif(isset($_POST['edit_birthdate'])){
                              $id=$_POST['id'];
                              $email=$_POST['email'];


                              $month= $_POST['month'];
                              $day= $_POST['day'];
                              $years= $_POST['years'];
                              $birthday= $day.'/'.$month.'/'.$years;
                              $age =  date('Y')-$years;

                              mysql_query("UPDATE tbl_studentdetails set birthdate='$birthday', age='$age' where id='$id'");
                              header("Location: freshmanapplicationform.php?editbirthdate=$email");
                        }elseif(isset($_POST['edit_gender'])){
                              $id=$_POST['id'];
                              $email=$_POST['email'];

                              $Sex= mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST ['gender']))));

                              mysql_query("UPDATE tbl_studentdetails set gender='$Sex' where id='$id'");
                              header("Location: freshmanapplicationform.php?editgender=$email");



                        }elseif(isset($_POST['edit_religion'])){
                              $id=$_POST['id'];
                              $email=$_POST['email'];

                              $reli = mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST['religion']))));

                              mysql_query("UPDATE tbl_studentdetails set religion='$reli' where id='$id'");
                              header("Location: freshmanapplicationform.php?editreligion=$email");

                        }

                          ?>

<!DOCTYPE html>

<head>
 
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
                    <title><?php if($db_code=='0'){
                                  echo "Email account not verified";
                                  }elseif($db_code=='1'){
                                  echo "Email Verified: Freshmen Application Form";
                                    } ?></title>
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

<style>
                 
                      body{ background: url(../../images/45.gif); background-size: cover; color:#838383; font: 13px/1.7em 'Calibri';}

                    .alert-warning
                    {

                        margin: 20px 0;
                        padding: 15px;
                        border-left: 6px solid #d73814;
                        margin-bottom: 10px;
                        border-radius: 0px;
                        -webkit-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
                           -moz-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
                                box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
                    }

                    .alert-info
                    { 
                        margin: 20px 0;
                        padding: 15px;
                        border-left: 6px solid #d73814;
                        margin-bottom: 10px;
                        border-radius: 0px;
                        -webkit-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
                           -moz-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
                                box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
                    }


                     .alert-success
                    {
                        margin: 20px 0;
                        padding: 15px;
                        border-left: 6px solid #d73814;
                        margin-bottom: 10px;
                        border-radius: 0px;
                        -webkit-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
                           -moz-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
                                box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
                    }

                    

                    .next {
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
                    .next:before {
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

                    .next:hover, .next:focus, .next:active {
                          color: #fff;
                        }
                        .next:hover:before, .next:focus:before, .next:active:before {
                          -webkit-transform: scaleX(1);
                          transform: scaleX(1);
                        }
                   .btn-info{
                      background: #0064d2;

                   }
</style>
<script language="javascript">
function PrintMe(el) {
var disp_setting="toolbar=yes,location=no,";
disp_setting+="directories=yes,menubar=yes,";
disp_setting+="scrollbars=yes,width=650, height=600, left=100, top=25";
   var content_vlue = document.getElementById(el).innerHTML;
   var docprint=window.open("","",disp_setting);
   docprint.document.open();
   docprint.document.write('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"');
   docprint.document.write('"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">');
   docprint.document.write('<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">');
   docprint.document.write('<head><title>MARIA KATRINA SCHOOL APPLICATION FORM</title>');
   docprint.document.write('<link rel="stylesheet" href="../../css/bootstrap.min.css"></link>');
   docprint.document.write('<link rel="stylesheet" href="../../css/bootstrap.css"></link>');                
   docprint.document.write('</head><body onLoad="window.print()"><form>');
   docprint.document.write('<center><P>MARIA KATRINA SCHOOL</P></center>'); 
   docprint.document.write('<br><center><P>No. 10 Mendoza St. Saog, Marilao Bulacan</P></center>'); 
   docprint.document.write('<center><img src="../../images/mks.jpg" height="100px" width="100px"></link></center>');  
   docprint.document.write('<br><center><B>APPLICATION FOR ADMISSION (NEW STUDENT)</B></center>');
    docprint.document.write('<br><br><br><br><br><br><br>');
   docprint.document.write(content_vlue);
   docprint.document.write('</form></body></html>');
   docprint.document.close();
   docprint.focus();
}

</script>
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
        <li> <a href="freshmanlogout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>     



<?php 
if($db_code=='0'){
?>
<div class="container">
  <div class="col-sm-12 col-md-12 ">
            <div class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 <p>Please check your email <strong><?php echo $db_email ?></strong> and click on the account activation link. If you have not received account activation link please click on link below to request new account activation link.</p>
                <a href='freshmanapplicationform.php?email=<?php echo $db_email ?>' class='next'><i class='glyphicon glyphicon-refresh'></i> Resend confirmation link</a>
                <a href='freshmanapplicationform.php?username=<?php echo $db_username ?>' class='next'><i class='glyphicon glyphicon-envelope'></i> Edit Email</a>
            </div>
  </div>
  </div>
<?php


//kapag naka click yung RESEND CONFIRMATION LINK
if(isset($_GET['email'])){
  $email= $_GET['email'];
$confirmed=rand(0,999);
mysql_query("UPDATE tbl_studentregistration set confirm_code='$confirmed' where email='$email' ");

$message= "Confirm your email
  Click the link below to verify your account 
    http://www.sims-mks.com/links/newstudent/freshmanapplicationform.php?emailconfirmed=$email&code=$confirmed
";  

mail($email,"$email Confirm Email",$message,'From: $email');

    ?>
    <div class="container">
    <div class="col-sm-12 col-md-12" >
    <div class="alert alert-info">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <b>Confirmation code has been send successfully. Please check and activate your account.</b> <i class="fa fa-check"></i>
    </div>
    </div>
    </div>
    <?php
}


//kapag naka click yung EMAIL confirmation
if(isset($_GET['emailconfirmed'])&& isset($_GET['code'])){
    $email=$_GET['emailconfirmed'];
     $code=$_GET['code'];

    $qry="SELECT * from tbl_studentregistration where email='$email'";
    $res=mysql_query($qry);
    while($qry=mysql_fetch_array($res)){
      $db_code=$qry['code'];
      $db_confirmcode=$qry['confirm_code'];

    }

    if($code==$db_code){

    mysql_query("UPDATE tbl_studentregistration set code='1' where email='email'");
    mysql_query("UPDATE tbl_studentregistration set confirm_code='0' where email='email'");
    }else{
      echo "Code does not match!";

    }

}



//kapag naka click yung EDIT EMAIL
if(isset($_GET['username'])){
  $username= $_GET['username'];

  $qry="SELECT * from tbl_studentregistration where username='$username'";
  $res=mysql_query($qry);

  while($qry=mysql_fetch_array($res)){
    $email=$qry['email'];
  }


  ?>
  <div class="container">
  <div class="col-sm-12 col-md-12" >
  <div class="alert alert-info">
  <legend>UPDATE EMAIL</legend>
  <form method="POST" onsubmit="return updateemail()">

  <i  id="error" style="color: Red; display: none"></i>
  <i id='validateemail' ></i>
  <i id='mail'></i><!--For validation-->

  <div class="form-group input-group">
  <input type="text" class='form-control' value="<?php echo $email ?>" id="email" name="email" onkeypress="return foremailregistration(event);" ondrop="return false;" onpaste="return false;">
  <span class='input-group-btn' >
  <input type='submit' name='changeemail' value='update' class='btn btn-info'>
  </span>
  </div>
  <input type='hidden' name='username' value='<?php echo $username?>'>
  </form>
  </div>
  </div>
  </div>
  <?php 
}

 if(isset($_GET['updatesuccess!'])){
    ?>
    <div class="container">
    <div class="col-sm-12 col-md-12" >
    <div class="alert alert-info">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <b>Your Email Address has been updated successfully</b> <i class="fa fa-check"></i>
    </div>
    </div>
    </div>
    <?php
  }elseif(isset($_GET['EmailAlreadyRegistered'])){
    ?>
    <div class="container">
    <div class="col-sm-12 col-md-12" >
    <div class="alert alert-warning">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <b>Email Address you want to change is already registered. Please type another email..</b> <i class="fa fa-remove"></i>
    </div>
    </div>
    </div>
    <?php

  }



}elseif($db_code=='1'){
//Kapag naconfirm na sa email
 $qry="SELECT * from tbl_prospectivestudents inner join tbl_studentdetails on tbl_prospectivestudents.id=tbl_studentdetails.id where email='$db_email' ";
 $res=mysql_query($qry);

                          if($qry=mysql_fetch_array($res)){
                            $db_email=$qry['email'];
                            $year=$qry['year'];
                            $level=$qry['seeking'];
                            $date=$qry['applieddate'];
                            $stat=$qry['status'];
                            $sname=$qry['surname'];
                            $fname=$qry['firstname'];
                            $mname=$qry['middlename'];
                            $per=$qry['peraddress'];
                            $tele=$qry['telephone'];        
                            $mob=$qry['mobile'];
                            $birt=$qry['birthdate'];
                            $ages=$qry['age'];
                            $sex=$qry['gender'];
                            $place=$qry['birthplace'];          
                            $reli=$qry['religion'];
                            $gname=$qry['guardianname'];
                            $gadd=$qry['guardianaddress'];
                            $gcon=$qry['guardiancontact'];
                        
                         
//Kung may laman na ang table
if($db_email==0){

        ?>
        <div class="container">
          <div class="col-sm-12 col-md-12 ">
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         <p>Your email has been verified <strong><?php echo $db_email ?></strong>.. You are ready to fill up the application form.</p>
                        


                    <?php if(isset($_GET['view'])){ ?>
                    <a href='freshmanapplicationform.php?editapplication=<?php echo $db_email ?>' class='next'><i class='glyphicon glyphicon-edit'> </i> Edit Application</a>    
                        <button type='submit' href='#' class='next'  onclick="PrintMe('divid')"><i class='glyphicon glyphicon-print'></i> Print</button>
                    <?php }elseif(isset($_GET['editapplication'])){?>
                        <a href='freshmanapplicationform.php?view=<?php echo $db_email ?>' class='next'><i class='glyphicon glyphicon-search'> </i> View Application</a>
                        
                    
                    <?php }else{ ?>
                          <a href='freshmanapplicationform.php?view=<?php echo $db_email ?>' class='next'><i class='glyphicon glyphicon-search'> </i> View Application</a>

                    <?php } ?>
                    </div>
          </div>
          </div>


       
          <?php
        if(isset($_GET['editreligion'])){
          $email=$_GET['editreligion'];
          $qry="SELECT * from tbl_prospectivestudents inner join tbl_studentdetails on tbl_prospectivestudents.id=tbl_studentdetails.id where email='$email' ";
          $res=mysql_query($qry);
          while($qry=mysql_fetch_array($res)){
                            $id=$qry['id'];
                            $year=$qry['year'];
                            $level=$qry['seeking'];
                            $date=$qry['applieddate'];
                            $stat=$qry['status'];
                            $sname=$qry['surname'];
                            $fname=$qry['firstname'];
                            $mname=$qry['middlename'];
                            $per=$qry['peraddress'];
                            $tele=$qry['telephone'];        
                            $mob=$qry['mobile'];
                            $birt=$qry['birthdate'];
                            $ages=$qry['age'];
                            $sex=$qry['gender'];
                            $place=$qry['birthplace'];          
                            $reli=$qry['religion'];
                            $gname=$qry['guardianname'];
                            $gadd=$qry['guardianaddress'];
                            $gcon=$qry['guardiancontact'];
                          }
                          ?>
                      

        <div class="container">
        <div class="col-sm-12 col-md-12 ">

                  <div class="alert alert-warning">
                  <legend><a href="freshmanapplicationform.php?editapplication=<?php echo $db_email?>">Edit Application</a> > Edit Religion</legend>
                    <form   onsubmit='return freshmanapplicationreligionupdate()' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"  enctype="multipart/form-data">
                
                      <i  id="error" style="color: Red; display: none"></i>

                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      School Year:
                      <p class='form-control' readonly="readonly"><?php echo $year;  ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Seeking Admission As:
                      <p class="form-control" readonly="readonly"><?php echo $level;?></p>
                      </div>
                      </div><!--row-->








                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Applied date:
                      <p class="form-control" readonly="readonly"><?php echo $date; ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Status:
                      <p class="form-control" readonly="readonly"><?php echo $stat;?></p>
                      </div>
                      </div><!--row-->




                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Surname:
                       <p class='form-control' readonly="readonly"><?php echo $sname;  ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      Firstname:
                       <p class='form-control' readonly="readonly"><?php echo $fname;  ?></p>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Middlename: 
                       <p class='form-control' readonly="readonly"><?php echo $mname;  ?></p>
                      </div>
                      </div><!--row-->
                  



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Permanent Home address: 
                        <p class='form-control' readonly="readonly"><?php echo $per;  ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Telephone number:
                        <p class='form-control' readonly="readonly"><?php echo $tele;  ?></p>
                      </div>
                      </div><!--row-->



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Mobile number:
                       <p class='form-control' readonly="readonly"><?php echo $mob;  ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      Birthdate: (Day/Month/Year) <a href="freshmanapplicationform.php?editbirthdate=<?php echo $db_email?>">Change</a>
                      <br>
                      <p id='age' class='form-control' readonly="readonly"><?php echo $birt;  ?></p>  
                      </div>



                      <div class="col-sm-4 col-md-4 ">
                      Age: <br>  
                       <p id='age' class='form-control' readonly="readonly"><?php echo $ages;  ?></p>
                      </div>
                      </div><!--row-->



                      <div class='row'>
                       <div class="col-sm-4 col-md-4 ">
                      Gender: <i>(required)</i> <i id='gen'></i><a href="freshmanapplicationform.php?editgender=<?php echo $db_email?>">Change</a>
                      <p id='age' class='form-control' readonly="readonly"><?php echo $sex;  ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                       Birthplace:
                        <p class='form-control' readonly="readonly"><?php echo $place;  ?></p>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Religion:<i>(required)</i>  <i id="reli"></i> <?php echo $reli?>
                      <select class='form-control' id='religion' name='religion'>
                                                        <option>                                       </option>
                                                        <option>4TH WATCH                                         </option>
                                                        <option>7TH DAY ADVENTIST</option>
                                                        <option>AGLIPAY</option>
                                                        <option>ALLIANCE</option>
                                                        <option>ANGLICAN</option>
                                                        <option>APOSTOLIC CHRISTIAN</option>
                                                        <option>ASSEMBLY OF GOD</option>
                                                        <option>BAHA FAITH</option>
                                                        <option>BAPTIST</option>
                                                        <option >BAYAN NG KATOTOHANAN                              </option>
                                                        <option >BELIEVER IN CHRIST                                </option>
                                                        <option >BIBLE BELIEVING CHRISTIANS</option>
                                                        <option >BIBLE CHURCH                                      </option>
                                                        <option >BIBLICAL CHRISTIAN                                </option>
                                                        <option >BORN AGAIN CHRISTIAN</option>
                                                        <option >BUDDHIST</option>
                                                        <option >CATHOLIC</option>
                                                        <option >CHRISTIAN</option>
                                                        <option >CHRISTIAN BRETHREN                                </option>
                                                        <option >CHRISTIAN EVANGELICAL</option>
                                                        <option >CHURCH OF CHRIST</option>
                                                        <option >CHURCH OF GOD</option>
                                                        <option >CRUSADERS</option>
                                                        <option >EPISCOPALIAN                                      </option>
                                                        <option >EVANGELICAL CHRISTIAN</option>
                                                        <option >FULL GOSPEL</option>
                                                        <option >HINDUISM</option>
                                                        <option >IGLESIA NI CRISTO</option>
                                                        <option >JEHOVAHS WITNESS</option>
                                                        <option >JESUS IS LORD                                     </option>
                                                        <option >LATTER DAY SAINTS</option>
                                                        <option >METHODIST</option>
                                                        <option >MOST HOLY CHURCH OF CHRIST</option>
                                                        <option >ISLAM</option>
                                                        <option >PENTECOST</option>
                                                        <option >PHILADELPHIA OF GOD</option>
                                                        <option >PHILIPPINE INDEPENDENT CHURCH</option>
                                                        <option >PROTESTANT</option>
                                                        <option >SAGRADA FAMILIA                                   </option>
                                                        <option >SIKHISM</option>
                                                        <option >SPIRITIST</option>
                                                        <option >TAOISM                                            </option>
                                                        <option >WORLD WIDE CHURCH OF GOD</option>
                                                        <option >IGLESIA NG BATHALANG BUHAY</option>
                                                        <option >IGLESIA DELA SAGRADA FAMILIA</option>
                                                        <option >IGLESIA NG DIOS KAY CRISTO JESUS</option>
                                                        <option >LUTHERAN</option>
                                                        <option >IGLESIA FILIPINA INDEPENDIENTE</option>
                                                        <option >EVANGELICAL BRETHREN</option>
                                                        <option >INDEPENDIENTE</option>
                                                        <option >MEMBERS CHURCH OF GOD INTERNATIONAL</option>
                                                        <option >IGLESIA EVANGELICA METODISTA EN LAS ISLAS FILIPINA</option>
                                                        <option >GOSPEL OF CHRIST</option>
                                                        <option >FREE THINKER</option>
                                                        <option >UNITED CHURCH OF CHRIST IN THE PHILIPPINES</option>
                                                        <option>OTHERS</option>
                                                      </select>
                      </div><!--row-->
                      </div>



                       <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Guardian's name:
                        <p class='form-control' readonly="readonly"><?php echo $gname;  ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                       Address:
                       <p class='form-control' readonly="readonly"><?php echo $gadd;  ?></p>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Mobile number:
                        <p class='form-control' readonly="readonly"><?php echo $gcon;  ?></p>
                      </div>
                      </div><!--row-->

                        <input type='hidden' name='id' value="<?php echo $id ?>">
                        <input type='hidden' name='email' value="<?php echo $db_email ?>">
                       <button type="submit"  name="edit_religion"  value="Submit" class='next'>Update</button>
                       </form>
                  </div>
        </div>
        </div>
        <?php


        }elseif(isset($_GET['editgender'])){
          $email=$_GET['editgender'];
          $qry="SELECT * from tbl_prospectivestudents inner join tbl_studentdetails on tbl_prospectivestudents.id=tbl_studentdetails.id where email='$email' ";
          $res=mysql_query($qry);
          while($qry=mysql_fetch_array($res)){
                            $id=$qry['id'];
                            $year=$qry['year'];
                            $level=$qry['seeking'];
                            $date=$qry['applieddate'];
                            $stat=$qry['status'];
                            $sname=$qry['surname'];
                            $fname=$qry['firstname'];
                            $mname=$qry['middlename'];
                            $per=$qry['peraddress'];
                            $tele=$qry['telephone'];        
                            $mob=$qry['mobile'];
                            $birt=$qry['birthdate'];
                            $ages=$qry['age'];
                            $sex=$qry['gender'];
                            $place=$qry['birthplace'];          
                            $reli=$qry['religion'];
                            $gname=$qry['guardianname'];
                            $gadd=$qry['guardianaddress'];
                            $gcon=$qry['guardiancontact'];
                          }
                          ?>
                      

        <div class="container">
        <div class="col-sm-12 col-md-12 ">

                  <div class="alert alert-warning">
                  <legend><a href="freshmanapplicationform.php?editapplication=<?php echo $db_email?>">Edit Application</a> > Edit Gender</legend>
                    <form   onsubmit='return freshmanapplicationgenderupdate()' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"  enctype="multipart/form-data">
                
                      <i  id="error" style="color: Red; display: none"></i>

                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      School Year:
                      <p class='form-control' readonly="readonly"><?php echo $year;  ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Seeking Admission As:
                      <p class="form-control" readonly="readonly"><?php echo $level;?></p>
                      </div>
                      </div><!--row-->








                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Applied date:
                      <p class="form-control" readonly="readonly"><?php echo $date; ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Status:
                      <p class="form-control" readonly="readonly"><?php echo $stat;?></p>
                      </div>
                      </div><!--row-->




                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Surname:
                       <p class='form-control' readonly="readonly"><?php echo $sname;  ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      Firstname:
                       <p class='form-control' readonly="readonly"><?php echo $fname;  ?></p>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Middlename: 
                       <p class='form-control' readonly="readonly"><?php echo $mname;  ?></p>
                      </div>
                      </div><!--row-->
                  



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Permanent Home address: 
                        <p class='form-control' readonly="readonly"><?php echo $per;  ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Telephone number:
                        <p class='form-control' readonly="readonly"><?php echo $tele;  ?></p>
                      </div>
                      </div><!--row-->



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Mobile number:
                       <p class='form-control' readonly="readonly"><?php echo $mob;  ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      Birthdate: (Day/Month/Year) <a href="freshmanapplicationform.php?editbirthdate=<?php echo $db_email?>">Change</a>
                      <br>
                      <p id='age' class='form-control' readonly="readonly"><?php echo $birt;  ?></p>  
                      </div>



                      <div class="col-sm-4 col-md-4 ">
                      Age: <br>  
                       <p id='age' class='form-control' readonly="readonly"><?php echo $ages;  ?></p>
                      </div>
                      </div><!--row-->



                      <div class='row'>
                       <div class="col-sm-4 col-md-4 ">
                      Gender: <i>(required)</i> <i id='gen'></i><?php echo $sex?>
                       <select class='form-control' id="gender" name="gender">
                        <option></option>
                        <option>Female</option>
                        <option>Male</option>
                      </select>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                       Birthplace:
                        <p class='form-control' readonly="readonly"><?php echo $place;  ?></p>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Religion:<a href="freshmanapplicationform.php?editreligion=<?php echo $db_email ?>" id="changereligion">Change</a>
                      <input type="text" id='religion' class='form-control' readonly="readonly" value="<?php echo $reli ?>"> 
                      </div><!--row-->
                      </div>



                       <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Guardian's name:
                        <p class='form-control' readonly="readonly"><?php echo $gname;  ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                       Address:
                       <p class='form-control' readonly="readonly"><?php echo $gadd;  ?></p>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Mobile number:
                        <p class='form-control' readonly="readonly"><?php echo $gcon;  ?></p>
                      </div>
                      </div><!--row-->

                        <input type='hidden' name='id' value="<?php echo $id ?>">
                        <input type='hidden' name='email' value="<?php echo $db_email ?>">
                       <button type="submit"  name="edit_gender"  value="Submit" class='next'>Update</button>
                       </form>
                  </div>
        </div>
        </div>
        <?php

        }elseif(isset($_GET['editbirthdate'])){
          $email=$_GET['editbirthdate'];
          $qry="SELECT * from tbl_prospectivestudents inner join tbl_studentdetails on tbl_prospectivestudents.id=tbl_studentdetails.id where email='$email' ";
          $res=mysql_query($qry);
          while($qry=mysql_fetch_array($res)){
                            $id=$qry['id'];
                            $year=$qry['year'];
                            $level=$qry['seeking'];
                            $date=$qry['applieddate'];
                            $stat=$qry['status'];
                            $sname=$qry['surname'];
                            $fname=$qry['firstname'];
                            $mname=$qry['middlename'];
                            $per=$qry['peraddress'];
                            $tele=$qry['telephone'];        
                            $mob=$qry['mobile'];
                            $birt=$qry['birthdate'];
                            $ages=$qry['age'];
                            $sex=$qry['gender'];
                            $place=$qry['birthplace'];          
                            $reli=$qry['religion'];
                            $gname=$qry['guardianname'];
                            $gadd=$qry['guardianaddress'];
                            $gcon=$qry['guardiancontact'];
                          }
                          ?>
                      

        <div class="container">
        <div class="col-sm-12 col-md-12 ">

                  <div class="alert alert-warning">
                  <legend><a href="freshmanapplicationform.php?editapplication=<?php echo $db_email?>">Edit Application</a> > Edit birthdate</legend>
                    <form   onsubmit='return freshmanapplicationbirthdateupdate()' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"  enctype="multipart/form-data">
                
                      <i  id="error" style="color: Red; display: none"></i>

                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      School Year:
                      <p class='form-control' readonly="readonly"><?php echo $year;  ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Seeking Admission As:
                      <p class="form-control" readonly="readonly"><?php echo $level;?></p>
                      </div>
                      </div><!--row-->








                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Applied date:
                      <p class="form-control" readonly="readonly"><?php echo $date; ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Status:
                      <p class="form-control" readonly="readonly"><?php echo $stat;?></p>
                      </div>
                      </div><!--row-->




                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Surname:
                       <p class='form-control' readonly="readonly"><?php echo $sname;  ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      Firstname:
                       <p class='form-control' readonly="readonly"><?php echo $fname;  ?></p>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Middlename: 
                       <p class='form-control' readonly="readonly"><?php echo $mname;  ?></p>
                      </div>
                      </div><!--row-->
                  



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Permanent Home address: 
                        <p class='form-control' readonly="readonly"><?php echo $per;  ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Telephone number:
                        <p class='form-control' readonly="readonly"><?php echo $tele;  ?></p>
                      </div>
                      </div><!--row-->



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Mobile number:
                       <p class='form-control' readonly="readonly"><?php echo $mob;  ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      Birthdate: (Day/Month/Year) <i>(required)</i> <i id="birth"></i>
                      <br>
                      <?php echo $birt;  ?>  
                      <select   id='days' name="day">
                            <option></option>
                      </select>
                                    
                      <select id='months' name="month">
                          <option></option>
                      </select>
                                                                       
                      <select  id='years' name="years">
                            <option></option>
                      </select>   

                      </div>



                      <div class="col-sm-4 col-md-4 ">
                      Age: <br>  
                       <p id='age' class='form-control' readonly="readonly"><?php echo $ages;  ?></p>
                      </div>
                      </div><!--row-->



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Gender: <a href="freshmanapplicationform.php?editgender=<?php echo $db_email ?>" id="changegender">Change</a>
                      <input type="text" id='gender' class='form-control' readonly="readonly" value="<?php echo $sex ?>"> 
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                       Birthplace:
                        <p class='form-control' readonly="readonly"><?php echo $place;  ?></p>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Religion:<a href="freshmanapplicationform.php?editreligion=<?php echo $db_email ?>" id="changereligion">Change</a>
                      <input type="text" id='religion' class='form-control' readonly="readonly" value="<?php echo $reli ?>"> 
                      </div><!--row-->
                      </div>



                       <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Guardian's name:
                        <p class='form-control' readonly="readonly"><?php echo $gname;  ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                       Address:
                       <p class='form-control' readonly="readonly"><?php echo $gadd;  ?></p>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Mobile number:
                        <p class='form-control' readonly="readonly"><?php echo $gcon;  ?></p>
                      </div>
                      </div><!--row-->

                        <input type='hidden' name='id' value="<?php echo $id ?>">
                        <input type='hidden' name='email' value="<?php echo $db_email ?>">
                       <button type="submit"  name="edit_birthdate"  value="Submit" class='next'>Update</button>
                       </form>
                  </div>
        </div>
        </div>
        <?php



        }elseif(isset($_GET['editapplication'])){
          $email=$_GET['editapplication'];
          $qry="SELECT * from tbl_prospectivestudents inner join tbl_studentdetails on tbl_prospectivestudents.id=tbl_studentdetails.id where email='$email' ";
          $res=mysql_query($qry);
          while($qry=mysql_fetch_array($res)){
                            $id=$qry['id'];
                            $year=$qry['year'];
                            $level=$qry['seeking'];
                            $date=$qry['applieddate'];
                            $stat=$qry['status'];
                            $sname=$qry['surname'];
                            $fname=$qry['firstname'];
                            $mname=$qry['middlename'];
                            $per=$qry['peraddress'];
                            $tele=$qry['telephone'];        
                            $mob=$qry['mobile'];
                            $birt=$qry['birthdate'];
                            $ages=$qry['age'];
                            $sex=$qry['gender'];
                            $place=$qry['birthplace'];          
                            $reli=$qry['religion'];
                            $gname=$qry['guardianname'];
                            $gadd=$qry['guardianaddress'];
                            $gcon=$qry['guardiancontact'];
                          }

                          ?>
        <i  id="error" style="color: Red; display: none"></i>
        <div class="container">
        <div class="col-sm-12 col-md-12 ">
        <i id='validatesurname'></i>
        <i id='validatefirstname'></i>
        <i id='validatemiddlename'></i>
        <i id='validatepermanent'></i>
        <i id='validatetelephone'></i>
        <i id='validatemobile'></i>
        <i id='validatebirthplace'></i>
        <i id='validateguardianname'></i>
        <i id='validateguardianaddress'></i>
        <i id='validateguardiancontact'></i>
        </div></div>

        <div class="container">
        <div class="col-sm-12 col-md-12 ">

                  <div class="alert alert-warning">
                  <legend>Edit Application</legend>
                    <form   onsubmit='return freshmanapplicationupdate()' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"  enctype="multipart/form-data">
                
                      <i  id="error" style="color: Red; display: none"></i>

                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      School Year:<i>(required)</i> <i id="sy"></i>
                      <p class='form-control' readonly="readonly"><?php echo $year;  ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Seeking Admission As:
                      <p class="form-control" readonly="readonly"><?php echo $level;?></p>
                      </div>
                      </div><!--row-->








                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Applied date:
                      <p class="form-control" readonly="readonly"><?php echo $date; ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Status:
                      <p class="form-control" readonly="readonly"><?php echo $stat;?></p>
                      </div>
                      </div><!--row-->




                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Surname: <i>(required)</i> <i id='sur'></i>
                      <input class='form-control' type='text' onkeypress="return forsurname(event);" ondrop="return false;" onpaste="return false;"  id='surname' name='surname' maxlength="25" placeholder='Type your surname..' value='<?php echo $sname ?>'/>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      Firstname:  <i>(required)</i> <i id='first'></i>
                      <input class='form-control' type='text' id='firstname' onkeypress="return forfirstname(event);" ondrop="return false;" onpaste="return false;"  name='firstname' maxlength="25" placeholder='Type your firstname..' value='<?php echo $fname ?>'/>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Middlename:  <i>(optional)</i> <i id='middle'></i>
                      <input class='form-control' type='text' id='middlename' onkeypress="return formiddlename(event);" ondrop="return false;" onpaste="return false;" maxlength="25" name='middlename'  placeholder='Type your middlename..' value='<?php echo $mname ?>'/>
                      </div>
                      </div><!--row-->
                  



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Permanent Home address: <i>(required)</i> <i id='per'></i>
                       <input class='form-control' type='text' id='permanent' onkeypress="return forpermanent(event);" ondrop="return false;" onpaste="return false;" placeholder='Type your home address..' maxlength="35" value='<?php echo $per?>' name='permanent'/>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Telephone number: <i>(optional)</i> <i id='tele'></i>
                       <input class='form-control' type='text' id='telephone' onkeypress="return fortelephone(event);" ondrop="return false;" onpaste="return false;"  placeholder='Type your telephone number..' maxlength="7" value='<?php echo $tele?>' name='telephone'/> 
                      </div>
                      </div><!--row-->



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Mobile number: <i>(required)</i> <i id='mobi'></i>
                       <input class='form-control' type='text' id='mobile' onkeypress="return formobile(event);" ondrop="return false;" onpaste="return false;" placeholder='Type your mobile number here..' maxlength='11' value='<?php echo $mob?>' name='mobile' />
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      Birthdate: (Day/Month/Year) <i id="birth"></i> <a href="freshmanapplicationform.php?editbirthdate=<?php echo $db_email?>" id='changebirthdate'>Change</a>
                      <input type="text" id='hidebirthday' class='form-control' readonly="readonly" value="<?php echo $birt ?>"> 
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Age:<br>
                       <input type="text" id='age' class='form-control' readonly="readonly" value="<?php echo $ages ?>"> 
                      </div>
                      </div><!--row-->



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Gender: <a href="freshmanapplicationform.php?editgender=<?php echo $db_email ?>" id="changegender">Change</a>
                      <input type="text" id='gender' class='form-control' readonly="readonly" value="<?php echo $sex ?>"> 
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                       Birthplace: <i>(required)</i> <i id='places'></i>
                       <input class='form-control' type='text' onkeypress="return forbirthplace(event);" ondrop="return false;" onpaste="return false;"  id="birthplace" placeholder='Type your birthplace here..' maxlength="35" value="<?php echo $place?>" name="birthplace" />
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Religion:<a href="freshmanapplicationform.php?editreligion=<?php echo $db_email ?>" id="changereligion">Change</a>
                      <input type="text" id='religion' class='form-control' readonly="readonly" value="<?php echo $reli ?>"> 
                      </div><!--row-->
                      </div>



                       <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Guardian's name: <i>(required)</i> <i id='gname'></i>
                       <input class='form-control' type='text' onkeypress="return forguardianname(event);" ondrop="return false;" onpaste="return false;"  id='guardianname' name='guardianname' maxlength="25" placeholder="Type your guardian's name.." value='<?php echo $gname?>'/>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                       Address: <i>(required)</i>  <i id='gadd'></i>
                      <input class='form-control' type='text' id='guardianaddress' onkeypress="return forguardianaddress(event);" ondrop="return false;" onpaste="return false;"  name='guardianaddress' maxlength="25" placeholder='Type your guardianaddress..' value='<?php echo $gadd?>'/>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Mobile number: <i>(required)</i> <i id='gcon'></i>
                       <input class='form-control' type='text' id='guardiancontact' onkeypress="return forguardiancontact(event);" ondrop="return false;" onpaste="return false;" maxlength="11" name='guardiancontact'  placeholder='Type your guardiancontact..' value='<?php echo $gcon?>'/>
                      </div>
                      </div><!--row-->

                        <input type='hidden' name='id' value="<?php echo $id ?>">
                        <input type='hidden' name='email' value="<?php echo $db_email ?>">
                       <button type="submit"  name="edit_update"  value="Submit" class='next'>Update</button>
                       </form>
                  </div>
        </div>
        </div>

                          <?php

        }
    elseif(isset($_GET['view'])){
      $email=$_GET['view'];

       $qry="SELECT * from tbl_prospectivestudents inner join tbl_studentdetails on tbl_prospectivestudents.id=tbl_studentdetails.id where email='$email' ";
       $res=mysql_query($qry);

       while($qry=mysql_fetch_array($res)){
                            $year=$qry['year'];
                            $level=$qry['seeking'];
                            $date=$qry['applieddate'];
                            $stat=$qry['status'];
                            $sname=$qry['surname'];
                            $fname=$qry['firstname'];
                            $mname=$qry['middlename'];
                            $per=$qry['peraddress'];
                            $tele=$qry['telephone'];        
                            $mob=$qry['mobile'];
                            $birt=$qry['birthdate'];
                            $ages=$qry['age'];
                            $sex=$qry['gender'];
                            $place=$qry['birthplace'];          
                            $reli=$qry['religion'];
                            $gname=$qry['guardianname'];
                            $gadd=$qry['guardianaddress'];
                            $gcon=$qry['guardiancontact'];
                          }

           ?>
            <div class="container">
        <div class="col-sm-12 col-md-12 ">
                  <div class="alert alert-warning">
                    <form id='divid'   onsubmit='return freshmanapplication()' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"  enctype="multipart/form-data">
                
                      <i  id="error" style="color: Red; display: none"></i>

                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      School Year:
                      <p class='form-control' readonly='readonly'><?php echo $year; ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Seeking Admission As:
                      <p class='form-control' readonly='readonly'><?php echo $level; ?> </p>
                      </div>
                      </div><!--row-->








                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Applied date:
                      <p class='form-control' readonly='readonly'> <?php echo $date; ?> </p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Status:
                      <p class='form-control' readonly='readonly'><?php echo $stat; ?> </p>
                      </div>
                      </div><!--row-->




                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Surname:
                      <p class='form-control' readonly='readonly'> <?php echo $sname; ?> </p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      Firstname:  
                      <p class='form-control' readonly='readonly'><?php echo $fname; ?> </p>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Middlename:  
                      <p class='form-control' readonly='readonly'><?php echo $mname; ?> </p>
                      </div>
                      </div><!--row-->
                  



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Permanent Home address: 
                       <p class='form-control' readonly='readonly'><?php echo $per; ?> </p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Telephone number:
                      <p class='form-control' readonly='readonly'><?php echo $tele; ?> </p>
                      </div>
                      </div><!--row-->



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Mobile number: 
                        <p class='form-control' readonly='readonly'> <?php echo $mob; ?> </p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      Birthdate: (Day/Month/Year)
                       <p class='form-control' readonly='readonly'><?php echo $birt; ?> </p>                                                      
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Age:
                       <p class='form-control' readonly='readonly'><?php echo $ages; ?> </p>
                      </div>
                      </div><!--row-->



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Gender: 
                       <p class='form-control' readonly='readonly'><?php echo $sex; ?> </p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                       Birthplace: 
                       <p class='form-control' readonly='readonly'><?php echo $place; ?>  </p>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Religion: 
                       <p class='form-control' readonly='readonly'><?php echo $reli; ?> </p>
                      </div>
                      </div><!--row-->



                       <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Guardian's name: 
                       <p class='form-control' readonly='readonly'><?php echo $gname; ?> </p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                       Address:
                      <p class='form-control' readonly='readonly'><?php echo $gadd; ?>  </p>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Mobile number: 
                       <p class='form-control' readonly='readonly'><?php echo $gcon; ?> </p>
                      </div>
                      </div><!--row-->

                       </form>
                  </div>
        </div>
        </div>

           <?php               
    }


}
}else{
        ?>
        <div class="container">
        <div class="col-sm-12 col-md-12 ">
                  <div class="alert alert-success">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                       <p>Your email has been verified <strong><?php echo $db_email ?></strong>.. You are ready to fill up the application form.</p>
                      
                  </div>
        </div>
        </div>

        <div class="container">
        <div class="col-sm-12 col-md-12 ">
        <i id='validatesurname'></i>
        <i id='validatefirstname'></i>
        <i id='validatemiddlename'></i>
        <i id='validatepermanent'></i>
        <i id='validatetelephone'></i>
        <i id='validatemobile'></i>
        <i id='validatebirthplace'></i>
        <i id='validateguardianname'></i>
        <i id='validateguardianaddress'></i>
        <i id='validateguardiancontact'></i>
        </div></div>

        <div class="container">
        <div class="col-sm-12 col-md-12 ">
                  <div class="alert alert-warning">
                    <form   onsubmit='return freshmanapplication()' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"  enctype="multipart/form-data">
                
                      <i  id="error" style="color: Red; display: none"></i>

                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      School Year:<i>(required)</i> <i id="sy"></i>
                      <select class='form-control'   id="year" name="year" >
                        <option></option>
                        <option><?php 
                          $schoolyear= date('Y')+1;
                          $nextyear= $schoolyear+1;
                          $totalyear= "$schoolyear - $nextyear";
                          echo $totalyear; ?>
                        </option>
                      </select>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Seeking Admission As:
                      <input type="text" class='form-control' readonly="readonly"value="<?php echo $db_seeking;?>">
                      </div>
                      </div><!--row-->








                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Applied date:
                      <input type="text" class='form-control' readonly="readonly"value="<?php 
                                                          $applied = date("F j,Y");
                                                          echo "$applied";
                                                          ?>">
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Status:
                      <input type="text" class='form-control' readonly="readonly"value="<?php 
                                                        echo $db_status;
                                                          ?>">
                      </div>
                      </div><!--row-->




                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Surname: <i>(required)</i> <i id='sur'></i>
                      <input class='form-control' type='text' onkeypress="return forsurname(event);" ondrop="return false;" onpaste="return false;"  id='surname' name='surname' maxlength="25" placeholder='Type your surname..' value='<?php echo $db_surname ?>'/>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      Firstname:  <i>(required)</i> <i id='first'></i>
                      <input class='form-control' type='text' id='firstname' onkeypress="return forfirstname(event);" ondrop="return false;" onpaste="return false;"  name='firstname' maxlength="25" placeholder='Type your firstname..' value='<?php echo $db_firstname ?>'/>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Middlename:  <i>(optional)</i> <i id='middle'></i>
                      <input class='form-control' type='text' id='middlename' onkeypress="return formiddlename(event);" ondrop="return false;" onpaste="return false;" maxlength="25" name='middlename'  placeholder='Type your middlename..' value=''/>
                      </div>
                      </div><!--row-->
                  



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Permanent Home address: <i>(required)</i> <i id='per'></i>
                       <input class='form-control' type='text' id='permanent' onkeypress="return forpermanent(event);" ondrop="return false;" onpaste="return false;" placeholder='Type your home address..' maxlength="35" value='' name='permanent'/>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Telephone number: <i>(optional)</i> <i id='tele'></i>
                       <input class='form-control' type='text' id='telephone' onkeypress="return fortelephone(event);" ondrop="return false;" onpaste="return false;"  placeholder='Type your telephone number..' maxlength="7" value='' name='telephone'/> 
                      </div>
                      </div><!--row-->



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Mobile number: <i>(required)</i> <i id='mobi'></i>
                       <input class='form-control' type='text' id='mobile' onkeypress="return formobile(event);" ondrop="return false;" onpaste="return false;" placeholder='Type your mobile number here..' maxlength='11' value='' name='mobile' />
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      Birthdate: (Day/Month/Year) <i>(required)</i> <i id="birth"></i>
                      <br>
                      <select   id='days' name="day">
                            <option></option>
                      </select>
                                    
                      <select id='months' name="month">
                          <option></option>
                      </select>
                                                                       
                      <select  id='years' name="years">
                            <option></option>
                      </select>                                                       
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Age:
                       <label class='form-control' id='age' value=''></label>
                      </div>
                      </div><!--row-->



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Gender: <i>(required)</i> <i id='gen'></i>
                       <select class='form-control' id="gender" name="gender">
                        <option></option>
                        <option>Female</option>
                        <option>Male</option>
                      </select>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                       Birthplace: <i>(required)</i> <i id='places'></i>
                       <input class='form-control' type='text' onkeypress="return forbirthplace(event);" ondrop="return false;" onpaste="return false;"  id="birthplace" placeholder='Type your birthplace here..' maxlength="35" name="birthplace" />
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Religion: <i>(required)</i>  <i id="reli"></i>
                       <select class='form-control' id='religion' name='religion'>
                                                        <option>                                       </option>
                                                        <option>4TH WATCH                                         </option>
                                                        <option>7TH DAY ADVENTIST</option>
                                                        <option>AGLIPAY</option>
                                                        <option>ALLIANCE</option>
                                                        <option>ANGLICAN</option>
                                                        <option>APOSTOLIC CHRISTIAN</option>
                                                        <option>ASSEMBLY OF GOD</option>
                                                        <option>BAHA FAITH</option>
                                                        <option>BAPTIST</option>
                                                        <option >BAYAN NG KATOTOHANAN                              </option>
                                                        <option >BELIEVER IN CHRIST                                </option>
                                                        <option >BIBLE BELIEVING CHRISTIANS</option>
                                                        <option >BIBLE CHURCH                                      </option>
                                                        <option >BIBLICAL CHRISTIAN                                </option>
                                                        <option >BORN AGAIN CHRISTIAN</option>
                                                        <option >BUDDHIST</option>
                                                        <option >CATHOLIC</option>
                                                        <option >CHRISTIAN</option>
                                                        <option >CHRISTIAN BRETHREN                                </option>
                                                        <option >CHRISTIAN EVANGELICAL</option>
                                                        <option >CHURCH OF CHRIST</option>
                                                        <option >CHURCH OF GOD</option>
                                                        <option >CRUSADERS</option>
                                                        <option >EPISCOPALIAN                                      </option>
                                                        <option >EVANGELICAL CHRISTIAN</option>
                                                        <option >FULL GOSPEL</option>
                                                        <option >HINDUISM</option>
                                                        <option >IGLESIA NI CRISTO</option>
                                                        <option >JEHOVAHS WITNESS</option>
                                                        <option >JESUS IS LORD                                     </option>
                                                        <option >LATTER DAY SAINTS</option>
                                                        <option >METHODIST</option>
                                                        <option >MOST HOLY CHURCH OF CHRIST</option>
                                                        <option >ISLAM</option>
                                                        <option >PENTECOST</option>
                                                        <option >PHILADELPHIA OF GOD</option>
                                                        <option >PHILIPPINE INDEPENDENT CHURCH</option>
                                                        <option >PROTESTANT</option>
                                                        <option >SAGRADA FAMILIA                                   </option>
                                                        <option >SIKHISM</option>
                                                        <option >SPIRITIST</option>
                                                        <option >TAOISM                                            </option>
                                                        <option >WORLD WIDE CHURCH OF GOD</option>
                                                        <option >IGLESIA NG BATHALANG BUHAY</option>
                                                        <option >IGLESIA DELA SAGRADA FAMILIA</option>
                                                        <option >IGLESIA NG DIOS KAY CRISTO JESUS</option>
                                                        <option >LUTHERAN</option>
                                                        <option >IGLESIA FILIPINA INDEPENDIENTE</option>
                                                        <option >EVANGELICAL BRETHREN</option>
                                                        <option >INDEPENDIENTE</option>
                                                        <option >MEMBERS CHURCH OF GOD INTERNATIONAL</option>
                                                        <option >IGLESIA EVANGELICA METODISTA EN LAS ISLAS FILIPINA</option>
                                                        <option >GOSPEL OF CHRIST</option>
                                                        <option >FREE THINKER</option>
                                                        <option >UNITED CHURCH OF CHRIST IN THE PHILIPPINES</option>
                                                        <option>OTHERS</option>
                                                      </select>
                      </div>
                      </div><!--row-->



                       <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Guardian's name: <i>(required)</i> <i id='gname'></i>
                       <input class='form-control' type='text' onkeypress="return forguardianname(event);" ondrop="return false;" onpaste="return false;"  id='guardianname' name='guardianname' maxlength="25" placeholder="Type your guardian's name.." value=''/>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                       Address: <i>(required)</i>  <i id='gadd'></i>
                      <input class='form-control' type='text' id='guardianaddress' onkeypress="return forguardianaddress(event);" ondrop="return false;" onpaste="return false;"  name='guardianaddress' maxlength="25" placeholder='Type your guardianaddress..' value=''/>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Mobile number: <i>(required)</i> <i id='gcon'></i>
                       <input class='form-control' type='text' id='guardiancontact' onkeypress="return forguardiancontact(event);" ondrop="return false;" onpaste="return false;" maxlength="11" name='guardiancontact'  placeholder='Type your guardiancontact..' value=''/>
                      </div>
                      </div><!--row-->

                       <button type="submit"  name="submit"  value="Submit" class='next'>Submit</button>
                       </form>
                  </div>
        </div>
        </div>
        <?php
    }











}//End of if the code is equal to '1' or the email is confirmed
?>





</body>
</html>
<?php }?>
