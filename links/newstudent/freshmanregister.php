<?php  session_start(); ?>


<?php 
                                            include('config.php');

                                            if(isset($_POST['submit']))
                                              {
                                                
                                                  $email=mysql_real_escape_string(htmlspecialchars(trim($_POST['email'])));
                                                  $pass=mysql_real_escape_string(htmlspecialchars(trim($_POST['password'])));
                                                  $confirmpassword=mysql_real_escape_string(htmlspecialchars(trim($_POST['confirmpassword'])));
                                                  $sname=mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST['surname']))));
                                                  $fname=mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST['firstname']))));
                                                  $captcha=mysql_real_escape_string(htmlspecialchars(trim($_POST['captcha'])));
                                                  $enc_password=mysql_real_escape_string(sha1(md5(htmlspecialchars(trim($pass)))));

                       
                                                   
                                                    
                                              

                                                           if (preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {

                                                                //Checking email if it has already registered
                                                                $remail = mysql_query("SELECT email FROM tbl_studentregistration WHERE email='$email'");
                                                                $checkemail = mysql_num_rows($remail);
                                                                      if ($checkemail != 0){
                                                                                header("Location: freshmanregister.php?EmailAlreadyRegistered=error!");
                                                                                
                                                                                            }else{
                                                                                      
                                                                                      
                                                                                      

                                                                                     if($pass==$confirmpassword){

                                                                                                  //Checking email if it has already registered
                                                                                                  $repassword = mysql_query("SELECT password FROM tbl_studentregistration WHERE password='$enc_password'");
                                                                                                  $checkpassword = mysql_num_rows($repassword);

                                                                                                  
                                                                                                  if($checkpassword !=0){
                                                                                                    header("Location: freshmanregister.php?PasswordAlreadyRegistered=error!");

                                                                                                  }else{

                                                                                                                  //if the password is less than 10 or greater than 6
                                                                                                                  if(strlen($pass)<10 || strlen($pass)>6){

                                                                                                                                  //Start of Captcha
                                                                                                                                 if(isset($_POST["captcha"]) && $_POST["captcha"]!="" && $_SESSION["code"]==$_POST["captcha"])
                                                                                                                                  {
                                                                                                                                            $confirmed=rand(0,999);
                                                                                                                                            $qry=("INSERT into tbl_studentregistration (email,password, code, confirm_code, seeking, status, surname, firstname) values ('$email','$enc_password','0','$confirmed','Grade 7','new student','$sname','$fname')");
                                                                                                                                            mysql_query($qry);

                                                                                                                                            $message= "Confirm your email
                                                                                                                                              Click the link below to verify your account 
                                                                                                                                                http://www.yahoo.com/freshmanregister.php?email=$email&code=$confirmed
                                                                                                                                            ";  

                                                                                                                                            mail($email,"$email Confirm Email",$message,'From: $email');
                                                                                                                                            header("Location: freshmanregister.php?Success");
                                                                                                                                           

                                                                                                                                  }else{
                                                                                                                                    header("Location: freshmanregister.php?WrongCodeEntered=error!");
                                                                                                                                  
                                                                                                                                  }//End of Captcha

                                                                                                                  }else{
                                                                                                                    header("Location: freshmanregister.php?Atleast6characters=error!");
                                                                                                                   
                                                                                                                 }//End of if the password is less than 10 or greater than 6
                                                                                                  }//End of checking of password if it is already registered!
                                                                                    }else{
                                                                                      header("Location: freshmanregister.php?InvalidPassword=error!");
                                                                                    }
                                                                                 
                                                                               

                                                                           }//End of checking of email if it is already registered!

                                                          }else{
                                                            header("Location: freshmanregister.php?InvalidEmail=error!");
                                                          }//End of if the email is valid or not!

                                                          
                                                
                                              }

                                          ?>

<!DOCTYPE html>
<html>
<head>

                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Register Account</title>
                    <link rel="stylesheet" href="../../css/bootstrap.min.css"></link>
                    <link rel="stylesheet" href="../../css/bootstrap.css"></link>
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
                    #register-inputs{

                      margin-top: 55px;
                    }
                    .light-bg{


                    }
                   
                     .btn{
                      border-radius: 1px;
                     

                    }

                    #password{
                      border-right: none;
                      box-shadow: none;
                      border-color: #d9edf7;

                    }

                    #confirmpassword{
                      border-right: none;
                      box-shadow: none;
                      border-color: #d9edf7;

                    }

                    #email{
                      border-right: none;
                      box-shadow: none;

                      border-color: #d9edf7;
                    }


                    #surname{
                      border-right: none;
                      box-shadow: none;

                      border-color: #d9edf7;
                    }

                     #firstname{
                      border-right: none;
                      box-shadow: none;

                      border-color: #d9edf7;
                    }
                    #captcha{
                      border-right: none;
                      box-shadow: none;

                      border-color: #d9edf7;
                    }
                   

                    #span-addon{
                      border-left: none;
                       background-color: #fff;
                       border-color: #d9edf7;
                    }


            

                    /* footer Section */  
                    #footer{
                     margin: 1%;
                     margin-top: 50px;
                    }

</style>


</head>
<body>




 <!-- Navigation -->
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

 

<section class="light-bg">
	<div id="main"class="container-fluid ">
        <div class='container'  class="col-md-12 col-xs-12 content">
  


         
          
          
          <form id='register-inputs' method="POST" onsubmit="return freshmanregister()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                            <?php 
                            if(isset($_GET['email'])){
                              $email=$_GET['email'];
                              $code=$_GET['code'];

                              $qry="SELECT * from tbl_studentregistration where email='$email'";
                              $res= mysql_query($qry);

                             

                                mysql_query("UPDATE tbl_studentregistration set code='1' where email='$email'");
                                mysql_query("UPDATE tbl_studentregistration set confirm_code='0' where email='$email'");

                                echo "Congrats! Your email has been confirmed and you may now login!";

                             

                            }else{
                            ?>
                                
                               
                                          <?php
                                          if(isset($_GET['EmailAlreadyRegistered'])){
                                          echo "<div class='row'><div class='col-md-6'><div class='alert alert-danger' role='alert'> <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Email is already registered! Please type another email...</div></div></div>";
                                          }elseif(isset($_GET['PasswordAlreadyRegistered'])){
                                          echo "<div class='row'><div class='col-md-6'><div class='alert alert-danger' role='alert'> <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Password is already registered! Please type another password...</div></div></div>";
                                          }elseif(isset($_GET['Success'])){
                                          echo "<div class='row'><div class='col-md-6'><div class='alert alert-success' role='alert'> <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Registration Complete! Please Confirm your email address!</div></div></div>";

                                          }elseif(isset($_GET['WrongCodeEntered'])){
                                          echo "<div class='row'><div class='col-md-6'><div class='alert alert-danger' role='alert'> <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Wrong Code Entered</div></div></div>";

                                          }elseif(isset($_GET['Atleast6characters'])){
                                          echo "<div class='row'><div class='col-md-6'><div class='alert alert-danger' role='alert'> <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Atleast 6 to 10 characters!</div></div></div>";

                                          }elseif(isset($_GET['InvalidPassword'])){
                                          echo "<div class='row'><div class='col-md-6'><div class='alert alert-danger' role='alert'> <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Invalid! Password don't match!</div></div></div>";

                                          }elseif(isset($_GET['InvalidEmail'])){
                                          echo "<div class='row'><div class='col-md-6'><div class='alert alert-danger' role='alert'> <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Please type a valid email!</div></div></div>"; 

                                          }

                                           ?>

                                           <div class='row'>
                                            <div class='col-md-6'>
                                            <strong>TO CREATE AN ACCOUNT READ THE <a href='../admission_requirements.php'>ADMISSION PROCEDURE</a>  / FOR FRESHMEN ONLY</strong>  
                                            <li>Complete all the required requirements.</li>
                                            <li>Fill-up the Application Form to Register.</li>
                                            
                                            </div></div>
                                            <br>


                                            <div><p><i>(*) Fields are required</i></p><i  id="error" style="color: Red; display: none"></i>

                                            <div><i id='validateemail' ></i></div>
                                            <div><i id='validatepassword' ></i></div>
                                            <div><i id='validateconfirmpassword' ></i></div>
                                            <div><i id='validatesurname' ></i></div>
                                            <div><i id='validatefirstname' ></i></div>
                                            <div><i id='validatecaptcha' ></i></div></div>


                                           <div class='row'>
                                            <div class='col-md-6'>
                                            <div class="input-group input-group-lg">
                                              <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-envelope"></span>
                                              </span>

                                               <input type='text' value='' class='form-control input' maxlength='35' onkeypress="return foremail(event);" ondrop="return false;" onpaste="return false;" id='email' name='email' placeholder="Email address * ex. juandelacruz@yahoo.com"/>
                                                 
                                              <span id='span-addon' class="input-group-addon">
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
                                              
                                               <input type='password' value='' maxlength="9" class='form-control' onkeypress="return forpassword(event);" ondrop="return false;" onpaste="return false;" id='password' name='password' placeholder='Password *'/>
                                                <span id='span-addon' class="input-group-addon">
                                                 <i id='pass'></i>
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
                                            
                                               <input type='password' value=''  maxlength="9" class='form-control input-sm' onkeypress="return forconfirmpassword(event);" ondrop="return false;" onpaste="return false;"  id='confirmpassword' name='confirmpassword' placeholder='Confirm Password *'/> 
                                        
                                              <span id='span-addon' class="input-group-addon">
                                                 <i id='cpass'></i>
                                              </span>

                                              <span class="input-group-btn">
                                                 <button  id='togglebuttonconfirmpassword'  class='btn btn-default' onclick="toggleconfirmpassword()"><span class='glyphicon glyphicon-eye-open'></span></button>
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
                                            
                                               <input class='form-control' type='text' onkeypress="return forsurname(event);" ondrop="return false;" onpaste="return false;"  id='surname' name='surname' maxlength="25" placeholder='Surname.. *' value=''/>
                                        
                                             <span id='span-addon' class="input-group-addon">
                                                 <i id='sur'></i>
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
                                            
                                              <input class='form-control' type='text' id='firstname' onkeypress="return forfirstname(event);" ondrop="return false;" onpaste="return false;"  name='firstname' maxlength="25" placeholder='Firstname..*' value=''/>
                                        
                                             <span id='span-addon' class="input-group-addon">
                                                 <i id='first'></i>
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
                                              
                                               <input name="captcha" id='captcha' class='form-control input-sm' maxlength="4" type="text" onkeypress="return forcaptcha(event);" ondrop="return false;" onpaste="return false;" placeholder='Type the code you see *'>
                                                 
                                              
                                              <span id='span-addon' class="input-group-addon">
                                                 <i id='cap'></i>
                                              </span>

                                              <span class="input-group-addon">
                                                 <i><img id='captcha' src="captcha.php" /></i>
                                              </span>
                                            </div>
                                            </div>
                                            </div>
                                            <br> 



                                         

                                            <div class='row'>
                                            <div class='col-md-2'> </div>
                                            <div class='col-md-2'>          
                                            <button type="submit"  name="submit" value="Submit" class="btn btn-danger"  >Create</button>
                                            <a href="freshmanregister.php" class="btn btn-danger"  >Clear</a>
                                            </div>
                                            <div class='col-md-2'>
                                            Already have an account? 
                                            <br>
                                            <a href='freshmanlogin.php'>Login Here</a>
                                            </div>
                                            </div>
                                           

                                                             

                          
                                 
                                    
                                   


                                    
                           
                                      
                               
          </form>
        <?php }?>
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
              <p><i class="glyphicon glyphicon-clock"></i> <span class="day">Monday-Friday: </span><span>07:00am - 5:00pm</span></p>
            
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
