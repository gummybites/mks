<?php 
session_start();
if(!isset($_SESSION['id'])){
header('Location:admin.php');
exit;
}else{
include('config.php');
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
                <title>Admin Settings</title>
                <link href="../../fonts/font-awesome/css/font-awesome.css" rel="stylesheet" />                 
                 <link rel="stylesheet" href="../../css/bootstrap.min.css"></link> 
                 <link href="../../css/adminpagestyle/style.css" rel="stylesheet" />

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
<style>
            #customForm label{  
                color: #797979;
                 font-size: 10px;
            }
            #customForm input{
                width: 220px;
                padding: 6px;
                color: #949494;
                font-family: Arial,  Verdana, Helvetica, sans-serif;
                font-size: 10px;
                border: 1px solid #000;
            }
            button{

                font-family: Arial,  Verdana, Helvetica, sans-serif;
                font-size: 10px;
                border:none;
                background-color: transparent;
                float: right;
                background-image: none;
                outline: 0;
                -webkit-box-shadow: none;
                box-shadow: none;

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

</style>
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
                                <a   href="studentaccountdatabase.php"><i class="fa fa-user fa-3x"></i> Enrolled Students</a>
                            </li>
                            <li>
                                <a  href="employeeaccountdatabase.php"><i class="fa fa-trash fa-3x"></i> Employees</a>
                            </li> 
                            <li>
                              <a class="active-menu" ><i class="fa fa-tasks fa-3x"></i>Admin Profile</a>
                            </li>
                        </ul>
                    </div>
                    
                </nav>

                  
                <div id="page-wrapper" >
                    <h3><i>Settings: Edit account:</i> <b><?php echo  $user; ?></b></h3>
                        <div id="page-inner">
                            <div class="col-md-12">
                                <form id="customForm" role="form-signin" action="editconfirmation.php" onsubmit="return register()" autocomplete="on" method="POST">
                     

                     <div class="row">
                                    <label for="username">Username: </label>
                                    <input id="username" name="username"  type="text"   maxlength="15" value="<?php  echo  $user;?>" >
                                    <div id="uname"></div>
                    </div>

                    <div class="row">
   
                                    <label for="password">Password: </label>
                                    <input id="password" name="password"  type="password"  maxlength="15" value="<?php  echo  $pass;?>" >
                                    <div id="pname"></div>
                    </div>
                   
                    


                </div> <!--End for page-inner -->
                </div>
                                       <button type="submit" name="submit" value="Save & Update"  >Save & Update</button>
                           </form>
                    </div><!-- /. PAGE INNER  -->
            </div>
</div><!-- /. PAGE WRAPPER  -->
   

  

    



    <script src="../../js/jquery.1.11.1.js"></script>
    <script src="../../js/bootstrap.js"></script>




</body>
</html>
<?php } ?> 