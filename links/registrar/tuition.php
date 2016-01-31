<?php 
include('config.php');
session_start();

if(!isset($_SESSION['id'])){
header('Location: registrarlogin.php');
exit;



}else{
                if(isset($_POST['submit'])){
                  $username=$_POST['username'];

                if(!isset($_POST['discount'])){
                  $discount = "2";
                }else{
                  $discount = $_POST['discount'];
                }


                if(!isset($_POST['cash'])){
                  $select= "0";
                }else{
                  $select= $_POST['cash'];
                }
                mysql_query("update tbl_prospectivestudents set Mode = $select where username='$username'");
                header("Refresh: 1; url=tuition.php?tuition=$username");
                //This is for special previleges
                }



                elseif(isset($_POST['update'])){
                  $username=$_POST['username'];

                if(!isset($_POST['discount'])){
                  $discount = "2";
                }else{
                  $discount = $_POST['discount'];
                  


                }

                mysql_query("update tbl_prospectivestudents set Discount = $discount where username='$username'");
                header("Refresh: 1; url=tuition.php?tuition=$username");
             
                //This is for mode of payment
                }




                elseif(isset($_POST['update1'])){
                  $username=$_POST['username'];

                if(!isset($_POST['cash'])){
                  $select= "0";
                }else{
                  $select= $_POST['cash'];

                }
                mysql_query("update tbl_prospectivestudents set Mode = $select where username='$username'");
                header("Refresh: 1; url=tuition.php?tuition=$username");
             

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

#priv li{
  display: block;

}

#input{
  width: 100px;

}

.btn{
  border-radius: 1px;

}


#column1{
  background-color: transparent;
  min-height: 106px ;



}

#column2{
  min-height: 106px ;
  background-color: transparent;



}

#button{
  float: right;

}

td{
  text-align: center;

}



</style>
 <script type="text/javascript">
    $(document).ready(function(){
    
      $("#stud").click(function(){
        $("#sibling1").hide();
        $("#old1").hide(); 
        $("#transfer1").hide();
        $("#honor1").hide();
        $("#stud1").toggle();


        
      });

       $("#honor").click(function(){
        $("#sibling1").hide();
        $("#old1").hide();  
        $("#stud1").hide();
        $("#transfer1").hide();
        $("#honor1").toggle();


        
      });

        $("#transfer").click(function(){
        $("#sibling1").hide();
        $("#old1").hide();    
        $("#stud1").hide();
        $("#honor1").hide();
        $("#transfer1").toggle();


        
      });

        $("#old").click(function(){
        $("#sibling1").hide();
        $("#stud1").hide();
        $("#honor1").hide();
        $("#transfer1").hide();
        $("#old1").toggle();


        
      });

        $("#sibling").click(function(){
        $("#stud1").hide();
        $("#honor1").hide();
        $("#transfer1").hide();
        $("#old1").hide();
        $("#sibling1").toggle();


        
      });

   



    });

    

  function payment(){
    var modeofpayment=document.getElementById('modeofpayment').value;


    if(modeofpayment==""){
      document.getElementById('message').innerHTML="<div style='color:red;'>No mode of payment selected!</div>";
      return false;


    }else{


    }


  }

  
   </script>

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
                  <li class='active'>Prospective</li>
                  <li ><a href='tuitionfortransferee.php'>Transferee</a></li>
                  <li><a href='tuitionfees.php'>Tuition Advisey</a></li>

                </ol>
                <form  onsubmit="return payment()" id='form' class='col-md-12 col-xs-12' method="POST">
                 <i  id="error" style="color: Red; display: none">NOTE: Must be in character only. Special characters are not allowed!</i><i id='message'></i>
                  
                <?php
               if(isset($_GET['tuition'])){
                  $tuition=$_GET['tuition'];
                  echo "<a href='tuition.php'>Back</a>";
                  $q="SELECT * from tbl_prospectivestudents where username='$tuition'";
                  $r=mysql_query($q);


                  while($q=mysql_fetch_array($r)){

                            $user=$q['username'];
                            $level=$q['seeking'];
                            $date=$q['applieddate'];
                            $stat=$q['status'];
                            $sname=$q['surname'];
                            $fname=$q['firstname'];
                            $mname=$q['middlename'];
                            
                            $discount=$q['Discount'];
                            $mode=$q['Mode'];


                  }
                   if(isset($_POST['submit'])){
                   echo "<div class='alert alert-info'><span class='glyphicon glyphicon-info-sign'></span> Success!</div>";

                   }
                   echo "<div class='row'>

                   <div id='column1' class='col-md-6 col-xs-6 col-offset-1'>";// For comlumn1 
                   echo "<div>Student ID: $user</div>";
                   echo "<div>Name: $sname, $fname, $mname</div>";

                   echo "</div>";



                  echo "<div id='column2' class='col-md-6 col-xs-6 col-offset-1'>";// For column2
                  echo "<div>Special Previleges:";
         
                    
                  
                  if($discount==0 ){
                   
                      if($discount=='0'){
                          echo "No discount on Tuition Fee";
                        }


                  }else{
                        if($discount=='0'){
                          echo "No discount on Tuition Fee";
                        }elseif($discount=='5'){
                          echo "5% discount on Tuition Fee";
                        }elseif($discount=='7'){
                          echo "7% discount on Tuition Fee";

                        }elseif($discount=='10'){
                          echo "10% discount on Tuition Fee";

                        }elseif($discount=='15'){
                          echo "15% discount on Tuition Fee";

                        }elseif($discount=='17'){
                          echo "17% discount on Tuition Fee";

                        }elseif($discount=='20'){
                          echo "20% discount on Tuition Fee";

                        }elseif($discount=='25'){
                          echo "25% discount on Tuition Fee";

                        }elseif($discount=='27'){
                          echo "27% discount on Tuition Fee";

                        }elseif($discount=='30'){
                          echo "30% discount on Tuition Fee";

                        }elseif($discount=='35'){
                          echo "35% discount on Tuition Fee";

                        }elseif($discount=='37'){
                          echo "37% discount on Tuition Fee";

                        }elseif($discount=='50'){
                          echo "50% discount on Tuition Fee";

                        }elseif($discount=='55'){
                          echo "55% discount on Tuition Fee";

                        }elseif($discount=='57'){
                          echo "57% discount on Tuition Fee";

                        }elseif($discount=='100'){
                          echo "100% discount on Tuition Fee";

                        }elseif($discount=='0'){
                          echo "No discount on Tuition Fee";

                        }

                      }
                          echo "<a href='?previleges=$tuition' class='pull-right'>Edit</a></div>";

                   
                  if($mode==0){
                         echo "<div>Mode Of Payment:
                                    <select class='selectpicker' id='modeofpayment'  name='cash' value='0'>
                                      <option></option>
                                      <option value='1'>full</option>
                                      <option value='2'>Installment</option>
                                    </select>
                               </div>";
                  }else{
                        echo " <div><a href='?modeofpayment=$tuition' class='pull-right'>Edit</a></div>";

                          if($mode=='1'){
                            echo "<div>Mode of Payment: Full/Cash</div>";

                          }elseif($mode=='2'){

                            echo "<div>Mode of Payment: Installment</div>";
                          }

                      }
                        echo "</div></div>";



                        echo "<div class='row' id='button'>
                          

                  <input type='hidden' value='$tuition' name='username'>";     
                  if($mode==0){
                        echo "<button class='btn btn-danger' type='submit' name='submit'>Submit</button>";
                  }else{
                  
                  }
                        


                  //This is for special previleges
                }elseif(isset($_GET['previleges'])){
                  $previleges=$_GET['previleges'];
                  $q="SELECT * from tbl_prospectivestudents where username='$previleges'";
                  $r=mysql_query($q);


                  while($q=mysql_fetch_array($r)){

                            $user=$q['username'];
                            $level=$q['seeking'];
                            $date=$q['applieddate'];
                            $stat=$q['status'];
                            $sname=$q['surname'];
                            $fname=$q['firstname'];
                            $mname=$q['middlename'];
                            
                            $discount=$q['Discount'];
                            $mode=$q['Mode'];


                  }

                  if(isset($_POST['update'])){
                  echo "<div class='alert alert-info'><span class='glyphicon glyphicon-info-sign'></span> Successful Update!</div>";


                  }
                  echo "<a href='tuition.php?tuition=$user'>Back</a>";
                  echo "<div class='row'>

                   <div id='column1' class='col-md-6 col-xs-6 col-offset-1'>";// For comlumn1 

                  echo "<div>Student ID: $user</div>";
                  echo "<div>Name: $sname, $fname, $mname</div>";
                  echo "</div>";

                  echo "<div id='column2' class='col-md-6 col-xs-6 col-offset-1'>";// For column2


                  //For Student doesn't have discount
                  echo "<div class='row'><div>Special Previleges: Please Select in following list
                         </div>";

                  echo "<div><a href='#' id='stud'>For Student doesn't have discount: </a></div>";

                  echo "<div style='display:none;' id='stud1'>
                        <ol>
                        <li><input type='radio' name='discount' value='0' checked='checked'/>Students -<b>0%</b> No discount on Tuition Fee</li>
                            
                        </ol>
                        </div></div>";// End of Student doesn't have discount

                   //For Honor Student
                   echo "<div class='row'> 
                   <div><a href='#' id='honor'>For Honor Student: </a></div>
                         
                    <div style='display:none;' id='honor1'>
                    <ol>
                    <li><input type='radio' name='discount' value='100'>Valedictorian-<b>100%</b> discount on Tuition Fee</li>
                    <li><input type='radio' name='discount' value='50'>Salutatorian-<b>50%</b> discount on Tuition Fee</li>
                     <ul>
                    <li><input type='radio' name='discount' value='55'>+5 w/ 3rd Siblings Enrolled <b>55%</b> discount on Tuition Fee</li>
                    <li><input type='radio' name='discount' value='57'>+7 w/ 2nd Siblings Enrolled <b>57%</b> discount on Tuition Fee</li>
                    
                    </ul>
                    </ol>

              
                    </div></div>";//End of Honor Student

                    //For transferees
                  echo "<div class='row'> 
                   <div><a href='#' id='transfer'>For Transferees: </a></div>
                         
                    <div style='display:none;' id='transfer1'>
                    <ol>

                    <li><input type='radio' name='discount' value='30'>1st Honors-<b>30%</b> discount on Tuition Fee</li>
                          <ul><li><input type='radio' name='discount' value='35'>+5 w/ 3rd Siblings Enrolled<b>35%</b> discount on Tuition Fee</li>
                              <li><input type='radio' name='discount' value='37'>+7 w/ 2nd Siblings Enrolled<b>37%</b> discount on Tuition Fee</li>
                          </ul>
                    <li><input type='radio' name='discount' value='20'>2nd Honors-<b>20%</b> discount on Tuition Fee</li>
                          <ul><li><input type='radio' name='discount' value='25'>+5 w/ 3rd Siblings Enrolled<b>25%</b> discount on Tuition Fee</li>
                              <li><input type='radio' name='discount' value='27'>+7 w/ 2nd Siblings Enrolled<b>27%</b> discount on Tuition Fee</li>
                          </ul>

                    <li><input type='radio' name='discount' value='10'>3rd Honors-<b>10%</b> discount on Tuition Fee</li>

                    <ul>
                    <li><input type='radio' name='discount' value='15'>+5 w/ 3rd Siblings Enrolled<b>15%</b> discount on Tuition Fee</li>
                    <li><input type='radio' name='discount' value='17'>+7 w/ 2nd Siblings Enrolled<b>17%</b> discount on Tuition Fee</li>
                    </ul>
                    </ol>

                    </div></div>";//End of Transferees


                    //For Old students
                  echo "<div class='row'> 
                   <div><a href='#' id='old'>For Old Students: </a></div>
                         
                     <div style='display:none;' id='old1'>
                    <ol>

                    <li><input type='radio' name='discount' value='50'>1st Honors-<b>50%</b> discount on Tuition Fee</li>
                          <ul><li><input type='radio' name='discount' value='55'>+5 w/ 3rd Siblings Enrolled<b>55%</b> discount on Tuition Fee</li>
                              <li><input type='radio' name='discount' value='57'>+7 w/ 2nd Siblings Enrolled<b>57%</b> discount on Tuition Fee</li>
                          </ul>
                    <li><input type='radio' name='discount' value='30'> 2nd Honors-<b>30%</b> discount on Tuition Fee</li>
                          <ul><li><input type='radio' name='discount' value='35'>+5 w/ 3rd Siblings Enrolled<b>35%</b> discount on Tuition Fee</li>
                              <li><input type='radio' name='discount' value='37'>+7 w/ 2nd Siblings Enrolled<b>37%</b> discount on Tuition Fee</li>
                          </ul>

                    <li><input type='radio' name='discount' value='20'>3rd Honors-<b>20%</b> discount on Tuition Fee</li>

                    <ul>
                    <li><input type='radio' name='discount' value='25'>+5 w/ 3rd Siblings Enrolled<b>25%</b> discount on Tuition Fee</li>
                    <li><input type='radio' name='discount' value='27'>+7 w/ 2nd Siblings Enrolled<b>27%</b> discount on Tuition Fee</li>
                    </ul>
                    </ol>

                    </div></div>";//End of Old Students


                    //For Siblings Enrolled
                  echo "<div class='row'> 
                   <div><a href='#' id='sibling'>For Every Siblings Enrolled: </a></div>
                         
                     <div style='display:none;' id='sibling1'>
                    <ol>

                    <li><input type='radio' name='discount' value='5'>2nd Child-<b>5%</b> discount on Tuition Fee</li>
                         
                    <li><input type='radio' name='discount' value='7'>3rd Child-<b>7%</b> discount on Tuition Fee</li>
                     

                    <li><input type='radio' name='discount' value='100'>4th Child-<b>100%</b> discount on Tuition Fee</li>

                  
                    </ol>

                    </div></div>";//End of Siblings enrolled
           


                  echo "</div></div>";
                  echo "<div class='row' id='button'>
                        

                        <input type='hidden' value='$previleges' name='username'>     
                        <button class='btn btn-danger' type='submit' name='update'  class='btn pull-right'>Update</button>
                        </div>";


                //This is for mode of payment
                }elseif(isset($_GET['modeofpayment'])){
                  $modeofpayment=$_GET['modeofpayment'];
                  $q="SELECT * from tbl_prospectivestudents where username='$modeofpayment'";
                  $r=mysql_query($q);


                  while($q=mysql_fetch_array($r)){

                            $user=$q['username'];
                            $level=$q['seeking'];
                            $date=$q['applieddate'];
                            $stat=$q['status'];
                            $sname=$q['surname'];
                            $fname=$q['firstname'];
                            $mname=$q['middlename'];
                           
                            $discount=$q['Discount'];
                            $mode=$q['Mode'];


                  }

                  if(isset($_POST['update1'])){
                  echo "<div class='alert alert-info'><span class='glyphicon glyphicon-info-sign'></span> Successful Update!</div>";


                  }
                  echo "<div class='row'>

                   <div id='column1' class='col-md-6 col-xs-6 col-offset-1'>";// For comlumn1 

                  echo "<div>Student ID: $user</div>";
                  echo "<div>Name: $sname, $fname, $mname</div>";
                  echo "<div>Grade: $level</div>";
                  echo "<div>Status: $stat</div></div>";

                  echo "<div id='column2' class='col-md-6 col-xs-6 col-offset-1'>";// For column2

                  echo "Mode of Payment: <select class='selectpicker'  name='cash' value='0'>
                                    "; 
                                    if($mode=='1'){
                                      echo "<option value='1'>full</option>";
                                      echo "<option value='2'>Installment</option>";
                                      
                                    }elseif($mode='2'){
                                      echo "<option value='2'>Installment</option>";
                                      echo "<option value='1'>full</option>";
                                      

                                    }
                                    

                                    

                                  echo "</select>";

                  echo "</div></div>";
                  echo "<div class='row' id='button'>

                        <input type='hidden' value='$modeofpayment' name='username'>     
                        <button class='btn btn-danger' type='submit' name='update1'  class='btn pull-right'>Update</button>
                        <a href='tuition.php?tuition=$user' class='btn btn-danger'>Back</a></div>";



                }else{

                ?>

                
                <div class='demo_jui'>
                              <table cellpadding='0' cellspacing='1' border='1' class='display' id='tbl' class='jtable'>
                              <thead>
                                              <tr>
                                            
                                              <th bgcolor='#FCAC45'><center>Student ID number</center></th>
                                              <th bgcolor='#FCAC45'><center>Surname</center></th>
                                              <th bgcolor='#FCAC45'><center>Firstname</center></th>
                                              <th bgcolor='#FCAC45'><center>Middlename</center></th>
                                              <th bgcolor='#FCAC45'><center>Action</center></th>
                                              </tr>

                                              </thead>
                                          
                                        
                            <?php 
                            include('config.php');

                            $qry="SELECT * from tbl_prospectivestudents where applicant_number!='0' and status='new student'";
                            $result=mysql_query($qry);

                            
                            while($qry = mysql_fetch_array($result)) {

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

                           


                            echo "<tr><td>$user</td><td>$sname</td><td>$fname</td><td>$mname</td><td> <center><a href='?tuition=$user'><img src='viewaccount.png' width='130px' height='40px'></a></center></a></tr>";
                            
                            } 
                          

                       

                             
                    ?>
                </table></div>


                 
                 <?php }?>
                   
         
                            
                            
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
                



