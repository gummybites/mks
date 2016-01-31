<?php 
include('config.php');

if(isset($_POST['login'])) // net tignan mo pangalan nung nasa loob ng [''] yun din pangalan ng submit button
{
$username = $_POST['admission_number'];
$password = $_POST['middle_name'];
$qry ="SELECT * from tbl_enrolledstudents where admission_number = '$username' and middle_name = '$password'";
$result = mysql_query($qry);
if(mysql_num_rows($result) > 0) // checheck natin kung existing ba yung ROW nya sa tbl_students 
{
session_start();
$_SESSION['admission_number']=$username;
$_SESSION['middle_name'] = $password;


header('location:onlineviewingofgrades.php');
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
    <title>Student Portal</title>
   
    <link href="../../css/bootstrap.css" rel="stylesheet" />
    <link href="../../fonts/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../../css/studentpagestyle/style.css" rel="stylesheet" />
     
    <script src="../../js/jquery-1.11.1.js"></script>
    <script src="../../js/bootstrap.js"></script>

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

    <script type="text/javascript">

function register(){
    
    var x = new Array();
    x[0] = document.getElementById('admission_number').value;
    x[1] = document.getElementById('middle_name').value;



    var h = new Array();
    h[0] = "<span style='color:red'>Please type your student number!</span>";
    h[1] = "<span style='color:red'>Please type your middle name!</span>";
  


    var divs = new Array("admission_num", "middle"); 
    
        
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
                <a id="head" class="navbar-brand" href="../../index.html">MARIA KATRINA LOGO</a>

         
              

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
                           
                            <li><a>MARIA KATRINA SCHOOL- STUDENT PORTAL </a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
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
             <h2>Student <strong> Login</strong></h2>
            <div id="contact" class="text-center">

                    <form onsubmit="return register()" class="form-signin" action="student.php" method="POST">
                      <div class="col-sm-9 col-sm-offset-0">   


                        <div class="row form-group">
                            <div class="col-md-6">
                               
                                    <label for="admission_number">Student Number</label>
                                    <input id="admission_number" name="admission_number" maxlength="15" type="text" placeholder="Your student number here.." value="" class="form-control"><div id="admission_num"></div>
                               Format: 1182015XXXX 
                            </div>
                              </div>


                        <div class="row form-group"> 
                            <div class="col-md-6">
                               
                                    <label for="middle_name">Middle Name</label>
                                    <input id="middle_name" name="middle_name"  type="password" maxlength="15" placeholder="Your middle name here.." value="" class="form-control"><div id="middle"></div>
                                
                            </div>
                        </div>
                      
                    
                    <div class="row form-group">
                    <div class="col-md-6">
                        <button type="submit" name="login" value="Login" class="btn tf-btn btn-default">Submit</button>
                         </div>
                    </div>
                    </form>
                    </div>
                    <div class="col-md-12">
                    <hr>
                        <small><em>Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet..</em></small>            
                    </div>
             </div>
    </div>
</div>











    <!-- CONTENT-WRAPPER SECTION END-->
</div>
<div class="row">
     <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                     &copy; 2015 Maria Katrina School:Student Information Management System | By : <a href="" target="_blank">MKS TEAM</a>
                </div>

              <div class="col-md-6">
                    <strong>Email: </strong>gummybites@gmail.com
                    &nbsp;&nbsp;
                    <strong>Support: </strong>+90-561-477-21
                </div>

            </div>

            </div>
        
    </footer><!--Footer End --></div>

</body>
</html>
