<?php 
	include('./links/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>SIMS-MKS</title>
	<!--Compatibility -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<!--Stylesheet for design -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

	 <!-- Custom styles for this template -->
	<link href="css/owl.carousel.css" rel="stylesheet">
	<link href="css/owl.theme.default.min.css"  rel="stylesheet">

	<script src="js/jquery.min.js"></script>
	<script src="js/modernizr.custom.js"></script>

		




</head>
<style>
.introduction {

  background: url(./images/b1.png); background-size:cover; color:#838383; font: 13px/1.7em 'Calibri';
}
.portal {

  background: url(./images/45.gif); background-size:cover; font: 13px/1.7em 'Calibri';
}

.team {
	margin: 80px 0;
	padding-bottom: 60px;
	background:white;	
	box-shadow: 0 12px 15px 10px rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
	border-radius: 3px;

}

.team .cover .overlay {
	height: 250px;
	padding-top: 60px;
	opacity: 0;
	background: rgba(0, 168, 255, 0.9);
	-webkit-transition: opacity 0.45s ease;
	transition: opacity 0.45s ease;
}

.team:hover .cover .overlay {
	opacity: 1;
}

.team .avatar {
	position: relative;
	z-index: 2;
	margin-top: -60px;
	border-radius: 50%;
}

.team .title {
	margin: 50px 0;
}

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


.box {
    border-radius: 3px;
    box-shadow: 0 12px 15px 10px rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    padding: 10px 25px;
    text-align: right;
    display: block;
    margin-top: 60px;
    background-color: white;
}
.box-icon {
     background:#f5af02;
    border-radius: 50%;
    display: table;
    height: 100px;
    margin: 0 auto;
    width: 100px;
    margin-top: -61px;
}
.box-icon span {
    color: #fff;
    display: table-cell;
    text-align: center;
    vertical-align: middle;
}
.info h4 {
    font-size: 26px;
    letter-spacing: 2px;
    text-transform: uppercase;
}
.info > p {
    color: #717171;
    font-size: 16px;
    padding-top: 10px;
    text-align: justify;
}
.info > a {
    background-color: #03a9f4;
    border-radius: 2px;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    color: #fff;
    transition: all 0.5s ease 0s;
}
.info > a:hover {
    background-color: #0288d1;
    box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.16), 0 2px 5px 0 rgba(0, 0, 0, 0.12);
    color: #fff;
    transition: all 0.5s ease 0s;
}
p {   word-wrap: break-word; }
</style>
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
        <li><a href="#home">Home</a></li>
        <li><a href="#registration">Registration</a></li>
        <li><a href="./links/admissionprocedure.php">Admission</a></li>
        <li><a href="./links/about_mks.php">About</a></li>
        <li><a href="#applicationform">Form</a></li>
        <li><a href="#portal">Portal</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>




<div class="banner" id="home">
	<div class="banner-top">
			<div class="heading">MARIA KATRINA SCHOOL</div>
	</div>
	</div><!--This is for mks home page banner -->


<!--online registration-->	
	<div id="registration" class="registration">
		<div class="container">

			<div class="row">
				<div class="col-md-2">
				
				</div>
				<div class="col-md-4">
					<div class="team text-center">
						<div class="cover" style="background:url('images/3.jpg'); background-size:cover;">
							<div class="overlay text-center">
							</div>
						</div>
						<div class="title">
							<h4>Online Registration</h4>
							<h5 class="muted regular">For Freshmen</h5>
						</div>
						<a href="./links/newstudent/freshmanregister.php" class="btn btn-blue-fill ripple">Register</a>	
					</div>
				</div>
				<div class="col-md-4">
					<div class="team text-center">
						<div class="cover" style="background:url('images/2.jpg'); background-size:cover;">
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
				<div class="col-md-2">
				
				</div>
			</div>
		</div>
	</div>
<!--online registration-->	





<!-- introduction -->
	<div class="introduction">
		<div class="container">
			<!--Mks Event -->
			<div class="col-md-6">
				<h2>Welcome!</h2>
				 			  <p>
						      We are indeed very grateful to have you back. Your stay here proved our as an institution where you can learn and at the same time enjoy what you are doing.
						      </p> 
						      <p>
						      To our new students, we are welcoming you with open arms and hearts that you may consider Maria Katrina School your second home.
						      </p> 
						      <p>
						      A lot of schools have been mushrooming nowadays and choosing to be at MKS is one thing we want you to be proud of. This school promises to mold you physically, morally, emotionally, socially, and intellectually through the different academic and cultural activities in store for you.
						      </p> 
						      <p>
						      We believe that educations does not stop in a four-corner room so we also thought of putting up different clubs and organizations, which you may join. These aims to develop the various aspects of an individual to help them prepare themselves for a better tomorrow.
						      </p>
						      <p>
						      We encourage you to actively participate in the realization of the psychological dictum "Learning while Enjoying" in which you will find your stay here educationally fulfilling and personally satisfying.
						      </p>
						      <p>
						      We do hope that you will cooperate with us in all our endeavors.
						      </p> 
						      <p>
						      God Bless!
						      </p>
			</div>
		<div class="col-md-6">
				
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
                                                    <ul class="event-list">
	                                                      <li>
	                                                        <time datetime="2014-07-20">
	                                                  
	                                                          
	                                                          <i class="fa fa-calendar fa-fw fa-5x" ></i>
	                                                          <h5>D/M/Y</h5>
	                                                   		  <h5><?php echo $eventdate1?></h5>
	                                                        
	                                                        </time>
	                                                       <img alt="Event1" src="./photos/<?php echo $eventimage1?>" />
	                                                        <div class="info">
	                                                          <p class="title"><?php echo $eventtitle1?></p>
	                                                          <p class="desc"><?php echo $eventdescription1?>
	                                                       
	                                                          </p>
	                                                        </div>
	                                                      </li>

                                                       <li>
															<time datetime="2014-07-20 0000">
															
															  <i class="fa fa-calendar fa-fw fa-5x" ></i>
	                                                          <h5>D/M/Y</h5>
	                                                   		  <h5><?php echo $eventdate2?></h5>
															
															</time>
															<img alt="Event2" src="./photos/<?php echo $eventimage2?>" />
															<div class="info">
																<p class="title"><?php echo $eventtitle2?></p>
	                                                          <p class="desc"><?php echo $eventdescription2?>
															</div>
														</li>


														<li>
															<time datetime="2014-07-20 2000">
															  <i class="fa fa-calendar fa-fw fa-5x" ></i>
	                                                          <h5>D/M/Y</h5>
	                                                   		  <h5><?php echo $eventdate3?></h5>
															</time>
															<img alt="Event3" src="./photos/<?php echo $eventimage3?>" />
															<div class="info">
																<p class="title"><?php echo $eventtitle3?></p>
	                                                          <p class="desc"><?php echo $eventdescription3?>
															</div>
														</li>
                                                      </ul>
                                                      <?php
                                                  }
                                                 }
                                             

                                           ?>
                                          	
                                              
			</div>

		
			
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- skills -->


<!--online registration-->	
	<div id="applicationform" class="applicationform">
		<div class="container">

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
<!--online registration-->	







<div id="portal" class="portal">
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="box">
                <div class="box-icon">
                    <span class="fa fa-4x fa-html5"></span>
                </div>
                <div class="info">
                    <h4 class="text-center">Student Portal</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti atque, tenetur quam aspernatur corporis at explicabo nulla dolore necessitatibus doloremque exercitationem sequi dolorem architecto perferendis quas aperiam debitis dolor soluta!</p>
                    <a href="" class="btn btn-blue-fill ripple">Login</a>
                </div>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="box">
                <div class="box-icon">
                    <span class="fa fa-4x fa-css3"></span>
                </div>
                <div class="info">
                    <h4 class="text-center">Teacher Portal</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti atque, tenetur quam aspernatur corporis at explicabo nulla dolore necessitatibus doloremque exercitationem sequi dolorem architecto perferendis quas aperiam debitis dolor soluta!</p>
                    <a href="" class="btn btn-blue-fill ripple">Login</a>
                </div>
            </div>
        </div>
	</div>
</div>
</div>





<!-- footer -->
	<div id="contact" class="footer" id="footer">
		<div class="container">
			<div class="col-md-3 footer-left">
				<h3>Location</h3>
				<ul>
					<li><a href="#"><span></span>#10 Mendoza St., Saog,, 3019 Marilao, Bulacan</a></li>
					 <li><a href="#"><span></span>Recognize by the government through the Department of Education.</a></li>

				</ul>
			</div>
			<div class="col-md-3 footer-left">
				<h3>Contact</h3>
				<ul>
					<li><a href="#"><span></span><i class="glyphicon glyphicon-phone"></i> 09063710368</a></li>
				</ul>
			</div>
			<div class="col-md-3 footer-left">
				<h3>School hours</h3>
				<ul>
				<li><a href="#"><span></span>Monday-Friday:	07:00am - 5:00pm</a></li>
				</ul>
					<div class="clearfix"> </div>
			</div>
			
				<div class="col-md-12">
				<div class="foot-bottom">
					<p>SMIS-MKS | Developed by the Students of STI College-Caloocan | <a href="#"><?php  $curYear= Date('Y');
                                        echo "$curYear";
                                      ?></a></p>
				</div>
				</div>
		
	</div>
	</div>
<!-- footer -->


		


		<script src="js/jquery.1.11.1.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/mooz.themes.scripts.js"></script>
</body>
</html>