<?php 
include('config.php');

if(isset($_POST['login'])) 
{
    $employee_number = $_POST['employee_number'];
    $access_code =  $_POST['access_code'];
$qry = "SELECT * FROM tbl_employees WHERE employee_id = '$employee_number' AND access_code = '$access_code'";
$result = mysql_query($qry);
while($qry = mysql_fetch_array($result)){
    $ID = $qry['id'];
}

if(mysql_num_rows($result) > 0)
{
session_start();
$_SESSION['id']=$ID;
$_SESSION['access_code'] = $access_code;


     header("Location:portal.php");
     exit;
}
else 
{
    echo'<script>alert("INVALID USERNAME OR PASSWORD");</script>';
     
         
}
}

?>




<!DOCTYPE html>
<html>
            <head>
                <title> Teacher portal </title>
                <link rel="stylesheet" href="../../css/bootstrap.min.css"></link>
                <link href="../../css/bootstrap.css" rel="stylesheet" />
                <link href="../../fonts/font-awesome/css/font-awesome.css" rel="stylesheet" />
                 <link href="../../css/teacherpagestyle/style.css" rel="stylesheet" />
                <script src="../../js/jquery.min.js"></script>                        
                <script src="../../js/bootstrap.min.js"></script>   

                 <script type="text/javascript">

function register(){
    
    var x = new Array();
    x[0] = document.getElementById('employee_number').value;
    x[1] = document.getElementById('access_code').value;



    var h = new Array();
    h[0] = "<span style='color:red'>Please type your username!</span>";
    h[1] = "<span style='color:red'>Please type your password!</span>";
  


    var divs = new Array("employee", "access"); 
    
        
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
            <style>
            .menu-section ul .menu-section li{
                    list-style-type: none;
                  
            }
            .menu-section li{
                list-style-type: none;
                float: left;
            }
              /* Sidebar navigation */
            .nav-sidebar {
            
              margin-right: -15px;
              margin-bottom: 20px;
              margin-left: -15px;
            }
            #sidebar a{
            text-align: center;
              background-color: transparent;
              font-weight: 700;

            }

             #sidebar a:hover{
              color: #FCAC45 !important;

            }

            /*
             * Main content
             */

            .main {
              padding: 20px;
              background-color: #F5F5F5;
            }
            @media (min-width: 768px) {
              .main {
                padding-right: 40px;
                padding-left: 40px;
              }
            }
            .main .page-header {
              margin-top: 0;
            }
            </style>
            <body>
                <!-- HEADER END-->
<div class="row">
    <div class="home">
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
             
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar">Student</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id="head" class="navbar-brand" href=".././index.html">MARIA KATRINA LOGO</a>

         
              

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
                        <ul id="menu-top" class="nav nav-navbar pull-right">
                            <li><a >MARIA KATRINA SCHOOL- EMPLOYEE'S PORTAL</a></li>
                            
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <div class="col-md-3 sidebar-offcanvas" id="sidebar" role="navigation">
           
            <ul class="nav nav-sidebar">
              <li><p></p></li>
               <li><a href="#">MARIA KATRINA SCHOOL HOMEPAGE</a></li>
              <li><a href="#">MARIA KATRINA SCHOOL MAIL</a></li>
              <li><a href="#">MARIA KATRINA SCHOOL FANPAGE</a></li>
            </ul>
        </div>

         <div class="col-md-9 main" >
            <div class="content-wrapper">
                     <!--INPUT SECTION -->
                      <h2>Employee<strong> Login</strong></h2>
            <div id="contact" class="text-center">

                    <form onsubmit="return register()" class="form-signin" action="teacher.php" method="POST">
                      <div class="col-sm-9 col-sm-offset-0">    

                        <div class="row form-group">
                            <div class="col-md-6">
                                
                                    <label for="employee_number">Username:</label>
                                    <input id="employee_number" name="employee_number"  maxlength="15" type="text" placeholder="Your username number here.." value="" class="form-control"><div id="employee"></div>
                                Format: EMP0002015X
                            </div>
                            </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                               
                                    <label for="access_code">Password:</label>
                                    <input id="access_code" name="access_code" maxlength="15" type="password" placeholder="Your password here.." value="" class="form-control"><div id="access"></div>
                                
                            </div>
                        </div>
                        
                    
                    <div class="row form-group">
                    <div class="col-md-6">
                        <button type="submit" name="login" value="Login" class="btn tf-btn btn-default">Submit</button>
                    </div>
                    </div>
                    </div>
                
                    </form>
                    <div class="col-md-12">
                    <hr>
                        <small><em>Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet..</em></small>            
                    </div>

                  </div>
               
            </div>
         </div>
    </div><!-- end of tab content-->
     
        

 <!--Footer start -->
 <div class="row">
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
        
    </footer><!--Footer End --></div>
   
            </body>
        </html>