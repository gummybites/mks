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






<!DOCTYPE html>
<html>
<head>

                
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Event 2</title>
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
<head>
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
                          text-align: right;
                          filter: alpha(opacity=0);
                          opacity: 0;
                          outline: none;
                          background: white;
                          cursor: inherit;
                          display: block;
                      }

                      .btn-file1 input[type=file] {
                          position: absolute;
                          top: 0;
                          right: 0;
                          min-width: 100%;
                          min-height: 100%;
                          font-size: 100px;
                          text-align: right;
                          filter: alpha(opacity=0);
                          opacity: 0;
                          outline: none;
                          background: white;
                          cursor: inherit;
                          display: block;
                      }

                      .btn-file2 input[type=file] {
                          position: absolute;
                          top: 0;
                          right: 0;
                          min-width: 100%;
                          min-height: 100%;
                          font-size: 100px;
                          text-align: right;
                          filter: alpha(opacity=0);
                          opacity: 0;
                          outline: none;
                          background: white;
                          cursor: inherit;
                          display: block;
                      }


                      textarea {
                          resize: none;
                      }
</style>  
<script>



function event2(){

var eventdays2=document.getElementById('eventdays2').value;        
var eventmonths2=document.getElementById('eventmonths2').value;   
var eventyears2=document.getElementById('eventyears2').value;

        if((eventmonths2 && eventdays2 && eventyears2) == ""){
          document.getElementById('evntdays2').innerHTML="<span style ='color: red;'>If you want to change, Event Date are required!</span>";
          return false;

       }else{
           document.getElementById('evntdays2').innerHTML="<span style ='color: green;'>Event date <i class='glyphicon glyphicon-ok'></i></span>";
       }//birthdate




 var eventitle2= document.getElementById('title2').value.length;



 if(eventitle2==""){
  document.getElementById('evnttitle2').innerHTML="<span style ='color: red;'>Event title are required!</span>";
  return false;

}else{


          if(eventitle2>=12 && eventitle2<=100) {
            document.getElementById('evnttitle2').innerHTML="<span style ='color: green;'>Event Title <i class='glyphicon glyphicon-ok'></i></span>";
   
                document.getElementById('validateeventtitle2').style.display = "none";
                
             
               }else{
                  document.getElementById('validateeventtitle2').innerHTML="<i style ='color: red;'>Atleast 12 to 200 characters for Event Title!</i>";
                return false;
               }
}


 var evenmessage2= document.getElementById('message2').value.length;



 if(evenmessage2==""){
  document.getElementById('evntmessage2').innerHTML="<span style ='color: red;'>Event title are required!</span>";
  return false;

}else{


          if(evenmessage2>=12 && evenmessage2<=200) {
            document.getElementById('evntmessage2').innerHTML="<span style ='color: green;'>Event Title <i class='glyphicon glyphicon-ok'></i></span>";
   
                document.getElementById('validateeventmessage2').style.display = "none";
                
             
               }else{
                  document.getElementById('validateeventmessage2').innerHTML="<i style ='color: red;'>Atleast 12 to 200 characters for Event Title!</i>";
                return false;
               }
}






}







// For birthdate
    $(function() {

    //populate our years select box
      for (i = new Date().getFullYear()+1; i >  new Date().getFullYear()-1; i--){

        $('#eventyears2').append($('<option />').val(i).html(i));
    }
    //populate our months select box
    for (i = 1; i < 13; i++){
        $('#eventmonths2').append($('<option />').val(i).html(i));
    }
    //populate our Days select box
    updateNumberOfDays(); 

    //"listen" for change events
    $('#eventyears2, #eventmonths2').change(function(){
        updateNumberOfDays(); 
    });

});

  //function to update the days based on the current values of month and year
  function updateNumberOfDays(){
    $('#eventdays2').html('');
      month = $('#eventmonths2').val();
      year = $('#eventyears2').val();
      days = daysInMonth(month, year);

      for(i=1; i < days+1 ; i++){
              $('#eventdays2').append($('<option />').val(i).html(i));
    

      }
  }

  //helper function
  function daysInMonth(month, year) {
      return new Date(year, month, 0).getDate();
  }


$(document).ready(function(){

    $('#eventyears2').change(function(){
    var selectedValue=$(this).val();
    var date= new Date();
    var year = date.getFullYear();
    var value= year-selectedValue;

    if(selectedValue==""){
       $('#age').html("");

    }else{
      $('#age').html(value);

    }
    
     });
});




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
        <li ><a href="registrar.php"><i class="fa fa-home"></i><span>Home</span> </a> </li>
        <li ><a href="createaccounts.php"><i class="fa fa-plus"></i><span>Create acount</span> </a> </li>
        <li><a href="admission.php"><i class="fa fa-archive"></i><span>Admission</span> </a></li>
        <li><a href="inquiry.php"><i class="fa fa-newspaper-o"></i><span>Inquiry</span> </a> </li>
        <li><a href="faculty.php"><i class="fa fa-users"></i><span>Faculty</span> </a> </li>
        <li><a href="form.php"><i class="fa fa-file-pdf-o"></i><span>Form</span> </a> </li>
        <li   class="active"><a href="event.php"><i class="fa fa-calendar"></i><span>Event & Annoucement</span> </a> </li>
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

                
   <ul class="nav nav-tabs" role="tablist">
    <li ><a href="event.php">Event 1</a></li>
    <li class="active"><a href="#">Event 2</a></li>
    <li><a href="event3.php">Event 3</a></li>
    <li><a href="imagelist.php">Gallery</a></li> 
  </ul>

 <?php
                            $qry="SELECT * from tbl_event";
                            $res=mysql_query($qry);
                            if(mysql_num_rows($res)>0){
                            while($qry=mysql_fetch_array($res)){

                              $event1image= $qry['event2_image'];
                               $event1date= $qry['event2_date'];
                                $event1title= $qry['event2_title'];
                                 $event1description= $qry['event2_description'];


                           

                             ?>
                             <div class="row">
                              <form method="POST" onsubmit="return event2(event)"  enctype='multipart/form-data' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                              <br>
                              
                                <div class="col-md-8">

                                 <div class="col-md-12">      
                                  <p id="evntdays2"></p>
                                  <center><p id="messagesuccess"></p></center>
                                 </div>

                                  <div class="form-group">

                                         <div class="col-md-4">
                                              Days<select  class="form-control" id='eventdays2' name="eventdays2">
                                                    <option></option>
                                              </select>
                                          </div>         
                                          <div class="col-md-4">    
                                              Months<select class="form-control"  id='eventmonths2' name="eventmonths2">
                                                  <option></option>
                                              </select>
                                          </div>
                                          <div class="col-md-4">                                                     
                                              Years<select class="form-control"   id='eventyears2' name="eventyears2">
                                                    <option></option>
                                              </select> 
                                          </div>
                                  </div>
                             
                                  <div class="col-md-12">
                                  <div class="form-group">
                                    Event Date:<input type="text" class="form-control" value="<?php echo $event1date?>" readonly="readonly">
                                    </div>
                                  </div>
                                            
                                 <div class="col-md-12">      
                                  <p id="evnttitle2"></p>
                                  <p id="validateeventtitle2"></p>
                                 </div>

                                  <div class="col-md-12">
                                  <div class="form-group">
                                    title<input type="text" class="form-control" placeholder="Title here.." name="title2" id="title2" maxlength="100" value="<?php echo $event1title?>">
                                    </div>
                                  </div>

                              
                                   <div class="col-md-12">      
                                  <p id="evntmessage2"></p>
                                  <p id="validateeventmessage2"></p>
                                 </div>
                                  <div class="col-md-12">
                                  <div class="form-group">
                                  Description<textarea placeholder="Description here.." id="message2" name="message2" class="form-control input-lg" rows="3" maxlength="200"><?php echo $event1description?></textarea>
                                  </div>
                                  </div>

                                    <div class="col-md-12">
                                    <button type="submit" name="buttonevent2" id='next'>Update</button>
                                    </div>
                                </div>
                                </form>


                                <form method="POST" enctype='multipart/form-data'>
                                <div class="col-md-4">
                                 <p id="message"></p>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <img src="../../photos/<?php echo $event1image?>" width="360px" height="345px">  
                                    </div>


                                    <div class='form-group input-group'>
                                    <span class='input-group-btn'>
                                        <span class=' btn btn-default btn-file'>
                                            Browse... <input type='file' name='eventfile2'>
                                        </span>
                                    </span>
                                    <input type='text' id='valdfil' class='form-control' readonly />
                                    <span class='input-group-btn'>
                                            <button class='btn btn-default' name='buttonuploadevent2'>Upload</button>
                                    </span>
                                   </div>
                                </div>
                            </form> 
                            </div>
                            <?php
                                   
                              }
                            }


                             ?>            


</div>




</body>
</html>
<?php
if(isset($_POST['buttonevent2'])){

                              $eventdays2= $_POST['eventdays2'];
                              $eventmonths2= $_POST['eventmonths2'];
                              $eventyears2= $_POST['eventyears2'];

                              $title2= $_POST['title2'];
                              $message2= $_POST['message2'];
                              $totalevents= $eventdays2.'/'.$eventmonths2.'/'.$eventyears2;

                              $sql="UPDATE tbl_event set event2_date='$totalevents', event2_title='$title2', event2_description='$message2' where id>=0";
                              mysql_query($sql);

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("messagesuccess").innerHTML="<font color='green'>SUCCESSFULLY UPDATED.</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';



}elseif(isset($_POST['buttonuploadevent2'])){
                                                 $file= $_FILES['eventfile2']['name'];    
                                                 $file_name = rand(1000,100000)."-".$_FILES['eventfile2']['name'];
                                                 $file_data = $_FILES['eventfile2']['tmp_name'];
                                                 $file_size = $_FILES['eventfile2']['size'];
                                                 $file_type = $_FILES['eventfile2']['type'];
                                                 $file_folder="../../photos/"; 
                                                 // new file size in KB
                                                 $new_size = $file_size/1024;  
                                                 // new file size in KB
                                                 // make file name in lower case
                                                 $new_file_name = strtolower($file_name);
                                                 // make file name in lower case
                                                 $final_file=str_replace(' ','-',$new_file_name);

                                                  if($file==""){
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>PLEASE SELECT A FILE.</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';

                                                  }else{  
                                                    if(($file_type)=="image/jpeg"||($file_type)=="image/png"){

                                                     if($file_size<=153600){

                                                             if(move_uploaded_file($file_data,$file_folder.$final_file)){
                                                               //inserting photo
                                                              $sql="UPDATE tbl_event set event2_image='$final_file' where id>=0";
                                                              mysql_query($sql);

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("messagesuccess").innerHTML="<font color='green'>SUCCESSFULLY UPLOADED!</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';


                                                             }else{

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>ERROR WHILE UPLOADING!</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';

                                                             }

                                                         }else{
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>YOUR FILE IS LARGER THEN 150KB. PLEASE CHOOSE A DIFFERENT PICTURE!</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';

                                                         }


                                                         }else{

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>INVALID FILE FORMAT. PLEASE CHOOSE A DIFFERENT FILE FORMAT. IT SHOULD BE IN JPEG OR PNG FORMAT!</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';
                                                         }

                                                       }
                                              }
elseif(isset($_POST['buttonevent3'])){

                              $eventdays3= $_POST['eventdays3'];
                              $eventmonths3= $_POST['eventmonths3'];
                              $eventyears3= $_POST['eventyears3'];

                              $title3= $_POST['title3'];
                              $message3= $_POST['message3'];
                              $totalevents= $eventdays3.'/'.$eventmonths3.'/'.$eventyears3;

                              $sql="UPDATE tbl_event set event3_date='$totalevents', event3_title='$title3', event3_description='$message3' where id>=0";
                              mysql_query($sql);

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("messagesuccess3").innerHTML="<font color='green'>SUCCESSFULLY UPDATED.</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';



}elseif(isset($_POST['buttonuploadevent3'])){
                                                 $file= $_FILES['eventfile3']['name'];    
                                                 $file_name = rand(1000,100000)."-".$_FILES['eventfile3']['name'];
                                                 $file_data = $_FILES['eventfile3']['tmp_name'];
                                                 $file_size = $_FILES['eventfile3']['size'];
                                                 $file_type = $_FILES['eventfile3']['type'];
                                                 $file_folder="../../photos/"; 
                                                 // new file size in KB
                                                 $new_size = $file_size/1024;  
                                                 // new file size in KB
                                                 // make file name in lower case
                                                 $new_file_name = strtolower($file_name);
                                                 // make file name in lower case
                                                 $final_file=str_replace(' ','-',$new_file_name);

                                                  if($file==""){
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>PLEASE SELECT A FILE.</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';

                                                  }else{  
                                                    if(($file_type)=="image/jpeg"||($file_type)=="image/png"){

                                                     if($file_size<=153600){

                                                             if(move_uploaded_file($file_data,$file_folder.$final_file)){
                                                               //inserting photo
                                                              $sql="UPDATE tbl_event set event3_image='$final_file' where id>=0";
                                                              mysql_query($sql);

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("messagesuccess3").innerHTML="<font color='green'>SUCCESSFULLY UPLOADED!</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';


                                                             }else{

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>ERROR WHILE UPLOADING!</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';

                                                             }

                                                         }else{
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>YOUR FILE IS LARGER THEN 150KB. PLEASE CHOOSE A DIFFERENT PICTURE!</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';

                                                         }


                                                         }else{

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message").innerHTML="<font color='red'>INVALID FILE FORMAT. PLEASE CHOOSE A DIFFERENT FILE FORMAT. IT SHOULD BE IN JPEG OR PNG FORMAT!</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';
                                                         }

                                                       }
                                              }
                                              ?>
    <?php }?>