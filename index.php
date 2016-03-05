<?php 
    include('./links/config.php');
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>sims-mks</title>

        <!-- Bootstrap Core CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Font Awesome CSS -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
		
	

        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">

     
        <!-- Custom Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

        <!-- Template js -->
        <script src="js/jquery-2.1.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/jquery.appear.js"></script>

        <script src="js/modernizr.custom.js"></script>
     

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <style>
    
.btn {
    font-size: 18px;
    display: inline-block;
    padding: 15px 30px;
    color: white;
    border: 2px solid transparent;
    border-radius: 2px;
    background: transparent;
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
}

.btn:hover,
.btn:focus {
    color: white;
}
.btn.btn-blue {
    background: #00a8ff;
}

.btn.btn-blue:hover {
    background: #31b9ff;
}

.btn.btn-blue-fill {
    color: #00a8ff;
    border-color: #00a8ff;
    background: transparent;
}

.btn.btn-blue-fill:hover {
    color: white;
    background: #00a8ff;
}
    </style>
    <body>
        
        <!-- Start Logo Section -->
        <section id="logo-section" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo text-center">
                            <h1>Student Information Management System</h1>
                            <h1></h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Logo Section -->
        
        
        <!-- Start Main Body Section -->
        <div class="mainbody-section text-center">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-3">
                        
                        <div class="menu-item blue">
                            <a href="#feature-modal" data-toggle="modal">
                                <i class="fa fa-laptop"></i>
                                <p>Online Registration</p>

                            </a>
                        </div>
                        
                        <div class="menu-item green">
                            <a href="#portfolio-modal" data-toggle="modal">
                                <i class="fa fa-file-text"></i>
                                <p>Admission</p>
                            </a>
                        </div>
                        
                        <div class="menu-item light-red">
                            <a href="#about-modal" data-toggle="modal">
                                <i class="fa fa-info-circle"></i>
                                <p>About MKS</p>
                            </a>
                        </div>
                        
                    </div>
                    
                    <div class="col-md-6">
                        
                        <!-- Start Carousel Section -->
                        <div class="home-slider">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="padding-bottom: 30px;">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="images/about-03.jpg" class="img-responsive" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="images/about-02.jpg" class="img-responsive" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="images/about-01.jpg" class="img-responsive" alt="">
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- Start Carousel Section -->
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="menu-item color responsive">
                                    <a href="#service-modal" data-toggle="modal">
                                        <i class="fa fa-phone-square"></i>
                                        <p>Contact</p>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="menu-item light-orange responsive-2">
                                    <a href="#team-modal" data-toggle="modal">
                                        <i class="fa fa-file-pdf-o"></i>
                                        <p>Application Form</p>
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                    <div class="col-md-3">
                        
                        <div class="menu-item light-red">
                            <a href="#contact-modal" data-toggle="modal">
                                <i class="fa fa-users"></i>
                                <p>Student Portal</p>
                            </a>
                        </div>
                        
                        <div class="menu-item color">
                            <a href="#testimonial-modal" data-toggle="modal">
                                <i class="fa fa-user"></i>
                                <p>Teacher Portal</p>
                            </a>
                        </div>
                        
                        <div class="menu-item blue">
                            <a href="#news-modal" data-toggle="modal">
                                <i class="fa fa-calendar"></i>
                                <p>Event/Annoucement</p>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Body Section -->
        
        <!-- Start Copyright Section -->
        <div class="copyright text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>SIMS-MKS | Developed by the Students of STI College-Caloocan | <a href="#"><?php  $curYear= Date('Y');
                                        echo "$curYear";
                                      ?></a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Section -->
        
        
        <!-- Start Feature Section -->
        <div class="section-modal modal fade" id="feature-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                
                <div class="container">
                    <div class="row">
                        <div class="section-title text-center">
                            <h3>Online Registration</h3>
                            <p></p>
                        </div>
                    </div>
                 
                    <div class="row">
                <div class="col-md-2 col-sm-6 col-xs-12">
                </div>    
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="team text-center">
                        <div class="cover" style="background:url('images/04.jpg'); background-position: center; background-size:cover;">
                            <div class="overlay text-center">
                            </div>
                        </div>
                        <div class="title">
                            <h4>Online Registration</h4>
                            <h5 class="muted regular">For Incoming Freshmen</h5>
                        </div>
                        <a href="./links/newstudent/freshmanregister.php" class="btn btn-blue-fill ripple">Register</a> 
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="team text-center">
                        <div class="cover" style="background:url('images/04.jpg'); background-position: center; background-size:cover;">
                            <div class="overlay text-center">
        
                            </div>
                        </div>
                        <div class="title">
                            <h4>Online Registration</h4>
                            <h5 class="muted regular">For Transferee</h5>
                        </div>
                        <a href="./links/newstudent/transfereeregister.php" class="btn btn-blue-fill ripple">Register</a>   
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                </div>
              
            </div><!-- /.row -->
                </div>
                
            </div>
        </div>
        <!-- End Feature Section -->
        
        
        
        <!-- Start Portfolio Section -->
        <div class="section-modal modal fade" id="portfolio-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                
                <div class="container">
                    <div class="row">
                        <div class="section-title text-center">
                            <h3>Admission requirements</h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="about-text">
                                <p></p>
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                    <h3>2.1 New students</h3>
                                        <ul>
                                            <li><i class="fa fa-check-square-o"></i>Birth Certificate, original copy if possible.</li>
                                            <li><i class="fa fa-check-square-o"></i>Form 138, original copy if possible.</li>
                                            <li><i class="fa fa-check-square-o"></i>1x1 picture will be taken at the school.</li>
                                            <li><i class="fa fa-check-square-o"></i>Good moral character certificate, original copy if possible.</li>
                                            <li><i class="fa fa-check-square-o"></i>Must have passed both written and oral examinations conducted by the admission office.</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                    <h3>2.2 Transferees</h3>
                                        <ul>
                                    
                                            <li><i class="fa fa-check-square-o"></i>No failing grades or dropped subjects</li>
                                            <li><i class="fa fa-check-square-o"></i>Need to pass the entrance exam</li>
                                            <li><i class="fa fa-check-square-o"></i>Birth Certificate, original copy if possible.</li>
                                            <li><i class="fa fa-check-square-o"></i>Form 138, original copy if possible.</li>
                                            <li><i class="fa fa-check-square-o"></i>1x1 picture will be taken at the school.</li>
                                            <li><i class="fa fa-check-square-o"></i>Good moral character certificate, original copy if possible.</li>
                                            <li><i class="fa fa-check-square-o"></i>Form 137, original copy if possible.</li>
                                        </ul>
                                    </div>
                                </div><!-- /.row -->
                            </div>
                        </div>
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="section-title text-center">
                            <h3>Admission procedures</h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="about-text">
                                <p></p>
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <ul>
                                            <li><i class="fa fa-check-square-o"></i>Pay testing fee at the Cashier's office.</li>
                                            <li><i class="fa fa-check-square-o"></i>Submit copy of Admission Form, photocopy of Form 138 and take a picture to the Admission Secretary</li>
                                            <li><i class="fa fa-check-square-o"></i>Get testing permit.</li>
                                            <li><i class="fa fa-check-square-o"></i>Take the Admission Exam.</li>
                                            <li><i class="fa fa-check-square-o"></i>If passed, take an interview.</li>
                                            <li><i class="fa fa-check-square-o"></i>After a week, get the final result.</li>
                                            <li><i class="fa fa-check-square-o"></i>If admitted, pass the oginal copy of Form 138.</li>
                                        </ul>
                                    </div>
                                  
                                </div><!-- /.row -->

                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                    <h3>Old students</h3>
                                        <ul>
                                            <li><i class="fa fa-check-square-o"></i>Submit Original Report Card at the Cashier's Office.</li>
                                            <li><i class="fa fa-check-square-o"></i>Proceed to the Cashier’s office for assessment and payment of fees.</li>
                                           
                                        </ul>
                                    </div>
                                  
                                </div><!-- /.row -->
                            </div>
                        </div>
                    </div><!-- /.row -->

                </div>
                
            </div>
        </div>
        <!-- End Portfolio Section -->
        
        
        <!-- Start About Us Section -->
        <div class="section-modal modal fade" id="about-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                
                <div class="container">
                    <div class="row">
                        <div class="section-title text-center">
                            <h3>About MKS</h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="about-text">
                            <h2>Welcome,</h2>
                                <p>We are indeed very grateful to have you back. Your stay here proved our as an institution where you can learn and at the same time enjoy what you are doing.

                                To our new students, we are welcoming you with open arms and hearts that you may consider Maria Katrina School your second home.

                                A lot of schools have been mushrooming nowadays and choosing to be at MKS is one thing we want you to be proud of. This school promises to mold you physically, morally, emotionally, socially, and intellectually through the different academic and cultural activities in store for you.

                                We believe that educations does not stop in a four-corner room so we also thought of putting up different clubs and organizations, which you may join. These aims to develop the various aspects of an individual to help them prepare themselves for a better tomorrow.

                                We encourage you to actively participate in the realization of the psychological dictum "Learning while Enjoying" in which you will find your stay here educationally fulfilling and personally satisfying.

                                We do hope that you will cooperate with us in all our endeavors.

                                God Bless!</p>
                              
                            </div>
                        </div>
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="about-text">
                            <h2>Beginnings</h2>
                                <p><h1 class="lead">Maria Katrina School</h1>
                                  <p> The year was 1996 when Mr. and Mrs. Camilon were offered to buy MIDES Learning Center, a preschool operated by Mrs. Luisa Garcia in a 312 sq.m. lot at Saog, Marilao, Bulacan.</p>
                                  <p>Armed with good business education and genuine love for children, this kind couple set forth to a determined endeavor of reviving the learning center and later developing it into an elementary school.</p>

                                   <h1 class="lead">Growth and Development</h1>
                                  <p>Maria Katrina School education recognizes each child as an individual in his own pattern of growth and development. The curriculum, therefore, provides rich and stimulating learning experiences, which enable him to
                                    acquire the maximum basic educational foundation and formation. </p>
                                <p>It gives due consideration of the child's attitudes in the process of his development into useful citizen of his country and an abiding child of God. Thus the
                                    program offers to train and turn out children who:</p>

                                    <ul>
                                        <li><i class="fa fa-check-square-o"></i> possess the basic understanding of their being children of a loving Father who is God himself;</li>
                                        <li><i class="fa fa-check-square-o"></i> have developed self-discipline even at an early age;</li>
                                        <li><i class="fa fa-check-square-o"></i> enjoy learning even at an early age;</li>
                                        <li><i class="fa fa-check-square-o"></i> have developed motor coordination and creativity through the varied experiences learned in school and at home; and</li>
                                        <li><i class="fa fa-check-square-o"></i> are able to interact and relate well with others.</li>
                                    </ul>
                              
                            </div>
                        </div>
                    </div><!-- /.row -->
                    <div class="row">
                    
                        <div class="col-md-12">
                            <div class="custom-tab">
                        
                                <ul class="nav nav-tabs nav-justified" role="tablist">
                                    <li class="active"><a href="#tab-1" role="tab" data-toggle="tab">Our Mission</a></li>
                                    <li><a href="#tab-2" role="tab" data-toggle="tab">Goals and Objectives</a></li>
                                    <li><a href="#tab-3" role="tab" data-toggle="tab">Our Vission</a></li>
                                </ul>

                                <div class="tab-content">

                                    <div class="tab-pane active" id="tab-1">
                                        <p>The Maria Katrina School adheres to the belief that it is through the quality of education a child gets that he is able to adapt himself to the changes of times; thus, preparing him to become a responsible citizen in the services of God and country.</p>
                                     </div>


                                    <div class="tab-pane" id="tab-2">
                                        <p>In June of 1997, the Learning Center, then catering to preschoolers and first graders, was named Maria Katrina School. Maria Katrina School started with 70 preschoolers and 20 grade I pupils, taught in improvised classrooms.</p>
                                        <p>Soon enough,the need for additional classroom was felt and a six classroom - two-storey building was erected in summer of 1998. On its second year, Maria Katrina School operated preschool and elementary education from Grade I to Grade VI pupils.</p>
                                        <p>The year 1999 is a very optimistic year for the Katrinians. Two additional rooms were built to accomodate an increasing population. Maria Katrina has yet to prove herself though, but she surely has gone a long way since her humble beginnings.</p>
                                    </div>


                                    <div class="tab-pane" id="tab-3">
                                        <br><p>"Yielding responsible citizens dedicated to the service of God and Country"..</p>
                                    </div>

                                </div><!-- /.tab-content -->

                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- End About Us Section -->
        
        
        <!-- Start Service Section -->
        <div class="section-modal modal fade" id="service-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                
                <div class="container">
                    <div class="row">
                        <div class="section-title text-center">
                            <h3>Contact</h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="row"><br><br><br><br><br><br><br><br><br><br>
                        
                        <div class="col-md-4">
                            <div class="footer-contact-info">
                                <h4>Location</h4>
                                <ul>
                                    <li><strong>School Address:</strong>#10 Mendoza St., Saog,, 3019 Marilao, Bulacan</li>
                                   
                                    <li><strong>Mobile :</strong>  09063710368</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="footer-social text-center">
                                <ul>
                                    <li><a href="https://web.facebook.com/MariaKatrinaSchool/?fref=ts"><i class="fa fa-facebook"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="footer-contact-info">
                                <h4>School Hours</h4>
                                <ul>
                                    <li><strong>Mon-Fri :</strong> 7 am to 5 pm</li>
                                      <li>Recognize by the government through the Department of Education.</li>
                                </ul>
                            </div>
                        </div>
                        
                    </div><!--/.row --> 
                </div>
            </div>
        </div>
        <!-- End Service Section -->
        
        
        <!-- Start Team Member Section -->
        <div class="section-modal modal fade" id="team-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                
                <div class="container">
                    <div class="row">
                        <div class="section-title text-center">
                            <h3>Application form</h3>
                            <p></p>
                        </div>
                    </div>
                    
                </div>
                <?php 
            
              $form="SELECT * from tbl_applicationform";
              $result=mysql_query($form);


              if(mysql_num_rows($result)>0){

                while($form=mysql_fetch_array($result)){

                    $db_newstudentform=$form['newstudentform'];
                    $db_transfereeform=$form['transfereeform'];


            

            ?>
            <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-4">
                    <div class="team text-center">
                        <div class="cover" style="background:url('images/pdf_icon.png'); background-size:cover;">
                            <div class="overlay text-center">
                            </div>
                        </div>
                        <div class="title">
                            <h4>Application Form</h4>
                            <h5 class="muted regular">For Freshmen</h5>
                        </div>
                        <a href='./applicationform/<?php echo $db_newstudentform ?>' download class="btn btn-blue-fill ripple">DOWNLOAD</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team text-center">
                        <div class="cover" style="background:url('images/pdf_icon.png'); background-size:cover;">
                            <div class="overlay text-center">
        
                            </div>
                        </div>
                        <div class="title">
                            <h4>Application Form</h4>
                            <h5 class="muted regular">For Transferee</h5>
                        </div>
                        <a href='./applicationform/<?php echo $db_transfereeform ?>' download class="btn btn-blue-fill ripple">DOWNLOAD</a>
                    </div>
                </div>
                <div class="col-md-2">

                </div>
            </div>
            <?php

                }

              }



        ?>
                
            </div>
        </div>
        <!-- End Team Member Section -->
        
        
        <!-- Start Latest News Section -->
        <div class="section-modal modal fade" id="news-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                                           <?php
                                           $event="SELECT * from tbl_event";
                                           $res_event=mysql_query($event);

                                           if(mysql_num_rows($res_event)>0){

                                           while($event=mysql_fetch_array($res_event)){
                                                        $eventimage1= $event['event1_image'];
                                                        $eventdate1= $event['event1_date'];
                                                        $eventtitle1= $event['event1_title'];
                                                        $eventdescription1= $event['event1_description'];


                                                        $eventimage2= $event['event2_image'];
                                                        $eventdate2= $event['event2_date'];
                                                        $eventtitle2= $event['event2_title'];
                                                        $eventdescription2= $event['event2_description'];


                                                        $eventimage3= $event['event3_image'];
                                                        $eventdate3= $event['event3_date'];
                                                        $eventtitle3= $event['event3_title'];
                                                        $eventdescription3= $event['event3_description'];

                                                   ?>
                <div class="container">
                    <div class="row">
                        <div class="section-title text-center">
                            <h3>Event and Announcement</h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="latest-post">
                                <img src="./photos/<?php echo $eventimage1?>" class="img-responsive" alt="" >
                                <h4><a href="#"><?php echo $eventtitle1?></a></h4>
                                <div class="post-details">
                                    <ul>
                                        <li><i class="fa fa-calendar"></i> <?php echo $eventdate1?></li>
                                    </ul>
                                </div>
                                <p><?php echo $eventdescription1?></p>
                                
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="latest-post">
                                <img src="./photos/<?php echo $eventimage2?>" class="img-responsive" alt="">
                                <h4><a href="#"><?php echo $eventtitle2?></a></h4>
                                <div class="post-details">
                                    <ul>
                                        <li><i class="fa fa-calendar"></i> <?php echo $eventdate2?></li>
                                    </ul>
                                </div>
                                <p><?php echo $eventdescription2?></p>
                                
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="latest-post">
                                <img src="./photos/<?php echo $eventimage3?>" class="img-responsive" alt="">
                                <h4><a href="#"><?php echo $eventtitle3?></a></h4>
                                <div class="post-details">
                                    <ul>
                                        <li><i class="fa fa-calendar"></i><?php echo $eventdate3?></li>
                                    </ul>
                                </div>
                                <p><?php echo $eventdescription3?></p>
                                
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="latest-post">
                                <img src="images/blog-04.jpg" class="img-responsive" alt="">
                                <h4><a href="#">Standard Post with Image</a></h4>
                                <div class="post-details">
                                    <ul>
                                        <li><i class="fa fa-user"></i> Auther : iThemesLab</li>
                                        <li><i class="fa fa-calendar"></i> 07 Aug, 2014</li>
                                        <li><i class="fa fa-tag"></i> Music</li>
                                    </ul>
                                </div>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.</p>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
                     <?php
                                                  }
                                                 }
                                             

                                           ?>
            </div>
        </div>
        <!-- End Latest News Section -->
        
        
        
        <!-- Start Contact Section -->
        <div class="section-modal modal fade contact" id="contact-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                
                <div class="container">
                    <div class="row">
                        <div class="section-title text-center">
                            <h3>Student portal</h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-4">
                           
                        </div>
                        
                        <div class="col-md-4">
                           
                        </div>
                        
                        <div class="col-md-4">
                          
                        </div>
                        
                    </div><!--/.row -->
                </div>
                
            </div>
        </div>
        <!-- End Contact Section -->
        
        
         <!-- Start Testimonial Section -->
        <div class="section-modal modal fade contact" id="testimonial-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                
                <div class="container">
                    <div class="row">
                        <div class="section-title text-center">
                            <h3>Teacher portal</h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-6">

                        </div>
                        
                        <div class="col-md-6">
 
                        </div>
                        
                        <div class="col-md-6">

                        </div>
                        
                        <div class="col-md-6">

                        </div>
                        
                    </div><!--/.row -->
                    
                </div>
                
            </div>
        </div>
        <!-- End Testimonial Section -->
        
    </body>
    
</html>