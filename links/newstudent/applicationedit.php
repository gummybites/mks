<?php 
session_start();
include('config.php');
if(!isset($_SESSION['username'])){
header('Location: newstudentform.php');
exit;

}else{
	
$_SESSION['username']; 



$username = $_SESSION['username'];




$qry ="SELECT * from tbl_prospectivestudents WHERE username = '$username' ";
$result = mysql_query($qry);
while($qry = mysql_fetch_array($result))
{
                              $user = $qry['username'];
                              $Year = $qry ['year'];
                              $Seek = $qry['seeking'];
                              $Stat = $qry ['status'];
                              $Sname= $qry['surname'];
                              $Fname= $qry['firstname'];
                              $Mname= $qry['middlename'];
                              $Per = $qry['peraddress'];
                              $Tele = $qry ['telephone'];
                              $Pre = $qry ['preaddress'];
                              $Mobi = $qry['mobile'];
                              $Bday = $qry ['birthdate'];
                              $Age = $qry ['age'];
                              $Sex = $qry['gender'];
                              $Bplace = $qry ['birthplace'];
                              $Reli = $qry['religion'];
                              $Fatn = $qry ['fathername'];
                              $Foccu = $qry['fatheroccupation'];
                              $Fcon = $qry ['fathercontact'];
                              $Motn = $qry ['mothername'];
                              $Moccu = $qry['mothersoccupation'];
                              $Mcon = $qry ['mothercontact'];
                
                              $Guar = $qry ['guardianname'];
                              $Gadd = $qry['guardianaddress'];
                              $Gcon = $qry ['guardiancontact'];
                              $Tran = $qry ['reason'];
                              $Old = $qry['lastschool'];
                              $Sadd = $qry ['schooladdress'];
                              $Syear = $qry ['schoolyear'];
                              

}


 ?>


<!DOCTYPE html>
<html>
            <head>
                <title>Application form</title>
                <link rel="stylesheet" href="../../css/bootstrap.min.css"></link>
                <link href="../../fonts/font-awesome/css/font-awesome.css" rel="stylesheet" />
                
     


                 <script type="text/javascript">

function register(){
    
    var x = new Array();
    x[0] = document.getElementById('year').value;
    x[1] = document.getElementById('seeking').value;
    x[2] = document.getElementById('status').value;
    x[3] = document.getElementById('permanent').value;
    x[4] = document.getElementById('telephone').value;
    x[5] = document.getElementById('present').value;
    x[6] = document.getElementById('mobile').value;
    x[7] = document.getElementById('birth').value;
    x[8] = document.getElementById('age').value;
    x[9] = document.getElementById('gender').value;
    x[10] = document.getElementById('place').value;
    x[11] = document.getElementById('religion').value;
    x[12] = document.getElementById('father').value;
    x[13] = document.getElementById('foccupation').value;
    x[14] = document.getElementById('fcontact').value;
    x[15] = document.getElementById('mother').value;
    x[16] = document.getElementById('moccupation').value;
    x[17] = document.getElementById('mcontact').value;
    x[18] = document.getElementById('guardian').value;
    x[19] = document.getElementById('gaddress').value;
    x[20] = document.getElementById('gcontact').value;
    x[21] = document.getElementById('elementary').value;
    x[22] = document.getElementById('saddress').value;
    x[23] = document.getElementById('syear').value;
    x[24] = document.getElementById('award').value;
   


    var h = new Array();
    h[0] = "<span style='color:red'>Please select year first!</span>";
    h[1] = "<span style='color:red'>Please select grade first</span>";
    h[2] = "<span style='color:red'>Please select status first!</span>";
    h[3] = "<span style='color:red'>Please type your permanent address first!</span>";
    h[4] = "<span style='color:red'>Please type your telephone number first!</span>";
    h[5] = "<span style='color:red'>Please type your present address first!</span>";
    h[6] = "<span style='color:red'>Please type your mobile number first!</span>";
    h[7] = "<span style='color:red'>Please select birthdate first!</span>";
    h[8] = "<span style='color:red'>Please type your age first!</span>";
    h[9] = "<span style='color:red'>Please select gender first!</span>";
    h[10] = "<span style='color:red'>Please type your birthplace first!</span>";
    h[11] = "<span style='color:red'>Please type your religion first!</span>";
    h[12] = "<span style='color:red'>Please type your father's name first!</span>";
    h[13] = "<span style='color:red'>Please type your father's occupation first!</span>";
    h[14] = "<span style='color:red'>Please type your father's contact first!</span>";
    h[15] = "<span style='color:red'>Please type your mother's name first!</span>";
    h[16] = "<span style='color:red'>Please type your mother's occupation first!</span>";
    h[17] = "<span style='color:red'>Please type your mother's contact first!</span>";
    h[18] = "<span style='color:red'>Please type your guardian's name first!</span>";
    h[19] = "<span style='color:red'>Please type your guardian's address first!</span>";
    h[20] = "<span style='color:red'>Please type your guardian's contact first!</span>";
    h[21] = "<span style='color:red'>Please type your Last school attended first!</span>";
    h[22] = "<span style='color:red'>Please type your Last school address first!</span>";
    h[23] = "<span style='color:red'>Please type your Last school year first!</span>";
    h[24] = "<span style='color:red'>Please type your honors/award received first!</span>";
 
  


    var divs = new Array("sy","seek","newtrans","sname","fname","mname","add","tele","pre","mobi","birt","ages","gen","places","citi","reli","civ","fathers","foccu","fcon","mothers","moccu","mcon","guardians","gadd","gcon","elem","sadd","years","awards"); 
    
        
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
            </head>
            <style>
               #menu-top li>a{
                color: #fff;
                 background-color: transparent;

            }

            #menu-top #dropdown a{
                color: #000;


            }
         

            .menu-section ul .menu-section li{
                    list-style-type: none;
                  
            }

            .menu-section li{
                list-style-type: none;
                float: left;
            }

            .menu-section .nav > li > a:hover,.menu-section .nav > li > a:focus {
               color: #FCAC45 !important;
                background-color: transparent;
                font-weight: 700;
            }

            .menu-section .dropdown-menu > ol > a:hover,.menu-section .dropdown-menu > ol > a:focus {
              color: #FCAC45 !important;
            background-color: transparent;
            font-weight: 700;
            }

            
            /* =============================================================
               HEADER SECTION STYLES
             ============================================================ */
            header {
                background-color: #F0677C;
                color: #fff;
                padding: 10px;
                text-align: right;
            }

            /* MENU LINKS SECTION*/

            .menu-section {
                background-color: #202020 !important;
            }

            #menu-top a {
                color: #FFF;
                text-decoration: none;
                font-weight: 500;
                padding: 10px 10px 10px 10px;
                text-transform: uppercase;
            }


      
            .home{
                background: url(../../img/bg.png);
                background-size: 30%;
                background-attachment: fixed;
                background-repeat: repeat;
                color: #cfcfcf;

            }

            .navbar-inverse {
                  background: -moz-linear-gradient(top,  rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.73) 17%, rgba(0,0,0,0.66) 35%, rgba(0,0,0,0.55) 62%, rgba(0,0,0,0.4) 100%); /* FF3.6+ */
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0.8)), color-stop(17%,rgba(0,0,0,0.73)), color-stop(35%,rgba(0,0,0,0.66)), color-stop(62%,rgba(0,0,0,0.55)), color-stop(100%,rgba(0,0,0,0.4))); /* Chrome,Safari4+ */
                background: -webkit-linear-gradient(top,  rgba(0,0,0,0.8) 0%,rgba(0,0,0,0.73) 17%,rgba(0,0,0,0.66) 35%,rgba(0,0,0,0.55) 62%,rgba(0,0,0,0.4) 100%); /* Chrome10+,Safari5.1+ */
                background: -o-linear-gradient(top,  rgba(0,0,0,0.8) 0%,rgba(0,0,0,0.73) 17%,rgba(0,0,0,0.66) 35%,rgba(0,0,0,0.55) 62%,rgba(0,0,0,0.4) 100%); /* Opera 11.10+ */
                background: -ms-linear-gradient(top,  rgba(0,0,0,0.8) 0%,rgba(0,0,0,0.73) 17%,rgba(0,0,0,0.66) 35%,rgba(0,0,0,0.55) 62%,rgba(0,0,0,0.4) 100%); /* IE10+ */
                background: linear-gradient(to bottom,  rgba(0,0,0,0.8) 0%,rgba(0,0,0,0.73) 17%,rgba(0,0,0,0.66) 35%,rgba(0,0,0,0.55) 62%,rgba(0,0,0,0.4) 100%); /* W3C */
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cc000000', endColorstr='#66000000',GradientType=0 ); /* IE6-9 */
                height: 130px;
                border-color: transparent;

            }

            .navbar-toggle {
                background-color: #F0677C;
                border: 1px solid #fff;
            }

            .navbar {
                margin-bottom: 0px;

            }

            #head{

                 color: #FCAC45  ;
            }

             #wrapper {
                  width: 100%;
                   background: url(../../img/bg.png);
                    background-size: 30%;
                    background-attachment: fixed;
                    background-repeat: repeat;
              }

              #page-wrapper {
                  padding: 15px 15px;
                  min-height: 600px;
                  background:#FFF;
                 
              }
              #page-inner {
                  width:100%;
                  margin:10px 20px 10px 0px;
                  background-color: #F3F3F3!important;
                  padding:10px;
                  min-height:400px;



              }


              /*==============================================
                  MENU STYLES    
                  =============================================*/




              .active-menu {
                  background-color:#F3F3F3!important;
                  
              }

              .sidebar-collapse .nav > li > a {
                text-align: center;
                text-shadow:none;
                background-color: transparent;
                font-weight: 700;

                
              }

              .sidebar-collapse > .nav > li {
                border-bottom: 0px solid rgba(107, 108, 109, 0.19);
              }
              .sidebar-collapse .nav > li > a:hover {
                
                color: #FCAC45 !important;
                outline:0;
              }


              .navbar-side {
                border:none;
                background: url(../../img/bg.png);
                background-size: 30%;
                background-attachment: fixed;
                background-repeat: repeat;
                
              }

              .nav > li > a > i {
                  margin-right:10px;
              }

              /*==============================================
                  MEDIA QUERIES     
                  =============================================*/
               
               @media(min-width:768px) {
                   #page-wrapper{
                      margin: 0 0 0 260px;
                      padding: 15px 30px;
                      min-height: 446px;
                  
                  }
                
                
                  .navbar-side {
                      z-index: 1;
                      position: absolute;
                      width: 260px;
                  }

                 .navbar {
                     border-radius: 0px; 

              }
                 
              }

              /* =============================================================
                INPUT SECTION STYLES
                ============================================================ */
                label {
                float: middle;
                font-size: 10px;
                font-weight: 400;
                font-family: 'Open Sans', sans-serif;
            }

            i{
                font-size: 12px;
                font-weight: 400;
                font-family: 'Open Sans', sans-serif;

            }
            #contact .form-control {
               
                width: 100%;
                padding: 6px 50px;
                font-size: 14px;
                line-height: 1.42857143;
                color: #555;
                background-color: #fff;
                background-image: none;
                border: 1px solid #ccc;
                border-radius: 0px;
                -webkit-box-shadow: none;
                box-shadow: none;
                -webkit-transition: none;
                -o-transition: none;
                transition: none;
            }
            #contact .form-control{
            border-top: none;
            border-left: none;
            border-right: none;
            background-color: transparent;
          }

            #contact .form-control:focus {
                border-color: inherit;
                outline: 0;
                -webkit-box-shadow: transparent;
                 box-shadow: transparent;
            }

            button.btn.tf-btn.btn-default {
                float: right;
                background: #FCAC45;
                border: 0;
                border-radius: 0;
                padding: 10px 40px;
                color: #ffffff;
                text-transform: uppercase;
            }

                .btn:active, .btn.active {
                    background-image: none;
                    outline: 0;
                    -webkit-box-shadow: none;
                    box-shadow: none;
                }

                .btn:focus, 
                .btn:active:focus, 
                .btn.active:focus, 
                .btn.focus, 
                .btn:active.focus, 
                .btn.active.focus {
                 outline: thin dotted;
                 outline: none;
                 outline-offset: none;
                }

            /* =============================================================
               FOOTER SECTION STYLES
             ============================================================ */
            footer {
                padding: 10px;
                color: #000;
                font-size: 12px;
                background-color: #FCAC45 ;

            }

            footer a, footer a:hover {
                color: #000;
                text-decoration: none;
             }

             #back:hover, #back:active, #back:focus{
              text-decoration: none;
              color:#FCAC45;
             }

             #pick a{
            text-decoration: none;
        
            font-size: 15px;
            }

            #pick a:hover{
            color: #000;

            }
            
        
            </style>
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
                                            
                                            <li><a href="logout.php">LOGOUT</a></li>
                                           </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


            <div id="wrapper">
                <nav class="navbar-default navbar-side" role="navigation">
                    <div class="sidebar-collapse">
                        <ul class="nav" id="main-menu">
                         
                              <li><a href="#">MARIA KATRINA SCHOOL HOMEPAGE</a></li>
                                <li><a href="#">MARIA KATRINA SCHOOL FANPAGE</a></li>
                        </ul>
                    </div>
                    
              </nav>

                  
                  <div id="page-wrapper" >
                    <div id="contact" id="page-inner">
                         <div id="welcomeadmin" class="tab-pane fade in active"><!-- Div for welcomeadmin-->
                                

                                  <CENTER>
                                      




                                     
                                        

                                       

                              







                                <b>MARIA KATRINA SCHOOL</b>
                                <p>No. 10 Mendoza St. Saog, Marilao, Bulacan</p>
                                <h2 ><strong>APPLICATION FOR ADMISSION </strong></h2>

                               
                                     
                             
                               <form onsubmit="return register()" class="form-signin" action="applicationedit.php" method="POST">



                                 <div class="col-sm-12 col-sm-offset-0" >

                                 <div class="row form-group">
                                  <div class="col-md-1">
                                        <label for="year">S.Y: *</label> 
                                    </div>
                                  <div class="col-md-3">      
                                       <select  id="year" value="" name="year" class="form-control">
                                                        <option><?php echo $Year;?></option>
                                                        <option></option>
                                                        <option>2016-2017</option>
                                                        <option>2018-2019</option>
                                                        <option>2020-2021</option>
                                                        <option>2022-2023</option>

                                                    </select><div id="sy"></div>
                                  </div>


                                 <div class="col-md-2">
                                        <label for="number">Application number:</label> 
                                    </div>
                                  <div class="col-md-2">      
                                       <input id="number" name="number"  maxlength="15" type="text" placeholder="" value="" class="form-control" disabled><div id="num"></div>
                                  </div>

                                  <div class="col-md-2">
                                        <label for="seeking">Seeking admission as:  *</label>
                                    </div>
                                   <div class="col-md-2"> 
                                                     <select  id="seeking"  name="seeking" class="form-control">
                                                        <option ><?php echo $Seek; ?></option>
                                                        <option ></option>
                                                        <option>Grade 7</option>
                                                        <option>Grade 8</option>
                                                        <option>Grade 9</option>
                                                        <option>Grade 10</option>

                                                    </select><div id="seek"></div>
                                   </div>

                                 

                            </div>

                            <div class="row form-group">
                                 <div class="col-md-3">
                                        <label for="dateapplied">Applied Date:</label>
                                    </div>
                                   <div class="col-md-3">  
                                    <!--     <input id="dateapplied" name="dateapplied" maxlength="15" type="date" placeholder="" value="" class="form-control"><div id="applied"></div>-->
                  <?php 
                  $d = date("F j,Y");
                  echo "<B>$d</B>";
                  ?>
                                   </div>

                                   <div class="col-md-3">
                                        <label for="status">Status: *</label>
                                    </div>
                                   <div class="col-md-3">  
                                         <select  id="status" name="status" class="form-control">
                                                        <option><?php echo $Stat;?></option>
                                                        <option></option>
                                                        <option>new student</option>
                                                        <option>transferee</option>
                                                       

                                                    </select><div id="newtrans"></div>
                                   </div>
                            </div>

                            <div class="row form-group" >
                            <label for="seek">Name:</label> 
                            </div>


                            <div class="row form-group" >

                                  <div class="col-md-4">  
                                         <input id="surname" name="surname" maxlength="20" type="text" placeholder="" value="<?php echo $Sname;?>" class="form-control"><i>(Surname) *</i><div id="sname"></div>
                                   </div>

                                   <div class="col-md-4"> 
                                         <input id="firstname" name="firstname" maxlength="20" type="text" placeholder="" value="<?php echo $Fname;?>" class="form-control"><i>(Firstname) *</i><div id="fname"></div>
                                   </div>

                                   <div class="col-md-4"> 
                                         <input id="middlename" name="middlename" maxlength="20" type="text" placeholder="" value="<?php echo $Mname;?>" class="form-control"><i>(Middle Name) *</i><div id="mname"></div>
                                   </div>

                            </div>

                            <div class="row form-group">
                                <div class="col-md-1"> 
                                     <label for="permanent">Permanent Address: *</label> 
                                 </div>
                                   <div class="col-md-5"> 
                                         <input id="permanent" name="permanent" maxlength="50" type="text" placeholder="" value="<?php echo $Per;?>" class="form-control"><div id="add"></div>
                                   </div>

                                   <div class="col-md-2"> 
                                     <label for="telephone">Telephone number: *</label> 
                                 </div>
                                   <div class="col-md-4"> 
                                         <input id="telephone" name="telephone" maxlength="15" type="text" placeholder="" value="<?php echo $Tele;?>" class="form-control"><div id="tele"></div>
                                   </div>


                            </div>

                            <div class="row form-group">
                                <div class="col-md-1"> 
                                     <label for="present">Present Address:*</label> 
                                 </div>
                                   <div class="col-md-5"> 
                                         <input id="present" name="present" maxlength="50" type="text" placeholder="" value="<?php echo $Pre;?>" class="form-control"><div id="pre"></div>
                                   </div>

                                   <div class="col-md-2"> 
                                     <label for="mobile">Mobile number: *</label> 
                                 </div>
                                   <div class="col-md-4"> 
                                         <input id="mobile" name="mobile" maxlength="15" type="text" placeholder="" value="<?php echo $Mobi;?>" class="form-control"><div id="mobi"></div>
                                   </div>


                            </div>

                            <div class="row form-group">

                                  <div class="col-md-1"> 
                                     <label for="birth">Birthdate:*</label> 
                                 </div>
                                  <div class="col-md-4">     
                                       <input id="birth" name="birth"  maxlength="15" type="date" placeholder="" value="<?php echo $Bday;?>" class="form-control"><div id="birt"></div>
                                  </div>


                                  <div class="col-md-1"> 
                                     <label for="age">Age: *</label> 
                                 </div>
                                  <div class="col-md-2">      
                                       <input id="age" name="age"  maxlength="2" type="text" placeholder="" value="<?php echo $Age;?>" class="form-control" ><div id="ages"></div>
                                  </div>

                                <div class="col-md-1"> 
                                     <label for="gender">Gender:*</label> 
                                 </div>
                                   <div class="col-md-3">  
                                                     <select  id="gender" name="gender" class="form-control">
                                                        <option><?php echo $Sex; ?></option>
                                                        <option>Male</option>
                                                        <option>Female</option>

                                                    </select><div id="gen"></div>
                                   </div>

                                  


                            </div>

                            <div class="row form-group">

                                <div class="col-md-1"> 
                                     <label for="place">Birthplace:* </label> 
                                 </div>
                                   <div class="col-md-5"> 
                                         <input id="place" name="place" maxlength="50" type="text" placeholder="" value="<?php echo $Bplace;?>" class="form-control"><div id="places"></div>
                                   </div>



                                 <div class="col-md-1"> 
                                     <label for="religion">Religion: </label> 
                                 </div>
                                  <div class="col-md-5">    
                                       <input id="religion" name="religion"  maxlength="30" type="text" placeholder="" value="<?php echo $Reli;?>" class="form-control" ><div id="reli"></div>
                                  </div>

                            </div>

                            <div class="row form-group">

                                 <div class="col-md-1"> 
                                     <label for="father">Fathers Name: </label> 
                                 </div>
                                  <div class="col-md-3">       
                                       <input id="father" name="father"  maxlength="25" type="text" placeholder="" value="<?php echo $Fatn;?>" class="form-control"><div id="fathers"></div>
                                  </div>


                                 <div class="col-md-1"> 
                                     <label for="foccupation">Occupation:</label> 
                                 </div>
                                  <div class="col-md-3">     
                                       <input id="foccupation" name="foccupation"  maxlength="25" type="text" placeholder="" value="<?php echo $Foccu;?>" class="form-control" ><div id="foccu"></div>
                                  </div>


                                 <div class="col-md-1"> 
                                     <label for="fcontactr">Contact no.</label> 
                                 </div>
                                   <div class="col-md-3">  
                                        <input id="fcontact" name="fcontact"  maxlength="15" type="text" placeholder="" value="<?php echo $Fcon;?>" class="form-control" ><div id="fcon"></div>
                                   </div>



                            </div>

                            <div class="row form-group">

                                 <div class="col-md-1"> 
                                     <label for="mother">Mothers Name: </label> 
                                 </div>
                                  <div class="col-md-3">       
                                       <input id="mother" name="mother"  maxlength="25" type="text" placeholder="" value="<?php echo $Motn;?>" class="form-control"><div id="mothers"></div>
                                  </div>


                                  <div class="col-md-1"> 
                                     <label for="moccupation">Occupation: </label> 
                                 </div>
                                  <div class="col-md-3">       
                                       <input id="moccupation" name="moccupation"  maxlength="25" type="text" placeholder="" value="<?php echo $Moccu;?>" class="form-control" ><div id="moccu"></div>
                                  </div>


                                  <div class="col-md-1"> 
                                     <label for="mcontact">Contact no: </label> 
                                 </div>
                                   <div class="col-md-3"> 
                                        <input id="mcontact" name="mcontact"  maxlength="15" type="text" placeholder="" value="<?php echo $Mcon;?>" class="form-control" ><div id="mcon"></div>
                                   </div>



                            </div>

                            <div class="row form-group">

                                 <div class="col-md-1"> 
                                     <label for="guardian">Guardians Name: </label> 
                                 </div>
                                  <div class="col-md-3">      
                                       <input id="guardian" name="guardian"  maxlength="25" type="text" placeholder="" value="<?php echo $Guar;?>" class="form-control"><div id="guardians"></div>
                                  </div>


                                 <div class="col-md-1"> 
                                     <label for="gaddress">Address: </label> 
                                 </div>
                                  <div class="col-md-3">     
                                     <input id="gaddress" name="gaddress"  maxlength="50" type="text" placeholder="" value="<?php echo $Gadd;?>" class="form-control" ><div id="gadd"></div>
                                  </div>


                                 <div class="col-md-1"> 
                                     <label for="gcontact">Contact no.:</label> 
                                 </div>
                                   <div class="col-md-3">   
                                        <input id="gcontact" name="gcontact"  maxlength="15" type="text" placeholder="" value="<?php echo $Gcon;?>" class="form-control" ><div id="gcon"></div>
                                   </div>



                            </div>
                             
                      
                             <small><em>If transferee, state reason/s for transferring:</em></small>  
                            <div class="row form-group">
                             <div class="col-md-12">      
                                       <input id="transfer" name="transfer"  maxlength="100" type="text" placeholder="" value="<?php echo $Tran;?>" class="form-control"><div id="trans"></div>
                                  </div>
                                  <small><em>I hereby certify that the statement given are true and correct to the best of my knowledge and belief.</em></small>  
                                  </div>
                               

                            <div class="row form-group">

                                  <div class="col-md-3"> 
                                     <label for="elementary">School Last Attended(Elementary): </label>   
                                 </div>
                                  <div class="col-md-9">      
                                       <input id="elementary" name="elementary"  maxlength="35" type="text" placeholder="" value="<?php echo $Old;?>" class="form-control"><div id="elem"></div>
                                  </div>


                                
                            </div>

                            <div class="row form-group">

                                  <div class="col-md-3"> 
                                     <label for="saddress">School Address: </label>   
                                 </div>
                                  <div class="col-md-9">      
                                       <input id="saddress" name="saddress"  maxlength="35" type="text" placeholder="" value="<?php echo $Sadd;?>" class="form-control"><div id="sadd"></div>
                                  </div>


                                
                            </div>

                            <div class="row form-group">

                                  <div class="col-md-3"> 
                                     <label for="syear">School Year: </label>   
                                 </div>
                                  <div class="col-md-9">      
                                       <input id="syear" name="syear"  maxlength="10" type="text" placeholder="" value="<?php echo $Syear;?>" class="form-control"><div id="years"></div>
                                  </div>


                                
                            </div>

                            <div class="row form-group">

                                  <div class="col-md-3"> 
                                     <label for="award">Honors/Award Received: </label>   
                                 </div>
                                  <div class="col-md-9">      
                                       <input id="award" name="award"  maxlength="20" type="text" placeholder="" value="<?php echo $Honor;?>" class="form-control"><div id="awards"></div>
                                  </div>


                                
                            </div>
                        
                            <div class="row form-group">
                              <input type="hidden" name="prospectivestatus" value="pending">
                            <div class="col-md-12">
                                <button type="submit" name="submit" value="Submit" class="btn tf-btn btn-default">Submit</button>
                            </div>
                            </div>
                            </div>
                        </div>
                            <div class="row">
                         
         
                            </div>
                        
                            </form>


                             
                                <div class="row form-group">
                                    <hr>
                                <small><em>Reminder: <br>sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet..</em></small>            
                        </div>
               

                                        


                         
                        
                      </div>
                    </div>
                  </div>
                </div><!-- end of tab content-->


              </div>





        <?php 
                            include('config.php');
                            if(isset($_POST['submit']))
                          {
            
                              $year = $_POST ['year'];
                              $seek = $_POST['seeking'];
                              $applied = date('F j,Y');
                              $stat = $_POST ['status'];
                              $sname= $_POST['surname'];
                              $fname= $_POST['firstname'];
                              $mname= $_POST['middlename'];
                              
                              $per = $_POST['permanent'];
                              $tele = $_POST ['telephone'];
                              $pre = $_POST ['present'];
                              $mobi = $_POST['mobile'];
                              $bday = $_POST ['birth'];
                              $age = $_POST ['age'];
                              $sex = $_POST['gender'];
                              $bplace = $_POST ['place'];
                              $reli = $_POST['religion'];
                              $fatn = $_POST ['father'];
                              $foccu = $_POST['foccupation'];
                              $fcon = $_POST ['fcontact'];
                              $motn = $_POST ['mother'];
                              $moccu = $_POST['moccupation'];
                              $mcon = $_POST ['mcontact'];
                
                              $guar = $_POST ['guardian'];
                              $gadd = $_POST['gaddress'];
                              $gcon = $_POST ['gcontact'];
                              $tran = $_POST ['transfer'];
                              $old = $_POST['elementary'];
                              $sadd = $_POST ['saddress'];
                              $syear = $_POST ['syear'];
                              $honor = $_POST['award'];
                

                


                             
                          $qry="UPDATE tbl_prospectivestudents SET 
              year= '$year', seeking= '$seeking', status= '$stat', surname= '$sname', 
              firstname='$fname',middlename='$mname',peraddress='$per',telephone='$tele',preaddress='$pre',mobile='$mobi',
              birthdate='$bday',age='$age',gender='$sex',birthplace='$bplace',religion='$reli',fathername='$fatn',fatheroccupation='$foccu',fathercontact='$fcon',
              mothername='$motn',mothersoccupation='$moccu',mothercontact='$mcon',guardianname='$guar',guardianaddress='$gadd',guardiancontact='$gcon',reason='$tran',lastschool='$old',
              schooladdress='$sadd',schoolyear='$syear',honors='$honor', edit= '1'
              
              WHERE username= '$username' ";

                          mysql_query($qry);
                          echo"<script> alert('Submitted!');location.href='applicationform.php'</script>";


                          }  ?>


                                  </CENTER>
                            
                          </div><!--End for div welcomeadmin -->
                
                  
                          
                   

                    </div><!-- /. PAGE INNER  -->
                </div>
          </div><!-- /. PAGE WRAPPER  -->

        <!--Footer start -->

            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                             &copy; 2015 Maria Katrina School:Student Information Management System | By : <a href="" target="_blank">MKS TEAM</a>
                        </div>

                      <div class="col-md-4">
                            <strong>Email: </strong>gummybites@gmail.com
                            &nbsp;&nbsp;
                            <strong>Support: </strong>+90-561-477-21
                        </div>

                         <?php
                            $date= date('F d,Y, g:i:s a');
                            echo $date;

                             ?>
                    </div>

                    </div>
                </div>
            </footer><!--Footer End -->

  <script src="../../js/jquery.1.11.1.js"></script>
    <script src="../../js/bootstrap.js"></script>
 <script src="../../js/dropdown.js"></script>  


</body>
        </html>
        <?php }?>