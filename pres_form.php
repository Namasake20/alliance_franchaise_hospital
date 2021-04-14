<!DOCTYPE html>
<html>
<head>
	<title>Prescription</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	    <link rel="stylesheet" type="text/css" href="style.css">
	<?php include("nav.php") ?>
</head>
<body>
	<section>
		<div class="container">
			<div class="section-title">
				<h2>PRESCRIPTION FORM</h2>
				<P>Fill In The Form Correctly</P>
			</div>
			<div class="row">
				<div class="col-8">
					<form  method="POST" role="form" class="php-email-form">
			          <div class="row">
			            <div class="col-md-4 form-group">
			              <input type="text" name="name" class="form-control" id="name" placeholder=" Full Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
			              <div class="validate"></div>
			            </div>
			            <div class="col-md-4 form-group mt-3 mt-md-0">
			              <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" data-rule="email" data-msg="Please enter a valid email" required>
			              <div class="validate"></div>
			            </div>
			            <div class="col-md-4 form-group mt-3 mt-md-0">
			              <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone Number" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
			              <div class="validate"></div>
			            </div>
			          </div>
			          <div class="row">
			          	<div class="col-md-4 form-group mt-3">
			              <input type="text" name="idNumber" class="form-control" id="name" placeholder="ID/PP Number" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
			              <div class="validate"></div>
			            </div>
			            <div class="col-md-4 form-group mt-3">
			              <select name="mode" id="department" class="form-select" required>
			                <option value="">Select Payment Mode</option>
			                <option value="Mpesa">Mpesa</option>
			                <option value="Credit Card">Credit Card</option>
			                
			              </select>
			              <div class="validate"></div>
			            </div>
			            <div class="col-md-4 form-group mt-3">
			              <select name="gender" id="department" class="form-select" required>
			                <option value="">Gender</option>
			                <option value="Male">Male</option>
			                <option value="Female">Female</option>
			                
			              </select>
			              <div class="validate"></div>
			            </div>
			          	
			          </div>
			          <div class="row">
			            <div class="col-md-4 form-group mt-3">
			              <input type="date" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
			              <div class="validate"></div>
			            </div>
			            <div class="col-md-4 form-group mt-3">
			              <select name="outlet" id="department" class="form-select" required>
			                <option value="">Select Pharmacy Outlet</option>
			                <option value="Medical Ward">Medical Ward</option>
			                <option value="Doctors' Plaza">Doctors' Plaza</option>
			                
			              </select>
			              <div class="validate"></div>
			            </div>
			            <div class="col-md-4 form-group mt-3">
			              <select name="presmode" id="doctor" class="form-select" required>
			                <option value="">How will you be sending us the prescription?</option>
			                <option value="Email">Email</option>
			                <option value="Whatsapp">Whatsapp</option>
			                
			              </select>
			              <div class="validate"></div>
			            </div>
			          </div>

			          <div class="form-group mt-3">
			            <textarea class="form-control" name="message" rows="5" placeholder="What are you seeking prescription for?" required></textarea>
			            <div class="validate"></div>
			          </div>
			          <div class="text-center"><button class="btn btn-primary" name="send"  type="submit">SUBMIT</button></div>

                    </form>
                    <?php 
                    if (isset($_POST['send'])) {
					 	$name = $_POST['name'];
			            $email = $_POST['email'];
			            $phone = $_POST['phone'];
			            $idNumber = $_POST['idNumber'];
			            $mode = $_POST['mode'];
			            $gender = $_POST['gender'];
			            $outlet = $_POST['outlet'];
			            $presmode = $_POST['presmode'];
			            $message = $_POST['message'];

			            sendPrescription($name,$email,$phone,$idNumber,$mode,$gender,$outlet,$presmode,$message);
					 }
					 function sendPrescription($name,$email,$phone,$idNumber,$mode,$gender,$outlet,$presmode,$message){
					 	//database connection
					 	require("dbconnection.php");

					 	$sql = "INSERT INTO prescription (`name`,`email`,`phone`,`idNumber`,`mode`,`gender`,`outlet`,`presmode`,`message`) VALUES (?,?,?,?,?,?,?,?,?)";

					 	//prepare query
					 	if ($stmt = mysqli_prepare($conn,$sql)) {
					 		//bind values
					 		mysqli_stmt_bind_param($stmt,"sssssssss",$param_name,$param_email,$param_phone,$param_id,$param_mode,$param_gender,$param_outlet,$param_presmode,$param_message);

					 		$param_name = $name;
					 		$param_email = $email;
					 		$param_phone = $phone;
					 		$param_id = $idNumber;
					 		$param_mode = $mode;
					 		$param_gender = $gender;
					 		$param_outlet = $outlet;
					 		$param_presmode = $presmode;
					 		$param_message = $message;

					 		if (mysqli_stmt_execute($stmt)) {
					 			echo "message sent";
					 		}
					 		else{
					 			echo "<h5 style='color:red'>Something went wrong</h5>".mysqli_error($conn);
					 		}
					 	}
					 	else{
					 		echo "Something went wrong".mysqli_error($conn);
					 	}
					 	//close connection
					 	mysqli_close($conn);
					 }
                     ?>
					
				</div>
				
			</div>
		</div>
	</section>

</body>
</html>
