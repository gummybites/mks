


<!DOCTYPE>
<html>
<head>


                    <title>Freshmen</title>
                    <link rel="stylesheet" href="../../css/bootstrap.min.css"></link>
                    <link rel="stylesheet" href="../../css/style.css"></link>

                    <script src="../../js/dropdown.js"></script>
                    <script src="../../js/bootstrap.min.js"></script>
                    <script src="../../js/jquery.1.11.1.js"></script>
                    <script src="../../js/bootstrap.js"></script>

<style>
                   
                    /* freshmen Section */  
                    #newstudents{
                     padding: 6%;
                    }
                    /* senior Section */  
                    #senior{
                     padding: 6%;
                    }
                    /* transferee Section */  
                    #transfer{
                     padding: 6%;
                    }
                    /* Old Section*/
                    #old{
                      padding: 6%;
                    }

                    #steps ul li{
                      list-style-type: none;
                      padding: 15px;

                    }

                    #scholar{

                      margin-top: 100px;
                    }

                    /* footer Section */  
                    #footer{
                     padding: 3%;

                    }

</style>


</head>
<body>




 <nav id="menu" class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
                MENU
                </button>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                MARIA KATRINA SCHOOL
                </a>
            </div>

           <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
            
            <ul class="nav navbar-nav navbar-right">
                
                <li><a href="../../index1.php?#home">Home</a></li>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Admissions
                        <span class="caret"></span></a>
                       <ul class="dropdown-menu" role="menu">
                           
                            <li class=""><a href="../admission_requirements.php?">Admission requirements</a></li>
                            <li class="divider"></li>
                            <li><a href="freshmen.php?">For Incoming Freshmen Students</a></li>
                          
                        
                        </ul>
                    </li>

                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        About us
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                           
                            <li class=""><a href="../about_mks.php?#history">MKS History</a></li>
                            <li class="divider"></li>
                            <li><a href="../about_mks.php?#goals">Goals and Objectives</a></li>
                             <li class="divider"></li>
                            <li><a href="../about_mks.php?#hymn">MKS Hymn</a></li>
                        </ul>
                    </li>

                <li><a href="">Links</a></li>
                 <li><a href="../../index1.php?#contact">Contact us</a></li>
                 <li><a href="../../index1.php?#photo">Gallery</a></li>




                </ul>
            </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>      	


 

	<div class="container-fluid main-container">
        <div class="col-md-10 content">

          <div id='steps'>
          <?php 
          $curYear= date('Y');
          $curYear2= date('Y')+1;
          $allyear= "$curYear - $curYear2";
      
          echo "<p>You are a first-year applicant if you've complete elementary during the $allyear academic year. If you have intention to enroll: 
          <br>Please read and follow the instruction carefully: </p>"
           ?>
          <ul>
            <li>Step 1: Before you apply: be sure to review our <a href="../admission_requirements.php?#requirement">requirements list</a> to make sure you have all the things you need for your application.</li>
            <li>Step 2: If you have all the requirements in the list you may now <a href="newstudentregister.php">register</a> to have an account to able to fill up the application form. 
               </li>
            <li>Step 3:If you already have an account please proceed <a href="newstudentform.php">login</a> and completely filled-out the Application form.
            <br>Please Note: It must be accurate, true and authentic information.</li>
            <li>Step 4:Once you have done, you may print the form and this will serve as your reference upon enrollment in the school. </a></li>
            <li>Step 5:You may now proceed to the Registrar's Office and ask for an entrance test and interview.For other details. View <a href="../admission_requirements.php?#procedure">admission procedure</a></li>
       

          </ul>

          <div id="scholar">
          <p>View Available <a href="scholarship.php">Scholarships</a> for New Students<p></div>
        </div>
       








        
        </div>


  		
</div> <!-- //Collect the nav links, forms, and other content for toggling -->




<div id="footer">

    <hr>
<p class=" pull-left">
    <?php 
        $curYear= Date('Y');

        echo "Copyright &COPY; $curYear <a href=''>MKS</a>";

    ?>
            
</p>
</div>





</body>
</html>
