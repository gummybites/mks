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



<?php
if(isset($_POST['updatesubjectdescription'])){
  $subjectcodes=$_POST['subjectidcode'];
  $units=$_POST['units'];
  $subjectnames=$_POST['subjectnames'];


  mysql_query("UPDATE tbl_subjects set subjects='$subjectnames',unit='$units' where id='$subjectcodes'  ");
  header("Refresh:1");



}

?>




<!DOCTYPE html>
<html>
<head>

                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>List of Subjects</title>
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
<head>
<style>
					body{

                    background: url(../../images/body-bg.png);
                    }

                    #next {
                      display: inline-block;
                      vertical-align: middle;
                      padding: 0.9em 2.3em;
                      color:#fff;
                      -webkit-transform: translateZ(0);
                      transform: translateZ(0);
                      box-shadow: 0 0 1px rgba(0, 0, 0, 0);
                      -webkit-backface-visibility: hidden;
                      backface-visibility: hidden;
                      -moz-osx-font-smoothing: grayscale;
                      position: relative;
                      background: #0064d2;
                      -webkit-transition-property: color;
                      transition-property: color;
                      -webkit-transition-duration: 0.3s;
                      transition-duration: 0.3s;
                      text-decoration:none;
                      margin:1em 0 0;
                      border: transparent;
                    }
                    #next:before {
                      content: "";
                      position: absolute;
                      z-index: -1;
                      top: 0;
                      bottom: 0;
                      left: 0;
                      right: 0;
                      background:#f5af02;
                      -webkit-transform: scaleX(0);
                      transform: scaleX(0);
                      -webkit-transform-origin: 50%;
                      transform-origin: 50%;
                      -webkit-transition-property: transform;
                      transition-property: transform;
                      -webkit-transition-duration: 0.3s;
                      transition-duration: 0.3s;
                      -webkit-transition-timing-function: ease-out;
                      transition-timing-function: ease-out;
                      text-decoration:none;
                    }

                    #next:hover, #next:focus, #next:active {
                          color: #fff;
                        }
                        #next:hover:before, #next:focus:before, #next:active:before {
                          -webkit-transform: scaleX(1);
                          transform: scaleX(1);
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
      <li><a href=""><img src="../../photos /<?php echo $db_photofile?>" class="img-circle" width="20px" height="20px"> <?php echo $db_username?>  </a></li>
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
        <li><a href="createaccounts.php"><i class="fa fa-plus"></i><span>Create acount</span> </a> </li>
        <li><a href="admission.php"><i class="fa fa-archive"></i><span>Admission</span> </a></li>
        <li><a href="inquiry.php"><i class="fa fa-newspaper-o"></i><span>Inquiry</span> </a> </li>
        <li><a href="faculty.php"><i class="fa fa-users"></i><span>Faculty</span> </a> </li>
        <li><a href="form.php"><i class="fa fa-file-pdf-o"></i><span>Form</span> </a> </li>
        <li><a href="event.php"><i class="fa fa-calendar"></i><span>Event & Annoucement</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-long-arrow-down"></i><span>Manage</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="manageuser.php"><i class="fa fa-user-secret"></i> Admin Profile</a></li>
            <li ><a href="deleteddetails.php"><i class="fa fa-trash-o"></i> Archive files</a></li>
            <li class="active"><a href="listofsubjects.php"><i class="fa fa-th-list"></i><span> List of Subjects</span> </a> </li>
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


<div class="container">
                            
<?php
if(isset($_GET['subjectcode'])){
  $id=$_GET['subjectcode'];

  $qry="SELECT * from tbl_subjects where id='$id'";
  $res=mysql_query($qry);

  while($qry=mysql_fetch_array($res)){
        $yearlevel=$qry['yearlevel'];
        $subjectname=$qry['subjects'];
        $subjectcode=$qry['subject_code'];
        $subjectunit=$qry['unit']; 

    ?>
    <form method="POST">
    <div class="row-group">
        <div class="row">
        <div class="col-md-4">

        </div>

        <div class="col-md-4">
        Update Description
        </div>

        <div class="col-md-4">
        </div>
        </div>


        <div class="row">
        <div class="col-md-4">

        </div>

        <div class="col-md-4">
        Year Level:<input type="text" class="form-control" value="<?php echo $yearlevel?>" readonly>
        </div>

        <div class="col-md-4">
        </div>
        </div>


        <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-4">
        Subject Code:<input type="text" class="form-control" value="<?php echo $subjectcode?>" readonly>
       
        </div>

        <div class="col-md-4">
        </div>

        </div>


        <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-4">
        Subject Name:<input type="text" class="form-control" name="subjectnames" value="<?php echo $subjectname?>">
        </div>

        <div class="col-md-4">
        </div>

        </div>


        <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-4">
        Units:<input type="text" class="form-control" name="units" value="<?php echo $subjectunit?>">
        </div>

        <div class="col-md-4">
        </div>

        </div>

        <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-4">
        <input type="hidden" value="<?php echo $id?>" name="subjectidcode">
        <a href="listofsubjects.php" id="next">Back</a>
        <button type="submit" id="next" name="updatesubjectdescription">Update</button>
        </div>

        <div class="col-md-4">
        </div>

        </div>

    </div>

    
    </form>
    <?php     

  }


}else{


 ?>
                          <ul class="nav nav-tabs">
                                <li class="active"><a href="#Grade7" data-toggle="tab">Grade 7</a>
                                </li>
                                <li class=""><a href="#Grade8" data-toggle="tab">Grade 8</a>
                                </li>
                                <li class=""><a href="#Grade9" data-toggle="tab">Grade 9</a>
                                </li>
                                <li class=""><a href="#Grade10" data-toggle="tab">Grade 10</a>
                                </li>
                               
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="Grade7">

                                  <br>
                                  <table class="table" border="1">
                                    <thead>         <tr><td colspan="5"><center>List of Subjects</center></td></tr>
                                                    <tr>
                                                    <td><center>Grade level</center></td>
                                                    <td><center>Subject Name</center></td>
                                                    <td><center>Subject Code</center></td>
                                                    <td><center>Units</center></td>
                                                    <td><center>Action</center></td>
                                                    </tr>

                                    </thead>
                                    <?php $qry= "SELECT * from tbl_subjects where yearlevel='Grade 7'";
                                    $res= mysql_query($qry);

                                    while($qry= mysql_fetch_array($res)){
                                      $id_subject=$qry['id'];
                                      $subjectyearlevel=$qry['yearlevel'];
                                      $subjectname=$qry['subjects'];
                                      $subjectcode=$qry['subject_code'];
                                      $subjectunit=$qry['unit'];                    


                                      ?>
                                      <tr>
                                      <td><center><?php echo $subjectyearlevel?></center></td>
                                      <td><center><?php echo $subjectname?></center></td>
                                      <td><center><?php echo $subjectcode?></center></td>
                                      <td><center><?php echo $subjectunit?></center></td>
                                      <td><center><a href="listofsubjects.php?subjectcode=<?php echo $id_subject?>">Edit</a></center></td>
                                      </tr>
                                      <?php
                                                                    
                                                                                }

                                    ?>
                                </table>
                              
                            </div>

                                <div class="tab-pane fade" id="Grade8">

                                <br>
                                  <table class="table" border="1">
                                    <thead>         <tr><td colspan="5"><center>List of Subjects</center></td></tr>
                                                    <tr>
                                                    <td><center>Grade level</center></td>
                                                    <td><center>Subject Name</center></td>
                                                    <td><center>Subject Code</center></td>
                                                    <td><center>Units</center></td>
                                                    <td><center>Action</center></td>
                                                    </tr>

                                    </thead>
                                    <?php $qry= "SELECT * from tbl_subjects where yearlevel='Grade 8'";
                                    $res= mysql_query($qry);

                                    while($qry= mysql_fetch_array($res)){
                                      $id_subject=$qry['id'];
                                      $subjectyearlevel=$qry['yearlevel'];
                                      $subjectname=$qry['subjects'];
                                      $subjectcode=$qry['subject_code'];
                                      $subjectunit=$qry['unit'];                    


                                      ?>
                                      <tr>
                                      <td><center><?php echo $subjectyearlevel?></center></td>
                                      <td><center><?php echo $subjectname?></center></td>
                                      <td><center><?php echo $subjectcode?></center></td>
                                      <td><center><?php echo $subjectunit?></center></td>
                                      <td><center><a href="listofsubjects.php?subjectcode=<?php echo $id_subject?>">Edit</a></center></td>
                                      </tr>
                                      <?php
                                                                    
                                                                                }

                                    ?>
                                </table>

                                </div>

                                <div class="tab-pane fade" id="Grade9">
                                <br>
                                  <table class="table" border="1">
                                    <thead>         <tr><td colspan="5"><center>List of Subjects</center></td></tr>
                                                    <tr>
                                                    <td><center>Grade level</center></td>
                                                    <td><center>Subject Name</center></td>
                                                    <td><center>Subject Code</center></td>
                                                    <td><center>Units</center></td>
                                                    <td><center>Action</center></td>
                                                    </tr>

                                    </thead>
                                    <?php $qry= "SELECT * from tbl_subjects where yearlevel='Grade 9'";
                                    $res= mysql_query($qry);

                                    while($qry= mysql_fetch_array($res)){
                                      $id_subject=$qry['id'];
                                      $subjectyearlevel=$qry['yearlevel'];
                                      $subjectname=$qry['subjects'];
                                      $subjectcode=$qry['subject_code'];
                                      $subjectunit=$qry['unit'];                    


                                      ?>
                                      <tr>
                                      <td><center><?php echo $subjectyearlevel?></center></td>
                                      <td><center><?php echo $subjectname?></center></td>
                                      <td><center><?php echo $subjectcode?></center></td>
                                      <td><center><?php echo $subjectunit?></center></td>
                                      <td><center><a href="listofsubjects.php?subjectcode=<?php echo $id_subject?>">Edit</a></center></td>
                                      </tr>
                                      <?php
                                                                    
                                                                                }

                                    ?>
                                </table>
                                </div>

                                <div class="tab-pane fade" id="Grade10">

                                <br>
                                  <table class="table" border="1">
                                    <thead>         <tr><td colspan="5"><center>List of Subjects</center></td></tr>
                                                    <tr>
                                                    <td><center>Grade level</center></td>
                                                    <td><center>Subject Name</center></td>
                                                    <td><center>Subject Code</center></td>
                                                    <td><center>Units</center></td>
                                                    <td><center>Action</center></td>
                                                    </tr>

                                    </thead>
                                    <?php $qry= "SELECT * from tbl_subjects where yearlevel='Grade 10'";
                                    $res= mysql_query($qry);

                                    while($qry= mysql_fetch_array($res)){
                                      $id_subject=$qry['id'];
                                      $subjectyearlevel=$qry['yearlevel'];
                                      $subjectname=$qry['subjects'];
                                      $subjectcode=$qry['subject_code'];
                                      $subjectunit=$qry['unit'];                    


                                      ?>
                                      <tr>
                                      <td><center><?php echo $subjectyearlevel?></center></td>
                                      <td><center><?php echo $subjectname?></center></td>
                                      <td><center><?php echo $subjectcode?></center></td>
                                      <td><center><?php echo $subjectunit?></center></td>
                                      <td><center><a href="listofsubjects.php?subjectcode=<?php echo $id_subject?>">Edit</a></center></td>
                                      </tr>
                                      <?php
                                                                    
                                                                                }

                                    ?>
                                </table>
                                </div>
                            </div>








<?php }?>
</div>
	
	  	






<style type="text/css" title="currentStyle">
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