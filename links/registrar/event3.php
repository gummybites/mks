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
}
  ?>






<!DOCTYPE html>
<html>
<head>

                
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Event 3</title>

                    <link rel="stylesheet" href="../../css/bootstrap.min.css"></link>
                    <link rel="stylesheet" href="../../css/bootstrap.css"></link>
                    <link rel="stylesheet" href="../../css/style.css"></link>
                    <link rel="stylesheet" href="../../css/font-awesome.css"></link>
                     <link rel="stylesheet" href="../../css/font-awesome.min.css"></link>

                    <script src="../../js/dropdown.js"></script>
                    <script src="../../js/bootstrap.min.js"></script>
                    <script src="../../js/jquery.1.11.1.js"></script>
                    <script src="../../js/bootstrap.js"></script>
                    <script src="../../js/validation.js"></script>
<head>
<style>
          body{

                   background: url(../../images/registrationbackground.png); color:#838383; font: 13px/1.7em 'Calibri';
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

function event3(){

var eventdays3=document.getElementById('eventdays3').value;        
var eventmonths3=document.getElementById('eventmonths3').value;   
var eventyears3=document.getElementById('eventyears3').value;

        if((eventmonths3 && eventdays3 && eventyears3) == ""){
          document.getElementById('evntdays3').innerHTML="<span style ='color: red;'>If you want to change, Event Date are required!</span>";
          return false;

       }else{
           document.getElementById('evntdays3').innerHTML="<span style ='color: green;'>Event date <i class='glyphicon glyphicon-ok'></i></span>";
       }//birthdate




 var eventitle3= document.getElementById('title3').value.length;



 if(eventitle3==""){
  document.getElementById('evnttitle3').innerHTML="<span style ='color: red;'>Event title are required!</span>";
  return false;

}else{


          if(eventitle3>=12 && eventitle3<=100) {
            document.getElementById('evnttitle3').innerHTML="<span style ='color: green;'>Event Title <i class='glyphicon glyphicon-ok'></i></span>";
   
                document.getElementById('validateeventtitle3').style.display = "none";
                
             
               }else{
                  document.getElementById('validateeventtitle3').innerHTML="<i style ='color: red;'>Atleast 12 to 200 characters for Event Title!</i>";
                return false;
               }
}


 var evenmessage3= document.getElementById('message3').value.length;



 if(evenmessage3==""){
  document.getElementById('evntmessage3').innerHTML="<span style ='color: red;'>Event title are required!</span>";
  return false;

}else{


          if(evenmessage3>=12 && evenmessage3<=200) {
            document.getElementById('evntmessage3').innerHTML="<span style ='color: green;'>Event Title <i class='glyphicon glyphicon-ok'></i></span>";
   
                document.getElementById('validateeventmessage3').style.display = "none";
                
             
               }else{
                  document.getElementById('validateeventmessage3').innerHTML="<i style ='color: red;'>Atleast 12 to 200 characters for Event Title!</i>";
                return false;
               }
}






}





// For birthdate
    $(function() {

    //populate our years select box
      for (i = new Date().getFullYear()+1; i >  new Date().getFullYear()-1; i--){

        $('#eventyears3').append($('<option />').val(i).html(i));
    }
    //populate our months select box
    for (i = 1; i < 13; i++){
        $('#eventmonths3').append($('<option />').val(i).html(i));
    }
    //populate our Days select box
    updateNumberOfDays(); 

    //"listen" for change events
    $('#eventyears3, #eventmonths3').change(function(){
        updateNumberOfDays(); 
    });

});

  //function to update the days based on the current values of month and year
  function updateNumberOfDays(){
    $('#eventdays3').html('');
      month = $('#eventmonths3').val();
      year = $('#eventyears3').val();
      days = daysInMonth(month, year);

      for(i=1; i < days+1 ; i++){
              $('#eventdays3').append($('<option />').val(i).html(i));
    

      }
  }

  //helper function
  function daysInMonth(month, year) {
      return new Date(year, month, 0).getDate();
  }


$(document).ready(function(){

    $('#eventyears3').change(function(){
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
        <li> <a href="logout.php?logout=<?php echo $db_id ?>"><?php echo $db_username?>, <i class="glyphicon glyphicon-log-out"> </i> Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>  



<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li><a href="registrar.php"><i class="fa fa-dashboard"></i><span>Home</span> </a> </li>
        <li><a href="reports.html"><i class="fa fa-plus"></i><span>Create acount</span> </a> </li>
        <li><a href="admission.php"><i class="fa fa-code"></i><span>Admission</span> </a></li>
        <li><a href="charts.html"><i class="fa fa-bar-chart"></i><span>Inquiry</span> </a> </li>
        <li><a href="shortcodes.html"><i class="fa fa-code"></i><span>Course & Subjects</span> </a> </li>
        <li><a href="form.php"><i class="fa fa-file"></i><span>Form</span> </a> </li>
        <li class="active"><a href="event.php"><i class="fa fa-calendar"></i><span>Event & Annoucement</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-long-arrow-down"></i><span>Manage User</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li class="active"><a href="manageuser.php">Profile</a></li>
            <li><a href="faq.html">Accounts</a></li>
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
    <li ><a href="event2.php">Event 2</a></li>
    <li class="active"><a href="event3.php">Event 3</a></li> 
    <li><a href="imagelist.php">Gallery</a></li> 
  </ul>

 <?php
                            $qry="SELECT * from tbl_event";
                            $res=mysql_query($qry);
                            if(mysql_num_rows($res)>=0){
                            while($qry=mysql_fetch_array($res)){

                              $event1image= $qry['event3_image'];
                               $event1date= $qry['event3_date'];
                                $event1title= $qry['event3_title'];
                                 $event1description= $qry['event2_description'];


                           

                             ?>
                              <form method="POST" onsubmit="return event1(event)"  enctype='multipart/form-data' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                              <br>
                              <div class="row">
                                <div class="col-md-8">

                                 <div class="col-md-12">      
                                  <p id="evntdays1"></p>
                                  <center><p id="messagesuccess"></p></center>
                                 </div>

                                  <div class="form-group">

                                         <div class="col-md-4">
                                              Days<select  class="form-control" id='eventdays3' name="eventdays3">
                                                    <option></option>
                                              </select>
                                          </div>         
                                          <div class="col-md-4">    
                                              Months<select class="form-control"  id='eventmonths3' name="eventmonths3">
                                                  <option></option>
                                              </select>
                                          </div>
                                          <div class="col-md-4">                                                     
                                              Years<select class="form-control"   id='eventyears3' name="eventyears3">
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
                                  <p id="evnttitle1"></p>
                                  <p id="validateeventtitle1"></p>
                                 </div>

                                  <div class="col-md-12">
                                  <div class="form-group">
                                    title<input type="text" class="form-control" placeholder="Title here.." name="title3" id="title3" maxlength="100" value="<?php echo $event1title?>">
                                    </div>
                                  </div>

                              
                                   <div class="col-md-12">      
                                  <p id="evntmessage1"></p>
                                  <p id="validateeventmessage1"></p>
                                 </div>
                                  <div class="col-md-12">
                                  <div class="form-group">
                                  Description<textarea placeholder="Description here.." id="message3" name="message3" class="form-control input-lg" rows="3" maxlength="200"><?php echo $event1description?></textarea>
                                  </div>
                                  </div>

                                    <div class="col-md-12">
                                    <button type="submit" name="buttonevent3" id='next'>Update</button>
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
                                            Browse... <input type='file' name='eventfile3'>
                                        </span>
                                    </span>
                                    <input type='text' id='valdfil' class='form-control' readonly />
                                    <span class='input-group-btn'>
                                            <button class='btn btn-default' name='buttonuploadevent3'>Upload</button>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </form>
                            <?php
                                   
                              }
                            }

                             ?>            


</div>




</body>
</html>
<?php
if(isset($_POST['buttonevent3'])){

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
                                                                                document.getElementById("message3").innerHTML="<font color='red'>PLEASE SELECT A FILE.</font>";
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
                                                                                document.getElementById("message3").innerHTML="<font color='red'>ERROR WHILE UPLOADING!</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';

                                                             }

                                                         }else{
                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message3").innerHTML="<font color='red'>YOUR FILE IS LARGER THEN 150KB. PLEASE CHOOSE A DIFFERENT PICTURE!</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';

                                                         }


                                                         }else{

                                                                                ?>
                                                                                <script type="text/javascript">
                                                                                document.getElementById("message3").innerHTML="<font color='red'>INVALID FILE FORMAT. PLEASE CHOOSE A DIFFERENT FILE FORMAT. IT SHOULD BE IN JPEG OR PNG FORMAT!</font>";
                                                                                </script>
                                                                                <?php
                                                                                 echo '<meta http-equiv="refresh" content= "1;" />';
                                                         }

                                                       }
                                              }
                                              ?>
    <?php }?>