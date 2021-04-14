<!DOCTYPE html>
<html>
<head>
	<title>register | administrator</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		.row {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap;
			margin: 0 -16px;
        }
        input {
        	width: 100%;
		    margin-bottom: 5px;
		    padding: 5px;
		    border: 1px solid #ccc;
		    border-radius: 3px;
  		}

  		label {
		    margin-bottom: 0px;
		    display: block;
  		}
	</style>
</head>
<body>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-5">
					<div class="alert alert-primary" role="alert">
						Register For This Site
					</div>
					
				</div>
								
			</div>
			<div class="row">
				<div class="col-5">
					<div class="card" style="background: #F0F3F4 ">
					 <form method="POST">
					 	<label for="fname"><i class="fa fa-user"></i> Username</label><br>
		                <input type="text" id="fname" name="username" required><br>
		                <label for="email"><i class="fa fa-envelope"></i> Email</label><br>
		                <input type="text" id="email" name="email" required><br>
		                <label for="password"><i class="fa fa-envelope"></i> Password</label><br>
		                <input type="password" id="password" name="password" required>
		                <div   class="text-center"><button class="btn btn-primary" name="register" type="submit">Register</button></div>
					 </form>
					 <?php
					 if (isset($_POST['register'])) {
					 	$username = $_POST['username'];
			            $email = $_POST['email'];
			            $password = $_POST['password'];

			            $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
			            registerUser($username,$email,$encryptedPassword);
					 }
					 function registerUser($username,$email,$password){
					 	//database connection
					 	require("dbconnection.php");

					 	$sql = "INSERT INTO admin (`username`,`email`,`password`) VALUES (?,?,?)";

					 	//prepare query
					 	if ($stmt = mysqli_prepare($conn,$sql)) {
					 		//bind values
					 		mysqli_stmt_bind_param($stmt,"sss",$param_username,$param_email,$param_password);

					 		$param_username = $username;
					 		$param_email = $email;
					 		$param_password = $password;

					 		if (mysqli_stmt_execute($stmt)) {
					 			echo "Registeration successfull";
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
					  <a href="login.php"><span>Already registered? Login</span></a>	
					  <a href="index.php"><span>Back to Alliance Franchaise Hospital</span></a>					
				    </div>
					
				</div>

			</div>
			
		</div>
	</section>

</body>
</html>