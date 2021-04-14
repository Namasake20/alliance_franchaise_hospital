<!DOCTYPE html>
<html>
<head>
	<title>Alliance Francaise | appointment</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	    <link rel="stylesheet" type="text/css" href="style.css">
	<?php include("nav.php") ?>
</head>
<body>
	<section id="appointment" class="appointment section-bg">
      <div class="container">

        <div class="section-title">
          <h2>MAKE APPOINTMENT NOW</h2>
          <p>Fill in the form below to book your appointment now</p>
        </div>

        <form  method="POST" role="form" class="php-email-form">
          <div class="row">
            <div class="col-md-4 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" required>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
              <div class="validate"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              <input type="date" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="department" id="department" class="form-select" required>
                <option value="">Select Department</option>
                <option value="Radiology">Radiology</option>
                <option value="Surgery">Surgery</option>
                
              </select>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="service" id="doctor" class="form-select" required>
                <option value="">Select Service</option>
                <option value="outpatient">Outpatient</option>
                <option value="inpatient">Inpatient</option>
                
              </select>
              <div class="validate"></div>
            </div>
          </div>

          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="What are you seeking care for?" required></textarea>
            <div class="validate"></div>
          </div>

        
          <div class="text-center"><button name="submit" type="submit">BOOK APPOINTMENT</button></div>

        </form>
        <?php
        if (isset($_POST['submit'])) {

        	$name = $_POST['name'];
        	$email = $_POST['email'];
        	$phone = $_POST['phone'];
        	$date = $_POST['date'];
        	$department = $_POST['department'];
        	$service = $_POST['service'];
        	$message = $_POST['message'];

        	bookAppointment($name,$email,$phone,$date,$department,$service,$message);
         }
         function bookAppointment($name,$email,$phone,$date,$department,$service,$message){
         	require('dbconnection.php');

         	$sql = "INSERT INTO appointment (`name`,`email`,`phone`,`date`,`department`,`service`,`message`) VALUES (?,?,?,?,?,?,?)";

         	//prepare query
         	if ($stmt = mysqli_prepare($conn,$sql)) {
         		//bind values
         		mysqli_stmt_bind_param($stmt,"ssissss",$param_name,$param_email,$param_phone,$param_date,$param_department,$param_service,$param_message);
         		$param_name = $name;
         		$param_email = $email;
         		$param_phone = $phone;
         		$param_date = $date;
         		$param_department = $department;
         		$param_service = $service;
         		$param_message = $message;

         		if (mysqli_stmt_execute($stmt)) {
         			echo '<script>alert("Appointment sent successfully")</script>';
         		}
         		else{
         			echo "Something wrong".mysqli_error($conn);
         		}
         	}else{
         		echo "Something went wrong".mysqli_error($conn);
         	}
         	//close connection
         	mysqli_close($conn);
         } 
         ?>

      </div>
    </section>
</body>
</html>