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
$db_photofile=$qry['photo_file'];
}
  ?>

<!DOCTYPE html>
<html>
<head>

                
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Create Accounts</title>
                    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"  rel="stylesheet" type="text/css">
                    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css"  rel="stylesheet" type="text/css">
                    <link rel="stylesheet" href="../../css/style.css"  rel="stylesheet" type="text/css">
                    <link rel="stylesheet" href="../../css/font-awesome.css"  rel="stylesheet" type="text/css">
                     <link rel="stylesheet" href="../../css/font-awesome.min.css"  rel="stylesheet" type="text/css">

   
                    <script src="../../js/jquery-2.1.1.min.js"></script>
                    <script src="../../bootstrap/js/bootstrap.min.js"></script>
                    <script src="../../js/validation.js"></script>
                    <script src="../../js/jquery.appear.js"></script>
                    <script src="../../js/modernizr.custom.js"></script>
</head>
<style>
                    body{

                    background: url(../../images/body-bg.png);
                    }


                        .blue {
                            background: #28ABE3;
                        }

                        .green {
                            background: #72bf48;
                        }

                        .red {
                            background: #FF432E;
                        }

                        .light-red {
                            background: #FB6648;
                        }

                        .light-orange {
                            background: #FA6900;
                        }

                        .color {
                            background: #0ECEAB;
                        }

                        /**** Start Main Body Section ****/

                        .mainbody-section {
                            padding-top: 50px;
                            padding-bottom: 30px;
                      
                        }

                        .menu-item {
                            color: #fff;
                            padding-top: 20px;
                            padding-bottom: 20px;
                            margin-bottom: 30px;
                          -webkit-transition: all 0.3s;
                          transition: all 0.3s;
                          box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
                           border-radius: 2px;
                          transition: all 0.5s ease 0s;
                          
                        }


                        .menu-item a {
                            color: #fff;
                            display: block;
                          -webkit-transition: all 0.3s;
                          transition: all 0.3s;
                        }
                        .menu-item a:hover {
                           text-decoration: none;
                        }

                        .menu-item a p {
                            font-family: 'Oswald', sans-serif;
                            font-weight: 300;
                            font-size: 20px;
                        }

                        .menu-item a i {
                            font-size: 50px;
                            padding-bottom: 20px;
                        }

                       
</style>  
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
      <li><a href="manageuser.php"><img src="../../photos /<?php echo $db_photofile?>" class="img-circle" width="20px" height="20px"> <?php echo $db_username?>  </a></li>
        <li> <a href="logout.php?logout=<?php echo $db_id ?>"> <i class="glyphicon glyphicon-log-out"> </i> Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>	



<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li ><a href="registrar.php"><i class="fa fa-home"></i><span>Home</span> </a> </li>
        <li class="active"><a href="createaccounts.php"><i class="fa fa-plus"></i><span>Create acount</span> </a> </li>
        <li><a href="admission.php"><i class="fa fa-archive"></i><span>Admission</span> </a></li>
        <li><a href="inquiry.php"><i class="fa fa-newspaper-o"></i><span>Inquiry</span> </a> </li>
        <li><a href="faculty.php"><i class="fa fa-users"></i><span>Faculty</span> </a> </li>
        <li><a href="form.php"><i class="fa fa-file-pdf-o"></i><span>Form</span> </a> </li>
        <li><a href="event.php"><i class="fa fa-calendar"></i><span>Event & Annoucement</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-long-arrow-down"></i><span>Manage</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="manageuser.php"><i class="fa fa-user-secret"></i> Admin Profile</a></li>
            <li><a href="deleteddetails.php"><i class="fa fa-trash-o"></i> Archive files</a></li>
            <li><a href="listofsubjects.php"><i class="fa fa-th-list"></i><span> List of Subjects</span> </a> </li>
            <li><a href="listofschedule.php"><i class="fa fa-clock-o"></i><span> List of Schedule</span> </a> </li>
            <li><a href="breakdownoftuitionfees.php"><i class="fa fa-money"></i> Breakdown of tuition Fees</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>


<!-- Start Main Body Section -->
        <div class="mainbody-section text-center">
            <div class="container">
                <div class="row">
                  <div class="col-md-4">
                  </div>
                  <div class="col-md-4">
                       <div class="menu-item blue">
                            <a href="createaccountfornewstudent.php">
                                <i class="fa fa-plus"></i>
                                <p>Create Student Account</p>
                            </a>
                        </div>  
                  </div>
                  <div class="col-md-4">
                  </div>
                </div>

            </div>
        </div>
</body>
</html>
    <?php }?>}
