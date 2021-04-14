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
                <input type="text" id="fname" name="firstname" placeholder="Your Name" required>
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
                <input type="text" id="expmonth" name="expmonth" placeholder="Enter Mpesa code" required>

              </div>

            </div>
            <input type="submit" value="Continue to checkout" class="btn">
          </form>
        </div>
      </div>
    </div>
  </section>

</body>
</html>