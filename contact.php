<!DOCTYPE html>
<html>
<head>
	<title>Alliance Francaise | about</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	    <link rel="stylesheet" type="text/css" href="style.css">
	<?php include("nav.php") ?>
  
</head>
<body>
	    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>GET IN TOUCH WITH US</h2>
          <p>Fill in the form below to get in touch with us.</p>
        </div>
      </div>

      <div>
        <iframe style="border:0; width: 100%; height: 350px;" src="https://maps.google.com/maps?q=Nairobi&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container">
        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Kenyatta Avenue,Nairobi</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@alliancefrancaise.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>0722000000</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form  method="POST" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div   class="text-center"><button name="submit" type="submit">Send Message</button></div>
            </form>
            <?php 
            if (isset($_POST['submit'])) {
              $name = $_POST['name'];
              $email = $_POST['email'];
              $subject = $_POST['subject'];
              $message = $_POST['message'];

              sendMessage($name,$email,$subject,$message);
            }
            function sendMessage($name,$email,$subject,$message){
              require('dbconnection.php');

              $sql = "INSERT INTO contact (`name`,`email`,`subject`,`message`) VALUES (?,?,?,?)";

              //prepare query
              if ($stmt = mysqli_prepare($conn,$sql)) {
                //bind values
                mysqli_stmt_bind_param($stmt,"ssss",$param_name,$param_email,$param_subject,$param_message);

                $param_name = $name;
                $param_email = $email;
                $param_subject = $subject;
                $param_message = $message;

                if (mysqli_stmt_execute($stmt)) {
                                echo "message sent successfully";
                              }
                              else{
                                echo "something wrong".mysqli_error($conn);
                              }   

                }else{
                  echo "something went wrong".mysqli_error($conn);
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

