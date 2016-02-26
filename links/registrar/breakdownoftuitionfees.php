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


$tuition="SELECT * from tbl_tuition";
$res_tuition=mysql_query($tuition);

while($tuition=mysql_fetch_array($res_tuition)){
  $tuition_id=$tuition['id'];

}








if(isset($_POST['updatetuitionfees'])){
 $db_id=$_POST['id'];
 $tfee=$_POST['tuition'];
 $reg=$_POST['registration'];
 $med=$_POST['medical'];
 $lib=$_POST['library'];
 $ath=$_POST['athletics'];
 $sgf=$_POST['studentfee'];
 $pris=$_POST['prisaafee'];
 $bulp=$_POST['bulprisafee'];
 $apri=$_POST['aprismfee'];
 $studid=$_POST['studentid'];
 $hand=$_POST['handbook'];
 $ener=$_POST['energyfee'];
 $insu=$_POST['insurancefee'];
 $orgfee=$_POST['organizationfee'];
 $comlab=$_POST['computerlab'];
 $scilab=$_POST['sciencelab'];
 $tlelab=$_POST['tlelab'];
 $saf=$_POST['schoolfee'];


mysql_query("UPDATE tbl_tuition set tuition='$tfee' where id='$db_id'");
mysql_query("UPDATE tbl_tuition set registration='$reg' where id='$db_id'");
mysql_query("UPDATE tbl_tuition set medical='$med' where id='$db_id'");
mysql_query("UPDATE tbl_tuition set library='$lib' where id='$db_id'");
mysql_query("UPDATE tbl_tuition set athletics='$ath' where id='$db_id'");
mysql_query("UPDATE tbl_tuition set student_government_fee='$sgf' where id='$db_id'");
mysql_query("UPDATE tbl_tuition set prisaa_fee='$pris' where id='$db_id'");
mysql_query("UPDATE tbl_tuition set bulprisa_fee='$bulp' where id='$db_id'");
mysql_query("UPDATE tbl_tuition set aprism_fee='$apri' where id='$db_id'");
mysql_query("UPDATE tbl_tuition set student_id='$studid' where id='$db_id'");
mysql_query("UPDATE tbl_tuition set handbook='$hand' where id='$db_id'");
mysql_query("UPDATE tbl_tuition set energy_fee='$ener' where id='$db_id'");
mysql_query("UPDATE tbl_tuition set insurance_fee='$insu' where id='$db_id'");
mysql_query("UPDATE tbl_tuition set organization_fee='$orgfee' where id='$db_id'");
mysql_query("UPDATE tbl_tuition set computer_lab='$comlab' where id='$db_id'");
mysql_query("UPDATE tbl_tuition set science_lab='$scilab' where id='$db_id'");
mysql_query("UPDATE tbl_tuition set tle_lab='$tlelab' where id='$db_id'");
mysql_query("UPDATE tbl_tuition set school_activities_fee='$saf' where id='$db_id'");



header("Location: breakdownoftuitionfees.php?edit=$db_id");
}
?>



<!DOCTYPE html>
<html>
<head>

                
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Breakdown of Tuition Fees</title>

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
</head>
<style>
                    body{
                     background: url(../../images/45.gif); background-size: cover;  font: 15px/1.7em 'Calibri';                    }
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

function tuitionfee(){
var tuition= document.getElementById('tuition').value;
var registration= document.getElementById('registration').value;
var medical= document.getElementById('medical').value;
var library= document.getElementById('library').value;
var athletics= document.getElementById('athletics').value;
var studentfee= document.getElementById('studentfee').value;
var prisaafee= document.getElementById('prisaafee').value;
var bulprisafee= document.getElementById('bulprisafee').value;
var aprismfee= document.getElementById('aprismfee').value;
var studentid= document.getElementById('studentid').value;
var handbook= document.getElementById('handbook').value;
var energyfee= document.getElementById('energyfee').value;
var insurancefee= document.getElementById('insurancefee').value;
var organizationfee= document.getElementById('organizationfee').value;
var computerlab= document.getElementById('computerlab').value;
var sciencelab= document.getElementById('sciencelab').value;
var tlelab= document.getElementById('tlelab').value;
var schoolfee= document.getElementById('schoolfee').value;



var re = /^[\w-]+(\.[\w-]+)*([\w-]+\.)+[0-9]{2,7}$/;
if(tuition==""){
  document.getElementById('tui').innerHTML= "<span style ='color: red;' class='fa fa-hand-o-left'></span>";
      return false;
}else{
            if (!tuition.match(re)) {

                document.getElementById('message').innerHTML="<i style ='color: red;'>Tuition Fee cannot be empty. It contains amount.</i>";
                return false;  
            }else{
               document.getElementById('tui').innerHTML="<span style ='color: blue;' class='glyphicon glyphicon-ok'></span>";
            } 
}





//registration fee
if(registration==""){
      document.getElementById('reg').innerHTML= "<span style ='color: red;' class='fa fa-hand-o-left'></span>";
      return false;

}else{
            if (!registration.match(re)) {

                document.getElementById('message').innerHTML="<i style ='color: red;'>Registration Fee cannot be empty. It contains amount.</i>";
                return false;  
            }else{
              document.getElementById('reg').innerHTML="<span style ='color: blue;' class='glyphicon glyphicon-ok'></span>";
            } 
}


//registration fee
if(medical==""){
      document.getElementById('med').innerHTML= "<span style ='color: red;' class='fa fa-hand-o-left'></span>";
      return false;

}else{

            if (!medical.match(re)) {

                document.getElementById('message').innerHTML="<i style ='color: red;'>Medical Fee cannot be empty. It contains amount.</i>";
                return false;  
            }else{
                  document.getElementById('med').innerHTML="<span style ='color: blue;' class='glyphicon glyphicon-ok'></span>";
            }
}


//registration fee
if(library==""){
      document.getElementById('lib').innerHTML= "<span style ='color: red;' class='fa fa-hand-o-left'></span>";
      return false;

}else{
   
           if (!library.match(re)) {

                document.getElementById('message').innerHTML="<i style ='color: red;'>Library Fee cannot be empty. It contains amount.</i>";
                return false;  
            }else{
              document.getElementById('lib').innerHTML="<span style ='color: blue;' class='glyphicon glyphicon-ok'></span>";
            }
}

//registration fee
if(athletics==""){
      document.getElementById('ath').innerHTML= "<span style ='color: red;' class='fa fa-hand-o-left'></span>";
      return false;

}else{

            if (!athletics.match(re)) {

                document.getElementById('message').innerHTML="<i style ='color: red;'>Athletics Fee cannot be empty. It contains amount.</i>";
                return false;  
            }else{
                 document.getElementById('ath').innerHTML="<span style ='color: blue;' class='glyphicon glyphicon-ok'></span>";
            }
}

//registration fee
if(studentfee==""){
      document.getElementById('studfee').innerHTML= "<span style ='color: red;' class='fa fa-hand-o-left'></span>";
      return false;

}else{
    
            if (!studentfee.match(re)) {

                document.getElementById('message').innerHTML="<i style ='color: red;'>Student Fee cannot be empty. It contains amount.</i>";
                return false;  
            }else{
              document.getElementById('studfee').innerHTML="<span style ='color: blue;' class='glyphicon glyphicon-ok'></span>";
            }
}

//registration fee
if(prisaafee==""){
      document.getElementById('pri').innerHTML= "<span style ='color: red;' class='fa fa-hand-o-left'></span>";
      return false;

}else{
  
            if (!prisaafee.match(re)) {

                document.getElementById('message').innerHTML="<i style ='color: red;'>PRISAA Fee cannot be empty. It contains amount.</i>";
                return false;  
            }else{
               document.getElementById('pri').innerHTML="<span style ='color: blue;' class='glyphicon glyphicon-ok'></span>";
            }
}


//registration fee
if(bulprisafee==""){
      document.getElementById('bul').innerHTML= "<span style ='color: red;' class='fa fa-hand-o-left'></span>";
      return false;

}else{
  
            if (!bulprisafee.match(re)) {

                document.getElementById('message').innerHTML="<i style ='color: red;'>BULPRISA Fee cannot be empty. It contains amount.</i>";
                return false;  
            }else{
                document.getElementById('bul').innerHTML="<span style ='color: blue;' class='glyphicon glyphicon-ok'></span>";
            }
}


//registration fee
if(aprismfee==""){
      document.getElementById('apr').innerHTML= "<span style ='color: red;' class='fa fa-hand-o-left'></span>";
      return false;

}else{
   
            if (!aprismfee.match(re)) {

                document.getElementById('message').innerHTML="<i style ='color: red;'>APRISM Fee cannot be empty. It contains amount.</i>";
                return false;  
            }else{
                 document.getElementById('apr').innerHTML="<span style ='color: blue;' class='glyphicon glyphicon-ok'></span>";
            }
}

//registration fee
if(studentid==""){
      document.getElementById('studid').innerHTML= "<span style ='color: red;' class='fa fa-hand-o-left'></span>";
      return false;

}else{
    
          if (!studentid.match(re)) {

                document.getElementById('message').innerHTML="<i style ='color: red;'>Student ID Fee cannot be empty. It contains amount.</i>";
                return false;  
            }else{
              document.getElementById('studid').innerHTML="<span style ='color: blue;' class='glyphicon glyphicon-ok'></span>";
            }
}


//registration fee
if(handbook==""){
      document.getElementById('hand').innerHTML= "<span style ='color: red;' class='fa fa-hand-o-left'></span>";
      return false;

}else{
    
           if (!handbook.match(re)) {

                document.getElementById('message').innerHTML="<i style ='color: red;'>Handbook Fee cannot be empty. It contains amount.</i>";
                return false;  
            }else{
              document.getElementById('hand').innerHTML="<span style ='color: blue;' class='glyphicon glyphicon-ok'></span>";
            }
}



//registration fee
if(energyfee==""){
      document.getElementById('ener').innerHTML= "<span style ='color: red;' class='fa fa-hand-o-left'></span>";
      return false;

}else{
    

          if (!energyfee.match(re)) {

                document.getElementById('message').innerHTML="<i style ='color: red;'>Energy Fee cannot be empty. It contains amount.</i>";
                return false;  
            }else{
             document.getElementById('ener').innerHTML="<span style ='color: blue;' class='glyphicon glyphicon-ok'></span>";
            }
}


//registration fee
if(insurancefee==""){
      document.getElementById('insufee').innerHTML= "<span style ='color: red;' class='fa fa-hand-o-left'></span>";
      return false;

}else{
    

          if (!insurancefee.match(re)) {

                document.getElementById('message').innerHTML="<i style ='color: red;'>Insurance Fee cannot be empty. It contains amount.</i>";
                return false;  
            }else{
            document.getElementById('insufee').innerHTML="<span style ='color: blue;' class='glyphicon glyphicon-ok'></span>";
            }
}


//registration fee
if(organizationfee==""){
      document.getElementById('orgfee').innerHTML= "<span style ='color: red;' class='fa fa-hand-o-left'></span>";
      return false;

}else{
    
           if(!organizationfee.match(re)) {

                document.getElementById('message').innerHTML="<i style ='color: red;'>Organization Fee cannot be empty. It contains amount.</i>";
                return false;  
            }else{
            document.getElementById('orgfee').innerHTML="<span style ='color: blue;' class='glyphicon glyphicon-ok'></span>";
            }
}


//registration fee
if(computerlab==""){
      document.getElementById('comlab').innerHTML= "<span style ='color: red;' class='fa fa-hand-o-left'></span>";
      return false;

}else{
    
          if(!computerlab.match(re)) {

                document.getElementById('message').innerHTML="<i style ='color: red;'>Computer Laboratory Fee cannot be empty. It contains amount.</i>";
                return false;  
            }else{
            document.getElementById('comlab').innerHTML="<span style ='color: blue;' class='glyphicon glyphicon-ok'></span>";
            }
}



//registration fee
if(sciencelab==""){
      document.getElementById('scilab').innerHTML= "<span style ='color: red;' class='fa fa-hand-o-left'></span>";
      return false;

}else{
    
          if(!sciencelab.match(re)) {

                document.getElementById('message').innerHTML="<i style ='color: red;'>Science Laboratory Fee cannot be empty. It contains amount.</i>";
                return false;  
            }else{
            document.getElementById('scilab').innerHTML="<span style ='color: blue;' class='glyphicon glyphicon-ok'></span>";
            }
}

//registration fee
if(tlelab==""){
      document.getElementById('tlab').innerHTML= "<span style ='color: red;' class='fa fa-hand-o-left'></span>";
      return false;

}else{
   
          if(!tlelab.match(re)) {

                document.getElementById('message').innerHTML="<i style ='color: red;'>TLE Laboratory Fee cannot be empty. It contains amount.</i>";
                return false;  
            }else{
             document.getElementById('tlab').innerHTML="<span style ='color: blue;' class='glyphicon glyphicon-ok'></span>";
            }
}

//registration fee
if(schoolfee==""){
      document.getElementById('schofee').innerHTML= "<span style ='color: red;' class='fa fa-hand-o-left'></span>";
      return false;

}else{
    
          if(!schoolfee.match(re)) {

                document.getElementById('message').innerHTML="<i style ='color: red;'>School Fee cannot be empty. It contains amount.</i>";
                return false;  
            }else{
            document.getElementById('schofee').innerHTML="<span style ='color: blue;' class='glyphicon glyphicon-ok'></span>";
            }
}
}//End of function tuitionfee




        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        specialKeys.push(9); //Tab
        specialKeys.push(46); //Delete
        specialKeys.push(36); //Home
        specialKeys.push(35); //End
        specialKeys.push(37); //Left
        specialKeys.push(39); //Right


        function fortuition(e) {

            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                     //48 to 57 (Numbers), 
            var ret = ((keyCode >= 48 && keyCode <= 57) ||(specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;

        }

         function forregistration(e) {

            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                     //48 to 57 (Numbers), 
            var ret = ((keyCode >= 48 && keyCode <= 57) ||(specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;

        }

        function formedical(e) {

            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                     //48 to 57 (Numbers), 
            var ret = ((keyCode >= 48 && keyCode <= 57) ||(specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;

        }

        function forlibrary(e) {

            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                     //48 to 57 (Numbers), 
            var ret = ((keyCode >= 48 && keyCode <= 57) ||(specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;

        }

        function forathletics(e) {

            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                     //48 to 57 (Numbers), 
            var ret = ((keyCode >= 48 && keyCode <= 57) ||(specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;

        }

        function fortstudentfee(e) {

            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                     //48 to 57 (Numbers), 
            var ret = ((keyCode >= 48 && keyCode <= 57) ||(specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;

        }


        function forprisaa(e) {

            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                     //48 to 57 (Numbers), 
            var ret = ((keyCode >= 48 && keyCode <= 57) ||(specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;

        }

        function forbulprisa(e) {

            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                     //48 to 57 (Numbers), 
            var ret = ((keyCode >= 48 && keyCode <= 57) ||(specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;

        }

        function foraprism(e) {

            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                     //48 to 57 (Numbers), 
            var ret = ((keyCode >= 48 && keyCode <= 57) ||(specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;

        }

        function forstudentid(e) {

            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                     //48 to 57 (Numbers), 
            var ret = ((keyCode >= 48 && keyCode <= 57) ||(specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;

        }

        function forhandbook(e) {

            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                     //48 to 57 (Numbers), 
            var ret = ((keyCode >= 48 && keyCode <= 57) ||(specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;

        }

        function forenergy(e) {

            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                     //48 to 57 (Numbers), 
            var ret = ((keyCode >= 48 && keyCode <= 57) ||(specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;

        }

        function forinsurance(e) {

            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                     //48 to 57 (Numbers), 
            var ret = ((keyCode >= 48 && keyCode <= 57) ||(specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;

        }

        function fororgfee(e) {

            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                     //48 to 57 (Numbers), 
            var ret = ((keyCode >= 48 && keyCode <= 57) ||(specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;

        }

        function forcomlab(e) {

            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                     //48 to 57 (Numbers), 
            var ret = ((keyCode >= 48 && keyCode <= 57) ||(specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;

        }

        function forscilab(e) {

            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                     //48 to 57 (Numbers), 
            var ret = ((keyCode >= 48 && keyCode <= 57) ||(specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;

        }

        function fortlelab(e) {

            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                     //48 to 57 (Numbers), 
            var ret = ((keyCode >= 48 && keyCode <= 57) ||(specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;

        }

        function forschool(e) {

            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                     //48 to 57 (Numbers), 
            var ret = ((keyCode >= 48 && keyCode <= 57) ||(specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;

        }

</script>
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
        <li><a href="createaccounts.php"><i class="fa fa-plus"></i><span>Create acount</span> </a> </li>
        <li><a href="admission.php"><i class="fa fa-archive"></i><span>Admission</span> </a></li>
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
            <li class="active"><a href="breakdownoftuitionfees.php"><i class="fa fa-money"></i> Breakdown of tuition Fees</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>


<div class="container">
<?php if(isset($_GET['edit'])){
  $get_count=$_GET['edit'];
         ?> 
        <ul class="nav nav-tabs">
        <li><a href="breakdownoftuitionfees.php"><i class="fa fa-list"></i> Breakdown Of Tuition Fees</a>
        <li  class="active"><a href="#"><i class="fa fa-edit"></i> Edit</a>
        </li>                                                 
        </ul>
        <?php

  $tuition="SELECT * from tbl_tuition where id='$get_count'";
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
          ?>
          <form method="POST" onsubmit="return tuitionfee(event)" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
         



          <br>
          <div class="form-group">
           <i  id="error" style="color: Red; display: none"></i>
          <center><p  id='message'></p></center>
          </div>



          <div class="form-group">
          <div class="row">    
          <div class="col-md-2">
          </div>                        
          <div class="col-md-4">
          Tuition Fee: <i id='tui'></i> <input type='text' name='tuition' id='tuition' class='form-control' value='<?php echo $tfee ?>' onkeypress="return fortuition(event);" ondrop="return false;" onpaste="return false;" maxlength='10'/>
          </div>
          <div class="col-md-4">                                                      
          </div>         
          <div class="col-md-2">
          </div>                                           
          </div>
          </div>



          <div class="form-group">
          <div class="row">
          <div class="col-md-2">
          </div>                             
          <div class="col-md-4">
          Registration:   <i id='reg'></i> <input type='text' name='registration' id='registration' class='form-control' value='<?php echo $reg ?>'  onkeypress="return forregistration(event);" ondrop="return false;" onpaste="return false;" maxlength='10'/>
          </div>
          <div class="col-md-4">    
          Medical: <i id='med'></i><input type='text' name='medical' id='medical' class='form-control' value='<?php echo $med ?>'  onkeypress="return formedical(event);" ondrop="return false;" onpaste="return false;" maxlength='10'/>                                                 
          </div>   
          <div class="col-md-2">
          </div>                                                  
          </div>
          </div>



          <div class="form-group">
          <div class="row">         
          <div class="col-md-2">
          </div>                    
          <div class="col-md-4">
          Library: <i id='lib'></i><input type='text' name='library' id='library' class='form-control' value='<?php echo $lib ?>'  onkeypress="return forlibrary(event);" ondrop="return false;" onpaste="return false;" maxlength='10'/>
          </div>
          <div class="col-md-4">    
          Athletics: <i id='ath'></i><input type='text' name='athletics' id='athletics' class='form-control' value='<?php echo $ath ?>'  onkeypress="return forathletics(event);" ondrop="return false;" onpaste="return false;" maxlength='10'/>                                               
          </div>                 
          <div class="col-md-2">
          </div>                                    
          </div>
          </div>

           <div class="form-group">
          <div class="row">   
          <div class="col-md-2">
          </div>                          
          <div class="col-md-4">
          Student Government Fee: <i id='studfee'></i><input type='text' name='studentfee' id='studentfee' class='form-control' value='<?php echo $sgf ?>'  onkeypress="return fortstudentfee(event);" ondrop="return false;" onpaste="return false;" maxlength='10'/>
          </div>
          <div class="col-md-4">    
          PRISAA Fee:   <i id='pri'></i><input type='text' name='prisaafee' id='prisaafee' class='form-control' value='<?php echo $pris ?>'  onkeypress="return forprisaa(event);" ondrop="return false;" onpaste="return false;" maxlength='10'/>                                              
          </div>   
          <div class="col-md-2">
          </div>                                                  
          </div>
          </div>


           <div class="form-group">
          <div class="row"> 
          <div class="col-md-2">
          </div>                            
          <div class="col-md-4">
          BULPRISA Fee:    <i id='bul'></i><input type='text' name='bulprisafee' id='bulprisafee' class='form-control' value='<?php echo $bulp ?>'  onkeypress="return forbulprisa(event);" ondrop="return false;" onpaste="return false;" maxlength='10'/>
          </div>
          <div class="col-md-4">    
          APRISM Fee:   <i id='apr'></i><input type='text' name='aprismfee' id='aprismfee' class='form-control' value='<?php echo $apri ?>'  onkeypress="return foraprism(event);" ondrop="return false;" onpaste="return false;" maxlength='10'/>                                              
          </div>   
          <div class="col-md-2">
          </div>                                                  
          </div>
          </div>

          <div class="form-group">
          <div class="row"> 
          <div class="col-md-2">
          </div>                            
          <div class="col-md-4">
          ID:   <i id='studid'></i><input type='text' name='studentid' id='studentid' class='form-control' value='<?php echo $studid ?>'  onkeypress="return forstudentid(event);" ondrop="return false;" onpaste="return false;" maxlength='10'/>
          </div>
          <div class="col-md-4">    
          Handbook:   <i id='hand'></i><input type='text' name='handbook' id='handbook' class='form-control' value='<?php echo $hand ?>'  onkeypress="return forhandbook(event);" ondrop="return false;" onpaste="return false;" maxlength='10'/>                                           
          </div>          
          <div class="col-md-2">
          </div>                                           
          </div>
          </div>

          <div class="form-group">
          <div class="row">   
          <div class="col-md-2">
          </div>                          
          <div class="col-md-4">
          Energy Fee:   <i id='ener'></i><input type='text' name='energyfee' id='energyfee' class='form-control' value='<?php echo $ener ?>'  onkeypress="return forenergy(event);" ondrop="return false;" onpaste="return false;" maxlength='10'/>
          </div>
          <div class="col-md-4">    
          Insurance Fee:  <i id='insufee'></i><input type='text' name='insurancefee' id='insurancefee' class='form-control' value='<?php echo $insu ?>'  onkeypress="return forinsurance(event);" ondrop="return false;" onpaste="return false;" maxlength='10'/>                                        
          </div>   
          <div class="col-md-2">
          </div>                                                  
          </div>
          </div>

           <div class="form-group">
          <div class="row"> 
          <div class="col-md-2">
          </div>                            
          <div class="col-md-4">
          Organization Fee:  <i id='orgfee'></i> <input type='text' name='organizationfee' id='organizationfee' class='form-control' value='<?php echo $orgfee ?>'  onkeypress="return fororgfee(event);" ondrop="return false;" onpaste="return false;" maxlength='10'/>
          </div>
          <div class="col-md-4">    
                                           
          </div>                 
          <div class="col-md-2">
          </div>                                    
          </div>
          </div>


           <div class="form-group">
          <div class="row">     
          <div class="col-md-2">
          </div>                        
          <div class="col-md-4">
          Computer Laboratory:   <i id='comlab'></i><input type='text' name='computerlab' id='computerlab' class='form-control' value='<?php echo $comlab ?>'  onkeypress="return forcomlab(event);" ondrop="return false;" onpaste="return false;" maxlength='10'/>
          </div>
          <div class="col-md-4">    
          Science Laboratory:  <i id='scilab'></i> <input type='text' name='sciencelab' id='sciencelab' class='form-control' value='<?php echo $scilab ?>'  onkeypress="return forscilab(event);" ondrop="return false;" onpaste="return false;" maxlength='10'/>                               
          </div>       
          <div class="col-md-2">
          </div>                                              
          </div>
          </div>

           <div class="form-group">
          <div class="row">   
          <div class="col-md-2">
          </div>                          
          <div class="col-md-4">
          TLE Laboratory:  <i id='tlab'></i><input type='text' name='tlelab' id='tlelab' class='form-control' value='<?php echo $tlelab ?>'  onkeypress="return fortlelab(event);" ondrop="return false;" onpaste="return false;" maxlength='10'/>
          </div>
          <div class="col-md-4">    
                                    
          </div>     
          <div class="col-md-2">
          </div>                                                
          </div>
          </div>

           <div class="form-group">
          <div class="row">   
          <div class="col-md-2">
          </div>                          
          <div class="col-md-4">
           School Activities Fee: <i id='schofee'></i><input type='text' name='schoolfee' id='schoolfee' class='form-control' value='<?php echo $saf ?>'  onkeypress="return forschool(event);" ondrop="return false;" onpaste="return false;" maxlength='10'/>   
          </div>
          <div class="col-md-4">    
                                     
          </div>                    
          <div class="col-md-2">
          </div>                                 
          </div>
          </div>

            <div class="form-group">
          <div class="row">   
          <div class="col-md-2">
          </div>                          
          <div class="col-md-4">
 
          </div>
          <div class="col-md-4">    
           TUITION FEE- <p style="color: white; background-color: green; text-align: center;"><?php echo $tfee ?></p>                      
          </div>                    
          <div class="col-md-2">
          </div>                                 
          </div>
          </div>

          <div class="form-group">
          <div class="row">   
          <div class="col-md-2">
          </div>                          
          <div class="col-md-4">
 
          </div>
          <div class="col-md-4">    
          MISC. FEE & Other-  <p style="color: white; background-color: green; text-align: center;"><?php echo $total_misc ?></p>                   
          </div>                    
          <div class="col-md-2">
          </div>                                 
          </div>
          </div>

          <div class="form-group">
          <div class="row">   
          <div class="col-md-2">
          </div>                          
          <div class="col-md-4">
 
          </div>
          <div class="col-md-4">    
          Total-  <p style="color: white; background-color: green; text-align: center;"><?php echo $total ?></p>                     
          </div>                    
          <div class="col-md-2">
          </div>                                 
          </div>
          </div>

          <div class="form-group">
          <div class="row">   
          <div class="col-md-2">
          </div>                          
          <div class="col-md-4">
 
          </div>
          <div class="col-md-4">    
          <button type='submit' id='next' name='updatetuitionfees'>Update</button>                     
          </div>                    
          <div class="col-md-2">
          </div>                                 
          </div>
          </div>

          <input type='hidden' name='id' value='<?php echo $get_count ?>'>
          </form>
          <?php


  }else{?>




<?php
?>
<ul class="nav nav-tabs">
  <li class="active"><a href="#"><i class="fa fa-list"></i> Breakdown Of Tuition Fees</a></li>
  <li><a href="breakdownoftuitionfees.php?edit=<?php echo $tuition_id?>"><i class="fa fa-edit"></i> Edit</a>
  </li>                                                 
</ul>
<?php

$tuition="SELECT * from tbl_tuition";
$tuition_result= mysql_query($tuition);


if(mysql_num_rows($tuition_result)>=0){
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
}
      ?>  
          <br>
          <div class="form-group">
          <div class="row">    
          <div class="col-md-2">
          </div>                        
          <div class="col-md-4">
          Tuition Fee:    <p style="color: white; background-color: blue; text-align: center;"><?php echo $tfee ?></p>
          </div>
          <div class="col-md-4">                                                      
          </div>         
          <div class="col-md-2">
          </div>                                           
          </div>
          </div>

          <div class="form-group">
          <div class="row">
          <div class="col-md-2">
          </div>                             
          <div class="col-md-4">
          Registration: <p style="color: white; background-color: blue; text-align: center;"><?php echo $reg ?></p>
          </div>
          <div class="col-md-4">    
          Medical:    <p style="color: white; background-color: blue; text-align: center;"><?php echo $med ?></p>                                                 
          </div>   
          <div class="col-md-2">
          </div>                                                  
          </div>
          </div>

          <div class="form-group">
          <div class="row">         
          <div class="col-md-2">
          </div>                    
          <div class="col-md-4">
          Library: <p style="color: white; background-color: blue; text-align: center;"><?php echo $lib ?></p>
          </div>
          <div class="col-md-4">    
          Athletics:    <p style="color: white; background-color: blue; text-align: center;"><?php echo $ath ?></p>                                               
          </div>                 
          <div class="col-md-2">
          </div>                                    
          </div>
          </div>

           <div class="form-group">
          <div class="row">   
          <div class="col-md-2">
          </div>                          
          <div class="col-md-4">
          Student Government Fee: <p style="color: white; background-color: blue; text-align: center;"><?php echo $sgf ?></p>
          </div>
          <div class="col-md-4">    
          PRISAA Fee:    <p style="color: white; background-color: blue; text-align: center;"><?php echo $pris ?></p>                                              
          </div>   
          <div class="col-md-2">
          </div>                                                  
          </div>
          </div>


           <div class="form-group">
          <div class="row"> 
          <div class="col-md-2">
          </div>                            
          <div class="col-md-4">
          BULPRISA Fee: <p style="color: white; background-color: blue; text-align: center;"><?php echo $bulp ?></p>
          </div>
          <div class="col-md-4">    
          APRISM Fee:    <p style="color: white; background-color: blue; text-align: center;"><?php echo $apri ?></p>                                              
          </div>   
          <div class="col-md-2">
          </div>                                                  
          </div>
          </div>

          <div class="form-group">
          <div class="row"> 
          <div class="col-md-2">
          </div>                            
          <div class="col-md-4">
          ID: <p style="color: white; background-color: blue; text-align: center;"><?php echo $studid ?></p>
          </div>
          <div class="col-md-4">    
          Handbook:    <p style="color: white; background-color: blue; text-align: center;"><?php echo $hand ?></p>                                           
          </div>          
          <div class="col-md-2">
          </div>                                           
          </div>
          </div>

          <div class="form-group">
          <div class="row">   
          <div class="col-md-2">
          </div>                          
          <div class="col-md-4">
          Energy Fee:  <p style="color: white; background-color: blue; text-align: center;"><?php echo $ener ?></p>
          </div>
          <div class="col-md-4">    
          Insurance Fee:     <p style="color: white; background-color: blue; text-align: center;"><?php echo $insu ?></p>                                        
          </div>   
          <div class="col-md-2">
          </div>                                                  
          </div>
          </div>

           <div class="form-group">
          <div class="row"> 
          <div class="col-md-2">
          </div>                            
          <div class="col-md-4">
          Organization Fee:  <p style="color: white; background-color: blue; text-align: center;"><?php echo $orgfee ?></p>
          </div>
          <div class="col-md-4">    
                                           
          </div>                 
          <div class="col-md-2">
          </div>                                    
          </div>
          </div>


           <div class="form-group">
          <div class="row">     
          <div class="col-md-2">
          </div>                        
          <div class="col-md-4">
          Computer Laboratory:  <p style="color: white; background-color: blue; text-align: center;"><?php echo $comlab ?></p>
          </div>
          <div class="col-md-4">    
          Science Laboratory:    <p style="color: white; background-color: blue; text-align: center;"><?php echo $scilab ?></p>                               
          </div>       
          <div class="col-md-2">
          </div>                                              
          </div>
          </div>

           <div class="form-group">
          <div class="row">   
          <div class="col-md-2">
          </div>                          
          <div class="col-md-4">
          TLE Laboratory:  <p style="color: white; background-color: blue; text-align: center;"><?php echo $tlelab ?></p>
          </div>
          <div class="col-md-4">    
                                    
          </div>     
          <div class="col-md-2">
          </div>                                                
          </div>
          </div>

           <div class="form-group">
          <div class="row">   
          <div class="col-md-2">
          </div>                          
          <div class="col-md-4">
           School Activities Fee:     <p style="color: white; background-color: blue; text-align: center;"><?php echo $saf ?></p> 
          </div>
          <div class="col-md-4">    
                                     
          </div>                    
          <div class="col-md-2">
          </div>                                 
          </div>
          </div>
    

           <div class="form-group">
          <div class="row">   
          <div class="col-md-2">
          </div>                          
          <div class="col-md-4">
 
          </div>
          <div class="col-md-4">    
           TUITION FEE- <p style="color: white; background-color: green; text-align: center;"><?php echo $tfee ?></p>                      
          </div>                    
          <div class="col-md-2">
          </div>                                 
          </div>
          </div>

          <div class="form-group">
          <div class="row">   
          <div class="col-md-2">
          </div>                          
          <div class="col-md-4">
 
          </div>
          <div class="col-md-4">    
          MISC. FEE & Other-  <p style="color: white; background-color: green; text-align: center;"><?php echo $total_misc ?></p>                   
          </div>                    
          <div class="col-md-2">
          </div>                                 
          </div>
          </div>

          <div class="form-group">
          <div class="row">   
          <div class="col-md-2">
          </div>                          
          <div class="col-md-4">
 
          </div>
          <div class="col-md-4">    
          Total-  <p style="color: white; background-color: green; text-align: center;"><?php echo $total ?></p>                     
          </div>                    
          <div class="col-md-2">
          </div>                                 
          </div>
          </div>
                                   
      <?php
 }
?>

</div>
                                 



    
      


</body>
</html>
<?php }?>
                



