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
                 

                    #panel{
                      box-shadow: 10px 10px 5px #888888;;


                    }

                    .input-group-addon{
                      background: transparent;

                    }

            
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
        <li> <a href="../../index.php"><i class="glyphicon glyphicon-chevron-left"></i>Back to Home Page</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

 

<div class="container">
                                                 <br><br>
                                                      <div class="row text-center pad-top ">
                                                          <div class="col-md-12">
                                                              <strong>TO CREATE AN ACCOUNT READ THE <a href='../admissionprocedure.php'>ADMISSION PROCEDURE</a>  / FOR TRANSFEREE ONLY</strong>  
                                                              <li>Complete all the required requirements.</li>
                                                              <li>Fill-up the Application Form to Register.</li>                       
                                                          </div>
                                                      </div>
                                                       <div class="row">
                                                             
                                                              <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                                                                      <div class="panel panel-default" id="panel">
                                                                          <div class="panel-heading">
                                                                      <b>   (*) Note: Required Fields </b>  
                                                                          </div>
                                                                          <div class="panel-body">
                                                                         <div align="center"> <img src="../../images/registration-icon.png" id='registration-icon' height="100px" width="100px"></div>
                                                                              <form role="form" method="POST" onsubmit="return freshmanregister()"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                                                                      
                                                                                       <?php
                                                                                      if(isset($_GET['EmailAlreadyRegistered'])){
                                                                                      echo "<div style='color: red;'>Email is already registered! Please type another email...</div>";
                                                                                      } elseif(isset($_GET['UsernameAlreadyRegistered'])){
                                                                                      echo "<div style='color: red;'>Username is already registered! Please type another username...</div>";
                                                                                      }elseif(isset($_GET['PasswordAlreadyRegistered'])){
                                                                                      echo "<div style='color: red;'>Password is already registered! Please type another password...</div>";
                                                                                      }elseif(isset($_GET['Success'])){
                                                                                      echo "<div style='color: green;'>Account Succesfully Created! You may now login.</div>";

                                                                                      }elseif(isset($_GET['WrongCodeEntered'])){
                                                                                      echo "<div style='color: red;'>Wrong Code Entered</div>";

                                                                                      }elseif(isset($_GET['Atleast6characters'])){
                                                                                      echo "<div style='color: red;'>Atleast 6 to 25 characters!</div>";

                                                                                      }elseif(isset($_GET['InvalidPassword'])){
                                                                                      echo "<div style='color: red;'>Invalid! Password don't match!</div>";

                                                                                      }

                                                                                       ?>

                                                                                      <i  id="error" style="color: Red; display: none"></i>
                                                                                      <h3>Create your free account:</h3>
                                                                                      <div class="form-group  input-group"><!--Surname Validation -->
                                                                                      <i id='validatesurname' ></i>
                                                                                      <i id='sur'></i>
                                                                                      </div>
                                                                                     
                                                                                      <input class='form-control' type='text' onkeypress="return forsurnameregistration(event);" ondrop="return false;" onpaste="return false;"  id='surname' name='surname' maxlength="25" placeholder='Your Surname *' value=''/>
                                                                                  

                                                                                      <div class="form-group input-group"><!--Firstname Validation -->
                                                                                      <i id='validatefirstname' ></i>
                                                                                      <i id='first'></i>
                                                                                      </div>
                                                                                    
                                                                                      <input class='form-control' type='text' id='firstname' onkeypress="return forfirstnameregistration(event);" ondrop="return false;" onpaste="return false;"  name='firstname' maxlength="25" placeholder='Your Firstname *' value=''/>
                                                                                      



                                                                                      <div class="form-group input-group"><!--Username Validation -->
                                                                                      <i id='validateusername' ></i>
                                                                                      <i id='user'></i>
                                                                                      </div>
                                                                                       
                                                                                      <input type="text" class="form-control" placeholder="Desired username *" name="username" id="username" maxlength="25" onkeypress="return forusernameregistration(event);" ondrop="return false;" onpaste="return false;"/>
                                                                                      


                                                                                      <div class="form-group input-group"><!--Password Validation -->
                                                                                      <i id='validatepassword' ></i>
                                                                                      <i id='pass'></i>
                                                                                      </div>
                                                                                    
                                                                                      <input type='password' value='' maxlength="25" class='form-control' onkeypress="return forpasswordregistration(event);" ondrop="return false;" onpaste="return false;" id='password' name='password' placeholder='Password *'/>
                                                                                          
                                                                                     


                                                                                      <div class="form-group input-group"><!--Confirmpassword Validation -->
                                                                                      <i id='validateconfirmpassword' ></i>
                                                                                      <i id='cpass'></i>
                                                                                      </div>
                                                                                      <div class="input-group">
                                                                                           <input type='password' value=''  maxlength="25" class='form-control' onkeypress="return forconfirmpasswordregistration(event);" ondrop="return false;" onpaste="return false;"  id='confirmpassword' name='confirmpassword' placeholder='Confirm Password *'/> 
                                                                                          <span class="input-group-btn"><button  id='togglebuttonconfirmpassword'  class='btn btn-default' onclick="toggleconfirmpassword()"><span class='glyphicon glyphicon-eye-open'></span></button></span>
                                                                                      </div>


                                                                                      <div class="form-group input-group"><!--Email Validation -->
                                                                                      <i id='validateemail' ></i>
                                                                                      <i id='mail'></i>
                                                                                      </div>
                                                                                      
                                                                                      <input type='text' value='' class='form-control' maxlength='35' onkeypress="return foremailregistration(event);" ondrop="return false;" onpaste="return false;" id='email' name='email' placeholder="Your Email *"/>
                                                                                      


                                                                                      <div class="form-group input-group"><!--Captcha Validation -->
                                                                                      <i id='validatecaptcha' ></i>
                                                                                      <i id='cap'></i>
                                                                                      </div>
                                                                                   
                                                                                       <input name="captcha" id="captcha" class='form-control' maxlength="6" type="text" onkeypress="return forcaptcharegistration(event);" ondrop="return false;" onpaste="return false;" placeholder='Enter Captcha *'>
                                                                                    

                                                                                    <div class="input-group">
                                                                                          <img src="captcha.php"  width="340" height="100" id="captcha_code">
                                                                                         
                                                                                    </div>  
                                                                                     <button type="button" class="next" value="Reload Captcha" onclick="getcaptcha();">Reload Captcha <i class='fa fa-refresh'></i></button>
                                                                                  <button type="submit"  name="submit" class="next" value="Submit"   >Create</button>
                                                                                  <hr />
                                                                                  Already Registered ?   <a href='transfereelogin.php'>Login Here</a>
                                                                                  </form>
                                                                          </div>
                                                                         
                                                                      </div>
                                                                  </div>
                                                              
                                                              
                                                      </div>
                                                  </div>






</body>
</html>
