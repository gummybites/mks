<?php  session_start(); ?>


<?php 
                                             include('../config.php');

                                            if(isset($_POST['submit']))
                                              {
                                                  $sname=mysql_real_escape_string(trim(htmlspecialchars(ucfirst($_POST['surname']))));
                                                  $fname=mysql_real_escape_string(trim(htmlspecialchars(ucfirst($_POST['firstname']))));
                                                  $username=mysql_real_escape_string(htmlspecialchars(trim($_POST['username'])));
                                                  $pass=mysql_real_escape_string(trim(htmlspecialchars($_POST['password'])));
                                                  $enc_password=mysql_real_escape_string(sha1(md5(trim(htmlspecialchars($pass)))));
                                                  $confirmpassword=mysql_real_escape_string(trim(htmlspecialchars($_POST['confirmpassword'])));
                                                  $email=mysql_real_escape_string(trim(htmlspecialchars($_POST['email'])));
                                                  $captcha=mysql_real_escape_string(htmlspecialchars(trim($_POST['captcha'])));
                                                  

                       
                                                   
                                                    
                                                                                 //Checking email if it has already registered
                                                                                $remail = mysql_query("SELECT email FROM tbl_studentregistration WHERE email='$email'");
                                                                                $checkemail = mysql_num_rows($remail);
                                                                                if ($checkemail != 0){
                                                                                header("Location: freshmanregister.php?EmailAlreadyRegistered=error!");
                                                                                
                                                                                            }else{

                                                         

                                                                                                 //Checking email if it has already registered
                                                                                                  $reusername = mysql_query("SELECT email FROM tbl_studentregistration WHERE username='$username'");
                                                                                                  $checkusername = mysql_num_rows($reusername);
                                                                                                  if ($checkusername != 0){
                                                                                                  header("Location: transfereeregister.php?UsernameAlreadyRegistered=error!");
                                                                                
                                                                                                  }else{
                                                                                      
                                                                                      
                                                                                      

                                                                                                       if($pass==$confirmpassword){

                                                                                                                    //Checking email if it has already registered
                                                                                                                    $repassword = mysql_query("SELECT password FROM tbl_studentregistration WHERE password='$enc_password'");
                                                                                                                    $checkpassword = mysql_num_rows($repassword);

                                                                                                                    
                                                                                                                    if($checkpassword !=0){
                                                                                                                      header("Location: transfereeregister.php?PasswordAlreadyRegistered=error!");

                                                                                                                    }else{

                                                                                                                                    //if the password is less than 10 or greater than 6
                                                                                                                                    if(strlen($pass)<25 || strlen($pass)>6){

                                                                                                                                                    //Start of Captcha
                                                                                                                                                   if(isset($_POST["captcha"]) && $_POST["captcha"]!="" && $_SESSION["code"]==$_POST["captcha"])
                                                                                                                                                    {
                                                                                                                                                              $confirmed=rand(0,999);
                                                                                                                                                              $qry=("INSERT into tbl_studentregistration (surname,firstname,username,password,email, code, confirm_code, seeking, status,prospectivestatus) values ('$sname','$fname','$username','$enc_password','$email','0','$confirmed','','Transferee','pending')");
                                                                                                                                                              mysql_query($qry);

                                                                                                                                                              $message= "Confirm your email
                                                                                                                                                                Click the link below to verify your account 
                                                                                                                                                                  http://www.sims-mks.com/freshmanapplicationform.php?email=$email&code=$confirmed
                                                                                                                                                              ";  

                                                                                                                                                              mail($email,"$email Confirm Email",$message,'From: $email');
                                                                                                                                                              header("Location: transfereeregister.php?Success");
                                                                                                                                                             

                                                                                                                                                    }else{
                                                                                                                                                      header("Location: transfereeregister.php?WrongCodeEntered=error!");
                                                                                                                                                    
                                                                                                                                                    }//End of Captcha

                                                                                                                                    }else{
                                                                                                                                      header("Location: transfereeregister.php?Atleast6characters=error!");
                                                                                                                                     
                                                                                                                                   }//End of if the password is less than 10 or greater than 6
                                                                                                                    }//End of checking of password if it is already registered!
                                                                                                      }else{
                                                                                                        header("Location: transfereeregister.php?InvalidPassword=error!");
                                                                                                      }
                                                                                 
                                                                               


                                                                                                    }//End of checking of username if it is already registered!
                                     

                                                                                            }//End of checking of email if it is already registered!
                                                
                                              }

                                          ?>

<!DOCTYPE html>
<html>
<head>

                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Transferee Create Account</title>
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
                  
                   
                    body{ background: url(../../images/); background-size: cover; color:#838383; }
                 

            
                    /* Shutter Out Horizontal */
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
                      background:#f5af02;
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

                    .next:hover, .next:focus, .next:active {
                          color: #fff;
                        }
                        .next:hover:before, .next:focus:before, .next:active:before {
                          -webkit-transform: scaleX(1);
                          transform: scaleX(1);
                        } 
</style>


</head>
<script type="text/javascript">

function getcaptcha()
{
  $.ajax({
      type: 'post',
      url: 'captcha.php',
      success: function (response) {
      $('#captcha_code').attr('src','captcha.php')
      }
       });
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
        <li> <a href='transfereelogin.php'> Already Registered? Login Here</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav> 
<div class="container">
   <br><br>
            <div class="row text-center">
                <div class="col-md-12">
                    <strong>TO CREATE AN ACCOUNT READ THE <a href="#admission-modal" data-toggle="modal">ADMISSION PROCEDURE</a>  / FOR TRANSFEREES ONLY</strong>  
                    <li>Complete all the required requirements.</li>
                    <li>Fill-up the Application Form to Register.</li>                       
                </div>
            </div>  
        
            <div class="row bs-wizard" style="border-bottom:0;">
         
                <div class="col-xs-3 bs-wizard-step active">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"><i class="fa fa-plus-circle"></i> Create account</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step disabled"><!-- complete -->
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


</div>
 <!-- Start Portfolio Section -->
        <div class="section-modal modal fade" id="admission-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                
                <div class="container">
                    <div class="row">
                        <div class="section-title text-center">
                            <h3>Admission requirements</h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="about-text">
                                <p></p>
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                    <h3>2.1 New students</h3>
                                        <ul>
                                            <li><i class="fa fa-check-square-o"></i>Birth Certificate, original copy if possible.</li>
                                            <li><i class="fa fa-check-square-o"></i>Form 138, original copy if possible.</li>
                                            <li><i class="fa fa-check-square-o"></i>1x1 picture will be taken at the school.</li>
                                            <li><i class="fa fa-check-square-o"></i>Good moral character certificate, original copy if possible.</li>
                                            <li><i class="fa fa-check-square-o"></i>Must have passed both written and oral examinations conducted by the admission office.</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                    <h3>2.2 Transferees</h3>
                                        <ul>
                                    
                                            <li><i class="fa fa-check-square-o"></i>No failing grades or dropped subjects</li>
                                            <li><i class="fa fa-check-square-o"></i>Need to pass the entrance exam</li>
                                            <li><i class="fa fa-check-square-o"></i>Birth Certificate, original copy if possible.</li>
                                            <li><i class="fa fa-check-square-o"></i>Form 138, original copy if possible.</li>
                                            <li><i class="fa fa-check-square-o"></i>1x1 picture will be taken at the school.</li>
                                            <li><i class="fa fa-check-square-o"></i>Good moral character certificate, original copy if possible.</li>
                                            <li><i class="fa fa-check-square-o"></i>Form 137, original copy if possible.</li>
                                        </ul>
                                    </div>
                                </div><!-- /.row -->
                            </div>
                        </div>
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="section-title text-center">
                            <h3>Admission procedures</h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="about-text">
                                <p></p>
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <ul>
                                            <li><i class="fa fa-check-square-o"></i>Pay testing fee at the Cashier's office.</li>
                                            <li><i class="fa fa-check-square-o"></i>Submit copy of Admission Form, photocopy of Form 138 and take a picture to the Admission Secretary</li>
                                            <li><i class="fa fa-check-square-o"></i>Get testing permit.</li>
                                            <li><i class="fa fa-check-square-o"></i>Take the Admission Exam.</li>
                                            <li><i class="fa fa-check-square-o"></i>If passed, take an interview.</li>
                                            <li><i class="fa fa-check-square-o"></i>After a week, get the final result.</li>
                                            <li><i class="fa fa-check-square-o"></i>If admitted, pass the oginal copy of Form 138.</li>
                                        </ul>
                                    </div>
                                  
                                </div><!-- /.row -->

                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                    <h3>Old students</h3>
                                        <ul>
                                            <li><i class="fa fa-check-square-o"></i>Submit Original Report Card at the Cashier's Office.</li>
                                            <li><i class="fa fa-check-square-o"></i>Proceed to the Cashier’s office for assessment and payment of fees.</li>
                                           
                                        </ul>
                                    </div>
                                  
                                </div><!-- /.row -->
                            </div>
                        </div>
                    </div><!-- /.row -->

                </div>
                
            </div>
        </div>
        <!-- End Portfolio Section -->

<div class="container">                                        

         

            <div class="row">
            <div class="col-xs-3">
            </div>

            <div class="col-xs-6">
            <center><H1>REGISTRATION</H1></center>
            <form role="form" method="POST" onsubmit="return freshmanregister()"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                                                                      
              <?php
              if(isset($_GET['EmailAlreadyRegistered'])){
                 ?>
                <div class="alert alert-danger">
                  <p class='text-center'>Email is already registered! Please type another email.</p> 
                </div>
                <?php
              } elseif(isset($_GET['UsernameAlreadyRegistered'])){
                ?>
                <div class="alert alert-danger">
                  <p class='text-center'>Username is already registered!</p> 
                </div>
                <?php
            
              }elseif(isset($_GET['PasswordAlreadyRegistered'])){
                ?>
                <div class="alert alert-danger">
                  <p class='text-center'>Password is already registered! Please type another password.</p> 
                </div>
                <?php
              }elseif(isset($_GET['Success'])){
                 ?>
                <div class="alert alert-success">
                  <p class='text-center'>Account Succesfully Created! You may now login.</p> 
                </div>
                <?php

              }elseif(isset($_GET['WrongCodeEntered'])){
                ?>
                <div class="alert alert-danger">
                  <p class='text-center'>Wrong code entered!</p> 
                </div>
                <?php
              }elseif(isset($_GET['Atleast6characters'])){
                ?>
                <div class="alert alert-danger">
                  <p class='text-center'>Atleast 6 to 25 characters!</p> 
                </div>
                <?php
              }elseif(isset($_GET['InvalidPassword'])){
                  ?>
                <div class="alert alert-danger">
                  <p class='text-center'>Invalid! Password don't match!</p> 
                </div>
                <?php
              }

              ?>

              <i  id="error" style="color: Red; display: none"></i>
              <b><i style="color:red;">(*)</i> Note: Required Fields </b>
            
             
            <div class="form-group"><!--Firstname Validation -->
            <b> Surname <i style="color:red;">(*)</i>  <i id='validatesurname' ></i> <i id='sur'></i></b>                                                                       
            <input class='form-control  '  type='text' onkeypress="return forsurnameregistration(event);" ondrop="return false;" onpaste="return false;"  id='surname' name='surname' maxlength="25"  value=''/>
            </div>                                                         

       
               

            <div class="form-group"><!--Firstname Validation -->
            <b> Firstname <i style="color:red;">(*)</i>  <i id='validatefirstname' ></i> <i id='first'></i></b>                                                                     
            <input class='form-control  ' type='text' id='firstname' onkeypress="return forfirstnameregistration(event);" ondrop="return false;" onpaste="return false;"  name='firstname' maxlength="25" value=''/>
            </div>
                                                                                      
   
            

            <div class="form-group"><!--Firstname Validation -->
            <b> Desired username  <i style="color:red;">(*)</i> <i id='validateusername' ></i> <i id='user'></i></b>                                                                       
            <input type="text" class="form-control  "  name="username" id="username" maxlength="25" onkeypress="return forusernameregistration(event);" ondrop="return false;" onpaste="return false;"/>
            </div>                                                          


                        
            <div class="form-group"><!--Firstname Validation -->
            <b> Password  <i style="color:red;">(*)</i> <i id='validatepassword' ></i> <i id='pass'></i></b>                                                            
            <input type='password' value='' maxlength="25" class='form-control  ' onkeypress="return forpasswordregistration(event);" ondrop="return false;" onpaste="return false;" id='password' name='password' />
            </div>                                                                               
                                                                                     



            
            <div class="form-group"><!--Firstname Validation -->
            <b> Confirm Password  <i style="color:red;">(*)</i> <i id='validateconfirmpassword' ></i> <i id='cpass'></i></b>
             <input type='password' value=''  maxlength="25" class='form-control  ' onkeypress="return forconfirmpasswordregistration(event);" ondrop="return false;" onpaste="return false;"  id='confirmpassword' name='confirmpassword'/> 
            <span class="input-group-btn"></span>
            </div>
                                                                          


  
            
            <div class="form-group"><!--Firstname Validation -->
            <b> Email Address  <i style="color:red;">(*)</i> <i id='validateemail' ></i> <i id='mail'></i></b>                                                                          
            <input type='text' value='' class='form-control  ' maxlength='35' onkeypress="return foremailregistration(event);" ondrop="return false;" onpaste="return false;" id='email' name='email' />
            </div>
                                                                                      

              
              <div class="form-group"><!--Firstname Validation -->
            <b>Enter Captcha   <i style="color:red;">(*)</i> <i id='validatecaptcha' ></i> <i id='cap'></i></b>                                                             
                <input name="captcha" id="captcha" class='form-control  ' maxlength="6" type="text" onkeypress="return forcaptcharegistration(event);" ondrop="return false;" onpaste="return false;" >
            </div>
                                                                                    

            <div class="input-group">
            <img src="captcha.php"  width="340" height="100" id="captcha_code">
            </div>  
            
            <button type="button" class="next" value="Reload Captcha" onclick="getcaptcha();">Reload Captcha <i class='fa fa-refresh'></i></button>
            <button type="submit"  name="submit" class="next" value="Submit"   >Create</button>
                                                                               
                                                                                  
            </form><br>
            </div>
            <div class="col-xs-3">
            </div>
            </div>  
                                                                         
            </div>

  
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
