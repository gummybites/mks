<?php 
session_start();
include('config.php');
if(!isset($_SESSION['email'])){
header('Location: seniorhighlogin.php');
exit;

}else{

$_SESSION['email'];
$email=$_SESSION['email'];

$qry="SELECT email, seeking, status, surname,firstname from tbl_studentregistration where email='$email' and seeking='Grade 11'";
$res=mysql_query($qry);

while($qry=mysql_fetch_array($res)){
  $db_email=$qry['email'];
  $db_seeking=$qry['seeking'];
  $db_status=$qry['status'];
   $db_surname=$qry['surname'];
    $db_firstname=$qry['firstname'];
}


 ?>
<?php 
         

                            
                            
                            if(isset($_POST['submit']))
                          {
                             
                              $year = $_POST ['year'];
                              $applied = date('F j,Y');
                              $Sname=mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST['surname']))));
                              $Fname=mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST['firstname']))));
                              $Mname=mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST['middlename']))));
                          
                              $per = mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST['permanent']))));
                              $tele = mysql_real_escape_string(htmlspecialchars(trim($_POST ['telephone'])));
                              $mobi = mysql_real_escape_string(htmlspecialchars(trim($_POST['mobile'])));

                              $month= $_POST['month'];
                              $day= $_POST['day'];
                              $years= $_POST['years'];
                              $birthday= $month.'/'.$day.'/'.$years;
                              $age =  date('Y')-$years;


                              $Sex= mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST ['gender']))));
                              $bplace = mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST ['birthplace']))));
                              $reli = mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST['religion']))));

                              $gname= mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST ['guardianname']))));
                              $gadd = mysql_real_escape_string(htmlspecialchars(trim(ucfirst($_POST ['guardianaddress']))));
                              $gcon = mysql_real_escape_string(htmlspecialchars(trim($_POST['guardiancontact'])));
                         
                              
                               $qry = "SELECT * from tbl_prospectivestudents";
                                $result = mysql_query($qry);

                                if(mysql_num_rows($result) >= 0)
                                {
                                $x = 1; 
                                while($qry = mysql_fetch_array($result))
                                { 
                                $x++; 
                                } 

 
                                }
                                 
                             
                               

                                 
                                         //inserting application data
                                        $forms=("INSERT into tbl_prospectivestudents 
                                        (id,email,year,seeking,applieddate,status,surname,firstname,middlename,prospectivestatus) 
                                        
                                        VALUES ('$x','$email','$year','$db_seeking','$applied','$db_status','$Sname','$Fname','$Mname','PENDING')");
                                        mysql_query($forms);

                                        $details=("INSERT INTO tbl_studentdetails (id,peraddress,telephone,mobile,birthdate,age,gender,birthplace,religion,guardianname,guardianaddress,guardiancontact) VALUES ('$x','$per','$tele','$mobi','$birthday','$age','$Sex','$bplace','$reli','$gname','$gadd','$gcon')");
                                        mysql_query($details);

                                        mysql_query("INSERT INTO  tbl_studentrequirements (id) values ('$x')");

                                        header('url=seniorhighapplicationform.php?Success!');

                              

                             
    

                        }

                          ?>

<!DOCTYPE html>

<head>

                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Application Form</title>
                    <link rel="stylesheet" href="../../css/bootstrap.min.css"></link>
                    <link rel="stylesheet" href="../../css/style.css"></link>

                    <script src="../../js/dropdown.js"></script>
                    <script src="../../js/bootstrap.min.js"></script>
                    <script src="../../js/jquery.1.11.1.js"></script>
                    <script src="../../js/bootstrap.js"></script>
                    <script src="../../js/validation.js"></script>

<style>
                    body{
                 

                    }

                     #main{
                      margin-top: 55px;

                    }

                    #form{
                     background-color: #fFF ;
                    box-shadow: 2px 2px 7px 2px #001111;   
                     -moz-box-shadow: 2px 2px 7px 2px #001111;   
                     -webkit-box-shadow: 2px 2px 7px 2px #001111; 

                    }

                   

                    .btn-danger{
                      border-radius: 0px;

                    }
                    

                    .form-control{
                      background-color: #fff;
                      background-newupload: none;
                      border: 1px solid #ccc;
                      border-right: #fff;
                      -moz-border-right: transparent;
                      -webkit-border-right: transparent;
                      box-shadow-right: transparent;
                      -moz-box-shadow-right: transparent;
                      border-radius: 0px;
                   
                    }

                    .form-control:focus{
                  
                      -webkit-box-shadow: #d9edf7;
                      box-shadow: #d9edf7;
                      -webkit-transition: none;
                      -o-transition: none;
                      transition: none;

                    }
                 
                    #applicant{
                      background: #d9edf7;
                      height: 30px;

                    }#applicant p{
                      font-family: Arial;
                      text-align: center;
                      font-size: 20px;
                    }

                    #motherinformation{
                      background: #d9edf7;
                      height: 30px;

                    }#motherinformation p{
                      font-family: Arial;
                      text-align: center;
                      font-size: 20px;
                    }

                    #fatherinformation{
                      background: #d9edf7;
                      height: 30px;

                    }#fatherinformation p{
                      font-family: Arial;
                      text-align: center;
                      font-size: 20px;
                    }


                    #guardianinformation{
                      background: #d9edf7;
                      height: 30px;

                    }#guardianinformation p{
                      font-family: Arial;
                      text-align: center;
                      font-size: 20px;
                    }
                                    
                    .input-group-addon{
                      background-color: #fff;
                      border-radius: 0px;
                     

                    }.input-group-addon:focus{
                       -webkit-box-shadow: #d9edf7;
                      box-shadow: #d9edf7;
                      -webkit-transition: none;
                      -o-transition: none;
                      transition: none;
              

                    }
                     #months{
                      
                      border-right: none;
                      background: #fff;
                      border-radius: 0px;
                      height: 34px;
                      -webkit-box-shadow: #d9edf7;
                      box-shadow: #d9edf7;
                      -webkit-transition: none;
                      -o-transition: none;
                      transition: none;
                    }

                    #years{
                      border-radius: 0px;
                      height: 34px;
                      border-right: none;
                      background: #fff;
                      -webkit-box-shadow: #d9edf7;
                      box-shadow: #d9edf7;
                      -webkit-transition: none;
                      -o-transition: none;
                      transition: none;
                    
                    }


                    .glyphicon-asterisk{
                      color: #444400;
                      font-size: 10px;

                    }

                   .glyphicon-ok-sign{
                      color: green;
                      font-size: 10px;
                    }

                    .glyphicon-ok{
                      color: green;
                      font-size: 10px;
                    }

                    .glyphicon-exclamation-sign{
                      color: green;
                      font-size: 10px;
                    }

                   
                    #form .btn {
                     border-radius: 1px;
                     -moz-border-radius: 1px;
                     -webkit-border-radius: 1px;

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
                          
                          outline: none;
                          background: white;
                      
                      }

                      #underline{
                        border-top: 1px solid black;


                      }


</style>

</head>
<body>


   <nav id='menu' class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
               
            </div>

           <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="seniorhighlogout.php">Logout</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    </nav>   

<section class="light-bg">
<div id="main" class="col-md-12 content col-xs-12 col-offset-1">
    <div class="container">
            
         




          
        
              <form   onsubmit='return freshmanapplication()'  method="POST"  enctype="multipart/form-data">


                        <?php   
                        //if the button submit is set
               

                         $qry="SELECT * from tbl_prospectivestudents inner join tbl_studentdetails on tbl_prospectivestudents.id=tbl_studentdetails.id where email='$email' ";
                          $res=mysql_query($qry);

                          if($qry=mysql_fetch_array($res)){
                            
                            $db_email=$qry['email'];
                            $year=$qry['year'];
                            $level=$qry['seeking'];
                            $date=$qry['applieddate'];
                            $stat=$qry['status'];

                            $sname=$qry['surname'];
                            $fname=$qry['firstname'];
                            $mname=$qry['middlename'];

                            $per=$qry['peraddress'];
                            $tele=$qry['telephone'];
                           
                            $mob=$qry['mobile'];

                            $birt=$qry['birthdate'];
                            $ages=$qry['age'];

                            $sex=$qry['gender'];
                            $place=$qry['birthplace'];
                     
                            $reli=$qry['religion'];
                            $gname=$qry['guardianname'];
                            $gadd=$qry['guardianaddress'];
                            $gcon=$qry['guardiancontact'];
                      
                      





                            //Kung may laman na ang table
                    if($db_email==0){

                          ?>
                           <div class='row'>
                          <a href='seniorhighapplicationform.php' onclick="myFunction()"><img src='postprinticon.png'></a>
                            </div>

                           <div class='text-center'>.
                             <div class='row'>
                              <img src='../../img/mkslogo.png' class='pull-left' width="150px" height="150px"> 
                              </div>

                                <b>MARIA KATRINA SCHOOL</b>
                                <p>No. 10 Mendoza St. Saog, Marilao, Bulacan</p>
                                
                                <h2 ><strong>APPLICATION FOR ADMISSION </strong></h2>

                                </div>

                                            
                                            <div id='applicant' ><p>APPLICANT INFORMATION</p></div>

                                            
                                            <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="schoolyear">S.Y:</p> 
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="application"></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="application">Seeking admission as:</p> 
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                              <b><?php echo $year; ?></b>
                                            </div><!--//school year -->



                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                             
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                              <b><?php echo $level; ?> </b>
                                              
                                            </div><!--//seeking admission as -->

                                            </div>


                                           
                                            
                                          

                                            </div><!--//row group -->
                                          

                                            <br>

                                            <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="dateapplied">Applied Date:</p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="dateapplied"></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="dateapplied">Status: </p> 
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                <b> <?php echo $date; ?> </b>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                               
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                 <b><?php echo $stat; ?> </b>
                                            </div><!--//seeking admission as -->

                                            </div>

                                            </div><!--//row group -->
                                            <br>


                                            <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="name">Surname:</p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="firstname">Firstname:</p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="middlename">Middlename:</p>
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                <b> <?php echo $sname; ?> </b>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                 <b><?php echo $fname; ?> </b>
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                 <b><?php echo $mname; ?> </b>
                                            </div><!--//seeking admission as -->

                                            </div>

                                            </div><!--//row group -->
                                            <br>


                                             <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Permanent Home Address: </p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                           
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Telephone number:</p>
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                               <b><?php echo $per; ?> </b>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                              
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                               <b><?php echo $tele; ?> </b>
                                              
                                            </div><!--//seeking admission as -->

                                            </div>

                                            </div><!--//row group -->
                                            <br>

                                            <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Mobile number:</p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Birthdate:</p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                             <p>Age:</p> 
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                <b> <?php echo $mob; ?> </b>
                                            </div><!--//mobile number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                 <b><?php echo $birt; ?> </b>
                                            
                                            </div><!--//Birthdate -->


                                          

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                  <b><?php echo $ages; ?> </b>
                                            </div><!--//Age -->

                                            </div>

                                            </div><!--//row group -->
                                            <br>

                                  <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Gender:</p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Birthplace:</p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Religion:</p>
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                 <b><?php echo $sex; ?> </b>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                 <b><?php echo $place; ?>  </b>
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                               <b><?php echo $reli; ?> </b>
                                            </div><!--//seeking admission as -->

                                            </div>
                 

                                            </div><!--//row group -->
                                            <br>

                                             <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Guardian's name:</p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Address:</p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Contact:</p>
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                 <b><?php echo $gname; ?> </b>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                 <b><?php echo $gadd; ?>  </b>
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                               <b><?php echo $gcon; ?> </b>
                                            </div><!--//seeking admission as -->

                                            </div>
                 

                                            </div><!--//row group -->
                                            <br>
                                           
                                               <div class='row-group'>
                                             <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                               
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                               <b id='underline'>Applicant's signature </b>
                                            </div><!--//seeking admission as -->

                                            </div>
                                            </div>
                                            <br>

                                   
                                     


                          <?php

                             }

                          //kapag may nakikitang laman ang table

                             }else{


                           ?>
                               
                         
                                <div class='row'>
                              <img src='../../img/mkslogo.png' class='pull-left' width="150px" height="150px"> 
                              </div>

                                <div class='text-center'>
                                <b>MARIA KATRINA SCHOOL</b>
                                <p>No. 10 Mendoza St. Saog, Marilao, Bulacan</p>
                                <h2 ><strong>APPLICATION FOR ADMISSION </strong></h2>
                                </div>

                                            <div class='row'>
                                            <div class='col-md-6'>
                                            <div><i  id="error" style="color: Red; display: none">NOTE: Special characters are not allowed!!</i>

                                            <div><i id='validateemail' ></i></div>
                                            <div><i id='validatepassword' ></i></div>
                                            <div><i id='validateconfirmpassword' ></i></div>
                                            <div><i id='validatecaptcha' ></i></div></div>
                                            </div></div>
                                            <br>

                                            <div id='applicant' ><p>APPLICANT INFORMATION</p></div>

                                             
                                            
                                            <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="schoolyear">S.Y: (required)  </p> 
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                          
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="application">Seeking admission as: </p> 
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                               <select class='form-control'   id="year" name="year" >

                                                                    <option></option>
                                                                    <option><?php 
                                                                      $schoolyear= date('Y')+1;
                                                                      $nextyear= $schoolyear+1;
                                                                      $totalyear= "$schoolyear - $nextyear";
                  
                                                                    echo $totalyear; ?></option>
                                                                   

                                                </select> 
                                              <span id='validation-addon' class="input-group-addon">
                                                 <i id="sy"></i>
                                              </span>
                                            </div>
                                            </div><!--//school year -->



                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                              

                                            </div>
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                            
                                            <b><?php 

                                                    echo $db_seeking;
                                                    ?></b>


                                            </div>
                                            </div><!--//seeking admission as -->

                                            </div>

                                            </div><!--//row group -->
                                          

                                            <br>




                                            <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="dateapplied">Applied Date: <span class="glyphicon glyphicon-ok-sign"></span></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                                </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="dateapplied">Status: </p> 
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                     
                                                
                                           

                                              
                                                <b><?php 
                                                    $applied = date("F j,Y");
                                                    echo "$applied";
                                                    ?></b>
                                                 
                                              


                                            </div>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                              
                                                 
                                             


                                            </div>
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                                <b><?php 
                                                  echo $db_status;
                                                    ?></b>


                                            </div>
                                            </div><!--//seeking admission as -->
                                            </div>
                                            </div><!--//row group -->
                                            <br>




                                            <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="name">Surname: <i id='validatesurname'>(required)</i></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="firstname">Firstname: <i id='validatefirstname'>(required)</i> </p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="middlename">Middlename: <i id='validatemiddlename'>(Optional)</i></p>
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                           
                                                <input class='form-control' type='text' onkeypress="return forsurname(event);" ondrop="return false;" onpaste="return false;"  id='surname' name='surname' maxlength="25" placeholder='Type your surname..' value='<?php echo  $db_surname?>'/>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                                 <i id='sur'></i>
                                              </span>


                                            </div>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                               <input class='form-control' type='text' id='firstname' onkeypress="return forfirstname(event);" ondrop="return false;" onpaste="return false;"  name='firstname' maxlength="25" placeholder='Type your firstname..' value='<?php echo  $db_firstname?>'/>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                                 <i id='first'></i>
                                              </span>


                                            </div>
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                                <input class='form-control' type='text' id='middlename' onkeypress="return formiddlename(event);" ondrop="return false;" onpaste="return false;" maxlength="25" name='middlename'  placeholder='Type your middlename..' value=''/>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                              <i id='middle'></i>
                                              </span>


                                            </div>
                                            </div><!--//seeking admission as -->

                                            </div>
                                            </div><!--//row group -->
                                            <br>













                                             <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Permanent Home Address: <i id='validatepermanent'>(required)</i></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                           
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Telephone number: <i id='validatetelephone'>(Optional)</i> </p>
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                                <input class='form-control' type='text' id='permanent' onkeypress="return forpermanent(event);" ondrop="return false;" onpaste="return false;" placeholder='Type your home address..' maxlength="35" value='' name='permanent'/>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                                <i id="per"></i>
                                              </span>


                                            </div>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                              


                                            </div>
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                                <input class='form-control' type='text' id='telephone' onkeypress="return fortelephone(event);" ondrop="return false;" onpaste="return false;"  placeholder='Type your telephone number..' maxlength="7" value='' name='telephone'/> 
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                               <i id="tele"></i>
                                              </span>


                                            </div>
                                            </div><!--//seeking admission as -->
                                            </div>
                                            </div><!--//row group -->
                                            <br>















                                            <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Mobile number: <i id='validatemobile'>(required)</i></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Birthdate: (required) <i> (Day/Month/Year)</i></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                             <p>Age: <span class="glyphicon glyphicon-ok-sign"></span></p> 
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                              

                                                <input class='form-control' type='text' id='mobile' onkeypress="return formobile(event);" ondrop="return false;" onpaste="return false;" placeholder='Type your mobile number here..' maxlength='11' value='' name='mobile' />
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                               <i id="mobi"></i>
                                              </span>


                                            </div>
                                            </div><!--//mobile number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                           
                                                
                                                <select  class='form-control'  id='days' name="day">
                                                      <option></option>
                                                </select>

                                                <span class="input-group-btn">
                                                <select class='btn btn-default'  id='months' name="month">
                                                    <option></option>
                                                </select>
                                              </span>

                                              <span  class="input-group-btn">
                                                <select  class='btn btn-default'  id='years' name="years">
                                                     <option></option>
                                                </select>
                                              </span>
                                              <span id='validation-addon' class="input-group-addon">
                                              <i id="birth"></i>
                                              </span>
                                            </div>
                                            
                                            </div><!--//Birthdate -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                              <label class='form-control' id='age' value=''></label>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                              
                                              </span>

                                            </div>
                                            </div><!--//Age -->
                                            </div>
                                             </div><!--//row group -->
                                            <br>

                                  <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Gender: (required)</p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Birthplace: <i id='validatebirthplace'>(required)</i></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Religion: (required)</p>
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                                <select class='form-control' id="gender" name="gender">
                                                  <option></option>
                                                  <option>Female</option>
                                                  <option>Male</option>


                                                </select>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                              <i id="gen"></i>
                                              </span>


                                            </div>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                              <input class='form-control' type='text' onkeypress="return forbirthplace(event);" ondrop="return false;" onpaste="return false;"  id="birthplace" placeholder='Type your birthplace here..' maxlength="35" name="birthplace" />
                                              <span id='validation-addon' class="input-group-addon">
                                              <i id="places"></i>
                                              </span>
                                            </div>
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">

                                                <select class='form-control' id='religion' name='religion'>
                                                  <option>                                       </option>
                                                  <option>4TH WATCH                                         </option>
                                                  <option>7TH DAY ADVENTIST</option>
                                                  <option>AGLIPAY</option>
                                                  <option>ALLIANCE</option>
                                                  <option>ANGLICAN</option>
                                                  <option>APOSTOLIC CHRISTIAN</option>
                                                  <option>ASSEMBLY OF GOD</option>
                                                  <option>BAHA FAITH</option>
                                                  <option>BAPTIST</option>
                                                  <option >BAYAN NG KATOTOHANAN                              </option>
                                                  <option >BELIEVER IN CHRIST                                </option>
                                                  <option >BIBLE BELIEVING CHRISTIANS</option>
                                                  <option >BIBLE CHURCH                                      </option>
                                                  <option >BIBLICAL CHRISTIAN                                </option>
                                                  <option >BORN AGAIN CHRISTIAN</option>
                                                  <option >BUDDHIST</option>
                                                  <option >CATHOLIC</option>
                                                  <option >CHRISTIAN</option>
                                                  <option >CHRISTIAN BRETHREN                                </option>
                                                  <option >CHRISTIAN EVANGELICAL</option>
                                                  <option >CHURCH OF CHRIST</option>
                                                  <option >CHURCH OF GOD</option>
                                                  <option >CRUSADERS</option>
                                                  <option >EPISCOPALIAN                                      </option>
                                                  <option >EVANGELICAL CHRISTIAN</option>
                                                  <option >FULL GOSPEL</option>
                                                  <option >HINDUISM</option>
                                                  <option >IGLESIA NI CRISTO</option>
                                                  <option >JEHOVAHS WITNESS</option>
                                                  <option >JESUS IS LORD                                     </option>
                                                  <option >LATTER DAY SAINTS</option>
                                                  <option >METHODIST</option>
                                                  <option >MOST HOLY CHURCH OF CHRIST</option>
                                                  <option >ISLAM</option>
                                                  <option >PENTECOST</option>
                                                  <option >PHILADELPHIA OF GOD</option>
                                                  <option >PHILIPPINE INDEPENDENT CHURCH</option>
                                                  <option >PROTESTANT</option>
                                                  <option >SAGRADA FAMILIA                                   </option>
                                                  <option >SIKHISM</option>
                                                  <option >SPIRITIST</option>
                                                  <option >TAOISM                                            </option>
                                                  <option >WORLD WIDE CHURCH OF GOD</option>
                                                  <option >IGLESIA NG BATHALANG BUHAY</option>
                                                  <option >IGLESIA DELA SAGRADA FAMILIA</option>
                                                  <option >IGLESIA NG DIOS KAY CRISTO JESUS</option>
                                                  <option >LUTHERAN</option>
                                                  <option >IGLESIA FILIPINA INDEPENDIENTE</option>
                                                  <option >EVANGELICAL BRETHREN</option>
                                                  <option >INDEPENDIENTE</option>
                                                  <option >MEMBERS CHURCH OF GOD INTERNATIONAL</option>
                                                  <option >IGLESIA EVANGELICA METODISTA EN LAS ISLAS FILIPINA</option>
                                                  <option >GOSPEL OF CHRIST</option>
                                                  <option >FREE THINKER</option>
                                                  <option >UNITED CHURCH OF CHRIST IN THE PHILIPPINES</option>
                                                  <option>OTHERS</option>



                                              
                                                </select>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                              <i id="reli"></i>
                                              </span>


                                            </div>
                                            </div><!--//seeking admission as -->

                                            </div>
                                            </div><!--//row group -->
                                            <br>
                                          
                                             <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="name">Guardian's name: <i id='validateguardianname'>(required)</i></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="firstname">Address: <i id='validateguardianaddress'>(required)</i> </p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="middlename">Mobile number: <i id='validateguardiancontact'>(required)</i></p>
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                           
                                                <input class='form-control' type='text' onkeypress="return forguardianname(event);" ondrop="return false;" onpaste="return false;"  id='guardianname' name='guardianname' maxlength="25" placeholder="Type your guardian's name.." value=''/>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                                 <i id='gname'></i>
                                              </span>


                                            </div>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                               <input class='form-control' type='text' id='guardianaddress' onkeypress="return forguardianaddress(event);" ondrop="return false;" onpaste="return false;"  name='guardianaddress' maxlength="25" placeholder='Type your guardianaddress..' value=''/>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                                 <i id='gadd'></i>
                                              </span>


                                            </div>
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                                <input class='form-control' type='text' id='guardiancontact' onkeypress="return forguardiancontact(event);" ondrop="return false;" onpaste="return false;" maxlength="11" name='guardiancontact'  placeholder='Type your guardiancontact..' value=''/>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                              <i id='gcon'></i>
                                              </span>


                                            </div>
                                            </div><!--//seeking admission as -->

                                            </div>
                                            </div><!--//row group -->
                                            <br>

                                

                                      
                                       
                                        

                                    


                                <br>

                                <div class="row form-group">
                              <input type="hidden" name="prospectivestatus" value="pending">
                            <div class="col-md-4 col-xs-4 col-offset-1"></div>
                            <div class="col-md-4 col-xs-4 col-offset-1"></div>
                            <div class="col-md-4 col-xs-4 col-offset-1">
                                <button type="submit"  name="submit"  value="Submit" class="btn btn-danger">Submit</button>
                                <a href='seniorhighapplicationform.php' class='btn btn-danger'>Clear</a>
                            </div>
                            </div>
                           
                            <?php



                        }
                      



                        ?> 
                             </form>
                       


                          

                           
                   
       







              




        
        </div>


  		
</div>
 <!-- //Collect the nav links, forms, and other content for toggling -->
</section>









</body>
</html>
<?php }?>
