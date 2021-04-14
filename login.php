<?php
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>login | administrator</title>
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
						Login As Administrator
					</div>
					
				</div>
								
			</div>
			<div class="row">
				<div class="col-5">
					<div class="card" style="background: #F0F3F4 ">
					 <form method="POST">
		                <label for="email"><i class="fa fa-envelope"></i> Email</label><br>
		                <input type="text" id="email" name="email" required><br>
		                <label for="password"><i class="fa fa-envelope"></i> Password</label><br>
		                <input type="password" id="password" name="password" required>
		                <div   class="text-center"><button class="btn btn-primary" name="login" type="submit">Log In</button></div>
					 </form>
					 <?php
			          if (isset($_POST['login'])) {
			            //capture form data
			            $email = $_POST['email'];
			            $password = $_POST['password'];

			            //connect to db
			            require('dbconnection.php');

			            $sql = "SELECT * FROM admin WHERE email = ?";

			            //prepare
			            if ($stmt = mysqli_prepare($conn,$sql)){
			              //bind
			              mysqli_stmt_bind_param($stmt,"s",$param_email);
			              $param_email = $email;

			              //execute query
			              mysqli_execute($stmt);

			              //get results
			              $result = mysqli_stmt_get_result($stmt);
			              if ($result){
			                $rows = mysqli_num_rows($result);
			      					if ($rows>0){
			                  $record = mysqli_fetch_assoc($result);

			                  //verify password
			                  $status = password_verify($password, $record['password']);
			                  	if ($status){
			                      echo "Login successfull ".$record['email'];
			                      header('location:index.php');
			                      ob_end_flush();
			                      //sessions
									session_start();
									$_SESSION['email']=$record['email'];
									$_SESSION['id'] = $record['id'];
			                      
			                    }else {
			                      echo "<h5 style='color:red'>Invalid email or password.Try again</h5>";
			                    }
			                }else{
			                  echo "<h5 style='color:red'>Invalid email or password.Try again</h4>";
			                }
			              }else {
			                echo "Something is wrong ".mysqli_error($conn);
			              }
			            }else {
			              echo "Something is wrong ".mysqli_error($conn);
			            }

			          }
           			?>
           			<a href="register.php"><span>Register | Forgot password?</span></a>
           			<a href="index.php"><span>Back to Alliance Franchaise Hospital</span></a>

				    </div>
					
				</div>

			</div>
			
		</div>
	</section>

</body>
</html>