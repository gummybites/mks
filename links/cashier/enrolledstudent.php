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

<?php 


//if cash si set
if($mode=='1'){
                //if statement when cash is set
                $if= $payment-($payment*(5/100));
                $else = $if;
                $format= number_format($if,2);
                
                  
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
                                  

                                



                                }elseif($pays>$bal){
             
                               

                                }
                               elseif($pays<$whole){//if the amount is small
                                                 mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");             
                                                              
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
                                    mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");
                                    if($Fpay>0){//kapag may nakikitang laman sa First payment
                                      
                                      if($Fpay!=$whole){
                                        $great= $pays+ $Fpay;
                                       
                                                    if($great>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $great1= $great-$whole;
                  
                                                                if($great1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $great2= $great1-$whole;

                                                                            if($greater2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $great3= $greater2-$whole;

                                                                                        if($greater3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $great4= $greater3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $great3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $great2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $great1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= great where username='$username'");
                                                                        }
                                                                        $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");

                                      }elseif($Tpay>0){

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



                              }   
                            }
                          }
                        
                            
                        









//if the discount is set to 0
                elseif($discount=='5'){
                   $x= $if-($if*(5/100));
                  $less=$payment-$x;
                $five= number_format($less,2);

                  
                  
                                  //Entering amount when the discount is set to 0
                                 if(isset($_POST['submit'])){
                                 
                                  if($fee>0){
                                     
                                     }else{
                                      mysql_query("UPDATE tbl_prospectivestudents set Balance=$x where username='$username' "); 
                                      mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");

                                     }
                                 }
                                if(isset($_POST['sumit'])){
                                   
                                
                                $whole= $x/4;
                                $pays= $_POST['cash'];
                                $greater = $pays-$whole;

                                if($pays>$fee){
                                  

                                



                                }elseif($pays>$bal){
             
                               

                                }
                               elseif($pays<$whole){//if the amount is small
                                                 mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");             
                                                              
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
                                    mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");
                                    if($Fpay>0){//kapag may nakikitang laman sa First payment

                                      if($Fpay!=$whole){
                                        $great= $pays+ $Fpay;

                                        if($great>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $great1= $great-$whole;
                  
                                                                if($great1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $great2= $great1-$whole;

                                                                            if($great2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $great3= $great2-$whole;

                                                                                        if($great3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $great4= $great3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $great3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $great2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $great1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= great where username='$username'");
                                                                        }
                                                                        $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");
                                      }elseif($Tpay>0){

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



                              }   
                            }
                          
                }
              












                //if the discount is set to 10
                elseif($discount=='7'){
                   $x= $if-($if*(7/100));
                  $less=$payment-$x;
                $seven= number_format($less,2);

                  
                  
                                  //Entering amount when the discount is set to 0
                                 if(isset($_POST['submit'])){
                                 
                                  if($fee>0){
                                     
                                     }else{
                                      mysql_query("UPDATE tbl_prospectivestudents set Balance=$x where username='$username' "); 
                                      mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");

                                     }
                                 }
                                if(isset($_POST['sumit'])){
                                   
                                
                                $whole= $x/4;
                                $pays= $_POST['cash'];
                                $greater = $pays-$whole;

                                if($pays>$fee){
                                  

                                



                                }elseif($pays>$bal){
             
                               

                                }
                               elseif($pays<$whole){//if the amount is small
                                                 mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");             
                                                              
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
                                    mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");
                                    if($Fpay>0){//kapag may nakikitang laman sa First payment

                                      if($Fpay!=$whole){
                                        $great= $pays+ $Fpay;
                                        if($great>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $great1= $great-$whole;
                  
                                                                if($great1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $great2= $great1-$whole;

                                                                            if($greater2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $great3= $greater2-$whole;

                                                                                        if($greater3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $great4= $greater3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $great3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $great2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $great1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= great where username='$username'");
                                                                        }
                                                                        $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");
                                      }elseif($Tpay>0){

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



                              }   
                            }
                          
                }













  
            
               
                
                  
                //if the discount is set to 10
                elseif($discount=='10'){
                   $x= $if-($if*(10/100));
                  $less=$payment-$x;
                $ten= number_format($less,2);

                  
                  
                                  //Entering amount when the discount is set to 0
                                 if(isset($_POST['submit'])){
                                 
                                  if($fee>0){
                                     
                                     }else{
                                      mysql_query("UPDATE tbl_prospectivestudents set Balance=$x where username='$username' "); 
                                      mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");

                                     }
                                 }
                                if(isset($_POST['sumit'])){
                                   
                                
                                $whole= $x/4;
                                $pays= $_POST['cash'];
                                $greater = $pays-$whole;

                                if($pays>$fee){
                                  

                                



                                }elseif($pays>$bal){
             
                               

                                }
                               elseif($pays<$whole){//if the amount is small
                                                 mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");             
                                                              
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
                                    mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");
                                    if($Fpay>0){//kapag may nakikitang laman sa First payment

                                      if($Fpay!=$whole){
                                        $great= $pays+ $Fpay;
                                        if($great>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $great1= $great-$whole;
                  
                                                                if($great1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $great2= $great1-$whole;

                                                                            if($greater2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $great3= $greater2-$whole;

                                                                                        if($greater3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $great4= $greater3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $great3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $great2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $great1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= great where username='$username'");
                                                                        }
                                                                        $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");
                                      }elseif($Tpay>0){

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



                              }   
                            }
                          
                }
              

































                //if the discount is set to 25
                elseif($discount=='20'){
                   $x= $if-($if*(20/100));
                  $less=$payment-$x;
                $twenty= number_format($less,2);

                  
                  
                                  //Entering amount when the discount is set to 0
                                 if(isset($_POST['submit'])){
                                 
                                  if($fee>0){
                                     
                                     }else{
                                      mysql_query("UPDATE tbl_prospectivestudents set Balance=$x where username='$username' "); 
                                      mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");

                                     }
                                 }
                                if(isset($_POST['sumit'])){
                                   
                                
                                $whole= $x/4;
                                $pays= $_POST['cash'];
                                $greater = $pays-$whole;

                                if($pays>$fee){
                                  

                                



                                }elseif($pays>$bal){
             
                               

                                }
                               elseif($pays<$whole){//if the amount is small
                                                 mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");             
                                                              
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
                                    mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");
                                    if($Fpay>0){//kapag may nakikitang laman sa First payment

                                      if($Fpay!=$whole){
                                        $great= $pays+ $Fpay;
                                        if($great>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $great1= $great-$whole;
                  
                                                                if($great1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $great2= $great1-$whole;

                                                                            if($greater2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $great3= $greater2-$whole;

                                                                                        if($greater3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $great4= $greater3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $great3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $great2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $great1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= great where username='$username'");
                                                                        }
                                                                        $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");
                                      }elseif($Tpay>0){

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



                              }   
                            }
                          
                }









































                //if the discount is set to 25
                elseif($discount=='30'){
                   $x= $if-($if*(30/100));
                  $less=$payment-$x;
                $thirty= number_format($less,2);

                  
                  
                                  //Entering amount when the discount is set to 0
                                 if(isset($_POST['submit'])){
                                 
                                  if($fee>0){
                                     
                                     }else{
                                      mysql_query("UPDATE tbl_prospectivestudents set Balance=$x where username='$username' "); 
                                      mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");

                                     }
                                 }
                                if(isset($_POST['sumit'])){
                                   
                                
                                $whole= $x/4;
                                $pays= $_POST['cash'];
                                $greater = $pays-$whole;

                                if($pays>$fee){
                                  

                                



                                }elseif($pays>$bal){
             
                               

                                }
                               elseif($pays<$whole){//if the amount is small
                                                 mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");             
                                                              
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
                                    mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");
                                    if($Fpay>0){//kapag may nakikitang laman sa First payment

                                      if($Fpay!=$whole){
                                        $great= $pays+ $Fpay;
                                        if($great>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $great1= $great-$whole;
                  
                                                                if($great1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $great2= $great1-$whole;

                                                                            if($greater2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $great3= $greater2-$whole;

                                                                                        if($greater3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $great4= $greater3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $great3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $great2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $great1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= great where username='$username'");
                                                                        }
                                                                        $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");
                                      }elseif($Tpay>0){

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



                              }   
                            }
                          
                }


















                //if the discount is set to 10
                elseif($discount=='50'){
                   $x= $if-($if*(50/100));
                  $less=$payment-$x;
                $fifty= number_format($less,2);

                  
                  
                                  //Entering amount when the discount is set to 0
                                 if(isset($_POST['submit'])){
                                 
                                  if($fee>0){
                                     
                                     }else{
                                      mysql_query("UPDATE tbl_prospectivestudents set Balance=$x where username='$username' "); 
                                      mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");

                                     }
                                 }
                                if(isset($_POST['sumit'])){
                                   
                                
                                $whole= $x/4;
                                $pays= $_POST['cash'];
                                $greater = $pays-$whole;

                                if($pays>$fee){
                                  

                                



                                }elseif($pays>$bal){
             
                               

                                }
                               elseif($pays<$whole){//if the amount is small
                                                 mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");             
                                                              
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
                                    mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");
                                    if($Fpay>0){//kapag may nakikitang laman sa First payment

                                      if($Fpay!=$whole){
                                        $great= $pays+ $Fpay;
                                        if($great>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $great1= $great-$whole;
                  
                                                                if($great1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $great2= $great1-$whole;

                                                                            if($greater2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $great3= $greater2-$whole;

                                                                                        if($greater3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $great4= $greater3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $great3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $great2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $great1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= great where username='$username'");
                                                                        }
                                                                        $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");
                                      }elseif($Tpay>0){

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



                              }   
                            }
                          
                }


































                //if the discount is set to 100
                elseif($discount=='100'){
                   $x= $if-($if*(100/100));
                  $less=$payment-$x;
                $full= number_format($less,2);

                  
                  
                                  //Entering amount when the discount is set to 0
                                 if(isset($_POST['submit'])){
                                 
                                  if($fee>0){
                                     
                                     }else{
                                      mysql_query("UPDATE tbl_prospectivestudents set Balance=$x where username='$username' "); 
                                      mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");

                                     }
                                 }
                                if(isset($_POST['sumit'])){
                                   
                                
                                $whole= $x/4;
                                $pays= $_POST['cash'];
                                $greater = $pays-$whole;

                                if($pays>$fee){
                                  

                                



                                }elseif($pays>$bal){
             
                               

                                }
                               elseif($pays<$whole){//if the amount is small
                                                 mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");             
                                                              
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
                                    mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");
                                    if($Fpay>0){//kapag may nakikitang laman sa First payment

                                      if($Fpay!=$whole){
                                        $great= $pays+ $Fpay;
                                        if($great>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $great1= $great-$whole;
                  
                                                                if($great1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $great2= $great1-$whole;

                                                                            if($greater2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $great3= $greater2-$whole;

                                                                                        if($greater3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $great4= $greater3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $great3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $great2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $great1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= great where username='$username'");
                                                                        }
                                                                        $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");
                                      }elseif($Tpay>0){

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



                              }   
                            }
                          
                }


}











//if the cash is set to installment
elseif($mode=='2'){


                if($discount=='0'){
                   $x= $payment;

                  
                  
                                  //Entering amount when the discount is set to 0
                                 if(isset($_POST['submit'])){
                                 
                                  if($fee>0){
                                     
                                     }else{
                                      mysql_query("UPDATE tbl_prospectivestudents set Balance=$x where username='$username' "); 
                                      mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");

                                     }
                                 }
                                if(isset($_POST['sumit'])){
                                   
                                
                                $whole= $x/4;
                                $pays= $_POST['cash'];
                                $greater = $pays-$whole;

                                if($pays>$fee){
                                  

                                



                                }elseif($pays>$bal){
             
                               

                                }
                               elseif($pays<$whole){//if the amount is small
                                                 mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");             
                                                              
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
                                    mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");
                                    if($Fpay>0){//kapag may nakikitang laman sa First payment

                                      if($Fpay!=$whole){
                                        $great= $pays+ $Fpay;
                                        if($great>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $great1= $great-$whole;
                  
                                                                if($great1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $great2= $great1-$whole;

                                                                            if($greater2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $great3= $greater2-$whole;

                                                                                        if($greater3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $great4= $greater3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $great3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $great2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $great1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= great where username='$username'");
                                                                        }
                                                                        $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");
                                      }elseif($Tpay>0){

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



                              }   
                            }
                          
                }


                elseif($discount=='5'){
                   $x= $payment-($payment*(5/100));
                  $less=$payment-$x;
                $five= number_format($less,2);

                  
                  
                                  //Entering amount when the discount is set to 0
                                 if(isset($_POST['submit'])){
                                 
                                  if($fee>0){
                                     
                                     }else{
                                      mysql_query("UPDATE tbl_prospectivestudents set Balance=$x where username='$username' "); 
                                      mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");

                                     }
                                 }
                                if(isset($_POST['sumit'])){
                                   
                                
                                $whole= $x/4;
                                $pays= $_POST['cash'];
                                $greater = $pays-$whole;

                                if($pays>$fee){
                                  

                                



                                }elseif($pays>$bal){
             
                               

                                }
                               elseif($pays<$whole){//if the amount is small
                                                 mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");             
                                                              
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
                                    mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");
                                    if($Fpay>0){//kapag may nakikitang laman sa First payment

                                      if($Fpay!=$whole){


                                        $great= $pays+ $Fpay;
                                        if($great>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $great1= $great-$whole;
                  
                                                                if($great1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $great2= $great1-$whole;

                                                                            if($greater2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $great3= $greater2-$whole;

                                                                                        if($greater3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $great4= $greater3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $great3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $great2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $great1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= great where username='$username'");
                                                                        }
                                                                        $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");


                                      }elseif($Tpay>0){

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



                              }   
                            }
                          
                }



















                elseif($discount=='7'){
                   $x= $payment-($payment*(7/100));
                  $less=$payment-$x;
                $seven= number_format($less,2);

                  
                  
                                  //Entering amount when the discount is set to 0
                                 if(isset($_POST['submit'])){
                                 
                                  if($fee>0){
                                     
                                     }else{
                                      mysql_query("UPDATE tbl_prospectivestudents set Balance=$x where username='$username' "); 
                                      mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");

                                     }
                                 }
                                if(isset($_POST['sumit'])){
                                   
                                
                                $whole= $x/4;
                                $pays= $_POST['cash'];
                                $greater = $pays-$whole;

                                if($pays>$fee){
                                  

                                



                                }elseif($pays>$bal){
             
                               

                                }
                               elseif($pays<$whole){//if the amount is small
                                                 mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");             
                                                              
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
                                    mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");
                                    if($Fpay>0){//kapag may nakikitang laman sa First payment

                                      if($Fpay!=$whole){


                                        $great= $pays+ $Fpay;
                                        if($great>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $great1= $great-$whole;
                  
                                                                if($great1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $great2= $great1-$whole;

                                                                            if($greater2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $great3= $greater2-$whole;

                                                                                        if($greater3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $great4= $greater3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $great3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $great2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $great1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= great where username='$username'");
                                                                        }
                                                                        $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");


                                      }elseif($Tpay>0){

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



                              }   
                            }
                          
                }

















                elseif($discount=='10'){
                   $x= $payment-($payment*(10/100));
                  $less=$payment-$x;
                $ten= number_format($less,2);

                  
                  
                                  //Entering amount when the discount is set to 0
                                 if(isset($_POST['submit'])){
                                 
                                  if($fee>0){
                                     
                                     }else{
                                      mysql_query("UPDATE tbl_prospectivestudents set Balance=$x where username='$username' "); 
                                      mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");

                                     }
                                 }
                                if(isset($_POST['sumit'])){
                                   
                                
                                $whole= $x/4;
                                $pays= $_POST['cash'];
                                $greater = $pays-$whole;

                                if($pays>$fee){
                                  

                                



                                }elseif($pays>$bal){
             
                               

                                }
                               elseif($pays<$whole){//if the amount is small
                                                 mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");             
                                                              
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
                                    mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");
                                    if($Fpay>0){//kapag may nakikitang laman sa First payment

                                      if($Fpay!=$whole){


                                        $great= $pays+ $Fpay;
                                        if($great>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $great1= $great-$whole;
                  
                                                                if($great1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $great2= $great1-$whole;

                                                                            if($greater2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $great3= $greater2-$whole;

                                                                                        if($greater3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $great4= $greater3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $great3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $great2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $great1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= great where username='$username'");
                                                                        }
                                                                        $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");


                                      }elseif($Tpay>0){

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



                              }   
                            }
                          
                }













                elseif($discount=='20'){
                   $x= $payment-($payment*(20/100));
                  $less=$payment-$x;
                $twenty= number_format($less,2);

                  
                  
                                  //Entering amount when the discount is set to 0
                                 if(isset($_POST['submit'])){
                                 
                                  if($fee>0){
                                     
                                     }else{
                                      mysql_query("UPDATE tbl_prospectivestudents set Balance=$x where username='$username' "); 
                                      mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");

                                     }
                                 }
                                if(isset($_POST['sumit'])){
                                   
                                
                                $whole= $x/4;
                                $pays= $_POST['cash'];
                                $greater = $pays-$whole;

                                if($pays>$fee){
                                  

                                



                                }elseif($pays>$bal){
             
                               

                                }
                               elseif($pays<$whole){//if the amount is small
                                                 mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");             
                                                              
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
                                    mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");
                                    if($Fpay>0){//kapag may nakikitang laman sa First payment

                                      if($Fpay!=$whole){


                                        $great= $pays+ $Fpay;
                                        if($great>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $great1= $great-$whole;
                  
                                                                if($great1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $great2= $great1-$whole;

                                                                            if($greater2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $great3= $greater2-$whole;

                                                                                        if($greater3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $great4= $greater3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $great3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $great2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $great1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= great where username='$username'");
                                                                        }
                                                                        $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");


                                      }elseif($Tpay>0){

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



                              }   
                            }
                          
                }



                elseif($discount=='30'){
                   $x= $payment-($payment*(30/100));
                  $less=$payment-$x;
                $thirty= number_format($less,2);

                  
                  
                                  //Entering amount when the discount is set to 0
                                 if(isset($_POST['submit'])){
                                 
                                  if($fee>0){
                                     
                                     }else{
                                      mysql_query("UPDATE tbl_prospectivestudents set Balance=$x where username='$username' "); 
                                      mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");

                                     }
                                 }
                                if(isset($_POST['sumit'])){
                                   
                                
                                $whole= $x/4;
                                $pays= $_POST['cash'];
                                $greater = $pays-$whole;

                                if($pays>$fee){
                                  

                                



                                }elseif($pays>$bal){
             
                               

                                }
                               elseif($pays<$whole){//if the amount is small
                                                 mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");             
                                                              
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
                                    mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");
                                    if($Fpay>0){//kapag may nakikitang laman sa First payment

                                      if($Fpay!=$whole){


                                        $great= $pays+ $Fpay;
                                        if($great>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $great1= $great-$whole;
                  
                                                                if($great1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $great2= $great1-$whole;

                                                                            if($greater2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $great3= $greater2-$whole;

                                                                                        if($greater3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $great4= $greater3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $great3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $great2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $great1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= great where username='$username'");
                                                                        }
                                                                        $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");


                                      }elseif($Tpay>0){

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



                              }   
                            }
                          
                }





















                elseif($discount=='50'){
                   $x= $payment-($payment*(50/100));
                  $less=$payment-$x;
                $fifty= number_format($less,2);

                  
                  
                                  //Entering amount when the discount is set to 0
                                 if(isset($_POST['submit'])){
                                 
                                  if($fee>0){
                                     
                                     }else{
                                      mysql_query("UPDATE tbl_prospectivestudents set Balance=$x where username='$username' "); 
                                      mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");

                                     }
                                 }
                                if(isset($_POST['sumit'])){
                                   
                                
                                $whole= $x/4;
                                $pays= $_POST['cash'];
                                $greater = $pays-$whole;

                                if($pays>$fee){
                                  

                                



                                }elseif($pays>$bal){
             
                               

                                }
                               elseif($pays<$whole){//if the amount is small
                                                 mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");             
                                                              
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
                                    mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");
                                    if($Fpay>0){//kapag may nakikitang laman sa First payment

                                      if($Fpay!=$whole){


                                        $great= $pays+ $Fpay;
                                        if($great>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $great1= $great-$whole;
                  
                                                                if($great1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $great2= $great1-$whole;

                                                                            if($greater2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $great3= $greater2-$whole;

                                                                                        if($greater3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $great4= $greater3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $great3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $great2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $great1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= great where username='$username'");
                                                                        }
                                                                        $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");


                                      }elseif($Tpay>0){

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



                              }   
                            }
                          
                }




                elseif($discount=='100'){
                   $x= $payment-($payment*(100/100));
                  $less=$payment-$x;
                $full= number_format($less,2);

                  
                  
                                  //Entering amount when the discount is set to 0
                                 if(isset($_POST['submit'])){
                                 
                                  if($fee>0){
                                     
                                     }else{
                                      mysql_query("UPDATE tbl_prospectivestudents set Balance=$x where username='$username' "); 
                                      mysql_query("UPDATE tbl_prospectivestudents set Fee= $x where username='$username' ");

                                     }
                                 }
                                if(isset($_POST['sumit'])){
                                   
                                
                                $whole= $x/4;
                                $pays= $_POST['cash'];
                                $greater = $pays-$whole;

                                if($pays>$fee){
                                  

                                



                                }elseif($pays>$bal){
             
                               

                                }
                               elseif($pays<$whole){//if the amount is small
                                                 mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");             
                                                              
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
                                    mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus= 'enrolled' where username='$username'");
                                    if($Fpay>0){//kapag may nakikitang laman sa First payment

                                      if($Fpay!=$whole){


                                        $great= $pays+ $Fpay;
                                        if($great>$whole){
                                                    mysql_query("UPDATE tbl_prospectivestudents set  First_Payment= $whole where username='$username'");
                                                    $great1= $great-$whole;
                  
                                                                if($great1>$whole){ 
                                                                mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $whole where username='$username'");
                                                                $great2= $great1-$whole;

                                                                            if($greater2>$whole){
                                                                            mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $whole where username='$username'");
                                                                            $great3= $greater2-$whole;

                                                                                        if($greater3>$whole){
                                                                                        mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $whole where username='$username'");
                                                                                        $great4= $greater3-$whole;
                                                                                                            }else{
                                                                                                                mysql_query("UPDATE tbl_prospectivestudents set   Fourth_Payment= $great3 where username='$username'");
                                                                                                                 }
                                                                                                }else{
                                                                                                 mysql_query("UPDATE tbl_prospectivestudents set   Third_Payment= $great2 where username='$username'");
                                                                                                }
                                                                                    }else{
                                                                                       mysql_query("UPDATE tbl_prospectivestudents set   Second_Payment= $great1 where username='$username'");

                                                                                    }

                                                                        }else{
                                                                          mysql_query("UPDATE tbl_prospectivestudents set   First_Payment= great where username='$username'");
                                                                        }
                                                                        $Balanc= $bal-$pays;
                                                    mysql_query("UPDATE tbl_prospectivestudents set Balance=$Balanc where username='$username' ");


                                      }elseif($Tpay>0){

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
hr {
  height: 4px;
  margin-left: 15px;
  margin-bottom:-3px;
}
.hr-warning{
  background-image: -webkit-linear-gradient(left, rgba(210,105,30,.8), rgba(210,105,30,.6), rgba(0,0,0,0));
}
.breadcrumb {
  background: rgba(245, 245, 245, 0); 
  border: 0px solid rgba(245, 245, 245, 1); 
  border-radius: 25px; 
  display: block;
}

.btn-bread{
    margin-top:10px;
    font-size: 12px;
    
    border-radius: 3px;
}


.content{
background-color: #fff;
min-height: 1000px;
}
</style>


</head>
<body>




<nav class="navbar navbar-default navbar-static-top">
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
    
          


                                 
                                    <hr class="hr-warning" />
                                   <ol class="breadcrumb bread-warning">
                                     <li class='active'>Enrolled Students</li>
                                    </ol>

                                    <div class="text-center"><b>MARIA KATRINA SCHOOL</b>
                                        <p>No. 10 Mendoza St. Saog, Marilao, Bulacan</p>
                                    </div>
    <?php 
    if(isset($_POST['sumit'])){

      if($mode=='1'){

      if($discount=='0'){
                            if($pays>$fee){
                                  echo "<div class='well'>Transaction Failed! Pay for exact amount of tuition! You have $fee only</div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='well'>Transaction Failed! You have $bal only</div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='well'>Transaction Success!</div>";
                                }elseif($pays<$whole){
                                   echo "<div class='well'>Transaction Success!</div>";

                                }



      }elseif($discount=='5'){
                                  if($pays>$fee){
                                  echo "<div class='well'>Transaction Failed! Pay for exact amount of tuition! You have $fee only</div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='well'>Transaction Failed! You have now $bal pesos</div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='well'>Transaction Success!</div>";
                                }elseif($pays<$whole){
                                   echo "<div class='well'>Transaction Success!</div>";

                                }

      }elseif($discount=='7'){

                                if($pays>$fee){
                                  echo "<div class='well'>Transaction Failed! Pay for exact amount of tuition! You have $fee only</div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='well'>Transaction Failed! You have now $bal pesos</div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='well'>Transaction Success!</div>";
                                }elseif($pays<$whole){
                                   echo "<div class='well'>Transaction Success!</div>";

                                }


      }elseif($discount=='10'){

                                if($pays>$fee){
                                  echo "<div class='well'>Transaction Failed! Pay for exact amount of tuition! You have $fee only</div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='well'>Transaction Failed! You have now $bal pesos</div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='well'>Transaction Success!</div>";
                                }elseif($pays<$whole){
                                   echo "<div class='well'>Transaction Success!</div>";

                                }


      }elseif($discount=='20'){

                                if($pays>$fee){
                                  echo "<div class='well'>Transaction Failed! Pay for exact amount of tuition! You have $fee only</div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='well'>Transaction Failed! You have now $bal pesos</div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='well'>Transaction Success!</div>";
                                }elseif($pays<$whole){
                                   echo "<div class='well'>Transaction Success!</div>";

                                }


      }elseif($discount=='30'){

                                if($pays>$fee){
                                  echo "<div class='well'>Transaction Failed! Pay for exact amount of tuition! You have $fee only</div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='well'>Transaction Failed! You have now $bal pesos</div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='well'>Transaction Success!</div>";
                                }elseif($pays<$whole){
                                   echo "<div class='well'>Transaction Success!</div>";

                                }


      }elseif($discount=='50'){

                                if($pays>$fee){
                                  echo "<div class='well'>Transaction Failed! Pay for exact amount of tuition! You have $fee only</div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='well'>Transaction Failed! You have now $bal pesos</div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='well'>Transaction Success!</div>";
                                }elseif($pays<$whole){
                                   echo "<div class='well'>Transaction Success!</div>";

                                }


      }elseif($discount=='100'){

                                if($pays>$fee){
                                  echo "<div class='well'>Transaction Failed! Pay for exact amount of tuition! You have $fee only</div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='well'>Transaction Failed! You have now $bal pesos</div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='well'>Transaction Success!</div>";
                                }elseif($pays<$whole){
                                   echo "<div class='well'>Transaction Success!</div>";

                                }


      }
     
    }if($mode=='2'){

      if($discount=='0'){
                            if($pays>$fee){
                                  echo "<div class='well'>Transaction Failed! Pay for exact amount of tuition! You have $fee only</div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='well'>Transaction Failed! You have $bal only</div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='well'>Transaction Success!</div>";
                                }elseif($pays<$whole){
                                   echo "<div class='well'>Transaction Success!</div>";

                                }



      }elseif($discount=='5'){
                                  if($pays>$fee){
                                  echo "<div class='well'>Transaction Failed! Pay for exact amount of tuition! You have $fee only</div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='well'>Transaction Failed! You have now $bal pesos</div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='well'>Transaction Success!</div>";
                                }elseif($pays<$whole){
                                   echo "<div class='well'>Transaction Success!</div>";

                                }

      }elseif($discount=='7'){

                                if($pays>$fee){
                                  echo "<div class='well'>Transaction Failed! Pay for exact amount of tuition! You have $fee only</div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='well'>Transaction Failed! You have now $bal pesos</div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='well'>Transaction Success!</div>";
                                }elseif($pays<$whole){
                                   echo "<div class='well'>Transaction Success!</div>";

                                }


      }elseif($discount=='10'){

                                if($pays>$fee){
                                  echo "<div class='well'>Transaction Failed! Pay for exact amount of tuition! You have $fee only</div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='well'>Transaction Failed! You have now $bal pesos</div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='well'>Transaction Success!</div>";
                                }elseif($pays<$whole){
                                   echo "<div class='well'>Transaction Success!</div>";

                                }


      }elseif($discount=='20'){

                                if($pays>$fee){
                                  echo "<div class='well'>Transaction Failed! Pay for exact amount of tuition! You have $fee only</div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='well'>Transaction Failed! You have now $bal pesos</div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='well'>Transaction Success!</div>";
                                }elseif($pays<$whole){
                                   echo "<div class='well'>Transaction Success!</div>";

                                }


      }elseif($discount=='30'){

                                if($pays>$fee){
                                  echo "<div class='well'>Transaction Failed! Pay for exact amount of tuition! You have $fee only</div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='well'>Transaction Failed! You have now $bal pesos</div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='well'>Transaction Success!</div>";
                                }elseif($pays<$whole){
                                   echo "<div class='well'>Transaction Success!</div>";

                                }


      }elseif($discount=='50'){

                                if($pays>$fee){
                                  echo "<div class='well'>Transaction Failed! Pay for exact amount of tuition! You have $fee only</div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='well'>Transaction Failed! You have now $bal pesos</div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='well'>Transaction Success!</div>";
                                }elseif($pays<$whole){
                                   echo "<div class='well'>Transaction Success!</div>";

                                }


      }elseif($discount=='100'){

                                if($pays>$fee){
                                  echo "<div class='well'>Transaction Failed! Pay for exact amount of tuition! You have $fee only</div>";

                                



                                }elseif($pays>$bal){
                                  echo "<div class='well'>Transaction Failed! You have now $bal pesos</div>";
                               

                                }elseif($pays>$whole){

                                   echo "<div class='well'>Transaction Success!</div>";
                                }elseif($pays<$whole){
                                   echo "<div class='well'>Transaction Success!</div>";

                                }


      }
    }
  }

    ?>
 


 <div class="panel panel-primary">

            <div class="panel-heading">

              <h3 class="panel-title">
               </h3>
            </div>
              
              <div class="panel-body">
                                                   
   
                   <table > 
                  
                 <tbody>
                  <tr>
                    
                    <td align='left'>
         
                    <b>Username: </b>     <i><mark><?php echo $username; ?></mark></i>

                  </td>

                  </tr>


                  <tr>
                    <td align='left'><b>Name: </b><i><mark><?php echo $Sname.',&nbsp&nbsp&nbsp      ', $Fname. ',&nbsp&nbsp&nbsp', $Mname; ?></mark></i></td>
                  </tr>

                  <tr>
                    <td align='left'><b>Section: </td>
                  </tr>


                  <tr>
                    <td align='left'><b>Status:</b><mark> <?php echo $stat; ?></mark></td>
                  </tr>


                  <tr>
                    <td align='left'><b>Mode Of Payment:</b> <mark><?php if($mode=='1'){
                                echo "Cash/Full";
                              }if($mode=='2'){
                                echo "Installment";
                              }?></mark></td>

                


                  </tr>

                  </tbody>
                 
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
                      }if($discount=='5'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='7'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='10'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='20'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='30'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='50'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }if($discount=='100'){
                          echo "<tr><td><center>$Fpay1</center></td><td><center>$Spay1</center></td><td><center>$Tpay1</center></td><td><center>$Ftpay1</center></td></tr>";
                      }

    echo "<table></div>";
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






<table>

<tr>
  <td width='70%' align='left'>Amount to pay: <!--Condition if the option is in cash or installment -->
<mark>
<?php 

 if(isset($_POST['submit'])){
      if($mode=='1'){
        if($discount=='0'){
          echo "$format";

        }
     elseif($discount=='5'){
           echo "$x"; 
                             

      }elseif($discount=='7'){

        echo "$x";


      }elseif($discount=='10'){

        echo "$x";


      }elseif($discount=='20'){

        echo "$x";


      }elseif($discount=='30'){

        echo "$x";


      }elseif($discount=='50'){

        echo "$x";


      }elseif($discount=='100'){

        echo "$x";


      }
     
    }if($mode=='2'){


    if($discount=='0'){
          echo "$x";

        }
     elseif($discount=='5'){
           echo "$x"; 
                             

      }elseif($discount=='7'){

        echo "$x";


      }elseif($discount=='10'){

        echo "$x";


      }elseif($discount=='20'){

        echo "$x";


      }elseif($discount=='30'){

        echo "$x";


      }elseif($discount=='50'){

        echo "$x";


      }elseif($discount=='100'){

        echo "$x";


      }

}
    }
    ?></mark></td>




</tr>




<tr>
<!--Discount -->
                <td width='70%' align='left'>Discount= <mark><?php 
                      if($discount=='0'){
                          echo "none(0)";
                      }elseif($discount=='5'){
                          echo "Five(5) Less: $five ";
                      }elseif($discount=='7'){
                          echo "Seven(7) Less: $seven";
                      }if($discount=='10'){
                          echo "Ten(10)  Less: $ten";
                      }if($discount=='20'){
                          echo "Twenty(20) Less: $twenty";
                      }if($discount=='30'){
                          echo "Thirty(30) Less: $thirty";
                      }if($discount=='50'){
                          echo "Fifty(50) Less: $fifty";
                      }if($discount=='100'){
                          echo "Full(100) $full";
                      }?>
                   </td></mark>

                   <td width='10%' align='left' >
                   </td>
<td width='70%' align='left' >

        Balance: <mark><?php $balance=number_format($bal,2); 
                  echo $balance;?></mark></td>

</tr>
    </table>


   
           
 </div>
</div>

 <div class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
      <p class="navbar-text pull-left">
           Copyright &COPY; 2015 <a href="">MKS</a>
      </p>
      

    </div>
  </div>
      


                           <style type="text/css" title="currentStyle">
           
            @import "../../css/demo_page.css";
            @import "../../css/demo_table_jui.css";
            
        </style>



</body>
</html>


              
      
<?php }?>
