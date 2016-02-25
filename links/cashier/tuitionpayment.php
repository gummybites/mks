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


<?php
if(isset($_POST['enterpayment'])){
        $studentno=$_POST['studentno'];

        $qry="SELECT * from tbl_cashierpayment where username='$studentno'";
        $res=mysql_query($qry);

        while($qry=mysql_fetch_array($res)){
        $Fpay=$qry['First_Payment'];
        $Spay=$qry['Second_Payment'];
        $Tpay=$qry['Third_Payment'];
        $Ftpay=$qry['Fourth_Payment'];

        $date_receive=$qry['Date_received'];
        $amount_received=$qry['Amount'];
        $Or_number=$qry['Or_number'];
        $amountbalance=$qry['Balance'];


        }

        $qry2="SELECT * from tbl_prospectivestudents where username='$studentno'";
        $res2=mysql_query($qry2);

        while($qry2=mysql_fetch_array($res2)){
        $studenttuitionfee=$qry2['Fee'];
       
        }

        
        
        $amount=$_POST['cash'];
        $amountfee=$studenttuitionfee/4;
        $totalpayment=$amount-$amountfee;
        //For OR Reference
        $chars = "012345678901234567";

        $reference_number = '';
         
        for ($i = 0; $i < 6; $i++) 
        {
            $reference_number .= $chars[rand(0, strlen($chars)-1)];
        } 
        //For Date received for amount
        date_default_timezone_set('Asia/Manila');
        $time= Date('F d, Y, g:ia'); 


    if($amount>$studenttuitionfee){
                                  

                                



    }elseif($amount>$amountbalance){


    }elseif($amount<=$amountfee){//if the amount is small
                                                            
                                                              
    if($Fpay<$amountfee){
            if($Fpay<$amountfee){
                $F= $amount+$Fpay;  
                mysql_query("UPDATE tbl_cashierpayment set First_Payment= '$F' where username='$studentno'");

            if($F>$amountfee){
                mysql_query("UPDATE tbl_cashierpayment set First_Payment= '$amountfee' where username='$studentno'");
                $f=  $amount+$Fpay;  
                $F= $f-$amountfee;  
                mysql_query("UPDATE tbl_cashierpayment set Second_Payment= '$F' where username='$studentno'"); 
                         }           
                            }

                $Balanc= $amountbalance- $amount;
                mysql_query("UPDATE tbl_cashierpayment set Balance='$Balanc' where username='$studentno' "); 
                mysql_query("UPDATE tbl_cashierpayment set Amount='$amount',Or_number='$reference_number',Date_received='$time' where username='$studentno'");
            
           

                                                                  
                                                              
                          }elseif($Spay<$amountfee){
    if($Spay<$amountfee){
                $S= $amount+$Spay;  
                mysql_query("UPDATE tbl_cashierpayment set Second_Payment= $S where username='$studentno'");
                                                             
            if($S>$amountfee){
                mysql_query("UPDATE tbl_cashierpayment set Second_Payment= $amountfee where username='$studentno'");
                $s= $amount+$Spay;  
                $S= $s-$amountfee;  
                mysql_query("UPDATE tbl_cashierpayment set Third_Payment= $S where username='$studentno'");  
                          }           
                    }
                $Balanc= $amountbalance- $amount;
                mysql_query("UPDATE tbl_cashierpayment set Balance='$Balanc' where username='$studentno' "); 
                mysql_query("UPDATE tbl_cashierpayment set Amount='$amount',Or_number='$reference_number',Date_received='$time' where username='$studentno'");
                                                    
                                    
                                        }elseif($Tpay<$amountfee){

    if($Tpay<$amountfee){
                $T= $amount+$Tpay;  
                mysql_query("UPDATE tbl_cashierpayment set Third_Payment= $T where username='$studentno'");
                                                             
            if($T>$amountfee){
                mysql_query("UPDATE tbl_cashierpayment set Third_Payment= $amountfee where username='$studentno'");
                $p= $amount+$Tpay;  
                $T= $p-$amountfee;  
                mysql_query("UPDATE tbl_cashierpayment set Fourth_Payment= $T where username='$studentno'");
                          }           
                   }
                $Balanc= $amountbalance- $amount;
                mysql_query("UPDATE tbl_cashierpayment set Balance='$Balanc' where username='$studentno' "); 
                mysql_query("UPDATE tbl_cashierpayment set Amount='$amount',Or_number='$reference_number',Date_received='$time' where username='$studentno'");
                                                             
                                      
                                  

                                        }elseif($Ftpay<$amountfee){
    if($Ftpay<$amountfee){
                $Ft= $amount+$Ftpay;  
                mysql_query("UPDATE tbl_cashierpayment set Fourth_Payment= $Ft where username='$studentno'");
            if($Ft>$amountfee){
                mysql_query("UPDATE tbl_cashierpayment set Fourth_Payment= $amountfee where username='$studentno'");
                          }
                $Balanc= $amountbalance- $amount;
                mysql_query("UPDATE tbl_cashierpayment set Balance='$Balanc' where username='$studentno' "); 
                mysql_query("UPDATE tbl_cashierpayment set Amount='$amount',Or_number='$reference_number',Date_received='$time' where username='$studentno'");                
                     }
                                                              }


                                   
                            header("Refresh:1;");   
                                        }elseif($amount>$amountfee){//if the amount enter is big
                         
    if($Fpay>0){//kapag may nakikitang laman sa First payment
                                      
            if($Tpay>0){

            if($Ftpay=='0.00'){//kapag walang lamaan ang Fourth payment
              $apat= $amount+ $Spay+ $Fpay+$Tpay;
                                       
            if($apat>$amountfee){
              mysql_query("UPDATE tbl_cashierpayment set  First_Payment= $amountfee where username='$studentno'");
              $apat1= $apat-$amountfee;
                  
            if($apat1>$amountfee){ 
              mysql_query("UPDATE tbl_cashierpayment set   Second_Payment= $amountfee where username='$studentno'");
              $apat2= $apat1-$amountfee;

            if($apat2>$amountfee){
              mysql_query("UPDATE tbl_cashierpayment set   Third_Payment= $amountfee where username='$studentno'");
              $apat3= $apat2-$amountfee;

            if($apat3>$amountfee){
              mysql_query("UPDATE tbl_cashierpayment set   Fourth_Payment= $amountfee where username='$studentno'");
              $apat4= $apat3-$amountfee;
                             }else{
              mysql_query("UPDATE tbl_cashierpayment set   Fourth_Payment= $apat3 where username='$studentno'");
                                  }
                             }else{
              mysql_query("UPDATE tbl_cashierpayment set   Third_Payment= $apat2 where username='$studentno'");
                                  }
                             }else{
              mysql_query("UPDATE tbl_cashierpayment set   Second_Payment= $apat1 where username='$studentno'");

                                  }
                             }else{
              mysql_query("UPDATE tbl_cashierpayment set   First_Payment= $apat where username='$studentno'");
                                  }
              $Balanc= $amountbalance- $amount;
                mysql_query("UPDATE tbl_cashierpayment set Balance='$Balanc' where username='$studentno' "); 
                mysql_query("UPDATE tbl_cashierpayment set Amount='$amount',Or_number='$reference_number',Date_received='$time' where username='$studentno'");
                                 }           
                        }else{

            if($Tpay=='0.00'){//kapag walang lamaan ang third payment
              $tatlo= $amount+ $Spay+ $Fpay;
            if($tatlo>$amountfee){
              mysql_query("UPDATE tbl_cashierpayment set  First_Payment= $amountfee where username='$studentno'");
              $tatlo1= $tatlo-$amountfee;
            if($tatlo1>$amountfee){ 
              mysql_query("UPDATE tbl_cashierpayment set   Second_Payment= $amountfee where username='$studentno'");
              $tatlo2= $tatlo1-$amountfee;
            if($tatlo2>$amountfee){
              mysql_query("UPDATE tbl_cashierpayment set   Third_Payment= $amountfee where username='$studentno'");
              $tatlo3= $tatlo2-$amountfee;
            if($tatlo3>$amountfee){
              mysql_query("UPDATE tbl_cashierpayment set   Fourth_Payment= $amountfee where username='$studentno'");
              $tatlo4= $tatlo3-$amountfee;
                              }else{
            mysql_query("UPDATE tbl_cashierpayment set   Fourth_Payment= $tatlo3 where username='$studentno'");
                                   }
                              }else{
            mysql_query("UPDATE tbl_cashierpayment set   Third_Payment= $tatlo2 where username='$studentno'");
                                  }
                              }else{
            mysql_query("UPDATE tbl_cashierpayment set   Second_Payment= $tatlo1 where username='$studentno'");
                                    }
                            }else{
            mysql_query("UPDATE tbl_cashierpayment set   First_Payment= $tatlo where username='$studentno'");
                                 }
                              }
            $Balanc= $amountbalance- $amount;
                mysql_query("UPDATE tbl_cashierpayment set Balance='$Balanc' where username='$studentno' "); 
                mysql_query("UPDATE tbl_cashierpayment set Amount='$amount',Or_number='$reference_number',Date_received='$time' where username='$studentno'");

                            }
                                //End of else
                                }else{//kapag walang nakikitang laman sa first payment
           mysql_query("UPDATE tbl_cashierpayment set First_Payment= $amountfee where username='$studentno'");
           $greater= $amount-$amountfee;
          if($greater>$amountfee){
           mysql_query("UPDATE tbl_cashierpayment set Second_Payment= $amountfee where username='$studentno'");
            $greater1= $greater-$amountfee;
                                       
          if($greater1>$amountfee){
            mysql_query("UPDATE tbl_cashierpayment set Third_Payment= $amountfee where username='$studentno'");
            $greater2= $greater1-$amountfee;

            if($greater2>$amountfee){
            mysql_query("UPDATE tbl_cashierpayment set Fourth_Payment= $amountfee where username='$studentno'");
            $greater3=$greater2-$amountfee;
                                }else{
            mysql_query("UPDATE tbl_cashierpayment set Fourth_Payment= $greater2 where username='$studentno'");
                                     }
                                }else{
            mysql_query("UPDATE tbl_cashierpayment set Third_Payment= $greater1 where username='$studentno'");
                                      }
                                }else{
            mysql_query("UPDATE tbl_cashierpayment set Second_Payment= $greater where username='$studentno'");
                                      }  

            $Balanc= $amountbalance- $amount;
                mysql_query("UPDATE tbl_cashierpayment set Balance='$Balanc' where username='$studentno' "); 
                mysql_query("UPDATE tbl_cashierpayment set Amount='$amount',Or_number='$reference_number',Date_received='$time' where username='$studentno'");
                                }
                                header("Refresh:1;");   

            }   
        


    






}
?>





<!DOCTYPE html>
<html>
<head>

                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Tuition Payment Section</title>
                    <link rel="stylesheet" href="../../css/bootstrap.min.css"></link>
                    <link rel="stylesheet" href="../../css/bootstrap.css"></link>
                    <link rel="stylesheet" href="../../css/style.css"></link>
                    <link rel="stylesheet" href="../../css/font-awesome.css"></link>
                     <link rel="stylesheet" href="../../css/font-awesome.min.css"></link>

                    <script src="../../js/dropdown.js"></script>
                    <script src="../../js/bootstrap.min.js"></script>
                    <script src="../../js/jquery.1.11.1.js"></script>
                    <script src="../../js/bootstrap.js"></script>
                   
<head>
<style>
          body{

                    background: url(../../images/45.gif); background-size: cover;  font: 15px/1.7em 'Calibri';
                      

                    }

                    
                    
</style>
<script type="text/javascript">

function tuitionfee(){

var cash= document.getElementById('cash').value;
var re = /^[0-9]/;
if(cash==""){
  document.getElementById('paymentamount').innerHTML= "<span style ='color: red;'>Amount to pay are required!</span>";
      return false;
}else{
            if (!cash.match(re)) {

                document.getElementById('message').innerHTML="<i style ='color: red;'>Tuition Fee cannot be empty. It contains amount.</i>";
                return false;  
            }else{
               document.getElementById('paymentamount').innerHTML="<span style ='color: blue;' class='glyphicon glyphicon-ok'></span>";
            } 
}

   



}

     var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        specialKeys.push(9); //Tab
        specialKeys.push(46); //Delete
        specialKeys.push(36); //Home
        specialKeys.push(35); //End
        specialKeys.push(37); //Left
        specialKeys.push(39); //Right


          function forcash(e) {

            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                     //48 to 57 (Numbers), 
            var ret = ((keyCode >= 48 && keyCode <= 57) ||(keyCode == 46) ||(specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;

        }

   function PrintMe(el) {
   var disp_setting="toolbar=yes,location=no,";
   disp_setting+="directories=yes,menubar=yes,";
   disp_setting+="scrollbars=yes,width=650, height=600, left=100, top=25";
   var content_vlue = document.getElementById(el).innerHTML;
   var docprint=window.open("","",disp_setting);
   docprint.document.open();
   docprint.document.write('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"');
   docprint.document.write('"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">');
   docprint.document.write('<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">');
   docprint.document.write('<head><title>MARIA KATRINA SCHOOL APPLICATION FORM</title>');
   docprint.document.write('<link rel="stylesheet" href="../../css/bootstrap.min.css"></link>');
   docprint.document.write('<link rel="stylesheet" href="../../css/bootstrap.css"></link>');                
   docprint.document.write('<body onLoad="window.print()">');
   docprint.document.write('<center><P>MARIA KATRINA SCHOOL</P></center>'); 
   docprint.document.write('<br><center><P>No. 10 Mendoza St. Saog, Marilao Bulacan</P></center>'); 
   docprint.document.write('<center><img src="../../images/mks.jpg" height="100px" width="100px"></link></center>');  
   docprint.document.write('<br><center><B>THIS IS YOUR OFFICIAL RECEIPT</B></center>');

   docprint.document.write(content_vlue);
   docprint.document.write('</body></html>');
   docprint.document.close();
   docprint.focus();
}

</script>




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
        <li><a href="cashier.php"><i class="fa fa-dashboard"></i><span>Home</span> </a> </li>

     
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




<?php 
if(isset($_GET['studentnumber'])){
  $studentnumber=$_GET['studentnumber'];
            ?>
            <div class="container">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#" data-toggle="tab">Tuition Payment</a>
              </li>
              <li><a href="tuitionpayment.php">Back to list</a>
              </li>
            </ul>
            <?php
  $qry="SELECT * from tbl_prospectivestudents where username='$studentnumber'";
  $result=mysql_query($qry);

  $payment="SELECT * from tbl_cashierpayment where username='$studentnumber'";
  $res_payment=mysql_query($payment);

  while($payment=mysql_fetch_array($res_payment)){
                      $Fpay=$payment['First_Payment'];
                      $Spay=$payment['Second_Payment'];
                      $Tpay=$payment['Third_Payment'];
                      $Ftpay=$payment['Fourth_Payment'];

                      $Fpay1= number_format($Fpay,2);
                      $Spay1= number_format($Spay,2);
                      $Tpay1= number_format($Tpay,2);
                      $Ftpay1= number_format($Ftpay,2);

                      $date_receive=$payment['Date_received'];
                      $amount=$payment['Amount'];
                      $Or_number=$payment['Or_number'];
                      $balance=$payment['Balance'];
                

                      $totalpergrading=$Fpay+$Spay+$Tpay+$Ftpay;

                      $totalamountpaid=number_format($totalpergrading,2);

  }

  while($qry=mysql_fetch_array($result)){
      $studnum=$qry['username'];
      $sname=$qry['surname'];
      $fname=$qry['firstname'];
      $mname=$qry['middlename'];
      $discount=$qry['Discount'];
      $mode=$qry['Mode'];
      $fee=$qry['Fee'];
      $honor=$qry['honors'];
      $status=$qry['status'];

                      
                      //$Fstat=$qry['First_Status'];
                      //$Sstat=$qry['Second_Status'];
                      //$Tstat=$qry['Third_Status'];
                      //$Ftstat=$qry['Fourth_Status'];
                   

                     
    if($fee>0){

    ?>
      <br>
        <div class="row">
       <div class="col-md-12">
        <div class="col-md-6">
        </div>

        <div class="col-md-6">
        <button type='submit' href='#' class='next'  onclick="PrintMe('divid')"><i class='glyphicon glyphicon-print'></i> Print Receipt</button>
        </div>

        </div>
        </div>
        <br>

        <div id="divid"><!--For printing -->
        <div class="row" >
        <div class="col-md-6">
        </div>
       <div class="col-md-6">
       <div class="table-responsive">          
          <table class="table" border="1" >
              <thead>
                    <tr><th colspan="5"><center>Last Payment Details</center></th></tr>
                    <tr>

                       <th><center>Amount Received</center></th>
                       <th><center>Date received</center></th>
                       <th><center>OR Reference</center></th>
                       <th><center>Balance</center></th>      
                             
                    </tr>
              </thead>
              <tbody >
                    <tr>
                      <td><center><?php echo $amount;?></center></td>
                      <td><center><?php echo $date_receive?></center></td>
                      <th><center><?php echo $Or_number?></center></th>
                      <td><center><?php echo $balance?></center></td>
          
                    </tr>
              </tbody>
          </table>
        </div>
        </div>
        </div>



        <div class="row">
        <div class="col-md-6">

          <div class="row">
          <div class="col-md-12">
          Full name: <?php echo $sname.','.$fname.','.$mname?>
          </div>
          </div>

          <div class="row">
          <div class="col-md-12">
          Student number: <?php echo $studnum?>
          </div>
          </div>

          <div class="row">
          <div class="col-md-12">
          Section: <?//php echo //?>
          </div>
          </div>

          <div class="row">
          <div class="col-md-12">
          Student Status: <?php   echo $status?>
          </div>
          </div>

          <div class="row">
          <div class="col-md-12">
          Mode Of Payment:<?php if($mode=='1'){
                                          ?>
                                          Full/Cash
                                          <?php
                                          
                                        }elseif($mode=='2'){
                                          ?>
                                          Semestral
                                          <?php
                                          

                                        }elseif($mode=='3'){
                                          ?>
                                          Quarterly
                                          <?php
                                          

                                        }elseif($mode=='4'){
                                          ?>
                                          Monthly A
                                          <?php
                                          

                                        }?>
          </div>
          </div><!--For Mode of Payment -->


    
          <div class="row" >
          <div class="col-md-12">
          Special Previleges: <?php echo $honor?> 
          </div>
         
          </div><!--For Mode of Payment -->


        </div>
       <div class="col-md-6">
        <div class="row" >
        <div class="col-md-12">
       <div class="table-responsive">          
          <table class="table" border="1">
              <thead>
                    <tr><th colspan="5"><center>Schedule of Payment</center></th></tr>
                    <tr>

                       <th><center></center></th>
                       <th><center>Cash</center></th>
                       <th><center>Semestral</center></th>
                       <th><center>Quarterly</center></th>
                       <th><center>Monthly A</center></th>                                    
                    </tr>
              </thead>
              <tbody >
                  
                    <tr>
                      <td>Upon Enrollment(1st payment)</td>
                      <td><center><?php if($mode=='1'){
                                                         $fee= number_format($fee,2);
                                                         echo "&#8369; $fee"
                                                        ;}?></center></td>
                      <td><center><?php if($mode=='2'){
                                              $half=$fee-($fee*(49.69/100));
                                              $half= number_format($half);
                                              echo "&#8369; $half";

                                                    }?></center></td>
                      <td><center><?php if($mode=='3'){
                                              $quarter=$fee-($fee*(69.1493/100));
                                               $quarter= number_format($quarter,2);
                                              echo "&#8369; $quarter";

                                                    }?></center></td>
                      <td><center><?php if($mode=='4'){
                                              $quarter=$fee-($fee*(73.469/100));
                                              $quarter= number_format($quarter);
                                              echo "&#8369; $quarter";


                        }?></center></td>
                    </tr>

                    <tr>
                      <td>2nd payment  (<?php $m= date_create('August 10');
                                        $xx = $m->format("F. d, Y");
                                        echo "$xx";
                                        ?>)</td>
                      <td></td>
                      <td></td>
                      <td><center><?php if($mode=='3'){
                                              $quarter=$fee-($fee*(82.71270/100));
                                               $quarter= number_format($quarter);
                                              echo "&#8369; $quarter";

                                                    }?></center></td>
                      <td><center><?php if($mode=='4'){
                                              $quarter=$fee-($fee*(91.838/100));
                                              $quarter= number_format($quarter);
                                              echo "&#8369; $quarter/mon.";


                        }?></center></td>
                    </tr>

                    <tr>
                      <td>3rd payment  (<?php $m= date_create('October 05');
                                        $xx = $m->format("F. d, Y");
                                        echo "$xx";
                                        ?>)</td></td>
                      <td></td>
                      <td><center><?php if($mode=='2'){
                                              $half=$fee-($fee*(50.31077/100));
                                              $half= number_format($half,2);
                                              echo "&#8369; $half";

                                                    }?></center></td>
                      <td><center><?php if($mode=='3'){
                                              $quarter=$fee-($fee*(82.71270/100));
                                                 $quarter= number_format($quarter);
                                              echo "&#8369; $quarter";

                                                    }?></center></td>
                      <td><center><?php if($mode=='4'){echo "(July to March)";  }?></center></td>
                    </tr>

                    <tr>
                      <td>4th payment (<?php $m= date_create('December 10');
                                        $xx = $m->format("F. d, Y");
                                        echo "$xx";
                                        ?>)</td></td>
                      <td></td>
                      <td></td>
                      <td><center><?php if($mode=='3'){
                                              $quarter=$fee-($fee*(82.71270/100));
                                               $quarter= number_format($quarter);
                                              echo "&#8369; $quarter" ;

                                                    }?></center></td>
                      <td><center><?php if($mode=='4'){echo "Due every 10th of";  }?></center></td>
                    </tr>

                    <tr>
                      <td>5th payment (<?php $recent=date('Y')+1;
                                          $xy= date_create('March 1');
                                          $sd = $xy->format("F. d, $recent");
                                          echo "$sd";
                                        ?>)</td></td>
                      <td></td>
                      <td></td>
                      <td><center><?php if($mode=='3'){
                                              $quarter=$fee-($fee*(82.71270/100));
                                               $quarter= number_format($quarter);
                                              echo "&#8369; $quarter";

                                                    }?></center></td>
                      <td><center><?php if($mode=='4'){echo "the month";  }?></center></td>
                    </tr>


                     <tr>
                      <td></td></td>
                      <td><center style="background-color: green; color: white;"><?php if($mode=='1'){  echo "Total fee: &#8369; $fee";  }?></center></td>
                      <td><center style="background-color: green; color: white;"><?php if($mode=='2'){$fee= number_format($fee,2); echo "Total fee: &#8369; $fee";  }?></center></td>
                      <td><center style="background-color: green; color: white;"><?php if($mode=='3'){$fee= number_format($fee,2); echo "Total fee:&#8369;$fee";  }?></center></td>
                      <td><center style="background-color: green; color: white;"><?php if($mode=='4'){$fee= number_format($fee,2); echo "Total fee: &#8369; $fee";  }?></center></td>
                    </tr>

              </tbody>
          </table>
       </div>
       </div>
       </div>
       </div>
       </div>
      </div><!-- End of printing-->
     

      <div class="row">
       <div class="col-md-12">
       <div class="table-responsive">          
          <table class="table" border="1">
              <thead>
                    <tr>
                       <th><center>First Grading</center></th>
                       <th><center>Second Grading</center></th>
                       <th><center>Third Grading</center></th>
                       <th><center>Fourth Grading</center></th>   
                       <th><center>Total Amount Paid</center></th>                                 
                    </tr>
              </thead>
              <tbody >
                    <tr>
                      <td><center><?php echo $Fpay1;?></center></td>
                      <td><center><?php echo $Spay1?></center></td>
                      <td><center><?php echo $Tpay1?></center></td>
                      <td><center><?php echo $Ftpay1?></center></td>
                      <th><center style="color: white; background-color: green;"><?php echo "&#8369 $totalamountpaid"?></center></th>  
                    </tr>
              </tbody>
          </table>
        </div>
        </div>
        </div>

        


          

        <form method="POST" onsubmit="return tuitionfee(event)">
          <i  id="error" style="color: Red; display: none;"></i>

         <div class="row">
        <div class="col-md-6">
        </div>
        <div class="col-md-6">
              <center><p id="message"></p></center>
              <center><p id="paymentamount"></p></center>
          <div class='input-group'>
          <input class='form-control' type='text' name="cash" id="cash" placeholder="Enter amount to pay here.."     onkeypress="return forcash(event);" ondrop="return false;" onpaste="return false;" maxlength='10' >
          <span class='input-group-btn'>
          <button class='btn btn-primary' type='submit' name='enterpayment'>Enter</button>
          <input type="hidden" value="<?php echo $studentnumber?>" name="studentno"/>
 
          </span>
          </div>
        </div>
        </div>
        </form>
        <br>
                                   
    <?php
   }else{
     ?>
     <br>

        <div class="row">
        <div class="col-md-6">
        </div>
       <div class="col-md-6">
       <div class="table-responsive">          
          <table class="table" border="1">
              <thead>
                    <tr><th colspan="4"><center>Last Payment Details</center></th></tr>
                    <tr>

                       <th><center>Amount Received</center></th>
                       <th><center>Date received</center></th>
                       <th><center>OR Reference</center></th>
                       <th><center>Amount to Pay:</center></th>                                  
                    </tr>
              </thead>
              <tbody >
                    <tr>
                      <td><center>--</center></td>
                      <td><center>--</center></td>
                      <th><center>--</center></th>
                      <td><center>--</center></td>
                    </tr>
              </tbody>
          </table>
        </div>
        </div>
        </div>



        <div class="row">
        <div class="col-md-6">

          <div class="row">
          <div class="col-md-12">
          Full name: <?php echo $sname.','.$fname.','.$mname?>
          </div>
          </div>

          <div class="row">
          <div class="col-md-12">
          Student number: <?php echo $studnum?>
          </div>
          </div>

          <div class="row">
          <div class="col-md-12">
          Section: <?//php echo //?>
          </div>
          </div>

          <div class="row">
          <div class="col-md-12">
          Student Status: <?//php echo //?>
          </div>
          </div>

          <div class="row">
          <div class="col-md-12">
          Mode Of Payment:--
          </div>
          </div><!--For Mode of Payment -->


    
          <div class="row">
          <div class="col-md-12">
          Special Previleges: --
          </div>
         
          </div><!--For Mode of Payment -->


        </div>
       <div class="col-md-6">
        <div class="row">
        <div class="col-md-12">
       <div class="table-responsive">          
          <table class="table" border="1">
              <thead>
                    <tr>
                       <th><center></center></th>
                       <th><center>Cash</center></th>
                       <th><center>Semestral</center></th>
                       <th><center>Quarterly</center></th>
                       <th><center>Monthly A</center></th>                                    
                    </tr>
              </thead>
              <tbody >
                  
                    <tr>
                      <td>--</td>
                       <td>--</td>
                        <td>--</td>
                         <td>--</td>
                         <td>--</td>

                    </tr>

              </tbody>
          </table>
       </div>
       </div>
       </div>
       </div>
       </div>


         <div class="row">
        <div class="col-md-6">
        </div>
        <div class="col-md-6">
              <center><p id="message"></p></center>
              <center><p id="paymentamount"></p></center>
          <div class='input-group'>
          <input class='form-control' type='text' name="cash" id="cash" placeholder="Enter amount to pay here.."     onkeypress="return forcash(event);" ondrop="return false;" onpaste="return false;" maxlength='10' readonly>
          <span class='input-group-btn'>
          <button class='btn btn-primary' type='submit'>Enter</button>
          <input type="hidden" value="<?php echo $studentnumber?>" name="studentno"/>
 
          </span>
          </div>
        </div>
        </div>
      
        <br>
     

      <div class="row">
       <div class="col-md-12">
       <div class="table-responsive">          
          <table class="table" border="1">
              <thead>
                    <tr>
                       <th><center>First Grading</center></th>
                       <th><center>Second Grading</center></th>
                       <th><center>Third Grading</center></th>
                       <th><center>Fourth Grading</center></th>                                    
                    </tr>
              </thead>
              <tbody >
                    <tr>
                      <td><center>--</center></td>
                      <td><center>--</center></td>
                      <td><center>--</center></td>
                      <td><center>--</center></td>
                    </tr>
              </tbody>
          </table>
        </div>
        </div>
        </div>


        <?php


   }




  }

}else{


?>

<div class="container">
<ul class="nav nav-tabs">
  <li class="active"><a href="#" data-toggle="tab">Tuition Payment</a>
  </li>
  <li><a href="cashier.php">Back to home</a>
  </li>
</ul>
<div class='demo_jui'>
              <table cellpadding='0' cellspacing='1' border='1' class='display' id='tbl' class='jtable'>
                            <thead>

                              <tr><th><center>Student number</center></th>
                                  <th><center>Full name</center></th>
                                  <th><center>Action</center></th>
                                 
                                  </tr>

                                  </thead>
                                  <?php 
                                                           
                                  $details="SELECT * from tbl_prospectivestudents where username!=0";
                                  $res_details=mysql_query($details);

                                  while($details = mysql_fetch_array($res_details))
                                  {
                                  $student_count=$details['id'];
                                  $student_number=$details['username'];
                                  $student_surname=$details['surname'];
                                  $student_firstname=$details['firstname'];
                                  $student_middlename=$details['middlename'];
                                  $student_status=$details['status'];
                                  $email=$details['email'];

                               
                                  ?>

                                  <tr>
                                  <td><center><?php echo $student_number?></center></td>
                                  <td><center><?php echo $student_surname.','.$student_firstname.','.$student_middlename?></center></td>
                                  <td><center><a href='tuitionpayment.php?studentnumber=<?php echo $student_number?>'>click for payment</a></center></td>
                        



                                  </tr>
                                  <?php
                                  
                                  }
                                ?> 
                                                              
            </table></div>
<?php } ?>


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