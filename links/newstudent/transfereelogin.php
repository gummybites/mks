<?php 
include('config.php');

if(isset($_POST['login'])) 
{
    $email= mysql_real_escape_string(trim(htmlspecialchars($_POST['email'])));
    $pass= mysql_real_escape_string(trim(htmlspecialchars($_POST['password'])));
    $enc_password=mysql_real_escape_string(trim(htmlspecialchars(sha1(md5($pass)))));

$qry = "SELECT * FROM tbl_studentregistration WHERE email= '$email' and status='Transferee'";
$result = mysql_query($qry);

while($qry=mysql_fetch_array($result)){
  $db_email=$qry['email'];
  $db_password=$qry['password'];
  $db_code=$qry['code'];


}


        
         if (preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
               
               if($enc_password==$db_password){

                                if($db_code=='1'){
                                    session_start();
                                    $_SESSION['email']=$db_email;
                                    header("Location: transfereeapplicationform.php");
                                  

                                }else{
                                  header( "Location: transfereelogin.php?YourAccountIsNotActivated=error!");   

                                }
                        }else{
                           header( "Location: transfereelogin.php?PleaseInputcorrectpassword=error!");  

                        }
             }else{
               header( "Location: transfereelogin.php?PleaseInputvalidEmail=error!");  

             }                   
                


}


?>




<!DOCTYPE html>
<html>

<head>

                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Login</title>
                    <link rel="stylesheet" href="../../css/bootstrap.min.css"></link>
                    <link rel="stylesheet" href="../../css/style.css"></link>

                    <script src="../../js/dropdown.js"></script>
                    <script src="../../js/bootstrap.min.js"></script>
                    <script src="../../js/jquery.1.11.1.js"></script>
                    <script src="../../js/bootstrap.js"></script>
                     <script src="../../js/validation.js"></script>

<style>
                  body{
                    
                   }

                    #main{
                      margin-top: 55px;

                    }

                     #login-form {

                    min-height: 65vh;

                   }

                   #login-inputs{
                     margin-top: 55px;
                      
                   }

                  .btn{
                      border-radius: 1px;
                     

                    }

                    .content{
                      min-height: 70vh;

                    }
                   
                
                     /* footer Section */  
                    #footer{
                     margin: 1%;
                     margin-top: 50px;
                    }

                    #password{
                      border-right: none;
                      box-shadow: none;
                      border-color: #d9edf7;

                    }
                    #email{
                      border-right: none;
                      box-shadow: none;

                      border-color: #d9edf7;
                    }

                    #password-addon{
                      border-left: none;
                       background-color: #fff;
                       border-color: #d9edf7;
                    }
                    #email-addon{
                      border-left: none;
                       background-color: #fff;
                       border-color: #d9edf7;

                    }

</style>


</head>
<body>




 <nav id='menu' class="navbar navbar-default navbar-fixed-top">
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
            <li>
              <a href="#page-top"></a>
            </li>
            <li>
              <a class="page-scroll" href="../../mks.php">Home</a>
            </li>
            <li>
              <a class="page-scroll" href="../../mks.php?#admission ">Admission</a>
            </li>
            <li>
              <a class="page-scroll" href="../../mks.php?#about">About</a>
            </li>
            <li>
              <a class="page-scroll" href="../../mks.php?#link">Link</a>
            </li>
            <li>
              <a class="page-scroll" href="../../mks.php?#contact">Contact</a>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    </nav>    	


 
<section class="light-bg" id="login-form">
<div id="main" class="container-fluid ">
        <div class='container' class="col-md-12 col-xs-12 content">


        

          <form id='login-inputs' method="POST" onsubmit="return freshmanlogin(event)" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    
          

                                 <strong>IF YOU ALREADY HAVE AN ACCOUNT PLEASE PROCEED LOGIN/ FOR FRESHMAN ONLY</strong>
                                <!--Displaying error message if the inputs are in special character -->
                                        
                                
                              <?php
                              if(isset($_GET['YourAccountIsNotActivated'])){
                                echo "<div class='row'>
                                            <div class='col-md-6'>
                                                <div class='alert alert-danger' >
                                                <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                                <span class='glyphicon glyphicon-lock'></span> Your account is not activated! Please confirm in your email first before login!</div>
                                                </div></div>";

                              }elseif(isset($_GET['PleaseInputcorrectpassword'])){
                                echo "<div class='row'>
                                            <div class='col-md-6'>
                                                <div class='alert alert-danger'>
                                                <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                                <span class='glyphicon glyphicon-'></span>Invalid! Please type your correct password!</div>
                                                </div></div>";

                              }elseif(isset($_GET['PleaseInputvalidEmail'])){
                                echo "<div class='row'>
                                            <div class='col-md-6'>
                                                <div class='alert alert-danger'>
                                                <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                                <span class='glyphicon glyphicon-'></span>Invalid! Please type your valid Email!</div>
                                                </div></div>";

                              }

                               ?>           
                                               <div class='row'>
                                            <div class='col-md-6'>
                                            <div><p><i>(*) Fields are required</i></p><i  id="error" style="color: Red; display: none"></i><i id='validateemail' ></i></div>
                                            </div></div>
                                            <br>
                                        
                                                 
                                            

                                            <!-- Input text email-->
                                            <div class='row'>

                                            <div class='col-md-6'>
                                            <div class="input-group input-group-lg">
                                              <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-envelope"></span>
                                              </span>

                                               <input type='text' value='' class='form-control input' maxlength='35'  onkeypress="return foremail(event);" ondrop="return false;" onpaste="return false;" id='email' name='email' placeholder="Email address * ex. juandelacruz@yahoo.com"/>
                                              
                                              <span id='email-addon' class="input-group-addon">
                                                <i id='mail'></i>
                                              </span>
                                            

                                            </div>
                                            </div>
                                            </div>
                                            <br>
                          

                                            
                                             <div class='row'>
                                            <div class='col-md-6'>

                                            <div class="input-group input-group-lg">
                                              <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-lock"></span>
                                              </span>
                                              
                                               <input type='password' value='' maxlength="9" class='form-control'  onkeypress="return forpassword(event);" ondrop="return false;" onpaste="return false;" id='password' name='password' placeholder='Password *'/>
                                                <span id='password-addon' class="input-group-addon">
                                                <i id='pass'></i>
                                              </span>

                                               <span  class="input-group-btn">
                                                 <button type='button' id='togglebuttonpassword' class='btn btn-default' onclick="togglepassword()" ><span class='glyphicon glyphicon-eye-open'></span></button>
                                              </span>
                                            </div>
                                            </div>
                                            </div>
                                            <br>  

                                            <div class='row'>
                                            <div class='col-md-2'> </div>
                                            <div class='col-md-2'>          
                                            <button type="submit" name="login" value="Submit" class='btn btn-danger ' class=""  >Login</button>
                                            </div>
                                            <div class='col-md-2'>
                                            Don’t have an account yet? 
                                            <br>
                                            <a href='transfereeregister.php'>It’s FREE, Sign Up Here</a>
                                            </div>
                                            </div>
                                            

                                         
                                              
          </form>	
</div> <!-- //Collect the nav links, forms, and other content for toggling -->
</div>
</section>


<section class='white-bg' >
  <div class="container" id="contact">
        <div class="row">
          
        </div>
        <div class="row">
          <div class="col-md-5">
            <div class="section-text">
              <h4>Location:</h4>
              <p>#10 Mendoza St., Saog,, 3019 Marilao, Bulacan</p>
              <p><i class="glyphicon glyphicon-phone"></i> 09063710368</p>
              <p><i class="glyphicon glyphicon-ok-sign"></i> Recognize by the government through the Department of Education.</p>
            </div>
          </div>
          <div class="col-md-5">
            <div class="section-text">
              <h4>School Hours</h4>
              <p><i class="glyphicon glyphicon-clock"></i> <span class="day">Mon-Fri: </span><span>07:30 - 17:00</span></p>
            
            </div>
          </div>

        </div>
      </div>
    
  </section>  
    
    <footer>
      <div class="container text-center">
        <p><?php  $curYear= Date('Y');
                                        echo "Copyright &COPY; $curYear <a href=''>MKS</a>";
                                      ?></p>
      </div>
    </footer>





</body>
</html>
