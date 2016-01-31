
<?php 
session_start(); include('session.php');
include('config.php');
$_SESSION['id']; 


$type = $_SESSION['id'];
$qry ="SELECT * FROM tbl_employees WHERE id = '$type' ";
$result = mysql_query($qry);
while($qry = mysql_fetch_array($result))
{
$user = $qry['employee_id'];
$pass = $qry['access_code'];
$firstname = $qry['firstname'];
}

?>

<html>
            <head>
                <title>Employee's Portal</title>
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
                              <li><a data-toggle="tab" href="#Grades">Grades</a></li>
                               <li><a data-toggle="dropdown">Setting&nbsp<span class="caret"></span></a>
                                              <ul id="dropdown" class="dropdown-menu">
                                               <ol><a href="teacheraccount.php"><?php echo $firstname; ?></a></ol>
                                                <ol class="divider"></ol>
                                               <ol><a href="logout.php">Logout</a></ol>

                                              </ul>
                                           </li>
                         
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
            <div  class="text-center">
                  <div id="page-inner"><!--page-inner Start -->
                    <div class="tab-content">
                    <div id="welcometeacher" class="tab-pane fade in active">
              
                      <h1 class="fa fa-user" style="font-size:12em;color:#55518a"></h1>
                      <h2 style="margin-top: 0;color:#55518a">Hi! Teacher <?php echo $firstname; ?>!</h2>
 
                         For more security you can enable password change in the general settings.
                  </div>
                  
                  <div id="Grades" class="tab-pane fade"> 
                      asdsad
                  </div>

                  </div>
                  </div>
            </div>
                    </div>
                </div><!-- end of tab content-->
            </div>
        

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