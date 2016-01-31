
        <?php 
        include('config.php');
        if(isset($_POST['login'])) 
        {
            $userName = mysql_real_escape_string(trim(htmlspecialchars($_POST['username'])));
            $pass =  mysql_real_escape_string(trim(htmlspecialchars($_POST['password'])));
            $enc_password=mysql_real_escape_string(trim(htmlspecialchars(sha1(md5($pass)))));


        $qry ="SELECT * FROM tbl_registrar WHERE username = '$userName'";
        $result = mysql_query($qry);
        while($qry = mysql_fetch_array($result)){
            $db_id=$qry['id'];
            $db_password=$qry['password'];
            $db_username=$qry['username'];
        }

        if($userName==$db_username){

        if($enc_password==$db_password){
        session_start();
        $_SESSION['id'] = $db_id;

                        if(($_POST['remember']) == 'on'){
                            $expire = time()+86400;
                            setcookie('mks', $_SESSION['id'], $expire);
                        }

        header("Location:registrar.php");
      
        }else{
          header( "Location: registrarlogin.php?PleaseInputcorrectpassword=error!");  


        }
      }else{

          header( "Location: registrarlogin.php?PleaseInputvalidUsername=error!");  
      }


      }


        ?>
                 

<?php

if(isset($_COOKIE['mks'])){


   include ('session.php');

}else{

?>


<!DOCTYPE html>
<html>
<title>
Admin Login
</title>

                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <link rel="stylesheet" href="../../css/bootstrap.min.css"></link>

                    <script src="../../js/jquery.1.11.1.js"></script>
                    <script src="../../js/bootstrap.js"></script>
                    <script src="../../js/dropdown.js"></script>
                    <script src="../../js/bootstrap.min.js"></script>
<head>
<style>
        body{

          background-image: url('../../img/registrar.png');
        }

          #password-addon{
                      border-left: none;
                       background-color: #fff;
                       border-color: #d9edf7;
                    }
          #password{
                      border-right: none;
                      box-shadow: none;
                      border-color: #d9edf7;

                    }

          #username-addon{
                      border-left: none;
                       background-color: #fff;
                       border-color: #d9edf7;

                    }
          #username{
                      border-right: none;
                      box-shadow: none;
                      border-color: #d9edf7;
                    }

            button.btn {
              height: 50px;
                margin: 0;
                padding: 0 20px;
                vertical-align: middle;
                background: #de995e;
                border: 0;
                font-family: 'Roboto', sans-serif;
                font-size: 16px;
                font-weight: 300;
                line-height: 50px;
                color: #fff;
                -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px;
                text-shadow: none;
                -moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;
                -o-transition: all .3s; -moz-transition: all .3s; -webkit-transition: all .3s; -ms-transition: all .3s; transition: all .3s;
            }

            button.btn:hover { opacity: 0.6; color: #fff; }

            button.btn:active { outline: 0; opacity: 0.6; color: #fff; -moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none; }

            button.btn:focus { outline: 0; opacity: 0.6; background: #de995e; color: #fff; }

            button.btn:active:focus, button.btn.active:focus { outline: 0; opacity: 0.6; background: #de995e; color: #fff; }





            /***** Top content *****/

            .inner-bg {
                padding: 100px 0 170px 0;
            }

            .top-content .text {
                color: #fff;
            }

            .top-content .text h1 { color: #fff; }


            .form-box {
                margin-top: 35px;
            }

            .form-top {
                overflow: hidden;
                padding: 0 25px 15px 25px;
                background: #fff;
                -moz-border-radius: 4px 4px 0 0; -webkit-border-radius: 4px 4px 0 0; border-radius: 4px 4px 0 0;
                text-align: left;
            }

            .form-top-left {
                float: left;
                width: 75%;
                padding-top: 25px;
            }

            .form-top-left h3 { margin-top: 0; }

            .form-top-right {
                float: left;
                width: 25%;
                padding-top: 5px;
                font-size: 66px;
                color: #ddd;
                line-height: 100px;
                text-align: right;
            }

            .form-bottom {
                padding: 25px 25px 30px 25px;
                background: #eee;
                -moz-border-radius: 0 0 4px 4px; -webkit-border-radius: 0 0 4px 4px; border-radius: 0 0 4px 4px;
                text-align: left;
            }

            .form-bottom form textarea {
                height: 100px;
            }

            .form-bottom form button.btn {
                width: 100%;
            }



            /***** Media queries *****/

            @media (min-width: 992px) and (max-width: 1199px) {}

            @media (min-width: 768px) and (max-width: 991px) {}

            @media (max-width: 767px) {
                
                .inner-bg { padding: 60px 0 110px 0; }

            }

            @media (max-width: 415px) {
                
                h1, h2 { font-size: 32px; }

            }
</style>


</head>

<script type="text/javascript">

function register(){
    var username= document.getElementById('username').value;
    var password= document.getElementById('password').value;
  


        
    if(username==""){
                          document.getElementById('user').innerHTML="<span style ='color: red;' class='glyphicon glyphicon-exclamation-sign'></span>";
                          return false;

                        }else{
                           document.getElementById('user').innerHTML="<span style ='color: green;' class='glyphicon glyphicon-ok'></span>";

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
        function forusername(e) {

            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                     //48 to 57 (Numbers),       65 – 90 (Uppercase Alphabets) a      97 – 122 (Lowercase Alphabets)    
            var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;

        }


      //Text validation for password
       function forpassword(e) {
                  var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode; 
                                           //48 to 57 (Numbers),       65 – 90 (Uppercase Alphabets) a      97 – 122 (Lowercase Alphabets)
                  var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) ||  (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
                  document.getElementById("error").style.display = ret ? "none" : "inline";
                  return ret;

              }  
</script>
<body>

<!-- Top content -->
        <div class="top-content">
          
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1>REGISTRAR</h1>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                          <div class="form-top">
                            <div class="form-top-left">
                              <h3> LOGIN FORM</h3>
                              <i  id="error" style="color: Red; display: none"></i>
                            </div>
                            <div class="form-top-right">
                              <i class="fa fa-lock"></i>
                            </div>
                            </div>
                            <div class="form-bottom">
                          <form role="form" onsubmit="return register(event)" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" autocomplete="on" method="post" class="login-form">
                           
                           <?php
                             if(isset($_GET['PleaseInputcorrectpassword'])){
                                echo "<div class='row'>
                                            <div class='col-md-12'>
                                                <div class='alert alert-danger'>
                                                <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                                <span class='glyphicon glyphicon-'></span>Invalid! Please type your correct password!</div>
                                                </div></div>";

                              }elseif(isset($_GET['PleaseInputvalidUsername'])){
                                echo "<div class='row'>
                                            <div class='col-md-12'>
                                                <div class='alert alert-danger'>
                                                <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                                <span class='glyphicon glyphicon-'></span>Invalid! Please type your valid Username!</div>
                                                </div></div>";

                              }

                               ?> 


                            <div class="form-group">
                              
                              <label class="sr-only" for="form-username">Username</label>
                               <div class="input-group input-group-lg">
                               <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-lock"></span>
                                </span>
                                <input id="username" class='form-control' name="username"  type="text"  maxlength="15" placeholder="Your username here.." value="" class="form-username form-control" onkeypress="return forusername(event);" ondrop="return false;" onpaste="return false;">
                                <span id='username-addon' class="input-group-addon">
                                               <i id='user'></i>
                                </span>
                              </div>
                              </div>


                              <div class="form-group">
                              
                                <label class="sr-only" for="form-password">Password</label>
                                <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-lock"></span>
                                </span>
                                <input id="password" class='form-control' name="password"  maxlength="15" type="password" placeholder="Your password here.." value="" class="form-password form-control" onkeypress="return forpassword(event);" ondrop="return false;" onpaste="return false;">
                                <span id='password-addon' class="input-group-addon">
                                               <i id='pass'></i>  
                                </span>
                                </div>
                              </div>
                              <button type="submit" class="btn" name="login">Login</button>

                              <input type='checkbox' name='remember'> Remember me
                          </form>
                        </div>
                        </div>
                    </div>
                  
                </div>
            </div>
            
        </div>
     

</body>
</html>


 <?php }?>     