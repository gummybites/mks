<?php 
session_start(); 
if(!isset($_SESSION['id'])){
header('Location: admin.php');
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
<html >
<head>
                <title> Student database </title>
                <link rel="stylesheet" href="../../css/bootstrap.min.css"></link>
                <link href="../../css/bootstrap.css" rel="stylesheet" />
                <link href="../../fonts/font-awesome/css/font-awesome.css" rel="stylesheet" />
                 <link href="../../css/adminpagestyle/style.css" rel="stylesheet" />
                <script src="../../js/jquery.min.js"></script>                        
                <script src="../../js/bootstrap.min.js"></script>   
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
<!-- MENU SECTION END-->


<div id="wrapper">
                <nav class="navbar-default navbar-side" role="navigation">
                    <div class="sidebar-collapse">
                        <ul class="nav" id="main-menu">
                            <li>
                                <a  href="welcome.php" ><i class="fa fa-home fa-3x"></i> Home</a>
                            </li>
                              <li>
                                <a ><i class="fa fa-user fa-3x"></i> Prospective Students</a>
                            </li>
                            <li>
                                <a  class="active-menu"><i class="fa fa-user fa-3x"></i> Enrolled Students</a>
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
                          <!--View Student database -->
                                    <!--View Student database -->
                                    <!--View Student database -->
                                    <!--View Student database -->
                                    <!--View Student database -->
                         <?php echo "<div class='demo_jui'>
                              <table cellpadding='0' cellspacing='1' border='1' class='display' id='tbl' class='jtable'>
                              <thead>
                                          <tr><th bgcolor='#FCAC45'>ID</th>
                                              <th bgcolor='#FCAC45'>No.</th>
                                              <th bgcolor='#FCAC45'>Date</th>
                                              <th bgcolor='#FCAC45'>Fname</th>
                                              <th bgcolor='#FCAC45'>Mname</th>
                                              <th bgcolor='#FCAC45'>Lname</th>
                                              <th bgcolor='#FCAC45'>Guardian</th>
                                              <th bgcolor='#FCAC45'>Action</th></tr>

                                              </thead>";
                                          
                                        
                             
                            include('config.php');

                            $qry="SELECT * from tbl_enrolledstudents ";
                            $result=mysql_query($qry);



                        
                            while($qry = mysql_fetch_assoc($result)) {

                              $id=$qry['id'];
                              $admi=$qry['admission_number'];
                              $admidate=$qry['admission_date'];
                              $fname=$qry['first_name'];
                              $mname=$qry['middle_name'];
                              $lname=$qry['last_name'];
                              $gname=$qry['guardian'];

                     
                            echo "<tr><td>$id</td><td>$admi</td><td>$admidate</td><td>$fname</td><td>$mname</td><td>$lname</td><td>$gname</td> <td> <center> <a class='fancybox fancybox.ajax' href='addstudent.php?ppid=$id' onclick='return update()'> <i class='fa fa-edit'></i></a>&nbsp<a href='deletestudent.php?pid=$id' onclick='return bura()' ><i class='fa fa-trash'></i></a></center></td></tr>";
                            } 

                             echo "<table></div>";
                    ?>
                                      <!--vIEW STUDENT DATABASE END -->

                    </div><!-- /. PAGE INNER  -->
                </div>
          </div><!-- /. PAGE WRAPPER  -->
   


  

    



    <script src="../../js/jquery.1.11.1.js"></script>
    <script src="../../js/bootstrap.js"></script>


<!--Scripts for fancy box -->
<script type="text/javascript" src="../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../fancybox/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" src="../../fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
<link rel="stylesheet" type="text/css" href="../../fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />
<link rel="stylesheet" type="text/css" href="../../fancybox/jquery.fancybox-buttons.css?v=1.0.5" />
<script type="text/javascript" src="../../fancybox/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".fancybox").fancybox();
});
</script>   
    <style type="text/css" title="currentStyle">
           
            @import "../../css/demo_page.css";
            @import "../../css/demo_table_jui.css";
            
        </style>
<script src="../../js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf-8">
            jQuery(document).ready(function() {
                oTable = jQuery('#tbl').dataTable({
                    "bJQueryUI": true, 
                    "sPaginationType": "full_numbers"
                                } );

                });     
        </script>

        
        <script type="text/javascript" charset="utf-8">
            jQuery(document).ready(function() {
                oTable = jQuery('#tbl1').dataTable({
                    "bJQueryUI": true, 
                    "sPaginationType": "full_numbers"
                                } );

                });     
        </script>
        <script src="../../js/dropdown.js"></script>  
</body>
</html>
<?php }?>