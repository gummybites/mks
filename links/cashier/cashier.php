<?php session_start();
include('config.php');

$_SESSION['username']; 
$user = $_SESSION['username'];
$qry ="SELECT * from tbl_registrar WHERE username = '$user' ";
$result = mysql_query($qry);
while($qry = mysql_fetch_array($result))
{
$user = $qry['username'];


}


if(!isset($_SESSION['username'])){
header('Location: cashierlogin.php');
exit;



}else{



  ?>







<!DOCTYPE html>
<html>
<title>
Cashier
</title>
<link rel="stylesheet" href="../../css/bootstrap.min.css"></link>
<link rel="stylesheet" href="../../css/style.css"></link>
<script src="../../js/jquery.1.11.1.js"></script>
                    <script src="../../js/bootstrap.js"></script>
                    <script src="../../js/dropdown.js"></script>
                    <script src="../../js/bootstrap.min.js"></script>
<head>
<style>
.hr-warning{
   height: 4px;
  background-image: -webkit-linear-gradient(left, rgba(210,105,30,.8), rgba(210,105,30,.6), rgba(0,0,0,0));
}
.breadcrumb {
  background: rgba(245, 245, 245, 0); 
  border: 0px solid rgba(245, 245, 245, 1); 
  border-radius: 25px; 
  float: right;
}

.btn-bread{
    margin-top:10px;
    font-size: 12px;
    
    border-radius: 3px;
}

</style>


</head>
<body>




<nav id='menu' class="navbar navbar-default navbar-static-top">
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
          
          <li class="active"><a href="cashier.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>

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
                  <li><a href="listofenrolled.php">Enrolled</a></li>
  


                  
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
    
                                  <p class="hr-warning" ></p>
                                   <ol class="breadcrumb bread-warning">

                                    </ol>


                                  <CENTER>
                                   <h1 class="glyphicon glyphicon-user" style="font-size:10em;color:#55518a"></h1>
                                   <h2 style="color:#55518a">Welcome,<?php echo $user; ?>! </h2>
                                   
                                  </CENTER>


                               
      </div>
</div>


     


</body>
</html>
 <?php }?>


