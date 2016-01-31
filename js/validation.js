function freshmanlogin(){
    var email= document.getElementById('email').value;
    var password= document.getElementById('password').value;
    var re = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;


        
    if(email==""){
      document.getElementById('mail').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
      return false;
    }else{

              if (!email.match(re)) {

                document.getElementById('validateemail').innerHTML="<i style ='color: red;'>Verify the e-mail address format.</i>";
                return false;  
            }else{

                 document.getElementById('mail').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";

            } 
    }


   
       

                        if(password==""){
                          document.getElementById('pass').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
                          return false;

                        }else{
                           document.getElementById('pass').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";

                        }

    
    }


        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        specialKeys.push(9); //Tab
        specialKeys.push(46); //Delete
        specialKeys.push(36); //Home
        specialKeys.push(35); //End
        specialKeys.push(37); //Left
        specialKeys.push(39); //Right



        //Text validation for email
        function foremail(e) {

            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                     //48 to 57 (Numbers),       97 – 122 (Lowercase Alphabets)     46-(. special character)
            var ret = ((keyCode >= 48 && keyCode <= 57) ||  (keyCode >= 97 && keyCode <= 122) ||(keyCode >= 46 && keyCode <= 46) ||(keyCode >= 64 && keyCode <= 64) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;

        }


      //Text validation for password
       function forpassword(e) {
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                           //48 to 57 (Numbers),            97 – 122 (Lowercase Alphabets)
                  var ret = ((keyCode >= 48 && keyCode <= 57) ||  (keyCode >= 97 && keyCode <= 122) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
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



function freshmanregister(){

var email=document.getElementById('email').value;
var re = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
var password1=document.getElementById('password').value;
var password=document.getElementById('password').value.length;
var cpassword=document.getElementById('confirmpassword').value;
var captcha=document.getElementById('captcha').value.length;



if(email==""){
  document.getElementById('mail').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
  return false;
}else{
            if (!email.match(re)) {

                document.getElementById('validateemail').innerHTML="<i style ='color: red;'>Verify the e-mail address format.</i>";
                return false;  
            }else{
               document.getElementById('validateemail').style.display = "none";
               document.getElementById('mail').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
            } 
}



if(password==""){
  document.getElementById('pass').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
  return false;

}else{


          if(password>=6 && password<=12) {
            document.getElementById('pass').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
   
                document.getElementById('validatepassword').style.display = "none";
                
             
               }else{
                  document.getElementById('validatepassword').innerHTML="<i style ='color: red;'>Must be between 6 and 12!</i>";
                return false;
               }
}




if(cpassword==""){
  document.getElementById('cpass').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
  return false;

}else{



               if(cpassword==password1|| password1==cpassword){
                    document.getElementById('cpass').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
                    document.getElementById('validateconfirmpassword').style.display = "none";

                  }else{

                      
                      document.getElementById('cpass').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-remove'></span>";
                       document.getElementById('validateconfirmpassword').innerHTML="<i style ='color: red;'>Password doesn't match!</i>";
                      return false;
                  }

}



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


  
if(captcha==""){
  document.getElementById('cap').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
  return false;

}else{
    if(captcha==4) {
      document.getElementById('cap').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";
    }else{
      document.getElementById('validatecaptcha').innerHTML="<i style ='color: red;'>Must be exactly 4 digits!</i>";
      return false;
    }
  

}




}
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        specialKeys.push(9); //Tab
        specialKeys.push(46); //Delete
        specialKeys.push(36); //Home
        specialKeys.push(35); //End
        specialKeys.push(37); //Left
        specialKeys.push(39); //Right

        //Text validation for email
        function foremail(e) {

            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                     //48 to 57 (Numbers),           97 – 122 (Lowercase Alphabets)     46-(. special character)
            var ret = ((keyCode >= 48 && keyCode <= 57) ||  (keyCode >= 97 && keyCode <= 122) ||(keyCode >= 46 && keyCode <= 46) ||(keyCode >= 64 && keyCode <= 64) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;

        }

        //Text validation for password
       function forpassword(e) {
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                           //48 to 57 (Numbers),        97 – 122 (Lowercase Alphabets)
                  var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 97 && keyCode <= 122) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }  

              //Text validation for confirmpassword
       function forconfirmpassword(e) {
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                           //48 to 57 (Numbers),           97 – 122 (Lowercase Alphabets)
                  var ret = ((keyCode >= 48 && keyCode <= 57) ||  (keyCode >= 97 && keyCode <= 122) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }  


               function forsurname(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                          //       97 – 122 (Lowercase Alphabets) 164(enye lowercase)   165(enye uppercase)
                  var ret = ((keyCode >= 97 && keyCode <= 122) ||(keyCode == 164) ||(keyCode == 165)||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }  


        //Text validation for firstname
       function forfirstname(e){
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                          //      97 – 122 (Lowercase Alphabets) 164(enye lowercase)   165(enye uppercase)
                  var ret = ((keyCode >= 97 && keyCode <= 122) ||(keyCode == 164) ||(keyCode == 165)||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              } 
          //Text validation for captcha
       function forcaptcha(e) {
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                           //48 to 57 (Numbers),   
                  var ret = ((keyCode >= 48 && keyCode <= 57) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
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





function freshmanapplication(){

var year=document.getElementById('year').value;
        if(year==""){
          document.getElementById('sy').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
          return false;

        }else{
          document.getElementById('sy').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";

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
                                          //48 to 57 (Numbers),        97 – 122 (Lowercase Alphabets) 
                  var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 97 && keyCode <= 122) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
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

function myFunction(){


                                                                  
  window.print();
}