<?php session_start();
       include('session.php');
include('config.php');
$_SESSION['id']; 

$type = $_SESSION['id'];
$qry ="SELECT * from tbl_employees WHERE id = '$type' ";
$result = mysql_query($qry);
while($qry = mysql_fetch_array($result))
{
$employee_id = $qry['employee_id'];
$access_code = $qry['access_code'];

}

if(isset($_POST['ok'])){

$newpassword = $_POST['access'];

if($newpassword){
         

$qry ="UPDATE tbl_employees SET  access_code='$newpassword' WHERE id = '$type' ";
$result = mysql_query($qry);
            
            
            echo "<script>alert('Success!')</script>";
           header("Refresh:1; url=teacheraccount.php");
            exit;
           
}else{

echo "Please complete the form!";
}
}
?>








<!DOCTYPE html>
<html >
<head>
                <title>Teacher Account</title>
                <link href="../../fonts/font-awesome/css/font-awesome.css" rel="stylesheet" />                 
                 <link rel="stylesheet" href="../../css/bootstrap.min.css"></link> 
                      <link href="../../css/teacherpagestyle/style.css" rel="stylesheet" />

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

             /* =============================================================
            INPUT SECTION STYLES
             ============================================================ */
               #container{
                font-family: Arial,  Verdana, Helvetica, sans-serif;
                font-size: 10px;
            }

            #customForm label{
               float: left;
                display: block;
                color: #797979;
                 font-size: 10px;
            }
            #customForm input{
                width: 220px;
                color: #949494;
                font-family: Arial,  Verdana, Helvetica, sans-serif;
                font-size: 10px;
                border: 1px solid #000;
                 display: block;
            }


            #customForm div{
                margin-bottom: 10px;
            }
            #customForm div span{
                margin-left: 10px;
                color: #b1b1b1;
                font-size: 10px;
                font-style: italic;
            }

            button,#sure,#send{
              text-decoration: none;
              font-family: Arial,  Verdana, Helvetica, sans-serif;
              font-size: 10px;
              border:none;
              background-color: transparent;
              float: right;
              color:black;
              background-image: none;
              outline: 0;
              -webkit-box-shadow: none;
              box-shadow: none;
            }

            </style>
          
            <body>
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
                            <li><a href="portal.php"><i class="fa fa-home"></i>&nbspHome&nbsp </a></li>
                               <li><a data-toggle="dropdown">Setting&nbsp<span class="caret"></span></a>
                                              <ul id="dropdown" class="dropdown-menu">
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
                      <h3><i>Settings: Altered password as:</i> <b><?php echo base64_decode($access_code); ?>?</b></h3>
            <div class="text-center">
                 <div id="page-inner"><!--page-inner Start -->
                

                    <form id="customForm" role="form-signin" action="teacherconfirmation.php" onsubmit="return register()" autocomplete="on" method="POST">
                     

                     <div class="container">
                      
                               
                                    <label for="username">Username: </label>
                                    <label id="username" name="username"    maxlength="15" value="" ><mark><?php  echo  $employee_id;?></mark></label>
                   
                      
                        </div>
                        <div class="container">
                       
                                
                                    <label for="password">Password: </label>
                                    <input id="password" name="access"  type="password"  maxlength="15" value="<?php   echo  $userName =$_REQUEST['access'];?>" >
                                <div id="pname"></div>
                          
                     </div>


                </div> <!--End for page-inner -->

                        <p id="sure">Are you sure you want to continue edit your account?
                        <a href="teacheraccount.php" id="send" value="back">CANCEL</a>
                        <button  id="send" type="submit" name="ok" value="ok"  >OK</button>
                
                  

                           </form>
               
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
        <script src="../../js/jquery.1.11.1.js"></script>
    <script src="../../js/bootstrap.js"></script>
            </body>
        </html>


