<!DOCTYPE html>
<html>
<head>
	<title> Alliance Francaise</title>
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<header id="header" class="fixed-top">
    <?php include("nav.php")  ?>
</header>
 <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
      	<div class="col-6">
      		<h1>Welcome to Alliance Francaise Hospital</h1>
      		<h2>We offer the best services when it comes to healthcare.</h2>
      		<!-- <a href="#" class="btn-get-started scrollto">Get Started</a> -->
      		<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
			  <div class="carousel-indicators">
			    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
			    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
			  </div>
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img class="img-fluid" style="height: 300px" src="https://i1.wp.com/www.gerties.org/wp-content/uploads/2018/09/doctor-treating-young-boy.jpg?resize=1920%2C923&ssl=1" class="d-block w-100" alt="...">
			      <div class="carousel-caption d-none d-md-block">
			        <h5 style="color: #02021E ">QUALITY HEALTHCARE</h5>
			        <button style="background: #AED6F1"  >LEARN MORE</button>
			      </div>
			    </div>
			    <div class="carousel-item">
			      <img style="height: 300px" src="https://inudgeyou.com/wp-content/uploads/2017/07/hallway_shallow.jpg" class="d-block w-100" alt="...">
			      <div class="carousel-caption d-none d-md-block">
			        <h5 style="color: #D35400 ">Alliance Franchaise donates Masks to commutties in slums.checkout our blog posts section.</h5>
			        <button style="background: #AED6F1">READ MORE</button>
			      </div>
			    </div>
			    <div class="carousel-item">
			      <img style="height: 300px" src="https://media-exp1.licdn.com/dms/image/C4D1BAQEQzxwgAVUbkQ/company-background_10000/0/1589700744125?e=2159024400&v=beta&t=ierVhOJIzib4TJ2p7FrOFqgHyxm3JSgEKTo6u8kabLg" class="d-block w-100" alt="...">
			      <div class="carousel-caption d-none d-md-block">
			        <h5 style="color: #C0392B;font-weight: 20px">How can I prevent myself from contracting Covid19?</h5>
			        <button style="background: #AED6F1">READ MORE</button>
			      </div>
			    </div>
			  </div>
			  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="visually-hidden">Previous</span>
			  </button>
			  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="visually-hidden">Next</span>
			  </button>
			</div>
      	</div>
      	<div class="col-6">
      		<img src="https://cdn.britannica.com/12/130512-004-AD0A7CA4/campus-Riverside-Ottawa-The-Hospital-Ont.jpg">
      		
      	</div>
      	
      </div>
    </div>
 </section>
 <section id="contact" class="contact">
 	<?php include("contact.php") ?>
 	
 </section>
 <section><?php include("logout.php") ?></section>
 <section id="appointment" class="appointment">
 	<?php include("appointment.php") ?>
 	
 </section>
 <section class="pharmacy">
 	<?php include("pharmacy.php") ?>
 	
 </section>
 <section  class="out_inpatient">
 	<?php include("out_inpatient.php") ?>
 </section>
 <section class="radiology">
 	<?php include("radiology.php") ?>
 	
 </section>
 <section>
 	<?php include("surgery.php") ?>
 </section>
 <section >
 	<?php include("pres_form.php") ?>
 	
 </section>

 <section id="about" class="about section-bg">
 	<?php include("about.php") ?>
 </section>
<section>
	<?php include("footer.php") ?>
</section>
 
</body>

</html>