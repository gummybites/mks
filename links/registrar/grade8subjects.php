
<?php 

include ('config.php');
session_start();

if(!isset($_SESSION['id'])){
header('Location: registrarlogin.php');
exit;



}else{

$qry=("Select * from tbl_subjects ");
$res= mysql_query($qry);

while($qry=mysql_fetch_array($res)){
	$y= $qry['yearlevel'];
	$s= $qry['subjects'];

}



?>

											<?php 
											if(isset($_POST['submit'])){
												$subjectss=$_POST['subject_update'];
												$yr=$_POST['year'];
												
													mysql_query("UPDATE tbl_subjects set  subjects= '$yr' where yearlevel='Grade 8' and  subjects= '$subjectss' ");
													header('Refresh:1; grade8subjects.php');

											}

											?>
<!DOCTYPE>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../../css/bootstrap.min.css"></link>
	<link rel="stylesheet" href="../../css/style.css"></link>
	<script src="../../js/jquery.1.11.1.js"></script>
                    <script src="../../js/bootstrap.js"></script>
                    <script src="../../js/dropdown.js"></script>
                    <script src="../../js/bootstrap.min.js"></script>
	
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
  		<div class="col-md-2 sidebar col-xs-2 col-offset-1">
  			<div class="row">
	<!-- uncomment code for absolute positioning tweek see top comment in css -->
	<div class="absolute-wrapper"> </div>
	<!-- Menu -->
	<div class="side-menu">
		<nav class="navbar navbar-default" role="navigation">
      <!-- Main Menu -->
      <div class="side-menu-container">
        <ul class="nav navbar-nav">
          
          <li ><a href="registrar.php"><span class="glyphicon glyphicon-"></span> Home</a></li>
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
                  <div id="dropdown-lvl2" class="panel-collapse collapse in">
                    <div class="panel-body">
                      <ul class="nav navbar-nav">
                        <li><a href="prospectivestudents.php"><span class="glyphicon glyphicon-"></span> Create Account</a></li>
                        <li ><a href="newstudentdetails.php"><span class="glyphicon glyphicon-"></span> Student Admission</a></li>                        
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
                        <li><a href="#"><span class="glyphicon glyphicon-"></span> Create Account</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-"></span> Teacher Admission</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-"></span> Teacher Details</a></li>                       
                      </ul>
                    </div>
                  </div>
                </li>
          


          

          <li class="active"><a><span class="glyphicon glyphicon-"></span> Subjects</a></li>
    

        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>

	</div>
</div></div>
  		<div class="col-md-10 content col-xs-10 col-offset-1">

  								<form method="POST">

								<hr class="hr-warning" />
								<ol class="breadcrumb bread-warning">
								<li><a href='subjects.php'>Grade 7 Subjects</a></li>
								<li>Grade 8 Subjects</li>
								<li><a href='grade9subjects.php'>Grade 9 Subjects</a></li>
								<li><a href='grade10subjects.php'>Grade 10 Subjects</a></li>

								</ol>


								<?php 
								if(isset($_GET['subject'])){
								
								}else{
								?>

								<div class='demo_jui'>
								                        <table cellpadding='0' cellspacing='1' border='1' class='display' id='tbl' class='jtable'>
								                        <thead>

                                          <tr>
                                          		<th bgcolor='#FCAC45'><center>Year Level</center></th>
                                              <th bgcolor='#FCAC45'><center>Course Code</center></th>
                                              <th bgcolor='#FCAC45'><center>Course Description</center></th>
                                              <th bgcolor='#FCAC45'><center>Action</center></th>
                                             
                                              </tr>

                                              </thead>
												<?php
												$limit=8;
										
												$qry=("SELECT * from tbl_subjects where yearlevel='Grade 8' and Extras='no' LIMIT $limit");
												$res= mysql_query($qry);

												while($qry=mysql_fetch_array($res)){

													$lev= $qry['yearlevel'];
													$code=$qry['subject_code'];
													$subj= $qry['subjects']; 

													echo "<tr><td>$lev</td> <td>$code</td> <td>$subj</td> <td><a id='edit' href='?subject=$subj' >Edit name</a></td></tr>";
												}
												?>

                                              </table>
                                              </div>
                                  			<?php }?>
											<?php 
											if(isset($_POST['submit'])){
												echo "<div class='alert alert-info'>";
												echo "Success!";
												echo "</div>";

											}elseif(isset($_GET['subject'])){

											$get_subject = $_GET['subject'];
											$qry = "select * from tbl_subjects where subjects='$get_subject'";
											$result = mysql_query($qry);
											echo "<form id='form' method='POST'>";
											      

											echo "<input type='hidden' name='subject_update' value='$get_subject'>";

											while($qry = mysql_fetch_array($result))
											{
											$lev= $qry['yearlevel'];
											$code=$qry['subject_code'];
											$subj= $qry['subjects']; 

											}
											echo "<div class='alert alert-info'><div class='row'>";
											echo "<div class='col-md-4'>Course Description:<div class='input-group'> <input type='text' class='form-control' class='input-sm' name='year'  value='$get_subject' ></div></div>";
											
											echo "<div class='col-md-6'>Course Code: <div class='input-group'>

											<input type='text' class='form-control' class='input-sm' name=''  value='$code' disabled>";
										
											echo "<span class='input-group-btn'>
											<button class='btn btn-danger' type='submit' name='submit'>Enter</button>
											<a href='grade8subjects.php' class='btn btn-danger'>Back</a>
											
											     </span></div></div>";	


											echo "</div></div>";


											}
											?>





											

								</form>






  								
		</div>
</div>

									<div id="footer" class="col-md-12 col-xs-5 col-offset-1">
                                 <hr>
                                  <p>  
                                      <?php  $curYear= Date('Y');
                                        echo "Copyright &COPY; $curYear <a href=''>MKS</a>";
                                      ?></p>
                                  </div>
	  	
<style type="text/css" title="currentStyle">
           
            @import "../../css/demo_page.css";
            @import "../../css/demo_table_jui.css";
        </style>
<script src="../../js/jquery.dataTable.js"></script>
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