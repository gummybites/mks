//VALIDATION FOR LOGIN---------------------------------------------------------------------------------------------------------------------------- 
function freshmanlogin(){

    var password= document.getElementById('password').value.length;
    var username=document.getElementById('username').value.length;


        if(username==""){
          document.getElementById('user').innerHTML="<span style ='color: red;'>Username are required!</span>";
          return false;

        }else{

          if(username>=6 && username<=25) {
                  document.getElementById('user').innerHTML="<span style ='color: green;'>Username <i class='glyphicon glyphicon-ok'></i></span>";
                  document.getElementById('validateusername').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validateusername').innerHTML="<i style ='color: red;'> Atleast 6 to 25 characters for username!</i>";
                return false;
               }


        }//Firstname

                        if(password==""){
                          document.getElementById('pass').innerHTML="<span style ='color: red;'>Password are required!</span>";
                          return false;

                        }else{


                                  if(password>=6 && password<=25) {
                                    document.getElementById('pass').innerHTML="<span style ='color: green;'>Password <i class='glyphicon glyphicon-ok'></i></span>";
                           
                                        document.getElementById('validatepassword').style.display = "none";
                                        
                                     
                                       }else{
                                          document.getElementById('validatepassword').innerHTML="<i style ='color: red;'> Atleast 6 to 25 characters for password!</i>";
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
               document.getElementById('mail').innerHTML="<span style ='color: green;'>Email <i class='glyphicon glyphicon-ok'></i></span>";
            } 
}

}
















//VALIDATION FOR REGISTRATION---------------------------------------------------------------------------------------------------------------------------- 

function freshmanregister(){

var email=document.getElementById('email').value;
var re = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
var password1=document.getElementById('password').value;
var password=document.getElementById('password').value.length;
var cpassword=document.getElementById('confirmpassword').value;
var captcha=document.getElementById('captcha').value.length;

var surname=document.getElementById('surname').value.length;

         if(surname==""){
          document.getElementById('sur').innerHTML="<span style ='color: red;'>Surname are required!</span>";
          return false;

        }else{

                  if(surname>=2 && surname<=25) {
                  document.getElementById('sur').innerHTML="<span style ='color: green;'>Surname <i class='glyphicon glyphicon-ok'></i></span>";
                  document.getElementById('validatesurname').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatesurname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters for surname!</i>";
                return false;
               }

       

        }//Surname

var firstname=document.getElementById('firstname').value.length;
        if(firstname==""){
          document.getElementById('first').innerHTML="<span style ='color: red;'>Firstname are required!</span>";
          return false;

        }else{

          if(firstname>=2 && firstname<=25) {
                  document.getElementById('first').innerHTML="<span style ='color: green;'>Firstname <i class='glyphicon glyphicon-ok'></i></span>";
                  document.getElementById('validatefirstname').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatefirstname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters for firstname!</i>";
                return false;
               }


        }//Firstname


var username=document.getElementById('username').value.length;
        if(username==""){
          document.getElementById('user').innerHTML="<span style ='color: red;'>Username are required!</span>";
          return false;

        }else{

          if(username>=6 && username<=25) {
                  document.getElementById('user').innerHTML="<span style ='color: green;'>Username <i class='glyphicon glyphicon-ok'></i></span>";
                  document.getElementById('validateusername').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validateusername').innerHTML="<i style ='color: red;'> Atleast 6 to 25 characters for username!</i>";
                return false;
               }


        }//Firstname


if(password==""){
  document.getElementById('pass').innerHTML="<span style ='color: red;'>Password are required!</span>";
  return false;

}else{


          if(password>=6 && password<=25) {
            document.getElementById('pass').innerHTML="<span style ='color: green;'>Password <i class='glyphicon glyphicon-ok'></i></span>";
   
                document.getElementById('validatepassword').style.display = "none";
                
             
               }else{
                  document.getElementById('validatepassword').innerHTML="<i style ='color: red;'> Atleast 6 to 25 characters for password!</i>";
                return false;
               }
}




if(cpassword==""){
  document.getElementById('cpass').innerHTML="<span style ='color: red;'>Confirmpassword are required!</span>";
  return false;

}else{



               if(cpassword==password1|| password1==cpassword){
                    document.getElementById('cpass').innerHTML="<span style ='color: green;'>Confirmpassword <i class='glyphicon glyphicon-ok'></i></span>";
                    document.getElementById('validateconfirmpassword').style.display = "none";

                  }else{

                      
                      document.getElementById('cpass').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-remove'></span>";
                       document.getElementById('validateconfirmpassword').innerHTML="<i style ='color: red;'>Password doesn't match!</i>";
                      return false;
                  }

}



if(email==""){
  document.getElementById('mail').innerHTML="<span style ='color: red;'>Email are required!</span>";
  return false;
}else{
            if (!email.match(re)) {

                document.getElementById('validateemail').innerHTML="<i style ='color: red;'>Verify the e-mail address format.</i>";
                return false;  
            }else{
               document.getElementById('validateemail').style.display = "none";
               document.getElementById('mail').innerHTML="<span style ='color: green;'>Email <i class='glyphicon glyphicon-ok'></i></span>";
            } 
}


if(captcha==""){
  document.getElementById('cap').innerHTML="<span style ='color: red;'>Captcha are required!</span>";
  return false;

}else{
    if(captcha=>6 || captcha<=6) {
      document.getElementById('cap').innerHTML="<span style ='color: green;'>Captcha <i class='glyphicon glyphicon-ok'></i></span>";
    }else{
      document.getElementById('validatecaptcha').innerHTML="<i style ='color: red;'>Must be exactly 4 digits!</i>";
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
                  var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }  

         function forpasswordlogin(e) {
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                           //48 to 57 (Numbers),   
                  var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
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

          document.getElementById('sy').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{
          document.getElementById('sy').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";

        }//School year




var surname=document.getElementById('surname').value.length;

         if(surname==""){
          document.getElementById('sur').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{

                  if(surname>=2 && surname<=25) {
                  document.getElementById('sur').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatesurname').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatesurname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters for surname!</i>";
                return false;
               }

       

        }//Surname
        



var firstname=document.getElementById('firstname').value.length;
        if(firstname==""){
          document.getElementById('first').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{

          if(firstname>=2 && firstname<=25) {
                  document.getElementById('first').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatefirstname').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatefirstname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters for firstname!</i>";
                return false;
               }


        }//Firstname

var middlename=document.getElementById('middlename').value.length;
        if(middlename==""){ 
                                    
                                      var x = confirm("are you sure you want to skip the middle name text field?");
                                      if(x == false)
                                      {
                                      document.getElementById('middle').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
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
                  document.getElementById('validatemiddlename').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters for middlename!</i>";
                return false;
               }
          
        }

var permanent=document.getElementById('permanent').value.length;
        if(permanent==""){
          document.getElementById('per').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{
           if(permanent>=10 && permanent<=35) {
                  document.getElementById('per').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatepermanent').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatepermanent').innerHTML="<i style ='color: red;'> Atleast 10 to 35 characters for permanent home address!</i>";
                return false;
               }

        }//Permanent Home address

var telephone=document.getElementById('telephone').value.length;
      if(telephone==""){
                                var x=confirm("Are you sure you want to skip telephone number?");
                                if(x==false){
                                  document.getElementById('tele').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
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
                  document.getElementById('validatetelephone').innerHTML="<i style ='color: red;'> Must be exactly 7 digit for telephone numbers!</i>";
                return false;
               }

        }


var mobile=document.getElementById('mobile').value.length;
        if(mobile==""){
          document.getElementById('mobi').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";

        }else{
          if(mobile==11) {
                  document.getElementById('mobi').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatemobile').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatemobile').innerHTML="<i style ='color: red;'> Must be exactly 11 numbers digits for mobile number!</i>";
                return false;
               }

        }//Mobile


var months=document.getElementById('months').value;        
var days=document.getElementById('days').value;   
var years=document.getElementById('years').value;

        if((months && days && years) == ""){
          document.getElementById('birth').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

       }else{
           document.getElementById('birth').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
       }//birthdate

          
var gender=document.getElementById('gender').value;
        if(gender==""){
          document.getElementById('gen').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{
          document.getElementById('gen').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";

        }//Gender


var birthplace=document.getElementById('birthplace').value.length;


         if(birthplace==""){
          document.getElementById('places').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{

             if(birthplace>=10 && birthplace<=35) {
                  document.getElementById('places').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatebirthplace').style.display = "none";
       
                
             
               }else{
                  document.getElementById('validatebirthplace').innerHTML="<i style ='color: red;'> Atleast 10 to 35 characters for birthplace!</i>";
                return false;
               }

        }//Birthplace

     




var religion = document.getElementById('religion').value;
        if(religion==""){
        document.getElementById('reli').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{
          document.getElementById('reli').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";

        }//Birthplace


var guardianname = document.getElementById('guardianname').value.length;
        if(guardianname==""){
        document.getElementById('gname').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{
          if(guardianname>=2 && guardianname<=25) {
                  document.getElementById('gname').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validateguardianname').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validateguardianname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters for guardian name!</i>";
                return false;
               }
        }//Birthplace
        
var guardianaddress = document.getElementById('guardianaddress').value.length;
        if(guardianaddress==""){
        document.getElementById('gadd').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{
           if(guardianaddress>=10 && guardianaddress<=35) {
                  document.getElementById('gadd').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validateguardianaddress').style.display = "none";
       
                
             
               }else{
                  document.getElementById('validateguardianaddress').innerHTML="<i style ='color: red;'> Atleast 10 to 35 characters for guardian address!</i>";
                return false;
               }
        }//Birthplace


var guardiancontact = document.getElementById('guardiancontact').value.length;
        if(guardiancontact==""){
        document.getElementById('gcon').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
        return false;
        }else{
            if(guardiancontact==11) {
                  document.getElementById('gcon').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validateguardiancontact').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validateguardiancontact').innerHTML="<i style ='color: red;'> Must be exactly 11 digits for guardian contact!</i>";
                return false;
               }
        }//Birthplace

}


















//VALIDATION FOR APPLICATION---------------------------------------------------------------------------------------------------------------------------- 
function transfereeapplication(){

var year=document.getElementById('year').value;
        if(year==""){

          document.getElementById('sy').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{
          document.getElementById('sy').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";

        }//School year


var seeking=document.getElementById('seeking').value;
        if(seeking==""){

          document.getElementById('seek').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{
          document.getElementById('seek').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";

        }//School year


var surname=document.getElementById('surname').value.length;

         if(surname==""){
          document.getElementById('sur').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{

                  if(surname>=2 && surname<=25) {
                  document.getElementById('sur').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatesurname').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatesurname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters for surname!</i>";
                return false;
               }

       

        }//Surname
        



var firstname=document.getElementById('firstname').value.length;
        if(firstname==""){
          document.getElementById('first').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{

          if(firstname>=2 && firstname<=25) {
                  document.getElementById('first').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatefirstname').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatefirstname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters for firstname!</i>";
                return false;
               }


        }//Firstname

var middlename=document.getElementById('middlename').value.length;
        if(middlename==""){ 
                                    
                                      var x = confirm("are you sure you want to skip the middle name text field?");
                                      if(x == false)
                                      {
                                      document.getElementById('middle').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
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
                  document.getElementById('validatemiddlename').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters for middlename!</i>";
                return false;
               }
          
        }

var permanent=document.getElementById('permanent').value.length;
        if(permanent==""){
          document.getElementById('per').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{
           if(permanent>=10 && permanent<=35) {
                  document.getElementById('per').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatepermanent').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatepermanent').innerHTML="<i style ='color: red;'> Atleast 10 to 35 characters for permanent home address!</i>";
                return false;
               }

        }//Permanent Home address

var telephone=document.getElementById('telephone').value.length;
      if(telephone==""){
                                var x=confirm("Are you sure you want to skip telephone number?");
                                if(x==false){
                                  document.getElementById('tele').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
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
                  document.getElementById('validatetelephone').innerHTML="<i style ='color: red;'> Must be exactly 7 digit for telephone numbers!</i>";
                return false;
               }

        }


var mobile=document.getElementById('mobile').value.length;
        if(mobile==""){
          document.getElementById('mobi').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";

        }else{
          if(mobile==11) {
                  document.getElementById('mobi').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatemobile').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatemobile').innerHTML="<i style ='color: red;'> Must be exactly 11 numbers digits for mobile number!</i>";
                return false;
               }

        }//Mobile


var months=document.getElementById('months').value;        
var days=document.getElementById('days').value;   
var years=document.getElementById('years').value;

        if((months && days && years) == ""){
          document.getElementById('birth').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

       }else{
           document.getElementById('birth').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
       }//birthdate

          
var gender=document.getElementById('gender').value;
        if(gender==""){
          document.getElementById('gen').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{
          document.getElementById('gen').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";

        }//Gender


var birthplace=document.getElementById('birthplace').value.length;


         if(birthplace==""){
          document.getElementById('places').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{

             if(birthplace>=10 && birthplace<=35) {
                  document.getElementById('places').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatebirthplace').style.display = "none";
       
                
             
               }else{
                  document.getElementById('validatebirthplace').innerHTML="<i style ='color: red;'> Atleast 10 to 35 characters for birthplace!</i>";
                return false;
               }

        }//Birthplace

     




var religion = document.getElementById('religion').value;
        if(religion==""){
        document.getElementById('reli').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{
          document.getElementById('reli').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";

        }//Birthplace


var guardianname = document.getElementById('guardianname').value.length;
        if(guardianname==""){
        document.getElementById('gname').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{
          if(guardianname>=2 && guardianname<=25) {
                  document.getElementById('gname').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validateguardianname').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validateguardianname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters for guardian name!</i>";
                return false;
               }
        }//Birthplace
        
var guardianaddress = document.getElementById('guardianaddress').value.length;
        if(guardianaddress==""){
        document.getElementById('gadd').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{
           if(guardianaddress>=10 && guardianaddress<=35) {
                  document.getElementById('gadd').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validateguardianaddress').style.display = "none";
       
                
             
               }else{
                  document.getElementById('validateguardianaddress').innerHTML="<i style ='color: red;'> Atleast 10 to 35 characters for guardian address!</i>";
                return false;
               }
        }//Birthplace


var guardiancontact = document.getElementById('guardiancontact').value.length;
        if(guardiancontact==""){
        document.getElementById('gcon').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
        return false;
        }else{
            if(guardiancontact==11) {
                  document.getElementById('gcon').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validateguardiancontact').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validateguardiancontact').innerHTML="<i style ='color: red;'> Must be exactly 11 digits for guardian contact!</i>";
                return false;
               }
        }//Birthplace

}
//VALIDATION FOR APPLICATIONUPDATE---------------------------------------------------------------------------------------------------------------------------- 
function transfereeapplicationupdate(){

var seeking=document.getElementById('seeking').value;
        if(seeking==""){

          document.getElementById('seek').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{
          document.getElementById('seek').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";

        }//School year

var surname=document.getElementById('surname').value.length;

         if(surname==""){
          document.getElementById('sur').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{

                  if(surname>=2 && surname<=25) {
                  document.getElementById('sur').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatesurname').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatesurname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters for surname!</i>";
                return false;
               }

       

        }//Surname
        



var firstname=document.getElementById('firstname').value.length;
        if(firstname==""){
          document.getElementById('first').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{

          if(firstname>=2 && firstname<=25) {
                  document.getElementById('first').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatefirstname').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatefirstname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters for firstname!</i>";
                return false;
               }


        }//Firstname

var middlename=document.getElementById('middlename').value.length;
        if(middlename==""){ 
                                    
                                      var x = confirm("are you sure you want to skip the middle name text field?");
                                      if(x == false)
                                      {
                                      document.getElementById('middle').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
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
                  document.getElementById('validatemiddlename').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters for middlename!</i>";
                return false;
               }
          
        }

var permanent=document.getElementById('permanent').value.length;
        if(permanent==""){
          document.getElementById('per').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{
           if(permanent>=10 && permanent<=35) {
                  document.getElementById('per').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatepermanent').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatepermanent').innerHTML="<i style ='color: red;'> Atleast 10 to 35 characters for permanent home address!</i>";
                return false;
               }

        }//Permanent Home address

var telephone=document.getElementById('telephone').value.length;
      if(telephone==""){
                                var x=confirm("Are you sure you want to skip telephone number?");
                                if(x==false){
                                  document.getElementById('tele').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
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
                  document.getElementById('validatetelephone').innerHTML="<i style ='color: red;'> Must be exactly 7 digit for telephone numbers!</i>";
                return false;
               }

        }


var mobile=document.getElementById('mobile').value.length;
        if(mobile==""){
          document.getElementById('mobi').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";

        }else{
          if(mobile==11) {
                  document.getElementById('mobi').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatemobile').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatemobile').innerHTML="<i style ='color: red;'> Must be exactly 11 numbers digits for mobile number!</i>";
                return false;
               }

        }//Mobile


          



var birthplace=document.getElementById('birthplace').value.length;


         if(birthplace==""){
          document.getElementById('places').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{

             if(birthplace>=10 && birthplace<=35) {
                  document.getElementById('places').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatebirthplace').style.display = "none";
       
                
             
               }else{
                  document.getElementById('validatebirthplace').innerHTML="<i style ='color: red;'> Atleast 10 to 35 characters for birthplace!</i>";
                return false;
               }

        }//Birthplace

     


var guardianname = document.getElementById('guardianname').value.length;
        if(guardianname==""){
        document.getElementById('gname').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{
          if(guardianname>=2 && guardianname<=25) {
                  document.getElementById('gname').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validateguardianname').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validateguardianname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters for guardian name!</i>";
                return false;
               }
        }//Birthplace
        
var guardianaddress = document.getElementById('guardianaddress').value.length;
        if(guardianaddress==""){
        document.getElementById('gadd').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{
           if(guardianaddress>=10 && guardianaddress<=35) {
                  document.getElementById('gadd').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validateguardianaddress').style.display = "none";
       
                
             
               }else{
                  document.getElementById('validateguardianaddress').innerHTML="<i style ='color: red;'> Atleast 10 to 35 characters for guardian address!</i>";
                return false;
               }
        }//Birthplace


var guardiancontact = document.getElementById('guardiancontact').value.length;
        if(guardiancontact==""){
        document.getElementById('gcon').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
        return false;
        }else{
            if(guardiancontact==11) {
                  document.getElementById('gcon').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validateguardiancontact').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validateguardiancontact').innerHTML="<i style ='color: red;'> Must be exactly 11 digits for guardian contact!</i>";
                return false;
               }
        }//Birthplace

}






//VALIDATION FOR APPLICATIONUPDATE---------------------------------------------------------------------------------------------------------------------------- 
function freshmanapplicationupdate(){
var surname=document.getElementById('surname').value.length;

         if(surname==""){
          document.getElementById('sur').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{

                  if(surname>=2 && surname<=25) {
                  document.getElementById('sur').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatesurname').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatesurname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters for surname!</i>";
                return false;
               }

       

        }//Surname
        



var firstname=document.getElementById('firstname').value.length;
        if(firstname==""){
          document.getElementById('first').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{

          if(firstname>=2 && firstname<=25) {
                  document.getElementById('first').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatefirstname').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatefirstname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters for firstname!</i>";
                return false;
               }


        }//Firstname

var middlename=document.getElementById('middlename').value.length;
        if(middlename==""){ 
                                    
                                      var x = confirm("are you sure you want to skip the middle name text field?");
                                      if(x == false)
                                      {
                                      document.getElementById('middle').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
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
                  document.getElementById('validatemiddlename').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters for middlename!</i>";
                return false;
               }
          
        }

var permanent=document.getElementById('permanent').value.length;
        if(permanent==""){
          document.getElementById('per').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{
           if(permanent>=10 && permanent<=35) {
                  document.getElementById('per').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatepermanent').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatepermanent').innerHTML="<i style ='color: red;'> Atleast 10 to 35 characters for permanent home address!</i>";
                return false;
               }

        }//Permanent Home address

var telephone=document.getElementById('telephone').value.length;
      if(telephone==""){
                                var x=confirm("Are you sure you want to skip telephone number?");
                                if(x==false){
                                  document.getElementById('tele').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
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
                  document.getElementById('validatetelephone').innerHTML="<i style ='color: red;'> Must be exactly 7 digit for telephone numbers!</i>";
                return false;
               }

        }


var mobile=document.getElementById('mobile').value.length;
        if(mobile==""){
          document.getElementById('mobi').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";

        }else{
          if(mobile==11) {
                  document.getElementById('mobi').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatemobile').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validatemobile').innerHTML="<i style ='color: red;'> Must be exactly 11 numbers digits for mobile number!</i>";
                return false;
               }

        }//Mobile


          



var birthplace=document.getElementById('birthplace').value.length;


         if(birthplace==""){
          document.getElementById('places').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{

             if(birthplace>=10 && birthplace<=35) {
                  document.getElementById('places').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validatebirthplace').style.display = "none";
       
                
             
               }else{
                  document.getElementById('validatebirthplace').innerHTML="<i style ='color: red;'> Atleast 10 to 35 characters for birthplace!</i>";
                return false;
               }

        }//Birthplace

     


var guardianname = document.getElementById('guardianname').value.length;
        if(guardianname==""){
        document.getElementById('gname').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{
          if(guardianname>=2 && guardianname<=25) {
                  document.getElementById('gname').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validateguardianname').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validateguardianname').innerHTML="<i style ='color: red;'> Atleast 2 to 25 characters for guardian name!</i>";
                return false;
               }
        }//Birthplace
        
var guardianaddress = document.getElementById('guardianaddress').value.length;
        if(guardianaddress==""){
        document.getElementById('gadd').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{
           if(guardianaddress>=10 && guardianaddress<=35) {
                  document.getElementById('gadd').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validateguardianaddress').style.display = "none";
       
                
             
               }else{
                  document.getElementById('validateguardianaddress').innerHTML="<i style ='color: red;'> Atleast 10 to 35 characters for guardian address!</i>";
                return false;
               }
        }//Birthplace


var guardiancontact = document.getElementById('guardiancontact').value.length;
        if(guardiancontact==""){
        document.getElementById('gcon').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
        return false;
        }else{
            if(guardiancontact==11) {
                  document.getElementById('gcon').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                  document.getElementById('validateguardiancontact').style.display = "none";
                
                
             
               }else{
                  document.getElementById('validateguardiancontact').innerHTML="<i style ='color: red;'> Must be exactly 11 digits for guardian contact!</i>";
                return false;
               }
        }//Birthplace

}

function freshmanapplicationseekingupdate(){
var seeking=document.getElementById('seeking').value;
        if(seeking==""){

          document.getElementById('seek').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{
          document.getElementById('seek').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";

        }//School year


}


function freshmanapplicationbirthdateupdate(){

var months=document.getElementById('months').value;        
var days=document.getElementById('days').value;   
var years=document.getElementById('years').value;

        if((months && days && years) == ""){
          document.getElementById('birth').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

       }else{
           document.getElementById('birth').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
       }//birthdate
}



function freshmanapplicationgenderupdate(){
var gender=document.getElementById('gender').value;
        if(gender==""){
          document.getElementById('gen').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{
          document.getElementById('gen').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";

        }//Gender

}




function freshmanapplicationreligionupdate(){
var religion = document.getElementById('religion').value;
        if(religion==""){
        document.getElementById('reli').innerHTML="<span style ='color: red;' class='fa fa-hand-o-left'></span>";
          return false;

        }else{
          document.getElementById('reli').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";

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
                  var ret = ((keyCode >= 97 && keyCode <= 122) ||(keyCode == 164) ||(keyCode == 165)||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }  


                    //Text validation for firstname
                  function forfirstnameregistration(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                              // 97 – 122 (Lowercase Alphabets)    
                  var ret = ((keyCode >= 97 && keyCode <= 122) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              } 


              function forusernameregistration(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                          // 48 to 57 (Numbers),     97 – 122 (Lowercase Alphabets)    65 – 90 (Uppercase Alphabets)   
                  var ret = ((keyCode >= 48 && keyCode <= 57) ||(keyCode >= 97 && keyCode <= 122) ||  (keyCode >= 65 && keyCode <= 90) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }

                //Text validation for password
              function forpasswordregistration(e) {
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                           //48 to 57 (Numbers),        97 – 122 (Lowercase Alphabets)    65 – 90 (Uppercase Alphabets)  
                  var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 97 && keyCode <= 122) ||  (keyCode >= 65 && keyCode <= 90) ||(specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }  


               //Text validation for confirmpassword
              function forconfirmpasswordregistration(e) {
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                           //48 to 57 (Numbers),           97 – 122 (Lowercase Alphabets) 65 – 90 (Uppercase Alphabets) 
                  var ret = ((keyCode >= 48 && keyCode <= 57) ||  (keyCode >= 97 && keyCode <= 122) || (keyCode >= 65 && keyCode <= 90) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }  
                //Text validation for email
                function foremailregistration(e) {

                var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                         //48 to 57 (Numbers),        65 – 90 (Uppercase Alphabets)     97 – 122 (Lowercase Alphabets)     46-(. special character)           46-(@ special character)
                var ret = ((keyCode >= 48 && keyCode <= 57) ||  (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || (keyCode >= 46 && keyCode <= 46) ||(keyCode >= 64 && keyCode <= 64) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                document.getElementById("error").style.display = ret ? "none" : "inline";
                return ret;

            }
                    //Text validation for captcha
                 function forcaptcharegistration(e) {
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                           //48 to 57 (Numbers),   
                  var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
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
                  var ret = ((keyCode >= 97 && keyCode <= 122) ||(keyCode >= 164) ||(keyCode >= 165)||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }  


        //Text validation for firstname
       function forfirstname(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                          //      97 – 122 (Lowercase Alphabets) 164(enye lowercase)   165(enye uppercase)
                  var ret = ((keyCode >= 97 && keyCode <= 122) ||(keyCode >= 164) ||(keyCode >= 165)||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }  

      //Text validation for middlename
       function formiddlename(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                          //      97 – 122 (Lowercase Alphabets) 164(enye lowercase)   165(enye uppercase)
                  var ret = ((keyCode >= 97 && keyCode <= 122) ||(keyCode >= 164) ||(keyCode >= 165)||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }

       //Text validation for permanent
       function forpermanent(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                          //48 to 57 (Numbers),        97 – 122 (Lowercase Alphabets)  65 – 90 (Uppercase Alphabets)
                  var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 97 && keyCode <= 122) || (keyCode >= 65 && keyCode <= 90) || (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
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
                                          //48 to 57 (Numbers)      97 – 122 (Lowercase Alphabets) 
                  var ret = ((keyCode >= 48 && keyCode <= 57) ||  (keyCode >= 97 && keyCode <= 122) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }                                     

      //Text validation for guardianname
       function forguardianname(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                          // 97 – 122 (Lowercase Alphabets) 164(enye lowercase)   165(enye uppercase)
                  var ret = ((keyCode >= 97 && keyCode <= 122) ||(keyCode == 164) ||(keyCode == 165)||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }  


      //Text validation for guardianaddress
       function forguardianaddress(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                          //48 to 57 (Numbers),        97 – 122 (Lowercase Alphabets) 
                  var ret = ((keyCode >= 48 && keyCode <= 57) ||  (keyCode >= 97 && keyCode <= 122) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
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