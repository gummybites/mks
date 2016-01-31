<?php session_start();
include('config.php');

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
$user = $qry['username'];


}
  ?>




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
.hr-warning{
	 height: 4px;
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

#footer{
	margin-top: 380px;

}

p::first-letter {
   
 
}
</style>


</head>
<body>




<nav id="menu" class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				Administrator
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
							<li class=""><a href="manageuser.php">Manage user</a></li>
							<li class="divider"></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>  	


	<div class="container-fluid main-container">
  		<div class="col-md-2  sidebar col-xs-2 col-offset-1">
  			<div class="row">
	<!-- uncomment code for absolute positioning tweek see top comment in css -->
	<div class="absolute-wrapper"> </div>
	<!-- Menu -->
	<div class="side-menu">
		<nav class="navbar navbar-default" role="navigation">
			<!-- Main Menu -->
			<div class="side-menu-container">
				<ul class="nav navbar-nav">
					
					<li class="active"><a href="registrar.php"><span class="glyphicon glyphicon-"></span> Home</a></li>
					<!-- Dropdown-->
					<li  id="dropdown">
						<a data-toggle="collapse" href="#dropdown-lvl1">
							<span class="glyphicon glyphicon-"></span> Inquiry <span class="caret"></span>
						</a>

						<!-- Dropdown level 1 -->
						<div id="dropdown-lvl1" class="panel-collapse collapse">
							<div class="panel-body">
								<ul class="nav navbar-nav">
									<li><a href="tuition.php"><span class="glyphicon glyphicon-"></span> Tuition</a></li>
									<li><a href="#"><span class="glyphicon glyphicon-"></span> Permit</a></li>
									<li><a href="requirements1.php">Requirements</a></li>
									


									
								</ul>
							</div>
						</div>
					</li>

					<li  id="dropdown">
			            <a data-toggle="collapse" href="#dropdown-lvl2">
			              <span class="glyphicon glyphicon-"></span> STUDENTS <span class="caret"></span>
			            </a>

			            <!-- Dropdown level 1 -->
			            <div id="dropdown-lvl2" class="panel-collapse collapse">
			              <div class="panel-body">
			                <ul class="nav navbar-nav">
			                  <li><a href="prospectivestudents.php"><span class="glyphicon glyphicon-"></span> Create Account</a></li>
			                  <li><a href="newstudentdetails.php"><span class="glyphicon glyphicon-"></span> Student Admission</a></li>			                  
			                </ul>
			              </div>
			            </div>


			             <a data-toggle="collapse" href="#dropdown-lvl3">
			              <span class="glyphicon glyphicon-"></span> TEACHERS <span class="caret"></span>
			            </a>

			            <!-- Dropdown level 1 -->
			            <div id="dropdown-lvl3" class="panel-collapse collapse">
			              <div class="panel-body">
			                <ul class="nav navbar-nav">
			                  <li><a href="prospectivestudents.php"><span class="glyphicon glyphicon-"></span> Create Account</a></li>
			                  <li><a href="prospectivestudents.php"><span class="glyphicon glyphicon-"></span> Teacher Admission</a></li>
			                  <li><a href="prospectivestudents.php"><span class="glyphicon glyphicon-"></span> Teacher Details</a></li>			                  
			                </ul>
			              </div>
			            </div>
			          </li>
					


					

					<li><a href="subjects.php"><span class="glyphicon glyphicon-"></span> Subjects</a></li>
		

				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>

	</div>
</div> </div>
  		<div class="col-md-10 content col-xs-10 col-offset-1">
  	
				  			  
  									<p class="hr-warning"></p>
					                <ol class="breadcrumb bread-warning">
					                </ol>

									<div class='text-center'>
                                   <h1 class="glyphicon glyphicon-user" style="font-size:10em;color:#55518a"></h1>
                                   <p>Welcome,</p><p><?php echo $user; ?>!</p>
                                   
                                  </div>


  								
  		</div>
</div>

								
	  	


</body>
</html>
    <?php }?>