<?php
		//retrict this page to only a person logi
		//check if session isset
		if (!isset($_SESSION['name'])) {
			# code...
			//when not set
			//we take to the login
			header('location:login.php');
		}
		//else tell no access - take


?>