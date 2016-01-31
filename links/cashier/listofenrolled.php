<?php session_start();
include('config.php');

if(!isset($_SESSION['username'])){
header('Location: cashierlogin.php');
exit;



}else{



  ?>







<!DOCTYPE html>
<html>
<title>
Registrar
</title>
<link rel="stylesheet" href="../../css/bootstrap.min.css"></link>
<link rel="stylesheet" href="../../css/style.css"></link>
<script src="../../js/jquery.1.11.1.js"></script>
                    <script src="../../js/bootstrap.js"></script>
                    <script src="../../js/dropdown.js"></script>
                    <script src="../../js/bootstrap.min.js"></script>
<head>
<style>
hr {
  height: 4px;
  margin-left: 15px;
  margin-bottom:-3px;
}
.hr-warning{
  background-image: -webkit-linear-gradient(left, rgba(210,105,30,.8), rgba(210,105,30,.6), rgba(0,0,0,0));
}
.breadcrumb {
  background: rgba(245, 245, 245, 0); 
  border: 0px solid rgba(245, 245, 245, 1); 
  border-radius: 25px; 
  display: block;
}

.btn-bread{
    margin-top:10px;
    font-size: 12px;
    
    border-radius: 3px;
}

</style>


</head>
<body>




<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
      MENU
      </button>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
        Cashier
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
      
      <ul class="nav navbar-nav navbar-right">
      
        <li class="dropdown ">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            Settings
            <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li class="dropdown-header">SETTINGS</li>
              <li class=""><a href="#">Manage user</a></li>
              <li class="divider"></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>    


  <div class="container-fluid main-container">
      <div class="col-md-2 sidebar">
        <div class="row">
  <!-- uncomment code for absolute positioning tweek see top comment in css -->
  <div class="absolute-wrapper"> </div>
  <!-- Menu -->
  <div class="side-menu">
    <nav class="navbar navbar-default" role="navigation">
      <!-- Main Menu -->
      <div class="side-menu-container">
        <ul class="nav navbar-nav">
          
          <li><a href="cashier.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
          <!-- Dropdown-->
          <li  id="dropdown">
            <a data-toggle="collapse" href="#dropdown-lvl1">
              <span class="glyphicon glyphicon-user"></span> Student <span class="caret"></span>
            </a>

            <!-- Dropdown level 1 -->
            <div id="dropdown-lvl1" class="panel-collapse collapse">
              <div class="panel-body">
                <ul class="nav navbar-nav">
                  <li><a href="listofprospective.php">Prospective</a></li>
                  <li ><a href="listofenrolled.php" class="active">Enrolled</a></li>
  


                  
                </ul>
              </div>
            </div>
          </li>
          


          

 

        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>

  </div>
</div> </div>
      <div class="col-md-10 content">
    
          


                                 
                                    <hr class="hr-warning" />
                                   <ol class="breadcrumb bread-warning">
                                     <li class='active'>Enrolled Students</li>
                                    </ol>

                                    <div class="text-center"><b>MARIA KATRINA SCHOOL</b>
                                <p>No. 10 Mendoza St. Saog, Marilao, Bulacan</p>
                 

                              </div>

                               <?php echo "<div class='demo_jui'>
                        <table cellpadding='0' cellspacing='1' border='1' class='display' id='tbl' class='jtable'>
                        <thead>

                                          <tr><th bgcolor='#FCAC45'><center>Username</center></th>
                                              <th bgcolor='#FCAC45'><center>Firstname</center></th>
                                              <th bgcolor='#FCAC45'><center>Middlename</center></th>
                                              <th bgcolor='#FCAC45'><center>Lastname</center></th>

                                              </thead>";
                                          
                                        
                             
                      include('config.php');

                      $qry="SELECT * from tbl_prospectivestudents where prospectivestatus='enrolled'";
                      $result=mysql_query($qry);



             
                      while($qry = mysql_fetch_array($result)) {
                          $username= $qry['username'];
                          $Fname = $qry['firstname'];
                          $Mname = $qry['middlename'];
                          $Sname = $qry['surname'];
                          echo "<tr><td><a href='enrolledstudent.php?username=$username'>$username</a></td><td>$Fname</td><td>$Mname</td><td>$Sname</td></tr>";

                      }
                      echo "<table></div>";
                        ?>




      
      </div>
</div>

 <div class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
      <p class="navbar-text pull-left">
           Copyright &COPY; 2015 <a href="">MKS</a>
      </p>
      

    </div>
  </div>
      


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


</body>
</html>


<?php }?>
