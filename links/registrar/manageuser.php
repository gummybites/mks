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
$db_id=$qry['id'];
$db_username = $qry['username'];
$db_password=$qry['password'];
}
  ?>



<?php 
if(isset($_POST['update'])){

$username=mysql_real_escape_string(trim(htmlspecialchars($_POST['username'])));
$password=mysql_real_escape_string(trim(htmlspecialchars($_POST['password'])));
$enc_password=mysql_real_escape_string(trim(htmlspecialchars(sha1(md5($password)))));


$updateuser=mysql_query("UPDATE tbl_registrar SET username='$username' where id='$db_id'  ");
$updatepass=mysql_query("UPDATE tbl_registrar SET password='$enc_password' where id='$db_id'");


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

#span-addon{
                      border-left: none;
                       background-color: #fff;
                       border-color: #d9edf7;
                    }

 #username{
                      border-right: none;
                      box-shadow: none;

                      border-color: #d9edf7;
                    }

  #password{
                      border-right: none;
                      box-shadow: none;

                      border-color: #d9edf7;
                    }

    #confirmpassword{
                      border-right: none;
                      box-shadow: none;

                      border-color: #d9edf7;
                    }
</style>


</head>
<script type="text/javascript">

function register(){
    var username= document.getElementById('username').value.length;
    var password= document.getElementById('password').value.length;
    var password1=document.getElementById('password').value;
    var cpassword=document.getElementById('confirmpassword').value;
    


if(username==""){
  document.getElementById('user').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
  return false;

}else{


          if(username>=12 && username<=25) {
            document.getElementById('user').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
   
                document.getElementById('validateusername').style.display = "none";
                
             
               }else{
                  document.getElementById('validateusername').innerHTML="<i style ='color: red;'>Username must be between 12 and 25!</i>";
                return false;
               }
}


        
    if(password==""){
  document.getElementById('pass').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
  return false;

}else{


          if(password>=12 && password<=25) {
            document.getElementById('pass').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
   
                document.getElementById('validatepassword').style.display = "none";
                
             
               }else{
                  document.getElementById('validatepassword').innerHTML="<i style ='color: red;'>Password must be between 12 and 25!</i>";
                return false;
               }
}




if(cpassword==""){
  document.getElementById('cpass').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
  return false;

}else{



               if(cpassword==password1|| password1==cpassword){
                    document.getElementById('cpass').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                    document.getElementById('validateconfirmpassword').style.display = "none";

                  }else{

                      
                      document.getElementById('cpass').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-remove'></span>";
                       document.getElementById('validateconfirmpassword').innerHTML="<i style ='color: red;'>Password doesn't match!</i>";
                      return false;
                  }

}
}

        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        specialKeys.push(9); //Tab
        specialKeys.push(46); //Delete
        specialKeys.push(36); //Home
        specialKeys.push(35); //End
        specialKeys.push(37); //Left
        specialKeys.push(39); //Right

        //Text validation for password
       function forusername(e) {
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                           //48 to 57 (Numbers),            97 – 122 (Lowercase Alphabets)
                  var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 97 && keyCode <= 122) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }

         //Text validation for password
       function forpassword(e) {
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                           //48 to 57 (Numbers),            97 – 122 (Lowercase Alphabets)
                  var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 97 && keyCode <= 122) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }  

              //Text validation for confirmpassword
       function forconfirmpassword(e) {
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                           //48 to 57 (Numbers),          97 – 122 (Lowercase Alphabets)
                  var ret = ((keyCode >= 48 && keyCode <= 57) ||  (keyCode >= 97 && keyCode <= 122) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }

//toggle password security field text html form login switch
function toggleconfirmpassword(){
var password= document.getElementById('confirmpassword');
var togglebuttonpassword= document.getElementById('togglebuttonconfirmpassword');

if(password.type=="password"){
  password.type="text";
  togglebuttonpassword.value="Hide"

}else{
  password.type="password";
  togglebuttonpassword.value="show"

}
}
</script>
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
			                  <li><a href="prospectivestudents.php"><span class="glyphicon glyphicon-"></span> Student Admission</a></li>		                  
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
					


					

					<li><a href="subjects.php"><span class="glyphicon glyphicon-"></span> Subjects</a></li>
		

				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>

	</div>
</div> </div>
  		<div class="col-md-10 content col-xs-10 col-offset-1">
  	
				  			  <form  method="POST" onsubmit="return register(event)" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  									<p class="hr-warning"></p>
					                <ol class="breadcrumb bread-warning">
					                <li class='pull-right'>Manage user</li>
					                </ol>
					                <div class='row'>
					                <div class='col-md-6'><p><i>(*) Fields are required</i></p><i  id="error" style="color: Red; display: none"></i>

                                            <div><i id='validateusername' ></i></div>
                                            <div><i id='validatepassword' ></i></div>
                                            <div><i id='validateconfirmpassword' ></i></div>
                                            </div>
                                            </div>
									

					                <div class='row'>
					                <div class='col-md-6'>
					                <div class="input-group input-group-lg">
                                              <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-lock"></span>
                                              </span>
					                <input type='text' class='form-control' placeholder='Username here..' maxlength="25" name='username' id='username' value='<?php echo $db_username ?>' onkeypress="return forusername(event);" ondrop="return false;" onpaste="return false;" >
					                			<span id='span-addon' class="input-group-addon">
                                                 <i id='user'></i>
                                              </span>
					                </div>
					                </div>
					                </div>
					                <br>

					                <div class='row'>
					                <div class='col-md-6'>
					                <div class="input-group input-group-lg">
                                              <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-lock"></span>
                                              </span>
					                <input type='password' class='form-control' placeholder='Password here..' maxlength="25" name='password' id='password' value='<?php echo $db_password ?>' onkeypress="return forpassword(event);" ondrop="return false;" onpaste="return false;" >
					               	<span id='span-addon' class="input-group-addon">
                                                 <i id='pass'></i>
                                              </span>
					               	</div>
					                </div>
					                </div>
					                <br>

					                <div class='row'>
					                <div class='col-md-6'>
					                <div class="input-group input-group-lg">
                                              <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-lock"></span>
                                              </span>
					                <input type='password' class='form-control' placeholder='Confirm password here..' maxlength="25" name='confirmpassword' id='confirmpassword' onkeypress="return forconfirmpassword(event);" ondrop="return false;" onpaste="return false;" >
					               	<span id='span-addon' class="input-group-addon">
                                                 <i id='cpass'></i>
                                              </span>

					               	<span  class="input-group-btn">
                                                 <button type='button' id='togglebuttonconfirmpassword' class='btn btn-default' onclick="toggleconfirmpassword()" ><span class='glyphicon glyphicon-eye-open'></span></button>
                                              </span>
					               	</div>
					                </div>
					                </div>
					                <br>


					                <div class='row'>
					                <div class='col-md-6'>
					                <button type='submit' name='update' class='btn btn-primary'>Update</button>
					                </div>
					                </div>
					                </form>
  								
  		</div>
</div>

								
	  	


</body>
</html>
    <?php }?>