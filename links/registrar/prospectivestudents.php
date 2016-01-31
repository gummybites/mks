<?php session_start();
include('config.php');
if(!isset($_SESSION['id'])){
header('Location: registrarlogin.php');
exit;



}else{

  ?>


  <?php
  if(isset($_POST['enter'])){
                 

  
                        $studcount=$_POST['studcount'];
                        $studnumber=$_POST['stud_number'];
                        $applicantnumber=$_POST['applicant_number'];
                      
                        
                          mysql_query("UPDATE tbl_prospectivestudents set  username= '$studnumber' where  id='$studcount' ");
                          mysql_query("UPDATE tbl_prospectivestudents set  applicant_number= '$applicantnumber' where id='$studcount' ");
                          header("Refresh: 1; url='prospectivestudents.php'");
                          
                        }

?>

<html>
<title>
New Students
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

#footer{
  margin-top: 380px;

}

button.btn {
                width: 100%;  
                height: 50px;
            
                padding: 0 20px;
                vertical-align: middle;
                background: #de995e;
                border: 0;
                font-family: 'Roboto', sans-serif;
                font-size: 16px;
                font-weight: 300;
                line-height: 50px;
                color: #fff;
                -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px;
                text-shadow: none;
                -moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;
                -o-transition: all .3s; -moz-transition: all .3s; -webkit-transition: all .3s; -ms-transition: all .3s; transition: all .3s;
            }

#form{
margin-top: 50px;


}
    
td{

  text-align: center;
}
</style>


</head>
<body>




<nav id="menu" class="navbar navbar-default navbar-static-top">
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
                  <div id="dropdown-lvl2" class="panel-collapse collapse-in">
                    <div class="panel-body">
                      <ul class="nav navbar-nav">
                        <li class="active"><a href="#"><span class="glyphicon glyphicon-"></span> Create Account</a></li>
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
</div></div>

      <div class="col-md-10 content col-xs-10 col-offset-1">
      
     
                <p class="hr-warning" /></p>
                <ol class="breadcrumb">
        
                  <li class='active'> New Student</li>
                  <li ><a href="transferee.php"> Transferee</a></li>
                </ol>
       


             <form method="POST" id="form">   
              <div><i  id="error" style="color: Red; display: none">NOTE: Must be in character only. Special characters are not allowed!</i>
             <?php
             if(isset($_POST['enter'])){
                  echo "<div class='alert alert-success'>Success</div>";


            }elseif(isset($_GET['account'])){
                $account=$_GET['account'];

                $q="SELECT * from tbl_prospectivestudents where username='$account'";
                $r=mysql_query($q);

                while($q=mysql_fetch_array($r)){
                  $user=$q['username'];
                  $applicant_no=$q['applicant_number'];
                  $fname=$q['firstname'];
                  $sname=$q['surname'];
                  $mname=$q['middlename'];




                }
                 echo "<a  href='prospectivestudents.php'>Back</a>";
                echo "<div class='row'>
                      <div class='col-md-4'>
                      <label  class='form-control'>STUDENT ID NUMBER:  $user</label>
                      </div></div>";

                echo "<div class='row'>
                      <div class='col-md-4'>
                      <label  class='form-control'>APPLICANT NUMBER:  $applicant_no</label>
                      </div></div>";

                echo "<div class='row'>
                      <div class='col-md-4'>
                      <label  class='form-control'>NAME:  $sname, $fname,  $mname</label>
                      </div></div>"; 

        

               








            }elseif(isset($_GET['studcount'])){
              $studcount=$_GET['studcount'];
              $z=$_GET['Applicant'];

                    $q = "SELECT applicant_number from tbl_prospectivestudents where status='new student' and id='$studcount'";
                    $r = mysql_query($q);
                       $y= 4008;
                     
                       
                        $admission_number = $y.$z;

                        $info= "SELECT * from tbl_prospectivestudents where id='$studcount'";
                        $res_info=mysql_query($info);

                        while($info=mysql_fetch_array($res_info)){
                             $user=$info['username'];
                              $fname=$info['firstname'];
                              $mname=$info['middlename'];
                              $sname= $info['surname'];
                              $stat=$info['status'];

                        }


                        echo "<div class='row'>
                              <div class='col-md-4'>
                              <a  href='prospectivestudents.php'>Back</a>
                              </div></div>
                              ";

                        echo "<div class='row'>
                              <div class='col-md-4'>
                              <label class='form-control'>STUDENT ID NUMBER:  $admission_number</label>
                              </div></div>";

                        echo "<div class='row'>
                              <div class='col-md-4'>
                              <label class='form-control'>NAME: $sname, $fname, $mname</label>
                              </div></div>";


                        echo "<input type='hidden' name='studcount' value='$studcount'>";
                        echo "<input type='hidden' name='stud_number' value='$admission_number'>";
                        echo "<input type='hidden' name='applicant_number' value='$z'>";


                        echo "<div class='row'>
                              <div class='col-md-4'>
                              <button class='btn btn-primary' type='submit' name='enter'>Create</button>
                              </div></div><br>";

                        

                        


             }else{

              ?>
             <div class='demo_jui'>
                              <table cellpadding='0' cellspacing='1' border='0' class='display' id='tbl' class='jtable'>
                              <thead>
                                              <tr>
                                            

                                              <td bgcolor='#FCAC45'><center>Surname</center></td>
                                              <td bgcolor='#FCAC45'><center>Firstname</center></td>
                                              <td bgcolor='#FCAC45'><center>Middlename</center></td>
                                              <td bgcolor='#FCAC45'><center>Action</center></td>
                                              </tr>

                                              </thead>
                                          
                                        
                            <?php 
                            include('config.php');

           
                            
                            //
                            $qry="SELECT * from tbl_studentrequirements inner join tbl_prospectivestudents on tbl_prospectivestudents.id=tbl_studentrequirements.id where  status='new student'";
                            $res=mysql_query($qry);
                             if(mysql_num_rows($res) >= 0) 
                              {
                                
                                 $z=0;
                            while($qry= mysql_fetch_assoc($res)){

                            $id=$qry['id'];
                            $email=$qry['email'];
                            $user=$qry['username'];
                            $applicant_no=$qry['applicant_number'];
                            $sy=$qry['year'];
                            $level=$qry['seeking'];
                            $date=$qry['applieddate'];
                            $stat=$qry['status'];
                            $sname=$qry['surname'];
                            $fname=$qry['firstname'];
                            $mname=$qry['middlename'];
                          
                            $pstatus=$qry['prospectivestatus'];

                            $birth=$qry['BirthCertificate'];
                            $form=$qry['Form138'];
                            $moral=$qry['GoodMoral'];  
                            $z++;

                             if(($birth||$form||$moral=='1') && ($stat=='new student')){ 

                              if($applicant_no!='0'){
                                 
                                 echo "<tr><td>$sname</td><td>$fname</td><td>$mname</td><td> <center> <a href='?account=$user'><img src='viewaccount.png' width='130px' height='40px'></a></center></td></tr>";
                              }else{

                                 
                                  echo "<tr><td>$sname</td><td>$fname</td><td>$mname</td><td> <center><a href='?studcount=$id&&Applicant=$z'><img src='CREATEACCOUNT.png' width='130px' height='40px'></a></tr>";
                              }

                           
                            

                            }
                            }
                            }

                      
                      
                          

                       
                        

                             
                    ?>
                </table></div>
                <?php } ?>
              



                <?php 
                


                ?>


                 </form>
        

   
    </div>
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