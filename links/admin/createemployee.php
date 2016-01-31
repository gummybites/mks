<?php 
session_start(); 
if(!isset($_SESSION['id'])){
header('Location:admin.php');
exit;


}else{
include('config.php');
$date = date('M j,Y');
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
<html>
<head>
                <title> Create Employee </title>
                 <link rel="stylesheet" href="../../css/bootstrap.min.css"></link>
                <link href="../../fonts/font-awesome/css/font-awesome.css" rel="stylesheet" />
                 <link href="../../css/adminpagestyle/style.css" rel="stylesheet" />


                <script type="text/javascript">

function register(){
    
    var x = new Array();
    x[0] = document.getElementById('firstname').value;
    x[1] = document.getElementById('middlename').value;
    x[2] = document.getElementById('lastname').value;



    var h = new Array();
    h[0] = "<span style='color:red'>Please type your firstname!</span>";
    h[1] = "<span style='color:red'>Please type your middlename!</span>";
    h[2] = "<span style='color:red'>Please type your lastname!</span>";
  


    var divs = new Array("firstnameInfo", "middleInfo", "lastnameInfo"); 
    
        
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
                display: block;
                color: #797979;
                 font-size: 10px;
            }
            #customForm input{
                width: 150px;
                padding: 1px;
                color: #949494;
                font-family: Arial,  Verdana, Helvetica, sans-serif;
                font-size: 10px;
                border: 1px solid #000;
            }

             #customForm button{

                width: 170px;
                padding: 6px;
                color: #FFF;
                font-family: Arial,  Verdana, Helvetica, sans-serif;
                font-size: 10px;
                border: 1px solid #FCAC45;
                background: #FCAC45;

            }
    
             #customForm button:hover{
                background: #FCAC45;
            }
           
     
           


            </style>
            <body>
 <div class="row">             
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
                            <li><a href="welcome.php"><i class="fa fa-home"></i>&nbspHome&nbsp </a></li>
                               <li><a data-toggle="dropdown">Setting&nbsp<span class="caret"></span></a>
                                              <ul id="dropdown" class="dropdown-menu">
                                               <ol><a href="adminsettings.php"><?php echo $user;?></a></ol>
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
<!-- MENU SECTION END-->
   

<!-- MENU SECTION END-->
     <div class="col-md-3 sidebar-offcanvas" id="sidebar" >
           
            <ul class="nav nav-sidebar">
              <li><p></p></li>
                            <li><a data-toggle="tab" href="#create" >Create Account&nbsp </a></li>
                            <li><a data-toggle="tab" href="#database">Database&nbsp </a></li>
            </ul>
        </div>

     <div class="col-md-9 main" >   
    <div id="page-inner">
    <div class="content-wrapper"><!--Content-wrapper Start -->
           
             
                          <!-- Creating Employee Account -->
                          <!-- Creating Employee Account -->
                          <!-- Creating Employee Account -->
                          <!-- Creating Employee Account -->
                          <!-- Creating Employee Account -->
                          <!-- Creating Employee Account -->
                          <!-- Creating Employee Account -->
                          <!-- Creating Employee Account -->
                          <!-- Creating Employee Account -->
                          <!-- Creating Employee Account -->
                          <!-- Creating Employee Account -->
                           <!-- Creating Employee Account -->

                                              
          
                        <div id="contact" class="text-center">
                        <form  onsubmit="return register()" id="customForm" role="form" action="createemployee.php"  method="post" onsubmit="return employeeFunction()" name="kenneth">
                          <div class="col-sm-9 col-sm-offset-1">   

                           <div class="row form-group"> 
                          <div class="col-md-6">
                          <?php include('config.php');
                           
                          $now = date('Y'); //eto yung YEAR natin NET
                          $qry = "select * from tbl_employees";
                          $result = mysql_query($qry);

                          if(mysql_num_rows($result) >= 0) // kapag may record na sa database mo chcheck natin yung may pinakamataas na ID number
                          {
                          $y= 'EMP000';
                          $x = 1; //declare ng variable
                          while($qry = mysql_fetch_array($result))
                          { //start ng loop
                          $x++; //hanggat may nakikitangrecord sa TBL_EMPLOYEES mo... mag iincrement si X
                          } // end ng loop

                          $employee_id = $y.$now.$x;

                          echo "<label>Autogenerated Employee ID: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                            
                                                 <mark>$employee_id</mark> </label>";
                          }
                          else
                          {
                          $x = 1;
                          echo 'Employee no.                    
                                               ' .  "$now$x" ;
                          }?>  </div>


                           <!-- For autogenerated access code-->
                            
                           <div class="col-md-6">
                          <?php include('config.php');
                           
                         
                          $qry = "select * from tbl_employees";
                          $result = mysql_query($qry);

                          if(mysql_num_rows($result) >= 0) // kapag may record na sa database mo chcheck natin yung may pinakamataas na ID number
                          {
                          $y= 'CNX';
                          $z = 01; 
                          $x = 'YZ'; //declare ng variable
                          while($qry = mysql_fetch_array($result))
                          { //start ng loop
                          $z++; //hanggat may nakikitangrecord sa TBL_EMPLOYEES mo... mag iincrement si X
                          } // end ng loop

                          $access_code = $y.$z.$x;

                          echo "<label>Autogenerated access code: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                            
                                                 <mark>$access_code</mark> </label>";
                          }
                          else
                          {
                          $z = 1;
                          echo 'Access code.                    
                                               ' .  "$y$z$x" ;
                          }?>  </div></div>

                          <div class="row form-group">
                          <div class="col-md-6">
                            <label>Joining date :* &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                              &nbsp&nbsp&nbsp&nbsp <mark><?php echo $date;?></mark></label> 
                          </div></div>
                                         
                  

                          <div class="row form-group">
                          <div class="col-md-6">
                            <label for="firstname">firstname</label>
                            <input id="firstname" name="firstname" type="text" maxlength="15" placeholder="firstname here.." value="" class="form-control"/>
                            <span id="firstnameInfo"></span>
                          </div>



                          
                          <div class="col-md-6">
                            <label for="middlename">middlename</label>
                            <input id="middlename" name="middlename" type="text" maxlength="15" placeholder="middlename here.." value="" class="form-control"/>
                            <span id="middleInfo"></span>
                          </div></div>                                 


                          <div class="row form-group">               
                          <div class="col-md-6">
                            <label for="lastname">lastname</label>
                            <input id="lastname" name="lastname" type="text" maxlength="15" placeholder="lastname here.." value="" class="form-control"/>
                            <span id="lastnameInfo"></span>
                          </div></div>

                         <div class="row form-group">
                          <div class="col-md-16">
                         <button id="send" type="submit" name="submit" >admit</button>
                        </div>
                            </div> 
                                 </div>                               
                        </form>
                                    </div>
                                         </div>
                                                </div>
                                                    </div>
                                                        </div>









                          

                           <?php 

                           if(!isset($_SESSION['id'])){
                            echo "Acces denied";

                                exit;

                         
                            }else{

                              include("config.php");

                          if(isset($_POST['submit']))
                          {
                            
                              $fname = $_POST ['firstname'];
                              $mname = $_POST ['middlename'];
                              $lastname = $_POST['lastname'];
                              



                          $qry=("INSERT into tbl_employees (employee_id,joining_date,access_code,firstname,middlename,lastname) VALUES ('$employee_id','$date','$access_code','$fname','$mname','$lastname')");
                          mysql_query($qry);
                          echo "<script>alert('Adding employee success!');</script>";


                          }      
                          }     
                          ?><!--Create employee form end-->


<div class="row">    
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
        
    </footer></div><!--Footer End -->


    <script src="../../js/jquery.1.11.1.js"></script>
    <script src="../../js/bootstrap.js"></script>




</body>
</html>
<?php }?>