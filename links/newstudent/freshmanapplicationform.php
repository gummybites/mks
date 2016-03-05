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

                              $month= $_POST['month'];
                              $day= $_POST['day'];
                              $years= $_POST['years'];
                              $birthday= $day.'/'.$month.'/'.$years;
                              $age =  date('Y')-$years;


                              $Sex= mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST ['gender']))));

                              $reli = mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST['religion']))));

                              $bplace = mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST ['birthplace']))));

                              $gname= mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST ['guardianname']))));
                              $gadd = mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST ['guardianaddress']))));
                              $gcon = mysql_real_escape_string(htmlspecialchars(trim($_POST['guardiancontact'])));



                              mysql_query("UPDATE tbl_prospectivestudents set surname='$Sname', firstname='$Fname', middlename='$Mname' where id='$id' ");
                              mysql_query("UPDATE tbl_studentdetails set peraddress='$per', telephone='$tele', mobile='$mobi', birthdate='$birthday',age='$age',gender='$Sex',birthplace='$bplace',religion='$reli',guardianname='$gname',guardianaddress='$gadd',guardiancontact='$gcon' where id='$id'");
                             
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
                    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"  rel="stylesheet" type="text/css">
                    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css"  rel="stylesheet" type="text/css">
                    <link rel="stylesheet" href="../../css/style.css"  rel="stylesheet" type="text/css">
                    <link rel="stylesheet" href="../../css/font-awesome.css"  rel="stylesheet" type="text/css">
                     <link rel="stylesheet" href="../../css/font-awesome.min.css"  rel="stylesheet" type="text/css">

                      <link href="../../css/animate.css" rel="stylesheet">
                    <script src="../../js/jquery-2.1.1.min.js"></script>
                    <script src="../../bootstrap/js/bootstrap.min.js"></script>
                    <script src="../../js/validation.js"></script>
                    <script src="../../js/jquery.appear.js"></script>
                    <script src="../../js/modernizr.custom.js"></script>

<style>
                 
                      body{ background: url(../../images/); background-size: cover;}

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

                   .form-control{
                        border: solid gray 1px;
                        border-radius: 0px;
                      
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
   docprint.document.write('<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"></link>');
   docprint.document.write('<link rel="stylesheet" href="../../bootstrap/css/bootstrap.css"></link>');                
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





   function AllowSingleSpaceNotInFirstAndLast() {
        var surname = document.getElementById('surname');
        surname.value = surname.value.replace(/^\s+|\s+$/g, "");
        var forsurname = surname.value.split(" ");

        var firstname= document.getElementById('firstname');
        firstname.value = firstname.value.replace(/^\s+|\s+$/g, "");
        var forfirstname = firstname.value.split(" ");

          var middlename= document.getElementById('middlename');
        middlename.value = middlename.value.replace(/^\s+|\s+$/g, "");
        var formiddlename = middlename.value.split(" ");

        var permanent= document.getElementById('permanent');
        permanent.value = permanent.value.replace(/^\s+|\s+$/g, "");
        var forpermanent = permanent.value.split(" ");

        var telephone= document.getElementById('telephone');
        telephone.value = telephone.value.replace(/^\s+|\s+$/g, "");
        var fortelephone = telephone.value.split(" ");

        var mobile= document.getElementById('mobile');
        mobile.value = mobile.value.replace(/^\s+|\s+$/g, "");
        var formobile = mobile.value.split(" ");

        var birthplace= document.getElementById('birthplace');
        birthplace.value = birthplace.value.replace(/^\s+|\s+$/g, "");
        var forbirthplace = birthplace.value.split(" ");

        var guardianname= document.getElementById('guardianname');
        guardianname.value =guardianname.value.replace(/^\s+|\s+$/g, "");
        var forguardianname = guardianname.value.split(" ");

        var guardianaddress= document.getElementById('guardianaddress');
        guardianaddress.value =guardianaddress.value.replace(/^\s+|\s+$/g, "");
        var forguardianaddress = guardianaddress.value.split(" ");

         var guardiancontact= document.getElementById('guardiancontact');
        guardiancontact.value =guardiancontact.value.replace(/^\s+|\s+$/g, "");
        var forguardiancontact = guardiancontact.value.split(" ");




       

         if (forsurname.length > 10) {
            return false;
        }
        else {
        }


        if (forfirstname.length > 10) {
            return false;
        }
        else {
        }

        if (formiddlename.length > 10) {
            return false;
        }
        else {
        }

        if (forpermanent.length > 10) {
            return false;
        }
        else {
        }

        if (fortelephone.length > 10) {
            return false;
        }
        else {
        }

        if (formobile.length > 10) {
            return false;
        }
        else {
        }

        if (forbirthplace.length > 10) {
            return false;
        }
        else {
        }

        if (forguardianname.length > 10) {
            return false;
        }
        else {
        }


        if (forguardianaddress.length > 10) {
            return false;
        }
        else {
        }

        if (forguardiancontact.length > 10) {
            return false;
        }
        else {
        }


        return true;
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
            <div class="row bs-wizard" style="border-bottom:0;">
         
                <div class="col-xs-3 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"><i class="fa fa-plus-circle"></i> Create account</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step complete"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"><i class="fa fa-sign-in"></i> Login and Confirm your email address</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step disabled"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"><i class="fa fa-file-text-o"></i>  Fill-up application form.</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step disabled"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">Step 4</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"><i class="fa fa-print"></i> Print your application form.</div>
                </div>
            </div>

            <div class="alert alert-warning">
                
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

$message= "Action required: Please verify your email address
  Click the link below to verify your account 
  http://www.sims-mks.com/links/newstudent/freshmanapplicationform.php?emailconfirmed=$email&&code=$confirmed


  You're receiving this email because you recently created a new account for application or added a new email address. If this wasn't you, please ignore this email.";  

mail($email,"Confirm Email",$message,"From: DoNotReply@sims-mks.com");

    ?>
    <div class="container">
    <div class="col-sm-12 col-md-12" >
    <div class="alert alert-info">
    
    <b>Confirmation code has been send successfully. Please check and activate your account.</b> <i class="fa fa-check"></i>
    </div>
    </div>
    </div>
    <?php
}


//kapag naka click yung EMAIL confirmation
if(isset($_GET['emailconfirmed'])){
    $email=$_GET['emailconfirmed'];
     $code=$_GET['code'];

    $qry="SELECT * from tbl_studentregistration where email='$email'";
    $res=mysql_query($qry);
    while($qry=mysql_fetch_array($res)){
      $db_code=$qry['code'];
      $db_confirmcode=$qry['confirm_code'];

    }

    if($code==$db_confirmcode){

    mysql_query("UPDATE tbl_studentregistration set code='1', confirm_code='0' where email='$email'");
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

  <div class="form-group">
  <input type="text" class='form-control' value="<?php echo $email ?>" id="email" name="email" onkeypress="return foremailregistration(event);" ondrop="return false;" onpaste="return false;">
 


  </div>
  <input type='submit' name='changeemail' value='update' class='btn btn-info'>
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
                    <div class="row bs-wizard" style="border-bottom:0;">
         
                <div class="col-xs-3 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"><i class="fa fa-plus-circle"></i> Create account</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step complete"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"><i class="fa fa-sign-in"></i> Login and Confirm your email address</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step complete"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"><i class="fa fa-file-text-o"></i>  Fill-up application form.</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step active"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">Step 4</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"><i class="fa fa-print"></i> Print your application form.</div>
                </div>
            </div>
          

          </div>
          </div>

          <div class="container">
          <div class="col-sm-12 col-md-12 ">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#profile" data-toggle="tab"><i class="fa fa-file-o"></i> Application Form</a>
                                </li>
                                <li class=""><a href="#editapplication-modal" data-toggle="modal"><i class="fa fa-edit"></i> Edit</a>
                                </li>
                                <li class=""><a href="#" onclick="PrintMe('divid')" data-toggle="tab"><i class="fa fa-print"></i> Print </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="profile">
                                </div>
                            </div>
         </div>
         </div>


          <!-- Start Portfolio Section -->
        <div class="section-modal modal fade" id="editapplication-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                
                <div class="container">
                 <?php
                   $qry="SELECT * from tbl_prospectivestudents inner join tbl_studentdetails on tbl_prospectivestudents.id=tbl_studentdetails.id where email='$db_email' ";
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

        <div class="col-md-12 ">

                <h3 class="text-center">APPLICATION FORM</h3>

                    <form   onsubmit='return freshmanapplicationupdate()' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"  enctype="multipart/form-data">
                
                      <i  id="error" style="color: Red; display: none"></i>

                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                        <b id="sy"></b>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                  
        
                      </div>

                      <div class="col-sm-4 col-md-4 ">
           
                      </div>
                      </div><!--row-->

                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      <b>School Year:</b> 
                      <p class='form-control' readonly="readonly"><?php echo $year;  ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      <b>Seeking Admission As:</b>
                      <input type="text" class='form-control' readonly="readonly"value="<?php echo $db_seeking;?>">
                      </div>
                      </div><!--row-->







                      <br>
                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      <b>Applied date:</b>
                      <input type="text" class='form-control' readonly="readonly"value="<?php 
                                                          $applied = date("F j,Y");
                                                          echo "$applied";
                                                          ?>">
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      <b>Status:</b>
                      <input type="text" class='form-control' readonly="readonly"value="<?php 
                                                        echo $db_status;
                                                          ?>">
                      </div>
                      </div><!--row-->



                      <br>
                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      <b id='sur'></b> <b id='validatesurname'></b>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      <b id='first'></b> <b id='validatefirstname'></b>
        
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      <b id='middle'></b> <b id='validatemiddlename'></b>
                      </div>
                      </div><!--row-->

                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      <b>Surname:</b> <b style="color:red;">(*)</b>  
                      <input class='form-control' type='text' onkeypress="return forsurname(event);" ondrop="return false;" onpaste="return false;"  id='surname' name='surname' maxlength="25" placeholder='Type your surname..' value='<?php echo $sname ?>'/>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      <b>Firstname:</b>  <b style="color:red;">(*)</b>  
                      <input class='form-control' type='text' id='firstname' onkeypress="return forfirstname(event);" ondrop="return false;" onpaste="return false;"  name='firstname' maxlength="25" placeholder='Type your firstname..' value='<?php echo $fname ?>'/>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      <b>Middlename:</b>  <i>(optional)</i> 
                      <input class='form-control' type='text' id='middlename' onkeypress="return formiddlename(event);" ondrop="return false;" onpaste="return false;" maxlength="25" name='middlename'  placeholder='Type your middlename..' value='<?php echo $mname ?>'/>
                      </div>
                      </div><!--row-->
                  


                      <br>
                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      <b id='per'></b> <b id='validatepermanent'></b>
      
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      
        
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      <b id='tele'></b> <b id='validatetelephone'></b>
                      </div>
                      </div><!--row-->

                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      <b>Permanent Home address:</b> Street Address/City <b style="color:red;">(*)</b>  
                        <input class='form-control' type='text' id='permanent' onkeypress="return forpermanent(event);" ondrop="return false;" onpaste="return false;" placeholder='Type your home address..' maxlength="35" value='<?php echo $per?>' name='permanent'/>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      <b>Telephone number:</b> 3******<i>(optional)</i> 
                       <input class='form-control' type='text' id='telephone' onkeypress="return fortelephone(event);" ondrop="return false;" onpaste="return false;"  placeholder='Type your telephone number..' maxlength="7" value='<?php echo $tele?>' name='telephone'/> 
                      </div>
                      </div><!--row-->


                      <br>
                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      <b id='mobi'></b>  <b id='validatemobile'></b>
      
                      </div>

                      <div class="col-sm-4 col-md-4">
                      <b>Birthdate:</b> <?php echo $birt ?> <b id="birth"></b>
        
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                  
                      </div>
                      </div><!--row-->

                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      <b>Mobile number:</b> 09********* <b style="color:red;">(*)</b>  
                       <input class='form-control' type='text' id='mobile' onkeypress="return formobile(event);" ondrop="return false;" onpaste="return false;" placeholder='Type your mobile number here..' maxlength='11' value='<?php echo $mob?>' name='mobile' />
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      <b>Edit Birthdate:</b> (Day/Month/Year) <b style="color:red;">(*)</b>  
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
                       <label id='age' class='form-control' readonly="readonly" ><?php echo $ages ?></label>
                      </div>  
                      </div><!--row-->


                      <br>
                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      <b>Gender:</b> <?php echo $sex?> <b id='gen'></b> 
      
                      </div>
                         
   
                      <div class="col-sm-4 col-md-4">
                      <b id='places'></b> <b id='validatebirthplace'></b>
            
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      <b>Religion:</b> <?php echo $reli?> <b id="reli"></b>
                      </div>
                      </div><!--row-->

                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      <b>Edit Gender:</b> <b style="color:red;">(*)</b>  
                       <select class='form-control' id="gender" name="gender">
                        <option></option>
                        <option>Female</option>
                        <option>Male</option>
                      </select>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                       <b>Birthplace:</b> Street Address/City <b style="color:red;">(*)</b>  
                       <input class='form-control' type='text' onkeypress="return forbirthplace(event);" ondrop="return false;" onpaste="return false;"  id="birthplace" placeholder='Type your birthplace here..' maxlength="35" value="<?php echo $place?>" name="birthplace" />
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      <b>Edit Religion:</b> <b style="color:red;">(*)</b>   
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


                      <br>
                       <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                       <b id='gname'></b> <b id='validateguardianname'></b>
       
        
        
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      <b id='gadd'></b> <b id='validateguardianaddress'></b>
            
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      <b id='gcon'></b> <b id='validateguardiancontact'></b>
                      </div>
                      </div><!--row-->

                       <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      <b>Guardian's name:</b> <b style="color:red;">(*)</b> 
                       <input class='form-control' type='text' onkeypress="return forguardianname(event);" ondrop="return false;" onpaste="return false;"  id='guardianname' name='guardianname' maxlength="25" placeholder="Type your guardian's name.." value='<?php echo $gname?>'/>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                       <b>Address:</b> Street Address/City <b style="color:red;">(*)</b>   
                      <input class='form-control' type='text' id='guardianaddress' onkeypress="return forguardianaddress(event);" ondrop="return false;" onpaste="return false;"  name='guardianaddress' maxlength="25" placeholder='Type your guardianaddress..' value='<?php echo $gadd?>'/>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      <b>Mobile number:</b> 09********* <b style="color:red;">(*)</b>  
                       <input class='form-control' type='text' id='guardiancontact' onkeypress="return forguardiancontact(event);" ondrop="return false;" onpaste="return false;" maxlength="11" name='guardiancontact'  placeholder='Type your guardiancontact..' value='<?php echo $gcon?>'/>
                      </div>
                      </div><!--row-->



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
          
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
           
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                        <input type='hidden' name='id' value="<?php echo $id ?>">
                        <input type='hidden' name='email' value="<?php echo $db_email ?>">
                       <button type="submit"  name="edit_update"  value="Submit" class='next' onclick="return AllowSingleSpaceNotInFirstAndLast();">Update</button>
                      </div>
                      </div><!--row-->
                       

                       </form>
                       <br>

        </div>
        </div>







       

                          <?php
                          ?>
                   

                </div>
                
            </div>
        </div>



          <?php 
                    $qry="SELECT * from tbl_prospectivestudents inner join tbl_studentdetails on tbl_prospectivestudents.id=tbl_studentdetails.id where email='$db_email' ";
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
                    <h3 class="text-center">APPLICATION FORM</h3>
                 
                 <?php if(isset($_POST['edit_update'])){
                  ?>
                  <div class="alert alert-success"><h3 class="text-center">Application form successfully updated <i class="fa fa-check-circle"></i></h3></div>
                  <?php
                  }?>
                
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

           <?php               

           ?> 


       
                      

<?php  
}
}else{
?>
        
        <div class="col-md-12 ">
        <div class="row bs-wizard" style="border-bottom:0;">
         
                <div class="col-xs-3 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"><i class="fa fa-plus-circle"></i> Create account</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step complete"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"><i class="fa fa-sign-in"></i> Login and Confirm your email address</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step active"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"><i class="fa fa-file-text-o"></i>  Fill-up application form.</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step disabled"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">Step 4</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"><i class="fa fa-print"></i> Print your application form.</div>
                </div>
            </div>          
        </div>
        

       
        <div class="container">

        <div class="col-md-12 ">

                <h3 class="text-center">APPLICATION FORM</h3>

                    <form   onsubmit='return freshmanapplication()' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"  enctype="multipart/form-data">
                
                      <i  id="error" style="color: Red; display: none"></i>

                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                        <b id="sy"></b>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                  
        
                      </div>

                      <div class="col-sm-4 col-md-4 ">
           
                      </div>
                      </div><!--row-->

                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      <b>School Year:</b> <b style="color:red;">(*)</b> 
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
                      <b>Seeking Admission As:</b>
                      <input type="text" class='form-control' readonly="readonly"value="<?php echo $db_seeking;?>">
                      </div>
                      </div><!--row-->







                      <br>
                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      <b>Applied date:</b>
                      <input type="text" class='form-control' readonly="readonly"value="<?php 
                                                          $applied = date("F j,Y");
                                                          echo "$applied";
                                                          ?>">
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      <b>Status:</b>
                      <input type="text" class='form-control' readonly="readonly"value="<?php 
                                                        echo $db_status;
                                                          ?>">
                      </div>
                      </div><!--row-->



                      <br>
                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      <b id='sur'></b> <b id='validatesurname'></b>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      <b id='first'></b> <b id='validatefirstname'></b>
        
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      <b id='middle'></b> <b id='validatemiddlename'></b>
                      </div>
                      </div><!--row-->

                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      <b>Surname:</b> <b style="color:red;">(*)</b>  
                      <input class='form-control' type='text' onkeypress="return forsurname(event);" ondrop="return false;" onpaste="return false;"  id='surname' name='surname' maxlength="25"  value='<?php echo $db_surname ?>'/>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      <b>Firstname:</b>  <b style="color:red;">(*)</b>  
                      <input class='form-control' type='text' id='firstname' onkeypress="return forfirstname(event);" ondrop="return false;" onpaste="return false;"  name='firstname' maxlength="25"  value='<?php echo $db_firstname ?>'/>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      <b>Middlename:</b>  <i>(optional)</i> 
                      <input class='form-control' type='text' id='middlename' onkeypress="return formiddlename(event);" ondrop="return false;" onpaste="return false;" maxlength="25" name='middlename'   value=''/>
                      </div>
                      </div><!--row-->
                  


                      <br>
                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      <b id='per'></b> <b id='validatepermanent'></b>
      
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      
        
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      <b id='tele'></b> <b id='validatetelephone'></b>
                      </div>
                      </div><!--row-->

                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      <b>Permanent Home address:</b> Street Address/City <b style="color:red;">(*)</b>  
                       <input class='form-control' type='text' id='permanent' onkeypress="return forpermanent(event);" ondrop="return false;" onpaste="return false;"  maxlength="35" value='' name='permanent'/>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      <b>Telephone number:</b> 3******<i>(optional)</i> 
                       <input class='form-control' type='text' id='telephone' onkeypress="return fortelephone(event);" ondrop="return false;" onpaste="return false;"   maxlength="7" value='' name='telephone'/> 
                      </div>
                      </div><!--row-->


                      <br>
                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      <b id='mobi'></b>  <b id='validatemobile'></b>
      
                      </div>

                      <div class="col-sm-4 col-md-4">
                      <b id="birth"></b>
        
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                  
                      </div>
                      </div><!--row-->

                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      <b>Mobile number:</b> 09********* <b style="color:red;">(*)</b>  
                       <input class='form-control' type='text' id='mobile' onkeypress="return formobile(event);" ondrop="return false;" onpaste="return false;"  maxlength='11' value='' name='mobile' />
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      <b>Birthdate:</b> (Day/Month/Year) <b style="color:red;">(*)</b>  
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


                      <br>
                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      <b id='gen'></b>
      
                      </div>
                         
   
                      <div class="col-sm-4 col-md-4">
                      <b id='places'></b> <b id='validatebirthplace'></b>
            
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      <b id="reli"></b>
                      </div>
                      </div><!--row-->

                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      <b>Gender:</b> <b style="color:red;">(*)</b>  
                       <select class='form-control' id="gender" name="gender">
                        <option></option>
                        <option>Female</option>
                        <option>Male</option>
                      </select>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                       <b>Birthplace:</b> Street Address/City <b style="color:red;">(*)</b>  
                       <input class='form-control' type='text' onkeypress="return forbirthplace(event);" ondrop="return false;" onpaste="return false;"  id="birthplace"  maxlength="35" name="birthplace" />
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      <b>Religion:</b> <b style="color:red;">(*)</b>   
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


                      <br>
                       <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                       <b id='gname'></b> <b id='validateguardianname'></b>
       
        
        
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      <b id='gadd'></b> <b id='validateguardianaddress'></b>
            
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      <b id='gcon'></b> <b id='validateguardiancontact'></b>
                      </div>
                      </div><!--row-->

                       <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      <b>Guardian's name:</b> <b style="color:red;">(*)</b> 
                       <input class='form-control' type='text' onkeypress="return forguardianname(event);" ondrop="return false;" onpaste="return false;"  id='guardianname' name='guardianname' maxlength="25"  value=''/>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                       <b>Address:</b> Street Address/City <b style="color:red;">(*)</b>   
                      <input class='form-control' type='text' id='guardianaddress' onkeypress="return forguardianaddress(event);" ondrop="return false;" onpaste="return false;"  name='guardianaddress' maxlength="25"  value=''/>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      <b>Mobile number:</b> 09********* <b style="color:red;">(*)</b>  
                       <input class='form-control' type='text' id='guardiancontact' onkeypress="return forguardiancontact(event);" ondrop="return false;" onpaste="return false;" maxlength="11" name='guardiancontact'   value=''/>
                      </div>
                      </div><!--row-->



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
          
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
           
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                        <button type="submit"  name="submit"  value="Submit" onclick="return AllowSingleSpaceNotInFirstAndLast();" class='next'>Submit</button>
                      </div>
                      </div><!--row-->
                       

                       </form>
                       <br>

        </div>
        </div>
        <?php
    }











}//End of if the code is equal to '1' or the email is confirmed
?>



<br><br><br><br><br><br><br><br><br><br><br><br>
  <!-- Start Copyright Section -->
        <div class="copyright text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>SIMS-MKS | Developed by the Students of STI College-Caloocan | <a href="#"><?php  $curYear= Date('Y');
                                        echo "$curYear";
                                      ?></a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Section -->

</body>
</html>
<?php }?>
