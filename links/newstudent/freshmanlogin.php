<?php 
include('../config.php');

if(isset($_POST['login'])) 
{
    $username= mysql_real_escape_string(trim(htmlspecialchars($_POST['username'])));
    $pass= mysql_real_escape_string(trim(htmlspecialchars($_POST['password'])));
    $enc_password=mysql_real_escape_string(sha1(md5(trim(htmlspecialchars($pass)))));

$qry = "SELECT * FROM tbl_studentregistration WHERE username= '$username' and seeking='Grade 7' and prospectivestatus='pending'";
$result = mysql_query($qry);

while($qry=mysql_fetch_array($result)){
  $db_username=$qry['username'];
  $db_email=$qry['email'];
  $db_password=$qry['password'];
  $db_code=$qry['code'];


}


        
         if($username==$db_username) {
               
               if($enc_password==$db_password){

                               
                                    session_start();
                                    $_SESSION['username']=$db_username;
                                    header("Location: freshmanapplicationform.php");
                                  

                                
                        }else{
                           header( "Location: freshmanlogin.php?InvalidUsernameOrPassword");  

                        }
             }else{
               header( "Location: freshmanlogin.php?InvalidUsernameorPassword");  

             }                   
                


}


?>




<!DOCTYPE html>
<html>

<head>

                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Freshmen Login Account</title>
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
        <li> <a href='freshmanregister.php'>Don't have an account yet? Register Here</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>     

<div class="container">
   <br><br>
            <div class="row text-center">
                <div class="col-md-12">
                    <strong>IF YOU ALREADY HAVE AN ACCOUNT READ THE <a href="#admission-modal" data-toggle="modal">ADMISSION PROCEDURE</a>  / FOR INCOMING FRESHMEN ONLY</strong>  
                    <li>Complete all the required requirements.</li>
                    <li>Fill-up the Application Form to Register.</li>                       
                </div>
            </div>  
        
            <div class="row bs-wizard" style="border-bottom:0;">
         
                <div class="col-xs-3 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"><i class="fa fa-plus-circle"></i> Create account</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step active"><!-- complete -->
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
            <center><H1>LOGIN</H1></center>

                                                                    
            <form role="form" method="POST" onsubmit="return freshmanlogin()"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                                                                      
            <?php if(isset($_GET['InvalidUsernameOrPassword'])){
                ?>
                <div class="alert alert-danger">
                  <p class='text-center'>Invalid username or password.</p> 
                </div>
                <?php
           }elseif(isset($_GET['InvalidUsernameorPassword'])){
                ?>
                <div class="alert alert-danger">
                  <p class='text-center'>Invalid username or password.</p> 
                </div>
                <?php
            } ?>

           <i  id="error" style="color: Red; display: none"></i>
           <b><i style="color:red;">(*)</i> Note: Required Fields </b>
           
            
          
             <div class="form-group"><!--Username Validation -->  
            <b>Username <i style="color:red;">(*)</i>  <i id='validateusername' ></i> <i id='user'></i></i></b>                                                                         
            <input type='text' value='' class='form-control ' maxlength='25'  onkeypress="return forusernamelogin(event);" ondrop="return false;" onpaste="return false;" id='username' name='username'/>

              </div>
                                                                                  
            
            
            
            <div class="form-group"><!--Password Validation -->
             <b>Password <i style="color:red;">(*)</i>  <i id='validatepassword' ></i><i id='pass'></i></b>                                                                        
            <input type='password' value='' maxlength="25" class='form-control '  onkeypress="return forpasswordlogin(event);" ondrop="return false;" onpaste="return false;" id='password' name='password' />

            </div>
                                                                                

              <button type="submit"  name="login" class="next" value="Submit"   >Login</button>
      
            
          </form><br><br>
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
