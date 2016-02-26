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



    if(isset($_POST['deletepermanentbutton'])){
      $id=$_POST['deletepermanent'];


      mysql_query("DELETE  from tbl_prospectivestudents where id='$id'");
      mysql_query("DELETE  from tbl_studentdetails where id='$id'");
      mysql_query("DELETE  from tbl_studentrequirements where id='$id'");
       header("Location: deleteddetails.php?detailsdeletedpermanently");                       


    }elseif(isset($_POST['returndetailsbutton'])){
       $id=$_POST['returndetails'];

       mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus='PENDING' where id='$id'");
       header("Location: deleteddetails.php?detailsreturnsuccesfully");


    }

?>





<!DOCTYPE html>
<html>
<head>

                
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Deleted Details</title>

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
</head>
<style>
          body{

                   background: url(../../images/45.gif); background-size: cover;  font: 15px/1.7em 'Calibri';
                    }


          /* Shutter Out Horizontal */
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
                      background:#f5af02;
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
                      background: #0064d2;
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
                      

                      .btn-file {
                          position: relative;
                          overflow: hidden;
                      }
                      .btn-file input[type=file] {
                          position: absolute;
                          top: 0;
                          right: 0;
                          min-width: 100%;
                          min-height: 100%;
                          font-size: 100px;
                          text-align: right;
                          filter: alpha(opacity=0);
                          opacity: 0;
                          outline: none;
                          background: white;
                          cursor: inherit;
                          display: block;
                      }

                      .btn-file1 input[type=file] {
                          position: absolute;
                          top: 0;
                          right: 0;
                          min-width: 100%;
                          min-height: 100%;
                          font-size: 100px;
                          text-align: right;
                          filter: alpha(opacity=0);
                          opacity: 0;
                          outline: none;
                          background: white;
                          cursor: inherit;
                          display: block;
                      }

                      .btn-file2 input[type=file] {
                          position: absolute;
                          top: 0;
                          right: 0;
                          min-width: 100%;
                          min-height: 100%;
                          font-size: 100px;
                          text-align: right;
                          filter: alpha(opacity=0);
                          opacity: 0;
                          outline: none;
                          background: white;
                          cursor: inherit;
                          display: block;
                      }


                      textarea {
                          resize: none;
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
        <li><a href="createaccounts.php"><i class="fa fa-plus"></i><span>Create acount</span> </a> </li>
        <li><a href="admission.php"><i class="fa fa-archive"></i><span>Admission</span> </a></li>
        <li><a href="inquiry.php"><i class="fa fa-newspaper-o"></i><span>Inquiry</span> </a> </li>
        <li><a href="faculty.php"><i class="fa fa-users"></i><span>Faculty</span> </a> </li>
        <li><a href="form.php"><i class="fa fa-file-pdf-o"></i><span>Form</span> </a> </li>
        <li><a href="event.php"><i class="fa fa-calendar-minus-o"></i><span>Event & Annoucement</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-long-arrow-down"></i><span>Manage</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li ><a href="manageuser.php"><i class="fa fa-user-secret"></i> Admin Profile</a></li>
            <li class="active"><a href="deleteddetails.php"><i class="fa fa-trash-o"></i> Deleted details</a></li>
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


<div class="container">
<?php
    if(isset($_GET['detailsreturnsuccesfully'])){
      ?>
      <center><p style="color: green">Details successfully return</p></center>
      <?php

    }elseif(isset($_GET['detailsdeletedpermanently'])){
      ?>
      <center><p style="color: green">Details permanently deleted</p></center>
      <?php
    }
    ?>
<ul class="nav nav-tabs" role="tablist">
    <li class="active"><a href="#">Deleted Details</a></li>
  </ul>

     <div class='demo_jui'>
                        <table cellpadding='0' cellspacing='1' border='1' class='display' id='tbl' class='jtable'>
                        <thead>

                                          <tr>
                                              <th><center>Date</center></th>
                                              <th><center>Grade level</center></th>
                                              <th><center>Surname</center></th>
                                              <th><center>Firstname</center></th>
                                              <th><center>Middlename</center></th>
                                              <th><center>Action</center></th>
                 
                                              </tr>

                        </thead>



                        <?php

                        $details="SELECT * from tbl_prospectivestudents where prospectivestatus='recycle'";
                        $res_details=mysql_query($details);


                        while($details=mysql_fetch_assoc($res_details)){

                          $id=$details['id'];
                            $email=$details['email'];
                            $user=$details['username'];
                            $applicant_no=$details['applicant_number'];
                            $sy=$details['year'];
                            $level=$details['seeking'];
                            $date=$details['applieddate'];
                            $stat=$details['status'];
                            $sname=$details['surname'];
                            $fname=$details['firstname'];
                            $mname=$details['middlename'];
                            $pstatus=$details['prospectivestatus'];

                         
                            echo "<tr><td><center>$date</center></td><td><center>$level</center></td><td><center>$sname</center></td><td><center>$fname</center></td> <td><center>$mname</center></td> <td><center><a href='?deletepermanently=$id'>Delete permenantly</a> | <a href='?recycledetails=$id' ><i class='fa fa-recycle'></i></a></center></td></tr>";
                            

              
                        
                        }

                        ?>

                        </table>

             </div>

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
<script>
 $(document).ready(function(){
  $('#myModal').show();


     $("#close").click(function(){
        $('#myModal').hide();
     });

      $("#cancel").click(function(){
        $('#myModal').hide();
     });
  });

</script>

</body>
</html>

<?php
if(isset($_GET['deletepermanently'])){
  $id=$_GET['deletepermanently'];

  $details="SELECT * from tbl_prospectivestudents where id='$id' ";
  $res_details=mysql_query($details);

    while($details=mysql_fetch_assoc($res_details)){
                              $id=$details['id'];
                              $sname=$details['surname'];
                              $fname=$details['firstname'];
                              $mname=$details['middlename'];
                              }

?>
<!-- The Modal -->
<div id="myModal" style="display: none;" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span id="close">×</span>

    </div>
    <div class="modal-body">
      <p>Are you sure you want to permanently delete details of <?php echo $sname.','. $fname. ','. $mname?>?</p>
    
    </div>
    <div class="modal-footer">
    <form method="POST">
    <button id='ok' name='deletepermanentbutton'>Ok</button>
    <input type="hidden" name="deletepermanent" value="<?php echo $id?>">
    </form>

    </div>
  </div>

</div>
<?php
}elseif(isset($_GET['recycledetails'])){
  $id=$_GET['recycledetails'];
  $details="SELECT * from tbl_prospectivestudents where id='$id' ";
  $res_details=mysql_query($details);

    while($details=mysql_fetch_assoc($res_details)){
                              $id=$details['id'];
                              $sname=$details['surname'];
                              $fname=$details['firstname'];
                              $mname=$details['middlename'];
                              }

?>
<!-- The Modal -->
<div id="myModal" style="display: none;" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span id="close">×</span>

    </div>
    <div class="modal-body">
      <p>Are you sure you want to return details of <?php echo $sname.','. $fname. ','. $mname?>?</p>
    
    </div>
    <div class="modal-footer">
    <form method="POST">
    <button id='ok' name='returndetailsbutton'>Ok</button>
    <input type="hidden" name="returndetails" value="<?php echo $id?>">
    </form>

    </div>
  </div>

</div>
<?php
}
 ?>
    <?php }?>}
