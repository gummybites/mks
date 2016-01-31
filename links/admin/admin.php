<?php 
include('config.php');

if(isset($_POST['login'])) 
{
    $userName = $_POST['username'];
    $pass =  $_POST['password'];
$qry ="SELECT * FROM tbl_admin WHERE username = '$userName' AND password = '$pass'";
$result = mysql_query($qry);
while($qry = mysql_fetch_array($result)){
    $ID = $qry['id'];
}

if(mysql_num_rows($result) > 0)
{
session_start();
$_SESSION['id']=$ID;
$_SESSION['password'] = $pass;
                if(($_POST['remember']) == 'on'){
                    $expire = time()+86400;
                    setcookie('mks', $_SESSION['id'], $expire);
                }

header("Location:welcome.php");
}
else 
{
                echo'<script>alert("INCORRECT USERNAME OR PASSWORD");</script>';
           
 
     
         
}
}

?>


<?php

if(isset($_COOKIE['mks'])){

   include ('session.php');

}else{

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
 
    <title>Admin Login</title>
    <link href="../../css/bootstrap.css" rel="stylesheet" />
    <link href="../../fonts/font-awesome/css/font-awesome.css" rel="stylesheet" />
     <link href="../../fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
 

<style>
@import url(http://fonts.googleapis.com/css?family=Roboto); /* FREE GOOGLE FONT */

body {
    font-family: 'Roboto', sans-serif;
    line-height: 30px;


   
}

.set-radius-zero {
    border-radius: 0px;
    -moz-border-radius: 0px;
    -webkit-border-radius: 0px;
}

.content-wrapper {
    margin-top: 40px;
    min-height: 600px;
    padding-bottom: 60px;
}

.page-head-line {
    font-weight: 900;
    padding-bottom: 20px;
    border-bottom: 2px solid #F0677C;
    text-transform: uppercase;
    color: #F0677C;
    font-size: 20px;
    margin-bottom: 40px;
}

.btn {
    border-radius: 0px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
}

.progress {
    height: 8px;
    border-radius: 0px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
}
.login-icon {
    height: 60px;
width: 60px;
padding: 13px;
border-radius: 50%;
font-size: 30px;
margin-bottom: 20px;
color: #fff;
text-align: center;
cursor:pointer;
background-color:#F0677C;
-webkit-border-radius:50%;
    -moz-border-radius:50%;
}
/* =============================================================
   HEADER SECTION STYLES
 ============================================================ */
header {
    background-color: #F0677C;
    color: #fff;
    padding: 10px;
    text-align: right;
}


#page-inner {
    width:100%;
    margin:10px 0px 0px 0px;
    background-color:#fff!important;
    padding:50px;
   min-height: 100px;
}




/* MENU LINKS SECTION*/

.menu-section {
    background-color: #222222 !important;
}

#menu-top a {
    color: #FFF;
    text-decoration: none;
    font-weight: 500;
    padding: 10px 10px 10px 10px;
    text-transform: uppercase;
    border: none;
}


.menu-top-active {
    background-color: #222222 !important;
}

.menu-section .nav > li > a:hover,.menu-section .nav > li > a:focus {
   color: #FCAC45 !important;
    background-color: transparent;
    font-weight: 700;
}


.menu-section .dropdown-menu > ol > a:hover,.menu-section .dropdown-menu > ol > a:focus {
      color: #FCAC45 !important;
    background-color: transparent;
    font-weight: 700;
}
.home{
    background: url(../../img/bg.png);
    background-size: 30%;
    background-attachment: fixed;
    background-repeat: repeat;
    color: #cfcfcf;

}

.navbar-inverse {
      background: -moz-linear-gradient(top,  rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.73) 17%, rgba(0,0,0,0.66) 35%, rgba(0,0,0,0.55) 62%, rgba(0,0,0,0.4) 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0.8)), color-stop(17%,rgba(0,0,0,0.73)), color-stop(35%,rgba(0,0,0,0.66)), color-stop(62%,rgba(0,0,0,0.55)), color-stop(100%,rgba(0,0,0,0.4))); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top,  rgba(0,0,0,0.8) 0%,rgba(0,0,0,0.73) 17%,rgba(0,0,0,0.66) 35%,rgba(0,0,0,0.55) 62%,rgba(0,0,0,0.4) 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top,  rgba(0,0,0,0.8) 0%,rgba(0,0,0,0.73) 17%,rgba(0,0,0,0.66) 35%,rgba(0,0,0,0.55) 62%,rgba(0,0,0,0.4) 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top,  rgba(0,0,0,0.8) 0%,rgba(0,0,0,0.73) 17%,rgba(0,0,0,0.66) 35%,rgba(0,0,0,0.55) 62%,rgba(0,0,0,0.4) 100%); /* IE10+ */
    background: linear-gradient(to bottom,  rgba(0,0,0,0.8) 0%,rgba(0,0,0,0.73) 17%,rgba(0,0,0,0.66) 35%,rgba(0,0,0,0.55) 62%,rgba(0,0,0,0.4) 100%); /* W3C */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cc000000', endColorstr='#66000000',GradientType=0 ); /* IE6-9 */
    height: 130px;
    border-color: transparent;

}

.navbar-toggle {
    background-color: #F0677C;
    border: 1px solid #fff;
}

.navbar {
    margin-bottom: 0px;

}

#head{

     color: #FCAC45  ;
}


/* =============================================================
   FOOTER SECTION STYLES
 ============================================================ */
footer {
    padding: 10px;
    color: #000;
    font-size: 12px;
    background-color: #FCAC45 ;

}

    footer a, footer a:hover {
        color: #000;
        text-decoration: none;
    }



/* =============================================================
  INPUT SECTION STYLES
 ============================================================ */
label {
    float: left;
    font-size: 12px;
    font-weight: 400;
    font-family: 'Open Sans', sans-serif;
}
 #contact .form-control {
    display: block;
    width: 100%;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 0px;
    -webkit-box-shadow: none;
    box-shadow: none;
    -webkit-transition: none;
    -o-transition: none;
    transition: none;
}

 #contact .form-control:focus {
    border-color: inherit;
    outline: 0;
    -webkit-box-shadow: transparent;
    box-shadow: transparent;
}

button.btn.tf-btn.btn-default {
    float: right;
    background: #FCAC45;
    border: 0;
    border-radius: 0;
    padding: 10px 40px;
    color: #ffffff;
    text-transform: uppercase;
}

.btn:active, .btn.active {
    background-image: none;
    outline: 0;
    -webkit-box-shadow: none;
    box-shadow: none;
}

.btn:focus, 
.btn:active:focus, 
.btn.active:focus, 
.btn.focus, 
.btn:active.focus, 
.btn.active.focus {
    outline: thin dotted;
    outline: none;
    outline-offset: none;
}

/* SOCIAL BUTTONS */
.btn-social {
    color: white;
    opacity: 0.8;
}

    .btn-social:hover {
        color: white;
        opacity: 1;
        text-decoration: none;
    }

.btn-facebook {
    background-color: #3b5998;
}

.btn-twitter {
    background-color: #00aced;
}

.btn-linkedin {
    background-color: #0e76a8;
}

.btn-google {
    background-color: #c32f10;

}


</style>
<script type="text/javascript">

function register(){
    
    var x = new Array();
    x[0] = document.getElementById('username').value;
    x[1] = document.getElementById('password').value;



    var h = new Array();
    h[0] = "<span style='color:red'>Please type your username!</span>";
    h[1] = "<span style='color:red'>Please type your password!</span>";
  


    var divs = new Array("uname", "pname"); 
    
        
        for(i in x){
        
            var error = h[i];
            var div = divs[i];
            
            if(x[i]==""){
                document.getElementById(div).innerHTML = error;
                return false;
               
            }else{
                document.getElementById(div).innerHTML = "";
                
            }
            
        }

        
    }
    
    



</script>



</head>

<body>
      <!-- HEADER END-->
    <div class="home">
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
             
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar">Student</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id="head" class="navbar-brand" href="../../index.html">MARIA KATRINA SCHOOL</a>

         
              

            </div>
        </div>
    </div>
</div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                           
                            <li><a>ADMIN'S PORTAL </a></li>
                           
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

<!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div id="page-inner">

            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Admin</h4>

                </div>

            </div>


    
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   As an admin user you can create employees and students account in Maria Katrina School Information Management System. Here is quick tutorial on      
                        <a href="http://www.designbootstrap.com/" target="_blank">admitting a student</a> and <a href="http://www.designbootstrap.com/" target="_blank">adding employee</a> . For more security you can enable password change in the general settings. For more help check the various links and tuturials given.
                  
                    </div>
                </div>


            </div>
            <div class="row">
                
                
                <div class="col-md-6">
                    <br><br> <br><br>
                    <div class="section-title center">
                        <h2>Feel free to <strong> Create Accounts:</strong></h2>
                       
                        <div class="clearfix"></div>
                        <center>
                      <h1 class="fa fa-user" style="font-size:12em;color:#55518a"></h1>
                      <h2 style="margin-top: 0;color:#55518a">Admin</h2>

                    </center>                
                    </div>
                </div>

                
                <div class="col-md-6">

                   <h4> Login with facebook <strong> / </strong>Google :</h4>
                    <br />
                    <a href="index.html" class="btn btn-social btn-facebook">
                            <i class="fa fa-facebook"></i>&nbsp; Facebook Account</a>
                    &nbsp;OR&nbsp;
                    <a href="index.html" class="btn btn-social btn-google">
                            <i class="fa fa-google-plus"></i>&nbsp; Google Account</a>
                    <hr />
                     <h4> Or Login with <strong>your Account :</strong></h4>
                    <br />
                    <div id="contact" class="text-center">
                    <form role="form-signin" action="admin.php" onsubmit="return register()" autocomplete="on" method="post">
                     <div class="col-sm-12 col-sm-offset-0">

                     <div class="row form-group">
                            <div class="col-md-9">
                             
                                    <label for="username">Username</label>
                                    <input id="username" name="username"  type="text"  maxlength="15" placeholder="Your username here.." value="" class="form-control"><div id="uname"></div>
                               
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-9">
                              
                                    <label for="password">Password</label>
                                    <input id="password" name="password"  maxlength="15" type="password" placeholder="Your password here.." value="" class="form-control"><div id="pname"></div>
                                
 
                            </div>
                     </div>

                     <div class="row form-group">
                            <div class="col-md-9">
                                    <label for="remember">Remember me?</label>
                                    <input type="checkbox" name="remember">
                            </div>
                        </div>
   

                        <div class="row form-group">    
                        <div class="col-md-9">
                        <button type="submit" name="login" value="Login" class="btn tf-btn btn-default"  >Submit</button>
                      
                    </div></div>

                           </form>
                </div>
              </div>
            </div>
        </div>
        </div>
   </div>
</div>


     





    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                     &copy; 2015 Maria Katrina School:Student Information Management System | By : <a href="" target="_blank">MKS TEAM</a>
                </div>

              <div class="col-md-4">
                    <strong>Email: </strong>gummybites@gmail.com
                    &nbsp;&nbsp;
                    <strong>Support: </strong>+90-561-477-21
                </div>

         
                    <?php
                    $date= date('F d,Y, g:i:s a');
                    echo $date;

                     ?>
          

            </div>

            </div>
        </div>
    </footer>

    <script src="../../js/jquery.1.11.1.js"></script>
    <script src="../../js/bootstrap.js"></script>
</body>
</html>
<?php }?>