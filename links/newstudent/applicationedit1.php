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
                        
                              $Year = $qry ['year'];
                              $Seek = $qry['seeking'];
                              $Stat = $qry ['status'];
                              $Sname= $qry['surname'];
                              $Fname= $qry['firstname'];
                              $Mname= $qry['middlename'];
                              $Per = $qry['peraddress'];
                              $Tele = $qry ['telephone'];
                           
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
     
                              $Old = $qry['lastschool'];
                              $Sadd = $qry ['schooladdress'];
                              $Syear = $qry ['schoolyear'];
                          

}


 ?>


<!DOCTYPE>
<html>
<head>


                    <title>Application Edit</title>
                    <link rel="stylesheet" href="../../css/bootstrap.min.css"></link>
                    <link rel="stylesheet" href="../../css/style.css"></link>

                    <script src="../../js/dropdown.js"></script>
                    <script src="../../js/bootstrap.min.js"></script>
                    <script src="../../js/jquery.1.11.1.js"></script>
                    <script src="../../js/bootstrap.js"></script>

<style>
                   
                  
                    /* footer Section */  
                    #form input{
                     border-top: none;
                     border-left: none;
                     border-right: none;  

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
                MARIA KATRINA SCHOOL
                </a>
            </div>

           <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
            
            <ul class="nav navbar-nav navbar-right">
                
                <li><a href="logout.php">Logout</a></li>
                




                </ul>
            </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>      	


 

	<div class="container-fluid main-container">
        <div class="col-md-12 content">
            <div id='steps'>
          <?php 
          $curYear= date('Y');
          $curYear2= date('Y')+1;
          $allyear= "$curYear - $curYear2";
      
          echo "<p>You are a first-year applicant if you've complete elementary during the $allyear academic year. If you have intention to enroll: 
           </p>"
           ?>
         


                           <?php 

                         
                            
                            $qry = "select * from tbl_prospectivestudents where username= '$username'";
                            $result = mysql_query($qry);
                            if($qry = mysql_fetch_array($result))
                            {
                              
                                $usename= $qry['username'];
                                $pro=$qry['prospectivestatus'];
                                $edit= $qry['edit'];

                                 if($pro=='PENDING'){
                                

                                if($edit== '0'){
                                  echo '<li>Step 4:Once you have done, you may print the form and this will serve as your reference upon enrollment in the school. </a></li>';
                             

                                }

                                if($edit== '1'){
                                  echo '<div class="well">
                                 Succeed!  Thank you for registering in our system! You can now present your application form in our school. <i class="fa fa-check"></i> 
                                </div>';

                                }
                                



                                
                                }
                              }
                                 ?>

          
          <ul>
         
            <li>Please Note: It must be accurate, true and authentic information</li></ul></div>
              <form class='text-center' id="form"  method="POST" action='applicationedit1.php'>

                                <b>MARIA KATRINA SCHOOL</b>
                                <p>No. 10 Mendoza St. Saog, Marilao, Bulacan</p>
                                <h2 ><strong>APPLICATION FOR ADMISSION </strong></h2>

                                
                                

                                
                                

                                <table align='center' width='100%'>
                                  <tr >
                             
                                      <td ><br><!--This is for school year option-->
                                            <p for="schoolyear">S.Y:  
                                            <b><?php echo $Year; ?></b></p>  
                                      </td>


                                      <td><br><!--This is for application number-->
                                          <p for="application">Application number:</p>
                               
                                    </td>

                                    <td><br>

                                        <!--This is for seeking admission-->
                                          <p for="application">Seeking admission as:*
                                          <select  id="seeking" name="seeking">
                                                        <?php if($Seek=='Grade 7'){
                                                          echo "<option>Grade 7</option>";
                                                          echo "<option>Transferee</option>";

                                                        }elseif($Seek=='Transferee'){
                                                          echo "<option>Transferee</option>";
                                                          echo "<option>Grade 7</option>";

                                                        }?>



                                                        
                                                     
                                                     

                                                    </select><div id="seek"></div></p>
                                    </td>
                                

                                  </tr>

                                  <tr>
                                    <td><br>

                                        <!--This is for current date-->
                                      <p for="dateapplied">Applied Date:
                                      <?php 
                                          $applied = date("F j,Y");
                                          echo "<B>$applied</B>";
                                          ?></p>
                                    </td>

                                    <td><br>


                                    </td>

                                    <td><br>
                                        <!--This is for status-->
                                      <pfor="dateapplied">Status: 
                                      <b><?php echo $Stat;?></b>

                                    </td>

                                  </tr>


                                  <tr>
                                    <td><br>
                                      <!--This is for Surname-->
                                      <p for="name">Surname: *
                                      <input type='text' id='surname' name='surname' value='<?php echo $Sname; ?>'/>
                                     

                                    </td>


                                    <td><br>
                                      <!--This is for firstname-->
                                      <p for="firstname">Firstname: *
                                     <input type='text' id='firstname' name='firstname' value='<?php echo $Fname; ?>'/>

                                    </td>
                                    
                                     <td><br>
                                      <!--This is for middlename-->
                                      <p for="middlename">Middlename: *
                                     <input type='text' id='middlename' name='middlename' value='<?php echo $Mname; ?>'/>

                                    </td>
                                  </tr> 


                                  <tr>
                                    <td><br>
                                      <!--This is for Permanent Address:-->
                                      <p for="permanent">Permanent Home Address: *
                                      <input type='text'  name='permanent' value='<?php echo $Per; ?>'/></p> 

                                    </td>
                                    <td><br>
                                    </td>
                                    <td><br>
                                      <!--This is for Telephone number: *:-->
                                      <p for="Telephone number:">Telephone number: *
                                      <input type='text'  name='telephone' value='<?php echo $Tele; ?>'/></p> 

                                    </td>


                                  </tr>



                                  <tr>
                                    <td><br>
                                      <!--This is for Mobile number: *:-->
                                      <p for="Mobile">Mobile number: * 
                                      <input type='text'  name='mobile' value='<?php echo $Mobi; ?>'/></p>

                                    </td>

                                    <td><br>
                                      <!--This is for Birthdate: *:-->
                                      <p for="bday">Birthdate: * 

                                       <select  id="month" name="month">
                                        <option></option>
                                       
                                        <option value='1'>January</option>
                                        <option value='2'>February</option>
                                        <option value='3'>March</option>
                                        <option value='4'>April</option>
                                        <option value='5'>May</option>
                                        <option value='6'>June</option>
                                        <option value='7'>July</option>
                                        <option value='8'>August</option>
                                        <option value='9'>September</option>
                                        <option value='10'>October</option>
                                        <option value='11'>November</option>
                                        <option value='12'>December</option>
                                                                  </select>

                                        <select  id="day" name="day">
                                        <option></option>
                                        <option value='1'>1</option>
                                        <option value='2'>2</option>
                                        <option value='3'>3</option>
                                        <option value='4'>4</option>
                                        <option value='5'>5</option>
                                        <option value='6'>6</option>
                                        <option value='7'>7</option>
                                        <option value='8'>8</option>
                                        <option value='9'>9</option>
                                        <option value='10'>10</option>
                                        <option value='11'>11</option>
                                        <option value='12'>12</option>

                                        <option value='13'>13</option>
                                        <option value='14'>14</option>
                                        <option value='15'>15</option>
                                        <option value='16'>16</option>
                                        <option value='17'>17</option>
                                        <option value='18'>18</option>
                                        <option value='19'>19</option>
                                        <option value='20'>20</option>
                                        <option value='21'>21</option>
                                        <option value='22'>22</option>
                                        <option value='23'>23</option>
                                        <option value='24'>24</option>
                                        <option value='25'>25</option>
                                        <option value='26'>26</option>
                                        <option value='27'>27</option>
                                        <option value='28'>28</option>
                                        <option value='29'>29</option>
                                        <option value='30'>30</option>
                                        <option value='31'>31</option>
                                                                  </select>

                                        <select  id="year" name="years">
                                        <option></option>
                                        <option value='2004'>2004</option>
                                        <option value='2003'>2003</option>
                                        <option value='2003'>2002</option>
                                        <option value='2003'>2001</option>
                                        <option value='2003'>2000</option>
                                        <option value='2003'>1999</option>
                                        <option value='1998'>1998</option>
                                        <option value='1998'>1997</option>
                                        <option value='1998'>1996</option>
                                        <option value='1998'>1995</option>
                                        <option value='1998'>1994</option>
                                        <option value='1998'>1993</option>


                                                                  </select></p>

                                                                    
                               



                                    </td>

                                    <td><br>
                                      <!--This is for Age: *:-->
                                      <p for="age">Age: <b><?php echo $Age;?></b></p> 
                                  

                                    </td>

                                  </tr>

                                  <tr>
                                    <td><br>
                                      <!--This is for Gender *:-->
                                      <p for="age">Gender: *
                                      <select  id="gender" name="gender">
                                        <?php if($Sex=='Male'){
                                                          echo "<option>Male</option>";
                                                          echo "<option>Female</option>";

                                                        }elseif($Sex=='Female'){
                                                          echo "<option>Female</option>";
                                                          echo "<option>Male</option>";

                                                        }?>


                                      </select></p> 

                                    </td>

                                    <td><br>
                                      <!--This is for Birthplace *:-->
                                      <p for="birthplace">Birthplace:* 
                                      <input type='text'  id="birthplace" name="birthplace" value="<?php echo $Bplace;?>"/></p> 
                                        

                                    </td>

                                    <td><br>
                                      <!--This is for religion *:-->
                                      <p for="religion">Religion:*  
                                      <select id='religion' name='religion'>
                                        <option></option>
                                        <option><a href="">Roman Catholic</a></option>
                                    
                                      </select></p>
                                    
                                    </td>

                                  </tr>

                                  <tr>
                                    <td><br>
                                      <!--This is for father *:-->
                                      <p for="father">Father: * 
                                      <input type='text'  id="fat" name="father" value="<?php echo $Fatn;?>"/></p> 
                                        

                                    </td>

                                    <td><br>
                                      <!--This is for father *:-->
                                      <p for="occupation">Occupation: * 
                                      <input type='text'  id="fat" name="foccupation" value="<?php echo $Foccu;?>" /></p> 
                                        

                                    </td>

                                    <td><br>
                                      <!--This is for occupation *:-->
                                      <p for="contact">Contact: * 
                                      <input type='text'  id="fat" name="fcontact" value="<?php echo $Fcon;?>"/></p> 
                                        

                                    </td>
                                  </tr>


                                  <tr>
                                    <td><br>
                                      <!--This is for mother *:-->
                                      <p for="mother">Mother:*  
                                      <input type='text'  id="fat" name="mother" value="<?php echo $Motn;?>"/></p>
                                        

                                    </td>

                                    <td><br>
                                      <!--This is for father *:-->
                                      <p for="occupation">Occupation:* 
                                      <input type='text'  id="fat" name="moccupation" value="<?php echo $Moccu;?>"/></p> 
                                        

                                    </td>

                                    <td><br>
                                      <!--This is for occupation *:-->
                                      <p for="contact">Contact:* 
                                      <input type='text'  id="fat" name="mcontact" value="<?php echo $Mcon;?>"/></p> 
                                        

                                    </td>
                                  </tr>


                                  <tr>
                                    <td><br>
                                      <!--This is for guardian *:-->
                                      <p for="guardian">Guardian:* 
                                      <input type='text'  id="fat" name="guardian" value="<?php echo $Guar;?>"/></p> 
                                        

                                    </td>

                                    <td><br>
                                      <!--This is for guardian address *:-->
                                      <p for="guardian">Address:*  
                                      <input type='text'  id="fat" name="gaddress" value="<?php echo $Gadd;?>"/></p>
                                        

                                    </td>

                                    <td><br>
                                      <!--This is for Contact *:-->
                                      <p for="contact">Contact:*  
                                      <input type='text'  id="fat" name="gcontact" value="<?php echo $Gcon;?>"/></p>
                                        

                                    </td>
                                  </tr>


                                  <tr>
                                    <td><br>
                                      <!--This is for last attended*:-->
                                      <p for="lastattended">School Last attended:*  
                                      <input type='text'  id="fat" name="elementary" value="<?php echo $Old;?>"/></p>
                                        

                                    </td>
                                  </tr>

                                  <tr>
                                    <td><br>
                                      <!--This is for school address *:-->
                                      <p for="schooladdress">School Address:* 
                                      <input type='text'  id="fat" name="saddress" value="<?php echo $Sadd;?>"/></p> 
                                        

                                    </td>
                                  </tr>

                                  <tr>
                                    <td><br>
                                      <!--This is for school address *:-->
                                      <p for="schooladdress">School Year:* 
                                      <input type='text'  id="fat" name="syear" value="<?php echo $Syear;?>" /></p> 
                                        

                                    </td>
                                  </tr>


                                </table>


                                <div class="row form-group">
                              <input type="hidden" name="prospectivestatus" value="pending">
                            <div class="col-md-12">
                                <button type="submit" class='pull-right' name="submit" value="Submit" class="btn tf-btn btn-primary">Submit</button>
                            </div>
                            </div>
                              </form>

               

                   
       

<?php 
                            include('config.php');
                            if(isset($_POST['submit']))
                          {
            
                             
                              $seek = $_POST['seeking'];
                              $sname= $_POST['surname'];
                              $fname= $_POST['firstname'];
                              $mname= $_POST['middlename'];
                              
                              $per = $_POST['permanent'];
                              $tele = $_POST ['telephone'];

                
                              $mobi = $_POST['mobile'];
                              $month= $_POST['month'];
                              $day= $_POST['day'];
                              $years= $_POST['years'];
                              $birthday= $month.'/'.$day.'/'.$years;
                              $age =  date('Y')-$years;
                          
                              $sex = $_POST['gender'];
                              $bplace = $_POST ['birthplace'];
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
                        
                              $old = $_POST['elementary'];
                              $sadd = $_POST ['saddress'];
                              $syear = $_POST ['syear'];
                        
                

                


                             
                          $qry="UPDATE tbl_prospectivestudents SET 
              seeking= '$seek',surname= '$sname', 
              firstname='$fname',middlename='$mname',peraddress='$per',telephone='$tele',mobile='$mobi',
              birthdate='$birthday',age='$age',gender='$sex',birthplace='$bplace',religion='$reli',fathername='$fatn',fatheroccupation='$foccu',fathercontact='$fcon',
              mothername='$motn',mothersoccupation='$moccu',mothercontact='$mcon',guardianname='$guar',guardianaddress='$gadd',guardiancontact='$gcon',lastschool='$old',
              schooladdress='$sadd',schoolyear='$syear', edit= '1'
              
              WHERE username= '$username' ";

                          mysql_query($qry);
                          echo"<script>location.href='applicationform.php'</script>";
                          


                          }  ?>





              




        
        </div>


  		
</div> <!-- //Collect the nav links, forms, and other content for toggling -->

</div>








</body>
</html>
<?php }?>
