<!DOCTYPE html>
<html>
<head>
	<title>Appointments</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<section>
		<div class="container">
			<div class="section-title">
				<h2>PATIENTS APPOINTMENTS</h2>
				
			</div>
			
		</div>
		<div class="col">
			<table style="padding: 10px;margin: 20px" class="table">
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Date</th>
					<th>Department</th>
					<th>Service</th>
					<th>Message</th>
				</tr>
				<?php 
				require('dbconnection.php');

				$sql = "SELECT * FROM appointment";

				$result = mysqli_query($conn,$sql);

				if ($result) {
					$rows = mysqli_num_rows($result);

					if ($rows>0) {
						while($record = mysqli_fetch_assoc($result)){
							echo "<tr>";
							echo "<td>".$record['name']."</td>";
							echo "<td>".$record['email']."</td>";
							echo "<td>".$record['PHONE']."</td>";
							echo "<td>".$record['date']."</td>";
							echo "<td>".$record['department']."</td>";
							echo "<td>".$record['service']."</td>";
							echo "<td>".$record['message']."</td>";
							echo "<tr>";
						}
					}
					else{
						echo "<h3>No Appointments Yet!</h3>";
					}
				}
				else{
					echo "Something wrong.Try Again".mysqli_error($conn);
				}
				 ?>
				
				
			</table>
			<a style="margin-left: 30px" href="index.php"><span>Back To Home Page</span></a>
			
		</div>
	
	</section>

</body>
</html>