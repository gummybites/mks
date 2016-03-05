//VALIDATION FOR LOGIN---------------------------------------------------------------------------------------------------------------------------- 
function freshmanlogin(){

    var password= document.getElementById('password').value.trim().length;
    var username=document.getElementById('username').value.trim().length;


        if(username==0){

      
                  document.getElementById('user').innerHTML="<span style ='color: red;'>Username is required!</span>";
                  document.getElementById('username').style.border='solid #FF0000';
                  return false;
           
        

          

        }else{

          if(username>=6 && username<=25) {
                  document.getElementById('user').innerHTML="<span style ='color: green;'><i class='fa fa-check-circle-o'></i></span>";
                  document.getElementById('username').style.border='solid #BDE5F8';
                  document.getElementById('validateusername').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validateusername').innerHTML="<i style ='color: red;'> Atleast 6 to 25 characters for username!</i>";
                  document.getElementById('username').style.border='solid #FF0000';
                  return false;
               }


        }//Firstname

                        if(password==0){
                          document.getElementById('pass').innerHTML="<span style ='color: red;'>Password is required!</span>";
                          document.getElementById('password').style.border='solid #FF0000';
                          return false;

                        }else{


                                  if(password>=6 && password<=25) {
                                    document.getElementById('pass').innerHTML="<span style ='color: green;'><i class='fa fa-check-circle-o'></i></span>";
                                        document.getElementById('password').style.border='solid #BDE5F8';
                                        document.getElementById('validatepassword').style.display = "none";
                                        
                                     
                                       }else{
                                          document.getElementById('validatepassword').innerHTML="<i style ='color: red;'> Atleast 6 to 25 characters for password!</i>";
                                          document.getElementById('password').style.border='solid #FF0000';
                                        return false;
                                       }
                        }

    
    }





























function updateemail(){
var email=document.getElementById('email').value;
var re = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
if(email==""){
  document.getElementById('mail').innerHTML="<span style ='color: red;'>Email are required!</span>";
  return false;
}else{
            if (!email.match(re)) {

                document.getElementById('validateemail').innerHTML="<i style ='color: red;'>Verify the e-mail address format.</i>";
                return false;  
            }else{
               document.getElementById('validateemail').style.display = "none";
               document.getElementById('mail').innerHTML="<span style ='color: green;'>Email <i class='fa fa-check-circle-o'></i></span>";
            } 
}

}
















//VALIDATION FOR REGISTRATION---------------------------------------------------------------------------------------------------------------------------- 

function freshmanregister(){

var email=document.getElementById('email').value.trim();
var re = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
var password1=document.getElementById('password').value.trim();
var password=document.getElementById('password').value.trim().length;
var cpassword=document.getElementById('confirmpassword').value;
var captcha=document.getElementById('captcha').value.trim().length;




var surname=document.getElementById('surname').value.trim().length;


         if(surname==0){

        
             document.getElementById('sur').innerHTML="<span style ='color: red;'>Surname is required!</span>";
             document.getElementById('surname').style.border='solid #FF0000';
             return false;
          

        }else{

                  if(surname>=2 && surname<=25) {
                  document.getElementById('sur').innerHTML="<span style ='color: green;'><i class='fa fa-check-circle-o'></i></span>";
                  document.getElementById('surname').style.border='solid #BDE5F8';
                  document.getElementById('validatesurname').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatesurname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters for surname!</i>";
                   document.getElementById('surname').style.border='solid #FF0000';
                  return false;
               }

       

        }//Surname

var firstname=document.getElementById('firstname').value.trim().length;
        if(firstname==0){
          document.getElementById('first').innerHTML="<span style ='color: red;'>Firstname is required!</span>";
          document.getElementById('firstname').style.border='solid #FF0000';
          return false;

        }else{

          if(firstname>=2 && firstname<=25) {
                  document.getElementById('first').innerHTML="<span style ='color: green;'><i class='fa fa-check-circle-o'></i></span>";
                  document.getElementById('firstname').style.border='solid #BDE5F8';
                  document.getElementById('validatefirstname').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatefirstname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters for firstname!</i>";
                  document.getElementById('firstname').style.border='solid #FF0000';
                  return false;
               }


        }//Firstname


var username=document.getElementById('username').value.trim().length;
        if(username==0){
          document.getElementById('user').innerHTML="<span style ='color: red;'>Username is required!</span>";
          document.getElementById('username').style.border='solid #FF0000';
          return false;

        }else{

          if(username>=6 && username<=25) {
                  document.getElementById('user').innerHTML="<span style ='color: green;'><i class='fa fa-check-circle-o'></i></span>";
                  document.getElementById('username').style.border='solid #BDE5F8';
                  document.getElementById('validateusername').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validateusername').innerHTML="<i style ='color: red;'> Atleast 6 to 25 characters for username!</i>";
                  document.getElementById('username').style.border='solid #FF0000';
                  return false;
               }


        }//Firstname


if(password==0){
  document.getElementById('pass').innerHTML="<span style ='color: red;'>Password is required!</span>";
  document.getElementById('password').style.border='solid #FF0000';
  return false;

}else{


          if(password>=6 && password<=25) {
            document.getElementById('pass').innerHTML="<span style ='color: green;'><i class='fa fa-check-circle-o'></i></span>";
              document.getElementById('password').style.border='solid #BDE5F8';
                document.getElementById('validatepassword').style.display = "none";
                
             
               }else{
                  document.getElementById('validatepassword').innerHTML="<i style ='color: red;'> Atleast 6 to 25 characters for password!</i>";
                document.getElementById('password').style.border='solid #FF0000';
                return false;
               }
}




if(cpassword==0){
  document.getElementById('cpass').innerHTML="<span style ='color: red;'>Confirmpassword is required!</span>";
  document.getElementById('confirmpassword').style.border='solid #FF0000';
  return false;

}else{



               if(cpassword==password1|| password1==cpassword){
                    document.getElementById('cpass').innerHTML="<span style ='color: green;'><i class='fa fa-check-circle-o'></i></span>";
                    document.getElementById('confirmpassword').style.border='solid #BDE5F8';
                    document.getElementById('validateconfirmpassword').style.display = "none";

                  }else{

                      
                      document.getElementById('cpass').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-remove'></span>";
                       document.getElementById('confirmpassword').style.border='solid #FF0000';
                       document.getElementById('validateconfirmpassword').innerHTML="<i style ='color: red;'>Password doesn't match!</i>";
                      return false;
                  }

}



if(email==0){
  document.getElementById('mail').innerHTML="<span style ='color: red;'>Email is required!</span>";
  document.getElementById('email').style.border='solid #FF0000';
  return false;
}else{
            if (!email.match(re)) {

                document.getElementById('validateemail').innerHTML="<i style ='color: red;'>Verify the e-mail address format.</i>";
                document.getElementById('email').style.border='solid #FF0000';
                return false;  
            }else{
               document.getElementById('validateemail').style.display = "none";
               document.getElementById('mail').innerHTML="<span style ='color: green;'><i class='fa fa-check-circle-o'></i></span>";
              document.getElementById('email').style.border='solid #BDE5F8';
            } 
}


if(captcha==0){
  document.getElementById('cap').innerHTML="<span style ='color: red;'>Captcha is required!</span>";
  document.getElementById('captcha').style.border='solid #FF0000';
  return false;

}else{
    if(captcha=>6 || captcha<=6) {
      document.getElementById('cap').innerHTML="<span style ='color: green;'>Captcha <i class='fa fa-check-circle-o'></i></span>";
       document.getElementById('captcha').style.border='solid #BDE5F8';
    }else{
      document.getElementById('validatecaptcha').innerHTML="<i style ='color: red;'>Must be exactly 4 digits!</i>";
       document.getElementById('captcha').style.border='solid #FF0000';
      return false;
    }
  

}




}







//Input validation for Login
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        specialKeys.push(9); //Tab
        specialKeys.push(46); //Delete
        specialKeys.push(36); //Home
        specialKeys.push(35); //End
        specialKeys.push(37); //Left
        specialKeys.push(39); //Right
        function forusernamelogin(e) {
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                           //48 to 57 (Numbers),   
                  var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || (keyCode == 32)|| (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }  

         function forpasswordlogin(e) {
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                           //48 to 57 (Numbers),   
                  var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || (keyCode == 32)||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }  

//toggle password security field text html form login switch
function togglepassword(){
var password= document.getElementById('password');
var togglebuttonpassword= document.getElementById('togglebuttonpassword');

if(password.type=="password"){
  password.type="text";
  togglebuttonpassword.value="Hide"

}else{
  password.type="password";
  togglebuttonpassword.value="show"

}
}
















//VALIDATION FOR APPLICATION---------------------------------------------------------------------------------------------------------------------------- 
function freshmanapplication(){

var year=document.getElementById('year').value;
        if(year==""){

          document.getElementById('sy').innerHTML="<b style ='color: red; font-family:arial;'>School year is required!</b>";
          document.getElementById('year').style.border='solid #FF0000';
          return false;

        }else{
          document.getElementById('sy').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
          document.getElementById('year').style.border='solid #BDE5F8';
        }//School year




var surname=document.getElementById('surname').value.trim().length;

         if(surname==""){
          document.getElementById('sur').innerHTML="<b style ='color: red; font-family:arial;'>Surname is required!</b>";
          document.getElementById('surname').style.border='solid #FF0000';
          return false;

        }else{

                  if(surname>=2 && surname<=25) {
                  document.getElementById('sur').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatesurname').style.display = "none";
                  document.getElementById('surname').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validatesurname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters!</i>";
                  document.getElementById('surname').style.border='solid #FF0000';
                  return false;
               }

       

        }//Surname
        



var firstname=document.getElementById('firstname').value.trim().length;
        if(firstname==""){
          document.getElementById('first').innerHTML="<b style ='color: red; font-family:arial;'>Firstname is required!</b>";
          document.getElementById('firstname').style.border='solid #FF0000';
          return false;

        }else{

          if(firstname>=2 && firstname<=25) {
                  document.getElementById('first').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatefirstname').style.display = "none";
                  document.getElementById('firstname').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validatefirstname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters!</i>";
                  document.getElementById('firstname').style.border='solid #FF0000';
                return false;
               }


        }//Firstname

var middlename=document.getElementById('middlename').value.trim().length;
        if(middlename==""){ 
                                    
                                      var x = confirm("are you sure you want to skip the middle name text field?");
                                      if(x == false)
                                      {
                                      document.getElementById('middle').innerHTML="<b style ='color: red; font-family:arial;'>Middlename is required!</b>";
                                      document.getElementById('middlename').readOnly = false;
                                      document.getElementById('middlename').style.border='solid #FF0000';
                                      
                                   

                                      return false;
                                      }else{
                                        document.getElementById('middle').innerHTML="<span style='color:green;' class='glyphicon glyphicon-question-sign'></span> ";
                                         document.getElementById('middlename').readOnly = true;
                                          document.getElementById('middlename').style.border='solid #BDE5F8';   
                                      }

        }else{
          if(middlename>=2 && middlename<=25) {
                  document.getElementById('middle').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatemiddlename').style.display = "none";
                  document.getElementById('middlename').style.border='solid #BDE5F8';   
                
             
               }else{
                  document.getElementById('validatemiddlename').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters!</i>";
                   document.getElementById('middlename').style.border='solid #FF0000';
                return false;
               }
          
        }

var permanent=document.getElementById('permanent').value.trim().length;
        if(permanent==""){
          document.getElementById('per').innerHTML="<b style ='color: red; font-family:arial;'>Permanent home address is required!</b>";
          document.getElementById('permanent').style.border='solid #FF0000';
          return false;

        }else{
           if(permanent>=10 && permanent<=35) {
                  document.getElementById('per').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatepermanent').style.display = "none";
                  document.getElementById('permanent').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validatepermanent').innerHTML="<i style ='color: red;'> Atleast 10 to 35 characters!</i>";
                  document.getElementById('permanent').style.border='solid #FF0000';
                return false;
               }

        }//Permanent Home address

var telephone=document.getElementById('telephone').value.length;
      if(telephone==""){
                                var x=confirm("Are you sure you want to skip telephone number?");
                                if(x==false){
                                  document.getElementById('tele').innerHTML="<b style ='color: red; font-family:arial;'>Telephone number is required!</b>";
                                   document.getElementById('telephone').readOnly = false;
                                   document.getElementById('telephone').style.border='solid #FF0000';
                                  return false;
                                }else{
                                  
                                  document.getElementById('tele').innerHTML="<span style='color:green;' class='glyphicon glyphicon-question-sign'></span> ";
                                 document.getElementById('telephone').readOnly = true;
                                 document.getElementById('telephone').style.border='solid #BDE5F8'; 

                                }
          

        }else{
           if(telephone==7) {
                  document.getElementById('tele').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatetelephone').style.display = "none";
                   document.getElementById('telephone').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validatetelephone').innerHTML="<i style ='color: red;'> Must be exactly 7 digit!</i>";
                  document.getElementById('telephone').style.border='solid #FF0000';
                return false;
               }

        }


var mobile=document.getElementById('mobile').value.length;
        if(mobile==""){
          document.getElementById('mobi').innerHTML="<b style ='color: red; font-family:arial;'>Mobile number is required!</b>";
          document.getElementById('mobile').style.border='solid #FF0000';
          return false;
        }else{
          if(mobile==11) {
                  document.getElementById('mobi').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatemobile').style.display = "none";
                 document.getElementById('mobile').style.border='solid #BDE5F8';   
                
             
               }else{
                  document.getElementById('validatemobile').innerHTML="<i style ='color: red;'> Must be exactly 11 numbers digits!</i>";
                 document.getElementById('mobile').style.border='solid #FF0000';
                return false;
               }

        }//Mobile


var months=document.getElementById('months').value;        
var days=document.getElementById('days').value;   
var years=document.getElementById('years').value;

        if((months && days && years) == ""){
          document.getElementById('birth').innerHTML="<b style ='color: red; font-family:arial;'>Birthdate is required!</b>";
          return false;

       }else{
           document.getElementById('birth').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
       }//birthdate

          
var gender=document.getElementById('gender').value;
        if(gender==""){
          document.getElementById('gen').innerHTML="<b style ='color: red; font-family:arial;'>Birthdate is required!</b>";
          document.getElementById('gender').style.border='solid #FF0000';
          return false;

        }else{
          document.getElementById('gen').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
          document.getElementById('gender').style.border='solid #BDE5F8';
        }//Gender


var birthplace=document.getElementById('birthplace').value.length;


         if(birthplace==""){
          document.getElementById('places').innerHTML="<b style ='color: red; font-family:arial;'>Birthplace is required!</b>";
          document.getElementById('birthplace').style.border='solid #FF0000';
           return false;
        }else{

             if(birthplace>=10 && birthplace<=35) {
                  document.getElementById('places').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatebirthplace').style.display = "none";
                  document.getElementById('birthplace').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validatebirthplace').innerHTML="<i style ='color: red;'> Atleast 10 to 35 characters!</i>";
                  document.getElementById('birthplace').style.border='solid #FF0000';
                return false;
               }

        }//Birthplace

     




var religion = document.getElementById('religion').value;
        if(religion==""){
        document.getElementById('reli').innerHTML="<b style ='color: red; font-family:arial;'>Religion is required!</b>";
        document.getElementById('religion').style.border='solid #FF0000';  
          return false;

        }else{
          document.getElementById('reli').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
          document.getElementById('religion').style.border='solid #BDE5F8';
        }//Birthplace


var guardianname = document.getElementById('guardianname').value.length;
        if(guardianname==""){
        document.getElementById('gname').innerHTML="<b style ='color: red; font-family:arial;'>Guardian name is required!</b>";
         document.getElementById('guardianname').style.border='solid #FF0000';
          return false;

        }else{
          if(guardianname>=2 && guardianname<=25) {
                  document.getElementById('gname').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validateguardianname').style.display = "none";
                  document.getElementById('guardianname').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validateguardianname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters!</i>";
                  document.getElementById('guardianname').style.border='solid #FF0000';
                return false;
               }
        }//Birthplace
        
var guardianaddress = document.getElementById('guardianaddress').value.length;
        if(guardianaddress==""){
        document.getElementById('gadd').innerHTML="<b style ='color: red; font-family:arial;'>Guardian address is required!</b>";
         document.getElementById('guardianaddress').style.border='solid #FF0000';
          return false;

        }else{
           if(guardianaddress>=10 && guardianaddress<=35) {
                  document.getElementById('gadd').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validateguardianaddress').style.display = "none";
                  document.getElementById('guardianaddress').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validateguardianaddress').innerHTML="<i style ='color: red;'> Atleast 10 to 35 characters!</i>";
                  document.getElementById('guardianaddress').style.border='solid #FF0000';
                return false;
               }
        }//Birthplace


var guardiancontact = document.getElementById('guardiancontact').value.length;
        if(guardiancontact==""){
        document.getElementById('gcon').innerHTML="<b style ='color: red; font-family:arial;'>Guardian contact is required!</b>";
        document.getElementById('guardiancontact').style.border='solid #FF0000';
        return false;
        }else{
            if(guardiancontact==11) {
                  document.getElementById('gcon').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validateguardiancontact').style.display = "none";
                  document.getElementById('guardiancontact').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validateguardiancontact').innerHTML="<i style ='color: red;'> Must be exactly 11 digits!</i>";
                  document.getElementById('guardiancontact').style.border='solid #FF0000';
                return false;
               }
        }//Birthplace

}


















//VALIDATION FOR APPLICATION---------------------------------------------------------------------------------------------------------------------------- 
function transfereeapplication(){

var year=document.getElementById('year').value;
        if(year==""){

          document.getElementById('sy').innerHTML="<b style ='color: red; font-family:arial;'>School year is required!</b>";
          document.getElementById('year').style.border='solid #FF0000';
          return false;

        }else{
          document.getElementById('sy').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
          document.getElementById('year').style.border='solid #BDE5F8';
        }//School year


var seeking=document.getElementById('seeking').value;
        if(seeking==""){

          document.getElementById('seek').innerHTML="<b style ='color: red; font-family:arial;'>Seeking admission is required!</b>";
           document.getElementById('seeking').style.border='solid #FF0000';
          return false;

        }else{
          document.getElementById('seek').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
          document.getElementById('seeking').style.border='solid #BDE5F8';
        }//School year







var surname=document.getElementById('surname').value.trim().length;

         if(surname==""){
          document.getElementById('sur').innerHTML="<b style ='color: red; font-family:arial;'>Surname is required!</b>";
          document.getElementById('surname').style.border='solid #FF0000';
          return false;

        }else{

                  if(surname>=2 && surname<=25) {
                  document.getElementById('sur').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatesurname').style.display = "none";
                  document.getElementById('surname').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validatesurname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters!</i>";
                  document.getElementById('surname').style.border='solid #FF0000';
                  return false;
               }

       

        }//Surname
        



var firstname=document.getElementById('firstname').value.trim().length;
        if(firstname==""){
          document.getElementById('first').innerHTML="<b style ='color: red; font-family:arial;'>Firstname is required!</b>";
          document.getElementById('firstname').style.border='solid #FF0000';
          return false;

        }else{

          if(firstname>=2 && firstname<=25) {
                  document.getElementById('first').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatefirstname').style.display = "none";
                  document.getElementById('firstname').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validatefirstname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters!</i>";
                  document.getElementById('firstname').style.border='solid #FF0000';
                return false;
               }


        }//Firstname

var middlename=document.getElementById('middlename').value.trim().length;
        if(middlename==""){ 
                                    
                                      var x = confirm("are you sure you want to skip the middle name text field?");
                                      if(x == false)
                                      {
                                      document.getElementById('middle').innerHTML="<b style ='color: red; font-family:arial;'>Middlename is required!</b>";
                                      document.getElementById('middlename').readOnly = false;
                                      document.getElementById('middlename').style.border='solid #FF0000';
                                      
                                   

                                      return false;
                                      }else{
                                        document.getElementById('middle').innerHTML="<span style='color:green;' class='glyphicon glyphicon-question-sign'></span> ";
                                         document.getElementById('middlename').readOnly = true;
                                          document.getElementById('middlename').style.border='solid #BDE5F8';   
                                      }

        }else{
          if(middlename>=2 && middlename<=25) {
                  document.getElementById('middle').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatemiddlename').style.display = "none";
                  document.getElementById('middlename').style.border='solid #BDE5F8';   
                
             
               }else{
                  document.getElementById('validatemiddlename').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters!</i>";
                   document.getElementById('middlename').style.border='solid #FF0000';
                return false;
               }
          
        }

var permanent=document.getElementById('permanent').value.trim().length;
        if(permanent==""){
          document.getElementById('per').innerHTML="<b style ='color: red; font-family:arial;'>Permanent home address is required!</b>";
          document.getElementById('permanent').style.border='solid #FF0000';
          return false;

        }else{
           if(permanent>=10 && permanent<=35) {
                  document.getElementById('per').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatepermanent').style.display = "none";
                  document.getElementById('permanent').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validatepermanent').innerHTML="<i style ='color: red;'> Atleast 10 to 35 characters!</i>";
                  document.getElementById('permanent').style.border='solid #FF0000';
                return false;
               }

        }//Permanent Home address

var telephone=document.getElementById('telephone').value.length;
      if(telephone==""){
                                var x=confirm("Are you sure you want to skip telephone number?");
                                if(x==false){
                                  document.getElementById('tele').innerHTML="<b style ='color: red; font-family:arial;'>Telephone number is required!</b>";
                                   document.getElementById('telephone').readOnly = false;
                                   document.getElementById('telephone').style.border='solid #FF0000';
                                  return false;
                                }else{
                                  
                                  document.getElementById('tele').innerHTML="<span style='color:green;' class='glyphicon glyphicon-question-sign'></span> ";
                                 document.getElementById('telephone').readOnly = true;
                                 document.getElementById('telephone').style.border='solid #BDE5F8'; 

                                }
          

        }else{
           if(telephone==7) {
                  document.getElementById('tele').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatetelephone').style.display = "none";
                   document.getElementById('telephone').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validatetelephone').innerHTML="<i style ='color: red;'> Must be exactly 7 digit!</i>";
                  document.getElementById('telephone').style.border='solid #FF0000';
                return false;
               }

        }


var mobile=document.getElementById('mobile').value.length;
        if(mobile==""){
          document.getElementById('mobi').innerHTML="<b style ='color: red; font-family:arial;'>Mobile number is required!</b>";
          document.getElementById('mobile').style.border='solid #FF0000';
          return false;
        }else{
          if(mobile==11) {
                  document.getElementById('mobi').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatemobile').style.display = "none";
                 document.getElementById('mobile').style.border='solid #BDE5F8';   
                
             
               }else{
                  document.getElementById('validatemobile').innerHTML="<i style ='color: red;'> Must be exactly 11 numbers digits!</i>";
                 document.getElementById('mobile').style.border='solid #FF0000';
                return false;
               }

        }//Mobile


var months=document.getElementById('months').value;        
var days=document.getElementById('days').value;   
var years=document.getElementById('years').value;

        if((months && days && years) == ""){
          document.getElementById('birth').innerHTML="<b style ='color: red; font-family:arial;'>Birthdate is required!</b>";
          return false;

       }else{
           document.getElementById('birth').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
       }//birthdate

          
var gender=document.getElementById('gender').value;
        if(gender==""){
          document.getElementById('gen').innerHTML="<b style ='color: red; font-family:arial;'>Birthdate is required!</b>";
          document.getElementById('gender').style.border='solid #FF0000';
          return false;

        }else{
          document.getElementById('gen').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
          document.getElementById('gender').style.border='solid #BDE5F8';
        }//Gender


var birthplace=document.getElementById('birthplace').value.length;


         if(birthplace==""){
          document.getElementById('places').innerHTML="<b style ='color: red; font-family:arial;'>Birthplace is required!</b>";
          document.getElementById('birthplace').style.border='solid #FF0000';
           return false;
        }else{

             if(birthplace>=10 && birthplace<=35) {
                  document.getElementById('places').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatebirthplace').style.display = "none";
                  document.getElementById('birthplace').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validatebirthplace').innerHTML="<i style ='color: red;'> Atleast 10 to 35 characters!</i>";
                  document.getElementById('birthplace').style.border='solid #FF0000';
                return false;
               }

        }//Birthplace

     




var religion = document.getElementById('religion').value;
        if(religion==""){
        document.getElementById('reli').innerHTML="<b style ='color: red; font-family:arial;'>Religion is required!</b>";
        document.getElementById('religion').style.border='solid #FF0000';  
          return false;

        }else{
          document.getElementById('reli').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
          document.getElementById('religion').style.border='solid #BDE5F8';
        }//Birthplace


var guardianname = document.getElementById('guardianname').value.length;
        if(guardianname==""){
        document.getElementById('gname').innerHTML="<b style ='color: red; font-family:arial;'>Guardian name is required!</b>";
         document.getElementById('guardianname').style.border='solid #FF0000';
          return false;

        }else{
          if(guardianname>=2 && guardianname<=25) {
                  document.getElementById('gname').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validateguardianname').style.display = "none";
                  document.getElementById('guardianname').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validateguardianname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters!</i>";
                  document.getElementById('guardianname').style.border='solid #FF0000';
                return false;
               }
        }//Birthplace
        
var guardianaddress = document.getElementById('guardianaddress').value.length;
        if(guardianaddress==""){
        document.getElementById('gadd').innerHTML="<b style ='color: red; font-family:arial;'>Guardian address is required!</b>";
         document.getElementById('guardianaddress').style.border='solid #FF0000';
          return false;

        }else{
           if(guardianaddress>=10 && guardianaddress<=35) {
                  document.getElementById('gadd').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validateguardianaddress').style.display = "none";
                  document.getElementById('guardianaddress').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validateguardianaddress').innerHTML="<i style ='color: red;'> Atleast 10 to 35 characters!</i>";
                  document.getElementById('guardianaddress').style.border='solid #FF0000';
                return false;
               }
        }//Birthplace


var guardiancontact = document.getElementById('guardiancontact').value.length;
        if(guardiancontact==""){
        document.getElementById('gcon').innerHTML="<b style ='color: red; font-family:arial;'>Guardian contact is required!</b>";
        document.getElementById('guardiancontact').style.border='solid #FF0000';
        return false;
        }else{
            if(guardiancontact==11) {
                  document.getElementById('gcon').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validateguardiancontact').style.display = "none";
                  document.getElementById('guardiancontact').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validateguardiancontact').innerHTML="<i style ='color: red;'> Must be exactly 11 digits!</i>";
                  document.getElementById('guardiancontact').style.border='solid #FF0000';
                return false;
               }
        }//Birthplace

}





//VALIDATION FOR APPLICATIONUPDATE---------------------------------------------------------------------------------------------------------------------------- 
function freshmanapplicationupdate(){
var surname=document.getElementById('surname').value.trim().length;

         if(surname==""){
          document.getElementById('sur').innerHTML="<b style ='color: red; font-family:arial;'>Surname is required!</b>";
          document.getElementById('surname').style.border='solid #FF0000';
          return false;

        }else{

                  if(surname>=2 && surname<=25) {
                  document.getElementById('sur').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatesurname').style.display = "none";
                  document.getElementById('surname').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validatesurname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters!</i>";
                  document.getElementById('surname').style.border='solid #FF0000';
                  return false;
               }

       

        }//Surname
        



var firstname=document.getElementById('firstname').value.trim().length;
        if(firstname==""){
          document.getElementById('first').innerHTML="<b style ='color: red; font-family:arial;'>Firstname is required!</b>";
          document.getElementById('firstname').style.border='solid #FF0000';
          return false;

        }else{

          if(firstname>=2 && firstname<=25) {
                  document.getElementById('first').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatefirstname').style.display = "none";
                  document.getElementById('firstname').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validatefirstname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters!</i>";
                  document.getElementById('firstname').style.border='solid #FF0000';
                return false;
               }


        }//Firstname

var middlename=document.getElementById('middlename').value.trim().length;
        if(middlename==""){ 
                                    
                                      var x = confirm("are you sure you want to skip the middle name text field?");
                                      if(x == false)
                                      {
                                      document.getElementById('middle').innerHTML="<b style ='color: red; font-family:arial;'>Middlename is required!</b>";
                                      document.getElementById('middlename').readOnly = false;
                                      document.getElementById('middlename').style.border='solid #FF0000';
                                      
                                   

                                      return false;
                                      }else{
                                        document.getElementById('middle').innerHTML="<span style='color:green;' class='glyphicon glyphicon-question-sign'></span> ";
                                         document.getElementById('middlename').readOnly = true;
                                          document.getElementById('middlename').style.border='solid #BDE5F8';   
                                      }

        }else{
          if(middlename>=2 && middlename<=25) {
                  document.getElementById('middle').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatemiddlename').style.display = "none";
                  document.getElementById('middlename').style.border='solid #BDE5F8';   
                
             
               }else{
                  document.getElementById('validatemiddlename').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters!</i>";
                   document.getElementById('middlename').style.border='solid #FF0000';
                return false;
               }
          
        }

var permanent=document.getElementById('permanent').value.trim().length;
        if(permanent==""){
          document.getElementById('per').innerHTML="<b style ='color: red; font-family:arial;'>Permanent home address is required!</b>";
          document.getElementById('permanent').style.border='solid #FF0000';
          return false;

        }else{
           if(permanent>=10 && permanent<=35) {
                  document.getElementById('per').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatepermanent').style.display = "none";
                  document.getElementById('permanent').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validatepermanent').innerHTML="<i style ='color: red;'> Atleast 10 to 35 characters!</i>";
                  document.getElementById('permanent').style.border='solid #FF0000';
                return false;
               }

        }//Permanent Home address

var telephone=document.getElementById('telephone').value.length;
      if(telephone==""){
                                var x=confirm("Are you sure you want to skip telephone number?");
                                if(x==false){
                                  document.getElementById('tele').innerHTML="<b style ='color: red; font-family:arial;'>Telephone number is required!</b>";
                                   document.getElementById('telephone').readOnly = false;
                                   document.getElementById('telephone').style.border='solid #FF0000';
                                  return false;
                                }else{
                                  
                                  document.getElementById('tele').innerHTML="<span style='color:green;' class='glyphicon glyphicon-question-sign'></span> ";
                                 document.getElementById('telephone').readOnly = true;
                                 document.getElementById('telephone').style.border='solid #BDE5F8'; 

                                }
          

        }else{
           if(telephone==7) {
                  document.getElementById('tele').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatetelephone').style.display = "none";
                   document.getElementById('telephone').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validatetelephone').innerHTML="<i style ='color: red;'> Must be exactly 7 digit!</i>";
                  document.getElementById('telephone').style.border='solid #FF0000';
                return false;
               }

        }


var mobile=document.getElementById('mobile').value.length;
        if(mobile==""){
          document.getElementById('mobi').innerHTML="<b style ='color: red; font-family:arial;'>Mobile number is required!</b>";
          document.getElementById('mobile').style.border='solid #FF0000';
          return false;
        }else{
          if(mobile==11) {
                  document.getElementById('mobi').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatemobile').style.display = "none";
                 document.getElementById('mobile').style.border='solid #BDE5F8';   
                
             
               }else{
                  document.getElementById('validatemobile').innerHTML="<i style ='color: red;'> Must be exactly 11 numbers digits!</i>";
                 document.getElementById('mobile').style.border='solid #FF0000';
                return false;
               }

        }//Mobile


var months=document.getElementById('months').value;        
var days=document.getElementById('days').value;   
var years=document.getElementById('years').value;

        if((months && days && years) == ""){
          document.getElementById('birth').innerHTML="<b style ='color: red; font-family:arial;'>Birthdate is required!</b>";
          return false;

       }else{
           document.getElementById('birth').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
       }//birthdate

          
var gender=document.getElementById('gender').value;
        if(gender==""){
          document.getElementById('gen').innerHTML="<b style ='color: red; font-family:arial;'>Birthdate is required!</b>";
          document.getElementById('gender').style.border='solid #FF0000';
          return false;

        }else{
          document.getElementById('gen').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
          document.getElementById('gender').style.border='solid #BDE5F8';
        }//Gender


var birthplace=document.getElementById('birthplace').value.length;


         if(birthplace==""){
          document.getElementById('places').innerHTML="<b style ='color: red; font-family:arial;'>Birthplace is required!</b>";
          document.getElementById('birthplace').style.border='solid #FF0000';
           return false;
        }else{

             if(birthplace>=10 && birthplace<=35) {
                  document.getElementById('places').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatebirthplace').style.display = "none";
                  document.getElementById('birthplace').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validatebirthplace').innerHTML="<i style ='color: red;'> Atleast 10 to 35 characters!</i>";
                  document.getElementById('birthplace').style.border='solid #FF0000';
                return false;
               }

        }//Birthplace

     




var religion = document.getElementById('religion').value;
        if(religion==""){
        document.getElementById('reli').innerHTML="<b style ='color: red; font-family:arial;'>Religion is required!</b>";
        document.getElementById('religion').style.border='solid #FF0000';  
          return false;

        }else{
          document.getElementById('reli').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
          document.getElementById('religion').style.border='solid #BDE5F8';
        }//Birthplace


var guardianname = document.getElementById('guardianname').value.length;
        if(guardianname==""){
        document.getElementById('gname').innerHTML="<b style ='color: red; font-family:arial;'>Guardian name is required!</b>";
         document.getElementById('guardianname').style.border='solid #FF0000';
          return false;

        }else{
          if(guardianname>=2 && guardianname<=25) {
                  document.getElementById('gname').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validateguardianname').style.display = "none";
                  document.getElementById('guardianname').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validateguardianname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters!</i>";
                  document.getElementById('guardianname').style.border='solid #FF0000';
                return false;
               }
        }//Birthplace
        
var guardianaddress = document.getElementById('guardianaddress').value.length;
        if(guardianaddress==""){
        document.getElementById('gadd').innerHTML="<b style ='color: red; font-family:arial;'>Guardian address is required!</b>";
         document.getElementById('guardianaddress').style.border='solid #FF0000';
          return false;

        }else{
           if(guardianaddress>=10 && guardianaddress<=35) {
                  document.getElementById('gadd').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validateguardianaddress').style.display = "none";
                  document.getElementById('guardianaddress').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validateguardianaddress').innerHTML="<i style ='color: red;'> Atleast 10 to 35 characters!</i>";
                  document.getElementById('guardianaddress').style.border='solid #FF0000';
                return false;
               }
        }//Birthplace


var guardiancontact = document.getElementById('guardiancontact').value.length;
        if(guardiancontact==""){
        document.getElementById('gcon').innerHTML="<b style ='color: red; font-family:arial;'>Guardian contact is required!</b>";
        document.getElementById('guardiancontact').style.border='solid #FF0000';
        return false;
        }else{
            if(guardiancontact==11) {
                  document.getElementById('gcon').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validateguardiancontact').style.display = "none";
                  document.getElementById('guardiancontact').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validateguardiancontact').innerHTML="<i style ='color: red;'> Must be exactly 11 digits!</i>";
                  document.getElementById('guardiancontact').style.border='solid #FF0000';
                return false;
               }
        }//Birthplace

}





//VALIDATION FOR APPLICATIONUPDATE---------------------------------------------------------------------------------------------------------------------------- 
function transfereeapplicationupdate(){
var seeking=document.getElementById('seeking').value;
        if(seeking==""){

          document.getElementById('seek').innerHTML="<b style ='color: red; font-family:arial;'>Seeking admission is required!</b>";
           document.getElementById('seeking').style.border='solid #FF0000';
          return false;

        }else{
          document.getElementById('seek').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
          document.getElementById('seeking').style.border='solid #BDE5F8';
        }//School year
  
var surname=document.getElementById('surname').value.trim().length;

         if(surname==""){
          document.getElementById('sur').innerHTML="<b style ='color: red; font-family:arial;'>Surname is required!</b>";
          document.getElementById('surname').style.border='solid #FF0000';
          return false;

        }else{

                  if(surname>=2 && surname<=25) {
                  document.getElementById('sur').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatesurname').style.display = "none";
                  document.getElementById('surname').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validatesurname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters!</i>";
                  document.getElementById('surname').style.border='solid #FF0000';
                  return false;
               }

       

        }//Surname
        



var firstname=document.getElementById('firstname').value.trim().length;
        if(firstname==""){
          document.getElementById('first').innerHTML="<b style ='color: red; font-family:arial;'>Firstname is required!</b>";
          document.getElementById('firstname').style.border='solid #FF0000';
          return false;

        }else{

          if(firstname>=2 && firstname<=25) {
                  document.getElementById('first').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatefirstname').style.display = "none";
                  document.getElementById('firstname').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validatefirstname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters!</i>";
                  document.getElementById('firstname').style.border='solid #FF0000';
                return false;
               }


        }//Firstname

var middlename=document.getElementById('middlename').value.trim().length;
        if(middlename==""){ 
                                    
                                      var x = confirm("are you sure you want to skip the middle name text field?");
                                      if(x == false)
                                      {
                                      document.getElementById('middle').innerHTML="<b style ='color: red; font-family:arial;'>Middlename is required!</b>";
                                      document.getElementById('middlename').readOnly = false;
                                      document.getElementById('middlename').style.border='solid #FF0000';
                                      
                                   

                                      return false;
                                      }else{
                                        document.getElementById('middle').innerHTML="<span style='color:green;' class='glyphicon glyphicon-question-sign'></span> ";
                                         document.getElementById('middlename').readOnly = true;
                                          document.getElementById('middlename').style.border='solid #BDE5F8';   
                                      }

        }else{
          if(middlename>=2 && middlename<=25) {
                  document.getElementById('middle').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatemiddlename').style.display = "none";
                  document.getElementById('middlename').style.border='solid #BDE5F8';   
                
             
               }else{
                  document.getElementById('validatemiddlename').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters!</i>";
                   document.getElementById('middlename').style.border='solid #FF0000';
                return false;
               }
          
        }

var permanent=document.getElementById('permanent').value.trim().length;
        if(permanent==""){
          document.getElementById('per').innerHTML="<b style ='color: red; font-family:arial;'>Permanent home address is required!</b>";
          document.getElementById('permanent').style.border='solid #FF0000';
          return false;

        }else{
           if(permanent>=10 && permanent<=35) {
                  document.getElementById('per').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatepermanent').style.display = "none";
                  document.getElementById('permanent').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validatepermanent').innerHTML="<i style ='color: red;'> Atleast 10 to 35 characters!</i>";
                  document.getElementById('permanent').style.border='solid #FF0000';
                return false;
               }

        }//Permanent Home address

var telephone=document.getElementById('telephone').value.length;
      if(telephone==""){
                                var x=confirm("Are you sure you want to skip telephone number?");
                                if(x==false){
                                  document.getElementById('tele').innerHTML="<b style ='color: red; font-family:arial;'>Telephone number is required!</b>";
                                   document.getElementById('telephone').readOnly = false;
                                   document.getElementById('telephone').style.border='solid #FF0000';
                                  return false;
                                }else{
                                  
                                  document.getElementById('tele').innerHTML="<span style='color:green;' class='glyphicon glyphicon-question-sign'></span> ";
                                 document.getElementById('telephone').readOnly = true;
                                 document.getElementById('telephone').style.border='solid #BDE5F8'; 

                                }
          

        }else{
           if(telephone==7) {
                  document.getElementById('tele').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatetelephone').style.display = "none";
                   document.getElementById('telephone').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validatetelephone').innerHTML="<i style ='color: red;'> Must be exactly 7 digit!</i>";
                  document.getElementById('telephone').style.border='solid #FF0000';
                return false;
               }

        }


var mobile=document.getElementById('mobile').value.length;
        if(mobile==""){
          document.getElementById('mobi').innerHTML="<b style ='color: red; font-family:arial;'>Mobile number is required!</b>";
          document.getElementById('mobile').style.border='solid #FF0000';
          return false;
        }else{
          if(mobile==11) {
                  document.getElementById('mobi').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatemobile').style.display = "none";
                 document.getElementById('mobile').style.border='solid #BDE5F8';   
                
             
               }else{
                  document.getElementById('validatemobile').innerHTML="<i style ='color: red;'> Must be exactly 11 numbers digits!</i>";
                 document.getElementById('mobile').style.border='solid #FF0000';
                return false;
               }

        }//Mobile


var months=document.getElementById('months').value;        
var days=document.getElementById('days').value;   
var years=document.getElementById('years').value;

        if((months && days && years) == ""){
          document.getElementById('birth').innerHTML="<b style ='color: red; font-family:arial;'>Birthdate is required!</b>";
          return false;

       }else{
           document.getElementById('birth').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
       }//birthdate

          
var gender=document.getElementById('gender').value;
        if(gender==""){
          document.getElementById('gen').innerHTML="<b style ='color: red; font-family:arial;'>Birthdate is required!</b>";
          document.getElementById('gender').style.border='solid #FF0000';
          return false;

        }else{
          document.getElementById('gen').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
          document.getElementById('gender').style.border='solid #BDE5F8';
        }//Gender


var birthplace=document.getElementById('birthplace').value.length;


         if(birthplace==""){
          document.getElementById('places').innerHTML="<b style ='color: red; font-family:arial;'>Birthplace is required!</b>";
          document.getElementById('birthplace').style.border='solid #FF0000';
           return false;
        }else{

             if(birthplace>=10 && birthplace<=35) {
                  document.getElementById('places').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validatebirthplace').style.display = "none";
                  document.getElementById('birthplace').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validatebirthplace').innerHTML="<i style ='color: red;'> Atleast 10 to 35 characters!</i>";
                  document.getElementById('birthplace').style.border='solid #FF0000';
                return false;
               }

        }//Birthplace

     




var religion = document.getElementById('religion').value;
        if(religion==""){
        document.getElementById('reli').innerHTML="<b style ='color: red; font-family:arial;'>Religion is required!</b>";
        document.getElementById('religion').style.border='solid #FF0000';  
          return false;

        }else{
          document.getElementById('reli').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
          document.getElementById('religion').style.border='solid #BDE5F8';
        }//Birthplace


var guardianname = document.getElementById('guardianname').value.length;
        if(guardianname==""){
        document.getElementById('gname').innerHTML="<b style ='color: red; font-family:arial;'>Guardian name is required!</b>";
         document.getElementById('guardianname').style.border='solid #FF0000';
          return false;

        }else{
          if(guardianname>=2 && guardianname<=25) {
                  document.getElementById('gname').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validateguardianname').style.display = "none";
                  document.getElementById('guardianname').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validateguardianname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters!</i>";
                  document.getElementById('guardianname').style.border='solid #FF0000';
                return false;
               }
        }//Birthplace
        
var guardianaddress = document.getElementById('guardianaddress').value.length;
        if(guardianaddress==""){
        document.getElementById('gadd').innerHTML="<b style ='color: red; font-family:arial;'>Guardian address is required!</b>";
         document.getElementById('guardianaddress').style.border='solid #FF0000';
          return false;

        }else{
           if(guardianaddress>=10 && guardianaddress<=35) {
                  document.getElementById('gadd').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validateguardianaddress').style.display = "none";
                  document.getElementById('guardianaddress').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validateguardianaddress').innerHTML="<i style ='color: red;'> Atleast 10 to 35 characters!</i>";
                  document.getElementById('guardianaddress').style.border='solid #FF0000';
                return false;
               }
        }//Birthplace


var guardiancontact = document.getElementById('guardiancontact').value.length;
        if(guardiancontact==""){
        document.getElementById('gcon').innerHTML="<b style ='color: red; font-family:arial;'>Guardian contact is required!</b>";
        document.getElementById('guardiancontact').style.border='solid #FF0000';
        return false;
        }else{
            if(guardiancontact==11) {
                  document.getElementById('gcon').innerHTML="<span style ='color: green;' class='fa fa-check-circle-o'></span>";
                  document.getElementById('validateguardiancontact').style.display = "none";
                  document.getElementById('guardiancontact').style.border='solid #BDE5F8';
                
             
               }else{
                  document.getElementById('validateguardiancontact').innerHTML="<i style ='color: red;'> Must be exactly 11 digits!</i>";
                  document.getElementById('guardiancontact').style.border='solid #FF0000';
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





//Input Validation for registration
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        specialKeys.push(9); //Tab
        specialKeys.push(46); //Delete
        specialKeys.push(36); //Home
        specialKeys.push(35); //End
        specialKeys.push(37); //Left
        specialKeys.push(39); //Right

              function forsurnameregistration(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                  //97 – 122 (Lowercase Alphabets) 164(enye lowercase)  165(enye uppercase)
                  var ret = ((keyCode >= 65 && keyCode <= 90) ||(keyCode >= 97 && keyCode <= 122) ||(keyCode == 164) ||(keyCode == 165)|| (keyCode == 32)||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }  


                    //Text validation for firstname
                  function forfirstnameregistration(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                              // 97 – 122 (Lowercase Alphabets)    
                  var ret = ((keyCode >= 65 && keyCode <= 90) ||(keyCode >= 97 && keyCode <= 122) || (keyCode == 32)||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              } 


              function forusernameregistration(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                          // 48 to 57 (Numbers),     97 – 122 (Lowercase Alphabets)    65 – 90 (Uppercase Alphabets)   
                  var ret = ((keyCode >= 65 && keyCode <= 90) ||(keyCode >= 48 && keyCode <= 57) ||(keyCode >= 97 && keyCode <= 122) || (keyCode == 32)|| (keyCode >= 65 && keyCode <= 90) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }

                //Text validation for password
              function forpasswordregistration(e) {
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                           //48 to 57 (Numbers),        97 – 122 (Lowercase Alphabets)    65 – 90 (Uppercase Alphabets)  
                  var ret = ((keyCode >= 65 && keyCode <= 90) ||(keyCode >= 48 && keyCode <= 57) || (keyCode >= 97 && keyCode <= 122) || (keyCode == 32)||  (keyCode >= 65 && keyCode <= 90) ||(specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }  


               //Text validation for confirmpassword
              function forconfirmpasswordregistration(e) {
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                           //48 to 57 (Numbers),           97 – 122 (Lowercase Alphabets) 65 – 90 (Uppercase Alphabets) 
                  var ret = ((keyCode >= 65 && keyCode <= 90) ||(keyCode >= 48 && keyCode <= 57) ||  (keyCode >= 97 && keyCode <= 122) || (keyCode >= 65 && keyCode <= 90) || (keyCode == 32)|| (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }  
                //Text validation for email
                function foremailregistration(e) {

                var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                         //48 to 57 (Numbers),        65 – 90 (Uppercase Alphabets)     97 – 122 (Lowercase Alphabets)     46-(. special character)           46-(@ special character)
                var ret = ((keyCode >= 65 && keyCode <= 90) ||(keyCode >= 48 && keyCode <= 57) ||  (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || (keyCode >= 46 && keyCode <= 46) ||(keyCode >= 64 && keyCode <= 64) || (keyCode == 32)|| (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                document.getElementById("error").style.display = ret ? "none" : "inline";
                return ret;

            }
                    //Text validation for captcha
                 function forcaptcharegistration(e) {
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                           //48 to 57 (Numbers),   
                  var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || (keyCode == 32)|| (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }  



//toggle password security field text html form login switch
function toggleconfirmpassword(){
var confirmpassword= document.getElementById('confirmpassword');
var togglebuttonpassword= document.getElementById('togglebuttonconfirmpassword');

if(confirmpassword.type=="password"){
  confirmpassword.type="text";
  togglebuttonconfirmpassword.value="Hide"

}else{
  confirmpassword.type="password";
  togglebuttonconfirmpassword.value="show"

}
}




//Input Validation for Application

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
                                          //      97 – 122 (Lowercase Alphabets) 164(enye lowercase)   165(enye uppercase)
                  var ret = ((keyCode >= 97 && keyCode <= 122) ||(keyCode ===241 || keyCode ===209) || (keyCode >= 65 && keyCode <= 90) ||(keyCode == 32)||   (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;
              }  


        //Text validation for firstname
       function forfirstname(e){
                    var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                          //      97 – 122 (Lowercase Alphabets) 164(enye lowercase)   165(enye uppercase)
                  var ret = ((keyCode >= 97 && keyCode <= 122) ||(keyCode ===241 || keyCode ===209) || (keyCode >= 65 && keyCode <= 90) ||(keyCode == 32)||   (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }  

      //Text validation for middlename
       function formiddlename(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                          //      97 – 122 (Lowercase Alphabets) 164(enye lowercase)   165(enye uppercase)
                  var ret = ((keyCode >= 97 && keyCode <= 122) ||(keyCode ===241 || keyCode ===209) || (keyCode >= 65 && keyCode <= 90) ||(keyCode == 32)||   (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }

       //Text validation for permanent
       function forpermanent(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                          //48 to 57 (Numbers),        97 – 122 (Lowercase Alphabets)  65 – 90 (Uppercase Alphabets)
                  var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 97 && keyCode <= 122) || (keyCode >= 65 && keyCode <= 90) || (keyCode == 32)||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
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
                                          //48 to 57 (Numbers),        97 – 122 (Lowercase Alphabets)  65 – 90 (Uppercase Alphabets)
                  var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 97 && keyCode <= 122) || (keyCode >= 65 && keyCode <= 90) || (keyCode == 32)||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }                                     

      //Text validation for guardianname
       function forguardianname(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                          //      97 – 122 (Lowercase Alphabets) 164(enye lowercase)   165(enye uppercase)
                  var ret = ((keyCode >= 97 && keyCode <= 122) ||(keyCode ===241 || keyCode ===209) || (keyCode >= 65 && keyCode <= 90) ||(keyCode == 32)||   (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }  


      //Text validation for guardianaddress
       function forguardianaddress(e){
                   var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                          //48 to 57 (Numbers),        97 – 122 (Lowercase Alphabets)  65 – 90 (Uppercase Alphabets)
                  var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 97 && keyCode <= 122) || (keyCode >= 65 && keyCode <= 90) || (keyCode == 32)||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
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



//For printing

function PrintMe(el) {
var disp_setting="toolbar=yes,location=no,";
disp_setting+="directories=yes,menubar=yes,";
disp_setting+="scrollbars=yes,width=650, height=600, left=100, top=25";
   var content_vlue = document.getElementById(el).innerHTML;
   var docprint=window.open("","",disp_setting);
   docprint.document.open();
   docprint.document.write('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"');
   docprint.document.write('"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">');
   docprint.document.write('<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">');
   docprint.document.write('<head><title>MARIA KATRINA SCHOOL APPLICATION FORM</title>');
   docprint.document.write('<link rel="stylesheet" href="../../css/bootstrap.min.css"></link>');
   docprint.document.write('<link rel="stylesheet" href="../../css/bootstrap.css"></link>');                

   docprint.document.write('</head><body onLoad="window.print()"><form>');
   docprint.document.write(content_vlue);
   docprint.document.write('</form></body></html>');
   docprint.document.close();
   docprint.focus();
}

















//input upload

    $(document).ready(function () {
        $(document).on('change', '.btn-file :file', function () {
            var input = $(this),
                numFiles = input.get(0).files ? input.get(0).files.length : 1,
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });

        $('.btn-file :file').on('fileselect', function (event, numFiles, label) {
            console.log(numFiles);
            console.log(label);
            $("#valdfil").val(label);
        });

         
    });


    $(document).ready(function () {
        $(document).on('change', '.btn-file1 :file', function () {
            var input = $(this),
                numFiles = input.get(0).files ? input.get(0).files.length : 1,
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });

        $('.btn-file1 :file').on('fileselect', function (event, numFiles, label) {
            console.log(numFiles);
            console.log(label);
            $("#valdfil1").val(label);
        });

         
    });


        $(document).ready(function () {
        $(document).on('change', '.btn-file2 :file', function () {
            var input = $(this),
                numFiles = input.get(0).files ? input.get(0).files.length : 1,
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });

        $('.btn-file2 :file').on('fileselect', function (event, numFiles, label) {
            console.log(numFiles);
            console.log(label);
            $("#valdfil2").val(label);
        });

         
    });

            $(document).ready(function () {
        $(document).on('change', '.btn-file3 :file', function () {
            var input = $(this),
                numFiles = input.get(0).files ? input.get(0).files.length : 1,
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });

        $('.btn-file3 :file').on('fileselect', function (event, numFiles, label) {
            console.log(numFiles);
            console.log(label);
            $("#valdfil3").val(label);
        });

         
    });

                     $(document).ready(function () {
        $(document).on('change', '.btn-file4 :file', function () {
            var input = $(this),
                numFiles = input.get(0).files ? input.get(0).files.length : 1,
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });

        $('.btn-file4 :file').on('fileselect', function (event, numFiles, label) {
            console.log(numFiles);
            console.log(label);
            $("#valdfil4").val(label);
        });

         
    });