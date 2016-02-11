<?php session_start();
include('config.php');
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
$user = $qry['username'];
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
?>




<html>
<title>
Registrar
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
  display: block;
}

.btn-bread{
    margin-top:10px;
    font-size: 12px;
    
    border-radius: 3px;
}
#months{
                      
                      border-right: none;
                      background: #fff;
                      border-radius: 0px;
                      height: 34px;
                      width: 85px;
                      -webkit-box-shadow: #d9edf7;
                      box-shadow: #d9edf7;
                      -webkit-transition: none;
                      -o-transition: none;
                      transition: none;
                    }

                    #years{
                      border-radius: 0px;
                      height: 34px;
                      width: 85px;
                      border-right: none;
                      background: #fff;
                      -webkit-box-shadow: #d9edf7;
                      box-shadow: #d9edf7;
                      -webkit-transition: none;
                      -o-transition: none;
                      transition: none;
                    
                    }

               
                    #footer{
                    	margin-top: 380px;

                    }

                    p::first-letter {
                       
                     
                    }

                    th{
                    text-align: center;

                    }

                    td{
                    text-align: center;

                    }

                    #line{
                    	border-bottom: 1px solid black;

                    }

                    legend a {
                      color: inherit;
                    }
                    legend.legendStyle {
                    padding-left: 5px;
                    padding-right: 5px;
                    }
                    fieldset.fsStyle {
                    font-family: Verdana, Arial, sans-serif;
                    font-size: small;
                    font-weight: normal;
                    border: 1px solid #999999;
                    padding: 20px;

                    }
                    legend.legendStyle {
                    font-size: 90%;
                    color: #888888;
                    background-color: transparent;
                    font-weight: bold;
                    }

                    legend {
                    width: auto;
                    border-bottom: 0px;
                    }

                    .btn-default{
                      width: 150px;
                      height: 40px;
                    }



                    .cover-new
                      {
                        background-image: url('prospective.png');
                        background-repeat: no-repeat;
                        background-size: 150px 40px;
                        color: #000;
                      }

                      .cover-new:hover
                      {
                        background-image: url('addstudent.png');
                        background-repeat: no-repeat;
                        background-size: 150px 40px;
                        color: #000;
                      }

                    .cover-transfer
                      {
                        background-image: url('transferee.png');
                        background-repeat: no-repeat;
                        background-size: 150px 40px;
                        color: #000;
                      }

                      .cover-transfer:hover
                      {
                        background-image: url('addstudent.png');
                        background-repeat: no-repeat;
                        background-size: 150px 40px;
                        color: #000;
                      }

                      .cover-senior
                      {
                        background-image: url('senior.png');
                        background-repeat: no-repeat;
                        background-size: 150px 40px;
                        color: #000;
                      }

                      .cover-senior:hover
                      {
                        background-image: url('addstudent.png');
                        background-repeat: no-repeat;
                        background-size: 150px 40px;
                        color: #000;
                      }

                    #validation-addon{

                      border-left: none;
                                           background-color: #fff;
                                           border-color: #d9edf7;

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




<nav id="menu" class="navbar navbar-default navbar-static-top">
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
  		<div class="col-md-2  sidebar col-xs-2 col-offset-1">
  			<div class="row">
	<!-- uncomment code for absolute positioning tweek see top comment in css -->
	<div class="absolute-wrapper"> </div>
	<!-- Menu -->
	<div class="side-menu">
		<nav class="navbar navbar-default" role="navigation">
			<!-- Main Menu -->
			<div class="side-menu-container">
				<ul class="nav navbar-nav">
					
					<li ><a href="registrar.php"><span class="glyphicon glyphicon-"></span> Home</a></li>
					<!-- Dropdown-->
					<li  id="dropdown">
						<a data-toggle="collapse" href="#dropdown-lvl1">
							<span class="glyphicon glyphicon-"></span> Inquiry <span class="caret"></span>
						</a>

						<!-- Dropdown level 1 -->
						<div id="dropdown-lvl1" class="panel-collapse collapse">
							<div class="panel-body">
								<ul class="nav navbar-nav">
									<li><a href="tuition.php"><span class="glyphicon glyphicon-"></span> Tuition</a></li>
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
			            <div id="dropdown-lvl2" class="panel-collapse collapse in">
			              <div class="panel-body">
			                <ul class="nav navbar-nav">
			                  <li><a href="prospectivestudents.php"><span class="glyphicon glyphicon-"></span> Create Account</a></li>
			                  <li class="active"><a href="#"><span class="glyphicon glyphicon-"></span> Student Admission</a></li>			                  
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
			                  <li><a href="prospectivestudents.php"><span class="glyphicon glyphicon-"></span> Create Account</a></li>
			                  <li><a href="prospectivestudents.php"><span class="glyphicon glyphicon-"></span> Teacher Admission</a></li>
			                  <li><a href="prospectivestudents.php"><span class="glyphicon glyphicon-"></span> Teacher Details</a></li>			                  
			                </ul>
			              </div>
			            </div>
			          </li>
					


					

					<li><a href="subjects.php"><span class="glyphicon glyphicon-"></span> Subjects</a></li>
		

				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>

	</div>
</div> </div>
  		<div class="col-md-10 content col-xs-10 col-offset-1">

  	
				  			  
  									<p class="hr-warning"></p>
					                <ol class="breadcrumb bread-warning">
					                </ol>
                      

			 <form method="POST" onsubmit='return register()'  enctype="multipart/form-data">    		                
			  <i  id="error" style="color: Red; display: none"></i>	                
              	
              <?php
              if(isset($_GET['edit'])){
              	$edit=$_GET['edit'];
              	echo "<a href='newstudentdetails.php?details=$edit'>Back</a>";



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
             

                    
                                          <fieldset class="fsStyle">
                                            <legend class="legendStyle">
                                              <a data-toggle="collapse" data-target="#demo" href="#">APPLICANT INFORMATION</a>
                                             </legend>


                                             
                                            
                                            <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="schoolyear">S.Y: <span class="glyphicon glyphicon-ok-sign"></span> </p> 
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                          
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="application">Seeking admission as: </p> 
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                               	
                                               	<input type='text' class='form-control' readonly="readonly" value='<?php echo $year ?>'>
                                                 
                                              

                                              	<span id='validation-addon' class="input-group-addon">
                                                 <i id='first'></i>
                                              </span>
                                            </div>
                                            </div><!--//school year -->



                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                              	

                                            </div>
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">

                                            <select class='form-control' style='display: none;' id='transferee' name='seeking'>
                                                  <option></option>
                                                  <option>Grade 7</option>
                                                  <option>Grade 8</option>
                                                  <option>Grade 9</option>
                                                  <option>Grade 10</option>
                                                  <option>Grade 11</option>
                                                  <option>Grade 12</option>
                                                
                                                  </select> 

                                            <select class='form-control' style='display: none;' id='newstudent' name='seeking'>
                                                  <option></option>
                                                  <option>Grade 7</option>
                                                  <option>Grade 11</option>
                                                
                                                  </select> 

                      

                                               <select class='form-control' id='blank' name='seeking'>
                                                  <option></option>
                                               
                                                
                                                  </select> 
                                              <span id='validation-addon' class="input-group-addon">
                                              <i id="reli"></i>
                                              </span>
                                            </div>
                                            </div><!--//seeking admission as -->

                                            </div>

                                            </div><!--//row group -->
                                          

                                            <br>




                                            <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="dateapplied">Applied Date: <span class="glyphicon glyphicon-ok-sign"></span></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="dateapplied">Status: </p> 
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                              	<input type='text' class='form-control' readonly="readonly" value='<?php echo $date ?>'>
                                              	<span id='validation-addon' class="input-group-addon">
                                                 <i id='first'></i>
                                              </span>

                                            </div>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                             



                                            </div>
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                        
                                                <select class='form-control'  id='status' name='seeking'>
                                                  <option></option>
                                                  <option>new student</option>
                                                  <option>Transferee</option>
                                              
                                              
                                                
                                                  </select> 


                                             <span id='validation-addon' class="input-group-addon">
                                              <i id="reli"></i>
                                              </span>


                                            </div>
                                            </div><!--//seeking admission as -->
                                            </div>
                                            </div><!--//row group -->
                                            <br>




                                            <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="name">Surname: <i id='validatesurname'>(required)</i></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="firstname">Firstname: <i id='validatefirstname'>(required)</i> </p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="middlename">Middlename: <i id='validatemiddlename'>(Optional)</i></p>
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                           
                                                <input class='form-control' type='text' onkeypress="return forsurname(event);" ondrop="return false;" onpaste="return false;"  id='surname' name='surname' maxlength="25" placeholder='Type your surname..' value='<?php echo $sname ?>'/>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                                 <i id='sur'></i>
                                              </span>


                                            </div>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                               <input class='form-control' type='text' id='firstname' onkeypress="return forfirstname(event);" ondrop="return false;" onpaste="return false;"  name='firstname' maxlength="25" placeholder='Type your firstname..' value='<?php echo $fname; ?>'/>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                                 <i id='first'></i>
                                              </span>


                                            </div>
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                                <input class='form-control' type='text' id='middlename' onkeypress="return formiddlename(event);" ondrop="return false;" onpaste="return false;" maxlength="25" name='middlename'  placeholder='Type your middlename..' value='<?php echo $mname ?>'/>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                              <i id='middle'></i>
                                              </span>


                                            </div>
                                            </div><!--//seeking admission as -->

                                            </div>
                                            </div><!--//row group -->
                                            <br>













                                             <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Permanent Home Address: <i id='validatepermanent'>(required)</i></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                           
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Telephone number: <i id='validatetelephone'>(Optional)</i> </p>
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                                <input class='form-control' type='text' id='permanent' onkeypress="return forpermanent(event);" ondrop="return false;" onpaste="return false;" placeholder='Type your home address..' maxlength="35" value='<?php echo $per ?>' name='permanent'/>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                                <i id="per"></i>
                                              </span>


                                            </div>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                              


                                            </div>
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                                <input class='form-control' type='text' id='telephone' onkeypress="return fortelephone(event);" ondrop="return false;" onpaste="return false;"  placeholder='Type your telephone number..' maxlength="7" value='<?php echo $tele ?>' name='telephone'/> 
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                               <i id="tele"></i>
                                              </span>


                                            </div>
                                            </div><!--//seeking admission as -->
                                            </div>
                                            </div><!--//row group -->
                                            <br>















                                            <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Mobile number: <i id='validatemobile'>(required)</i></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Birthdate: (required) <i> (Day/Month/Year)</i></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                             <p>Age: <span class="glyphicon glyphicon-ok-sign"></span></p> 
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                              

                                                <input class='form-control' type='text' id='mobile' onkeypress="return formobile(event);" ondrop="return false;" onpaste="return false;" placeholder='Type your mobile number here..' maxlength='11' value='<?php echo $mob?>' name='mobile' />
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                               <i id="mobi"></i>
                                              </span>


                                            </div>
                                            </div><!--//mobile number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                           
                                                
                                                <input type='text' id='birthdate' name='birthdate' class='form-control' value='<?php echo $birt ?>'>
                                              <span id='validation-addon' class="input-group-addon">
                                              <i id="birth"></i>
                                              </span>
                                            </div>
                                            
                                            </div><!--//Birthdate -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                              <input type='text' class='form-control' id='age' name='ages' value='<?php echo $ages?>'>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                              
                                              </span>

                                            </div>
                                            </div><!--//Age -->
                                            </div>
                                             </div><!--//row group -->
                                            <br>

                                  <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Gender: (required)</p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Birthplace: <i id='validatebirthplace'>(required)</i></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Religion: (required)</p>
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                                <input type='text' name='gender' id='gender' class='form-control' value='<?php echo $sex?>'>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                              <i id="gen"></i>
                                              </span>


                                            </div>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                              <input class='form-control' type='text' onkeypress="return forbirthplace(event);" ondrop="return false;" onpaste="return false;"  id="birthplace" placeholder='Type your birthplace here..' maxlength="35" name="birthplace" value='<?php echo $place?>'/>
                                              <span id='validation-addon' class="input-group-addon">
                                              <i id="places"></i>
                                              </span>
                                            </div>
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">

                                                <input type='text' class='form-control' name='religion' id='religion' value='<?php echo $reli?>'/>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                              <i id="reli"></i>
                                              </span>


                                            </div>
                                            </div><!--//seeking admission as -->

                                            </div>
                                            </div><!--//row group -->
                                            <br>

                                            <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="name">Guardian's name: <i id='validateguardianname'>(required)</i></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="firstname">Address: <i id='validateguardianaddress'>(required)</i> </p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="middlename">Mobile number: <i id='validateguardiancontact'>(required)</i></p>
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                           
                                                <input class='form-control' type='text' onkeypress="return forguardianname(event);" ondrop="return false;" onpaste="return false;"  id='guardianname' name='guardianname' maxlength="25" placeholder="Type your guardian's name.." value='<?php echo $gname ?>'/>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                                 <i id='gname'></i>
                                              </span>


                                            </div>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                               <input class='form-control' type='text' id='guardianaddress' onkeypress="return forguardianaddress(event);" ondrop="return false;" onpaste="return false;"  name='guardianaddress' maxlength="25" placeholder='Type your guardianaddress..' value='<?php echo $gadd ?>'/>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                                 <i id='gadd'></i>
                                              </span>


                                            </div>
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                                <input class='form-control' type='text' id='guardiancontact' onkeypress="return forguardiancontact(event);" ondrop="return false;" onpaste="return false;" maxlength="11" name='guardiancontact'  placeholder='Type your guardiancontact..' value='<?php echo $gcon ?>'/>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                              <i id='gcon'></i>
                                              </span>


                                            </div>
                                            </div><!--//seeking admission as -->

                                            </div>
                                            </div><!--//row group -->
                                            <br>

                                            <div class="row form-group">
                                              <input type="hidden" name="prospectivestatus" value="pending">
                                            <div class="col-md-4 col-xs-4 col-offset-1"></div>
                                            <div class="col-md-4 col-xs-4 col-offset-1"></div>
                                            <div class="col-md-4 col-xs-4 col-offset-1">
                                                <button type="submit"  name="update"   class="btn btn-danger">Update</button>

                                            </div>
                                            </div>
                                            </fieldset>
              	<?php



              }elseif(isset($_GET['details'])){
              	$id_details=$_GET['details'];
              	echo "<a href='newstudentdetails.php'>Back</a>";


              	

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

              	if($applicant_no!='0'){

              	}else{	
              		echo "<a href='newstudentdetails.php?edit=$id_details' class='pull-right'>Edit</a>";

              	}
              	
              				?>
              				
              			 <fieldset class="fsStyle">
                                            <legend class="legendStyle">
                                              <a data-toggle="collapse" data-target="#demo" href="#">APPLICANT INFORMATION</a>
                                             </legend>

                                            
                                      

                                            
                                            <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="schoolyear">S.Y:</p> 
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="application"></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="application">Seeking admission as:</p> 
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1' >
                                              <b><?php echo $year; ?></b>
                                            </div><!--//school year -->



                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                             
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                              <b><?php echo $level; ?> </b>
                                              
                                            </div><!--//seeking admission as -->

                                            </div>


                                           
                                            
                                          

                                            </div><!--//row group -->
                                          

                                            <br>

                                            <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="dateapplied">Applied Date:</p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="dateapplied"></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="dateapplied">Status: </p> 
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                <b> <?php echo $date; ?> </b>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                               
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                 <b><?php echo $stat; ?> </b>
                                            </div><!--//seeking admission as -->

                                            </div>

                                            </div><!--//row group -->
                                            <br>


                                            <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="name">Surname:</p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="firstname">Firstname:</p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="middlename">Middlename:</p>
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                <b> <?php echo $sname; ?> </b>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                 <b><?php echo $fname; ?> </b>
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                 <b><?php echo $mname; ?> </b>
                                            </div><!--//seeking admission as -->

                                            </div>

                                            </div><!--//row group -->
                                            <br>


                                             <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Permanent Home Address: </p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                           
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Telephone number:</p>
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                               <b><?php echo $per; ?> </b>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                              
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                               <b><?php echo $tele; ?> </b>
                                              
                                            </div><!--//seeking admission as -->

                                            </div>

                                            </div><!--//row group -->
                                            <br>

                                            <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Mobile number:</p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Birthdate:</p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                             <p>Age:</p> 
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                <b> <?php echo $mob; ?> </b>
                                            </div><!--//mobile number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                 <b> <?php echo $birt; ?> </b>
                                            
                                            </div><!--//Birthdate -->


                                          

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                  <b><?php echo $ages; ?> </b>
                                            </div><!--//Age -->

                                            </div>

                                            </div><!--//row group -->
                                            <br>

                                            <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Gender:</p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Birthplace:</p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Religion:</p>
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                 <b><?php echo $sex; ?> </b>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                 <b><?php echo $place; ?>  </b>
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                               <b><?php echo $reli; ?> </b>
                                            </div><!--//seeking admission as -->

                                            </div>
                 

                                            </div><!--//row group -->
                                            <br>

                                            <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Guardian's name:</p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Address:</p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Contact:</p>
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                 <b><?php echo $gname; ?> </b>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                 <b><?php echo $gadd; ?>  </b>
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                               <b><?php echo $gcon; ?> </b>
                                            </div><!--//seeking admission as -->

                                            </div>
                 

                                            </div><!--//row group -->
                                            <br>
                                            </fieldset>

              				<?php


              }elseif(isset($_POST['new']) ||isset($_POST['transfer'])||isset($_POST['senior'])){
                echo "<a href='newstudentdetails.php'>Back</a>";

                ?>
                               
                   <fieldset class="fsStyle">
                                            <legend class="legendStyle">
                                            <?php if(isset($_POST['new'])){
                                             ?>
                                              <a data-toggle="collapse" data-target="#demo" href="#">NEW STUDENT APPLICATION</a>
                                              <?php
                                              }elseif(isset($_POST['transfer'])){
                                              ?>
                                              <a data-toggle="collapse" data-target="#demo" href="#">TRANSFEREE APPLICATION</a>
                                              <?php
                                              }elseif(isset($_POST['senior'])){
                                              ?>
                                              <a data-toggle="collapse" data-target="#demo" href="#">SENIOR HIGH APPLICATION</a>
                                              <?php  
                                              }

                                              ?>
                                             </legend>

      
                             
                                <div class='row'>
                              <img src='../../img/mkslogo.png' class='pull-left' width="150px" height="150px"> 
                              </div>

                              <?php if(isset($_POST['new'])){
                                ?>
                               <div class='text-center'>
                                <b>MARIA KATRINA SCHOOL</b>
                                <p>No. 10 Mendoza St. Saog, Marilao, Bulacan</p>
                                <h2 ><strong>APPLICATION FOR ADMISSION (Freshmen) </strong></h2>
                                </div>

                                <?php
                                  }elseif(isset($_POST['transfer'])){
                                ?>
                               <div class='text-center'>
                                <b>MARIA KATRINA SCHOOL</b>
                                <p>No. 10 Mendoza St. Saog, Marilao, Bulacan</p>
                                <h2 ><strong>APPLICATION FOR ADMISSION (Transferee) </strong></h2>
                                </div>

                                <?php


                                  }elseif(isset($_POST['senior'])){
                                     ?>
                               <div class='text-center'>
                                <b>MARIA KATRINA SCHOOL</b>
                                <p>No. 10 Mendoza St. Saog, Marilao, Bulacan</p>
                                <h2 ><strong>APPLICATION FOR ADMISSION (Senior High) </strong></h2>
                                </div>

                                <?php

                                  }
                                ?>


                                            <div class='row'>
                                            <div class='col-md-6'>
                                            <div><i  id="error" style="color: Red; display: none">NOTE: Special characters are not allowed!!</i>

                                            <div><i id='validateemail' ></i></div>
                                            <div><i id='validatepassword' ></i></div>
                                            <div><i id='validateconfirmpassword' ></i></div>
                                            <div><i id='validatecaptcha' ></i></div></div>
                                            </div></div>
                                            <br>

                                            <div id='applicant' ><p>APPLICANT INFORMATION</p></div>

                                             
                                            
                                            <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="schoolyear">S.Y: (required)  </p> 
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                          
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="application">Seeking admission as: </p> 
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                               <select class='form-control'   id="year" name="year" >

                                                                    <option></option>
                                                                    <option><?php 
                                                                      $schoolyear= date('Y')+1;
                                                                      $nextyear= $schoolyear+1;
                                                                      $totalyear= "$schoolyear - $nextyear";
                  
                                                                    echo $totalyear; ?></option>
                                                                   

                                                </select> 
                                              <span id='validation-addon' class="input-group-addon">
                                                 <i id="sy"></i>
                                              </span>
                                            </div>
                                            </div><!--//school year -->



                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                              

                                            </div>
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                            
                                               <?php if(isset($_POST['new'])){
                                                      ?>
                                                      <select class='form-control'   id="seeking" name="seeking" >

                                                                    <option></option>
                                                                    <option>Grade 7</option>
                                                                   

                                                      </select> 

                                                      <?php
                                                        }elseif(isset($_POST['transfer'])){
                                                      ?>
                                                     <select class='form-control'   id="seeking" name="seeking" >

                                                                    <option></option>
                                                                    <option>Grade 7</option>
                                                                    <option>Grade 8</option>
                                                                    <option>Grade 9</option>
                                                                    <option>Grade 10</option>
                                                                    <option>Grade 11</option>
                                                                    <option>Grade 12</option>
                                                                  

                                                      </select> 

                                                      <?php


                                                        }elseif(isset($_POST['senior'])){
                                                           ?>
                                                            <select class='form-control'   id="seeking" name="seeking" >

                                                                          <option></option>
                                                                          <option>Grade 11</option>
                                                                         

                                                            </select> 

                                                            <?php

                                                              }
                                                            ?>

                                           



                                              <span id='validation-addon' class="input-group-addon">
                                                 <i id="seek"></i>
                                              </span>


                                            </div>
                                            </div><!--//seeking admission as -->

                                            </div>

                                            </div><!--//row group -->
                                          

                                            <br>




                                            <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="dateapplied">Applied Date: <span class="glyphicon glyphicon-ok-sign"></span></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                                         </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="dateapplied">Status: </p> 
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                     
                                                
                                           

                                              
                                                <b><?php 
                                                    $applied = date("F j,Y");
                                                    echo "$applied";
                                                    ?></b>
                                                 
                                              


                                            </div>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                              

                                              
                                                 
                                             


                                            </div>
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">

                                                 <?php if(isset($_POST['new'])){
                                                      ?>
                                                       <select class='form-control'   id="status" name="status" >

                                                                    <option></option>
                                                                    <option>new student</option>
                                                                   

                                                      </select> 

                                                      <?php
                                                        }elseif(isset($_POST['transfer'])){
                                                      ?>
                                                     <select class='form-control'   id="status" name="status" >

                                                                    <option></option>
                                                                    <option>Transferee</option>
                                                                   

                                                      </select> 

                                                      <?php


                                                        }elseif(isset($_POST['senior'])){
                                                           ?>
                                                            <select class='form-control'   id="status" name="status" >

                                                                    <option></option>
                                                                    <option>new student</option>
                                                                   

                                                            </select> 

                                                            <?php

                                                              }
                                                            ?>

                                               
                                              <span id='validation-addon' class="input-group-addon">
                                                 <i id="stat"></i>
                                              </span>


                                            </div>
                                            </div><!--//seeking admission as -->
                                            </div>
                                            </div><!--//row group -->
                                            <br>




                                            <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="name">Surname: <i id='validatesurname'>(required)</i></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="firstname">Firstname: <i id='validatefirstname'>(required)</i> </p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="middlename">Middlename: <i id='validatemiddlename'>(Optional)</i></p>
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                           
                                                <input class='form-control' type='text' onkeypress="return forsurname(event);" ondrop="return false;" onpaste="return false;"  id='surname' name='surname' maxlength="25" placeholder='Type your surname..' value=''/>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                                 <i id='sur'></i>
                                              </span>


                                            </div>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                               <input class='form-control' type='text' id='firstname' onkeypress="return forfirstname(event);" ondrop="return false;" onpaste="return false;"  name='firstname' maxlength="25" placeholder='Type your firstname..' value=''/>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                                 <i id='first'></i>
                                              </span>


                                            </div>
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                                <input class='form-control' type='text' id='middlename' onkeypress="return formiddlename(event);" ondrop="return false;" onpaste="return false;" maxlength="25" name='middlename'  placeholder='Type your middlename..' value=''/>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                              <i id='middle'></i>
                                              </span>


                                            </div>
                                            </div><!--//seeking admission as -->

                                            </div>
                                            </div><!--//row group -->
                                            <br>













                                             <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Permanent Home Address: <i id='validatepermanent'>(required)</i></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                           
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Telephone number: <i id='validatetelephone'>(Optional)</i> </p>
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                                <input class='form-control' type='text' id='permanent' onkeypress="return forpermanent(event);" ondrop="return false;" onpaste="return false;" placeholder='Type your home address..' maxlength="35" value='' name='permanent'/>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                                <i id="per"></i>
                                              </span>


                                            </div>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                              


                                            </div>
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                                <input class='form-control' type='text' id='telephone' onkeypress="return fortelephone(event);" ondrop="return false;" onpaste="return false;"  placeholder='Type your telephone number..' maxlength="7" value='' name='telephone'/> 
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                               <i id="tele"></i>
                                              </span>


                                            </div>
                                            </div><!--//seeking admission as -->
                                            </div>
                                            </div><!--//row group -->
                                            <br>















                                            <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Mobile number: <i id='validatemobile'>(required)</i></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Birthdate: (required) <i> (Day/Month/Year)</i></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                             <p>Age: <span class="glyphicon glyphicon-ok-sign"></span></p> 
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                              

                                                <input class='form-control' type='text' id='mobile' onkeypress="return formobile(event);" ondrop="return false;" onpaste="return false;" placeholder='Type your mobile number here..' maxlength='11' value='' name='mobile' />
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                               <i id="mobi"></i>
                                              </span>


                                            </div>
                                            </div><!--//mobile number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                           
                                                
                                                <select  class='form-control'  id='days' name="day">
                                                      <option></option>
                                                </select>

                                                <span class="input-group-btn">
                                                <select class='btn btn-default'  id='months' name="month">
                                                    <option></option>
                                                </select>
                                              </span>

                                              <span  class="input-group-btn">
                                                <select  class='btn btn-default'  id='years' name="years">
                                                     <option></option>
                                                </select>
                                              </span>
                                              <span id='validation-addon' class="input-group-addon">
                                              <i id="birth"></i>
                                              </span>
                                            </div>
                                            
                                            </div><!--//Birthdate -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                              <label class='form-control' id='age' value=''></label>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                              
                                              </span>

                                            </div>
                                            </div><!--//Age -->
                                            </div>
                                             </div><!--//row group -->
                                            <br>

                                  <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Gender: (required)</p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Birthplace: <i id='validatebirthplace'>(required)</i></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p>Religion: (required)</p>
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                                <select class='form-control' id="gender" name="gender">
                                                  <option></option>
                                                  <option>Female</option>
                                                  <option>Male</option>


                                                </select>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                              <i id="gen"></i>
                                              </span>


                                            </div>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                              <input class='form-control' type='text' onkeypress="return forbirthplace(event);" ondrop="return false;" onpaste="return false;"  id="birthplace" placeholder='Type your birthplace here..' maxlength="35" name="birthplace" />
                                              <span id='validation-addon' class="input-group-addon">
                                              <i id="places"></i>
                                              </span>
                                            </div>
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">

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
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                              <i id="reli"></i>
                                              </span>


                                            </div>
                                            </div><!--//seeking admission as -->

                                            </div>
                                            </div><!--//row group -->
                                            <br>
                                   

                                             <div class='row-group'>
                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="name">Guardian's name: <i id='validateguardianname'>(required)</i></p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="firstname">Address: <i id='validateguardianaddress'>(required)</i> </p>
                                            </div>

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <p for="middlename">Mobile number: <i id='validateguardiancontact'>(required)</i></p>
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                           
                                                <input class='form-control' type='text' onkeypress="return forguardianname(event);" ondrop="return false;" onpaste="return false;"  id='guardianname' name='guardianname' maxlength="25" placeholder="Type your guardian's name.." value=''/>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                                 <i id='gname'></i>
                                              </span>


                                            </div>
                                            </div><!--//school year -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                               <input class='form-control' type='text' id='guardianaddress' onkeypress="return forguardianaddress(event);" ondrop="return false;" onpaste="return false;"  name='guardianaddress' maxlength="25" placeholder='Type your guardianaddress..' value=''/>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                                 <i id='gadd'></i>
                                              </span>


                                            </div>
                                            </div><!--//application number -->

                                            <div class='col-md-4 col-xs-4 col-offset-1'>
                                            <div class="input-group input-group-md">
                                                <input class='form-control' type='text' id='guardiancontact' onkeypress="return forguardiancontact(event);" ondrop="return false;" onpaste="return false;" maxlength="11" name='guardiancontact'  placeholder='Type your guardiancontact..' value=''/>
                                                 
                                              <span id='validation-addon' class="input-group-addon">
                                              <i id='gcon'></i>
                                              </span>


                                            </div>
                                            </div><!--//seeking admission as -->

                                            </div>
                                            </div><!--//row group -->
                                            <br>

                                      
                                       
                                   

                                <br>

                                <div class="row form-group">
                              <input type="hidden" name="prospectivestatus" value="pending">
                            <div class="col-md-4 col-xs-4 col-offset-1"></div>
                            <div class="col-md-4 col-xs-4 col-offset-1"></div>
                            <div class="col-md-4 col-xs-4 col-offset-1">
                                <button type="submit"  name="submit"  value="Submit" class="btn btn-danger">Submit</button>
                              
                            </div>
                            </div>
                            </fieldset>
                            <?php



              }else{

              ?>
               <button name='new' id='new'class='btn btn-default cover-new'></button> 
               <button name='transfer' id='transfer'class='btn btn-default cover-transfer'></button> 
               <button name='senior' id='senior'class='btn btn-default cover-senior'></button>   

              <div class='demo_jui'>
                        <table cellpadding='0' cellspacing='1' border='1' class='display' id='tbl' class='jtable'>
                        <thead>

                                          <tr>
                                              <th bgcolor='#FCAC45'><center>Date</center></th>
                                              <th bgcolor='#FCAC45'><center>Grade level</center></th>
                                              <th bgcolor='#FCAC45'><center>Surname</center></th>
                                              <th bgcolor='#FCAC45'><center>Firstname</center></th>
                                              <th bgcolor='#FCAC45'><center>Middlename</center></th>
                                              <th bgcolor='#FCAC45'><center>Action</center></th>
                 
                                              </tr>

                        </thead>



                        <?php

                        $details="SELECT * from tbl_prospectivestudents ";
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

                       

                           
                            echo "<tr><td>$date</td><td>$level</td><td>$sname</td><td>$fname</td> <td>$mname</td> <td><a href='?details=$id'><img src='viewaccount.png' width='130px' height='40px'></a></td></tr>";

                        
                        }

                        ?>

                        </table>

             </div>

             <?php }?>

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