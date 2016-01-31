
<?php 
session_start();
if(!isset($_SESSION['id'])){
header('Location: admin.php');
exit;

}else{
include('config.php');
$_SESSION['id']; 


$type = $_SESSION['id'];
$qry ="SELECT * from tbl_admin WHERE id = '$type' ";
$result = mysql_query($qry);
while($qry = mysql_fetch_array($result))
{
$user = $qry['username'];
$pass = $qry['password'];

}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    
                <title>Welcome Admin </title>
                <link rel="stylesheet" href="../../css/bootstrap.min.css"></link>
                <link href="../../css/bootstrap.css" rel="stylesheet" />
                <link href="../../fonts/font-awesome/css/font-awesome.css" rel="stylesheet" />
                 <script src="../../js/jquery.min.js"></script>                        
                <script src="../../js/bootstrap.min.js"></script>  

  
            </head>
            <style>
               #menu-top li>a{
                color: #fff;
                 background-color: transparent;

            }

            #menu-top #dropdown a{
                color: #000;


            }
         

            .menu-section ul .menu-section li{
                    list-style-type: none;
                  
            }

            .menu-section li{
                list-style-type: none;
                float: left;
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

            
            /* =============================================================
               HEADER SECTION STYLES
             ============================================================ */
            header {
                background-color: #F0677C;
                color: #fff;
                padding: 10px;
                text-align: right;
            }

            /* MENU LINKS SECTION*/

            .menu-section {
                background-color: #202020 !important;
            }

            #menu-top a {
                color: #FFF;
                text-decoration: none;
                font-weight: 500;
                padding: 10px 10px 10px 10px;
                text-transform: uppercase;
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

             #wrapper {
                  width: 100%;
                  background:#202020;
              }

              #page-wrapper {
                  padding: 15px 15px;
                  min-height: 600px;
                  background:#F3F3F3;
                 
              }
              #page-inner {
                  width:100%;
                  margin:10px 20px 10px 0px;
                  background-color: #fff!important;
                  padding:10px;
                  min-height:400px;



              }


              /*==============================================
                  MENU STYLES    
                  =============================================*/




              .active-menu {
                  background-color:#F3F3F3!important;
                  
              }

              .sidebar-collapse .nav > li > a {
                color:#FCAC45;

                text-shadow:none;
                
              }

              .sidebar-collapse > .nav > li {
                border-bottom: 0px solid rgba(107, 108, 109, 0.19);
              }
              .sidebar-collapse .nav > li > a:hover {
                
                background:#fff;
                outline:0;
              }


              .navbar-side {
                border:none;
                background-color: #202020;
                
              }

              .nav > li > a > i {
                  margin-right:10px;
              }

              /*==============================================
                  MEDIA QUERIES     
                  =============================================*/
               
               @media(min-width:768px) {
                   #page-wrapper{
                             margin: 0 0 0 260px;
                      padding: 15px 30px;
                      min-height: 1200px;
                  
                  }
                
                
                  .navbar-side {
                      z-index: 1;
                      position: absolute;
                      width: 260px;
                  }

                 .navbar {
               border-radius: 0px; 
              }
                 
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

             #back:hover, #back:active, #back:focus{
              text-decoration: none;
              color:#FCAC45;
             }

            
        
            </style>
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
                                            
                                            <li><a href="logout.php">Logout</a>
                                           </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


            <div id="wrapper">
                <nav class="navbar-default navbar-side" role="navigation">
                    <div class="sidebar-collapse">
                        <ul class="nav" id="main-menu">
                            <li>
                                <a  class="active-menu" ><i class="fa fa-home fa-3x"></i> Home</a>
                            </li>
                              <li>
                                <a ><i class="fa fa-user fa-3x"></i> Prospective Students</a>
                            </li>
                            <li>
                                <a   href="studentaccountdatabase.php"><i class="fa fa-user fa-3x"></i> Enrolled Students</a>
                            </li>
                            <li>
                                <a  href="employeeaccountdatabase.php"><i class="fa fa-trash fa-3x"></i> Employees</a>
                            </li> 
                            <li>
                              <a href="adminsettings.php"><i class="fa fa-tasks fa-3x"></i>Admin Profile</a>
                            </li>
                        </ul>
                    </div>
                    
              </nav>

                  
                  <div id="page-wrapper" >
                    <div id="page-inner">
                         <div id="welcomeadmin" class="tab-pane fade in active"><!-- Div for welcomeadmin-->
                             

                                  <CENTER>
                                   <h1 class="fa fa-user" style="font-size:14em;color:#55518a"></h1>
                                   <h2 style="margin-top: 0;color:#55518a">Welcome,<?php echo $user; ?> </h2>
                                   <h3 style="margin-top: 0;color:#55518a"> You can now create employees and students account.</h3>
                                  </CENTER>
                            
                          </div><!--End for div welcomeadmin -->
                
                  
                          
                   

                    </div><!-- /. PAGE INNER  -->
                </div>
          </div><!-- /. PAGE WRAPPER  -->

        <!--Footer start -->

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
            </footer><!--Footer End -->

  <script src="../../js/jquery.1.11.1.js"></script>
    <script src="../../js/bootstrap.js"></script>
 <script src="../../js/dropdown.js"></script>  


</body>
</html>
<?php }?>