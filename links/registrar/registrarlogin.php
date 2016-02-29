
        <?php 
        include('../config.php');
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

        $qry="SELECT id from tbl_registrar";
        $res=mysql_query($qry);
                             if(mysql_num_rows($res) > 0) 
                              {
                              
                              if(($_POST['remember']) == 'on'){
                              $expire = time()+86400;
                              setcookie('mks', $_SESSION['id'], $expire);
                              }
                              date_default_timezone_set('Asia/Manila');
                              $curYear= Date('F d, Y, g:i:a');  
                              mysql_query("UPDATE tbl_registrar set time_in='$curYear' where id='$db_id'");                

                              header("Location:registrar.php");
                              }

                     
      
        }else{
          header( "Location: registrarlogin.php?InvalidUsernameOrPassword");  


        }
      }else{

          header( "Location: registrarlogin.php?InvalidUsernameorPassword");  
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
<head>

                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Registrar Login Account</title>
                    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"  rel="stylesheet" type="text/css">
                    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css"  rel="stylesheet" type="text/css">
                    <link rel="stylesheet" href="../../css/style.css"  rel="stylesheet" type="text/css">
                    <link rel="stylesheet" href="../../css/font-awesome.css"  rel="stylesheet" type="text/css">
                     <link rel="stylesheet" href="../../css/font-awesome.min.css"  rel="stylesheet" type="text/css">

                     <link href="../../css/animate.css" rel="stylesheet">
                    <script src="../../js/jquery-2.1.1.min.js"></script>
                    <script src="../../bootstrap/js/bootstrap.min.js"></script>
                    <script src="../../js/validation.js"></script>
                    <script src="../../js/jquery.appear.js"></script>
                    <script src="../../js/modernizr.custom.js"></script>

<style>
              
          body{

                    background: url(../../images/45.gif); background-size: cover;  font: 15px/1.7em 'Calibri';
                    }


                      #panel{
                      box-shadow: 10px 10px 5px #888888;;
                    

                    }

                    /* Shutter Out Horizontal */
                     .next {
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
                    .next:before {
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

                    .next:hover, .next:focus, .next:active {
                          color: #fff;
                        }
                        .next:hover:before, .next:focus:before, .next:active:before {
                          -webkit-transform: scaleX(1);
                          transform: scaleX(1);
                        }
</style>
</head>

<body>

  <nav class="navbar-inner navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    
      <a class="navbar-brand" href="#">MKS</a>
    </div>
  </div><!-- /.container-fluid -->
</nav>


        <div class="container">
     <br><br>                                                     

                                                       <div class="row">
                                                             
                                                              <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                                                                      <div class="panel panel-default" id="panel">
                                                                          <div class="panel-heading">
                                                                      <b>   (*) Note: Required Fields </b>  
                                                                          </div>
                                                                          <div class="panel-body">
                                                                          <h2>REGISTRAR LOGIN</h2>
                                                                            <div align="center"> <img src="../../images/secure.png" height="100px" width="100px"></div>
                                                                               <h4>Please provide your details</h4>
                                                                              <form role="form" method="POST" onsubmit="return freshmanlogin()"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                                                                      
                                                                                      <?php if(isset($_GET['InvalidUsernameOrPassword'])){
                                                                                              ?>
                                                                                              <div style='color: red;'>Invalid Username or Password...</div>
                                                                                              <?php
                                                                                        }elseif(isset($_GET['InvalidUsernameorPassword'])){
                                                                                              ?>
                                                                                              <div style='color: red;'>Invalid Username or Password...</div>
                                                                                              <?php



                                                                                          } ?>

                                                                                      <i  id="error" style="color: Red; display: none"></i>

                                                                                      <div class="form-group input-group"><!--Username Validation -->
                                                                                      <i id='validateusername' ></i>
                                                                                      <i id='user'></i>
                                                                                      </div>
                                                                                      
                                                                                      <input type='text' value='' class='form-control input' maxlength='25'  onkeypress="return forusernamelogin(event);" ondrop="return false;" onpaste="return false;" id='username' name='username' placeholder="Your Username *"/>
                                                                                  



                                                                                      <div class="form-group input-group"><!--Password Validation -->
                                                                                      <i id='validatepassword' ></i>
                                                                                      <i id='pass'></i>
                                                                                      </div>
                                                                                    
                                                                                      <input type='password' value='' maxlength="25" class='form-control'  onkeypress="return forpasswordlogin(event);" ondrop="return false;" onpaste="return false;" id='password' name='password' placeholder='Your password *'/>
                                                                                



                                                                                      
                                                                                      <input type='checkbox' name='remember'> Remember me
                                                                                  <button type="submit"  name="login" class="next" value="Submit"   >Login</button>
                                                                                  
                                                                                  <hr />
                                                                                
                                                                                  </form>
                                                                          </div>
                                                                         
                                                                      </div>
                                                                  </div>
                                                              
                                                              
                                                      </div>
                                                  </div>
     

</body>
</html>


 <?php }?>     