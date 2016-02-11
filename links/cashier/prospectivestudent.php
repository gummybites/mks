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
    $user=$q['username'];
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
 $tfee=$qry['tuition'];
 $reg=$qry['registration'];
 $med=$qry['medical'];
 $lib=$qry['library'];
 $ath=$qry['athletics'];
 $sgf=$qry['student_government_fee'];
 $pris=$qry['prisaa_fee'];
 $bulp=$qry['bulprisa_fee'];
 $apri=$qry['aprism_fee'];
 $studid=$qry['student_id'];
 $hand=$qry['handbook'];
 $ener=$qry['energy_fee'];
 $insu=$qry['insurance_fee'];
 $orgfee=$qry['organization_fee'];
 $comlab=$qry['computer_lab'];
 $scilab=$qry['science_lab'];
 $tlelab=$qry['tle_lab'];
 $saf=$qry['school_activities_fee'];

 $payment= $tfee+ $reg+ $med+ $lib+ $ath+ $sgf+ $pris+ $bulp +$apri +$studid+ $hand +$ener+ $insu + $orgfee+ $comlab+ $scilab+ $tlelab+ $saf; 



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

<?php 
if($mode=='0'){


}

//if cash si set
elseif($mode=='1'){
                //if statement when cash is set
                $if= $payment-($payment*(5/100));
                $else = $if;
                $format= number_format($if,2);
                
                  
                //if the discount is set to 0
                if($discount=='0'){
                 
                               

                                if(isset($_POST['sumit'])){
                                   
                                
                                $whole= $if/4;
                                $pays= $_POST['cash'];
                                $greater = $pays-$whole;

                               if($pays>$fee){
                                  

                                



                                }elseif($pays>$bal){
             
                               

                                }
                               elseif($pays<=$whole){//if the amount is small
                                                            
                                                              
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


                                   
                            header("Refresh:1;");   
                          }elseif($pays>$whole){//if the amount enter is big
                         
                                    if($Fpay>0){//kapag may nakikitang laman sa First payment
                                      
                                    if($Tpay>0){

                                       if($Ftpay=='0.00'){//kapag walang lamaan ang Fourth payment
                                       $apat= $pays+ $Spay+ $Fpay+$Tpay;
                                       
                                                    if($apat>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $apat1= $apat-$whole;
                  
                                                                if($apat1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $apat2= $apat1-$whole;

                                                                            if($apat2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $apat3= $apat2-$whole;

                                                                                        if($apat3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $apat4= $apat3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $apat3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $apat2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $apat1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= $apat where username='$username'");
                                                                        }
                                                                        $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");
                                                        }           
                                                          }else{

                                      if($Tpay=='0.00'){//kapag walang lamaan ang third payment
                                       $tatlo= $pays+ $Spay+ $Fpay;
                                       
                                                    if($tatlo>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $tatlo1= $tatlo-$whole;
                  
                                                                if($tatlo1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $tatlo2= $tatlo1-$whole;

                                                                            if($tatlo2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $tatlo3= $tatlo2-$whole;

                                                                                        if($tatlo3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $tatlo4= $tatlo3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $tatlo3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $tatlo2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $tatlo1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= $tatlo where username='$username'");
                                                                        }

                                                        }
                                                    $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");

                                    }
                                //End of else

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
                                header("Refresh:1;");   

            }   
        }


    }elseif($discount=='5'){

                $x= $if-($if*(5/100));
                $less=$payment-$x;
                $five= number_format($less,2);
                 //Entering amount when the discount is set to 0
                                 
                                if(isset($_POST['sumit'])){
                                   
                                
                                $whole= $x/4;
                                $pays= $_POST['cash'];
                                $greater = $pays-$whole;

                                if($pays>$fee){
                                  

                                



                                }elseif($pays>$bal){
             
                               

                                }
                               elseif($pays<=$whole){//if the amount is small
                                                            
                                                              
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


                                   
                              header("Refresh:1;");  
                          }elseif($pays>$whole){//if the amount enter is big
                         
                                    if($Fpay>0){//kapag may nakikitang laman sa First payment
                                      
                                    if($Tpay>0){

                                       if($Ftpay=='0.00'){//kapag walang lamaan ang Fourth payment
                                       $apat= $pays+ $Spay+ $Fpay+$Tpay;
                                       
                                                    if($apat>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $apat1= $apat-$whole;
                  
                                                                if($apat1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $apat2= $apat1-$whole;

                                                                            if($apat2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $apat3= $apat2-$whole;

                                                                                        if($apat3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $apat4= $apat3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $apat3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $apat2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $apat1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= $apat where username='$username'");
                                                                        }
                                                                        $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");
                                                        }           
                                                          }else{

                                      if($Tpay=='0.00'){//kapag walang lamaan ang third payment
                                       $tatlo= $pays+ $Spay+ $Fpay;
                                       
                                                    if($tatlo>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $tatlo1= $tatlo-$whole;
                  
                                                                if($tatlo1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $tatlo2= $tatlo1-$whole;

                                                                            if($tatlo2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $tatlo3= $tatlo2-$whole;

                                                                                        if($tatlo3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $tatlo4= $tatlo3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $tatlo3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $tatlo2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $tatlo1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= $tatlo where username='$username'");
                                                                        }

                                                        }
                                                    $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");

                                    }
                                //End of else

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
                                header("Refresh:1;");   


                              }   
                          }                   

//if the discount is set to 10
}elseif($discount=='7'){
                   $x= $if-($if*(7/100));
                   $less=$payment-$x;
                   $seven= number_format($less,2);

                  
                  
                                  //Entering amount when the discount is set to 0
                                
                                if(isset($_POST['sumit'])){
                                   
                                
                                $whole= $x/4;
                                $pays= $_POST['cash'];
                                $greater = $pays-$whole;

                                if($pays>$fee){
                                  

                                



                                }elseif($pays>$bal){
             
                               

                                }
                               elseif($pays<=$whole){//if the amount is small
                                                            
                                                              
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


                                   
                               header("Refresh:1;"); 
                          }elseif($pays>$whole){//if the amount enter is big
                         
                                    if($Fpay>0){//kapag may nakikitang laman sa First payment
                                      
                                    if($Tpay>0){

                                       if($Ftpay=='0.00'){//kapag walang lamaan ang Fourth payment
                                       $apat= $pays+ $Spay+ $Fpay+$Tpay;
                                       
                                                    if($apat>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $apat1= $apat-$whole;
                  
                                                                if($apat1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $apat2= $apat1-$whole;

                                                                            if($apat2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $apat3= $apat2-$whole;

                                                                                        if($apat3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $apat4= $apat3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $apat3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $apat2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $apat1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= $apat where username='$username'");
                                                                        }
                                                                        $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");
                                                        }           
                                                          }else{

                                      if($Tpay=='0.00'){//kapag walang lamaan ang third payment
                                       $tatlo= $pays+ $Spay+ $Fpay;
                                       
                                                    if($tatlo>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $tatlo1= $tatlo-$whole;
                  
                                                                if($tatlo1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $tatlo2= $tatlo1-$whole;

                                                                            if($tatlo2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $tatlo3= $tatlo2-$whole;

                                                                                        if($tatlo3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $tatlo4= $tatlo3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $tatlo3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $tatlo2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $tatlo1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= $tatlo where username='$username'");
                                                                        }

                                                        }
                                                    $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");

                                    }
                                //End of else

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
                                header("Refresh:1;");   


                              }   
                            }                      

//if the discount is set to 10
}elseif($discount=='10'){
                   $x= $if-($if*(10/100));
                   $less=$payment-$x;
                   $ten= number_format($less,2);

                  
                  
                                  //Entering amount when the discount is set to 0
                                 
                                if(isset($_POST['sumit'])){
                                   
                                
                                $whole= $x/4;
                                $pays= $_POST['cash'];
                                $greater = $pays-$whole;

                              if($pays<=$whole){//if the amount is small
                                                            
                                                              
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


                                   
                               header("Refresh:1;"); 
                          }elseif($pays>$whole){//if the amount enter is big
                         
                                    if($Fpay>0){//kapag may nakikitang laman sa First payment
                                      
                                    if($Tpay>0){

                                       if($Ftpay=='0.00'){//kapag walang lamaan ang Fourth payment
                                       $apat= $pays+ $Spay+ $Fpay+$Tpay;
                                       
                                                    if($apat>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $apat1= $apat-$whole;
                  
                                                                if($apat1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $apat2= $apat1-$whole;

                                                                            if($apat2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $apat3= $apat2-$whole;

                                                                                        if($apat3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $apat4= $apat3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $apat3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $apat2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $apat1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= $apat where username='$username'");
                                                                        }
                                                                        $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");
                                                        }           
                                                          }else{

                                      if($Tpay=='0.00'){//kapag walang lamaan ang third payment
                                       $tatlo= $pays+ $Spay+ $Fpay;
                                       
                                                    if($tatlo>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $tatlo1= $tatlo-$whole;
                  
                                                                if($tatlo1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $tatlo2= $tatlo1-$whole;

                                                                            if($tatlo2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $tatlo3= $tatlo2-$whole;

                                                                                        if($tatlo3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $tatlo4= $tatlo3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $tatlo3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $tatlo2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $tatlo1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= $tatlo where username='$username'");
                                                                        }

                                                        }
                                                    $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");

                                    }
                                //End of else

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
                                header("Refresh:1;");   


                              }   
                            }
                          
}




}








?>



<!DOCTYPE html>
<html>
<title>
Prospective Students
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

th{
  text-align: center;

}
td{
  text-align: center;
}



</style>


</head>
<body>




<nav id='menu' class="navbar navbar-default navbar-static-top">
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
        Cashier
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
      <div class="col-md-2 sidebar">
        <div class="row">
  <!-- uncomment code for absolute positioning tweek see top comment in css -->
  <div class="absolute-wrapper"> </div>
  <!-- Menu -->
  <div class="side-menu">
    <nav class="navbar navbar-default" role="navigation">
      <!-- Main Menu -->
      <div class="side-menu-container">
        <ul class="nav navbar-nav">
          
          <li><a href="cashier.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
          <!-- Dropdown-->
          <li  id="dropdown">
            <a data-toggle="collapse" href="#dropdown-lvl1">
              <span class="glyphicon glyphicon-user"></span> Student <span class="caret"></span>
            </a>

            <!-- Dropdown level 1 -->
            <div id="dropdown-lvl1" class="panel-collapse collapse">
              <div class="panel-body">
                <ul class="nav navbar-nav">
                  <li><a href="listofprospective.php">Prospective</a></li>
                  <li ><a href="listofenrolled.php" class="active">Enrolled</a></li>
  


                  
                </ul>
              </div>
            </div>
          </li>
          


          

 

        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>

  </div>
</div> </div>
      <div class="col-md-10 content">
    
          


                                 
                                    <p class="hr-warning" ></p>
                                   <ol class="breadcrumb bread-warning">
                                     <li class='active'>Prospective Students</li>
                                    </ol>

                                    <div class="text-center"><b>MARIA KATRINA SCHOOL</b>
                                        <p>No. 10 Mendoza St. Saog, Marilao, Bulacan</p>
                                    </div>
    <?php 
    if(isset($_POST['sumit'])){

      if($mode=='1'){

      if($discount=='0'){
                            if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }



      }elseif($discount=='5'){
                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }

      }elseif($discount=='7'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }


      }elseif($discount=='10'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }

      }elseif($discount=='15'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }

      }elseif($discount=='17'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }

      }elseif($discount=='20'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }


      }elseif($discount=='25'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }


      }elseif($discount=='27'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }


      }elseif($discount=='30'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }


      }elseif($discount=='35'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }


      }elseif($discount=='37'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }


      }elseif($discount=='50'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }


      }elseif($discount=='55'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }


      }elseif($discount=='57'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }


      }elseif($discount=='100'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }

      }
     
    }if($mode=='2'){

      if($discount=='0'){
                            if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }



      }elseif($discount=='5'){
                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }

      }elseif($discount=='7'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }


      }elseif($discount=='10'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }

      }elseif($discount=='15'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }

      }elseif($discount=='17'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }

      }elseif($discount=='20'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }


      }elseif($discount=='25'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }


      }elseif($discount=='27'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }


      }elseif($discount=='30'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }


      }elseif($discount=='35'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }


      }elseif($discount=='37'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }


      }elseif($discount=='50'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }


      }elseif($discount=='55'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }


      }elseif($discount=='57'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }


      }elseif($discount=='100'){

                                  if($pays>$fee){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! Pay for exact amount of tuition! You have $fee only</center></div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='alert alert-warning'><center><span class='glyphicon glyphicon-info-sign'></span> Transaction Failed! You have now $bal pesos</center></div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";
                                }elseif($pays<=$whole){
                                   echo "<div class='alert alert-success'><center><span class='glyphicon glyphicon-ok-sign'></span> Transaction Success!</center></div>";

                                }

      }
    }
  }

    ?>
 

            <div class='row'>
            <div class="col-md-5">STUDENT ID NUMBER: <i><?php echo $user; ?></i></div>
            </div>

            <div class='row'>
            <div class="col-md-5">FULL NAME: <i><?php echo $Sname.',&nbsp&nbsp&nbsp      ', $Fname. ',&nbsp&nbsp&nbsp', $Mname; ?></i></div>
            </div>

            <div class='row'>
            <div class="col-md-5">SECTION: </div>
            </div>

            <div class='row'>
            <div class="col-md-5">STATUS: <?php echo $stat; ?></div>
            </div>

            <div class='row'>
            <div class="col-md-5">MODE OF PAYMENT: <?php if($mode=='1'){
                                echo "Cash/Full";
                              }if($mode=='2'){
                                echo "Semester";
                              }if($mode=='3'){
                                echo "Quarterly";
                              }if($mode=='4'){
                                echo "Monthly A";
                              }?></div>

                         
            </div>

                                                   
   
                  

              



<div class='row'>
<div class="col-md-12">
 <div class="table-responsive">   
                <table class="table" border='1'  >
                                                          <thead>
                                                            <tr>
                                                              <th  bgcolor='#FCAC45' id='caption'>FIRST PAYMENT</th>
                                                              <th  bgcolor='#FCAC45' id='caption'>SECOND PAYMENT</th>
                                                              <th  bgcolor='#FCAC45' id='caption'>THIRD PAYMENT</th>
                                                              <th  bgcolor='#FCAC45'id='caption'>FOURTH PAYMENT</th>
                                                            </tr>
                                                          </thead>
                                                            <tbody>


               <?php

                    

                     
                      if($discount=='0'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='5'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='7'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='10'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='15'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='17'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='20'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='25'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='27'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='30'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='35'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='37'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='50'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='55'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='57'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='100'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }

  ?>

</tbody>
</table>
</div></div></div>   



<div class='row'>
<div class="col-md-6">Amount to pay:
<?php 


      if($mode=='1'){
        if($discount=='0'){
          echo "$format";

      }elseif($discount=='5'){
           echo "$x"; 
                             

      }elseif($discount=='7'){

        echo "$x";


      }elseif($discount=='10'){

        echo "$x";


      }elseif($discount=='15'){

        echo "$x";


      }elseif($discount=='17'){

        echo "$x";


      }elseif($discount=='20'){

        echo "$x";


      }elseif($discount=='25'){

        echo "$x";


      }elseif($discount=='27'){

        echo "$x";


      }elseif($discount=='30'){

        echo "$x";


      }elseif($discount=='35'){

        echo "$x";


      }elseif($discount=='37'){

        echo "$x";


      }elseif($discount=='50'){

        echo "$x";


      }elseif($discount=='55'){

        echo "$x";


      }elseif($discount=='57'){

        echo "$x";


      }elseif($discount=='100'){

        echo "$x";


      }
     
    }if($mode=='2'){


    if($discount=='0'){
          echo "$x";

      }elseif($discount=='5'){
           echo "$x"; 
                             

      }elseif($discount=='7'){

        echo "$x";


      }elseif($discount=='10'){

        echo "$x";


      }elseif($discount=='15'){

        echo "$x";


      }elseif($discount=='17'){

        echo "$x";


      }elseif($discount=='20'){

        echo "$x";


      }elseif($discount=='25'){

        echo "$x";


      }elseif($discount=='27'){

        echo "$x";


      }elseif($discount=='30'){

        echo "$x";


      }elseif($discount=='35'){

        echo "$x";


      }elseif($discount=='37'){

        echo "$x";


      }elseif($discount=='50'){

        echo "$x";


      }elseif($discount=='55'){

        echo "$x";


      }elseif($discount=='57'){

        echo "$x";


      }elseif($discount=='100'){

        echo "$x";


      }

}
    
    ?></div>
</div>



<div class="row">
<div class="col-md-5">Discount= <?php 

if($mode=='1'){

                      if($discount=='0'){
                          echo "none(0)";
                      }elseif($discount=='5'){
                          echo "Five(5) Less: $five ";
                      }elseif($discount=='7'){
                          echo "Seven(7) Less: $seven";
                      }elseif($discount=='10'){
                          echo "Ten(10)  Less: $ten";
                      }elseif($discount=='15'){
                          echo "Fifteen(15)  Less: $fifteen";
                      }elseif($discount=='17'){
                          echo "Seventeen(17)  Less: $seventeen";
                      }elseif($discount=='20'){
                          echo "Twenty(20) Less: $twenty";
                      }elseif($discount=='25'){
                          echo "Twentyfive(25) Less: $twentyfive";
                      }elseif($discount=='27'){
                          echo "Twentyseven(27) Less: $twentyseven";
                      }elseif($discount=='30'){
                          echo "Thirty(30) Less: $thirty";
                      }elseif($discount=='35'){
                          echo "Thirtyfive(35) Less: $thirtyfive";
                      }elseif($discount=='37'){
                          echo "Thirtyseven(37) Less: $thirtyseven";
                      }elseif($discount=='50'){
                          echo "Fifty(50) Less: $fifty";
                      }elseif($discount=='55'){
                          echo "Fiftyfive(55) Less: $fiftyfive";
                      }elseif($discount=='57'){
                          echo "Fiftyseven(57) Less: $fiftyseven";
                      }elseif($discount=='100'){
                          echo "Full(100) $full";
                      }

}elseif($mode=='2'){

if($discount=='0'){
                          echo "none(0)";
                      }elseif($discount=='5'){
                          echo "Five(5) Less: $five ";
                      }elseif($discount=='7'){
                          echo "Seven(7) Less: $seven";
                      }elseif($discount=='10'){
                          echo "Ten(10)  Less: $ten";
                      }elseif($discount=='15'){
                          echo "Fifteen(15)  Less: $fifteen";
                      }elseif($discount=='17'){
                          echo "Seventeen(17)  Less: $seventeen";
                      }elseif($discount=='20'){
                          echo "Twenty(20) Less: $twenty";
                      }elseif($discount=='25'){
                          echo "Twentyfive(25) Less: $twentyfive";
                      }elseif($discount=='27'){
                          echo "Twentyseven(27) Less: $twentyseven";
                      }elseif($discount=='30'){
                          echo "Thirty(30) Less: $thirty";
                      }elseif($discount=='35'){
                          echo "Thirtyfive(35) Less: $thirtyfive";
                      }elseif($discount=='37'){
                          echo "Thirtyseven(37) Less: $thirtyseven";
                      }elseif($discount=='50'){
                          echo "Fifty(50) Less: $fifty";
                      }elseif($discount=='55'){
                          echo "Fiftyfive(55) Less: $fiftyfive";
                      }elseif($discount=='57'){
                          echo "Fiftyseven(57) Less: $fiftyseven";
                      }elseif($discount=='100'){
                          echo "Full(100) $full";
                      }

}elseif($mode=='0'){
  echo "No Mode of Payment Selected!";


}
                      ?>
                   </td></div>
<div class="col-md-5">Balance: <?php $balance=number_format($bal,2); 
                  echo $balance;?></div>
</div>





              
          

              <div class='col-md-4'></div>
                  <div class='col-md-4'></div><form method='POST'>
                  
              

                                   <div class='col-md-4'><div class='input-group' >
                                    <input class='form-control' type='text' name='cash' placeholder='Enter Amount here..' >
                                    <span class='input-group-btn'>
                                      <button class='btn btn-primary' type='submit' name='sumit'>Enter</button>
                                    </span></div></div>
                 


                


                                 
       
            

               

                  
               
 </div>
 </div>

                                    
      


       <style type="text/css" title="currentStyle">
           
            @import "../../css/demo_page.css";
            @import "../../css/demo_table_jui.css";
            
        </style>



</body>
</html>


              
      
<?php }?>
