<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		
		<!-- Favicons (created with http://realfavicongenerator.net/)-->
			<link rel="apple-touch-icon" sizes="57x57" href="img/favicons/apple-touch-icon-57x57.png">
			<link rel="apple-touch-icon" sizes="60x60" href="img/favicons/apple-touch-icon-60x60.png">
			<link rel="icon" type="image/png" href="img/favicons/favicon-32x32.png" sizes="32x32">
			<link rel="icon" type="image/png" href="img/favicons/favicon-16x16.png" sizes="16x16">
			<link rel="manifest" href="img/favicons/manifest.json">
			<link rel="shortcut icon" href="img/favicons/favicon.ico">
			<meta name="msapplication-TileColor" content="#00a8ff">
			<meta name="msapplication-config" content="img/favicons/browserconfig.xml">
			<meta name="theme-color" content="#ffffff">



		<title>MKS: MARIA KATRINA SCHOOL</title>
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
	
		<!-- Custom styles for this template -->
		<link href="css/owl.carousel.css" rel="stylesheet">
		<link href="css/owl.theme.default.min.css"  rel="stylesheet">
		
	</head>
	<style>
		body {
	margin: 0px;
	font-family: "Open Sans", Sans-serif;
}

h1,
h2,
h3,
h4,
h5,
h6 {
	font-weight: 300;
	letter-spacing: 0.4px;
	font-family: "Open Sans", Sans-serif;
	color: #232323;
}

p {
	font-family: 'Roboto', sans-serif;
	font-size: 15px;
	font-weight: 300;
	line-height: 23px;
	letter-spacing: 0.2px;
	color: #797979;
}

.dark-bg p {
color: #B1B1B1;	
}


.intro-tables {
	top: -130px;
	position: relative;
}

.intro-table {
	-webkit-background-size: cover;
	background-size: cover;
	background-repeat: repeat;
	background-position: 0% 0%;
}

.intro-table-first {
	background-image: url('img/04.jpg');

}

.intro-table-hover {
	-webkit-transition: background-image 0.3s ease, background-position 0.3s;
	transition: background-image 0.3s ease, background-position 0.3s;
	background-image: url('img/04.jpg');

}

.intro-table-hover h4 {
	-webkit-transform: translateY(170px);
	transform: translateY(170px);
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
}

.intro-table-hover:hover {
	background-image: url('img/04.jpg');
	background-position: 50% 50%;
}

.intro-table-third {
	background-image: url('img/04.jpg');
}

.intro-table-hover .expand {
	margin: 30px;
	margin-top: 120px;
	opacity: 0;
	-webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
	transition: transform 0.3s ease, opacity 0.3s;
	-webkit-transform: scale(0.6);
	-ms-transform: scale(0.6);
	transform: scale(0.6);
}

.intro-table-hover:hover h4 {
	-webkit-transform: translateY(0);
	transform: translateY(0);
}

.intro-table-hover:hover .expand {
	opacity: 1;
	-webkit-transform: scale(1);
	-ms-transform: scale(1);
	transform: scale(1);
}

.intro-table-hover .hide-hover {
	-webkit-transition: opacity 0.3s ease;
	transition: opacity 0.3s ease;
}

.intro-table-hover:hover .hide-hover {
	opacity: 0;
}

.intro-tables .intro-table {
	position: relative;
	width: 100%;
	height: 300px;
	margin: 20px 0;
}

.intro-tables .intro-table .heading {
	margin: 0;
	padding: 30px;
}

.intro-tables .intro-table .small-heading {
	margin: 0;
	padding: 0 30px;
}

.intro-tables .intro-table .bottom {
	position: absolute;
	bottom: 0;
}

.intro-tables .intro-table .owl-schedule .schedule-row {
	padding: 10px 30px;
	color: white;
	transition: all 0.3s ease;
}

.owl-schedule .schedule-row:not(:last-child) {
	border-bottom: 1px solid rgba(255, 255, 255, 0.4);
}

.owl-testimonials .author {
	margin-top: 50px;
}

.ripple-effect {
	position: absolute;
	width: 50px;
	height: 50px;
	border-radius: 50%;
	background: white;
	-webkit-animation: ripple-animation 2s;
	animation: ripple-animation 2s;
}

@-webkit-keyframes ripple-animation {
	from {
		opacity: 0.2;
		-webkit-transform: scale(1);
		transform: scale(1);
	}
	to {
		opacity: 0;
		-webkit-transform: scale(100);
		transform: scale(100);
	}
}

@keyframes ripple-animation {
	from {
		opacity: 0.2;
		-webkit-transform: scale(1);
		transform: scale(1);
	}
	to {
		opacity: 0;
		-webkit-transform: scale(100);
		transform: scale(100);
	}
}

.regular {
	font-weight: 600;
}

.white {
	color: white;
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

.btn.btn-white-fill {
	color: #fff;
	border-color: #fff;
	background: transparent;
}

.btn.btn-white-fill:hover {
	color: #00a8ff;
	background: #fff;
}

.ripple-effect {
	position: absolute;
	width: 50px;
	height: 50px;
	border-radius: 50%;
	background: white;
	-webkit-animation: ripple-animation 2s;
	animation: ripple-animation 2s;
}

@-webkit-keyframes ripple-animation {
	from {
		opacity: 0.2;
		-webkit-transform: scale(1);
		transform: scale(1);
	}
	to {
		opacity: 0;
		-webkit-transform: scale(100);
		transform: scale(100);
	}
}

@keyframes ripple-animation {
	from {
		opacity: 0.2;
		-webkit-transform: scale(1);
		transform: scale(1);
	}
	to {
		opacity: 0;
		-webkit-transform: scale(100);
		transform: scale(100);
	}
}

a:hover, a:focus, a:active, a.active {
	color: #fec503;
}
a, a:hover, a:focus, a:active, a.active {
	outline: 0;
}

::selection {
	text-shadow: none;
	background: #fed136;
}

@media (min-width: 768px) {
	section {
		padding: 150px 0;
	}
}

section {
	padding: 70px 0;
}
#fh5co-clients {

  background: #fcf8e3 }
ul {
	padding-left: 0;
	padding-top: 10px;	
}

ul li {
    list-style: none;
    padding-bottom: 10px;
    font-family: 'Open Sans', sans-serif;
    font-size: 14px;
    font-weight: 500;
    line-height: 23px;
    letter-spacing: 0.2px;
    color: #000000;
}

section ul li:before {
	font-family: FontAwesome;
	font-weight: normal;
	font-style: normal;
	display: inline-block;
	text-decoration: inherit;
	content: "\f105";
	padding-right: 7px;
	color: #23AD21;
}


/*------------------
2.Navigator
--------------------*/

.navbar-default .navbar-nav > .active > a, 
.navbar-default .navbar-nav > .active > a:hover, 
.navbar-default .navbar-nav > .active > a:focus {
    color: #FCAC45 !important;
    background-color: transparent;
    font-weight: 700;
                    }

.navbar-default {
    background-color: #fff;
    border-color: rgba(231, 231, 231, 0);
    box-shadow: 0px 0px 2px 2px gray;
    text-transform: uppercase;
    height: 55px;
                    }





/*--------------------
3. Header
--------------------*/

header {

	background: rgba(28, 36, 65, 0.93);
	background-image: url(img/mkschool.jpg);
	background-repeat: none;
	background-attachment: scroll;
	background-position: center center;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	background-size: cover;
	-o-background-size: cover;
	text-align: center;
	color: #fff;
	position: relative;
	width: 100%;
	height: 100%;
}

header .intro-text {
	padding-top: 100px;
	padding-bottom: 50px;
}

@media (min-width: 768px) {
	header .intro-text {
		padding-top: 230px;
		padding-bottom: 400px;
    }
}

header .intro-text .intro-lead-in {
	display: inline-block;
	background-color: rgba(255, 255, 255, 0.65);
	margin-bottom: 25px;
	padding: 4px 20px;
	font-family: "Open Sans",sans-serif;
	font-size: 19px;
	color: #3E3E3E;
	font-weight: 300;
	line-height: 40px;
}

@media (min-width: 768px) {
	header .intro-text .intro-lead-in {
    font-size: 29px;
    line-height: 40px;
    margin-bottom: 45px;
	}
}

header .intro-text .intro-heading {
	text-transform: uppercase;
	font-weight: 900;
	font-size: 40px;
	line-height: 48px;
	margin-bottom: 25px;
	letter-spacing: -3px;
	word-spacing: 10px;
	color: #FFFFFF;
	text-shadow: 1px 1px 1px rgb(0, 0, 0);
}

@media (min-width: 768px) {
	header .intro-text .intro-heading {
		line-height: 95px;
		font-size: 77px;
		margin-bottom: 50px;
	}
}

/*--------------------
4. Sections
--------------------*/

.section-title h2 {
	font-size: 34px;
	text-transform: uppercase;
	color: #5D5D5D;
	font-weight: 800;
	letter-spacing: -0.6px;
	position: relative;
	margin-bottom: 20px;
	padding-bottom: 15px;
}

.section-title h2:after {
	left: 50%;
	z-index: 1;
	width: 40px;
	height: 2px;
	content: " ";
	bottom: -5px;
	margin-left: -20px;
	text-align: center;
	position: absolute;
	background: #23AD21;
}

.dark-bg .section-title h2 {
	color: #fff;
}

.section-title p {
	font-size: 15px;
	font-weight: 300;
	line-height: 25px;
	margin: 20px 100px 60px 100px;
}







/*--------------------
4.4. Dark Short section (counters, quote, etc)
--------------------*/

.light-bg {
	background-color: #fcf8e3;

}
.white-bg {
	background-color: #fff;

}
.dark-bg {
	background-color: #333231;	
	color: #fff;
}







/*--------------------
4.7. Contacts
--------------------*/



.contact h3 {
	margin-bottom: 30px;
}

.contact p {
	font-size: 13px;
}

.contact .day {
	display: inline-block;
	width: 80px;
}

.contact i {
	margin-right: 5px;
}

/*--------------------
5. Footer
--------------------*/

footer {
	padding: 30px;
	background-color: #fff;	
}

footer p {
	color: #FBB040;
	margin: 0;
	font-size: 10px;
	text-transform: uppercase;
	font-weight: 500;
	letter-spacing: 1.6px;
}

footer p a {
	color: #23AD21;
	font-size: 10px;
	letter-spacing: 1px;
	font-weight: 700;
}










	</style>
	<body>
		<!-- Navigation -->
		<nav id='menu' class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               <img src='./img/mkslogo.png' width='100px' height='50px'>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
               
            </div>

           <!-- Collect the nav links, forms, and other content for toggling -->
        	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#page-top"></a>
						</li>
						<li>
							<a class="page-scroll" href="#home">Home</a>
						</li>
						<li>
							<a class="page-scroll" href="#admission	">Admission</a>
						</li>
						<li>
							<a class="page-scroll" href="#about">About</a>
						</li>
						<li>
							<a class="page-scroll" href="#link">Link</a>
						</li>
						<li>
							<a class="page-scroll" href="#contact">Contact</a>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    </nav>
  
		<!-- Header -->
		<header>
			<div class="container">
				<div class="slider-container" id="home">
					<div class="intro-text">
						<div class="intro-lead-in">Welcome To</div>
						<div class="intro-heading">MARIA KATRINA SCHOOL</div>
				
					</div>
				</div>
			</div>
		</header>
		
		<section class="light-bg" >
			<div class="container">
				<div class="row">
					<div class="col-md-7">
						<div class="section-text">
							<h3>Welcome!</h3>
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
					</div>
					<div class="col-md-5">
						<h3>Maria Katrina School Event</h3>	
						<div class="owl-portfolio owl-carousel">
							<div class="item">
								<div class="owl-portfolio-item"><img src="img/demo/portfolio-7.jpg" class="img-responsive" alt="portfolio"></div>
							</div>
							<div class="item">
								<div class="owl-portfolio-item"><img src="img/demo/portfolio-8.jpg" class="img-responsive" alt="portfolio"></div>
							</div>
							<div class="item">
								<div class="owl-portfolio-item"><img src="img/demo/portfolio-9.jpg" class="img-responsive" alt="portfolio"></div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>

		<div id="about">	
		<section class="white-bg" >
		  <div class="container">	
			<div class="row" >
				<div class="col-md-8">
					<h2  >BEGINNINGS</h2>
					<p>The year was 1996 when Mr. and Mrs. Camilon were offered to buy MIDES Learning Center, a preschool operated by Mrs. Luisa Garcia in a 312 sq.m. lot at Saog, Marilao, Bulacan. <a href="./links/about_mks.php">Read more</a></p>
				</div>
				<div></div>
			</div>

			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12">
						<h4>MISSION</h4>
						<p>The Maria Katrina School adheres to the belief that it is through the quality of education a child gets that he is able to adapt himself to the changes of</p>
						<p><a href="./links/about_mks.php">Read more</a></p>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12">
				
					
						<h4>VISION</h4>
						<p> "Yielding responsible citizens dedicated to the service of God and Country".</p>
						
					
				</div>
				<div class="visible-sm-block visible-xs-block clearfix"></div>
				<div  class="col-md-3 col-sm-6 col-xs-6 col-xxs-12">
						
						<h4>GOALS AND OBJECTIVES</h4>
						<p>Maria Katrina School education recognizes each child as an individual in his own pattern of growth and development. The curriculum,</p>
						<p><a href="./links/about_mks.php">Read more</a></p>
				</div>
				<div  class="col-md-3 col-sm-6 col-xs-6 col-xxs-12">
						<h4>HYMN</h4>
						<p >"Himig Marilao"</p>
						<p >Masdan mo ang bayan ko</p>
						<p>Marilao mahal kong bayan</p>
						<p><a href="./links/hymn_mks.php">Read more</a></p>
				</div>
				
			</div>
		</div>	
		</section>
		</div>



		<section id="fh5co-clients">
		<div class="container" id="link">
			<div class="row intro-tables" >

				<div class='col-md-2'>

				</div>
				
				<div class="col-md-4" >
					<div class="intro-table intro-table-hover">
						<h5 class="white heading hide-hover">click here</h5>
						<div class="bottom">
							<h4 class="white heading small-pt">Student Portal</h4>
							<a href="#" class="btn btn-white-fill expand">Login</a>
						</div>
					</div>
				</div>



				<div class="col-md-4">
					<div class="intro-table intro-table-hover">
						<h5 class="white heading hide-hover">Click here</h5>
						<div class="bottom">
							<h4 class="white heading small-heading no-margin regular"></h4>
							<h4 class="white heading small-pt">Teacher Portal</h4>
							<a href="#" class="btn btn-white-fill expand">Login</a>
						</div>
					</div>
				</div>
				<div class='col-md-2'>

				</div>
			</div>
		</div>


		<div class="container" id="admission" >	
			<div class="row">
				<div class="col-md-8">
					<h4>Admission Requirements and Procedures</h4>
						<p>Some text here..Some text here..Some text here..Some text here..Some text here..Some text here..Some text here..Some text here..</p>
						<p><a href="./links/admission_requirements.php">Click here to view</a></p>
				</div>
				<div></div>
			</div>

			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12">
						<h4>Downloadable forms</h4>
						
						<li><a href='./document/ApplicationForm(newstudent).pdf' target='_blank' download>For Freshmen <img src='./img/pdf.png' width='25px' height='20px'></a></li><br>
						<li><a href='./document/ApplicationForm(transferee).pdf' target='_blank' download >For Transferees <img src='./img/pdf.png' width='25px' height='20px'></a></a></li><br>
						<li><a href='./document/ApplicationForm(seniorhigh).pdf' target='_blank' download>For Senior High <img src='./img/pdf.png' width='25px' height='20px'></a></a></li>

					
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12">
					<div class="fh5co-product">
					
						<h4>Online Admission For Incoming Freshmen</h4>
						<p></p>
						<p><a href="./links/newstudent/freshmanregister.php">Click here to Register for freshman</a></p>
					</div>
				</div>
				<div class="visible-sm-block visible-xs-block clearfix"></div>
				<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12">
						
						<h4>Online Admission For Transferees</h4>
						<p></p>
						<p><a href="./links/newstudent/transfereeregister.php">Click here to Register for Transferees</a></p>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12">
						<h4>Online Admission For Senior High School</h4>
						<p></p>
						<p><a href="./links/newstudent/seniorhighregister.php">Click here to Register for Senior High</a></p>
				</div>
				
			</div>
		</div>
	</section>

	

	

	
	<section id='white-bg' >
	<div class="container" id="contact">
				<div class="row">
					
				</div>
				<div class="row">
					<div class="col-md-5">
						<div class="section-text">
							<h4>Location:</h4>
							<p>#10 Mendoza St., Saog,, 3019 Marilao, Bulacan</p>
							<p><i class="glyphicon glyphicon-phone"></i> 09063710368</p>
							<p><i class="glyphicon glyphicon-ok-sign"></i> Recognize by the government through the Department of Education.</p>
						</div>
					</div>
					<div class="col-md-5">
						<div class="section-text">
							<h4>School Hours</h4>
							<p><i class="glyphicon glyphicon-clock"></i> <span class="day">Monday-Friday:	</span><span>07:00am - 5:00pm</span></p>
						
						</div>
					</div>

				</div>
			</div>
		
	</section>	
		
		<footer>
			<div class="container text-center">
				<p><?php  $curYear= Date('Y');
                                        echo "Copyright &COPY; $curYear <a href=''>MKS</a>";
                                      ?></p>
			</div>
		</footer>

	

	

		<!-- Bootstrap core JavaScript
			================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->

		 <script src="js/jquery.1.11.1.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/main.js"></script>
		<script src="js/SmoothScroll.js"></script>
		<script src="js/jquery.appear.js"></script>
		<script src="js/mooz.themes.scripts.js"></script>
	</body>
</html>