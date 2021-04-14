<?php
//create a connection between php and mysql database


  define('username', 'masake');
  define('server', 'localhost');
  define('password', 'masake69');
  define('database', 'alliance_franchaise');

  $conn = mysqli_connect(server,username,password,database);

  /*returns true if connection is success - error*/

  if ($conn) {
  	# code...
  	//echo "connection success";
  }else{
  	echo "Failed to establish  a connection.".mysqli_connect_error();
  }
?>
