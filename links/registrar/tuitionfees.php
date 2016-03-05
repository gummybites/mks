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


                 $total_misc= $reg+ $med+ $lib+ $ath+ $sgf+ $pris+ $bulp +$apri +$studid+ $hand +$ener+ $insu + $orgfee+ $comlab+ $scilab+ $tlelab+ $saf; 

                 $total= $tfee+ $total_misc;

                }

if(isset($_POST['submit'])){
                    $idnumber=$_POST['idnumber'];
                    $studentnumber=$_POST['studentnumber'];
                    $select= $_POST['cash'];
                    $honordiscount = $_POST['honordiscount'];
                    $nonediscount= $_POST['nonediscount'];           
                    $transferdiscount=$_POST['transferdiscount'];
                    $olddiscount=$_POST['olddiscount'];
                    $siblingdiscount=$_POST['siblingdiscount'];
            

                     if($select=='1'){

                          if($nonediscount=='0'){
                              $payment= $total-($total*(5/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='1',honors = 'No discount', Fee = $payment, Discount = $nonediscount where username='$studentnumber'");
                            
                              mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                              mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                              }

                          //kapag ang discount ay naka set ng honor discount
                          if($honordiscount=='100'){
                           $payment= $total-($total*(100/100));
                            mysql_query("UPDATE tbl_prospectivestudents set Mode='1',Fee = '$payment', honors = 'Valedictorian', Discount = '$honordiscount' where username='$studentnumber'");

                                  mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                  mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                     
                          }elseif($honordiscount=='50'){
                             $payment= $total-($total*(55/100));
                             mysql_query("UPDATE tbl_prospectivestudents set Mode='1',honors = 'Salutatorian', Discount = '$honordiscount', Fee = '$payment' where username='$studentnumber'");

                                   mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','$payment','$studentnumber')");

                                   mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 


                          }elseif($honordiscount=='55'){
                             $payment= $total-($total*(60/100));
                             mysql_query("UPDATE tbl_prospectivestudents set Mode='1',Fee = '$payment',honors = 'Salutatorian w/ 3rd siblings enrolled',Discount = '$honordiscount' where username='$studentnumber'");

                                   mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                   mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
          
                          }elseif($honordiscount=='57'){
                             $payment= $total-($total*(62/100));
                             mysql_query("UPDATE tbl_prospectivestudents set Mode='1',Fee = '$payment', honors = 'Salutatorian w/ 2nd siblings enrolled', Discount = '$honordiscount' where username='$studentnumber'");

                                   mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                   mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                     
                          }

                          //kapag ang discount ay naka set ng transfer discount
                          if($transferdiscount=='30'){
                               $payment= $total-($total*(35/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='1',Fee = '$payment',honors = 'Transferee 1st honor', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 

                          }elseif($transferdiscount=='35'){
                               $payment= $total-($total*(40/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='1',Fee = '$payment',honors = 'Transferee 1st honor w/ 3rd siblings enrolled', Discount = '$transferdiscount' where username='$studentnumber");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                             
                          
                          }elseif($transferdiscount=='37'){
                               $payment= $total-($total*(42/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='1',Fee = '$payment', honors = 'Transferee 1st honor w/ 2nd siblings enrolled', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                    
                          
                          }elseif($transferdiscount=='20'){
                              $payment= $total-($total*(25/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='1',Fee = '$payment', honors = 'Transferee 2nd honor', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
               
                          
                          }elseif($transferdiscount=='25'){
                              $payment= $total-($total*(30/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='1',Fee = '$payment', honors = 'Transferee 2nd honor w/ 3rd siblings enrolled', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                          
                          }elseif($transferdiscount=='27'){
                              $payment= $total-($total*(32/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='1',Fee = '$payment', honors = 'Transferee 2nd honor w/ 2nd siblings enrolled', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                              
                          
                          }elseif($transferdiscount=='10'){
                              $payment= $total-($total*(15/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='1',Fee = '$payment', honors = 'Transferee 3rd honor', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                         
                          }elseif($transferdiscount=='15'){
                              $payment= $total-($total*(20/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='1',Fee = '$payment', honors = 'Transferee 3rd honor w/ 3rd siblings enrolled', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                           
                          
                          }elseif($transferdiscount=='17'){
                              $payment= $total-($total*(22/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='1',Fee = '$payment', honors = 'Transferee 3rd honor w/ 2nd siblings enrolled', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                        
                          }
                          //kapag ang discount ay naka set ng old discount
                          if($olddiscount=='50'){
                              $payment= $total-($total*(55/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='1',Fee = '$payment', honors = '1st honors', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                              
                        }elseif($olddiscount=='55'){
                              $payment= $total-($total*(60/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='1',Fee = '$payment', honors = '1st honors w/ 3rd siblings enrolled', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
          
                        }elseif($olddiscount=='57'){
                              $payment= $total-($total*(62/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='1',Fee = '$payment', honors = '1st honors w/ 2nd siblings enrolled', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                     
                        }elseif($olddiscount=='30'){
                              $payment= $total-($total*(35/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='1',Fee = '$payment', honors = '2nd honors', Discount = '$olddiscount' where username='$studentnumber'");

                              mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                              mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                        
                        }elseif($olddiscount=='35'){
                              $payment= $total-($total*(40/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='1',Fee = '$payment', honors = '3rd honors w/ 3rd siblings enrolled', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                             
                        }elseif($olddiscount=='37'){
                              $payment= $total-($total*(42/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='1',Fee = '$payment', honors = '2nd honors w/ 2nd siblings enrolled', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                           
                        }elseif($olddiscount=='20'){
                              $payment= $total-($total*(25/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='1',Fee = '$payment', honors = '3rd honors', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
          
                        }elseif($olddiscount=='25'){
                              $payment= $total-($total*(30/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='1',Fee = '$payment', honors = '3rd honors w/ 3rd siblings enrolled', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                              
                        }elseif($olddiscount=='27'){
                              $payment= $total-($total*(32/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='1',Fee = '$payment', honors = '3rd honors w/ 2nd siblings enrolled', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                        
                        }

                        //kapag ang discount ay naka set ng sibling discount
                        if($siblingdiscount=='5'){
                              $payment= $total-($total*(10/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='1',Fee = '$payment', honors = '2nd Child', Discount = '$siblingdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                             
                          }elseif($siblingdiscount=='7'){
                              $payment= $total-($total*(12/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='1',Fee = '$payment', honors = '3rd Child', Discount = '$siblingdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                      
                          }elseif($siblingdiscount=='100'){
                              $payment= $total-($total*(100/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='1',Fee = '$payment', honors = '4th Child', Discount = '$siblingdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                           
                        }
                       
    
                     }elseif($select=='2'){
                      
                    

                          if($nonediscount=='0'){
                              $payment= $total+(544.50);
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='2',honors = 'No discount', Fee = $payment, Discount = $nonediscount where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                              }

                          //kapag ang discount ay naka set ng honor discount
                          if($honordiscount=='100'){
                           $payment= $total-($total*(100/100));
                            mysql_query("UPDATE tbl_prospectivestudents set Mode='2',Fee = '$payment', honors = 'Valedictorian', Discount = '$honordiscount' where username='$studentnumber'");

                                  mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                  mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                     
                          }elseif($honordiscount=='50'){
                             $totalpayment=$total+(544.50);
                             $payment= $totalpayment-($totalpayment*(50/100));
                             mysql_query("UPDATE tbl_prospectivestudents set Mode='2',honors = 'Salutatorian', Discount = '$honordiscount', Fee = '$payment' where username='$studentnumber'");

                                   mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                   mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 

                          }elseif($honordiscount=='55'){
                            $totalpayment=$total+(544.50);
                            $payment= $totalpayment-($totalpayment*(55/100));
                             mysql_query("UPDATE tbl_prospectivestudents set Mode='2',Fee = '$payment',honors = 'Salutatorian w/ 3rd siblings enrolled',Discount = '$honordiscount' where username='$studentnumber'");

                                   mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                   mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
          
                          }elseif($honordiscount=='57'){
                            $totalpayment=$total+(544.50);
                            $payment= $totalpayment-($totalpayment*(57/100));
                             mysql_query("UPDATE tbl_prospectivestudents set Mode='2',Fee = '$payment', honors = 'Salutatorian w/ 2nd siblings enrolled', Discount = '$honordiscount' where username='$studentnumber'");

                                   mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                   mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                     
                          }

                          //kapag ang discount ay naka set ng transfer discount
                          if($transferdiscount=='30'){
                              $totalpayment=$total+(544.50);
                              $payment= $totalpayment-($totalpayment*(30/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='2',Fee = '$payment',honors = 'Transferee 1st honor', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 

                          }elseif($transferdiscount=='35'){
                              $totalpayment=$total+(544.50);
                              $payment= $totalpayment-($totalpayment*(35/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='2',Fee = '$payment',honors = 'Transferee 1st honor w/ 3rd siblings enrolled', Discount = '$transferdiscount' where username='$studentnumber");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                             
                          
                          }elseif($transferdiscount=='37'){
                              $totalpayment=$total+(544.50);
                              $payment= $totalpayment-($totalpayment*(37/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='2',Fee = '$payment', honors = 'Transferee 1st honor w/ 2nd siblings enrolled', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                    
                          
                          }elseif($transferdiscount=='20'){
                              $totalpayment=$total+(544.50);
                              $payment= $totalpayment-($totalpayment*(20/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='2',Fee = '$payment', honors = 'Transferee 2nd honor', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
               
                          
                          }elseif($transferdiscount=='25'){
                              $totalpayment=$total+(544.50);
                              $payment= $totalpayment-($totalpayment*(25/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='2',Fee = '$payment', honors = 'Transferee 2nd honor w/ 3rd siblings enrolled', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                          
                          }elseif($transferdiscount=='27'){
                                $totalpayment=$total+(544.50);
                              $payment= $totalpayment-($totalpayment*(27/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='2',Fee = '$payment', honors = 'Transferee 2nd honor w/ 2nd siblings enrolled', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                              
                          
                          }elseif($transferdiscount=='10'){
                                $totalpayment=$total+(544.50);
                              $payment= $totalpayment-($totalpayment*(10/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='2',Fee = '$payment', honors = 'Transferee 3rd honor', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                         
                          }elseif($transferdiscount=='15'){
                                $totalpayment=$total+(544.50);
                            $payment= $totalpayment-($totalpayment*(15/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='2',Fee = '$payment', honors = 'Transferee 3rd honor w/ 3rd siblings enrolled', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                           
                          
                          }elseif($transferdiscount=='17'){
                                $totalpayment=$total+(544.50);
                            $payment= $totalpayment-($totalpayment*(17/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='2',Fee = '$payment', honors = 'Transferee 3rd honor w/ 2nd siblings enrolled', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                        
                          }
                          //kapag ang discount ay naka set ng old discount
                          if($olddiscount=='50'){
                                $totalpayment=$total+(544.50);
                            $payment= $totalpayment-($totalpayment*(50/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='2',Fee = '$payment', honors = '1st honors', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                              
                        }elseif($olddiscount=='55'){
                                $totalpayment=$total+(544.50);
                            $payment= $totalpayment-($totalpayment*(55/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='2',Fee = '$payment', honors = '1st honors w/ 3rd siblings enrolled', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
          
                        }elseif($olddiscount=='57'){
                                $totalpayment=$total+(544.50);
                            $payment= $totalpayment-($totalpayment*(57/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='2',Fee = '$payment', honors = '1st honors w/ 2nd siblings enrolled', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                     
                        }elseif($olddiscount=='30'){
                                $totalpayment=$total+(544.50);
                            $payment= $totalpayment-($totalpayment*(30/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='2',Fee = '$payment', honors = '2nd honors', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                        
                        }elseif($olddiscount=='35'){
                                $totalpayment=$total+(544.50);
                            $payment= $totalpayment-($totalpayment*(35/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='2',Fee = '$payment', honors = '3rd honors w/ 3rd siblings enrolled', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                             
                        }elseif($olddiscount=='37'){
                                $totalpayment=$total+(544.50);
                            $payment= $totalpayment-($totalpayment*(37/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='2',Fee = '$payment', honors = '2nd honors w/ 2nd siblings enrolled', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                           
                        }elseif($olddiscount=='20'){
                                $totalpayment=$total+(544.50);
                            $payment= $totalpayment-($totalpayment*(20/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='2',Fee = '$payment', honors = '3rd honors', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
          
                        }elseif($olddiscount=='25'){
                                $totalpayment=$total+(544.50);
                            $payment= $totalpayment-($totalpayment*(25/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='2',Fee = '$payment', honors = '3rd honors w/ 3rd siblings enrolled', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                              
                        }elseif($olddiscount=='27'){
                                $totalpayment=$total+(544.50);
                            $payment= $totalpayment-($totalpayment*(27/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='2',Fee = '$payment', honors = '3rd honors w/ 2nd siblings enrolled', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                        
                        }

                        //kapag ang discount ay naka set ng sibling discount
                        if($siblingdiscount=='5'){
                                $totalpayment=$total+(544.50);
                            $payment= $totalpayment-($totalpayment*(5/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='2',Fee = '$payment', honors = '2nd Child', Discount = '$siblingdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                             
                          }elseif($siblingdiscount=='7'){
                                $totalpayment=$total+(544.50);
                            $payment= $totalpayment-($totalpayment*(7/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='2',Fee = '$payment', honors = '3rd Child', Discount = '$siblingdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                      
                          }elseif($siblingdiscount=='100'){
                              $payment= $total-($total*(100/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='2',Fee = '$payment', honors = '4th Child', Discount = '$siblingdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                           
                        }


                     }elseif($select=='3'){
                  
                     

                          if($nonediscount=='0'){
                              $payment= $total+(923.75);
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='3',honors = 'No discount', Fee = $payment, Discount = $nonediscount where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                              }

                          //kapag ang discount ay naka set ng honor discount
                          if($honordiscount=='100'){
                           $payment= $total-($total*(100/100));
                            mysql_query("UPDATE tbl_prospectivestudents set Mode='3',Fee = '$payment', honors = 'Valedictorian', Discount = '$honordiscount' where username='$studentnumber'");

                                  mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                  mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                     
                          }elseif($honordiscount=='50'){
                             $totalpayment=$total+(923.75);
                             $payment= $totalpayment-($totalpayment*(50/100));
                             mysql_query("UPDATE tbl_prospectivestudents set Mode='3',honors = 'Salutatorian', Discount = '$honordiscount', Fee = '$payment' where username='$studentnumber'");

                                   mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                   mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 

                          }elseif($honordiscount=='55'){
                            $totalpayment=$total+(923.75);
                            $payment= $totalpayment-($totalpayment*(55/100));
                             mysql_query("UPDATE tbl_prospectivestudents set Mode='3',Fee = '$payment',honors = 'Salutatorian w/ 3rd siblings enrolled',Discount = '$honordiscount' where username='$studentnumber'");

                                   mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                   mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
          
                          }elseif($honordiscount=='57'){
                            $totalpayment=$total+(923.75);
                            $payment= $totalpayment-($totalpayment*(57/100));
                             mysql_query("UPDATE tbl_prospectivestudents set Mode='3',Fee = '$payment', honors = 'Salutatorian w/ 2nd siblings enrolled', Discount = '$honordiscount' where username='$studentnumber'");

                                   mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                   mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                     
                          }

                          //kapag ang discount ay naka set ng transfer discount
                          if($transferdiscount=='30'){
                              $totalpayment=$total+(923.75);
                              $payment= $totalpayment-($totalpayment*(30/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='3',Fee = '$payment',honors = 'Transferee 1st honor', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 

                          }elseif($transferdiscount=='35'){
                              $totalpayment=$total+(923.75);
                              $payment= $totalpayment-($totalpayment*(35/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='3',Fee = '$payment',honors = 'Transferee 1st honor w/ 3rd siblings enrolled', Discount = '$transferdiscount' where username='$studentnumber");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                             
                          
                          }elseif($transferdiscount=='37'){
                              $totalpayment=$total+(923.75);
                              $payment= $totalpayment-($totalpayment*(37/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='3',Fee = '$payment', honors = 'Transferee 1st honor w/ 2nd siblings enrolled', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                    
                          
                          }elseif($transferdiscount=='20'){
                              $totalpayment=$total+(923.75);
                              $payment= $totalpayment-($totalpayment*(20/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='3',Fee = '$payment', honors = 'Transferee 2nd honor', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
               
                          
                          }elseif($transferdiscount=='25'){
                              $totalpayment=$total+(923.75);
                              $payment= $totalpayment-($totalpayment*(25/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='3',Fee = '$payment', honors = 'Transferee 2nd honor w/ 3rd siblings enrolled', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                          
                          }elseif($transferdiscount=='27'){
                                $totalpayment=$total+(923.75);
                              $payment= $totalpayment-($totalpayment*(27/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='3',Fee = '$payment', honors = 'Transferee 2nd honor w/ 2nd siblings enrolled', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                              
                          
                          }elseif($transferdiscount=='10'){
                                $totalpayment=$total+(923.75);
                              $payment= $totalpayment-($totalpayment*(10/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='3',Fee = '$payment', honors = 'Transferee 3rd honor', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                         
                          }elseif($transferdiscount=='15'){
                                $totalpayment=$total+(923.75);
                            $payment= $totalpayment-($totalpayment*(15/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='3',Fee = '$payment', honors = 'Transferee 3rd honor w/ 3rd siblings enrolled', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                           
                          
                          }elseif($transferdiscount=='17'){
                                $totalpayment=$total+(923.75);
                            $payment= $totalpayment-($totalpayment*(17/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='3',Fee = '$payment', honors = 'Transferee 3rd honor w/ 2nd siblings enrolled', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                        
                          }
                          //kapag ang discount ay naka set ng old discount
                          if($olddiscount=='50'){
                                $totalpayment=$total+(923.75);
                            $payment= $totalpayment-($totalpayment*(50/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='3',Fee = '$payment', honors = '1st honors', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                              
                        }elseif($olddiscount=='55'){
                                $totalpayment=$total+(923.75);
                            $payment= $totalpayment-($totalpayment*(55/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='3',Fee = '$payment', honors = '1st honors w/ 3rd siblings enrolled', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
          
                        }elseif($olddiscount=='57'){
                                $totalpayment=$total+(923.75);
                            $payment= $totalpayment-($totalpayment*(57/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='3',Fee = '$payment', honors = '1st honors w/ 2nd siblings enrolled', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                     
                        }elseif($olddiscount=='30'){
                                $totalpayment=$total+(923.75);
                            $payment= $totalpayment-($totalpayment*(30/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='3',Fee = '$payment', honors = '2nd honors', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                        
                        }elseif($olddiscount=='35'){
                                $totalpayment=$total+(923.75);
                            $payment= $totalpayment-($totalpayment*(35/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='3',Fee = '$payment', honors = '3rd honors w/ 3rd siblings enrolled', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                             
                        }elseif($olddiscount=='37'){
                                $totalpayment=$total+(923.75);
                            $payment= $totalpayment-($totalpayment*(37/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='3',Fee = '$payment', honors = '2nd honors w/ 2nd siblings enrolled', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                           
                        }elseif($olddiscount=='20'){
                                $totalpayment=$total+(923.75);
                            $payment= $totalpayment-($totalpayment*(20/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='3',Fee = '$payment', honors = '3rd honors', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
          
                        }elseif($olddiscount=='25'){
                                $totalpayment=$total+(923.75);
                            $payment= $totalpayment-($totalpayment*(25/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='3',Fee = '$payment', honors = '3rd honors w/ 3rd siblings enrolled', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                              
                        }elseif($olddiscount=='27'){
                                $totalpayment=$total+(923.75);
                            $payment= $totalpayment-($totalpayment*(27/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='3',Fee = '$payment', honors = '3rd honors w/ 2nd siblings enrolled', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                        
                        }

                        //kapag ang discount ay naka set ng sibling discount
                        if($siblingdiscount=='5'){
                                $totalpayment=$total+(923.75);
                            $payment= $totalpayment-($totalpayment*(5/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='3',Fee = '$payment', honors = '2nd Child', Discount = '$siblingdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                             
                          }elseif($siblingdiscount=='7'){
                                $totalpayment=$total+(923.75);
                            $payment= $totalpayment-($totalpayment*(7/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='3',Fee = '$payment', honors = '3rd Child', Discount = '$siblingdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                      
                          }elseif($siblingdiscount=='100'){
                              $payment= $total-($total*(100/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='3',Fee = '$payment', honors = '4th Child', Discount = '$siblingdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                           
                        }
                     }elseif($select=='4'){
                   

                          if($nonediscount=='0'){
                              $payment= $total+(3170);
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='4',honors = 'No discount', Fee = $payment, Discount = $nonediscount where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                              }

                          //kapag ang discount ay naka set ng honor discount
                          if($honordiscount=='100'){
                           $payment= $total-($total*(100/100));
                            mysql_query("UPDATE tbl_prospectivestudents set Mode='4',Fee = '$payment', honors = 'Valedictorian', Discount = '$honordiscount' where username='$studentnumber'");

                                  mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                  mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                     
                          }elseif($honordiscount=='50'){
                             $totalpayment=$total+(3170);
                             $payment= $totalpayment-($totalpayment*(50/100));
                             mysql_query("UPDATE tbl_prospectivestudents set Mode='4',honors = 'Salutatorian', Discount = '$honordiscount', Fee = '$payment' where username='$studentnumber'");

                                   mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                   mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 

                          }elseif($honordiscount=='55'){
                            $totalpayment=$total+(3170);
                            $payment= $totalpayment-($totalpayment*(55/100));
                             mysql_query("UPDATE tbl_prospectivestudents set Mode='4',Fee = '$payment',honors = 'Salutatorian w/ 3rd siblings enrolled',Discount = '$honordiscount' where username='$studentnumber'");

                                   mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                   mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
          
                          }elseif($honordiscount=='57'){
                            $totalpayment=$total+(3170);
                            $payment= $totalpayment-($totalpayment*(57/100));
                             mysql_query("UPDATE tbl_prospectivestudents set Mode='4',Fee = '$payment', honors = 'Salutatorian w/ 2nd siblings enrolled', Discount = '$honordiscount' where username='$studentnumber'");

                                   mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                   mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                     
                          }

                          //kapag ang discount ay naka set ng transfer discount
                          if($transferdiscount=='30'){
                              $totalpayment=$total+(3170);
                              $payment= $totalpayment-($totalpayment*(30/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='4',Fee = '$payment',honors = 'Transferee 1st honor', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 

                          }elseif($transferdiscount=='35'){
                              $totalpayment=$total+(3170);
                              $payment= $totalpayment-($totalpayment*(35/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='4',Fee = '$payment',honors = 'Transferee 1st honor w/ 3rd siblings enrolled', Discount = '$transferdiscount' where username='$studentnumber");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                             
                          
                          }elseif($transferdiscount=='37'){
                              $totalpayment=$total+(3170);
                              $payment= $totalpayment-($totalpayment*(37/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='4',Fee = '$payment', honors = 'Transferee 1st honor w/ 2nd siblings enrolled', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                    
                          
                          }elseif($transferdiscount=='20'){
                              $totalpayment=$total+(3170);
                              $payment= $totalpayment-($totalpayment*(20/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='4',Fee = '$payment', honors = 'Transferee 2nd honor', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
               
                          
                          }elseif($transferdiscount=='25'){
                              $totalpayment=$total+(3170);
                              $payment= $totalpayment-($totalpayment*(25/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='4',Fee = '$payment', honors = 'Transferee 2nd honor w/ 3rd siblings enrolled', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                          
                          }elseif($transferdiscount=='27'){
                                $totalpayment=$total+(3170);
                              $payment= $totalpayment-($totalpayment*(27/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='4',Fee = '$payment', honors = 'Transferee 2nd honor w/ 2nd siblings enrolled', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                              
                          
                          }elseif($transferdiscount=='10'){
                                $totalpayment=$total+(3170);
                              $payment= $totalpayment-($totalpayment*(10/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='4',Fee = '$payment', honors = 'Transferee 3rd honor', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                         
                          }elseif($transferdiscount=='15'){
                                $totalpayment=$total+(3170);
                            $payment= $totalpayment-($totalpayment*(15/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='4',Fee = '$payment', honors = 'Transferee 3rd honor w/ 3rd siblings enrolled', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                           
                          
                          }elseif($transferdiscount=='17'){
                                $totalpayment=$total+(3170);
                            $payment= $totalpayment-($totalpayment*(17/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='4',Fee = '$payment', honors = 'Transferee 3rd honor w/ 2nd siblings enrolled', Discount = '$transferdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                        
                          }
                          //kapag ang discount ay naka set ng old discount
                          if($olddiscount=='50'){
                                $totalpayment=$total+(3170);
                            $payment= $totalpayment-($totalpayment*(50/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='4',Fee = '$payment', honors = '1st honors', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                              
                        }elseif($olddiscount=='55'){
                                $totalpayment=$total+(3170);
                            $payment= $totalpayment-($totalpayment*(55/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='4',Fee = '$payment', honors = '1st honors w/ 3rd siblings enrolled', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
          
                        }elseif($olddiscount=='57'){
                                $totalpayment=$total+(3170);
                            $payment= $totalpayment-($totalpayment*(57/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='4',Fee = '$payment', honors = '1st honors w/ 2nd siblings enrolled', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                     
                        }elseif($olddiscount=='30'){
                                $totalpayment=$total+(3170);
                            $payment= $totalpayment-($totalpayment*(30/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='4',Fee = '$payment', honors = '2nd honors', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                        
                        }elseif($olddiscount=='35'){
                                $totalpayment=$total+(3170);
                            $payment= $totalpayment-($totalpayment*(35/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='4',Fee = '$payment', honors = '3rd honors w/ 3rd siblings enrolled', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                             
                        }elseif($olddiscount=='37'){
                                $totalpayment=$total+(3170);
                            $payment= $totalpayment-($totalpayment*(37/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='4',Fee = '$payment', honors = '2nd honors w/ 2nd siblings enrolled', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                           
                        }elseif($olddiscount=='20'){
                                $totalpayment=$total+(3170);
                            $payment= $totalpayment-($totalpayment*(20/100));
                              mysql_query("UPDATE  tbl_prospectivestudents set Mode='4',Fee = '$payment', honors = '3rd honors', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
          
                        }elseif($olddiscount=='25'){
                                $totalpayment=$total+(3170);
                            $payment= $totalpayment-($totalpayment*(25/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='4',Fee = '$payment', honors = '3rd honors w/ 3rd siblings enrolled', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                              
                        }elseif($olddiscount=='27'){
                                $totalpayment=$total+(3170);
                            $payment= $totalpayment-($totalpayment*(27/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='4',Fee = '$payment', honors = '3rd honors w/ 2nd siblings enrolled', Discount = '$olddiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                        
                        }

                        //kapag ang discount ay naka set ng sibling discount
                        if($siblingdiscount=='5'){
                                $totalpayment=$total+(3170);
                            $payment= $totalpayment-($totalpayment*(5/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='4',Fee = '$payment', honors = '2nd Child', Discount = '$siblingdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                             
                          }elseif($siblingdiscount=='7'){
                                $totalpayment=$total+(3170);
                            $payment= $totalpayment-($totalpayment*(7/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='4',Fee = '$payment', honors = '3rd Child', Discount = '$siblingdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                      
                          }elseif($siblingdiscount=='100'){
                              $payment= $total-($total*(100/100));
                              mysql_query("UPDATE tbl_prospectivestudents set Mode='4',Fee = '$payment', honors = '4th Child', Discount = '$siblingdiscount' where username='$studentnumber'");

                                    mysql_query("INSERT INTO tbl_cashierpayment (id,Date_received,Amount,Or_number,First_Payment,Second_Payment,Third_Payment,Fourth_Payment,Balance,username) values ('$idnumber','','','','','','','','','$studentnumber')");

                                    mysql_query("UPDATE tbl_cashierpayment set Balance='$payment' where username='$studentnumber'"); 
                           
                        }
                     }



                     
               
                          //kapag ang discount ay naka set ng nonediscount
                          

                          
                  

                          
                          


                        

                     header("Location: tuitionfees.php?studentnumber=$studentnumber");
}

?>


<!DOCTYPE html>
<html>
<head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Tuition Fees</title>

                    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"  rel="stylesheet" type="text/css">
                    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css"  rel="stylesheet" type="text/css">
                    <link rel="stylesheet" href="../../css/style.css"  rel="stylesheet" type="text/css">
                    <link rel="stylesheet" href="../../css/font-awesome.css"  rel="stylesheet" type="text/css">
                     <link rel="stylesheet" href="../../css/font-awesome.min.css"  rel="stylesheet" type="text/css">

              
                    <script src="../../js/jquery-2.1.1.min.js"></script>
                    <script src="../../bootstrap/js/bootstrap.min.js"></script>
                    <script src="../../js/validation.js"></script>
                    <script src="../../js/jquery.appear.js"></script>
                    <script src="../../js/modernizr.custom.js"></script>
</head>




<style>
                   body{

                    background: url(../../images/body-bg.png);
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
<body >
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
        <li class="active"><a href="inquiry.php"><i class="fa fa-newspaper-o"></i><span>Inquiry</span> </a> </li>
        <li><a href="faculty.php"><i class="fa fa-users"></i><span>Faculty</span> </a> </li>
        <li><a href="form.php"><i class="fa fa-file-pdf-o"></i><span>Form</span> </a> </li>
        <li><a href="event.php"><i class="fa fa-calendar-minus-o"></i><span>Event & Annoucement</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-long-arrow-down"></i><span>Manage</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="manageuser.php"><i class="fa fa-user-secret"></i> Admin Profile</a></li>
            <li><a href="deleteddetails.php"><i class="fa fa-trash-o"></i> Archive files</a></li>
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
if(isset($_GET['studentnumber'])){
  $studentnumber=$_GET['studentnumber'];
     ?>
        <ul class="nav nav-tabs">
          <li class="active"><a href="#" data-toggle="tab">Tuition Fees</a>
          </li>
          <li><a href="tuitionfees.php">Back to list</a>
          </li>
        </ul>
     <?php

     $qry="SELECT * from tbl_prospectivestudents where username='$studentnumber'";
     $res=mysql_query($qry);

     while($qry=mysql_fetch_array($res)){
      $id=$qry['id'];
      $studnum=$qry['username'];
      $sname=$qry['surname'];
      $fname=$qry['firstname'];
      $mname=$qry['middlename'];
      $discount=$qry['Discount'];
      $mode=$qry['Mode'];
      $fee=$qry['Fee'];
      $honor=$qry['honors'];
      $status=$qry['status'];

      ?><!-- -->  
      <br>
      <center><p id="message"></p></center>
      <div class="row">
      <div class="col-md-6">
      Full name: <?php echo $sname.','.$fname.','.$mname?>
      </div>
      <div class="col-md-6">
      </div>
      </div>

      <div class="row">
      <div class="col-md-6">
      Student number: <?php echo $studnum?>
      </div>
      <div class="col-md-6">
      </div>
      </div>
      <?php
      //kapag may nakikita na sa database na fee at ang mode of payment
      if(($fee&&$mode>0)){
      ?>
      <?php if(!isset($_GET['edit'])){?>
      <div class="row">
      <div class="col-md-6">
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
      <div class="col-md-6">
      </div>
      </div><!--For Mode of Payment -->


    
      <div class="row">
      <div class="col-md-6">
      Special Previleges: <?php echo $honor?> 
      </div>
      <div class="col-md-6">
      <a href="tuitionfees.php?studentnumber=<?php echo $studentnumber?>&&edit=<?php echo $studentnumber?>">Edit Mode of payment & special previleges</a>
      </div>
      </div><!--For Mode of Payment -->
      <?php }?>
      <?php

      if(isset($_GET['edit'])){
        $studentnumber=$_GET['edit'];
        ?>
         <form method="POST" onsubmit="return payment()">
      <div class="row">
      <div class="col-md-6">
      Mode Of Payment:             <select class='selectpicker' id='modeofpayment'  name='cash' value='0'>
                                      <option></option>
                                      <option value='1'>full</option>
                                      <option value='2'>Semestral</option>
                                      <option value='3'>Quarterly</option>
                                      <option value='4'>Monthly A</option>
                                    </select>
      </div>
      <div class="col-md-6">
      </div>
      </div><!--For Mode of Payment -->

        <div class="row">
      <div class="col-md-6">
      Special Previleges: Please Select in following list
      </div>
      <div class="col-md-6">
      </div>
      </div><!--For Mode of Payment -->

      <div class="row">
      <div class="col-md-6">
     
                  <a href='#' id='stud'>For Student doesn't have discount: </a>
                  
      </div>
      <div class="col-md-6" style='display:none;' id='stud1'>
                        <ol>
                        <li><input type='radio' name='nonediscount' value='0' checked='checked'/>Students -<b>0%</b> No discount on Tuition Fee</li>
                            
                        </ol>
      </div>
      </div><!--For Mode of Payment -->


       <div class="row">
      <div class="col-md-6">
      <a href='#' id='honor'>For Honor Student: </a>
                    
      </div>
      <div class="col-md-6" style='display:none;' id='honor1'>
                    <ol>
                    <li><input type='radio' name='honordiscount' value='100'>Valedictorian-<b>100%</b> discount on Tuition Fee</li>
                    <li><input type='radio' name='honordiscount' value='50'>Salutatorian-<b>50%</b> discount on Tuition Fee</li>
                     <ul>
                    <li><input type='radio' name='honordiscount' value='55'>+5 w/ 3rd Siblings Enrolled <b>55%</b> discount on Tuition Fee</li>
                    <li><input type='radio' name='honordiscount' value='57'>+7 w/ 2nd Siblings Enrolled <b>57%</b> discount on Tuition Fee</li>
                    </ul>
                    </ol>
      </div>
      </div><!--For honor student discount -->

       <div class="row">
      <div class="col-md-6">
        <a href='#' id='transfer'>For Transferees: </a>
                         
                    
      </div>
      <div class="col-md-6" style='display:none;' id='transfer1'>
                    <ol>

                    <li><input type='radio' name='transferdiscount' value='30'>1st Honors-<b>30%</b> discount on Tuition Fee</li>
                          <ul><li><input type='radio' name='transferdiscount' value='35'>+5 w/ 3rd Siblings Enrolled<b>35%</b> discount on Tuition Fee</li>
                              <li><input type='radio' name='transferdiscount' value='37'>+7 w/ 2nd Siblings Enrolled<b>37%</b> discount on Tuition Fee</li>
                          </ul>
                    <li><input type='radio' name='transferdiscount' value='20'>2nd Honors-<b>20%</b> discount on Tuition Fee</li>
                          <ul><li><input type='radio' name='transferdiscount' value='25'>+5 w/ 3rd Siblings Enrolled<b>25%</b> discount on Tuition Fee</li>
                              <li><input type='radio' name='transferdiscount' value='27'>+7 w/ 2nd Siblings Enrolled<b>27%</b> discount on Tuition Fee</li>
                          </ul>

                    <li><input type='radio' name='transferdiscount' value='10'>3rd Honors-<b>10%</b> discount on Tuition Fee</li>

                    <ul>
                    <li><input type='radio' name='transferdiscount' value='15'>+5 w/ 3rd Siblings Enrolled<b>15%</b> discount on Tuition Fee</li>
                    <li><input type='radio' name='transferdiscount' value='17'>+7 w/ 2nd Siblings Enrolled<b>17%</b> discount on Tuition Fee</li>
                    </ul>
                    </ol>

      </div>
      </div><!--For Transferee discount -->

      <?php 
      if($status=='old student'){
      ?>
      <div class="row">
      <div class="col-md-6">
      <a href='#' id='old'>For Old Students: </a>
                         
                     
      </div>
      <div class="col-md-6" style='display:none;' id='old1'>
                    <ol>

                    <li><input type='radio' name='olddiscount' value='50'>1st Honors-<b>50%</b> discount on Tuition Fee</li>
                          <ul><li><input type='radio' name='olddiscount' value='55'>+5 w/ 3rd Siblings Enrolled<b>55%</b> discount on Tuition Fee</li>
                              <li><input type='radio' name='olddiscount' value='57'>+7 w/ 2nd Siblings Enrolled<b>57%</b> discount on Tuition Fee</li>
                          </ul>
                    <li><input type='radio' name='olddiscount' value='30'> 2nd Honors-<b>30%</b> discount on Tuition Fee</li>
                          <ul><li><input type='radio' name='olddiscount' value='35'>+5 w/ 3rd Siblings Enrolled<b>35%</b> discount on Tuition Fee</li>
                              <li><input type='radio' name='olddiscount' value='37'>+7 w/ 2nd Siblings Enrolled<b>37%</b> discount on Tuition Fee</li>
                          </ul>

                    <li><input type='radio' name='olddiscount' value='20'>3rd Honors-<b>20%</b> discount on Tuition Fee</li>

                    <ul>
                    <li><input type='radio' name='olddiscount' value='25'>+5 w/ 3rd Siblings Enrolled<b>25%</b> discount on Tuition Fee</li>
                    <li><input type='radio' name='olddiscount' value='27'>+7 w/ 2nd Siblings Enrolled<b>27%</b> discount on Tuition Fee</li>
                    </ul>
                    </ol>

      </div>
      </div><!--For Old Students:discount -->
      <?php
      }

      ?>

      <div class="row">
      <div class="col-md-6">
       <a href='#' id='sibling'>For Every Siblings Enrolled: </a>
                             
                    
      </div>
      <div class="col-md-6" style='display:none;' id='sibling1'>
                        <ol>

                        <li><input type='radio' name='siblingdiscount' value='5'>2nd Child-<b>5%</b> discount on Tuition Fee</li>
                             
                        <li><input type='radio' name='siblingdiscount' value='7'>3rd Child-<b>7%</b> discount on Tuition Fee</li>
                         

                        <li><input type='radio' name='siblingdiscount' value='100'>4th Child-<b>100%</b> discount on Tuition Fee</li>

                      
                        </ol>

      </div>
      </div><!--For Every Siblings Enrolled: discount -->

      <div class="row">
      <div class="col-md-6">
      </div>
      <div class="col-md-6">
      <a href="tuitionfees.php?studentnumber=<?php echo $studentnumber?>" id='next'>Back</a>
      <button id='next' type='submit' name='submit'>Update</button>
      </div>
      </div>
      <br>
      <input type="hidden" value="<?php echo $id?>" name="idnumber"/>
      <input type="hidden" value="<?php echo $studentnumber?>" name="studentnumber"/>
      </form>        
      <?php


      }


      ?>
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
                      <td><center><?php if($mode=='1'){ echo "Total fee: &#8369; $fee";}?></center></td>
                      <td><center><?php if($mode=='2'){$fee= number_format($fee,2); echo "Total fee: &#8369; $fee";  }?></center></td>
                      <td><center><?php if($mode=='3'){$fee= number_format($fee,2); echo "Total fee: &#8369; $fee";  }?></center></td>
                      <td><center><?php if($mode=='4'){$fee= number_format($fee,2); echo "Total fee: &#8369; $fee";  }?></center></td>
                    </tr>

              </tbody>
          </table>
       </div>
       </div>
       </div>
                                                   




      <?php

      }else{
      ?>
      <form method="POST" onsubmit="return payment()">
      <div class="row">
      <div class="col-md-6">
      Mode Of Payment:             <select class='selectpicker' id='modeofpayment'  name='cash' value='0'>
                                      <option></option>
                                      <option value='1'>full</option>
                                      <option value='2'>Semestral</option>
                                      <option value='3'>Quarterly</option>
                                      <option value='4'>Monthly A</option>
                                    </select>
      </div>
      <div class="col-md-6">
      </div>
      </div><!--For Mode of Payment -->

        <div class="row">
      <div class="col-md-6">
      Special Previleges: Please Select in following list
      </div>
      <div class="col-md-6">
      </div>
      </div><!--For Mode of Payment -->

      <div class="row">
      <div class="col-md-6">
     
                  <a href='#' id='stud'>For Student doesn't have discount: </a>
                  
      </div>
      <div class="col-md-6" style='display:none;' id='stud1'>
                        <ol>
                        <li><input type='radio' name='nonediscount' value='0' checked='checked'/>Students -<b>0%</b> No discount on Tuition Fee</li>
                            
                        </ol>
      </div>
      </div><!--For Mode of Payment -->


       <div class="row">
      <div class="col-md-6">
      <a href='#' id='honor'>For Honor Student: </a>
                    
      </div>
      <div class="col-md-6" style='display:none;' id='honor1'>
                    <ol>
                    <li><input type='radio' name='honordiscount' value='100'>Valedictorian-<b>100%</b> discount on Tuition Fee</li>
                    <li><input type='radio' name='honordiscount' value='50'>Salutatorian-<b>50%</b> discount on Tuition Fee</li>
                     <ul>
                    <li><input type='radio' name='honordiscount' value='55'>+5 w/ 3rd Siblings Enrolled <b>55%</b> discount on Tuition Fee</li>
                    <li><input type='radio' name='honordiscount' value='57'>+7 w/ 2nd Siblings Enrolled <b>57%</b> discount on Tuition Fee</li>
                    </ul>
                    </ol>
      </div>
      </div><!--For honor student discount -->

       <div class="row">
      <div class="col-md-6">
        <a href='#' id='transfer'>For Transferees: </a>
                         
                    
      </div>
      <div class="col-md-6" style='display:none;' id='transfer1'>
                    <ol>

                    <li><input type='radio' name='transferdiscount' value='30'>1st Honors-<b>30%</b> discount on Tuition Fee</li>
                          <ul><li><input type='radio' name='transferdiscount' value='35'>+5 w/ 3rd Siblings Enrolled<b>35%</b> discount on Tuition Fee</li>
                              <li><input type='radio' name='transferdiscount' value='37'>+7 w/ 2nd Siblings Enrolled<b>37%</b> discount on Tuition Fee</li>
                          </ul>
                    <li><input type='radio' name='transferdiscount' value='20'>2nd Honors-<b>20%</b> discount on Tuition Fee</li>
                          <ul><li><input type='radio' name='transferdiscount' value='25'>+5 w/ 3rd Siblings Enrolled<b>25%</b> discount on Tuition Fee</li>
                              <li><input type='radio' name='transferdiscount' value='27'>+7 w/ 2nd Siblings Enrolled<b>27%</b> discount on Tuition Fee</li>
                          </ul>

                    <li><input type='radio' name='transferdiscount' value='10'>3rd Honors-<b>10%</b> discount on Tuition Fee</li>

                    <ul>
                    <li><input type='radio' name='transferdiscount' value='15'>+5 w/ 3rd Siblings Enrolled<b>15%</b> discount on Tuition Fee</li>
                    <li><input type='radio' name='transferdiscount' value='17'>+7 w/ 2nd Siblings Enrolled<b>17%</b> discount on Tuition Fee</li>
                    </ul>
                    </ol>

      </div>
      </div><!--For Transferee discount -->

      <?php 
      if($status=='old student'){
      ?>
      <div class="row">
      <div class="col-md-6">
      <a href='#' id='old'>For Old Students: </a>
                         
                     
      </div>
      <div class="col-md-6" style='display:none;' id='old1'>
                    <ol>

                    <li><input type='radio' name='olddiscount' value='50'>1st Honors-<b>50%</b> discount on Tuition Fee</li>
                          <ul><li><input type='radio' name='olddiscount' value='55'>+5 w/ 3rd Siblings Enrolled<b>55%</b> discount on Tuition Fee</li>
                              <li><input type='radio' name='olddiscount' value='57'>+7 w/ 2nd Siblings Enrolled<b>57%</b> discount on Tuition Fee</li>
                          </ul>
                    <li><input type='radio' name='olddiscount' value='30'> 2nd Honors-<b>30%</b> discount on Tuition Fee</li>
                          <ul><li><input type='radio' name='olddiscount' value='35'>+5 w/ 3rd Siblings Enrolled<b>35%</b> discount on Tuition Fee</li>
                              <li><input type='radio' name='olddiscount' value='37'>+7 w/ 2nd Siblings Enrolled<b>37%</b> discount on Tuition Fee</li>
                          </ul>

                    <li><input type='radio' name='olddiscount' value='20'>3rd Honors-<b>20%</b> discount on Tuition Fee</li>

                    <ul>
                    <li><input type='radio' name='olddiscount' value='25'>+5 w/ 3rd Siblings Enrolled<b>25%</b> discount on Tuition Fee</li>
                    <li><input type='radio' name='olddiscount' value='27'>+7 w/ 2nd Siblings Enrolled<b>27%</b> discount on Tuition Fee</li>
                    </ul>
                    </ol>

      </div>
      </div><!--For Old Students:discount -->
      <?php
      }

      ?>

      <div class="row">
      <div class="col-md-6">
       <a href='#' id='sibling'>For Every Siblings Enrolled: </a>
                             
                    
      </div>
      <div class="col-md-6" style='display:none;' id='sibling1'>
                        <ol>

                        <li><input type='radio' name='siblingdiscount' value='5'>2nd Child-<b>5%</b> discount on Tuition Fee</li>
                             
                        <li><input type='radio' name='siblingdiscount' value='7'>3rd Child-<b>7%</b> discount on Tuition Fee</li>
                         

                        <li><input type='radio' name='siblingdiscount' value='100'>4th Child-<b>100%</b> discount on Tuition Fee</li>

                      
                        </ol>

      </div>
      </div><!--For Every Siblings Enrolled: discount -->

      <div class="row">
      <div class="col-md-6">
      </div>
      <div class="col-md-6">
      <button id='next' type='submit' name='submit'>Submit</button>
      </div>
      </div>
      <br>

      <input type="hidden" value="<?php echo $studentnumber?>" name="studentnumber"/>
      <input type="hidden" value="<?php echo $id?>" name="idnumber"/>
      </form>        
      <?php

        
      }


     }






}else{


?>



<ul class="nav nav-tabs">
  <li class="active"><a href="#" data-toggle="tab">Tuition Fees</a>
  </li>
  <li><a href="inquiry.php">Back to inquiry</a>
  </li>
</ul>



 <div class='demo_jui'>
                    <table cellpadding='0' cellspacing='1' border='1' class='display' id='tbl' class='jtable'>
                              <thead>
                                              <tr>
                                              <th><center>Student number</center></th>
                                              <th><center>Full name</center></th>
                                              <th><center>Action</center></th>
                                              </tr>

                              </thead>
                                          
                                        
                            <?php 
                            $qry="SELECT * from tbl_prospectivestudents where  prospectivestatus='accepted' and status='new student' or status='transferee' ";
                            $result=mysql_query($qry);
                            while($qry = mysql_fetch_array($result)) {
                            $studentnumber=$qry['username'];
                            $sname=$qry['surname'];
                            $fname=$qry['firstname'];
                            $mname=$qry['middlename'];
                            $applicant_no=$qry['applicant_number'];
                            
                            if($applicant_no!='0'){

                              ?>
                              <tr>
                              <td><center><?php echo $studentnumber?></center></td>
                              <td><center><?php echo $sname.','.$fname.','.$mname?></center></td>
                              <td><center><a href="tuitionfees.php?studentnumber=<?php echo $studentnumber?>">set payment</a></center></td>
                              </tr>
                              <?php

                            }else{
                            }
                            } 
                    ?>
                </table></div>

<?php }?>

</div><!--container -->




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


    <?php }?>