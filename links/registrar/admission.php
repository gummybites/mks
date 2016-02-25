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



if(isset($_POST['submit']))
                          {
                             
                              $year = $_POST ['year'];
                              $applied = date('F j,Y');
                               $seeking=$_POST['seeking'];
                                $status=$_POST['status'];
                              $Sname=$_POST['surname'];
                              $Fname=$_POST['firstname'];
                              $Mname=$_POST['middlename'];
                          
                              $per = $_POST['permanent'];
                              $tele = $_POST ['telephone'];
                              $mobi = $_POST['mobile'];

                              $month= $_POST['month'];
                              $day= $_POST['day'];
                              $years= $_POST['years'];
                              $birthday= $month.'/'.$day.'/'.$years;
                              $age =  date('Y')-$years;


                              $Sex= $_POST ['gender'];
                              $bplace = $_POST ['birthplace'];
                              $reli = $_POST['religion'];
                              
                              $gname= $_POST ['guardianname'];
                              $gadd = $_POST ['guardianaddress'];
                              $gcon = $_POST['guardiancontact'];
                          
                             
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
                                        
                                        VALUES ('$x','none','$year','$seeking','$applied','$status','$Sname','$Fname','$Mname','PENDING')");
                                        mysql_query($forms);

                                        $details=("INSERT INTO tbl_studentdetails (id,peraddress,telephone,mobile,birthdate,age,gender,birthplace,religion,guardianname,guardianaddress,guardiancontact) VALUES ('$x','$per','$tele','$mobi','$birthday','$age','$Sex','$bplace','$reli','$gname','$gadd','$gcon')");
                                        mysql_query($details);


                                        mysql_query("INSERT INTO  tbl_studentrequirements (id) values ('$x')");

                                        header('url=newstudentdetails.php?Success!');

                        }


                        if(isset($_POST['deleteok'])){
                          $deleteid=$_POST['deleteid'];

                          mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus='recycle' where id='$deleteid'");

                          header("Location: admission.php?detailsdeleted");


                        }

                        if(isset($_POST['acceptok'])){
                          $acceptid=$_POST['acceptid'];

                          mysql_query("UPDATE tbl_prospectivestudents set prospectivestatus='accepted' where id='$acceptid'");

                          header("Location: admission.php?Accepted");


                        }
?>




<!DOCTYPE html>
<html>
<head>

                
                                        <!--Compatibility -->
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <title>Admission</title>

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

                  background: url(../../images/45.gif); background-size: cover;  font: 15px/1.7em 'Calibri';
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

    $('#status').change(function(){

    var selectedValue=$(this).val();


    if(selectedValue=="new student"){
        document.getElementById('newstudent').style.display = "inline";
         document.getElementById('transferee').style.display = "none";
         document.getElementById('blank').style.display = "none";
    }

    else if(selectedValue=="Transferee"){
      document.getElementById('transferee').style.display = "inline";
      document.getElementById('newstudent').style.display = "none";
         document.getElementById('blank').style.display = "none";
    }
    else if(selectedValue==""){
        document.getElementById('blank').style.display = "inline";
      document.getElementById('newstudent').style.display = "none";
        document.getElementById('transferee').style.display = "none";

    }
    
     });
});



function register(){

var year=document.getElementById('year').value;
        if(year==""){
          document.getElementById('sy').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
          return false;

        }else{
          document.getElementById('sy').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";

        }//School year

var seeking=document.getElementById('seeking').value;
        if(seeking==""){
          document.getElementById('seek').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
          return false;

        }else{
          document.getElementById('seek').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";

        }//School year      

var status=document.getElementById('status').value;
        if(status==""){
          document.getElementById('stat').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
          return false;

        }else{
          document.getElementById('stat').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";

        }//School year   

var surname=document.getElementById('surname').value.length;

         if(surname==""){
          document.getElementById('sur').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
          return false;

        }else{

                  if(surname>=2 && surname<=25) {
                  document.getElementById('sur').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatesurname').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatesurname').innerHTML="<i style ='color: red;'> atleast 2 to 25 characters!</i>";
                return false;
               }

       

        }//Surname
        



var firstname=document.getElementById('firstname').value.length;
        if(firstname==""){
          document.getElementById('first').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
          return false;

        }else{

          if(firstname>=2 && firstname<=25) {
                  document.getElementById('first').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatefirstname').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatefirstname').innerHTML="<i style ='color: red;'> atleast 2 to 25 characters!</i>";
                return false;
               }


        }//Firstname

var middlename=document.getElementById('middlename').value.length;
        if(middlename==""){ 
                                    
                                      var x = confirm("are you sure you want to skip the middle name text field?");
                                      if(x == false)
                                      {
                                      document.getElementById('middle').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
                                      document.getElementById('middlename').readOnly = false;

                                      
                                   

                                      return false;
                                      }else{
                                        document.getElementById('middle').innerHTML="<span style='color:green;' class='glyphicon glyphicon-question-sign'></span> ";
                                         document.getElementById('middlename').readOnly = true;
                                      
                                      }

        }else{
          if(middlename>=2 && middlename<=25) {
                  document.getElementById('middle').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatemiddlename').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatemiddlename').innerHTML="<i style ='color: red;'> atleast 2 to 25 characters!</i>";
                return false;
               }
          
        }

var permanent=document.getElementById('permanent').value.length;
        if(permanent==""){
          document.getElementById('per').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
          return false;

        }else{
           if(permanent>=10 && permanent<=35) {
                  document.getElementById('per').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatepermanent').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatepermanent').innerHTML="<i style ='color: red;'> atleast 10 to 35 characters!</i>";
                return false;
               }

        }//Permanent Home address

var telephone=document.getElementById('telephone').value.length;
      if(telephone==""){
                                var x=confirm("Are you sure you want to skip telephone number?");
                                if(x==false){
                                  document.getElementById('tele').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
                                   document.getElementById('telephone').readOnly = false;

                                  return false;
                                }else{
                                  
                                  document.getElementById('tele').innerHTML="<span style='color:green;' class='glyphicon glyphicon-question-sign'></span> ";
                                 document.getElementById('telephone').readOnly = true;


                                }
          

        }else{
           if(telephone==7) {
                  document.getElementById('tele').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatetelephone').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatetelephone').innerHTML="<i style ='color: red;'> Must be exactly 7 numbers!</i>";
                return false;
               }

        }


var mobile=document.getElementById('mobile').value.length;
        if(mobile==""){
          document.getElementById('mobi').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
          return false;

        }else{
          if(mobile==11) {
                  document.getElementById('mobi').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatemobile').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatemobile').innerHTML="<i style ='color: red;'> Must be exactly 11 numbers!</i>";
                return false;
               }

        }//Mobile


var months=document.getElementById('months').value;        
var days=document.getElementById('days').value;   
var years=document.getElementById('years').value;

        if((months && days && years) == ""){
          document.getElementById('birth').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
          return false;

       }else{
           document.getElementById('birth').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
       }//birthdate

          
var gender=document.getElementById('gender').value;
        if(gender==""){
          document.getElementById('gen').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
          return false;

        }else{
          document.getElementById('gen').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";

        }//Gender


var birthplace=document.getElementById('birthplace').value.length;


         if(birthplace==""){
          document.getElementById('places').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
          return false;

        }else{

             if(birthplace>=10 && birthplace<=35) {
                  document.getElementById('places').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatebirthplace').style.display = "none";
       
                
             
               }else{
                  document.getElementById('validatebirthplace').innerHTML="<i style ='color: red;'> atleast 10 to 35 characters!</i>";
                return false;
               }

        }//Birthplace

     




var religion = document.getElementById('religion').value;
        if(religion==""){
        document.getElementById('reli').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
          return false;

        }else{
          document.getElementById('reli').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";

        }//Birthplace


var guardianname = document.getElementById('guardianname').value.length;
        if(guardianname==""){
        document.getElementById('gname').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
          return false;

        }else{
          if(guardianname>=2 && guardianname<=25) {
                  document.getElementById('gname').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validateguardianname').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validateguardianname').innerHTML="<i style ='color: red;'> atleast 2 to 25 characters!</i>";
                return false;
               }
        }//Birthplace
        
var guardianaddress = document.getElementById('guardianaddress').value.length;
        if(guardianaddress==""){
        document.getElementById('gadd').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
          return false;

        }else{
           if(guardianaddress>=10 && guardianaddress<=35) {
                  document.getElementById('gadd').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validateguardianaddress').style.display = "none";
       
                
             
               }else{
                  document.getElementById('validateguardianaddress').innerHTML="<i style ='color: red;'> atleast 10 to 35 characters!</i>";
                return false;
               }
        }//Birthplace


var guardiancontact = document.getElementById('guardiancontact').value.length;
        if(guardiancontact==""){
        document.getElementById('gcon').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
          return false;

        }else{
            if(guardiancontact==11) {
                  document.getElementById('gcon').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validateguardiancontact').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validateguardiancontact').innerHTML="<i style ='color: red;'> Must be exactly 11 numbers!</i>";
                return false;
               }
        }//Birthplace

}


// For birthdate
    $(function() {

    //populate our years select box
    for (i = new Date('2005').getFullYear(); i > 1992; i--){

        $('#years').append($('<option />').val(i).html(i));
    }
    //populate our months select box
    for (i = 1; i < 13; i++){
        $('#months').append($('<option />').val(i).html(i));
    }
    //populate our Days select box
    updateNumberOfDays(); 

    //"listen" for change events
    $('#years, #months').change(function(){
        updateNumberOfDays(); 
    });

});

  //function to update the days based on the current values of month and year
  function updateNumberOfDays(){
    $('#days').html('');
      month = $('#months').val();
      year = $('#years').val();
      days = daysInMonth(month, year);

      for(i=1; i < days+1 ; i++){
              $('#days').append($('<option />').val(i).html(i));
    

      }
  }

  //helper function
  function daysInMonth(month, year) {
      return new Date(year, month, 0).getDate();
  }


$(document).ready(function(){

    $('#years').change(function(){
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


      var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        specialKeys.push(9); //Tab
        specialKeys.push(46); //Delete
        specialKeys.push(36); //Home
        specialKeys.push(35); //End
        specialKeys.push(37); //Left
        specialKeys.push(39); //Right


//Text validation for surname
       function forsurname(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                          //     65 – 90 (Uppercase Alphabets) a      97 – 122 (Lowercase Alphabets) 164(enye lowercase)   165(enye uppercase)
                  var ret = ((keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) ||(keyCode >= 164) ||(keyCode >= 165)||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }  


        //Text validation for firstname
       function forfirstname(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                          //     65 – 90 (Uppercase Alphabets) a      97 – 122 (Lowercase Alphabets) 164(enye lowercase)   165(enye uppercase)
                  var ret = ((keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) ||(keyCode >= 164) ||(keyCode >= 165)||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }  

      //Text validation for middlename
       function formiddlename(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                          //     65 – 90 (Uppercase Alphabets) a      97 – 122 (Lowercase Alphabets) 164(enye lowercase)   165(enye uppercase)
                  var ret = ((keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) ||(keyCode >= 164) ||(keyCode >= 165)||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }

       //Text validation for permanent
       function forpermanent(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                          //48 to 57 (Numbers),    65 – 90 (Uppercase Alphabets) a      97 – 122 (Lowercase Alphabets) 
                  var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }


         //Text validation for telephone
       function fortelephone(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                          //48 to 57 (Numbers)
                  var ret = ((keyCode >= 48 && keyCode <= 57) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }


        //Text validation for mobile
       function formobile(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                          //48 to 57 (Numbers)
                  var ret = ((keyCode >= 48 && keyCode <= 57) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }


         //Text validation for birthplace
       function forbirthplace(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                          //48 to 57 (Numbers) 65 – 90 (Uppercase Alphabets) a      97 – 122 (Lowercase Alphabets) 
                  var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }                                     

      //Text validation for guardianname
       function forguardianname(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                          //     65 – 90 (Uppercase Alphabets) a      97 – 122 (Lowercase Alphabets) 164(enye lowercase)   165(enye uppercase)
                  var ret = ((keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) ||(keyCode == 164) ||(keyCode == 165)||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }  


      //Text validation for guardianaddress
       function forguardianaddress(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                          //48 to 57 (Numbers),    65 – 90 (Uppercase Alphabets) a      97 – 122 (Lowercase Alphabets) 
                  var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }        

    //Text validation for guardiancontact
       function forguardiancontact(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                          //48 to 57 (Numbers)
                  var ret = ((keyCode >= 48 && keyCode <= 57) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }

function myFunction(){


                                                                  
  window.print();
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
        <li ><a href="registrar.php"><i class="fa fa-home"></i><span>Home</span> </a> </li>
        <li ><a href="createaccounts.php"><i class="fa fa-plus"></i><span>Create acount</span> </a> </li>
        <li class="active"><a href="admission.php"><i class="fa fa-archive"></i><span>Admission</span> </a></li>
        <li><a href="inquiry.php"><i class="fa fa-newspaper-o"></i><span>Inquiry</span> </a> </li>
        <li><a href="faculty.php"><i class="fa fa-users"></i><span>Faculty</span> </a> </li>
        <li><a href="form.php"><i class="fa fa-file-pdf-o"></i><span>Form</span> </a> </li>
        <li><a href="event.php"><i class="fa fa-calendar-minus-o"></i><span>Event & Annoucement</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-long-arrow-down"></i><span>Manage</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="manageuser.php"><i class="fa fa-user-secret"></i> Admin Profile</a></li>
            <li><a href="deleteddetails.php"><i class="fa fa-trash-o"></i> Deleted details</a></li>
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
			  <form   onsubmit='return freshmanapplication()' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"  enctype="multipart/form-data">            
			  <i  id="error" style="color: Red; display: none"></i>	                
              	
              <?php
              if(isset($_GET['edit'])){
              	$edit=$_GET['edit'];

                ?>

                    <div class="container">
                    <div class="col-sm-12 col-md-12 ">
                    <div class="alert alert-success">
                         <h5>Edit Application</h5>
                    <a href='admission.php?details=<?php echo $edit?>' id='next'>Back</a>
                    
                 
                    </div>
                    </div>
                    </div><!-- -->
                      
              	
                <?php


                //table prospectivestudents
              	$qry="SELECT * from tbl_prospectivestudents where id='$edit'";
              	$res=mysql_query($qry);

                //table studentdetails
                $details="SELECT * from tbl_studentdetails where id='$edit'";
                $res_details=mysql_query($details);
                 while($details=mysql_fetch_assoc($res_details)){
                            $per=$details['peraddress'];
                             $tele=$details['telephone'];
                       
                            $mob=$details['mobile'];
                            $birt=$details['birthdate'];
                            $ages=$details['age'];
                            $sex=$details['gender'];
                            $place=$details['birthplace'];
                            $reli=$details['religion'];
                            $gname=$details['guardianname'];
                            $gadd=$details['guardianaddress'];
                            $gcon=$details['guardiancontact'];
                 }

              	while($qry=mysql_fetch_assoc($res)){
              				$year=$qry['year'];
                            $email=$qry['email'];
                            $user=$qry['username'];
                            $applicant_no=$qry['applicant_number'];
                            $sy=$qry['year'];
                            $level=$qry['seeking'];
                            $date=$qry['applieddate'];
                            $stat=$qry['status'];
                            $sname=$qry['surname'];
                            $fname=$qry['firstname'];
                            $mname=$qry['middlename'];
                           
                            $pstatus=$qry['prospectivestatus'];



              	}

              	?>
                    <i  id="error" style="color: Red; display: none"></i>
        <div class="container">
        <div class="col-sm-12 col-md-12 ">
        <i id='validatesurname'></i>
        <i id='validatefirstname'></i>
        <i id='validatemiddlename'></i>
        <i id='validatepermanent'></i>
        <i id='validatetelephone'></i>
        <i id='validatemobile'></i>
        <i id='validatebirthplace'></i>
        <i id='validateguardianname'></i>
        <i id='validateguardianaddress'></i>
        <i id='validateguardiancontact'></i>
        </div></div>

        <div class="container">
        <div class="col-sm-12 col-md-12 ">

                  <div class="alert alert-warning">
             
                    <form   onsubmit='return freshmanapplicationupdate()' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"  enctype="multipart/form-data">
                
                      <i  id="error" style="color: Red; display: none"></i>

                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      School Year:<i>(required)</i> <i id="sy"></i>
                      <p class='form-control' readonly="readonly"><?php echo $year;  ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Seeking Admission As:
                      <p class="form-control" readonly="readonly"><?php echo $level;?></p>
                      </div>
                      </div><!--row-->








                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Applied date:
                      <p class="form-control" readonly="readonly"><?php echo $date; ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Status:
                      <p class="form-control" readonly="readonly"><?php echo $stat;?></p>
                      </div>
                      </div><!--row-->




                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Surname: <i>(required)</i> <i id='sur'></i>
                      <input class='form-control' type='text' onkeypress="return forsurname(event);" ondrop="return false;" onpaste="return false;"  id='surname' name='surname' maxlength="25" placeholder='Type your surname..' value='<?php echo $sname ?>'/>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      Firstname:  <i>(required)</i> <i id='first'></i>
                      <input class='form-control' type='text' id='firstname' onkeypress="return forfirstname(event);" ondrop="return false;" onpaste="return false;"  name='firstname' maxlength="25" placeholder='Type your firstname..' value='<?php echo $fname ?>'/>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Middlename:  <i>(optional)</i> <i id='middle'></i>
                      <input class='form-control' type='text' id='middlename' onkeypress="return formiddlename(event);" ondrop="return false;" onpaste="return false;" maxlength="25" name='middlename'  placeholder='Type your middlename..' value='<?php echo $mname ?>'/>
                      </div>
                      </div><!--row-->
                  



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Permanent Home address: <i>(required)</i> <i id='per'></i>
                       <input class='form-control' type='text' id='permanent' onkeypress="return forpermanent(event);" ondrop="return false;" onpaste="return false;" placeholder='Type your home address..' maxlength="35" value='<?php echo $per?>' name='permanent'/>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Telephone number: <i>(optional)</i> <i id='tele'></i>
                       <input class='form-control' type='text' id='telephone' onkeypress="return fortelephone(event);" ondrop="return false;" onpaste="return false;"  placeholder='Type your telephone number..' maxlength="7" value='<?php echo $tele?>' name='telephone'/> 
                      </div>
                      </div><!--row-->



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Mobile number: <i>(required)</i> <i id='mobi'></i>
                       <input class='form-control' type='text' id='mobile' onkeypress="return formobile(event);" ondrop="return false;" onpaste="return false;" placeholder='Type your mobile number here..' maxlength='11' value='<?php echo $mob?>' name='mobile' />
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      Birthdate: (Day/Month/Year) <i id="birth"></i> <a href="freshmanapplicationform.php?editbirthdate=<?php echo $db_email?>" id='changebirthdate'>Change</a>
                      <input type="text" id='hidebirthday' class='form-control' readonly="readonly" value="<?php echo $birt ?>"> 
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Age:<br>
                       <input type="text" id='age' class='form-control' readonly="readonly" value="<?php echo $ages ?>"> 
                      </div>
                      </div><!--row-->



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Gender: <a href="freshmanapplicationform.php?editgender=<?php echo $db_email ?>" id="changegender">Change</a>
                      <input type="text" id='gender' class='form-control' readonly="readonly" value="<?php echo $sex ?>"> 
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                       Birthplace: <i>(required)</i> <i id='places'></i>
                       <input class='form-control' type='text' onkeypress="return forbirthplace(event);" ondrop="return false;" onpaste="return false;"  id="birthplace" placeholder='Type your birthplace here..' maxlength="35" value="<?php echo $place?>" name="birthplace" />
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Religion:<a href="freshmanapplicationform.php?editreligion=<?php echo $db_email ?>" id="changereligion">Change</a>
                      <input type="text" id='religion' class='form-control' readonly="readonly" value="<?php echo $reli ?>"> 
                      </div><!--row-->
                      </div>



                       <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Guardian's name: <i>(required)</i> <i id='gname'></i>
                       <input class='form-control' type='text' onkeypress="return forguardianname(event);" ondrop="return false;" onpaste="return false;"  id='guardianname' name='guardianname' maxlength="25" placeholder="Type your guardian's name.." value='<?php echo $gname?>'/>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                       Address: <i>(required)</i>  <i id='gadd'></i>
                      <input class='form-control' type='text' id='guardianaddress' onkeypress="return forguardianaddress(event);" ondrop="return false;" onpaste="return false;"  name='guardianaddress' maxlength="25" placeholder='Type your guardianaddress..' value='<?php echo $gadd?>'/>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Mobile number: <i>(required)</i> <i id='gcon'></i>
                       <input class='form-control' type='text' id='guardiancontact' onkeypress="return forguardiancontact(event);" ondrop="return false;" onpaste="return false;" maxlength="11" name='guardiancontact'  placeholder='Type your guardiancontact..' value='<?php echo $gcon?>'/>
                      </div>
                      </div><!--row-->

                        <input type='hidden' name='id' value="<?php echo $id ?>">
                        <input type='hidden' name='email' value="<?php echo $db_email ?>">
                      

                               <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                             <button type="submit"  name="edit_update"  value="Submit" id='next'>Update</button>
                      </div>
                      </div><!--row-->

                  
                       </form>
                  </div>
        </div>
        </div>
        <?php


        }elseif(isset($_GET['editgender'])){
          $email=$_GET['editgender'];
          $qry="SELECT * from tbl_prospectivestudents inner join tbl_studentdetails on tbl_prospectivestudents.id=tbl_studentdetails.id where email='$email' ";
          $res=mysql_query($qry);
          while($qry=mysql_fetch_array($res)){
                            $id=$qry['id'];
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
                          }
                          ?>
                      

        <div class="container">
        <div class="col-sm-12 col-md-12 ">

                  <div class="alert alert-warning">
                  <legend><a href="freshmanapplicationform.php?editapplication=<?php echo $db_email?>">Edit Application</a> > Edit Gender</legend>
                    <form   onsubmit='return freshmanapplicationgenderupdate()' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"  enctype="multipart/form-data">
                
                      <i  id="error" style="color: Red; display: none"></i>

                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      School Year:
                      <p class='form-control' readonly="readonly"><?php echo $year;  ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Seeking Admission As:
                      <p class="form-control" readonly="readonly"><?php echo $level;?></p>
                      </div>
                      </div><!--row-->








                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Applied date:
                      <p class="form-control" readonly="readonly"><?php echo $date; ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Status:
                      <p class="form-control" readonly="readonly"><?php echo $stat;?></p>
                      </div>
                      </div><!--row-->




                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Surname:
                       <p class='form-control' readonly="readonly"><?php echo $sname;  ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      Firstname:
                       <p class='form-control' readonly="readonly"><?php echo $fname;  ?></p>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Middlename: 
                       <p class='form-control' readonly="readonly"><?php echo $mname;  ?></p>
                      </div>
                      </div><!--row-->
                  



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Permanent Home address: 
                        <p class='form-control' readonly="readonly"><?php echo $per;  ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Telephone number:
                        <p class='form-control' readonly="readonly"><?php echo $tele;  ?></p>
                      </div>
                      </div><!--row-->



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Mobile number:
                       <p class='form-control' readonly="readonly"><?php echo $mob;  ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      Birthdate: (Day/Month/Year) <a href="freshmanapplicationform.php?editbirthdate=<?php echo $db_email?>">Change</a>
                      <br>
                      <p id='age' class='form-control' readonly="readonly"><?php echo $birt;  ?></p>  
                      </div>



                      <div class="col-sm-4 col-md-4 ">
                      Age: <br>  
                       <p id='age' class='form-control' readonly="readonly"><?php echo $ages;  ?></p>
                      </div>
                      </div><!--row-->



                      <div class='row'>
                       <div class="col-sm-4 col-md-4 ">
                      Gender: <i>(required)</i> <i id='gen'></i><?php echo $sex?>
                       <select class='form-control' id="gender" name="gender">
                        <option></option>
                        <option>Female</option>
                        <option>Male</option>
                      </select>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                       Birthplace:
                        <p class='form-control' readonly="readonly"><?php echo $place;  ?></p>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Religion:<a href="freshmanapplicationform.php?editreligion=<?php echo $db_email ?>" id="changereligion">Change</a>
                      <input type="text" id='religion' class='form-control' readonly="readonly" value="<?php echo $reli ?>"> 
                      </div><!--row-->
                      </div>



                       <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Guardian's name:
                        <p class='form-control' readonly="readonly"><?php echo $gname;  ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                       Address:
                       <p class='form-control' readonly="readonly"><?php echo $gadd;  ?></p>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Mobile number:
                        <p class='form-control' readonly="readonly"><?php echo $gcon;  ?></p>
                      </div>
                      </div><!--row-->

                        <input type='hidden' name='id' value="<?php echo $id ?>">
                        <input type='hidden' name='email' value="<?php echo $db_email ?>">
                       <button type="submit"  name="edit_gender"  value="Submit" class='next'>Update</button>
                       </form>
                  </div>
        </div>
        </div>

              	<?php



              }elseif(isset($_GET['details'])){
              	$id_details=$_GET['details'];
              


              	

                //table prospectivestudents
              	$qry="SELECT * from tbl_prospectivestudents where id='$id_details' ";
              	$res=mysql_query($qry);
                //table studentdetails
                $details="SELECT * from tbl_studentdetails where id='$id_details' ";
                $res_details=mysql_query($details);

                while($details=mysql_fetch_assoc($res_details)){
                     
                             $per=$details['peraddress'];
                            $tele=$details['telephone'];
                       
                            $mob=$details['mobile'];
                            $birt=$details['birthdate'];
                            $ages=$details['age'];
                            $sex=$details['gender'];
                            $place=$details['birthplace'];
                            $reli=$details['religion'];                     
                            $gname=$details['guardianname'];
                            $gadd=$details['guardianaddress'];
                            $gcon=$details['guardiancontact'];     


                }


              	while($qry=mysql_fetch_assoc($res)){
              				$year=$qry['year'];
                            $email=$qry['email'];
                            $user=$qry['username'];
                            $applicant_no=$qry['applicant_number'];
                            $sy=$qry['year'];
                            $level=$qry['seeking'];
                            $date=$qry['applieddate'];
                            $stat=$qry['status'];
                            $sname=$qry['surname'];
                            $fname=$qry['firstname'];
                            $mname=$qry['middlename'];
                            $pstatus=$qry['prospectivestatus'];



              	}

          
               
              	
              				?>

                    <div class="container">
                    <div class="col-sm-12 col-md-12 ">
                    <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <a href='admission.php' id="next"><i class="fa fa-mail-reply"></i> Back</a>
                    <a href='admission.php?edit=<?php echo $id_details?>' id="next"><i class="fa fa-edit"></i> Edit</a>
                    
                 
                    </div>
                    </div>
                    </div><!-- -->
              				
              			 <div class="container">
                    <div class="col-sm-12 col-md-12 ">
                     <div class="alert alert-warning">

                
                      <i  id="error" style="color: Red; display: none"></i>

                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      School Year:
                      <p class='form-control' readonly='readonly'><?php echo $year; ?></p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Seeking Admission As:
                      <p class='form-control' readonly='readonly'><?php echo $level; ?> </p>
                      </div>
                      </div><!--row-->








                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Applied date:
                      <p class='form-control' readonly='readonly'> <?php echo $date; ?> </p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Status:
                      <p class='form-control' readonly='readonly'><?php echo $stat; ?> </p>
                      </div>
                      </div><!--row-->




                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Surname:
                      <p class='form-control' readonly='readonly'> <?php echo $sname; ?> </p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      Firstname:  
                      <p class='form-control' readonly='readonly'><?php echo $fname; ?> </p>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Middlename:  
                      <p class='form-control' readonly='readonly'><?php echo $mname; ?> </p>
                      </div>
                      </div><!--row-->
                  



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Permanent Home address: 
                       <p class='form-control' readonly='readonly'><?php echo $per; ?> </p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Telephone number:
                      <p class='form-control' readonly='readonly'><?php echo $tele; ?> </p>
                      </div>
                      </div><!--row-->



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Mobile number: 
                        <p class='form-control' readonly='readonly'> <?php echo $mob; ?> </p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                      Birthdate: (Day/Month/Year)
                       <p class='form-control' readonly='readonly'><?php echo $birt; ?> </p>                                                      
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Age:
                       <p class='form-control' readonly='readonly'><?php echo $ages; ?> </p>
                      </div>
                      </div><!--row-->



                      <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Gender: 
                       <p class='form-control' readonly='readonly'><?php echo $sex; ?> </p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                       Birthplace: 
                       <p class='form-control' readonly='readonly'><?php echo $place; ?>  </p>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Religion: 
                       <p class='form-control' readonly='readonly'><?php echo $reli; ?> </p>
                      </div>
                      </div><!--row-->



                       <div class='row'>
                      <div class="col-sm-4 col-md-4 ">
                      Guardian's name: 
                       <p class='form-control' readonly='readonly'><?php echo $gname; ?> </p>
                      </div>
                      
                      <div class="col-sm-4 col-md-4">
                       Address:
                      <p class='form-control' readonly='readonly'><?php echo $gadd; ?>  </p>
                      </div>

                      <div class="col-sm-4 col-md-4 ">
                      Mobile number: 
                       <p class='form-control' readonly='readonly'><?php echo $gcon; ?> </p>
                      </div>
                      </div><!--row-->


                  </div>
        </div>
        </div>

              				<?php


              }elseif(isset($_POST['new']) ||isset($_POST['transfer'])){
               

                ?>
                               
                
                                         

      
                             

                              <?php if(isset($_POST['new'])){
                                ?>
                                <div class="container">
                                <div class="col-sm-12 col-md-12 ">
                                          <div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                             
                                              
                                               <strong>NEW STUDENT APPLICATION FORM</strong><br>
                                               <a href="admission.php" id="next"><i class="fa fa-mail-reply"></i>Back</a>
                                          </div>
                                </div>
                                </div>



                                <?php
                                  }elseif(isset($_POST['transfer'])){
                                ?>
                                  <div class="container">
                                  <div class="col-sm-12 col-md-12 ">
                                            <div class="alert alert-success">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                 <strong>TRANSFEREE APPLICATION FORM</strong><br>
                                                  <a href="admission.php" id="next"><i class="fa fa-mail-reply"></i>Back</a>
                                                
                                            </div>
                                  </div>
                                  </div>



                                <?php


                                  }
                                ?>


                                              <div class="container">
                                              <div class="col-sm-12 col-md-12 ">
                                              <i id='validatesurname'></i>
                                              <i id='validatefirstname'></i>
                                              <i id='validatemiddlename'></i>
                                              <i id='validatepermanent'></i>
                                              <i id='validatetelephone'></i>
                                              <i id='validatemobile'></i>
                                              <i id='validatebirthplace'></i>
                                              <i id='validateguardianname'></i>
                                              <i id='validateguardianaddress'></i>
                                              <i id='validateguardiancontact'></i>
                                              </div></div>

                                  <div class="container">
                                  <div class="col-sm-12 col-md-12 ">
                                  <div class="alert alert-warning">


                                            <div class='row'>
                                            <div class="col-sm-4 col-md-4 ">
                                            School Year:<i>(required)</i> <i id="sy"></i>
                                            <select class='form-control'   id="year" name="year" >
                                              <option></option>
                                              <option><?php 
                                                $schoolyear= date('Y')+1;
                                                $nextyear= $schoolyear+1;
                                                $totalyear= "$schoolyear - $nextyear";
                                                echo $totalyear; ?>
                                              </option>
                                            </select>
                                            </div>
                                            
                                            <div class="col-sm-4 col-md-4">
                                            </div>

                                            <div class="col-sm-4 col-md-4 ">
                                            Seeking Admission As:
                                            <?php if(isset($_POST['new'])){
                                                      ?>
                                                      <input type="text" class='form-control' name="seeking" readonly="readonly"value="Grade 7">
                                                      <?php
                                                        }elseif(isset($_POST['transfer'])){
                                                      ?>
                                                     <select class='form-control'   id="seeking" name="seeking" >

                                                                    <option></option>
                                                                    <option>Grade 7</option>
                                                                    <option>Grade 8</option>
                                                                    <option>Grade 9</option>
                                                                    <option>Grade 10</option>
                                                      
                                                                  

                                                      </select> 

                                                      <?php


                                                        }
                                                            ?>
                                            </div>
                                            </div><!--row-->


                                            <div class='row'>
                                              <div class="col-sm-4 col-md-4 ">
                                              Applied date:
                                              <input type="text" class='form-control' readonly="readonly"value="<?php 
                                                                                  $applied = date("F j,Y");
                                                                                  echo "$applied";
                                                                                  ?>">
                                              </div>
                                              
                                              <div class="col-sm-4 col-md-4">
                                              </div>

                                              <div class="col-sm-4 col-md-4 ">
                                              Status:
                                               <?php if(isset($_POST['new'])){
                                                      ?>
                                                       <input type="text" class='form-control' name="status" readonly="readonly"value="new student">

                                                      <?php
                                                        }elseif(isset($_POST['transfer'])){
                                                      ?>
                                                      <input type="text" class='form-control' name="status"  readonly="readonly"value="Transferee">

                                                      <?php


                                                        }
                                                            ?>
                                              </div>
                                              </div><!--row-->


                                              <div class='row'>
                                              <div class="col-sm-4 col-md-4 ">
                                              Surname: <i>(required)</i> <i id='sur'></i>
                                              <input class='form-control' type='text' onkeypress="return forsurname(event);" ondrop="return false;" onpaste="return false;"  id='surname' name='surname' maxlength="25" placeholder='Type your surname..' value=''/>
                                              </div>
                                              
                                              <div class="col-sm-4 col-md-4">
                                              Firstname:  <i>(required)</i> <i id='first'></i>
                                              <input class='form-control' type='text' id='firstname' onkeypress="return forfirstname(event);" ondrop="return false;" onpaste="return false;"  name='firstname' maxlength="25" placeholder='Type your firstname..' value=''/>
                                              </div>

                                              <div class="col-sm-4 col-md-4 ">
                                              Middlename:  <i>(optional)</i> <i id='middle'></i>
                                              <input class='form-control' type='text' id='middlename' onkeypress="return formiddlename(event);" ondrop="return false;" onpaste="return false;" maxlength="25" name='middlename'  placeholder='Type your middlename..' value=''/>
                                              </div>
                                              </div><!--row-->



                                              <div class='row'>
                                              <div class="col-sm-4 col-md-4 ">
                                              Permanent Home address: <i>(required)</i> <i id='per'></i>
                                               <input class='form-control' type='text' id='permanent' onkeypress="return forpermanent(event);" ondrop="return false;" onpaste="return false;" placeholder='Type your home address..' maxlength="35" value='' name='permanent'/>
                                              </div>
                                              
                                              <div class="col-sm-4 col-md-4">
                                              </div>

                                              <div class="col-sm-4 col-md-4 ">
                                              Telephone number: <i>(optional)</i> <i id='tele'></i>
                                               <input class='form-control' type='text' id='telephone' onkeypress="return fortelephone(event);" ondrop="return false;" onpaste="return false;"  placeholder='Type your telephone number..' maxlength="7" value='' name='telephone'/> 
                                              </div>
                                              </div><!--row-->



                                              <div class='row'>
                                              <div class="col-sm-4 col-md-4 ">
                                              Mobile number: <i>(required)</i> <i id='mobi'></i>
                                               <input class='form-control' type='text' id='mobile' onkeypress="return formobile(event);" ondrop="return false;" onpaste="return false;" placeholder='Type your mobile number here..' maxlength='11' value='' name='mobile' />
                                              </div>
                                              
                                              <div class="col-sm-4 col-md-4">
                                              Birthdate: (Day/Month/Year) <i>(required)</i> <i id="birth"></i>
                                              <br>
                                              <select   id='days' name="day">
                                                    <option></option>
                                              </select>
                                                            
                                              <select id='months' name="month">
                                                  <option></option>
                                              </select>
                                                                                               
                                              <select  id='years' name="years">
                                                    <option></option>
                                              </select>                                                       
                                              </div>

                                              <div class="col-sm-4 col-md-4 ">
                                              Age:
                                               <label class='form-control' id='age' value=''></label>
                                              </div>
                                              </div><!--row-->



                                              <div class='row'>
                                              <div class="col-sm-4 col-md-4 ">
                                              Gender: <i>(required)</i> <i id='gen'></i>
                                               <select class='form-control' id="gender" name="gender">
                                                <option></option>
                                                <option>Female</option>
                                                <option>Male</option>
                                              </select>
                                              </div>
                                              
                                              <div class="col-sm-4 col-md-4">
                                               Birthplace: <i>(required)</i> <i id='places'></i>
                                               <input class='form-control' type='text' onkeypress="return forbirthplace(event);" ondrop="return false;" onpaste="return false;"  id="birthplace" placeholder='Type your birthplace here..' maxlength="35" name="birthplace" />
                                              </div>

                                              <div class="col-sm-4 col-md-4 ">
                                              Religion: <i>(required)</i>  <i id="reli"></i>
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
                                              </div>
                                              </div><!--row-->




                                               <div class='row'>
                                              <div class="col-sm-4 col-md-4 ">
                                              Guardian's name: <i>(required)</i> <i id='gname'></i>
                                               <input class='form-control' type='text' onkeypress="return forguardianname(event);" ondrop="return false;" onpaste="return false;"  id='guardianname' name='guardianname' maxlength="25" placeholder="Type your guardian's name.." value=''/>
                                              </div>
                                              
                                              <div class="col-sm-4 col-md-4">
                                               Address: <i>(required)</i>  <i id='gadd'></i>
                                              <input class='form-control' type='text' id='guardianaddress' onkeypress="return forguardianaddress(event);" ondrop="return false;" onpaste="return false;"  name='guardianaddress' maxlength="25" placeholder='Type your guardianaddress..' value=''/>
                                              </div>

                                              <div class="col-sm-4 col-md-4 ">
                                              Mobile number: <i>(required)</i> <i id='gcon'></i>
                                               <input class='form-control' type='text' id='guardiancontact' onkeypress="return forguardiancontact(event);" ondrop="return false;" onpaste="return false;" maxlength="11" name='guardiancontact'  placeholder='Type your guardiancontact..' value=''/>
                                              </div>
                                              </div><!--row-->
                                            </div>
                                            </div>
                                            </div>

                                             <div class='row'>
                                              <div class="col-sm-4 col-md-4 ">
                        
                                              </div>
                                              
                                              <div class="col-sm-4 col-md-4">
                        
                                              </div>

                                              <div class="col-sm-4 col-md-4 ">
                                                 <button type="submit"  name="submit"  value="Submit" id='next'>Submit</button>
                                              </div>
                                              </div><!--row-->
                                              <br>
                                            </div>
                                            </div>
                                            </div>

                                           
                      
                    
                            <?php



              }else{

              ?>
              <?php if(isset($_GET['detailsdeleted'])){
                    ?>
                    <center><p style="color:green">Details Succesfully Deleted!</p></center>
                    <?php
                    }elseif(isset($_GET['Accepted'])){
                      ?>
                    <center><p style="color:green">New student Added</p></center>
                    <?php 
                      }?>
              <p style="color: green" id="message"></p>
               <button name='new' id='next' ><span class="glyphicon glyphicon-add">+</span> New Student</button> 
               <button name='transfer' id='next'><span class="glyphicon glyphicon-add">+</span> Transferee</button> 
   

              <div class='demo_jui'>
                        <table cellpadding='0' cellspacing='1' border='1' class='display' id='tbl' class='jtable'>
                        <thead>

                                          <tr>
                                              <th><center>Requirements Completed</center></th>
                                              <th><center>Date</center></th>
                                              <th><center>Grade level</center></th>
                                              <th><center>Full name</center></th>
                                              <th><center>Details</center></th>
                                              <th><center>Action</center></th>
                 
                                              </tr>

                        </thead>



                        <?php

                        $details="SELECT * from tbl_prospectivestudents inner join tbl_studentrequirements on tbl_prospectivestudents.id=tbl_studentrequirements.id where prospectivestatus!='recycle' ";
                        $res_details=mysql_query($details);


                        while($details=mysql_fetch_assoc($res_details)){

                       		$id=$details['id'];
                            $email=$details['email'];
                            $user=$details['username'];
                            $applicant_no=$details['applicant_number'];
                            $sy=$details['year'];
                            $level=$details['seeking'];
                            $date=$details['applieddate'];
                            $stat=$details['status'];
                            $sname=$details['surname'];
                            $fname=$details['firstname'];
                            $mname=$details['middlename'];
                            $pstatus=$details['prospectivestatus'];

                            $form138=$details['Form138'];
                            $goodmoral=$details['GoodMoral'];
                            $birthcertificate=$details['BirthCertificate'];
                              
                            $totalrequirements=$form138+ $goodmoral+$birthcertificate; 

                            if($form138||$goodmoral||$birthcertificate=='1'){

                                if($totalrequirements=='1'){
                                   if($pstatus=='PENDING'){
                                            echo "<tr><td><center style='background-color:green; color: white;'>1 requirements</center></td><td><center>$date</center></td><td><center>$level</center></td><td><center>$sname, $fname, $mname</center></td> <td><center><a href='?details=$id' id=''>View Details</a></center></td><td><center><a href='admission.php?accept=$id'>Accept</a> | <a href='?delete=$id' >Delete</a></center></td></tr>";
                                   }elseif($pstatus=='accepted'){
                                               echo "<tr><td><center style='background-color:green; color: white;'>1 requirements</center></td><td><center>$date</center></td><td><center>$level</center></td><td><center>$sname, $fname, $mname</center></td> <td><center><a href='?details=$id' id=''>View Details</a></center></td><td><center>--</center></td></tr>";

                                   }
                           
                                }elseif($totalrequirements=='2'){
                                      if($pstatus=='PENDING'){
                                            echo "<tr><td><center style='background-color:green; color: white;'>2 requirements</center></td><td><center>$date</center></td><td><center>$level</center></td><td><center>$sname, $fname, $mname</center></td> <td><center><a href='?details=$id' id=''>View Details</a></center></td><td><center><a href='admission.php?accept=$id'>Accept</a> | <a href='?delete=$id' >Delete</a></center></td></tr>";
                                   }elseif($pstatus=='accepted'){
                                               echo "<tr><td><center style='background-color:green; color: white;'>2 requirements</center></td><td><center>$date</center></td><td><center>$level</center></td><td><center>$sname, $fname, $mname</center></td> <td><center><a href='?details=$id' id=''>View Details</a></center></td><td><center>--</center></td></tr>";

                                   }
                           
                                }elseif($totalrequirements=='3'){
                                     if($pstatus=='PENDING'){
                                            echo "<tr><td><center style='background-color:green; color: white;'>3 requirements</center></td><td><center>$date</center></td><td><center>$level</center></td><td><center>$sname, $fname, $mname</center></td> <td><center><a href='?details=$id' id=''>View Details</a></center></td><td><center><a href='admission.php?accept=$id'>Accept</a> | <a href='?delete=$id' >Delete</a></center></td></tr>";
                                   }elseif($pstatus=='accepted'){
                                               echo "<tr><td><center style='background-color:green; color: white;'>3 requirements</center></td><td><center>$date</center></td><td><center>$level</center></td><td><center>$sname, $fname, $mname</center></td> <td><center><a href='?details=$id' id=''>View Details</a></center></td><td><center>--</center></td></tr>";

                                   }

                                }
                             
                            }else{
                               echo "<tr><td><center style='background-color:red; color: white;'>none</center></td><td><center>$date</center></td><td><center>$level</center></td><td><center>$sname, $fname, $mname</center></td><td><center><a href='?details=$id' id=''>View Details</a></center></td>

                               <td><center> <a href='?delete=$id' >Delete</a></center></td></tr>";
                            }

              
                        
                        }

                        ?>

                        </table>

             </div>

             <?php }?>

             </form>

  									
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

<?php 
if(isset($_GET['delete'])){
$id=$_GET['delete'];

$details="SELECT * from tbl_prospectivestudents where id='$id' ";
$res_details=mysql_query($details);

  while($details=mysql_fetch_assoc($res_details)){
                            $id=$details['id'];
                            $sname=$details['surname'];
                            $fname=$details['firstname'];
                            $mname=$details['middlename'];
                            }
?>

<!-- The Modal -->
<div id="myModal" style="display: none;" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span id="close">×</span>

    </div>
    <div class="modal-body">
      <p>Are you sure you want to delete details of <?php echo $sname.','. $fname. ','. $mname?>?</p>
    
    </div>
    <div class="modal-footer">
    <form method="POST">
    <button id='ok' name='deleteok'>Ok</button>
    <input type="hidden" name="deleteid" value="<?php echo $id?>">
    </form>

    </div>
  </div>

</div>



<?php
}elseif(isset($_GET['accept'])){
$id=$_GET['accept'];

$details="SELECT * from tbl_prospectivestudents where id='$id' ";
$res_details=mysql_query($details);

  while($details=mysql_fetch_assoc($res_details)){
                            $id=$details['id'];
                            $sname=$details['surname'];
                            $fname=$details['firstname'];
                            $mname=$details['middlename'];
                            }
?>

<!-- The Modal -->
<div id="myModal" style="display: none;" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span id="close">×</span>

    </div>
    <div class="modal-body">
      <p>Are you sure you want to accept <?php echo $sname.','. $fname. ','. $mname?> as new student?</p>
    
    </div>
    <div class="modal-footer">
    <form method="POST">
    <button id='ok' name='acceptok'>Ok</button>
    <input type="hidden" name="acceptid" value="<?php echo $id?>">
    </form>

    </div>
  </div>

</div>



<?php
}


?>  
    <?php }?>