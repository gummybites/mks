<?php 
session_start();
include('config.php');
$_SESSION['admission_number']; 

$type = $_SESSION['admission_number'];
$qry ="SELECT * from tbl_enrolledstudents where admission_number = '$type'";
$result = mysql_query($qry);
while($qry = mysql_fetch_array($result))
{
$fname = $qry['first_name'];
$mname = $qry['middle_name'];
$lname = $qry['last_name'];
$stud= $qry['admission_number'];
$sec= $qry['section'];
}

?>


    
<html>
            <head>
                <title> Online Viewing of Grades </title>
                <link rel="stylesheet" href="../../css/bootstrap.min.css"></link>
                <link href="../../css/bootstrap.css" rel="stylesheet" />
                <link href="../../fonts/font-awesome/css/font-awesome.css" rel="stylesheet" />
                 <link href="../../css/studentpagestyle/style.css" rel="stylesheet" />
                <script src="../../js/jquery.min.js"></script>                        
                <script src="../../js/bootstrap.min.js"></script>   
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
              background-color: #fff;
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
                <a id="head" class="navbar-brand" href=".././index.html">MARIA KATRINA SCHOOL</a>

         
              

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
                           
                           
                            <li><a data-toggle="tab" href="#Grades">Grades&nbsp |</a></li>
                            <li><a data-toggle="tab" href="#Attendance">Attendance&nbsp |</a></li>
                            <li><a data-toggle="tab" href="#ranking">Ranks&nbsp |</a></li>
                            <li><a href="logout.php">Logout</a></li>
                       
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
                    <div class="stdinfo">
                        <h4>Student Name: <?php echo $fname." ".$mname." ".$lname;?></h3>
                        <h4>Student Number: <?php echo $stud;?></h4>
                        <h4>Section: <?php echo $sec ?></h4>
                    </div>

                    <div class="tab-content">

                   
                </div><!-- end of tab content-->
            </div>
        </div>
 </div>

 <!--Footer start -->
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














