<?php 
include('config.php');

session_start();

if(!isset($_SESSION['id'])){
header('Location: registrarlogin.php');
exit;
}else{



$tuition="SELECT * from tbl_tuition";
$tuition_result= mysql_query($tuition);


while($tuition=mysql_fetch_array($tuition_result)){
 $id=$tuition['id'];
 $tfee=$tuition['tuition'];
 $reg=$tuition['registration'];
 $med=$tuition['medical'];
 $lib=$tuition['library'];
 $ath=$tuition['athletics'];
 $sgf=$tuition['student_government_fee'];
 $pris=$tuition['prisaa_fee'];
 $bulp=$tuition['bulprisa_fee'];
 $apri=$tuition['aprism_fee'];
 $studid=$tuition['student_id'];
 $hand=$tuition['handbook'];
 $ener=$tuition['energy_fee'];
 $insu=$tuition['insurance_fee'];
 $orgfee=$tuition['organization_fee'];
 $comlab=$tuition['computer_lab'];
 $scilab=$tuition['science_lab'];
 $tlelab=$tuition['tle_lab'];
 $saf=$tuition['school_activities_fee'];



}
?>



<!DOCTYPE html>
<html>
<title>
Tuition Inquiry
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





</style>

</head>
<body>




<nav id='menu' class="navbar navbar-default navbar-static-top">
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
      <div class="col-md-2 col-xs-2 sidebar">
        <div class="row">
  <!-- uncomment code for absolute positioning tweek see top comment in css -->
  <div class="absolute-wrapper"> </div>
  <!-- Menu -->
  <div class="side-menu">
    <nav class="navbar navbar-default" role="navigation">
      <!-- Main Menu -->
      <div class="side-menu-container">
        <ul class="nav navbar-nav">
          
          <li><a href="registrar.php"><span class="glyphicon glyphicon-"></span> Home</a></li>
          <!-- Dropdown-->
          <li  id="dropdown">
            <a data-toggle="collapse" href="#dropdown-lvl1">
              <span class="glyphicon glyphicon-"></span> Inquiry <span class="caret"></span>
            </a>

            <!-- Dropdown level 1 -->
            <div id="dropdown-lvl1" class="panel-collapse collapse-in">
              <div class="panel-body">
                <ul class="nav navbar-nav">
                  <li class='active'><a><span class="glyphicon glyphicon-"></span> Tuition</a></li>
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

      <div class="col-md-10 col-xs-10 content">
      
     
              <p class="hr-warning" ></p>
                <ol class="breadcrumb bread-warning">
                  <li><a href='tuition.php'>Prospective</a></li>
                  <li ><a href='tuitionfortransferee.php'>Transferee</a></li>
                  <li class='active'>Tuition Advisey</li>

                </ol>


                <form  onsubmit="return payment()" id='form' class='col-md-12 col-xs-12' method="POST">
                
                   












                   <?php if(!isset($_GET['edit'])){


                  ?>


                   <a href='?edit=<?php echo $id ?>' class='pull-right'>Edit</a>

                   <h4>TUITION FEE</h4>
                   <div class='row'>

                   <div class='col-md-2'>
                     <i>Tuition fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class="input-group input-group-md">
                   <?php echo $tfee ?>

                   </div></div></div>



                   <h4>MISCELLANEOUS FEE</h4>
                   <div class='row'>

                   <!--Registration -->
                   <div class='col-md-2'>
                      <i>Registration:  </i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $reg ?>

                   </div></div>

                    <!--Medical -->
                   <div class='col-md-2'>
                      <i>Medical/Dental:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $med ?>
                   </div></div>
                   </div>
                   <br> 

                 

         
                    
             

                 
                    <div class='row'>
                       <!--Medical -->
                   <div class='col-md-2'>
                      <i>Library:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                  <?php echo $lib ?>
                   </div></div>

                    <!--Athletics -->
                    <div class='col-md-2'>
                      <i>Athletics:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $ath ?>
                   </div></div>
                   </div>
                   <br>

                  
                   
                    <div class='row'>
                       <!--Student Government Fee -->
                   <div class='col-md-2'>
                      <i>Student Government Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                  <?php echo $sgf ?>
                   </div></div>

                    <!--PRISAA Fee-->
                    <div class='col-md-2'>
                      <i>PRISAA Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $pris ?>
                   </div></div>
                   </div>
                   <br>


                    <div class='row'>
                       <!--BULPRISA Fee -->
                   <div class='col-md-2'>
                      <i>BULPRISA Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $bulp ?>
                   </div></div>

                    <!--APRISM Fee-->
                    <div class='col-md-2'>
                      <i>APRISM Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $apri ?>
                   </div></div>
                   </div>
                   <br>
                    


                    <div class='row'>
                       <!--ID -->
                   <div class='col-md-2'>
                      <i>ID:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $studid ?>
                   </div></div>

                    <!--Handbook-->
                    <div class='col-md-2'>
                      <i>Handbook:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $hand ?>
                   </div></div>
                   </div>
                   <br>  



                   <div class='row'>
                       <!--Energy Fee -->
                   <div class='col-md-2'>
                      <i>Energy Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $ener ?>
                   </div></div>

                    <!--Insurance Fee-->
                    <div class='col-md-2'>
                      <i>Insurance Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $insu ?>
                   </div></div>
                   </div>
                   <br>

                   <div class='row'>
                       <!--Energy Fee -->
                   <div class='col-md-2'>
                      <i>Organization Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $orgfee ?>
                   </div></div>
                   </div>
                   <br>



                   <div class='row'>
                       <!--Laboratory -->
                   <div class='col-md-2'>
                      <i>Laboratory:</i>
                   </div>
                   </div>
                   <br>

                   <div class='row'>
                       <!--Computer Laboratory -->
                   <div class='col-md-2'>
                      <i>Computer Laboratory:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                   <?php echo $comlab ?>
                   </div></div>

                    <!--Science Laboratory-->
                    <div class='col-md-2'>
                      <i>Science Laboratory:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $scilab ?>
                   </div></div>
                   </div>
                   <br>


                   <div class='row'>
                       <!--TLE Laboratory -->
                   <div class='col-md-2'>
                      <i>TLE Laboratory:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $tlelab ?>
                   </div></div>
                   </div>
                   <br>

                   <h4>OTHER FEE</h4>
                    <div class='row'>
                       <!--School Activities Fee-->
                   <div class='col-md-2'>
                      <i>School Activities Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $saf ?>
                   </div></div>
                   </div>
                   <br>
                   <hr>


                   <div class='row'>
                   <div class='col-md-2'>
                   </div>
                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                   </div></div>
                   <div class='col-md-6'>
                   <div class='input-group input-group-md'>
                   <h4>TUITION FEE- <?php echo $tfee ?> </h4>
                   </div></div>
                   </div>


                   <div class='row'>
                   <div class='col-md-2'>
                   </div>
                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                   </div></div>
                   <div class='col-md-6'>
                   <div class='input-group input-group-md'>
                   <h4>MISC. FEE- <?php echo $miscfee ?> </h4>
                   </div></div>
                   </div>


                   <div class='row'>
                   <div class='col-md-2'>
                   </div>
                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                   </div></div>
                   <div class='col-md-6'>
                   <div class='input-group input-group-md'>
                   <h4>OTHER FEES- <?php echo $otherfee ?> </h4>
                   </div></div>
                   </div>

                   <?php

                     }else{


                   ?>
                   <a href='tuitionfees.php'>Back</a>
                   <h4>TUITION FEE</h4>
                   <div class='row'>

                   <div class='col-md-2'>
                     <i>Tuition fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class="input-group input-group-md">
                   <input type='text' name='' id='' class='form-control' value='<?php echo $tfee ?>'/>

                   </div></div></div>



                   <h4>MISCELLANEOUS FEE</h4>
                   <div class='row'>

                   <!--Registration -->
                   <div class='col-md-2'>
                      <i>Registration:  </i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='' id='' class='form-control' value='<?php echo $reg ?>'/>

                   </div></div>

                    <!--Medical -->
                   <div class='col-md-2'>
                      <i>Medical/Dental:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='' id='' class='form-control' value='<?php echo $med ?>'/>
                   </div></div>
                   </div>
                   <br> 

                 

         
                    
             

                 
                    <div class='row'>
                       <!--Medical -->
                   <div class='col-md-2'>
                      <i>Library:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='' id='' class='form-control' value='<?php echo $lib ?>'/>
                   </div></div>

                    <!--Athletics -->
                    <div class='col-md-2'>
                      <i>Athletics:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='' id='' class='form-control' value='<?php echo $ath ?>'/>
                   </div></div>
                   </div>
                   <br>

                  
                   
                    <div class='row'>
                       <!--Student Government Fee -->
                   <div class='col-md-2'>
                      <i>Student Government Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='' id='' class='form-control' value='<?php echo $sgf ?>'/>
                   </div></div>

                    <!--PRISAA Fee-->
                    <div class='col-md-2'>
                      <i>PRISAA Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='' id='' class='form-control' value='<?php echo $pris ?>'/>
                   </div></div>
                   </div>
                   <br>


                    <div class='row'>
                       <!--BULPRISA Fee -->
                   <div class='col-md-2'>
                      <i>BULPRISA Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='' id='' class='form-control' value='<?php echo $bulp ?>'/>
                   </div></div>

                    <!--APRISM Fee-->
                    <div class='col-md-2'>
                      <i>APRISM Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='' id='' class='form-control' value='<?php echo $apri ?>'/>
                   </div></div>
                   </div>
                   <br>
                    


                    <div class='row'>
                       <!--ID -->
                   <div class='col-md-2'>
                      <i>ID:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='' id='' class='form-control' value='<?php echo $studid ?>'/>
                   </div></div>

                    <!--Handbook-->
                    <div class='col-md-2'>
                      <i>Handbook:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='' id='' class='form-control' value='<?php echo $hand ?>'/>
                   </div></div>
                   </div>
                   <br>  



                   <div class='row'>
                       <!--Energy Fee -->
                   <div class='col-md-2'>
                      <i>Energy Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='' id='' class='form-control' value='<?php echo $ener ?>'/>
                   </div></div>

                    <!--Insurance Fee-->
                    <div class='col-md-2'>
                      <i>Insurance Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='' id='' class='form-control' value='<?php echo $insu ?>'/>
                   </div></div>
                   </div>
                   <br>

                   <div class='row'>
                       <!--Energy Fee -->
                   <div class='col-md-2'>
                      <i>Organization Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='' id='' class='form-control' value='<?php echo $orgfee ?>'/>
                   </div></div>
                   </div>
                   <br>



                   <div class='row'>
                       <!--Laboratory -->
                   <div class='col-md-2'>
                      <i>Laboratory:</i>
                   </div>
                   </div>
                   <br>

                   <div class='row'>
                       <!--Computer Laboratory -->
                   <div class='col-md-2'>
                      <i>Computer Laboratory:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='' id='' class='form-control' value='<?php echo $comlab ?>'/>
                   </div></div>

                    <!--Science Laboratory-->
                    <div class='col-md-2'>
                      <i>Science Laboratory:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='' id='' class='form-control' value='<?php echo $scilab ?>'/>
                   </div></div>
                   </div>
                   <br>


                   <div class='row'>
                       <!--TLE Laboratory -->
                   <div class='col-md-2'>
                      <i>TLE Laboratory:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='' id='' class='form-control' value='<?php echo $tlelab ?>'/>
                   </div></div>
                   </div>
                   <br>

                   <h4>OTHER FEE</h4>
                    <div class='row'>
                       <!--School Activities Fee-->
                   <div class='col-md-2'>
                      <i>School Activities Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='' id='' class='form-control' value='<?php echo $saf ?>'/>
                   </div></div>
                   </div>
                   <br>

                   <?php







                      } ?>

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
                



