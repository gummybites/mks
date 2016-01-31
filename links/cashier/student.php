<?php session_start();
include('config.php');

if(!isset($_SESSION['username'])){
header('Location: cashierlogin.php');
exit;



}else{
   $username= $_REQUEST['username'];
   

  $qry= "SELECT * FROM tbl_prospectivestudents where username= '$username'";
  $res= mysql_query($qry);

  while($q= mysql_fetch_array($res)){
    $Fname= $q['firstname'];
    $Mname= $q['middlename'];
    $Sname= $q['surname'];
    $stat= $q['status'];
    $mode= $q['Mode'];
    $discount= $q['Discount'];
    $fee= $q['Fee'];
    $bal=$q['Balance'];


    


  }

   ?>
 <?php

  $qry= "SELECT * from tbl_tuition";
  $res= mysql_query($qry);

  while($qry= mysql_fetch_array($res)){
    $payment= $qry['tuition'];
  }


   ?>


   <?php
$username= $_REQUEST['username'];
$qry= "SELECT * FROM tbl_prospectivestudents where username='$username'";

$res= mysql_query($qry);

while($qry= mysql_fetch_array($res)){  
 $Fpay=$qry['First_Payment'];
                      $Spay=$qry['Second_Payment'];
                      $Tpay=$qry['Third_Payment'];
                      $Ftpay=$qry['Fourth_Payment'];

                      $Fpay1= number_format($Fpay,2);
                      $Spay1= number_format($Spay,2);
                      $Tpay1= number_format($Tpay,2);
                      $Ftpay1= number_format($Ftpay,2);

                      $Fstat=$qry['First_Status'];
                      $Sstat=$qry['Second_Status'];
                      $Tstat=$qry['Third_Status'];
                      $Ftstat=$qry['Fourth_Status'];
                      $discount= $qry['Discount'];
                    }
?>





<!DOCTYPE html>
<html>
            <head>
                <title>Cashier</title>
                <link rel="stylesheet" href="../../css/bootstrap.min.css"></link>
                <link href="../../fonts/font-awesome/css/font-awesome.css" rel="stylesheet" />
  

     

            </head>
              <style>
              #menu-top li>a{
                color: #fff;
                 background-color: transparent;

              }

              #menu-top li>a:hover{
                  color: #FCAC45;


              }
           

              .menu-section ul .menu-section li{
                      list-style-type: none;
                    
              }

              .menu-section li{
                  list-style-type: none;
                  float: left;
              }
           
              /*
               * Main content
               */

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
                  background:#202020;
              }

              #page-wrapper {
                  padding: 15px 15px;
                  min-height: 600px;
                  background:#F3F3F3;
                 
              }
              #page-inner {
                  width:100%;
                  margin:10px 20px 10px 0px;
                  background-color:#fff!important;
                  padding:10px;
                  min-height:1200px;
              }


              /*==============================================
                  MENU STYLES    
                  =============================================*/




              .active-menu {
                  background-color:#F3F3F3!important;
                  
              }

              .sidebar-collapse .nav > li > a {
                color:#FCAC45;

                text-shadow:none;
                
              }

              .sidebar-collapse > .nav > li {
                border-bottom: 0px solid rgba(107, 108, 109, 0.19);
              }
              .sidebar-collapse .nav > li > a:hover {
                
                background:#fff;
                outline:0;
              }


              .navbar-side {
                border:none;
                background-color: #202020;
                
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
                      min-height: 1200px;
                  
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

             #contact .form-control {
            display: block;
            width: 100%;
            padding: 6px 12px;
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

             /* For */
            .panel-back {
                background-color:#F8F8F8;

            }
            .noti-box {
            min-height: 100px;
            padding: 20px;

            }

            .noti-box .icon-box {
            margin: 0 15px 10px 0;
            width: 70px;
            height: 70px;
            line-height: 75px;
            vertical-align: middle;
            text-align: center;
            font-size: 40px;
             border-radius: 30px;
            }

            .icon-box a {
              color: #fff;
            }
            .set-icon {
                -webkit-border-radius: 50px;
            -moz-border-radius: 50px;
            border-radius: 50px;

            }
                .bg-color-green {
            background-color: #00CE6F;
            color: #fff;
            }
             .bg-color-blue {
            background-color: #A95DF0;
            color: #fff;
            }
              .bg-color-red {
            background-color: #DB0630;
            color: #fff;
            }
              .bg-color-brown {
            background-color: #B94A00;
            color: #fff;
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
                                <a id="head" class="navbar-brand" href=".././index.html">MARIA KATRINA LOGO</a>

                         
                              

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

                    <div id="wrapper">
                    <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
        
          
                    <li>
                       
                    </li>
                      
          
                             
                  
                  
                </ul>
               
            </div>
            
        </nav>

          
        <div id="page-wrapper" >
          <b>List Of Prospective</b> | <b>List Of Enrolled</b> | <u><a href="cashier.php">HOME</a></u>
            <div id="page-inner">
              <div class="col-md-12">
                                <div class="text-center"><b>MARIA KATRINA SCHOOL</b>
                                <p>No. 10 Mendoza St. Saog, Marilao, Bulacan</p>
                                <h2 ><strong>CASHIER</strong></h2>
                               </div>

                  
               

                       
                  <?php if(isset($_POST['sumit'])){
                  echo "<center><div class=' noti-box'><span class='icon-box bg-color-red set-icon>
                        <a  href='onlinestudentregistered.php> <i class='fa fa-check'></i></a></span></div></center>";
                  echo "<script type='text/javascript'>location.href='student.php?username=$username';</script>";
                                            }
                  echo "</form>"; 

                
               ?>
               <table >
                <tr>
                  <td width='50%' align='center' ><b></b></td>
                  <td width='50%' align='center' ><b></b></td>
                  <td width='50%' align='center'>
              <?php 
             echo "<form method='POST'>";
                  if(isset($_POST['submit'])){
                     echo "  <input type='text' name='cash'  />
                             <input type='submit' name='sumit' value='Enter Amount'/>
                             ";
                  }else{


                   echo  "<input type='submit' name='submit' value='Pay Tuition Fees'/>";
                       }             

            ?>
            </td>
                </tr>
               </table>
<hr/>
                
                  <table>
                          <tr>
                             <td width='20%' align='center' ><b>Username:</b></td>
                             <td width='50%'><p> <i><mark><?php echo $username; ?></mark></i></p></td>
                          </tr>


                          <tr><td width='20%' align='center' ><b>Name:</b> </td>
                              <td width='50%'><p> <i><mark><?php echo $Sname.',&nbsp&nbsp&nbsp      ', $Fname. ',&nbsp&nbsp&nbsp', $Mname; ?></mark></i></p></td>

                          </tr>

                          <tr>
                              <td width='20%' align='center'><b>Section:</b></td>
                              <td width='50%'><mark><?php echo $stat;?></mark></td>
                              <td width='20%' align='center'><b>Status:</b></td>
                              <td width='50%'><mark><?php echo $stat; ?></mark></td>


                          </tr>

                          <tr>

                              <td width='20%' align='center'><b></b></td>
                               <!--Condition if the option in in cash or installment -->
                              <td width='50%' align='center'><b>Mode Of Payment:</b><mark><?php if($mode=='1'){
                                echo "Cash/Full";
                              }if($mode=='2'){
                                echo "Installment";
                              }if($mode=='0'){
                                echo "Installment";
                             }?></mark></td>
     

                          </tr>


                  </table>
   
 

<hr>

<?php
echo "<div class='demo_jui'>
                        <table cellpadding='0' cellspacing='1' border='1' class='display' id='tbl' class='jtable'>
                        <tr>

                                          <tr><td bgcolor='#FCAC45' ><center>First Payment</center></td>
                                              <td bgcolor='#FCAC45' ><center>Second Payment</center></td>
                                              <td bgcolor='#FCAC45' ><center>Third Payment</center></td>
                                              <td bgcolor='#FCAC45'><center>Fourth Payment</center></td>
                                
                                           

                                             
                                             
                                              </tr>

                                              </tr>";
                    

                     
                      if($discount=='0'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='10'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='25'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='50'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='75'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='100'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }
                      
    echo "<table></div>";
  ?>
<hr>
<table>

<tr>
  <td width='60%' align='center'>Amount to pay: <!--Condition if the option is in cash or installment -->
<mark>
<?php 
//if cash si set
if($mode=='1'){
                //if statement when cash is set
                $if= $payment-($payment*(5/100));
                $else = $if;
                $format= number_format($if,2);
                if(isset($_POST['submit'])){
                  echo "$format";
                }
                  
                //if the discount is set to 0
                if($discount=='0'){
                  
                                  //Entering amount when the discount is set to 0
                                 if(isset($_POST['submit'])){
                                  if($fee>0){
                                     
                                     }else{
                                      mysql_query("UPDATE tbl_prospectivestudents set Balance=$else where username='$username' "); 
                                      mysql_query("UPDATE tbl_prospectivestudents set Fee= $else where username='$username' ");

                                     }
                                 }
                                if(isset($_POST['sumit'])){
                                   
                                
                                $whole= $if/4;
                                $pays= $_POST['cash'];
                                $greater = $pays-$whole;

                                if($pays>$fee){
                                  echo "Pay for exact amount of tuition! You have $fee only";



                                }elseif($pays<$whole){//if the amount is small
                                                              
                                                              
                                                  if($Fpay<$whole){

                                                              if($Fpay<$whole){
                                                              $F= $pays+$Fpay;  
                                                              mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $F where username='$username'");
                                                          

                                                                              if($F>$whole){
                                                                              mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $whole where username='$username'");
                                                                              $f= $pays+$Fpay;  
                                                                              $F= $f-$whole;  
                                                                              mysql_query("UPDATE tbl_prospectivestudents set Second_Payment= $F where username='$username'"); 
                                                                                     
                                                              
                                                                                          }           
                                                                              }

                                                                                          $Balanc= $bal-$pays;
                                                                                          mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' "); 
                                                                  
                                                              
                                                              
 
                                
                                                 }elseif($Spay<$whole){

                                                              if($Spay<$whole){
                                                              $S= $pays+$Spay;  
                                                              mysql_query("UPDATE tbl_prospectivestudents set Second_Payment= $S where username='$username'");
                                                             

                                                                            if($S>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set Second_Payment= $whole where username='$username'");
                                                                            $s= $pays+$Spay;  
                                                                            $S= $s-$whole;  
                                                                            mysql_query("UPDATE tbl_prospectivestudents set Third_Payment= $S where username='$username'");  
                                                                                        }           
                                                                              }
                                                                                          $Balance= $bal-$pays;
                                                                                          mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balance where username='$username' "); 
                                                    
                                    
                                                }elseif($Tpay<$whole){

                                                              if($Tpay<$whole){
                                                              $T= $pays+$Tpay;  
                                                              mysql_query("UPDATE tbl_prospectivestudents set Third_Payment= $T where username='$username'");
                                                             
                                                             
                                                                           if($T>$whole){
                                                                           mysql_query("UPDATE tbl_prospectivestudents set Third_Payment= $whole where username='$username'");
                                                                           $p= $pays+$Tpay;  
                                                                           $T= $p-$whole;  
                                                                           mysql_query("UPDATE tbl_prospectivestudents set Fourth_Payment= $T where username='$username'");
                                                                                        }           
                                                                              }
                                                                                        $Balanc= $bal-$pays;
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");
                                                             
                                      
                                  

                                               }elseif($Ftpay<$whole){
                                                              if($Ftpay<$whole){
                                                              $Ft= $pays+$Ftpay;  
                                                              mysql_query("UPDATE tbl_prospectivestudents set Fourth_Payment= $Ft where username='$username'");
               
                                                                          if($Ft>$whole){
                                                                          mysql_query("UPDATE tbl_prospectivestudents set Fourth_Payment= $whole where username='$username'");
                                                                                       }
                                                                                      $Balanc= $bal- $pays;
                                                                                      mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");                
                                                                              }
                                                                    }


                                   
                               
                          }elseif($pays>$whole){//if the amount enter is big
                                    
                                    if($Fpay>0){//kapag may nakikitang laman sa First payment
                                      if($pays>$Fpay){
                                        $total= $pays+ $Fpay;
                                        mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $total where username='$username'");
                                        $result= $total- $whole;
                                        mysql_query("UPDATE tbl_prospectivestudents set  Second_Payment= $result where username='$username'");
                                            
                                        $Balanc= $bal-$pays;
                                      mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");

                                      }
                                                if($Tpay>0){

                                       if($Ftpay='0.00'){//kapag walang lamaan ang Fourth payment
                                       $great= $pays+ $Spay+ $Fpay+$Tpay;
                                       
                                                    if($great>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $great1= $great-$whole;
                  
                                                                if($great1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $greater2= $great1-$whole;

                                                                            if($greater2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $greater3= $greater2-$whole;

                                                                                        if($greater3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $greater4= $greater3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $greater3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $greater2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $greater1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= greater where username='$username'");
                                                                        }
                                                                        $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");
                                                        }           
                                                          }else{

                                      if($Tpay='0.00'){//kapag walang lamaan ang third payment
                                       $great= $pays+ $Spay+ $Fpay;
                                       
                                                    if($great>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $great1= $great-$whole;
                  
                                                                if($great1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $greater2= $great1-$whole;

                                                                            if($greater2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $greater3= $greater2-$whole;

                                                                                        if($greater3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $greater4= $greater3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $greater3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $greater2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $greater1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= greater where username='$username'");
                                                                        }

                                                        }
                                                    $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");

                                    }
                                //End

                                }else{//kapag walang nakikitang laman sa first payment
                                                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $whole where username='$username'");
                                                                $greater= $pays-$whole;
                                                                if($greater>$whole){
                                                                mysql_query("UPDATE tbl_prospectivestudents set Second_Payment= $whole where username='$username'");
                                                                $greater1= $greater-$whole;
                                       
                                                                        if($greater1>$whole){
                                                                        mysql_query("UPDATE tbl_prospectivestudents set Third_Payment= $whole where username='$username'");
                                                                        $greater2= $greater1-$whole;

                                                                                    if($greater2>$whole){
                                                                                    mysql_query("UPDATE tbl_prospectivestudents set Fourth_Payment= $whole where username='$username'");
                                                                                    $greater3=$greater2-$whole;

                                                                                                        }else{
                                                                                                          mysql_query("UPDATE tbl_prospectivestudents set Fourth_Payment= $greater2 where username='$username'");
                                                                                                        }
                                                                                          }else{
                                                                                            mysql_query("UPDATE tbl_prospectivestudents set Third_Payment= $greater1 where username='$username'");
                                                                                          }
                                                                                  }else{
                                                                                   mysql_query("UPDATE tbl_prospectivestudents set Second_Payment= $greater where username='$username'");
                                                                                  }  

                                                                        $Balanc= $bal-$pays;
                                                                        mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");


                                }
                              }   
                            }
                          }
                        
                            
                        

  
                  //if the discount is set to 10
                if($discount=='10'){
                  $x= $if-($if*(10/100));
                  $less=$payment-$x;
                  $ten= number_format($less, 2);
                  echo "$x";
                                //Entering amount when the discount is set to 10
                                if(isset($_POST['sumit'])){
                    
                                $whole= $payment/4;
                                $pays= $_POST['cash'];
                                $total = $pays- $whole;

                                mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");
                    

                                $y= $x- $pays;
                                mysql_query("UPDATE tbl_prospectivestudents set Balance=$y where username='$username' ");
                          
                                // Condition if the payment is greater than to the tuition required
                                if($total> $whole){
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $whole where username='$username' ");
                                }else{
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $pays where username='$username'");
                                      }
                                    }
                }//if the discount is set to 25
                if($discount=='25'){
                  $x= $if-($if*(25/100));
                  $less=$payment-$x;
                  $two= number_format($less, 2);
                  echo "$x";
                                //Entering amount when the discount is set to 25
                                if(isset($_POST['sumit'])){
                    
                                $whole= $payment/4;
                                $pays= $_POST['cash'];
                                $total = $pays- $whole;

                                mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");
                    

                                $y= $x- $pays;
                                mysql_query("UPDATE tbl_prospectivestudents set Balance=$y where username='$username' ");
                          
                                // Condition if the payment is greater than to the tuition required
                                if($total> $whole){
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $whole where username='$username' ");
                                }else{
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $pays where username='$username'");
                                      }
                                    }
                }//if the discount is set to 30
                if($discount=='30'){
                  $x= $if-($if*(30/100));
                  $less=$payment-$x;
                  $three= number_format($less, 2);
                  echo "$x";
                                //Entering amount when the discount is set to 30
                                if(isset($_POST['sumit'])){
                    
                                $whole= $payment/4;
                                $pays= $_POST['cash'];
                                $total = $pays- $whole;

                                mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");
                    

                                $y= $x- $pays;
                                mysql_query("UPDATE tbl_prospectivestudents set Balance=$y where username='$username' ");
                          
                                // Condition if the payment is greater than to the tuition required
                                if($total> $whole){
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $whole where username='$username' ");
                                }else{
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $pays where username='$username'");
                                      }
                                    }
                }//if the discount is set to 50
                if($discount=='50'){
                  $x= $if-($if*(50/100));
                  $less=$payment-$x;
                  $five= number_format($less, 2);
                  echo "$x";
                                //Entering amount when the discount is set to 50
                                if(isset($_POST['sumit'])){
                    
                                $whole= $payment/4;
                                $pays= $_POST['cash'];
                                $total = $pays- $whole;

                                mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");
                    

                                $y= $x- $pays;
                                mysql_query("UPDATE tbl_prospectivestudents set Balance=$y where username='$username' ");
                          
                                // Condition if the payment is greater than to the tuition required
                                if($total> $whole){
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $whole where username='$username' ");
                                }else{
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $pays where username='$username'");
                                      }
                                    }
                }//if the discount is set to 75
                if($discount=='75'){
                  $x= $if-($if*(75/100));
                  $less=$payment-$x;
                  $seven= number_format($less, 2);
                  echo "$x";
                                //Entering amount when the discount is set to 75
                                if(isset($_POST['sumit'])){
                    
                                $whole= $payment/4;
                                $pays= $_POST['cash'];
                                $total = $pays- $whole;

                                mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");
                    

                                $y= $x- $pays;
                                mysql_query("UPDATE tbl_prospectivestudents set Balance=$y where username='$username' ");
                          
                                // Condition if the payment is greater than to the tuition required
                                if($total> $whole){
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $whole where username='$username' ");
                                }else{
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $pays where username='$username'");
                                      }
                                    }
                }//if the discount is set to 100
                if($discount=='100'){
                  $x= $if-($if*(100/100));
                  echo "$x";
                                if(isset($_POST['sumit'])){
                                  mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");
                                }
                }


}











//if the cash is set to installment
if($mode=='2'){
                //if the discount is set to 0
                if($discount=='0'){
                  echo "$payment";
                                //Entering amount when the discount is set to 0
                                if(isset($_POST['sumit'])){
                    
                                $whole= $payment/4;
                                $pays= $_POST['cash'];
                                $total = $pays- $whole;

                                mysql_query("UPDATE tbl_prospectivestudents set Fee= $payment where username='$username' ");
                    

                                $y= $payment- $pays;
                                mysql_query("UPDATE tbl_prospectivestudents set Balance=$y where username='$username' ");
                          
                                // Condition if the payment is greater than to the tuition required
                                if($total> $whole){
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $whole where username='$username' ");
                                }else{
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $pays where username='$username'");
                                      }
                                    }
                }//if the discount is set to 10
                if($discount=='10'){
                    $x= $payment-($payment*(10/100));
                    $y = $x;
                    $less=$payment-$y;
                     $ten= number_format($less, 2);
                    echo "$y";
                                  //Entering amount when the discount is set to 10
                                if(isset($_POST['sumit'])){
                    
                                $whole= $payment/4;
                                $pays= $_POST['cash'];
                                $total = $pays- $whole;

                                mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");
                    

                                $y= $x- $pays;
                                mysql_query("UPDATE tbl_prospectivestudents set Balance=$y where username='$username' ");
                          
                                // Condition if the payment is greater than to the tuition required
                                if($total> $whole){
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $whole where username='$username' ");
                                }else{
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $pays where username='$username'");
                                      }
                                    }

                 }//if the discont is set to 25
                 if($discount=='25'){
                    $x= $payment-($payment*(25/100));
                    $y = $x;
                    $less=$payment-$y;
                     $two= number_format($less, 2);
                    echo "$y";
                                  //Entering amount when the discount is set to 25
                                if(isset($_POST['sumit'])){
                    
                                $whole= $payment/4;
                                $pays= $_POST['cash'];
                                $total = $pays- $whole;

                                mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");
                    

                                $y= $x- $pays;
                                mysql_query("UPDATE tbl_prospectivestudents set Balance=$y where username='$username' ");
                          
                                // Condition if the payment is greater than to the tuition required
                                if($total> $whole){
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $whole where username='$username' ");
                                }else{
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $pays where username='$username'");
                                      }
                                    }

                 }//if the discount is set to 30
                 if($discount=='30'){
                    $x= $payment-($payment*(30/100));
                    $y = $x;
                    $less=$payment-$y;
                     $three= number_format($less, 2);
                    echo "$y";
                                //Entering amount when the discount is set to 30
                                if(isset($_POST['sumit'])){
                    
                                $whole= $payment/4;
                                $pays= $_POST['cash'];
                                $total = $pays- $whole;

                                mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");
                    

                                $y= $x- $pays;
                                mysql_query("UPDATE tbl_prospectivestudents set Balance=$y where username='$username' ");
                          
                                // Condition if the payment is greater than to the tuition required
                                if($total> $whole){
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $whole where username='$username' ");
                                }else{
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $pays where username='$username'");
                                      }
                                    }

                 }//if the discount is set to 50
                 if($discount=='50'){
                    $x= $payment-($payment*(50/100));
                    $y = $x;
                    $less=$payment-$y;
                     $five= number_format($less, 2);
                    echo "$y";
                                  //Entering amount when the discount is set to 50
                                if(isset($_POST['sumit'])){
                    
                                $whole= $payment/4;
                                $pays= $_POST['cash'];
                                $total = $pays- $whole;

                                mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");
                    

                                $y= $x- $pays;
                                mysql_query("UPDATE tbl_prospectivestudents set Balance=$y where username='$username' ");
                          
                                // Condition if the payment is greater than to the tuition required
                                if($total> $whole){
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $whole where username='$username' ");
                                }else{
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $pays where username='$username'");
                                      }
                                    }

                 }//if the discount is set to 75
                 if($discount=='75'){
                    $x= $payment-($payment*(75/100));
                    $y = $x;
                    $less=$payment-$y;
                    $seven= number_format($less, 2);
                    echo "$y";
                              //Entering amount when the discount is set to 75
                                if(isset($_POST['sumit'])){
                    
                                $whole= $payment/4;
                                $pays= $_POST['cash'];
                                $total = $pays- $whole;

                                mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");
                    

                                $y= $x- $pays;
                                mysql_query("UPDATE tbl_prospectivestudents set Balance=$y where username='$username' ");
                          
                                // Condition if the payment is greater than to the tuition required
                                if($total> $whole){
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $whole where username='$username' ");
                                }else{
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $pays where username='$username'");
                                      }
                                    }

                 }//if the discount is set to 100
                 if($discount=='100'){
                    $x= $payment-($payment*(100/100));
                    $y = $x;
                    echo "$y";
                    if(isset($_POST['sumit'])){
                    mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");
                  }

                 }

}



















// if the cash is set to null
if($mode=='0'){
                  // if the discount is set to o
                  if($discount=='0'){
                  echo "$payment";
                                //Entering amount when the discount is set to 0
                                if(isset($_POST['sumit'])){
                    
                                $whole= $payment/4;
                                $pays= $_POST['cash'];
                                $total = $pays- $whole;

                                mysql_query("UPDATE tbl_prospectivestudents set Fee= $payment where username='$username' ");
                    

                                $y= $payment- $pays;
                                mysql_query("UPDATE tbl_prospectivestudents set Balance=$y where username='$username' ");
                          
                                // Condition if the payment is greater than to the tuition required
                                if($total> $whole){
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $whole where username='$username' ");
                                }else{
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $pays where username='$username'");
                                      }
                                    }
                  }


                  //If the discount is set to 10 percent
                  if($discount=='10'){
                    $x= $payment-($payment*(10/100));
                    $y = $x;
                    $less=$payment-$y;
                    $ten= number_format($less, 2);
                    echo "$y";
                                //Entering amount when the discount is set to 10
                                if(isset($_POST['sumit'])){
                    
                                $whole= $payment/4;
                                $pays= $_POST['cash'];
                                $total = $pays- $whole;

                                mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");
                    

                                $y= $x- $pays;
                                mysql_query("UPDATE tbl_prospectivestudents set Balance=$y where username='$username' ");
                          
                                // Condition if the payment is greater than to the tuition required
                                if($total> $whole){
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $whole where username='$username' ");
                                }else{
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $pays where username='$username'");
                                      }
                                    }

                 }

                 //if the discount is set to 25
                 if($discount=='25'){
                    $x= $payment-($payment*(25/100));
                    $y = $x;
                    $less=$payment-$y;
                     $two= number_format($less, 2);
                    echo "$y";
                                //Entering amount when the discount is set to 25
                                if(isset($_POST['sumit'])){
                    
                                $whole= $payment/4;
                                $pays= $_POST['cash'];
                                $total = $pays- $whole;

                                mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");
                    

                                $y= $x- $pays;
                                mysql_query("UPDATE tbl_prospectivestudents set Balance=$y where username='$username' ");
                          
                                // Condition if the payment is greater than to the tuition required
                                if($total> $whole){
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $whole where username='$username' ");
                                }else{
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $pays where username='$username'");
                                      }
                                    }
                 }

                 //if the discount is set tot 30
                 if($discount=='30'){
                    $x= $payment-($payment*(30/100));
                    $y = $x;
                    $less=$payment-$y;
                     $three= number_format($less, 2);
                    echo "$y";
                                //Entering amount when the discount is set to 30
                                if(isset($_POST['sumit'])){
                    
                                $whole= $payment/4;
                                $pays= $_POST['cash'];
                                $total = $pays- $whole;

                                mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");
                    

                                $y= $x- $pays;
                                mysql_query("UPDATE tbl_prospectivestudents set Balance=$y where username='$username' ");
                          
                                // Condition if the payment is greater than to the tuition required
                                if($total> $whole){
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $whole where username='$username' ");
                                }else{
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $pays where username='$username'");
                                      }
                                    }

                 }

                 //if the discount is set to 50
                 if($discount=='50'){
                    $x= $payment-($payment*(50/100));
                    $y = $x;
                    $less=$payment-$y;
                     $five= number_format($less, 2);
                    echo "$y";
                                //Entering amount when the discount is set to 50
                                if(isset($_POST['sumit'])){
                    
                                $whole= $payment/4;
                                $pays= $_POST['cash'];
                                $total = $pays- $whole;

                                mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");
                    

                                $y= $x- $pays;
                                mysql_query("UPDATE tbl_prospectivestudents set Balance=$y where username='$username' ");
                          
                                // Condition if the payment is greater than to the tuition required
                                if($total> $whole){
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $whole where username='$username' ");
                                }else{
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $pays where username='$username'");
                                      }
                                    }

                 }

                 //if the discount is set to 75
                 if($discount=='75'){
                    $x= $payment-($payment*(75/100));
                    $y = $x;
                    $less=$payment-$y;
                     $seven= number_format($less, 2);
                    echo "$y";
                                //Entering amount when the discount is set to 75
                                if(isset($_POST['sumit'])){
                    
                                $whole= $payment/4;
                                $pays= $_POST['cash'];
                                $total = $pays- $whole;

                                mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");
                    

                                $y= $x- $pays;
                                mysql_query("UPDATE tbl_prospectivestudents set Balance=$y where username='$username' ");
                          
                                // Condition if the payment is greater than to the tuition required
                                if($total> $whole){
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $whole where username='$username' ");
                                }else{
                                mysql_query("UPDATE tbl_prospectivestudents set First_Payment= $pays where username='$username'");
                                      }
                                    }

                 }

                 //if the discount is set to 100
                 if($discount=='100'){
                    $x= $payment-($payment*(100/100));
                    $y = $x;
                    echo "$y";
                                if(isset($_POST['sumit'])){
                                mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");
                              }

                 }

}

?></mark></td>

<!--Discount -->
  <td width='60%' align='center'>Discount= <mark><?php if($discount=='0'){
                          echo "none(0)";
                      }if($discount=='10'){
                          echo "Ten(10) Less: $ten ";
                      }if($discount=='25'){
                          echo "Twenty five(25) Less: $two";
                      }if($discount=='50'){
                          echo "Fifty(50)  Less: $five";
                      }if($discount=='75'){
                          echo "Seventy Five(75) Less: $seven";
                      }if($discount=='100'){
                          echo "Full(100)";
                      }?>
                   </td></mark>


</tr>



<tr>



</tr>
    </table>


    <hr>

    <table>

      <tr><td width='30%' >

        Balance: <mark><?php $balance=number_format($bal,2); 
                  echo $balance;?></mark></td>


     <!--Entering amount of tuition fees -->
    
     <td width='30%' align='center'></td>
     
          </tr>
          </table>
            

           </div>
        </div>
      </div>
         <!-- /. PAGE WRAPPER  -->


              
             
   
                     <script src="../../js/jquery.1.11.1.js"></script>
                    <script src="../../js/bootstrap.js"></script>
                  
                    <style type="text/css" title="currentStyle">
           
            @import "../../css/demo_page.css";
            @import "../../css/demo_table_jui.css";
            
        </style>
        
            </body>
        </html>




<?php }?>
