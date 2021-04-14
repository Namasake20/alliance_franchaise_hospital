<!DOCTYPE html>
<html>
<head>
  <title>purchases</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
    .row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
  }

  .col-25 {
    -ms-flex: 25%; /* IE10 */
    flex: 25%;
  }

  .col-50 {
    -ms-flex: 50%; /* IE10 */
    flex: 50%;
  }

  .col-75 {
    -ms-flex: 75%; /* IE10 */
    flex: 75%;
  }

  .col-25,
  .col-50,
  .col-75 {
    padding: 0 16px;
  }

  .container {
    background-color: #f2f2f2;
    padding: 5px 20px 15px 20px;
    border: 1px solid lightgrey;
    border-radius: 3px;
  }

  input[type=text] {
    width: 100%;
    margin-bottom: 20px;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 3px;
  }

  label {
    margin-bottom: 10px;
    display: block;
  }

  .icon-container {
    margin-bottom: 20px;
    padding: 7px 0;
    font-size: 24px;
  }

  .btn {
    background-color: #4CAF50;
    color: white;
    padding: 12px;
    margin: 10px 0;
    border: none;
    width: 25%;
    border-radius: 3px;
    cursor: pointer;
    font-size: 17px;
  }

  .btn:hover {
    background-color: #45a049;
  }

  span.price {
    float: right;
    color: grey;
  }

  /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
  @media (max-width: 800px) {
    .row {
      flex-direction: column-reverse;
    }
    .col-25 {
      margin-bottom: 20px;
    }
  }
  </style>
</head>
<body>
  <section>
    <div class="row">
      <div class="col-75">
        <div class="container">
          <form action="index.php">

            <div class="row">
              <div class="col-50">
                <h5>DELIVERY ADDRESS</h5>
                <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                <input type="text" id="fname" name="name" placeholder="Your Name" required>
                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                <input type="text" id="email" name="email" placeholder="Enter your email address" required>

                <div class="row">
                  <div class="col-50">
                    <label for="country">Country</label>
                    <input type="text" id="state" name="country" placeholder="Kenya" required>
                  </div>
                  <div class="col-50">
                    <label for="zip">Town</label>
                    <input type="text" id="zip" name="town" placeholder="Nairobi" required>
                  </div>
                </div>
              </div>

              <div class="col-50">
                <h5>PAYMENT</h5>
                <label for="cname">Name on Card</label>
                <input type="text" id="cname" name="cardname" placeholder="Enter name on card" required>
                <label for="ccnum">Credit card number</label>
                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
                <label for="expmonth">Mpesa:Paybill;00000</label>
                <input type="text" id="expmonth" name="mpesa" placeholder="Enter Mpesa code" required>

              </div>

            </div>
            <div class="text-center"><button class="btn btn-primary" name="checkout"  type="submit">Checkout</button></div>

          </form>
          <?php  
            if (isset($_POST['checkout'])) {
                  $name = $_POST['name'];
                  $email = $_POST['email'];
                  $country = $_POST['country'];
                  $town = $_POST['town'];
                  $cardname = $_POST['cardname'];
                  $cardnumber = $_POST['cardnumber'];
                  $mpesa = $_POST['mpesa'];
                  

                  sendPrescription($name,$email,$country,$town,$cardname,$cardnumber,$mpesa);
           }
           function sendPrescription($name,$email,$country,$town,$cardname,$cardnumber,$mpesa){
            //database connection
            require("dbconnection.php");

            $sql = "INSERT INTO purchases (`name`,`email`,`country`,`town`,`cardname`,`cardnumber`,`mpesa`) VALUES (?,?,?,?,?,?,?)";

            //prepare query
            if ($stmt = mysqli_prepare($conn,$sql)) {
              //bind values
              mysqli_stmt_bind_param($stmt,"sssssss",$param_name,$param_email,$param_country,$param_town,$param_cardname,$param_cardnumber,$param_mpesa);

              $param_name = $name;
              $param_email = $email;
              $param_country = $country;
              $param_town = $town;
              $param_cardname = $cardname;
              $param_cardnumber = $cardnumber;
              $param_mpesa = $mpesa;
              
              if (mysqli_stmt_execute($stmt)) {
                echo "checkout success";
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
