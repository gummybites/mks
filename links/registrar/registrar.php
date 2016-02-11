<?php session_start();
include('../config.php');

if(!isset($_SESSION['id'])){
header('Location: registrarlogin.php');
exit;



}else{


$_SESSION['id']; 
$type = $_SESSION['id'];
$qry ="SELECT * from tbl_registrar WHERE id = '$type' ";
$result = mysql_query($qry);
while($qry = mysql_fetch_array($result))
{
$db_id=$qry['id'];
$db_username = $qry['username'];
$db_password=$qry['password'];

}
  ?>




<!DOCTYPE html>
<html>
<head>

                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Registrar</title>
                    <link rel="stylesheet" href="../../css/bootstrap.min.css"></link>
                    <link rel="stylesheet" href="../../css/bootstrap.css"></link>
                    <link rel="stylesheet" href="../../css/style.css"></link>
                    <link rel="stylesheet" href="../../css/font-awesome.css"></link>
                     <link rel="stylesheet" href="../../css/font-awesome.min.css"></link>

                    <script src="../../js/dropdown.js"></script>
                    <script src="../../js/bootstrap.min.js"></script>
                    <script src="../../js/jquery.1.11.1.js"></script>
                    <script src="../../js/bootstrap.js"></script>
                    <script src="../../js/validation.js"></script>
<head>
<style>
					body{

                   background: url(../../images/body-bg.png); color:#838383; font: 13px/1.7em 'Calibri';
                    }
</style>


</head>
<body>




 <nav class="navbar-inner navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    
      <a class="navbar-brand" href="#">MKS</a>
    </div>

     <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    
     
      <ul class="nav navbar-nav navbar-right">
         <li> <a href="logout.php?logout=<?php echo $db_id ?>"><?php echo $db_username?>, <i class="glyphicon glyphicon-log-out"> </i> Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class="active"><a href="registrar.php"><i class="fa fa-dashboard"></i><span>Home</span> </a> </li>
        <li><a href="reports.html"><i class="fa fa-plus"></i><span>Create acount</span> </a> </li>
        <li><a href="guidely.html"><i class="fa fa-code"></i><span>Admission</span> </a></li>
        <li><a href="charts.html"><i class="fa fa-bar-chart"></i><span>Inquiry</span> </a> </li>
        <li><a href="shortcodes.html"><i class="fa fa-th-list"></i><span>Course & Subjects</span> </a> </li>
        <li><a href="form.php"><i class="fa fa-file"></i><span>Form</span> </a> </li>
        <li><a href="event.php"><i class="fa fa-calendar"></i><span>Event & Annoucement</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-long-arrow-down"></i><span>Manage User</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="manageuser.php">Profile</a></li>
            <li><a href="faq.html">Accounts</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>



	
	  	


</body>
</html>
    <?php }?>