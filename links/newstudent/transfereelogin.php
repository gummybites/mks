<?php 
include('../config.php');

if(isset($_POST['login'])) 
{
    $username= mysql_real_escape_string(trim(htmlspecialchars($_POST['username'])));
    $pass= mysql_real_escape_string(trim(htmlspecialchars($_POST['password'])));
    $enc_password=mysql_real_escape_string(sha1(md5(trim(htmlspecialchars($pass)))));

$qry = "SELECT * FROM tbl_studentregistration WHERE username= '$username' and status='Transferee' and prospectivestatus='pending'";
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
                                    header("Location: transfereeapplicationform.php");
                                  

                                
                        }else{
                           header( "Location: transfereelogin.php?InvalidUsernameOrPassword");  

                        }
             }else{
               header( "Location: transfereelogin.php?InvalidUsernameorPassword");  

             }                           
                


}


?>




<!DOCTYPE html>
<html>

<head>

                     <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Transferee Login Account</title>
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
                                                              <strong>IF YOU ALREADY HAVE AN ACCOUNT PLEASE PROCEED LOGIN/ FOR TRANSFEREE ONLY</strong>  
                                                                                 
                                                          </div>
                                                      </div>
                                                       <div class="row">
                                                             
                                                              <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                                                                      <div class="panel panel-default" id="panel">
                                                                          <div class="panel-heading">
                                                                      <b>   (*) Note: Required Fields </b>  
                                                                          </div>
                                                                          <div class="panel-body">
                                                                            <div align="center"> <img src="../../images/login-icon.png" height="100px" width="100px"></div>
                                                                               <h4>Please provide your details</h4>
                                                                              <form role="form" method="POST" onsubmit="return freshmanlogin()"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                                                                      
                                                                                      <?php if(isset($_GET['InvalidUsernameOrPassword'])){
                                                                                              ?>
                                                                                              <div style='color: red;'>Invalid Username or Password...</div>
                                                                                              <?php
                                                                                        }elseif(isset($_GET['InvalidUsernameorPassword'])){
                                                                                              ?>
                                                                                              <div style='color: red;'>Invalid Username or Password...</div>
                                                                                              <?php



                                                                                          } ?>

                                                                                      <i  id="error" style="color: Red; display: none"></i>

                                                                                      <div class="form-group input-group"><!--Username Validation -->
                                                                                      <i id='validateusername' ></i>
                                                                                      <i id='user'></i>
                                                                                      </div>
                                                                                      
                                                                                      <input type='text' value='' class='form-control input' maxlength='25'  onkeypress="return forusernamelogin(event);" ondrop="return false;" onpaste="return false;" id='username' name='username' placeholder="Your Username *"/>
                                                                                  



                                                                                      <div class="form-group input-group"><!--Password Validation -->
                                                                                      <i id='validatepassword' ></i>
                                                                                      <i id='pass'></i>
                                                                                      </div>
                                                                                    
                                                                                      <input type='password' value='' maxlength="25" class='form-control'  onkeypress="return forpasswordlogin(event);" ondrop="return false;" onpaste="return false;" id='password' name='password' placeholder='Your password *'/>
                                                                                



                                                                                      

                                                                                  <button type="submit"  name="login" class="next" value="Submit"   >Login</button>
                                                                                  <hr />
                                                                                  Don't have an account yet?   <a href='transfereeregister.php'>Register Here</a>
                                                                                  </form>
                                                                          </div>
                                                                         
                                                                      </div>
                                                                  </div>
                                                              
                                                              
                                                      </div>
                                                  </div>





</body>
</html>
