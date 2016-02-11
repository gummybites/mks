<?php 
include('config.php');

session_start();

if(!isset($_SESSION['id'])){
header('Location: registrarlogin.php');
exit;
}else{



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



if(isset($_POST['update'])){
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



header("Location: tuitionfees.php?edit=$id?success");
}
?>



<!DOCTYPE html>
<html>
<title>
Tuition Inquiry
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

#footer{
  margin-top: 380px;

}

 #span-addon{
                      border-left: none;
                       background-color: #fff;
                       border-color: #d9edf7;
                    }

#tuition{
                      border-right: none;
                      box-shadow: none;
                      border-color: #d9edf7;
                    }
#registration{
                      border-right: none;
                      box-shadow: none;
                      border-color: #d9edf7;
                    }

                    #medical{
                      border-right: none;
                      box-shadow: none;
                      border-color: #d9edf7;
                    }

                    #library{
                      border-right: none;
                      box-shadow: none;
                      border-color: #d9edf7;
                    }

                    #athletics{
                      border-right: none;
                      box-shadow: none;
                      border-color: #d9edf7;
                    }

                    #studentfee{
                      border-right: none;
                      box-shadow: none;
                      border-color: #d9edf7;
                    }

                    #prisaafee{
                      border-right: none;
                      box-shadow: none;
                      border-color: #d9edf7;
                    }

                    #bulprisafee{
                      border-right: none;
                      box-shadow: none;
                      border-color: #d9edf7;
                    }

                    #aprismfee{
                      border-right: none;
                      box-shadow: none;
                      border-color: #d9edf7;
                    }

                    #studentid{
                      border-right: none;
                      box-shadow: none;
                      border-color: #d9edf7;
                    }

                    #handbook{
                      border-right: none;
                      box-shadow: none;
                      border-color: #d9edf7;
                    }

                    #energyfee{
                      border-right: none;
                      box-shadow: none;
                      border-color: #d9edf7;
                    }

                    #insurancefee{
                      border-right: none;
                      box-shadow: none;
                      border-color: #d9edf7;
                    }

                    #organizationfee{
                      border-right: none;
                      box-shadow: none;
                      border-color: #d9edf7;
                    }

                    #computerlab{
                      border-right: none;
                      box-shadow: none;
                      border-color: #d9edf7;
                    }

                    #sciencelab{
                      border-right: none;
                      box-shadow: none;
                      border-color: #d9edf7;
                    }

                    #tlelab{
                      border-right: none;
                      box-shadow: none;
                      border-color: #d9edf7;
                    }

                    #schoolfee{
                      border-right: none;
                      box-shadow: none;
                      border-color: #d9edf7;
                    }

                    .btn-primary{
                      border-radius: 0px;
                    }




</style>

</head>

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

//tuition fee
if(tuition==""){
      document.getElementById('tui').innerHTML= "<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
      return false;

}else{
    document.getElementById('tui').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
}


//registration fee
if(registration==""){
      document.getElementById('reg').innerHTML= "<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
      return false;

}else{
    document.getElementById('reg').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
}


//registration fee
if(medical==""){
      document.getElementById('med').innerHTML= "<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
      return false;

}else{
    document.getElementById('med').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
}


//registration fee
if(library==""){
      document.getElementById('lib').innerHTML= "<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
      return false;

}else{
    document.getElementById('lib').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
}

//registration fee
if(athletics==""){
      document.getElementById('ath').innerHTML= "<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
      return false;

}else{
    document.getElementById('ath').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
}

//registration fee
if(studentfee==""){
      document.getElementById('studfee').innerHTML= "<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
      return false;

}else{
    document.getElementById('studfee').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
}

//registration fee
if(prisaafee==""){
      document.getElementById('pri').innerHTML= "<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
      return false;

}else{
    document.getElementById('pri').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
}


//registration fee
if(bulprisafee==""){
      document.getElementById('bul').innerHTML= "<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
      return false;

}else{
    document.getElementById('bul').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
}


//registration fee
if(aprismfee==""){
      document.getElementById('apr').innerHTML= "<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
      return false;

}else{
    document.getElementById('apr').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
}

//registration fee
if(studentid==""){
      document.getElementById('studid').innerHTML= "<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
      return false;

}else{
    document.getElementById('studid').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
}


//registration fee
if(handbook==""){
      document.getElementById('hand').innerHTML= "<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
      return false;

}else{
    document.getElementById('hand').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
}



//registration fee
if(energyfee==""){
      document.getElementById('ener').innerHTML= "<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
      return false;

}else{
    document.getElementById('ener').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
}


//registration fee
if(insurancefee==""){
      document.getElementById('insufee').innerHTML= "<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
      return false;

}else{
    document.getElementById('insufee').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
}


//registration fee
if(organizationfee==""){
      document.getElementById('orgfee').innerHTML= "<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
      return false;

}else{
    document.getElementById('orgfee').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
}


//registration fee
if(computerlab==""){
      document.getElementById('comlab').innerHTML= "<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
      return false;

}else{
    document.getElementById('comlab').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
}



//registration fee
if(sciencelab==""){
      document.getElementById('scilab').innerHTML= "<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
      return false;

}else{
    document.getElementById('scilab').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
}

//registration fee
if(tlelab==""){
      document.getElementById('tlab').innerHTML= "<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
      return false;

}else{
    document.getElementById('tlab').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
}

//registration fee
if(schoolfee==""){
      document.getElementById('schofee').innerHTML= "<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
      return false;

}else{
    document.getElementById('schofee').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
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




<nav id='menu' class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
        Administrator
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
      <div class="col-md-2 col-xs-2 sidebar">
        <div class="row">
  <!-- uncomment code for absolute positioning tweek see top comment in css -->
  <div class="absolute-wrapper"> </div>
  <!-- Menu -->
  <div class="side-menu">
    <nav class="navbar navbar-default" role="navigation">
      <!-- Main Menu -->
      <div class="side-menu-container">
        <ul class="nav navbar-nav">
          
          <li><a href="registrar.php"><span class="glyphicon glyphicon-"></span> Home</a></li>
          <!-- Dropdown-->
          <li  id="dropdown">
            <a data-toggle="collapse" href="#dropdown-lvl1">
              <span class="glyphicon glyphicon-"></span> Inquiry <span class="caret"></span>
            </a>

            <!-- Dropdown level 1 -->
            <div id="dropdown-lvl1" class="panel-collapse collapse-in">
              <div class="panel-body">
                <ul class="nav navbar-nav">
                  <li class='active'><a><span class="glyphicon glyphicon-"></span> Tuition</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-"></span> Permit</a></li>
                  <li><a href="requirements1.php">Requirements</a></li>
                  


                  
                </ul>
              </div>
            </div>
          </li>

          <li  id="dropdown">
                  <a data-toggle="collapse" href="#dropdown-lvl2">
                    <span class="glyphicon glyphicon-"></span> STUDENTS <span class="caret"></span>
                  </a>

                  <!-- Dropdown level 1 -->
                  <div id="dropdown-lvl2" class="panel-collapse collapse">
                    <div class="panel-body">
                      <ul class="nav navbar-nav">
                        <li><a href="prospectivestudents.php"><span class="glyphicon glyphicon-"></span> Create Account</a></li>
                        <li><a href="newstudentdetails.php"><span class="glyphicon glyphicon-"></span> Student Admission</a></li>                        
                      </ul>
                    </div>
                  </div>


                   <a data-toggle="collapse" href="#dropdown-lvl3">
                    <span class="glyphicon glyphicon-"></span> TEACHERS <span class="caret"></span>
                  </a>

                  <!-- Dropdown level 1 -->
                  <div id="dropdown-lvl3" class="panel-collapse collapse">
                    <div class="panel-body">
                      <ul class="nav navbar-nav">
                        <li><a href="#"><span class="glyphicon glyphicon-"></span> Create Account</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-"></span> Teacher Admission</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-"></span> Teacher Details</a></li>                       
                      </ul>
                    </div>
                  </div>
                </li>
          


          

          <li><a href="subjects.php"><span class="glyphicon glyphicon-"></span> Subjects</a></li>
    

        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>

  </div>
</div></div>

      <div class="col-md-10 col-xs-10 content">
      
     
              <p class="hr-warning" ></p>
                <ol class="breadcrumb bread-warning">
                  <li><a href='tuition.php'>Prospective</a></li>
                  <li ><a href='tuitionfortransferee.php'>Transferee</a></li>
                   <li class='active'><img src='Money.png' width='50px' height="30px"></li>

                </ol>


                <form  onsubmit="return tuitionfee(event)" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  id='form' class='col-md-12 col-xs-12' method="POST">
                <i  id="error" style="color: Red; display: none"></i>
                 <p  id='message'></p>  












                   <?php if(!isset($_GET['edit'])){


                  ?>


                   <a href='?edit=<?php echo $id ?>' class='pull-right'>Edit</a>

                   <h4>TUITION FEE</h4>
                   <div class='row'>

                   <div class='col-md-2'>
                     <i>Tuition fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class="input-group input-group-md">
                   <?php echo $tfee ?>

                   </div></div></div>



                   <h4>MISCELLANEOUS FEE</h4>
                   <div class='row'>

                   <!--Registration -->
                   <div class='col-md-2'>
                      <i>Registration:  </i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $reg ?>

                   </div></div>

                    <!--Medical -->
                   <div class='col-md-2'>
                      <i>Medical/Dental:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $med ?>
                   </div></div>
                   </div>
                   <br> 

                 

         
                    
             

                 
                    <div class='row'>
                       <!--Medical -->
                   <div class='col-md-2'>
                      <i>Library:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                  <?php echo $lib ?>
                   </div></div>

                    <!--Athletics -->
                    <div class='col-md-2'>
                      <i>Athletics:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $ath ?>
                   </div></div>
                   </div>
                   <br>

                  
                   
                    <div class='row'>
                       <!--Student Government Fee -->
                   <div class='col-md-2'>
                      <i>Student Government Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                  <?php echo $sgf ?>
                   </div></div>

                    <!--PRISAA Fee-->
                    <div class='col-md-2'>
                      <i>PRISAA Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $pris ?>
                   </div></div>
                   </div>
                   <br>


                    <div class='row'>
                       <!--BULPRISA Fee -->
                   <div class='col-md-2'>
                      <i>BULPRISA Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $bulp ?>
                   </div></div>

                    <!--APRISM Fee-->
                    <div class='col-md-2'>
                      <i>APRISM Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $apri ?>
                   </div></div>
                   </div>
                   <br>
                    


                    <div class='row'>
                       <!--ID -->
                   <div class='col-md-2'>
                      <i>ID:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $studid ?>
                   </div></div>

                    <!--Handbook-->
                    <div class='col-md-2'>
                      <i>Handbook:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $hand ?>
                   </div></div>
                   </div>
                   <br>  



                   <div class='row'>
                       <!--Energy Fee -->
                   <div class='col-md-2'>
                      <i>Energy Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $ener ?>
                   </div></div>

                    <!--Insurance Fee-->
                    <div class='col-md-2'>
                      <i>Insurance Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $insu ?>
                   </div></div>
                   </div>
                   <br>

                   <div class='row'>
                       <!--Energy Fee -->
                   <div class='col-md-2'>
                      <i>Organization Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $orgfee ?>
                   </div></div>
                   </div>
                   <br>



                   <div class='row'>
                       <!--Laboratory -->
                   <div class='col-md-2'>
                      <i>Laboratory:</i>
                   </div>
                   </div>
                   <br>

                   <div class='row'>
                       <!--Computer Laboratory -->
                   <div class='col-md-2'>
                      <i>Computer Laboratory:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                   <?php echo $comlab ?>
                   </div></div>

                    <!--Science Laboratory-->
                    <div class='col-md-2'>
                      <i>Science Laboratory:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $scilab ?>
                   </div></div>
                   </div>
                   <br>


                   <div class='row'>
                       <!--TLE Laboratory -->
                   <div class='col-md-2'>
                      <i>TLE Laboratory:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $tlelab ?>
                   </div></div>
                   </div>
                   <br>

                   <h4>OTHER</h4>
                    <div class='row'>
                       <!--School Activities Fee-->
                   <div class='col-md-2'>
                      <i>School Activities Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <?php echo $saf ?>
                   </div></div>
                   </div>
                   <br>
                   <hr>


                   <div class='row'>
                   <div class='col-md-2'>
                   </div>
                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                   </div></div>
                   <div class='col-md-6'>
                   <div class='input-group input-group-md'>
                   <h4>TUITION FEE- <?php echo $tfee ?> </h4>
                   </div></div>
                   </div>


                   <div class='row'>
                   <div class='col-md-2'>
                   </div>
                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                   </div></div>
                   <div class='col-md-6'>
                   <div class='input-group input-group-md'>
                   <h4>MISC. FEE & Other- <?php echo $total_misc ?> </h4>
                   </div></div>
                   </div>


                
                   <div class='row'>
                   <div class='col-md-2'>
                   </div>
                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                   </div></div>
                   <div class='col-md-6'>
                   <div class='input-group input-group-md'>
                   <h4>Total- <?php echo $total ?> </h4>
                   </div></div>
                   </div>


                

                   <?php

                     }else{


                   ?>
                   <a href='tuitionfees.php'>Back</a>
                   <h4>TUITION FEE</h4>
                   <div class='row'>

                   <div class='col-md-2'>
                     <i>Tuition fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class="input-group input-group-md">
                   <input type='text' name='tuition' id='tuition' class='form-control' value='<?php echo $tfee ?>' onkeypress="return fortuition(event);" ondrop="return false;" onpaste="return false;"/>
                   <span id='span-addon' class='input-group-addon'>
                   <i id='tui'></i>
                   </span>
                   </div></div></div>



                   <h4>MISCELLANEOUS FEE</h4>
                   <div class='row'>

                   <!--Registration -->
                   <div class='col-md-2'>
                      <i>Registration:  </i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='registration' id='registration' class='form-control' value='<?php echo $reg ?>'  onkeypress="return forregistration(event);" ondrop="return false;" onpaste="return false;"/>
                    <span id='span-addon' class='input-group-addon'>
                    <i id='reg'></i>
                   </span>
                   </div></div>

                    <!--Medical -->
                   <div class='col-md-2'>
                      <i>Medical/Dental:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='medical' id='medical' class='form-control' value='<?php echo $med ?>'  onkeypress="return formedical(event);" ondrop="return false;" onpaste="return false;"/>
                    <span id='span-addon' class='input-group-addon'>
                    <i id='med'></i>
                   </span>
                   </div></div>
                   </div>
                   <br> 

                 

         
                    
             

                 
                    <div class='row'>
                       <!--Medical -->
                   <div class='col-md-2'>
                      <i>Library:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='library' id='library' class='form-control' value='<?php echo $lib ?>'  onkeypress="return forlibrary(event);" ondrop="return false;" onpaste="return false;"/>
                    <span id='span-addon' class='input-group-addon'>
                    <i id='lib'></i>
                   </span>
                   </div></div>

                    <!--Athletics -->
                    <div class='col-md-2'>
                      <i>Athletics:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='athletics' id='athletics' class='form-control' value='<?php echo $ath ?>'  onkeypress="return forathletics(event);" ondrop="return false;" onpaste="return false;"/>
                    <span id='span-addon' class='input-group-addon'>
                    <i id='ath'></i>
                   </span>
                   </div></div>
                   </div>
                   <br>

                  
                   
                    <div class='row'>
                       <!--Student Government Fee -->
                   <div class='col-md-2'>
                      <i>Student Government Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='studentfee' id='studentfee' class='form-control' value='<?php echo $sgf ?>'  onkeypress="return fortstudentfee(event);" ondrop="return false;" onpaste="return false;"/>
                    <span id='span-addon' class='input-group-addon'>
                    <i id='studfee'></i>
                   </span>
                   </div></div>

                    <!--PRISAA Fee-->
                    <div class='col-md-2'>
                      <i>PRISAA Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='prisaafee' id='prisaafee' class='form-control' value='<?php echo $pris ?>'  onkeypress="return forprisaa(event);" ondrop="return false;" onpaste="return false;"/>
                    <span id='span-addon' class='input-group-addon'>
                    <i id='pri'></i>
                   </span>
                   </div></div>
                   </div>
                   <br>


                    <div class='row'>
                       <!--BULPRISA Fee -->
                   <div class='col-md-2'>
                      <i>BULPRISA Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='bulprisafee' id='bulprisafee' class='form-control' value='<?php echo $bulp ?>'  onkeypress="return forbulprisa(event);" ondrop="return false;" onpaste="return false;"/>
                    <span id='span-addon' class='input-group-addon'>
                    <i id='bul'></i>
                   </span>
                   </div></div>

                    <!--APRISM Fee-->
                    <div class='col-md-2'>
                      <i>APRISM Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='aprismfee' id='aprismfee' class='form-control' value='<?php echo $apri ?>'  onkeypress="return foraprism(event);" ondrop="return false;" onpaste="return false;"/>
                    <span id='span-addon' class='input-group-addon'>
                    <i id='apr'></i>
                   </span>  
                   </div></div>
                   </div>
                   <br>
                    


                    <div class='row'>
                       <!--ID -->
                   <div class='col-md-2'>
                      <i>ID:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='studentid' id='studentid' class='form-control' value='<?php echo $studid ?>'  onkeypress="return forstudentid(event);" ondrop="return false;" onpaste="return false;"/>
                    <span id='span-addon' class='input-group-addon'>
                    <i id='studid'></i>
                   </span>
                   </div></div>

                    <!--Handbook-->
                    <div class='col-md-2'>
                      <i>Handbook:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='handbook' id='handbook' class='form-control' value='<?php echo $hand ?>'  onkeypress="return forhandbook(event);" ondrop="return false;" onpaste="return false;"/>
                    <span id='span-addon' class='input-group-addon'>
                    <i id='hand'></i>
                   </span>
                   </div></div>
                   </div>
                   <br>  



                   <div class='row'>
                       <!--Energy Fee -->
                   <div class='col-md-2'>
                      <i>Energy Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='energyfee' id='energyfee' class='form-control' value='<?php echo $ener ?>'  onkeypress="return forenergy(event);" ondrop="return false;" onpaste="return false;"/>
                    <span id='span-addon' class='input-group-addon'>
                    <i id='ener'></i>
                   </span>
                   </div></div>

                    <!--Insurance Fee-->
                    <div class='col-md-2'>
                      <i>Insurance Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='insurancefee' id='insurancefee' class='form-control' value='<?php echo $insu ?>'  onkeypress="return forinsurance(event);" ondrop="return false;" onpaste="return false;"/>
                    <span id='span-addon' class='input-group-addon'>
                    <i id='insufee'></i>
                   </span>
                   </div></div>
                   </div>
                   <br>

                   <div class='row'>
                       <!--Energy Fee -->
                   <div class='col-md-2'>
                      <i>Organization Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='organizationfee' id='organizationfee' class='form-control' value='<?php echo $orgfee ?>'  onkeypress="return fororgfee(event);" ondrop="return false;" onpaste="return false;"/>
                    <span id='span-addon' class='input-group-addon'>
                    <i id='orgfee'></i>
                   </span>
                   </div></div>
                   </div>
                   <br>



                   <div class='row'>
                       <!--Laboratory -->
                   <div class='col-md-2'>
                      <i>Laboratory:</i>
                   </div>
                   </div>
                   <br>

                   <div class='row'>
                       <!--Computer Laboratory -->
                   <div class='col-md-2'>
                      <i>Computer Laboratory:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='computerlab' id='computerlab' class='form-control' value='<?php echo $comlab ?>'  onkeypress="return forcomlab(event);" ondrop="return false;" onpaste="return false;"/>
                    <span id='span-addon' class='input-group-addon'>
                    <i id='comlab'></i>
                   </span>
                   </div></div>

                    <!--Science Laboratory-->
                    <div class='col-md-2'>
                      <i>Science Laboratory:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='sciencelab' id='sciencelab' class='form-control' value='<?php echo $scilab ?>'  onkeypress="return forscilab(event);" ondrop="return false;" onpaste="return false;"/>
                    <span id='span-addon' class='input-group-addon'>
                    <i id='scilab'></i>
                   </span>
                   </div></div>
                   </div>
                   <br>


                   <div class='row'>
                       <!--TLE Laboratory -->
                   <div class='col-md-2'>
                      <i>TLE Laboratory:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='tlelab' id='tlelab' class='form-control' value='<?php echo $tlelab ?>'  onkeypress="return fortlelab(event);" ondrop="return false;" onpaste="return false;"/>
                    <span id='span-addon' class='input-group-addon'>
                    <i id='tlab'></i>
                   </span>
                   </div></div>
                   </div>
                   <br>

                   <h4>OTHER</h4>
                    <div class='row'>
                       <!--School Activities Fee-->
                   <div class='col-md-2'>
                      <i>School Activities Fee:</i>
                   </div>

                   <div class='col-md-4'>
                   <div class='input-group input-group-md'>
                    <input type='text' name='schoolfee' id='schoolfee' class='form-control' value='<?php echo $saf ?>'  onkeypress="return forschool(event);" ondrop="return false;" onpaste="return false;"/>
                    <span id='span-addon' class='input-group-addon'>
                    <i id='schofee'></i>
                   </span>
                   </div></div>
                   </div>
                   <br>




                   <div class='row'>
                   <div class='col-md-2'>
                   </div>

                   <div class='col-md-4'>
                   </div>

                    <div class='col-md-2'>
                   </div>

                   <div class='col-md-4'>
                   <button type='submit' class='btn btn-primary' name='update'>Update</button>
                   </div>
                   </div>
                   <br>

                   <input type='hidden' name='id' value='<?php echo $id ?>'>
                   

                   <?php







                      } ?>

                   </form>
                
            



               
    </div>  
</div>
 
                                 


<style type="text/css" title="currentStyle">
           
            @import "../../css/demo_page.css";
            @import "../../css/demo_table_jui.css";
            
        </style>
<script src="../../js/jquery.dataTable.js"></script>
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
                



