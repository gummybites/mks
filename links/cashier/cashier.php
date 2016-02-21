<?php session_start();
include('../config.php');

if(!isset($_SESSION['id'])){
header('Location: cashierlogin.php');
exit;



}else{


$_SESSION['id']; 
$type = $_SESSION['id'];
$qry ="SELECT * from tbl_cashieradmin WHERE id = '$type' ";
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
                    <title>Cashier Module</title>
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

                    background: url(../../images/45.gif); background-size: cover;  font: 15px/1.7em 'Calibri';
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
        <li class="active"><a href="registrar.php"><i class="fa fa-dashboard"></i><span>Home</span> </a> </li>

     
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-long-arrow-down"></i><span>Manage User</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="manageuser.php">Profile</a></li>
            <li><a href="deleteddetails.php">Accounts</a></li>
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
                            <a href="tuitionpayment.php">
                                <i class="fa fa-money"></i>
                               <p>Tuition Payment Section</p>
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
    <?php }?>